<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRINT DUPAK BIDANG C |  LLDikti Wilayah III</title>
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

      	<h3 class="text-center">SURAT PERNYATAAN<br>MELAKSANAKAN PENGABDIAN PADA MASYARAKAT
</h3>

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
                              <?php
								$no=1;
								$C0001="select *from usulan_dupak_details where dupak_no='C0001' and usulan_no='$no_usulan'";
								$d_C0001=mysqli_query($koneksi,$C0001);
								$c_C0001=mysqli_num_rows($d_C0001);
								if($c_C0001>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">A</td>
                                    <td colspan="7"><strong>Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya</strong></td>
                              </tr>
							  <?php
								while($r_C0001=mysqli_fetch_array($d_C0001))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_C0001['uraian']?></td>
									<td class="text-center"><?=$r_C0001['tgl']?></td>
									<td class="text-center"><?=$r_C0001['satuan_hasil']?></td>
									<td class="text-center"><?=$r_C0001['jumlah_volume']?></td>
									<td class="text-center"><?=$r_C0001['angka_kredit']?></td>
									<td class="text-center"><?=$r_C0001['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_C0001="select *from usulan_dupaks where dupak_no='C0001' and usulan_no='$no_usulan'";
								$da_C0001=mysqli_query($koneksi,$sql_C0001);
								$ro_C0001=mysqli_fetch_array($da_C0001);
								$jumlah_C0001=$ro_C0001['kum_usulan_lama']+$ro_C0001['kum_usulan_baru'];
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_C0001?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$C0002="select *from usulan_dupak_details where dupak_no='C0002' and usulan_no='$no_usulan'";
								$d_C0002=mysqli_query($koneksi,$C0002);
								$c_C0002=mysqli_num_rows($d_C0002);
								if($c_C0002>0)
								{
								?>
                              <tr>
                                    <td class="text-center">B</td>
                                    <td colspan="7"><strong>Melaksanakan pengembangan hasil pendidikan dan penelitian yang dapat dimanfaatkan oleh masyarakat</strong></td>
                              </tr>
							  <?php
								while($r_C0002=mysqli_fetch_array($d_C0002))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_C0002['uraian']?></td>
									<td class="text-center"><?=$r_C0002['tgl']?></td>
									<td class="text-center"><?=$r_C0002['satuan_hasil']?></td>
									<td class="text-center"><?=$r_C0002['jumlah_volume']?></td>
									<td class="text-center"><?=$r_C0002['angka_kredit']?></td>
									<td class="text-center"><?=$r_C0002['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_C0002="select *from usulan_dupaks where dupak_no='C0002' and usulan_no='$no_usulan'";
								$data_C0002=mysqli_query($koneksi,$sql_C0002);
								$data_bid_c_C0002=mysqli_fetch_array($data_C0002);
								$jumlah_C0002=$data_bid_c_C0002['kum_usulan_lama']+$data_bid_c_C0002['kum_usulan_baru'];
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_C0002?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$C39="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('C0003','C0004','C0005','C0006','C0007','C0008','C0009') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_C39=mysqli_query($koneksi,$C39);
								$c_C39=mysqli_num_rows($d_C39);
								if($c_C39>0)
								{
								?>

                              <tr>
                                    <td class="text-center">C</td>
                                    <td colspan="7"><strong>Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat</strong></td>
                              </tr>
							  <?php
								while($r_C39=mysqli_fetch_array($d_C39))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_C39['uraian']?></td>
									<td class="text-center"><?=$r_C39['tgl']?></td>
									<td class="text-center"><?=$r_C39['satuan_hasil']?></td>
									<td class="text-center"><?=$r_C39['jumlah_volume']?></td>
									<td class="text-center"><?=$r_C39['angka_kredit']?></td>
									<td class="text-center"><?=$r_C39['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_C39="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no IN ('C0003','C0004','C0005','C0006','C0007','C0008','C0009') 
											  AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_C39=mysqli_query($koneksi,$sql_C39);
								while($data_bid_C39=mysqli_fetch_array($da_C39))
								{$jumlah_C39+=$data_bid_C39['kum_usulan_lama']+$data_bid_C39['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_C39?></td>
                                    <td></td>
                              </tr>
								<?php
								}
								$no=1;
								$C1012="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('C0010','C0011','C0012') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_C1012=mysqli_query($koneksi,$C1012);
								$c_C1012=mysqli_num_rows($d_C1012);
								if($c_C1012)
								{
								?>
                              <tr>
                                    <td class="text-center">D</td>
                                    <td colspan="7"><strong>Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum pemerintah dan pembangunan</strong></td>
                              </tr>
							  <?php
								while($r_C1012=mysqli_fetch_array($d_C1012))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_C1012['uraian']?></td>
									<td class="text-center"><?=$r_C1012['tgl']?></td>
									<td class="text-center"><?=$r_C1012['satuan_hasil']?></td>
									<td class="text-center"><?=$r_C1012['jumlah_volume']?></td>
									<td class="text-center"><?=$r_C1012['angka_kredit']?></td>
									<td class="text-center"><?=$r_C1012['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_C1012="SELECT
											  *
											FROM
											  usulan_dupaks
											WHERE dupak_no IN ('C0010','C0011','C0012') 
											  AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_C1012=mysqli_query($koneksi,$sql_C1012);
								while($data_bid_C1012=mysqli_fetch_array($da_C1012))
								{$jumlah_C1012+=$data_bid_C1012['kum_usulan_lama']+$data_bid_C1012['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_C1012?></td>
                                    <td></td>
                              </tr>
							  <?php
							    }
							    $no=1;
								$C0013="select *from usulan_dupak_details where dupak_no='C0013' and usulan_no='$no_usulan'";
								$d_C0013=mysqli_query($koneksi,$C0013);
								$c_C0013=mysqli_num_rows($d_C0013);
								if($c_C0013>0)
								{
							  ?>
							  
							  <tr>
                                    <td class="text-center">E</td>
                                    <td colspan="7"><strong>Membuat/ menulis karya pengabdian</strong></td>
                              </tr>
							  <?php
								while($r_C0013=mysqli_fetch_array($d_C0013))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_C0013['uraian']?></td>
									<td class="text-center"><?=$r_C0013['tgl']?></td>
									<td class="text-center"><?=$r_C0013['satuan_hasil']?></td>
									<td class="text-center"><?=$r_C0013['jumlah_volume']?></td>
									<td class="text-center"><?=$r_C0013['angka_kredit']?></td>
									<td class="text-center"><?=$r_C0013['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_C0013="select *from usulan_dupaks where dupak_no='C0013' and usulan_no='$no_usulan'";
								$data_C0013=mysqli_query($koneksi,$sql_C0013);
								$data_bid_c_C0013=mysqli_fetch_array($data_C0013);
								$jumlah_C0013=$data_bid_c_C0013['kum_usulan_lama']+$data_bid_c_C0013['kum_usulan_baru'];
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_C0013?></td>
                                    <td></td>
                              </tr>
							  <?php
							  }
								$no=1;
								$C0014="select *from usulan_dupak_details where dupak_no='C0014' and usulan_no='$no_usulan'";
								$d_C0014=mysqli_query($koneksi,$C0014);
								$c_C0014=mysqli_num_rows($d_C0014);
								if($c_C0014>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">F</td>
                                    <td colspan="7"><strong>Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala/jurnal pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya</strong></td>
                              </tr>
							  <?php
								while($r_C0014=mysqli_fetch_array($d_C0014))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_C0014['uraian']?></td>
									<td class="text-center"><?=$r_C0014['tgl']?></td>
									<td class="text-center"><?=$r_C0014['satuan_hasil']?></td>
									<td class="text-center"><?=$r_C0014['jumlah_volume']?></td>
									<td class="text-center"><?=$r_C0014['angka_kredit']?></td>
									<td class="text-center"><?=$r_C0014['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_C0014="select *from usulan_dupaks where dupak_no='C0014' and usulan_no='$no_usulan'";
								$data_C0014=mysqli_query($koneksi,$sql_C0014);
								$data_bid_c_C0014=mysqli_fetch_array($data_C0014);
								$jumlah_C0014=$data_bid_c_C0014['kum_usulan_lama']+$data_bid_c_C0014['kum_usulan_baru'];
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_C0014?></td>
                                    <td></td>
                              </tr>
							  <?php
							  }
								$no=1;
								$C1516="select 
											*
										from 
											usulan_dupak_details 
										where dupak_no IN ('C0015','C0016') 
										and usulan_no='$no_usulan' order by dupak_no asc";
								$d_C1516=mysqli_query($koneksi,$C1516);
								$c_C1516=mysqli_num_rows($d_C1516);
								if($c_C1516>0)
								{
							  ?>
							  <tr>
                                    <td class="text-center">G</td>
                                    <td colspan="7"><strong>Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun)*</strong></td>
                              </tr>
							  <?php
								while($r_C1516=mysqli_fetch_array($d_C1516))
								{
								?>
							  <tr>
									<td class="text-center"><?=$no?></td>
									<td colspan="2"><?=$r_C1516['uraian']?></td>
									<td class="text-center"><?=$r_C1516['tgl']?></td>
									<td class="text-center"><?=$r_C1516['satuan_hasil']?></td>
									<td class="text-center"><?=$r_C1516['jumlah_volume']?></td>
									<td class="text-center"><?=$r_C1516['angka_kredit']?></td>
									<td class="text-center"><?=$r_C1516['keterangan']?></td>
							  </tr>
								<?php
								$no++;
								}
								$sql_C1516="SELECT
											  *
											FROM
											  usulan_dupaks
											where dupak_no IN ('C0015','C0016') 
											  AND usulan_no = '$no_usulan' order by dupak_no asc";
								$da_C1516=mysqli_query($koneksi,$sql_C1516);
								while($data_bid_C1516=mysqli_fetch_array($da_C1516))
								{$jumlah_C1516+=$data_bid_C1516['kum_usulan_lama']+$data_bid_C1516['kum_usulan_baru'];}
								?>
                              <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <td></td>
                                    <td colspan="5">Sub Jumlah</td>
                                    <td class="text-center"><?=$jumlah_C1516?></td>
                                    <td></td>
                              </tr>
							  <?php
								}
								$total_a="SELECT
											  *
											FROM
											  `usulan_dupaks`
											WHERE LEFT(`dupak_no`, 1) = 'C'
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