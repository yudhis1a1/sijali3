<?php
error_reporting(0);
if ($usulan->jabatan_usulan_no == '6' || $usulan->jabatan_usulan_no == '3') {

	if ($jenjang_id_lama == '0' && $jenjang_id_lama <> $jenjang_id_baru) {
		$dupak = "200";
	} elseif ($jenjang_id_lama <> $jenjang_id_baru) {
		$dupak = "50";
	} elseif ($jenjang_id_lama == $jenjang_id_baru) {
		$dupak = "0";
	}
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
						<?php if ($usulan_status_id == '3') { ?>
							<tr>
								<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/catatanPTK/<?php echo $dasar->no; ?>" role="form" enctype="multipart/form-data">
									<td colspan="5">

										<input type="hidden" class="form-control" value="A0001" name="bidang" readonly>
										<input type="hidden" class="form-control" value="<?php echo $usulan_status_id ?>" name="statusnya" readonly>
										<input type="hidden" class="form-control" value="<?php echo $dasar->no; ?>" name="no_usulan" readonly>
										Catatan:
										<textarea name="keterangan_ptk" class="form-control" rows="3" required="requiered"></textarea>
									</td>
									<td class="text-center">
										<button type="submit" class="btn btn-success" name="btnSub"><i class="fa fa-comment"></i> Tambah Catatan</button>
									</td>
								</form>
							</tr>
						<?php } ?>
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
					<form method="post" action="<?= base_url() ?>penilai/penilai_dupak/update_A0001/A0001" role="form" enctype="multipart/form-data">
						<table border="1" class="ui celled table" width="100%">
							<thead>
								<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
									<th>Perguruan Tinggi</th>
									<th>Bidang Ilmu</th>
									<th>Tanggal Penerbitan ijazah</th>
									<th>Angka Kredit</th>
									<th>File</th>
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
								<tr style="background-color:#FFFF00; font-weight: bold;">
									<td colspan="4">
										Catatan Tim Penilai:
										<textarea class="form-control" rows="4"><?= $q1->kum_penilai_keterangan ?></textarea>
									</td>
									<td>
										AK Tim Penilai:
										<input type="text" class="form-control" value="<?= $q1->kum_penilai ?>">
									</td>
								</tr>
							</tbody>
						</table>

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

					<a href="<?= base_url() ?>ketenagaan/ketenagaan/show/<?= $no ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
				</div>
			</div>
		</div>
	</div>
</div>