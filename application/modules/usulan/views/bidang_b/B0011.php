<?php
error_reporting(0);
include "koneksi.php";
$kum = "1";
$volum = "1";

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
		  SUM(angka_kredit) AS ak_bidb
		FROM
		  `usulan_dupak_details`
		WHERE `usulan_no` = '$no'
		  AND `dupak_no` ='B0011'";
$d_ak_b = mysqli_query($koneksi, $ak_b);
$r_ak_b = mysqli_fetch_array($d_ak_b);
$r_akb = $r_ak_b['ak_bidb'];

//Hitung kebutuhan AK Bidang B Penelitian
$bid_b = $r_ak_baru['pb'] * 0.01 * $kebutuhan;
$maks_bid_b_5 = $bid_b * 0.05;
?>
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
					Dalam koran / majalah populer/umum
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
						</tr>
						<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
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
						</tr>
						<tr class="text-center">
							<?php if ($usulan_status_id <> '1' && $usulan_status_id <> '2') {
								echo "<td></td><td></td>";
							} else { ?>
								<td>

								</td>
								<td>
									<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah" class="btn btn-success"><i class="fa fa-plus-square"> TAMBAH</i>
									</a>
								</td>
							<?php } ?>
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
					<div class="table-responsive m-t-40">
						<form method="post" action="<?= base_url() ?>usulan/usulan_dupak_b/update_peer/<?= $dupak_no ?>" role="form" enctype="multipart/form-data">
							<table border="1" class="ui celled table" width="100%">
								<thead>
									<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
										<th>Judul</th>
										<th>Semester</th>
										<th>Tanggal</th>
										<th>URL Dokumen</th>
										<th>Keterangan</th>
										<th>Jumlah Penulis</th>
										<th>Penulis Ke</th>
										<th>Satuan Hasil</th>
										<th>Angka Kredit</th>
										<th>Bukti Fisik</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($q3->result() as $row) { ?>
										<tr class="text-center">
											<td><?= $row->uraian ?></td>
											<td><?= $row->semester ?> <?= $row->tahun_akademik ?>/<?= $row->thn_akademik_baru ?></td>
											<td><?= $row->tgl ?></td>
											<td><a href="<?= $row->url ?>" target="_blank"><?= $row->url ?></a>
												<!-- URL Peer Review : <a href="<?= $row->url_peer ?>" target="_blank"><?= $row->url_peer ?></a><br> -->
											</td>
											<td><?= $row->keterangan ?></td>
											<td><?= $row->jml_penulis ?></td>
											<td><?= $row->penulis_ke ?></td>
											<td><?= $row->satuan_hasil ?></td>
											<td><?= $row->angka_kredit ?></td>
											<td><a href="<?= base_url() ?>usulan/usulan_dupak_b/download_bidangb/<?= $row->berkas ?>" class="btn  btn-success"><i class="fa  fa-cloud-download"></i>[PDF]</a></td>
											<td>
												<?php if ($usulan_status_id <> '1' && $usulan_status_id <> '2') {
												} else { ?>

													<a href="#" title="Ubah" data-toggle="modal" data-target="#edit<?= $row->no ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a><br>

													<a href="<?= base_url() ?>usulan/usulan_dupak_b/hapus_B0005/<?= $row->no ?>/<?= $row->usulan_no ?>/<?= $row->berkas ?>/<?= $row->dupak_no ?>" class="btn btn-danger tombol-hapus">
														<i class="fa fa-trash-o"></i></a>

												<?php } ?>
											</td>
										</tr>
										<?php
										if ($role == '1') {
										?>
											<tr style="background-color:#FFFF00; font-weight: bold;">
												<td colspan="9">
													Catatan Tim Penilai:
													<textarea class="form-control" rows="4"><?= $row->kum_penilai_keterangan ?></textarea>
												</td>
												<td>
													AK Tim Penilai:
													<input type="text" class="form-control" value="<?= $row->kum_penilai ?>">
												</td>
											</tr>
										<?php
										}
										if ($role == '4') {
										?>
											<tr style="background-color: #e3ffeb; font-weight: bold;">
												<td colspan="2">
													Validasi Nilai Angka Kredit
													<input type="hidden" name="no[]" value=<?= $row->no ?>>
													<input type="hidden" name="no_usulan" value=<?= $q1->usulan_no ?>>
												</td>
												<td colspan="3">
													Angka Kredit dari dosen <br><br>
													<input type="number" value="<?= $row->ak_peer_dosen ?>" style="width:100px;" readonly>
													<input type="hidden" name="kum" value="<?= $kum ?>" required>
												</td>
												<td style="min-width: 50px" colspan="7">
													Angka Kredit<br>Setelah Validasi (Maks. <?= $kum ?>)<br>
													<input type="text" style="width:100px;" value="<?= $row->angka_kredit ?>" name="ak_validasi[]" class="form-control" id="numberbox" required><br>
													<code>*Gunakan tanda titik (.) jika bilangan desimal</code>
												</td>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
							<tr class="text-center">
								<?php
								if ($role == '4') {
									if ($usulan_status_id <> '10') {
									} else { ?><center><button type="submit" class="btn btn-warning">SIMPAN VALIDASI</button></center><?php }
																																}
																																		?>
							</tr>
						</form>
					</div>
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
					<a href="<?= base_url() ?>usulan/usulan/bidangB/<?= $no ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
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
			<form method="post" action="<?= base_url() ?>usulan/usulan_dupak_b/tambah_B0011/<?= $dupak_no ?>/<?= $kum ?>" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>Bidang B</h3>
					<b>Menghasilkan karya ilmiah hasil penelitian atau pemikiran yang dipublikasikan</b><br>
					Dalam koran / majalah populer/umum
					<hr>

					<input type="text" name="maks_bid_b_5" value=<?= $maks_bid_b_5 ?>>
					<input type="text" name="jabatan_usulan_no" value=<?= $jabatan_usulan_no ?>>
					<input type="text" name="r_akb" value=<?= $r_akb ?>>

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
									<?php if ($jabatan_no <> '31') {
										$thn_jab_mulai = substr($jabatan_tgl, 0, 4) - 1;
										$thn_jab = substr($jabatan_tgl, 0, 4);
										$thn_now = date('Y');
										$thn = $thn_now - $thn_jab; ?><option value="<?= $thn_jab_mulai ?>"><?= $thn_jab_mulai ?></option><?php for ($i = 0; $i <= $thn; $i++) { ?><option value="<?= $thn_jab ?>"><?= $thn_jab ?></option><?php $thn_jab++;
																																																										}
																																																									} else {
																																																										$thn_jab_mulai = substr($pengangkatan_tgl, 0, 4) - 1;
																																																										$thn_jab = substr($pengangkatan_tgl, 0, 4);
																																																										$thn_now = date('Y');
																																																										$thn = $thn_now - $thn_jab; ?><option value="<?= $thn_jab_mulai ?>"><?= $thn_jab_mulai ?></option> <?php for ($i = 0; $i <= $thn; $i++) { ?><option value="<?= $thn_jab ?>"><?= $thn_jab ?></option><?php $thn_jab++;
																																																																																																										}
																																																																																																									} ?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="uraian">Judul</label>
								<textarea name="uraian" class="form-control" id="uraian" rows="2" required></textarea>
								<input type="hidden" name="no_usulan" value="<?= $no ?>" required>
								<input type="hidden" name="kum" value="<?= $kum ?>" required>
								<input type="hidden" name="volum" value="<?= $volum ?>" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="jp">Jumlah Penulis</label>
								<input type="number" name="jp" min="1" max="15" style="width:70px;" class="form-control" id="jp" required>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="pk">Penulis ke</label>
								<input type="number" name="pk" min="1" max="15" style="width:70px;" class="form-control" id="pk" required>
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
							<label for="jp">Angka Kredit (Maks. <?= $kum ?>)</label>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" name="np" placeholder="Gunakan angka" class="form-control" id="np">
								<code>*Gunakan tanda titik (.) jika bilangan desimal</code>
							</div>
						</div>
					</div>

					<input type="hidden" name="isbn" class="form-control" required>
					<input type="hidden" name="url_web" class="form-control" placeholder="https://ojs.com/Jurnal.pdf">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="url">URL Dokumen</label>
								<div class="input-group date">
									<input type="text" name="url" class="form-control" placeholder="https://repository.com/Jurnal.pdf" required>
								</div>
								<code>*Alamat menuju repository berisi dokumen yang meliputi : sampul prosiding, informasi dewan redaksi/editor/steering committe dan panitia pelaksana, daftar isi, artikel dan sertifikat/pasport(jika tidak ada sertifikat)</code>
							</div>
						</div>
					</div>

					<!-- <div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="url">URL Peer Review</label>
								<div class="input-group date">
									<input type="text" name="url_peer" class="form-control" placeholder="https://repository.com/Jurnal.pdf">
								</div>
								<code>*URL menuju dokumen peer review (direct link).</code>
							</div>
						</div>
					</div> -->

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="uraian">Keterangan (Optional)</label>
								<textarea name="keterangan" class="form-control" id="uraian" rows="2"></textarea>
								<code>*Keterangan tambahan, misalnya apabila URL dokumen terproteksi, berikan informasi password disini.</code>
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


<!-- Modal Edit-->
<?php foreach ($q3->result() as $row) { ?>
	<div class="modal fade" aria-labelledby="myLargeModalLabel" id="edit<?= $row->no; ?>">

		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
				</div>
				<form method="post" action="<?= base_url() ?>usulan/usulan_dupak_b/update_b0004/<?= $dupak_no ?>" role="form" enctype="multipart/form-data">
					<div class="modal-body">
						<h3>Bidang B</h3>
						<b>Menghasilkan karya ilmiah hasil penelitian atau pemikiran yang dipublikasikan</b><br>
						Dalam koran / majalah populer/umum
						<hr>

						<input type="hidden" name="maks_bid_b_5" value=<?= $maks_bid_b_5 ?>>
						<input type="hidden" name="jabatan_usulan_no" value=<?= $jabatan_usulan_no ?>>
						<input type="hidden" name="r_akb" value=<?= $r_akb ?>>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="tahun_akademik">Semester</label>
									<input type="semester" name="semester" value="<?= $row->semester ?> <?= $row->tahun_akademik ?>/<?= $row->thn_akademik_baru ?>" class="form-control" id="semester" maxlength="150" readonly>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="jp">Jumlah Penulis</label>
									<input type="number" name="jp" class="form-control" id="jp" value=<?= $row->jml_penulis ?>>
									<input type="hidden" name="volum" value=<?= $volum ?>>
									<input type="hidden" name="kum" value=<?= $kum ?>>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="pk">Penulis ke</label>
									<input type="number" name="pk" class="form-control" id="pk" value=<?= $row->penulis_ke ?>>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="uraian">Judul</label>
									<textarea name="uraian" class="form-control" id="uraian" rows="2" required><?= $row->uraian ?></textarea>
									<input type="hidden" name="no_usulan" value="<?= $no ?>" required>
									<input type="hidden" name="no_usulan_dupak_details" value="<?= $row->no ?>" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="tgl">Tanggal</label>
									<div class="input-group date">
										<input type="date" name="tgl" value="<?= $row->tgl ?>" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd" required>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="satuan_hasil">Satuan Hasil</label>
									<input type="text" name="satuan_hasil" class="form-control" id="satuan_hasil" maxlength="150" value="<?= $row->satuan_hasil ?>" required>
								</div>
							</div>
						</div>
						<!-- <div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="jp">Angka Kredit (Maks. <?= $kum ?>)</label>
									<input type="text" value="<?= $row->angka_kredit ?>" name="np" placeholder="Gunakan angka" class="form-control" id="np">
									<code>*Gunakan tanda titik (.) jika bilangan desimal</code>
								</div>
							</div>
						</div> -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="url">URL Dokumen</label>
									<div class="input-group date">
										<input type="text" name="url" class="form-control" value="<?= $row->url ?>" placeholder="https://repository.com/Jurnal.pdf" required>
									</div>
									<code>*Alamat menuju repository berisi dokumen yang meliputi : sampul prosiding, informasi dewan redaksi/editor/steering committe dan panitia pelaksana, daftar isi, artikel dan sertifikat/pasport(jika tidak ada sertifikat)</code>
								</div>
							</div>
						</div>

						<!-- <div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="url">URL Peer Review</label>
									<div class="input-group date">
										<input type="text" name="url_peer" class="form-control" value="<?= $row->url_peer ?>" placeholder="https://repository.com/Jurnal.pdf">
									</div>
									<code>*URL menuju dokumen peer review (direct link).</code>
								</div>
							</div>
						</div> -->

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="uraian">Keterangan (Optional)</label>
									<textarea name="keterangan" class="form-control" id="uraian" rows="2"><?= $row->keterangan ?></textarea>
									<code>*Keterangan tambahan, misalnya apabila URL dokumen terproteksi, berikan informasi password disini.</code>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="berkas">Berkas Upload</label>
									<input type="hidden" name="old_pict" value="<?= $row->berkas ?>" class="form-control">
									<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
									<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<div class="btn-group pull-right">
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php } ?>