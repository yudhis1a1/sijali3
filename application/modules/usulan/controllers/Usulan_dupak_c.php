<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usulan_dupak_c extends MX_Controller
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
							  ");	
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
	$C0001['jabatan_no'] = $jabatan_no;
	$C0001['jabatan_tgl'] = $jabatan_tgl;
	$C0001['pengangkatan_tgl'] = $pengangkatan_tgl;

	$role = $this->session->userdata('role');
	$C0001['usulan_status_id'] = $usulan_status_id;
	$C0001['role']=$role;
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

function tambah_C0001($dupak,$kum)
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
	$no=date("ymdHis").'01';
	$file_path = './assets/download_bidangc/';
	mkdir($file_path, 0777, true);
	$config['upload_path'] = $file_path;
	$config['allowed_types'] = 'pdf';
	$config['max_size'] = '5048';
	$config['file_name'] = 'File'.date("ymdHis").$no;
	$this->load->library('upload',$config);
			
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
					  '$tgl_create',
					  '$tgl_create'
					)";
					$this->db->query($perintah2);
			
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
			redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
			
			}else{
				$this->session->set_flashdata('error','Gagal Menyimpan');
				redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
				
			}
		
}

function update_c0001($dupak)
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
	$no=date("ymdHis").'01';
	$file_path = './assets/download_bidangc/';
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
		unlink('assets/download_bidangc/'.$this->input->post('old_pict', TRUE));
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
	redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
		
}

function hapus_C0001($id,$no_usulan,$dupak,$kum)
{
	//unlink('assets/download_bidangc/'.$berkas);
	$where = array('no' => $id);
	$query_cari=$this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
	$query_x=$this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and no='$id'")->row();
	$berkas=$query_x->berkas;
	$modul=$query_x->modul;
	$proposal=$query_x->proposal;
	$laporan=$query_x->laporan;
	$sertifikat=$query_x->sertifikat;
	unlink('assets/download_bidangc/'.$berkas);
	unlink('assets/download_bidangc/'.$modul);
	unlink('assets/download_bidangc/'.$proposal);
	unlink('assets/download_bidangc/'.$laporan);
	unlink('assets/download_bidangc/'.$sertifikat);
	if($query_cari == 1)
	{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$hapus="delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($hapus);	
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
	}else{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$update="update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$kum where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($update);
		$this->session->set_flashdata('flash','Dihapus');
	redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
	}
			
}


function upload_file($dupak)
{
		$jenis = $this->input->post('jenis');
		$no_usulan = $this->input->post('no_usulan');
		$tgl_create=date("y-m-d H:i:s");
		$tgl_update=date("y-m-d H:i:s");
		$no=date("ymdHis").'01';
		$pecah =explode(',',$jenis);
		$nm_jenis=$pecah[0];
		$usulan_detail=$pecah[1];
		//var_dump($nm_jenis,$usulan_detail);
		$file_path = './assets/download_bidangc/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '10048';
		$config['file_name'] = 'File'.date("ymdHis").$no;
		$this->load->library('upload',$config);
		
		if($this->upload->do_upload('berkas')){
			$image=$this->upload->data();
			$update="update usulan_dupak_details set $nm_jenis = '$image[file_name]',updated_at='$tgl_update' where  usulan_no='$no_usulan' and no='$usulan_detail'";
			$this->db->query($update);
			}else{
				$this->session->set_flashdata('error','Format dan Ukuran File Tidak Sesuai');
				redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
			}
			$this->session->set_flashdata('flash','Ditambah');
			redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
	}

function tambah_C0015($dupak,$kum)
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
	$no=date("ymdHis").'01';
	$file_path = './assets/download_bidangc/';
	mkdir($file_path, 0777, true);
	$config['upload_path'] = $file_path;
	$config['allowed_types'] = 'pdf';
	$config['max_size'] = '5048';
	$config['file_name'] = 'File'.date("ymdHis").$no;
	$this->load->library('upload',$config);
	
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
					created_at,
					updated_at
				  )
				  VALUES
					(
					  '$no',
					  '$no_usulan',
					  '$dupak',
					  '$_POST[uraian]',
					  '$_POST[thn_akademik]',
					  '$_POST[tgl]',
					  '$_POST[satuan_hasil]',
					  '1',
					  '$kum',
					  '$_POST[keterangan]',
					  '$tgl_create',
					  '$tgl_create'
					)";
					$this->db->query($perintah2);
			
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
				url_index
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
				url_index
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
			redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
			
			}else{
				$this->session->set_flashdata('error','Gagal Menyimpan');
				redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
				
			}
			
}

function hapus_C0015($id,$no_usulan,$berkas,$dupak,$kum)
{
	unlink('assets/download_bidangc/'.$berkas);
	$where = array('no' => $id);
	$query_cari=$this->db->query("select *from usulan_dupak_details where usulan_no='$no_usulan' and dupak_no='$dupak'")->num_rows();
	if($query_cari == 1)
	{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$hapus="delete from usulan_dupaks where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($hapus);	
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
	}else{
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$update="update usulan_dupaks set kum_usulan_baru=kum_usulan_baru-$kum where usulan_no='$no_usulan' and dupak_no='$dupak'";
		$this->db->query($update);
		$this->session->set_flashdata('flash','Dihapus');
	redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
	}
			
}

function hapus_ijazah($id,$no_usulan,$berkas,$dupak){
		unlink('assets/download_bidangc/'.$berkas);
		$where = array('no' => $id);
		$this->dupak->delete_data($where,'usulan_dupak_details');
		$this->dupak->delete_data($where,'usulan_dupaks');
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak/dupak/'.$dupak.'/'.$no_usulan);
			
	}
	function hapus_berkas($berkas,$no_usulan,$jenis,$dupak)
	{
		unlink('assets/download_bidangc/'.$berkas);
		$tgl_update=date("y-m-d H:i:s");
		$update="update usulan_dupak_details set $jenis =null,updated_at='$tgl_update'  where  usulan_no='$no_usulan' and $jenis ='$berkas'";
		$this->db->query($update);
		$this->session->set_flashdata('flash','Dihapus');
		redirect(base_url().'usulan/usulan_dupak_c/dupak/'.$dupak.'/'.$no_usulan);
	}
function download_bidangc($id){ 
		// force_download('assets/download_bidangc/'.$id,NULL);
	echo '<iframe src="'.base_url().'assets/download_bidangc/'.$id.'" width="100%" height="900" style="border: none;"></iframe>';
		
		} 

public function print_bidangc($no_usulan)
{
	$printc['no_usulan'] = $no_usulan;
	$this->load->view('bidang_c/print_dupak_c',$printc);

}
		
}
?>