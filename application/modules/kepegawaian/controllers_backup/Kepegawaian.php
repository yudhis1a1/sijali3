<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Kepegawaian extends MX_Controller
{


	function __construct()
	{
	 
			$this->load->helper('date_helper');
			$this->load->helper('terbilang_helper');
		
			$user= $this->session->userdata('username');
	}


	function __destruct()
	{
	}

	function usulanbaru()
	{
	  	
		$data['filter'] = '3';
	
        $data['judul'] = 'Usulan Baru';
		vusulan('Beranda',$data);      
	}     

	function approval_penilai(){

		$data['filter'] = '4';
        $data['judul'] = 'Proses Approval Tim Penilai';
		vusulan('Beranda',$data);  

	}

	function proses_nilai(){

		$data['filter'] = '5';
        $data['judul'] = 'Proses Penilaian';
		vusulan('Beranda',$data);  

	}
	function proses_ketenagaan(){

		$data['filter'] = '6';
        $data['judul'] = 'Proses Operator Sub PTK';
		vusulan('Beranda',$data);  

	}
	function proses_dikti(){

		$data['filter'] = '7';
        $data['judul'] = 'Proses Dikti';
		vusulan('Beranda',$data);  

	}
	function proses_kepegawaian(){

		$data['filter'] = '8';
        $data['judul'] = 'Proses Operator Sub HKT';
		vusulan('Beranda',$data);  

	}
	function proses_selesai(){

		$data['filter'] = '9';
        $data['judul'] = 'Selesai';
		vusulan('Beranda',$data);  

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
		$no_jad_usulan=$this->get_jad_usulan($no_jfa_usulan);
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
	function show_matakul($no_usulan){
		$d_mtk['no_usulan'] = $no_usulan;			
		$this->load->view('show_mtk',$d_mtk);   
	
		}

		function Show_pendidikan($no_usulan){
			$pendidikan=$this->db->query("SELECT a.`no`,a.`usulan_no`,a.`tgl`,b.`nama_bidang` AS bidil,c.`nama_jenjang` AS nm_jenjang FROM `usulan_pendidikans` a LEFT JOIN `bidang_ilmus` b ON a.`bidang_ilmu_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`usulan_no`='$no_usulan' ")->result();	
			$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
			$usulan_status_id=$data->usulan_status_id;
			$d_pendidikan['usulan_status_id'] = $usulan_status_id;			
			$d_pendidikan['data_didik'] = $pendidikan;			
			$d_pendidikan['no'] = $no_usulan;				
			$this->load->view('show_pendidikan',$d_pendidikan);    
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
					$this->load->view('show_a',$showa); 
				}

           
			
				function bidangB($no_usulan){
			
				  
					$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
					$usulan_status_id=$data->usulan_status_id;
					$showb['usulan_status_id'] = $usulan_status_id;
					$showb['no'] = $no_usulan;
					//$showb['jabatan_no'] = $jabatan_no;
					$this->load->view('show_b',$showb);  
			
				}

					function bidangC($no_usulan){
			
				  
					$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		
		$showc['usulan_status_id'] = $usulan_status_id;
		
		$showc['no'] = $no_usulan;
		//$showc['jabatan_no'] = $jabatan_no;
					$this->load->view('show_c',$showc);   
			
				}

				function bidangD($no_usulan){
			
				  
					$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id=$data->usulan_status_id;
		
		$showd['usulan_status_id'] = $usulan_status_id;
		$showd['no'] = $no_usulan;
		//$showd['jabatan_no'] = $jabatan_no;
					$this->load->view('show_d',$showd);     
			
				}

				function show_pak($no_usulan){
					$data_dasar=$this->db->query("SELECT
					b.`no`,
					b.`jabatan_tgl`,
					e.`nama_ikatan`,
					b.`karpeg`,
					b.`lahir_tempat`,
					b.`jk`,
					b.`lahir_tgl`,
					b.`nama`,
					b.`gelar_belakang`,
					b.`gelar_depan`,
					b.`nip`,
					b.`nidn`,
					a.masa_penilaian_awal,
					a.masa_penilaian_akhir,
					a.jabatan_usulan_no,
					a.`sk_no`,
					a.`sk_tgl`,
					a.`sk_tmt`,
					a.`tmt_tahun`,
					a.`tmt_bulan`,
					a.`tmt_no`,
					a.`tmt_tgl`,
					c.`nama_prodi`,
					d.`nama_instansi`,
					a.user_penilai_keterangan,
					a.tempat_surat,
					a.usulan_status_id,
					a.pak,
					f.`jabatan_akhir_no`,
					h.`nama_jabatans`,
					a.jenjang_id_lama,
					h.kum,
					a.jabatan_no,
					c.instansi_kode
				  FROM
					usulans AS a,
					dosens AS b,
					`prodis` AS c,
					`instansis` AS d,
					ikatan_kerjas AS e,
					jabatan_syarats AS f,
					jabatan_jenjangs AS g,
					jabatans AS h
				  WHERE a.`no` = '$no_usulan'
					AND a.`dosen_no` = b.`no`
					AND b.`prodi_kode` = c.`kode`
					AND c.`instansi_kode` = d.`kode`
					AND b.`ikatan_kerja_kode`=e.`kode`
					AND a.`jabatan_usulan_no`=f.`jabatan_usulan_no`
					and f.jabatan_usulan_no=g.no
					AND g.jabatan_kode=h.kode")->row();
					$usulan_status_id=$data_dasar->usulan_status_id;
					$pak= $data_dasar->pak;	
					if (isset($pak)){
						$showp['pak'] = '<a href="'.base_url().'assets/pak/'.$pak.'" data-toggle="tooltip" title="View/Unduh" target="_blank" class="btn btn-success">
						<i class="fa fa-download"></i>
						Download PAK
					</a>';
							
					}else{
						$showp['pak']='<a href="" data-toggle="modal" title="Dokumen tidak tersedia" class="btn btn-danger">
						<i class="fa fa-close"></i>
						Download PAK
						 </a>';	
					}
					$kum=$data_dasar->kum;
					$kodept=$data_dasar->instansi_kode;

					if (substr($kodept,1,3)=='031'||substr($kodept,1,3)=='032'){
						$pimpinan='Rektor';
					}else if (substr($kodept,1,3)=='033'){
						$pimpinan='Ketua';
					}else{//034 & 035
						$pimpinan='Direktur';
					}
					$showp['pimpinan'] = $pimpinan;	

					$showp['usulan_status_id'] = $usulan_status_id;
					$showp['no'] = $no_usulan;	
					
					$showp['data_dasar'] = $data_dasar;		
					$showp['tmt_tgl'] = gfDateStandart($data_dasar->tmt_tgl);	
					$showp['sk_tmt'] = gfDateStandart($data_dasar->sk_tmt);	
					$showp['tgl_lahir'] = gfDateStandart($data_dasar->lahir_tgl);	
					$showp['tmp_lahir'] = ucfirst(strtolower($data_dasar->lahir_tempat));	
					$showp['sk_tgl'] = gfDateStandart($data_dasar->sk_tgl);	
					$showp['terbilang'] = $this->terbilang($kum);		
					$status_jabatan=$data_dasar->jabatan_no;

					if ($status_jabatan<'40'){
						$this->load->view('show_pak',$showp);   
					}else{
						$kumusul=$this->get_kum_usulan_jad($data_dasar->jabatan_usulan_no);	
						$showp['jabusul'] = $this->get_usulan_jad($data_dasar->jabatan_usulan_no);	
						
						$showp['jadlama'] = $this->get_jad_lama($data_dasar->jabatan_no);	
						
						$totalkumlama=$this->get_kum_lama($no_usulan);
						$kumpenilai=$this->get_kum_penilai($no_usulan);	
						$totalkum=number_format($totalkumlama+$kumpenilai,2);
						//$totalkum='205.00';
						if (substr($totalkum,4,2)=='00'){
							$kumusul=substr($totalkum,0,3);
						}else{
							$kumusul=$totalkum;
						}
						$showp['kumusul'] = $kumusul;
						$showp['terbilangusul'] = number_to_words($totalkum);
						$this->load->view('show_pak_kenaikan',$showp);   
					}
					 
					
						}

						function editpak($no_usulan){
							$data_dasar=$this->db->query("SELECT
							b.`no`,
							a.`no` as usulans_no,
							b.`jabatan_tgl`,
							e.`nama_ikatan`,
							b.`karpeg`,
							b.`lahir_tempat`,
							b.`jk`,
							b.`lahir_tgl`,
							b.`nama`,
							b.`gelar_belakang`,
							b.`gelar_depan`,
							b.`nip`,
							b.`nidn`,
							a.masa_penilaian_awal,
							a.masa_penilaian_akhir,
							a.jabatan_usulan_no,
							a.`sk_no`,
							a.`sk_tgl`,
							a.`sk_tmt`,
							a.`tmt_tahun`,
							a.`tmt_bulan`,
							a.`tmt_no`,
							a.`tmt_tgl`,
							c.`nama_prodi`,
							d.`nama_instansi`,
							a.user_penilai_keterangan,
							a.tempat_surat,
							a.usulan_status_id,
							a.pak,
							f.`jabatan_akhir_no`,
							a.jenjang_id_lama,
							a.jabatan_no,
							h.`nama_jabatans`,
							h.kum,
							c.instansi_kode
						  FROM
							usulans AS a,
							dosens AS b,
							`prodis` AS c,
							`instansis` AS d,
							ikatan_kerjas AS e,
							jabatan_syarats AS f,
							jabatan_jenjangs AS g,
							jabatans AS h
						  WHERE a.`no` = '$no_usulan'
							AND a.`dosen_no` = b.`no`
							AND b.`prodi_kode` = c.`kode`
							AND c.`instansi_kode` = d.`kode`
							AND b.`ikatan_kerja_kode`=e.`kode`
							AND a.`jabatan_usulan_no`=f.`jabatan_usulan_no`
							and f.jabatan_usulan_no=g.no
							AND g.jabatan_kode=h.kode")->row();
							$usulan_status_id=$data_dasar->usulan_status_id;
							$kodept=$data_dasar->instansi_kode;
							$pak= '';	
							if (!isset($pak) || $pak==''){
								$showp['pak']='<a href="" data-toggle="modal" title="Dokumen tidak tersedia" class="btn btn-danger">
								<i class="fa fa-close"></i>
								Download PAK
								 </a>';		
							}else{
								$showp['pak'] = '<a href="'.base_url().'/assets/pak/'.$pak.'" data-toggle="tooltip" title="View/Unduh" target="_blank" class="btn btn-success">
										<i class="fa fa-download"></i>
										Download PAK
									</a>';
							}
							if (substr($kodept,1,3)=='031'||substr($kodept,1,3)=='032'){
								$pimpinan='Rektor';
							}else if (substr($kodept,1,3)=='033'){
								$pimpinan='Ketua';
							}else{//034 & 035
								$pimpinan='Direktur';
							}
							$showp['pimpinan'] = $pimpinan;	
		
							$kum=$data_dasar->kum;
							$showp['usulan_status_id'] = $usulan_status_id;
							$showp['no'] = $no_usulan;	
							$showp['data_dasar'] = $data_dasar;		
							$showp['tmt_tgl'] = gfDateStandart($data_dasar->tmt_tgl);	
							$showp['terbilang'] = $this->terbilang($kum);		
							$status_jabatan=$data_dasar->jabatan_no;
		
							if ($status_jabatan<'40'){
								Vusulan('edit_pak',$showp);   
							}else{
								Vusulan('edit_pak_kenaikan',$showp);   
							}
							 
							
								}

								function updatesk(){
									$user= $this->session->userdata('username');
									$usulan_status_id= $this->input->post('usulan_status_id');
									$no_usulan= $this->input->post('no_usulan');
									$sk_no= $this->input->post('sk_no');
									$sk_tmt= $this->input->post('sk_tmt');
									$sk_tgl= $this->input->post('sk_tgl');
								
								
								
									
									$update="update usulans SET sk_no='$sk_no',sk_tmt='$sk_tmt',sk_tgl='$sk_tgl',updated_at=now() where no='$no_usulan'";
									$this->db->query($update);
									$no_log=date("ymdHis");
							
									$usernama=$this->db->query("SELECT a.`nama`,a.`username` FROM `users` a WHERE a.`username`='$user' ")->row();
									
									$keterangan="Data SK diupdate oleh:".$usernama->nama;
								$log="INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,created_at,updated_at)
								  values ('$no_log','$no_usulan','$usulan_status_id','$keterangan',now(),now())";
									$this->db->query($log); 
								
										$this->session->set_flashdata('flash','SK Telah Diupdate');
										redirect(base_url().'kepegawaian/kepegawaian/Show/'.$no_usulan);
									
									
									}
		
									function show_resume($no_usulan){
										$data_dasar=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
										$usulan_status_id=$data_dasar->usulan_status_id;
										$showr['usulan_status_id'] = $usulan_status_id;
										$showr['no'] = $no_usulan;			
												$this->load->view('show_resume',$showr);    
										
											}
		
								function show_ceklist($no_usulan){
									$data_ceklis=$this->db->query("SELECT * FROM `usulan_ceklists` WHERE usulan_no='$no_usulan'")->row();
		
									$data=$this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
									$usulan_status_id=$data->usulan_status_id;
									
									$show_syarat['usulan_status_id'] = $usulan_status_id;
									$show_syarat['no'] = $no_usulan;
									$show_syarat['ceklis'] = $data_ceklis;			
									$this->load->view('show_persyaratan',$show_syarat);       
									
										}
function show_log($no_usulan){
	$riwayat=$this->db->query("SELECT  a.*,b.`nama_status` FROM `usulan_riwayat_statuses` a LEFT JOIN `usulan_statuses` b ON a.`usulan_status_id`=b.`id` 
					where a.usulan_no='$no_usulan'");
						 
						
						 $show_riwayat['label'] = 'Status Riwayat JFA';
						$show_riwayat['rwy'] = $riwayat;
					$this->load->view('show_log',$show_riwayat);      
											
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
		1=>'no',
		2=>'nidn',
		3=>'nidk',
		4=>'nama',
		5=>'nama_instansi',
		6=>'nama_prodi',
		7=>'jabatan_usulan_no',	
		8=>'usulan_status_id',
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

		$no_jad_usulan=$this->get_jad_usulan($no_jfa_usulan);

		
	
		$output['data'][]=array('<a href=show/'.$surat['no'].' data-toggle="tooltip" title="Detail Ajuan"><button type="button" class="btn btn-sm btn-circle btn-primary"><i class="  icon-book-open" ></i> </button></a>',
		'<a href=tampil_resume/'.$surat['no'].' data-toggle="tooltip"  title="Resume Dosen" target="_blank" class="btn btn-success">Resume</a>'
		,$surat['no'],$surat['nidn'],$surat['nidk'],$surat['nama'],$surat['nama_instansi'],$surat['nama_prodi'],$no_jad_usulan,$status,$surat['updated_at'] );
	
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
	 $jad_usulan=$nm_jad_usul;
	 $label_kum=$nm_jad_usul.'  dengan angka kredit sebesar '.$kum_jad_usulan.' ('.$this->terbilang($kum_jad_usulan).')';

	 return $jad_usulan;
}

function get_kum_lama($no){


	$kum_jab_lama=$this->db->query("SELECT a.*,b.`no`,b.`dosen_no`,b.`jabatan_no` FROM `jabatans` a RIGHT JOIN `usulans` b ON a.`kode`=b.`jabatan_no` WHERE b.`no`='$no' ")->row();
	

  if(isset($kum_jab_lama->kum)){
   $kum_jab=number_format($kum_jab_lama->kum,2);
  }else {
   $kum_jab='0.00';
  }
	 return  $kum_jab;
}

function get_kum_penilai($no){


	$ptotal_all=$this->db->query("SELECT
	a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
 FROM
   dupaks AS a,
   `usulan_dupaks` AS b
 WHERE b.`dupak_no` = a.`no`
   AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('1','2','3','4','5')
  GROUP BY b.`usulan_no`")->row();

  $kumbaru=$ptotal_all->kum_penilai_baru;
  
	 return $kumbaru;
}

function get_kum_usulan_jad($no_jfa_usulan){


	$q_usulan_jfa=$this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum
	 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jfa_usulan'")->row();
	 
	 $nm_jad_usul=$q_usulan_jfa->nm_jabatan;
	 $jen_jad_usulan=$q_usulan_jfa->nm_jenjang;
	 $kum_jad_usulan=$q_usulan_jfa->kum;
	 $jad_usulan=$nm_jad_usul;
	// $label_kum=$nm_jad_akhir.'  dengan angka kredit sebesar '.$kum_jad_akhir.' ('.$this->terbilang($kum_jad_akhir).')';

	 return $kum_jad_usulan;
}

function get_jad_usulan($no_jfa_usulan){


	$q_usulan_jfa=$this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum
	 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jfa_usulan'")->row();
	 
	 $nm_jad_usul=$q_usulan_jfa->nm_jabatan;
	 $jen_jad_usulan=$q_usulan_jfa->nm_jenjang;
	 $kum_jad_usulan=$q_usulan_jfa->kum;
	 $jad_usulan=$nm_jad_usul.' '.$kum_jad_usulan.' ('.$jen_jad_usulan.')';

	 return $jad_usulan;
}

function updateStatus($no_usulan){

	$id_status= $this->input->post('status_usulan');
	$statusnya= $this->input->post('statusnya');
	$nousulan=$this->input->post('no_usulan');
	$keterangan=$this->input->post('keterangan');
	$keterangan_pengusul=$this->input->post('keterangan_pengusul');
	$nolog=date('ymdHis');
	
	$update="update usulans set usulan_status_id='$id_status',updated_at=now() where no='$no_usulan'";
	$this->db->query($update);

 	$log="INSERT INTO `usulan_riwayat_statuses` (
		`no`,
		`usulan_no`,
		`usulan_status_id`,
		`keterangan`,
		`keterangan_pengusul`,
		`created_at`,
		`updated_at`
	  ) values ('$nolog','$nousulan','$id_status','$keterangan','$keterangan_pengusul',now(),now())";
		$this->db->query($log); 
	
		$this->session->set_flashdata('flash','Diubah');
		redirect(base_url().'kepegawaian/kepegawaian/'.$statusnya);
	
	
	}
function get_jad_lama($no_jad_akhir){


	$jadlama=$this->db->query("select * from jabatans a WHERE a.`kode`='$no_jad_akhir'")->row();
	 
	 $nm_jad_akhir=$jadlama->nama_jabatans;
	 $kum_jad_akhir=$jadlama->kum;
	 $jad_awal=$nm_jad_akhir.'  dengan angka kredit sebesar '.$kum_jad_akhir.' ('.$this->terbilang($kum_jad_akhir).')';

	 return $jad_awal;
} 
function tampil_resume($no_usulan)
		{
			$printres['no'] = $no_usulan;
			$this->load->view('tampil_resume',$printres);
		}
public function print_bidanga($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		// vusulan('print_dupak_a',$printa);
		$this->load->view('print_dupak_a',$printa);
   
	}  
	public function print_bidangb($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		// vusulan('print_dupak_a',$printa);
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

	function uploadSK()
	{
		$nidn = $this->input->post('nidn');
		$no_usulan = $this->input->post('no_usulan');
		$tgl_create=date("y-m-d H:i:s");
		$tgl_update=date("y-m-d H:i:s");
		$no=date("ymdHis");
		$file_path = './assets/sk/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'SK_'.$no.'_'.$nidn;
		$this->load->library('upload',$config);
		$data_pak=$this->db->query("SELECT no FROM `usulans` WHERE no='$no_usulan'")->num_rows();
		if($data_pak > 0){		
		
		if($this->upload->do_upload('berkas')){
			$pak=$this->upload->data();
			$update="update usulans set sk_jafung = '$pak[file_name]' where  no='$no_usulan'";
			$this->db->query($update);
			}else{
				$this->session->set_flashdata('error','Format atau Ukuran File Tidak Sesuai');
						redirect(base_url().'kepegawaian/kepegawaian/show/'.$no_usulan);
			}
			$this->session->set_flashdata('flash','DiUpload');
			$no_log=date("ymdHis");

			$usernama=$this->db->query("SELECT a.`nama`,a.`username` FROM `users` a WHERE a.`username`='$user' ")->row();	
			
			$keterangan="Data SK diupload oleh:".$usernama->nama;
			$log="INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,created_at,updated_at)
				values ('$no_log','$no_usulan','8','$keterangan',now(),now())";
			$this->db->query($log); 
				redirect(base_url().'kepegawaian/kepegawaian/show/'.$no_usulan);
		}
		
	
}

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";

	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = $this->penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . $this->penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . $this->penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim($this->penyebut($nilai));
	} else {
		$hasil = trim($this->penyebut($nilai));
	}     		
	return $hasil;
}


function download_matkul($id){ 
	force_download('assets/download_matkul/'.$id,NULL);
	}
	
function download_pendidik($id){ 
	force_download('assets/download_pendidik/'.$id,NULL);
	}
 

function logout(){
 // $this->session->sess_destroy();
 // 	 echo "<script>window.location.href='". base_url()."akun/login';</script>";
         
//  redirect(base_url('usulan/login'));
 }
  
	 




	

}
?>