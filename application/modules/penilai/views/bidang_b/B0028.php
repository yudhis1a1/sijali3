<?php
error_reporting(0);
$kum = "5";
$volum = "1";
include "koneksi.php";

if ($jabatan_no <> '31') {
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
				WHERE a.`dosen_no`= '$dosen_no'
				  AND a.`jabatan_no`=b.`kode`
				  AND a.`jenjang_id_lama`=c.`id`";
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
				a.`no` = '$dosen_no' 
				AND a.`jabatan_no` = b.`kode` 
				AND a.`jenjang_id` = c.`id`";
}
$d_ak_lama = mysqli_query($koneksi, $q_ak_lama);
$r_ak_lama = mysqli_fetch_array($d_ak_lama);

$q_ak_baru = "SELECT
			  a.`no`,
			  b.`jenjang_id`,
			  c.`nama_jabatans`,
			  c.`kum`,
			  c.`pb`,
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

$ak_b = "SELECT
		  SUM(kum_penilai) AS ak_bidb
		FROM
		  `usulan_dupak_details`
		WHERE `usulan_no` = '$no'
		  AND `dupak_no` IN ('B0038', 'B0033','B0024','B0032','B0030','B0028')";

$d_ak_b = mysqli_query($koneksi, $ak_b);
$r_ak_b = mysqli_fetch_array($d_ak_b);

$r_akb 	= $r_ak_b['ak_bidb'];

//Hitung kebutuhan AK Bidang B Penelitian
$bid_b 			= $r_ak_baru['pb'] * 0.01 * $kebutuhan;
$maks_bid_b_25 	= $bid_b * 0.25;
?>
<style type="text/css">
	p {
		font-size: 17px;
	}
