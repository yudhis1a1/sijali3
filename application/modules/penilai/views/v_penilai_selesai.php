<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor"></h4>
	</div>
	<div class="col-md-7 align-self-center text-right">

	</div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Draft Usulan</h4>

				<div class="table-responsive m-t-40">
					<table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>NO</th>
								<th>Tanggal Penilaian</th>
								<th>Keputusan</th>
								<th >Catatan Penilaian</th>
								<th>No Usulan</th>
								<th>NIDN/NIDK</th>
								<th>Nama</th>
								<th>Nama Instansi</th>
								<th>Prodi</th>
								<th>JAD Usulan</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no_urut = 1;
							foreach ($dosen as $row) {
							?>
								<tr>
									<td><?= $no_urut ?></td>
									<td><?php echo $row->updated_at ?></td>
									<td>
										<?php
										if ($row->keputusan == "DITERIMA") {
										?>
											<h3>
												<center><span class="label label-success"><?= $row->keputusan ?></span></center>
											</h3>
										<?php
										} elseif ($row->keputusan == "DITOLAK") {
										?>
											<h3>
												<center><span class="label label-danger"><?= $row->keputusan ?></span></center>
											</h3>
										<?php
										} ?>
									</td>
									<td>
										<textarea rows="10" cols="50"><?php echo $row->keterangan ?></textarea>
									</td>
									<td><?php echo $row->no ?></td>
									<td><?php echo $row->nidn ?></td>
									<td><?php echo $row->nama ?></td>
									<td><?php echo $row->nama_instansi ?></td>
									<td><?php echo $row->nama_prodi ?></td>
									<td><?php echo $row->nama_jabatans ?>-<?php echo $row->kum ?>(<?php echo $row->nama_jenjang ?>)</td>

								</tr>
							<?php
								$no_urut++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>