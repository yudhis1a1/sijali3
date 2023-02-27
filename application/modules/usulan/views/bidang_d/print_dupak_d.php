<!DOCTYPE html>
<?php
include "koneksi.php";
?>
     
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRINT DUPAK BIDANG D |  LLDikti Wilayah III</title>
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

      <h3 class="text-center">SURAT PERNYATAAN<br>MELAKSANAKAN KEGIATAN PENUNJANG TUGAS DOSEN
</h3>

      	<div class="clearfix">&nbsp;</div>

      	<div class="table-responsive">
      		<table id="table-header">

      			<col width="150"/>
				<col width="10" />
				<col width="700"/>
				<?php
				
				$query_pimpinan="SELECT
						  a.`kaprodi_nama`,
						  a.`kaprodi_nip`,
						  a.`kaprodi_nidn`,
						  b.`nama`,
						  b.`kode_gol`,
						  a.`kaprodi_jabatan`,
						  c.`japim`,
						  e.`nama_prodi`,
						  f.`nama_instansi`
						FROM
						  usulans a
						  LEFT JOIN `golongans` b
							ON a.`kaprodi_golongan_kode` = b.`kode`
						  LEFT JOIN reff_japim c
							ON a.kaprodi_jabatan = c.`id`
						  LEFT JOIN `dosens` d
							ON a.`dosen_no` = d.`no`
						  LEFT JOIN prodis e
							ON d.`prodi_kode` = e.`kode`
						  LEFT JOIN `instansis` f
							ON e.`instansi_kode` = f.`kode`
						WHERE a.`no` = '$no_usulan'";
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
                                    <td><?=$row_pim['kaprodi_nama']?> </td>
                              </tr>
                              <tr>
                                    <td>NIK/NIP/NIDN</td>
                                    <td>:</td>
                                    <td><?=$row_pim['kaprodi_nip']?> / <?=$row_pim['kaprodi_nidn']?> </td>
                              </tr>
							  
                              <tr>
                                    <td>Pangkat/Golongan</td>
                                    <td>:</td>
                                    <td><?=$row_pim['nama']?> / <?=$row_pim['kode_gol']?></td>
                              </tr>
                              <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td><?=$row_pim['japim']?></td>
                              </tr>
                              <tr>
									<td>Unit Kerja</td>
									<td>:</td>
									<td>Program Studi <?=$row_pim['nama_prodi']?> Pada <?=$row_pim['nama_instansi']?></td>
							 </tr>
                              <tr>
                                    <td colspan="3"><br>Menyatakan Bahwa :<br>&nbsp;</td>
                              </tr>
							  <?php
								
								$query_dosens="SELECT
												  b.`no`,
												  b.`nama`,
												  b.`gelar_depan`,
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
                                    <td><?=$row_dos['gelar_depan']?> <?=$row_dos['nama']?>, <?=$row_dos['gelar_belakang']?></td>
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
											  a.`nidn`,
											  a.`nama`,
											  a.`jabatan_no`,
											  b.`nama_jabatans`,
											  b.`kum`,
											  a.`jabatan_tgl`,
											  a.`jenjang_id`,
											  c.`nama_jenjang`
											FROM
											  dosens AS a,
											  `jabatans` AS b,
											  `jenjangs` AS c
											WHERE a.`no` = '$row_dos[no]'
											  AND a.`jabatan_no` = b.`kode`
											  AND a.`jenjang_id` = c.`id`";
								$dq_cari_jab=mysqli_query($koneksi,$q_cari_jab);
								$rdq_cari_jab=mysqli_fetch_array($dq_cari_jab);
								?>
                              <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
									<?php
									date_default_timezone_set('Asia/Jakarta');
									function tgl_indo($tanggal){
										$bulan = array (
											1 =>   'Januari',
											'Februari',
											'Maret',
											'April',
											'Mei',
											'Juni',
											'Juli',
											'Agustus',
											'September',
											'Oktober',
											'November',
											'Desember'
										);
										$pecahkan = explode('-', $tanggal);
										return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
									}
									?>
                                    <td><?=$rdq_cari_jab['nama_jabatans']?> (<?=$rdq_cari_jab['kum']?>), <?=tgl_indo($rdq_cari_jab['jabatan_tgl'])?></td>
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
                              <?php
								$no=1;
								$D12="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('D0001','D0002') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D12=mysqli_query($koneksi,$D12);
								$c_D12=mysqli_num_rows($d_D12);
								if($c_D12>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">A</td>
                                    <td colspan="7"><strong>Menjadi anggota dalam suatu Panitia/Badan pada perguruan tinggi</strong></td>
                              </tr>
							  <?php
								while($r_D12=mysqli_fetch_array($d_D12))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D12['uraian']?></td>
									<td class="text-center"><?=$r_D12['tgl']?></td>
									<td class="text-center"><?=$r_D12['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D12['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D12['angka_kredit']?></td>
									<td class="text-center"><?=$r_D12['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D12="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('D0001','D0002') 
										  AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D12=mysqli_query($koneksi,$sql_D12);
								while($data_bid_D12=mysqli_fetch_array($da_D12))
								{$jumlah_D12+=$data_bid_D12['kum_usulan_lama']+$data_bid_D12['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D12?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$D36="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('D0003','D0004','D0005','D0005','D0006') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D36=mysqli_query($koneksi,$D36);
								$c_D36=mysqli_num_rows($d_D36);
								if($c_D36>0)
								{
								?>
                              <tr>
                                    <td class="text-center">B</td>
                                    <td colspan="7"><strong>Menjadi anggota panitia/badan pada lembaga pemerintah</strong></td>
                              </tr>
							  <?php
								while($r_D36=mysqli_fetch_array($d_D36))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D36['uraian']?></td>
									<td class="text-center"><?=$r_D36['tgl']?></td>
									<td class="text-center"><?=$r_D36['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D36['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D36['angka_kredit']?></td>
									<td class="text-center"><?=$r_D36['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D36="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('D0003','D0004','D0005','D0005','D0006') 
										  AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D36=mysqli_query($koneksi,$sql_D36);
								while($data_bid_D36=mysqli_fetch_array($da_D36))
								{$jumlah_D36+=$data_bid_D36['kum_usulan_lama']+$data_bid_D36['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D36?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$D712="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('D0007','D0008','D0009','D0010','D0011','D0012') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D712=mysqli_query($koneksi,$D712);
								$c_D712=mysqli_num_rows($d_D712);
								if($c_D712>0)
								{
								?>
                              <tr>
                                    <td class="text-center">C</td>
                                    <td colspan="7"><strong>Menjadi anggota organisasi profesi</strong></td>
                              </tr>
							   <?php
								while($r_D712=mysqli_fetch_array($d_D712))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D712['uraian']?></td>
									<td class="text-center"><?=$r_D712['tgl']?></td>
									<td class="text-center"><?=$r_D712['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D712['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D712['angka_kredit']?></td>
									<td class="text-center"><?=$r_D712['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D712="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('D0003','D0004','D0005','D0005','D0006') 
										  AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D712=mysqli_query($koneksi,$sql_D712);
								while($data_bid_D712=mysqli_fetch_array($da_D712))
								{$jumlah_D712+=$data_bid_D712['kum_usulan_lama']+$data_bid_D712['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D712?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$D0013="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no ='D0013'
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D0013=mysqli_query($koneksi,$D0013);
								$c_D0013=mysqli_num_rows($d_D0013);
								if($c_D0013>0)
								{
								?>
                              <tr>
                                    <td class="text-center">D</td>
                                    <td colspan="7"><strong>Mewakili perguruan tinggi/ Iembaga pemerintah duduk dalam panitia antar lembaga</strong></td>
                              </tr>
							  <?php
								while($r_D0013=mysqli_fetch_array($d_D0013))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D0013['uraian']?></td>
									<td class="text-center"><?=$r_D0013['tgl']?></td>
									<td class="text-center"><?=$r_D0013['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D0013['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D0013['angka_kredit']?></td>
									<td class="text-center"><?=$r_D0013['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D0013="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no ='D0013' 
											  AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D0013=mysqli_query($koneksi,$sql_D0013);
								$data_bid_D0013=mysqli_fetch_array($da_D0013);
								$jumlah_D0013=$data_bid_D0013['kum_usulan_lama']+$data_bid_D0013['kum_usulan_baru'];
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D0013?></td>
                                    <td></td>
                              </tr>
							  <?php
								}
								$no=1;
								$D1415="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('D0014','D0015') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D1415=mysqli_query($koneksi,$D1415);
								$c_D1415=mysqli_num_rows($d_D1415);
								if($c_D1415>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">E</td>
                                    <td colspan="7"><strong>Menjadi anggota delegasi nasional ke pertemuan internasional</strong></td>
                              </tr>
							   <?php
								while($r_D1415=mysqli_fetch_array($d_D1415))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D1415['uraian']?></td>
									<td class="text-center"><?=$r_D1415['tgl']?></td>
									<td class="text-center"><?=$r_D1415['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D1415['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D1415['angka_kredit']?></td>
									<td class="text-center"><?=$r_D1415['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D1415="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('D0014','D0015') 
										  AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D1415=mysqli_query($koneksi,$sql_D1415);
								while($data_bid_D1415=mysqli_fetch_array($da_D1415))
								{$jumlah_D1415+=$data_bid_D1415['kum_usulan_lama']+$data_bid_D1415['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D1415?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$D1619="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('D0016','D0017','D0018','D0019') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D1619=mysqli_query($koneksi,$D1619);
								$c_D1619=mysqli_num_rows($d_D1619);
								if($c_D1619>0)
								{
								?>
							  <tr>
                                    <td class="text-center">F</td>
                                    <td colspan="7"><strong>Berperan serta aktif dalam pertemuan ilmiah</strong></td>
                              </tr>
							  <?php
								while($r_D1619=mysqli_fetch_array($d_D1619))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D1619['uraian']?></td>
									<td class="text-center"><?=$r_D1619['tgl']?></td>
									<td class="text-center"><?=$r_D1619['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D1619['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D1619['angka_kredit']?></td>
									<td class="text-center"><?=$r_D1619['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D1619="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('D0016','D0017','D0018','D0019')
										  AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D1619=mysqli_query($koneksi,$sql_D1619);
								while($data_bid_D1619=mysqli_fetch_array($da_D1619))
								{$jumlah_D1619+=$data_bid_D1619['kum_usulan_lama']+$data_bid_D1619['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D1619?></td>
                                    <td></td>
                              </tr>
							  <?php
								}
								$no=1;
								$D2025="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('D0020','D0021','D0022','D0023','D0024','D0025') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D2025=mysqli_query($koneksi,$D2025);
								$c_D2025=mysqli_num_rows($d_D2025);
								if($c_D2025>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">G</td>
                                    <td colspan="7"><strong>Mendapat penghargaan / tanda jasa</strong></td>
                              </tr>
							  <?php
								while($r_D2025=mysqli_fetch_array($d_D2025))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D2025['uraian']?></td>
									<td class="text-center"><?=$r_D2025['tgl']?></td>
									<td class="text-center"><?=$r_D2025['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D2025['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D2025['angka_kredit']?></td>
									<td class="text-center"><?=$r_D2025['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D2025="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('D0020','D0021','D0022','D0023','D0024','D0025') 
											AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D2025=mysqli_query($koneksi,$sql_D2025);
								while($data_bid_D2025=mysqli_fetch_array($da_D2025))
								{$jumlah_D2025+=$data_bid_D2025['kum_usulan_lama']+$data_bid_D2025['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D2025?></td>
                                    <td></td>
                              </tr>
							  <?php
								}
								$no=1;
								$D2628="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('D0026','D0027','D0028') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D2628=mysqli_query($koneksi,$D2628);
								$c_D2628=mysqli_num_rows($d_D2628);
								if($c_D2628>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">H</td>
                                    <td colspan="7"><strong>Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional</strong></td>
                              </tr>
							  <?php
								while($r_D2628=mysqli_fetch_array($d_D2628))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D2628['uraian']?></td>
									<td class="text-center"><?=$r_D2628['tgl']?></td>
									<td class="text-center"><?=$r_D2628['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D2628['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D2628['angka_kredit']?></td>
									<td class="text-center"><?=$r_D2628['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D2628="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('D0026','D0027','D0028')
											AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D2628=mysqli_query($koneksi,$sql_D2628);
								while($data_bid_D2628=mysqli_fetch_array($da_D2628))
								{$jumlah_D2628+=$data_bid_D2628['kum_usulan_lama']+$data_bid_D2628['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D2628?></td>
                                    <td></td>
                              </tr>
							  <?php
								}
								$no=1;
								$D2931="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('D0029','D0030','D0031') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D2931=mysqli_query($koneksi,$D2931);
								$c_D2931=mysqli_num_rows($d_D2931);
								if($c_D2931>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">I</td>
                                    <td colspan="7"><strong>Mempunyai prestasi di bidang olahraga/humaniora</strong></td>
                              </tr>
							  <?php
								while($r_D2931=mysqli_fetch_array($d_D2931))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D2931['uraian']?></td>
									<td class="text-center"><?=$r_D2931['tgl']?></td>
									<td class="text-center"><?=$r_D2931['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D2931['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D2931['angka_kredit']?></td>
									<td class="text-center"><?=$r_D2931['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D2931="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('D0029','D0030','D0031') 
											AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D2931=mysqli_query($koneksi,$sql_D2931);
								while($data_bid_D2931=mysqli_fetch_array($da_D2931))
								{$jumlah_D2931+=$data_bid_D2931['kum_usulan_lama']+$data_bid_D2931['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D2931?></td>
                                    <td></td>
                              </tr>
							  <?php
							  }  
							    $no=1;
								$D0032="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no ='D0032' 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D0032=mysqli_query($koneksi,$D0032);
								$c_D0032=mysqli_num_rows($d_D0032);
								if($c_D0032)
								{
							  ?>
							  <tr>
                                    <td class="text-center">J</td>
                                    <td colspan="7"><strong>Keanggotaan dalam tim penilaian</strong></td>
                              </tr>
							  <?php
								while($r_D0032=mysqli_fetch_array($d_D0032))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D0032['uraian']?></td>
									<td class="text-center"><?=$r_D0032['tgl']?></td>
									<td class="text-center"><?=$r_D0032['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D0032['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D0032['angka_kredit']?></td>
									<td class="text-center"><?=$r_D0032['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_D0032="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no ='D0032' 
											AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D0032=mysqli_query($koneksi,$sql_D0032);
								while($data_bid_D0032=mysqli_fetch_array($da_D0032))
								{$jumlah_D0032+=$data_bid_D0032['kum_usulan_lama']+$data_bid_D0032['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D0032?></td>
                                    <td></td>
                              </tr>
							  <?php
								}
								$no=1;
								$D3335="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('D0033','D0034','D0035') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_D3335=mysqli_query($koneksi,$D3335);
								$c_D3335=mysqli_num_rows($d_D3335);
								if($c_D3335>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">K</td>
                                    <td colspan="7"><strong>Menjadi Asesor kegiatan seperti PAK, BKD, Hibah Penelitian dan Pengabdian (tiap kegiatan)</strong></td>
                              </tr>
							  <?php
								while($r_D3335=mysqli_fetch_array($d_D3335))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_D3335['uraian']?></td>
									<td class="text-center"><?=$r_D3335['tgl']?></td>
									<td class="text-center"><?=$r_D3335['satuan_hasil']?></td>
									<td class="text-center"><?=$r_D3335['jumlah_volume']?></td>
									<td class="text-center"><?=$r_D3335['angka_kredit']?></td>
									<td class="text-center"><?=$r_D3335['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_r_D3335="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('D0033','D0034','D0035') 
											AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_D3335=mysqli_query($koneksi,$sql_r_D3335);
								while($data_bid_D3335=mysqli_fetch_array($da_D3335))
								{$jumlah_D3335+=$data_bid_D3335['kum_usulan_lama']+$data_bid_D3335['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_D3335?></td>
                                    <td></td>
                              </tr>
							  <?php
							  } 
								$total_a="SELECT
											  *
											FROM
											  `usulan_dupaks`
											WHERE LEFT(`dupak_no`, 1) = 'D'
											AND `usulan_no`='$no_usulan'";
								$d_total_a=mysqli_query($koneksi,$total_a);
								while($r_total_a=mysqli_fetch_array($d_total_a))
								{ $total_bid_c+=$r_total_a['kum_usulan_baru'];}
							   ?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td colspan="6" class="text-center">Jumlah</td>
                                    <td class="text-center"><?=$total_bid_c?></td>
                                    <td></td>
                              </tr>
                        </tbody>
                  </table>
            </div>

            <div class="clearfix">&nbsp;</div>

            <div class="table-responsive">
                  <table id="table-header">

                        <col width="600"/>
                        <col width="300" />
						<col width="400" />
                        <tbody>
                              <tr>
                                    <td colspan="3">Demikian Pernyataan Ini Dibuat Untuk Dapat Dipergunakan Sebagaimana Mestinya.<br>&nbsp;</td>
                              </tr>
                              <tr>
                                    <td>&nbsp;</td>
									<td>&nbsp;</td>
									<?php
									date_default_timezone_set('Asia/Jakarta');
									$sq="SELECT
											a.`kaprodi_nama`,
											a.`kaprodi_nip`,
											a.`kaprodi_nidn`,
											a.`tempat_surat`,
											a.`kaprodi_jabatan`,
											a.`kaprodi_unit_kerja`,
											a.tgl_surat,
											c.`japim`
										  FROM
											usulans AS a,
											reff_japim as c
										  WHERE a.`no` = '$no_usulan'
										  AND a.kaprodi_jabatan = c.`id`";
									$da=mysqli_query($koneksi,$sq);
									$r=mysqli_fetch_array($da);
									?>
                                    <td>
                                          <?=$r['tempat_surat']?>, <?=tgl_indo($r['tgl_surat'])?>
                                          <br><strong><?=$r['japim']?> <?=$r['kaprodi_unit_kerja']?></strong>
                                          <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                                          <strong><?=$r['kaprodi_nama']?></strong>
                                          <br>NIDN/NIP/NIK. <?=$r['kaprodi_nidn']?>/<?=$r['kaprodi_nip']?>
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