<tbody>
<tr>
<td rowspan="6" class="text-center">I</td>
<td colspan="5" class="text-left">PENDIDIKAN</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td> </td>
</tr>
<tr class="text-center">
<td rowspan="3">A</td>
<td colspan="4" class="text-left">Pendidikan Formal</td>
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
$sql_a0001="select *from usulan_dupaks where dupak_no='A0001' and usulan_no='$no_usulan'";
$data_a0001=mysqli_query($koneksi,$sql_a0001);
$data_bid_a_a0001=mysqli_fetch_array($data_a0001);
$jumlah_a0001=$data_bid_a_a0001['kum_usulan_lama']+$data_bid_a_a0001['kum_usulan_baru'];
?>
<td>1</td>
<td colspan="3" class="text-left">Doktor (S3)</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0001['kum_usulan_lama'];?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0001['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?= $jumlah_a0001 ;?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0002="select *from usulan_dupaks where dupak_no='A0002' and usulan_no='$no_usulan'";
$data_a0002=mysqli_query($koneksi,$sql_a0002);
$data_bid_a_a0002=mysqli_fetch_array($data_a0002);
$jumlah_a0002=$data_bid_a_a0002['kum_usulan_lama']+$data_bid_a_a0002['kum_usulan_baru'];
?>
<tr class="text-center">

<td>2</td>
<td colspan="3" class="text-left">Magister (S2)</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0002['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0002['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0002?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<tr class="text-center">
<td rowspan="2" height="40">B</td>
<td colspan="4" class="text-left">Pendidikan dan pelatihan Prajabatan</td>
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
$sql_a0003="select *from usulan_dupaks where dupak_no='A0003' and usulan_no='$no_usulan'";
$data_a0003=mysqli_query($koneksi,$sql_a0003);
$data_bid_a_a0003=mysqli_fetch_array($data_a0003);
$jumlah_a0003=$data_bid_a_a0003['kum_usulan_lama']+$data_bid_a_a0003['kum_usulan_baru'];
?>
<td>1</td>
<td colspan="3" class="text-left">Pendidikan dan pelatihan Prajabatan golongan III</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0003['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0003['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0003?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<tr class="text-center">
<td rowspan="75">II</td>
<td colspan="5" class="text-left">PELAKSANAAN PENDIDIKAN</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="text-center">
<td rowspan="11">A</td>
<td colspan="4" rowspan="4" class="text-left">Melaksanakan perkulihan/ tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktek keguruan bengkel/studio/kebun percobaan/teknologi pengajaran dan praktek lapangan</td>
<td rowspan="4"></td>
<td rowspan="4"></td>
<td rowspan="4"></td>
<td rowspan="4"></td>
<td rowspan="4"></td>
<td rowspan="4"></td>
<td rowspan="4"></td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr height="20" style='height:15.0pt'>

</tr>	
<?php
$sql_a0004="select *from usulan_dupaks where dupak_no='A0004' and usulan_no='$no_usulan'";
$data_a0004=mysqli_query($koneksi,$sql_a0004);
$data_bid_a_a0004=mysqli_fetch_array($data_a0004);
$jumlah_a0004=$data_bid_a_a0004['kum_usulan_lama']+$data_bid_a_a0004['kum_usulan_baru'];
?>
<tr class="text-center">

<td rowspan="7">1</td>
<td colspan="3" rowspan="7" class="text-left">Melaksanakan perkuliahan/tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di Laboratorium, Praktik Keguruan Bengkel/Studio/Kebun pada Fakultas/Sekolah Tinggi/Akademi/Politeknik sendiri, pada fakultas lain dalam lingkungan Universitas/lnstitut sendiri, maupun di luar perguruan tinggi sendiri secara melembaga paling banyak 12 sks per semester</td>
<td rowspan="7" style="vertical-align: middle;"><?=$data_bid_a_a0004['kum_usulan_lama']?></td>
<td rowspan="7" style="vertical-align: middle;"><?=$data_bid_a_a0004['kum_usulan_baru']?></td>
<td rowspan="7" style="vertical-align: middle;"><?=$jumlah_a0004?></td>
<td rowspan="7" style="vertical-align: middle;"></td>
<td rowspan="7" style="vertical-align: middle;"></td>
<td rowspan="7" style="vertical-align: middle;"></td>
<td rowspan="7" style="vertical-align: middle;">

</td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr class="text-center">
<td rowspan="2">B</td>
<td colspan="4" class="text-left">Membimbing seminar</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr><?php
$sql_a0005="select *from usulan_dupaks where dupak_no='A0005' and usulan_no='$no_usulan'";
$data_a0005=mysqli_query($koneksi,$sql_a0005);
$data_bid_a_a0005=mysqli_fetch_array($data_a0005);
$jumlah_a0005=$data_bid_a_a0005['kum_usulan_lama']+$data_bid_a_a0005['kum_usulan_baru'];
?>
<tr class="text-center">

<td>1</td>
<td colspan="3" class="text-left">Membimbing mahasiswa seminar</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0005['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0005['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0005?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<tr class="text-center">
<td rowspan="4">C</td>
<td colspan="4" rowspan="2" class="text-left">Membing kuliah kerja nyata, pratek kerja nyata, praktek kerja
lapangan</td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr><?php
$sql_a0006="select *from usulan_dupaks where dupak_no='A0006' and usulan_no='$no_usulan'";
$data_a0006=mysqli_query($koneksi,$sql_a0006);
$data_bid_a_a0006=mysqli_fetch_array($data_a0006);
$jumlah_a0006=$data_bid_a_a0006['kum_usulan_lama']+$data_bid_a_a0006['kum_usulan_baru'];
?>
<tr class="text-center">

<td rowspan="2">1</td>
<td colspan="3" rowspan="2" class="text-left">Membimbing mahasiswa kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan</td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0006['kum_usulan_lama']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0006['kum_usulan_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0006?></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;">

</td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr class="text-center">
<td rowspan="12">D</td>
<td colspan="4" rowspan="2" class="text-left">Membimbing dan ikut membimbing dalam menghasilkan disertasi, thesis,
skripsi dan laporan akhir studi</td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr class="text-center">
<td rowspan="5">1</td>
<td colspan="3" class="text-left">Pembimbing utama</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr><?php
$sql_a0007="select *from usulan_dupaks where dupak_no='A0007' and usulan_no='$no_usulan'";
$data_a0007=mysqli_query($koneksi,$sql_a0007);
$data_bid_a_a0007=mysqli_fetch_array($data_a0007);
$jumlah_a0007=$data_bid_a_a0007['kum_usulan_lama']+$data_bid_a_a0007['kum_usulan_baru'];
?>
<tr class="text-center">

<td height="20">a.</td>
<td colspan="2" class="text-left">Disertasi</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0007['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0007['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0007?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0008="select *from usulan_dupaks where dupak_no='A0008' and usulan_no='$no_usulan'";
$data_a0008=mysqli_query($koneksi,$sql_a0008);
$data_bid_a_a0008=mysqli_fetch_array($data_a0008);
$jumlah_a0008=$data_bid_a_a0008['kum_usulan_lama']+$data_bid_a_a0008['kum_usulan_baru'];
?>
<tr class="text-center">

<td>b.</td>
<td colspan="2" class="text-left">Thesis</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0008['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0008['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0008?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0009="select *from usulan_dupaks where dupak_no='A0009' and usulan_no='$no_usulan'";
$data_a0009=mysqli_query($koneksi,$sql_a0009);
$data_bid_a_a0009=mysqli_fetch_array($data_a0009);
$jumlah_a0009=$data_bid_a_a0009['kum_usulan_lama']+$data_bid_a_a0009['kum_usulan_baru'];
?>
<tr class="text-center">

<td>c.</td>
<td colspan="2" class="text-left">Skripsi</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0009['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0009['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0009?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0010="select *from usulan_dupaks where dupak_no='A0010' and usulan_no='$no_usulan'";
$data_a0010=mysqli_query($koneksi,$sql_a0010);
$data_bid_a_a0010=mysqli_fetch_array($data_a0010);
$jumlah_a0010=$data_bid_a_a0010['kum_usulan_lama']+$data_bid_a_a0010['kum_usulan_baru'];
?>
<tr class="text-center">

<td>d.</td>
<td colspan="2" class="text-left">Laporan Akhir</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0010['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0010['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0010?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<tr class="text-center">
<td rowspan="5">2</td>
<td colspan="3" class="text-left">Pembimbing pendamping/ pembantu</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_a0011="select *from usulan_dupaks where dupak_no='A0011' and usulan_no='$no_usulan'";
$data_a0011=mysqli_query($koneksi,$sql_a0011);
$data_bid_a_a0011=mysqli_fetch_array($data_a0011);
$jumlah_a0011=$data_bid_a_a0011['kum_usulan_lama']+$data_bid_a_a0011['kum_usulan_baru'];
?>
<tr class="text-center">

<td>a.</td>
<td colspan="2" class="text-left">Disertasi</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0011['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0011['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0011?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0012="select *from usulan_dupaks where dupak_no='A0012' and usulan_no='$no_usulan'";
$data_a0012=mysqli_query($koneksi,$sql_a0012);
$data_bid_a_a0012=mysqli_fetch_array($data_a0012);
$jumlah_a0012=$data_bid_a_a0012['kum_usulan_lama']+$data_bid_a_a0012['kum_usulan_baru'];
?>
<tr class="text-center">


<td>b.</td>
<td colspan="2" class="text-left">Thesis</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0012['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0012['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0012?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0013="select *from usulan_dupaks where dupak_no='A0013' and usulan_no='$no_usulan'";
$data_a0013=mysqli_query($koneksi,$sql_a0013);
$data_bid_a_a0013=mysqli_fetch_array($data_a0013);
$jumlah_a0013=$data_bid_a_a0013['kum_usulan_lama']+$data_bid_a_a0013['kum_usulan_baru'];
?>
<tr class="text-center">

<td>c.</td>
<td colspan="2" class="text-left">Skripsi</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0013['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0013['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0013?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0014="select *from usulan_dupaks where dupak_no='A0014' and usulan_no='$no_usulan'";
$data_a0014=mysqli_query($koneksi,$sql_a0014);
$data_bid_a_a0014=mysqli_fetch_array($data_a0014);
$jumlah_a0014=$data_bid_a_a0014['kum_usulan_lama']+$data_bid_a_a0014['kum_usulan_baru'];
?>
<tr class="text-center">

<td>d.</td>
<td colspan="2" class="text-left">Laporan Akhir</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0014['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0014['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0014?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<tr class="text-center">
<td rowspan="3">E</td>
<td colspan="4" class="text-left">Bertugas sebagai penguji pada ujian akhir</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_a0015="select *from usulan_dupaks where dupak_no='A0015' and usulan_no='$no_usulan'";
$data_a0015=mysqli_query($koneksi,$sql_a0015);
$data_bid_a_a0015=mysqli_fetch_array($data_a0015);
$jumlah_a0015=$data_bid_a_a0015['kum_usulan_lama']+$data_bid_a_a0015['kum_usulan_baru'];
?>
<tr class="text-center">

<td>1</td>
<td colspan="3" class="text-left">Ketua penguji</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0015['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0015['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0015?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0016="select *from usulan_dupaks where dupak_no='A0016' and usulan_no='$no_usulan'";
$data_a0016=mysqli_query($koneksi,$sql_a0016);
$data_bid_a_a0016=mysqli_fetch_array($data_a0016);
$jumlah_a0016=$data_bid_a_a0016['kum_usulan_lama']+$data_bid_a_a0016['kum_usulan_baru'];
?>
<tr class="text-center">

<td>2</td>
<td colspan="3" class="text-left">Anggota penguji</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0016['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0016['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0016?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<tr class="text-center">
<td rowspan="3">F</td>
<td colspan="4" class="text-left">Membina kegiatan mahasiswa</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_a0017="select *from usulan_dupaks where dupak_no='A0017' and usulan_no='$no_usulan'";
$data_a0017=mysqli_query($koneksi,$sql_a0017);
$data_bid_a_a0017=mysqli_fetch_array($data_a0017);
$jumlah_a0017=$data_bid_a_a0017['kum_usulan_lama']+$data_bid_a_a0017['kum_usulan_baru'];
?>
<tr class="text-center">

<td rowspan="2">1</td>
<td colspan="3" rowspan="2" class="text-left">Melakukan pembinaan kegiatan mahasiswa di bidang Akademik dan kemahasiswaan</td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0017['kum_usulan_lama']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0017['kum_usulan_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0017?></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;">

</td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr class="text-center">
<td rowspan="2">G</td>
<td colspan="4" class="text-left">Mengembangkan program kuliah</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_a0018="select *from usulan_dupaks where dupak_no='A0018' and usulan_no='$no_usulan'";
$data_a0018=mysqli_query($koneksi,$sql_a0018);
$data_bid_a_a0018=mysqli_fetch_array($data_a0018);
$jumlah_a0018=$data_bid_a_a0018['kum_usulan_lama']+$data_bid_a_a0018['kum_usulan_baru'];
?>
<tr class="text-center">

<td>1</td>
<td colspan="3" class="text-left">Melakukan kegiatan pengembangan program kuliah</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0018['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0018['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0018?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<tr class="text-center">
<td rowspan="4">H</td>
<td colspan="4" class="text-left">Mengembangkan bahan pengajaran</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_a0019="select *from usulan_dupaks where dupak_no='A0019' and usulan_no='$no_usulan'";
$data_a0019=mysqli_query($koneksi,$sql_a0019);
$data_bid_a_a0019=mysqli_fetch_array($data_a0019);
$jumlah_a0019=$data_bid_a_a0019['kum_usulan_lama']+$data_bid_a_a0019['kum_usulan_baru'];
?>
<tr class="text-center">

<td>1</td>
<td colspan="3" class="text-left">Buku ajar</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0019['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0019['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0019?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0020="select *from usulan_dupaks where dupak_no='A0020' and usulan_no='$no_usulan'";
$data_a0020=mysqli_query($koneksi,$sql_a0020);
$data_bid_a_a0020=mysqli_fetch_array($data_a0020);
$jumlah_a0020=$data_bid_a_a0020['kum_usulan_lama']+$data_bid_a_a0020['kum_usulan_baru'];
?>
<tr class="text-center">

<td rowspan="2">2</td>
<td colspan="3" rowspan="2" class="text-left">Diktat, modul, petunjuk praktikum, model, alat bantu, audio visual, naskah tutorial</td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0020['kum_usulan_lama']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0020['kum_usulan_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0020?></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;">

</td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr class="text-center">
<td rowspan="3">I</td>
<td colspan="4" class="text-left">Menyampaikan orasi ilmiah</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_a0021="select *from usulan_dupaks where dupak_no='A0021' and usulan_no='$no_usulan'";
$data_a0021=mysqli_query($koneksi,$sql_a0021);
$data_bid_a_a0021=mysqli_fetch_array($data_a0021);
$jumlah_a0021=$data_bid_a_a0021['kum_usulan_lama']+$data_bid_a_a0021['kum_usulan_baru'];
?>
<tr class="text-center">

<td rowspan="2">1</td>
<td colspan="3" rowspan="2" class="text-left">Melakukan kegiatan orasi ilmiah pada perguruan tinggi tiap tahun</td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0021['kum_usulan_lama']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0021['kum_usulan_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0021?></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;">

</td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr class="text-center">
<td rowspan="14">J</td>
<td colspan="4" class="text-left">Menduduki jabatan pimpinan perguruan tinggi</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_a0022="select *from usulan_dupaks where dupak_no='A0022' and usulan_no='$no_usulan'";
$data_a0022=mysqli_query($koneksi,$sql_a0022);
$data_bid_a_a0022=mysqli_fetch_array($data_a0022);
$jumlah_a0022=$data_bid_a_a0022['kum_usulan_lama']+$data_bid_a_a0022['kum_usulan_baru'];
?>
<tr class="text-center">

<td height="20">1</td>
<td colspan="3" class="text-left">Rektor</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0022['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0022['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0022?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0023="select *from usulan_dupaks where dupak_no='A0023' and usulan_no='$no_usulan'";
$data_a0023=mysqli_query($koneksi,$sql_a0023);
$data_bid_a_a0023=mysqli_fetch_array($data_a0023);
$jumlah_a0023=$data_bid_a_a0023['kum_usulan_lama']+$data_bid_a_a0023['kum_usulan_baru'];
?>
<tr class="text-center">

<td height="20">2</td>
<td colspan="3" class="text-left">Pembantu rektor/dekan/direktur program pasca sarjana</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0023['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0023['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0023?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0024="select *from usulan_dupaks where dupak_no='A0024' and usulan_no='$no_usulan'";
$data_a0024=mysqli_query($koneksi,$sql_a0024);
$data_bid_a_a0024=mysqli_fetch_array($data_a0024);
$jumlah_a0024=$data_bid_a_a0024['kum_usulan_lama']+$data_bid_a_a0024['kum_usulan_baru'];
?>
<tr class="text-center">

<td rowspan="2">3</td>
<td colspan="3" rowspan="2" class="text-left">Ketua sekolah tinggi/pembantu dekan/asisten direktur program pasca sarjana/direktur politeknik</td>
<td rowspan="2"style="vertical-align: middle;"><?=$data_bid_a_a0024['kum_usulan_lama']?></td>
<td rowspan="2"style="vertical-align: middle;"><?=$data_bid_a_a0024['kum_usulan_baru']?></td>
<td rowspan="2"style="vertical-align: middle;"><?=$jumlah_a0024?></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;">

</td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<?php
$sql_a0025="select *from usulan_dupaks where dupak_no='A0025' and usulan_no='$no_usulan'";
$data_a0025=mysqli_query($koneksi,$sql_a0025);
$data_bid_a_a0025=mysqli_fetch_array($data_a0025);
$jumlah_a0025=$data_bid_a_a0025['kum_usulan_lama']+$data_bid_a_a0025['kum_usulan_baru'];
?>
<tr class="text-center">

<td>4</td>
<td colspan="3" class="text-left">Pembantu ketua sekolah tinggi/pembantu direktur politeknik</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0025['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0025['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0025?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0026="select *from usulan_dupaks where dupak_no='A0026' and usulan_no='$no_usulan'";
$data_a0026=mysqli_query($koneksi,$sql_a0026);
$data_bid_a_a0026=mysqli_fetch_array($data_a0026);
$jumlah_a0026=$data_bid_a_a0026['kum_usulan_lama']+$data_bid_a_a0026['kum_usulan_baru'];
?>
<tr class="text-center">

<td height="20">5</td>
<td colspan="3" class="text-left">Direktur akademi</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0026['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0026['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0026?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0027="select *from usulan_dupaks where dupak_no='A0027' and usulan_no='$no_usulan'";
$data_a0027=mysqli_query($koneksi,$sql_a0027);
$data_bid_a_a0027=mysqli_fetch_array($data_a0027);
$jumlah_a0027=$data_bid_a_a0027['kum_usulan_lama']+$data_bid_a_a0027['kum_usulan_baru'];
?>
<tr class="text-center">

<td rowspan="2">6</td>
<td colspan="3" rowspan="2" class="text-left">Pembantu direktur akademi/ketua jurusan/bagian pada Universitas/institut/sekolah tinggi</td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0027['kum_usulan_lama']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0027['kum_usulan_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0027?></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;">

</td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<?php
$sql_a0028="select *from usulan_dupaks where dupak_no='A0028' and usulan_no='$no_usulan'";
$data_a0028=mysqli_query($koneksi,$sql_a0028);
$data_bid_a_a0028=mysqli_fetch_array($data_a0028);
$jumlah_a0028=$data_bid_a_a0028['kum_usulan_lama']+$data_bid_a_a0028['kum_usulan_baru'];
?>
<tr class="text-center">

<td rowspan="2">7</td>
<td colspan="3" rowspan="2" class="text-left">Ketua jurusan pada politeknik/akademi/sekretaris jurusan /bagian pada universitas/ institut/ sekolah tinggi</td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0028['kum_usulan_lama']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0028['kum_usulan_baru']?></td>
<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0028?></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;"></td>
<td rowspan="2" style="vertical-align: middle;">

</td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<?php
$sql_a0029="select *from usulan_dupaks where dupak_no='A0029' and usulan_no='$no_usulan'";
$data_a0029=mysqli_query($koneksi,$sql_a0029);
$data_bid_a_a0029=mysqli_fetch_array($data_a0029);
$jumlah_a0029=$data_bid_a_a0029['kum_usulan_lama']+$data_bid_a_a0029['kum_usulan_baru'];
?>
<tr class="text-center">

<td rowspan="3">8</td>
<td colspan="3" rowspan="3" class="text-left">Sekretaris jurusan pada politeknik/akademik dan kepala laboratorium universitas/institut/ sekolah tinggi / politeknik/ akademi</td>
<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_a_a0029['kum_usulan_lama']?></td>
<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_a_a0029['kum_usulan_baru']?></td>
<td rowspan="3" style="vertical-align: middle;"><?=$jumlah_a0029?></td>
<td rowspan="3" style="vertical-align: middle;"></td>
<td rowspan="3" style="vertical-align: middle;"></td>
<td rowspan="3" style="vertical-align: middle;"></td>
<td rowspan="3" style="vertical-align: middle;">

</td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<tr class="text-center">
<td rowspan="3">K</td>
<td colspan="4" class="text-left">Membimbing Akademik Dosen yang lebih rendah jabatannya</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
$sql_a0030="select *from usulan_dupaks where dupak_no='A0030' and usulan_no='$no_usulan'";
$data_a0030=mysqli_query($koneksi,$sql_a0030);
$data_bid_a_a0030=mysqli_fetch_array($data_a0030);
$jumlah_a0030=$data_bid_a_a0030['kum_usulan_lama']+$data_bid_a_a0030['kum_usulan_baru'];
?>
<tr class="text-center">

<td>1</td>
<td colspan="3" class="text-left">Pembimbing pencangkokan</td>
<td  style="vertical-align: middle;"><?=$data_bid_a_a0030['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0030['kum_usulan_baru']?></td>
<td  style="vertical-align: middle;"><?=$jumlah_a0030?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0031="select *from usulan_dupaks where dupak_no='A0031' and usulan_no='$no_usulan'";
$data_a0031=mysqli_query($koneksi,$sql_a0031);
$data_bid_a_a0031=mysqli_fetch_array($data_a0031);
$jumlah_a0031=$data_bid_a_a0031['kum_usulan_lama']+$data_bid_a_a0031['kum_usulan_baru'];
?>
<tr class="text-center">

<td>2</td>
<td colspan="3" class="text-left">Reguler</td>
<td  style="vertical-align: middle;"><?=$data_bid_a_a0031['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0031['kum_usulan_baru']?></td>
<td  style="vertical-align: middle;"><?=$jumlah_a0031?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<tr class="text-center">
<td rowspan="4">L</td>
<td colspan="4" rowspan="2" class="text-left">Melaksanakan kegiatan Detasering dan pencangkokan Akademik Dosen</td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>

<?php
$sql_a0032="select *from usulan_dupaks where dupak_no='A0032' and usulan_no='$no_usulan'";
$data_a0032=mysqli_query($koneksi,$sql_a0032);
$data_bid_a_a0032=mysqli_fetch_array($data_a0032);
$jumlah_a0032=$data_bid_a_a0032['kum_usulan_lama']+$data_bid_a_a0032['kum_usulan_baru'];
?>
<tr class="text-center">

<td>1</td>
<td colspan="3" class="text-left">Detasering</td>
<td  style="vertical-align: middle;"><?=$data_bid_a_a0032['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0032['kum_usulan_baru']?></td>
<td  style="vertical-align: middle;"><?=$jumlah_a0032?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0033="select *from usulan_dupaks where dupak_no='A0033' and usulan_no='$no_usulan'";
$data_a0033=mysqli_query($koneksi,$sql_a0033);
$data_bid_a_a0033=mysqli_fetch_array($data_a0033);
$jumlah_a0033=$data_bid_a_a0033['kum_usulan_lama']+$data_bid_a_a0033['kum_usulan_baru'];
?>
<tr class="text-center">

<td>2</td>
<td colspan="3" class="text-left">Pencangkokan</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0033['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0033['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0033?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<tr class="text-center">
<td rowspan="9">M</td>
<td colspan="4" rowspan="2" class="text-left">Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi</td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
<td rowspan="2"></td>
</tr>
<tr height="20" style='height:15.0pt'>

</tr>
<?php
$sql_a0034="select *from usulan_dupaks where dupak_no='A0034' and usulan_no='$no_usulan'";
$data_a0034=mysqli_query($koneksi,$sql_a0034);
$data_bid_a_a0034=mysqli_fetch_array($data_a0034);
$jumlah_a0034=$data_bid_a_a0034['kum_usulan_lama']+$data_bid_a_a0034['kum_usulan_baru'];
?>
<tr class="text-center">

<td>1.</td>
<td colspan="3" class="text-left">Lamanya lebih dari 960 jam</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0034['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0034['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0034?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">


</td>
</tr>
<?php
$sql_a0035="select *from usulan_dupaks where dupak_no='A0035' and usulan_no='$no_usulan'";
$data_a0035=mysqli_query($koneksi,$sql_a0035);
$data_bid_a_a0035=mysqli_fetch_array($data_a0035);
$jumlah_a0035=$data_bid_a_a0035['kum_usulan_lama']+$data_bid_a_a0035['kum_usulan_baru'];
?>
<tr class="text-center">

<td>2.</td>
<td colspan="3" class="text-left">Lamanya 641-960 jam</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0035['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0035['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0035?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0036="select *from usulan_dupaks where dupak_no='A0036' and usulan_no='$no_usulan'";
$data_a0036=mysqli_query($koneksi,$sql_a0036);
$data_bid_a_a0036=mysqli_fetch_array($data_a0036);
$jumlah_a0036=$data_bid_a_a0036['kum_usulan_lama']+$data_bid_a_a0036['kum_usulan_baru'];
?>
<tr class="text-center">

<td>3.</td>
<td colspan="3" class="text-left">Lamanya 481-640 jam</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0036['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0036['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0036?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0037="select *from usulan_dupaks where dupak_no='A0037' and usulan_no='$no_usulan'";
$data_a0037=mysqli_query($koneksi,$sql_a0037);
$data_bid_a_a0037=mysqli_fetch_array($data_a0037);
$jumlah_a0037=$data_bid_a_a0037['kum_usulan_lama']+$data_bid_a_a0037['kum_usulan_baru'];
?>
<tr class="text-center">

<td>4.</td>
<td colspan="3" class="text-left">Lamanya 161-480 jam</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0037['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0037['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0037?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0038="select *from usulan_dupaks where dupak_no='A0038' and usulan_no='$no_usulan'";
$data_a0038=mysqli_query($koneksi,$sql_a0038);
$data_bid_a_a0038=mysqli_fetch_array($data_a0038);
$jumlah_a0038=$data_bid_a_a0038['kum_usulan_lama']+$data_bid_a_a0038['kum_usulan_baru'];
?>
<tr class="text-center">

<td>5.</td>
<td colspan="3" class="text-left">Lamanya 81- 160 jam</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0038['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0038['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0038?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0039="select *from usulan_dupaks where dupak_no='A0039' and usulan_no='$no_usulan'";
$data_a0039=mysqli_query($koneksi,$sql_a0039);
$data_bid_a_a0039=mysqli_fetch_array($data_a0039);
$jumlah_a0039=$data_bid_a_a0039['kum_usulan_lama']+$data_bid_a_a0039['kum_usulan_baru'];
?>
<tr class="text-center">

<td>6.</td>
<td colspan="3" class="text-left">Lamanya 31-80 jam</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0039['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0039['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0039?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_a0040="select *from usulan_dupaks where dupak_no='A0040' and usulan_no='$no_usulan'";
$data_a0040=mysqli_query($koneksi,$sql_a0040);
$data_bid_a_a0040=mysqli_fetch_array($data_a0040);
$jumlah_a0040=$data_bid_a_a0040['kum_usulan_lama']+$data_bid_a_a0040['kum_usulan_baru'];
?>
<tr class="text-center">

<td>7.</td>
<td colspan="3" class="text-left">Lamanya 10-30 jam</td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0040['kum_usulan_lama']?></td>
<td style="vertical-align: middle;"><?=$data_bid_a_a0040['kum_usulan_baru']?></td>
<td style="vertical-align: middle;"><?=$jumlah_a0040?></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;"></td>
<td style="vertical-align: middle;">

</td>
</tr>
<?php
$sql_total="select *from usulan_dupaks where  usulan_no='$no_usulan' and left(dupak_no,1)='A'";
$data_total=mysqli_query($koneksi,$sql_total);
while($data_kum_total=mysqli_fetch_array($data_total))
{
$jml_kum_lama+=$data_kum_total['kum_usulan_lama'];
$jml_kum_baru+=$data_kum_total['kum_usulan_baru'];
}
$total_bid_a=$jml_kum_lama+$jml_kum_baru;
?>
<tr style="background-color: #e4e4e4; font-weight: bold;">

<td></td>
<td colspan="5" class="text-right"><b>JUMLAH BIDANG A</b></td>
<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_lama?></td>
<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_baru?></td>
<td style="vertical-align: middle;" class="text-center"><?=$total_bid_a?></td>
<td style="vertical-align: middle;" class="text-center"></td>
<td style="vertical-align: middle;" class="text-center"></td>
<td style="vertical-align: middle;" class="text-center"></td>
<td></td>
</tr>
</tbody>