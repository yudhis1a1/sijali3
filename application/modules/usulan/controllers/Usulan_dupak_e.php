<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usulan_dupak_e extends MX_Controller
{


	function __construct()
	{
		$this->load->model('draft');
		$this->load->model('dupak');
		$this->load->helper(array('url','download','date_helper'));
		if($this->session->userdata('status')!="login"){
			redirect(base_url().'login/login?pesan=belumlogin');
		}
	}
	
	function __destruct()
	{
	}
  
function dupak($no,$id){
	$E0001['no'] = $id;
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
							  berkas,
							  kum_penilai,
							  kum_penilai_keterangan
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'
							  ");	
	$q3=$this->db->query("SELECT
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
							ORDER by tahun_akademik asc");	
	$data_dasar=$this->db->query("SELECT * from usulans where no='$id'")->row();
	$usulan_status_id=$data_dasar->usulan_status_id;
	
	$cari_jab=$this->db->query("SELECT
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
	$jabatan_no=$cari_jab->jabatan_no;
	$jabatan_tgl=$cari_jab->jabatan_tgl;
	$pengangkatan_tgl=$cari_jab->pengangkatan_tgl;
	$E0001['jabatan_no'] = $jabatan_no;
	$E0001['jabatan_tgl'] = $jabatan_tgl;
	$E0001['pengangkatan_tgl'] = $pengangkatan_tgl;

	$role = $this->session->userdata('role');
	$E0001['usulan_status_id'] = $usulan_status_id;
	$E0001['role']=$role;
	$E0001['q_dupak']=$q_dupak;
	$E0001['dupak_no']=$no;
	$E0001['q1']=$q1;
	$E0001['q2']=$q2;
	$E0001['q3']=$q3;
	$E0001['usulan']=$q_usulan;
	
	if($no=='E0001'){
		vusulan('bidang_e/E0001',$E0001);
	}elseif($no=='E0002'){
		vusulan('bidang_e/E0002',$E0001);
	}elseif($no=='E0003'){
		vusulan('bidang_e/E0003',$E0001);
	}elseif($no=='E0004'){
		vusulan('bidang_e/E0004',$E0001);
	}elseif($no=='E0005'){
		vusulan('bidang_e/E0005',$E0001);
	}elseif($no=='E0006'){
		vusulan('bidang_e/E0006',$E0001);
	}elseif($no=='E0007'){
		vusulan('bidang_e/E0007',$E0001);
	}elseif($no=='E0008'){
		vusulan('bidang_e/E0008',$E0001);
	}elseif($no=='E0009'){
		vusulan('bidang_e/E0009',$E0001);
	}elseif($no=='E0010'){
		vusulan('bidang_e/E0010',$E0001);
	}elseif($no=='E0011'){
		vusulan('bidang_e/E0011',$E0001);
	}
}

function tambah_E0001($dupak,$no_usulan)
{
	$uraian = addslashes($this->input->post('uraian'));
	$semester = $this->input->post('semester');
	$thn_akademik = $this->input->post('thn_akademik');
	
	$tgl_create=date("y-m-d H:i:s");
	$tgl_update=date("y-m-d H:i:s");
	$no=date("ymdHis").'01';
	
	$perintah="INSERT INTO usulan_dupak_details (
		no,
		usulan_no,
		dupak_no,
		uraian,
		semester,
		tahun_akademik,
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
		  '$tgl_create',
		  '$tgl_create'
		)";
	$masuk=$this->db->query($perintah);
	
	$perintah2="INSERT INTO usulan_dupaks (
			no,
			usulan_no,
			dupak_no,
			created_at,
			updated_at
		  )
		  VALUES
			(
			  '$no',
			  '$no_usulan',
			  '$dupak',
			  '$tgl_create',
			  '$tgl_create'
			)";
	$masuk2=$this->db->query($perintah2);
	
	if($masuk && $masuk2)
	{
		$this->session->set_flashdata('flash','Ditambah');
		redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
	}else{
		$this->session->set_flashdata('error','Gagal Menyimpan');
		redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
		
	}
		
}

function tambah_E0005($dupak,$no_usulan)
{
	$uraian = addslashes($this->input->post('uraian'));
	
	$tgl_create=date("y-m-d H:i:s");
	$tgl_update=date("y-m-d H:i:s");
	$no=date("ymdHis").'01';
	
	$cari_udup=$this->db->query("select * from usulan_dupak_details where dupak_no='$dupak' AND usulan_no='$no_usulan' AND semester='$_POST[semester]' AND tahun_akademik='$_POST[thn_akademik]'")->row();
	if($cari_udup > 0)
	{
		$this->session->set_flashdata('error','Data semester sudah ada, silakan hapus dulu data yang sudah terinput.');
		redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
	}else
	{
		
		$perintah="INSERT INTO usulan_dupak_details (
			no,
			usulan_no,
			dupak_no,
			uraian,
			semester,
			tahun_akademik,
			jumlah_volume,
			angka_kredit,
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
			  '$_POST[mhs]',
			  '$_POST[ak]',
			  '$tgl_create',
			  '$tgl_create'
			)";
		$masuk=$this->db->query($perintah);
		
		$q_dupak=$this->db->query("select *from usulan_dupaks where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
		if($q_dupak > 0)
		{
			$q1=$this->db->query("SELECT
									angka_kredit
								  FROM
								   `usulan_dupak_details`
								  WHERE usulan_no = '$no_usulan'
									AND `dupak_no` = '$dupak'
									AND `semester` = '$_POST[semester]'
									AND tahun_akademik='$_POST[thn_akademik]'");
			foreach($q1->result() as $row){
				$angka_kredit=0;
				$angka_kredit+=$row->angka_kredit;
			}
			$total_update=$q_dupak->kum_usulan_baru+$angka_kredit;
			$update="update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
			$this->db->query($update);
		}else
		{
			$per="INSERT INTO usulan_dupaks (
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
						  '$_POST[ak]',
						  '$tgl_create',
						  '$tgl_create'
						)";
			$this->db->query($per);
		}
		
		if($masuk)
		{
			$this->session->set_flashdata('flash','Ditambah');
			redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
		}else{
			$this->session->set_flashdata('error','Gagal Menyimpan');
			redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
			
		}
	}
}

function update_e0001($dupak,$no_usulan_dupak_details,$no_usulan)
{
	$uraian = $this->input->post('uraian');
	$tgl_create=date("y-m-d H:i:s");
	$tgl_update=date("y-m-d H:i:s");
	$no=date("ymdHis").'01';
	
	$where = array('no' => $no_usulan_dupak_details);			
	$data = array(
			'uraian' => $uraian,
			'updated_at' => $tgl_update
			);
		
	$this->dupak->update_data($where,$data,'usulan_dupak_details');
	$this->session->set_flashdata('flash','Diubah');
	redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
}

function update_e0005($dupak,$no_usulan_dupak_details,$no_usulan)
{
	$uraian = $this->input->post('uraian');
	$mhs = $this->input->post('mhs');
	$ak = $this->input->post('ak');
	
	$tgl_create=date("y-m-d H:i:s");
	$tgl_update=date("y-m-d H:i:s");
	$no=date("ymdHis").'01';
	
	$where = array('no' => $no_usulan_dupak_details);			
	$data = array(
			'uraian' => $uraian,
			'jumlah_volume' => $mhs,
			'angka_kredit' => $ak,
			'updated_at' => $tgl_update
			);
	$this->dupak->update_data($where,$data,'usulan_dupak_details');
	
	$q1=$this->db->query("SELECT
							angka_kredit
						  FROM
						   `usulan_dupak_details`
						  WHERE usulan_no = '$no_usulan'
							AND `dupak_no` = '$dupak'");
	foreach($q1->result() as $row){
		$angka_kredit+=$row->angka_kredit;
	}
	
	$update="update usulan_dupaks set kum_usulan_baru ='$angka_kredit' where dupak_no='$dupak' and usulan_no='$no_usulan'";
	$this->db->query($update);
	
	$this->session->set_flashdata('flash','Diubah');
	redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
}

function hapus_E0001($id,$no_usulan,$dupak)
{
	$where = array('no' => $id);
	$query_cari=$this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
	
	if($query_cari == 1)
	{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$hapus="delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($hapus);	
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
	}else{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
	}
			
}

function hapus_E0005($id,$no_usulan,$dupak)
{
	$where = array('no' => $id);
	$query_cari=$this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
	
	if($query_cari == 1)
	{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$hapus="delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($hapus);	
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
	}else{
		$q_cari=$this->db->query("select *from usulan_dupak_details where no='$id'")->row();
		$ak=$q_cari->angka_kredit;
		
		$update="update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$ak where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($update);
		
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_e/dupak/'.$dupak.'/'.$no_usulan);
	}
			
}



		
}
?>