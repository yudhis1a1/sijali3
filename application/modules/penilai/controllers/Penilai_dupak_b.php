<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penilai_dupak_b extends MX_Controller
{


	function __construct()
	{
		$this->load->model('m_penilai');
		$this->load->model('dupak');
		$this->load->helper(array('url', 'download', 'date_helper'));
	}

	function __destruct()
	{
	}

	function dupak($no, $id)
	{
		$B0001['no'] = $id;
		$q_dupak 	= $this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='$no' and usulan_no='$id'")->row();
		$q_usulan 	= $this->db->query("SELECT jabatan_usulan_no FROM usulans WHERE no='$id'")->row();
		$q1 = $this->db->query("SELECT
							  usulan_no,
							  NO,
							  `uraian`,
							  `semester`,
							  `tahun_akademik`,
							  `tahun_akademik` + 1 AS thn_akademik_baru,
							  `tgl`,
							  `satuan_hasil`,
							  kum_penilai,
							  kum_penilai_keterangan,
							  `jumlah_volume`,
							  (sks * jumlah_volume) AS total_sks,
							  `kum_usulan`,
							  `keterangan`,
							  url,
							  url_index,
							  berkas
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'")->row();

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
							  berkas
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'");

		$q3 = $this->db->query("SELECT
							  usulan_no,
							  no,
							  isbn,
							  `uraian`,
							  `semester`,
							  `tahun_akademik`,
							  `tahun_akademik` + 1 AS thn_akademik_baru,
							  `tgl`,
							  satuan_hasil,
							  `keterangan`,
							  kum_penilai,
							  kum_penilai_keterangan,
							  berkas,
							  kunci,
							  jml_penulis,
							  penulis_ke,
							  angka_kredit,
							  koresponden,
							  url,
							  url_index,
							  url_peer,
							  url_web,
							  url_review,
							  pertama_sbg_koresponden,
							  isbn,
							  syarat
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'");

		$data_dasar 				= $this->db->query("SELECT
															a.*,
															b.`jabatan_no`
														FROM
															usulans a
															JOIN `dosens` b
															ON a.`dosen_no` = b.`no`
														WHERE a.`no` = '$id'")->row();

		$B0001['usulan_status_id'] 	= $data_dasar->usulan_status_id;
		$B0001['dosen_no'] 			= $data_dasar->dosen_no;
		$B0001['jabatan_no'] 		= $data_dasar->jabatan_no;
		$B0001['jabatan_usulan_no']	= $data_dasar->jabatan_usulan_no;

		$B0001['q_dupak'] 	= $q_dupak;
		$B0001['q1'] 		= $q1;
		$B0001['q2'] 		= $q2;
		$B0001['q3'] 		= $q3;
		$B0001['usulan'] 	= $q_usulan;

		if ($no == 'B0001') {
			vpenilai('bidang_b/B0001', $B0001);
		} elseif ($no == 'B0002') {
			vpenilai('bidang_b/B0002', $B0001);
		} elseif ($no == 'B0003') {
			vpenilai('bidang_b/B0003', $B0001);
		} elseif ($no == 'B0004') {
			vpenilai('bidang_b/B0004', $B0001);
		} elseif ($no == 'B0005') {
			vpenilai('bidang_b/B0005', $B0001);
		} elseif ($no == 'B0006') {
			vpenilai('bidang_b/B0006', $B0001);
		} elseif ($no == 'B0007') {
			vpenilai('bidang_b/B0007', $B0001);
		} elseif ($no == 'B0008') {
			vpenilai('bidang_b/B0008', $B0001);
		} elseif ($no == 'B0009') {
			vpenilai('bidang_b/B0009', $B0001);
		} elseif ($no == 'B0010') {
			vpenilai('bidang_b/B0010', $B0001);
		} elseif ($no == 'B0011') {
			vpenilai('bidang_b/B0011', $B0001);
		} elseif ($no == 'B0012') {
			vpenilai('bidang_b/B0012', $B0001);
		} elseif ($no == 'B0013') {
			vpenilai('bidang_b/B0013', $B0001);
		} elseif ($no == 'B0014') {
			vpenilai('bidang_b/B0014', $B0001);
		} elseif ($no == 'B0015') {
			vpenilai('bidang_b/B0015', $B0001);
		} elseif ($no == 'B0016') {
			vpenilai('bidang_b/B0016', $B0001);
		} elseif ($no == 'B0017') {
			vpenilai('bidang_b/B0017', $B0001);
		} elseif ($no == 'B0018') {
			vpenilai('bidang_b/B0018', $B0001);
		} elseif ($no == 'B0019') {
			vpenilai('bidang_b/B0019', $B0001);
		} elseif ($no == 'B0020') {
			vpenilai('bidang_b/B0020', $B0001);
		} elseif ($no == 'B0021') {
			vpenilai('bidang_b/B0021', $B0001);
		} elseif ($no == 'B0022') {
			vpenilai('bidang_b/B0022', $B0001);
		} elseif ($no == 'B0023') {
			vpenilai('bidang_b/B0023', $B0001);
		} elseif ($no == 'B0024') {
			vpenilai('bidang_b/B0024', $B0001);
		} elseif ($no == 'B0025') {
			vpenilai('bidang_b/B0025', $B0001);
		} elseif ($no == 'B0026') {
			vpenilai('bidang_b/B0026', $B0001);
		} elseif ($no == 'B0027') {
			vpenilai('bidang_b/B0027', $B0001);
		} elseif ($no == 'B0028') {
			vpenilai('bidang_b/B0028', $B0001);
		} elseif ($no == 'B0029') {
			vpenilai('bidang_b/B0029', $B0001);
		} elseif ($no == 'B0030') {
			vpenilai('bidang_b/B0030', $B0001);
		} elseif ($no == 'B0031') {
			vpenilai('bidang_b/B0031', $B0001);
		} elseif ($no == 'B0032') {
			vpenilai('bidang_b/B0032', $B0001);
		} elseif ($no == 'B0033') {
			vpenilai('bidang_b/B0033', $B0001);
		} elseif ($no == 'B0034') {
			vpenilai('bidang_b/B0034', $B0001);
		} elseif ($no == 'B0035') {
			vpenilai('bidang_b/B0035', $B0001);
		} elseif ($no == 'B0036') {
			vpenilai('bidang_b/B0036', $B0001);
		} elseif ($no == 'B0037') {
			vpenilai('bidang_b/B0037', $B0001);
		} elseif ($no == 'B0038') {
			vpenilai('bidang_b/B0038', $B0001);
		} elseif ($no == 'B0039') {
			vpenilai('bidang_b/B0039', $B0001);
		}
	}

	function hapus_b0002($dupak, $usulan_no)
	{
		$update_details = "UPDATE
					  `usulan_dupak_details`
					SET
					  `kum_penilai` = '0.00',
					  `kum_penilai_keterangan` = '',
					  kunci=''
					WHERE `usulan_no` = '$usulan_no'
					AND `dupak_no`='$dupak'";
		$this->db->query($update_details);

		$update_dupak = "UPDATE
					  `usulan_dupaks`
					SET
					  `kum_penilai_baru` = '0.00'
					WHERE `usulan_no` = '$usulan_no'
					AND `dupak_no`='$dupak'";
		$this->db->query($update_dupak);

		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'penilai/penilai_dupak_b/dupak/' . $dupak . '/' . $usulan_no);
	}

	function update_b0001($dupak)
	{
		$no_dupak_details 		= $this->input->post('no');
		$no_usulan 				= $this->input->post('no_usulan');
		$user_penilai_no 		= $this->input->post('user_penilai_no');
		$kum_penilai_keterangan = $this->input->post('kum_penilai_keterangan');
		$kum_penilai 			= $this->input->post('kum_penilai');
		$tgl_update				= date("y-m-d H:i:s");
		$maks_bid_b_25 			= $this->input->post('maks_bid_b_25');
		$r_akb 					= $this->input->post('r_akb');
		$jabatan_usulan_no 		= $this->input->post('jabatan_usulan_no');

		//awal jika usulan kenaikan reguler (L-LK atau LK-GB)
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

		//cari kum_penilai dan hitung totalnya
		$c_nil_ak = $this->db->query("SELECT
											kum_penilai
											FROM
											`usulan_dupak_details`
											WHERE usulan_no = '$no_usulan'
												AND `dupak_no` = '$dupak'");
		foreach ($c_nil_ak->result() as $row) {
			$kum_pen_jml += $row->kum_penilai;
		}

		$tosem = $r_akb - $kum_pen_jml;

		$in = 0;
		foreach ($no_dupak_details as $no) {
			$sub_ak += $kum_penilai[$in];
			$in++;
		}

		$total_b = $sub_ak + $tosem;

		if (($dupak == 'B0038' || $dupak == 'B0033' || $dupak == 'B0024' || $dupak == 'B0032' || $dupak == 'B0030' || $dupak == 'B0028') && ($total_b > $maks_bid_b_25) && ($cj->nm_jab_awal <> $cj->nm_jab_usul) && $cj->kd_jab_awal <> '31' && $cj->kd_jab_awal <> '41' && $cj->kd_jab_awal <> '40') {
			$this->session->set_flashdata('error', 'Nilai total angka kredit publikasi nasional yang dinilai (' . $total_b . ') sudah melebihi 25% dari angka kredit yang dibutuhkan pada bidang penelitian (' . $maks_bid_b_25 . '). Silakan masukkan nilai angka kredit yang lebih kecil');
			redirect(base_url() . 'penilai/penilai_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
			die();
		}
		//akhir jika usulan kenaikan reguler (L-LK atau LK-GB)

		//update keterangan dan kum penilai di table usulan_dupak_details
		$index = 0; // Set index array awal dengan 0
		foreach ($no_dupak_details as $no) {
			$this->db->query("UPDATE
								usulan_dupak_details
							SET
								kum_penilai = '" . $kum_penilai[$index] . "',
								kum_penilai_keterangan = '" . $kum_penilai_keterangan[$index] . "',
								kunci='1',
								user_penilai_no='" . $user_penilai_no[$index] . "',
								updated_at='$tgl_update'
							WHERE no = '$no'");
			$index++;
		}

		//cari kum_penilai dan hitung totalnya
		$cari_nilai_ak = $this->db->query("SELECT
											no,
											usulan_no,
											kum_penilai
										FROM
										`usulan_dupak_details`
										WHERE usulan_no = '$no_usulan'
											AND `dupak_no` = '$dupak'");
		foreach ($cari_nilai_ak->result() as $row) {
			$kum_penilai_jml += $row->kum_penilai;
		}

		//update kum penilai baru di table usulan_dupaks
		$perintah2 = $this->db->query("UPDATE
										`usulan_dupaks`
										SET
										`kum_penilai_baru` = '$kum_penilai_jml',
										updated_at='$tgl_update'
										WHERE `usulan_no` = '$no_usulan'
										AND `dupak_no`='$dupak'");

		if ($perintah2) {
			$this->session->set_flashdata('flash', 'Diupdate');
			redirect(base_url() . 'penilai/penilai_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		} else {
			$this->session->set_flashdata('error', 'Diupdate');
			redirect(base_url() . 'usulan/usulan_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
		}
	}

	function update_b0029($dupak)
	{
		$no_dupak_details = $this->input->post('no');
		$no_usulan = $this->input->post('no_usulan');
		$user_penilai_no = $this->input->post('user_penilai_no');
		$kum_penilai_keterangan = $this->input->post('kum_penilai_keterangan');
		$kum_penilai = $this->input->post('kum_penilai');
		$sms = $this->input->post('sms');
		$tgl_update = date("y-m-d H:i:s");

		foreach ($kum_penilai as $ha) {
			$hasil_explode = explode(',', $ha);
			$ak_pen = $hasil_explode[0];
			$semester = $hasil_explode[1];
			$tahun_akademik = $hasil_explode[2];

			$update_kum = "UPDATE
			  usulan_dupak_details
			SET
			  kum_penilai = '$ak_pen'
			WHERE tahun_akademik = '$tahun_akademik'
			AND semester='$semester'
			AND usulan_no='$no_usulan'
			AND dupak_no='$dupak'";
			$this->db->query($update_kum);
		}

		//update keterangan dan kum penilai di table usulan_dupak_details
		$index = 0; // Set index array awal dengan 0
		foreach ($sms as $st) {
			$hasil_ex = explode(',', $st);
			$semester = $hasil_ex[0];
			$tahun_akademik = $hasil_ex[1];

			echo "$semester<br>";
			echo "$tahun_akademik<br><br>";


			$perintah = "UPDATE
				  usulan_dupak_details
				SET
				  kum_penilai_keterangan = '" . $kum_penilai_keterangan[$index] . "',
				  kunci='1',
				  user_penilai_no='" . $user_penilai_no[$index] . "',
				  updated_at='$tgl_update'
				WHERE tahun_akademik = '$tahun_akademik'
				AND semester='$semester'
				AND usulan_no='$no_usulan'
				AND dupak_no='$dupak'";
			$index++;
			$this->db->query($perintah);
		}

		//cari kum_penilai dan hitung totalnya
		$cari_nilai_ak = $this->db->query("SELECT
		no,
		usulan_no,
		kum_penilai
	  FROM
	   `usulan_dupak_details`
	  WHERE usulan_no = '$no_usulan'
		AND `dupak_no` = '$dupak'");
		foreach ($cari_nilai_ak->result() as $row) {
			$kum_penilai_jml += $row->kum_penilai;
		}

		//update kum penilai baru di table usulan_dupaks
		$perintah2 = "UPDATE
				  `usulan_dupaks`
				SET
				  `kum_penilai_baru` = '$kum_penilai_jml',
				   updated_at='$tgl_update'
				WHERE `usulan_no` = '$no_usulan'
				AND `dupak_no`='$dupak'";
		$this->db->query($perintah2);

		$this->session->set_flashdata('flash', 'Disimpan');
		redirect(base_url() . 'penilai/penilai_dupak_b/dupak/' . $dupak . '/' . $no_usulan);
	}

	function hapus_b0029($dupak, $usulan_no)
	{
		$update_details = "UPDATE
					  `usulan_dupak_details`
					SET
					  `kum_penilai` = '0.00',
					  `kum_penilai_keterangan` = '',
					  kunci=''
					WHERE `usulan_no` = '$usulan_no'
					AND `dupak_no`='$dupak'";
		$this->db->query($update_details);

		$update_dupak = "UPDATE
					  `usulan_dupaks`
					SET
					  `kum_penilai_baru` = '0.00'
					WHERE `usulan_no` = '$usulan_no'
					AND `dupak_no`='$dupak'";
		$this->db->query($update_dupak);

		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'penilai/penilai_dupak_b/dupak/' . $dupak . '/' . $usulan_no);
	}

	function update_b0040($dupak, $usulan_no)
	{
		$kum_penilai_keterangan = addslashes($this->input->post('kum_penilai_keterangan'));
		$kum_penilai = $this->input->post('ak_penilai');
		$tgl_update = date("y-m-d H:i:s");

		//update kum penilai baru di table usulan_dupak_details
		$perintah = "UPDATE
				  `usulan_dupak_details`
				SET
				  `kum_penilai` = '$kum_penilai',
				  `kum_penilai_keterangan` = '$kum_penilai_keterangan',
				  `kunci` = '1',
				   updated_at='$tgl_update'
				WHERE `usulan_no` = '$usulan_no'
				AND `dupak_no`='$dupak'";
		$this->db->query($perintah);

		//update kum penilai baru di table usulan_dupaks
		$perintah2 = "UPDATE
				  `usulan_dupaks`
				SET
				  `kum_penilai_baru` = '$kum_penilai',
				   updated_at='$tgl_update'
				WHERE `usulan_no` = '$usulan_no'
				AND `dupak_no`='$dupak'";
		$this->db->query($perintah2);

		$this->session->set_flashdata('flash', 'Diupdate');
		redirect(base_url() . 'penilai/penilai/bidangB' . '/' . $usulan_no);
	}

	function download_sk_jad_dosen($id)
	{
		force_download('assets/download_syarat/' . $id, NULL);
	}
}
