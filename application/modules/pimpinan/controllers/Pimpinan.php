<?php
defined('BASEPATH') or exit('No direct script access allowed');



/**
 * @author akil
 * @version 1.0
 * @created 13-Mar-2016 20:19:38
 */
class Pimpinan extends MX_Controller
{


	function __construct()
	{
		$username = $this->session->userdata('username');
		$this->load->helper(array('url', 'download', 'date_helper'));
		$this->load->helper('date_helper');
		parent::__construct();


		if ($this->session->userdata('status') != "login") {
			redirect(base_url() . 'login/login?pesan=belumlogin');
		}
	}


	function __destruct()
	{
	}

	function logout()
	{
		$this->session->sess_destroy();
		// 	 echo "<script>window.location.href='". base_url()."akun/login';</script>";

		redirect(base_url('login/login?pesan=logout'));
	}

	public function tampil_usulan()
	{
		Vusulan('all_usulan');
	}


	function get_usulan_jad($no_jfa_usulan)
	{
		$q_usulan_jfa = $this->db->query("SELECT
											a.`no`,
											a.`jabatan_kode`,
											a.`jenjang_id`,
											b.`nama_jabatans` AS nm_jabatan,
											c.`nama_jenjang` AS nm_jenjang,
											b.kum
										FROM
											`jabatan_jenjangs` a
											JOIN `jabatans` b
											ON a.`jabatan_kode` = b.`kode`
											JOIN `jenjangs` c
											ON a.`jenjang_id` = c.`id`
										WHERE a.`no` = '$no_jfa_usulan'")->row();
		$nm_jad_usul = $q_usulan_jfa->nm_jabatan;
		$jen_jad_usulan = $q_usulan_jfa->nm_jenjang;
		$kum_jad_usulan = $q_usulan_jfa->kum;
		$jad_usulan = $nm_jad_usul . ' ' . $kum_jad_usulan . ' (' . $jen_jad_usulan . ')';

		return $jad_usulan;
	}

	function usulan()
	{
		$draw = $_REQUEST['draw'];

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length = $_REQUEST['length'];
		$start = $_REQUEST['start'];
		$search = $_REQUEST['search']["value"];

		$cek_user = $this->db->query("SELECT count(*) AS jml_user from v_usulan_new")->row();

		$output = array();
		$output['draw'] = $draw;
		$output['recordsTotal'] = $output['recordsFiltered'] = $cek_user->jml_user;
		$output['data'] = array();

		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}

		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}

		$valid_columns = array(
			1 => 'no',
			2 => 'status',
			3 => 'no_usulan',
			4 => 'nidn',
			5 => 'nama',
			6 => 'homebase',
			7 => 'prodi',
			8 => 'usulan',
			9 => 'created_at'
		);

		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}

		if ($order != null) {
			$this->db->order_by($order, $dir);
		}

		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length, $start);
		$this->db->order_by('created_at', 'DESC');
		$this->db->select('*');
		$this->db->from('v_usulan_new');
		$query = $this->db->get();

		if ($search != "") {
			$query = $this->db->query("SELECT
											*
										FROM
											v_usulan_new
										WHERE `no` LIKE '%$search%'
											OR nidn LIKE '%$search%'
											OR nama LIKE '%$search%'
											OR nama_instansi LIKE '%$search%'
											OR nama_prodi LIKE '%$search%'");

			$output['recordsTotal'] = $output['recordsFiltered'] = $query->num_rows();
		}

		$nomor_urut = $start + 1;
		foreach ($query->result_array() as $surat) {
			$no_jfa_usulan = $surat['jabatan_usulan_no'];
			$no_jad_usulan = $this->get_usulan_jad($no_jfa_usulan);

			$output['data'][] = array(
				'<a href=usulans/usul/' . $surat['no'] . ' data-toggle="tooltip" title="Detail Ajuan"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-search"></i></button></a>',

				'<h3><center><span class="label label-danger">' . $surat['nama_status'] . ' </span></center></h3>',
				$surat['no'],
				$surat['nidn'],
				$surat['nama'],
				$surat['nama_instansi'],
				$surat['nama_prodi'],
				$no_jad_usulan,
				$surat['created_at']
			);

			$nomor_urut++;
		}
		echo json_encode($output);
	}
}
