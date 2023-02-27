<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penilai_dupak_e extends MX_Controller
{


	function __construct()
	{
		$this->load->model('m_penilai');
		$this->load->model('dupak');
		$this->load->helper(array('url', 'download', 'date_helper'));
		if ($this->session->userdata('status') != "login") {
			redirect(base_url() . 'login/login?pesan=belumlogin');
		}
	}

	function __destruct()
	{
	}

	function dupak($no, $id)
	{
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
							  kum_penilai,
							  kum_penilai_keterangan,
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
							  kum_penilai,
							  kum_penilai_keterangan,
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
							  jumlah_volume,
							  angka_kredit,
							  koresponden,
							  url
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'
							  order by tahun_akademik asc");
		$data_dasar = $this->db->query("SELECT * from usulans where no='$id'")->row();
		$usulan_status_id = $data_dasar->usulan_status_id;

		$E0001['usulan_status_id'] 	= $usulan_status_id;
		$E0001['no'] 				= $id;
		$E0001['q_dupak']			= $q_dupak;
		$E0001['q1']				= $q1;
		$E0001['q2']				= $q2;
		$E0001['q3']				= $q3;
		$E0001['usulan']			= $q_usulan;

		if ($no == 'E0001') {
			vpenilai('bidang_e/E0001', $E0001);
		} elseif ($no == 'E0002') {
			vpenilai('bidang_e/E0002', $E0001);
		} elseif ($no == 'E0003') {
			vpenilai('bidang_e/E0003', $E0001);
		} elseif ($no == 'E0004') {
			vpenilai('bidang_e/E0004', $E0001);
		} elseif ($no == 'E0005') {
			vpenilai('bidang_e/E0005', $E0001);
		} elseif ($no == 'E0006') {
			vpenilai('bidang_e/E0006', $E0001);
		} elseif ($no == 'E0007') {
			vpenilai('bidang_e/E0007', $E0001);
		} elseif ($no == 'E0008') {
			vpenilai('bidang_e/E0008', $E0001);
		} elseif ($no == 'E0009') {
			vpenilai('bidang_e/E0009', $E0001);
		} elseif ($no == 'E0010') {
			vpenilai('bidang_e/E0010', $E0001);
		} elseif ($no == 'E0011') {
			vpenilai('bidang_e/E0011', $E0001);
		}
	}

	function update_E0001($dupak)
	{
		$no_usulan 				= $this->input->post('no_usulan');
		$user_penilai_no 		= $this->input->post('user_penilai_no');
		$kum_penilai_keterangan = $this->input->post('kum_penilai_keterangan');
		$kum_penilai 			= $this->input->post('kum_penilai');
		$sms 					= $this->input->post('sms');
		$tgl_update 			= date("y-m-d H:i:s");

		foreach ($kum_penilai as $ha) {
			$hasil_explode = explode(',', $ha);
			$ak_pen = $hasil_explode[0];
			$no_dupak_details = $hasil_explode[1];

			$update_kum = "UPDATE
							usulan_dupak_details
							SET
							kum_penilai = '$ak_pen'
							WHERE no='$no_dupak_details'";

			$this->db->query($update_kum);
		}

		//update keterangan dan kum penilai di table usulan_dupak_details
		$index = 0; // Set index array awal dengan 0
		foreach ($sms as $st) {

			$perintah = "UPDATE
				  usulan_dupak_details
				SET
				  kum_penilai_keterangan = '" . $kum_penilai_keterangan[$index] . "',
				  kunci='1',
				  user_penilai_no='" . $user_penilai_no[$index] . "',
				  updated_at='$tgl_update'
				WHERE no='$st'";
			$index++;
			$this->db->query($perintah);
		}

		$this->session->set_flashdata('flash', 'Disimpan');
		redirect(base_url() . 'penilai/penilai_dupak_e/dupak/' . $dupak . '/' . $no_usulan);
	}

	function update_E0002($dupak)
	{
		$no_usulan 				= $this->input->post('no_usulan');
		$user_penilai_no 		= $this->input->post('user_penilai_no');
		$kum_penilai_keterangan = $this->input->post('kum_penilai_keterangan');
		$kum_penilai 			= $this->input->post('kum_penilai');
		$sms 					= $this->input->post('sms');
		$tgl_update 			= date("y-m-d H:i:s");

		foreach ($kum_penilai as $ha) {
			$hasil_explode = explode(',', $ha);
			$ak_pen = $hasil_explode[0];
			$no_dupak_details = $hasil_explode[1];

			$update_kum = "UPDATE
							usulan_dupak_details
							SET
							kum_penilai = '$ak_pen'
							WHERE no='$no_dupak_details'";

			$this->db->query($update_kum);
		}

		//update keterangan dan kum penilai di table usulan_dupak_details
		$index = 0; // Set index array awal dengan 0
		foreach ($sms as $st) {

			$perintah = "UPDATE
				  usulan_dupak_details
				SET
				  kum_penilai_keterangan = '" . $kum_penilai_keterangan[$index] . "',
				  kunci='1',
				  user_penilai_no='" . $user_penilai_no[$index] . "',
				  updated_at='$tgl_update'
				WHERE no='$st'";
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
		redirect(base_url() . 'penilai/penilai_dupak_e/dupak/' . $dupak . '/' . $no_usulan);
	}

	function hapus_E0001($dupak, $usulan_no)
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
		redirect(base_url() . 'penilai/penilai_dupak_e/dupak/' . $dupak . '/' . $usulan_no);
	}

	function download_bidangd($id)
	{
		force_download('assets/download_bidangd/' . $id, NULL);
	}

	public function print_bidangd($no_usulan)
	{
		$printc['no_usulan'] = $no_usulan;
		$this->load->view('bidang_d/print_dupak_d', $printc);
	}
}
