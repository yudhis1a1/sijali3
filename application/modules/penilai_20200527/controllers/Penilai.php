<?php
defined('BASEPATH') OR exit('No direct script access allowed');



/**
 * @author akil
 * @version 1.0
 * @created 13-Mar-2016 20:19:38
 */
class Penilai extends MX_Controller
{


	function __construct()
	{
			$this->load->model('M_penilai');
			$this->load->helper('date_helper');
			parent::__construct();
	}

	public function penilai_proses()
	{
		$no = $this->session->userdata('no');
		$data['dosen']=$this->M_penilai->get_penilai_proses($no);	
		vusulan('v_penilai_proses',$data);      
	} 
	
	public function penilai_selesai()
	{
		$no = $this->session->userdata('no');
		$data['dosen']=$this->M_penilai->get_penilai_selesai($no);	
		vusulan('v_penilai_proses',$data);      
	} 

	public function penilai_approval()
	{
		$data['dosen']=$this->M_penilai->get_penilai_approval();	
		vpenilai('v_penilai_proses',$data);      
	}  	

	function get_usulan_jad($no_jfa_usulan)
	{
		$q_usulan_jfa=$this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum
		 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jfa_usulan'")->row();
		 
		 $nm_jad_usul=$q_usulan_jfa->nm_jabatan;
		 $jen_jad_usulan=$q_usulan_jfa->nm_jenjang;
		 $kum_jad_usulan=$q_usulan_jfa->kum;
		 $jad_usulan=$nm_jad_usul.' '.$kum_jad_usulan.' ('.$jen_jad_usulan.')';
	
		 return $jad_usulan;
	}
	
