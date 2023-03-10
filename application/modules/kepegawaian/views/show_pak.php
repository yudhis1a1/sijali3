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
                                echo"$pak";
                                
                                ?>
                               
                               
                                 <?php
                              //  if (isset($data_dasar->pak))
                              //  {
                                  ?>
                                     <a href="<?= base_url()?>kepegawaian/kepegawaian/editPak/<?php echo $no; ?>" class="btn btn-warning">
                               <i class="fa fa-pencil"></i>
                                  Edit SK
                                </a>
                                  <?php
                               // }
                                ?>
                               
                                <?php
                               // if (isset($data_dasar->sk_no) && isset($data_dasar->sk_tmt) && isset($data_dasar->sk_tgl) && isset($data_dasar->tmt_no))
                               // {
                                  ?>
                                   <a href="" data-toggle="modal" class="btn btn-primary" onclick="printDiv('content_surat');">
                               <i class="fa fa-upload"></i>
                                  Print SK
                                </a>
                                <a href="#uploadSKModal" data-toggle="modal" class="btn btn-info">
                               <i class="fa fa-upload"></i>
                                  Upload SK
                                </a>
                                  <?php
                             //   }
                                ?>
                                    <?php
                                echo"$sk_jafung";
                                
                                ?>
                            
                            </div>
                        </div>
                    </div>
               
                </div> 

                <div id="content_surat">   
                <style>

@media print and (width: 5.83in) and (height: 8.27in) {
  
  
li.a {
 
 margin: 0px;
}


}

 
</style>  
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body"> 
                                <h4 class="card-title"></h4>
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
        c.jenjang_id as prodi_jen,
        a.tgl_revisi_pak
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
	if ((date("m", strtotime($tgltmt))==1)  && (date("d", strtotime($tgltmt))==2)){
  $tgltmt=date('Y-m-d', strtotime('-1 days', strtotime($tgltmt)));
} 
	
  $yx=date("Y",strtotime($tgltmt));
	
$tgltmtdiff=$tgltmt;



