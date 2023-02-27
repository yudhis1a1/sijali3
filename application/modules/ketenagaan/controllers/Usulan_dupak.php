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

		$this->load->helper(array('url', 'download', 'date_helper'));
	}


	function __destruct()
	{
	}

	function dupak($no, $id)
	{
		$A0001['no'] = $id;
		$q_dupak = $this->db->query("SELECT * FROM usulan_dupaks a WHERE dupak_no='$no' and usulan_no='$id'")->row();
		$q_usulan = $this->db->query("SELECT jabatan_usulan_no FROM usulans WHERE no='$id'")->row();
		$q1 = $this->db->query("SELECT
						  kunci,
						  usulan_no,
						  kum_penilai,
						  kum_penilai_keterangan,
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
						  id_rwy_didik_formal
						FROM
						  `usulan_dupak_details`
						WHERE usulan_no = '$id'
						  AND `dupak_no` = '$no'")->row();
		$q2 = $this->db->query("SELECT usulan_no,no,`uraian`,`semester`,`tahun_akademik`,`tahun_akademik`+1 AS thn_akademik_baru,`tgl`,`satuan_hasil`,sks,`jumlah_volume`,(sks*jumlah_volume) AS total_sks,`kum_usulan`,`keterangan`,url,url_index,berkas FROM  `usulan_dupak_details` WHERE usulan_no = '$id' AND `dupak_no` = '$no'");

		$q3 = $this->db->query("SELECT
						  isbn,
						  usulan_no,
						  penulis_ke,
						  jml_penulis,
						  url,
						  NO,
						  dupak_no,
						  kum_penilai,
						  kum_penilai_keterangan,
						  `uraian`,
						  `semester`,
						  nim,
						  nm_mhs,
						  `tahun_akademik`,
						  `tahun_akademik` + 1 AS thn_akademik_baru,
						  `tgl`,
						  satuan_hasil,
						  `keterangan`,
						  angka_kredit,
						  kunci,
						  berkas
						FROM
						  `usulan_dupak_details`
						WHERE usulan_no = '$id'
						  AND `dupak_no` = '$no'");

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

		$jenjang_id_lama	= $data_dasar->jenjang_id_lama;
		$jenjang_id_baru	= $data_dasar->jenjang_id_baru;
		$usulan_status_id	= $data_dasar->usulan_status_id;
		$nidn				= $data_dasar->nidn;
		$jabatan_no			= $data_dasar->jabatan_no;
		$jabatan_tgl		= $data_dasar->jabatan_tgl;
		$pengangkatan_tgl	= $data_dasar->pengangkatan_tgl;

		$A0001['jabatan_no']		= $jabatan_no;
		$A0001['jabatan_tgl']		= $jabatan_tgl;
		$A0001['pengangkatan_tgl']	= $pengangkatan_tgl;
		$A0001['jenjang_id_lama']	= $jenjang_id_lama;
		$A0001['jenjang_id_baru']	= $jenjang_id_baru;

		$A0001['usulan_status_id'] 	= $usulan_status_id;
		$A0001['q_dupak']			= $q_dupak;
		$A0001['q1']				= $q1;
		$A0001['q2']				= $q2;
		$A0001['q3']				= $q3;
		$A0001['usulan']			= $q_usulan;
		$A0001['dasar']			= $data_dasar;

		if ($no == 'A0001') {
			if ($q1->id_rwy_didik_formal == '') {
				vusulan('bidang_a/a0001_lama', $A0001);
			} else {
				vusulan('bidang_a/a0001', $A0001);
			}
		} elseif ($no == 'A0002') {
			if ($q1->id_rwy_didik_formal == '') {
				vusulan('bidang_a/a0002_lama', $A0001);
			} else {
				vusulan('bidang_a/a0002', $A0001);
			}
		} elseif ($no == 'A0003') {
			vusulan('bidang_a/a0003', $A0001);
		} elseif ($no == 'A0004') {
			vusulan('bidang_a/a0004', $A0001);
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
		}
	}



	function download_bidanga($id)
	{
		force_download('assets/download_bidanga/' . $id, NULL);
	}
}
