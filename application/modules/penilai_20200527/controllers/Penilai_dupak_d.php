<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penilai_dupak_d extends MX_Controller
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
  
function dupak($no,$id)
{
	$D0001['no'] = $id;
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
	 
	 $D0001['q_dupak']=$q_dupak;
	 $D0001['q1']=$q1;
	 $D0001['q2']=$q2;
	 $D0001['q3']=$q3;
	 $D0001['usulan']=$q_usulan;
	if($no=='D0001'){
		vpenilai('bidang_d/D0001',$D0001);
	}elseif($no=='D0002'){
		vpenilai('bidang_d/D0002',$D0001);
	}elseif($no=='D0003'){
		vpenilai('bidang_d/D0003',$D0001);
	}elseif($no=='D0004'){
		vpenilai('bidang_d/D0004',$D0001);
	}elseif($no=='D0005'){
		vpenilai('bidang_d/D0005',$D0001);
	}elseif($no=='D0006'){
		vpenilai('bidang_d/D0006',$D0001);
	}elseif($no=='D0007'){
		vpenilai('bidang_d/D0007',$D0001);
	}elseif($no=='D0008'){
		vpenilai('bidang_d/D0008',$D0001);
	}elseif($no=='D0009'){
		vpenilai('bidang_d/D0009',$D0001);
	}elseif($no=='D0010'){
		vpenilai('bidang_d/D0010',$D0001);
	}elseif($no=='D0011'){
		vpenilai('bidang_d/D0011',$D0001);
	}elseif($no=='D0012'){
		vpenilai('bidang_d/D0012',$D0001);
	}elseif($no=='D0013'){
		vpenilai('bidang_d/D0013',$D0001);
	}elseif($no=='D0014'){
		vpenilai('bidang_d/D0014',$D0001);
	}elseif($no=='D0015'){
		vpenilai('bidang_d/D0015',$D0001);
	}elseif($no=='D0016'){
		vpenilai('bidang_d/D0016',$D0001);
	}elseif($no=='D0017'){
		vpenilai('bidang_d/D0017',$D0001);
	}elseif($no=='D0018'){
		vpenilai('bidang_d/D0018',$D0001);
	}elseif($no=='D0019'){
		vpenilai('bidang_d/D0019',$D0001);
	}elseif($no=='D0020'){
		vpenilai('bidang_d/D0020',$D0001);
	}elseif($no=='D0021'){
		vpenilai('bidang_d/D0021',$D0001);
	}elseif($no=='D0022'){
		vpenilai('bidang_d/D0022',$D0001);
	}elseif($no=='D0023'){
		vpenilai('bidang_d/D0023',$D0001);
	}elseif($no=='D0024'){
		vpenilai('bidang_d/D0024',$D0001);
	}elseif($no=='D0025'){
		vpenilai('bidang_d/D0025',$D0001);
	}elseif($no=='D0026'){
		vpenilai('bidang_d/D0026',$D0001);
	}elseif($no=='D0027'){
		vpenilai('bidang_d/D0027',$D0001);
	}elseif($no=='D0028'){
		vpenilai('bidang_d/D0028',$D0001);
	}elseif($no=='D0029'){
		vpenilai('bidang_d/D0029',$D0001);
	}elseif($no=='D0030'){
		vpenilai('bidang_d/D0030',$D0001);
	}elseif($no=='D0031'){
		vpenilai('bidang_d/D0031',$D0001);
	}elseif($no=='D0032'){
		vpenilai('bidang_d/D0032',$D0001);
	}
}

function update_d0026($dupak)
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
	redirect(base_url().'penilai/penilai_dupak_d/dupak/'.$dupak.'/'.$no_usulan);	
}

function update_D0001($dupak)
{
	$no_dupak_details = $this->input->post('no');
	$no_usulan = $this->input->post('no_usulan');
	$user_penilai_no = $this->input->post('user_penilai_no');
	$kum_penilai_keterangan = $this->input->post('kum_penilai_keterangan');
	$kum_penilai = $this->input->post('kum_penilai');
	$thn_akademik = $this->input->post('thn_akademik');
	$tgl_update=date("y-m-d H:i:s");
	
	foreach($kum_penilai as $ha)
	{
	 $hasil_explode = explode(',',$ha);
	 $ak_pen=$hasil_explode[0];
	 $tahun_akademik=$hasil_explode[1];
	 
		$update_kum="UPDATE
			  usulan_dupak_details
			SET
			  kum_penilai = '$ak_pen'
			WHERE tahun_akademik = '$tahun_akademik'
				AND usulan_no='$no_usulan'
				AND dupak_no='$dupak'";
	  $this->db->query($update_kum);
	 }
	
	//update keterangan dan kum penilai di table usulan_dupak_details
	$index = 0; // Set index array awal dengan 0
	foreach($thn_akademik as $ta)
	{
		 $perintah="UPDATE
				  usulan_dupak_details
				SET
				  kum_penilai_keterangan = '".$kum_penilai_keterangan[$index]."',
				  kunci='1',
				  user_penilai_no='".$user_penilai_no[$index]."',
				  updated_at='$tgl_update'
				WHERE tahun_akademik = '$ta'
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
	redirect(base_url().'penilai/penilai_dupak_d/dupak/'.$dupak.'/'.$no_usulan);	
}

function update_D0003($dupak)
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
	redirect(base_url().'penilai/penilai_dupak_d/dupak/'.$dupak.'/'.$no_usulan);	
}


function hapus_d0001($dupak,$usulan_no)
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
	redirect(base_url().'penilai/penilai_dupak_d/dupak/'.$dupak.'/'.$usulan_no);	
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