$tgl_tmt=gfDateStandart($tgltmt);
$tgl_terhitung= $tgl_tmt;
				?>  
                               
                                  
                                <div class="row">
              <div class="col-md-12">
                <center>
                <table  class="cust-print-table2 cust-table2-bordered text-center">
                  <?php
					  if ((date("m", strtotime($tgltmtdiff))>=1)  && (date("Y", strtotime($tgltmtdiff))>=2021)){
					 ?>
					   <tr><th><img src="<?= base_url()?>assets/images/tutwuri.jpg" height="153px;"><br/><br/></tr></th>
                  <tr><th style="font-family:times new roman;font-size:26px;line-height:1;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</th></tr>
				  <tr><th style="font-family:times new roman;font-size:26px;line-height:1;">REPUBLIK INDONESIA</th></tr>
					 
					  <?php }else{
					?>	 
						  <tr><th><img src="<?= base_url()?>assets/images/tutwuri.jpg" height="153px;"><br/><br/></tr></th>
                  <tr><th style="font-family:times new roman;font-size:26px;line-height:1;">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</th></tr>
				  <tr><th style="font-family:times new roman;font-size:26px;line-height:1;">REPUBLIK INDONESIA</th></tr> 
				<?php	 }
					  ?>
                  
                 </table> 
                </center> 
              </div> 
            </div>  
 
               
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
			
                   <tr class="text-center btop">
                      <td colspan="9" class="text-center" style="font-family:times new roman;font-size:22px;line-height:1.2;"><h3 style="font-family:times new roman;font-size:22px;line-height:1;">
						<?php
					  if ((date("m", strtotime($tgltmtdiff))>=1)  && (date("Y", strtotime($tgltmtdiff))>=2021)){
					 ?>
					   KEPUTUSAN MENTERI PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI<br/>

                        NOMOR : <?php echo $data_dasar->sk_no; ?><br/></h3>
                       TENTANG<br/>
                        PENGANGKATAN PERTAMA KALI DALAM JABATAN AKADEMIK DOSEN<br/>
						DENGAN RAHMAT TUHAN YANG MAHA ESA<br/>
                        MENTERI PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI<br/><br/>
					 
					  <?php }else{
					?>	 
						 KEPUTUSAN MENTERI PENDIDIKAN DAN KEBUDAYAAN<br/>

                        NOMOR : <?php echo $data_dasar->sk_no; ?><br/></h3>
                       TENTANG<br/>
                        PENGANGKATAN PERTAMA KALI DALAM JABATAN AKADEMIK DOSEN<br/>
						DENGAN RAHMAT TUHAN YANG MAHA ESA<br/>
                        MENTERI PENDIDIKAN DAN KEBUDAYAAN<br/><br/>
				<?php	 }
					  ?>

						
                        </td> 
                    </tr> 
					<br/>
                    <tr class="bsmall">
                      <th class="text-left" style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.2;">Menimbang</th>
                      <th class="text-right" >:</th>
                      <th colspan="7" class="text-justify"> 
                      <ol type="a">
                      <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      bahwa sebagai pelaksanaan dari Pasal 24 Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 17 Tahun 2013, sebagaimana telah diubah dengan Keputusan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 46 Tahun 2013, perlu untuk mengangkat Saudara <?php echo $gelar_depan.''.ucwords(strtolower($data_dasar->nama)).', '.$data_dasar->gelar_belakang; ?> dalam jabatan Akademik Dosen;</li>
                     <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      bahwa pengangkatan tersebut berdasarkan persetujuan dari Kepala LLDIKTI Wilayah III Nomor <?php echo $data_dasar->tmt_no; ?> tanggal <?php echo $tmt_akhir; ?>;
                      </li>
					   <?php
					  if ($resume->tgl_revisi_pak=='0000-00-00'){
					  if ((date("m", strtotime($tgltmtdiff))<=12)  && (date("Y", strtotime($tgltmtdiff))<=2021)){
					 ?>
                      <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					 
					  <?php
					  if (date("Y", strtotime($data_dasar->sk_tgl))<2021){  
					 ?>
					  surat pengantar Kepala Bagian Sumber Daya Perguruan Tinggi LLDIKTI Wilayah III Nomor <?php echo $data_dasar->no_srt_pengantar; ?> tanggal <?php echo $sk_tmt; ?>.
                      <?php }else{
					?>	 
						 surat pengantar Koordinator Kelompok Substansi Sumber Daya Perguruan Tinggi LLDIKTI Wilayah III Nomor <?php echo $data_dasar->no_srt_pengantar; ?> tanggal <?php echo $sk_tmt; ?>.
                   <?php	 }
				   
					  ?>
                       </li> 
					<?php
					}
					}
					?>
                      </ol>
                      </th>
                    </tr>
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.2;">Mengingat</th>
                      <th class="text-right">:</th>
                      <th colspan="7" class="text-justify" style="letter-spacing:normal;"> 
                      <ol type="1">
					  <?php
					  if ((date("m", strtotime($tgltmt))<2)  && (date("Y", strtotime($tgltmt))<=2022)){
					 ?>
                      <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					  Undang-Undang a. Nomor 14 Tahun 2005; b. Nomor 12 Tahun 2012; </li>
                      <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      Peraturan Pemerintah : a. Nomor 37 Tahun 2009; b. Nomor 16 Tahun 1994 jo. Nomor 40 Tahun 2010; c. Nomor 9 Tahun 2003 jo. Nomor 63 Tahun 2009; </li>
                      <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      	<?php
					  if ((date("m", strtotime($sk_tgl))>5)  && (date("Y", strtotime($sk_tgl))>=2021)){
					 ?>
					  Peraturan Presiden Nomor 62 Tahun 2021;
					  
					  <?php }else{ 
					?>	 
						 Peraturan Presiden Nomor 62 Tahun 2021;
						<?php	 }
					  ?>


                      
                      </li>
                      <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      Keputusan Presiden Nomor 113/P Tahun 2019;  
                      </li>
                      <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      Peraturan Menteri PAN dan RB Nomor 17 Tahun 2013 jo. Nomor 46 Tahun 2013;
                      </li>
                      <li style="font-family:times new romanfont-size:21px;line-height:1.2;">
                      Peraturan Bersama Menteri Pendidikan dan Kebudayaan dan Kepala Badan Kepegawaian Negara Nomor 4/VIII/PB/2014 dan Nomor 24 Tahun 2014;
                      </li>
                      <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                        	<?php
					  if ((date("m", strtotime($sk_tgl))<=12)  && (date("Y", strtotime($sk_tgl))<=2022)){
					 ?>
					   Peraturan Menteri Pendidikan dan Kebudayaan : a. Nomor 92 Tahun 2014;b. Nomor 3 Tahun 2021;

					  <?php }else{ 
					?>	 
						 Peraturan Menteri Pendidikan dan Kebudayaan : a. Nomor 92 Tahun 2014; b. Nomor 34 Tahun 2020; c. Nomor 3 Tahun 2021;
					<?php	 }
					  ?>

                     </li> 
                      <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					  <?php
					  if ((date("m", strtotime($tgltmt))<10)  && (date("Y", strtotime($tgltmt))<=2020)){
					 ?>
					  Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 26 Tahun 2015 jo. Nomor 2 Tahun 2016;<?php }else{
					?>	 
						  Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 26 Tahun 2015 jo. Nomor 2 Tahun 2016;<?php	 }
					  ?>
                      </li>
					  
					  <?php
					  if ((date("m", strtotime($tgltmt))>=1)  && (date("Y", strtotime($tgltmt))>=2022)){
					 ?>
					  <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      Peraturan Menteri Pendidikan, Kebudayaan, Riset dan Teknologi Nomor 35 Tahun 2021. </li>
					   <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      Keputusan Menteri Pendidikan, Kebudayaan, Riset dan Teknologi Nomor 1704/MPK.A/RHS/KP.07.00/2022 Tahun 2022. </li><?php }else{
					?>	 
						  <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      Keputusan Menteri Pendidikan dan Kebudayaan Nomor 40088/MPK/RHS/KP/2020. </li>
					  
					  <?php	 }
					  
					  
					  ?>
					 <?php }else{ 
					?>	
                     
					 <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					  Undang-Undang Nomor 14 Tahun 2005; </li>
					   <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					  Peraturan Pemerintah Nomor 37 Tahun 2009; </li>
					   <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					  Peraturan Presiden Nomor 62 Tahun 2021; </li>
					   <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					  Keputusan Presiden Nomor 72/P Tahun 2021; </li>
					   <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					  Peraturan Menteri PAN dan RB Nomor 17 Tahun 2013 jo. Nomor 46 Tahun 2013; </li>
					   <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					  Peraturan Menteri Pendidikan, Kebudayaan, Riset dan Teknologi Nomor : a. 28 Tahun 2021;
						b. 35 Tahun 2021; </li>
					   <li style="font-family:times new roman;font-size:21px;line-height:1.2;">
					  Keputusan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor
						1704/MPK.A/RHS/KP.07.00/2022  Tahun 2022. </li>
					   <?php	 }
					  
					  
					  ?>
                    
                     </ol>
                      </th>
                    </tr> 
                    
                    <tr class="text-center btop">
                      <td colspan="7" class="text-center" style="font-weight: bold;font-size:22px;font-family:times new roman;line-height:1.2;">
                       M E M U T U S K A N
                      </td>
                    </tr>
                    
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.2;">Menetapkan</th>
                      <th class="text-right">:</th>
                    </tr>

                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.2;">Pertama</th>
                      <th class="text-right">:</th>
                      <th colspan="7" class="text-justify">
                        <?php
						$nama=ucwords(strtolower($data_dasar->nama));
						$a=substr($nama,0,3);
					    
						if ($a=='G.a'){
							$nama=str_replace('G.a','G.A',$nama);
						}else{
							$nama;
						}
				  
				   ?>
					   <table border="0">
						<tbody>
						<tr><td colspan="3" style="font-family:times new roman;font-size:21px;line-height:1.2;">Terhitung mulai tanggal <?php echo $tgl_terhitung; ?> mengangkat:</td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.2;">N  a  m  a</td><td>&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.2;"><?php echo $gelar_depan.''.$nama.', '.$data_dasar->gelar_belakang; ?></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.2;">N I D N/ N I D K</td><td>&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.2;"><?php echo $data_dasar->nidn; ?></td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.2;width:225px;">Pangkat/gol. Ruang/TMT</td><td>&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.2;">--</td></tr>
						<tr><td style="font-family:times new roman;font-size:21px;line-height:1.2;">Unit Kerja</td><td>&ensp;:&ensp;</td><td style="font-family:times new roman;font-size:21px;line-height:1.2;">LLDIKTI Wilayah III pada <?php echo ' '.$data_dasar->nama_instansi; ?><br/></td></tr>
						<tr><td colspan="3" style="font-family:times new roman;font-size:21px;line-height:1.2;"><br/>dalam jabatan <?php echo $data_dasar->nama_jabatans; ?> dengan angka kredit sebesar <?php echo $data_dasar->kum; ?> (<?php echo $terbilang; ?>);<br/></td></tr>
						</tbody></table>			
                      
                      <br/>
                    </th>
                    </tr>
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.2;">Kedua</th>
                      <th class="text-right">:</th>
                      <th colspan="7" class="text-justify" style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      apabila kemudian hari ternyata terdapat kekeliruan dalam keputusan ini, akan diadakan perbaikan dan perhitungan kembali sebagaimana mestinya;</th>
                    </tr>
                    <tr class="bsmall">
                      <th class="text-left"style="width: 100px;font-family:times new roman;font-size:22px;line-height:1.2;">Ketiga</th>
                      <th class="text-right">:</th>
                      <th colspan="7" class="text-justify" style="font-family:times new roman;font-size:21px;line-height:1.2;">
                      ASLI Keputusan ini disampaikan kepada Dosen Tetap yang bersangkutan untuk diketahui dan diindahkan sebagaimana mestinya.
                     
                       </th>
                    </tr>

                 
                </table>
           <?php
           $tgl_tmt=date_create(date());
          $tgl_penatapan= date_format($tgl_tmt, 'd F Y');
		  
		  $hari=$this->db->query("SELECT WEEKDAY(LAST_DAY(a.`user_penilai_tgl`))  AS hari FROM usulans a WHERE a.`no`='$no' ")->row();

  $tgl_terakhir = date('Y-m-t', strtotime($resume->user_penilai_tgl));
