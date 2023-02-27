<?php
error_reporting(0);
include "koneksi.php";
?>
<!-- Style to set the size of checkbox -->
<style>
	input.largerCheckbox {
		width: 20px;
		height: 20px;
	}
</style>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor"></h4>
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
					<h3>Kegiatan Tambahan LK/GB</h3>
					<b>Membimbing Doktor</b><br>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				
					<table border="1" class="ui celled table" width="100%">
						<thead>
							<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
								<th>Semester</th>
								<th colspan="2">Uraian Kegiatan</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($q3->result() as $row) { ?>
								<tr class="text-center">
									<td><?= $row->semester ?> <?= $row->tahun_akademik ?>/<?= $row->thn_akademik_baru ?></td>
									<td colspan="2"><?= $row->uraian ?></td>
								</tr>
								<?php
								if (($row->kum_penilai <> 0 && $row->kunci == '1') && ($row->kum_penilai_keterangan == '' || $row->kum_penilai_keterangan <> '')) {
									$cek = "checked";
								} elseif (($row->kum_penilai == '0' && $row->kunci == '1') && ($row->kum_penilai_keterangan == '' || $row->kum_penilai_keterangan <> '')) {
									$cek = "";
								}

								if ($row->kunci == '1') {
									$warna = "#FFFF00";
								} else {
									$warna = "#e3ffeb";
								}

								$q_penilai = "SELECT
													a.`user_penilai_no`,
													b.`nama`
													FROM
													`usulans` AS a,
													`users` AS b
													WHERE a.`user_penilai_no` = b.`no`
													AND a.`no`='$no'";
								$d_penilai = mysqli_query($koneksi, $q_penilai);
								$r_penilai = mysqli_fetch_array($d_penilai);
								?>
								<tr style="background-color: <?= $warna ?>; font-weight: bold;">
									<td>
										FORM PENILAIAN:
										<br><i>Dilakukan penilaian oleh <?= $r_penilai['nama'] ?>
											<input type="text" name="user_penilai_no[]" value=<?= $r_penilai['user_penilai_no'] ?>>
											<input type="text" name="no_usulan" value=<?= $q1->usulan_no ?>>
											<input type="text" name="sms[]" value="<?= $row->no ?>">
									</td>
									<td>
										KETERANGAN:
										<textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?= $row->kum_penilai_keterangan ?></textarea>
									</td>
									<td style="min-width: 50px">
										PENILAIAN<br>TIM PENILAI:<br>
										
										<label class="custom-control-label" for="customCheck1">diterima 1,<?= $row->no ?></label>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<tr class="text-center">
						<?php if ($usulan_status_id <> '5') {
						} else { ?><center><a href="<?= base_url() ?>ketenagaan/Usulan_dupak_e/hapus_E0001/<?= $q_dupak->dupak_no ?>/<?= $q_dupak->usulan_no ?>" class="btn btn-danger">RESET PENILAIAN</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">SIMPAN PENILAIAN</button></center><?php } ?>
					</tr>
				
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="tile">
					<a href="<?= base_url() ?>ketenagaan/ketenagaan/show/<?= $no ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
				</div>
			</div>
		</div>
	</div>
</div>