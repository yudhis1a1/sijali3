<?php
error_reporting(0);
?>
 
 <!-- row -->

 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                
                                <?php
                              //  echo"$pak";
                                
                                ?>
                                <a href="" data-toggle="modal" class="btn btn-primary" onclick="printDiv('content_sk');">
                               <i class="fa fa-upload"></i>
                                  Print SK Inpassing
                                </a>
                              
                                 <?php
                             //   if (isset($data_dasar->pak))
                             //   {
                                  ?>
                                     <a href="<?= base_url()?>kepegawaian/kepegawaian/editSk_inpassing/<?php echo $no; ?>" class="btn btn-warning">
                               <i class="fa fa-pencil"></i>
                                  Edit SK Inpassing
                                </a>
                                  <?php
                            //    }
                                ?>
                               
                                <?php
                              //  if (isset($data_dasar->sk_no) && isset($data_dasar->sk_tmt) && isset($data_dasar->sk_tgl) && isset($data_dasar->tmt_no))
                              //  {
                                  ?>
                                  
                                <a href="#uploadSKModal" data-toggle="modal" class="btn btn-info">
                               <i class="fa fa-upload"></i>
                                  Upload Inpassing
                                </a>
                                  <?php
                             //   }
                                echo"$sk_inp";
                                ?>
                            
                            </div>
                        </div>
                    </div>
               
                </div>

                <div id="content_sk">   
                
 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                               
                                  
                                <div class="row">
              <div class="col-md-12">
                <center>
                <table  class="cust-print-table2 cust-table2-bordered text-center">
                  <tr><th><img src="<?= base_url()?>assets/images/tutwuri.jpg" height="153px;"><br/><br/></tr></th>
                  <tr><th style="font-family:times new roman;font-size:26px;line-height:1;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</th></tr>
				  <tr><th style="font-family:times new roman;font-size:26px;line-height:1;">REPUBLIK INDONESIA</th></tr>
                 </table 
                </center> 
              </div> 
            </div>  

                <?php           
				date_default_timezone_set('Asia/Jakarta');
				
				 $resume = $this->db->query("SELECT a.*,
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
        b.golongan_kode,
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

				
				$gel_depan=$data_dasar->gelar_depan;
				
				if($gel_depan<>''){
				if (substr($gel_depan,-1,1)=='.'){
				$gelar_depan=$gel_depan.' ';
				}else{
				$gelar_depan=$gel_depan.'. ';
				}	
				}else{
				$gelar_depan='';	
				}


 $hari=$this->db->query("SELECT WEEKDAY(LAST_DAY(a.`user_penilai_tgl`))  AS hari FROM usulans a WHERE a.`no`='$no' ")->row();
$hari2=$this->db->query("SELECT LAST_DAY(a.`user_penilai_tgl`)  AS hari FROM usulans a WHERE a.`no`='$no' ")->row();
  $tgl_terakhir = date('Y-m-d', strtotime($hari2->hari));
if ( $hari->hari == 5){
    $tgl_p_akhir=date('Y-m-d', strtotime('-1 days', strtotime($tgl_terakhir)));
} elseif ($hari->hari== 6){
  $tgl_p_akhir=date('Y-m-d', strtotime('-2 days', strtotime($tgl_terakhir)));
} else {
  $tgl_p_akhir= $tgl_terakhir;
}


$holiday=$this->db->query("SELECT * FROM `holiday` a WHERE a.tgl1='$tgl_p_akhir' ");
$holiday_cek=$holiday->num_rows();
$hari_libur=$holiday->row();
if($holiday_cek >0){
  $tgl_akhir=gfDateStandart($hari_libur->tgl2);
}else{
$tgl_akhir=gfDateStandart($tgl_p_akhir);
}

if (($hari->hari == 5)){
  $tgltmt=date('Y-m-d', strtotime('+2 days', strtotime($hari2->hari)));
} else  {
$tgltmt=date('Y-m-d', strtotime('+1 days', strtotime($hari2->hari)));
}

//$tgltmt=date('Y-m-d', strtotime('+1 days', strtotime($tgl_terakhir)));
$tgltmtdiff=$tgltmt;
$tgl_tmt=gfDateStandart($tgltmt);
$tgl_terhitung= $tgl_tmt;
				?>       
                 <table  class="cust-print-table2 cust-table2-bordered">
                  
                  <col width="30" />
                  <col width="30" />
                  <col width="200" />
                  <col width="120" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />

                  <tbody>
                    <br/>
                   <tr class="text-center btop">
                     <td colspan="9" class="text-center" style="font-family:times new roman;font-size:22px;line-height:1.1;"><h3 style="font-family:times new roman;font-size:22px;line-height:1;">
						
            DENGAN RAHMAT TUHAN YANG MAHA ESA<br/>
             KEPUTUSAN MENTERI PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI<br/><br/>
                        NOMOR : <?php echo $data_dasar->nosk_inpassing; ?> <br/><br/>
                        TENTANG<br/>
                        PANGKAT PENYETARAAN<br/>
                       MENTERI PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h3>
                        
                      </td>
                    </tr>
                    <tr class="bsmall">
                    <th class="text-left" style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.1;">Menimbang</th>
                      <th class="text-right" >:</th>
                      <th colspan="4" class="text-justify" style="font-family:times new roman;font-size:21px;line-height:1.1;padding-left:30px;">            
                      bahwa dosen tetap bukan pegawai negeri sipil yang namanya tersebut pada Diktum Kesatu Keputusan ini, memenuhi syarat dan dipandang cakap untuk disetarakan pangkatnya dengan pangkat pegawai negeri sipil. 
                     
                      </th>
                    </tr>
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.1;">Mengingat</th>
                      <th class="text-right">:</th>
                      <th colspan="4" class="text-justify" style="letter-spacing:normal;"> 
                      <ol type="1">
                      <li style="font-family:times new roman;font-size:21px;line-height:1.1;">
                      Undang-Undang RI Nomor 14 Tahun 2005;    </li>
                           <li style="font-family:times new roman;font-size:21px;line-height:1.1;">
                    	Peraturan Presiden Nomor 62 Tahun 2021;
       </li>
						<li style="font-family:times new roman;font-size:21px;line-height:1.1;">
                      Keputusan Presiden Nomor 72/P Tahun 2021;
					  </li>
                           <li style="font-family:times new roman;font-size:21px;line-height:1.1;">
                     Peraturan Menteri PAN dan RB Nomor 17 Tahun 2013 jo Nomor 46 Tahun 2013;

                      </li>
                            <li style="font-family:times new roman;font-size:21px;line-height:1.1;">
                      Peraturan Menteri Pendidikan Nasional Nomor 20 Tahun 2008;
                      </li>
                           
                           <li style="font-family:times new roman;font-size:21px;line-height:1.1;">
                      Peraturan Menteri Pendidikan, Kebudayaan, Riset dan Teknologi: a. Nomor 28 Tahun 2021; b. Nomor 35 Tahun 2021;</li> 
                      
				
					                         </ol>
                      </th>
                    </tr>
                    <tr class="bsmall">
                    <th class="text-left" style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.1;">Memperhatikan</th>
                      <th class="text-right" >:</th>
                      <th colspan="4" class="text-justify" style="font-family:times new roman;font-size:21px;line-height:1.1;">     
                      
                      Surat <?php echo $pimpinan; ?> <?php echo $data_dasar->nama_instansi; ?> Nomor <?php echo $data_dasar->nosurat_rektor; ?> tanggal <?php echo $data_dasar->tgl_surat_rektor; ?>.
                    
                      </th>
                    </tr>
                    
                     <tr class="text-center btop">
                      <td colspan="4" class="text-center" style="font-weight: bold;font-size:22px;font-family:times new roman;line-height:1.1;">
                       M E M U T U S K A N
                      </td>
                    </tr> 
                    
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.1;">Menetapkan</th>
                      <th class="text-right">:</th>
                    </tr>

                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.1;">Pertama</th>
                      <th class="text-right">:</th>
                      <th colspan="4" class="text-justify">
                   <?php
                   
                                   
                   $masakerja_tahun='0';
                   if ($masakerja_tahun>'32'){
                       $tahun_kerja='>32';
                   }else{
                       $tahun_kerja=$masakerja_tahun;
                   }
                   
                   $jenjang_id=$data_dasar->jenjang_id_baru;
                   $jabatan_kode=$data_dasar->kode_jabatan;
                   
                   $getgolongan=$this->db->query("
                   Select * from ref_inpassing where jabatan_kode='$jabatan_kode' and (jenjang_id_1='$jenjang_id' or jenjang_id_2='$jenjang_id') and tahun_kerja='$tahun_kerja'
                   ")->row();
				  
				   ?>
                     <table border="0">
						<tbody> 
						<tr><td colspan="3" style="font-family:times new roman;font-size:21px;line-height:1.1;">Terhitung mulai tanggal <?php echo $tgl_terhitung; ?> </td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">N  a  m  a</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo $gelar_depan.''.ucwords(strtolower($data_dasar->nama)).', '.$data_dasar->gelar_belakang; ?></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">N I D N/ N I D K</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo ' '.$data_dasar->nidn; ?></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;width:225px;">Tempat, tanggal lahir</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo $tmp_lahir;?>,&nbsp;<?php echo $tgl_lahir;?></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">Pendidikan Terakhir</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"> <?php echo $jenjang_baru->nama_jenjang;?>&nbsp;Tahun <?=$pendidikanakhir->thn_lulus;?><br/></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">Jabatan, angka kredit, tmt</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo $data_dasar->nama_jabatans; ?>, <?php echo $data_dasar->kum; ?>, <?php echo $tgl_terhitung; ?><br/></td></tr>
				    <tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">Masa kerja jabatan</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;">0 tahun 0 bulan<br/></td></tr>
				    <tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">Tempat tugas</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo ' '.$data_dasar->nama_instansi; ?><br/></td></tr>
            <?php $baru_golongan=$this->db->query("SELECT * from golongans where kode='$data_dasar->gol_inpassing'")->row() ;?>
            <tr><td colspan="3" style="font-family:times new roman;font-size:21px;line-height:1.1;"><br/>Di inpassing pangkatnya dalam pangkat <?php echo $getgolongan->nama_gol; ?>, golongan ruang <?php echo $getgolongan->kode_gol; ?>; </td></tr> 
                    
						</tbody></table>
						</br>
                     </th>   
                    </tr>
                   <tr class="bsmall">
                      <th class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.1;">Kedua</th>
                      <th class="text-right">:</th>
                      <th colspan="4" class="text-justify" style="font-family:times new roman;font-size:21px;line-height:1.1;">
                      Apabila terdapat kekeliruan dalam keputusan ini, akan diadakan perbaikan.</th>
                    </tr>
                    <tr class="bsmall">
                      <th colspan="6"  class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.1;">Keputusan ini diberikan kepada yang berkepentingan untuk dipergunakan sebagaimana mestinya.</th>
                      
                    </tr>                 
                </table>
           <?php
           $tgl_tmt=date_create(date());
          $tgl_penatapan= date_format($tgl_tmt, 'd F Y');
		  
		  	  $hari=$this->db->query("SELECT WEEKDAY(LAST_DAY(a.`sk_tgl`))  AS hari FROM usulans a WHERE a.`no`='$no' ")->row();

  $tgl_sk = date('Y-m-t', strtotime('+2 days', strtotime($data_dasar->sk_tgl)));
if ( ($hari->hari+2) == 5){
    $tglsk_inp=date('Y-m-d', strtotime('+2 days', strtotime($tgl_sk)));
} elseif ($$hari->hari== 6){
  $tglsk_inp=date('Y-m-d', strtotime('+1 days', strtotime($tgl_sk)));
} else {
  $tglsk_inp= $tgl_sk;
}
           ?>
          
                <table width="130%">
                    <tr class="bsmall">
                      <th colspan="8" style="vertical-align: top; border-left: none; border-right: none; width: 50%;font-family:times new roman;font-size:21px;line-height:1.1;">
					  <br><br> <br><br><br><br><br>
                      Tembusan :  
					  <br>1.	Sekretaris Jenderal Kemendikbudristek;
                      <br>2.	Direktur Jenderal Pendidikan Tinggi Kemendikbudristek;
                      <br>3.	Kepala Biro Sumber Daya Manusia Kemendikbudristek;
                      <br>4.	<?php echo $pimpinan.' '.$data_dasar->nama_instansi; ?> di Jakarta.
                      </th>
                      <th style="vertical-align: top; border-left: none; border-right: none;font-family:times new roman;font-size:21px;line-height:1.1;">
                       <br><br> <br><br>
                     Ditetapkan di Jakarta  
					  <br>Pada tanggal <?php echo $tglsk_inp; ?>
                      <br>Kepala LLDIKTI Wilayah III,<br><br><br>
                        <br>PARISTIYANTI NURWARDANI
                      <br>NIP. 196305071990022001
                     </th>
                    </tr>
               
                     
                   
                 
                </table>
             
            </div>
         
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- row -->
                
                <form  method="post" action="<?= base_url()?>kepegawaian/kepegawaian/upload_inpassing" role="form" enctype="multipart/form-data">
                <div class="modal fade" id="uploadSKModal" 
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
                <h4>Upload Scan Dokumen SK Inpassing</h4>

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
</form>
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