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
$sql_b0001="select *from usulan_dupaks where dupak_no='B0001' and usulan_no='$no_usulan'";
$data_b0001=mysqli_query($koneksi,$sql_b0001);
$data_bid_b_b0001=mysqli_fetch_array($data_b0001);
$jumlah_b0001=$data_bid_b_b0001['kum_usulan_lama']+$data_bid_b_b0001['kum_usulan_baru'];
$kum_nilai_b0001=$data_bid_b_b0001['kum_penilai_lama']+$data_bid_b_b0001['kum_penilai_baru'];
?>
  <tr class="text-center">
  <td>1)</td>
	<td class="text-left">Monograf</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0001['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0001['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0001 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0001['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0001['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0001?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0001/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
<?php
$sql_b0002="select *from usulan_dupaks where dupak_no='b0002' and usulan_no='$no_usulan'";
$data_b0002=mysqli_query($koneksi,$sql_b0002);
$data_bid_b_b0002=mysqli_fetch_array($data_b0002);
$jumlah_b0002=$data_bid_b_b0002['kum_usulan_lama']+$data_bid_b_b0002['kum_usulan_baru'];
$kum_nilai_b0002=$data_bid_b_b0002['kum_penilai_lama']+$data_bid_b_b0002['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Buku referensi</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0002['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0002['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0002 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0002['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0002['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0002?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0002/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0003="select *from usulan_dupaks where dupak_no='b0003' and usulan_no='$no_usulan'";
$data_b0003=mysqli_query($koneksi,$sql_b0003);
$data_bid_b_b0003=mysqli_fetch_array($data_b0003);
$jumlah_b0003=$data_bid_b_b0003['kum_usulan_lama']+$data_bid_b_b0003['kum_usulan_baru'];
$kum_nilai_b0003=$data_bid_b_b0003['kum_penilai_lama']+$data_bid_b_b0003['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>3)</td>
	<td class="text-left">Book Chapter</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0003['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0003['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0003 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0003['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0003['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0003?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0003/<?php echo $no_usulan; ?>" ></a>
		
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
$sql_b0004="select *from usulan_dupaks where dupak_no='b0004' and usulan_no='$no_usulan'";
$data_b0004=mysqli_query($koneksi,$sql_b0004);
$data_bid_b_b0004=mysqli_fetch_array($data_b0004);
$jumlah_b0004=$data_bid_b_b0004['kum_usulan_lama']+$data_bid_b_b0004['kum_usulan_baru'];
$kum_nilai_b0004=$data_bid_b_b0004['kum_penilai_lama']+$data_bid_b_b0004['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">internasional bereputasi (terindeks pada database internasional bereputasi dan berfaktor dampak) </td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0004['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0004['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0004 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0004['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0004['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0004?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0004/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0025="select *from usulan_dupaks where dupak_no='b0025' and usulan_no='$no_usulan'";
$data_b0025=mysqli_query($koneksi,$sql_b0025);
$data_bid_b_b0025=mysqli_fetch_array($data_b0025);
$jumlah_b0025=$data_bid_b_b0025['kum_usulan_lama']+$data_bid_b_b0025['kum_usulan_baru'];
$kum_nilai_b0025=$data_bid_b_b0025['kum_penilai_lama']+$data_bid_b_b0025['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">internasional terindeks pada basis data internasional bereputasi</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0025['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0025['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0025 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0025['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0025['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0025?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0025/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0026="select *from usulan_dupaks where dupak_no='b0026' and usulan_no='$no_usulan'";
$data_b0026=mysqli_query($koneksi,$sql_b0026);
$data_bid_b_b0026=mysqli_fetch_array($data_b0026);
$jumlah_b0026=$data_bid_b_b0026['kum_usulan_lama']+$data_bid_b_b0026['kum_usulan_baru'];
$kum_nilai_b0026=$data_bid_b_b0026['kum_penilai_lama']+$data_bid_b_b0026['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>3)</td>
	<td class="text-left">internasional terindeks pada basis data internasional di luar </td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0026['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0026['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0026 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0026['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0026['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0026?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0026/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0005="select *from usulan_dupaks where dupak_no='b0005' and usulan_no='$no_usulan'";
$data_b0005=mysqli_query($koneksi,$sql_b0005);
$data_bid_b_b0005=mysqli_fetch_array($data_b0005);
$jumlah_b0005=$data_bid_b_b0005['kum_usulan_lama']+$data_bid_b_b0005['kum_usulan_baru'];
$kum_nilai_b0005=$data_bid_b_b0005['kum_penilai_lama']+$data_bid_b_b0005['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>4)</td>
	<td class="text-left">Nasional Terakreditasi Kemenristekdikti peringkat 1 dan 2 </td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0005['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0005['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0005 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0005['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0005['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0005?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0005/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0006="select *from usulan_dupaks where dupak_no='b0006' and usulan_no='$no_usulan'";
$data_b0006=mysqli_query($koneksi,$sql_b0006);
$data_bid_b_b0006=mysqli_fetch_array($data_b0006);
$jumlah_b0006=$data_bid_b_b0006['kum_usulan_lama']+$data_bid_b_b0006['kum_usulan_baru'];
$kum_nilai_b0006=$data_bid_b_b0006['kum_penilai_lama']+$data_bid_b_b0006['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>5)</td>
	<td class="text-left">Nasional berbahasa Inggris atau bahasa resmi (PBB) terindeks pada basis data yang diakui Kemenristekdikti atau Jurnal nasional terakreditasi peringkat 3 dan 4</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0006['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0006['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0006 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0006['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0006['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0006?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0006/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0007="select *from usulan_dupaks where dupak_no='b0007' and usulan_no='$no_usulan'";
$data_b0007=mysqli_query($koneksi,$sql_b0007);
$data_bid_b_b0007=mysqli_fetch_array($data_b0007);
$jumlah_b0007=$data_bid_b_b0007['kum_usulan_lama']+$data_bid_b_b0007['kum_usulan_baru'];
$kum_nilai_b0007=$data_bid_b_b0007['kum_penilai_lama']+$data_bid_b_b0007['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>6)</td>
	<td class="text-left">Nasional berbahasa Indonesia terindeks pada basis data yang diakui Kemenristekdikti terakreditasi peringkat 5 dan 6</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0007['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0007['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0007 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0007['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0007['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0007?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0007/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0024="select *from usulan_dupaks where dupak_no='b0024' and usulan_no='$no_usulan'";
$data_b0024=mysqli_query($koneksi,$sql_b0024);
$data_bid_b_b0024=mysqli_fetch_array($data_b0024);
$jumlah_b0024=$data_bid_b_b0024['kum_usulan_lama']+$data_bid_b_b0024['kum_usulan_baru'];
$kum_nilai_b0024=$data_bid_b_b0024['kum_penilai_lama']+$data_bid_b_b0024['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>7)</td>
	<td class="text-left">Jurnal ilmiah yang ditulis dalam Bahasa Resmi PBB namun tidak memenuhi syarat-syarat sebagai jurnal ilmiah internasional</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0024['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0024['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0024 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0024['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0024['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0024?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0024/<?php echo $no_usulan; ?>" ></a>
		
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
$sql_b0035="select *from usulan_dupaks where dupak_no='b0035' and usulan_no='$no_usulan'";
$data_b0035=mysqli_query($koneksi,$sql_b0035);
$data_bid_b_b0035=mysqli_fetch_array($data_b0035);
$jumlah_b0035=$data_bid_b_b0035['kum_usulan_lama']+$data_bid_b_b0035['kum_usulan_baru'];
$kum_nilai_b0035=$data_bid_b_b0035['kum_penilai_lama']+$data_bid_b_b0035['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">Internasional    terindeks    pada Scimagojr dan Scopus </td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0035['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0035['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0035 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0035['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0035['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0035?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0035/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0036="select *from usulan_dupaks where dupak_no='b0036' and usulan_no='$no_usulan'";
$data_b0036=mysqli_query($koneksi,$sql_b0036);
$data_bid_b_b0036=mysqli_fetch_array($data_b0036);
$jumlah_b0036=$data_bid_b_b0036['kum_usulan_lama']+$data_bid_b_b0036['kum_usulan_baru'];
$kum_nilai_b0036=$data_bid_b_b0036['kum_penilai_lama']+$data_bid_b_b0036['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Internasional terindeks pada SCOPUS, IEEE Explore, SPIE</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0036['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0036['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0036 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0036['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0036['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0036?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0036/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0034="select *from usulan_dupaks where dupak_no='b0034' and usulan_no='$no_usulan'";
$data_b0034=mysqli_query($koneksi,$sql_b0034);
$data_bid_b_b0034=mysqli_fetch_array($data_b0034);
$jumlah_b0034=$data_bid_b_b0034['kum_usulan_lama']+$data_bid_b_b0034['kum_usulan_baru'];
$kum_nilai_b0034=$data_bid_b_b0034['kum_penilai_lama']+$data_bid_b_b0034['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>3)</td>
	<td class="text-left"> Internasional</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0034['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0034['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0034 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0034['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0034['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0034?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0034/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0033="select *from usulan_dupaks where dupak_no='b0033' and usulan_no='$no_usulan'";
$data_b0033=mysqli_query($koneksi,$sql_b0033);
$data_bid_b_b0033=mysqli_fetch_array($data_b0033);
$jumlah_b0033=$data_bid_b_b0033['kum_usulan_lama']+$data_bid_b_b0033['kum_usulan_baru'];
$kum_nilai_b0033=$data_bid_b_b0033['kum_penilai_lama']+$data_bid_b_b0033['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>4)</td>
	<td class="text-left"> Nasional</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0033['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0033['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0033 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0033['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0033['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0033?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0033/<?php echo $no_usulan; ?>" ></a>
		
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
$sql_b0031="select *from usulan_dupaks where dupak_no='b0031' and usulan_no='$no_usulan'";
$data_b0031=mysqli_query($koneksi,$sql_b0031);
$data_bid_b_b0031=mysqli_fetch_array($data_b0031);
$jumlah_b0031=$data_bid_b_b0031['kum_usulan_lama']+$data_bid_b_b0031['kum_usulan_baru'];
$kum_nilai_b0031=$data_bid_b_b0031['kum_penilai_lama']+$data_bid_b_b0031['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">Internasional </td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0031['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0031['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0031 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0031['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0031['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0031?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0031/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0032="select *from usulan_dupaks where dupak_no='b0032' and usulan_no='$no_usulan'";
$data_b0032=mysqli_query($koneksi,$sql_b0032);
$data_bid_b_b0032=mysqli_fetch_array($data_b0032);
$jumlah_b0032=$data_bid_b_b0032['kum_usulan_lama']+$data_bid_b_b0032['kum_usulan_baru'];
$kum_nilai_b0032=$data_bid_b_b0032['kum_penilai_lama']+$data_bid_b_b0032['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Nasional</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0032['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0032['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0032 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0032['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0032['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0032?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0032/<?php echo $no_usulan; ?>" ></a>
		
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
$sql_b0029="select *from usulan_dupaks where dupak_no='b0029' and usulan_no='$no_usulan'";
$data_b0029=mysqli_query($koneksi,$sql_b0029);
$data_bid_b_b0029=mysqli_fetch_array($data_b0029);
$jumlah_b0029=$data_bid_b_b0029['kum_usulan_lama']+$data_bid_b_b0029['kum_usulan_baru'];
$kum_nilai_b0029=$data_bid_b_b0029['kum_penilai_lama']+$data_bid_b_b0029['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">Internasional </td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0029['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0029['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0029 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0029['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0029['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0029?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0029/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0030="select *from usulan_dupaks where dupak_no='b0030' and usulan_no='$no_usulan'";
$data_b0030=mysqli_query($koneksi,$sql_b0030);
$data_bid_b_b0030=mysqli_fetch_array($data_b0030);
$jumlah_b0030=$data_bid_b_b0030['kum_usulan_lama']+$data_bid_b_b0030['kum_usulan_baru'];
$kum_nilai_b0030=$data_bid_b_b0030['kum_penilai_lama']+$data_bid_b_b0030['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Nasional</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0030['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0030['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0030 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0030['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0030['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0030?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0030/<?php echo $no_usulan; ?>" ></a>
		
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
$sql_b0027="select *from usulan_dupaks where dupak_no='b0027' and usulan_no='$no_usulan'";
$data_b0027=mysqli_query($koneksi,$sql_b0027);
$data_bid_b_b0027=mysqli_fetch_array($data_b0027);
$jumlah_b0027=$data_bid_b_b0027['kum_usulan_lama']+$data_bid_b_b0027['kum_usulan_baru'];
$kum_nilai_b0027=$data_bid_b_b0027['kum_penilai_lama']+$data_bid_b_b0027['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>1)</td>
	<td class="text-left">Internasional </td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0027['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0027['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0027 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0027['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0027['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0027?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0027/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0028="select *from usulan_dupaks where dupak_no='b0028' and usulan_no='$no_usulan'";
$data_b0028=mysqli_query($koneksi,$sql_b0028);
$data_bid_b_b0028=mysqli_fetch_array($data_b0028);
$jumlah_b0028=$data_bid_b_b0028['kum_usulan_lama']+$data_bid_b_b0028['kum_usulan_baru'];
$kum_nilai_b0028=$data_bid_b_b0028['kum_penilai_lama']+$data_bid_b_b0028['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>2)</td>
	<td class="text-left">Nasional</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0028['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0028['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0028 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0028['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0028['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0028?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0028/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0011="select *from usulan_dupaks where dupak_no='b0011' and usulan_no='$no_usulan'";
$data_b0011=mysqli_query($koneksi,$sql_b0011);
$data_bid_b_b0011=mysqli_fetch_array($data_b0011);
$jumlah_b0011=$data_bid_b_b0011['kum_usulan_lama']+$data_bid_b_b0011['kum_usulan_baru'];
$kum_nilai_b0011=$data_bid_b_b0011['kum_penilai_lama']+$data_bid_b_b0011['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>g.</td>
	<td colspan="2" class="text-left">Dalam koran / majalah populer/umum</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0011['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0011['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0011 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0011['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0011['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0011?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0011/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0012="select *from usulan_dupaks where dupak_no='b0012' and usulan_no='$no_usulan'";
$data_b0012=mysqli_query($koneksi,$sql_b0012);
$data_bid_b_b0012=mysqli_fetch_array($data_b0012);
$jumlah_b0012=$data_bid_b_b0012['kum_usulan_lama']+$data_bid_b_b0012['kum_usulan_baru'];
$kum_nilai_b0012=$data_bid_b_b0012['kum_penilai_lama']+$data_bid_b_b0012['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td rowspan="2">2</td>
	<td colspan="3" rowspan="2" class="text-left">Hasil penelitian atau hasil pemikiran yang tidak dipublikasikan (tersimpan di perpustakaan perguruan tinggi)</td>
	<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_b_b0012['kum_usulan_lama'];?></td>
	<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_b_b0012['kum_usulan_baru']?></td>
	<td rowspan="2" style="vertical-align: middle;"><?= $jumlah_b0012 ;?></td>
	<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_b_b0012['kum_penilai_lama']?></td>
	<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_b_b0012['kum_penilai_baru']?></td>
	<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_b0012?></td>
	<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0012/<?php echo $no_usulan; ?>" ></a>
		
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
$sql_b0013="select *from usulan_dupaks where dupak_no='b0013' and usulan_no='$no_usulan'";
$data_b0013=mysqli_query($koneksi,$sql_b0013);
$data_bid_b_b0013=mysqli_fetch_array($data_b0013);
$jumlah_b0013=$data_bid_b_b0013['kum_usulan_lama']+$data_bid_b_b0013['kum_usulan_baru'];
$kum_nilai_b0013=$data_bid_b_b0013['kum_penilai_lama']+$data_bid_b_b0013['kum_penilai_baru'];
?>
 <tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Diterbitkan dan diedarkan secara nasional.</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0013['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0013['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0013 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0013['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0013['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0013?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0013/<?php echo $no_usulan; ?>" ></a>
		
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
$sql_b0014="select *from usulan_dupaks where dupak_no='b0014' and usulan_no='$no_usulan'";
$data_b0014=mysqli_query($koneksi,$sql_b0014);
$data_bid_b_b0014=mysqli_fetch_array($data_b0014);
$jumlah_b0014=$data_bid_b_b0014['kum_usulan_lama']+$data_bid_b_b0014['kum_usulan_baru'];
$kum_nilai_b0014=$data_bid_b_b0014['kum_penilai_lama']+$data_bid_b_b0014['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Diterbitkan dan diedarkan secara nasional.</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0014['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0014['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0014 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0014['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0014['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0014?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0014/<?php echo $no_usulan; ?>" ></a>
		
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
$sql_b0015="select *from usulan_dupaks where dupak_no='b0015' and usulan_no='$no_usulan'";
$data_b0015=mysqli_query($koneksi,$sql_b0015);
$data_bid_b_b0015=mysqli_fetch_array($data_b0015);
$jumlah_b0015=$data_bid_b_b0015['kum_usulan_lama']+$data_bid_b_b0015['kum_usulan_baru'];
$kum_nilai_b0015=$data_bid_b_b0015['kum_penilai_lama']+$data_bid_b_b0015['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Internasional       yang       sudah diimplementasikan di industri (paling   sedikit   diakui   oleh   4 Negara)
	</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0015['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0015['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0015 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0015['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0015['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0015?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0015/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0016="select *from usulan_dupaks where dupak_no='b0016' and usulan_no='$no_usulan'";
$data_b0016=mysqli_query($koneksi,$sql_b0016);
$data_bid_b_b0016=mysqli_fetch_array($data_b0016);
$jumlah_b0016=$data_bid_b_b0016['kum_usulan_lama']+$data_bid_b_b0016['kum_usulan_baru'];
$kum_nilai_b0016=$data_bid_b_b0016['kum_penilai_lama']+$data_bid_b_b0016['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>2</td>
	<td colspan="3" class="text-left">Internasional(paling   sedikit   diakui   oleh   4 Negara)
	</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0016['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0016['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0016 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0016['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0016['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0016?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0016/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0017="select *from usulan_dupaks where dupak_no='b0017' and usulan_no='$no_usulan'";
$data_b0017=mysqli_query($koneksi,$sql_b0017);
$data_bid_b_b0017=mysqli_fetch_array($data_b0017);
$jumlah_b0017=$data_bid_b_b0017['kum_usulan_lama']+$data_bid_b_b0017['kum_usulan_baru'];
$kum_nilai_b0017=$data_bid_b_b0017['kum_penilai_lama']+$data_bid_b_b0017['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>3</td>
	<td colspan="3" class="text-left">Nasional yang sudah diimplementasikan di industri
	</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0017['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0017['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0017 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0017['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0017['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0017?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0017/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0018="select *from usulan_dupaks where dupak_no='b0018' and usulan_no='$no_usulan'";
$data_b0018=mysqli_query($koneksi,$sql_b0018);
$data_bid_b_b0018=mysqli_fetch_array($data_b0018);
$jumlah_b0018=$data_bid_b_b0018['kum_usulan_lama']+$data_bid_b_b0018['kum_usulan_baru'];
$kum_nilai_b0018=$data_bid_b_b0018['kum_penilai_lama']+$data_bid_b_b0018['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>4</td>
	<td colspan="3" class="text-left">Nasional
	</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0018['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0018['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0018 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0018['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0018['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0018?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0018/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0019="select *from usulan_dupaks where dupak_no='b0019' and usulan_no='$no_usulan'";
$data_b0019=mysqli_query($koneksi,$sql_b0019);
$data_bid_b_b0019=mysqli_fetch_array($data_b0019);
$jumlah_b0019=$data_bid_b_b0019['kum_usulan_lama']+$data_bid_b_b0019['kum_usulan_baru'];
$kum_nilai_b0019=$data_bid_b_b0019['kum_penilai_lama']+$data_bid_b_b0019['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>5</td>
	<td colspan="3" class="text-left">Nasional, dalam bentuk paten sederhana yang telah memiliki sertifikat dari Direktorat Jenderal  Kekayaan Intelektual, Kemenkumham
	</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0019['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0019['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0019 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0019['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0019['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0019?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0019/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0020="select *from usulan_dupaks where dupak_no='b0020' and usulan_no='$no_usulan'";
$data_b0020=mysqli_query($koneksi,$sql_b0020);
$data_bid_b_b0020=mysqli_fetch_array($data_b0020);
$jumlah_b0020=$data_bid_b_b0020['kum_usulan_lama']+$data_bid_b_b0020['kum_usulan_baru'];
$kum_nilai_b0020=$data_bid_b_b0020['kum_penilai_lama']+$data_bid_b_b0020['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>6</td>
	<td colspan="3" class="text-left">Karya  ciptaan, desain industri, indikasi geografis yang telah memiliki sertifikat dari Direktorat Jenderal Kekayaan Intelektual, Kemenkumham
	</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0020['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0020['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0020 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0020['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0020['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0020?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0020/<?php echo $no_usulan; ?>" ></a>
		
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
$sql_b0021="select *from usulan_dupaks where dupak_no='b0021' and usulan_no='$no_usulan'";
$data_b0021=mysqli_query($koneksi,$sql_b0021);
$data_bid_b_b0021=mysqli_fetch_array($data_b0021);
$jumlah_b0021=$data_bid_b_b0021['kum_usulan_lama']+$data_bid_b_b0021['kum_usulan_baru'];
$kum_nilai_b0021=$data_bid_b_b0021['kum_penilai_lama']+$data_bid_b_b0021['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Tingkat internasional</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0021['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0021['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0021 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0021['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0021['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0021?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0021/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0022="select *from usulan_dupaks where dupak_no='b0022' and usulan_no='$no_usulan'";
$data_b0022=mysqli_query($koneksi,$sql_b0022);
$data_bid_b_b0022=mysqli_fetch_array($data_b0022);
$jumlah_b0022=$data_bid_b_b0022['kum_usulan_lama']+$data_bid_b_b0022['kum_usulan_baru'];
$kum_nilai_b0022=$data_bid_b_b0022['kum_penilai_lama']+$data_bid_b_b0022['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td>2</td>
	<td colspan="3" class="text-left">Tingkat nasional</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0022['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0022['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0022 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0022['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0022['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0022?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0022/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_b0022="select *from usulan_dupaks where dupak_no='b0023' and usulan_no='$no_usulan'";
$data_b0023=mysqli_query($koneksi,$sql_b0023);
$data_bid_b_b0023=mysqli_fetch_array($data_b0023);
$jumlah_b0023=$data_bid_b_b0023['kum_usulan_lama']+$data_bid_b_b0023['kum_usulan_baru'];
$kum_nilai_b0023=$data_bid_b_b0023['kum_penilai_lama']+$data_bid_b_b0023['kum_penilai_baru'];
?>
  <tr class="text-center">
	<td></td>
	<td>3</td>
	<td colspan="3" class="text-left">Tingkat lokal</td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0023['kum_usulan_lama'];?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0023['kum_usulan_baru']?></td>
	<td style="vertical-align: middle;"><?= $jumlah_b0023 ;?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0023['kum_penilai_lama']?></td>
	<td style="vertical-align: middle;"><?=$data_bid_b_b0023['kum_penilai_baru']?></td>
	<td style="vertical-align: middle;"><?=$kum_nilai_b0023?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak_b/dupak/B0023/<?php echo $no_usulan; ?>" ></a>
		
	</td>
  </tr>
	<?php
$sql_total="select *from usulan_dupaks where  usulan_no='$no_usulan' and left(dupak_no,1)='B'";
$data_total=mysqli_query($koneksi,$sql_total);

$jml_kum_lama=0;
$jml_kum_baru=0;
$jml_kum_penilai_lama=0;
$jml_kum_penilai_baru=0;
while($data_kum_total=mysqli_fetch_array($data_total))
{
	$jml_kum_lama+=$data_kum_total['kum_usulan_lama'];
	$jml_kum_baru+=$data_kum_total['kum_usulan_baru'];
	$jml_kum_penilai_lama+=$data_kum_total['kum_penilai_lama'];
	$jml_kum_penilai_baru+=$data_kum_total['kum_penilai_baru'];
}
	$total_bid_b=$jml_kum_lama+$jml_kum_baru;
	$total_penilai_bid_b=$jml_kum_penilai_lama+$jml_kum_penilai_baru;
?>
  <tr style="background-color: #e4e4e4; font-weight: bold;">
	<td></td>
	<td colspan="5" class="text-right"><b>JUMLAH BIDANG B</b></td>
	<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_lama?></td>
	<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_baru?></td>
	<td style="vertical-align: middle;" class="text-center"><?=$total_bid_b?></td>
	<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_penilai_lama?></td>
	<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_penilai_baru?></td>
	<td style="vertical-align: middle;" class="text-center"><?=$total_penilai_bid_b?></td>
	<td></td>
  </tr>
</tbody>