<?php
error_reporting(0);
?>
<div class="row">    
                    
<table  class="ui celled table">
<tr>
<td>
<center>

<a href="<?= base_url()?>ketenagaan/ketenagaan/print_bidangb/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> BIDANG B</a>
<a href="<?= base_url()?>ketenagaan/ketenagaan/print_dupak/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> PRINT DUPAK</a>
</center>

</td>
</tr>
</table>                                                
                                                       
                               
                            
<table class="cust-table cust-table-bordered">

<col width="30" span="5" />
<col width="309" />
<col width="61" span="2" />
<col width="75" />
<col width="61" span="2" />
<col width="75" />
<col width="88" />

<thead>
  <tr class="text-center">
	<th rowspan="4" class="text-center" style="vertical-align: middle;">NO.</th>
	<th colspan="11" class="text-center">UNSUR YANG DINILAI</th>
	<th rowspan="4" class="text-center" style="vertical-align: middle;">
	AKSI
	</th>
  </tr>
  <tr class="text-center">
	<th colspan="5" rowspan="3" class="text-center" style="vertical-align: middle;">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</th>
	<th colspan="6" class="text-center">ANGKA KREDIT MENURUT</th>
  </tr>
  <tr>
	<th colspan="3" class="text-center">INSTANSI PENGUSUL</th>
	<th colspan="3" class="text-center">TIM PENILAI</th>
  </tr>
  <tr>
	<th class="text-center">LAMA</th>
	<th class="text-center">BARU</th>
	<th class="text-center">JUMLAH</th>
	<th class="text-center">LAMA</th>
	<th class="text-center">BARU</th>
	<th class="text-center">JUMLAH</th>
  </tr>
  <tr>
	<th class="text-center">1</th>
	<th colspan="5" class="text-center">2</th>
	<th class="text-center">3</th>
	<th class="text-center">4</th>
	<th class="text-center">5</th>
	<th class="text-center">6</th>
	<th class="text-center">7</th>
	<th class="text-center">8</th>
	<th class="text-center">9</th>
  </tr>
</thead>
<tbody>
  <tr class="text-center">
	<td rowspan="48">III</td>
	<td colspan="5" class="text-left">PELAKSANAAN PENELITIAN</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
  <tr class="text-center">
	<td rowspan="31">A</td>
	<td colspan="4" class="text-left">Menghasilkan karya ilmiah</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
  <tr class="text-center">
	<td rowspan="28">1</td>
	<td colspan="3" class="text-left">Hasil penelitian atau pemikiran yang dipublikasikan</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
  <tr class="text-center">
	<td rowspan="4">a.</td>
	<td colspan="2" class="text-left">Dalam bentuk:</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
	<?php
 $no;			
 $B0001= $this->db->query("select * from usulan_dupaks where dupak_no='B0001' and usulan_no='$no'")->row();
 $sum_B0001=$B0001->kum_usulan_lama+$B0001->kum_usulan_baru;
 $sum_P0001=$B0001->kum_penilai_lama+$B0001->kum_penilai_baru;
 
 ?>
  <tr class="text-center">
  <td>1)</td>
	<td class="text-left">Monograf</td>
	<td style="vertical-align: middle;"><?=$B0001->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0001->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0001?></td>
	<td style="vertical-align: middle;"><?=$B0001->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0001->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0001?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0002= $this->db->query("select * from usulan_dupaks where dupak_no='B0002' and usulan_no='$no'")->row();
