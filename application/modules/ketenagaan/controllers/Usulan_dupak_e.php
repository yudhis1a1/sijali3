<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Usulan_dupak_e extends MX_Controller
{


	function __construct()
	{


		$this->load->helper(array('url', 'download', 'date_helper'));
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
							  berkas,
							  kum_penilai,
							  kum_penilai_keterangan
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
							  berkas,
							  kum_penilai,
							  kum_penilai_keterangan
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'");

		$q3 = $this->db->query("SELECT
							  usulan_no,
							  no,
							  dupak_no,
							  `uraian`,
							  `semester`,
							  `tahun_akademik`,
							  `tahun_akademik` + 1 AS thn_akademik_baru,
							  `tgl`,
							  jumlah_volume,
							  `keterangan`,
							  berkas,
							  modul,
							  proposal,
							  laporan,
							  sertifikat,
							  angka_kredit,
							  kum_penilai,
							  kum_penilai_keterangan
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'
							  order by tahun_akademik asc");
		$data_dasar = $this->db->query("SELECT * from usulans where no='$id'")->row();
		$usulan_status_id = $data_dasar->usulan_status_id;
		$cari_jab = $this->db->query("SELECT
		a.`no`,
		a.`dosen_no`,
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
		$jabatan_no = $cari_jab->jabatan_no;
		$jabatan_tgl = $cari_jab->jabatan_tgl;
		$pengangkatan_tgl = $cari_jab->pengangkatan_tgl;
		$E0001['jabatan_no'] = $jabatan_no;
		$E0001['jabatan_tgl'] = $jabatan_tgl;
		$E0001['pengangkatan_tgl'] = $pengangkatan_tgl;

		$role = $this->session->userdata('role');
		$E0001['usulan_status_id'] = $usulan_status_id;
		$E0001['role'] = $role;
		$E0001['q_dupak'] = $q_dupak;
		$E0001['dupak_no'] = $no;
		$E0001['no'] = $id;
		$E0001['q1'] = $q1;
		$E0001['q2'] = $q2;
		$E0001['q3'] = $q3;
		$E0001['usulan'] = $q_usulan;

		if ($no == 'E0001') {
			vusulan('bidang_e/E0001', $E0001);
		} elseif ($no == 'E0002') {
			vusulan('bidang_e/E0002', $E0001);
		} elseif ($no == 'E0003') {
			vusulan('bidang_e/E0003', $E0001);
		} elseif ($no == 'E0004') {
			vusulan('bidang_e/E0004', $E0001);
		} elseif ($no == 'E0005') {
			vusulan('bidang_e/E0005', $E0001);
		} elseif ($no == 'E0006') {
			vusulan('bidang_e/E0006', $E0001);
		} elseif ($no == 'E0007') {
			vusulan('bidang_e/E0007', $E0001);
		} elseif ($no == 'E0008') {
			vusulan('bidang_e/E0008', $E0001);
		} elseif ($no == 'E0009') {
			vusulan('bidang_e/E0009', $E0001);
		} elseif ($no == 'E0010') {
			vusulan('bidang_e/E0010', $E0001);
		} elseif ($no == 'E0011') {
			vusulan('bidang_e/E0011', $E0001);
		}
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
