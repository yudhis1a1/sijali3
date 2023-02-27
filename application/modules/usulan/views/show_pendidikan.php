<?php
error_reporting(0);
include "koneksi.php";
?>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

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
				<h6 class="card-subtitle"><?php echo $data_dasar->nip;
											$id_usulan = $no; ?> </code></h6>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/usulans/view/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>

					<?php if ($role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_mtk_pak/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah PAK</span></a> </li>
					<?php } ?>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_matakul/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>

					<li class="nav-item"> <a class="nav-link active" href="<?= base_url() ?>usulan/usulan/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>

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
					<div class="tab-pane active p-20" id="pendidikan" role="tabpanel">

						<?php
						if ((($role == '3') && ($usulan_status_id == '1' || $usulan_status_id == '2')) || ($role == '1')) {
						?>
							<!-- Progress Bar -->
							<div class="card text-white bg-danger">
								<div class="card-body">
									<h3 class="card-title">Catatan :</h3>
									<p class="card-text"><b>1. Pastikan data Anda sudah benar. Jika data Anda salah atau kosong, silakan Anda perbarui data PDDIKTI Anda melalui SISTER.</b></p>
									<p class="card-text"><b>2. Data yang telah diperbaharui dan sudah tervalidasi melalui laman SISTER akan terproses dalam jangka waktu 2 x 24 jam untuk ditampilkan pada Sistem Jabatan Fungsional LLDIKTI III (SIJALI III).</b></p>
									<p class="card-text"><b>3. Untuk memperbarui data Riwayat Pendidikan di Sistem Jabatan Fungsional LLDIKTI III (SIJALI III) dengan data SISTER/PDDIKTI, Silakan klik tombol dibawah ini :
											<form method="post" id="form_pend">
												<button type="submit" class="btn btn-info" name="save" id="save_pend"><i class="fa  fa-retweet"></i> [SINKRON DATA RIWAYAT PENDIDIKAN]</button>
											</form>
										</b></p>
								</div>
							</div>
						<?php
						}
						?>

						<span id="success_message_pend"></span>
						<div class="form-group" id="process_pend" style="display:none;">
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


						<?php if ($sinkron_pen->sinkron_at <> '') { ?>
							<font color="red">
								<b><i>*Data telah disinkron pada tanggal <?= $sinkron_pen->sinkron_at ?></i></b>
							</font>
						<?php } ?>
						<div class="table-responsive">
							<table class="table color-table info-table" border="1">
								<thead>
									<tr>
										<th colspan="7">
											<h2>Riwayat Pendidikan</h2>
										</th>
										<hr>
									</tr>
									<tr>
										<th>No</th>
										<th>Perguruan Tinggi</th>
										<th>Jenjang</th>
										<th>Bidang Ilmu</th>
										<th>Tahun Lulus</th>
										<th>Tanggal Penerbitan ijazah</th>
										<th>Upload File</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$dosen_no = "SELECT
													a.no,
													a.dosen_no,
													b.nidn	
													FROM
														usulans AS a,
														dosens AS b 
													WHERE
														a.dosen_no = b.no 
														AND a.no = '$no'";
									$da_dosen_no = mysqli_query($koneksi, $dosen_no);
									$r_dosen_no = mysqli_fetch_array($da_dosen_no);

									$no = 1;
									$pend = "SELECT
											a.id_sdm,
											a.thn_lulus,
											a.tgl_lulus,
											a.thn_lulus,
											a.nm_sp_formal,
											a.`id_jenj_didik`,
											b.nama_jenjang,
											c.nama_bidang,
											a.id_rwy_didik_formal
											FROM
											(
												rwy_pend_formal a
												LEFT JOIN `jenjangs` b
												ON a.id_jenj_didik = b.id
											)
											LEFT JOIN bidang_ilmus c
												ON a.`id_bid_studi` = c.`kode`
											WHERE a.id_sdm = '$r_dosen_no[dosen_no]'
											ORDER BY a.thn_lulus ASC";
									$da_pend = mysqli_query($koneksi, $pend);
									while ($r_pend = mysqli_fetch_array($da_pend)) {
										$cek_q1 = $this->db->query("SELECT
																		*
																	FROM
																		file_rwy_pendidik
																	WHERE id_rwy_didik_formal = '$r_pend[id_rwy_didik_formal]'
																		AND id_sdm = '$r_pend[id_sdm]'")->row();
									?>
										<tr>
											<td>
												<?php echo $no; ?>
											</td>
											<td>
												<?= $r_pend['nm_sp_formal'] ?>
											</td>
											<td>
												<?= $r_pend['nama_jenjang'] ?>
											</td>
											<td>
												<?= $r_pend['nama_bidang'] ?>
											</td>
											<td>
												<?= $r_pend['thn_lulus'] ?>
											</td>
											<td>
												<?php
												$pend_pak = "SELECT
																tgl_ijazah_pak	
															FROM
																rwy_pend_pak 
															WHERE
																id_rwy_didik_formal='$r_pend[id_rwy_didik_formal]'
																AND no_dosen='$r_dosen_no[dosen_no]'";
												$d_pend_pak = mysqli_query($koneksi, $pend_pak);
												$r_pend_pak = mysqli_fetch_array($d_pend_pak);
												?>
												<div class="col-9">
													<input class="form-control" type="text" placeholder="0000-00-00" value="<?= $r_pend_pak['tgl_ijazah_pak'] ?>" readonly>
												</div>
												<div class="col-2">
													<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#edit_tgl<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Ubah data</a>
												</div>
											</td>
											<td>
												<?php
												if (!isset($cek_q1->ijazah)) {
												?>
													<a href="#uploadModal" data-toggle="modal" data-nama="ijazah,<?= $r_pend['id_rwy_didik_formal'] ?>,<?= $r_pend['id_sdm'] ?>" data-judul=" Scan Ijazah" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload Scan Ijazah]</a>
												<?php } else { ?>
													<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->ijazah ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[Scan Ijazah]</a>
													<a href="<?= base_url() ?>usulan/usulan/hapus_pendidik/ijazah/<?= $cek_q1->ijazah ?>/<?= $id_usulan ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
												<?php } ?>

												<br><br>

												<?php
												if (!isset($cek_q1->transkip)) {
												?>
													<a href="#uploadModal" data-toggle="modal" data-nama="transkip,<?= $r_pend['id_rwy_didik_formal'] ?>,<?= $r_pend['id_sdm'] ?>" data-judul=" Scan Transkip" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload Scan Transkip]</a>
												<?php } else { ?>
													<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->transkip ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[Scan Transkip]</a>
													<a href="<?= base_url() ?>usulan/usulan/hapus_pendidik/transkip/<?= $cek_q1->transkip ?>/<?= $id_usulan ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
												<?php } ?>

												<?php
												if ($r_pend['id_jenj_didik'] == '40' || $r_pend['id_jenj_didik'] == '37') {
													$nama_file = "disertasi";
												?>
													<br><br>
													<?php
													if (!isset($cek_q1->disertasi)) {
													?>
														<a href="" data-toggle="modal" data-target="#uploadModalPaper<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload File Disertasi]</a>
													<?php } else { ?>
														<!-- <a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->disertasi ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[File Disertasi]</a>

														<a href="<?= base_url() ?>usulan/usulan/hapus_pendidik/disertasi/<?= $cek_q1->disertasi ?>/<?= $id_usulan ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a> -->

														<a href="" data-toggle="modal" data-target="#lihatDisertasi<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[Klik Untuk Melihat File Disertasi]</a>
												<?php
													}
												}
												?>

												<?php
												if ($r_pend['id_jenj_didik'] == '35' || $r_pend['id_jenj_didik'] == '32' || $r_pend['id_jenj_didik'] == '36') {
													$nama_file = "tesis";
												?>
													<br><br>
													<?php
													if ($cek_q1->tesis == '') {
													?>
														<a href="" data-toggle="modal" data-target="#uploadModalPaper<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload File Tesis]</a>

													<?php } else { ?>
														<!-- <a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->tesis ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[File Tesis]</a>

														<a href="<?= base_url() ?>usulan/usulan/hapus_pendidik/tesis/<?= $cek_q1->tesis ?>/<?= $id_usulan ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a> -->

														<a href="" data-toggle="modal" data-target="#lihatTesis<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[Klik Untuk Melihat File Tesis]</a>
												<?php
													}
												}
												?>

												<br><br>
												<?php
												if (!isset($cek_q1->sk_penyetaraan)) {
												?>
													<a href="" data-toggle="modal" data-target="#uploadModalSk<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload Scan SK Penyetaraan]</a>
												<?php } else { ?>
													<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->sk_penyetaraan ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[Scan SK Penyetaraan]</a>
													<a href="<?= base_url() ?>usulan/usulan/hapus_pendidik/sk_penyetaraan/<?= $cek_q1->sk_penyetaraan ?>/<?= $id_usulan ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
												<?php } ?>

											</td>
										</tr>

										<!-- Modal lihat tesis-->
										<div class="modal fade" id="lihatTesis<?= $r_pend['id_rwy_didik_formal'] ?>" role="dialog" aria-labelledby="uploadModalLabel">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<form method="post" action="<?= base_url() ?>usulan/usulan/update_paper" role="form" enctype="multipart/form-data">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														</div>
														<div class="modal-body">

															<input type="hidden" name="nm_field" value="<?= $nama_file ?>">
															<input type="hidden" name="id_rwy" value="<?= $r_pend['id_rwy_didik_formal'] ?>">
															<input type="hidden" name="id_sdm" value="<?= $r_pend['id_sdm'] ?>">
															<input type="hidden" name="no_usulan" value="<?= $id_usulan; ?>">

															<input type="hidden" name="file_old" value="<?= $cek_q1->tesis ?>">

															<div class="form-group">
																<label for="berkas">Berkas File Resume <?= $nama_file ?> yang telah diupload :</label>
																<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->tesis ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Lihat File <?= $nama_file ?>]</a>
															</div>

															<div class="form-group">
																<label for="berkas">Link Repository <?= $nama_file ?></label>
																<?php
																$nm_link = "link_" . $nama_file;
																?>
																<input type="text" value="<?= $cek_q1->$nm_link ?>" name="link" class="form-control" required>
																<p class="help-block ">*Pastikan link dapat diakses publik</p>
															</div>

															<div class="form-group">
																<label for="berkas">Edit File Resume <?= $nama_file ?></label>
																<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="10000" required>
																<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
															</div>

															<div class="card text-white bg-danger">
																<div class="card-body">
																	<h4 class="card-title">Informasi :</h4>
																	<p class="card-text">
																		<b>Jika ingin mengubah link repository tesis/disertasi, harus disertakan kembali upload file berkas resume tesis/disertasi.</b>
																	</p>
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
										<!--akhir lihat tesis-->

										<!-- Modal lihat disertasi-->
										<div class="modal fade" id="lihatDisertasi<?= $r_pend['id_rwy_didik_formal'] ?>" role="dialog" aria-labelledby="uploadModalLabel">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<form method="post" action="<?= base_url() ?>usulan/usulan/update_paper" role="form" enctype="multipart/form-data">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														</div>
														<div class="modal-body">

															<input type="hidden" name="nm_field" value="<?= $nama_file ?>">
															<input type="hidden" name="id_rwy" value="<?= $r_pend['id_rwy_didik_formal'] ?>">
															<input type="hidden" name="id_sdm" value="<?= $r_pend['id_sdm'] ?>">
															<input type="hidden" name="no_usulan" value="<?= $id_usulan; ?>">

															<input type="hidden" name="file_old" value="<?= $cek_q1->disertasi ?>">

															<div class="form-group">
																<label for="berkas">Berkas File Resume <?= $nama_file ?> yang telah diupload :</label>
																<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->disertasi ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Lihat File <?= $nama_file ?>]</a>
															</div>

															<div class="form-group">
																<label for="berkas">Link Repository <?= $nama_file ?></label>
																<?php
																$nm_link = "link_" . $nama_file;
																?>
																<input type="text" value="<?= $cek_q1->$nm_link ?>" name="link" class="form-control" required>
																<p class="help-block ">*Pastikan link dapat diakses publik</p>
															</div>

															<div class="form-group">
																<label for="berkas">Edit File Resume <?= $nama_file ?></label>
																<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="10000" required>
																<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
															</div>

															<div class="card text-white bg-danger">
																<div class="card-body">
																	<h4 class="card-title">Informasi :</h4>
																	<p class="card-text">
																		<b>Jika ingin mengubah link repository tesis/disertasi, harus disertakan kembali upload file berkas resume tesis/disertasi.</b>
																	</p>
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
										<!--akhir lihat disertasi-->

										<!-- Modal Upload tesis/disertasi-->
										<div class="modal fade" id="uploadModalPaper<?= $r_pend['id_rwy_didik_formal'] ?>" role="dialog" aria-labelledby="uploadModalLabel">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<form method="post" action="<?= base_url() ?>usulan/usulan/file_riwayat_pendidikPaper" role="form" enctype="multipart/form-data">

															<input type="hidden" name="nm_field" value="<?= $nama_file ?>">
															<input type="hidden" name="id_rwy" value="<?= $r_pend['id_rwy_didik_formal'] ?>">
															<input type="hidden" name="id_sdm" value="<?= $r_pend['id_sdm'] ?>">
															<input type="hidden" name="no_usulan" value="<?= $id_usulan; ?>">

															<div class="form-group">
																<label for="berkas">Berkas File Resume <?= $nama_file ?></label>
																<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="10000" required>
																<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
															</div>

															<div class="form-group">
																<label for="berkas">Link Repository <?= $nama_file ?></label>
																<input type="text" placeholder="https://repository.pt.ac.id/index.php/unduh/item/317056/jurnal-pen-1-7257-30764-1-PB.pdf" name="link" class="form-control" required>
																<p class="help-block ">*Pastikan link dapat diakses publik</p>
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
										<!--akhir modal Upload tesis/disertasi-->

										<!-- Modal Upload-->
										<form method="post" action="<?= base_url() ?>usulan/usulan/file_riwayat_pendidik" role="form" enctype="multipart/form-data">
											<div class="modal fade" id="uploadModal" role="dialog" aria-labelledby="uploadModalLabel">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														</div>
														<div class="modal-body">
															<h4 id="modalLabel"></h4>

															<input type="hidden" name="jenis" value="">
															<input type="hidden" name="no_usulan" value="<?php echo $id_usulan; ?>">

															<div class="form-group">
																<label for="berkas">Berkas Upload</label>
																<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="10000" required>
																<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
															</div>
														</div>

														<div class="modal-footer">
															<div class="btn-group pull-right">
																<button type="submit" class="btn btn-primary">Update</button>
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
										<!--akhir modal Upload-->

										<!-- Modal Upload SK Penyetaraan-->
										<form method="post" action="<?= base_url() ?>usulan/usulan/file_riwayat_pendidikSk" role="form" enctype="multipart/form-data">
											<div class="modal fade" id="uploadModalSk<?= $r_pend['id_rwy_didik_formal'] ?>" role="dialog" aria-labelledby="uploadModalLabel">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														</div>
														<div class="modal-body">
															<div class="card text-white bg-danger">
																<div class="card-body">
																	<h4 class="card-title">Informasi :</h4>
																	<p class="card-text">
																		<b>SK Penyetaraan Ijazah wajib diupload bagi lulusan luar negeri.</b>
																	</p>
																</div>
															</div>

															<h4 id="modalLabel">Scan SK Penyetaraan</h4>

															<input type="hidden" name="nm_field" value="sk_penyetaraan">
															<input type="hidden" name="id_rwy" value="<?= $r_pend['id_rwy_didik_formal'] ?>">
															<input type="hidden" name="id_sdm" value="<?= $r_pend['id_sdm'] ?>">
															<input type="hidden" name="no_usulan" value="<?php echo $id_usulan; ?>">

															<div class="form-group">
																<label for="berkas">Berkas Upload</label>
																<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="10000">
																<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
															</div>
														</div>

														<div class="modal-footer">
															<div class="btn-group pull-right">
																<button type="submit" class="btn btn-primary">Update</button>
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
										<!--akhir modal Upload Penyetaraan-->

										<!-- edit tgl ijazah -->
										<form method="post" action="<?= base_url() ?>usulan/usulan/update_tgl_ijazah/<?= $id_sdm ?>" role="form" enctype="multipart/form-data">
											<div class="modal fade" aria-labelledby="myModalLabel" id="edit_tgl<?= $r_pend['id_rwy_didik_formal'] ?>">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header"></div>
														<div class="modal-header">
															<h4 class="modal-title" id="myModalLabel">Ubah Tanggal Penerbitan Ijazah </h4>
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														</div>

														<div class="modal-body">
															<div class="card text-white bg-danger">
																<div class="card-body">
																	<h3 class="card-title">Informasi :</h3>
																	<p class="card-text">
																		<b>Jika tanggal penerbitan ijazah tidak terupdate, klik dahulu tombol <a href="#" class="btn btn-sm btn-info"><i class="fa  fa-retweet"></i> [SINKRON DATA RIWAYAT PENDIDIKAN]</a>, kemudian update kembali tanggal penerbitan ijazah.</b>
																	</p>
																</div>
															</div>
															<input class="form-control" type="hidden" name="id_rwy_didik_formal" value="<?= $r_pend['id_rwy_didik_formal'] ?>">
															<input class="form-control" type="hidden" name="no_usulan" value="<?php echo $id_usulan; ?>">
															<label for="semester" class="col-4 col-form-label">Pilih Tanggal</label><br>
															<div class="col-10">
																<div class="controls">
																	<input class="form-control" type="date" name="tgl_ijazah">
																</div>
															</div>
														</div>

														<div class="modal-footer">
															<div class="btn-group pull-right">
																<button type="submit" class="btn btn-primary">UPDATE</button>
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>

													</div>
												</div>
											</div>
										</form>
										<!-- edit tgl ijazah -->

									<?php
										$no++;
									};
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