$sum_B0002=$B0002->kum_usulan_lama+$B0002->kum_usulan_baru;
$sum_P0002=$B0002->kum_penilai_lama+$B0002->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Buku referensi</td>
	<td style="vertical-align: middle;"><?=$B0002->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0002->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0002?></td>
	<td style="vertical-align: middle;"><?=$B0002->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0002->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0002?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
	$B0003= $this->db->query("select * from usulan_dupaks where dupak_no='B0003' and usulan_no='$no'")->row();
	$sum_B0003=$B0003->kum_usulan_lama+$B0003->kum_usulan_baru;
	$sum_P0003=$B0003->kum_penilai_lama+$B0003->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>3)</td>
	<td class="text-left">Book Chapter</td>
	<td style="vertical-align: middle;"><?=$B0003->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0003->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0003?></td>
	<td style="vertical-align: middle;"><?=$B0003->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0003->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0003?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
  <tr class="text-center">
	<td rowspan="8">b.</td>
	<td colspan="2" class="text-left">Jurnal ilmiah:</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
	<?php
	$B0004= $this->db->query("select * from usulan_dupaks where dupak_no='B0004' and usulan_no='$no'")->row();
	$sum_B0004=$B0004->kum_usulan_lama+$B0004->kum_usulan_baru;
	$sum_P0004=$B0004->kum_penilai_lama+$B0004->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">Internasional bereputasi (terindeks pada database internasional bereputasi dan berfaktor dampak) </td>
	<td style="vertical-align: middle;"><?=$B0004->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0004->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0004?></td>
	<td style="vertical-align: middle;"><?=$B0004->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0004->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0004?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0025= $this->db->query("select * from usulan_dupaks where dupak_no='B0025' and usulan_no='$no'")->row();
$sum_B0025=$B0025->kum_usulan_lama+$B0025->kum_usulan_baru;
$sum_P0025=$B0025->kum_penilai_lama+$B0025->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Internasional terindeks pada basis data internasional bereputasi</td>
	<td style="vertical-align: middle;"><?=$B0025->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0025->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0025?></td>
	<td style="vertical-align: middle;"><?=$B0025->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0025->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0025?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0025/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0026= $this->db->query("select * from usulan_dupaks where dupak_no='B0026' and usulan_no='$no'")->row();
$sum_B0026=$B0026->kum_usulan_lama+$B0026->kum_usulan_baru;
$sum_P0026=$B0026->kum_penilai_lama+$B0026->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>3)</td>
	<td class="text-left">internasional terindeks pada basis data internasional di luar </td>
	<td style="vertical-align: middle;"><?=$B0026->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0026->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0026?></td>
	<td style="vertical-align: middle;"><?=$B0026->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0026->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0026?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0026/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0005= $this->db->query("select * from usulan_dupaks where dupak_no='B0005' and usulan_no='$no'")->row();
