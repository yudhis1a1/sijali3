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

					<?php if ($role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_mtk_pak/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah PAK</span></a> </li>
					<?php } ?>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_matakul/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>

					<li class="nav-item"> <a class="nav-link active" href="<?= base_url() ?>usulan/usulan/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>

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

						<div class="card">
							<div class="card-header bg-info">
								<h4 class="m-b-0 text-white">Bidang D</h4>
							</div>
							<div class="card-body">
								<h4 class="card-title"></h4>
								<div class="row">
									<table class="ui celled table">
										<tr>
											<td>
												<center>
													<a href="<?= base_url() ?>usulan/usulan_dupak_d/print_bidangd/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> BIDANG D</a>
													<a href="<?= base_url() ?>usulan/usulan/print_dupak/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> PRINT DUPAK</a>
												</center>
											</td>
										</tr>
									</table>
									<div class="table-responsive m-t-40">

										<table class="table color-table info-table table-bordered">

											<col width="30" span="5" />
											<col width="309" />
											<col width="61" span="2" />
											<col width="75" />
											<col width="61" />

											<thead>
												<tr class="text-center">
													<th rowspan="4" class="text-center" style="vertical-align: middle;">NO.</th>
													<th colspan="8" class="text-center">UNSUR YANG DINILAI</th>
													<th rowspan="4" class="text-center" style="vertical-align: middle;">
														AKSI
													</th>
												</tr>
												<tr class="text-center">
													<th colspan="5" rowspan="3" class="text-center" style="vertical-align: middle;">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</th>
													<th colspan="3" class="text-center">ANGKA KREDIT MENURUT</th>
												</tr>
												<tr>
													<th colspan="3" class="text-center">INSTANSI PENGUSUL</th>
												</tr>
												<tr>
													<th class="text-center">LAMA</th>
													<th class="text-center">BARU</th>
													<th class="text-center">JUMLAH</th>
												</tr>
											</thead>
											<tbody>
												<tr class="text-center">
													<td rowspan="57">V</td>
													<td colspan="5" class="text-left">PENUNJANG TUGAS DOSEN</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr class="text-center">
													<td rowspan="3">A</td>
													<td colspan="4" class="text-left">Menjadi anggota dalam suatu Panitia/Badan pada perguruan tinggi</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0001 = "select *from usulan_dupaks where dupak_no='D0001' and usulan_no='$no'";
												$data_D0001 = mysqli_query($koneksi, $sql_D0001);
												$data_bid_a_D0001 = mysqli_fetch_array($data_D0001);
												$jumlah_D0001 = $data_bid_a_D0001['kum_usulan_lama'] + $data_bid_a_D0001['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>1</td>
													<td colspan="3" class="text-left">Sebagai ketua/wakil ketua merangkap anggota</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0001['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0001['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0001 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0002 = "select *from usulan_dupaks where dupak_no='D0002' and usulan_no='$no'";
												$data_D0002 = mysqli_query($koneksi, $sql_D0002);
												$data_bid_a_D0002 = mysqli_fetch_array($data_D0002);
												$jumlah_D0002 = $data_bid_a_D0002['kum_usulan_lama'] + $data_bid_a_D0002['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>2</td>
													<td colspan="3" class="text-left">Sebagai anggota</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0002['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0002['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0002 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="7">B</td>
													<td colspan="4" class="text-left">Menjadi anggota panitia/badan pada lembaga pemerintah</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr class="text-center">
													<td rowspan="3">1</td>
													<td colspan="3" class="text-left">Panitia pusat</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0003 = "select *from usulan_dupaks where dupak_no='D0003' and usulan_no='$no'";
												$data_D0003 = mysqli_query($koneksi, $sql_D0003);
												$data_bid_a_D0003 = mysqli_fetch_array($data_D0003);
												$jumlah_D0003 = $data_bid_a_D0003['kum_usulan_lama'] + $data_bid_a_D0003['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>a.</td>
													<td colspan="2" class="text-left">Ketua/Wakil Ketua</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0003['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0003['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0003 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0004 = "select *from usulan_dupaks where dupak_no='D0004' and usulan_no='$no'";
												$data_D0004 = mysqli_query($koneksi, $sql_D0004);
												$data_bid_a_D0004 = mysqli_fetch_array($data_D0004);
												$jumlah_D0004 = $data_bid_a_D0004['kum_usulan_lama'] + $data_bid_a_D0004['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>b.</td>
													<td colspan="2" class="text-left">Anggota</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0004['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0004['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0004 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="3">2</td>
													<td colspan="3" class="text-left">Panitia daerah</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr class="text-center">
													<?php
													$sql_D0005 = "select *from usulan_dupaks where dupak_no='D0005' and usulan_no='$no'";
													$data_D0005 = mysqli_query($koneksi, $sql_D0005);
													$data_bid_a_D0005 = mysqli_fetch_array($data_D0005);
													$jumlah_D0005 = $data_bid_a_D0005['kum_usulan_lama'] + $data_bid_a_D0005['kum_usulan_baru'];
													?>
													<td>a.</td>
													<td colspan="2" class="text-left">Ketua/Wakil Ketua</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0005['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0005['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0005 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0006 = "select *from usulan_dupaks where dupak_no='D0006' and usulan_no='$no'";
												$data_D0006 = mysqli_query($koneksi, $sql_D0006);
												$data_bid_a_D0006 = mysqli_fetch_array($data_D0006);
												$jumlah_D0006 = $data_bid_a_D0006['kum_usulan_lama'] + $data_bid_a_D0006['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>b.</td>
													<td colspan="2" class="text-left">Anggota</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0006['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0006['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0006 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="9">C</td>
													<td colspan="4" class="text-left">Menjadi anggota organisasi profesi</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr class="text-center">
													<td rowspan="4">1</td>
													<td colspan="3" class="text-left">Tingkat internasional</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0007 = "select *from usulan_dupaks where dupak_no='D0007' and usulan_no='$no'";
												$data_D0007 = mysqli_query($koneksi, $sql_D0007);
												$data_bid_a_D0007 = mysqli_fetch_array($data_D0007);
												$jumlah_D0007 = $data_bid_a_D0007['kum_usulan_lama'] + $data_bid_a_D0007['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>a.</td>
													<td colspan="2" class="text-left">Pengurus</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0007['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0007['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0007 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0008 = "select *from usulan_dupaks where dupak_no='D0008' and usulan_no='$no'";
												$data_D0008 = mysqli_query($koneksi, $sql_D0008);
												$data_bid_a_D0008 = mysqli_fetch_array($data_D0008);
												$jumlah_D0008 = $data_bid_a_D0008['kum_usulan_lama'] + $data_bid_a_D0008['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>b.</td>
													<td colspan="2" class="text-left">Anggota atas permintaan</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0008['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0008['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0008 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0009 = "select *from usulan_dupaks where dupak_no='D0009' and usulan_no='$no'";
												$data_D0009 = mysqli_query($koneksi, $sql_D0009);
												$data_bid_a_D0009 = mysqli_fetch_array($data_D0009);
												$jumlah_D0009 = $data_bid_a_D0009['kum_usulan_lama'] + $data_bid_a_D0009['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>c.</td>
													<td colspan="2" class="text-left">Anggota</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0009['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0009['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0009 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="4">2</td>
													<td colspan="3" class="text-left">Tingkat nasional</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0010 = "select *from usulan_dupaks where dupak_no='D0010' and usulan_no='$no'";
												$data_D0010 = mysqli_query($koneksi, $sql_D0010);
												$data_bid_a_D0010 = mysqli_fetch_array($data_D0010);
												$jumlah_D0010 = $data_bid_a_D0010['kum_usulan_lama'] + $data_bid_a_D0010['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>a.</td>
													<td colspan="2" class="text-left">Pengurus</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0010['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0010['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0010 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0011 = "select *from usulan_dupaks where dupak_no='D0011' and usulan_no='$no'";
												$data_D0011 = mysqli_query($koneksi, $sql_D0011);
												$data_bid_a_D0011 = mysqli_fetch_array($data_D0011);
												$jumlah_D0011 = $data_bid_a_D0011['kum_usulan_lama'] + $data_bid_a_D0011['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>b.</td>
													<td colspan="2" class="text-left">Anggota atas permintaan</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0011['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0011['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0011 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0012 = "select *from usulan_dupaks where dupak_no='D0012' and usulan_no='$no'";
												$data_D0012 = mysqli_query($koneksi, $sql_D0012);
												$data_bid_a_D0012 = mysqli_fetch_array($data_D0012);
												$jumlah_D0012 = $data_bid_a_D0012['kum_usulan_lama'] + $data_bid_a_D0012['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>c.</td>
													<td colspan="2" class="text-left">Anggota</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0012['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0012['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0012 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="3">D</td>
													<td colspan="4" class="text-left">Mewakili perguruan tinggi/lembaga pemerintah</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0013 = "select *from usulan_dupaks where dupak_no='D0013' and usulan_no='$no'";
												$data_D0013 = mysqli_query($koneksi, $sql_D0013);
												$data_bid_a_D0013 = mysqli_fetch_array($data_D0013);
												$jumlah_D0013 = $data_bid_a_D0013['kum_usulan_lama'] + $data_bid_a_D0013['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td rowspan="2">1</td>
													<td colspan="3" rowspan="2" class="text-left">Mewakili perguruan tinggi/ Iembaga pemerintah duduk dalam panitia antar lembaga</td>
													<td rowspan="2" style="vertical-align: middle;"><?= $data_bid_a_D0013['kum_usulan_lama'] ?></td>
													<td rowspan="2" style="vertical-align: middle;"><?= $data_bid_a_D0013['kum_usulan_baru'] ?></td>
													<td rowspan="2" style="vertical-align: middle;"><?= $jumlah_D0013 ?></td>
													<td rowspan="2" style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr>
												</tr>
												<tr class="text-center">
													<td rowspan="3">E</td>
													<td colspan="4" class="text-left">Menjadi anggota delegasi nasional ke pertemuan internasional</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0014 = "select *from usulan_dupaks where dupak_no='D0014' and usulan_no='$no'";
												$data_D0014 = mysqli_query($koneksi, $sql_D0014);
												$data_bid_a_D0014 = mysqli_fetch_array($data_D0014);
												$jumlah_D0014 = $data_bid_a_D0014['kum_usulan_lama'] + $data_bid_a_D0014['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>1</td>
													<td colspan="3" class="text-left">Sebagai ketua delegasi</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0014['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0014['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0014 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0015 = "select *from usulan_dupaks where dupak_no='D0015' and usulan_no='$no'";
												$data_D0015 = mysqli_query($koneksi, $sql_D0015);
												$data_bid_a_D0015 = mysqli_fetch_array($data_D0015);
												$jumlah_D0015 = $data_bid_a_D0015['kum_usulan_lama'] + $data_bid_a_D0015['kum_usulan_baru'];
												?>
												<tr class="text-center">
													<td>2</td>
													<td colspan="3" class="text-left">Sebagai anggota delegasi</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0015['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0015['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0015 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												</tr>
												<tr class="text-center">
													<td rowspan="7">F</td>
													<td colspan="4" class="text-left">Berperan serta aktif dalam pertemuan ilmiah</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr class="text-center">
													<td rowspan="3">1</td>
													<td colspan="3" class="text-left">Tingkat internasional/nasional/regional sebagai:</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0016 = "select *from usulan_dupaks where dupak_no='D0016' and usulan_no='$no'";
												$data_D0016 = mysqli_query($koneksi, $sql_D0016);
												$data_bid_a_D0016 = mysqli_fetch_array($data_D0016);
												$jumlah_D0016 = $data_bid_a_D0016['kum_usulan_lama'] + $data_bid_a_D0016['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>a.</td>
													<td colspan="2" class="text-left">Ketua</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0016['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0016['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0016 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0017 = "select *from usulan_dupaks where dupak_no='D0017' and usulan_no='$no'";
												$data_D0017 = mysqli_query($koneksi, $sql_D0017);
												$data_bid_a_D0017 = mysqli_fetch_array($data_D0017);
												$jumlah_D0017 = $data_bid_a_D0017['kum_usulan_lama'] + $data_bid_a_D0017['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>b.</td>
													<td colspan="2" class="text-left">Anggota</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0017['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0017['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0017 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0017/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="3">2</td>
													<td colspan="3" class="text-left">Di lingkungan perguruan tinggi sebagai:</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0018 = "select *from usulan_dupaks where dupak_no='D0018' and usulan_no='$no'";
												$data_D0018 = mysqli_query($koneksi, $sql_D0018);
												$data_bid_a_D0018 = mysqli_fetch_array($data_D0018);
												$jumlah_D0018 = $data_bid_a_D0018['kum_usulan_lama'] + $data_bid_a_D0018['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>a.</td>
													<td colspan="2" class="text-left">Ketua</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0018['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0018['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0018 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0018/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0019 = "select *from usulan_dupaks where dupak_no='D0019' and usulan_no='$no'";
												$data_D0019 = mysqli_query($koneksi, $sql_D0019);
												$data_bid_a_D0019 = mysqli_fetch_array($data_D0019);
												$jumlah_D0019 = $data_bid_a_D0019['kum_usulan_lama'] + $data_bid_a_D0019['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>b.</td>
													<td colspan="2" class="text-left">Anggota</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0019['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0019['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0019 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0019/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="9">G</td>
													<td colspan="4" class="text-left">Mendapat penghargaan / tanda jasa</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr class="text-center">
													<td rowspan="4">1</td>
													<td colspan="3" class="text-left">Penghargaan/tanda jasa Satya Lancana Karya Satya</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0020 = "select *from usulan_dupaks where dupak_no='D0020' and usulan_no='$no'";
												$data_D0020 = mysqli_query($koneksi, $sql_D0020);
												$data_bid_a_D0020 = mysqli_fetch_array($data_D0020);
												$jumlah_D0020 = $data_bid_a_D0020['kum_usulan_lama'] + $data_bid_a_D0020['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>a.</td>
													<td colspan="2" class="text-left">30 (tiga puluh) tahun</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0020['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0020['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0020 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0020/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0021 = "select *from usulan_dupaks where dupak_no='D0021' and usulan_no='$no'";
												$data_D0021 = mysqli_query($koneksi, $sql_D0021);
												$data_bid_a_D0021 = mysqli_fetch_array($data_D0021);
												$jumlah_D0021 = $data_bid_a_D0021['kum_usulan_lama'] + $data_bid_a_D0021['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>b.</td>
													<td colspan="2" class="text-left">20 (dua puluh) tahun</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0021['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0021['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0021 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0021/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0022 = "select *from usulan_dupaks where dupak_no='D0022' and usulan_no='$no'";
												$data_D0022 = mysqli_query($koneksi, $sql_D0022);
												$data_bid_a_D0022 = mysqli_fetch_array($data_D0022);
												$jumlah_D0022 = $data_bid_a_D0022['kum_usulan_lama'] + $data_bid_a_D0022['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>c.</td>
													<td colspan="2" class="text-left">10 (sepuluh) tahun</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0022['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0022['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0022 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0022/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="4">2</td>
													<td colspan="3" class="text-left">Memperoleh penghargaan lainnya</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0023 = "select *from usulan_dupaks where dupak_no='D0023' and usulan_no='$no'";
												$data_D0023 = mysqli_query($koneksi, $sql_D0023);
												$data_bid_a_D0023 = mysqli_fetch_array($data_D0023);
												$jumlah_D0023 = $data_bid_a_D0023['kum_usulan_lama'] + $data_bid_a_D0023['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>a.</td>
													<td colspan="2" class="text-left">Tingkat internasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0023['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0023['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0023 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0023/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0024 = "select *from usulan_dupaks where dupak_no='D0024' and usulan_no='$no'";
												$data_D0024 = mysqli_query($koneksi, $sql_D0024);
												$data_bid_a_D0024 = mysqli_fetch_array($data_D0024);
												$jumlah_D0024 = $data_bid_a_D0024['kum_usulan_lama'] + $data_bid_a_D0024['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>b.</td>
													<td colspan="2" class="text-left">Tingkat nasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0024['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0024['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0024 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0024/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0025 = "select *from usulan_dupaks where dupak_no='D0025' and usulan_no='$no'";
												$data_D0025 = mysqli_query($koneksi, $sql_D0025);
												$data_bid_a_D0025 = mysqli_fetch_array($data_D0025);
												$jumlah_D0025 = $data_bid_a_D0025['kum_usulan_lama'] + $data_bid_a_D0025['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>c.</td>
													<td colspan="2" class="text-left">Tingkat Daerah/Lokal</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0025['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0025['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0025 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0025/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="5">H</td>
													<td colspan="4" rowspan="2" class="text-left">Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional</td>
													<td rowspan="2"></td>
													<td rowspan="2"></td>
													<td rowspan="2"></td>
													<td rowspan="2"></td>
												</tr>
												<tr>
												</tr>
												<?php
												$sql_D0026 = "select *from usulan_dupaks where dupak_no='D0026' and usulan_no='$no'";
												$data_D0026 = mysqli_query($koneksi, $sql_D0026);
												$data_bid_a_D0026 = mysqli_fetch_array($data_D0026);
												$jumlah_D0026 = $data_bid_a_D0026['kum_usulan_lama'] + $data_bid_a_D0026['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>1</td>
													<td colspan="3" class="text-left">Buku SLTA atau setingkat</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0026['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0026['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0026 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0026/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0027 = "select *from usulan_dupaks where dupak_no='D0027' and usulan_no='$no'";
												$data_D0027 = mysqli_query($koneksi, $sql_D0027);
												$data_bid_a_D0027 = mysqli_fetch_array($data_D0027);
												$jumlah_D0027 = $data_bid_a_D0027['kum_usulan_lama'] + $data_bid_a_D0027['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>2</td>
													<td colspan="3" class="text-left">Buku SLTP atau setingkat</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0027['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0027['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0027 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0027/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>
												<?php
												$sql_D0028 = "select *from usulan_dupaks where dupak_no='D0028' and usulan_no='$no'";
												$data_D0028 = mysqli_query($koneksi, $sql_D0028);
												$data_bid_a_D0028 = mysqli_fetch_array($data_D0028);
												$jumlah_D0028 = $data_bid_a_D0028['kum_usulan_lama'] + $data_bid_a_D0028['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>3</td>
													<td colspan="3" class="text-left">Buku SD atau setingkat</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0028['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0028['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0028 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0028/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="4">I</td>
													<td colspan="4" class="text-left">Mempunyai prestasi di bidang olahraga/humaniora</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0029 = "select *from usulan_dupaks where dupak_no='D0029' and usulan_no='$no'";
												$data_D0029 = mysqli_query($koneksi, $sql_D0029);
												$data_bid_a_D0029 = mysqli_fetch_array($data_D0029);
												$jumlah_D0029 = $data_bid_a_D0029['kum_usulan_lama'] + $data_bid_a_D0029['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>1</td>
													<td colspan="3" class="text-left">Tingkat internasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0029['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0029['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0029 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0029/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0030 = "select *from usulan_dupaks where dupak_no='D0030' and usulan_no='$no'";
												$data_D0030 = mysqli_query($koneksi, $sql_D0030);
												$data_bid_a_D0030 = mysqli_fetch_array($data_D0030);
												$jumlah_D0030 = $data_bid_a_D0030['kum_usulan_lama'] + $data_bid_a_D0030['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>2</td>
													<td colspan="3" class="text-left">Tingkat nasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0030['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0030['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0030 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0030/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0031 = "select *from usulan_dupaks where dupak_no='D0031' and usulan_no='$no'";
												$data_D0031 = mysqli_query($koneksi, $sql_D0031);
												$data_bid_a_D0031 = mysqli_fetch_array($data_D0031);
												$jumlah_D0031 = $data_bid_a_D0031['kum_usulan_lama'] + $data_bid_a_D0031['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>3</td>
													<td colspan="3" class="text-left">Tingkat daerah/lokal</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0031['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0031['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0031 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0031/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<tr class="text-center">
													<td rowspan="2">J</td>
													<td colspan="4" class="text-left">Keanggotaan dalam tim penilaian</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0032 = "select *from usulan_dupaks where dupak_no='D0032' and usulan_no='$no'";
												$data_D0032 = mysqli_query($koneksi, $sql_D0032);
												$data_bid_a_D0032 = mysqli_fetch_array($data_D0032);
												$jumlah_D0032 = $data_bid_a_D0032['kum_usulan_lama'] + $data_bid_a_D0032['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>1</td>
													<td colspan="3" class="text-left">Menjadi anggota tim penilaian jabatan Akademik Dosen</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0032['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0032['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0032 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0032/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>

												<tr class="text-center">
													<td rowspan="4">K</td>
													<td colspan="4" class="text-left">Menjadi Asesor kegiatan seperti PAK, BKD, Hibah Penelitian dan Pengabdian (tiap kegiatan)</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
												$sql_D0033 = "select *from usulan_dupaks where dupak_no='D0033' and usulan_no='$no'";
												$data_D0033 = mysqli_query($koneksi, $sql_D0033);
												$data_bid_a_D0033 = mysqli_fetch_array($data_D0033);
												$jumlah_D0033 = $data_bid_a_D0033['kum_usulan_lama'] + $data_bid_a_D0033['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>1</td>
													<td colspan="3" class="text-left">Skala internasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0033['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0033['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0033 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0033/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0034 = "select *from usulan_dupaks where dupak_no='D0034' and usulan_no='$no'";
												$data_D0034 = mysqli_query($koneksi, $sql_D0034);
												$data_bid_a_D0034 = mysqli_fetch_array($data_D0034);
												$jumlah_D0034 = $data_bid_a_D0034['kum_usulan_lama'] + $data_bid_a_D0034['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>2</td>
													<td colspan="3" class="text-left">Skala nasional</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0034['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0034['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0034 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0034/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_D0035 = "select *from usulan_dupaks where dupak_no='D0035' and usulan_no='$no'";
												$data_D0035 = mysqli_query($koneksi, $sql_D0035);
												$data_bid_a_D0035 = mysqli_fetch_array($data_D0035);
												$jumlah_D0035 = $data_bid_a_D0035['kum_usulan_lama'] + $data_bid_a_D0035['kum_usulan_baru'];
												?>
												<tr class="text-center">

													<td>3</td>
													<td colspan="3" class="text-left">Skala daerah/lokal</td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0035['kum_usulan_lama'] ?></td>
													<td style="vertical-align: middle;"><?= $data_bid_a_D0035['kum_usulan_baru'] ?></td>
													<td style="vertical-align: middle;"><?= $jumlah_D0035 ?></td>
													<td style="vertical-align: middle;">

														<a href="<?= base_url() ?>usulan/usulan_dupak_d/dupak/D0035/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>

													</td>
												</tr>
												<?php
												$sql_total = "SELECT
						  SUM(`kum_usulan_lama`) AS kum_lama,
						  SUM(`kum_usulan_baru`) AS kum_baru
						FROM
						  usulan_dupaks
						WHERE usulan_no = '$no'
						  AND LEFT(dupak_no, 1) = 'D'";
												$data_total = mysqli_query($koneksi, $sql_total);
												$data_kum_total = mysqli_fetch_array($data_total);
												$jmlah_kum = $data_kum_total['kum_lama'] + $data_kum_total['kum_baru'];
												?>
												<tr style="background-color: #e4e4e4; font-weight: bold;">

													<td colspan="6" class="text-right"><b>JUMLAH BIDANG D</b></td>
													<td style="vertical-align: middle;" class="text-center"><?= $data_kum_total['kum_lama'] ?></td>
													<td style="vertical-align: middle;" class="text-center"><?= $data_kum_total['kum_baru'] ?></td>
													<td style="vertical-align: middle;" class="text-center"><?= $jmlah_kum ?></td>
													<td style="vertical-align: middle;" class="text-center"></td>
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