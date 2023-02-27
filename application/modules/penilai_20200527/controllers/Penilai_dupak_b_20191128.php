<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penilai_dupak_b extends MX_Controller
{


	function __construct()
	{
		$this->load->model('m_penilai');
		$this->load->model('dupak');
		$this->load->helper(array('url','download','date_helper'));
	}
	
	function __destruct()
	{
	}
  
function dupak($no,$id){
	$B0001['no'] = $id;
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
	$B0001['usulan_status_id'] = $usulan_status_id;
	
	 $B0001['q_dupak']=$q_dupak;
	 $B0001['q1']=$q1;
	 $B0001['q2']=$q2;
	 $B0001['q3']=$q3;
	 $B0001['usulan']=$q_usulan;
	if($no=='B0001'){
		vusulan('bidang_b/B0001',$B0001);
	}elseif ($no=='B0002'){
		vusulan('bidang_b/B0002',$B0001);
	}elseif ($no=='B0003'){
		vusulan('bidang_b/B0003',$B0001);
	}elseif ($no=='B0004'){
		vusulan('bidang_b/B0004',$B0001);
	}elseif ($no=='B0005'){
		vusulan('bidang_b/B0005',$B0001);
	}elseif ($no=='B0006'){
		vusulan('bidang_b/B0006',$B0001);
	}elseif ($no=='B0007'){
		vusulan('bidang_b/B0007',$B0001);
	}elseif ($no=='B0008'){
		vusulan('bidang_b/B0008',$B0001);
	}elseif ($no=='B0009'){
		vusulan('bidang_b/B0009',$B0001);
	}elseif ($no=='B0010'){
		vusulan('bidang_b/B0010',$B0001);
	}elseif ($no=='B0011'){
		vusulan('bidang_b/B0011',$B0001);
	}elseif ($no=='B0012'){
		vusulan('bidang_b/B0012',$B0001);
	}elseif ($no=='B0013'){
		vusulan('bidang_b/B0013',$B0001);
	}elseif ($no=='B0014'){
		vusulan('bidang_b/B0014',$B0001);
	}elseif ($no=='B0015'){
		vusulan('bidang_b/B0015',$B0001);
	}elseif ($no=='B0016'){
		vusulan('bidang_b/B0016',$B0001);
	}elseif ($no=='B0017'){
		vusulan('bidang_b/B0017',$B0001);
	}elseif ($no=='B0018'){
		vusulan('bidang_b/B0018',$B0001);
	}elseif ($no=='B0019'){
		vusulan('bidang_b/B0019',$B0001);
	}elseif ($no=='B0020'){
		vusulan('bidang_b/B0020',$B0001);
	}elseif ($no=='B0021'){
		vusulan('bidang_b/B0021',$B0001);
	}elseif ($no=='B0022'){
		vusulan('bidang_b/B0022',$B0001);
	}elseif ($no=='B0023'){
		vusulan('bidang_b/B0023',$B0001);
	}elseif ($no=='B0024'){
		vusulan('bidang_b/B0024',$B0001);
	}elseif ($no=='B0025'){
		vusulan('bidang_b/B0025',$B0001);
	}elseif ($no=='B0026'){
		vusulan('bidang_b/B0026',$B0001);
	}elseif ($no=='B0027'){
		vusulan('bidang_b/B0027',$B0001);
	}elseif ($no=='B0028'){
		vusulan('bidang_b/B0028',$B0001);
	}elseif ($no=='B0029'){
		vusulan('bidang_b/B0029',$B0001);
	}elseif ($no=='B0030'){
		vusulan('bidang_b/B0030',$B0001);
	}elseif ($no=='B0031'){
		vusulan('bidang_b/B0031',$B0001);
	}elseif ($no=='B0032'){
		vusulan('bidang_b/B0032',$B0001);
	}elseif ($no=='B0033'){
		vusulan('bidang_b/B0033',$B0001);
	}elseif ($no=='B0034'){
		vusulan('bidang_b/B0034',$B0001);
	}elseif ($no=='B0035'){
		vusulan('bidang_b/B0035',$B0001);
	}elseif ($no=='B0036'){
		vusulan('bidang_b/B0036',$B0001);
	}elseif ($no=='B0037'){
		vusulan('bidang_b/B0037',$B0001);
	}elseif ($no=='B0038'){
		vusulan('bidang_b/B0038',$B0001);
	}
}

function update_b0001($dupak)
{
	$no_dupak_details = $this->input->post('no');
	$no_usulan = $this->input->post('no_usulan');
	$user_penilai_no = $this->input->post('user_penilai_no');
	$kum_penilai_keterangan = $this->input->post('kum_penilai_keterangan');
	$kum_penilai = $this->input->post('kum_penilai');
	$tgl_update=date("y-m-d H:i:s");
	
	//update keterangan dan kum penilai di table usulan_dupak_details
	$index = 0; // Set index array awal dengan 0
	foreach($no_dupak_details as $no)
	{
		$perintah="UPDATE
				  usulan_dupak_details
				SET
				  kum_penilai = '".$kum_penilai[$index]."',
				  kum_penilai_keterangan = '".$kum_penilai_keterangan[$index]."',
				  kunci='1',
				  user_penilai_no='".$user_penilai_no[$index]."',
				  updated_at='$tgl_update'
				WHERE no = '$no'";
		  $index++;
		  $this->db->query($perintah);
	}
	
	//cari kum_penilai dan hitung totalnya
	$cari_nilai_ak=$this->db->query("SELECT
		no,
		usulan_no,
		kum_penilai
	  FROM
	   `usulan_dupak_details`
	  WHERE usulan_no = '$no_usulan'
		AND `dupak_no` = '$dupak'");
		foreach($cari_nilai_ak->result() as $row){
			$kum_penilai_jml+=$row->kum_penilai;
		}
	
	//update kum penilai baru di table usulan_dupaks
	$perintah2="UPDATE
				  `usulan_dupaks`
				SET
				  `kum_penilai_baru` = '$kum_penilai_jml',
				   updated_at='$tgl_update'
				WHERE `usulan_no` = '$no_usulan'
				AND `dupak_no`='$dupak'";
	$this->db->query($perintah2);
	
	$this->session->set_flashdata('flash','Diupdate');
	redirect(base_url().'penilai/penilai_dupak_b/dupak/'.$dupak.'/'.$no_usulan);	
} 
}
?>