if ( $hari->hari == 5){
    $tgl_p_akhir=date('Y-m-d', strtotime('-1 days', strtotime($tgl_terakhir)));
} elseif ($$hari->hari== 6){
  $tgl_p_akhir=date('Y-m-d', strtotime('-2 days', strtotime($tgl_terakhir)));
} else {
  $tgl_p_akhir= $tgl_terakhir;
}
           ?>

          
            <div class="cust-print-table2 cust-table2-bordered">
                <table width="130%">
                    <tr class="bsmall">
                      <th colspan="8" style="vertical-align: top; border-left: none; border-right: none; width: 50%;font-family:times new roman;font-size:21px;line-height:1.2;">
					    <br><br> <br><br><br><br><br><br><br><br><br><br><br>
                      Tembusan :   
                        <?php
					 // if ((date("m", strtotime($sk_tgl))>5)  && (date("Y", strtotime($sk_tgl))>=2021)){
					 ?>
					   <br>1.	Sekretaris Jenderal Kemendikbudristek;
                      <br>2.	Plt. Direktur Jenderal Pendidikan Tinggi Riset, dan Teknologi Kemendikbudristek; 
                      <br>3.	Kepala Biro Sumber Daya Manusia Kemendikbudristek;
                      <br>4.	<?php echo $pimpinan.' '.$data_dasar->nama_instansi; ?>.
					  <?php //}else{
					?>	  
						<!-- <br>1.	Sekretaris Jenderal Kemdikbud;
                      <br>2.	Direktur Jenderal Pendidikan Tinggi Kemdikbud;
                      <br>3.	Kepala Biro Sumber Daya Manusia Kemdikbud;
                      <br>4.	<?php// echo $pimpinan.' '.$data_dasar->nama_instansi; ?>.-->
				<?php//}
					  ?> 
					 
                      </th>
                      <th style="vertical-align: top; border-left: none; border-right: none;font-family:times new roman;font-size:21px;line-height:1.2;">
                       <br><br> <br><br>
                     Ditetapkan di Jakarta  
					  <br>Pada tanggal <?php echo $sk_tgl1; ?>
					 <br>a.n. MENTERI PENDIDIKAN, KEBUDAYAAN, 
					  <br>RISET, DAN TEKNOLOGI					  
                      <br>KEPALA LLDIKTI WILAYAH III,<br><br><br>
					    <?php
					    if ($tgltmtdiff >= '2022-01-31'){
					  ?>
					  <br>PARISTIYANTI NURWARDANI
                      <br>NIP. 196305071990022001
                     
						<?php }else{?>
						 <br>AGUS SETYO BUDI
                      <br>NIP. 196304261988031002
						<?php }?>
                     </th>
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

<script>
function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;
   }
</script>