$sum_B0005=$B0005->kum_usulan_lama+$B0005->kum_usulan_baru;
$sum_P0005=$B0005->kum_penilai_lama+$B0005->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>4)</td>
	<td class="text-left">Nasional Terakreditasi Kemenristekdikti peringkat 1 dan 2 </td>
	<td style="vertical-align: middle;"><?=$B0005->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0005->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0005?></td>
	<td style="vertical-align: middle;"><?=$B0005->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0005->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0005?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
		$B0006= $this->db->query("select * from usulan_dupaks where dupak_no='B0006' and usulan_no='$no'")->row();
		$sum_B0006=$B0006->kum_usulan_lama+$B0006->kum_usulan_baru;
		$sum_P0006=$B0006->kum_penilai_lama+$B0006->kum_penilai_baru;
		?>
  <tr class="text-center">
	<td>5)</td>
	<td class="text-left">Nasional berbahasa Inggris atau bahasa resmi (PBB) terindeks pada basis data yang diakui Kemenristekdikti atau Jurnal nasional terakreditasi peringkat 3 dan 4</td>
	<td style="vertical-align: middle;"><?=$B0006->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0006->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0006?></td>
	<td style="vertical-align: middle;"><?=$B0006->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0006->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0006?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
	$B0007= $this->db->query("select * from usulan_dupaks where dupak_no='B0007' and usulan_no='$no'")->row();
	$sum_B0007=$B0007->kum_usulan_lama+$B0007->kum_usulan_baru;
    $sum_P0007=$B0007->kum_penilai_lama+$B0007->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>6)</td>
	<td class="text-left">Nasional berbahasa Indonesia terindeks pada basis data yang diakui Kemenristekdikti terakreditasi peringkat 5 dan 6</td>
	<td style="vertical-align: middle;"><?=$B0007->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0007->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0007?></td>
	<td style="vertical-align: middle;"><?=$B0007->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0007->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0007?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
		$B0024= $this->db->query("select * from usulan_dupaks where dupak_no='B0024' and usulan_no='$no'")->row();
		$sum_B0024=$B0024->kum_usulan_lama+$B0024->kum_usulan_baru;
		$sum_P0024=$B0024->kum_penilai_lama+$B0024->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>7)</td>
	<td class="text-left">Jurnal ilmiah yang ditulis dalam Bahasa Resmi PBB namun tidak memenuhi syarat-syarat sebagai jurnal ilmiah internasional</td>
	<td style="vertical-align: middle;"><?=$B0024->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0024->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0024?></td>
	<td style="vertical-align: middle;"><?=$B0024->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0024->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0024?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0024/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
  
  <tr class="text-center">
	<td rowspan="5">c.</td>
	<td colspan="2" class="text-left">Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN):</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
	<?php
		$B0035= $this->db->query("select * from usulan_dupaks where dupak_no='B0035' and usulan_no='$no'")->row();
		$sum_B0035=$B0035->kum_usulan_lama+$B0035->kum_usulan_baru;
	    $sum_P0035=$B0035->kum_penilai_lama+$B0035->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">Internasional    terindeks    pada Scimagojr dan Scopus </td>
	<td style="vertical-align: middle;"><?=$B0035->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0035->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0035?></td>
	<td style="vertical-align: middle;"><?=$B0035->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0035->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0035?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0035/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
	$B0036= $this->db->query("select * from usulan_dupaks where dupak_no='B0036' and usulan_no='$no'")->row();
	$sum_B0036=$B0036->kum_usulan_lama+$B0036->kum_usulan_baru;
	$sum_P0036=$B0036->kum_penilai_lama+$B0036->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Internasional terindeks pada SCOPUS, IEEE Explore, SPIE</td>
	<td style="vertical-align: middle;"><?=$B0036->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0036->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0036?></td>
	<td style="vertical-align: middle;"><?=$B0036->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0036->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0036?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0036/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
	$B0034= $this->db->query("select * from usulan_dupaks where dupak_no='B0034' and usulan_no='$no'")->row();
	$sum_B0034=$B0034->kum_usulan_lama+$B0034->kum_usulan_baru;
	$sum_P0034=$B0034->kum_penilai_lama+$B0034->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>3)</td>
	<td class="text-left"> Internasional</td>
	<td style="vertical-align: middle;"><?=$B0034->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0034->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0034?></td>
	<td style="vertical-align: middle;"><?=$B0034->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0034->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0034?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0034/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
	$B0033= $this->db->query("select * from usulan_dupaks where dupak_no='B0033' and usulan_no='$no'")->row();
	$sum_B0033=$B0033->kum_usulan_lama+$B0033->kum_usulan_baru;
	$sum_P0033=$B0033->kum_penilai_lama+$B0033->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>4)</td>
	<td class="text-left"> Nasional</td>
	<td style="vertical-align: middle;"><?=$B0033->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0033->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0033?></td>
	<td style="vertical-align: middle;"><?=$B0033->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0033->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0033?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0033/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
  <tr class="text-center">
	<td rowspan="3">d.</td>
	<td colspan="2" class="text-left">Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan :</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
	<?php
$B0031= $this->db->query("select * from usulan_dupaks where dupak_no='B0031' and usulan_no='$no'")->row();
$sum_B0031=$B0031->kum_usulan_lama+$B0031->kum_usulan_baru;
$sum_P0031=$B0031->kum_penilai_lama+$B0031->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">Internasional </td>
	<td style="vertical-align: middle;"><?=$B0031->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0031->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0031?></td>
	<td style="vertical-align: middle;"><?=$B0031->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0031->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0031?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0031/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0032= $this->db->query("select * from usulan_dupaks where dupak_no='B0032' and usulan_no='$no'")->row();
$sum_B0032=$B0032->kum_usulan_lama+$B0032->kum_usulan_baru;
$sum_P0032=$B0032->kum_penilai_lama+$B0032->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Nasional</td>
	<td style="vertical-align: middle;"><?=$B0032->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0032->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0032?></td>
	<td style="vertical-align: middle;"><?=$B0032->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0032->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0032?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0032/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
  
  <tr class="text-center">
	<td rowspan="3">e.</td>
	<td colspan="2" class="text-left">Disajikan dalam seminar/simposium/ lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan:</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
	<?php
$B0029= $this->db->query("select * from usulan_dupaks where dupak_no='B0029' and usulan_no='$no'")->row();
$sum_B0029=$B0029->kum_usulan_lama+$B0029->kum_usulan_baru;
$sum_P0029=$B0029->kum_penilai_lama+$B0029->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">Internasional </td>
	<td style="vertical-align: middle;"><?=$B0029->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0029->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0029?></td>
	<td style="vertical-align: middle;"><?=$B0029->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0029->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0029?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0029/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0030= $this->db->query("select * from usulan_dupaks where dupak_no='B0030' and usulan_no='$no'")->row();
