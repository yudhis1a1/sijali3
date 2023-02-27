<?php
error_reporting(0);
$role= $this->session->userdata('nama');
?>
 
 <!-- row -->








 <div class="row" >
                    <div class="col-lg-12" > 
                        <div class="card">
                            <div class="card-body" >
                                <h4 class="card-title"></h4>
                                <a href="#uploadPakModal" data-toggle="modal" class="btn btn-info">
                               <i class="fa fa-upload"></i>
                                  Upload PAK
                                </a>
                               
                                <a href="" data-toggle="modal" class="btn btn-primary" onclick="printDiv('content_surat');">
                               <i class="fa fa-print"></i>
                                  Print PAK
                                </a>
                               
                                  <a href="<?= base_url()?>ketenagaan/ketenagaan/editPak/<?php echo $no; ?>" class="btn btn-danger" >
                                <i class="fa fa-edit"></i>
                                   Edit PAK
                                 </a>
                              
                                 
                            </div>
                        </div>
                    </div>
               
                </div>

 
  <div id="content_surat">   
                
<style>
 .cust-print-table {
  font-family: "Calibri";
  font-weight: bold;
  font-size: 16px;  
 }
 .table-responsive {
  font-family: "Calibri";
  font-weight: bold;
  font-size: 16px;  
  margin-top: 10px;
 }
 hr.h {
    
    margin-top: -1rem;
    margin-bottom: 0.1rem;   
    border-top: 1px solid black;
}

li.a {
 
 margin-left: 100px;

}
 p {
  line-height: 1;
 }

