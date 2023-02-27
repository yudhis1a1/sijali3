<?php
error_reporting(0);
if ($usulan->jabatan_usulan_no == '6' || $usulan->jabatan_usulan_no == '3') {
	$dupak = "200";
	include "koneksi.php";
}
?>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Bidang A</h4>
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
					<h3>BIDANG A</h3>
					<b>Pendidikan Formal</b><br>
					Doktor (S3)
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

			if ($q1->no > 0) {

			?>
				<div class="card-body">
					<div class="tile">
						<h3>Usulan Baru Untuk Penilaian</h3>
					</div>
					<form method="post" action="<?= base_url() ?>penilai/penilai_dupak/update_ijazah/A0001" role="form" enctype="multipart/form-data">
						<table border="1" class="ui celled table" width="100%">
							<thead>
								<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
									<th>Perguruan Tinggi</th>
									<th>Bidang Ilmu</th>
									<th>Tanggal Penerbitan ijazah</th>
									<th>Angka Kredit</th>
									<th>File/Bukti</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$dap = $this->db->query("SELECT
														a.*,
														b.`disertasi`,
														b.link_disertasi,
														b.`id_file_rwy`,
														b.`ijazah`,
														b.`transkip`,
														b.`sk_penyetaraan`,
														d.`nama_jenjang`,
														e.`nama_bidang`,
														c.`tgl_ijazah_pak`
													FROM
														`rwy_pend_formal` a
														LEFT JOIN `file_rwy_pendidik` b
														ON a.`id_rwy_didik_formal` = b.`id_rwy_didik_formal`
														LEFT JOIN `rwy_pend_pak` c
														ON a.`id_rwy_didik_formal` = c.`id_rwy_didik_formal`
														LEFT JOIN `jenjangs` d
														ON a.`id_jenj_didik` = d.`id`
														LEFT JOIN `bidang_ilmus` e
														ON a.`id_bid_studi` = e.`kode`
													WHERE a.`id_rwy_didik_formal` = '$q1->id_rwy_didik_formal'")->row();
								?>
								<tr class="text-center">
									<td><?= $dap->nm_sp_formal ?></td>
									<td><?= $dap->nama_bidang ?></td>
									<td><?= $dap->tgl_ijazah_pak ?></td>
									<td><?= $q1->angka_kredit ?></td>
									<td>
										<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $dap->ijazah ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Scan Ijazah]</a>

										<br><br>

										<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $dap->transkip ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Scan Transkip]</a>

										<br><br>

										<?php if ($dap->disertasi <> '') { ?>
											<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $dap->disertasi ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[File Resume Disertasi]</a>
										<?php } else { ?>
											<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> [File Resume Disertasi]</a>
										<?php } ?>

										<br><br>

										<?php if ($dap->link_disertasi <> '') { ?>
											<a target="_blank" href="<?= $dap->link_disertasi ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Link Repository Disertasi]</a>
										<?php } else { ?>
											<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> [Link Repository Disertasi]</a>
										<?php } ?>
										<br><br>

										<?php
										if (!isset($dap->sk_penyetaraan)) {
										?>
											<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> [Scan SK Penyetaraan (Lulusan Luar Negeri)]</a>
										<?php } else { ?>
											<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $dap->sk_penyetaraan ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Scan SK Penyetaraan (Lulusan Luar Negeri)]</a>
										<?php } ?>
									</td>
								</tr>
								<?php
								if ($q1->status_ijazah == "ditolak" && $q1->kunci == '1') {
									$cek = "checked";
									$aktif = "disabled";
								} elseif ($q1->status_ijazah == "diterima" && $q1->kunci == '1') {
									$aktif = "disabled";
								}

								if ($q1->kunci == '1') {
									$warna = "#FFFF00";
								} else {
									$warna = "#e3ffeb";
								}
								?>
								<?php
								$q_penilai = "SELECT
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
								<tr style="background-color: <?= $warna ?>; font-weight: bold;">
									<td>
										FORM PENILAIAN:
										<br><i>Dilakukan penilaian oleh <?= $r_penilai['nama'] ?>
											<input type="hidden" name="user_penilai_no" value=<?= $r_penilai['user_penilai_no'] ?>>
											<input type="hidden" name="no_usulan" value=<?= $q1->usulan_no ?>>
											<input type="hidden" name="kum_dosen" value=<?= $q1->angka_kredit ?>>
									</td>
									<td colspan="3">
										KETERANGAN:
										<textarea name="kum_penilai_keterangan" class="form-control" id="kum_penilai_keterangan" rows="2"><?= $q1->kum_penilai_keterangan ?></textarea>
									</td>
									<td style="min-width: 50px">
										PENILAIAN<br>TIM PENILAI:<br>
										<input type="checkbox" name="cek_nilai" value="0" <?= $cek ?> <?= $aktif ?>>
										<label class="custom-control-label" for="customCheck1">ditolak </label>
									</td>
								</tr>
							</tbody>
						</table>
						<?php if ($usulan_status_id <> '5') {
						} else { ?>
							<center>
								<a href="<?= base_url() ?>penilai/penilai_dupak/hapus_a0004/<?= $q_dupak->dupak_no ?>/<?= $q_dupak->usulan_no ?>" class="btn btn-danger">
									RESET PENILAIAN
								</a>&nbsp;&nbsp;&nbsp;
								<button type="submit" class="btn btn-success">SIMPAN PENILAIAN</button>
							</center>
						<?php } ?>
					</form>
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

					<a href="<?= base_url() ?>penilai/penilai/bidangA/<?= $no ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
				</div>
			</div>
		</div>
	</div>
</div>