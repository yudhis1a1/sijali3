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
                               // echo"$pak";
                                
                                ?>
                                
                            
                            </div>
                        </div>
                    </div>
               
                </div>

                <div id="content_sk">   
                     <form  method="post" action="<?= base_url()?>kepegawaian/kepegawaian/updatesk_inpassing/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
 <div class="row">
                    <div class="col-lg-12">
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
                 </table >
                </center> 
              </div> 
            </div>  

                <?php           
				date_default_timezone_set('Asia/Jakarta');
				
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
 <input type="hidden" name="tmt_inpassing"  value="<?=$tgltmt?>" style="width: 250px;" minlength="5">         
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
		<?php
		if (isset($data_dasar->nosk_inpassing)){
			$nosk_inp=$data_dasar->nosk_inpassing;}
		else{
			$y=date('Y');
			$nosk_inp='/LL3/KP/'.$y;
		}
		?>
					
					
                   <tr class="text-center btop">
                     <td colspan="9" class="text-center" style="font-family:times new roman;font-size:22px;line-height:1.1;"><h3 style="font-family:times new roman;font-size:22px;line-height:1;">
						
            DENGAN RAHMAT TUHAN YANG MAHA ESA<br/>
            KEPUTUSAN MENTERI PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI<br/><br/>
                        NOMOR : <input type="text" name="ski_no"  value="<?=$nosk_inp?>" style="width: 250px;" minlength="5" required="required"><br/>
                        <input type="hidden" name="no_usulan" value="<?=$no?> " style="width: 250px;"  required="required">
                        <input type="hidden" name="usulan_status_id" value="<?=$data_dasar->usulan_status_id?> " style="width: 250px;"  required="required"> 
                            <input type="hidden" name="dosen_no" value="<?=$dosen_no?> " style="width: 250px;"  required="required"> <br/><br/> 
                         TENTANG<br/>
                        PANGKAT PENYETARAAN<br/>
                       MENTERI PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h3>
                        MENTERI PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h3>
                        
                      </td>
                    </tr>
                    <tr class="bsmall">
                    <th class="text-left" style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.1;">Menimbang</th>
                      <th class="text-right" >:</th>
                      <th colspan="4" class="text-justify" style="font-family:times new roman;font-size:21px;line-height:1.1;padding-left:30px;">            
                     bahwa dosen tetap bukan pegawai negeri sipil yang namanya tersebut pada Diktum Pertama Keputusan ini, memenuhi syarat dan dipandang cakap untuk disetarakan pangkatnya dengan pangkat pegawai negeri sipil sesuai dengan Peraturan Menteri Pendidikan Nasional Nomor 20 Tahun 2008. 
                     
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
                     
                      Surat <?php echo $pimpinan; ?> <?php echo $data_dasar->nama_instansi; ?> Nomor <input type="text" name="no_surat_rektor"  value="<?=$data_dasar->nosurat_rektor?>" style="width: 250px;" minlength="5" required="required"> tanggal <input type="text" name="tgl_surat_rektor"  class="date-picker"  id="datepicker-autoclose10" placeholder="yyyy-mm-dd"  value="<?=$data_dasar->tgl_surat_rektor?>" style="width: 250px;" required="required">
                     
                     
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
                   
                                   
                   $masakerja_tahun='5';
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
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">N  a  m  a</d><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo $gelar_depan.''.ucwords(strtolower($data_dasar->nama)).', '.$data_dasar->gelar_belakang; ?></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">N I D N/ N I D K</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo ' '.$data_dasar->nidn; ?></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;width:225px;">Tempat, tanggal lahir</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo $tmp_lahir;?>,&nbsp;<?php echo $tgl_lahir;?></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">Pendidikan Terakhir</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"> <?php echo $jenjang_baru->nama_jenjang;?>&nbsp;Tahun <?=$pendidikanakhir->thn_lulus;?><br/></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">Jabatan, angka kredit, tmt</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo $data_dasar->nama_jabatans; ?>, <?php echo $data_dasar->kum; ?>, <?php echo $tgl_terhitung; ?><br/></td></tr>
				    <tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">Masa kerja jabatan</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;">0 tahun 0 bulan<br/></td></tr>
				    <tr><td style="font-family:times new roman;font-size:21px;line-height:1.1;">Tempat tugas</td><td>&ensp;&ensp;&ensp;&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.1;"><?php echo ' '.$data_dasar->nama_instansi; ?><br/></td></tr>
            <?php $baru_golongan=$this->db->query("SELECT * from golongans where kode='$data_dasar->gol_inpassing'")->row() ;?>
            <tr><td colspan="3" style="font-family:times new roman;font-size:21px;line-height:1.1;"><br/>Di inpassing pangkatnya dalam pangkat <?php echo $getgolongan->nama_gol; ?>, golongan ruang <?php echo $getgolongan->kode_gol; ?>; </td></tr> 
                     <input type="hidden" name="bulan_kerja"  value="0" style="width: 250px;" minlength="5">    
                      <input type="hidden" name="tahun_kerja"  value="0" style="width: 250px;" minlength="5">    
                       <input type="hidden" name="golongan_kode"  value="<?=$getgolongan->golongan_kode;?>" style="width: 250px;" minlength="5">    
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
		  
		  	   $hariinp=$this->db->query("SELECT WEEKDAY(LAST_DAY(a.`sk_tgl`))  AS hari FROM usulans a WHERE a.`no`='$no' ")->row();

  $tgl_skinp = date('Y-m-d', strtotime('+2 days', strtotime($data_dasar->sk_tgl)));
if ( ($hariinp->hari+2) == 5){
    $tglsk_inp=date('Y-m-d', strtotime('+2 days', strtotime($tgl_skinp)));
} elseif ($hariinp->hari== 6){
  $tglsk_inp=date('Y-m-d', strtotime('+1 days', strtotime($tgl_skinp)));
} else {
  $tglsk_inp= $tgl_skinp;
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
					  <br>Pada tanggal <input type="text" name="tglsk_inpassing"  class="date-picker"  id="datepicker-autoclose13" placeholder="yyyy-mm-dd"  value="<?=$tglsk_inp?>" style="width: 250px;" required="required">
                      <br>Kepala LLDIKTI Wilayah III,<br><br><br>
                        <br>PARISTIYANTI NURWARDANI
                      <br>NIP. 196305071990022001
                     </th>
                    </tr>
               
                     
                   
                 
                </table>
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"> Update SK inpassing</i></button>
                 <a href="<?php echo base_url('kepegawaian/kepegawaian/Show/'.$no); ?>"  class="btn btn-primary pull-right">Batal</a>  
             
             </form>  
            </div>
         
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- row -->
                
                <form  method="post" action="<?= base_url()?>kepegawaian/kepegawaian/uploadSK" role="form" enctype="multipart/form-data">
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
                <h4>Upload Scan Dokumen SK</h4>

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

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?= base_url()?>assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
 <script src="<?= base_url()?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script>

	jQuery('#datepicker-autoclose10').datepicker({
    format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
    	jQuery('#datepicker-autoclose11').datepicker({
    format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

	jQuery('#datepicker-autoclose12').datepicker({
    format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
    
    	jQuery('#datepicker-autoclose13').datepicker({
    format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });



function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;
   }
</script>