$sum_B0030=$B0030->kum_usulan_lama+$B0030->kum_usulan_baru;
$sum_P0030=$B0030->kum_penilai_lama+$B0030->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Nasional</td>
	<td style="vertical-align: middle;"><?=$B0030->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0030->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0030?></td>
	<td style="vertical-align: middle;"><?=$B0030->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0030->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0030?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0030/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
  
  <tr class="text-center">
	<td rowspan="3">f.</td>
	<td colspan="2" class="text-left">Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/ simposium/ lokakarya, tetapi dimuat dalam prosiding :</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
	<?php
$B0027= $this->db->query("select * from usulan_dupaks where dupak_no='B0027' and usulan_no='$no'")->row();
$sum_B0027=$B0027->kum_usulan_lama+$B0027->kum_usulan_baru;
$sum_P0027=$B0027->kum_penilai_lama+$B0027->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">Internasional </td>
	<td style="vertical-align: middle;"><?=$B0027->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0027->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0027?></td>
	<td style="vertical-align: middle;"><?=$B0027->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0027->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0027?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0027/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0028= $this->db->query("select * from usulan_dupaks where dupak_no='B0028' and usulan_no='$no'")->row();
$sum_B0028=$B0028->kum_usulan_lama+$B0028->kum_usulan_baru;
$sum_P0028=$B0028->kum_penilai_lama+$B0028->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Nasional</td>
	<td style="vertical-align: middle;"><?=$B0028->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0028->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0028?></td>
	<td style="vertical-align: middle;"><?=$B0028->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0028->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0028?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0028/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0011= $this->db->query("select * from usulan_dupaks where dupak_no='B0011' and usulan_no='$no'")->row();
$sum_B0011=$B0011->kum_usulan_lama+$B0011->kum_usulan_baru;
$sum_P0011=$B0011->kum_penilai_lama+$B0011->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>g.</td>
	<td colspan="2" class="text-left">Dalam koran / majalah populer/umum</td>
	<td style="vertical-align: middle;"><?=$B0011->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0011->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0011?></td>
	<td style="vertical-align: middle;"><?=$B0011->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0011->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0011?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0012= $this->db->query("select * from usulan_dupaks where dupak_no='B0012' and usulan_no='$no'")->row();
$sum_B0012=$B0012->kum_usulan_lama+$B0012->kum_usulan_baru;
$sum_P0012=$B0012->kum_penilai_lama+$B0012->kum_penilai_baru;
?>
  <tr class="text-center">
	<td rowspan="2">2</td>
	<td colspan="3" rowspan="2" class="text-left">Hasil penelitian atau hasil pemikiran yang tidak dipublikasikan (tersimpan di perpustakaan perguruan tinggi)</td>
	<td rowspan="2" style="vertical-align: middle;"><?=$B0012->kum_usulan_lama;?></td>
	<td rowspan="2" style="vertical-align: middle;"><?=$B0012->kum_usulan_baru?></td>
	<td rowspan="2" style="vertical-align: middle;"><?=$sum_B0012?></td>
	<td rowspan="2" style="vertical-align: middle;"><?=$B0012->kum_penilai_lama;?></td>
	<td rowspan="2" style="vertical-align: middle;"><?=$B0012->kum_penilai_baru?></td>
	<td rowspan="2" style="vertical-align: middle;"><?=$sum_P0012?></td>
	<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
  <tr height=20 style='height:15.0pt'>
  </tr>
  <tr class="text-center">
	<td rowspan="2">B</td>
	<td colspan="4" class="text-left">Menerjemahkan / menyadur buku ilmiah</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
	<?php
$B0013= $this->db->query("select * from usulan_dupaks where dupak_no='B0013' and usulan_no='$no'")->row();
$sum_B0013=$B0013->kum_usulan_lama+$B0013->kum_usulan_baru;
$sum_P0013=$B0013->kum_penilai_lama+$B0013->kum_penilai_baru;
?>
 <tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Diterbitkan dan diedarkan secara nasional.</td>
	<td style="vertical-align: middle;"><?=$B0013->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0013->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0013?></td>
	<td style="vertical-align: middle;"><?=$B0013->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0013->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0013?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
  <tr class="text-center">
	<td rowspan="2">C</td>
	<td colspan="4" class="text-left">Mengedit / menyunting karya ilmiah</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
	<?php
