<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PRINT RESUME | LLDikti Wilayah III</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Favicon -->
	<link type="image/x-icon" href="<?= base_url() ?>assets/images/favicon.ico" rel="shortcut icon">
	<link rel="canonical" href="" itemprop="url">

	<!-- Main CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vali-admin/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vali-admin/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/semantic/css/tables.css">
	<!-- Semantic UI CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/semantic/semantic.min.css">
	<!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/semantic/fontawesome-5.1.1/css/all.css" crossorigin="anonymous">
	<script src="<?= base_url() ?>assets/vali-admin/js/jquery-3.2.1.min.js"></script>
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
								<div class="table-responsive">
									<table border="1" class="ui celled table">

										<col width="30" />
										<col width="100" />
										<col width="90" />
										<col width="90" />
										<col width="90" />
										<col width="90" />
										<col width="50" />

										<thead>
											<tr class="text-center">
												<th colspan="7" class="text-center">
													<h3 style="text-align: center;">RESUME USULAN<br>JABATAN AKADEMIK DOSEN</h3>
												</th>
											</tr>
										</thead>
										<?php
										date_default_timezone_set('Asia/Jakarta');
										$query_dosens = "SELECT
							  b.`no`,
							  b.`jabatan_no`,
							  b.`jabatan_tgl`,
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
							  c.`nama_prodi`,
							  d.`nama_instansi`,
							  b.`bidang_ilmu_kode`
							FROM
							  usulans AS a,
							  dosens AS b,
							  `prodis` AS c,
							  `instansis` AS d,
							  ikatan_kerjas AS e,
							  `jenjangs` AS f
							WHERE a.`no` = '$no'
							  AND a.`dosen_no` = b.`no`
							  AND b.`prodi_kode` = c.`kode`
							  AND c.`instansi_kode` = d.`kode`
							  AND b.`ikatan_kerja_kode` = e.`kode`
							  AND b.`jenjang_id` = f.`id`";
										$data_dos = mysqli_query($koneksi, $query_dosens);
										$row_dos = mysqli_fetch_array($data_dos);
										?>
										<tbody>
											<tr class="text-center">
												<th colspan="7" class="text-center">
													<h4>BIODATA DOSEN</h4>
												</th>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">1. Nama</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['gelar_depan'] ?> <?= $row_dos['nama'] ?>, <?= $row_dos['gelar_belakang'] ?></td>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">2. Status Kepegawaian</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nama_ikatan'] ?></td>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">3. NIDN</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nidn'] ?></td>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">4. Pendidikan Terakhir</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nama_jenjang'] ?></td>
											</tr>
											<?php
											$q_mt = "SELECT * from usulan_matkuls where usulan_no='$no'";
											$d_mt = mysqli_query($koneksi, $q_mt);
											?>
											<tr>
												<td colspan="3" style="vertical-align: top;">6. PTS</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nama_instansi'] ?></td>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">7. Homebase</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nama_prodi'] ?></td>
											</tr>
											<?php
											$q_cari_gol = "SELECT
							  a.`no`,
							  a.`golongan_kode`,
							  b.`nama`,
							  b.`kode_gol`
							FROM
							  dosens AS a,
							  `golongans` AS b
							WHERE a.`no` = '$row_dos[no]'
							  AND a.`golongan_kode` = b.`kode`";
											$dq_cari_gol = mysqli_query($koneksi, $q_cari_gol);
											$rdq_cari_gol = mysqli_fetch_array($dq_cari_gol);
											?>
											<tr class="text-center">
												<th colspan="2" class="text-center">URAIAN</th>
												<th colspan="2" class="text-center">LAMA</th>
												<th colspan="3" class="text-center">BARU</th>
											</tr>
											<tr>
												<td colspan="2">Pangkat/Gol/TMT</td>
												<td colspan="2"><?= $rdq_cari_gol['nama'] ?> / <?= $rdq_cari_gol['kode_gol'] ?>/ <?= $row_dos['jabatan_tgl'] ?></td>
												<td colspan="3"></td>
											</tr>
											<?php
											if ($row_dos['jabatan_no'] <> 31) {
												$q_cari_jab = "SELECT
								  a.`dosen_no`,
								  a.`no`,
								  a.`jabatan_no`,
								  b.`nama_jabatans`,
								  b.`kum`,
								  a.`jabatan_tgl`,
								  a.`jenjang_id_lama`,
								  c.`nama_jenjang`
								FROM
								  `usulans` AS a,
								  `jabatans` AS b,
								  `jenjangs` AS c
								WHERE a.`dosen_no`= '$row_dos[no]'
								  AND a.`jabatan_no`=b.`kode`
								  AND a.`jenjang_id_lama`=c.`id`
								  AND a.`no`='$no'";
											} else {
												$q_cari_jab = "SELECT
								  a.`no`,
								  a.`jabatan_no`,
								  b.`nama_jabatans`,
								  a.`jenjang_id`,
								  c.`nama_jenjang`,
								  a.`jabatan_tgl`
								FROM
								  dosens AS a,
								  `jabatans` AS b,
								  `jenjangs` AS c
								WHERE a.`no` = '$row_dos[no]'
								  AND a.`jabatan_no` = b.`kode`
								  AND a.`jenjang_id` = c.`id`";
											}
											$dq_cari_jab = mysqli_query($koneksi, $q_cari_jab);
											$rdq_cari_jab = mysqli_fetch_array($dq_cari_jab);
											?>
											<tr>
												<td colspan="2">Jabatan/TMT</td>
												<td colspan="2"><?= $rdq_cari_jab['nama_jabatans'] ?> (<?= $rdq_cari_jab['nama_jenjang'] ?>), <?= $rdq_cari_jab['jabatan_tgl'] ?></td>

												<?php
												$q_jab_us = "SELECT
							  a.`no`,
							  c.`nama_jabatans`,
							  d.`nama_jenjang`,
							  a.`jabatan_tgl`
							FROM
							  `usulans` AS a,
							  `jabatan_jenjangs` AS b,
							  `jabatans` AS c,
							  `jenjangs` AS d
							WHERE a.`no` = '$no'
							  AND a.`jabatan_usulan_no` = b.`no`
							  AND b.`jabatan_kode` = c.`kode`
							  AND b.`jenjang_id` = d.`id`";
												$dq_jab_us = mysqli_query($koneksi, $q_jab_us);
												$rdq_jab_us = mysqli_fetch_array($dq_jab_us);
												?>
												<td colspan="3"><?= $rdq_jab_us['nama_jabatans'] ?> (<?= $rdq_jab_us['nama_jenjang'] ?>)</td>
											</tr>
											<?php
											if ($row_dos['jabatan_no'] <> 31) {
												$q_ak_lama = "SELECT
								  a.`dosen_no`,
								  a.`no`,
								  a.`jabatan_no`,
								  b.`nama_jabatans`,
								  b.`kum`,
								  a.`jabatan_tgl`,
								  a.`jenjang_id_lama`,
								  c.`nama_jenjang`,
								  c.`ak`
								FROM
								  `usulans` AS a,
								  `jabatans` AS b,
								  `jenjangs` AS c
								WHERE a.`dosen_no`= '$row_dos[no]'
								  AND a.`jabatan_no`=b.`kode`
								  AND a.`jenjang_id_lama`=c.`id`
								  AND a.no='$no'";
											} else {
												$q_ak_lama = "SELECT
								a.`no`,
								a.`jabatan_no`,
								a.`jenjang_id`,
								b.`nama_jabatans`,
								b.`kum`,
								c.`nama_jenjang`,
								c.`ak`,
								a.`jabatan_tgl` 
							FROM
								`dosens` AS a,
								`jabatans` AS b,
								`jenjangs` AS c 
							WHERE
								a.`no` = '$row_dos[no]' 
								AND a.`jabatan_no` = b.`kode` 
								AND a.`jenjang_id` = c.`id`";
											}
											$d_ak_lama = mysqli_query($koneksi, $q_ak_lama);
											$r_ak_lama = mysqli_fetch_array($d_ak_lama);
											?>
											<tr>
												<td colspan="2">Angka Kredit</td>
												<td colspan="2"><?= $r_ak_lama['kum'] ?></td>
												<?php
												$q_ak_baru = "SELECT
							  a.`no`,
							  b.`jenjang_id`,
							  c.`nama_jabatans`,
							  c.`kum`,
							  d.`nama_jenjang`,
							  d.`ak`,
							  a.`jabatan_tgl`
							FROM
							  `usulans` AS a,
							  `jabatan_jenjangs` AS b,
							  `jabatans` AS c,
							  `jenjangs` AS d
							WHERE a.`no` = '$no'
							  AND a.`jabatan_usulan_no` = b.`no`
							  AND b.`jabatan_kode` = c.`kode`
							  AND b.`jenjang_id` = d.`id`";
												$d_ak_baru = mysqli_query($koneksi, $q_ak_baru);
												$r_ak_baru = mysqli_fetch_array($d_ak_baru);
												?>
												<td colspan="3"><?= $r_ak_baru['kum'] ?> </td>
											</tr>
											<tr>
												<th colspan="2">A.K. Yang Dibutuhkan</th>
												<th colspan="5">
													<?php
													$dasar = $r_ak_baru['kum'] - $r_ak_lama['kum'];

													if ($r_ak_lama['kum'] == 0) //jika nilai kum lama = 0
													{
														// $pendidikan = nilai angka kredit dari table jenjangs jabatan_usulan_no 
														$pendidikan = $r_ak_baru['ak'];
													} else {
														//jika jejang_id pada dosens = jenjang_id pada usulans
														if ($r_ak_lama['jenjang_id'] == $r_ak_baru['jenjang_id']) {
															$pendidikan = 0;
														} else {
															$pendidikan = $r_ak_baru['ak'] - $r_ak_lama['ak'];
														}
													}

													$kebutuhan = $dasar - $pendidikan;
													if ($kebutuhan <= 0) {
														$kebutuhan = 10;
													} elseif ($pendidikan <= 0) {
														$kebutuhan = $dasar;
													}

													//jika nilai kum lama = 0
													if ($r_ak_lama['kum'] == '0') {
														echo $kebutuhan;
													} elseif ($pendidikan > 0) {
														echo '(' . $r_ak_baru['kum'] . '-' . $r_ak_lama['kum'] . ') -' . $pendidikan . ' = ' . $kebutuhan;
													} else {
														echo $r_ak_baru['kum'] . '-' . $r_ak_lama['kum'] . ' = ' . $kebutuhan;
													}
													?>
												</th>
											</tr>
											<th colspan="7" class="text-center">UNSUR YANG DINILAI</th>
											<tr class="text-center">
												<th class="text-center" rowspan="2" style="vertical-align: middle;">NO</th>
												<th class="text-center" colspan="3" rowspan="2" style="vertical-align: middle;">BIDANG</th>
												<th class="text-center" rowspan="2" style="vertical-align: middle;">PERS(%)</th>
												<th class="text-center" colspan="2">ANGKA KREDIT</th>
											</tr>
											<tr class="text-center">
												<th class="text-center" style="vertical-align: middle;">A.K. YANG<br>DIBUTUHKAN</th>
												<th class="text-center" style="vertical-align: middle;">A.K. USULAN</th>
											</tr>
											<?php
											$q_persen = "SELECT
							  a.`no`,
							  a.`jabatan_usulan_no`,
							  b.`jabatan_kode`,
							  c.`kum`,
							  c.`nama_jabatans`,
							  c.`pa`,
							  c.`pb`,
							  c.`pc`,
							  c.`pd`
							FROM
							  `usulans` AS a,
							  `jabatan_jenjangs` AS b,
							  `jabatans` AS c
							 WHERE a.`no`='$no'
							 AND a.`jabatan_usulan_no`=b.`no`
							 AND b.`jabatan_kode`=c.`kode`";
											$d_persen = mysqli_query($koneksi, $q_persen);
											$r_persen = mysqli_fetch_array($d_persen);
											?>

											<?php
											$kat_1 = "SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$no'
						  AND a.`dupak_kategori_id` = '1'";
											$d_kat_1 = mysqli_query($koneksi, $kat_1);
											while ($r_kat_1 = mysqli_fetch_array($d_kat_1)) {
												$kum_baru_kat_1 += $r_kat_1['kum_usulan_baru'];
											}
											?>
											<tr>
												<td class="text-center">1</td>
												<td colspan="3">Bidang Ijazah/Pendidikan dan pelatihan Prajabatan</td>
												<td class="text-center">-</td>
												<td class="text-center">-</td>
												<td class="text-center"><?= $kum_baru_kat_1 ?></td>
											</tr>

											<?php
											$kat_2 = "SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$no'
						  AND a.`dupak_kategori_id` = '2'";
											$d_kat_2 = mysqli_query($koneksi, $kat_2);
											while ($r_kat_2 = mysqli_fetch_array($d_kat_2)) {
												$kum_baru_kat_2 += $r_kat_2['kum_usulan_baru'];
											}
											$k = $r_persen['pa'] * 0.01 * $kebutuhan;
											?>
											<tr>
												<td class="text-center">2</td>
												<td colspan="3">Bidang Pengajaran</td>
												<td class="text-center">>= <?= $r_persen['pa'] ?>%</td>
												<td class="text-center">>= <?= $k ?></td>
												<?php if ($kum_baru_kat_2 < $k) {
												?>
													<td class="text-center" style="background-color: #db2828;"><?= $kum_baru_kat_2 ?></td>
												<?php
												} else { ?>
													<td class="text-center"><?= $kum_baru_kat_2 ?></td>
												<?php
												} ?>
											</tr>


											<?php
											$kat_3 = "SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$no'
						  AND a.`dupak_kategori_id` = '3'";
											$d_kat_3 = mysqli_query($koneksi, $kat_3);
											while ($r_kat_3 = mysqli_fetch_array($d_kat_3)) {
												$kum_baru_kat_3 += $r_kat_3['kum_usulan_baru'];
											}
											$k = $r_persen['pb'] * 0.01 * $kebutuhan;
											?>
											<tr>
												<td class="text-center">3</td>
												<td colspan="3">Bidang Penelitian</td>
												<td class="text-center">>= <?= $r_persen['pb'] ?>%</td>
												<td class="text-center">>= <?= $k ?></td>
												<?php if ($kum_baru_kat_3 < $k) {
												?>
													<td class="text-center" style="background-color: #db2828;"><?= $kum_baru_kat_3 ?></td>
												<?php
												} else { ?>
													<td class="text-center"><?= $kum_baru_kat_3 ?></td>
												<?php
												} ?>
											</tr>

											<?php
											$kat_4 = "SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$no'
						  AND a.`dupak_kategori_id` = '4'";
											$d_kat_4 = mysqli_query($koneksi, $kat_4);
											while ($r_kat_4 = mysqli_fetch_array($d_kat_4)) {
												$kum_baru_kat_4 += $r_kat_4['kum_usulan_baru'];
											}
											$k = $r_persen['pc'] * 0.01 * $kebutuhan;
											?>
											<tr>
												<td class="text-center">4</td>
												<td colspan="3">Bidang Pengabdian pada Masyarakat</td>
												<td class="text-center">
													<= <?= $r_persen['pc'] ?>%</td>
												<td class="text-center">
													<= <?= $k ?></td>
														<?php if ($kum_baru_kat_4 == 0) {
														?>
												<td class="text-center" style="background-color: #db2828;"><?= $kum_baru_kat_4 ?></td>
											<?php
														} else { ?>
												<td class="text-center"><?= $kum_baru_kat_4 ?></td>
											<?php
														} ?>
											</tr>


											<?php
											$kat_5 = "SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$no'
						  AND a.`dupak_kategori_id` = '5'";
											$d_kat_5 = mysqli_query($koneksi, $kat_5);
											while ($r_kat_5 = mysqli_fetch_array($d_kat_5)) {
												$kum_baru_kat_5 += $r_kat_5['kum_usulan_baru'];
											}
											$k = $r_persen['pd'] * 0.01 * $kebutuhan;
											?>
											<tr>
												<td class="text-center">5</td>
												<td colspan="3">Bidang Penunjang</td>
												<td class="text-center">
													<= <?= $r_persen['pd'] ?>%</td>
												<td class="text-center">
													<= <?= $k ?></td>
														<?php if ($kum_baru_kat_5 == 0) {
														?>
												<td class="text-center" style="background-color: #db2828;"><?= $kum_baru_kat_5 ?></td>
											<?php
														} else { ?>
												<td class="text-center"><?= $kum_baru_kat_5 ?></td>
											<?php
														} ?>
											</tr>



											<tr class="text-center">
												<th colspan="5" class="text-center">USULAN ANGKA KREDIT</th>
												<th colspan="2" class="text-center">ANGKA KREDIT</th>
											</tr>
											<?php
											$kat_total = "SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$no'
						  AND a.`dupak_kategori_id` IN('2','3','4','5')";
											$d_kat_total = mysqli_query($koneksi, $kat_total);
											while ($r_kat_total = mysqli_fetch_array($d_kat_total)) {
												$kum_baru_kat_total += $r_kat_total['kum_usulan_baru'];
											}

											$kurang = $kebutuhan - $kum_baru_kat_total;

											if ($kurang <= 0) {
												$kurang = 0;
											}
											?>
											<tr>
												<td colspan="5">Jumlah Angka Kredit diluar Ijazah/Pendidikan dan pelatihan Prajabatan</td>
												<td colspan="2" class="text-center"><?= $kum_baru_kat_total ?></td>
											</tr>
											<tr>
												<td colspan="5">Jumlah Kekurangan Angka Kredit</td>
												<td colspan="2" class="text-center"><?= $kurang ?> </td>
											</tr>
										</tbody>
									</table>
								</div>

								<div class="clearfix">&nbsp;</div>
							</div>
						</div>
					</div>
					<!---------------------------batas akhir konten-------------------------------------------->

				</div>
			</div>
		</div>
	</main>

	<!-- Essential javascripts for application to work-->
	<script src="<?= base_url() ?>assets/vali-admin/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/vali-admin/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/vali-admin/js/plugins/sweetalert.min.js"></script>
	<script src="<?= base_url() ?>assets/vali-admin/js/plugins/bootstrap-notify.min.js"></script>
	<script src="<?= base_url() ?>assets/vali-admin/js/main.js"></script>

	<!-- Semantic UI Plugin -->
	<script type="text/javascript" src="<?= base_url() ?>assets/semantic/semantic.min.js"></script>

	<!-- The javascript plugin to display page loading on top-->
	<script src="<?= base_url() ?>assets/vali-admin/js/plugins/pace.min.js"></script>

</body>

</html>