<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PRINT DUPAK dua | LLDikti Wilayah III</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Favicon -->
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

	<!-- <style type="text/css">
		@media print {
			@page {
				size: auto;
				size: A3;
				margin: 0mm;
			}
		}
	</style> -->
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
								<h3 class="text-center">DAFTAR USUL PENETAPAN ANGKA KREDIT<br>JABATAN AKADEMIK DOSEN </h3>
								<div class="clearfix">&nbsp;
								</div><?php
										date_default_timezone_set('Asia/Jakarta');
										$query_dosens = "SELECT
						  b.`no`,
						  b.`nama`,
						  b.`jk`,
						  b.`karpeg`,
						  b.`lahir_tempat`,
						  b.`lahir_tgl`,
						  b.`gelar_depan`,
						  b.`gelar_belakang`,
						  b.`nip`,
						  b.`nidn`,
						  a.`tmt_tahun`,
						  a.`tmt_bulan`,
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
										$data_dos = mysqli_query($koneksi, $query_dosens);
										$row_dos = mysqli_fetch_array($data_dos);

										date_default_timezone_set('Asia/Jakarta');
										function tgl_indo($tanggal)
										{
											$bulan = array(
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
											return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
										}

										?><div class="row">
									<div class="col-md-6">INSTANSI : <strong><?= $row_dos['nama_instansi'] ?></strong></div>
									<div class="col-md-6"><strong>MASA PENILAIAN :</strong><br>s/d </div>
								</div>
								<div class="table-responsive">
									<table id="table-header" class="cust-table cust-table-bordered">
										<col width="30" />
										<col width="150" />
										<col width="350" />
										<tbody>
											<tr class="text-center">
												<th class="text-center">NO</th>
												<th colspan="2" class="text-center">KETERANGAN PERORANGAN</th>
											</tr>
											<tr>
												<td class="text-center">1</td>
												<td>Nama</td>
												<td><?= $row_dos['gelar_depan'] ?><?= $row_dos['nama'] ?>,
													<?= $row_dos['gelar_belakang'] ?></td>
											</tr>
											<tr>
												<td class="text-center">2</td>
												<td>NIP/NIK/NIDN</td>
												<td><?= $row_dos['nip'] ?>/ <?= $row_dos['nidn'] ?></td>
											</tr>
											<tr>
												<td class="text-center">3</td>
												<td>Nomor Seri Kartu Pegawai</td>
												<td><?= $row_dos['karpeg'] ?></td>
											</tr>
											<tr>
												<td class="text-center">4</td>
												<td>Tempat dan Tanggal Lahir</td>
												<td><?= $row_dos['lahir_tempat'] ?>,
													<?= tgl_indo($row_dos['lahir_tgl']) ?></td>
											</tr>
											<tr>
												<td class="text-center">5</td>
												<td>Jenis Kelamin</td>
												<td><?php
													if ($row_dos['jk'] == 'L') {
														echo 'Laki-laki';
													} else {
														echo 'Perempuan';
													}
													?></td>
											</tr><?php
													$q_cari_jab = "SELECT
								  a.`no`,
								  a.`nidn`,
								  a.`nama`,
								  a.`jenjang_id`,
								  c.`nama_jenjang`,
								  a.`jabatan_no`,
								  b.`nama_jabatans`,
								  b.`kum`,
								  a.`jabatan_tgl`
								FROM
								  dosens AS a,
								  `jabatans` AS b,
								  `jenjangs` AS c
								WHERE a.`no` = '$row_dos[no]'
								  AND a.`jabatan_no` = b.`kode`
								  AND a.`jenjang_id` = c.`id`";
													$dq_cari_jab = mysqli_query($koneksi, $q_cari_jab);
													$rdq_cari_jab = mysqli_fetch_array($dq_cari_jab);
													?><tr>
												<td class="text-center">6</td>
												<td>Pendidikan Yang Diperhitungkan Angka Kreditnya</td>
												<td><?= $rdq_cari_jab['nama_jenjang'] ?></td>
											</tr>
											<tr>
												<td class="text-center">7</td>
												<td>Jabatan Akademik Dosen/TMT</td>
												<td><?= $rdq_cari_jab['nama_jabatans'] ?>(<?= $rdq_cari_jab['kum'] ?>),
													<?= tgl_indo($rdq_cari_jab['jabatan_tgl']) ?></td>
											</tr>
											<!-- <tr>
												<td class="text-center">8</td>
												<td>Masa Kerja Golongan Lama</td>
												<td><?= $row_dos['tmt_tahun'] ?>Tahun <?= $row_dos['tmt_tahun'] ?>Bulan</td>
												</tr>
												<tr>
													<td class="text-center">9</td>
													<td>Masa Kerja Golongan Baru</td>
													<td></td>
												</tr>-->
											<tr>
												<td class="text-center">8</td>
												<td>Unit Kerja</td>
												<td>Program Studi <?= $row_dos['nama_prodi'] ?>Pada <?= $row_dos['nama_instansi'] ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="clearfix">&nbsp;
								</div>
								<div class="table-responsive">
									<table id="table-bidang" class="cust-table cust-table-bordered">
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
												<th rowspan="4" class="text-center" style="vertical-align: middle;">KET </th>
											</tr>
											<tr class="text-center">
												<th colspan="5" rowspan="3" class="text-center" style="vertical-align: middle;">UNSUR,
													SUB UNSUR DAN BUTIR KEGIATAN</th>
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
										</thead><?php include "print_dupak_total_a2.php"; ?><?php include "print_dupak_total_b2.php"; ?><?php include "print_dupak_total_c2.php"; ?><?php include "print_dupak_total_d2.php"; ?><?php
																																																								$sql_total = "SELECT
									SUM(`kum_usulan_lama`) AS kum_lama,
									SUM(`kum_usulan_baru`) AS kum_baru
								FROM
									usulan_dupaks
								WHERE usulan_no = '$no_usulan'";
																																																								$data_total = mysqli_query($koneksi, $sql_total);
																																																								$data_kum_total = mysqli_fetch_array($data_total);
																																																								$jmlah_kum = $data_kum_total['kum_lama'] + $data_kum_total['kum_baru'];
																																																								?><tbody>
											<tr style="background-color: #e4e4e4; font-weight: bold;">
												<td colspan="6" class="text-right"><b>TOTAL (UNSUR UTAMA + UNSUR PENUNJANG)</b></td>
												<td style="vertical-align: middle;" class="text-center"><?= $data_kum_total['kum_lama'] ?></td>
												<td style="vertical-align: middle;" class="text-center"><?= $data_kum_total['kum_baru'] ?></td>
												<td style="vertical-align: middle;" class="text-center"><?= $jmlah_kum ?></td>
												<td style="vertical-align: middle;" class="text-center"></td>
												<td style="vertical-align: middle;" class="text-center"></td>
												<td style="vertical-align: middle;" class="text-center"></td>
												<td></td>
										</tbody>
										</tr>
									</table>
								</div>
								<div class="clearfix">&nbsp;
								</div>
								<div class="table-responsive">
									<table id="table-header" class="cust-table cust-table-bordered">
										<col width="30" />
										<col width="350" />
										<col width="350" />
										<tbody>
											<tr>
												<th class="text-center">VI</th>
												<th colspan="2">LAMPIRAN PENDUKUNG DUPAK :</th>
											</tr>
											<tr>
												<td class="text-center"></td>
												<td>
													<ol>
														<li>Surat Pernyataan Telah Melaksanakan Kegiatan Pendidikan</li>
														<li>Surat Pernyataan Telah Melakukan Kegiatan Pengajaran</li>
														<li>Surat Pernyataan Telah Melakukan Kegiatan Penelitian</li>
														<li>Surat Pernyataan Telah Melakukan Kegiatan Pengabdian Kepada Masyarakat</li>
														<li>Surat Pernyataan Melakukan Kegiatan Penunjang</li>
													</ol>
												</td><?php
														$query_pimpinan = "SELECT
										  a.`pimpinan_nama`,
										  a.`pimpinan_nip`,
										  a.`pimpinan_nidn`,
										  a.`pimpinan_jabatan`,
										  a.`pimpinan_unit_kerja`,
										  a.tgl_surat,
										  a.`tempat_surat`,
										  b.`japim`
										FROM
										  usulans AS a,
										  reff_japim AS b
										WHERE a.`no` = '$no_usulan'
										  AND a.pimpinan_jabatan = b.`id`";
														$data_pim = mysqli_query($koneksi, $query_pimpinan);
														$row_pim = mysqli_fetch_array($data_pim);
														?><td class="text-center"><?= $row_pim['tempat_surat'] ?>,
													<?= tgl_indo($row_pim['tgl_surat']) ?><br>&nbsp;
													<strong><?= $row_pim['japim'] ?><?= $row_dos['nama_instansi'] ?></strong><br>&nbsp;
													<br>&nbsp;
													<br>&nbsp;
													<br>&nbsp;
													<br>&nbsp;
													<strong><?= $row_pim['pimpinan_nama'] ?></strong><br>NIDN/NIP/NIK. <?= $row_pim['pimpinan_nidn'] ?>/<?= $row_pim['pimpinan_nip'] ?>
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