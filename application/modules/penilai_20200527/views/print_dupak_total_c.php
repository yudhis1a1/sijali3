<tbody>
<tr class="text-center">
<td rowspan="31">IV</td>
<td colspan="5" class="text-left">PELAKSANAAN PENGABDIAN KEPADA MASYARAKAT</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="text-center">
<td rowspan="4">A</td>
<td colspan="4" class="text-left">Menduduki jabatan pimpinan</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_c0001="select *from usulan_dupaks where dupak_no='c0001' and usulan_no='$no_usulan'";
$data_c0001=mysqli_query($koneksi,$sql_c0001);
$data_bid_c_c0001=mysqli_fetch_array($data_c0001);
$jumlah_c0001=$data_bid_c_c0001['kum_usulan_lama']+$data_bid_c_c0001['kum_usulan_baru'];
$kum_nilai_c0001=$data_bid_c_c0001['kum_penilai_lama']+$data_bid_c_c0001['kum_penilai_baru'];
?>
<tr class="text-center">
<td rowspan="3">1</td>
<td colspan="3" rowspan="3" class="text-left">Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya</td>
<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_c_c0001['kum_usulan_lama'];?></td>
<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_c_c0001['kum_usulan_baru']?></td>
<td rowspan="3" style="vertical-align: middle;"><?= $jumlah_c0001 ;?></td>
<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_c_c0001['kum_penilai_lama']?></td>
<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_c_c0001['kum_penilai_baru']?></td>
<td rowspan="3" style="vertical-align: middle;"><?=$kum_nilai_c0001?></td>
<td rowspan="3" style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0001/<?php echo $no_usulan; ?>" ></a>
		
