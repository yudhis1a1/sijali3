<?php
error_reporting(0);
?>

<!-- slimscrollbar scrollbar JavaScript -->
<!--<script src="<?= base_url() ?>assets/dist/js/perfect-scrollbar.jquery.min.js"></script>-->
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Usulan JAD :
			<?php
			if ($usulan_status_id == '1') {
				echo "Draft";
			} elseif ($usulan_status_id == '2') {
				echo "Draft Revisi";
			} elseif ($usulan_status_id == '3') {
				echo "Usulan Baru";
			} elseif ($usulan_status_id == '4') {
				echo "Proses Approval Tim Penilai";
			} elseif ($usulan_status_id == '5') {
				echo "Proses Penilaian";
			} elseif ($usulan_status_id == '6') {
				echo "Proses Operator Ketenagaan";
			} elseif ($usulan_status_id == '7') {
				echo "Proses Dikti";
			} elseif ($usulan_status_id == '8') {
				echo "Proses Operator Kepegawaian";
			} else {
				echo "Selesai";
			}
			?>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/usulans/view/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>

					<?php if ($role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_mtk_pak/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah PAK</span></a> </li>
					<?php } ?>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_matakul/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>

					<?php
					$tgl = date('Y-m-d');
					$selisih = $tgl - $pengangkatan_tgl;

					if ($jabatan_usulan_no == '8' || $jabatan_usulan_no == '11' || $jabatan_usulan_no == '12' || $jabatan_usulan_no == '9' || $jabatan_usulan_no == '10' || $jabatan_usulan_no == '13') {
						if ($selisih < '8') {
					?>
							<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangE/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Tambahan LK/GB</span></a> </li>
						<?php
						}
					} elseif ($jabatan_usulan_no == '14' || $jabatan_usulan_no == '15') {
						if ($selisih > '9' && $selisih < '21') {
						?>
							<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangE/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Tambahan LK/GB</span></a> </li>
					<?php
						}
					}
					?>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>

					<li class="nav-item"> <a class="nav-link active" href="<?= base_url() ?>usulan/usulan/show_log/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>

					<?php if ($usulan_status_id == '9'  && $role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/skpak/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-files"></i></span> <span class="hidden-xs-down">SK & PAK</span></a> </li>
					<?php } ?>

				</ul>
				<!-- Tab panes -->

				<div id="content">
					<div class="row">

						<?php
						if ($logs->num_rows() > 0) {
						?>

							<article class="col-md-10 offset-md-1">
								<br />
								<h3 align="center">Riwayat Pengajuan JFA</h3><br />
								<div class="panel panel-default">
									<div class="chat-body custom-scroll">
										<div class="panel-body ">
											<div class="timeline ">
												<div class="timeline__wrap">
													<div class="timeline__items">
														<?php foreach ($logs->result_array() as $log) {
															$tgl = gfDateDays($log['updated_at']);
															$date = new DateTime($log['updated_at']);
															$ftgl = $tgl . '   ' . $date->format('H:i:s');
														?>
															<div class="timeline__item">
																<div class="timeline__content ">
																	<h2><?php echo $ftgl; ?></h2>
																	<p><strong><?php echo $log["nama_status"]; ?></strong></p>
																	<?php
																	if ($role == '1' and  $log["usulan_status_id"] == '6') {
																		foreach ($data_penilai->result_array() as $da_pen) {
																			if ($log['updated_at'] == $da_pen["updated_at"]) {
																				echo "Nama Tim Penilai : " . $da_pen["nama_penilai"] . "<br>";
																			}
																		}
																	}
																	?>
																	<?php
																	if (strlen($log["keterangan_pengusul"]) > 300) { ?>
																		<a href="" data-toggle="modal" id="myLargeModalLabel1" data-target="#catatan<?= $log['no'] ?>" class="btn btn-warning"> Lihat Catatan</a>
																	<?php
																	} elseif (strlen($log["keterangan_pengusul"]) <= 300) { ?>
																		<p><?php echo $log["keterangan_pengusul"]; ?></p>
																	<?php
																	}
																	?>

																	<?php
																	if ($log["usulan_status_id"] == '11' && $log["file"] <> '') {
																	?>
																		<a href="<?= base_url() ?>assets/catatan/<?= $log["file"] ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i> [Lihat bukti usulan ke Dikti]</a>
																	<?php
																	}
																	?>
																	<br>
																	<p><?= $log["ket_status"]; ?></p>
																</div>
															</div>
														<?php
														}
														?>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</article>

						<?php
						} else {
						?>
							<article class="col-sm-12">
								<br />
								<br />
								<br />
								<br />
								<blockquote class="blockquote-reverse">
									<h1 align="center"><strong>Tidak Ditemukan Riwayat Ajuan</strong></h1><br />
								</blockquote>
							</article>
						<?php
						}
						?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- Modal catatan-->
<?php
foreach ($logs->result_array() as $log) {
?>
	<div class="modal fade" aria-labelledby="myLargeModalLabel1" id="catatan<?= $log['no'] ?>">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3>CATATAN REVISI</h3>
				</div>
				<div class="modal-body">
					<textarea name="usulan_ket" class="form-control" id="keterangan" rows="20" maxlength="65000"><?= $log['keterangan_pengusul']; ?></textarea>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>