	public function penilaian($no)
	{
		$data_dasar=$this->db->query("SELECT
										  a.`no`,
										  a.no_surat,
										  a.tgl_surat,
										  a.tempat_surat,
										  a.usulan_status_id,
										  d.`nidn`,
										  d.`nidk`,
										  d.`nip`,
										  d.`karpeg`,
										  d.`nama` AS nm_dosen,
										  d.`gelar_depan`,
										  d.`gelar_belakang`,
										  e.`nama_ikatan` AS nm_ikadin,
										  b.`instansi_kode` AS kd_pt,
										  c.`nama_instansi` AS nm_pt,
										  b.`prodi_kode` AS kd_prodi,
										  b.`nama_prodi` AS nm_prodi,
										  d.`lahir_tempat`,
										  d.`lahir_tgl`,
										  d.`jk`,
										  d.`golongan_kode`,
										  a.tmt_tahun,
										  a.tmt_bulan,
										  d.`golongan_tgl`,
										  d.`jabatan_no`,
										  d.`jabatan_tgl`,
										  d.`jenjang_id`,
										  a.`masa_penilaian_awal`,
										  a.`masa_penilaian_akhir`,
										  a.`no_surat`,
										  a.`tempat_surat`,
										  a.`jabatan_usulan_no`,
										  a.`usulan_status_id`,
										  d.`jabatan_no` AS jad_akhir,
										  d.jabatan_tgl,
										  d.golongan_kode,
										  d.golongan_tgl,
										  d.bidang_ilmu_kode,
										  a.user_pengusul_keterangan,
										  a.pimpinan_nama,
										  a.pimpinan_nidn,
										  a.pimpinan_nip,
										  a.pimpinan_golongan_kode,
										  a.pimpinan_jabatan,
										  a.pimpinan_unit_kerja
										FROM
										  usulans a
										  JOIN dosens d
											ON a.dosen_no = d.no
										  JOIN prodis b
											ON d.prodi_kode = b.kode
										  JOIN instansis c
											ON b.instansi_kode = c.kode
										  JOIN ikatan_kerjas e
											ON d.`ikatan_kerja_kode` = e.`kode`
										WHERE a.no = '$no'")->row();
		$kd_bid=$data_dasar->bidang_ilmu_kode;
		
		$q_bidil_jad=$this->db->query("SELECT * from bidang_ilmus where kode='$kd_bid'")->row();

		
		$kd_golongan=$data_dasar->golongan_kode;
		$kd_gol_pimpinan=$data_dasar->pimpinan_golongan_kode;
		$q_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		 
		$q_pimpinan_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kd_gol_pimpinan' ")->row();
		 
		$sts_usulan=$data_dasar->usulan_status_id;
	 	$q_stat= $this->db->query("select * from usulan_statuses where id='$sts_usulan' ")->row();
		 $status=$q_stat->nama_status;

		 $no_jad_akhir=$data_dasar->jad_akhir;
		 
		 $q_jad_akhir=$this->db->query("SELECT
										  a.`no`,
										  a.`jabatan_kode`,
										  a.`jenjang_id`,
										  b.`nama_jabatans` AS nm_jabatan,
										  c.`nama_jenjang` AS nm_jenjang,
										  b.kum
										FROM
										  `jabatan_jenjangs` a
										  JOIN `jabatans` b
											ON a.`jabatan_kode` = b.`kode`
										  JOIN `jenjangs` c
											ON a.`jenjang_id` = c.`id`
										WHERE a.`no` = '$no_jad_akhir'")->row();
		 
		 $nm_jad_akhir=$q_jad_akhir->nm_jabatan;
		 $jen_jad_akhir=$q_jad_akhir->nm_jenjang;
		 $kum_jad_akhir=$q_jad_akhir->kum;
		 $jad_akhir=$nm_jad_akhir.' '.$kum_jad_akhir.' ('.$jen_jad_akhir.')';

		 $no_jfa_usulan=$data_dasar->jabatan_usulan_no;
		 $no_jad_usulan=$this->get_usulan_jad($no_jfa_usulan);

		$data['nm_gol']=$q_golongan;		
		$data['nm_pimpinan_gol']=$q_pimpinan_golongan;
		$data['jad_akhir']=$jad_akhir;
		$data['nm_jen_akhir']=$jen_jad_akhir;
		$data['bidil_jad']=$q_bidil_jad;
		$data['jad_usulan']=$no_jad_usulan;
		$data['data_dasar'] = $data_dasar;
		$data['judul'] = $status;
		
		vpenilai('v_daftar_penilaian',$data);
	}
	
	function show_resume($no_usulan)
	{
		$data_dasar=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data_dasar->usulan_status_id;
		$showr['usulan_status_id'] = $usulan_status_id;
		$showr['no'] = $no_usulan;
		vpenilai('show_resume',$showr);
	}
	
	function show_matakul($no_usulan)
	{
		$data_mtk=$this->db->query("SELECT
									  a.`usulan_status_id`,
									  b.*
									FROM
									  usulans AS a,
									  usulan_matkuls AS b
									WHERE a.no= '$no_usulan'
									AND b.`usulan_no`=a.`no`")->result();		
									
		$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		$d_mtk['usulan_status_id'] = $usulan_status_id;
		
		$d_mtk['data_mtk'] = $data_mtk;
		$d_mtk['no'] = $no_usulan;
		vpenilai('Show_mtk',$d_mtk);			
	}
	
	function simpan_penilaian()
	{
		$no=date("ymdHis").'01';
		$keputusan = $this->input->post('keputusan');
		
		$catatan_tim_penilai = $this->input->post('catatan_tim_penilai');
		$usulan_no = $this->input->post('usulan_no');
		$tgl_create=date("y-m-d H:i:s");
		$tgl_update=date("y-m-d H:i:s");
		
		$cari_kunci=$this->db->query("SELECT
									  `no`,
									  usulan_no,
									  dupak_no
									FROM
									  usulan_dupak_details
									WHERE usulan_no = '$usulan_no'
									AND `kunci`='0'
									GROUP BY `dupak_no`")->row();
		if($cari_kunci > 0)
		{
			$this->session->set_flashdata('error','Masih ada yang belum dinilai pada salah satu Bidang');
			redirect(base_url().'penilai/penilai/show_resume/'.$usulan_no);
		}else
		{
			$perintah="insert INTO usulan_riwayat_statuses (
				no,
				usulan_no,
				usulan_status_id,
				keterangan,
				created_at,
				updated_at
			  )
			  VALUES
				(
				  '$no',
				  '$usulan_no',
				  '6',
				  '$catatan_tim_penilai',
				  '$tgl_create',
				  '$tgl_update')";
			$this->db->query($perintah);
			
			$update="UPDATE
					  usulans
					SET
					  usulan_status_id = '6',
					  user_penilai_tgl = '$tgl_create',
					  user_penilai_keterangan = '$catatan_tim_penilai',
					  user_penilai_keputusan = '$keputusan',
					  updated_at = '$tgl_update'
					WHERE no = '$usulan_no'";
			$this->db->query($update);
			
			$this->session->set_flashdata('flash','disimpan');
			redirect(base_url().'penilai/penilai/penilai_selesai');	
		}
	}
	
	function penilai_terima($no_usulan)
	{
		$no=date("ymdHis").'01';
		$tgl_create=date("y-m-d H:i:s");
		$tgl_update=date("y-m-d H:i:s");
		
		$perintah="insert INTO usulan_riwayat_statuses (
			no,
			usulan_no,
			usulan_status_id,
			created_at,
			updated_at
		  )
		  VALUES
			(
			  '$no',
			  '$no_usulan',
			  '5',
			  '$tgl_create',
			  '$tgl_update')";
		$this->db->query($perintah);
		
		$update="update usulans set usulan_status_id='5', updated_at='$tgl_update' where no='$no_usulan'";
		$this->db->query($update);
		
		$this->session->set_flashdata('flash','disimpan');
		redirect(base_url().'penilai/penilai/penilai_proses');	
	}
	
	function penilai_tolak($no_usulan)
	{
		$no=date("ymdHis").'01';
		$tgl_create=date("y-m-d H:i:s");
		$tgl_update=date("y-m-d H:i:s");
		
		$perintah="insert INTO usulan_riwayat_statuses (
			no,
			usulan_no,
			usulan_status_id,
			created_at,
			updated_at
		  )
		  VALUES
			(
			  '$no',
			  '$no_usulan',
			  '3',
			  '$tgl_create',
			  '$tgl_update')";
		$this->db->query($perintah);
		
		$update="update usulans set usulan_status_id='3', updated_at='$tgl_update' where no='$no_usulan'";
		$this->db->query($update);
		
		$this->session->set_flashdata('flash','diupdate');
		redirect(base_url().'usulan/usulan/proses');	
	}
	
	function show_pendidikan($no_usulan)
	{
		$pendidikan=$this->db->query("SELECT a.`no`,a.`usulan_no`,a.`tgl`,b.`nama_bidang` AS bidil,c.`nama_jenjang` AS nm_jenjang FROM `usulan_pendidikans` a LEFT JOIN `bidang_ilmus` b ON a.`bidang_ilmu_kode`=b.`kode` 
		JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`usulan_no`='$no_usulan' ")->result();		

			$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
			$usulan_status_id=$data->usulan_status_id;
			$d_pendidikan['usulan_status_id'] = $usulan_status_id;
		
			$d_pendidikan['jenjang']=$this->M_penilai->tampil_jenjang();
			$d_pendidikan['bidang_ilmu']=$this->M_penilai->tampil_bidang();
			$d_pendidikan['data_didik'] = $pendidikan;			
			$d_pendidikan['no'] = $no_usulan;	
			vpenilai('show_pendidikan',$d_pendidikan);		
	}
	function bidangA($no_usulan)
	{
		$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		
		$showa['usulan_status_id'] = $usulan_status_id;
		$showa['no'] = $no_usulan;
		vpenilai('bidang_a/Show_a',$showa);
	}
	function bidangB($no_usulan)
	{
		$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		
		$showb['usulan_status_id'] = $usulan_status_id;
		$showb['no'] = $no_usulan;
		vpenilai('bidang_b/Show_b',$showb);
	}
	function bidangC($no_usulan)
	{
		$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		
		$showc['usulan_status_id'] = $usulan_status_id;
		
		$showc['no'] = $no_usulan;
		vpenilai('bidang_c/Show_c',$showc);
	}
	function bidangD($no_usulan)
	{
		$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		
		$showd['usulan_status_id'] = $usulan_status_id;
		$showd['no'] = $no_usulan;
		vpenilai('bidang_d/Show_d',$showd);
	}
	function persyaratan($no_usulan)
	{
		$data_ceklis=$this->db->query("SELECT * FROM `usulan_ceklists` WHERE usulan_no='$no_usulan'")->row();
		
		$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		
		$showa['usulan_status_id'] = $usulan_status_id;
		$showa['no'] = $no_usulan;
		$showa['ceklis'] = $data_ceklis;
		vpenilai('show_persyaratan',$showa);
	}

	public function print_bidanga($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak_a',$printa);
	}  
	
	function tampil_resume($no_usulan)
	{
		$printres['no'] = $no_usulan;
		$this->load->view('tampil_resume',$printres);
	}
	
	public function print_bidangb($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('bidang_b/print_dupak_b',$printa);
   }  

	public function print_dupak($no_usulan)
	{
		$printp['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak',$printp);
	}
}
?>