@media print {
  @page{
  size: 8.5in 11in;   
   padding: 5px;
   margin: 15px ;
 }
 @page :first {
         margin-top: 0 ;  
      }
 .cust-print-table {
  font-family: "Calibri";
  font-weight: bold;
  font-size: 16px;  
 }
 .table-responsive {
  font-family: "Calibri";
  font-weight: bold;
  font-size: 16px;  
  position:absolute;
 
 }
 hr.h {
    
    margin-top: -1rem;
    margin-bottom: 0.1rem;   
    border-top: 1px solid black;
}
hr {    
 
    margin: 1px;   
    border-top: 1px solid black;
}

li.a {
 
 margin-left: 100px;
}

 p {
  line-height: 1;
 }
}
</style>              
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                               
                                  
                                <div class="row">
              <div class="col-md-12">
                <center>
                  <!-- <img src="<?= base_url()?>assets/images/tutwurihandayani.png" height="130px;"> -->
                  <h3>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>REPUBLIK INDONESIA</h3>
                <hr/>
                </center>
              </div>
            </div>  

                <?php           
				date_default_timezone_set('Asia/Jakarta');
        $resume=$this->db->query("SELECT a.*,
        b.`no` as nodos,
        b.`jabatan_no`,
        b.`jabatan_tgl`,
        b.`pengangkatan_tgl`,
        e.`nama_ikatan`,
        b.`karpeg`,
        b.`lahir_tempat`,
        b.`jk`,
        b.`lahir_tgl`,
        b.`nama`,
        b.`jenjang_id`,
        f.`nama_jenjang`,
        b.`gelar_belakang`,
        b.`gelar_depan`,
        b.`nip`,
        b.`nidn`,
        b.`nidk`,        
        c.`instansi_kode`,
        c.`nama_prodi`,
        d.`nama_instansi`,
        b.`bidang_ilmu_kode`,
        g.`nama_bidang`,
        a.user_penilai_tgl,
        d.kota,
        c.jenjang_id as prodi_jen
        FROM
        usulans AS a,
        dosens AS b,
        `prodis` AS c,
        `instansis` AS d,
        ikatan_kerjas AS e,
        `jenjangs` AS f,
        `bidang_ilmus` AS g
        WHERE a.`no` = '$no'
        AND a.`dosen_no` = b.`no`
        AND b.`prodi_kode` = c.`kode`
        AND c.`instansi_kode` = d.`kode`
        AND b.`ikatan_kerja_kode` = e.`kode`
        AND b.`jenjang_id`=f.`id`
        AND b.`bidang_ilmu_kode`=g.`kode`")->row();
				
$nodos=$resume->nodos;
$g_depan=ltrim($resume->gelar_depan," ,");


$tgl_awal=gfDateStandart($resume->jabatan_tgl);
$masa_awal= $tgl_awal;
// tgl pengangkatan dosen
$tmt_dosen=gfDateStandart($resume->pengangkatan_tgl);
$tmtdosen= $tmt_dosen;




$tgl_lahir=gfDateStandart($resume->lahir_tgl);
$tgl= $tgl_lahir;


$tgl_pak=gfDateStandart($resume->pak_tgl);
$tglpak= $tgl_pak;

$hari=$this->db->query("SELECT WEEKDAY(LAST_DAY(a.`user_penilai_tgl`))  AS hari FROM usulans a WHERE a.`no`='$no' ")->row();

  $tgl_terakhir = date('Y-m-t', strtotime($resume->user_penilai_tgl));
if ( $hari->hari == 5){
    $tgl_p_akhir=date('Y-m-d', strtotime('-1 days', strtotime($tgl_terakhir)));
} elseif ($$hari->hari== 6){
  $tgl_p_akhir=date('Y-m-d', strtotime('-2 days', strtotime($tgl_terakhir)));
} else {
  $tgl_p_akhir= $tgl_terakhir;
}



$tgl_akhir=gfDateStandart($tgl_p_akhir);
//$masa_akhir= $tgl_akhir;
/*  if (($hari->hari == 5)){
  $tgltmt=date('Y-m-d', strtotime('+2 days', strtotime($tgl_terakhir)));
} else  {
$tgltmt=date('Y-m-d', strtotime('+1 days', strtotime($tgl_terakhir)));
} */
 

$tgltmt=date('Y-m-d', strtotime('+1 days', strtotime($tgl_terakhir)));
$tgltmtdiff=$tgltmt;
$tgl_tmt=gfDateStandart($tgltmt);
$tgl_terhitung= $tgl_tmt;


?>       
                 <table  class="cust-print-table cust-table-bordered">
                  
                  <col width="30" />
                  <col width="30" />
                  <col width="20" />
                  <col width="150" />
                  <col width="20" />
                  <col width="20" />
                  <col width="20" />
                  <col width="120" />
                  <col width="120" />
                  <col width="120" />

                  <tbody>
                    
                    <tr  >
                     <center>
                       <b style="font-weight: bold;">
                        PENETAPAN ANGKA KREDIT
                        <br>Nomor : <?=$resume->tmt_no?> 
                        <?php if($resume->jabatan_no== '31') {?>
                        <br>Masa Penilaian : Tanggal <?=$tmtdosen?>  s/d <?=$tgl_akhir?> 

                        <?php } else { ?>
                          <br>Masa Penilaian : Tanggal <?=$masa_awal?>  s/d <?=$tgl_akhir?> 
                        <?php }?>
                         </b>
                        </center>
                    </tr>
                 
                    <tr  >
                      <th class="text-center" rowspan="15" style="vertical-align: top;">I</th>
                      <th colspan="10" class="text-center" style="font-weight: bold;">KETERANGAN PERORANGAN</th>

                    </tr>
                    <tr >
                      <td class="text-center" >1.</td>
                      <td colspan="3" >Nama</td>
                      <?php if(!empty($resume->gelar_depan)){ ?>
                      <td colspan="5" ><?=$g_depan?>. <?=$resume->nama?>, <?=$resume->gelar_belakang?> </td>
                      <?php } else { ?>
                        <td colspan="5" ><?=$resume->nama?>, <?=$resume->gelar_belakang?> </td>
                        <?php }?>
                    </tr>
                    <tr>
                      <td class="text-center">2.</td>
                      <td colspan="3">Status Kepegawaian</td>
                      <td colspan="5"><?=$resume->nama_ikatan?> </td>
                    </tr>
                    <?php if(!empty($resume->nidn)){
                      $nidn=$resume->nidn;
                    } else {
                      $nidn=$resume->nidk;
                    }
                      ?>
                    <tr>
                      <td class="text-center">3.</td>
                      <td colspan="3">NIDN / NIDK</td>
                      <td colspan="5"> <?=$nidn?></td>
                    </tr>
                    <?php if(!empty($resume->nip)){
                      $nip=$resume->nip;
                    } else {
                      $nip='-';
                    }
                    if(!empty($resume->karpeg)){
                      $karpeg=$resume->karpeg;
                    } else {
                      $karpeg='-';
                    }
                      ?>

                    <tr>
                      <td class="text-center">4.</td>
                      <td colspan="3">NIP. / No. KARPEG</td>
                      <td colspan="5"><?=$nip?> / <?=$karpeg?></td>
                    </tr>
                    <tr>
                      <td class="text-center">5.</td>
                      <td colspan="3">Tempat dan Tanggal Lahir</td>
                      <td colspan="5"><?=$resume->lahir_tempat?>, <?=$tgl?></td>
                    </tr>
                    <?php 
                    if($resume->jk=='L'){ $jkel="Laki-Laki" ;} else { $jkel="Perempuan"; }
                    ?>
                    <tr>
                      <td class="text-center">6.</td>
                      <td colspan="3">Jenis Kelamin</td>
                      <td colspan="5">
                      <?=$jkel ?>
                      </td>
                    </tr>
                
                    <tr>
                      <td class="text-center">7.</td>
                      <td colspan="3">Pendidikan Tertinggi </td>
                      <td colspan="5">
                      <?php
                     $resume_didik=$this->db->query("SELECT 
                     b.`no_dosen`,
                     f.nama_instansi ,
                     b.`institusi_pak`,
                     b.`jenjang_pak`,
                      g. nama_jenjang,
                      b.`prodi_pak`,                   
                      b.`thn_lulus`,
                       b.`tgl_lulus_pak`, 
                      b.`tgl_ijazah_pak` ,
                      b.`id_rwy_didik_formal`   ,
                      b.`id_sms`                  
                      FROM dosens a
                      LEFT JOIN `rwy_pend_pak` b
                      ON a.`no`=b.`no_dosen`
                      LEFT JOIN bidang_ilmus d
                      ON b.`id_bid_studi`=d.`kode` 
                      LEFT JOIN sms e
                      ON b.`id_sms`=e.`id_sms` 
                      LEFT JOIN instansis_nasional f
                      ON e.`id_sp`=f.`id_sp`
                      LEFT JOIN jenjangs g
                      ON e.`id_jenj_didik`=g.`id`
                      WHERE a.`no`='$resume->dosen_no' ORDER BY b.`thn_lulus` ASC")->result();
                    ?>
                      <?php
                
                      foreach($resume_didik as $pendidikan) :
                        $tgl_lulus=gfDateStandart($pendidikan->tgl_lulus_pak);
                        $tgl_ijazah=$tgl_lulus;
                        $bidang=ucwords($pendidikan->prodi_pak); 
                        $institusi_pak=ucwords($pendidikan->institusi_pak); 
                     
                      ?>
                        <?=$pendidikan->nama_jenjang;?>, <?=$bidang;?>, <?=$institusi_pak;?>, <?=$tgl_lulus;?> </br>                     
                      
                          <?php endforeach; ?>
                      </td>
                     
                    </tr>
                    <?php
                 	$resume_golongan=$this->db->query("SELECT
                   a.`no`,
                   a.`golongan_kode`,
                   a.`golongan_tgl`,
                   b.`nama`,
                   b.`kode_gol`
                 FROM
                   dosens AS a,
                   `golongans` AS b
                 WHERE a.`no` = '$resume->dosen_no'
                   AND a.`golongan_kode` = b.`kode`")->row();
                  $gol_next=$resume_golongan->golongan_kode+1;      
                            $gol=gfDateStandart($resume_golongan->golongan_tgl);
                            $golongan_tgl=  $gol; 
                            
                    ?>
                    <tr>
                      <td class="text-center">8.</td>
                      <td colspan="3">Pangkat/Golongan Ruang/TMT</td>
                      <?php if($resume_golongan->golongan_kode='99' || empty($resume_golongan->golongan_kode)){ ?>
                        <td colspan="5"><?=$resume_golongan->nama?> <?=$resume_golongan->kode_gol?> / <?=$golongan_tgl?> </td>
                      <?php } else { ?>
                      <td colspan="5"><?=$resume_golongan->nama?> <?=$resume_golongan->kode_gol?> / <?=$golongan_tgl?></td>
                      <?php }?>
                    </tr>
                    <?php
                    	$resume_jabatan=$this->db->query("SELECT
                      a.`no`,
                      a.`jabatan_no`,
                      b.`nama_jabatans`,
                      b.`kum`,
                      a.`pengangkatan_tgl`,
                      a.`jenjang_id`,
                      c.`nama_jenjang`,
                      a.`jabatan_tgl`
                      FROM
                      dosens AS a,
                      `jabatans` AS b,
                      `jenjangs` AS c
                      WHERE a.`no` = '$nodos'
                      AND a.`jabatan_no` = b.`kode`
                      AND a.`jenjang_id` = c.`id`")->row();
                     
                      $tgl=gfDateStandart($resume_jabatan->jabatan_tgl);
					 
                      $jabatan_tgl= $tgl; 

                      
                    $jab_rwy_pak=$this->db->query("SELECT a.`no_usulan`,a.`baru_bulan_pak`,a.`baru_tahun_pak`,a.`lama_bulan_pak`,a.`lama_tahun_pak`,a.tmt_jab_dosen
                    FROM rwy_pak a WHERE a.`no_usulan`='$no';")->row();
                    $tgl_jab=gfDateStandart($jab_rwy_pak->tmt_jab_dosen);
                    $tmt_jabdosen= $tgl_jab;   
                   $jabatan_rwy_pak = $this->db->where(['no_usulan'=> $no])->from("rwy_pak")->count_all_results();

                      ?>

                  <?php if($jabatan_rwy_pak >0) { ?>
                    <tr>                    
                      <td class="text-center">9.</td>
                      <td colspan="3">Jabatan Akademik Dosen/TMT</td>
                     <td colspan="5"><?=$resume_jabatan->nama_jabatans?>, <?=$resume_jabatan->kum?> KUM / <?=$tmt_jabdosen?>
                     
                </tr>
                    <?php }else{ ?>
                    <tr>
                      <td class="text-center">9.</td>
                      <td colspan="3">Jabatan Akademik Dosen/TMT</td>
                      <?php if(empty($resume_jabatan->jabatan_no)){ ?>
                        <td colspan="5">-/- </td>
                      <?php } elseif ($resume_jabatan->jabatan_no=='31') { ?>
						  <td colspan="5"><?=$resume_jabatan->nama_jabatans?>, <?=$resume_jabatan->kum?> KUM / <?=$tmtdosen?></td> 
					  <?php } else { ?>
							
              <td colspan="5"><?=$resume_jabatan->nama_jabatans?>, <?=$resume_jabatan->kum?> KUM / <?=$jabatan_tgl?></td>  
                      <?php  } }?>
                     
                    </tr>
                    <tr>
                      <td class="text-center">10.</td>
                      <?php 
                      	$jenjang_prodi=$this->db->query("SELECT * FROM `jenjangs` a WHERE a.`id`='$resume->prodi_jen'")->row();
                      if (substr($resume->instansi_kode,0,3)=='031'||substr($resume->instansi_kode,0,3)=='032'){ ?>
                      <td colspan="3">Fakultas / Program Studi</td>                      
                      <td colspan="5"><?=$resume->fakultas?> / <?=$resume->nama_prodi?> <?=$jenjang_prodi->nama_jenjang?></td>
                      <?php } else {  ?>
                        <td colspan="3"> Program Studi</td>                      
                      <td colspan="5"> <?=$resume->nama_prodi?>  <?=$jenjang_prodi->nama_jenjang?></td>
                      <?php } ?>
                    </tr>
                    <?php if($resume->jabatan_no == '31') {
                      $diff_lama  = date_diff( date_create(	$resume->pengangkatan_tgl), date_create($resume->pengangkatan_tgl) );
                     // $diff_baru  = date_diff( date_create(	$resume_jabatan->pengangkatan_tgl), date_create($resume->tmt_tgl) );
                      $diff_baru  = date_diff( date_create(	$resume->pengangkatan_tgl), date_create($tgltmt) );
                    } else {
                   
                    
                      $diff_lama  = date_diff( date_create(	$resume->pengangkatan_tgl), date_create($resume->jabatan_tgl) );
                     // $diff_baru  = date_diff( date_create(	$resume_jabatan->pengangkatan_tgl), date_create($resume->tmt_tgl) );
                      $diff_baru  = date_diff( date_create(	$resume->pengangkatan_tgl), date_create($tgltmt) );
                               
                    }

                    if( $jabatan_rwy_pak >0) {
                     ?>
                    <tr>
                      <td class="text-center">11.</td>
                  
                      <td colspan="2">Masa Kerja Golongan</td>
                      <td  width='80'>a. Lama</td>
                     
                      <td colspan="5"><?=$jab_rwy_pak->lama_tahun_pak?> Tahun <?=$jab_rwy_pak->lama_bulan_pak?> Bulan</td>
                      
                    </tr>
                    <tr>
                      <td></td>
                      <td colspan="2"></td>                      
                      <td width='80'>b. Baru</td>
                      <td colspan="5"><?=$jab_rwy_pak->baru_tahun_pak?> Tahun <?=$jab_rwy_pak->baru_bulan_pak?> Bulan</td>
                    </tr>
                    <?php } else { ?>
                      <tr>
                      <td class="text-center">11.</td>
                  
                      <td colspan="2">Masa Kerja Golongan</td>
                      <td  width='80'>a. Lama</td>
                     
                      <td colspan="5"><?=$diff_lama->y?> Tahun <?=$diff_lama->m?> Bulan</td>
                      
                    </tr>
                    <tr>
                      <td></td>
                      <td colspan="2"></td>                      
                      <td width='80'>b. Baru</td>
                      <td colspan="5"><?=$diff_baru->y?> Tahun <?=$diff_baru->m+1?> Bulan</td>
                    </tr>
                    <?php }?>
                    <tr>
                      <td class="text-center">12.</td>
                      <td colspan="3">Unit Kerja</td>
                      <td colspan="5">Lembaga Layanan Pendidikan Tinggi Wilayah III Pada <?=$resume->nama_instansi?></td>
                    </tr>
                    <tr>                      
                     
                    </tr>

                    <?php
if($resume->jabatan_no<>31)
{
	$r_ak_lama=$this->db->query("SELECT
				  a.`dosen_no`,
				  a.`no`,
				  a.`jabatan_no`,
				  b.`nama_jabatans`,
				  b.`kum`,
				  a.`jabatan_tgl`,
				  a.`jenjang_id_lama`,
				  c.`nama_jenjang`,
				  c.`ak`
				FROM
				  `usulans` AS a,
				  `jabatans` AS b,
				  `jenjangs` AS c
				WHERE a.`dosen_no`= '$resume->nodos'
				  AND a.`jabatan_no`=b.`kode`
				  AND a.`jenjang_id_lama`=c.`id`")->row();
}else
{
	$r_ak_lama=$this->db->query("SELECT
				a.`no`,
				a.`jabatan_no`,
				a.`jenjang_id`,
				b.`nama_jabatans`,
				b.`kum`,
				c.`nama_jenjang`,
				c.`ak`,
				a.`jabatan_tgl` 
			FROM
				`dosens` AS a,
				`jabatans` AS b,
				`jenjangs` AS c 
			WHERE
				a.`no` = '$resume->nodos' 
				AND a.`jabatan_no` = b.`kode` 
				AND a.`jenjang_id` = c.`id`")->row();
}
/* $d_ak_lama=mysqli_query($koneksi,$q_ak_lama);
$r_ak_lama=mysqli_fetch_array($d_ak_lama); */

$r_ak_baru=$this->db->query("SELECT
			  a.`no`,
			  b.`jenjang_id`,
			  c.`nama_jabatans`,
			  c.`kum`,
			  d.`nama_jenjang`,
			  d.`ak`,
			  a.`jabatan_tgl`
			FROM
			  `usulans` AS a,
			  `jabatan_jenjangs` AS b,
			  `jabatans` AS c,
			  `jenjangs` AS d
			WHERE a.`no` = '$no'
			  AND a.`jabatan_usulan_no` = b.`no`
			  AND b.`jabatan_kode` = c.`kode`
        AND b.`jenjang_id` = d.`id`")->row();
        
    $dasar=$r_ak_baru->kum-$r_ak_lama->kum;

    
if($r_ak_lama->kum == 0)//jika nilai kum lama = 0
{
	// $pendidikan = nilai angka kredit dari table jenjangs jabatan_usulan_no 
	$pendidikan = $r_ak_baru->ak; 
} else {
	//jika jejang_id pada dosens = jenjang_id pada usulans
	if($r_ak_lama->jenjang_id == $r_ak_baru->jenjang_id) 
	{
		$pendidikan = 0;
	} else {
		$pendidikan = $r_ak_baru->ak - $r_ak_lama->ak;
	}
}

$kebutuhan = $dasar - $pendidikan;
if($kebutuhan <= 0)
{
	$kebutuhan = 10;
} elseif($pendidikan <= 0) {
	$kebutuhan = $dasar;
}

$r_persen=$this->db->query("SELECT
			  a.`no`,
			  a.`jabatan_usulan_no`,
			  b.`jabatan_kode`,
			  c.`kum`,
			  c.`nama_jabatans`,
			  c.`pa`,
			  c.`pb`,
			  c.`pc`,
			  c.`pd`
			FROM
			  `usulans` AS a,
			  `jabatan_jenjangs` AS b,
			  `jabatans` AS c
			 WHERE a.`no`='$no'
			 AND a.`jabatan_usulan_no`=b.`no`
       AND b.`jabatan_kode`=c.`kode`")->row();
       
  
$k=$r_persen->pb*0.01*$kebutuhan;
$k4=$r_persen->pc*0.01*$kebutuhan;
$k5=$r_persen->pd*0.01*$kebutuhan;


?>
                    <tr >
                      <th class="text-center" rowspan="9" style="vertical-align: top;">II</th>
                      <th colspan="6" style="font-weight: bold;">PENETAPAN ANGKA KREDIT</th>
                      <th class="text-center"style="font-weight: bold;">Lama</th>
                      <th class="text-center"style="font-weight: bold;">Baru</th>
                      <th class="text-center"style="font-weight: bold;">Jumlah</th>
                     
                    </tr>
                    <tr >
                      <th class="text-center" rowspan="6" style="vertical-align: top;">1.</th>
                      <th colspan="5"><b>UNSUR UTAMA  <br>A. Pendidikan </b></th>
                     
                     
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                    </tr>
 
                    <?php
                       $kum_jab_lama=$this->db->query("SELECT a.*,b.`no`,b.`dosen_no`,b.`jabatan_no` FROM `jabatans` a RIGHT JOIN `usulans` b ON a.`kode`=b.`jabatan_no` WHERE b.`no`='$no' ")->row();
                       $kat_1=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '1' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
                     if(isset($kum_jab_lama->kum)){
                      $kum_jab=number_format($kum_jab_lama->kum,2);
                     }else {
                      $kum_jab='0.00';
                     }
                     if(isset($kat_1->kum_usulan_baru)){
                      $kum_pendidikan=number_format($kat_1->kum_penilai_baru,2);
                     }else {
                      $kum_pendidikan='0.00';
                     }
                    ?>
                    <tr >
                       <td rowspan="2"></td>
                      <td colspan="4">1) Mengikuti Pendidikan Sekolah dan MemperolehGelar/Ijazah</td>
                      <td class="text-right"><?=$kum_jab?></td>
                      <td class="text-right"><?=$kum_pendidikan?></td>
                      <td class="text-right"><?=number_format($kum_jab+$kum_pendidikan,2)?></td>
               
                    </tr>   
                    <?php
                    $kum_diklat=$this->db->query("SELECT * FROM `usulan_dupaks` a WHERE a.`dupak_no`='A0003' AND a.`usulan_no`='$no' ")->row();
                    if(isset($kum_diklat->kum_usulan_baru)){
                      $kum_prajab=number_format($kum_diklat->kum_usulan_baru,2);
                     }else {
                      $kum_prajab='-';
                     }
                     ?>
                      <td colspan="4">2) Diklat Prajabatan</td>
                      <td class="text-right"><?=$kum_prajab?></td>
                      <td class="text-right"><?=$kum_prajab?></td>
                      <td class="text-right"><?=$kum_prajab?></td>
               
                    </tr>
                    <?php
                     $kat_2=$this->db->query("SELECT
                     a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                  FROM
                    dupaks AS a,
                    `usulan_dupaks` AS b
                  WHERE b.`dupak_no` = a.`no`
                    AND b.`usulan_no` = '$no'
                    AND a.`dupak_kategori_id` = '2' GROUP BY b.`usulan_no`")->row();
                      $kum='0.00';
                    ?>
                    <tr >
                    <td >B.</td>
                      <td colspan="4">Pelaksanaan Pendidikan</td>
                      <td class="text-right"><?=$kum?></td>
                      <td class="text-right"><?=$kat_2->kum_penilai_baru?></td>
                      <td class="text-right"><?=$kat_2->kum_penilai_baru?></td>
                  
                    </tr>
                    <?php
                       $kat_3=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '3' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
                     
                    ?>
                    <tr >
                    <td>C.</td>
                      <td colspan="4">Pelaksanaan Penelitian</td>
                      <td class="text-right"><?=$kum?></td>
                      <td class="text-right"><?=$kat_3->kum_penilai_baru?></td>
                      <td class="text-right"><?=$kat_3->kum_penilai_baru?></td>
                  
                    </tr>
                    <?php
                       $kat_4=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '4' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();

                      //cari nilai kategori 4 (PM)
                      if($kat_4->kum_penilai_baru == 0)
                      {
                        $kum_k4=0;
                      }
                      elseif($kat_4->kum_penilai_baru > $k4)
                      {
                        $kum_k4=number_format($k4,2);
                      }else
                      {
                        $kum_k4=number_format($kat_4->kum_penilai_baru,2);
                      }
                    ?>
                    <tr >
                    <td>D.</td>
                      <td colspan="4">Melaksanakan Pengabdian Pada Masyarakat</td>
                      <td class="text-right"><?=$kum?></td>
                      <td class="text-right"><?=$kum_k4?></td>
                      <td class="text-right"><?=$kum_k4?></td>
                     
                    </tr>
                    <?php
                       $ptotal=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('1','2','3')
                     GROUP BY b.`usulan_no`")->row();
                    
                    ?>
                    <tr>
                      <td></td>
                      <td colspan="5" class="text-center" style="font-weight: bold;">Jumlah Unsur Utama</td>
                      <td class="text-right"><?=$kum_jab?></td>
                      <td class="text-right"><?=number_format($ptotal->kum_penilai_baru+$kum_k4,2)?></td>
                      <td class="text-right"><?=number_format($kum_jab+$ptotal->kum_penilai_baru+$kum_k4,2)?></td>
                    
                    </tr>
                    <?php
                       $kat_5=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '5' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();

                      //cari nilai kategori 5 (penunjang)
                      if($kat_5->kum_penilai_baru == 0)
                      {
                        $kum_k5=0;
                      }
                      elseif($kat_5->kum_penilai_baru > $k5)
                      {
                        $kum_k5=number_format($k5,2);
                      }else
                      {
                        $kum_k5=number_format($kat_5->kum_penilai_baru,2);
                      }

                    ?>
                    <tr >
                      <th class="text-center" style="vertical-align: top;">2.</th>
                      <th colspan="5" ><b>UNSUR PENUNJANG <br>Penunjang Tugas Dosen </b></th>
                      <td class="text-right"><?=$kum?></td>
                      <td class="text-right"><?=$kum_k5?></td>
                      <td class="text-right"><?=$kum_k5?></td>
                     
                    
                    </tr>
                 
                  
                    <?php
                           $ptotal_all=$this->db->query("SELECT
                           a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                        FROM
                          dupaks AS a,
                          `usulan_dupaks` AS b
                        WHERE b.`dupak_no` = a.`no`
                          AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('1','2','3')
                         GROUP BY b.`usulan_no`")->row();

                                      ?>
                    <tr class="text-center">
                      <td colspan="7" class="text-center" style="font-weight: bold; font-family: Cambria;">Jumlah Unsur Utama dan Unsur Penunjang</td>
                      <td class="text-right" style="font-weight: bold;"><?=$kum_jab?></td>
                      <td class="text-right" style="font-weight: bold;"><?=number_format($ptotal_all->kum_penilai_baru+$kum_k4+$kum_k5,2)?></td>
                      <td class="text-right" style="font-weight: bold;"><?=number_format($kum_jab+$ptotal_all->kum_penilai_baru+$kum_k4+$kum_k5,2)?></td>
                   
                    </tr>
                    <?php
                      $resume_jab_usulan=$this->db->query("SELECT
                      a.`no`,
                      c.`nama_jabatans`,
                      c.`kum`,
                      d.`nama_jenjang`,
                      a.`jabatan_tgl`
                      FROM
                      `usulans` AS a,
                      `jabatan_jenjangs` AS b,
                      `jabatans` AS c,
                      `jenjangs` AS d
                      WHERE a.`no` = '$no'
                      AND a.`jabatan_usulan_no` = b.`no`
                      AND b.`jabatan_kode` = c.`kode`
                      AND b.`jenjang_id` = d.`id`")->row();
                              ?>
                    <tr >
                    <?php 

                    
                $persen=$this->db->query("SELECT
                a.`no`,
                a.`jabatan_no`,
                a.`jabatan_usulan_no`,
                b.`jabatan_kode`,
                c.`kum` AS kum_usulan,
                c.`nama_jabatans`,
                c.`pa`,
                c.`pb`,
                c.`pc`,
                c.`pd`
                FROM
                `usulans` AS a,
                `jabatan_jenjangs` AS b,
                `jabatans` AS c
                 WHERE a.`no`='$no'
                 AND a.`jabatan_usulan_no`=b.`no`
                 AND b.`jabatan_kode`=c.`kode`")->row();
              $kum_kebutuhan=$persen->kum_usulan - ($resume_jabatan->kum+$pendidikan);
              $kebutuhan_a=$persen->pa*0.01* $kum_kebutuhan;
              $kebutuhan_b=$persen->pb*0.01* $kum_kebutuhan;
              $kebutuhan_c=$persen->pc*0.01* $kum_kebutuhan;
              $kebutuhan_d=$persen->pd*0.01* $kum_kebutuhan;
              
             /*  $kum_a=69.50;
              $kum_b=56.40;
              $kum_c=5;
              $kum_d=10; */
              if(($kum_k4+$kum_k5) < ($kebutuhan_c+$kebutuhan_d)){
               $lebihan_a=$kat_2->kum_penilai_baru -  $kebutuhan_a;
              $lebihan_b=$kat_3->kum_penilai_baru -  $kebutuhan_b;
              $proposional_a=$lebihan_a /($lebihan_a+$lebihan_b)*(($kebutuhan_c - $kum_k4)
              +($kebutuhan_d - $kum_k5));
             
              $proposional_b=$lebihan_b /($lebihan_a+$lebihan_b)*(($kebutuhan_c - $kum_k4)
              +($kebutuhan_d - $kum_k5));
              $kum_penelitian=number_format($lebihan_b-$proposional_b,2); 
              } else {
                
                $kum_penelitian=number_format($kat_3->kum_penilai_baru -  $kebutuhan_b,2); 
              }
             
            
            /*   echo $kebutuhan_a ."<br>";
              echo $lebihan_a."<br>";
              echo $lebihan_b."<br>";
              echo $proposional_a."<br>";
              echo $proposional_b;  */
             /*  $lebihan_a=$kum_a -  $kebutuhan_a;
              $lebihan_b=$kum_b -  $kebutuhan_b;
              $proposional_a=$lebihan_a/($lebihan_a+$lebihan_b)*(($kum_c-$kebutuhan_c)+($kum_d-$kebutuhan_c));
              $proposional_b=$lebihan_b/($lebihan_a+$lebihan_b)*(($kum_c-$kebutuhan_c)+($kum_d-$kebutuhan_c));
              $kum_penelitian=number_format($lebihan_b-$proposional_b,2); */
           ?>
                    <?php
					$qajar=$this->db->query("SELECT * from usulan_matkuls where usulan_no='$no'");
                      $resume_ajar=$qajar->result();
					  $n=$qajar->num_rows();
                      ?>
                      <th class="text-center" style="vertical-align: top;">III</th>
                      <td colspan="10">
                        <?php if(($resume_jabatan->jabatan_no=='31') || empty($resume_jabatan->jabatan_no)){  ?>
                       Dapat Diangkat Dalam Jabatan Akademik Dosen :  <b style="font-weight: bold;"><?=$resume_jab_usulan->nama_jabatans?> <?=$resume_jab_usulan->kum?> KUM</b>, Terhitung Mulai Tanggal <b style="font-weight: bold;"><?=$tgl_terhitung;?></b>
                       <br>
                        Dalam Mata Kuliah :
                        <?php } else { ?>
                          <p>   Dapat Dinaikan Dalam Jabatan Akademik Dosen :  <b style="font-weight: bold;"><?=$resume_jab_usulan->nama_jabatans?> <?=$resume_jab_usulan->kum?> KUM</b>, Terhitung Mulai Tanggal <b style="font-weight: bold;"><?=$tgl_terhitung;?></b>,
                           dengan lebihan angka kredit bidang Penelitian <?php if($kum_penelitian >=0.00){ ?> <?=$kum_penelitian?> KUM              
                        
                            
                       <?php } ?>
                       <br>
                        Dalam Mata Kuliah :</p>
                        <?php } ?>
                         <ol >
                      <?php     
              $i=1;
           
              foreach($resume_ajar as $ajar) :
							$mtk=strtoupper($ajar->mtk);
                            ?>
                            <?php if ($n>1){ ?>
                            <li class="a" style="line-height: 0.7;">
                        <?=$mtk?>
                            <?php } else {?>
                              <?="- ".$mtk?>
                            <?php }?>
                            <?php if ($i<$n){
							echo",";	
							}else{
							echo".";		
							}$i++;
							endforeach; ?>
                           </li>
                         </ol> 
                  
                            <?php 
                           
                            $next_golongan=$this->db->query("SELECT * FROM `golongans` a WHERE a.`kode`='$gol_next'")->row();

                            
                            if($resume_jabatan->jabatan_no=='31' || empty($resume_jabatan->jabatan_no)){  ?>
                        <?php } else if($resume_jabatan->jabatan_no<>'31' && substr($resume->nidn,0,3)=='000'){ ?>
                          Dapat dinaikan pangkat dan golongan secara bertahap ke  <?=$next_golongan->nama ?> <?=$next_golongan->kode_gol ?>
                          <?php } else { }?>
                       
                       </td>
                      
                    
                      
                      
                        </tr>
                  
                   
                 
                   
                  </tbody>
                </table>
       
            &nbsp;
            <div class="table-responsive">
                <table width="100%">
                    <tr>
                      <td colspan="5" style="vertical-align: top; border-left: none; border-right: none; width:60%; ">
                      <?php if(!empty($resume->gelar_depan)){ ?>
                   <p>Yth. Sdr. <?=$g_depan?>. <?=$resume->nama?>, <?=$resume->gelar_belakang?>
                     <br> <?=$resume->nama_instansi?>
                     <br> <?=$resume->kota?>
                     </p> 
                     <?php } else { ?> 
                      <p> Yth. Sdr. <?=$resume->nama?>, <?=$resume->gelar_belakang?>
                      <br> <?=$resume->nama_instansi?> 
                      <br> <?=$resume->kota?></p> 
                     <?php } ?>
                      </td>
                      <td colspan="4" style="vertical-align: top; border-left: none; border-right: none; ">
                      <p> Ditetapkan di Jakarta<br>
                        Pada Tanggal : <?=$tgl_akhir?></p>
                        <hr class="h"/>
                        <p> Kementerian Pendidikan dan Kebudayaan
                        <?php  if($tgl_p_akhir >= '2020-05-01') {?>  
                        <br>Kepala LLDIKTI Wilayah III,</p>
                        <br>&nbsp;
                        <p>Prof. Dr. Agus Setyo Budi, M.Sc.
                        <br>NIP. 196304261988031002 </p>
                        <?php } else { ?>
                        <br>Sekretaris LLDIKTI Wilayah III,</p>
                        <br>&nbsp;
                        <p>Dr. M. Samsuri, S.Pd., MT.
                        <br>NIP. 197901142003121001</p>
                        <?php } ?>
                        </td>
                      
                    </tr>
                    <?php
                   
             
                      if (substr($resume->instansi_kode,0,3)=='031'||substr($resume->instansi_kode,0,3)=='032'){
                        $japim='Rektor';
                      }
                       if (substr($resume->instansi_kode,0,3)=='033'){
                        $japim='Ketua';
                      }
                      if (substr($resume->instansi_kode,0,3)=='034'||substr($resume->instansi_kode,0,3)=='035'){//034 & 035
                        $japim='Direktur';
                      }
                       
                      ?>
                    <tr>
<?php 
 if($resume->prodi_jen == '22'){ ?>

                     <td colspan="5" style="border-left: none; border-right: none; border-bottom: none;font-weight: bold; ">
                     <br> Tembusan disampaikan kepada :
                  <p><br> 1. Dirjen Dikti Kemdikbud;
                     <br> 2. Dirjen Pendidikan Vokasi Kemdikbud;
                     <br> 3. <?=$japim?> <?=$resume->nama_instansi?>;                    
                     <br> 4. Sekretaris Tim Penilai yang bersangkutan;
                     <br> 5. Arsip. </p>
                       
                      </td>
 <?php } else {?>
                      <td colspan="5" style="border-left: none; border-right: none; border-bottom: none;">
                      <p> <br> Tembusan disampaikan kepada :
                     <br> 1. Dirjen Dikti Kemdikbud; 
                     <br> 2. <?=$japim?> <?=$resume->nama_instansi?>;                     
                     <br> 3. Sekretaris Tim Penilai yang bersangkutan;
                     <br> 4. Arsip. </p>
                       
                      </td>
 <?php } ?>
 <td colspan="4" style="vertical-align: top; border-left: none; border-right: none; ">
                    
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
            </div>
         
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- row -->
                
<form  method="post" action="<?= base_url()?>ketenagaan/ketenagaan/uploadPak" role="form" enctype="multipart/form-data">
  <div class="modal fade" id="uploadPakModal" 
        role="dialog" 
        aria-labelledby="uploadPakModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <input type="hidden" name="nidn" value="<?=$resume->nidn?>">
            <input type="hidden" name="no_usulan" value="<?php echo $no; ?>">
            <input type="hidden" name="usulan_status_id" value="<?php echo $resume->usulan_status_id; ?>">
                <h4>Upload Scan Dokumen PAK</h4>

                <div class="form-group">
                  <label for="berkas">Berkas Upload</label>
                  <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000" required>
                  <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                </div>

            </div>

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;

   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;
   }
</script>