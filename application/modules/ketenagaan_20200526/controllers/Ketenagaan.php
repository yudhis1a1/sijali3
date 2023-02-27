<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Ketenagaan extends MX_Controller
{


	function __construct()
	{
	 
			$this->load->helper('date_helper');
	
			if($this->session->userdata('status')!="login"){
				redirect(base_url().'login/login?pesan=belumlogin');
			}
		
	}


	function __destruct()
	{
	}
	function anti_xss($source) {
        $f = stripslashes(strip_tags(htmlspecialchars($source, ENT_QUOTES)));
        return $f;
    }
	function usulanbaru()
	{
	  	
		$data['filter'] = '3';
	
        $data['judul'] = 'Usulan Baru';
		Vusulan('Beranda',$data);      
	}     

	function approval_penilai(){

		$data['filter'] = '4';
        $data['judul'] = 'Proses Approval Tim Penilai';
		Vusulan('Beranda',$data);  

	}

	function proses_nilai(){

		$data['filter'] = '5';
        $data['judul'] = 'Proses Penilaian';
		Vusulan('Beranda',$data);  

	}
	function proses_ketenagaan(){

		$data['filter'] = '6';
        $data['judul'] = 'Proses Operator Sub PTK';
		Vusulan('Beranda',$data);  

	}
	function proses_dikti(){

		$data['filter'] = '7';
        $data['judul'] = 'Proses Dikti';
		Vusulan('Beranda',$data);  

	}
	function proses_kepegawaian(){

		$data['filter'] = '8';
        $data['judul'] = 'Proses Operator Sub HKT';
		Vusulan('Beranda',$data);  

	}
	function proses_selesai(){

		$data['filter'] = '9';
        $data['judul'] = 'Selesai';
		Vusulan('Beranda',$data);  

	}

	function tampil_golongan(){ 
		$query = "
		SELECT *from golongans order by nama asc
		";
		return $this->db->query($query);
	  }
	  function tampil_jabat(){ 
		$query = "
		SELECT *from reff_japim
		";
		return $this->db->query($query);
	  }
	  function tampil_japim(){ 
		  $query = "
		  SELECT * from reff_japim
		  ";
		  return $this->db->query($query);
		}
	  function tampil_jenjang(){ 
		$query = "
		select * from
		jenjangs where id in ('30','32','35','37','40')
		";
		return $this->db->query($query);
	  }
	  function tampil_bidang(){ 
		$query = "
		select * from
		bidang_ilmus
		order by nama_bidang asc";
		return $this->db->query($query);
	  }
	  function tampil_jabatan(){ 
		$query = "
		select * from
		jabatan_jenjangs as a,
		jabatans as b,
		jenjangs as c
		where
		a.jabatan_kode=b.kode
		and a.jenjang_id=c.id
		order by b.kode asc
		";
		return $this->db->query($query);
	  }

	  function tampil_jabatan_jenjang($jabatan_akhir_no)
    {
      $query = "SELECT
				  a.no,
				  a.jabatan_akhir_no,
				  a.jabatan_usulan_no,
				  c.nama_jabatans,
				  c.kum,
				  d.nama_jenjang
				FROM
				  jabatan_syarats AS a,
				  jabatan_jenjangs AS b,
				  jabatans AS c,
				  jenjangs AS d
				WHERE a.jabatan_usulan_no = b.no
				  AND b.jabatan_kode = c.kode
				  AND b.jenjang_id = d.id
				  AND a.jabatan_akhir_no = '$jabatan_akhir_no'";
  return $this->db->query($query);
    
    }

	function show($no){
		 
		$data_dasar=$this->db->query("SELECT a.`no`, a.`pimpinan_jabatan`,a.user_penilai_no, a.no_surat, a.tgl_surat, a.tempat_surat, a.usulan_status_id, d.`nidn`, d.pengangkatan_tgl, d.`nidk`, d.`nip`, d.`karpeg`, d.`nama` AS nm_dosen, d.`gelar_depan`, d.`gelar_belakang`, e.`nama_ikatan` AS nm_ikadin, b.`instansi_kode` AS kd_pt, c.`nama_instansi` AS nm_pt, b.`prodi_kode` AS kd_prodi, b.`nama_prodi` AS nm_prodi, d.`lahir_tempat`, d.`lahir_tgl`, d.`jk`, d.`golongan_kode`, a.tmt_tahun, a.tmt_bulan, d.`golongan_tgl`, d.`jabatan_no`, d.`jabatan_tgl`, d.`jenjang_id`, a.`masa_penilaian_awal`, a.`masa_penilaian_akhir`, a.`no_surat`, a.`jabatan_akhir_no`, a.`tempat_surat`, a.`jabatan_usulan_no`, a.`usulan_status_id`, d.`jabatan_no` AS jad_akhir, d.jabatan_tgl, d.golongan_kode, d.golongan_tgl, d.bidang_ilmu_kode, a.user_pengusul_keterangan, a.pimpinan_nama, a.pimpinan_nidn, a.pimpinan_nip, a.pimpinan_golongan_kode, a.pimpinan_jabatan, a.pimpinan_unit_kerja, a.kaprodi_nama, a.kaprodi_nidn, a.kaprodi_nip, a.kaprodi_golongan_kode, a.kaprodi_jabatan, a.kaprodi_unit_kerja, f.`nama_jenjang` FROM usulans AS a, dosens AS d, prodis AS b, `instansis` AS c, `ikatan_kerjas` AS e, `jenjangs` AS f
		 WHERE a.dosen_no = d.no AND d.prodi_kode = b.kode AND b.instansi_kode = c.kode AND d.`ikatan_kerja_kode` = e.`kode` AND d.`jenjang_id` = f.`id` AND a.no = '$no'")->row();   
		$jabatan_akhir_no=$data_dasar->jabatan_akhir_no;
		$kd_bid=$data_dasar->bidang_ilmu_kode;
		$kd_jab=$data_dasar->pimpinan_jabatan;
		$kd_kap_jab=$data_dasar->kaprodi_jabatan;
		$q_bidil_jad=$this->db->query("SELECT * from bidang_ilmus where kode='$kd_bid'")->row();
		$q_jabatan=$this->db->query("SELECT * from reff_japim where id='$kd_jab'")->row();
		$q_kap_jabatan=$this->db->query("SELECT * from reff_japim where id='$kd_kap_jab'")->row();
		$kd_golongan=$data_dasar->golongan_kode;
		$kd_gol_pimpinan=$data_dasar->pimpinan_golongan_kode;
		$kaprodi_golongan_kode=$data_dasar->kaprodi_golongan_kode;
		$q_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		//$q_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		$q_pimpinan_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kd_gol_pimpinan' ")->row();
		$q_kaprodi_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kaprodi_golongan_kode' ")->row();
		$sts_usulan=$data_dasar->usulan_status_id;
	 	$q_stat= $this->db->query("select * from usulan_statuses where id='$sts_usulan' ")->row();
		$status=$q_stat->nama_status;
		if(isset($data_dasar->jad_akhir)){
			$no_jad_akhir=$data_dasar->jad_akhir;
		   } else {
			   $no_jad_akhir='31';
		   }
		 $q_jad_akhir=$this->db->query("SELECT a.`no`, a.`jabatan_kode`, a.`jenjang_id`, b.`nama_jabatans` AS nm_jabatan, c.`nama_jenjang` AS nm_jenjang, b.kum FROM `jabatan_jenjangs` a JOIN `jabatans` b ON a.`jabatan_kode` = b.`kode` JOIN `jenjangs` c ON a.`jenjang_id` = c.`id` WHERE a.`jabatan_kode` = '$no_jad_akhir'")->row();
		
		$nm_jad_akhir=$q_jad_akhir->nm_jabatan;
		$jen_jad_akhir=$q_jad_akhir->nm_jenjang;
		$kum_jad_akhir=$q_jad_akhir->kum;
		$jad_akhir=$nm_jad_akhir.' '.$kum_jad_akhir.' ('.$jen_jad_akhir.')';
		$no_jfa_usulan=$data_dasar->jabatan_usulan_no;
		$no_jad_usulan=$this->get_usulan_jad($no_jfa_usulan);
		$data_usulans=$this->db->query("SELECT * from usulans where no='$no'")->row();
		$usulan_status_id=$data_usulans->usulan_status_id;
	
		$penilai=$data_dasar->user_penilai_no;
		 
	    $data['penilai']=$this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`no`='$penilai'")->row();	
		$data['caripenilai']=$this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`role_id`='5'");	
	
		$data['jabatan_akhir_no'] = $jabatan_akhir_no;
		$data['jabatan_jenjang']=$this->tampil_jabatan_jenjang($jabatan_akhir_no);
		$data['usulan_status_id'] = $usulan_status_id;
		$data['nm_gol']=$q_golongan;		
		$data['nm_pimpinan_gol']=$q_pimpinan_golongan;
		$data['nm_kaprodi_gol']=$q_kaprodi_golongan;
		$data['jad_akhir']=$jad_akhir;
		$data['nm_jen_akhir']=$jen_jad_akhir;
		$data['bidil_jad']=$q_bidil_jad;
		$data['jad_usulan']=$no_jad_usulan;
		$data['data_dasar'] = $data_dasar;
		$data['q_jabatan'] = $q_jabatan;
		$data['q_kap_jabatan'] = $q_kap_jabatan;
		$data['judul'] = $status;
	
		//$data['jabatan_no'] = $jabatan_no;
		$data['golongan']=$this->tampil_golongan();
		$data['jabatan']=$this->tampil_jabat();		
		$data['status_id']=$this->statusUsulan($sts_usulan);
			 
		Vusulan('Show',$data);  

	}

	function statusUsulan($sts_usulan){
		
		if($sts_usulan=='3'){
			$status='usulanbaru';
		}else if($sts_usulan=='4'){
			$status='approval_penilai';
		}	else if($sts_usulan=='5'){
			$status='proses_nilai';
		}	else if($sts_usulan=='6'){
			$status='proses_ketenagaan';
		}	else if($sts_usulan=='7'){
			$status='proses_dikti';
		} else if($sts_usulan=='8'){
			$status='proses_kepegawaian';
		}	else if($sts_usulan=='9'){
			$status='proses_selesai';
		}		  	    	  
	 
     return $status;
	}
	function Show_matakul($no_usulan){
		$data_mtk=$this->db->query("SELECT a.`usulan_status_id`, b.* FROM usulans AS a, usulan_matkuls AS b WHERE a.no= '$no_usulan' AND b.`usulan_no`=a.`no`")->result();		 
		$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$r_nidn=$this->db->query("SELECT a.no, a.dosen_no, b.nidn	FROM usulans AS a, dosens AS b WHERE a.dosen_no = b.no  AND a.no = '$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		$nidn=$r_nidn->nidn;
		$d_mtk['usulan_status_id'] = $usulan_status_id;
		
		$d_mtk['nidn'] = $nidn;
		$d_mtk['data_mtk'] = $data_mtk;
		$d_mtk['no'] = $no_usulan;
		$d_mtk['jabatan_no'] = $jabatan_no;		
			$this->load->view('Show_mtk',$d_mtk);    
	
	
		}

		function update_mtk_pak($usulan_no)
		{
			$mtk = $this->input->post('mtk');
			
			$cari_mtk=$this->db->query("select *from usulan_matkuls where usulan_no='$usulan_no' AND mtk='$mtk'")->row();
			if($cari_mtk > 0)
			{
				$this->session->set_flashdata('error','Matakuliah sudah ada.');
				redirect(base_url().'ketenagaan/ketenagaan/show/'.$usulan_no);
			}else
			{
				$jml_mtk=$this->db->query("SELECT COUNT(*) AS jml FROM usulan_matkuls WHERE usulan_no='$usulan_no'")->row();
				$jml=$jml_mtk->jml;	
				if($jml==3)
				{
					$this->session->set_flashdata('error','Matakuliah tidak boleh lebih dari 3 matakuliah');
					redirect(base_url().'ketenagaan/ketenagaan/show/'.$usulan_no);
				}else
				{
					$perintah="INSERT INTO `usulan_matkuls` (`usulan_no`, mtk)VALUES ('$usulan_no', '$mtk')";
					$this->db->query($perintah);
					
					$this->session->set_flashdata('flash','Diupdate');
					redirect(base_url().'ketenagaan/ketenagaan/show/'.$usulan_no);
				}
			}
		}
		function hapus_mtk_pak($no_usulan_mtk,$usulan_no)
		{
			$perintah="DELETE FROM `usulan_matkuls` WHERE `no_usulan_matkul`='$no_usulan_mtk' AND `usulan_no`='$usulan_no'";
			$this->db->query($perintah);
	
			$this->session->set_flashdata('flash','Dihapus');
			redirect(base_url().'ketenagaan/ketenagaan/show/'.$usulan_no);
		}
		function Show_pendidikan($no_usulan){
			$pendidikan=$this->db->query("SELECT a.`no`,a.`usulan_no`,a.`tgl`,b.`nama_bidang` AS bidil,c.`nama_jenjang` AS nm_jenjang FROM `usulan_pendidikans` a LEFT JOIN `bidang_ilmus` b ON a.`bidang_ilmu_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`usulan_no`='$no_usulan' ")->result();	
			$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
			$usulan_status_id=$data->usulan_status_id;
			$d_pendidikan['usulan_status_id'] = $usulan_status_id;			
			$d_pendidikan['data_didik'] = $pendidikan;			
			$d_pendidikan['no'] = $no_usulan;				
			$this->load->view('Show_pendidikan',$d_pendidikan);    
	
			}

		

			/* 	function bidangA(){
			
				  
					$this->load->view('show_a');    
			
				} */
				function bidangA($no_usulan){
					$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$dosen_no=$data->dosen_no;
		$q_data=$this->db->query("SELECT no,jabatan_no from dosens where no='$dosen_no'")->row();
		$jabatan_no=$q_data->jabatan_no;
		$usulan_status_id=$data->usulan_status_id;
		$showa['usulan_status_id'] = $usulan_status_id;
		$showa['no'] = $no_usulan;
		//$showa['jabatan_no'] = $jabatan_no;
					$this->load->view('Show_a',$showa); 
				}

           
				function bidangB($no_usulan){
			
				  
					$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
					$usulan_status_id=$data->usulan_status_id;
					$showb['usulan_status_id'] = $usulan_status_id;
					$showb['no'] = $no_usulan;
					//$showb['jabatan_no'] = $jabatan_no;
					$this->load->view('Show_b',$showb);  
			
				}
				function bidangC($no_usulan){
			
				  
					$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		
		$showc['usulan_status_id'] = $usulan_status_id;
		
		$showc['no'] = $no_usulan;
		//$showc['jabatan_no'] = $jabatan_no;
					$this->load->view('Show_c',$showc);   
			
				}
				function bidangD($no_usulan){
			
				  
					$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		
		$showd['usulan_status_id'] = $usulan_status_id;
		$showd['no'] = $no_usulan;
		//$showd['jabatan_no'] = $jabatan_no;
					$this->load->view('Show_d',$showd);     
			
				}
				function show_pak($no_usulan){
			
					$data_dasar=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
					  $usulan_status_id=$data_dasar->usulan_status_id;
					  $showp['usulan_status_id'] = $usulan_status_id;
					  $showp['no'] = $no_usulan;			
					  $this->load->view('Show_pak',$showp);    
			  
				  }
						function editPak($no_usulan){
							$data_dasar=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
							  $usulan_status_id=$data_dasar->usulan_status_id;
							  $showp['usulan_status_id'] = $usulan_status_id;
							  $showp['no'] = $no_usulan;			
							  Vusulan('Edit_pak',$showp);    
					  
						  }
					  
					
						function show_resume($no_usulan){
							$data_dasar=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
							$usulan_status_id=$data_dasar->usulan_status_id;
							$showr['usulan_status_id'] = $usulan_status_id;
							$showr['no'] = $no_usulan;			
									$this->load->view('Show_resume',$showr);    
							
								}
		
								function show_ceklist($no_usulan){
									$data_ceklis=$this->db->query("SELECT * FROM `usulan_ceklists` WHERE usulan_no='$no_usulan'")->row();
		
									$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
									$usulan_status_id=$data->usulan_status_id;
									
									$show_syarat['usulan_status_id'] = $usulan_status_id;
									$show_syarat['no'] = $no_usulan;
									$show_syarat['ceklis'] = $data_ceklis;			
									$this->load->view('Show_persyaratan',$show_syarat);    
									
										}

										function show_riwayat($no_usulan){
											
											$riwayat=$this->db->query("SELECT  a.*,b.`nama_status` FROM `usulan_riwayat_statuses` a LEFT JOIN `usulan_statuses` b ON a.`usulan_status_id`=b.`id` 
											where a.usulan_no='$no_usulan' ORDER BY 1 DESC");
												 
												
												 $show_riwayat['label'] = 'Status Riwayat JFA';
												$show_riwayat['rwy'] = $riwayat;
											$this->load->view('riwayat',$show_riwayat);     
									
										}

function usulan($filter){

	$draw=$_REQUEST['draw'];

	/*Jumlah baris yang akan ditampilkan pada setiap page*/
	$length=$_REQUEST['length'];
	$start=$_REQUEST['start'];
	$search=$_REQUEST['search']["value"];
	$q_stat= $this->db->query("select * from usulan_statuses where id='$filter' ")->row();
	$id_sts=$q_stat->id;
	$status=$q_stat->nama_status;	
	
 
	$this->db->select('*');
	$this->db->from('v_usulans');
	$this->db->where('usulan_status_id', $id_sts);
	$total=$this->db->count_all_results();
	

	$output=array();


	$output['draw']=$draw;


	$output['recordsTotal']=$output['recordsFiltered']=$total;
	$output['data']=array(); 


	$col = 0;
	$dir = "";
	if(!empty($order))
	{
		foreach($order as $o)
		{
			$col = $o['column'];
			$dir= $o['dir'];
		}
	}

	if($dir != "asc" && $dir != "desc")
	{
		$dir = "desc";
	}
	$valid_columns = array(
		
		1=>'nidn',
		2=>'nidk',
		3=>'nama',
		4=>'nama_instansi',
		5=>'nama_prodi',
		6=>'jabatan_usulan_no',	
		7=>'usulan_status_id',
		8=>'user_penilai_no',
		9=>'updated_at',
	);
	if(!isset($valid_columns[$col]))
	{
		$order = null;
	}
	else
	{
		$order = $valid_columns[$col];
	}
	if($order !=null)
	{
		$this->db->order_by($order, $dir);
	}

	

	/*Lanjutkan pencarian ke database*/
	
	$this->db->limit($length,$start);

	
	$this->db->order_by('updated_at','DESC');
	 $this->db->order_by('no','DESC');
 	 $this->db->select('*');
	$this->db->from('v_usulans'); 
	$this->db->where('usulan_status_id',$filter);  
	$query=$this->db->get();
	

	if($search!=""){	
	
	
	$query=$this->db->query("select * from v_usulans where (usulan_status_id='$filter' and no LIKE '%$search%') or (usulan_status_id='$filter' and nidn LIKE '%$search%') or (usulan_status_id='$filter' and nidk LIKE '%$search%') or 
	 (usulan_status_id='$filter' and nama LIKE '%$search%') or (usulan_status_id='$filter' and  nama_instansi LIKE '%$search%') or  (usulan_status_id='$filter' and nama_prodi LIKE '%$search%' )"); 
	  

	$output['recordsTotal']=$output['recordsFiltered']=$query->num_rows();
	
	}
	

	


	$nomor_urut=$start+1;
	foreach ($query->result_array() as $surat) {
		$no_jfa_usulan=$surat['jabatan_usulan_no'];

		$no_jad_usulan=$this->get_usulan_jad($no_jfa_usulan);
        $penilai=$surat['user_penilai_no'];
		$nama_penilai=$this->get_penilai($penilai); 

		$ptk=$surat['pic_ptk'];
		$nama_user_ptk=$this->get_userPtk($ptk); 
	
		$output['data'][]=array('<a href=show/'.$surat['no'].' data-toggle="tooltip" title="Detail Ajuan"><button type="button" class="btn btn-sm btn-circle btn-primary"><i class="  icon-book-open" ></i> </button></a>',
		'<a href=tampil_resume/'.$surat['no'].' data-toggle="tooltip"  title="Resume Dosen" target="_blank" class="btn btn-success">Resume</a>'
		,$surat['nidn'],$surat['nidk'],$surat['nama'],$surat['nama_instansi'],$surat['nama_prodi'],$no_jad_usulan,$status,$nama_penilai,$nama_user_ptk,$surat['updated_at'] );
	
		$nomor_urut++;
		}

	
	

	

	echo json_encode($output);

}

function get_userPtk($ptk){

	$user_ptk=$this->db->query("SELECT a.no,a.`instansi_kode`,a.`nama` FROM `users` a WHERE a.no='$ptk'")->row();	 
	 $nm_user_ptk=$user_ptk->nama;
	 return $nm_user_ptk;
}

function get_penilai($penilai){


	$penilai=$this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a
	 LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`no`='$penilai'")->row();
	 
	 $nm_penilai=$penilai->nama;
	 $nm_instansi_penilai=$penilai->nama_instansi;


	 return $nm_penilai;
}

function get_usulan_jad($no_jfa_usulan){


	$q_usulan_jfa=$this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum
	 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jfa_usulan'")->row();
	 
	 $nm_jad_usul=$q_usulan_jfa->nm_jabatan;
	 $jen_jad_usulan=$q_usulan_jfa->nm_jenjang;
	 $kum_jad_usulan=$q_usulan_jfa->kum;
	 $jad_usulan=$nm_jad_usul.' '.$kum_jad_usulan.' ('.$jen_jad_usulan.')';

	 return $jad_usulan;
}

function updateStatus($no_usulan){
	$user= $this->session->userdata('nama');
	$no_usulan= $this->input->post('no_usulan');
	$id_penilai= $this->input->post('id_penilai');
	$id_status= $this->input->post('status_usulan');
	$statusnya= $this->input->post('statusnya');
	$keterangan=$this->anti_xss($this->input->post('keterangan',TRUE));
	$keterangan_pengusul=$this->anti_xss($this->input->post('keterangan_pengusul',TRUE));
	$no_log=date("ymdHis");
    $errors = array();
	if($id_status > '3' && $id_penilai=='' ) {	
		$this->session->set_flashdata('error','Tim Penilai masih kosong');		
		redirect(base_url().'ketenagaan/ketenagaan/show/'.$no_usulan);
	} 
	$count = count($errors);
	if($count == 0){
	$update="update usulans set usulan_status_id='$id_status',user_ketenagaan_no='$user',user_ketenagaan_tgl=now() where no='$no_usulan'";
	$this->db->query($update);
	$update_ptk="update usulan_riwayat_ptk set posting='1' where usulan_no='$no_usulan'";
	$this->db->query($update_ptk);
 	$log="INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,keterangan_pengusul,created_at,updated_at)
	  values ('$no_log','$no_usulan','$id_status','$keterangan','$keterangan_pengusul',now(),now())";
		$this->db->query($log); 
	
		$this->session->set_flashdata('flash','Update Status');
		redirect(base_url().'ketenagaan/ketenagaan/'.$statusnya);

	}
	
	
	
	}

	function catatanPTK($no_usulan){
		$user= $this->session->userdata('nama');
		$no_usulan= $this->input->post('no_usulan');
		$bidang= $this->input->post('bidang');
		$keterangan=$this->anti_xss($this->input->post('keterangan_ptk',TRUE));
		
		$no_log=date("ymdHis");
	
		
		
		 $log="INSERT INTO usulan_riwayat_ptk(no,usulan_no,user_nama,keterangan,created_at,posting,bidang)
		  values ('$no_log','$no_usulan','$user','$keterangan',now(),0,'$bidang')";
			$this->db->query($log); 
		
			$this->session->set_flashdata('flash','Keterangan Ditambahkan');
			redirect(base_url().'ketenagaan/usulan_dupak/dupak/A0001/'.$no_usulan, 'refresh');
		}
	
		function tampil_resume($no_usulan)
		{
			$printres['no'] = $no_usulan;
			$this->load->view('tampil_resume',$printres);
		}
		
		function updatePak($no_usulan){
			$user= $this->session->userdata('nama');
			$usulan_status_id= $this->input->post('usulan_status_id');
			$tgl_awal= $this->input->post('masa_penilaian_awal');
			$tgl_akhir= $this->input->post('masa_penilaian_akhir');
			$tmt_no= $this->anti_xss($this->input->post('tmt_no'),TRUE);
			$tgl_tmt= $this->input->post('tgl_tmt');
			$tgl_pak= $this->input->post('pak_tgl');
		/* 	$tmt_nama= $this->input->post('tmt_nama');
			$tmt_nip= $this->input->post('tmt_nip'); */
		    $fakultas= $this->anti_xss($this->input->post('fakultas'),TRUE);
			$no_log=date("ymdHis");
	
		
			
			$keterangan="Data PAK diupdate oleh:".$user;
		
			
			$update="update usulans SET masa_penilaian_awal='$tgl_awal',masa_penilaian_akhir='$tgl_akhir',fakultas=$fakultas,
			tmt_tgl='$tgl_tmt',tmt_no='$tmt_no',pak_tgl='$tgl_pak' where no='$no_usulan'";
			$this->db->query($update);
			
		$log="INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,created_at,updated_at)
		  values ('$no_log','$no_usulan','$usulan_status_id','$keterangan',now(),now())";
			$this->db->query($log);  
		
				$this->session->set_flashdata('flash','PAK Telah Diupdate');
				redirect(base_url().'ketenagaan/ketenagaan/show/'.$no_usulan);
			
			
			}

		function updatePenilai($no_usulan){
			$user= $this->session->userdata('no');
			$nm_user= $this->session->userdata('nama');
			$usulan_status_id= $this->input->post('usulan_status_id');
			$no_usulan= $this->input->post('no_usulan');
			$penilaibaru= $this->input->post('caripenilai');
			$no_log=date("ymdHis");

			
			$keterangan="Tim Penilai diupdate oleh:" .$nm_user;
		
			
			$update="update usulans set user_penilai_no='$penilaibaru',pic_ptk='$user' where no='$no_usulan'";
			$this->db->query($update);

			$log="INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,created_at,updated_at)
			values ('$no_log','$no_usulan','$usulan_status_id','$keterangan',now(),now())";
			  $this->db->query($log); 
			
			  $this->session->set_flashdata('flash','Update Tim Penilai');
				redirect(base_url().'ketenagaan/ketenagaan/show/'.$no_usulan);
			
			
			}
/* function get_jad_lama($no_jad_akhir){


	$q_jad_akhir=$this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama` AS nm_jabatan,c.`nama` AS nm_jenjang,b.kum
	 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jad_akhir'")->row();
	 
	 $nm_jad_akhir=$q_jad_akhir->nm_jabatan;
	 $jen_jad_akhir=$q_jad_akhir->nm_jenjang;
	 $kum_jad_akhir=$q_jad_akhir->kum;
	 $jad_akhir=$nm_jad_akhir.' '.$kum_jad_akhir.' ('.$jen_jad_akhir.')';

	 return $jad_akhir;
} */
public function print_bidanga($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		// Vusulan('print_dupak_a',$printa);
		$this->load->view('print_dupak_a',$printa);
   
	}  
	public function print_bidangb($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak_b',$printa);
   
	}  
	
	public function print_dupak($no_usulan)
	{
		$printp['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak',$printp);
		
	}
	public function print_bidangc($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak_c',$printa);
   
	}  
	public function print_bidangd($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak_d',$printa);
   
	}  
	
	function uploadPak()
	{
		$user= $this->session->userdata('nama');
		$nidn = $this->input->post('nidn');
		$no_usulan = $this->input->post('no_usulan');
		$tgl_create=date("y-m-d H:i:s");
		$tgl_update=date("y-m-d H:i:s");
		$no=date("ymdHis");
		$file_path = './assets/pak/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'PAK_'.$no.'_'.$nidn;
		$this->load->library('upload',$config);
		$no_log=date("ymdHis");

			
			
			$keterangan="Data PAK diupload oleh:" .$user;

		$data_pak=$this->db->query("SELECT no FROM `usulans` WHERE no='$no_usulan'")->num_rows();
		if($data_pak > 0){		
		
		if($this->upload->do_upload('berkas')){
			$pak=$this->upload->data();
			$update="update usulans set pak = '$pak[file_name]' where  no='$no_usulan'";
			$this->db->query($update);
			}else{
				$this->session->set_flashdata('error','Format dan Ukuran File Tidak Sesuai');
						redirect(base_url().'ketenagaan/ketenagaan/show/'.$no_usulan);
			}
			$this->session->set_flashdata('flash','DiUpload');
			$log="INSERT INTO usulan_riwayat_statuses(no,usulan_no,keterangan,created_at,updated_at)
			values ('$no_log','$no_usulan','$keterangan',now(),now())";
			  $this->db->query($log); 
				  
				redirect(base_url().'ketenagaan/ketenagaan/show/'.$no_usulan);
		}
	}
	

	function download_matkul($id){ 
		force_download('assets/download_matkul/'.$id,NULL);
		}
		
	function download_pendidik($id){ 
		force_download('assets/download_pendidik/'.$id,NULL);
		}
	 
	 




	

}
?>