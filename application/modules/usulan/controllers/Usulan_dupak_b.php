<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Usulan_dupak_b extends MX_Controller
{


	function __construct()
	{
		$this->load->model('draft');
		$this->load->model('dupak');
		$this->load->helper(array('url', 'download', 'date_helper'));
		$this->load->library('form_validation');
	}

	function __destruct()
	{
	}

	function dupak($no, $id)
	{
		$B0001['no'] = $id;
		$q_dupak = $this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='$no' and usulan_no='$id'")->row();
		$q_usulan = $this->db->query("SELECT jabatan_usulan_no FROM usulans WHERE no='$id'")->row();
		$q1 = $this->db->query("SELECT
							  usulan_no,
							  NO,
							  `uraian`,
							  `semester`,
							  `tahun_akademik`,
							  `tahun_akademik` + 1 AS thn_akademik_baru,
							  `tgl`,
							  `satuan_hasil`,
							  `jumlah_volume`,
							  (sks * jumlah_volume) AS total_sks,
							  `kum_usulan`,
							  `keterangan`,
							  url,
							  url_index,
							  berkas,
							  kum_penilai,
							  kum_penilai_keterangan
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'
							  ")->row();
		$q2 = $this->db->query("SELECT
							  usulan_no,
							  NO,
							  `uraian`,
							  `semester`,
							  `tahun_akademik`,
							  `tahun_akademik` + 1 AS thn_akademik_baru,
							  `tgl`,
							  `satuan_hasil`,
							  sks,
							  `jumlah_volume`,
							  (sks * jumlah_volume) AS total_sks,
							  `kum_usulan`,
							  `keterangan`,
							  url,
							  url_index,
							  berkas,
							  kum_penilai,
							  kum_penilai_keterangan
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'
							  ");
		$q3 = $this->db->query("SELECT
							  usulan_no,
							  no,
							  dupak_no,
							  `uraian`,
							  `semester`,
							  `tahun_akademik`,
							  `tahun_akademik` + 1 AS thn_akademik_baru,
							  `tgl`,
							  satuan_hasil,
							  `keterangan`,
							  berkas,
							  jml_penulis,
							  penulis_ke,
							  angka_kredit,
							  ak_peer_dosen,
							  koresponden,
							  url,
							  url_index,
							  url_peer,
							  url_web,
							  url_review,
							  pertama_sbg_koresponden,
							  isbn,
							  kum_penilai,
							  kum_penilai_keterangan,
							  syarat
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'");


		$cari_jab = $this->db->query("SELECT
								  a.`no`,
								  a.`dosen_no`,
								  a.usulan_status_id,
								  a.jabatan_usulan_no,
								  b.`nidn`,
								  b.`nama`,
								  b.`jabatan_no`,
								  b.`jabatan_tgl`,
								  b.`jenjang_id`,
								  b.`pengangkatan_tgl`
								FROM
								  usulans AS a,
								  dosens AS b
								WHERE a.`dosen_no` = b.`no`
								  AND a.`no` = '$id'")->row();

		$B0001['jabatan_no'] = $cari_jab->jabatan_no;
		$B0001['jabatan_tgl'] = $cari_jab->jabatan_tgl;
		$B0001['pengangkatan_tgl'] = $cari_jab->pengangkatan_tgl;
		$B0001['dosen_no'] = $cari_jab->dosen_no;
		$B0001['usulan_status_id'] = $cari_jab->usulan_status_id;
		$B0001['jabatan_usulan_no'] = $cari_jab->jabatan_usulan_no;
		$B0001['role'] = $this->session->userdata('role');
		$B0001['q_dupak'] = $q_dupak;
		$B0001['dupak_no'] = $no;
		$B0001['q1'] = $q1;
		$B0001['q2'] = $q2;
		$B0001['q3'] = $q3;
		$B0001['usulan'] = $q_usulan;

		if ($no == 'B0001') {
			vusulan('bidang_b/B0001', $B0001);
		} elseif ($no == 'B0002') {
			vusulan('bidang_b/B0002', $B0001);
		} elseif ($no == 'B0003') {
			vusulan('bidang_b/B0003', $B0001);
		} elseif ($no == 'B0004') {
			vusulan('bidang_b/B0004', $B0001);
		} elseif ($no == 'B0005') {
			vusulan('bidang_b/B0005', $B0001);
		} elseif ($no == 'B0006') {
			vusulan('bidang_b/B0006', $B0001);
		} elseif ($no == 'B0007') {
			vusulan('bidang_b/B0007', $B0001);
		} elseif ($no == 'B0008') {
			vusulan('bidang_b/B0008', $B0001);
		} elseif ($no == 'B0009') {
			vusulan('bidang_b/B0009', $B0001);
		} elseif ($no == 'B0010') {
			vusulan('bidang_b/B0010', $B0001);
		} elseif ($no == 'B0011') {
			vusulan('bidang_b/B0011', $B0001);
		} elseif ($no == 'B0012') {
			vusulan('bidang_b/B0012', $B0001);
		} elseif ($no == 'B0013') {
			vusulan('bidang_b/B0013', $B0001);
		} elseif ($no == 'B0014') {
			vusulan('bidang_b/B0014', $B0001);
		} elseif ($no == 'B0015') {
			vusulan('bidang_b/B0015', $B0001);
		} elseif ($no == 'B0016') {
			vusulan('bidang_b/B0016', $B0001);
		} elseif ($no == 'B0017') {
			vusulan('bidang_b/B0017', $B0001);
		} elseif ($no == 'B0018') {
			vusulan('bidang_b/B0018', $B0001);
		} elseif ($no == 'B0019') {
			vusulan('bidang_b/B0019', $B0001);
		} elseif ($no == 'B0020') {
			vusulan('bidang_b/B0020', $B0001);
		} elseif ($no == 'B0021') {
			vusulan('bidang_b/B0021', $B0001);
		} elseif ($no == 'B0022') {
			vusulan('bidang_b/B0022', $B0001);
		} elseif ($no == 'B0023') {
			vusulan('bidang_b/B0023', $B0001);
		} elseif ($no == 'B0024') {
			vusulan('bidang_b/B0024', $B0001);
		} elseif ($no == 'B0025') {
			vusulan('bidang_b/B0025', $B0001);
		} elseif ($no == 'B0026') {
			vusulan('bidang_b/B0026', $B0001);
		} elseif ($no == 'B0027') {
			vusulan('bidang_b/B0027', $B0001);
		} elseif ($no == 'B0028') {
			vusulan('bidang_b/B0028', $B0001);
		} elseif ($no == 'B0029') {
			vusulan('bidang_b/B0029', $B0001);
		} elseif ($no == 'B0030') {
			vusulan('bidang_b/B0030', $B0001);
		} elseif ($no == 'B0031') {
			vusulan('bidang_b/B0031', $B0001);
		} elseif ($no == 'B0032') {
			vusulan('bidang_b/B0032', $B0001);
		} elseif ($no == 'B0033') {
			vusulan('bidang_b/B0033', $B0001);
		} elseif ($no == 'B0034') {
			vusulan('bidang_b/B0034', $B0001);
		} elseif ($no == 'B0035') {
			vusulan('bidang_b/B0035', $B0001);
		} elseif ($no == 'B0036') {
			vusulan('bidang_b/B0036', $B0001);
		} elseif ($no == 'B0037') {
			vusulan('bidang_b/B0037', $B0001);
		} elseif ($no == 'B0038') {
			vusulan('bidang_b/B0038', $B0001);
		} elseif ($no == 'B0039') {
			vusulan('bidang_b/B0039', $B0001);
		} elseif ($no == 'B0040') {
			vusulan('bidang_b/B0040', $B0001);
		}
	}

	function update_peer($dupak)
	{
		$no_dupak_details = $this->input->post('no');
		$no_usulan = $this->input->post('no_usulan');
		$ak_validasi = $this->input->post('ak_validasi');
		$kum = $this->input->post('kum');


		//update keterangan dan kum penilai di table usulan_dupak_details
		$index = 0; // Set index array awal dengan 0
		foreach ($no_dupak_details as $no) {
			$perintah = "UPDATE
				  usulan_dupak_details
				SET
				  angka_kredit = '" . $ak_validasi[$index] . "'
				WHERE no = '$no'";
			$index++;
			$this->db->query($perintah);
		}

		//cari kum_penilai dan hitung totalnya
		$cari_nilai_ak = $this->db->query("SELECT
					angka_kredit
				  FROM
				   `usulan_dupak_details`
				  WHERE usulan_no = '$no_usulan'
					AND `dupak_no` = '$dupak'");
		foreach ($cari_nilai_ak->result() as $row) {
			$ak += $row->angka_kredit;
		}

		//update kum penilai baru di table usulan_dupaks
		$perintah2 = "UPDATE
				  `usulan_dupaks`
				SET
				  `kum_usulan_baru` = '$ak'
				WHERE `usulan_no` = '$no_usulan'
				AND `dupak_no`='$dupak'";
		$this->db->query($perintah2);

		$this->session->set_flashdata('flash', 'Diupdate');
		redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
	}

	function tambah_B0001($dupak, $kum)
	{
		$no_dupak 			= $this->input->post('no_dupak');
		$no_usulan 			= $this->input->post('no_usulan');
		$no_usulan_detail 	= $this->input->post('no_usulan_detail');

		$uraian 			= addslashes($this->input->post('uraian'));
		$satuan_hasil 		= addslashes($this->input->post('satuan_hasil'));
		$keterangan 		= addslashes($this->input->post('keterangan'));
		$url 				= addslashes($this->input->post('url'));
		$url_peer 			= addslashes($this->input->post('url_peer'));
		$isbn 				= addslashes($this->input->post('isbn'));

		$thn_akademik 		= $this->input->post('thn_akademik');
		$tgl 				= $this->input->post('tgl');
		$sks 				= $this->input->post('sks');
		$kum 				= $this->input->post('kum');
		$volum 				= $this->input->post('volum');
		$jp 				= $this->input->post('jp');
		$pk 				= $this->input->post('pk');
		$np 				= $this->input->post('np');

		// jika terdapat judul yang sama 
		$cjudul 	= $this->db->query("SELECT uraian FROM usulan_dupak_details WHERE usulan_no='$no_usulan' AND uraian='$uraian' AND LEFT (`dupak_no`, 1) = 'B'")->num_rows();

		if ($cjudul > "0") {
			$this->session->set_flashdata('error', 'Judul yang Anda input sudah terdapat pada bidang B');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		if ($pk > $jp) {
			$this->session->set_flashdata('error', 'Posisi Anda sebgai penulis melebihi jumlah penulis !!!');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			if ($np > $kum) {
				$this->session->set_flashdata('error', 'Nilai Peer Review tidak boleh melebihi nilai kum maksimal !!!');
				redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			} else {
				$this->form_validation->set_rules('np', 'Nilai Peer Review', 'required|numeric');
				if ($this->form_validation->run() != false) {
					$tgl_create = date("y-m-d H:i:s");
					$tgl_update = date("y-m-d H:i:s");
					$no = date("ymdHis") . '05' . $this->session->userdata('username');
					$file_path = './assets/download_bidangb/';
					mkdir($file_path, 0777, true);
					$config['upload_path'] = $file_path;
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '5048';
					$config['file_name'] = 'File' . date("ymdHis") . $no;
					$this->load->library('upload', $config);
					$cari_udup = $this->db->query("select * from usulan_dupak_details where dupak_no='$dupak' and usulan_no='$no_usulan' and tahun_akademik='$thn_akademik'")->row();
					if ($cari_udup > 0) {
						$this->session->set_flashdata('error', 'Data Tahun sudah ada, silakan hapus dulu data tahun yang sudah terinput.');
						redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
					} else {
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
							ak_peer_dosen,
							keterangan,
							berkas,
							jml_penulis,
							penulis_ke,
							created_at,
							updated_at,
							url,
							url_peer,
							isbn
						  )
						  VALUES
							(
							  '$no',
							  '$no_usulan',
							  '$dupak',
							  '$uraian',
							  '$_POST[thn_akademik]',
							  '$_POST[tgl]',
							  '$satuan_hasil',
							  '$volum',
							  '$np',
							  '$np',
							  '$keterangan',
							  '$image[file_name]',
							  '$jp',
							  '$pk',
							  '$tgl_create',
							  '$tgl_create',
							  '$url',
							  '$url_peer',
							  '$isbn'
							)";
							$this->db->query($perintah2);
						} else {
							$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
							redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
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
						  '$np',
						  '$tgl_create',
						  '$tgl_create'
						)";
							$this->db->query($perintah);
						}
						if ($perintah2) {
							$this->session->set_flashdata('flash', 'Ditambah');
							redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
						} else {
							$this->session->set_flashdata('error', 'Gagal Menyimpan');
							redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
						}
					}
				} else {
					$this->session->set_flashdata('error', 'Format Nilai Peer Review bukan angka !!!');
					redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
				}
			}
		}
	}

	function tambah_B0040($dupak, $no_usulan)
	{
		$ak = $this->input->post('ak');
		$kum = $ak * 0.4;
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '05' . $this->session->userdata('username');

		$this->form_validation->set_rules('ak', 'angka_kredit', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Format angka kredit harus angka !!!');
			redirect(base_url() . 'usulan/usulan/bidangB/' . $no_usulan);
		} else {
			$cek = $this->db->query("SELECT no FROM usulan_dupak_details WHERE dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
			if ($cek->no > 0) {
				$update = "update usulan_dupak_details set angka_kredit ='$kum' where dupak_no='$dupak' and usulan_no='$no_usulan'";
				$this->db->query($update);

				$update2 = "update usulan_dupaks set kum_usulan_baru ='$kum' where dupak_no='$dupak' and usulan_no='$no_usulan'";
				$this->db->query($update2);

				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan/bidangB/' . $no_usulan);
			} else {
				$in = "INSERT INTO usulan_dupak_details (
					no,
					usulan_no,
					dupak_no,
					angka_kredit,
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
				$this->db->query($in);

				$in2 = "INSERT INTO usulan_dupaks (
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
				$this->db->query($in2);

				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan/bidangB/' . $no_usulan);
			}
		}
	}

	function tambah_B0011($dupak, $kum)
	{
		$no_usulan 			= $this->input->post('no_usulan');
		$maks_bid_b_5 		= $this->input->post('maks_bid_b_5');
		$r_akb 				= $this->input->post('r_akb');
		$syarat 			= $this->input->post('syarat');

		$uraian 			= addslashes($this->input->post('uraian'));
		$satuan_hasil 		= addslashes($this->input->post('satuan_hasil'));
		$keterangan 		= addslashes($this->input->post('keterangan'));
		$url 				= addslashes($this->input->post('url'));
		$url_review 		= addslashes($this->input->post('url_review'));
		$url_index 			= addslashes($this->input->post('url_index'));
		$url_web 			= addslashes($this->input->post('url_web'));
		$url_peer 			= addslashes($this->input->post('url_peer'));
		$isbn 				= addslashes($this->input->post('isbn'));

		$semester 			= $this->input->post('semester');
		$thn_akademik 		= $this->input->post('thn_akademik');
		$kum 				= $this->input->post('kum');
		$volum 				= $this->input->post('volum');
		$jp 				= $this->input->post('jp');
		$pk 				= $this->input->post('pk');
		$k 					= $this->input->post('k');
		$np 				= $this->input->post('np');

		$total_b 			= $r_akb + $np;

		// jika terdapat judul yang sama 
		$cjudul 	= $this->db->query("SELECT uraian FROM usulan_dupak_details WHERE usulan_no='$no_usulan' AND uraian='$uraian' AND LEFT (`dupak_no`, 1) = 'B'")->num_rows();

		if ($cjudul > "0") {
			$this->session->set_flashdata('error', 'Judul yang Anda input sudah terdapat pada bidang B');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		if ($pk > $jp) {
			$this->session->set_flashdata('error', 'Posisi Anda sebagai penulis melebihi jumlah penulis !!!');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			if ($np > $kum) {
				$this->session->set_flashdata('error', 'Nilai Angka Kredit tidak boleh melebihi nilai kum maksimal !!!');
				redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			} else {
				$this->form_validation->set_rules('np', 'Nilai Angka Kredit', 'required|numeric');
				if ($this->form_validation->run() != false) {
					$tgl_create = date("y-m-d H:i:s");
					$tgl_update = date("y-m-d H:i:s");
					$no = date("ymdHis") . '05' . $this->session->userdata('username');
					$file_path = './assets/download_bidangb/';
					mkdir($file_path, 0777, true);
					$config['upload_path'] = $file_path;
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '5048';
					$config['file_name'] = 'File' . date("ymdHis") . $no;
					$this->load->library('upload', $config);

					//jika usulan kenaikan reguler (L-LK atau LK-GB) 
					// mencari perbandingan jabatan awal dengan usulan 
					$cj	= $this->db->query("SELECT
												a.`jabatan_no` AS kd_jab_awal,
												d.`nama_jabatans` AS nm_jab_awal,
												c.`kode` AS kd_jab_usul,
												c.`nama_jabatans` AS nm_jab_usul
											FROM
												`usulans` a
												JOIN `jabatan_jenjangs` b
												ON a.`jabatan_usulan_no` = b.`no`
												JOIN `jabatans` c
												ON b.`jabatan_kode` = c.`kode`
												JOIN `jabatans` d
												ON a.`jabatan_no` = d.`kode`
											WHERE a.`no` = '$no_usulan'")->row();

					if ($dupak == 'B0011' && ($total_b > $maks_bid_b_5) && ($cj->nm_jab_awal <> $cj->nm_jab_usul)) {
						$this->session->set_flashdata('error', 'Nilai total angka kredit Anda sudah melebihi 5% dari angka kredit yang dibutuhkan pada bidang penelitian. Silakan masukkan nilai Angka Kredit yang lebih kecil');
						redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
						exit();
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
												ak_peer_dosen,
												keterangan,
												berkas,
												jml_penulis,
												penulis_ke,
												koresponden,
												url,
												url_index,
												url_peer,
												url_web,
												isbn,
												url_review,
												syarat,
												created_at,
												updated_at
											)
											VALUES
												(
												'$no',
												'$no_usulan',
												'$dupak',
												'$uraian',
												'$_POST[semester]',
												'$_POST[thn_akademik]',
												'$_POST[tgl]',
												'$satuan_hasil',
												'$volum',
												'$np',
												'$np',
												'$keterangan',
												'$image[file_name]',
												'$jp',
												'$pk',
												'$k',
												'$url',
												'$url_index',
												'$url_peer',
												'$url_web',
												'$isbn',
												'$url_review',
												'$syarat',
												'$tgl_create',
												'$tgl_create'
												)";
							$this->db->query($perintah2);
						} else {
							$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
							redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
						}

						$q_dupak = $this->db->query("select *from usulan_dupaks where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
						if ($q_dupak > 0) {
							$total_update = 0;
							$q1 = $this->db->query("SELECT
											angka_kredit
										  FROM
										   `usulan_dupak_details`
										  WHERE usulan_no = '$no_usulan'
											AND `dupak_no` = '$dupak'
											AND semester='$semester'
											AND tahun_akademik='$thn_akademik'");
							foreach ($q1->result() as $row) {
								$angka_kredit = 0;
								$angka_kredit += $row->angka_kredit;
							}
							$total_update = $q_dupak->kum_usulan_baru + $angka_kredit;
							$update = "update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
							$this->db->query($update);
						} else {
							$total_update = 0;
							$q2 = $this->db->query("SELECT
											angka_kredit
										  FROM
										   usulan_dupak_details
										  WHERE usulan_no = '$no_usulan'
											AND dupak_no = '$dupak'");
							foreach ($q2->result() as $row2) {
								$angka_kredit = 0;
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
									  '$np',
									  '$tgl_create',
									  '$tgl_create')";
							$this->db->query($perintah);
						}

						$this->session->set_flashdata('flash', 'Ditambah');
						redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
					}
				} else {
					$this->session->set_flashdata('error', 'Format Nilai Peer Review bukan angka !!!');
					redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
				}
			}
		}
	}

	function tambah_B0005($dupak, $kum)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$uraian = $this->input->post('uraian');
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$keterangan = $this->input->post('keterangan');
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
		$no = date("ymdHis") . '05' . $this->session->userdata('username');
		$file_path = './assets/download_bidangb/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);

		if ($jp == 1) {
			$ak = $kum;
		} elseif ($jp > 1) {
			if ($pk == 1) {
				$ak = 0.6 * $kum;
			} else {
				$ak = (0.4 * $kum) / ($jp - 1);
			}
		}

		// jika terdapat judul yang sama 
		$cjudul 	= $this->db->query("SELECT uraian FROM usulan_dupak_details WHERE usulan_no='$no_usulan' AND uraian='$uraian' AND LEFT (`dupak_no`, 1) = 'B'")->num_rows();

		if ($cjudul > "0") {
			$this->session->set_flashdata('error', 'Judul yang Anda input sudah terdapat pada bidang B');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		if ($this->upload->do_upload('berkas')) {
			$image = $this->upload->data();
			$perintah2 = "INSERT INTO usulan_dupak_details (
					no,
					usulan_no,
					url,
					url_web,
					url_peer,
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
					  '$_POST[url_web]',
					  '$_POST[url_peer]',
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
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
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
				$angka_kredit = 0;
				$angka_kredit += $row->angka_kredit;
			}
			$total_update = 0;
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
				$angka_kredit = 0;
				$angka_kredit += $row2->angka_kredit;
			}
			$total_update = 0;
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
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$this->session->set_flashdata('error', 'Gagal Menyimpan');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function tambah_B0035($dupak, $kum)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$uraian = $this->input->post('uraian');
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$keterangan = $this->input->post('keterangan');
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
		$no = date("ymdHis") . '05' . $this->session->userdata('username');
		$file_path = './assets/download_bidangb/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);

		if ($jp == 1) {
			$ak = $kum;
		} elseif ($jp > 1) {
			if ($pk == 1) {
				$ak = 0.6 * $kum;
			} else {
				$ak = (0.4 * $kum) / ($jp - 1);
			}
		}

		// jika terdapat judul yang sama 
		$cjudul 	= $this->db->query("SELECT uraian FROM usulan_dupak_details WHERE usulan_no='$no_usulan' AND uraian='$uraian' AND LEFT (`dupak_no`, 1) = 'B'")->num_rows();

		if ($cjudul > "0") {
			$this->session->set_flashdata('error', 'Judul yang Anda input sudah terdapat pada bidang B');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		if ($this->upload->do_upload('berkas')) {
			$image = $this->upload->data();
			$perintah2 = "INSERT INTO usulan_dupak_details (
					no,
					usulan_no,
					url,
					url_web,
					url_peer,
					url_index,
					url_review,
					isbn,
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
					  '$_POST[url_web]',
					  '$_POST[url_peer]',
					  '$_POST[url_index]',
					  '$_POST[url_review]',
					  '$_POST[isbn]',
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
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
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
				$angka_kredit = 0;
				$angka_kredit += $row->angka_kredit;
			}
			$total_update = 0;
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
				$angka_kredit = 0;
				$angka_kredit += $row2->angka_kredit;
			}
			$total_update = 0;
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
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$this->session->set_flashdata('error', 'Gagal Menyimpan');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function tambah_B0033($dupak, $kum)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$uraian = $this->input->post('uraian');
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$keterangan = $this->input->post('keterangan');
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
		$no = date("ymdHis") . '05' . $this->session->userdata('username');
		$file_path = './assets/download_bidangb/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);

		if ($jp == 1) {
			$ak = $kum;
		} elseif ($jp > 1) {
			if ($pk == 1) {
				$ak = 0.6 * $kum;
			} else {
				$ak = (0.4 * $kum) / ($jp - 1);
			}
		}

		// jika terdapat judul yang sama 
		$cjudul 	= $this->db->query("SELECT uraian FROM usulan_dupak_details WHERE usulan_no='$no_usulan' AND uraian='$uraian' AND LEFT (`dupak_no`, 1) = 'B'")->num_rows();

		if ($cjudul > "0") {
			$this->session->set_flashdata('error', 'Judul yang Anda input sudah terdapat pada bidang B');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		if ($this->upload->do_upload('berkas')) {
			$image = $this->upload->data();
			$perintah2 = "INSERT INTO usulan_dupak_details (
					no,
					usulan_no,
					url,
					url_web,
					url_peer,
					isbn,
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
					  '$_POST[url_web]',
					  '$_POST[url_peer]',
					  '$_POST[isbn]',
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
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
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
				$angka_kredit = 0;
				$angka_kredit += $row->angka_kredit;
			}
			$total_update = 0;
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
				$angka_kredit = 0;
				$angka_kredit += $row2->angka_kredit;
			}
			$total_update = 0;
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
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$this->session->set_flashdata('error', 'Gagal Menyimpan');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function update_b0001($dupak)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$no_usulan_dupak_details = $this->input->post('no_usulan_dupak_details');

		$uraian = addslashes($this->input->post('uraian'));
		$satuan_hasil = addslashes($this->input->post('satuan_hasil'));
		$keterangan = addslashes($this->input->post('keterangan'));
		$url = addslashes($this->input->post('url'));
		$url_peer = addslashes($this->input->post('url_peer'));
		$isbn = addslashes($this->input->post('isbn'));

		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$jp = $this->input->post('jp');
		$pk = $this->input->post('pk');
		$np = $this->input->post('np');
		$kum = $this->input->post('kum');
		$tgl = $this->input->post('tgl');
		$jumlah_volume = $this->input->post('jumlah_volume');
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '05' . $this->session->userdata('username');
		$file_path = './assets/download_bidangb/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;

		if ($pk > $jp) {
			$this->session->set_flashdata('error', 'Posisi Anda sebgai penulis melebihi jumlah penulis !!!');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			if ($np > $kum) {
				$this->session->set_flashdata('error', 'Nilai Peer Review tidak boleh melebihi nilai kum maksimal !!!');
				redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			} else {
				$this->form_validation->set_rules('np', 'Nilai Peer Review', 'required|numeric');
				if ($this->form_validation->run() != false) {
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('berkas')) {
						$where = array('no' => $no_usulan_dupak_details);
						$image = $this->upload->data();
						$data = array(
							'uraian' => $uraian,
							'tgl' => $tgl,
							'jml_penulis' => $jp,
							'penulis_ke' => $pk,
							'angka_kredit' => $np,
							'ak_peer_dosen' => $np,
							'satuan_hasil' => $satuan_hasil,
							'url' => $url,
							'url_peer' => $url_peer,
							'keterangan' => $keterangan,
							'isbn' => $isbn,
							'berkas' => $image['file_name'],
							'updated_at' => $tgl_update
						);
						unlink('assets/download_bidangb/' . $this->input->post('old_pict', TRUE));
					} else {
						$where = array('no' => $no_usulan_dupak_details);
						$data = array(
							'uraian' => $uraian,
							'jml_penulis' => $jp,
							'penulis_ke' => $pk,
							'angka_kredit' => $np,
							'ak_peer_dosen' => $np,
							'tgl' => $tgl,
							'satuan_hasil' => $satuan_hasil,
							'url' => $url,
							'url_peer' => $url_peer,
							'keterangan' => $keterangan,
							'isbn' => $isbn,
							'updated_at' => $tgl_update
						);
					}

					$this->session->set_flashdata('flash', 'Diubah');
					$this->dupak->update_data($where, $data, 'usulan_dupak_details');

					$q_cari = $this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'");
					foreach ($q_cari->result() as $row) {
						$angka_k += $row->angka_kredit;
					}

					$update = "update usulan_dupaks set kum_usulan_baru='$angka_k' where usulan_no='$no_usulan' and dupak_no='$dupak'";
					$this->db->query($update);
					redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
				} else {
					$this->session->set_flashdata('error', 'Format Nilai Peer Review bukan angka !!!');
					redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
				}
			}
		}
	}

	function tambah_B0004($dupak, $kum)
	{
		$no_dupak 			= $this->input->post('no_dupak');
		$no_usulan 			= $this->input->post('no_usulan');
		$maks_bid_b_25 		= $this->input->post('maks_bid_b_25');
		$maks_bid_b_40 		= $this->input->post('maks_bid_b_40');
		$r_akb 				= $this->input->post('r_akb');
		$jabatan_usulan_no 	= $this->input->post('jabatan_usulan_no');
		$syarat 			= $this->input->post('syarat');

		$uraian 			= addslashes($this->input->post('uraian'));
		$satuan_hasil 		= addslashes($this->input->post('satuan_hasil'));
		$keterangan 		= addslashes($this->input->post('keterangan'));
		$url 				= addslashes($this->input->post('url'));
		$url_review 		= addslashes($this->input->post('url_review'));
		$url_index 			= addslashes($this->input->post('url_index'));
		$url_web 			= addslashes($this->input->post('url_web'));
		$url_peer 			= addslashes($this->input->post('url_peer'));
		$isbn 				= addslashes($this->input->post('isbn'));

		$semester 			= $this->input->post('semester');
		$thn_akademik 		= $this->input->post('thn_akademik');
		$tgl 				= $this->input->post('tgl');
		$no_usulan_detail 	= $this->input->post('no_usulan_detail');
		$sks 				= $this->input->post('sks');
		$kum 				= $this->input->post('kum');
		$volum 				= $this->input->post('volum');
		$jp 				= $this->input->post('jp');
		$pk 				= $this->input->post('pk');
		$k 					= $this->input->post('k');
		$pdk 				= $this->input->post('pdk');
		$np 				= $this->input->post('np');

		$total_b 			= $r_akb + $np;

		// awal jika terdapat judul yang sama 
		$cjudul 	= $this->db->query("SELECT uraian FROM usulan_dupak_details WHERE usulan_no='$no_usulan' AND uraian='$uraian' AND LEFT (`dupak_no`, 1) = 'B'")->num_rows();

		if ($cjudul > "0") {
			$this->session->set_flashdata('error', 'Judul yang Anda input sudah terdapat pada bidang B');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}
		// akhir jika terdapat judul yang sama

		if ($pk > $jp) {
			$this->session->set_flashdata('error', 'Posisi Anda sebagai penulis melebihi jumlah penulis !!!');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		if ($np > $kum) {
			$this->session->set_flashdata('error', 'Nilai Angka Kredit tidak boleh melebihi nilai kum maksimal !!!');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		$this->form_validation->set_rules('np', 'Nilai Angka Kredit', 'required|numeric');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', 'Format Nilai Angka Kredit bukan angka !!!');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		//awal jika usulan kenaikan reguler (L-LK atau LK-GB) 
		// mencari perbandingan jabatan awal dengan usulan 
		// $cj	= $this->db->query("SELECT
		// 										a.`jabatan_no` AS kd_jab_awal,
		// 										d.`nama_jabatans` AS nm_jab_awal,
		// 										c.`kode` AS kd_jab_usul,
		// 										c.`nama_jabatans` AS nm_jab_usul
		// 									FROM
		// 										`usulans` a
		// 										JOIN `jabatan_jenjangs` b
		// 										ON a.`jabatan_usulan_no` = b.`no`
		// 										JOIN `jabatans` c
		// 										ON b.`jabatan_kode` = c.`kode`
		// 										JOIN `jabatans` d
		// 										ON a.`jabatan_no` = d.`kode`
		// 									WHERE a.`no` = '$no_usulan'")->row();

		// if (($dupak == 'B0038' || $dupak == 'B0033' || $dupak == 'B0024' || $dupak == 'B0032' || $dupak == 'B0030' || $dupak == 'B0028') && ($total_b > $maks_bid_b_25) && ($cj->nm_jab_awal <> $cj->nm_jab_usul) && $cj->kd_jab_awal <> '31' && $cj->kd_jab_awal <> '41') {
		// 	$this->session->set_flashdata('error', 'Nilai total angka kredit publikasi nasional Anda sudah melebihi 25% dari angka kredit yang dibutuhkan pada bidang penelitian. Silakan masukkan nilai Angka Kredit yang lebih kecil');
		// 	redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		// 	die();
		// }
		//akhir jika usulan kenaikan reguler (L-LK atau LK-GB) 

		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no 		= date("ymdHis") . '05' . $this->session->userdata('username');
		$file_path 	= './assets/download_bidangb/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] 		= $file_path;
		$config['allowed_types'] 	= 'pdf';
		$config['max_size'] 		= '5048';
		$config['file_name'] 		= 'File' . date("ymdHis") . $no;

		$this->load->library('upload', $config);

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
												ak_peer_dosen,
												keterangan,
												berkas,
												jml_penulis,
												penulis_ke,
												koresponden,
												url,
												url_index,
												url_peer,
												url_web,
												isbn,
												url_review,
												syarat,
												created_at,
												updated_at
											)
											VALUES
												(
												'$no',
												'$no_usulan',
												'$dupak',
												'$uraian',
												'$_POST[semester]',
												'$_POST[thn_akademik]',
												'$_POST[tgl]',
												'$satuan_hasil',
												'$volum',
												'$np',
												'$np',
												'$keterangan',
												'$image[file_name]',
												'$jp',
												'$pk',
												'$k',
												'$url',
												'$url_index',
												'$url_peer',
												'$url_web',
												'$isbn',
												'$url_review',
												'$syarat',
												'$tgl_create',
												'$tgl_create'
												)";
			$this->db->query($perintah2);
		} else {
			$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}

		$q_dupak = $this->db->query("select *from usulan_dupaks where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
		if ($q_dupak > 0) {
			$total_update = 0;
			$q1 = $this->db->query("SELECT
											angka_kredit
										  FROM
										   `usulan_dupak_details`
										  WHERE usulan_no = '$no_usulan'
											AND `dupak_no` = '$dupak'
											AND semester='$semester'
											AND tahun_akademik='$thn_akademik'");
			foreach ($q1->result() as $row) {
				$angka_kredit = 0;
				$angka_kredit += $row->angka_kredit;
			}
			$total_update 	= $q_dupak->kum_usulan_baru + $angka_kredit;
			$perintah		= $this->db->query("UPDATE
													usulan_dupaks
												SET
													kum_usulan_baru = '$total_update'
												WHERE dupak_no = '$dupak'
													AND usulan_no = '$no_usulan'");
		} else {
			$total_update = 0;
			$q2 = $this->db->query("SELECT
									angka_kredit
									FROM
									usulan_dupak_details
									WHERE usulan_no = '$no_usulan'
									AND dupak_no = '$dupak'");
			foreach ($q2->result() as $row2) {
				$angka_kredit = 0;
				$angka_kredit += $row2->angka_kredit;
			}
			$total_update = $q_dupak->kum_usulan_baru + $angka_kredit;
			$perintah = $this->db->query("INSERT INTO usulan_dupaks (
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
											'$np',
											'$tgl_create',
											'$tgl_create')");
		}

		if ($perintah) {
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$this->session->set_flashdata('error', 'Ditambah');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function update_b0004($dupak)
	{
		$no_dupak 					= $this->input->post('no_dupak');
		$no_usulan 					= $this->input->post('no_usulan');
		$no_usulan_dupak_details 	= $this->input->post('no_usulan_dupak_details');
		$syarat 					= $this->input->post('syarat');

		$maks_bid_b_25 				= $this->input->post('maks_bid_b_25');
		$maks_bid_b_40 				= $this->input->post('maks_bid_b_40');
		$r_akb 						= $this->input->post('r_akb');
		$jabatan_usulan_no 			= $this->input->post('jabatan_usulan_no');

		$uraian 					= addslashes($this->input->post('uraian'));
		$satuan_hasil 				= addslashes($this->input->post('satuan_hasil'));
		$keterangan 				= addslashes($this->input->post('keterangan'));
		$url 						= addslashes($this->input->post('url'));
		$url_peer 					= addslashes($this->input->post('url_peer'));
		$url_web 					= addslashes($this->input->post('url_web'));
		$url_review 				= addslashes($this->input->post('url_review'));
		$url_index 					= addslashes($this->input->post('url_index'));
		$isbn 						= addslashes($this->input->post('isbn'));

		$semester 					= $this->input->post('semester');
		$thn_akademik 				= $this->input->post('thn_akademik');
		$jp 						= $this->input->post('jp');
		$pk 						= $this->input->post('pk');
		$k 							= $this->input->post('k');
		$np 						= $this->input->post('np');
		$kum 						= $this->input->post('kum');

		$total_b 					= $r_akb + $np;

		$tgl 						= $this->input->post('tgl');
		$jumlah_volume 				= $this->input->post('jumlah_volume');
		$tgl_create 				= date("y-m-d H:i:s");
		$tgl_update 				= date("y-m-d H:i:s");
		$no 						= date("ymdHis") . '05' . $this->session->userdata('username');

		$file_path 					= './assets/download_bidangb/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] 		= $file_path;
		$config['allowed_types'] 	= 'pdf';
		$config['max_size'] 		= '5048';
		$config['file_name'] 		= 'File' . date("ymdHis") . $no;

		if ($pk > $jp) {
			$this->session->set_flashdata('error', 'Posisi Anda sebgai penulis melebihi jumlah penulis !!!');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		if ($np > $kum) {
			$this->session->set_flashdata('error', 'Nilai Angka Kredit tidak boleh melebihi nilai kum maksimal !!!');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		$this->form_validation->set_rules('np', 'Nilai Angka Kredit', 'required|numeric');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', 'Format Nilai Angka Kredit bukan angka !!!');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die;
		}

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {
			$where = array('no' => $no_usulan_dupak_details);
			$image = $this->upload->data();
			$data = array(
				'uraian' => $uraian,
				'tgl' => $tgl,
				'satuan_hasil' => $satuan_hasil,
				'jml_penulis' => $jp,
				'penulis_ke' => $pk,
				'koresponden' => $k,
				'url' => $url,
				'url_web' => $url_web,
				'url_review' => $url_review,
				'url_index' => $url_index,
				'url_peer' => $url_peer,
				'isbn' => $isbn,
				'angka_kredit' => $np,
				'ak_peer_dosen' => $np,
				'keterangan' => $keterangan,
				'berkas' => $image['file_name'],
				'updated_at' => $tgl_update,
				'syarat' => $syarat
			);
			unlink('assets/download_bidangb/' . $this->input->post('old_pict', TRUE));
		} else {
			$where = array('no' => $no_usulan_dupak_details);
			$data = array(
				'uraian' => $uraian,
				'tgl' => $tgl,
				'satuan_hasil' => $satuan_hasil,
				'jml_penulis' => $jp,
				'penulis_ke' => $pk,
				'koresponden' => $k,
				'url' => $url,
				'url_web' => $url_web,
				'url_review' => $url_review,
				'url_index' => $url_index,
				'url_peer' => $url_peer,
				'isbn' => $isbn,
				'angka_kredit' => $np,
				'ak_peer_dosen' => $np,
				'keterangan' => $keterangan,
				'updated_at' => $tgl_update,
				'syarat' => $syarat
			);
		}

		$this->dupak->update_data($where, $data, 'usulan_dupak_details');

		$q_cari = $this->db->query("select * from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'");
		foreach ($q_cari->result() as $row) {
			$angka_k += $row->angka_kredit;
		}

		$update = $this->db->query("update usulan_dupaks set kum_usulan_baru='$angka_k' where usulan_no='$no_usulan' and dupak_no='$dupak'");

		if ($update) {
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$this->session->set_flashdata('error', 'Diubah');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function update_b0033($dupak)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$no_usulan_dupak_details = $this->input->post('no_usulan_dupak_details');
		$uraian = $this->input->post('uraian');
		$url = $this->input->post('url');
		$url_web = $this->input->post('url_web');
		$url_review = $this->input->post('url_review');
		$url_index = $this->input->post('url_index');
		$url_peer = $this->input->post('url_peer');
		$isbn = $this->input->post('isbn');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$keterangan = $this->input->post('keterangan');
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '01';

		$file_path = './assets/download_bidangb/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {
			$where = array('no' => $no_usulan_dupak_details);
			$image = $this->upload->data();
			$data = array(
				'uraian' => $uraian,
				'tgl' => $tgl,
				'satuan_hasil' => $satuan_hasil,
				'isbn' => $isbn,
				'url' => $url,
				'url_web' => $url_web,
				'url_peer' => $url_peer,
				'keterangan' => $keterangan,
				'berkas' => $image['file_name'],
				'updated_at' => $tgl_update
			);
			unlink('assets/download_bidangb/' . $this->input->post('old_pict', TRUE));
		} else {
			$where = array('no' => $no_usulan_dupak_details);
			$data = array(
				'uraian' => $uraian,
				'tgl' => $tgl,
				'satuan_hasil' => $satuan_hasil,
				'isbn' => $isbn,
				'url' => $url,
				'url_web' => $url_web,
				'url_peer' => $url_peer,
				'keterangan' => $keterangan,
				'updated_at' => $tgl_update
			);
		}

		$this->session->set_flashdata('flash', 'Diubah');
		$this->dupak->update_data($where, $data, 'usulan_dupak_details');
		redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
	}

	function update_b0035($dupak)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$no_usulan_dupak_details = $this->input->post('no_usulan_dupak_details');
		$uraian = $this->input->post('uraian');
		$url = $this->input->post('url');
		$url_web = $this->input->post('url_web');
		$url_review = $this->input->post('url_review');
		$url_index = $this->input->post('url_index');
		$url_peer = $this->input->post('url_peer');
		$isbn = $this->input->post('isbn');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$keterangan = $this->input->post('keterangan');
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '05' . $this->session->userdata('username');

		$file_path = './assets/download_bidangb/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {
			$where = array('no' => $no_usulan_dupak_details);
			$image = $this->upload->data();
			$data = array(
				'uraian' => $uraian,
				'tgl' => $tgl,
				'satuan_hasil' => $satuan_hasil,
				'isbn' => $isbn,
				'url' => $url,
				'url_web' => $url_web,
				'url_review' => $url_review,
				'url_index' => $url_index,
				'url_peer' => $url_peer,
				'keterangan' => $keterangan,
				'berkas' => $image['file_name'],
				'updated_at' => $tgl_update
			);
			unlink('assets/download_bidangb/' . $this->input->post('old_pict', TRUE));
		} else {
			$where = array('no' => $no_usulan_dupak_details);
			$data = array(
				'uraian' => $uraian,
				'tgl' => $tgl,
				'satuan_hasil' => $satuan_hasil,
				'isbn' => $isbn,
				'url' => $url,
				'url_web' => $url_web,
				'url_review' => $url_review,
				'url_index' => $url_index,
				'url_peer' => $url_peer,
				'keterangan' => $keterangan,
				'updated_at' => $tgl_update
			);
		}

		$this->session->set_flashdata('flash', 'Diubah');
		$this->dupak->update_data($where, $data, 'usulan_dupak_details');
		redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
	}


	function update_b0005($dupak)
	{
		$no_dupak = $this->input->post('no_dupak');
		$no_usulan = $this->input->post('no_usulan');
		$no_usulan_dupak_details = $this->input->post('no_usulan_dupak_details');
		$uraian = $this->input->post('uraian');
		$semester = $this->input->post('semester');
		$thn_akademik = $this->input->post('thn_akademik');
		$jp = $this->input->post('jp');
		$url = $this->input->post('url');
		$url_web = $this->input->post('url_web');
		$url_peer = $this->input->post('url_peer');
		$tgl = $this->input->post('tgl');
		$satuan_hasil = $this->input->post('satuan_hasil');
		$jumlah_volume = $this->input->post('jumlah_volume');
		$keterangan = $this->input->post('keterangan');
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '05' . $this->session->userdata('username');
		$file_path = './assets/download_bidangb/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {
			$where = array('no' => $no_usulan_dupak_details);
			$image = $this->upload->data();
			$data = array(
				'uraian' => $uraian,
				'tgl' => $tgl,
				'satuan_hasil' => $satuan_hasil,
				'url' => $url,
				'url_web' => $url_web,
				'url_peer' => $url_peer,
				'keterangan' => $keterangan,
				'berkas' => $image['file_name'],
				'updated_at' => $tgl_update
			);
			unlink('assets/download_bidangb/' . $this->input->post('old_pict', TRUE));
		} else {
			$where = array('no' => $no_usulan_dupak_details);
			$data = array(
				'uraian' => $uraian,
				'tgl' => $tgl,
				'satuan_hasil' => $satuan_hasil,
				'url' => $url,
				'url_web' => $url_web,
				'url_peer' => $url_peer,
				'keterangan' => $keterangan,
				'updated_at' => $tgl_update
			);
		}
		$this->session->set_flashdata('flash', 'Diubah');
		$this->dupak->update_data($where, $data, 'usulan_dupak_details');
		redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
	}

	function hapus_B0001($id, $no_usulan, $berkas, $dupak, $kum)
	{
		unlink('assets/download_bidangb/' . $berkas);
		$where = array('no' => $id);
		$query_cari = $this->db->query("select * from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
		if ($query_cari == 1) {
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$hapus = "delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($hapus);
			$this->session->set_flashdata('flash', 'Dihapus');

			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$q_cari = $this->db->query("select *from usulan_dupak_details where no='$id'")->row();
			$ak = $q_cari->angka_kredit;
			$update = "update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$ak where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($update);
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function hapus_B0040($dupak, $no_usulan)
	{
		$hapus = "delete from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($hapus);

		$hapus2 = "delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($hapus2);

		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'usulan/usulan/bidangB/' . $no_usulan);
	}

	function hapus_B0005($id, $no_usulan, $berkas, $dupak)
	{
		unlink('assets/download_bidangb/' . $berkas);
		$where = array('no' => $id);
		$query_cari = $this->db->query("select * from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
		if ($query_cari == 1) {
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$hapus = "delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($hapus);
			$this->session->set_flashdata('flash', 'Dihapus');

			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$q_cari = $this->db->query("select *from usulan_dupak_details where no='$id'")->row();
			$ak = $q_cari->angka_kredit;
			$update = "update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$ak where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($update);
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function hapus_B0004($id, $no_usulan, $berkas, $dupak)
	{
		unlink('assets/download_bidangb/' . $berkas);
		$where = array('no' => $id);
		$query_cari = $this->db->query("select * from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
		if ($query_cari == 1) {
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$hapus = "delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($hapus);
			$this->session->set_flashdata('flash', 'Dihapus');

			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$q_cari = $this->db->query("select *from usulan_dupak_details where no='$id'")->row();
			$ak = $q_cari->angka_kredit;
			$update = "update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$ak where usulan_no='$no_usulan' and dupak_no='$dupak'";
			$this->db->query($update);
			$this->dupak->delete_data($where, 'usulan_dupak_details');
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function hapus_ijazah($id, $no_usulan, $berkas, $dupak)
	{
		unlink('assets/download_bidangb/' . $berkas);
		$where = array('no' => $id);
		$this->dupak->delete_data($where, 'usulan_dupak_details');
		$this->dupak->delete_data($where, 'usulan_dupaks');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'usulan/usulan_dupak/dupak/' . $dupak . '/' . $no_usulan);
	}

	function download_bidangb($id)
	{
		// force_download('assets/download_bidangb/'.$id,NULL);
		echo '<iframe src="' . base_url() . 'assets/download_bidangb/' . $id . '" width="100%" height="900" style="border: none;"></iframe>';
	}
}
