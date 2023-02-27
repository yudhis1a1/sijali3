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
		$this->load->model('draft');
		$this->load->model('dupak');
		// $this->load->model('M_monitor');
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
	function phpinfo()
	{
		phpinfo();
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login/login?pesan=logout'));
	}

	//fungsi pimpinan
	function get_usulan_jad($no_jfa_usulan)
	{
		$q_usulan_jfa = $this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jfa_usulan'")->row();
		$nm_jad_usul = $q_usulan_jfa->nm_jabatan;
		$jen_jad_usulan = $q_usulan_jfa->nm_jenjang;
		$kum_jad_usulan = $q_usulan_jfa->kum;
		$jad_usulan = $nm_jad_usul . ' ' . $kum_jad_usulan . ' (' . $jen_jad_usulan . ')';

		return $jad_usulan;
	}

	public function tampil_usulan_pimpinan($tipe)
	{
		if ($tipe == "1") {
			$judul 	= "Usulan Baru";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='3' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "2") {
			$judul 	= "Proses Penilaian";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='5' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "3") {
			$judul 	= "Pending Penilaian";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='12' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "4") {
			$judul 	= "Proses Operator Sub PTK";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='6' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "5") {
			$judul 	= "Proses Operator Sub HKT";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='8' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "6") {
			$judul 	= "Proses Dikti";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='7' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "7") {
			$judul 	= "Selesai";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='9' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "8") {
			$judul 	= "Proses Diusulkan Ke Dikti";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='11' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "9") {
			$judul 	= "Validasi Persyaratan Administrasi";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='13' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "10") {
			$judul 	= "Validasi PAK";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='14' ORDER BY updated_at ASC")->result();
		} elseif ($tipe == "11") {
			$judul 	= "Revisi PAK";
			$que 	= $this->db->query("SELECT * FROM v_usulan_new WHERE `usulan_status_id`='15' ORDER BY updated_at ASC")->result();
		}

		$data['que'] 	= $que;
		$data['judul'] 	= $judul;
		$data['tipe'] 	= $tipe;
		Vusulan('pimpinan/v_tampil_usulan_pimpinan', $data);
	}

	public function tampil_usulan()
	{
		Vusulan('pimpinan/all_usulan');
	}

	function usulan_pimpinan()
	{
		$draw = $_REQUEST['draw'];

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length = $_REQUEST['length'];
		$start 	= $_REQUEST['start'];
		$search = $_REQUEST['search']["value"];

		$in = array('2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');


		$cek_user = $this->db->query("SELECT COUNT(*) AS jml_user FROM v_usulan_new")->row();
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
			1 => 'no_urut',
			2 => 'no',
			3 => 'status',
			4 => 'no_usulan',
			5 => 'nidn',
			6 => 'nama',
			7 => 'homebase',
			8 => 'prodi',
			9 => 'usulan'
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
		$this->db->order_by('updated_at', 'ASC');
		$this->db->select('*');
		$this->db->from('v_usulan_new');
		$this->db->where_in('usulan_status_id', $in);
		$query = $this->db->get();

		if ($search != "") {
			$query = $this->db->query("SELECT
											*
										FROM
										`v_usulan_new`
										WHERE `usulan_status_id`<>'1'
											AND(`no` LIKE '%$search%'
											OR nidn LIKE '%$search%'
											OR nama LIKE '%$search%'
											OR nama_instansi LIKE '%$search%'
											OR nama_status LIKE '%$search%'
											OR nama_prodi LIKE '%$search%')");
			$output['recordsTotal'] = $output['recordsFiltered'] = $query->num_rows();
		}

		$nomor_urut = 1;
		foreach ($query->result_array() as $surat) {
			$no_jfa_usulan = $surat['jabatan_usulan_no'];
			$no_jad_usulan = $this->get_usulan_jad($no_jfa_usulan);


			$aju = $this->db->query("SELECT
										usulan_no,
										`created_at` AS tgl_ajuan
									FROM
										`usulan_riwayat_statuses`
									WHERE `usulan_status_id` = '3'
										AND `keterangan_pengusul` = 'Pengajuan Usulan Baru'
										AND usulan_no = '$surat[no]'
									ORDER BY `created_at` DESC
									LIMIT 1")->row();

			if ($surat['usulan_status_id'] == '9') {
				$awal  = date_create($aju->tgl_ajuan);
				$akhir = date_create($surat['tgl_selesai']);
				$diff  = date_diff($awal, $akhir);
			} else {
				$diff  = date_diff(date_create($aju->tgl_ajuan), date_create());
			}
			$durasi_thn = $diff->y;
			$durasi_bln = $diff->m;
			$durasi_hari = $diff->d;


			$output['data'][] = array(
				$nomor_urut,

				'<a href=' . base_url() . 'usulan/usulan/usulans/usul/' . $surat['no'] . ' data-toggle="tooltip" title="Detail Ajuan" target="_blank"><button type="button" class="btn btn-info btn-md"><i class="fa fa-search"></i></button></a>',

				'<h3><center><span class="label label-danger">' . $surat['nama_status'] . ' </span></center></h3>',
				$surat['nidn'],
				$surat['nama'],
				$surat['nama_instansi'] . '(' . $surat['nama_prodi'] . ')',
				$no_jad_usulan,
				$aju->tgl_ajuan,
				$durasi_thn . ' Tahun <br>' . $durasi_bln . ' Bulan <br>' . $durasi_hari . ' Hari'
			);

			$nomor_urut++;
		}
		echo json_encode($output);
	}

	function rekap_pt()
	{
		vusulan('pimpinan/pilih_rekap_pt');
	}

	function data_rekap_pt()
	{
		$tahun 	= $this->input->post("tahun");

		$data['tahun']	= $tahun;
		vusulan('pimpinan/data_rekap_pt', $data);
	}

	function tampil_rekap_pt($jenis, $tahun, $bln)
	{
		$hasil = $this->db->query("SELECT
										*
									FROM
										`v_usulan_new`
									WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
										AND MID(`tgl_ajuan`, 6, 2) = '$bln'
										AND LEFT(`instansi_kode`, 3) = '$jenis'");
		$data['hasil']	= $hasil;
		$data['jenis']	= $jenis;
		$data['bln']	= $bln;
		$data['tahun']	= $tahun;
		vusulan('pimpinan/tampil_rekap_pt', $data);
	}

	function rekap_jfa()
	{
		vusulan('pimpinan/pilih_rekap_jfa');
	}

	function data_rekap_jfa()
	{
		$tahun 	= $this->input->post("tahun");

		$data['tahun']	= $tahun;
		vusulan('pimpinan/data_rekap_jfa', $data);
	}

	function tampil_rekap_jfa($jenis, $tahun, $bln)
	{
		if ($jenis == "1") {
			$jafung = "Asisten Ahli";
		} elseif ($jenis == "2") {
			$jafung = "Lektor";
		} elseif ($jenis == "3") {
			$jafung = "Lektor Kepala";
		} elseif ($jenis == "4") {
			$jafung = "Guru Besar";
		}

		$hasil = $this->db->query("SELECT
										*
									FROM
										`v_usulan_new`
									WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
										AND MID(`tgl_ajuan`, 6, 2) = '$bln'
										AND `nama_jabatans`='$jafung'");
		$data['hasil']	= $hasil;
		$data['jenis']	= $jenis;
		$data['bln']	= $bln;
		$data['tahun']	= $tahun;
		$data['jafung']	= $jafung;

		vusulan('pimpinan/tampil_rekap_jfa', $data);
	}

	function rekap_jfa_prodi()
	{
		vusulan('pimpinan/pilih_rekap_jfa_prodi');
	}

	function data_rekap_jfa_prodi()
	{
		$tahun 	= $this->input->post("tahun");

		$hasil = $this->db->query("SELECT
									`instansi_kode`,
									`nama_instansi`,
									kode_prodi,
									`nama_prodi`,
									prodi_kode
								FROM
									`v_usulan_rekap_pim`
								WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
								GROUP BY `nama_instansi`,
									`nama_prodi`
								ORDER BY `instansi_kode` ASC,
									nama_prodi ASC");

		$data['tahun']	= $tahun;
		$data['hasil']	= $hasil;
		vusulan('pimpinan/data_rekap_jfa_prodi', $data);
	}

	function tampil_rekap_jfa_prodi($jenis, $tahun, $instansi_kode, $prodi_kode)
	{
		if ($jenis == "1") {
			$jafung = "Asisten Ahli";
		} elseif ($jenis == "2") {
			$jafung = "Lektor";
		} elseif ($jenis == "3") {
			$jafung = "Lektor Kepala";
		} elseif ($jenis == "4") {
			$jafung = "Guru Besar";
		}

		$hasil = $this->db->query("SELECT
										*
									FROM
										`v_usulan_new`
									WHERE `instansi_kode` = '$instansi_kode'
										AND `prodi_kode` = '$prodi_kode'
										AND LEFT(`tgl_ajuan`, 4) = '$tahun'
										AND `nama_jabatans`='$jafung'");
		$data['hasil']	= $hasil;
		$data['jenis']	= $jenis;
		$data['tahun']	= $tahun;
		$data['jafung']	= $jafung;

		vusulan('pimpinan/tampil_rekap_jfa_prodi', $data);
	}

	function rekap_penilai()
	{
		vusulan('pimpinan/pilih_rekap_penilai');
	}

	function data_rekap_penilai()
	{
		$tahun 	= $this->input->post("tahun");

		$data['tahun']	= $tahun;
		vusulan('pimpinan/data_rekap_penilai', $data);
	}

	function rekap_per_tim_penilai()
	{
		vusulan('pimpinan/pilih_rekap_per_tim_penilai');
	}

	function data_rekap_per_tim_penilai()
	{
		$tahun 	= $this->input->post("tahun");
		$bulan 	= $this->input->post("bulan");

		if ($tahun == "all_thn") {
			$penilai = $this->db->query("SELECT
											a.`user_penilai_no`,
											COUNT(a.`usulan_no`) AS jml_usulan,
											b.`nama`
										FROM
											`usulan_riwayat_penilais` a
											JOIN `users` b
											ON a.`user_penilai_no` = b.`no`
										WHERE  b.`role_id` = '5'
											AND a.`keputusan` <>'' 
										GROUP BY a.`user_penilai_no`")->result();
			$data['tahun']		= $tahun;
			$data['bulan']		= $bulan;
			$data['penilai'] 	= $penilai;
			vusulan('pimpinan/data_rekap_per_tim_penilai_all_thn', $data);
		} elseif ($bulan == "all_bln") {
			$penilai = $this->db->query("SELECT
											a.`user_penilai_no`,
											COUNT(a.`usulan_no`) AS jml_usulan,
											b.`nama`
										FROM
											`usulan_riwayat_penilais` a
											JOIN `users` b
											ON a.`user_penilai_no` = b.`no`
										WHERE  b.`role_id` = '5'
											AND a.`keputusan` <>'' 
											AND LEFT(a.`created_at`, 4) = '$tahun'
										GROUP BY a.`user_penilai_no`")->result();
			$data['tahun']		= $tahun;
			$data['bulan']		= $bulan;
			$data['penilai'] 	= $penilai;
			vusulan('pimpinan/data_rekap_per_tim_penilai_all_bln', $data);
		} else {
			$penilai = $this->db->query("SELECT
											a.`user_penilai_no`,
											COUNT(a.`usulan_no`) AS jml_usulan,
											b.`nama`
										FROM
											`usulan_riwayat_penilais` a
											JOIN `users` b
											ON a.`user_penilai_no` = b.`no`
										WHERE  b.`role_id` = '5'
											AND a.`keputusan` <>'' 
											AND LEFT(a.`created_at`, 4) = '$tahun'
											AND MID(a.`created_at`, 6, 2) = '$bulan'
										GROUP BY a.`user_penilai_no`")->result();
			$data['tahun']		= $tahun;
			$data['bulan']		= $bulan;
			$data['penilai'] 	= $penilai;
			vusulan('pimpinan/data_rekap_per_tim_penilai', $data);
		}
	}

	function tampil_rekap_penilai($jenis, $tahun, $bln)
	{
		if ($jenis == "1") {
			$jafung = "Asisten Ahli";
		} elseif ($jenis == "2") {
			$jafung = "Lektor";
		} elseif ($jenis == "3") {
			$jafung = "Lektor Kepala";
		} elseif ($jenis == "4") {
			$jafung = "Guru Besar";
		}

		$hasil = $this->db->query("SELECT
										*
									FROM
										`v_usulan_new`
									WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
										AND MID(`tgl_ajuan`, 6, 2) = '$bln'
										AND `nama_jabatans`='$jafung'");
		$data['hasil']	= $hasil;
		$data['jenis']	= $jenis;
		$data['bln']	= $bln;
		$data['tahun']	= $tahun;
		$data['jafung']	= $jafung;

		vusulan('pimpinan/tampil_rekap_penilai', $data);
	}

	function rekap_jfa_usulan()
	{
		vusulan('pimpinan/pilih_rekap_jfa_usulan');
	}

	function data_rekap_jfa_usulan()
	{
		$tahun 	= $this->input->post("tahun");

		$data['tahun']	= $tahun;
		vusulan('pimpinan/data_rekap_jfa_usulan', $data);
	}

	function tampil_rekap_jfa_usulan($jenis, $tahun, $bln)
	{
		if ($jenis == "1") {
			$jafung = "Asisten Ahli";
		} elseif ($jenis == "2") {
			$jafung = "Lektor";
		} elseif ($jenis == "3") {
			$jafung = "Lektor Kepala";
		} elseif ($jenis == "4") {
			$jafung = "Guru Besar";
		}

		$hasil = $this->db->query("SELECT
										*
									FROM
										`v_usulan_new`
									WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
										AND MID(`tgl_ajuan`, 6, 2) = '$bln'
										AND `nama_jabatans`='$jafung'");
		$data['hasil']	= $hasil;
		$data['jenis']	= $jenis;
		$data['bln']	= $bln;
		$data['tahun']	= $tahun;
		$data['jafung']	= $jafung;

		vusulan('pimpinan/tampil_rekap_jfa_usulan', $data);
	}

	function rekap_jfa_pt_dosen()
	{
		$hasil = $this->db->query("SELECT
										`instansi_kode`,
										`nama_instansi`,
										COUNT(`instansi_kode`) AS jml
									FROM
										`v_usulan_new`
									GROUP BY `instansi_kode`
									ORDER BY `nama_instansi` ASC");
		$data['hasil']	= $hasil;

		vusulan('pimpinan/rekap_jfa_pt_dosen', $data);
	}

	function tampil_rekap_jfa_pt_dosen($instansi_kode)
	{
		$hasil = $this->db->query("SELECT
										*
									FROM
										`v_usulan_new`
									WHERE `instansi_kode`='$instansi_kode'
									ORDER BY `nama` ASC");
		$da = $hasil->row();
		$ta = $hasil->result();

		$data['da']	= $da;
		$data['ta']	= $ta;

		vusulan('pimpinan/tampil_rekap_jfa_pt_dosen', $data);
	}
}