</td>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr class="text-center">
<td rowspan="3">B</td>
<td colspan="4" class="text-left">Melaksankan pengembangan hasil pendidikan dan penelitian</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_c0002="select *from usulan_dupaks where dupak_no='c0002' and usulan_no='$no_usulan'";
$data_c0002=mysqli_query($koneksi,$sql_c0002);
$data_bid_c_c0002=mysqli_fetch_array($data_c0002);
$jumlah_c0002=$data_bid_c_c0002['kum_usulan_lama']+$data_bid_c_c0002['kum_usulan_baru'];
$kum_nilai_c0002=$data_bid_c_c0002['kum_penilai_lama']+$data_bid_c_c0002['kum_penilai_baru'];
?>
<tr class="text-center">
<td rowspan="2">1</td>
<td colspan="3" rowspan="2" class="text-left">Melaksanakan pengembangan hasil pendidikan dan penelitian yang dapat dimanfaatkan oleh
masyarakat</td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_c_c0002['kum_usulan_lama'];?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_c_c0002['kum_usulan_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?= $jumlah_c0002 ;?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_c_c0002['kum_penilai_lama']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_c_c0002['kum_penilai_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_c0002?></td>
<td rowspan="2" style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0002/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr>
</tr>
<tr class="text-center">
<td rowspan="11">C</td>
<td colspan="4" class="text-left">Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="text-center">
<td rowspan="10">1</td>
<td colspan="3" class="text-left">Terjadwal/terprogram</td>
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
<td colspan="2" class="text-left">Dalam satu semester atau lebih</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_c0003="select *from usulan_dupaks where dupak_no='c0003' and usulan_no='$no_usulan'";
$data_c0003=mysqli_query($koneksi,$sql_c0003);
$data_bid_c_c0003=mysqli_fetch_array($data_c0003);
$jumlah_c0003=$data_bid_c_c0003['kum_usulan_lama']+$data_bid_c_c0003['kum_usulan_baru'];
$kum_nilai_c0003=$data_bid_c_c0003['kum_penilai_lama']+$data_bid_c_c0003['kum_penilai_baru'];
?>
<tr class="text-center">
<td>1)</td>
<td class="text-left">Tingkat internasional</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0003['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0003['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0003 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0003['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0003['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0003?></td>
<td style="vertical-align: middle;">

	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0003/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0004="select *from usulan_dupaks where dupak_no='c0004' and usulan_no='$no_usulan'";
$data_c0004=mysqli_query($koneksi,$sql_c0004);
$data_bid_c_c0004=mysqli_fetch_array($data_c0004);
$jumlah_c0004=$data_bid_c_c0004['kum_usulan_lama']+$data_bid_c_c0004['kum_usulan_baru'];
$kum_nilai_c0004=$data_bid_c_c0004['kum_penilai_lama']+$data_bid_c_c0004['kum_penilai_baru'];
?>
<tr class="text-center">
<td>2)</td>
<td class="text-left">Tingkat nasional</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0004['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0004['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0004 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0004['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0004['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0004?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0004/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0005="select *from usulan_dupaks where dupak_no='c0005' and usulan_no='$no_usulan'";
$data_c0005=mysqli_query($koneksi,$sql_c0005);
$data_bid_c_c0005=mysqli_fetch_array($data_c0005);
$jumlah_c0005=$data_bid_c_c0005['kum_usulan_lama']+$data_bid_c_c0005['kum_usulan_baru'];
$kum_nilai_c0005=$data_bid_c_c0005['kum_penilai_lama']+$data_bid_c_c0005['kum_penilai_baru'];
?>
<tr class="text-center">
<td>3)</td>
<td class="text-left">Tingkat lokal</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0005['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0005['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0005 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0005['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0005['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0005?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0005/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="5">b.</td>
<td colspan="2" class="text-left">Kurang dari satu semester dan minimal satu bulan</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_c0006="select *from usulan_dupaks where dupak_no='c0006' and usulan_no='$no_usulan'";
$data_c0006=mysqli_query($koneksi,$sql_c0006);
$data_bid_c_c0006=mysqli_fetch_array($data_c0006);
$jumlah_c0006=$data_bid_c_c0006['kum_usulan_lama']+$data_bid_c_c0006['kum_usulan_baru'];
$kum_nilai_c0006=$data_bid_c_c0006['kum_penilai_lama']+$data_bid_c_c0006['kum_penilai_baru'];
?>
<tr class="text-center">
<td>1)</td>
<td class="text-left">Tingkat internasional</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0006['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0006['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0006 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0006['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0006['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0006?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0006/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0007="select *from usulan_dupaks where dupak_no='c0007' and usulan_no='$no_usulan'";
$data_c0007=mysqli_query($koneksi,$sql_c0007);
$data_bid_c_c0007=mysqli_fetch_array($data_c0007);
$jumlah_c0007=$data_bid_c_c0007['kum_usulan_lama']+$data_bid_c_c0007['kum_usulan_baru'];
$kum_nilai_c0007=$data_bid_c_c0007['kum_penilai_lama']+$data_bid_c_c0007['kum_penilai_baru'];
?>
<tr class="text-center">
<td>2)</td>
<td class="text-left">Tingkat nasional</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0007['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0007['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0007 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0007['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0007['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0007?></td>
<td style="vertical-align: middle;">

	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0007/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0008="select *from usulan_dupaks where dupak_no='c0008' and usulan_no='$no_usulan'";
$data_c0008=mysqli_query($koneksi,$sql_c0008);
$data_bid_c_c0008=mysqli_fetch_array($data_c0008);
$jumlah_c0008=$data_bid_c_c0008['kum_usulan_lama']+$data_bid_c_c0008['kum_usulan_baru'];
$kum_nilai_c0008=$data_bid_c_c0008['kum_penilai_lama']+$data_bid_c_c0008['kum_penilai_baru'];
?>
<tr class="text-center">
<td>3)</td>
<td class="text-left">Tingkat lokal</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0008['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0008['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0008 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0008['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0008['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0008?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0008/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0009="select *from usulan_dupaks where dupak_no='c0009' and usulan_no='$no_usulan'";
$data_c0009=mysqli_query($koneksi,$sql_c0009);
$data_bid_c_c0009=mysqli_fetch_array($data_c0009);
$jumlah_c0009=$data_bid_c_c0009['kum_usulan_lama']+$data_bid_c_c0009['kum_usulan_baru'];
$kum_nilai_c0009=$data_bid_c_c0009['kum_penilai_lama']+$data_bid_c_c0009['kum_penilai_baru'];
?>
<tr class="text-center">
<td>4)</td>
<td class="text-left">Insidental</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0009['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0009['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0009 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0009['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0009['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0009?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0009/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<tr class="text-center">
<td rowspan="5">D</td>
<td colspan="4" rowspan="2" class="text-left">Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas
umum pemerintah dan pembangunan</td>
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
$sql_c0010="select *from usulan_dupaks where dupak_no='c0010' and usulan_no='$no_usulan'";
$data_c0010=mysqli_query($koneksi,$sql_c0010);
$data_bid_c_c0010=mysqli_fetch_array($data_c0010);
$jumlah_c0010=$data_bid_c_c0010['kum_usulan_lama']+$data_bid_c_c0010['kum_usulan_baru'];
$kum_nilai_c0010=$data_bid_c_c0010['kum_penilai_lama']+$data_bid_c_c0010['kum_penilai_baru'];
?>
<tr class="text-center">
<td>1</td>
<td colspan="3" class="text-left">Berdasarkan bidang keahlian</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0010['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0010['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0010 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0010['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0010['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0010?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0010/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0011="select *from usulan_dupaks where dupak_no='c0011' and usulan_no='$no_usulan'";
$data_c0011=mysqli_query($koneksi,$sql_c0011);
$data_bid_c_c0011=mysqli_fetch_array($data_c0011);
$jumlah_c0011=$data_bid_c_c0011['kum_usulan_lama']+$data_bid_c_c0011['kum_usulan_baru'];
$kum_nilai_c0011=$data_bid_c_c0011['kum_penilai_lama']+$data_bid_c_c0011['kum_penilai_baru'];
?>
<tr class="text-center">
<td>2</td>
<td colspan="3" class="text-left">Berdasarkan penugasan lembaga perguruan tinggi</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0011['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0011['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0011 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0011['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0011['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0011?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0011/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0012="select *from usulan_dupaks where dupak_no='c0012' and usulan_no='$no_usulan'";
$data_c0012=mysqli_query($koneksi,$sql_c0012);
$data_bid_c_c0012=mysqli_fetch_array($data_c0012);
$jumlah_c0012=$data_bid_c_c0012['kum_usulan_lama']+$data_bid_c_c0012['kum_usulan_baru'];
$kum_nilai_c0012=$data_bid_c_c0012['kum_penilai_lama']+$data_bid_c_c0012['kum_penilai_baru'];
?>
<tr class="text-center">
<td>3</td>
<td colspan="3" class="text-left">Berdasarkan fungsi / jabatan</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0012['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0012['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0012 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0012['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0012['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0012?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0012/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0013="select *from usulan_dupaks where dupak_no='c0013' and usulan_no='$no_usulan'";
$data_c0013=mysqli_query($koneksi,$sql_c0013);
$data_bid_c_c0013=mysqli_fetch_array($data_c0013);
$jumlah_c0013=$data_bid_c_c0013['kum_usulan_lama']+$data_bid_c_c0013['kum_usulan_baru'];
$kum_nilai_c0013=$data_bid_c_c0013['kum_penilai_lama']+$data_bid_c_c0013['kum_penilai_baru'];
?>
<tr class="text-center">
<td rowspan="1">E</td>
<td colspan="4" class="text-left">Membuat/ menulis karya pengabdian</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0013['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0013['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0013 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0013['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0013['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0013?></td>
<td>
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0013/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0014="select *from usulan_dupaks where dupak_no='c0014' and usulan_no='$no_usulan'";
$data_c0014=mysqli_query($koneksi,$sql_c0014);
$data_bid_c_c0014=mysqli_fetch_array($data_c0014);
$jumlah_c0014=$data_bid_c_c0014['kum_usulan_lama']+$data_bid_c_c0014['kum_usulan_baru'];
$kum_nilai_c0014=$data_bid_c_c0014['kum_penilai_lama']+$data_bid_c_c0014['kum_penilai_baru'];
?>
<tr class="text-center">
<td>F</td>
<td colspan="4" class="text-left">Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala/jurnal pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0014['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0014['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0014 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0014['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0014['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0014?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0014/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>

<tr class="text-center">
<td rowspan="5">G</td>
<td colspan="4" rowspan="2" class="text-left">Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun)*</td>
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
$sql_c0015="select *from usulan_dupaks where dupak_no='c0015' and usulan_no='$no_usulan'";
$data_c0015=mysqli_query($koneksi,$sql_c0015);
$data_bid_c_c0015=mysqli_fetch_array($data_c0015);
$jumlah_c0015=$data_bid_c_c0015['kum_usulan_lama']+$data_bid_c_c0015['kum_usulan_baru'];
$kum_nilai_c0015=$data_bid_c_c0015['kum_penilai_lama']+$data_bid_c_c0015['kum_penilai_baru'];
?>
<tr class="text-center">
<td>1</td>
<td colspan="3" class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0015['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0015['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0015 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0015['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0015['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0015?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0015/<?php echo $no_usulan; ?>" ></a>
	
</td>
</tr>
<?php
$sql_c0016="select *from usulan_dupaks where dupak_no='c0016' and usulan_no='$no_usulan'";
$data_c0016=mysqli_query($koneksi,$sql_c0016);
$data_bid_c_c0016=mysqli_fetch_array($data_c0016);
$jumlah_c0016=$data_bid_c_c0016['kum_usulan_lama']+$data_bid_c_c0016['kum_usulan_baru'];
$kum_nilai_c0016=$data_bid_c_c0016['kum_penilai_lama']+$data_bid_c_c0016['kum_penilai_baru'];
?>
<tr class="text-center">
<td>2</td>
<td colspan="3" class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah nasional</td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0016['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0016['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_c0016 ;?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0016['kum_penilai_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_c_c0016['kum_penilai_baru']?></td>
<td style="vertical-align: middle;"><?=$kum_nilai_c0016?></td>
<td style="vertical-align: middle;">
	
	<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0016/<?php echo $no_usulan; ?>" ></a>
	
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
			  AND LEFT(dupak_no, 1) = 'C'";
$data_total=mysqli_query($koneksi,$sql_total);
$data_kum_total=mysqli_fetch_array($data_total);
$jmlah_kum=$data_kum_total['kum_lama']+$data_kum_total['kum_baru'];
$jmlah_kum_penilai=$data_kum_total['kum_penilai_lama']+$data_kum_total['kum_penilai_baru'];
?>
<tr>
</tr>
<tr style="background-color: #e4e4e4; font-weight: bold;">
<td colspan="6" class="text-right"><b>JUMLAH BIDANG C</b></td>
<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_lama']?></td>
<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_baru']?></td>
<td style="vertical-align: middle;" class="text-center"><?=$jmlah_kum?></td>
<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_penilai_lama']?></td>
<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_penilai_baru']?></td>
<td style="vertical-align: middle;" class="text-center"><?=$jmlah_kum_penilai?></td>
<td></td>
</tr>
</tbody>