<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usulan_dupak_c extends MX_Controller
{


	function __construct()
	{
		
		$this->load->helper(array('url','download','date_helper'));
	}
	
	function __destruct()
	{
	}
  
function dupak($no,$id){
	$C0001['no'] = $id;
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
							  sertifikat,
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
	$C0001['usulan_status_id'] = $usulan_status_id;
	$C0001['dasar']=$data_dasar;
	 $C0001['q_dupak']=$q_dupak;
	 $C0001['q1']=$q1;
	 $C0001['q2']=$q2;
	 $C0001['q3']=$q3;
	 $C0001['usulan']=$q_usulan;
	if($no=='C0001'){
		vusulan('bidang_c/C0001',$C0001);
	}elseif($no=='C0002'){
		vusulan('bidang_c/C0002',$C0001);
	}elseif($no=='C0003'){
		vusulan('bidang_c/C0003',$C0001);
	}elseif($no=='C0004'){
		vusulan('bidang_c/C0004',$C0001);
	}elseif($no=='C0005'){
		vusulan('bidang_c/C0005',$C0001);
	}elseif($no=='C0006'){
		vusulan('bidang_c/C0006',$C0001);
	}elseif($no=='C0007'){
		vusulan('bidang_c/C0007',$C0001);
	}elseif($no=='C0008'){
		vusulan('bidang_c/C0008',$C0001);
	}elseif($no=='C0009'){
		vusulan('bidang_c/C0009',$C0001);
	}elseif($no=='C0010'){
		vusulan('bidang_c/C0010',$C0001);
	}elseif($no=='C0011'){
		vusulan('bidang_c/C0011',$C0001);
	}elseif($no=='C0012'){
		vusulan('bidang_c/C0012',$C0001);
	}elseif($no=='C0013'){
		vusulan('bidang_c/C0013',$C0001);
	}elseif($no=='C0014'){
		vusulan('bidang_c/C0014',$C0001);
	}elseif($no=='C0015'){
		vusulan('bidang_c/C0015',$C0001);
	}elseif($no=='C0016'){
		vusulan('bidang_c/C0016',$C0001);
	}
}

function download_bidangc($id){ 
		force_download('assets/download_bidangc/'.$id,NULL);
		} 

		public function print_bidangc($no_usulan)
		{
			$printc['no_usulan'] = $no_usulan;
			$this->load->view('bidang_c/print_dupak_c',$printc);
		
		}
		
}
?>