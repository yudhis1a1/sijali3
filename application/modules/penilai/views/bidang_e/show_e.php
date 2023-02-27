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
					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>penilai/penilai/penilaian/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>penilai/penilai/show_matakul/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>penilai/penilai/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>penilai/penilai/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>

					<li class="nav-item"> <a class="nav-link active" class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangE/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Tambahan LK/GB</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>

				</ul>
				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<?php $no_usulan = $data_dasar->no; ?>
					<div class="tab-pane active p-20" id="dasar" role="tabpanel">
						<div class="card-header bg-info">
							<h4 class="m-b-0 text-white">Kegiatan Tambahan LK/GB</h4>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="table-responsive m-t-40">
										<table class="table color-table info-table table-bordered">

											<thead>
												<tr class="text-center">
													<th rowspan="4" class="text-center" style="vertical-align: middle;">NO.</th>
													<th colspan="9" class="text-center">UNSUR YANG DINILAI</th>
													<th rowspan="4" class="text-center" style="vertical-align: middle;">
														AKSI
													</th>
												</tr>
												<tr class="text-center">
													<th colspan="3" rowspan="3" class="text-center" style="vertical-align: middle;">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</th>
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
													<th colspan="3" class="text-center">2</th>
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
												<tr class="text-center">
													<td rowspan="12">VI</td>
													<td colspan="3" class="text-left">KEGIATAN TAMBAHAN UNTUK USULAN LEKTOR KEPALA / GURU BESAR</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_E0001 = "select *from usulan_dupaks where dupak_no='E0001' and usulan_no='$no'";
												$data_E0001 = mysqli_query($koneksi, $sql_E0001);
												$data_bid_a_E0001 = mysqli_fetch_array($data_E0001);
												$jumlah_E0001 = $data_bid_a_E0001['kum_usulan_lama'] + $data_bid_a_E0001['kum_usulan_baru'];
												$kum_nilai_E0001 = $data_bid_a_E0001['kum_penilai_lama'] + $data_bid_a_E0001['kum_penilai_baru'];

												$cek_E0001 = "select *from usulan_dupak_details where dupak_no='E0001' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0001 = mysqli_query($koneksi, $cek_E0001);
												$r_E0001 = mysqli_fetch_array($da_E0001);

												if ($r_E0001['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0001['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>A</td>
													<td colspan="2" class="text-left">Mendapatkan Hibah Penelitian Kompetitif (sebagai ketua)</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0001['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0001['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0001; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0001['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0001['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0001 ?></td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0002 = "select *from usulan_dupaks where dupak_no='E0002' and usulan_no='$no'";
												$data_E0002 = mysqli_query($koneksi, $sql_E0002);
												$data_bid_a_E0002 = mysqli_fetch_array($data_E0002);
												$jumlah_E0002 = $data_bid_a_E0002['kum_usulan_lama'] + $data_bid_a_E0002['kum_usulan_baru'];
												$kum_nilai_E0002 = $data_bid_a_E0002['kum_penilai_lama'] + $data_bid_a_E0002['kum_penilai_baru'];

												$cek_E0002 = "select *from usulan_dupak_details where dupak_no='E0002' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0002 = mysqli_query($koneksi, $cek_E0002);
												$r_E0002 = mysqli_fetch_array($da_E0002);

												if ($r_E0002['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0002['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>B</td>
													<td colspan="2" class="text-left">Membimbing Doktor</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0002['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0002['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0002; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0002['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0002['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0002 ?></td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0003 = "select *from usulan_dupaks where dupak_no='E0003' and usulan_no='$no'";
												$data_E0003 = mysqli_query($koneksi, $sql_E0003);
												$data_bid_a_E0003 = mysqli_fetch_array($data_E0003);
												$jumlah_E0003 = $data_bid_a_E0003['kum_usulan_lama'] + $data_bid_a_E0003['kum_usulan_baru'];
												$kum_nilai_E0003 = $data_bid_a_E0003['kum_penilai_lama'] + $data_bid_a_E0003['kum_penilai_baru'];

												$cek_E0003 = "select *from usulan_dupak_details where dupak_no='E0003' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0003 = mysqli_query($koneksi, $cek_E0003);
												$r_E0003 = mysqli_fetch_array($da_E0003);

												if ($r_E0003['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0003['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>C</td>
													<td colspan="2" class="text-left">Menguji Doktor</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0003['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0003['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0003; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0003['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0003['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0003 ?></td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0004 = "select *from usulan_dupaks where dupak_no='E0004' and usulan_no='$no'";
												$data_E0004 = mysqli_query($koneksi, $sql_E0004);
												$data_bid_a_E0004 = mysqli_fetch_array($data_E0004);
												$jumlah_E0004 = $data_bid_a_E0004['kum_usulan_lama'] + $data_bid_a_E0004['kum_usulan_baru'];
												$kum_nilai_E0004 = $data_bid_a_E0004['kum_penilai_lama'] + $data_bid_a_E0004['kum_penilai_baru'];

												$cek_E0004 = "select *from usulan_dupak_details where dupak_no='E0004' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0004 = mysqli_query($koneksi, $cek_E0004);
												$r_E0004 = mysqli_fetch_array($da_E0004);

												if ($r_E0004['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0004['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>D</td>
													<td colspan="2" class="text-left">Menjadi reviewer Jurnal Internasional Bereputasi</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0004['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0004['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0004; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0004['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0004['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0004 ?></td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0005 = "select *from usulan_dupaks where dupak_no='E0005' and usulan_no='$no'";
												$data_E0005 = mysqli_query($koneksi, $sql_E0005);
												$data_bid_a_E0005 = mysqli_fetch_array($data_E0005);
												$jumlah_E0005 = $data_bid_a_E0005['kum_usulan_lama'] + $data_bid_a_E0005['kum_usulan_baru'];
												$kum_nilai_E0005 = $data_bid_a_E0005['kum_penilai_lama'] + $data_bid_a_E0005['kum_penilai_baru'];

												$cek_E0005 = "select *from usulan_dupak_details where dupak_no='E0005' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0005 = mysqli_query($koneksi, $cek_E0005);
												$r_E0005 = mysqli_fetch_array($da_E0005);

												if ($r_E0005['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0005['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>E</td>
													<td colspan="2" class="text-left">Membimbing Skripsi/TA</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0005['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0005['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0005; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0005['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0005['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0005 ?></td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0006 = "select *from usulan_dupaks where dupak_no='E0006' and usulan_no='$no'";
												$data_E0006 = mysqli_query($koneksi, $sql_E0006);
												$data_bid_a_E0006 = mysqli_fetch_array($data_E0006);
												$jumlah_E0006 = $data_bid_a_E0006['kum_usulan_lama'] + $data_bid_a_E0006['kum_usulan_baru'];
												$kum_nilai_E0006 = $data_bid_a_E0006['kum_penilai_lama'] + $data_bid_a_E0006['kum_penilai_baru'];

												$cek_E0006 = "select *from usulan_dupak_details where dupak_no='E0006' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0006 = mysqli_query($koneksi, $cek_E0006);
												$r_E0006 = mysqli_fetch_array($da_E0006);

												if ($r_E0006['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0006['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>F</td>
													<td colspan="2" class="text-left">Membimbing Tesis/Disertasi</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0006['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0006['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0006; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0006['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0006['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0006 ?></td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0007 = "select *from usulan_dupaks where dupak_no='E0007' and usulan_no='$no'";
												$data_E0007 = mysqli_query($koneksi, $sql_E0007);
												$data_bid_a_E0007 = mysqli_fetch_array($data_E0007);
												$jumlah_E0007 = $data_bid_a_E0007['kum_usulan_lama'] + $data_bid_a_E0007['kum_usulan_baru'];
												$kum_nilai_E0007 = $data_bid_a_E0007['kum_penilai_lama'] + $data_bid_a_E0007['kum_penilai_baru'];

												$cek_E0007 = "select *from usulan_dupak_details where dupak_no='E0007' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0007 = mysqli_query($koneksi, $cek_E0007);
												$r_E0007 = mysqli_fetch_array($da_E0007);

												if ($r_E0007['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0007['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>G</td>
													<td colspan="2" class="text-left">Membimbing KKN</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0007['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0007['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0007; ?></td>

													<td style="vertical-align: middle;"><?= $data_bid_a_E0007['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0007['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0007 ?></td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0008 = "select *from usulan_dupaks where dupak_no='E0008' and usulan_no='$no'";
												$data_E0008 = mysqli_query($koneksi, $sql_E0008);
												$data_bid_a_E0008 = mysqli_fetch_array($data_E0008);
												$jumlah_E0008 = $data_bid_a_E0008['kum_usulan_lama'] + $data_bid_a_E0008['kum_usulan_baru'];
												$kum_nilai_E0008 = $data_bid_a_E0008['kum_penilai_lama'] + $data_bid_a_E0008['kum_penilai_baru'];

												$cek_E0008 = "select *from usulan_dupak_details where dupak_no='E0008' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0008 = mysqli_query($koneksi, $cek_E0008);
												$r_E0008 = mysqli_fetch_array($da_E0008);

												if ($r_E0008['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0008['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>H</td>
													<td colspan="2" class="text-left">Membimbing PKL</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0008['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0008['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0008; ?></td>

													<td style="vertical-align: middle;"><?= $data_bid_a_E0008['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0008['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0008 ?></td>

													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0009 = "select *from usulan_dupaks where dupak_no='E0009' and usulan_no='$no'";
												$data_E0009 = mysqli_query($koneksi, $sql_E0009);
												$data_bid_a_E0009 = mysqli_fetch_array($data_E0009);
												$jumlah_E0009 = $data_bid_a_E0009['kum_usulan_lama'] + $data_bid_a_E0009['kum_usulan_baru'];
												$kum_nilai_E0009 = $data_bid_a_E0009['kum_penilai_lama'] + $data_bid_a_E0009['kum_penilai_baru'];

												$cek_E0009 = "select *from usulan_dupak_details where dupak_no='E0009' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0009 = mysqli_query($koneksi, $cek_E0009);
												$r_E0009 = mysqli_fetch_array($da_E0009);

												if ($r_E0009['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0009['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>I</td>
													<td colspan="2" class="text-left">Membimbing KKL</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0009['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0009['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0009; ?></td>

													<td style="vertical-align: middle;"><?= $data_bid_a_E0009['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0009['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0009 ?></td>

													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0010 = "select *from usulan_dupaks where dupak_no='E0010' and usulan_no='$no'";
												$data_E0010 = mysqli_query($koneksi, $sql_E0010);
												$data_bid_a_E0010 = mysqli_fetch_array($data_E0010);
												$jumlah_E0010 = $data_bid_a_E0010['kum_usulan_lama'] + $data_bid_a_E0010['kum_usulan_baru'];
												$kum_nilai_E0010 = $data_bid_a_E0010['kum_penilai_lama'] + $data_bid_a_E0010['kum_penilai_baru'];

												$cek_E0010 = "select *from usulan_dupak_details where dupak_no='E0010' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0010 = mysqli_query($koneksi, $cek_E0010);
												$r_E0010 = mysqli_fetch_array($da_E0010);

												if ($r_E0010['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0010['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>J</td>
													<td colspan="2" class="text-left">Membimbing Kegiatan Kemahasiswaan</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0010['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0010['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0010; ?></td>

													<td style="vertical-align: middle;"><?= $data_bid_a_E0010['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0010['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0010 ?></td>

													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_E0011 = "select *from usulan_dupaks where dupak_no='E0011' and usulan_no='$no'";
												$data_E0011 = mysqli_query($koneksi, $sql_E0011);
												$data_bid_a_E0011 = mysqli_fetch_array($data_E0011);
												$jumlah_E0011 = $data_bid_a_E0011['kum_usulan_lama'] + $data_bid_a_E0011['kum_usulan_baru'];
												$kum_nilai_E0011 = $data_bid_a_E0011['kum_penilai_lama'] + $data_bid_a_E0011['kum_penilai_baru'];

												$cek_E0011 = "select *from usulan_dupak_details where dupak_no='E0011' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
												$da_E0011 = mysqli_query($koneksi, $cek_E0011);
												$r_E0011 = mysqli_fetch_array($da_E0011);

												if ($r_E0011['kunci'] == '1') {
													$warna = "7bf360";
												} elseif ($r_E0011['kunci'] == '0') {
													$warna = "fd8888";
												} else {
													$warna = "";
												}
												?>
												<tr class="text-center" bgcolor="<?= $warna ?>">
													<td>K</td>
													<td colspan="2" class="text-left">Membimbing Seminar Mahasiswa</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0011['kum_usulan_lama']; ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0011['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_E0011; ?></td>

													<td style="vertical-align: middle;"><?= $data_bid_a_E0011['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_E0011['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $kum_nilai_E0011 ?></td>

													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>penilai/penilai_dupak_e/dupak/E0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_total = "SELECT
																SUM(`kum_usulan_lama`) AS kum_lama,
																SUM(`kum_usulan_baru`) AS kum_baru,
																SUM(`kum_penilai_lama`) AS kum_penilai_lama,
																SUM(`kum_penilai_baru`) AS kum_penilai_baru
															  FROM
																usulan_dupaks
															  WHERE usulan_no = '$no'
																AND LEFT(dupak_no, 1) = 'E'";
												$data_total = mysqli_query($koneksi, $sql_total);
												$data_kum_total = mysqli_fetch_array($data_total);
												$jmlah_kum = $data_kum_total['kum_lama'] + $data_kum_total['kum_baru'];
												$jmlah_kum_penilai = $data_kum_total['kum_penilai_lama'] + $data_kum_total['kum_penilai_baru'];
												?>
												<tr>
												</tr>
												<tr style="background-color: #e4e4e4; font-weight: bold;">
													<td colspan="4" class="text-right"><b>JUMLAH KEGIATAN TAMBAHAN LK/GB</b></td>
													<td style="vertical-align: middle;" class="text-center"><?= $data_kum_total['kum_lama'] ?></td>
													<td style="vertical-align: middle;" class="text-center"><?= $data_kum_total['kum_baru'] ?></td>
													<td style="vertical-align: middle;" class="text-center"><?= $jmlah_kum ?></td>
													<td style="vertical-align: middle;" class="text-center"><?= $data_kum_total['kum_penilai_lama'] ?></td>
													<td style="vertical-align: middle;" class="text-center"><?= $data_kum_total['kum_penilai_baru'] ?></td>
													<td style="vertical-align: middle;" class="text-center"><?= $jmlah_kum_penilai ?></td>
													<td></td>
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