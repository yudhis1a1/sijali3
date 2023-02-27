<?php
defined('BASEPATH') or exit('No direct script access allowed');



/**
 * @author akil
 * @version 1.0
 * @created 13-Mar-2016 20:19:38
 */
class Superadmin extends MX_Controller
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

	public function all_user()
	{
		Vsuperadmin('all_user');
	}

	function tampil_all_user()
	{
		$draw = $_REQUEST['draw'];
		$username = $this->session->userdata('username');
		$role = $this->session->userdata('role');

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length = $_REQUEST['length'];
		$start = $_REQUEST['start'];
		$search = $_REQUEST['search']["value"];

		$cek_user = $this->db->query("SELECT count(*) AS jml_user from v_user_superadmin")->row();

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
			2 => 'nama',
			3 => 'username',
			4 => 'password_64',
			5 => 'role_id',
			6 => 'nm_role',
			7 => 'instansi_kode',
			8 => 'nm_pt',
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

		$this->db->order_by('role_id', 'ASC');
		$this->db->select('*');
		$this->db->from('v_user_superadmin');
		$query = $this->db->get();


		if ($search != "") {
			$query = $this->db->query("SELECT
									  *
									FROM
									v_user_superadmin
									WHERE `no` LIKE '%$search%'
									  OR nama LIKE '%$search%'
									  OR `username` LIKE '%$search%'
									  OR `role_id` LIKE '%$search%'
									  OR `instansi_kode` LIKE '%$search%'
									  OR `nm_pt` LIKE '%$search%'
									  OR `nm_role` LIKE '%$search%'");

			$output['recordsTotal'] = $output['recordsFiltered'] = $query->num_rows();
		}

		$nomor_urut = $start + 1;
		foreach ($query->result_array() as $ase) {
			$output['data'][] = array(
				$ase['no'],
				$ase['nama'],
				$ase['username'],
				base64_decode($ase['password_64']),
				$ase['role_id'],
				$ase['nm_role'],
				$ase['instansi_kode'],
				$ase['nm_pt'],
				$ase['aktif']
			);

			$nomor_urut++;
		}
		echo json_encode($output);
	}


	public function log_usulans()
	{
		Vsuperadmin('log_usulans');
	}

	function tampil_log_usulans()
	{
		$draw = $_REQUEST['draw'];

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length = $_REQUEST['length'];
		$start = $_REQUEST['start'];
		$search = $_REQUEST['search']["value"];

		$cek_user = $this->db->query("SELECT count(*) AS jml_user from log_usulans_lldikti")->row();

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
			1 => 'usulan_no',
			2 => 'nidn',
			3 => 'nama',
			4 => 'user_no',
			5 => 'role_id',
			6 => 'nama_user',
			7 => 'usulan_id_lama',
			8 => 'status_lama',
			9 => 'usulan_id_baru',
			10 => 'status_baru',
			11 => 'created_at',
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
		$this->db->from('log_usulans_lldikti');
		$query = $this->db->get();


		if ($search != "") {
			$query = $this->db->query("SELECT
									  *
									FROM
									log_usulans_lldikti
									WHERE `usulan_no` LIKE '%$search%'
									  OR nidn LIKE '%$search%'
									  OR `nama` LIKE '%$search%'
									  OR `user_updated_no` LIKE '%$search%'
									  OR `role_id` LIKE '%$search%'
									  OR `nama_user` LIKE '%$search%'
									  OR `usulan_id_lama` LIKE '%$search%'
									  OR `status_lama` LIKE '%$search%'
									  OR `usulan_id_baru` LIKE '%$search%'
									  OR `status_baru` LIKE '%$search%'
									  OR `created_at` LIKE '%$search%'
									ORDER BY created_at DESC");

			$output['recordsTotal'] = $output['recordsFiltered'] = $query->num_rows();
		}

		$nomor_urut = $start + 1;
		foreach ($query->result_array() as $ase) {
			if (($ase['usulan_id_lama'] == '5' && $ase['usulan_id_baru'] == '3') || ($ase['usulan_id_lama'] == '9' && $ase['usulan_id_baru'] == '5') || ($ase['usulan_id_lama'] == '6' && $ase['usulan_id_baru'] == '3') || $ase['user_updated_no'] == '') {
				$tanda = "danger";
			} else {
				$tanda = "success";
			}

			$output['data'][] = array(
				'<h3><center><span class="label label-' . $tanda . '">' . $ase['usulan_no'] . ' </span></center></h3>',
				$ase['nidn'],
				$ase['nama'],
				$ase['user_updated_no'],
				$ase['role_id'],
				$ase['nama_user'],
				$ase['usulan_id_lama'],
				$ase['status_lama'],
				$ase['usulan_id_baru'],
				$ase['status_baru'],
				$ase['created_at']
			);

			$nomor_urut++;
		}
		echo json_encode($output);
	}
}
