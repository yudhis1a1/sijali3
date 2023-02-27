<?php
error_reporting(0);
include "koneksi.php";
?>

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
			} elseif ($usulan_status_id == '9') {
				echo "Selesai";
			} elseif ($usulan_status_id == '10') {
				echo "Pengajuan Usulan Baru";
			}
			?>
		</h4>
	</div>
</div>

<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/usulans/view/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>

					<?php if ($role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link active" href="<?= base_url() ?>usulan/usulan/show_mtk_pak/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah PAK</span></a> </li>
					<?php } ?>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_matakul/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_log/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>

					<?php if ($usulan_status_id == '9'  && $role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/skpak/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-files"></i></span> <span class="hidden-xs-down">SK & PAK</span></a> </li>
					<?php } ?>

				</ul>

				<!-- Tab panes -->
				<?php if ($role <> '3') { ?>
					<?php
					$mtk = "SELECT
		  `uraian`
		FROM
		  `usulan_dupak_details`
		WHERE `dupak_no` = 'A0004'
		  AND `usulan_no` = '$no'
		 GROUP BY `uraian` ASC ";
					?>
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active p-20" id="dasar" role="tabpanel">
							<div class="card">
								<div class="col-lg-12">
									<div class="card-header bg-info">
										<h4 class="m-b-0 text-white">Mata Kuliah yang dipilih untuk PAK</h4>
									</div>
									<div class="card-body">
										<?php
										$no_mtk = 1;
										$tampil_mtk = "SELECT
				  *
				FROM
				  `usulan_matkuls`
				WHERE usulan_no = '$no'";
										$c_tampil_mtk = mysqli_query($koneksi, $tampil_mtk);
										?>
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>NO</th>
														<th>Matakuliah</th>
														<th>AKSI</th>
													</tr>
												</thead>
												<tbody>
													<?php
													while ($r_tampil_mtk = mysqli_fetch_array($c_tampil_mtk)) {
													?>
														<tr>
															<td class="txt-oflo"><?= $no_mtk ?></td>
															<td class="txt-oflo"><?= $r_tampil_mtk['mtk'] ?></td>
															<td class="txt-oflo"><a href="<?php echo base_url() . 'usulan/usulan/hapus_mtk_pak/' . $r_tampil_mtk[no_usulan_matkul] . '/' . $no ?>" title="Hapus Matakuliah"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></a></td>
														</tr>
													<?php
														$no_mtk++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<form action="<?php echo base_url() . 'usulan/usulan/update_mtk_pak/' . $no ?>" method="post" enctype="multipart/form-data">
							<div class="card">
								<div class="col-lg-12">
									<div class="card-header bg-info">
										<h4 class="m-b-0 text-white">Tambah Mata Kuliah untuk PAK</h4>
									</div>
									<div class="card-body">
										<div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">Matakuliah</label>
											<div class="col-10">
												<select name="mtk" class="select2 m-b-10 select2-multiple" style="width: 100%">
													<?php
													$c_mtk1 = mysqli_query($koneksi, $mtk);
													while ($mtk1 = mysqli_fetch_array($c_mtk1)) {
													?>
														<option value="<?= $mtk1['uraian'] ?>"><?= $mtk1['uraian'] ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="text-center">
												<?php if ($role == '3') {
												} else { ?>
													<button type="submit" class="btn btn-info">Update Matakuliah</button>
												<?php  } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
				<?php } ?>


			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>