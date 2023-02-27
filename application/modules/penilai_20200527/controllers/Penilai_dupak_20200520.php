<?php
defined('BASEPATH') OR exit('No direct script access allowed');



/**
 * @author akil
 * @version 1.0
 * @created 13-Mar-2016 20:19:38
 */
class Penilai_dupak extends MX_Controller
{


	function __construct()
	{
		$this->load->model('m_penilai');
		$this->load->model('dupak');
		$this->load->helper(array('url','download','date_helper'));
		if($this->session->userdata('status')!="login"){
			redirect(base_url().'login/login?pesan=belumlogin');
		}
			
		
	}


	function __destruct()
	{
	}
	function download_bidanga($id){ 
		force_download('assets/download_bidanga/'.$id,NULL);
		} 
		
	 function dupak($no,$id){
	$A0001['no'] = $id;
	$q_dupak=$this->db->query("SELECT * FROM usulan_dupaks a WHERE dupak_no='$no' and usulan_no='$id'")->row();	
	$q_usulan=$this->db->query("SELECT jabatan_usulan_no FROM usulans WHERE no='$id'")->row();	
	$q1=$this->db->query("SELECT berkas,transkrip,kunci,usulan_no,kum_penilai,kum_penilai_keterangan,no,`uraian`,`semester`,`tahun_akademik`,`tahun_akademik`+1 AS thn_akademik_baru,`tgl`,`satuan_hasil`,angka_kredit,`jumlah_volume`,(sks*jumlah_volume) AS total_sks,`kum_usulan`,`keterangan`,url,url_index,berkas FROM  `usulan_dupak_details` WHERE usulan_no = '$id' AND `dupak_no` = '$no'")->row();	
	$q2=$this->db->query("SELECT usulan_no,no,`uraian`,`semester`,`tahun_akademik`,`tahun_akademik`+1 AS thn_akademik_baru,`tgl`,`satuan_hasil`,sks,`jumlah_volume`,(sks*jumlah_volume) AS total_sks,`kum_usulan`,`keterangan`,url,url_index,berkas FROM  `usulan_dupak_details` WHERE usulan_no = '$id' AND `dupak_no` = '$no'");	

	$q3=$this->db->query("SELECT isbn,usulan_no,penulis_ke,jml_penulis,url,no,dupak_no,kum_penilai,kum_penilai_keterangan,`uraian`,`semester`,nim,nm_mhs,`tahun_akademik`,`tahun_akademik`+1 AS thn_akademik_baru,`tgl`, satuan_hasil,`keterangan`,angka_kredit,kum_penilai,kunci,
	berkas  FROM  `usulan_dupak_details` WHERE usulan_no = '$id' AND `dupak_no` = '$no'");
	
	$data_dasar=$this->db->query("SELECT
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
	$usulan_status_id=$data_dasar->usulan_status_id;
	$jabatan_no=$data_dasar->jabatan_no;
	
	$A0001['usulan_status_id'] = $usulan_status_id;
	$A0001['jabatan_no']=$jabatan_no;
	
	 $A0001['q_dupak']=$q_dupak;
	 $A0001['q1']=$q1;
	 $A0001['q2']=$q2;
	 $A0001['q3']=$q3;
	 $A0001['usulan']=$q_usulan;
if($no=='A0001'){
	vpenilai('bidang_a/a0001',$A0001);
}elseif ($no=='A0002'){
	vpenilai('bidang_a/a0002',$A0001);
}elseif ($no=='A0003'){
	vpenilai('bidang_a/a0003',$A0001);
}elseif ($no=='A0004'){
	vpenilai('bidang_a/a0004',$A0001);
}elseif ($no=='A0005'){
	vpenilai('bidang_a/a0005',$A0001);
}elseif ($no=='A0006'){
	vpenilai('bidang_a/a0006',$A0001);
}elseif ($no=='A0007'){
	vpenilai('bidang_a/a0007',$A0001);
}elseif ($no=='A0008'){
	vpenilai('bidang_a/a0008',$A0001);
}elseif ($no=='A0009'){
	vpenilai('bidang_a/a0009',$A0001);
}elseif ($no=='A0010'){
	vpenilai('bidang_a/a0010',$A0001);
}elseif ($no=='A0011'){
	vpenilai('bidang_a/a0011',$A0001);
}elseif ($no=='A0012'){
	vpenilai('bidang_a/a0012',$A0001);
}elseif ($no=='A0013'){
	vpenilai('bidang_a/a0013',$A0001);
}elseif ($no=='A0014'){
	vpenilai('bidang_a/a0014',$A0001);
}elseif ($no=='A0015'){
	vpenilai('bidang_a/a0015',$A0001);
}elseif ($no=='A0016'){
	vpenilai('bidang_a/a0016',$A0001);
}elseif ($no=='A0017'){
	vpenilai('bidang_a/a0017',$A0001);
}elseif ($no=='A0018'){
	vpenilai('bidang_a/a0018',$A0001);
}elseif ($no=='A0019'){
	vpenilai('bidang_a/a0019',$A0001);
}elseif ($no=='A0020'){
	vpenilai('bidang_a/a0020',$A0001);
}elseif ($no=='A0021'){
	vpenilai('bidang_a/a0021',$A0001);
}elseif ($no=='A0022'){
	vpenilai('bidang_a/a0022',$A0001);
}elseif ($no=='A0023'){
	vpenilai('bidang_a/a0023',$A0001);
}elseif ($no=='A0024'){
	vpenilai('bidang_a/a0024',$A0001);
}elseif ($no=='A0025'){
	vpenilai('bidang_a/a0025',$A0001);
}elseif ($no=='A0026'){
	vpenilai('bidang_a/a0026',$A0001);
}elseif ($no=='A0027'){
	vpenilai('bidang_a/a0027',$A0001);
}elseif ($no=='A0028'){
	vpenilai('bidang_a/a0028',$A0001);
}elseif ($no=='A0029'){
	vpenilai('bidang_a/a0029',$A0001);
}elseif ($no=='A0030'){
	vpenilai('bidang_a/a0030',$A0001);
}elseif ($no=='A0031'){
	vpenilai('bidang_a/a0031',$A0001);
}elseif ($no=='A0032'){
	vpenilai('bidang_a/a0032',$A0001);
}elseif ($no=='A0033'){
	vpenilai('bidang_a/a0033',$A0001);
}elseif ($no=='A0034'){
	vpenilai('bidang_a/a0034',$A0001);
}elseif ($no=='A0035'){
	vpenilai('bidang_a/a0035',$A0001);
}elseif ($no=='A0036'){
	vpenilai('bidang_a/a0036',$A0001);
}elseif ($no=='A0037'){
	vpenilai('bidang_a/a0037',$A0001);
}elseif ($no=='A0038'){
	vpenilai('bidang_a/a0038',$A0001);
}elseif ($no=='A0039'){
	vpenilai('bidang_a/a0039',$A0001);
}elseif ($no=='A0040'){
	vpenilai('bidang_a/a0040',$A0001);
}
}

function update_a0018($dupak)
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
	redirect(base_url().'penilai/penilai_dupak/dupak/'.$dupak.'/'.$no_usulan);	
} 

function hapus_a0004($dupak,$usulan_no)
{
	$update_details="UPDATE
					  `usulan_dupak_details`
					SET
					  `kum_penilai` = '0.00',
					  `kum_penilai_keterangan` = '',
					  kunci=''
					WHERE `usulan_no` = '$usulan_no'
					AND `dupak_no`='$dupak'";
	 $this->db->query($update_details);
	
	$update_dupak="UPDATE
					  `usulan_dupaks`
					SET
					  `kum_penilai_baru` = '0.00'
					WHERE `usulan_no` = '$usulan_no'
					AND `dupak_no`='$dupak'";
	 $this->db->query($update_dupak);
	
	$this->session->set_flashdata('flash','Dihapus');
	redirect(base_url().'penilai/penilai_dupak/dupak/'.$dupak.'/'.$usulan_no);	
}

function update_a0004($dupak)
{
	$berkas = $this->input->post('berkas');
	$sms = $this->input->post('sms');
	//$tahun_akademik = $this->input->post('tahun_akademik');
	$no_usulan = $this->input->post('no_usulan');
	$user_penilai_no = $this->input->post('user_penilai_no');
	$kum_penilai_keterangan = $this->input->post('kum_penilai_keterangan');
	$kum_penilai = $this->input->post('kum_penilai');
	$tgl_update=date("y-m-d H:i:s");
	
	foreach($kum_penilai as $ha)
	{
	 $hasil_explode = explode(',',$ha);
	 $ak_pen=$hasil_explode[0];
	 $semester=$hasil_explode[1];
	 $tahun_akademik=$hasil_explode[2];
	 
		$update_kum="UPDATE
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
	foreach($sms as $st)
	{
		 $hasil_ex = explode(',',$st);
		 $semester=$hasil_ex[0];
		 $tahun_akademik=$hasil_ex[1];
		
		 $perintah="UPDATE
				  usulan_dupak_details
				SET
				  kum_penilai_keterangan = '".$kum_penilai_keterangan[$index]."',
				  kunci='1',
				  user_penilai_no='".$user_penilai_no[$index]."',
				  updated_at='$tgl_update'
				WHERE tahun_akademik = '$tahun_akademik'
				AND semester='$semester'
				AND usulan_no='$no_usulan'
				AND dupak_no='$dupak'";
		  $index++;
		  $this->db->query($perintah);
	}
	
	//cari kum_penilai dan hitung totalnya
	$kum_penilai_jml=0;
	$cari_nilai_ak=$this->db->query("SELECT
		no,
		usulan_no,
		kum_penilai,
		berkas
	  FROM
	   `usulan_dupak_details`
	  WHERE usulan_no = '$no_usulan'
		AND `dupak_no` = '$dupak'
		GROUP BY semester,tahun_akademik");
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
	
	$this->session->set_flashdata('flash','Disimpan');
	redirect(base_url().'penilai/penilai_dupak/dupak/'.$dupak.'/'.$no_usulan);	
}  

function update_a0001($dupak)
{
	$no_dupak_details = $this->input->post('no');
	$no_usulan = $this->input->post('no_usulan');
	$user_penilai_no = $this->input->post('user_penilai_no');
	$kum_penilai_keterangan = $this->input->post('kum_penilai_keterangan');
	$kum_penilai = $this->input->post('kum_penilai');
	$sms = $this->input->post('sms');
	$tgl_update=date("y-m-d H:i:s");
	
	foreach($kum_penilai as $ha)
	{
	 $hasil_explode = explode(',',$ha);
	 $ak_pen=$hasil_explode[0];
	 $semester=$hasil_explode[1];
	 $tahun_akademik=$hasil_explode[2];
	 
		$update_kum="UPDATE
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
	foreach($sms as $st)
	{
		 $hasil_ex = explode(',',$st);
		 $semester=$hasil_ex[0];
		 $tahun_akademik=$hasil_ex[1];
		 
		 echo"$semester<br>";
		 echo"$tahun_akademik<br><br>";
		 
		
		 $perintah="UPDATE
				  usulan_dupak_details
				SET
				  kum_penilai_keterangan = '".$kum_penilai_keterangan[$index]."',
				  kunci='1',
				  user_penilai_no='".$user_penilai_no[$index]."',
				  updated_at='$tgl_update'
				WHERE tahun_akademik = '$tahun_akademik'
				AND semester='$semester'
				AND usulan_no='$no_usulan'
				AND dupak_no='$dupak'";
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
	
	$this->session->set_flashdata('flash','Disimpan');
	redirect(base_url().'penilai/penilai_dupak/dupak/'.$dupak.'/'.$no_usulan);	
} 

function hapus_a0001($dupak,$usulan_no)
{
	$update_details="UPDATE
					  `usulan_dupak_details`
					SET
					  `kum_penilai` = '0.00',
					  `kum_penilai_keterangan` = '',
					  kunci=''
					WHERE `usulan_no` = '$usulan_no'
					AND `dupak_no`='$dupak'";
	 $this->db->query($update_details);
	
	$update_dupak="UPDATE
					  `usulan_dupaks`
					SET
					  `kum_penilai_baru` = '0.00'
					WHERE `usulan_no` = '$usulan_no'
					AND `dupak_no`='$dupak'";
	 $this->db->query($update_dupak);
	
	$this->session->set_flashdata('flash','Dihapus');
	redirect(base_url().'penilai/penilai_dupak/dupak/'.$dupak.'/'.$usulan_no);	
}



}
?>