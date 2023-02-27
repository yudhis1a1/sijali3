<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>PRINT DUPAK BIDANG B |  LLDikti Wilayah III</title>
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
      	<h3 class="text-center">SURAT PERNYATAAN<br>MELAKSANAKAN KEGIATAN PENELITIAN</h3>

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
						<td class="text-center">A</td>
						<td colspan="7"><strong>Menghasilkan Karya Ilmiah</strong></td>
				  </tr>
				  <?php
					
					$dupaks="SELECT
								  a.no,
								  a.`deskripsi`
								FROM
								  dupaks AS a,
								  `usulan_dupak_details` AS b
								WHERE a.`no` = b.`dupak_no`
								  AND b.`usulan_no` = '$no_usulan'
								  AND a.no IN (
									'B0001',
									'B0002',
									'B0003',
									'B0004',
									'B0005',
									'B0006',
									'B0007',
									'B0008',
									'B0009',
									'B0010',
									'B0011',
									'B0027',
									'B0028',
									'B0029',
									'B0030',
									'B0031',
									'B0032',
									'B0033',
									'B0034',
									'B0035',
									'B0036'
								  )GROUP BY a.`deskripsi` ORDER BY a.no ASC";
					$d_dupaks=mysqli_query($koneksi,$dupaks);
					while($r_dupaks=mysqli_fetch_array($d_dupaks))
					{
				   ?>
				  <tr>
						<td colspan="8" style="background-color: #effaff;"><strong><?=$r_dupaks['deskripsi']?></strong></td>
				  </tr>
				  <?php
					$no=1;
					$B112="SELECT
								  *
								FROM
								  `usulan_dupak_details`
								WHERE `usulan_no` = '$no_usulan'
								  AND `dupak_no` = '$r_dupaks[no]'";
					$d_B112=mysqli_query($koneksi,$B112);
					while($r_B112=mysqli_fetch_array($d_B112))
						{
				   ?>
				  <tr>
						<td class="text-center"><?=$no?></td>
						<td colspan="2" ><?=$r_B112['uraian']?></td>
						<td class="text-center"><?=$r_B112['tgl']?></td>
						<td class="text-center"><?=$r_B112['satuan_hasil']?></td>
						<td class="text-center"><?=$r_B112['jumlah_volume']?></td>
						<td class="text-center"><?=$r_B112['angka_kredit']?></td>
						<td class="text-center"><?=$r_B112['keterangan']?></td>
				  </tr>
					<?php
						$no++;
						}
					$subB112="SELECT * FROM `usulan_dupaks` WHERE `usulan_no`='$no_usulan' AND `dupak_no`='$r_dupaks[no]'";	
					$d_subB112=mysqli_query($koneksi,$subB112);
					$r_B112=mysqli_fetch_array($d_subB112);
					$totalsub=$r_B112['kum_usulan_lama']+$r_B112['kum_usulan_baru'];
					?>
				   <tr style="background-color: #e4e4e4; font-weight: bold;">
									<td></td>
									<td colspan="5">Sub Jumlah</td>
									<td class="text-center"><?=$totalsub?></td>
									<td></td>
				   </tr>		
					<?php
					}
					$total_B112="select 
									*
								from usulan_dupaks 
								where usulan_no='$no_usulan' 
								and dupak_no IN (
									'B0001',
									'B0002',
									'B0003',
									'B0004',
									'B0005',
									'B0006',
									'B0007',
									'B0008',
									'B0009',
									'B0010',
									'B0011',
									'B0012'
								  )";
					$d_total_B112=mysqli_query($koneksi,$total_B112);
					while($r_d_total_B112=mysqli_fetch_array($d_total_B112))
					{$total_B112+=$r_d_total_B112[kum_usulan_lama]+$r_d_total_B112[kum_usulan_baru];}
					?>
					<tr style="background-color: #e4e4e4; font-weight: bold;">
						<td></td>
						<td colspan="5">Total</td>
						<td class="text-center"><?=$total_B112?></td>
						<td></td>
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
				   
					$no=1;
					$B0013="select *from usulan_dupak_details where dupak_no='B0013' and usulan_no='$no_usulan'";
					$d_B0013=mysqli_query($koneksi,$B0013);
					$c_B0013=mysqli_num_rows($d_B0013);
					if($c_B0013>0)
					{
				   ?>
				  <tr>
						<td class="text-center">B</td>
						<td colspan="7"><strong>Menerjemahkan / Menyadur Buku Ilmiah</strong></td>
				  </tr>
				  <?php
					while($r_B0013=mysqli_fetch_array($d_B0013))
					{
					?>
				  <tr>
						<td class="text-center"><?=$no?></td>
						<td colspan="2"><?=$r_B0013['uraian']?></td>
						<td class="text-center"><?=$r_B0013['tgl']?></td>
						<td class="text-center"><?=$r_B0013['satuan_hasil']?></td>
						<td class="text-center"><?=$r_B0013['jumlah_volume']?></td>
						<td class="text-center"><?=$r_B0013['angka_kredit']?></td>
						<td class="text-center"><?=$r_B0013['keterangan']?></td>
				  </tr>
					<?php
					$no++;
					}
					$sql_B0013="select *from usulan_dupaks where dupak_no='B0013' and usulan_no='$no_usulan'";
					$data_B0013=mysqli_query($koneksi,$sql_B0013);
					$data_bid_a_B0013=mysqli_fetch_array($data_B0013);
					$jumlah_B0013=$data_bid_a_B0013['kum_usulan_lama']+$data_bid_a_B0013['kum_usulan_baru'];
					?>
				  <tr style="background-color: #e4e4e4; font-weight: bold;">
						<td></td>
						<td colspan="5">Sub Jumlah</td>
						<td class="text-center"><?=$jumlah_B0013?></td>
						<td></td>
				  </tr>
					<?php
					}
					$no=1;
					$B0014="select *from usulan_dupak_details where dupak_no='B0014' and usulan_no='$no_usulan'";
					$d_B0014=mysqli_query($koneksi,$B0014);
					$c_B0014=mysqli_num_rows($d_B0014);
					if($c_B0014>0)
					{
					?>
			
				  <tr>
						<td class="text-center">C</td>
						<td colspan="7"><strong>Mengedit/Menyunting Karya Ilmiah</strong></td>
				  </tr>
				  <?php
					while($r_B0014=mysqli_fetch_array($d_B0014))
					{
					?>
				  <tr>
						<td class="text-center"><?=$no?></td>
						<td colspan="2"><?=$r_B0014['uraian']?></td>
						<td class="text-center"><?=$r_B0014['tgl']?></td>
						<td class="text-center"><?=$r_B0014['satuan_hasil']?></td>
						<td class="text-center"><?=$r_B0014['jumlah_volume']?></td>
						<td class="text-center"><?=$r_B0014['angka_kredit']?></td>
						<td class="text-center"><?=$r_B0014['keterangan']?></td>
				  </tr>
					<?php
					$no++;
					}
					$sql_B0014="select *from usulan_dupaks where dupak_no='B0014' and usulan_no='$no_usulan'";
					$data_B0014=mysqli_query($koneksi,$sql_B0014);
					$data_bid_a_B0014=mysqli_fetch_array($data_B0014);
					$jumlah_B0014=$data_bid_a_B0014['kum_usulan_lama']+$data_bid_a_B0014['kum_usulan_baru'];
					?>
				  <tr style="background-color: #e4e4e4; font-weight: bold;">
						<td></td>
						<td colspan="5">Sub Jumlah</td>
						<td class="text-center"><?=$jumlah_B0014?></td>
						<td></td>
				  </tr>
					<?php
					}
					$no=1;
					$B1520="select 
								*
							from 
								usulan_dupak_details 
							where dupak_no IN ('B0015','B0016','B0017','B0018','B0019','B0020') 
							and usulan_no='$no_usulan' order by dupak_no asc";
					$d_B1520=mysqli_query($koneksi,$B1520);
					$c_B1520=mysqli_num_rows($d_B1520);
					if($c_B1520>0)
					{
					?>

				  <tr>
						<td class="text-center">D</td>
						<td colspan="7"><strong>Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara nasional atau internasional</strong></td>
				  </tr>
				  <?php
					while($r_B1520=mysqli_fetch_array($d_B1520))
					{
					?>
				  <tr>
						<td class="text-center"><?=$no?></td>
						<td colspan="2"><?=$r_B1520['uraian']?></td>
						<td class="text-center"><?=$r_B1520['tgl']?></td>
						<td class="text-center"><?=$r_B1520['satuan_hasil']?></td>
						<td class="text-center"><?=$r_B1520['jumlah_volume']?></td>
						<td class="text-center"><?=$r_B1520['angka_kredit']?></td>
						<td class="text-center"><?=$r_B1520['keterangan']?></td>
				  </tr>
					<?php
					$no++;
					}
					$sql_B1520="SELECT
								  *
								FROM
								  usulan_dupaks
								WHERE dupak_no IN ('B0015','B0016','B0017','B0018','B0019','B0020')
								  AND usulan_no = '$no_usulan' order by dupak_no asc";
					$d_B1520=mysqli_query($koneksi,$sql_B1520);
					while($data_bid_b_B1520=mysqli_fetch_array($d_B1520))
					{$jumlah_B1520+=$data_bid_b_B1520['kum_usulan_lama']+$data_bid_b_B1520['kum_usulan_baru'];}
					?>
				  <tr style="background-color: #e4e4e4; font-weight: bold;">
						<td></td>
						<td colspan="5">Sub Jumlah</td>
						<td class="text-center"><?=$jumlah_B1520?></td>
						<td></td>
				  </tr>
					<?php
					}
					$no=1;
					$B2123="select 
								*
							from 
								usulan_dupak_details 
							where dupak_no IN ('B0021','B0022','B0023') 
							and usulan_no='$no_usulan' order by dupak_no asc";
					$d_B2123=mysqli_query($koneksi,$B2123);
					$c_B2123=mysqli_num_rows($d_B2123);
					if($c_B2123>0)
					{
					?>
				  <tr>
						<td class="text-center">E</td>
						<td colspan="7"><strong>Membuat Rancangan & Karya Teknologi, Rancangan & Karya Seni Monumental/Seni Pertunjukan/Karya Sastra</strong></td>
				  </tr>
				  <?php
					while($r_B2123=mysqli_fetch_array($d_B2123))
					{
					?>
				  <tr>
						<td class="text-center"><?=$no?></td>
						<td colspan="2"><?=$r_B2123['uraian']?></td>
						<td class="text-center"><?=$r_B2123['tgl']?></td>
						<td class="text-center"><?=$r_B2123['satuan_hasil']?></td>
						<td class="text-center"><?=$r_B2123['jumlah_volume']?></td>
						<td class="text-center"><?=$r_B2123['angka_kredit']?></td>
						<td class="text-center"><?=$r_B2123['keterangan']?></td>
				  </tr>
					<?php
					$no++;
					}
					$sql_B2123="SELECT
								  *
								FROM
								  usulan_dupaks
								WHERE dupak_no IN ('B0021','B0022','B0023')
								  AND usulan_no = '$no_usulan'";
					$d_B2123=mysqli_query($koneksi,$sql_B2123);
					while($r_B2123=mysqli_fetch_array($d_B2123))
					{$jumlah_B2123+=$r_B2123['kum_usulan_lama']+$r_B2123['kum_usulan_baru'];}
					?>
				  <tr style="background-color: #e4e4e4; font-weight: bold;">
						<td></td>
						<td colspan="5">Sub Jumlah</td>
						<td class="text-center"><?=$jumlah_B2123?></td>
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
</body>
</html>

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