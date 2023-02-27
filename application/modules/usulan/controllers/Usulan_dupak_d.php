<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usulan_dupak_d extends MX_Controller
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
							  satuan_hasil,
							  `keterangan`,
							  berkas,
							  angka_kredit,
							  kum_penilai,
							  kum_penilai_keterangan
							FROM
							  `usulan_dupak_details`
							WHERE usulan_no = '$id'
							  AND `dupak_no` = '$no'
							  ");	
	$data_dasar=$this->db->query("SELECT * from usulans where no='$id'")->row();
	$usulan_status_id=$data_dasar->usulan_status_id;
	$D0001['usulan_status_id'] = $usulan_status_id;
	
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
	$D0001['jabatan_no'] = $jabatan_no;
	$D0001['jabatan_tgl'] = $jabatan_tgl;
	$D0001['pengangkatan_tgl'] = $pengangkatan_tgl;
	
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

function tambah_D0003($dupak,$kum)
{
	$no_dupak = $this->input->post('no_dupak');
	$no_usulan = $this->input->post('no_usulan');
	$uraian = addslashes($this->input->post('uraian'));
	$semester = $this->input->post('semester');
	$thn_akademik = $this->input->post('thn_akademik');
	$tgl = $this->input->post('tgl');
	$satuan_hasil = $this->input->post('satuan_hasil');
	$keterangan = addslashes($this->input->post('keterangan'));
	$no_usulan_detail = $this->input->post('no_usulan_detail');
	$sks = $this->input->post('sks');
	$kum = $this->input->post('kum');
	$volum = $this->input->post('volum');
	$url = $this->input->post('url');
	$url_index = $this->input->post('url_index');
	
	$tgl_create=date("y-m-d H:i:s");
	$tgl_update=date("y-m-d H:i:s");
	$no=date("ymdHis").'07'.$this->session->userdata('username');
	$file_path = './assets/download_bidangd/';
	mkdir($file_path, 0777, true);
	$config['upload_path'] = $file_path;
	$config['allowed_types'] = 'pdf';
	$config['max_size'] = '5048';
	$config['file_name'] = 'File'.date("ymdHis").$no;
	$this->load->library('upload',$config);
	
			if($this->upload->do_upload('berkas'))
			{
				$image=$this->upload->data();
				$perintah2="INSERT INTO usulan_dupak_details (
					no,
					usulan_no,
					dupak_no,
					uraian,
					semester,
					tahun_akademik,
					tgl,
					satuan_hasil,
					jumlah_volume,
					angka_kredit,
					keterangan,
					url,
					url_index,
					berkas,
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
					  '$_POST[tgl]',
					  '$_POST[satuan_hasil]',
					  '1',
					  '$kum',
					  '$_POST[keterangan]',
					  '$url',
					  '$url_index',
					  '$image[file_name]',
					  '$tgl_create',
					  '$tgl_create'
					)";
					$this->db->query($perintah2);
			}else{
				$this->session->set_flashdata('error','Format dan Ukuran File Tidak Sesuai');
					redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
			}
			$q_dupak=$this->db->query("select *from usulan_dupaks where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
			if($q_dupak > 0)
			{
				$q1=$this->db->query("SELECT
				no,
				`uraian`,
				`semester`,
				`tahun_akademik`,
				`tahun_akademik`+1 AS thn_akademik_baru,
				`tgl`,
				`satuan_hasil`,
				angka_kredit,
				`kum_usulan`,
				`keterangan`,
				url,
				url_index,
				berkas
			  FROM
			   `usulan_dupak_details`
			  WHERE usulan_no = '$no_usulan'
				AND `dupak_no` = '$dupak'
				
				AND semester='$semester'
				AND tahun_akademik='$thn_akademik'");
				foreach($q1->result() as $row){
					$angka_kredit=0;
					$angka_kredit+=$row->angka_kredit;
				}
				$total_update=$q_dupak->kum_usulan_baru+$angka_kredit;
				$update="update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
				$this->db->query($update);
			}else
			{
				$q2=$this->db->query("SELECT
				no,
				uraian,
				semester,
				tahun_akademik,
				tahun_akademik+1 AS thn_akademik_baru,
				tgl,
				satuan_hasil,
				angka_kredit,
				kum_usulan,
				keterangan,
				url,
				url_index,
				berkas
				FROM
			   usulan_dupak_details
			  WHERE usulan_no = '$no_usulan'
				AND dupak_no = '$dupak'
				AND kunci = '0' ");
				foreach($q2->result() as $row2){
					$angka_kredit=0;
					$angka_kredit+=$row2->angka_kredit;
				}
				$total_update=$q_dupak->kum_usulan_baru+$angka_kredit;
				$perintah="INSERT INTO usulan_dupaks (
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
					  '$kum',
					  '$tgl_create',
					  '$tgl_create'
					)";
					$this->db->query($perintah);
			}
			if($perintah2)
			{
				$this->session->set_flashdata('flash','Ditambah');
			redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
			
			}else{
				$this->session->set_flashdata('error','Gagal Menyimpan');
				redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
				
			}
		
}

function hapus_D0003($id,$no_usulan,$berkas,$dupak,$kum)
{
	unlink('assets/download_bidangd/'.$berkas);
	$where = array('no' => $id);
	$query_cari=$this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
	if($query_cari == 1)
	{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$hapus="delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($hapus);	
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
	}else{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$update="update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$kum where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($update);
		$this->session->set_flashdata('flash','Dihapus');
	redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
	}
			
}

function tambah_D0014($dupak,$kum)
{
	$no_dupak = $this->input->post('no_dupak');
	$no_usulan = $this->input->post('no_usulan');
	$uraian = addslashes($this->input->post('uraian'));
	$semester = $this->input->post('semester');
	$thn_akademik = $this->input->post('thn_akademik');
	$tgl = $this->input->post('tgl');
	$satuan_hasil = $this->input->post('satuan_hasil');
	$keterangan = addslashes($this->input->post('keterangan'));
	$no_usulan_detail = $this->input->post('no_usulan_detail');
	$sks = $this->input->post('sks');
	$kum = $this->input->post('kum');
	$volum = $this->input->post('volum');
	$url = $this->input->post('url');
	$url_index = $this->input->post('url_index');
	
	$tgl_create=date("y-m-d H:i:s");
	$tgl_update=date("y-m-d H:i:s");
	$no=date("ymdHis").'07'.$this->session->userdata('username');
	$file_path = './assets/download_bidangd/';
	mkdir($file_path, 0777, true);
	$config['upload_path'] = $file_path;
	$config['allowed_types'] = 'pdf';
	$config['max_size'] = '5048';
	$config['file_name'] = 'File'.date("ymdHis").$no;
	$this->load->library('upload',$config);
	if($this->upload->do_upload('berkas'))
	{
		$image=$this->upload->data();
		$perintah2="INSERT INTO usulan_dupak_details (
			no,
			usulan_no,
			dupak_no,
			uraian,
			semester,
			tahun_akademik,
			tgl,
			satuan_hasil,
			jumlah_volume,
			angka_kredit,
			keterangan,
			url,
			url_index,
			berkas,
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
			  '$_POST[tgl]',
			  '$_POST[satuan_hasil]',
			  '1',
			  '$kum',
			  '$_POST[keterangan]',
			  '$url',
			  '$url_index',
			  '$image[file_name]',
			  '$tgl_create',
			  '$tgl_create'
			)";
			$this->db->query($perintah2);
	}else{
		$this->session->set_flashdata('error','Format dan Ukuran File Tidak Sesuai');
			redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
	}
	$q_dupak=$this->db->query("select *from usulan_dupaks where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
	if($q_dupak > 0)
	{
		$q1=$this->db->query("SELECT
		no,
		`uraian`,
		`semester`,
		`tahun_akademik`,
		`tahun_akademik`+1 AS thn_akademik_baru,
		`tgl`,
		`satuan_hasil`,
		angka_kredit,
		`kum_usulan`,
		`keterangan`,
		url,
		url_index,
		berkas
	  FROM
	   `usulan_dupak_details`
	  WHERE usulan_no = '$no_usulan'
		AND `dupak_no` = '$dupak'
		");
		foreach($q1->result() as $row){
			//$angka_kredit=0;
			$angka_kredit+=$row->angka_kredit;
		}
		$update="update usulan_dupaks set kum_usulan_baru ='$angka_kredit' where dupak_no='$dupak' and usulan_no='$no_usulan'";
		$this->db->query($update);
	}else
	{
		$q2=$this->db->query("SELECT
		no,
		uraian,
		semester,
		tahun_akademik,
		tahun_akademik+1 AS thn_akademik_baru,
		tgl,
		satuan_hasil,
		angka_kredit,
		kum_usulan,
		keterangan,
		url,
		url_index,
		berkas
		FROM
	   usulan_dupak_details
	  WHERE usulan_no = '$no_usulan'
		AND dupak_no = '$dupak'
		AND kunci = '0' ");
		foreach($q2->result() as $row2){
			//$angka_kredit=0;
			$angka_kredit+=$row2->angka_kredit;
		}
		$total_update=$q_dupak->kum_usulan_baru+$angka_kredit;
		$perintah="INSERT INTO usulan_dupaks (
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
			  '$kum',
			  '$tgl_create',
			  '$tgl_create'
			)";
			$this->db->query($perintah);
	}
	if($perintah2)
	{
		$this->session->set_flashdata('flash','Ditambah');
		redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
	}else{
		$this->session->set_flashdata('error','Gagal Menyimpan');
		redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
		
	}

}

function hapus_D0014($id,$no_usulan,$berkas,$dupak,$kum)
{
	unlink('assets/download_bidangd/'.$berkas);
	$where = array('no' => $id);
	$query_cari=$this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
	if($query_cari == 1)
	{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$hapus="delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($hapus);	
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
	}else{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$update="update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$kum where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($update);
		$this->session->set_flashdata('flash','Dihapus');
	redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
	}
			
}

function tambah_D0001($dupak,$kum)
{
	$no_dupak = $this->input->post('no_dupak');
	$no_usulan = $this->input->post('no_usulan');
	$uraian = addslashes($this->input->post('uraian'));
	$thn_akademik = $this->input->post('thn_akademik');
	$tgl = $this->input->post('tgl');
	$satuan_hasil = $this->input->post('satuan_hasil');
	$keterangan = addslashes($this->input->post('keterangan'));
	$no_usulan_detail = $this->input->post('no_usulan_detail');
	$sks = $this->input->post('sks');
	$kum = $this->input->post('kum');
	$volum = $this->input->post('volum');
	$tgl_create=date("y-m-d H:i:s");
	$tgl_update=date("y-m-d H:i:s");
	$no=date("ymdHis").'07'.$this->session->userdata('username');
	$file_path = './assets/download_bidangd/';
	mkdir($file_path, 0777, true);
	$config['upload_path'] = $file_path;
	$config['allowed_types'] = 'pdf';
	$config['max_size'] = '5048';
	$config['file_name'] = 'File'.date("ymdHis").$no;
	$this->load->library('upload',$config);
	
			if($this->upload->do_upload('berkas')){
				$image=$this->upload->data();
				$perintah2="INSERT INTO usulan_dupak_details (
					no,
					usulan_no,
					dupak_no,
					uraian,
					tahun_akademik,
					tgl,
					satuan_hasil,
					jumlah_volume,
					angka_kredit,
					keterangan,
					berkas,
					created_at,
					updated_at
				  )
				  VALUES
					(
					  '$no',
					  '$no_usulan',
					  '$dupak',
					  '$uraian',
					  '$_POST[thn_akademik]',
					  '$_POST[tgl]',
					  '$_POST[satuan_hasil]',
					  '1',
					  '$kum',
					  '$_POST[keterangan]',
					  '$image[file_name]',
					  '$tgl_create',
					  '$tgl_create'
					)";
					$this->db->query($perintah2);
			}else{
				$this->session->set_flashdata('error','Format dan Ukuran File Tidak Sesuai');
					redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
			}
			$q_dupak=$this->db->query("select *from usulan_dupaks where dupak_no='$dupak' and usulan_no='$no_usulan'")->row();
			if($q_dupak > 0)
			{
				$q1=$this->db->query("SELECT
				no,
				`uraian`,
				`tahun_akademik`,
				`tahun_akademik`+1 AS thn_akademik_baru,
				`tgl`,
				`satuan_hasil`,
				angka_kredit,
				`kum_usulan`,
				`keterangan`,
				url,
				url_index,
				berkas
			  FROM
			   `usulan_dupak_details`
			  WHERE usulan_no = '$no_usulan'
				AND `dupak_no` = '$dupak'
				AND tahun_akademik='$thn_akademik'");
				foreach($q1->result() as $row){
					$angka_kredit=0;
					$angka_kredit+=$row->angka_kredit;
				}
				$total_update=$q_dupak->kum_usulan_baru+$angka_kredit;
				$update="update usulan_dupaks set kum_usulan_baru ='$total_update' where dupak_no='$dupak' and usulan_no='$no_usulan'";
				$this->db->query($update);
			}else
			{
				$q2=$this->db->query("SELECT
				no,
				uraian,
				tahun_akademik,
				tahun_akademik+1 AS thn_akademik_baru,
				tgl,
				satuan_hasil,
				angka_kredit,
				kum_usulan,
				keterangan,
				url,
				url_index,
				berkas
				FROM
			   usulan_dupak_details
			  WHERE usulan_no = '$no_usulan'
				AND dupak_no = '$dupak'
				AND kunci = '0' ");
				foreach($q2->result() as $row2){
					$angka_kredit=0;
					$angka_kredit+=$row2->angka_kredit;
				}
				$total_update=$q_dupak->kum_usulan_baru+$angka_kredit;
				$perintah="INSERT INTO usulan_dupaks (
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
					  '$kum',
					  '$tgl_create',
					  '$tgl_create'
					)";
					$this->db->query($perintah);
			}
			if($perintah2)
			{
				$this->session->set_flashdata('flash','Ditambah');
			redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
			
			}else{
				$this->session->set_flashdata('error','Gagal Menyimpan');
				redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
				
			}
			
}

function update_D0001($dupak)
{
	$no_dupak = $this->input->post('no_dupak');
	$no_usulan = $this->input->post('no_usulan');
	$no_usulan_dupak_details = $this->input->post('no_usulan_dupak_details');
	$uraian = addslashes($this->input->post('uraian'));
	$tgl = $this->input->post('tgl');
	$satuan_hasil = $this->input->post('satuan_hasil');
	$keterangan = addslashes($this->input->post('keterangan'));
	$tgl_create=date("y-m-d H:i:s");
	$tgl_update=date("y-m-d H:i:s");
	$no=date("ymdHis").'07'.$this->session->userdata('username');
	$file_path = './assets/download_bidangd/';
	mkdir($file_path, 0777, true);
	$config['upload_path'] = $file_path;
	$config['allowed_types'] = 'pdf';
	$config['max_size'] = '5048';
	$config['file_name'] = 'File'.date("ymdHis").$no;
	
	$this->load->library('upload',$config);
	if($this->upload->do_upload('berkas')){
		$where = array('no' => $no_usulan_dupak_details);
		$image=$this->upload->data();			
		$data = array(
			'uraian' => $uraian,
			'tgl' => $tgl,
			'satuan_hasil' => $satuan_hasil,
			'berkas' => $image['file_name'],
			'updated_at' => $tgl_update
		);
		unlink('assets/download_bidangd/'.$this->input->post('old_pict', TRUE));
	}else{
		$where = array('no' => $no_usulan_dupak_details);			
		$data = array(
			'uraian' => $uraian,
			'tgl' => $tgl,
			'satuan_hasil' => $satuan_hasil,
			'updated_at' => $tgl_update
		);		
	}
	$this->session->set_flashdata('flash','Diubah');
	$this->dupak->update_data($where,$data,'usulan_dupak_details');
	redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
		
}

function hapus_D0001($id,$no_usulan,$berkas,$dupak,$kum)
{
	unlink('assets/download_bidangd/'.$berkas);
	$where = array('no' => $id);
	$query_cari=$this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
	if($query_cari == 1)
	{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$hapus="delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($hapus);	
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
	}else{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$update="update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$kum where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($update);
		$this->session->set_flashdata('flash','Dihapus');
	redirect(base_url().'usulan/usulan_dupak_d/dupak/'.$dupak.'/'.$no_usulan);
	}
			
}

function hapus_ijazah($id,$no_usulan,$berkas,$dupak){
		unlink('assets/download_bidangd/'.$berkas);
		$where = array('no' => $id);
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$this->dupak->delete_data($where,'usulan_dupaks');
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak/dupak/'.$dupak.'/'.$no_usulan);
			
	}
	 
function download_bidangd($id){ 
		// force_download('assets/download_bidangd/'.$id,NULL);
	echo '<iframe src="'.base_url().'assets/download_bidangd/'.$id.'" width="100%" height="900" style="border: none;"></iframe>';
		
		} 

public function print_bidangd($no_usulan)
{
	$printc['no_usulan'] = $no_usulan;
	$this->load->view('bidang_d/print_dupak_d',$printc);

}

}
?>