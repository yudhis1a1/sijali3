<?php
defined('BASEPATH') or exit('No direct script access allowed');



/**
 * @author akil
 * @version 1.0
 * @created 13-Mar-2016 20:19:38
 */
class Usulan_dupak extends MX_Controller
{


	function __construct()
	{
		$username['username'] = $this->session->userdata('username');
		$this->load->model('draft');
		$this->load->model('dupak');
		$this->load->helper(array('url', 'download', 'date_helper'));
		if ($this->session->userdata('status') != "login") {
			redirect(base_url() . 'login/login?pesan=belumlogin');
		}
	}


	function __destruct()
	{
	}

	function get_mata_kuliah()
	{
		$username = $this->session->userdata('username');
		$semester = $_POST['semester'];

		$hasil = $this->db->query("SELECT * FROM ajar_dosen WHERE NIDN='$username' AND SEMESTER='$semester' group by NMMK");

		$mataKuliah = $hasil->result_array();

		echo json_encode($mataKuliah);
	}

	function dupak($no, $id)
	{
		if ($no == "A0004_new") {
			$no = "A0004";
			$nos = "A0004_new";
		} else {
			$no = $no;
			$nos = "";
		}


		$username 		= $this->session->userdata('username');
		$q_dupak 		= $this->db->query("SELECT * FROM usulan_dupaks a WHERE dupak_no='$no' and usulan_no='$id'")->row();
		$q_usulan 		= $this->db->query("SELECT * FROM usulans WHERE no='$id'")->row();
		$q_ajar_dosen 	= $this->db->query("SELECT NMMK,KODEMK FROM ajar_dosen WHERE NIDN='$username' group by NMMK")->result();

		$q1 = $this->db->query("SELECT
							  usulan_no,
							  no,
							  `uraian`,
							  `semester`,
							  `tahun_akademik`,
							  `tahun_akademik` + 1 AS thn_akademik_baru,
							  `tgl`,
							  `satuan_hasil`,
							  angka_kredit,
							  `jumlah_volume`,
							  (sks * jumlah_volume) AS total_sks,
							  `kum_usulan`,
							  `keterangan`,
							  url,
							  url_index,
							  berkas,
							  transkrip,
							  bukti_kinerja,
							  kum_penilai,
							  kum_penilai_keterangan,
							  id_rwy_didik_formal,
							  created_at
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'")->row();

		$q2 = $this->db->query("SELECT usulan_no,no,`uraian`,`semester`,`tahun_akademik`,`tahun_akademik`+1 AS thn_akademik_baru,`tgl`,`satuan_hasil`,sks,`jumlah_volume`,(sks*jumlah_volume) AS total_sks,`kum_usulan`,`keterangan`,url,url_index,berkas FROM  `usulan_dupak_details` WHERE usulan_no = '$id' AND `dupak_no` = '$no'");


		$q3 = $this->db->query("SELECT usulan_no,dupak_no,no,`uraian`,penulis_ke,jml_penulis,`semester`,nim,nm_mhs,`tahun_akademik`,`tahun_akademik`+1 AS thn_akademik_baru,`tgl`, satuan_hasil,`keterangan`,angka_kredit, berkas,url,isbn,kum_penilai,kum_penilai_keterangan  FROM  `usulan_dupak_details` WHERE usulan_no = '$id' AND `dupak_no` = '$no'");

		$data_dasar = $this->db->query("SELECT
										a.`no`,
										a.`dosen_no`,
										b.`nama`,
										b.`nidn`,
										b.`nidk`,
										a.`usulan_status_id`,
										b.jabatan_no,
										a.jenjang_id_lama,
										a.jenjang_id_baru,
										b.`jabatan_tgl`,
										b.`pengangkatan_tgl`
										FROM
										usulans AS a,
										dosens AS b
										WHERE a.`no`='$id'
										AND a.`dosen_no`=b.`no`")->row();


		$jenjang_id_lama 	= $data_dasar->jenjang_id_lama;
		$jenjang_id_baru 	= $data_dasar->jenjang_id_baru;
		$usulan_status_id 	= $data_dasar->usulan_status_id;
		$nidn 				= $data_dasar->nidn;
		$jabatan_no 		= $data_dasar->jabatan_no;
		$jabatan_tgl 		= $data_dasar->jabatan_tgl;
		$pengangkatan_tgl 	= $data_dasar->pengangkatan_tgl;

		$role 						= $this->session->userdata('role');
		$A0001['role'] 				= $role;
		$A0001['id_sdm'] 			= $data_dasar->dosen_no;
		$A0001['ajar_dosen'] 		= $q_ajar_dosen;
		$A0001['no'] 				= $id;
		$A0001['dupak_no'] 			= $no;
		$A0001['usulan_status_id'] 	= $usulan_status_id;
		$A0001['q_dupak'] 			= $q_dupak;
		$A0001['q1'] 				= $q1;
		$A0001['q2'] 				= $q2;
		$A0001['q3'] 				= $q3;
		$A0001['nidn'] 				= $nidn;
		$A0001['usulan'] 			= $q_usulan;
		$A0001['jabatan_no'] 		= $jabatan_no;
		$A0001['jabatan_tgl'] 		= $jabatan_tgl;
		$A0001['pengangkatan_tgl'] 	= $pengangkatan_tgl;
		$A0001['jenjang_id_lama'] 	= $jenjang_id_lama;
		$A0001['jenjang_id_baru'] 	= $jenjang_id_baru;

		$tw_now = date('Y-m-d H:i:s');
		if ($no == 'A0001') {
			if ($q1 == 0) {
				vusulan('bidang_a/a0001', $A0001);
			} elseif ($q1->id_rwy_didik_formal <> '') {
				vusulan('bidang_a/a0001', $A0001);
			} else {
				vusulan('bidang_a/a0001_lama', $A0001);
			}
		} elseif ($no == 'A0002') {
			if ($q1 == 0) {
				vusulan('bidang_a/a0002', $A0001);
			} elseif ($q1->id_rwy_didik_formal <> '') {
				vusulan('bidang_a/a0002', $A0001);
			} else {
				vusulan('bidang_a/a0002_lama', $A0001);
			}
		} elseif ($no == 'A0003') {
			vusulan('bidang_a/a0003', $A0001);
		} elseif ($no == 'A0005') {
			vusulan('bidang_a/a0005', $A0001);
		} elseif ($no == 'A0006') {
			vusulan('bidang_a/a0006', $A0001);
		} elseif ($no == 'A0007') {
			vusulan('bidang_a/a0007', $A0001);
		} elseif ($no == 'A0008') {
			vusulan('bidang_a/a0008', $A0001);
		} elseif ($no == 'A0009') {
			vusulan('bidang_a/a0009', $A0001);
		} elseif ($no == 'A0010') {
			vusulan('bidang_a/a0010', $A0001);
		} elseif ($no == 'A0011') {
			vusulan('bidang_a/a0011', $A0001);
		} elseif ($no == 'A0012') {
			vusulan('bidang_a/a0012', $A0001);
		} elseif ($no == 'A0013') {
			vusulan('bidang_a/a0013', $A0001);
		} elseif ($no == 'A0014') {
			vusulan('bidang_a/a0014', $A0001);
		} elseif ($no == 'A0015') {
			vusulan('bidang_a/a0015', $A0001);
		} elseif ($no == 'A0016') {
			vusulan('bidang_a/a0016', $A0001);
		} elseif ($no == 'A0017') {
			vusulan('bidang_a/a0017', $A0001);
		} elseif ($no == 'A0018') {
			vusulan('bidang_a/a0018', $A0001);
		} elseif ($no == 'A0019') {
			vusulan('bidang_a/a0019', $A0001);
		} elseif ($no == 'A0020') {
			vusulan('bidang_a/a0020', $A0001);
		} elseif ($no == 'A0021') {
			vusulan('bidang_a/a0021', $A0001);
		} elseif ($no == 'A0022') {
			vusulan('bidang_a/a0022', $A0001);
		} elseif ($no == 'A0023') {
			vusulan('bidang_a/a0023', $A0001);
		} elseif ($no == 'A0024') {
			vusulan('bidang_a/a0024', $A0001);
		} elseif ($no == 'A0025') {
			vusulan('bidang_a/a0025', $A0001);
		} elseif ($no == 'A0026') {
			vusulan('bidang_a/a0026', $A0001);
		} elseif ($no == 'A0027') {
			vusulan('bidang_a/a0027', $A0001);
		} elseif ($no == 'A0028') {
			vusulan('bidang_a/a0028', $A0001);
		} elseif ($no == 'A0029') {
			vusulan('bidang_a/a0029', $A0001);
		} elseif ($no == 'A0030') {
			vusulan('bidang_a/a0030', $A0001);
		} elseif ($no == 'A0031') {
			vusulan('bidang_a/a0031', $A0001);
		} elseif ($no == 'A0032') {
			vusulan('bidang_a/a0032', $A0001);
		} elseif ($no == 'A0033') {
			vusulan('bidang_a/a0033', $A0001);
		} elseif ($no == 'A0034') {
			vusulan('bidang_a/a0034', $A0001);
		} elseif ($no == 'A0035') {
			vusulan('bidang_a/a0035', $A0001);
		} elseif ($no == 'A0036') {
			vusulan('bidang_a/a0036', $A0001);
		} elseif ($no == 'A0037') {
			vusulan('bidang_a/a0037', $A0001);
		} elseif ($no == 'A0038') {
			vusulan('bidang_a/a0038', $A0001);
		} elseif ($no == 'A0039') {
			vusulan('bidang_a/a0039', $A0001);
		} elseif ($no == 'A0040') {
			vusulan('bidang_a/a0040', $A0001);
		} elseif ($no == 'A000402') {
			vusulan('bidang_a/a0004_2', $A0001);
		} elseif ($no == "A0004" && $nos == "A0004_new") {
			vusulan('bidang_a/a0004_new', $A0001);
		} elseif ($no == 'A0004') {
			vusulan('bidang_a/a0004', $A0001);
		}
	}

	// function tambah_a0001($dupak, $kum)
	// {
	// 	$no_usulan = $this->input->post('no_usulan');
	// 	$uraian = addslashes($this->input->post('uraian'));
	// 	$semester = $this->input->post('semester');
	// 	$thn_akademik = $this->input->post('thn_akademik');
	// 	$tgl = $this->input->post('tgl');
	// 	$satuan_hasil = $this->input->post('satuan_hasil');
	// 	$jumlah_volume = $this->input->post('jumlah_volume');
	// 	$keterangan = addslashes($this->input->post('keterangan'));
	// 	$tgl_create = date("y-m-d H:i:s");
	// 	$tgl_update = date("y-m-d H:i:s");
	// 	$no = date("ymdHis") . '04' . $this->session->userdata('username');
	// 	$file_path = './assets/download_bidanga/';
	// 	mkdir($file_path, 0777, true);
	// 	$config['upload_path'] = $file_path;
	// 	$config['allowed_types'] = 'pdf';
	// 	$config['max_size'] = '5048';
	// 	$config['file_name'] = 'File' . date("ymdHis") . $no;
	// 	$this->load->library('upload', $config);
	// 	$cari_udup = $this->db->query("select * from usulan_dupak_details where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
	// 	if ($cari_udup > 0) {
	// 		$this->session->set_flashdata('error', 'Data Sudah Ada');
	// 		redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
	// 	} else {
	// 		$data = array(
	// 			'no' => $no,
	// 			'usulan_no' => $no_usulan,
	// 			'dupak_no' => $dupak,
	// 			'kum_usulan_baru' => $kum,
	// 			'created_at' => $tgl_create,
	// 			'updated_at' => $tgl_update
	// 		);
	// 		$data1 = array(
	// 			'no' => $no,
	// 			'usulan_no' => $no_usulan,
	// 			'dupak_no' => $dupak,
	// 			'uraian' => $uraian,
	// 			'semester' => $semester,
	// 			'tahun_akademik' => $thn_akademik,
	// 			'tgl' => $tgl,
	// 			'satuan_hasil' => $satuan_hasil,
	// 			'angka_kredit' => $kum,
	// 			'keterangan' => $keterangan,
	// 			'created_at' => $tgl_create,
	// 			'updated_at' => $tgl_update
	// 		);
	// 		$this->session->set_flashdata('flash', 'Ditambah');
	// 		$this->dupak->insert_data($data, 'usulan_dupaks');
	// 		$this->dupak->insert_data($data1, 'usulan_dupak_details');
	// 		redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
	// 	}
	// }

	function tambah_a0001($dupak, $kum)
	{
		$no_usulan 			 = $this->input->post('no_usulan');
		$id_rwy_didik_formal = $this->input->post('id_rwy_didik_formal');
		$tgl_create 	= date("y-m-d H:i:s");
		$tgl_update 	= date("y-m-d H:i:s");
		$no 			= date("ymdHis") . '04' . $this->session->userdata('username');
		$file_path 		= './assets/download_bidanga/';

		mkdir($file_path, 0777, true);
		$config['upload_path'] 		= $file_path;
		$config['allowed_types'] 	= 'pdf';
		$config['max_size'] 		= '5048';
		$config['file_name'] 		= 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);

		$cari_udup = $this->db->query("select * from usulan_dupak_details where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
		if ($cari_udup > 0) {
			$this->session->set_flashdata('error', 'Data Sudah Ada');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$data = array(
				'no' => $no,
				'usulan_no' => $no_usulan,
				'dupak_no' => $dupak,
				'kum_usulan_baru' => $kum,
				'created_at' => $tgl_create,
				'updated_at' => $tgl_update
			);

			$data1 = array(
				'no' => $no,
				'usulan_no' => $no_usulan,
				'dupak_no' => $dupak,
				'id_rwy_didik_formal' => $id_rwy_didik_formal,
				'angka_kredit' => $kum,
				'created_at' => $tgl_create,
				'updated_at' => $tgl_update
			);
			$this->session->set_flashdata('flash', 'Ditambah');
			$this->dupak->insert_data($data, 'usulan_dupaks');
			$this->dupak->insert_data($data1, 'usulan_dupak_details');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function tambah_a0004_20230208($dupak, $kum)
	{
		$pilihan 			= $this->input->post('pilihan');
		$no_usulan 			= $this->input->post('no_usulan');

		if ($pilihan == "") {
			$this->session->set_flashdata('error', 'Anda belum melengkapi bukti pengajaran.');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
			die;
		}

		$jabatan_no 		= $this->input->post('jabatan_no');
		$no_dupak 			= $this->input->post('no_dupak');

		$uraian 			= $this->input->post('uraian');
		$no_usulan_detail 	= $this->input->post('no_usulan_detail');
		$semester 			= $this->input->post('semester');
		$thn_akademik 		= $this->input->post('thn_akademik');
		$tgl 				= $this->input->post('tgl');
		$satuan_hasil 		= "sks";
		$jumlah_volume 		= $this->input->post('jumlah_volume');
		$keterangan 		= addslashes($this->input->post('keterangan'));

		$sks 				= $this->input->post('sks');
		$tgl_create 		= date("y-m-d H:i:s");
		$tgl_update 		= date("y-m-d H:i:s");
		$no 				= date("ymdHis") . '04' . $this->session->userdata('username');

		$q_dupak1 = $this->db->query("SELECT * FROM usulan_dupak_details WHERE dupak_no='$dupak' and usulan_no='$no_usulan' and semester='$semester'")->row();
		if ($q_dupak1->no > 0) {
			$this->session->set_flashdata('error', 'Data Semester sudah ada, silakan hapus dulu data semester yang sudah terinput.');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
			die;
		}

		//jika upload file bukti pembelajaran
		if ($pilihan == "upload") {

			$this->load->library('upload');

			$file_path 			= './assets/download_bidanga/';
			mkdir($file_path, 0777, true);
			$config['upload_path'] 		= $file_path;
			$config['allowed_types'] 	= 'pdf';
			$config['max_size'] 		= '5048';
			$config['file_name'] 		= 'File' . date("ymdHis") . $no;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('berkas')) {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai/Anda belum memilih file untuk diupload');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
				die;
			} else {
				$image = $this->upload->data();
			}

			$config2['upload_path'] 	= $file_path;
			$config2['allowed_types'] 	= 'pdf';
			$config2['max_size'] 		= '5048';
			$config2['file_name'] 		= 'bukti_pengajaran' . date("ymdHis") . $no;

			$this->upload->initialize($config2);

			if (!$this->upload->do_upload('bukti_pengajaran')) {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai/Anda belum memilih file untuk diupload');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
				die;
			} else {
				$image2 = $this->upload->data();
			}

			$bukpeng = $image2['file_name'];
		} else { //jika memilih link repository
			$lkrepo = addslashes($this->input->post("link_repo"));
			if ($lkrepo == "") {
				$this->session->set_flashdata('error', 'Anda belum melengkapi Link Repository');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
				die;
			}

			$this->load->library('upload');

			$file_path 			= './assets/download_bidanga/';
			mkdir($file_path, 0777, true);
			$config['upload_path'] 		= $file_path;
			$config['allowed_types'] 	= 'pdf';
			$config['max_size'] 		= '5048';
			$config['file_name'] 		= 'File' . date("ymdHis") . $no;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('berkas')) {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai/Anda belum memilih file untuk diupload');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
				die;
			} else {
				$image = $this->upload->data();
			}

			$bukpeng = $lkrepo;
		}

		$index = 0;
		foreach ($no_usulan_detail as $no_us_det) {
			$this->db->query("INSERT INTO usulan_dupak_details (
										`no`,
										usulan_no,
										dupak_no,
										uraian,
										semester,
										tahun_akademik,
										tgl,
										satuan_hasil,
										sks,
										jumlah_volume,
										keterangan,
										berkas,
										bukti_pengajaran,
										created_at,
										updated_at
									)
									VALUES
										(
											'$no_us_det',
											'$no_usulan',
											'$dupak',
											'$uraian[$index]',
											'$semester',
											'$thn_akademik',
											'$tgl',
											'$satuan_hasil',
											'$sks[$index]',
											'$jumlah_volume[$index]',
											'$keterangan[$index]',
											'$image[file_name]',
											'$bukpeng',
											'$tgl_create',
											'$tgl_create'
										)");
			$index++;
		}

		$q_dupak2 = $this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
		if ($q_dupak2->no > 0) { //jika sudah ada usulannya pada tabel usulan_dupaks
			$query2 = $this->db->query("SELECT
												no,
												`uraian`,
												`semester`,
												`tahun_akademik`,
												`tahun_akademik`+1 AS thn_akademik_baru,
												`tgl`,
												`satuan_hasil`,
												`sks`,
												`jumlah_volume`,
												(sks*jumlah_volume) AS total_sks,
												`kum_usulan`,
												`keterangan`,
												url,
												url_index,
												berkas
											FROM
											`usulan_dupak_details`
											WHERE usulan_no = '$no_usulan'
												AND `dupak_no` = '$dupak'
												AND semester='$semester'
												AND tahun_akademik='$thn_akademik'");
			foreach ($query2->result() as $q) {
				$total_sks += $q->total_sks;
			}

			if ($jabatan_no == '43' || $jabatan_no == '44' || $jabatan_no == '46' || $jabatan_no == '47' || $jabatan_no == '48' || $jabatan_no == '50' || $jabatan_no == '51') {
				if ($total_sks < 11) {
					$total_angka_kredit = $total_sks;
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				} elseif ($total_sks < 12) {
					$total_angka_kredit = (10 * 1) + (($total_sks - 10) * 0.5);
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				} else {
					$total_angka_kredit = 11;
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				}
			} elseif ($jabatan_no == '31' || $jabatan_no == '40' || $jabatan_no == '41') {
				if ($total_sks < 11) {
					$total_angka_kredit = $total_sks / 2;
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				} elseif ($total_sks < 12) {
					$total_angka_kredit = (10 * 0.5) + (($total_sks - 10) * 0.25);
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				} else {
					$total_angka_kredit = 5.5;
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				}
			}

			$this->db->query("UPDATE usulan_dupaks SET kum_usulan_baru ='$total_update' WHERE dupak_no='$dupak' AND usulan_no='$no_usulan'");

			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
		} else {
			$query3 = $this->db->query("SELECT
										no,
										`uraian`,
										`semester`,
										`tahun_akademik`,
										`tahun_akademik`+1 AS thn_akademik_baru,
										`tgl`,
										`satuan_hasil`,
										`sks`,
										`jumlah_volume`,
										(sks*jumlah_volume) AS total_sks,
										`kum_usulan`,
										`keterangan`,
										url,
										url_index,
										berkas
										FROM
									   `usulan_dupak_details`
									  WHERE usulan_no = '$no_usulan'
										AND `dupak_no` = '$dupak'");
			foreach ($query3->result() as $q3) {
				$total_sks += $q3->total_sks;
			}

			if ($jabatan_no == '43' || $jabatan_no == '44' || $jabatan_no == '46' || $jabatan_no == '47' || $jabatan_no == '48' || $jabatan_no == '50' || $jabatan_no == '51') {
				if ($total_sks < 11) {
					$total_angka_kredit = $total_sks;
				} elseif ($total_sks < 12) {
					$total_angka_kredit = (10 * 1) + (($total_sks - 10) * 0.5);
				} else {
					$total_angka_kredit = 11;
				}
			} elseif ($jabatan_no == '31' || $jabatan_no == '40' || $jabatan_no == '41') {
				if ($total_sks < 11) {
					$total_angka_kredit = $total_sks / 2;
				} elseif ($total_sks < 12) {
					$total_angka_kredit = (10 * 0.5) + (($total_sks - 10) * 0.25);
				} else {
					$total_angka_kredit = 5.5;
				}
			}

			$this->db->query("INSERT INTO usulan_dupaks (
									no,
									usulan_no,
									dupak_no,
									kum_usulan_baru,
									created_at,
									updated_at
									)
								VALUES
									(
									'$no',
									'$no_usulan',
									'$dupak',
									'$total_angka_kredit',
									'$tgl_create',
									'$tgl_create'
									)");

			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
		}
		redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
		$this->session->set_flashdata('error', 'Gagal Menyimpan');
	}

	function tambah_a0004($dupak)
	{
		$pilihan 			= $this->input->post('pilihan');
		$no_usulan 			= $this->input->post('no_usulan');

		if ($pilihan == "") {
			$this->session->set_flashdata('error', 'Anda belum melengkapi bukti pengajaran.');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
			die;
		}

		$jabatan_no 		= $this->input->post('jabatan_no');
		$uraian 			= $this->input->post('uraian');
		$no_usulan_detail 	= $this->input->post('no_usulan_detail');
		$semester 			= $this->input->post('semester');
		$thn_akademik 		= $this->input->post('thn_akademik');
		$tgl 				= $this->input->post('tgl');
		$satuan_hasil 		= "sks";
		$jumlah_volume 		= $this->input->post('jumlah_volume');
		$sks 				= $this->input->post('sks');
		$tgl_create 		= date("y-m-d H:i:s");
		$no 				= date("ymdHis") . '04' . $this->session->userdata('username');

		$q_dupak1 = $this->db->query("SELECT * FROM usulan_dupak_details WHERE dupak_no='$dupak' and usulan_no='$no_usulan' and semester='$semester'")->row();
		if ($q_dupak1->no > 0) {
			$this->session->set_flashdata('error', 'Data Semester sudah ada, silakan hapus dulu data semester yang sudah terinput.');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
			die;
		}

		//jika upload file bukti pembelajaran
		if ($pilihan == "upload") {

			$this->load->library('upload');

			$file_path 			= './assets/download_bidanga/';
			mkdir($file_path, 0777, true);
			$config['upload_path'] 		= $file_path;
			$config['allowed_types'] 	= 'pdf';
			$config['max_size'] 		= '5048';
			$config['file_name'] 		= 'File' . date("ymdHis") . $no;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('berkas')) {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai/Anda belum memilih file untuk diupload');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
				die;
			} else {
				$image = $this->upload->data();
			}

			$config2['upload_path'] 	= $file_path;
			$config2['allowed_types'] 	= 'pdf';
			$config2['max_size'] 		= '5048';
			$config2['file_name'] 		= 'bukti_pengajaran' . date("ymdHis") . $no;

			$this->upload->initialize($config2);

			if (!$this->upload->do_upload('bukti_pengajaran')) {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai/Anda belum memilih file untuk diupload');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
				die;
			} else {
				$image2 = $this->upload->data();
			}

			$bukpeng = $image2['file_name'];
		} else { //jika memilih link repository
			$lkrepo = addslashes($this->input->post("link_repo"));
			if ($lkrepo == "") {
				$this->session->set_flashdata('error', 'Anda belum melengkapi Link Repository');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
				die;
			}

			$this->load->library('upload');

			$file_path 			= './assets/download_bidanga/';
			mkdir($file_path, 0777, true);
			$config['upload_path'] 		= $file_path;
			$config['allowed_types'] 	= 'pdf';
			$config['max_size'] 		= '5048';
			$config['file_name'] 		= 'File' . date("ymdHis") . $no;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('berkas')) {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai/Anda belum memilih file untuk diupload');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
				die;
			} else {
				$image = $this->upload->data();
			}

			$bukpeng = $lkrepo;
		}

		$index = 0;
		foreach ($no_usulan_detail as $no_us_det) {
			$nm_mtk = addslashes($uraian[$index]);

			$this->db->query("INSERT INTO usulan_dupak_details (
										`no`,
										usulan_no,
										dupak_no,
										uraian,
										semester,
										tahun_akademik,
										tgl,
										satuan_hasil,
										sks,
										jumlah_volume,
										berkas,
										bukti_pengajaran,
										created_at,
										updated_at
									)
									VALUES
										(
											'$no_us_det',
											'$no_usulan',
											'$dupak',
											'$nm_mtk',
											'$semester',
											'$thn_akademik',
											'$tgl',
											'$satuan_hasil',
											'$sks[$index]',
											'$jumlah_volume[$index]',
											'$image[file_name]',
											'$bukpeng',
											'$tgl_create',
											'$tgl_create'
										)");
			$index++;
		}

		$q_dupak2 = $this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
		if ($q_dupak2->no > 0) { //jika sudah ada usulannya pada tabel usulan_dupaks
			$query2 = $this->db->query("SELECT
											no,
											`uraian`,
											`semester`,
											`tahun_akademik`,
											`tahun_akademik`+1 AS thn_akademik_baru,
											`tgl`,
											`satuan_hasil`,
											`sks`,
											`jumlah_volume`,
											(sks*jumlah_volume) AS total_sks,
											`kum_usulan`,
											`keterangan`,
											url,
											url_index,
											berkas
										FROM
										`usulan_dupak_details`
										WHERE usulan_no = '$no_usulan'
											AND `dupak_no` = '$dupak'
											AND semester='$semester'
											AND tahun_akademik='$thn_akademik'");
			foreach ($query2->result() as $q) {
				$total_sks += $q->total_sks;
			}

			if ($jabatan_no == '43' || $jabatan_no == '44' || $jabatan_no == '46' || $jabatan_no == '47' || $jabatan_no == '48' || $jabatan_no == '50' || $jabatan_no == '51') {
				if ($total_sks < 11) {
					$total_angka_kredit = $total_sks;
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				} elseif ($total_sks < 12) {
					$total_angka_kredit = (10 * 1) + (($total_sks - 10) * 0.5);
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				} else {
					$total_angka_kredit = 11;
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				}
			} elseif ($jabatan_no == '31' || $jabatan_no == '40' || $jabatan_no == '41') {
				if ($total_sks < 11) {
					$total_angka_kredit = $total_sks / 2;
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				} elseif ($total_sks < 12) {
					$total_angka_kredit = (10 * 0.5) + (($total_sks - 10) * 0.25);
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				} else {
					$total_angka_kredit = 5.5;
					$total_update = $q_dupak2->kum_usulan_baru + $total_angka_kredit;
				}
			}

			$this->db->query("UPDATE usulan_dupaks SET kum_usulan_baru ='$total_update' WHERE dupak_no='$dupak' AND usulan_no='$no_usulan'");

			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
		} else {
			$query3 = $this->db->query("SELECT
										no,
										`uraian`,
										`semester`,
										`tahun_akademik`,
										`tahun_akademik`+1 AS thn_akademik_baru,
										`tgl`,
										`satuan_hasil`,
										`sks`,
										`jumlah_volume`,
										(sks*jumlah_volume) AS total_sks,
										`kum_usulan`,
										`keterangan`,
										url,
										url_index,
										berkas
										FROM
									   `usulan_dupak_details`
									  WHERE usulan_no = '$no_usulan'
										AND `dupak_no` = '$dupak'");

			foreach ($query3->result() as $q3) {
				$total_sks += $q3->total_sks;
			}

			if ($jabatan_no == '43' || $jabatan_no == '44' || $jabatan_no == '46' || $jabatan_no == '47' || $jabatan_no == '48' || $jabatan_no == '50' || $jabatan_no == '51') {
				if ($total_sks < 11) {
					$total_angka_kredit = $total_sks;
				} elseif ($total_sks < 12) {
					$total_angka_kredit = (10 * 1) + (($total_sks - 10) * 0.5);
				} else {
					$total_angka_kredit = 11;
				}
			} elseif ($jabatan_no == '31' || $jabatan_no == '40' || $jabatan_no == '41') {
				if ($total_sks < 11) {
					$total_angka_kredit = $total_sks / 2;
				} elseif ($total_sks < 12) {
					$total_angka_kredit = (10 * 0.5) + (($total_sks - 10) * 0.25);
				} else {
					$total_angka_kredit = 5.5;
				}
			}

			$this->db->query("INSERT INTO usulan_dupaks (
									no,
									usulan_no,
									dupak_no,
									kum_usulan_baru,
									created_at,
									updated_at
									)
								VALUES
									(
									'$no',
									'$no_usulan',
									'$dupak',
									'$total_angka_kredit',
									'$tgl_create',
									'$tgl_create'
									)");

			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
		}
		redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
		$this->session->set_flashdata('error', 'Gagal Menyimpan');
	}

	function upberkas_a0004($dupak)
	{
		$usulan_no 			= $this->input->post("usulan_no");
		$semester 			= $this->input->post("semester");
		$berkas 			= $_FILES['berkas']['name'];
		$pilihan 			= $this->input->post('pilihan');
		$bukti_pengajaran 	= $_FILES['bukti_pengajaran']['name'];
		$link_repo 			= addslashes($this->input->post("link_repo"));
		$no 				= date("ymdHis") . '04' . $this->session->userdata('username');

		$m = $this->db->query("SELECT * FROM usulan_dupak_details WHERE usulan_no='$usulan_no' AND semester='$semester'")->row();

		//jika upload ST Mengajar
		if ($berkas <> '') {
			unlink('assets/download_bidanga/' . $m->berkas);

			$this->load->library('upload');

			$file_path 			= './assets/download_bidanga/';
			mkdir($file_path, 0777, true);
			$config['upload_path'] 		= $file_path;
			$config['allowed_types'] 	= 'pdf';
			$config['max_size'] 		= '5048';
			$config['file_name'] 		= 'File' . date("ymdHis") . $no;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('berkas')) {
				$this->session->set_flashdata('error', 'Format dan Ukuran File ST Tidak Sesuai');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $usulan_no);
				die;
			} else {
				$image = $this->upload->data();

				$up = $this->db->query("UPDATE usulan_dupak_details SET berkas='$image[file_name]' WHERE usulan_no='$usulan_no' AND semester='$semester'");
			}
		}

		//jika akan mengupdate bukti pembelajaran
		if ($pilihan <> '') {
			//jika upload file bukti pembelajaran
			if ($pilihan == "upload") {
				unlink('assets/download_bidanga/' . $m->berkas);

				$this->load->library('upload');

				$file_path 			= './assets/download_bidanga/';
				mkdir($file_path, 0777, true);
				$config['upload_path'] 		= $file_path;
				$config['allowed_types'] 	= 'pdf';
				$config['max_size'] 		= '5048';
				$config['file_name'] 		= 'bukti_pengajaran' . date("ymdHis") . $no;

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('bukti_pengajaran')) {
					$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai/Anda belum memilih file untuk diupload');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $usulan_no);
					die;
				} else {
					$image = $this->upload->data();
				}

				$bukpeng = $image['file_name'];
			} else { //jika memilih link repository
				$lkrepo = addslashes($this->input->post("link_repo"));
				if ($lkrepo == "") {
					$this->session->set_flashdata('error', 'Anda belum melengkapi Link Repository');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $usulan_no);
					die;
				}

				$bukpeng = $lkrepo;
			}

			$da = $this->db->query("UPDATE usulan_dupak_details SET bukti_pengajaran='$bukpeng' WHERE usulan_no='$usulan_no' AND semester='$semester'");
		}

		if ($up || $da) {
			$this->session->set_flashdata('flash', 'Diupdate');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $usulan_no);
		} else {
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $usulan_no);
			$this->session->set_flashdata('error', 'Gagal Update');
		}
	}

	function tambah_a0005($dupak, $kum)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$uraian = addslashes($this->input->post('uraian'));
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$isbn = $this->input->post('isbn');
		$url = $this->input->post('url');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$keterangan = addslashes($this->input->post('keterangan'));
		$no_usulan_detail = $this->input->post('no_usulan_detail');
		$sks = $this->input->post('sks');
		$kum = $this->input->post('kum');
		$volum = $this->input->post('volum');
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");

		$no = date("ymdHis") . '04' . $this->session->userdata('username');
		$file_path = './assets/download_bidanga/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		$cari_udup = $this->db->query("select * from usulan_dupak_details where dupak_no='$dupak' and usulan_no='$no_usulan' and semester='$semester' and tahun_akademik='$thn_akademik'")->row();
		if ($cari_udup > 0) {
			$this->session->set_flashdata('error', 'Data Semester dan Tahun sudah ada, silakan hapus dulu data semester dan tahun yang sudah terinput.');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			if ($this->upload->do_upload('berkas')) {
				$image = $this->upload->data();
				$perintah2 = "INSERT INTO usulan_dupak_details (
			no,
			usulan_no,
			dupak_no,
			uraian,
			semester,
			tahun_akademik,
			tgl,
			satuan_hasil,
			jumlah_volume,
			angka_kredit,
			keterangan,
			berkas,
			created_at,
			updated_at,
			url,
			isbn
		  )
		  VALUES
			(
			  '$no',
			  '$no_usulan',
			  '$dupak',
			  '$_POST[uraian]',
			  '$_POST[semester]',
			  '$_POST[thn_akademik]',
			  '$_POST[tgl]',
			  '$_POST[satuan_hasil]',
			  '$volum',
			  '$kum',
			  '$_POST[keterangan]',
			  '$image[file_name]',
			  '$tgl_create',
			  '$tgl_create',
			  '$_POST[url]',
			  '$_POST[isbn]'
			)";
				$this->db->query($perintah2);
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
			}
			$q_dupak = $this->db->query("select *from usulan_dupaks where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
			if ($q_dupak > 0) {
				$q1 = $this->db->query("SELECT
		no,
		`uraian`,
		`semester`,
		`tahun_akademik`,
		`tahun_akademik`+1 AS thn_akademik_baru,
		`tgl`,
		`satuan_hasil`,
		angka_kredit,
		`kum_usulan`,
		`keterangan`,
		url,
		url_index,
		berkas,
		url,
		isbn
	  FROM
	   `usulan_dupak_details`
	  WHERE usulan_no = '$no_usulan'
		AND `dupak_no` = '$dupak'
		
		AND semester='$semester'
		AND tahun_akademik='$thn_akademik'");
				foreach ($q1->result() as $row) {
					$angka_kredit += $row->angka_kredit;
				}
				$total_update = $q_dupak->kum_usulan_baru + $angka_kredit;
				$update = "update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
				$this->db->query($update);
			} else {
				$q2 = $this->db->query("SELECT
		no,
		uraian,
		semester,
		tahun_akademik,
		tahun_akademik+1 AS thn_akademik_baru,
		tgl,
		satuan_hasil,
		angka_kredit,
		kum_usulan,
		keterangan,
		url,
		url_index,
		berkas,
		url,
		isbn
		FROM
	   usulan_dupak_details
	  WHERE usulan_no = '$no_usulan'
		AND dupak_no = '$dupak'
		AND kunci = '0' ");
				foreach ($q2->result() as $row2) {
					$angka_kredit += $row2->angka_kredit;
				}
				$total_update = $q_dupak->kum_usulan_baru + $angka_kredit;
				$perintah = "INSERT INTO usulan_dupaks (
			no,
			usulan_no,
			dupak_no,
			kum_usulan_baru,
			created_at,
			updated_at
		  )
		  VALUES
			(
			  '$no',
			  '$no_usulan',
			  '$dupak',
			  '$kum',
			  '$tgl_create',
			  '$tgl_create'
			)";
				$this->db->query($perintah);
			}
			if ($perintah2) {
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
			} else {
				$this->session->set_flashdata('error', 'Gagal Menyimpan');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
			}
		}
	}

	function tambah_a0007($dupak, $kum)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$jml_form = $this->input->post('jumlah-form');
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$sf = $this->input->post('sf');
		$kali = $this->input->post('kali');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$uraian = addslashes($this->input->post('uraian'));
		$no_usulan_detail = $this->input->post('no_usulan_detail');
		$nim = $this->input->post('nim');
		$mhs = $this->input->post('mhs');
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '04' . $this->session->userdata('username');
		$file_path = './assets/download_bidanga/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		if ($jml_form > $sf) {
			$this->session->set_flashdata('error', 'Data Mahasiswa tidak boleh lebih dari ' . $sf . ' mahasiswa');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$cari_udup = $this->db->query("select *from usulan_dupak_details where dupak_no='$dupak' and usulan_no='$no_usulan' and semester='$semester' and tahun_akademik='$thn_akademik'")->row();
			if ($cari_udup > 0) {
				$this->session->set_flashdata('error', 'Data Semester dan Tahun sudah ada, silakan hapus dulu data semester dan tahun yang sudah terinput.');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
			} else {

				$query = "INSERT INTO usulan_dupak_details (
						  no,
						  usulan_no,
						  dupak_no,
						  uraian,
						  nim,
						  nm_mhs,
						  semester,
						  tahun_akademik,
						  tgl,
						  satuan_hasil,
						  created_at,
						  updated_at
			  )
			  VALUES";
				$index = 0; // Set index array awal dengan 0
				foreach ($no_usulan_detail as $no_us_det) { // Kita buat perulangan berdasarkan nis sampai data terakhir
					$query .= "('" . $no_us_det . "','" . $no_usulan . "','" . $dupak . "','" . $uraian . "','" . $nim[$index] . "','" . addslashes($mhs[$index]) . "','" . $semester . "','" . $thn_akademik . "','" . $tgl . "','" . $satuan_hasil . "','" . $tgl_create . "','" . $tgl_create . "'),";
					$index++;
				}
				$query = substr($query, 0, strlen($query) - 1) . ";";
				$this->db->query($query);

				$q_dupak2 = $this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
				if ($q_dupak2->no > 0) {
					$q1 = $this->db->query("SELECT
				  COUNT(dupak_no) as jml_mhs
				FROM
				  `usulan_dupak_details`
				WHERE `dupak_no` = '$dupak'
				  AND `usulan_no` = '$no_usulan'
				  AND semester = '$semester'
				  AND tahun_akademik = '$thn_akademik'
				  ")->row();
					$kum_usulan_baru = $q1->jml_mhs * $kali;
					$total_update = $q_dupak2->kum_usulan_baru + $kum_usulan_baru;
					$update = "update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
					$this->db->query($update);
					$this->session->set_flashdata('flash', 'Ditambah');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				} else {
					$q1 = $this->db->query("SELECT
			COUNT(dupak_no) as jml_mhs
		  FROM
			`usulan_dupak_details`
		  WHERE `dupak_no` = '$dupak'
			AND `usulan_no` = '$no_usulan'
			AND semester = '$semester'
			AND tahun_akademik = '$thn_akademik'
			")->row();
					$kum_usulan_baru = $q1->jml_mhs * $kali;
					$perintah = "INSERT INTO usulan_dupaks (
				no,
				usulan_no,
				dupak_no,
				kum_usulan_baru,
				created_at,
				updated_at
			  )
			  VALUES
				(
				  '$no',
				  '$no_usulan',
				  '$dupak',
				  '$kum_usulan_baru',
				  '$tgl_create',
				  '$tgl_create'
				)";
					$this->db->query($perintah);
					$this->session->set_flashdata('flash', 'Ditambah');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				}
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				$this->session->set_flashdata('error', 'Gagal Menyimpan');
			}
		}
	}

	function tambah_a0017($dupak)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$jml_form = $this->input->post('jumlah-form');
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$sf = $this->input->post('sf');
		$kali = $this->input->post('kali');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$uraian = $this->input->post('uraian');
		$keterangan = addslashes($this->input->post('keterangan'));
		$no_usulan_detail = $this->input->post('no_usulan_detail');

		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '04' . $this->session->userdata('username');
		$file_path = './assets/download_bidanga/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		if ($jml_form > $sf) {
			$this->session->set_flashdata('error', 'Data Kegiatan tidak boleh lebih dari ' . $sf . ' kegiatan per semester !!!');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$cari_udup = $this->db->query("select *from usulan_dupak_details where dupak_no='$dupak' and usulan_no='$no_usulan' and semester='$semester' and tahun_akademik='$thn_akademik'")->row();
			if ($cari_udup > 0) {
				$this->session->set_flashdata('error', 'Data Semester dan Tahun sudah ada, silakan hapus dulu data semester dan tahun yang sudah terinput.');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
			} else {
				if ($this->upload->do_upload('berkas')) {
					$image = $this->upload->data();
					$query = "INSERT INTO usulan_dupak_details (
						  no,
						  usulan_no,
						  dupak_no,
						  uraian,
						  semester,
						  tahun_akademik,
						  tgl,
						  satuan_hasil,
						  keterangan,
						  berkas,
						  created_at,
						  updated_at
			  )
			  VALUES";
					$index = 0; // Set index array awal dengan 0
					foreach ($no_usulan_detail as $no_us_det) {
						$query .= "('" . $no_us_det . "','" . $no_usulan . "','" . $dupak . "','" . $uraian[$index] . "','" . $semester . "','" . $thn_akademik . "','" . $tgl . "','" . $satuan_hasil . "','" . $keterangan . "','" . $image['file_name'] . "','" . $tgl_create . "','" . $tgl_create . "'),";
						$index++;
					}
					$query = substr($query, 0, strlen($query) - 1) . ";";
					$this->db->query($query);
				} else {
					$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				}
				$q_dupak2 = $this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
				if ($q_dupak2->no > 0) {
					$q1 = $this->db->query("SELECT
				  COUNT(dupak_no) as jml_keg
				FROM
				  `usulan_dupak_details`
				WHERE `dupak_no` = '$dupak'
				  AND `usulan_no` = '$no_usulan'
				  AND semester = '$semester'
				  AND tahun_akademik = '$thn_akademik'
				  ")->row();
					$kum_usulan_baru = $q1->jml_keg * $kali;
					$total_update = $q_dupak2->kum_usulan_baru + $kum_usulan_baru;
					$update = "update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
					$this->db->query($update);
					$this->session->set_flashdata('flash', 'Ditambah');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				} else {
					$q1 = $this->db->query("SELECT
			COUNT(dupak_no) as jml_keg
		  FROM
			`usulan_dupak_details`
		  WHERE `dupak_no` = '$dupak'
			AND `usulan_no` = '$no_usulan'
			AND semester = '$semester'
			AND tahun_akademik = '$thn_akademik'
			")->row();
					$kum_usulan_baru = $q1->jml_keg * $kali;
					$perintah = "INSERT INTO usulan_dupaks (
				no,
				usulan_no,
				dupak_no,
				kum_usulan_baru,
				created_at,
				updated_at
			  )
			  VALUES
				(
				  '$no',
				  '$no_usulan',
				  '$dupak',
				  '$kum_usulan_baru',
				  '$tgl_create',
				  '$tgl_create'
				)";
					$this->db->query($perintah);
					$this->session->set_flashdata('flash', 'Ditambah');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				}
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				$this->session->set_flashdata('error', 'Gagal Menyimpan');
			}
		}
	}

	function hapus_a0017($no, $no_usulan, $berkas, $semester, $thn_akademik, $dupak, $kali)
	{
		unlink('assets/download_bidanga/' . $berkas);
		$q1 = $this->db->query("SELECT
				COUNT(dupak_no) as jml_keg
			  FROM
				`usulan_dupak_details`
			  WHERE `dupak_no` = '$dupak'
				AND `usulan_no` = '$no_usulan'
				AND semester = '$semester'
				AND tahun_akademik = '$thn_akademik'")->row();
		$kum_usulan_baru = $q1->jml_keg * $kali;
		$q_dupak2 = $this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
		$total_update = $q_dupak2->kum_usulan_baru - $kum_usulan_baru;
		$update = "update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
		$this->db->query($update);
		$hapus = "delete from usulan_dupak_details 
	where usulan_no='$no_usulan' 
	and semester='$semester' 
	and tahun_akademik='$thn_akademik' 
	and dupak_no='$dupak' 
	";
		$this->db->query($hapus);
		$cari = $this->db->query("SELECT * FROM usulan_dupak_details WHERE dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
		if ($cari > 0) {
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$hapus = "delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($hapus);
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		}
		redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		$this->session->set_flashdata('error', 'Gagal Menyimpan');
	}

	function hapus_a0004($no, $no_usulan, $berkas, $semester, $jabatan_no, $bukti_pengajaran = null)
	{
		$total_sks = 0;
		$query = $this->db->query("SELECT
									`no`,
									`uraian`,
									`semester`,
									`tahun_akademik`,
									`tahun_akademik` + 1 AS thn_akademik_baru,
									`tgl`,
									`satuan_hasil`,
									`sks`,
									`jumlah_volume`,
									(sks * jumlah_volume) AS total_sks,
									`kum_usulan`,
									`keterangan`,
									url,
									url_index,
									berkas
								FROM
									`usulan_dupak_details`
								WHERE usulan_no = '$no_usulan'
									AND dupak_no = 'A0004'
									AND semester = '$semester'")->result();
		foreach ($query as $q) {
			$total_sks += $q->total_sks;
		}

		$query1 = $this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='A0004' AND usulan_no='$no_usulan'")->row();

		if ($jabatan_no == '43' || $jabatan_no == '44' || $jabatan_no == '46' || $jabatan_no == '47' || $jabatan_no == '48' || $jabatan_no == '50' || $jabatan_no == '51') {
			if ($total_sks < 11) {
				$total_angka_kredit = $total_sks;
				$total_update = $query1->kum_usulan_baru - $total_angka_kredit;
			} elseif ($total_sks < 12) {
				$total_angka_kredit = (10 * 1) + (($total_sks - 10) * 0.5);
				$total_update = $query1->kum_usulan_baru - $total_angka_kredit;
			} else {
				$total_angka_kredit = 11;
				$total_update = $query1->kum_usulan_baru - $total_angka_kredit;
			}
		} elseif ($jabatan_no == '31' || $jabatan_no == '40' || $jabatan_no == '41') {
			if ($total_sks < 11) {
				$total_angka_kredit = $total_sks / 2;
				$total_update = $query1->kum_usulan_baru - $total_angka_kredit;
			} elseif ($total_sks < 12) {
				$total_angka_kredit = (10 * 0.5) + (($total_sks - 10) * 0.25);
				$total_update = $query1->kum_usulan_baru - $total_angka_kredit;
			} else {
				$total_angka_kredit = 5.5;
				$total_update = $query1->kum_usulan_baru - $total_angka_kredit;
			}
		}

		$this->db->query("UPDATE usulan_dupaks SET kum_usulan_baru ='$total_update' WHERE dupak_no='A0004' AND usulan_no='$no_usulan'");

		unlink('assets/download_bidanga/' . $berkas);
		unlink('assets/download_bidanga/' . $bukti_pengajaran);

		$hap = $this->db->query("DELETE FROM usulan_dupak_details WHERE usulan_no='$no_usulan' AND dupak_no='A0004' AND semester='$semester'");

		//jika pada tabel usulan_dupak_details sudah tidak terdapat data usulan
		$query_cari = $this->db->query("SELECT *FROM usulan_dupak_details WHERE usulan_no='$no_usulan' AND dupak_no='A0004'")->num_rows();

		if ($query_cari == 0) {
			$this->db->query("DELETE FROM usulan_dupaks WHERE usulan_no='$no_usulan' AND dupak_no='A0004'");
		}

		if ($hap) {
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/A0004/' . $no_usulan);
		} else {
			echo "gagal terhapus";
		}
	}

	function update_a0001($dupak, $kum)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$uraian = addslashes($this->input->post('uraian'));
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$jumlah_volume = $this->input->post('jumlah_volume');
		$keterangan = addslashes($this->input->post('keterangan'));
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '04' . $this->session->userdata('username');
		$file_path = './assets/download_bidanga/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$cari_udup = $this->db->query("select * from usulan_dupak_details where dupak_no='$dupak' and usulan_no='$no_usulan' and semester='$semester' and tahun_akademik='$thn_akademik'")->row();

		$this->load->library('upload', $config);
		$where = array('no' => $no_dupak);
		$data = array(
			'uraian' => $uraian,
			'semester' => $semester,
			'tahun_akademik' => $thn_akademik,
			'tgl' => $tgl,
			'satuan_hasil' => $satuan_hasil,
			'jumlah_volume' => $jumlah_volume,
			'keterangan' => $keterangan,
			'updated_at' => $tgl_update
		);
		$this->session->set_flashdata('flash', 'Diubah');
		$this->dupak->update_data($where, $data, 'usulan_dupak_details');
		redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
	}

	function update_a0003($dupak)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$no_usulan_dupak_details = $this->input->post('no_usulan_dupak_details');
		$uraian = addslashes($this->input->post('uraian'));
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$jumlah_volume = $this->input->post('jumlah_volume');
		$keterangan = addslashes($this->input->post('keterangan'));
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '04' . $this->session->userdata('username');
		// $dupak='A0001';
		// $kum='200';
		$file_path = './assets/download_bidanga/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$cari_udup = $this->db->query("select * from usulan_dupak_details where no='$no_usulan_dupak_details' and dupak_no='$dupak' and usulan_no='$no_usulan' and semester='$semester' and tahun_akademik='$thn_akademik'")->row();
		if ($cari_udup > 0) {
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('berkas')) {
				$where = array('no' => $no_usulan_dupak_details);
				$image = $this->upload->data();
				$data = array(
					'uraian' => $uraian,
					'semester' => $semester,
					'tahun_akademik' => $thn_akademik,
					'tgl' => $tgl,
					'satuan_hasil' => $satuan_hasil,
					'berkas' => $image['file_name'],
					'updated_at' => $tgl_update
				);
			} else {
				$where = array('no' => $no_usulan_dupak_details);
				$data = array(
					'uraian' => $uraian,
					'semester' => $semester,
					'tahun_akademik' => $thn_akademik,
					'tgl' => $tgl,
					'satuan_hasil' => $satuan_hasil,
					'updated_at' => $tgl_update
				);
			}
			unlink('assets/download_bidanga/' . $this->input->post('old_pict', TRUE));
			$this->session->set_flashdata('flash', 'Diubah');
			$this->dupak->update_data($where, $data, 'usulan_dupak_details');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {

			$this->session->set_flashdata('error', 'Tidak Dapat Diubah');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		}
	}
	function update_a0018($dupak)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$no_usulan_dupak_details = $this->input->post('no_usulan_dupak_details');
		$uraian = addslashes($this->input->post('uraian'));
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$jp = $this->input->post('jp');
		$url = $this->input->post('url');
		$isbn = $this->input->post('isbn');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$jumlah_volume = $this->input->post('jumlah_volume');
		$keterangan = addslashes($this->input->post('keterangan'));
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '04' . $this->session->userdata('username');
		// $dupak='A0001';
		// $kum='200';
		$file_path = './assets/download_bidanga/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$cari_udup = $this->db->query("select * from usulan_dupak_details where no='$no_usulan_dupak_details' and dupak_no='$dupak' and usulan_no='$no_usulan' and semester='$semester' and tahun_akademik='$thn_akademik'")->row();
		if ($cari_udup > 0) {
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('berkas')) {
				$where = array('no' => $no_usulan_dupak_details);
				$image = $this->upload->data();
				$data = array(
					'uraian' => $uraian,
					'tgl' => $tgl,
					'satuan_hasil' => $satuan_hasil,
					'url' => $url,
					'berkas' => $image['file_name'],
					'updated_at' => $tgl_update
				);
			} else {
				$where = array('no' => $no_usulan_dupak_details);
				$data = array(
					'uraian' => $uraian,
					'tgl' => $tgl,
					'satuan_hasil' => $satuan_hasil,
					'url' => $url,
					'updated_at' => $tgl_update
				);
			}
			unlink('assets/download_bidanga/' . $this->input->post('old_pict', TRUE));
			$this->session->set_flashdata('flash', 'Diubah');
			$this->dupak->update_data($where, $data, 'usulan_dupak_details');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {

			$this->session->set_flashdata('error', 'Tidak Dapat Diubah');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		}
	}
	function update_a0019($dupak)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$no_usulan_dupak_details = $this->input->post('no_usulan_dupak_details');
		$uraian = addslashes($this->input->post('uraian'));
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$jp = $this->input->post('jp');
		$url = $this->input->post('url');
		$isbn = $this->input->post('isbn');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$jumlah_volume = $this->input->post('jumlah_volume');
		$keterangan = addslashes($this->input->post('keterangan'));
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '04' . $this->session->userdata('username');
		// $dupak='A0001';
		// $kum='200';
		$file_path = './assets/download_bidanga/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$cari_udup = $this->db->query("select * from usulan_dupak_details where no='$no_usulan_dupak_details' and dupak_no='$dupak' and usulan_no='$no_usulan'  and tahun_akademik='$thn_akademik'")->row();

		if ($cari_udup > 0) {
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('berkas')) {
				$where = array('no' => $no_usulan_dupak_details);
				$image = $this->upload->data();
				$data = array(
					'uraian' => $uraian,
					'tgl' => $tgl,
					'satuan_hasil' => $satuan_hasil,
					'url' => $url,
					'isbn' => $isbn,
					'berkas' => $image['file_name'],
					'updated_at' => $tgl_update
				);
			} else {
				$where = array('no' => $no_usulan_dupak_details);
				$data = array(
					'uraian' => $uraian,
					'tgl' => $tgl,
					'satuan_hasil' => $satuan_hasil,
					'url' => $url,
					'isbn' => $isbn,
					'updated_at' => $tgl_update
				);
			}
			unlink('assets/download_bidanga/' . $this->input->post('old_pict', TRUE));
			$this->session->set_flashdata('flash', 'Diubah');
			$this->dupak->update_data($where, $data, 'usulan_dupak_details');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {

			$this->session->set_flashdata('error', 'Tidak Dapat Diubah');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		}
	}
	function hapus_a0005($id, $no_usulan, $berkas, $dupak, $kum)
	{
		unlink('assets/download_bidanga/' . $berkas);
		$where = array('no' => $id);
		$query_cari = $this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
		if ($query_cari == 1) {
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$hapus = "delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($hapus);
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$update = "update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$kum where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($update);
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		}
	}
	// function hapus_a0007($no,$no_usulan,$semester,$thn_akademik,$dupak,$kali)
	function hapus_a0007($no, $no_usulan, $semester, $thn_akademik, $dupak, $kali)
	{
		$query_x = $this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak' and no='$no'")->row();
		$berkas = $query_x->berkas;
		$bukti_kinerja = $query_x->bukti_kinerja;
		unlink('assets/download_bidanga/' . $berkas);
		unlink('assets/download_bidanga/' . $bukti_kinerja);
		$q1 = $this->db->query("SELECT
		COUNT(dupak_no) as jml_mhs
	  FROM
		`usulan_dupak_details`
	  WHERE `dupak_no` = '$dupak'
		AND `usulan_no` = '$no_usulan'
		AND semester = '$semester'
		AND tahun_akademik = '$thn_akademik'
		")->row();
		$kum_usulan_baru = $q1->jml_mhs * $kali;
		$q_dupak2 = $this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
		$total_update = $q_dupak2->kum_usulan_baru - $kum_usulan_baru;
		$update = "update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
		$this->db->query($update);
		$hapus = "delete from usulan_dupak_details 
		where usulan_no='$no_usulan' 
		and semester='$semester' 
		and tahun_akademik='$thn_akademik' 
		and dupak_no='$dupak' 
		";
		$this->db->query($hapus);
		$cari = $this->db->query("SELECT * FROM usulan_dupak_details WHERE dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
		if ($cari > 0) {
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$hapus = "delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($hapus);
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		}
		redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		$this->session->set_flashdata('error', 'Gagal Menyimpan');
	}


	function tambah_a0018($dupak, $kum)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$uraian = addslashes($this->input->post('uraian'));
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$keterangan = addslashes($this->input->post('keterangan'));
		$no_usulan_detail = $this->input->post('no_usulan_detail');
		$sks = $this->input->post('sks');
		$kum = $this->input->post('kum');
		$volum = $this->input->post('volum');
		$jp = $this->input->post('jp');
		$pk = $this->input->post('pk');
		$k = $this->input->post('k');

		$url = $this->input->post('url');
		$url_index = $this->input->post('url_index');

		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '04' . $this->session->userdata('username');
		$file_path = './assets/download_bidanga/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		$cari_udup = $this->db->query("select * from usulan_dupak_details where dupak_no='$dupak' and usulan_no='$no_usulan' and semester='$semester' and tahun_akademik='$thn_akademik'")->row();
		if ($cari_udup > 0) {
			$this->session->set_flashdata('error', 'Data Semester dan Tahun sudah ada, silakan hapus dulu data semester dan tahun yang sudah terinput.');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			if ($jp == 1) {
				$ak = $kum;
			} elseif ($jp > 1) {
				if ($pk == 1) {
					$ak = 0.6 * $kum;
				} else {
					$ak = (0.4 * $kum) / ($jp - 1);
				}
			}
			if ($this->upload->do_upload('berkas')) {
				$image = $this->upload->data();
				$perintah2 = "INSERT INTO usulan_dupak_details (
					no,
					usulan_no,
					url,
					url_index,
					dupak_no,
					uraian,
					semester,
					tahun_akademik,
					tgl,
					satuan_hasil,
					jumlah_volume,
					angka_kredit,
					keterangan,
					berkas,
					jml_penulis,
					penulis_ke,
					created_at,
					updated_at
				  )
				  VALUES
					(
					  '$no',
					  '$no_usulan',
					  '$url',
					  '$url_index',
					  '$dupak',
					  '$_POST[uraian]',
					  '$_POST[semester]',
					  '$_POST[thn_akademik]',
					  '$_POST[tgl]',
					  '$_POST[satuan_hasil]',
					  '$volum',
					  '$ak',
					  '$_POST[keterangan]',
					  '$image[file_name]',
					  '$jp',
					  '$pk',
					  '$tgl_create',
					  '$tgl_create'
					)";
				$this->db->query($perintah2);
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
			}
			$q_dupak = $this->db->query("select *from usulan_dupaks where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
			if ($q_dupak > 0) {
				$q1 = $this->db->query("SELECT
				no,
				`uraian`,
				`semester`,
				`tahun_akademik`,
				`tahun_akademik`+1 AS thn_akademik_baru,
				`tgl`,
				`satuan_hasil`,
				angka_kredit,
				`kum_usulan`,
				`keterangan`,
				url,
				url_index,
				berkas
			  FROM
			   `usulan_dupak_details`
			  WHERE usulan_no = '$no_usulan'
				AND `dupak_no` = '$dupak'
				
				AND semester='$semester'
				AND tahun_akademik='$thn_akademik'");
				foreach ($q1->result() as $row) {
					$angka_kredit += $row->angka_kredit;
				}
				$total_update = $q_dupak->kum_usulan_baru + $angka_kredit;
				$update = "update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
				$this->db->query($update);
			} else {
				$q2 = $this->db->query("SELECT
				no,
				uraian,
				semester,
				tahun_akademik,
				tahun_akademik+1 AS thn_akademik_baru,
				tgl,
				satuan_hasil,
				angka_kredit,
				kum_usulan,
				keterangan,
				url,
				url_index,
				berkas
				FROM
			   usulan_dupak_details
			  WHERE usulan_no = '$no_usulan'
				AND dupak_no = '$dupak'
				AND kunci = '0' ");
				foreach ($q2->result() as $row2) {
					$angka_kredit += $row2->angka_kredit;
				}
				$total_update = $q_dupak->kum_usulan_baru + $angka_kredit;
				$perintah = "INSERT INTO usulan_dupaks (
					no,
					usulan_no,
					dupak_no,
					kum_usulan_baru,
					created_at,
					updated_at
				  )
				  VALUES
					(
					  '$no',
					  '$no_usulan',
					  '$dupak',
					  '$ak',
					  '$tgl_create',
					  '$tgl_create'
					)";
				$this->db->query($perintah);
			}
			if ($perintah2) {
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
			} else {
				$this->session->set_flashdata('error', 'Gagal Menyimpan');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
			}
		}
	}

	function hapus_a0018($id, $no_usulan, $berkas, $dupak, $kum)
	{
		unlink('assets/download_bidanga/' . $berkas);
		$where = array('no' => $id);
		$query_cari = $this->db->query("select * from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
		if ($query_cari == 1) {
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$hapus = "delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($hapus);
			$this->session->set_flashdata('flash', 'Dihapus');

			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$q_cari = $this->db->query("select *from usulan_dupak_details where no='$id'")->row();
			$ak = $q_cari->angka_kredit;
			$update = "update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$ak where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($update);
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function tambah_a0019($dupak, $kum)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$uraian = addslashes($this->input->post('uraian'));
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$keterangan = addslashes($this->input->post('keterangan'));
		$no_usulan_detail = $this->input->post('no_usulan_detail');
		$sks = $this->input->post('sks');
		$kum = $this->input->post('kum');
		$volum = $this->input->post('volum');
		$jp = $this->input->post('jp');
		$pk = $this->input->post('pk');
		if ($pk > $jp) {
			$this->session->set_flashdata('error', 'Posisi Anda sebgai penulis melebihi jumlah penulis !!!');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$tgl_create = date("y-m-d H:i:s");
			$tgl_update = date("y-m-d H:i:s");
			$no = date("ymdHis") . '04' . $this->session->userdata('username');
			$file_path = './assets/download_bidanga/';
			mkdir($file_path, 0777, true);
			$config['upload_path'] = $file_path;
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '5048';
			$config['file_name'] = 'File' . date("ymdHis") . $no;
			$this->load->library('upload', $config);
			$cari_udup = $this->db->query("select * from usulan_dupak_details where dupak_no='$dupak' and usulan_no='$no_usulan' and tahun_akademik='$thn_akademik'")->row();
			if ($cari_udup > 0) {
				$this->session->set_flashdata('error', 'Data Tahun sudah ada, silakan hapus dulu data tahun yang sudah terinput.');
				redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
			} else {
				if ($jp == 1) {
					$ak = $kum;
				} elseif ($jp > 1) {
					if ($pk == 1) {
						$ak = 0.6 * $kum;
					} else {
						$ak = (0.4 * $kum) / ($jp - 1);
					}
				}
				if ($this->upload->do_upload('berkas')) {
					$image = $this->upload->data();
					$perintah2 = "INSERT INTO usulan_dupak_details (
					no,
					usulan_no,
					dupak_no,
					uraian,
					tahun_akademik,
					tgl,
					satuan_hasil,
					jumlah_volume,
					angka_kredit,
					keterangan,
					berkas,
					jml_penulis,
					penulis_ke,
					created_at,
					updated_at,
					url,
					isbn
				  )
				  VALUES
					(
					  '$no',
					  '$no_usulan',
					  '$dupak',
					  '$_POST[uraian]',
					  '$_POST[thn_akademik]',
					  '$_POST[tgl]',
					  '$_POST[satuan_hasil]',
					  '$volum',
					  '$ak',
					  '$_POST[keterangan]',
					  '$image[file_name]',
					  '$jp',
					  '$pk',
					  '$tgl_create',
					  '$tgl_create',
					  '$_POST[url]',
					  '$_POST[isbn]'
					)";
					$this->db->query($perintah2);
				} else {
					$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				}
				$q_dupak = $this->db->query("select *from usulan_dupaks where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
				if ($q_dupak > 0) {
					$q1 = $this->db->query("SELECT
		no,
		`uraian`,
		`tahun_akademik`,
		`tahun_akademik`+1 AS thn_akademik_baru,
		`tgl`,
		`satuan_hasil`,
		angka_kredit,
		`kum_usulan`,
		`keterangan`,
		url,
		url_index,
		berkas,
		url,
		isbn
	  FROM
	   `usulan_dupak_details`
	  WHERE usulan_no = '$no_usulan'
		AND `dupak_no` = '$dupak'
		
		AND tahun_akademik='$thn_akademik'");
					foreach ($q1->result() as $row) {
						$angka_kredit += $row->angka_kredit;
					}
					$total_update = $q_dupak->kum_usulan_baru + $angka_kredit;
					$update = "update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
					$this->db->query($update);
				} else {
					$q2 = $this->db->query("SELECT
		no,
		uraian,
		tahun_akademik,
		tahun_akademik+1 AS thn_akademik_baru,
		tgl,
		satuan_hasil,
		angka_kredit,
		kum_usulan,
		keterangan,
		url,
		url_index,
		berkas,
		url,
		isbn
		FROM
	   usulan_dupak_details
	  WHERE usulan_no = '$no_usulan'
		AND dupak_no = '$dupak'
		AND kunci = '0' ");
					foreach ($q2->result() as $row2) {
						$angka_kredit += $row2->angka_kredit;
					}
					$total_update = $q_dupak->kum_usulan_baru + $angka_kredit;
					$perintah = "INSERT INTO usulan_dupaks (
			no,
			usulan_no,
			dupak_no,
			kum_usulan_baru,
			created_at,
			updated_at
		  )
		  VALUES
			(
			  '$no',
			  '$no_usulan',
			  '$dupak',
			  '$ak',
			  '$tgl_create',
			  '$tgl_create'
			)";
					$this->db->query($perintah);
				}
				if ($perintah2) {
					$this->session->set_flashdata('flash', 'Ditambah');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				} else {
					$this->session->set_flashdata('error', 'Gagal Menyimpan');
					redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
				}
			}
		}
	}
	function upload_file($dupak)
	{
		$jenis = $this->input->post('jenis');
		$no_usulan = $this->input->post('no_usulan');
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '04' . $this->session->userdata('username');
		$pecah = explode(',', $jenis);
		$nm_jenis = $pecah[0];
		$usulan_detail = $pecah[1];
		//var_dump($nm_jenis,$usulan_detail);
		$file_path = './assets/download_bidanga/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('berkas')) {
			$image = $this->upload->data();
			$update = "update usulan_dupak_details set $nm_jenis = '$image[file_name]',updated_at='$tgl_update' where  usulan_no='$no_usulan' and no='$usulan_detail'";
			$this->db->query($update);
			// var_dump($update);
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
			redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
		}
	}
	function hapus_berkas($berkas, $no_usulan, $jenis, $dupak)
	{
		unlink('assets/download_bidanga/' . $berkas);
		$tgl_update = date("y-m-d H:i:s");
		$update = "update usulan_dupak_details set $jenis =null,updated_at='$tgl_update'  where  usulan_no='$no_usulan' and $jenis ='$berkas'";
		$this->db->query($update);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
	}
	function hapus_ijazah($id, $no_usulan, $dupak)
	{
		$where = array('no' => $id);
		$this->dupak->delete_data($where, 'usulan_dupak_details');
		$this->dupak->delete_data($where, 'usulan_dupaks');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
	}
	function download_bidanga($id)
	{
		// force_download('assets/download_bidanga/'.$id,NULL);
		// echo '<a href="'.base_url().'usulan/usulan_dupak/buka/'.$id.'" id="autoKlik" target="_blank">Loading...</a>';
		// 	echo '<form name="form1"  action="'.base_url().'usulan/usulan_dupak/buka/" target="_blank" method="post">
		// 	<input type="submit" name="Submit" value="Jawab">
		// 	<input type="hidden" name="id" value="'.$id.'">
		// 	';
		// 	echo '
		// <script>
		// setTimeout("document.form1.submit();",0 ); 
		// 		 </script>

		// 	';
		// echo "'".base_url()."assets/download_bidanga/"'.$id";
		echo '<iframe src="' . base_url() . 'assets/download_bidanga/' . $id . '" width="100%" height="900" style="border: none;"></iframe>';
	}
	// public function buka()
	// {
	// 	$id = $this->input->post('id');
	// 	echo '<iframe src="'.base_url().'assets/download_bidanga/'.$id.'" width="100%" height="900" style="border: none;"></iframe>';
	// }



}
