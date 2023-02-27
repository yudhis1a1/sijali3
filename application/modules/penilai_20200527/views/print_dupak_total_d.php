<tbody>
<tr class="text-center">
<td rowspan="53">V</td>
<td colspan="5" class="text-left">PENUNJANG TUGAS DOSEN</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="text-center">
<td rowspan="3">A</td>
<td colspan="4" class="text-left">Menjadi anggota dalam suatu Panitia/Badan pada perguruan tinggi</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0001="select *from usulan_dupaks where dupak_no='d0001' and usulan_no='$no_usulan'";
$data_d0001=mysqli_query($koneksi,$sql_d0001);
$data_bid_d_d0001=mysqli_fetch_array($data_d0001);
$jumlah_d0001=$data_bid_d_d0001['kum_usulan_lama']+$data_bid_d_d0001['kum_usulan_baru'];
$kum_nilai_d0001=$data_bid_d_d0001['kum_penilai_lama']+$data_bid_d_d0001['kum_penilai_baru'];
?>
<tr class="text-center">
<td>1</td>
<td colspan="3" class="text-left">Sebagai ketua/wakil ketua merangkap anggota</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0001['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0001['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0001 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0001['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0001['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0001?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0001/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0002="select *from usulan_dupaks where dupak_no='d0002' and usulan_no='$no_usulan'";
$data_d0002=mysqli_query($koneksi,$sql_d0002);
$data_bid_d_d0002=mysqli_fetch_array($data_d0002);
$jumlah_d0002=$data_bid_d_d0002['kum_usulan_lama']+$data_bid_d_d0002['kum_usulan_baru'];
$kum_nilai_d0002=$data_bid_d_d0002['kum_penilai_lama']+$data_bid_d_d0002['kum_penilai_baru'];
?>
<tr class="text-center">
<td>2</td>
<td colspan="3" class="text-left">Sebagai anggota</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0002['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0002['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0002 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0002['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0002['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0002?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0002/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="7">B</td>
<td colspan="4" class="text-left">Menjadi anggota panitia/badan pada lembaga pemerintah</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="text-center">
<td rowspan="3">1</td>
<td colspan="3" class="text-left">Panitia pusat</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0003="select *from usulan_dupaks where dupak_no='d0003' and usulan_no='$no_usulan'";
$data_d0003=mysqli_query($koneksi,$sql_d0003);
$data_bid_d_d0003=mysqli_fetch_array($data_d0003);
$jumlah_d0003=$data_bid_d_d0003['kum_usulan_lama']+$data_bid_d_d0003['kum_usulan_baru'];
$kum_nilai_d0003=$data_bid_d_d0003['kum_penilai_lama']+$data_bid_d_d0003['kum_penilai_baru'];
?>
<tr class="text-center">
<td>a.</td>
<td colspan="2" class="text-left">Ketua/Wakil Ketua</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0003['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0003['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0003 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0003['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0003['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0003?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0003/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0004="select *from usulan_dupaks where dupak_no='d0004' and usulan_no='$no_usulan'";
$data_d0004=mysqli_query($koneksi,$sql_d0004);
$data_bid_d_d0004=mysqli_fetch_array($data_d0004);
$jumlah_d0004=$data_bid_d_d0004['kum_usulan_lama']+$data_bid_d_d0004['kum_usulan_baru'];
$kum_nilai_d0004=$data_bid_d_d0004['kum_penilai_lama']+$data_bid_d_d0004['kum_penilai_baru'];
?>
<tr class="text-center">
<td>b.</td>
<td colspan="2" class="text-left">Anggota</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0004['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0004['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0004 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0004['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0004['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0004?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0004/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="3">2</td>
<td colspan="3" class="text-left">Panitia daerah</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="text-center">
<?php
$sql_d0005="select *from usulan_dupaks where dupak_no='d0005' and usulan_no='$no_usulan'";
$data_d0005=mysqli_query($koneksi,$sql_d0005);
$data_bid_d_d0005=mysqli_fetch_array($data_d0005);
$jumlah_d0005=$data_bid_d_d0005['kum_usulan_lama']+$data_bid_d_d0005['kum_usulan_baru'];
$kum_nilai_d0005=$data_bid_d_d0005['kum_penilai_lama']+$data_bid_d_d0005['kum_penilai_baru'];
?>
<td>a.</td>
<td colspan="2" class="text-left">Ketua/Wakil Ketua</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0005['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0005['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0005 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0005['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0005['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0005?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0005/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0006="select *from usulan_dupaks where dupak_no='d0006' and usulan_no='$no_usulan'";
$data_d0006=mysqli_query($koneksi,$sql_d0006);
$data_bid_d_d0006=mysqli_fetch_array($data_d0006);
$jumlah_d0006=$data_bid_d_d0006['kum_usulan_lama']+$data_bid_d_d0006['kum_usulan_baru'];
$kum_nilai_d0006=$data_bid_d_d0006['kum_penilai_lama']+$data_bid_d_d0006['kum_penilai_baru'];
?>
<tr class="text-center">

<td>b.</td>
<td colspan="2" class="text-left">Anggota</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0006['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0006['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0006 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0006['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0006['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0006?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0006/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="9">C</td>
<td colspan="4" class="text-left">Menjadi anggota organisasi profesi</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="text-center">
<td rowspan="4">1</td>
<td colspan="3" class="text-left">Tingkat internasional</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0007="select *from usulan_dupaks where dupak_no='d0007' and usulan_no='$no_usulan'";
$data_d0007=mysqli_query($koneksi,$sql_d0007);
$data_bid_d_d0007=mysqli_fetch_array($data_d0007);
$jumlah_d0007=$data_bid_d_d0007['kum_usulan_lama']+$data_bid_d_d0007['kum_usulan_baru'];
$kum_nilai_d0007=$data_bid_d_d0007['kum_penilai_lama']+$data_bid_d_d0007['kum_penilai_baru'];
?>
<tr class="text-center">
<td>a.</td>
<td colspan="2" class="text-left">Pengurus</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0007['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0007['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0007 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0007['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0007['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0007?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0007/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0008="select *from usulan_dupaks where dupak_no='d0008' and usulan_no='$no_usulan'";
$data_d0008=mysqli_query($koneksi,$sql_d0008);
$data_bid_d_d0008=mysqli_fetch_array($data_d0008);
$jumlah_d0008=$data_bid_d_d0008['kum_usulan_lama']+$data_bid_d_d0008['kum_usulan_baru'];
$kum_nilai_d0008=$data_bid_d_d0008['kum_penilai_lama']+$data_bid_d_d0008['kum_penilai_baru'];
?>
<tr class="text-center">
<td>b.</td>
<td colspan="2" class="text-left">Anggota atas permintaan</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0008['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0008['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0008 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0008['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0008['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0008?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0008/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0009="select *from usulan_dupaks where dupak_no='d0009' and usulan_no='$no_usulan'";
$data_d0009=mysqli_query($koneksi,$sql_d0009);
$data_bid_d_d0009=mysqli_fetch_array($data_d0009);
$jumlah_d0009=$data_bid_d_d0009['kum_usulan_lama']+$data_bid_d_d0009['kum_usulan_baru'];
$kum_nilai_d0009=$data_bid_d_d0009['kum_penilai_lama']+$data_bid_d_d0009['kum_penilai_baru'];
?>
<tr class="text-center">
<td>c.</td>
<td colspan="2" class="text-left">Anggota</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0009['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0009['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0009 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0009['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0009['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0009?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0009/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="4">2</td>
<td colspan="3" class="text-left">Tingkat nasional</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0010="select *from usulan_dupaks where dupak_no='d0010' and usulan_no='$no_usulan'";
$data_d0010=mysqli_query($koneksi,$sql_d0010);
$data_bid_d_d0010=mysqli_fetch_array($data_d0010);
$jumlah_d0010=$data_bid_d_d0010['kum_usulan_lama']+$data_bid_d_d0010['kum_usulan_baru'];
$kum_nilai_d0010=$data_bid_d_d0010['kum_penilai_lama']+$data_bid_d_d0010['kum_penilai_baru'];
?>
<tr class="text-center">
<td>a.</td>
<td colspan="2" class="text-left">Pengurus</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0010['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0010['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0010 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0010['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0010['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0010?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0010/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0011="select *from usulan_dupaks where dupak_no='d0011' and usulan_no='$no_usulan'";
$data_d0011=mysqli_query($koneksi,$sql_d0011);
$data_bid_d_d0011=mysqli_fetch_array($data_d0011);
$jumlah_d0011=$data_bid_d_d0011['kum_usulan_lama']+$data_bid_d_d0011['kum_usulan_baru'];
$kum_nilai_d0011=$data_bid_d_d0011['kum_penilai_lama']+$data_bid_d_d0011['kum_penilai_baru'];
?>
<tr class="text-center">
<td>b.</td>
<td colspan="2" class="text-left">Anggota atas permintaan</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0011['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0011['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0011 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0011['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0011['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0011?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0011/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0012="select *from usulan_dupaks where dupak_no='d0012' and usulan_no='$no_usulan'";
$data_d0012=mysqli_query($koneksi,$sql_d0012);
$data_bid_d_d0012=mysqli_fetch_array($data_d0012);
$jumlah_d0012=$data_bid_d_d0012['kum_usulan_lama']+$data_bid_d_d0012['kum_usulan_baru'];
$kum_nilai_d0012=$data_bid_d_d0012['kum_penilai_lama']+$data_bid_d_d0012['kum_penilai_baru'];
?>
<tr class="text-center">
<td>c.</td>
<td colspan="2" class="text-left">Anggota</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0012['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0012['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0012 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0012['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0012['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0012?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0012/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="3">D</td>
<td colspan="4" class="text-left">Mewakili perguruan tinggi/lembaga pemerintah</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0013="select *from usulan_dupaks where dupak_no='d0013' and usulan_no='$no_usulan'";
$data_d0013=mysqli_query($koneksi,$sql_d0013);
$data_bid_d_d0013=mysqli_fetch_array($data_d0013);
$jumlah_d0013=$data_bid_d_d0013['kum_usulan_lama']+$data_bid_d_d0013['kum_usulan_baru'];
$kum_nilai_d0013=$data_bid_d_d0013['kum_penilai_lama']+$data_bid_d_d0013['kum_penilai_baru'];
?>
<tr class="text-center">
<td rowspan="2">1</td>
<td colspan="3" rowspan="2" class="text-left">Mewakili perguruan tinggi/ Iembaga pemerintah duduk dalam panitia antar lembaga</td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_d_d0013['kum_usulan_lama'];?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_d_d0013['kum_usulan_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?= $jumlah_d0013 ;?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_d_d0013['kum_penilai_lama']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_d_d0013['kum_penilai_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_d0013?></td>
<td rowspan="2" style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0013/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr>
</tr>
<tr class="text-center">
<td rowspan="3">E</td>
<td colspan="4" class="text-left">Menjadi anggota delegasi nasional ke pertemuan internasional</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0014="select *from usulan_dupaks where dupak_no='d0014' and usulan_no='$no_usulan'";
$data_d0014=mysqli_query($koneksi,$sql_d0014);
$data_bid_d_d0014=mysqli_fetch_array($data_d0014);
$jumlah_d0014=$data_bid_d_d0014['kum_usulan_lama']+$data_bid_d_d0014['kum_usulan_baru'];
$kum_nilai_d0014=$data_bid_d_d0014['kum_penilai_lama']+$data_bid_d_d0014['kum_penilai_baru'];
?>
<tr class="text-center">
<td>1</td>
<td colspan="3" class="text-left">Sebagai ketua delegasi</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0014['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0014['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0014 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0014['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0014['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0014?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0014/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0015="select *from usulan_dupaks where dupak_no='d0015' and usulan_no='$no_usulan'";
$data_d0015=mysqli_query($koneksi,$sql_d0015);
$data_bid_d_d0015=mysqli_fetch_array($data_d0015);
$jumlah_d0015=$data_bid_d_d0015['kum_usulan_lama']+$data_bid_d_d0015['kum_usulan_baru'];
$kum_nilai_d0015=$data_bid_d_d0015['kum_penilai_lama']+$data_bid_d_d0015['kum_penilai_baru'];
?>
<tr class="text-center">
<td>2</td>
<td colspan="3" class="text-left">Sebagai anggota delegasi</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0015['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0015['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0015 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0015['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0015['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0015?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0015/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>

</tr>
<tr class="text-center">
<td rowspan="7">F</td>
<td colspan="4" class="text-left">Berperan serta aktif dalam pertemuan ilmiah</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="text-center">
<td rowspan="3">1</td>
<td colspan="3" class="text-left">Tingkat internasional/nasional/regional sebagai:</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0016="select *from usulan_dupaks where dupak_no='d0016' and usulan_no='$no_usulan'";
$data_d0016=mysqli_query($koneksi,$sql_d0016);
$data_bid_d_d0016=mysqli_fetch_array($data_d0016);
$jumlah_d0016=$data_bid_d_d0016['kum_usulan_lama']+$data_bid_d_d0016['kum_usulan_baru'];
$kum_nilai_d0016=$data_bid_d_d0016['kum_penilai_lama']+$data_bid_d_d0016['kum_penilai_baru'];
?>
<tr class="text-center">

<td>a.</td>
<td colspan="2" class="text-left">Ketua</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0016['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0016['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0016 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0016['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0016['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0016?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0016/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0017="select *from usulan_dupaks where dupak_no='d0017' and usulan_no='$no_usulan'";
$data_d0017=mysqli_query($koneksi,$sql_d0017);
$data_bid_d_d0017=mysqli_fetch_array($data_d0017);
$jumlah_d0017=$data_bid_d_d0017['kum_usulan_lama']+$data_bid_d_d0017['kum_usulan_baru'];
$kum_nilai_d0017=$data_bid_d_d0017['kum_penilai_lama']+$data_bid_d_d0017['kum_penilai_baru'];
?>
<tr class="text-center">

<td>b.</td>
<td colspan="2" class="text-left">Anggota</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0017['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0017['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0017 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0017['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0017['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0017?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0017/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="3">2</td>
<td colspan="3" class="text-left">Di lingkungan perguruan tinggi sebagai:</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0018="select *from usulan_dupaks where dupak_no='d0018' and usulan_no='$no_usulan'";
$data_d0018=mysqli_query($koneksi,$sql_d0018);
$data_bid_d_d0018=mysqli_fetch_array($data_d0018);
$jumlah_d0018=$data_bid_d_d0018['kum_usulan_lama']+$data_bid_d_d0018['kum_usulan_baru'];
$kum_nilai_d0018=$data_bid_d_d0018['kum_penilai_lama']+$data_bid_d_d0018['kum_penilai_baru'];
?>
<tr class="text-center">

<td>a.</td>
<td colspan="2" class="text-left">Ketua</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0018['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0018['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0018 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0018['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0018['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0018?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0018/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0019="select *from usulan_dupaks where dupak_no='d0019' and usulan_no='$no_usulan'";
$data_d0019=mysqli_query($koneksi,$sql_d0019);
$data_bid_d_d0019=mysqli_fetch_array($data_d0019);
$jumlah_d0019=$data_bid_d_d0019['kum_usulan_lama']+$data_bid_d_d0019['kum_usulan_baru'];
$kum_nilai_d0019=$data_bid_d_d0019['kum_penilai_lama']+$data_bid_d_d0019['kum_penilai_baru'];
?>
<tr class="text-center">

<td>b.</td>
<td colspan="2" class="text-left">Anggota</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0019['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0019['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0019 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0019['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0019['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0019?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0019/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="9">G</td>
<td colspan="4" class="text-left">Mendapat penghargaan / tanda jasa</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="text-center">
<td rowspan="4">1</td>
<td colspan="3" class="text-left">Penghargaan/tanda jasa Satya Lancana Karya Satya</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0020="select *from usulan_dupaks where dupak_no='d0020' and usulan_no='$no_usulan'";
$data_d0020=mysqli_query($koneksi,$sql_d0020);
$data_bid_d_d0020=mysqli_fetch_array($data_d0020);
$jumlah_d0020=$data_bid_d_d0020['kum_usulan_lama']+$data_bid_d_d0020['kum_usulan_baru'];
$kum_nilai_d0020=$data_bid_d_d0020['kum_penilai_lama']+$data_bid_d_d0020['kum_penilai_baru'];
?>
<tr class="text-center">

<td>a.</td>
<td colspan="2" class="text-left">30 (tiga puluh) tahun</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0020['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0020['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0020 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0020['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0020['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0020?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0020/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0021="select *from usulan_dupaks where dupak_no='d0021' and usulan_no='$no_usulan'";
$data_d0021=mysqli_query($koneksi,$sql_d0021);
$data_bid_d_d0021=mysqli_fetch_array($data_d0021);
$jumlah_d0021=$data_bid_d_d0021['kum_usulan_lama']+$data_bid_d_d0021['kum_usulan_baru'];
$kum_nilai_d0021=$data_bid_d_d0021['kum_penilai_lama']+$data_bid_d_d0021['kum_penilai_baru'];
?>
<tr class="text-center">

<td>b.</td>
<td colspan="2" class="text-left">20 (dua puluh) tahun</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0021['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0021['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0021 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0021['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0021['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0021?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0021/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0022="select *from usulan_dupaks where dupak_no='d0022' and usulan_no='$no_usulan'";
$data_d0022=mysqli_query($koneksi,$sql_d0022);
$data_bid_d_d0022=mysqli_fetch_array($data_d0022);
$jumlah_d0022=$data_bid_d_d0022['kum_usulan_lama']+$data_bid_d_d0022['kum_usulan_baru'];
$kum_nilai_d0022=$data_bid_d_d0022['kum_penilai_lama']+$data_bid_d_d0022['kum_penilai_baru'];
?>
<tr class="text-center">

<td>c.</td>
<td colspan="2" class="text-left">10 (sepuluh) tahun</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0022['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0022['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0022 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0022['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0022['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0022?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0022/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="4">2</td>
<td colspan="3" class="text-left">Memperoleh penghargaan lainnya</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0023="select *from usulan_dupaks where dupak_no='d0023' and usulan_no='$no_usulan'";
$data_d0023=mysqli_query($koneksi,$sql_d0023);
$data_bid_d_d0023=mysqli_fetch_array($data_d0023);
$jumlah_d0023=$data_bid_d_d0023['kum_usulan_lama']+$data_bid_d_d0023['kum_usulan_baru'];
$kum_nilai_d0023=$data_bid_d_d0023['kum_penilai_lama']+$data_bid_d_d0023['kum_penilai_baru'];
?>
<tr class="text-center">

<td>a.</td>
<td colspan="2" class="text-left">Tingkat internasional</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0023['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0023['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0023 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0023['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0023['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0023?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0023/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0024="select *from usulan_dupaks where dupak_no='d0024' and usulan_no='$no_usulan'";
$data_d0024=mysqli_query($koneksi,$sql_d0024);
$data_bid_d_d0024=mysqli_fetch_array($data_d0024);
$jumlah_d0024=$data_bid_d_d0024['kum_usulan_lama']+$data_bid_d_d0024['kum_usulan_baru'];
$kum_nilai_d0024=$data_bid_d_d0024['kum_penilai_lama']+$data_bid_d_d0024['kum_penilai_baru'];
?>
<tr class="text-center">

<td>b.</td>
<td colspan="2" class="text-left">Tingkat nasional</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0024['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0024['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0024 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0024['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0024['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0024?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0024/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0025="select *from usulan_dupaks where dupak_no='d0025' and usulan_no='$no_usulan'";
$data_d0025=mysqli_query($koneksi,$sql_d0025);
$data_bid_d_d0025=mysqli_fetch_array($data_d0025);
$jumlah_d0025=$data_bid_d_d0025['kum_usulan_lama']+$data_bid_d_d0025['kum_usulan_baru'];
$kum_nilai_d0025=$data_bid_d_d0025['kum_penilai_lama']+$data_bid_d_d0025['kum_penilai_baru'];
?>
<tr class="text-center">

<td>c.</td>
<td colspan="2" class="text-left">Tingkat provinsi</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0025['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0025['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0025 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0025['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0025['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0025?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0025/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="5">H</td>
<td colspan="4" rowspan="2" class="text-left">Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional</td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
</tr>
<tr>
</tr>
<?php
$sql_d0026="select *from usulan_dupaks where dupak_no='d0026' and usulan_no='$no_usulan'";
$data_d0026=mysqli_query($koneksi,$sql_d0026);
$data_bid_d_d0026=mysqli_fetch_array($data_d0026);
$jumlah_d0026=$data_bid_d_d0026['kum_usulan_lama']+$data_bid_d_d0026['kum_usulan_baru'];
$kum_nilai_d0026=$data_bid_d_d0026['kum_penilai_lama']+$data_bid_d_d0026['kum_penilai_baru'];
?>
<tr class="text-center">

<td>1</td>
<td colspan="3" class="text-left">Buku SLTA atau setingkat</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0026['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0026['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0026 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0026['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0026['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0026?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0026/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0027="select *from usulan_dupaks where dupak_no='d0027' and usulan_no='$no_usulan'";
$data_d0027=mysqli_query($koneksi,$sql_d0027);
$data_bid_d_d0027=mysqli_fetch_array($data_d0027);
$jumlah_d0027=$data_bid_d_d0027['kum_usulan_lama']+$data_bid_d_d0027['kum_usulan_baru'];
$kum_nilai_d0027=$data_bid_d_d0027['kum_penilai_lama']+$data_bid_d_d0027['kum_penilai_baru'];
?>
<tr class="text-center">

<td>2</td>
<td colspan="3" class="text-left">Buku SLTP atau setingkat</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0027['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0027['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0027 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0027['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0027['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0027?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0027/<?php echo $no_usulan; ?>" ></a>
</td>
</tr>
<?php
$sql_d0028="select *from usulan_dupaks where dupak_no='d0028' and usulan_no='$no_usulan'";
$data_d0028=mysqli_query($koneksi,$sql_d0028);
$data_bid_d_d0028=mysqli_fetch_array($data_d0028);
$jumlah_d0028=$data_bid_d_d0028['kum_usulan_lama']+$data_bid_d_d0028['kum_usulan_baru'];
$kum_nilai_d0028=$data_bid_d_d0028['kum_penilai_lama']+$data_bid_d_d0028['kum_penilai_baru'];
?>
<tr class="text-center">

<td>3</td>
<td colspan="3" class="text-left">Buku SD atau setingkat</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0028['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0028['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0028 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0028['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0028['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0028?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0028/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="4">I</td>
<td colspan="4" class="text-left">Mempunyai prestasi di bidang olahraga/humaniora</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0029="select *from usulan_dupaks where dupak_no='d0029' and usulan_no='$no_usulan'";
$data_d0029=mysqli_query($koneksi,$sql_d0029);
$data_bid_d_d0029=mysqli_fetch_array($data_d0029);
$jumlah_d0029=$data_bid_d_d0029['kum_usulan_lama']+$data_bid_d_d0029['kum_usulan_baru'];
$kum_nilai_d0029=$data_bid_d_d0029['kum_penilai_lama']+$data_bid_d_d0029['kum_penilai_baru'];
?>
<tr class="text-center">

<td>1</td>
<td colspan="3" class="text-left">Tingkat internasional</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0029['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0029['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0029 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0029['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0029['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0029?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0029/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0030="select *from usulan_dupaks where dupak_no='d0030' and usulan_no='$no_usulan'";
$data_d0030=mysqli_query($koneksi,$sql_d0030);
$data_bid_d_d0030=mysqli_fetch_array($data_d0030);
$jumlah_d0030=$data_bid_d_d0030['kum_usulan_lama']+$data_bid_d_d0030['kum_usulan_baru'];
$kum_nilai_d0030=$data_bid_d_d0030['kum_penilai_lama']+$data_bid_d_d0030['kum_penilai_baru'];
?>
<tr class="text-center">

<td>2</td>
<td colspan="3" class="text-left">Tingkat nasional</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0030['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0030['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0030 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0030['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0030['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0030?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0030/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_d0031="select *from usulan_dupaks where dupak_no='d0031' and usulan_no='$no_usulan'";
$data_d0031=mysqli_query($koneksi,$sql_d0031);
$data_bid_d_d0031=mysqli_fetch_array($data_d0031);
$jumlah_d0031=$data_bid_d_d0031['kum_usulan_lama']+$data_bid_d_d0031['kum_usulan_baru'];
$kum_nilai_d0031=$data_bid_d_d0031['kum_penilai_lama']+$data_bid_d_d0031['kum_penilai_baru'];
?>
<tr class="text-center">

<td>3</td>
<td colspan="3" class="text-left">Tingkat daerah/lokal</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0031['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0031['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0031 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0031['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0031['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0031?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0031/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="2">J</td>
<td colspan="4" class="text-left">Keanggotaan dalam tim penilaian</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_d0032="select *from usulan_dupaks where dupak_no='d0032' and usulan_no='$no_usulan'";
$data_d0032=mysqli_query($koneksi,$sql_d0032);
$data_bid_d_d0032=mysqli_fetch_array($data_d0032);
$jumlah_d0032=$data_bid_d_d0032['kum_usulan_lama']+$data_bid_d_d0032['kum_usulan_baru'];
$kum_nilai_d0032=$data_bid_d_d0032['kum_penilai_lama']+$data_bid_d_d0032['kum_penilai_baru'];
?>
<tr class="text-center">

<td>1</td>
<td colspan="3" class="text-left">Menjadi anggota tim penilaian jabatan Akademik Dosen</td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0032['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0032['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_d0032 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0032['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_d_d0032['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_d0032?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_d/dupak/D0032/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_total="SELECT
		  SUM(`kum_usulan_lama`) AS kum_lama,
		  SUM(`kum_usulan_baru`) AS kum_baru,
		  SUM(`kum_penilai_lama`) AS kum_penilai_lama,
		  SUM(`kum_penilai_baru`) AS kum_penilai_baru
		FROM
		  usulan_dupaks
		WHERE usulan_no = '$no_usulan'
		  AND LEFT(dupak_no, 1) = 'D'";
$data_total=mysqli_query($koneksi,$sql_total);
$data_kum_total=mysqli_fetch_array($data_total);
$jmlah_kum=$data_kum_total['kum_lama']+$data_kum_total['kum_baru'];
$jmlah_kum_penilai=$data_kum_total['kum_penilai_lama']+$data_kum_total['kum_penilai_baru'];
?>
<tr style="background-color: #e4e4e4; font-weight: bold;">

<td colspan="6" class="text-right"><b>JUMLAH BIDANG D</b></td>
<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_lama']?></td>
<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_baru']?></td>
<td style="vertical-align: middle;" class="text-center"><?=$jmlah_kum?></td>
<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_penilai_lama']?></td>
<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_penilai_baru']?></td>
<td style="vertical-align: middle;" class="text-center"><?=$jmlah_kum_penilai?></td>
<td></td>
</tr>
</tbody>