</style>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Bidang B</h4>
	</div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="tile">
					<h3>Bidang B</h3>
					<b>Menghasilkan karya ilmiah hasil penelitian atau pemikiran yang dipublikasikan</b><br>
					Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/ simposium/ lokakarya, tetapi dimuat dalam prosiding Nasional
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="tile">
					<h3>DUPAK Usulan</h3>
				</div>
				<table border="1" class="ui celled table" width="100%">
					<thead>
						<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
							<th colspan="3">ANGKA KREDIT MENURUT INSTANSI PENGUSUL</th>
							<th colspan="3">ANGKA KREDIT MENURUT PENILAI</th>
						</tr>
						<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
							<th>LAMA</th>
							<th>BARU</th>
							<th>JUMLAH</th>
							<th>LAMA</th>
							<th>BARU</th>
							<th>JUMLAH</th>
						</tr>
					</thead>
					<tbody>

						<tr class="text-center">
							<td><?= $q_dupak->kum_usulan_lama; ?></td>
							<td><?= $q_dupak->kum_usulan_baru; ?></td>
							<td><?= $q_dupak->kum_usulan_lama + $q_dupak->kum_usulan_baru; ?></td>
							<td><?= $q_dupak->kum_penilai_lama; ?></td>
							<td><?= $q_dupak->kum_penilai_baru; ?></td>
							<td><?= $q_dupak->kum_penilai_lama + $q_dupak->kum_penilai_baru; ?></td>
						</tr>

						<tr class="text-center">
							<td></td>
							<td></td>
							<td></td>
							<td>

							</td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>

			<?php
			if ($q3->row() > 0) {
			?>
				<div class="card-body">
					<div class="tile">
						<h3>Usulan Baru Untuk Penilaian</h3>
					</div>
					<form method="post" action="<?= base_url() ?>penilai/penilai_dupak_b/update_B0001/<?= $q_dupak->dupak_no ?>" role="form" enctype="multipart/form-data">

						<input type="hidden" name="maks_bid_b_25" value=<?= $maks_bid_b_25 ?>>
						<input type="hidden" name="r_akb" value=<?= $r_akb ?>>
						<input type="hidden" name="jabatan_usulan_no" value=<?= $jabatan_usulan_no ?>>

						<table class="ui celled table" width="100%" border="1">
							<?php
							$no_uj = "1";
							?>
							<?php foreach ($q3->result() as $row) { ?>
								<tr style="background-color: #e4e4e4; font-weight: bold;">
									<th colspan="2">
										<p>Data ke-<?= $no_uj ?></p>
										</td>
								</tr>
								<tr>
									<td>
										<p>Judul</p>
									</td>
									<td>
										<p><?= $row->uraian ?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Semester</p>
									</td>
									<td>
										<p><?= $row->semester ?> <?= $row->tahun_akademik ?>/<?= $row->thn_akademik_baru ?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Tanggal</p>
									</td>
									<td>
										<p><?= $row->tgl ?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>ISBN/ISSN</p>
									</td>
									<td>
										<p><?= $row->isbn ?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>URL</p>
									</td>
									<td>
										<p>
											URL Dokumen : <a href="<?= $row->url ?>" target="_blank"><?= $row->url ?></a><br>
											URL Peer Review : <a href="<?= $row->url_peer ?>" target="_blank"><?= $row->url_peer ?></a><br>
										</p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Keterangan</p>
									</td>
									<td>
										<p><?= $row->keterangan ?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Jumlah Penulis</p>
									</td>
									<td>
										<p><?= $row->jml_penulis ?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Penulis Ke</p>
									</td>
									<td>
										<p><?= $row->penulis_ke ?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Satuan Hasil</p>
									</td>
									<td>
										<p><?= $row->satuan_hasil ?></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Bukti fisik</p>
									</td>
									<td>
										<p><a href="<?= base_url() ?>usulan/usulan_dupak_b/download_bidangb/<?= $row->berkas ?>" target="blank" class="btn  btn-success"><i class="fa  fa-cloud-download"></i>[PDF]</a></p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Angka Kredit</p>
									</td>
									<td>
										<p><?= $row->angka_kredit ?></p>
									</td>
								</tr>
								<?php if ($row->kum_penilai <> 0) {
									$cek = "checked";
								} else {
									$cek = "";
								}
								if ($row->kunci == '1') {
									$warna = "#FFFF00";
								} else {
									$warna = "#e3ffeb";
								} ?><?php $q_penilai = "SELECT
						  a.`user_penilai_no`,
						  b.`nama`
						FROM
						  `usulans` AS a,
						  `users` AS b
						WHERE a.`user_penilai_no` = b.`no`
						AND a.`no`='$q1->usulan_no'";
									$d_penilai = mysqli_query($koneksi, $q_penilai);
									$r_penilai = mysqli_fetch_array($d_penilai);
									?>
								<tr style="background-color: <?= $warna ?>;font-weight: bold;">
									<td width="30%">
										<p>Penilaian<br>
											Dilakukan penilaian oleh <br><?= $r_penilai['nama'] ?>
											<input type="hidden" name="user_penilai_no[]" value=<?= $r_penilai['user_penilai_no'] ?>><br>
											<input type="hidden" name="no[]" value=<?= $row->no ?>><br>
											<input type="hidden" name="no_usulan" value=<?= $q1->usulan_no ?>>
									</td>
									<td>
										<p>
											KETERANGAN :<br>
											<textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?= $row->kum_penilai_keterangan ?></textarea><br><br>
											A.K. DARI<br>TIM PENILAI:<br>
											<input type="number" step="any" name="kum_penilai[]" class="form-control" value="<?= $row->kum_penilai ?>" min="0" required>
										</p>
									</td>
								</tr>
							<?php
								$no_uj++;
							}
							?>
						</table>
						<tr class="text-center">
							<?php if ($usulan_status_id <> '5') {
							} else { ?><center><a href="<?= base_url() ?>penilai/penilai_dupak_b/hapus_b0002/<?= $q_dupak->dupak_no ?>/<?= $q_dupak->usulan_no ?>" class="btn btn-danger">RESET PENILAIAN</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">SIMPAN PENILAIAN</button></center><?php } ?>
						</tr>
					</form>

				</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="tile">
					<a href="<?= base_url() ?>penilai/penilai/bidangB/<?= $no ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="tambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url() ?>usulan/usulan_dupak_b/tambah_B0005/B0028/<?= $kum ?>" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>Bidang B</h3>
					<b>Menghasilkan karya ilmiah hasil penelitian atau pemikiran yang dipublikasikan</b><br>
					Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/ simposium/ lokakarya, tetapi dimuat dalam prosiding Nasional
					<hr>


					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="semester">Semester</label><br>
								<select name="semester" class="form-control select2" style="width: 100%; " id="semester" data-placeholder="Click to Choose..." required>
									<option value=""></option>
									<option value="Ganjil">Ganjil</option>
									<option value="Genap">Genap</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="tahun_akademik">Tahun Dasar Akademik</label>
								<select name="thn_akademik" class="form-control select2" style="width: 100%;" id="thn_akademik" data-placeholder="Click to Choose..." required>
									<option value=""></option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="jp">Jumlah Penulis</label>
								<input type="number" name="jp" class="form-control" id="jp" required>
								<input type="hidden" name="volum" value=<?= $volum ?>>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="pk">Penulis ke</label>
								<input type="number" name="pk" class="form-control" id="pk" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="tgl">Tanggal</label>
								<div class="input-group date">
									<input type="date" name="tgl" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="satuan_hasil">Satuan Hasil</label>
								<input type="text" name="satuan_hasil" class="form-control" id="satuan_hasil" maxlength="150" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="uraian">Uraian Kegiatan</label>
								<textarea name="uraian" class="form-control" id="uraian" rows="2" required></textarea>
								<input type="hidden" name="no_usulan" value="<?= $no ?>" required>
								<input type="hidden" name="kum" value="<?= $kum ?>" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="url">URL</label>
								<div class="input-group date">
									<input type="text" name="url" class="form-control " id="url" required>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="url_index">URL Index</label>
								<input type="text" name="url_index" class="form-control" id="url_index" required>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="berkas">Berkas Upload</label>
								<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
								<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>