$B0014= $this->db->query("select * from usulan_dupaks where dupak_no='B0014' and usulan_no='$no'")->row();
$sum_B0014=$B0014->kum_usulan_lama+$B0014->kum_usulan_baru;
$sum_P0014=$B0014->kum_penilai_lama+$B0014->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Diterbitkan dan diedarkan secara nasional.</td>
	<td style="vertical-align: middle;"><?=$B0014->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0014->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0014?></td>
	<td style="vertical-align: middle;"><?=$B0014->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0014->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0014?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
  <tr class="text-center">
	<td rowspan="7">D</td>
	<td colspan="4" class="text-left">Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara nasional atau internasional</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
	<?php
$B0015= $this->db->query("select * from usulan_dupaks where dupak_no='B0015' and usulan_no='$no'")->row();
$sum_B0015=$B0015->kum_usulan_lama+$B0015->kum_usulan_baru;
$sum_P0015=$B0015->kum_penilai_lama+$B0015->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Internasional       yang       sudah diimplementasikan di industri (paling   sedikit   diakui   oleh   4 Negara)
	</td>
	<td style="vertical-align: middle;"><?=$B0015->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0015->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0015?></td>
	<td style="vertical-align: middle;"><?=$B0015->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0015->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0015?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0016= $this->db->query("select * from usulan_dupaks where dupak_no='B0016' and usulan_no='$no'")->row();
$sum_B0016=$B0016->kum_usulan_lama+$B0016->kum_usulan_baru;
$sum_P0016=$B0016->kum_penilai_lama+$B0016->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>2</td>
	<td colspan="3" class="text-left">Internasional(paling   sedikit   diakui   oleh   4 Negara)
	</td>
	<td style="vertical-align: middle;"><?=$B0016->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0016->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0016?></td>
	<td style="vertical-align: middle;"><?=$B0016->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0016->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0016?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0017= $this->db->query("select * from usulan_dupaks where dupak_no='B0017' and usulan_no='$no'")->row();
$sum_B0017=$B0017->kum_usulan_lama+$B0017->kum_usulan_baru;
$sum_P0017=$B0017->kum_penilai_lama+$B0017->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>3</td>
	<td colspan="3" class="text-left">Nasional yang sudah diimplementasikan di industri
	</td>
	<td style="vertical-align: middle;"><?=$B0017->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0017->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0017?></td>
	<td style="vertical-align: middle;"><?=$B0017->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0017->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0017?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0017/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0018= $this->db->query("select * from usulan_dupaks where dupak_no='B0018' and usulan_no='$no'")->row();
$sum_B0018=$B0018->kum_usulan_lama+$B0018->kum_usulan_baru;
$sum_P0018=$B0018->kum_penilai_lama+$B0018->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>4</td>
	<td colspan="3" class="text-left">Nasional
	</td>
	<td style="vertical-align: middle;"><?=$B0018->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0018->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0018?></td>
	<td style="vertical-align: middle;"><?=$B0018->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0018->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0018?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0018/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0019= $this->db->query("select * from usulan_dupaks where dupak_no='B0019' and usulan_no='$no'")->row();
$sum_B0019=$B0019->kum_usulan_lama+$B0019->kum_usulan_baru;
$sum_P0019=$B0019->kum_penilai_lama+$B0019->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>5</td>
	<td colspan="3" class="text-left">Nasional, dalam bentuk paten sederhana yang telah memiliki sertifikat dari Direktorat Jenderal  Kekayaan Intelektual, Kemenkumham
	</td>
	<td style="vertical-align: middle;"><?=$B0019->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0019->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0019?></td>
	<td style="vertical-align: middle;"><?=$B0019->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0019->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0019?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0019/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0020= $this->db->query("select * from usulan_dupaks where dupak_no='B0020' and usulan_no='$no'")->row();
