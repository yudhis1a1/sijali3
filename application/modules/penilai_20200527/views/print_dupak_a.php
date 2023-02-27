<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRINT DUPAK BIDANG A |  LLDikti Wilayah III</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Favicon -->
    <link type="image/x-icon" href="<?= base_url()?>assets/images/favicon.ico" rel="shortcut icon">
    <link rel="canonical" href="" itemprop="url">
    
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/vali-admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/vali-admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/semantic/css/tables.css">
    <!-- Semantic UI CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/semantic/semantic.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/semantic/fontawesome-5.1.1/css/all.css" crossorigin="anonymous">
    <script src="<?= base_url()?>assets/vali-admin/js/jquery-3.2.1.min.js"></script>
	
	
  </head>
  <body class="app sidebar-mini rtl pace-done sidenav-toggled">
    <main class="app-content">
      <div class="bs-component">
        <div class="tab-content" id="myTabContent">
          <div class="ui tab-pane fade active show" id="first">
		
<!---------------------------batas awal konten-------------------------------------------->
<div class="row">
  <div class="col-md-12">
      <div class="tile">

      	<h3 class="text-center">SURAT PERNYATAAN<br>MELAKSANAKAN KEGIATAN PENDIDIKAN DAN PENGAJARAN</h3>

      	<div class="clearfix">&nbsp;</div>

      	<div class="table-responsive">
      		<table id="table-header">

      			<col width="150"/>
				<col width="10" />
				<col width="350"/>
				<?php
			
				$query_pimpinan="SELECT
								  a.`pimpinan_nama`,
								  a.`pimpinan_nip`,
								  a.`pimpinan_nidn`,
								  b.`nama`,
								  b.`kode_gol`,
								  a.`pimpinan_jabatan`,
								  a.`pimpinan_unit_kerja`
								FROM
								  usulans AS a,
								  `golongans` AS b
								WHERE a.`no` = '$no_usulan'
								AND a.`pimpinan_golongan_kode`=b.`kode`";
				$data_pim=mysqli_query($koneksi,$query_pimpinan);
				$row_pim=mysqli_fetch_array($data_pim);
				?>
      			<tbody>
                              <tr>
                                    <td colspan="3">Yang Bertanda Tangan Dibawah Ini :<br>&nbsp;</td>
                              </tr>
                              <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?=$row_pim['pimpinan_nama']?> </td>
                              </tr>
                              <tr>
                                    <td>NIK/NIP/NIDN</td>
                                    <td>:</td>
                                    <td><?=$row_pim['pimpinan_nip']?> / <?=$row_pim['pimpinan_nidn']?> </td>
                              </tr>
							  
                              <tr>
                                    <td>Pangkat/Golongan</td>
                                    <td>:</td>
                                    <td><?=$row_pim['nama']?> / <?=$row_pim['kode_gol']?></td>
                              </tr>
                              <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td><?=$row_pim['pimpinan_jabatan']?></td>
                              </tr>
                              <tr>
                                    <td>Unit Kerja</td>
                                    <td>:</td>
                                    <td><?=$row_pim['pimpinan_unit_kerja']?></td>
                              </tr>
                              <tr>
                                    <td colspan="3"><br>Menyatakan Bahwa :<br>&nbsp;</td>
                              </tr>
							  <?php
							
								$query_dosens="SELECT
												  b.`no`,
												  b.`nama`,
												  b.`gelar_belakang`,
												  b.`nip`,
												  b.`nidn`,
												  c.`nama_prodi`,
												  d.`nama_instansi`
												FROM
												  usulans AS a,
												  dosens AS b,
												  `prodis` AS c,
												  `instansis` AS d
												WHERE a.`no` = '$no_usulan'
												AND a.`dosen_no`=b.`no`
												AND b.`prodi_kode`=c.`kode`
												AND c.`instansi_kode`=d.`kode`";
								$data_dos=mysqli_query($koneksi,$query_dosens);
								$row_dos=mysqli_fetch_array($data_dos);
								?>
      				<tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?=$row_dos['nama']?>, <?=$row_dos['gelar_belakang']?></td>
                              </tr>
                              <tr>
                                    <td>NIK/NIP/NIDN</td>
                                    <td>:</td>
                                    <td><?=$row_dos['nip']?> / <?=$row_dos['nidn']?></td>
                              </tr>
							  <?php
							
								$q_cari_gol="SELECT
											  a.`no`,
											  a.`golongan_kode`,
											  b.`nama`,
											  b.`kode_gol`
											FROM
											  dosens AS a,
											  `golongans` AS b
											WHERE a.`no` = '$row_dos[no]'
											  AND a.`golongan_kode` = b.`kode`";
								$dq_cari_gol=mysqli_query($koneksi,$q_cari_gol);
								$rdq_cari_gol=mysqli_fetch_array($dq_cari_gol);
								?>
                              <tr>
                                    <td>Pangkat/Golongan</td>
                                    <td>:</td>
                                    <td><?=$rdq_cari_gol['nama']?> / <?=$rdq_cari_gol['kode_gol']?></td>
                              </tr>
							  <?php
							
								$q_cari_jab="SELECT
											  a.`no`,
											  c.`nama_jabatans`,
											  d.`nama_jenjang`,
											  a.`jabatan_tgl`
											FROM
											  dosens AS a,
											  `jabatan_jenjangs` AS b,
											  `jabatans` AS c,
											  `jenjangs` AS d
											WHERE a.`no` = '$row_dos[no]'
											  AND a.`jabatan_no` = b.`no`
											  AND b.`jabatan_kode`=c.`kode`
											  AND b.`jenjang_id`=d.`id`";
								$dq_cari_jab=mysqli_query($koneksi,$q_cari_jab);
								$rdq_cari_jab=mysqli_fetch_array($dq_cari_jab);
								?>
                              <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td><?=$rdq_cari_jab['nama_jabatans']?>, <?=$rdq_cari_jab['jabatan_tgl']?></td>
                              </tr>
                              <tr>
                                    <td>Unit Kerja</td>
                                    <td>:</td>
                                    <td>Program Studi <?=$row_dos['nama_prodi']?> Pada <?=$row_dos['nama_instansi']?></td>
                              </tr>
                              <tr>
                                    <td colspan="3"><br>Telah Melaksanakan Pendidikan Dan Pengajaran Sebagai Berikut :</td>
                              </tr>
      			</tbody>
      		</table>
      	</div>

            <div class="clearfix">&nbsp;</div>

            <div class="table-responsive">
                  <table id="table-bidang" class="cust-table cust-table-bordered">

                        <col width="30" />
                        <col width="300" />
                        <col width="200" />
                        <col width="90" />
                        <col width="90" />
                        <col width="90" />
                        <col width="90" />
                        <col width="90" />

                        <thead>
                              <tr class="text-center">
                                    <th class="text-center" style="vertical-align: middle;">No</th>
                                    <th colspan="2" class="text-center" style="vertical-align: middle;">Uraian Kegiatan</th>
                                    <th class="text-center" style="vertical-align: middle;">Tanggal</th>
                                    <th class="text-center" style="vertical-align: middle;">Satuan<br>Hasil</th>
                                    <th class="text-center" style="vertical-align: middle;">Jumlah<br>Volume<br>Kegiatan</th>
                                    <th class="text-center" style="vertical-align: middle;">Jumlah<br>Angka<br>Kredit</th>
                                    <th class="text-center" style="vertical-align: middle;">Keterangan/<br>Bukti Fisik</th>
                              </tr>
                              <tr class="text-center">
                                    <th class="text-center" style="vertical-align: middle;">1</th>
                                    <th colspan="2" class="text-center" style="vertical-align: middle;">2</th>
                                    <th class="text-center" style="vertical-align: middle;">3</th>
                                    <th class="text-center" style="vertical-align: middle;">4</th>
                                    <th class="text-center" style="vertical-align: middle;">5</th>
                                    <th class="text-center" style="vertical-align: middle;">6</th>
                                    <th class="text-center" style="vertical-align: middle;">7</th>
                              </tr>
                        </thead>
                        <tbody style="vertical-align: top;">
                              <tr>
                                    <td class="text-center">I</td>
                                    <td colspan="7"><strong>PENDIDIKAN</strong></td>
                              </tr>
                              <tr>
                                    <td class="text-center">A</td>
                                    <td colspan="2"><strong>Pendidikan Formal</strong></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                              </tr>
                              <?php
							
								$a0001="SELECT
										  b.`tgl`,
										  b.`satuan_hasil`,
										  b.`jumlah_volume`,
										  a.`kum_usulan_baru`,
										  b.`keterangan`
										FROM
										   `usulan_dupaks` AS a,
										  `usulan_dupak_details` AS b
										WHERE 
										a.`usulan_no`='$no_usulan'
										AND a.dupak_no='a0001'
										AND a.`dupak_no`=b.`dupak_no`
										GROUP BY b.`dupak_no`";
								$d_a0001=mysqli_query($koneksi,$a0001);
								$r_a0001=mysqli_fetch_array($d_a0001);
							   ?>
                              <tr>
                                    <td></td>
                                    <td class="text-center">1</td>
                                    <td>Doktor (S3)</td>
                                    <td class="text-center"><?=$r_a0001['tgl']?></td>
                                    <td class="text-center"><?=$r_a0001['satuan_hasil']?></td>
                                    <td class="text-center"><?=$r_a0001['jumlah_volume']?></td>
                                    <td class="text-center"><?=$r_a0001['kum_usulan_baru']?></td>
                                    <td class="text-center"><?=$r_a0001['keterangan']?></td>
                              </tr>
							  <?php
							
								$a0002="SELECT
										  b.`tgl`,
										  b.`satuan_hasil`,
										  b.`jumlah_volume`,
										  a.`kum_usulan_baru`,
										  b.`keterangan`
										FROM
										   `usulan_dupaks` AS a,
										  `usulan_dupak_details` AS b
										WHERE 
										a.`usulan_no`='$no_usulan'
										AND a.dupak_no='a0002'
										AND a.`dupak_no`=b.`dupak_no`
										GROUP BY b.`dupak_no`";
								$d_a0002=mysqli_query($koneksi,$a0002);
								$r_a0002=mysqli_fetch_array($d_a0002);
							   ?>
                              <tr>
                                    <td></td>
                                    <td class="text-center">2</td>
                                    <td>Magister (S2)</td>
                                    <td class="text-center"><?=$r_a0002['tgl']?></td>
                                    <td class="text-center"><?=$r_a0002['satuan_hasil']?></td>
                                    <td class="text-center"><?=$r_a0002['jumlah_volume']?></td>
                                    <td class="text-center"><?=$r_a0002['kum_usulan_baru']?></td>
                                    <td class="text-center"><?=$r_a0002['keterangan']?></td>
                              </tr>
                              <tr>
                                    <td class="text-center">B</td>
                                    <td colspan="2"><strong>Pendidikan Dan Pelatihan Prajabatan</strong></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                              </tr>
							  <?php
							
								$a0003="SELECT
										  b.`tgl`,
										  b.`satuan_hasil`,
										  b.`jumlah_volume`,
										  a.`kum_usulan_baru`,
										  b.`keterangan`
										FROM
										   `usulan_dupaks` AS a,
										  `usulan_dupak_details` AS b
										WHERE 
										a.`usulan_no`='$no_usulan'
										AND a.dupak_no='a0003'
										AND a.`dupak_no`=b.`dupak_no`
										GROUP BY b.`dupak_no`";
								$d_a0003=mysqli_query($koneksi,$a0003);
								$r_a0003=mysqli_fetch_array($d_a0003);
							   ?>
                              <tr>
                                    <td></td>
                                    <td class="text-center">1</td>
                                    <td>Pendidikan & Pelatihan Prajabatan Golongan III</td>
                                    <td class="text-center"><?=$r_a0003['tgl']?></td>
                                    <td class="text-center"><?=$r_a0003['satuan_hasil']?></td>
                                    <td class="text-center"><?=$r_a0003['jumlah_volume']?></td>
                                    <td class="text-center"><?=$r_a0003['kum_usulan_baru']?></td>
                                    <td class="text-center"><?=$r_a0003['keterangan']?></td>
                              </tr>
							  <?php
							  
								$sub_a123="SELECT
											 NO,
											 `usulan_no`,
											 `dupak_no`, 
											 (`kum_usulan_lama`+`kum_usulan_baru`) AS kum_total
											FROM
											   `usulan_dupaks` 
											WHERE 
											`usulan_no`='$no_usulan'
											AND `dupak_no` IN('a0001','a0002','a0003')";
								$d_a123=mysqli_query($koneksi,$sub_a123);
								while($r_a123=mysqli_fetch_array($d_a123))
								{ 
									$sub_total123+=$r_a123['kum_total']; 
								}
							  ?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$sub_total123?></td>
                                    <td></td>
                              </tr>
							  <tr>
                                    <td class="text-center">II</td>
                                    <td colspan="7"><strong>PELAKSANAAN PENDIDIKAN</strong></td>
                              </tr>
                              <tr>
                                    <td class="text-center">A</td>
                                    <td colspan="7"><strong>Melaksanakan Perkuliahan/ Tutorial & Membimbing, Menguji Serta Menyelenggarakan Pendidikan Di Laboratorium, Praktek Keguruan Bengkel/Studio/Kebun Percobaan/Teknologi Pengajaran & Praktek Lapangan</strong></td>
                              </tr>
								<?php
								  
								    $no=1;
									$q_a0004="SELECT
												`semester`,
												`tahun_akademik`,
												`tahun_akademik`+1 AS thn_akademik_maju
												FROM
												   `usulan_dupak_details` 
												WHERE 
												`usulan_no`='$no_usulan'
												AND `dupak_no`='a0004'
												GROUP BY `berkas` order by tahun_akademik asc";
									$d_a0004=mysqli_query($koneksi,$q_a0004);
									while($r_a0004=mysqli_fetch_array($d_a0004))
									{ 
								  ?>
								<tr>
									  <td class="text-center"><?=$no?></td>
									  <td colspan="6" style="background-color: #e4e4e4; font-weight: bold;">Semester <?=$r_a0004['semester']?> <?=$r_a0004['tahun_akademik']?>/<?=$r_a0004['thn_akademik_maju']?>
									  </td>
									  
									  <?php
									  $total_sks=0;
									  $q1="SELECT
											  no,
											  `uraian`,
											  `semester`,
											  `tahun_akademik`,
											   `sks`,
											  `jumlah_volume`,
											  (sks*jumlah_volume) AS total_sks
											  FROM
											 `usulan_dupak_details`
											WHERE usulan_no = '$no_usulan'
											  AND `dupak_no` = 'a0004'
											  AND semester='$r_a0004[semester]'
											  AND tahun_akademik='$r_a0004[tahun_akademik]'";
										$data_q1=mysqli_query($koneksi,$q1);
										while($row=mysqli_fetch_array($data_q1))
											{	$total_sks+=$row['total_sks']; }
												if($total_sks<11)
												{
													$total_angka_kredit=$total_sks/2;
												}elseif ($total_sks<12)
												{
													$total_angka_kredit=(10*0.5)+(($total_sks-10)*0.25);
												}else
												{
													$total_angka_kredit=5.5;
												}
											
										?>
									  
									  <td style="background-color: #e4e4e4; font-weight: bold;"></td>
									  
								</tr>
									<?php
									$q_matkul="SELECT
												`uraian`,
												`tgl`,
												satuan_hasil,
												`jumlah_volume`,
												`semester`,
												`tahun_akademik`,
												keterangan
												FROM
												   `usulan_dupak_details` 
												WHERE 
												`usulan_no`='$no_usulan'
												AND `dupak_no`='a0004'
												AND semester='$r_a0004[semester]'
												AND `tahun_akademik`='$r_a0004[tahun_akademik]'";
									$d_matkul=mysqli_query($koneksi,$q_matkul);
									while($r_matkul=mysqli_fetch_array($d_matkul))
									{
									?>
								<tr>
									<td></td>
									<td colspan="2"><?=$r_matkul['uraian']?> </td>
									<td class="text-center"><?=$r_matkul['tgl']?></td>
									<td class="text-center"><?=$r_matkul['satuan_hasil']?></td>
									<td class="text-center"><?=$r_matkul['jumlah_volume']?></td>
									<td></td>
									<td class="text-center"><?=$r_matkul['keterangan']?></td>
								</tr>
								<?php
									}
								?>
								<tr>
									<td></td>
									<td colspan="5" style="font-weight: bold;">Total Angka Kredit</td>
									<td class="text-center" style="font-weight: bold;"><?=$total_angka_kredit?></td>
									<td></td>
								</tr>
								<?php
								$no++;
								}
										
								$total_a0004="SELECT
											  no,
											  `usulan_no`,
											  `dupak_no`,
											  (
												`kum_usulan_lama` + `kum_usulan_baru`
											  ) AS kum_total
											FROM
											  `usulan_dupaks`
											WHERE `usulan_no` = '$no_usulan'
											  AND `dupak_no` ='a0004'";
								$d_total_a0004=mysqli_query($koneksi,$total_a0004);
								$r_total_a0004=mysqli_fetch_array($d_total_a0004);
								?>
							  <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$r_total_a0004['kum_total']?></td>
                                    <td></td>
                              </tr>
							  <?php
								$no=1;
								$a0005="select *from usulan_dupak_details where dupak_no='A0005' and usulan_no='$no_usulan'";
								$d_a0005=mysqli_query($koneksi,$a0005);
								$c_a0005=mysqli_num_rows($d_a0005);
								if($c_a0005>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">B</td>
                                    <td colspan="7"><strong>Membimbing Seminar</strong></td>
                              </tr>
								<?php
								while($r_a0005=mysqli_fetch_array($d_a0005))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_a0005['uraian']?></td>
									<td class="text-center"><?=$r_a0005['tgl']?></td>
									<td class="text-center"><?=$r_a0005['satuan_hasil']?></td>
									<td class="text-center"><?=$r_a0005['jumlah_volume']?></td>
									<td class="text-center"><?=$r_a0005['angka_kredit']?></td>
									<td class="text-center"><?=$r_a0005['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_a0005="select *from usulan_dupaks where dupak_no='A0005' and usulan_no='$no_usulan'";
								$data_a0005=mysqli_query($koneksi,$sql_a0005);
								$data_bid_a_a0005=mysqli_fetch_array($data_a0005);
								$jumlah_a0005=$data_bid_a_a0005['kum_usulan_lama']+$data_bid_a_a0005['kum_usulan_baru'];
								?>	
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_a0005?></td>
                                    <td></td>
                              </tr>
							  <?php 
								}
								$no=1;
								$A0006="select *from usulan_dupak_details where dupak_no='A0006' and usulan_no='$no_usulan'";
								$d_A0006=mysqli_query($koneksi,$A0006);
								$c_A0006=mysqli_num_rows($d_A0006);
								if($c_A0006>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">C</td>
                                    <td colspan="7"><strong>Membimbing Kuliah Kerja Nyata, Pratek Kerja Nyata, Praktek Kerja Lapangan</strong></td>
                              </tr>
							  <?php
								while($r_A0006=mysqli_fetch_array($d_A0006))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A0006['uraian']?></td>
									<td class="text-center"><?=$r_A0006['tgl']?></td>
									<td class="text-center"><?=$r_A0006['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A0006['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A0006['angka_kredit']?></td>
									<td class="text-center"><?=$r_A0006['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A0006="SELECT *FROM usulan_dupaks WHERE dupak_no='A0006' AND usulan_no='$no_usulan'";
								$data_A0006=mysqli_query($koneksi,$sql_A0006);
								$data_bid_a_A0006=mysqli_fetch_array($data_A0006);
								
								$jumlah_A0006=$data_bid_a_A0006['kum_usulan_lama']+$data_bid_a_A0006['kum_usulan_baru'];
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?= $jumlah_A0006?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$A714="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('A0007','A0008','A0009','A0010','A0011','A0012','A0013','A0014') 
										and usulan_no='$no_usulan'";
								$d_A714=mysqli_query($koneksi,$A714);
								$c_A714=mysqli_num_rows($d_A714);
								if($c_A714>0)
								{
								?>
                              <tr>
                                    <td class="text-center">D</td>
                                    <td colspan="7"><strong>Membimbing & Ikut Membimbing Dalam Menghasilkan Disertasi, Thesis, Skripsi & Laporan Akhir Studi</strong></td>
                              </tr>
							  <?php
								while($r_A714=mysqli_fetch_array($d_A714))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A714['uraian']?></td>
									<td class="text-center"><?=$r_A714['tgl']?></td>
									<td class="text-center"><?=$r_A714['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A714['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A714['angka_kredit']?></td>
									<td class="text-center"><?=$r_A714['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A714="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no IN ('A0007','A0008','A0009','A0010','A0011','A0012','A0013','A0014')
											  AND usulan_no = '$no_usulan'";
								$data_A714=mysqli_query($koneksi,$sql_A714);
								while($data_bid_a_A714=mysqli_fetch_array($data_A714))
								{$jumlah_A714+=$data_bid_a_A714['kum_usulan_lama']+$data_bid_a_A714['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A714?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$A1516="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('A0015','A0016') 
										and usulan_no='$no_usulan'";
								$d_A1516=mysqli_query($koneksi,$A1516);
								$c_A1516=mysqli_num_fields($d_A1516);
								if($c_A1516>0)
								{
								?>
                              <tr>
                                    <td class="text-center">E</td>
                                    <td colspan="7"><strong>Bertugas Sebagai Penguji Pada Ujian Akhir</strong></td>
                              </tr>
							  <?php
								while($r_A1516=mysqli_fetch_array($d_A1516))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A1516['uraian']?></td>
									<td class="text-center"><?=$r_A1516['tgl']?></td>
									<td class="text-center"><?=$r_A1516['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A1516['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A1516['angka_kredit']?></td>
									<td class="text-center"><?=$r_A1516['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A1516="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no IN ('A0015','A0016')
											  AND usulan_no = '$no_usulan'";
								$sql_A1516=mysqli_query($koneksi,$sql_A1516);
								while($data_bid_a_A1516=mysqli_fetch_array($sql_A1516))
								{$jumlah_A1516+=$data_bid_a_A1516['kum_usulan_lama']+$data_bid_a_A1516['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A1516?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$A17="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no ='A0017' 
										and usulan_no='$no_usulan'";
								$d_A17=mysqli_query($koneksi,$A17);
								$c_A17=mysqli_num_rows($d_A17);
								if($c_A17>0)
								{
								?>
                              <tr>
                                    <td class="text-center">F</td>
                                    <td colspan="7"><strong>Membina Kegiatan Mahasiswa</strong></td>
                              </tr>
							  <?php
								while($r_A17=mysqli_fetch_array($d_A17))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A17['uraian']?></td>
									<td class="text-center"><?=$r_A17['tgl']?></td>
									<td class="text-center"><?=$r_A17['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A17['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A17['angka_kredit']?></td>
									<td class="text-center"><?=$r_A17['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A17="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no ='A0017' 
											  AND usulan_no = '$no_usulan'";
								$sql_A17=mysqli_query($koneksi,$sql_A17);
								while($data_bid_a_A17=mysqli_fetch_array($sql_A17))
								{$jumlah_A17+=$data_bid_a_A17['kum_usulan_lama']+$data_bid_a_A17['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A17?></td>
                                    <td></td>
                              </tr>
							  <?php
								}
								$no=1;
								$A18="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no ='A0018' 
										and usulan_no='$no_usulan'";
								$d_A18=mysqli_query($koneksi,$A18);
								$c_A18=mysqli_num_rows($d_A18);
								if($c_A18>0)
								{
							  ?>
                              <tr>
                                    <td class="text-center">G</td>
                                    <td colspan="7"><strong>Mengembangkan Program Kuliah</strong></td>
                              </tr>
							 <?php
								while($r_A18=mysqli_fetch_array($d_A18))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A18['uraian']?></td>
									<td class="text-center"><?=$r_A18['tgl']?></td>
									<td class="text-center"><?=$r_A18['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A18['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A18['angka_kredit']?></td>
									<td class="text-center"><?=$r_A18['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A18="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no ='A0018' 
											  AND usulan_no = '$no_usulan'";
								$sql_A18=mysqli_query($koneksi,$sql_A18);
								while($data_A18=mysqli_fetch_array($sql_A18))
								{$jumlah_A18+=$data_A18['kum_usulan_lama']+$data_A18['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A18?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$A1920="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('A0019','A0020') 
										and usulan_no='$no_usulan'";
								$d_A1920=mysqli_query($koneksi,$A1920);
								$c_A1920=mysqli_num_rows($d_A1920);
								if($c_A1920>0)
								{
								?>
                              <tr>
                                    <td class="text-center">H</td>
                                    <td colspan="7"><strong>Mengembangkan Bahan Pengajaran</strong></td>
                              </tr>
                              <?php
								while($r_A1920=mysqli_fetch_array($d_A1920))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A1920['uraian']?></td>
									<td class="text-center"><?=$r_A1920['tgl']?></td>
									<td class="text-center"><?=$r_A1920['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A1920['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A1920['angka_kredit']?></td>
									<td class="text-center"><?=$r_A1920['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A1920="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no IN ('A0019','A0020')  
											  AND usulan_no = '$no_usulan'";
								$sql_A1920=mysqli_query($koneksi,$sql_A1920);
								while($data_A1920=mysqli_fetch_array($sql_A1920))
								{$jumlah_A1920+=$data_A1920['kum_usulan_lama']+$data_A1920['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A1920?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$A21="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no ='A0021' 
										and usulan_no='$no_usulan'";
								$d_A21=mysqli_query($koneksi,$A21);
								$c_A21=mysqli_num_rows($d_A21);
								if($c_A21>0)
								{
								?>
                              <tr>
                                    <td class="text-center">I</td>
                                    <td colspan="7"><strong>Menyampaikan Orasi Ilmiah</strong></td>
                              </tr>
                              <?php
								while($r_A21=mysqli_fetch_array($d_A21))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A21['uraian']?></td>
									<td class="text-center"><?=$r_A21['tgl']?></td>
									<td class="text-center"><?=$r_A21['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A21['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A21['angka_kredit']?></td>
									<td class="text-center"><?=$r_A21['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A21="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no ='A0021' 
											  AND usulan_no = '$no_usulan'";
								$sql_A21=mysqli_query($koneksi,$sql_A21);
								while($data_A21=mysqli_fetch_array($sql_A21))
								{$jumlah_A21+=$data_A21['kum_usulan_lama']+$data_A21['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A21?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$A2229="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('A0022','A0023','A0024','A0025','A0026','A0027','A0028','A0029')
										and usulan_no='$no_usulan'";
								$d_A2229=mysqli_query($koneksi,$A2229);
								$c_A2229=mysqli_num_rows($d_A2229);
								if($c_A2229>0)
								{
								?>
                              <tr>
                                    <td class="text-center">J</td>
                                    <td colspan="7"><strong>Menduduki Jabatan Pimpinan Perguruan Tinggi</strong></td>
                              </tr>
                              <?php
								while($r_A2229=mysqli_fetch_array($d_A2229))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A2229['uraian']?></td>
									<td class="text-center"><?=$r_A2229['tgl']?></td>
									<td class="text-center"><?=$r_A2229['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A2229['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A2229['angka_kredit']?></td>
									<td class="text-center"><?=$r_A2229['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A2229="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no IN ('A0022','A0023','A0024','A0025','A0026','A0027','A0028','A0029') 
											  AND usulan_no = '$no_usulan'";
								$sql_A2229=mysqli_query($koneksi,$sql_A2229);
								while($data_A2229=mysqli_fetch_array($sql_A2229))
								{$jumlah_A2229+=$data_A2229['kum_usulan_lama']+$data_A2229['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A2229?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$A3031="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('A0030','A0031')
										and usulan_no='$no_usulan'";
								$d_A3031=mysqli_query($koneksi,$A3031);
								$c_A3031=mysqli_num_rows($d_A3031);
								if($c_A3031>0)
								{
								?>
                              <tr>
                                    <td class="text-center">K</td>
                                    <td colspan="7"><strong>Membimbing Akademik Dosen Yang Lebih Rendah Jabatannya</strong></td>
                              </tr>
                             <?php
								while($r_A3031=mysqli_fetch_array($d_A3031))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A3031['uraian']?></td>
									<td class="text-center"><?=$r_A3031['tgl']?></td>
									<td class="text-center"><?=$r_A3031['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A3031['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A3031['angka_kredit']?></td>
									<td class="text-center"><?=$r_A3031['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A3031="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no IN ('A0030','A0031') 
											  AND usulan_no = '$no_usulan'";
								$sql_A3031=mysqli_query($koneksi,$sql_A3031);
								while($data_A3031=mysqli_fetch_array($sql_A3031))
								{$jumlah_A3031+=$data_A3031['kum_usulan_lama']+$data_A3031['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A3031?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$A3233="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('A0032','A0033')
										and usulan_no='$no_usulan'";
								$d_A3233=mysqli_query($koneksi,$A3233);
								$c_A3233=mysqli_num_rows($d_A3233);
								if($c_A3233>0)
								{
								?>
                              <tr>
                                    <td class="text-center">L</td>
                                    <td colspan="7"><strong>Melaksanakan Kegiatan Detasering & Pencangkokan Akademik Dosen</strong></td>
                              </tr>
                              <?php
								while($r_A3233=mysqli_fetch_array($d_A3233))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A3233['uraian']?></td>
									<td class="text-center"><?=$r_A3233['tgl']?></td>
									<td class="text-center"><?=$r_A3233['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A3233['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A3233['angka_kredit']?></td>
									<td class="text-center"><?=$r_A3233['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A3233="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no IN ('A0032','A0033')
											  AND usulan_no = '$no_usulan'";
								$da_A3233=mysqli_query($koneksi,$sql_A3233);
								while($data_A3233=mysqli_fetch_array($da_A3233))
								{$jumlah_A3233+=$data_A3233['kum_usulan_lama']+$data_A3233['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A3233?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$A3440="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('A0034','A0035','A0036','A0037','A0038','A0039','A0040') 
										and usulan_no='$no_usulan'";
								$d_A3440=mysqli_query($koneksi,$A3440);
								$c_A3440=mysqli_num_rows($d_A3440);
								if($c_A3440>0)
								{
								?>
                              <tr>
                                    <td class="text-center">M</td>
                                    <td colspan="7"><strong>Melakukan Kegiatan Pengembangan Diri Untuk Meningkatkan Kompetensi</strong></td>
                              </tr>
                              <?php
								while($r_A3440=mysqli_fetch_array($d_A3440))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_A3440['uraian']?></td>
									<td class="text-center"><?=$r_A3440['tgl']?></td>
									<td class="text-center"><?=$r_A3440['satuan_hasil']?></td>
									<td class="text-center"><?=$r_A3440['jumlah_volume']?></td>
									<td class="text-center"><?=$r_A3440['angka_kredit']?></td>
									<td class="text-center"><?=$r_A3440['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_A3440="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no IN ('A0034','A0035','A0036','A0037','A0038','A0039','A0040') 
											  AND usulan_no = '$no_usulan'";
								$da_A3440=mysqli_query($koneksi,$sql_A3440);
								while($data_A3440=mysqli_fetch_array($da_A3440))
								{$jumlah_A3440+=$data_A3440['kum_usulan_lama']+$data_A3440['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_A3440?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$total_a="SELECT
											  *
											FROM
											  `usulan_dupaks`
											WHERE LEFT(`dupak_no`, 1) = 'a'
											AND `usulan_no`='$no_usulan'";
								$d_total_a=mysqli_query($koneksi,$total_a);
								while($r_total_a=mysqli_fetch_array($d_total_a))
								{ $total_bid_a+=$r_total_a['kum_usulan_baru'];}
							   ?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td colspan="6" class="text-center">Jumlah</td>
                                    <td class="text-center"><?=$total_bid_a?></td>
                                    <td></td>
                              </tr>
                        </tbody>
                  </table>
            </div>

            <div class="clearfix">&nbsp;</div>

            <div class="table-responsive">
                  <table id="table-header">

                        <col width="600"/>
                        <col width="400" />

                        <tbody>
                              <tr>
                                    <td colspan="2">Demikian Pernyataan Ini Dibuat Untuk Dapat Dipergunakan Sebagaimana Mestinya.<br>&nbsp;</td>
                              </tr>
                              <tr>
                                    <td>&nbsp;</td>
									<?php
									date_default_timezone_set('Asia/Jakarta');
									$sq="SELECT
											  *
											FROM
											  usulans
											WHERE no = '$no_usulan'";
									$da=mysqli_query($koneksi,$sq);
									$r=mysqli_fetch_array($da);
									$tgl_usulan=$r['tgl_surat'];
									
									$tgl_ok=date_create($tgl_usulan);
									$tgl= date_format($tgl_ok, 'd F Y');
									?>
                                    <td>
                                          <?=$r['tempat_surat']?>, <?=$tgl?>
                                          <br><strong><?=$r['pimpinan_jabatan']?> <?=$r['pimpinan_unit_kerja']?></strong>
                                          <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                                          <strong><?=$r['pimpinan_nama']?></strong>
                                          <br>NIP/NIK.<?=$r['pimpinan_nip']?>
                                    </td>
                              </tr>
                        </tbody>
                  </table>
            </div>
      </div>
  </div>
</div>
<!---------------------------batas akhir konten-------------------------------------------->

         </div>
        </div>
      </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url()?>assets/vali-admin/js/popper.min.js"></script>
    <script src="<?= base_url()?>assets/vali-admin/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/vali-admin/js/plugins/sweetalert.min.js"></script>
    <script src="<?= base_url()?>assets/vali-admin/js/plugins/bootstrap-notify.min.js"></script>
    <script src="<?= base_url()?>assets/vali-admin/js/main.js"></script>

    <!-- Semantic UI Plugin -->
    <script type="text/javascript" src="<?= base_url()?>assets/semantic/semantic.min.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url()?>assets/vali-admin/js/plugins/pace.min.js"></script>

   </body>
</html>