<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usulan_dupak_d extends MX_Controller
{


	function __construct()
	{
		
		$this->load->helper(array('url','download','date_helper'));
	}
	
	function __destruct()
	{
	}
  
function dupak($no,$id)
{
	//$D0001['no'] = $id;
	$q_dupak=$this->db->query("SELECT * FROM usulan_dupaks WHERE dupak_no='$no' and usulan_no='$id'")->row();	
	$q_usulan=$this->db->query("SELECT jabatan_usulan_no FROM usulans WHERE no='$id'")->row();	
	$q1=$this->db->query("SELECT
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
							  AND `dupak_no` = '$no'
							  ")->row();	
	$q2=$this->db->query("SELECT
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
							  AND `dupak_no` = '$no'
							  ");	
	$q3=$this->db->query("SELECT
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
							  url
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'");	
	 $data_dasar=$this->db->query("SELECT * from usulans where no='$id'")->row();
	$usulan_status_id=$data_dasar->usulan_status_id;
	$D0001['usulan_status_id'] = $usulan_status_id;
	$D0001['dasar']=$data_dasar;
	 $D0001['q_dupak']=$q_dupak;
	 $D0001['q1']=$q1;
	 $D0001['q2']=$q2;
	 $D0001['q3']=$q3;
	 $D0001['usulan']=$q_usulan;
	if($no=='D0001'){
		vusulan('bidang_d/D0001',$D0001);
	}elseif($no=='D0002'){
		vusulan('bidang_d/D0002',$D0001);
	}elseif($no=='D0003'){
		vusulan('bidang_d/D0003',$D0001);
	}elseif($no=='D0004'){
		vusulan('bidang_d/D0004',$D0001);
	}elseif($no=='D0005'){
		vusulan('bidang_d/D0005',$D0001);
	}elseif($no=='D0006'){
		vusulan('bidang_d/D0006',$D0001);
	}elseif($no=='D0007'){
		vusulan('bidang_d/D0007',$D0001);
	}elseif($no=='D0008'){
		vusulan('bidang_d/D0008',$D0001);
	}elseif($no=='D0009'){
		vusulan('bidang_d/D0009',$D0001);
	}elseif($no=='D0010'){
		vusulan('bidang_d/D0010',$D0001);
	}elseif($no=='D0011'){
		vusulan('bidang_d/D0011',$D0001);
	}elseif($no=='D0012'){
		vusulan('bidang_d/D0012',$D0001);
	}elseif($no=='D0013'){
		vusulan('bidang_d/D0013',$D0001);
	}elseif($no=='D0014'){
		vusulan('bidang_d/D0014',$D0001);
	}elseif($no=='D0015'){
		vusulan('bidang_d/D0015',$D0001);
	}elseif($no=='D0016'){
		vusulan('bidang_d/D0016',$D0001);
	}elseif($no=='D0017'){
		vusulan('bidang_d/D0017',$D0001);
	}elseif($no=='D0018'){
		vusulan('bidang_d/D0018',$D0001);
	}elseif($no=='D0019'){
		vusulan('bidang_d/D0019',$D0001);
	}elseif($no=='D0020'){
		vusulan('bidang_d/D0020',$D0001);
	}elseif($no=='D0021'){
		vusulan('bidang_d/D0021',$D0001);
	}elseif($no=='D0022'){
		vusulan('bidang_d/D0022',$D0001);
	}elseif($no=='D0023'){
		vusulan('bidang_d/D0023',$D0001);
	}elseif($no=='D0024'){
		vusulan('bidang_d/D0024',$D0001);
	}elseif($no=='D0025'){
		vusulan('bidang_d/D0025',$D0001);
	}elseif($no=='D0026'){
		vusulan('bidang_d/D0026',$D0001);
	}elseif($no=='D0027'){
		vusulan('bidang_d/D0027',$D0001);
	}elseif($no=='D0028'){
		vusulan('bidang_d/D0028',$D0001);
	}elseif($no=='D0029'){
		vusulan('bidang_d/D0029',$D0001);
	}elseif($no=='D0030'){
		vusulan('bidang_d/D0030',$D0001);
	}elseif($no=='D0031'){
		vusulan('bidang_d/D0031',$D0001);
	}elseif($no=='D0032'){
		vusulan('bidang_d/D0032',$D0001);
	}elseif($no=='D0033'){
		vusulan('bidang_d/D0033',$D0001);
	}elseif($no=='D0034'){
		vusulan('bidang_d/D0034',$D0001);
	}elseif($no=='D0035'){
		vusulan('bidang_d/D0035',$D0001);
	}
}

function download_bidangd($id){ 
		force_download('assets/download_bidangd/'.$id,NULL);
		} 

		public function print_bidangd($no_usulan)
		{
			$printc['no_usulan'] = $no_usulan;
			$this->load->view('bidang_d/print_dupak_d',$printc);
		
		}
}
?>