$sum_B0020=$B0020->kum_usulan_lama+$B0020->kum_usulan_baru;
$sum_P0020=$B0020->kum_penilai_lama+$B0020->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>6</td>
	<td colspan="3" class="text-left">Karya  ciptaan, desain industri, indikasi geografis yang telah memiliki sertifikat dari Direktorat Jenderal Kekayaan Intelektual, Kemenkumham
	</td>
	<td style="vertical-align: middle;"><?=$B0020->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0020->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0020?></td>
	<td style="vertical-align: middle;"><?=$B0020->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0020->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0020?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0020/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
 
  <tr class="text-center">
	<td rowspan="4">E</td>
	<td colspan="4" rowspan="2" class="text-left">Membuat rancangan dan karya teknologi yang tidak dipatenkan; rancangan dan karya seni monumental yang tidak terdaftar di HaKI tetapi telah dipresentasikan pada forum yang teragenda</td>
	<td rowspan="2"></td>
	<td rowspan="2"></td>
	<td rowspan="2"></td>
	<td rowspan="2"></td>
	<td rowspan="2"></td>
	<td rowspan="2"></td>
	<td rowspan="2"></td>
  </tr>
  <tr height=20 style='height:15.0pt'>
  </tr>
	<?php
$B0021= $this->db->query("select * from usulan_dupaks where dupak_no='B0021' and usulan_no='$no'")->row();
$sum_B0021=$B0021->kum_usulan_lama+$B0021->kum_usulan_baru;
$sum_P0021=$B0021->kum_penilai_lama+$B0021->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Tingkat internasional</td>
	<td style="vertical-align: middle;"><?=$B0021->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0021->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0021?></td>
	<td style="vertical-align: middle;"><?=$B0021->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0021->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0021?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0021/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0022= $this->db->query("select * from usulan_dupaks where dupak_no='B0022' and usulan_no='$no'")->row();
$sum_B0022=$B0022->kum_usulan_lama+$B0022->kum_usulan_baru;
$sum_P0022=$B0022->kum_penilai_lama+$B0022->kum_penilai_baru;
?>
  <tr class="text-center">
	<td>2</td>
	<td colspan="3" class="text-left">Tingkat nasional</td>
	<td style="vertical-align: middle;"><?=$B0022->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0022->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0022?></td>
	<td style="vertical-align: middle;"><?=$B0022->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0022->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0022?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0022/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
	<?php
$B0023= $this->db->query("select * from usulan_dupaks where dupak_no='B0023' and usulan_no='$no'")->row();
$sum_B0023=$B0023->kum_usulan_lama+$B0023->kum_usulan_baru;
$sum_P0023=$B0023->kum_penilai_lama+$B0023->kum_penilai_baru;
?>
  <tr class="text-center">
	<td></td>
	<td>3</td>
	<td colspan="3" class="text-left">Tingkat lokal</td>
	<td style="vertical-align: middle;"><?=$B0023->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0023->kum_usulan_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_B0023?></td>
	<td style="vertical-align: middle;"><?=$B0023->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$B0023->kum_penilai_baru?></td>
	<td style="vertical-align: middle;"><?=$sum_P0023?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>ketenagaan/usulan_dupak_b/dupak/B0023/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
  </tr>
  <?php	    			
	    $B_total= $this->db->query("SELECT a.`usulan_no`,a.`dupak_no`,SUM(a.`kum_usulan_lama`) AS jum_kum_lama,SUM(a.`kum_usulan_baru`) AS jum_kum_baru,
		SUM(a.`kum_penilai_lama`) AS jum_nil_lama,SUM(a.`kum_penilai_baru`) AS jum_nil_baru FROM `usulan_dupaks` a
		 WHERE a.`usulan_no`='$no' AND LEFT(a.`dupak_no`,1)='B'")->row();
		$total_bid_b=$B_total->jum_kum_lama+$B_total->jum_kum_baru;
		$total_penilaian_b=$B_total->jum_nil_lama+$B_total->jum_nil_baru;
	 ?>
	  <tr style="background-color: #e4e4e4; font-weight: bold;">

		<td></td>
		<td colspan="5" class="text-right"><b>JUMLAH BIDANG B</b></td>
		<td style="vertical-align: middle;" class="text-center"><?=$B_total->jum_kum_lama?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$B_total->jum_kum_baru?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$total_bid_b?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$B_total->jum_nil_lama?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$B_total->jum_nil_baru?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$total_penilaian_b?></td>
		<td></td>
	  </tr>
</tbody>
</table>
        </div>
     

