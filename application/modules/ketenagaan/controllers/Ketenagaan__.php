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

	function show($no){
		 
		$data_dasar=$this->db->query("SELECT
		`usulans`.`no`
		, `usulans`.`no_surat`
		, `usulans`.`tgl_surat`
		, `usulans`.`tempat_surat`
		, `dosens`.`nidn`
		, `dosens`.`nidk`
		, `dosens`.`nip`
		, `dosens`.`karpeg`
		, `dosens`.`nama` 
		, `dosens`.`gelar_depan`
		, `dosens`.`gelar_belakang`
		, `dosens`.`golongan_tgl`
		, `ikatan_kerjas`.`nama_ikatan`
		, `dosens`.`pengangkatan_tgl`
		, `prodis`.`instansi_kode`
		, `instansis`.`nama_instansi`
		, `prodis`.`prodi_kode`
		, `prodis`.`nama_prodi`
		, `dosens`.`lahir_tempat`
		, `dosens`.`lahir_tgl`
		, `dosens`.`golongan_kode`
		, `usulans`.`masa_penilaian_awal`
		, `usulans`.`masa_penilaian_akhir`
		, `usulans`.`jabatan_usulan_no`
		, `dosens`.`jabatan_no` 
		, `dosens`.`jabatan_tgl`
		, `usulans`.`usulan_status_id`
		, `usulans`.`tmt_tahun`
		, `usulans`.`tmt_bulan`
		, `usulans`.`user_pengusul_keterangan`
		, `usulans`.`pimpinan_nama`
		, `usulans`.`pimpinan_nidn`
		, `usulans`.`pimpinan_nip`
		, `usulans`.`pimpinan_golongan_kode`
		, `usulans`.`pimpinan_jabatan`
		, `usulans`.`pimpinan_unit_kerja`
		, `usulans`.`bidang_ilmu_kode`
		, `usulans`.`user_penilai_no`
	FROM
	usulans
 INNER JOIN `dosens` 
        ON (`usulans`.`dosen_no` = `dosens`.`no`)
    INNER JOIN `prodis` 
        ON (`dosens`.`prodi_kode` = `prodis`.`kode`)
    INNER JOIN `instansis` 
        ON (`prodis`.`instansi_kode` = `instansis`.`kode`)    
   
    INNER JOIN `ikatan_kerjas` 
        ON (`dosens`.`ikatan_kerja_kode` = `ikatan_kerjas`.`kode`) WHERE usulans.`no`='$no' ")->row();
		$kd_bid=$data_dasar->bidang_ilmu_kode;
		$q_bidil_jad=$this->db->query("SELECT * from bidang_ilmus where kode='$kd_bid'")->row();

		
		$kd_golongan=$data_dasar->golongan_kode;
		$kd_gol_pimpinan=$data_dasar->pimpinan_golongan_kode;
		$q_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		 
		$q_pimpinan_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kd_gol_pimpinan' ")->row();
		 
		$sts_usulan=$data_dasar->usulan_status_id;
	 	$q_stat= $this->db->query("select * from usulan_statuses where id='$sts_usulan' ")->row();
		 $status=$q_stat->nama_status;

		 $no_jad_akhir=$data_dasar->jabatan_no;
		 $q_jad_akhir=$this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum
		 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jad_akhir'")->row();
		 
		 $nm_jad_akhir=$q_jad_akhir->nm_jabatan;
		 $jen_jad_akhir=$q_jad_akhir->nm_jenjang;
		 $kum_jad_akhir=$q_jad_akhir->kum;
		 $jad_akhir=$nm_jad_akhir.' '.$kum_jad_akhir.' ('.$jen_jad_akhir.')';

		 $no_jfa_usulan=$data_dasar->jabatan_usulan_no;
		 $no_jad_usulan=$this->get_usulan_jad($no_jfa_usulan);
		 $penilai=$data_dasar->user_penilai_no;
		 
	    $data['penilai']=$this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`no`='$penilai'")->row();	
		$data['caripenilai']=$this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`role_id`='5'");	
		$data['nm_gol']=$q_golongan;		
		$data['nm_pimpinan_gol']=$q_pimpinan_golongan;
		$data['jad_akhir']=$jad_akhir;
		$data['nm_jen_akhir']=$jen_jad_akhir;
		$data['bidil_jad']=$q_bidil_jad;
		$data['jad_usulan']=$no_jad_usulan;
		$data['data_dasar'] = $data_dasar;
		$data['judul'] = $status;
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
		$data_mtk=$this->db->query("SELECT * FROM usulan_matkuls a WHERE usulan_no='$no_usulan' ")->result();			 
			
			$d_mtk['data_mtk'] = $data_mtk;			
			$this->load->view('Show_mtk',$d_mtk);    
	
		}

		function Show_pendidikan($no_usulan){
			$pendidikan=$this->db->query("SELECT a.`usulan_no`,a.`tgl`,b.`nama_bidang` ,c.`nama_jenjang`  FROM `usulan_pendidikans` a LEFT JOIN `bidang_ilmus` b ON a.`bidang_ilmu_kode`=b.`kode` 
			JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`usulan_no`='$no_usulan' ")->result();			 
				
				$d_pendidikan['data_didik'] = $pendidikan;			
				$this->load->view('Show_pendidikan',$d_pendidikan);    
		
			}

		

			/* 	function bidangA(){
			
				  
					$this->load->view('show_a');    
			
				} */
				function bidangA($no_usulan){
					/* $dupak_a=$this->db->query("select *from usulan_dupaks where  usulan_no='$no_usulan' and dupak_no='$dupak_no'")->result();
					$showa['bid_a']=$dupak_a; */
					$showa['no'] = $no_usulan;
					$this->load->view('Show_a',$showa); 
				}

           
				function bidangB($no_usulan){
			
				  
					$showb['no'] = $no_usulan;
					$this->load->view('Show_b',$showb);  
			
				}
				function bidangC($no_usulan){
			
				  
					$showc['no'] = $no_usulan;
					$this->load->view('Show_c',$showc);   
			
				}
				function bidangD($no_usulan){
			
				  
					$showd['no'] = $no_usulan;
					$this->load->view('Show_d',$showd);     
			
				}

				function show_riwayat($no_usulan){
											
					$riwayat=$this->db->query("SELECT  a.*,b.`nama_status` FROM `usulan_riwayat_statuses` a LEFT JOIN `usulan_statuses` b ON a.`usulan_status_id`=b.`id` 
					where a.usulan_no='$no_usulan'");
						 
						
						 $show_riwayat['label'] = 'Status Riwayat JFA';
						$show_riwayat['rwy'] = $riwayat;
					$this->load->view('riwayat',$show_riwayat);     
			
				}
				
				function show_pak($no_usulan){
					$data_dasar=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
					$usulan_status_id=$data_dasar->usulan_status_id;
					$showp['usulan_status_id'] = $usulan_status_id;
					$showp['no'] = $no_usulan;			
					$this->load->view('Show_pak',$showp);      
					
						}
		
						function show_resume($no_usulan){
							//$pendidikan=$this->db->query("SELECT a.`usulan_no`,a.`tgl`,b.`nama` AS bidil,c.`nama` AS nm_jenjang FROM `usulan_pendidikans` a LEFT JOIN `bidang_ilmus` b ON a.`bidang_ilmu_kode`=b.`kode` 
							//	JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`usulan_no`='$no_usulan' ")->result();			 
									
									//$d_pendidikan['data_didik'] = $pendidikan;			
									$this->load->view('Show_resume');    
							
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

function usulan($filter){

	$draw=$_REQUEST['draw'];

	/*Jumlah baris yang akan ditampilkan pada setiap page*/
	$length=$_REQUEST['length'];
	$start=$_REQUEST['start'];
	$search=$_REQUEST['search']["value"];
	$q_stat= $this->db->query("select * from usulan_statuses where id='$filter' ")->row();
	$id_sts=$q_stat->id;
	$status=$q_stat->nama_status;	
	
 
	$this->db->where('usulan_status_id', $id_sts);
	$this->db->from('v_usulan');
	$total=$this->db->count_all_results();
	

	$output=array();


	$output['draw']=$draw;


	$output['recordsTotal']=$output['recordsFiltered']=$total;
	$output['data']=array(); 

 

	/*Lanjutkan pencarian ke database*/
	
	$this->db->limit($length,$start);

	// $this->db->order_by('created_date','DESC');
	 //$this->db->order_by('tanggal_surat','DESC');

	//$query=$this->db->get_where('v_usulan',array('kode_pt' => $pt)); 
	$this->db->select('*');
	$this->db->from('v_usulan');
	$this->db->where('usulan_status_id',$id_sts);
	$query=$this->db->get();
	

	if($search!=""){	
		
	//$this->db->like("no_surat",$search);
	//$this->db->or_like("perihal",$search); 

	$this->db->select('*');
	$this->db->from('v_usulan');
	$this->db->where('usulan_status_id',$id_sts);
	
	$query=$this->db->get();	
	

	
	}
	


	$nomor_urut=$start+1;
	foreach ($query->result_array() as $surat) {
		$no_jfa_usulan=$surat['jabatan_usulan_no'];

		$no_jad_usulan=$this->get_usulan_jad($no_jfa_usulan);


		$output['data'][]=array($surat['updated_at'],$surat['no'],$surat['nidn'],$surat['nidk'],$surat['nama'],$surat['nama_instansi'],$surat['nama_prodi'],$no_jad_usulan,$status, '<a href=show/'.$surat['no'].' data-toggle="tooltip" title="Detail Ajuan">
		<button type="button" class="btn btn-sm btn-circle btn-primary">
		<i class=" icon-magnifier " ></i>
	 </button></a>');
	
		$nomor_urut++;
		}

	
	

	

	echo json_encode($output);

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
	$no_usulan= $this->input->post('no_usulan');
	$id_status= $this->input->post('status_usulan');
	$statusnya= $this->input->post('statusnya');
	$keterangan= $this->input->post('keterangan');
	$keterangan_pengusul= $this->input->post('keterangan_pengusul');
	$no_log=date("ymdHis");

	
	$update="update usulans set usulan_status_id='$id_status',updated_at=now() where no='$no_usulan'";
	$this->db->query($update);
 	$log="INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,keterangan_pengusul,created_at,updated_at)
	  values ('$no_log','$no_usulan','$id_status','$keterangan','$keterangan_pengusul',now(),now())";
		$this->db->query($log); 
	
		
		redirect(base_url().'ketenagaan/ketenagaan/'.$statusnya);
	
	
	}

	function updatePenilai($no_usulan){
		$no_usulan= $this->input->post('no_usulan');
		$penilaibaru= $this->input->post('caripenilai');
		
	
		
		$update="update usulans set user_penilai_no='$penilaibaru',updated_at=now() where no='$no_usulan'";
		$this->db->query($update);
		
		
			
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
		// Vusulan('print_dupak_a',$printa);
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
		$data_pak=$this->db->query("SELECT no FROM `usulans` WHERE no='$no_usulan'")->num_rows();
		if($data_pak > 0){		
		
		if($this->upload->do_upload('berkas')){
			$pak=$this->upload->data();
			$update="update usulans set pak = '$pak[file_name]' where  no='$no_usulan'";
			$this->db->query($update);
			}else{
				$this->session->set_flashdata('error','Format atau Ukuran File Tidak Sesuai');
						redirect(base_url().'ketenagaan/ketenagaan/show/'.$no_usulan);
			}
			$this->session->set_flashdata('flash','DiUpload');
				redirect(base_url().'ketenagaan/ketenagaan/show/'.$no_usulan);
		}
		
	
}

}
?>