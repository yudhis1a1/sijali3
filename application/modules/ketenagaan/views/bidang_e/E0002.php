<?php
error_reporting(0);
?>
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
							<th>Uraian Kegiatan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($q3->result() as $row) { ?>
							<tr class="text-center">
								<td><?= $row->semester ?> <?= $row->tahun_akademik ?>/<?= $row->thn_akademik_baru ?></td>
								<td><?= $row->uraian ?></td>
								<td>

								</td>
							</tr>
							<?php
							if ($role == '1') {
							?>
								<tr style="background-color:#FFFF00; font-weight: bold;">
									<td colspan="6">
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
						}
						?>
					</tbody>
				</table>
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