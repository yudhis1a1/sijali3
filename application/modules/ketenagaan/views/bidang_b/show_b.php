<?php
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
					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_matakul/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>

					<li class="nav-item">
						<a class="nav-link " href="<?= base_url() ?>usulan/usulan/bidangA/<?php echo $no; ?>">
							<span class="hidden-sm-up">
								<i class="ti-agenda"></i>
							</span>
							<span class="hidden-xs-down">Bidang A</span>
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link active" href="<?= base_url() ?>usulan/usulan/bidangB/<?php echo $no; ?>">
							<span class="hidden-sm-up">
								<i class="ti-agenda "></i>
							</span>
							<span class="hidden-xs-down">Bidang B</span>
						</a>
					</li>


					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangC/<?php echo $no; ?>">
							<span class="hidden-sm-up">
								<i class="ti-agenda "></i>
							</span>
							<span class="hidden-xs-down">Bidang C</span>
						</a>
					</li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_log/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>

				</ul>
				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<?php $no_usulan = $data_dasar->no; ?>
					<div class="tab-pane active p-20" id="dasar" role="tabpanel">

						<div class="card">
							<div class="card-header bg-info">
								<h4 class="m-b-0 text-white">Bidang B</h4>
							</div>
							<div class="card-body">
								<h4 class="card-title"></h4>

								<div class="row">
									<table class="ui celled table">
										<tr>
											<td>
												<center>

													<a href="<?= base_url() ?>usulan/usulan/print_bidangb/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> BIDANG B</a>
													<a href="<?= base_url() ?>usulan/usulan/print_dupak/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> PRINT DUPAK</a>
												</center>
											</td>
										</tr>
									</table>

									<div class="table-responsive m-t-40">
										<table width="100%" class="table color-table info-table table-bordered">
											<thead>
												<tr class="text-center">
													<th rowspan="4" class="text-center" style="vertical-align: middle;">NO.</th>
													<th colspan="11" class="text-center">UNSUR YANG DINILAI</th>
													<th rowspan="4" class="text-center" style="vertical-align: middle;">
														AKSI
													</th>
												</tr>
												<tr class="text-center">
													<th colspan="5" rowspan="3" class="text-center" style="vertical-align: middle;">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</th>
													<th colspan="6" class="text-center">ANGKA KREDIT MENURUT</th>
												</tr>
												<tr>
													<th colspan="3" class="text-center">INSTANSI PENGUSUL</th>
													<th colspan="3" class="text-center">TIM PENILAI</th>
												</tr>
												<tr>
													<th class="text-center">LAMA</th>
													<th class="text-center">BARU</th>
													<th class="text-center">JUMLAH</th>
													<th class="text-center">LAMA</th>
													<th class="text-center">BARU</th>
													<th class="text-center">JUMLAH</th>
												</tr>
												<tr>
													<th class="text-center">1</th>
													<th colspan="5" class="text-center">2</th>
													<th class="text-center">3</th>
													<th class="text-center">4</th>
													<th class="text-center">5</th>
													<th class="text-center">6</th>
													<th class="text-center">7</th>
													<th class="text-center">8</th>
													<th class="text-center">9</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td width="3%" rowspan="48">
														<div align="center">III</div>
													</td>
													<td colspan="5"><strong>PELAKSANAAN PENELITIAN</strong></td>
													<td width="8%">&nbsp;</td>
													<td width="7%">&nbsp;</td>
													<td width="8%">&nbsp;</td>
													<td width="8%">&nbsp;</td>
													<td width="8%">&nbsp;</td>
													<td width="7%">&nbsp;</td>
													<td width="6%">&nbsp;</td>
												</tr>
												<tr>
													<td width="2%">
														<div align="justify"><strong>1.</strong></div>
													</td>
													<td width="43%" colspan="4">
														<div align="justify"><strong>Menghasilkan karya ilmiah sesuai
																dengan bidang ilmunya: </strong></div>
													</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<tr>
													<td>
														<div align="justify">a. </div>
													</td>
													<td colspan="4">
														<div align="justify">Hasil penelitian atau hasil pemikiran
															yang dipublikasikan dalam bentuk
															buku </div>
													</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<?php
												$sql_b0002 = "select *from usulan_dupaks where dupak_no='B0002' and usulan_no='$no'";
												$data_b0002 = mysqli_query($koneksi, $sql_b0002);
												$data_bid_b_b0002 = mysqli_fetch_array($data_b0002);
												$jumlah_b0002 = $data_bid_b_b0002['kum_usulan_lama'] + $data_bid_b_b0002['kum_usulan_baru'];
												?>
												<tr>
													<td>
														<div align="justify"></div>
													</td>
													<td colspan="4">
														<div align="justify"> 1) Buku referensi </div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0002['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0002['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0002; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td><a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a></td>
												</tr>
												<?php
												$sql_b0001 = "select *from usulan_dupaks where dupak_no='B0001' and usulan_no='$no'";
												$data_b0001 = mysqli_query($koneksi, $sql_b0001);
												$data_bid_b_b0001 = mysqli_fetch_array($data_b0001);
												$jumlah_b0001 = $data_bid_b_b0001['kum_usulan_lama'] + $data_bid_b_b0001['kum_usulan_baru'];
												?>
												<tr>
													<td>
														<div align="justify"></div>
													</td>
													<td colspan="4">
														<div align="justify">2) Monograf</div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0001['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0001['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0001; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr>
													<td>
														<div align="justify">b. </div>
													</td>
													<td colspan="4">
														<div align="justify">Hasil penelitian atau hasil pemikiran
															dalam buku yang dipublikasikan dan
															berisi berbagai tulisan dari berbagai
															penulis (book chapter): </div>
													</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<?php
												$sql_b0003 = "select *from usulan_dupaks where dupak_no='B0003' and usulan_no='$no'";
												$data_b0003 = mysqli_query($koneksi, $sql_b0003);
												$data_bid_b_b0003 = mysqli_fetch_array($data_b0003);
												$jumlah_b0003 = $data_bid_b_b0003['kum_usulan_lama'] + $data_bid_b_b0003['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4"> 1) Internasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0003['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0003['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0003; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0037 = "select *from usulan_dupaks where dupak_no='B0037' and usulan_no='$no'";
												$data_b0037 = mysqli_query($koneksi, $sql_b0037);
												$data_bid_b_b0037 = mysqli_fetch_array($data_b0037);
												$jumlah_b0037 = $data_bid_b_b0037['kum_usulan_lama'] + $data_bid_b_b0037['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4"> 2) Nasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0037['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0037['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0037; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0037/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												<tr>
													<td>c.</td>
													<td colspan="4"> Hasil penelitian atau hasil pemikiran
														yang dipublikasikan: </td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<?php
												$sql_b0004 = "select *from usulan_dupaks where dupak_no='B0004' and usulan_no='$no'";
												$data_b0004 = mysqli_query($koneksi, $sql_b0004);
												$data_bid_b_b0004 = mysqli_fetch_array($data_b0004);
												$jumlah_b0004 = $data_bid_b_b0004['kum_usulan_lama'] + $data_bid_b_b0004['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">
														<div align="justify">1) Jurnal internasional bereputasi
															(terindeks pada database
															internasional bereputasi dan
															berfaktor dampak) </div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0004['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0004['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0004; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td><a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a></td>
												</tr>
												<?php
												$sql_b0025 = "select *from usulan_dupaks where dupak_no='B0025' and usulan_no='$no'";
												$data_b0025 = mysqli_query($koneksi, $sql_b0025);
												$data_bid_b_b0025 = mysqli_fetch_array($data_b0025);
												$jumlah_b0025 = $data_bid_b_b0025['kum_usulan_lama'] + $data_bid_b_b0025['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">
														<div align="justify">2) Jurnal internasional terindeks pada
															basis data internasional bereputasi </div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0025['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0025['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0025; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0025/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0026 = "select *from usulan_dupaks where dupak_no='B0026' and usulan_no='$no'";
												$data_b0026 = mysqli_query($koneksi, $sql_b0026);
												$data_bid_b_b0026 = mysqli_fetch_array($data_b0026);
												$jumlah_b0026 = $data_bid_b_b0026['kum_usulan_lama'] + $data_bid_b_b0026['kum_usulan_baru'];
												?>
												<tr>
													<td height="31">&nbsp;</td>
													<td colspan="4">
														<div align="justify">3) Jurnal internasional terindeks pada
															basis data internasional di luar
														</div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0026['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0026['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0026; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0026/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												<?php
												$sql_b0005 = "select *from usulan_dupaks where dupak_no='B0005' and usulan_no='$no'";
												$data_b0005 = mysqli_query($koneksi, $sql_b0005);
												$data_bid_b_b0005 = mysqli_fetch_array($data_b0005);
												$jumlah_b0005 = $data_bid_b_b0005['kum_usulan_lama'] + $data_bid_b_b0005['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;
														<div align="justify">4) Jurnal Nasional terakreditasi Dikti atau Jurnal nasional terakreditasi
															Kemenristekdikti peringkat 1 dan
															2 </div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0005['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0005['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0005; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0006 = "select *from usulan_dupaks where dupak_no='B0006' and usulan_no='$no'";
												$data_b0006 = mysqli_query($koneksi, $sql_b0006);
												$data_bid_b_b0006 = mysqli_fetch_array($data_b0006);
												$jumlah_b0006 = $data_bid_b_b0006['kum_usulan_lama'] + $data_bid_b_b0006['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">5) a) Jurnal Nasional berbahasa Inggris atau bahasa resmi (PBB) terindeks pada basis data yang diakui Kemenristekdikti atau Jurnal nasional terakreditasi
														peringkat 3 dan 4 </td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0006['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0006['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0006; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0007 = "select *from usulan_dupaks where dupak_no='B0007' and usulan_no='$no'";
												$data_b0007 = mysqli_query($koneksi, $sql_b0007);
												$data_bid_b_b0007 = mysqli_fetch_array($data_b0007);
												$jumlah_b0007 = $data_bid_b_b0007['kum_usulan_lama'] + $data_bid_b_b0007['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">b) Jurnal Nasional berbahasa
														Indonesia terindeks pada basis
														data yang diakui
														Kemenristekdikti, contohnya:
														akreditasi peringkat 5 dan 6</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0007['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0007['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0007; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0038 = "select *from usulan_dupaks where dupak_no='B0038' and usulan_no='$no'";
												$data_b0038 = mysqli_query($koneksi, $sql_b0038);
												$data_bid_b_b0038 = mysqli_fetch_array($data_b0038);
												$jumlah_b0038 = $data_bid_b_b0038['kum_usulan_lama'] + $data_bid_b_b0038['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">6) Jurnal Nasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0038['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0038['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0038; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0038/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0024 = "select *from usulan_dupaks where dupak_no='B0024' and usulan_no='$no'";
												$data_b0024 = mysqli_query($koneksi, $sql_b0024);
												$data_bid_b_b0024 = mysqli_fetch_array($data_b0024);
												$jumlah_b0024 = $data_bid_b_b0024['kum_usulan_lama'] + $data_bid_b_b0024['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">7) Jurnal ilmiah yang ditulis dalam
														Bahasa Resmi PBB namun tidak
														memenuhi syarat-syarat sebagai
														jurnal ilmiah internasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0024['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0024['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0024; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0024/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												<tr>
													<td><strong>2</strong></td>
													<td colspan="4"><strong>Hasil penelitian atau hasil pemikiran
															yang didesiminasikan </strong></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<tr>
													<td>a.</td>
													<td colspan="4"> Dipresentasikan secara oral dan
														dimuat dalam prosiding yang
														dipublikasikan (ber ISSN/ISBN):</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<?php
												$sql_b0035 = "select *from usulan_dupaks where dupak_no='B0035' and usulan_no='$no'";
												$data_b0035 = mysqli_query($koneksi, $sql_b0035);
												$data_bid_b_b0035 = mysqli_fetch_array($data_b0035);
												$jumlah_b0035 = $data_bid_b_b0035['kum_usulan_lama'] + $data_bid_b_b0035['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">1). Internasional terindeks pada
														Scimagojr dan Scopus </td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0035['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0035['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0035; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0035/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0036 = "select *from usulan_dupaks where dupak_no='B0036' and usulan_no='$no'";
												$data_b0036 = mysqli_query($koneksi, $sql_b0036);
												$data_bid_b_b0036 = mysqli_fetch_array($data_b0036);
												$jumlah_b0036 = $data_bid_b_b0036['kum_usulan_lama'] + $data_bid_b_b0036['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">2). Internasional terindeks pada
														SCOPUS, IEEE Explore, SPIE</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0036['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0036['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0036; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0036/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0034 = "select *from usulan_dupaks where dupak_no='B0034' and usulan_no='$no'";
												$data_b0034 = mysqli_query($koneksi, $sql_b0034);
												$data_bid_b_b0034 = mysqli_fetch_array($data_b0034);
												$jumlah_b0034 = $data_bid_b_b0034['kum_usulan_lama'] + $data_bid_b_b0034['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">3). Internasional </td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0034['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0034['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0034; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0034/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0033 = "select *from usulan_dupaks where dupak_no='B0033' and usulan_no='$no'";
												$data_b0033 = mysqli_query($koneksi, $sql_b0033);
												$data_bid_b_b0033 = mysqli_fetch_array($data_b0033);
												$jumlah_b0033 = $data_bid_b_b0033['kum_usulan_lama'] + $data_bid_b_b0033['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">4). Nasional </td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0033['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0033['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0033; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0033/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												<tr>
													<td>b.</td>
													<td colspan="4"> Disajikan dalam bentuk poster dan
														dimuat dalam prosiding yang
														dipublikasikan: </td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<?php
												$sql_b0031 = "select *from usulan_dupaks where dupak_no='B0031' and usulan_no='$no'";
												$data_b0031 = mysqli_query($koneksi, $sql_b0031);
												$data_bid_b_b0031 = mysqli_fetch_array($data_b0031);
												$jumlah_b0031 = $data_bid_b_b0031['kum_usulan_lama'] + $data_bid_b_b0031['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">1). Internasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0031['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0031['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0031; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0031/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0032 = "select *from usulan_dupaks where dupak_no='B0032' and usulan_no='$no'";
												$data_b0032 = mysqli_query($koneksi, $sql_b0032);
												$data_bid_b_b0032 = mysqli_fetch_array($data_b0032);
												$jumlah_b0032 = $data_bid_b_b0032['kum_usulan_lama'] + $data_bid_b_b0032['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">2). Nasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0032['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0032['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0032; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0032/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												<tr>
													<td>c.</td>
													<td colspan="4">Disajikan dalam seminar/simposium/
														lokakarya, tetapi tidak dimuat dalam
														prosiding yang dipublikasikan: </td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<?php
												$sql_b0029 = "select *from usulan_dupaks where dupak_no='B0029' and usulan_no='$no'";
												$data_b0029 = mysqli_query($koneksi, $sql_b0029);
												$data_bid_b_b0029 = mysqli_fetch_array($data_b0029);
												$jumlah_b0029 = $data_bid_b_b0029['kum_usulan_lama'] + $data_bid_b_b0029['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">1) Internasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0029['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0029['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0029; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0029/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0030 = "select *from usulan_dupaks where dupak_no='B0030' and usulan_no='$no'";
												$data_b0030 = mysqli_query($koneksi, $sql_b0030);
												$data_bid_b_b0030 = mysqli_fetch_array($data_b0030);
												$jumlah_b0030 = $data_bid_b_b0030['kum_usulan_lama'] + $data_bid_b_b0030['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">2) Nasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0030['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0030['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0030; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0030/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr>
													<td>d.</td>
													<td colspan="4">Hasil penelitian/pemikiran yang
														tidak disajikan dalam seminar/simposium/ lokakarya, tetapi dimuat
														dalam prosiding: </td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<?php
												$sql_b0027 = "select *from usulan_dupaks where dupak_no='B0027' and usulan_no='$no'";
												$data_b0027 = mysqli_query($koneksi, $sql_b0027);
												$data_bid_b_b0027 = mysqli_fetch_array($data_b0027);
												$jumlah_b0027 = $data_bid_b_b0027['kum_usulan_lama'] + $data_bid_b_b0027['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">1) Internasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0027['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0027['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0027; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0027/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0028 = "select *from usulan_dupaks where dupak_no='B0028' and usulan_no='$no'";
												$data_b0028 = mysqli_query($koneksi, $sql_b0028);
												$data_bid_b_b0028 = mysqli_fetch_array($data_b0028);
												$jumlah_b0028 = $data_bid_b_b0028['kum_usulan_lama'] + $data_bid_b_b0028['kum_usulan_baru'];
												?>
												<tr>
													<td>&nbsp;</td>
													<td colspan="4">2) Nasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0028['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0028['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0028; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0028/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0011 = "select *from usulan_dupaks where dupak_no='B0011' and usulan_no='$no'";
												$data_b0011 = mysqli_query($koneksi, $sql_b0011);
												$data_bid_b_b0011 = mysqli_fetch_array($data_b0011);
												$jumlah_b0011 = $data_bid_b_b0011['kum_usulan_lama'] + $data_bid_b_b0011['kum_usulan_baru'];
												?>
												<tr>
													<td>e.</td>
													<td colspan="4">Hasil penelitian/pemikiran yang
														disajikan dalam koran/majalah
														populer/umum</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0011['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0011['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0011; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0012 = "select *from usulan_dupaks where dupak_no='B0012' and usulan_no='$no'";
												$data_b0012 = mysqli_query($koneksi, $sql_b0012);
												$data_bid_b_b0012 = mysqli_fetch_array($data_b0012);
												$jumlah_b0012 = $data_bid_b_b0012['kum_usulan_lama'] + $data_bid_b_b0012['kum_usulan_baru'];
												?>
												<tr>
													<td><strong>3.</strong></td>
													<td colspan="4">
														<div align="justify"><strong>Hasil penelitian atau pemikiran atau
																kerjasama industri yang tidak
																dipublikasikan (tersimpan dalam
																perpustakaan) yang dilakukan secara
																melembaga.</strong></div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0012['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0012['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0012; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0013 = "select *from usulan_dupaks where dupak_no='B0013' and usulan_no='$no'";
												$data_b0013 = mysqli_query($koneksi, $sql_b0013);
												$data_bid_b_b0013 = mysqli_fetch_array($data_b0013);
												$jumlah_b0013 = $data_bid_b_b0013['kum_usulan_lama'] + $data_bid_b_b0013['kum_usulan_baru'];
												?>
												<tr>
													<td><strong>4.</strong></td>
													<td colspan="4">
														<div align="justify"><strong>Menerjemahkan/menyadur buku ilmiah
																yang diterbitkan (ber ISBN)</strong></div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0013['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0013['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0013; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0014 = "select *from usulan_dupaks where dupak_no='B0014' and usulan_no='$no'";
												$data_b0014 = mysqli_query($koneksi, $sql_b0014);
												$data_bid_b_b0014 = mysqli_fetch_array($data_b0014);
												$jumlah_b0014 = $data_bid_b_b0014['kum_usulan_lama'] + $data_bid_b_b0014['kum_usulan_baru'];
												?>
												<tr>
													<td><strong>5.</strong></td>
													<td colspan="4">
														<div align="justify"><strong>Mengedit/menyunting karya ilmiah
																dalam bentuk buku yang diterbitkan
																(ber ISBN). </strong></div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0014['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0014['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0014; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												<tr>
													<td><strong>6.</strong></td>
													<td colspan="4">
														<div align="justify"><strong>Membuat rancangan dan karya
																teknologi yang dipatenkan atau seni
																yang terdaftar di HaKI secara nasional
																atau internasional :</strong></div>
													</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<?php
												$sql_b0015 = "select *from usulan_dupaks where dupak_no='B0015' and usulan_no='$no'";
												$data_b0015 = mysqli_query($koneksi, $sql_b0015);
												$data_bid_b_b0015 = mysqli_fetch_array($data_b0015);
												$jumlah_b0015 = $data_bid_b_b0015['kum_usulan_lama'] + $data_bid_b_b0015['kum_usulan_baru'];
												?>
												<tr>
													<td>a.</td>
													<td colspan="4">
														<div align="justify">Internasional yang sudah
															diimplementasikan di industri
															(paling sedikit diakui oleh 4
															Negara) </div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0015['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0015['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0015; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0016 = "select *from usulan_dupaks where dupak_no='B0016' and usulan_no='$no'";
												$data_b0016 = mysqli_query($koneksi, $sql_b0016);
												$data_bid_b_b0016 = mysqli_fetch_array($data_b0016);
												$jumlah_b0016 = $data_bid_b_b0016['kum_usulan_lama'] + $data_bid_b_b0016['kum_usulan_baru'];
												?>
												<tr>
													<td>b.</td>
													<td colspan="4">
														<div align="justify">Internasional
															(paling sedikit diakui oleh 4 Negara) </div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0016['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0016['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0016; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0017 = "select *from usulan_dupaks where dupak_no='B0017' and usulan_no='$no'";
												$data_b0017 = mysqli_query($koneksi, $sql_b0017);
												$data_bid_b_b0017 = mysqli_fetch_array($data_b0017);
												$jumlah_b0017 = $data_bid_b_b0017['kum_usulan_lama'] + $data_bid_b_b0017['kum_usulan_baru'];
												?>
												<tr>
													<td>c.</td>
													<td colspan="4">
														<div align="justify">Nasional (yang sudah
															diimplementasikan di industri)</div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0017['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0017['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0017; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0017/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0018 = "select *from usulan_dupaks where dupak_no='B0018' and usulan_no='$no'";
												$data_b0018 = mysqli_query($koneksi, $sql_b0018);
												$data_bid_b_b0018 = mysqli_fetch_array($data_b0018);
												$jumlah_b0018 = $data_bid_b_b0018['kum_usulan_lama'] + $data_bid_b_b0018['kum_usulan_baru'];
												?>
												<tr>
													<td>d.</td>
													<td colspan="4">
														<div align="justify">Nasional</div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0018['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0018['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0018; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0018/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0019 = "select *from usulan_dupaks where dupak_no='B0019' and usulan_no='$no'";
												$data_b0019 = mysqli_query($koneksi, $sql_b0019);
												$data_bid_b_b0019 = mysqli_fetch_array($data_b0019);
												$jumlah_b0019 = $data_bid_b_b0019['kum_usulan_lama'] + $data_bid_b_b0019['kum_usulan_baru'];
												?>
												<tr>
													<td>e.</td>
													<td colspan="4">
														<div align="justify">Nasional, dalam bentuk paten
															sederhana yang telah memiliki
															sertifikat dari Direktorat
															Jenderal Kekayaan Intelektual,Kemenkumham; </div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0019['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0019['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0019; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0019/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0020 = "select *from usulan_dupaks where dupak_no='B0020' and usulan_no='$no'";
												$data_b0020 = mysqli_query($koneksi, $sql_b0020);
												$data_bid_b_b0020 = mysqli_fetch_array($data_b0020);
												$jumlah_b0020 = $data_bid_b_b0020['kum_usulan_lama'] + $data_bid_b_b0020['kum_usulan_baru'];
												?>
												<tr>
													<td colspan="4">f.</td>
													<td>
														<div align="justify">Karya ciptaan, desain industri,
															indikasi geografis yang telah
															memiliki sertifikat dari
															Direktorat Jenderal Kekayaan
															Intelektual, Kemenkumham;</div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0020['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0020['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0020; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0020/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												<tr>
													<td><strong>7.</strong></td>
													<td colspan="4">
														<div align="justify"><strong>Membuat rancangan dan karya
																teknologi yang tidak dipatenkan;
																rancangan dan karya seni monumental
																yang tidak terdaftar di HaKI tetapi telah
																dipresentasikan pada forum yang
																teragenda :</strong></div>
													</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<?php
												$sql_b0021 = "select *from usulan_dupaks where dupak_no='B0021' and usulan_no='$no'";
												$data_b0021 = mysqli_query($koneksi, $sql_b0021);
												$data_bid_b_b0021 = mysqli_fetch_array($data_b0021);
												$jumlah_b0021 = $data_bid_b_b0021['kum_usulan_lama'] + $data_bid_b_b0021['kum_usulan_baru'];
												?>
												<tr>
													<td>a.</td>
													<td colspan="4">
														<div align="justify">Tingkat Internasional</div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0021['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0021['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0021; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0021/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0022 = "select *from usulan_dupaks where dupak_no='B0022' and usulan_no='$no'";
												$data_b0022 = mysqli_query($koneksi, $sql_b0022);
												$data_bid_b_b0022 = mysqli_fetch_array($data_b0022);
												$jumlah_b0022 = $data_bid_b_b0022['kum_usulan_lama'] + $data_bid_b_b0022['kum_usulan_baru'];
												?>
												<tr>
													<td>b.</td>
													<td colspan="4">
														<div align="justify">Tingkat Nasional</div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0022['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0022['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0022; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0022/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_b0023 = "select *from usulan_dupaks where dupak_no='B0023' and usulan_no='$no'";
												$data_b0023 = mysqli_query($koneksi, $sql_b0023);
												$data_bid_b_b0023 = mysqli_fetch_array($data_b0023);
												$jumlah_b0023 = $data_bid_b_b0023['kum_usulan_lama'] + $data_bid_b_b0023['kum_usulan_baru'];
												?>
												<tr>
													<td>c.</td>
													<td colspan="4">
														<div align="justify">Tingkat Lokal</div>
													</td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0023['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_b_b0023['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_b0023; ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_b/dupak/B0023/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												<tr>
													<td><strong>8.</strong></td>
													<td colspan="4">
														<div align="justify"><strong>Membuat rancangan dan karya seni
																yang tidak terdaftar HaKI</strong></div>
													</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
												<tr>
													<td><strong>9.</strong></td>
													<td colspan="4">
														<div align="justify"><strong>Menambahkan Sisa Angka Kredit pada Jabatan Sebelumnya (AK x 40%)</strong></div>
													</td>
													<td style="vertical-align: middle;"><?= $d_b0040['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $d_b0040['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jml_b0040; ?></td>
													<td style="vertical-align: middle;"><?= $d_b0040['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $d_b0040['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_b0040 ?></td>
													<td style="vertical-align: middle;">

													</td>
												</tr>
												<?php
												$sql_total = "select *from usulan_dupaks where  usulan_no='$no' and left(dupak_no,1)='B'";
												$data_total = mysqli_query($koneksi, $sql_total);
												while ($data_kum_total = mysqli_fetch_array($data_total)) {
													$jml_kum_lama += $data_kum_total['kum_usulan_lama'];
													$jml_kum_baru += $data_kum_total['kum_usulan_baru'];
												}
												$total_bid_a = $jml_kum_lama + $jml_kum_baru;
												?>
												<tr style="background-color: #e4e4e4; font-weight: bold;">
													<td colspan="6">
														<div align="right"><strong>JUMLAH BIDANG B</strong></div>
													</td>
													<td style="vertical-align: middle;" class="text-center"><?= $jml_kum_lama ?></td>
													<td style="vertical-align: middle;" class="text-center"><?= $jml_kum_baru ?></td>
													<td style="vertical-align: middle;" class="text-center"><?= $total_bid_a ?></td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
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
</div>
</div>