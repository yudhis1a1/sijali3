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
				<h4 class="card-title">Proses Penilaian</h4>

				<div class="table-responsive m-t-40">
					<table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center"><i class="fa fa-eye"></i></th>
								<th>NIDN/NIDK</th>
								<th>Nama</th>
								<th>Nama Instansi</th>
								<th>Prodi</th>
								<th>JAD Usulan</th>
								<th>Tanggal Proses Penilaian</th>
								<th>Batas Tanggal Penilaian</th>
								<th>Sisa Durasi Penilaian</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($dosen as $row) {
								//Menambahkan 2 hari dari batas tgl penilaian
								$tgl_batas  = date('Y-m-d', strtotime('+1days', strtotime($row->batas_penilaian_tgl)));

								//Menghitung selisih hari
								$diff       = date_diff(date_create($tgl_batas), date_create());
								$durasi     = $diff->d;

								if ($durasi == "0" && $row->penilaian_tgl <> '') {
									$warna = "#FFFF00";
								} else {
									$warna = "#FFFFFF";
								}
							?>
								<tr style="background-color: <?= $warna; ?>;">
									<td>
										<a target="_blank" href="<?= base_url(); ?>penilai/penilai/penilaian/<?php echo $row->no ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a>
									</td>
									<td><?php echo $row->nidn ?></td>
									<td><?php echo $row->nama ?></td>
									<td><?php echo $row->nama_instansi ?></td>
									<td><?php echo $row->nama_prodi ?></td>
									<td><?php echo $row->nama_jabatans ?>-<?php echo $row->kum ?> (<?php echo $row->nama_jenjang ?>)</td>
									<td><?= $row->penilaian_tgl ?></td>
									<td><?= $row->batas_penilaian_tgl ?></td>
									<td>
										<?php
										if ($row->batas_penilaian_tgl == '') {
											echo "0 Hari";
										} elseif ($durasi == '0') {
											echo "<b>Hari Terakhir Penilaian</b>";
										?>
											<!-- <br>
											<a href="#" data-toggle="modal" data-target="#formModal<?= $row->no ?>" class="btn waves-effect waves-light btn-sm btn-success">[Perpanjang Waktu Penilaian]</a> -->
										<?php
										} elseif ($row->status_penilaian == '1') {
											echo "$durasi Hari";
										?>
											<!-- <br>
											<a href="#" data-toggle="modal" data-target="#ket<?= $row->no ?>" class="btn waves-effect waves-light btn-sm btn-primary">[Keterangan]</a> -->
										<?php
										} else {
											echo "$durasi Hari";
										}
										?>
									</td>
								</tr>


								<div class="modal fade" id="formModal<?= $row->no ?>" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
									<form method="post" action="<?= base_url() ?>penilai/penilai/update_ket_tambah_penilaian" role="form" enctype="multipart/form-data">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="formModalLabel">Keterangan Perpanjangan Proses Penilaian</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<?php
												$data = $this->db->query("SELECT
																			*
																		FROM
																			v_usulans_penilaian
																		WHERE NO = '$row->no'")->row();
												?>
												<div class="modal-body">
													<div class="card text-white bg-danger">
														<div class="card-body">
															<h4 class="card-title">Info :</h4>
															<p class="card-text"><b>1. Penambahan durasi waktu penilaian hanya dapat dilakukan maksimal 1 kali dengan durasi tambahan sebanyak 9 hari.</b></p>
															<p class="card-text"><b>2. Jika Anda sudah klik tombol <button type="submit" class="btn btn-success">SIMPAN</button> maka Anda sudah dianggap melakukan penambahan durasi penilaian dan data yang tersimpan tidak dapat diubah kembali.</b></p>
														</div>
													</div>
													<input type="hidden" value="<?= $row->no ?>" name="usulan_no">
													<input type="hidden" value="<?= $row->batas_penilaian_tgl ?>" name="batas_penilaian_tgl">

													<div class="form-group">
														<label> Keterangan</label>
														<textarea class="form-control" name="ket_tambah_penilaian" rows="10" required><?= $data->ket_tambah_penilaian ?></textarea>
													</div>
												</div>

												<div class="modal-footer">
													<div class="btn-group pull-right">
														<button type="submit" class="btn btn-success" onclick="return confirm('Anda sudah yakin? Data yang Anda Simpan tidak dapat diubah')">SIMPAN</button>

														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>

								<div class="modal fade" id="ket<?= $row->no ?>" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="formModalLabel">Keterangan Perpanjangan Proses Penilaian</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<?php
											$data = $this->db->query("SELECT
																			*
																		FROM
																			v_usulans_penilaian
																		WHERE no = '$row->no'")->row();
											?>
											<div class="modal-body">
												<div class="form-group">
													<textarea class="form-control" name="ket_tambah_penilaian" rows="10" required><?= $data->ket_tambah_penilaian ?></textarea>
												</div>
											</div>

											<div class="modal-footer">
												<div class="btn-group pull-right">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</div>

							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>