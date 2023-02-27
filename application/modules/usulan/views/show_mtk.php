<?php
error_reporting(0);
include "koneksi.php";
?>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

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
				<h4 class="card-title"><?php echo $judul; ?></h4>
				<h6 class="card-subtitle"><?php echo $data_dasar->nip; ?> </code></h6>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/usulans/view/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>

					<?php if ($role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_mtk_pak/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah PAK</span></a> </li>
					<?php } ?>

					<li class="nav-item"> <a class="nav-link active" href="<?= base_url() ?>usulan/usulan/show_matakul/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>

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

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_log/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>

					<?php if ($usulan_status_id == '9'  && $role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/skpak/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-files"></i></span> <span class="hidden-xs-down">SK & PAK</span></a> </li>
					<?php } ?>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<?php $no_usulan = $data_dasar->no; ?>
					<div class="tab-pane active p-20" id="dasar" role="tabpanel">
						<?php
						if ($role == '3' && ($usulan_status_id == '1' || $usulan_status_id == '2')) {
						?>
							<!-- Progress Bar -->
							<div class="card text-white bg-danger">
								<div class="card-body">
									<h3 class="card-title">Catatan :</h3>
									<p class="card-text"><b>1. Pastikan data Anda sudah benar. Jika data Anda salah atau kosong, silakan Anda perbarui data PDDIKTI Anda melalui SISTER.</b></p>
									<p class="card-text"><b>2. Data yang telah diperbaharui dan sudah tervalidasi melalui laman SISTER akan terproses dalam jangka waktu 2 x 24 jam untuk ditampilkan pada Sistem Jabatan Fungsional LLDIKTI III (SIJALI III).</b></p>
									<p class="card-text"><b>3. Untuk memperbarui data Pengajaran di Sistem Jabatan Fungsional LLDIKTI III (SIJALI III) dengan data SISTER/PDDIKTI, Silakan klik tombol dibawah ini :
											<form method="post" id="form_ajar">
												<button type="submit" class="btn btn-info" name="save" id="save"><i class="fa  fa-retweet"></i> [SINKRON DATA PENGAJARAN]</button>
											</form>
										</b></p>
								</div>
							</div>
						<?php
						}
						?>

						<span id="success_message_ajar"></span>
						<div class=" form-group" id="process_ajar" style="display:none;">
							<br>
							<center>
								<h3>processing...<h3>
							</center>
							<div class="progress">
								<div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:15%;height:20px;"> <span class="sr-only"></span>
								</div>
							</div>
						</div>
						<!-- Progress Bar -->

						<div class="card">
							<div class="card-body">
								<?php
								$nidn = "SELECT a.no, a.dosen_no, b.nidn	
											FROM usulans AS a, dosens AS b 
											WHERE a.dosen_no = b.no  AND a.no = '$no'";
								$da_nidn = mysqli_query($koneksi, $nidn);
								$r_nidn = mysqli_fetch_array($da_nidn);
								?>

								<?php if ($sinkron_ajar->sinkron_at <> '') { ?>
									<font color="red">
										<b><i>*Data telah disinkron pada tanggal <?= $sinkron_ajar->sinkron_at ?></i></b>
									</font>
								<?php } ?>

								<!-- <font color="red">
									<b><i>*Data telah disinkron pada tanggal 2022-09-20</i></b>
								</font> -->
								<div class="table-responsive">
									<table width="100%" class="table color-table info-table" border="1">
										<thead>
											<tr>
												<th colspan="7">
													<h2>Riwayat Pengajaran</h2>
												</th>
											</tr>
											<tr>
												<th>NO</th>
												<th>SEMESTER</th>
												<th>KODE MATAKULIAH</th>
												<th>MATA KULIAH</th>
												<th>KODE KELAS</th>
												<th>PERGURUAN TINGGI</th>
											</tr>
										</thead>
										<?php
										$no_matkul = 1;
										$q_thn = "SELECT SEMESTER,KODEMK,NMMK,KELAS,NMPT FROM `ajar_dosen` where NIDN='$r_nidn[nidn]' ORDER BY SEMESTER,KODEMK,KELAS ASC";
										$data_thn = mysqli_query($koneksi, $q_thn);
										while ($row_thn = mysqli_fetch_array($data_thn)) {
										?>

											<tbody>
												<tr>
													<td><?= $no_matkul; ?></td>
													<td><?= $row_thn['SEMESTER'] ?> </td>
													<td><?= $row_thn['KODEMK'] ?> </td>
													<td><?= $row_thn['NMMK'] ?> </td>
													<td><?= $row_thn['KELAS'] ?> </td>
													<td><?= $row_thn['NMPT'] ?></td>
												</tr>
											<?php
											$no_matkul++;
										}
											?>

											</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Tambah Data Matkul:</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url() ?>usulan/usulan/tambah_matkul/<?php echo $no; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Matakuliah</label>
						<input type="text" name="matkul" class="form-control" required placeholder="Matakuliah">
					</div>
					<div class="form-group">
						<label for="berkas">Berkas Upload</label>
						<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000" required>
						<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
				<button type="submit" class="btn btn-primary">Tambah</button>
			</div>
			</form>
		</div>
	</div>
</div>