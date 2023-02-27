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
			if ($data_dasar->usulan_status_id == '1') {
				echo "Draft";
			} elseif ($data_dasar->usulan_status_id == '2') {
				echo "Draft Revisi";
			} elseif ($data_dasar->usulan_status_id == '3') {
				echo "Usulan Baru";
			} elseif ($data_dasar->usulan_status_id == '4') {
				echo "Proses Approval Tim Penilai";
			} elseif ($data_dasar->usulan_status_id == '5') {
				echo "Proses Penilaian";
			} elseif ($data_dasar->usulan_status_id == '6') {
				echo "Proses Operator Ketenagaan";
			} elseif ($data_dasar->usulan_status_id == '7') {
				echo "Proses Dikti";
			} elseif ($data_dasar->usulan_status_id == '8') {
				echo "Proses Operator Kepegawaian";
			} elseif ($data_dasar->usulan_status_id == '9') {
				echo "Selesai";
			} elseif ($data_dasar->usulan_status_id == '10') {
				echo "Pengajuan Usulan Baru";
			}
			?>
		</h4>
	</div>
</div>

<!-- 
<?php if ($data_dasar->usulan_status_id == '10') { ?>
	<?php if ($role <> '3') { ?>
	<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah"  class="btn btn-success"><i class="fa fa-flask"></i> Proses Usulan Baru</a> 
	<a href="" data-toggle="modal" id="myLargeModalLabel1" data-target="#revisi"  class="btn btn-warning"><i class="fa fa-retweet"></i> Revisi Draft</a>
	<hr>
	<?php
	} ?>
<?php
} elseif ($usulan_status_id <> '1' && $usulan_status_id <> '2') {
} elseif ($role == '3') { ?>
	<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah"  class="btn btn-success"><i class="fa fa-flask"></i>Pengajuan Usulan Baru</a>
	<hr>
<?php
} ?> -->


<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"> <a class="nav-link active" data-toggle="tab" id="nav_dasar" href="#dasar" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>

					<?php if ($role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_mtk_pak/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah PAK</span></a> </li>
					<?php } ?>

					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/show_matakul/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>


					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_pendidikan/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangA/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangB/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangC/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangD/<?php echo $data_dasar->no; ?>" role="tab"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>

					<?php
					$tgl = date('Y-m-d');
					$pengangkatan_tgl = "$data_dasar->pengangkatan_tgl";
					$selisih = $tgl - $pengangkatan_tgl;
					$usulan_jabatan = "$data_dasar->jabatan_usulan_no";

					// echo"usulan_jabatan = $usulan_jabatan<br>";
					// echo"Tanggal sekarang = $tgl<br>";
					// echo"Tanggal pengangkatan = $pengangkatan_tgl<br>";
					// echo"selisih = $selisih<br>";

					if ($usulan_jabatan == '8' || $usulan_jabatan == '11' || $usulan_jabatan == '12' || $usulan_jabatan == '9' || $usulan_jabatan == '10' || $usulan_jabatan == '13') {
						if ($selisih < '8') {
					?>
							<!-- <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangE/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Tambahan LK/GB</span></a> </li> -->
						<?php
						}
					} elseif ($usulan_jabatan == '14' || $usulan_jabatan == '15') {
						if ($selisih > '9') {
						?>
							<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangE/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Tambahan LK/GB</span></a> </li>
					<?php
						}
					}
					?>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/persyaratan/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_resume/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_log/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>

					<?php if ($usulan_status_id == '9' && $role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/skpak/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-files"></i></span> <span class="hidden-xs-down">SK & PAK</span></a> </li>
					<?php } ?>

				</ul>

				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<?php $no_usulan = $data_dasar->no; ?>
					<div class="tab-pane active p-20" id="dasar" role="tabpanel">
						<!-- Progress Bar -->
						<?php
						$nidn_dos = $data_dasar->nidn;
						if (($role == '3' && ($usulan_status_id == '1' || $usulan_status_id == '2')) || $role == '1') {
						?>
							<div class="card text-white bg-danger">
								<div class="card-body">
									<h3 class="card-title">Catatan : </h3>
									<p class="card-text"><b>1. Pastikan data Anda sudah benar. Jika data Anda masih salah atau kosong, silakan Anda perbarui data PDDIKTI Anda melalui SISTER.</b></p>
									<p class="card-text"><b>2. Data yang telah diperbaharui dan sudah tervalidasi melalui laman SISTER akan terproses dalam jangka waktu 2 x 24 jam untuk ditampilkan pada Sistem Jabatan Fungsional LLDIKTI III (SIJALI III).</b></p>
									<p class="card-text"><b>3. Untuk memperbarui data di Sistem Jabatan Fungsional LLDIKTI III (SIJALI III) dengan data SISTER/PDDIKTI, Silakan klik tombol dibawah ini :
											<form method="post" id="sample_form">
												<button type="submit" class="btn btn-info" name="save" id="save"><i class="fa  fa-retweet"></i> [SINKRON IDENTITAS DOSEN PDDIKTI]</button>
											</form>
										</b></p>
								</div>
							</div>
						<?php
						}
						?>

						<span id="success_message"></span>
						<div class="form-group" id="process" style="display:none;">
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
							<?php if ($sinkron_at <> '') { ?>
								<font color="red">
									<b><i>*Data telah disinkron pada tanggal <?= $sinkron_at ?></i></b>
								</font>
							<?php } ?>

							<div class="card-header bg-info">
								<h4 class="m-b-0 text-white">Data Dosen</h4>
							</div>

							<div class="card-body">
								<div class="col-md-12">
									<?php
									if ($role == '4' && $usulan_status_id == '9') {
									?>
										<a href="<?= base_url() ?>usulan/usulan/download_pak/<?php echo $data_dasar->pak; ?>" target="_blank">_</a>
										<a href="<?= base_url() ?>usulan/usulan/download_sk/<?php echo $data_dasar->sk_jafung; ?>" target="_blank">_</a>
									<?php
									}
									?>
								</div>
								<form class="form">
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">NIDN/NIDK</label>
										<div class="col-10">
											<input class="form-control" type="text" id="nidn" value="<?php echo "$data_dasar->nidn /$data_dasar->nidk"; ?>" readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">NIP</label>
										<div class="col-10">
											<input class="form-control" type="text" id="nip" value=" <?php echo $data_dasar->nip; ?> " readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">No KARPEG</label>
										<div class="col-10">
											<input class="form-control" type="text" id="karpeg" value=" <?php echo $data_dasar->karpeg; ?> " readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Nama</label>
										<div class="col-10">
											<input class="form-control" type="text" id="nama" value=" <?php echo $data_dasar->nm_dosen; ?> " readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Gelar Depan</label>
										<div class="col-10">
											<input class="form-control" type="text" id="f_gelar" value=" <?php echo $data_dasar->gelar_depan; ?> " readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Gelar Belakang</label>
										<div class="col-10">
											<input class="form-control" type="text" id="l_gelar" value=" <?php echo $data_dasar->gelar_belakang; ?> " readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Ikatan Kerja</label>
										<div class="col-10">
											<input class="form-control" type="text" id="ikadin" value=" <?php echo $data_dasar->nm_ikadin; ?> " readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Tanggal Pengangkatan</label>
										<div class="col-10">
											<input class="form-control" type="text" id="tgl_p" value=" <?php echo $data_dasar->pengangkatan_tgl; ?> " readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Homebase PT</label>
										<div class="col-10">
											<input class="form-control" type="text" id="dosen_pt" value=" <?php echo "$data_dasar->kd_pt $data_dasar->nm_pt"; ?> " readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Homebase Prodi</label>
										<div class="col-10">
											<input class="form-control" type="text" id="prodi" value=" <?php echo "$data_dasar->kd_prodi $data_dasar->nm_prodi"; ?> " readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Tempat dan Tanggal Lahir</label>
										<div class="col-10">
											<input class="form-control" type="text" id="dosen_ttl" value=" <?php echo  "$data_dasar->lahir_tempat, $data_dasar->lahir_tgl"; ?>" readonly>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Jenis Kelamin</label>
										<div class="col-10">
											<?php if ($data_dasar->jk == 'L') {
												$jk = "Laki-Laki";
											} else {
												$jk = "Perempuan";
											}; ?>
											<input class="form-control" type="text" id="dosen_jk" value="<?php echo $jk; ?> " readonly>
										</div>
									</div>
									<?php
									$jab = "SELECT
												a.`jabatan_no`,
												a.`jabatan_tgl`,
												b.`kode`,
												b.`nama_jabatans`,
												b.`kum`,
												a.`golongan_kode`,
												c.`kode_gol`,
												c.`nama` AS golongan_nama,
												a.`masa_kerja_gol_thn`,
												a.`masa_kerja_gol_bln`
											FROM
												`dosens` a
												LEFT JOIN `jabatans` b
												ON a.`jabatan_no` = b.`kode`
												LEFT JOIN `golongans` c
												ON a.`golongan_kode` = c.`kode`
											WHERE a.`nidn` = '$data_dasar->nidn'";
									$d_jab = mysqli_query($koneksi, $jab);
									$r_jab = mysqli_fetch_array($d_jab);
									?>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Jabatan Sebelumnya</label>
										<div class="col-10">
											<input class="form-control" type="text" value="<?= $r_jab['nama_jabatans'] ?> (<?= $r_jab['kum'] ?>)" readonly>
										</div>
									</div>

									<?php
									if ($data_dasar->ikatan_kerja_kode == 'B' && $data_dasar->jabatan_no == '31') {
										$thn_cpns = substr($data_dasar->nip, 8, 4);
										$bln_cpns = substr($data_dasar->nip, 12, 2);
										$bulan = array(
											'01' => 'JANUARI',
											'02' => 'FEBRUARI',
											'03' => 'MARET',
											'04' => 'APRIL',
											'05' => 'MEI',
											'06' => 'JUNI',
											'07' => 'JULI',
											'08' => 'AGUSTUS',
											'09' => 'SEPTEMBER',
											'10' => 'OKTOBER',
											'11' => 'NOVEMBER',
											'12' => 'DESEMBER',
										);

										$tmt_cpns 	= $thn_cpns . '-' . $bln_cpns . '-01';
										$waktuawal  = date_create($tmt_cpns);
										$waktuakhir = date_create($data_dasar->pengangkatan_tgl);
										$diff  		= date_diff($waktuawal, $waktuakhir);

										$thn_cpns_ok = $diff->y;
										$bln_cpns_ok = $diff->m;
									?>
										<div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">TMT CPNS</label>
											<div class="col-10">
												<input class="form-control" type="text" value="<?= $bulan[$bln_cpns] ?> <?= $thn_cpns ?>" readonly>
											</div>
										</div>
										<div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">Masa kerja dosen PNS DPK dengan Tanggal Pengangkatan</label>
											<div class="col-1">
												<input class="form-control" type="text" value="<?= $thn_cpns_ok ?>" readonly>Tahun
											</div>
											<div class="col-1">
												<input class="form-control" type="text" value="<?= $bln_cpns_ok ?>" readonly>Bulan
											</div>
										</div>
									<?php } ?>

									<?php
									if ($data_dasar->jabatan_no <> '31') {
									?>
										<div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">TMT Jabatan Sebelumnya</label>
											<div class="col-10">
												<input class="form-control" type="text" name="jabatan_usulan_no" value="<?= $r_jab['jabatan_tgl'] ?>" readonly>
											</div>
										</div>
										<?php
										$tmt = "SELECT
												`tmt_tahun`,
												`tmt_bulan`
												FROM
												tmt_jab
												WHERE `usulan_no` = '$data_dasar->no'
												AND `dosen_no` = '$data_dasar->dosen_no'";
										$d_tmt = mysqli_query($koneksi, $tmt);
										$r_tmt = mysqli_fetch_array($d_tmt);
										?>
										<!-- <div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">Masa Kerja dari TMT pada PAK Jabatan Sebelumnya</label>
											<div class="col-1">
												<input class="form-control" type="text" value="<?= $r_tmt['tmt_tahun'] ?>" readonly>Tahun
											</div>
											<div class="col-1">
												<input class="form-control" type="text" value="<?= $r_tmt['tmt_bulan'] ?>" readonly>Bulan
											</div>
											<div class="col-2">
												<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#edit_tmt" class="btn btn-warning"><i class="fa fa-edit"></i>Ubah Data</a>
											</div>
										</div> -->
										<div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">Pangkat / Golongan</label>
											<div class="col-10">
												<input class="form-control" type="text" name="golongan" value="<?= $r_jab['golongan_nama'] ?> (<?= $r_jab['kode_gol'] ?>)" readonly>
											</div>
										</div>
										<div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">Masa kerja sesuai dengan SK Gol/Inpasing</label>
											<div class="col-1">
												<input class="form-control" type="text" value="<?= $r_jab['masa_kerja_gol_thn'] ?>" readonly>Tahun
											</div>
											<div class="col-1">
												<input class="form-control" type="text" value="<?= $r_jab['masa_kerja_gol_bln'] ?>" readonly>Bulan
											</div>
										</div>
										<?php
										if ($data_dasar->ikatan_kerja_kode == 'B') {
											$thn_cpns = substr($data_dasar->nip, 8, 4);
											$bln_cpns = substr($data_dasar->nip, 12, 2);
											$bulan = array(
												'01' => 'JANUARI',
												'02' => 'FEBRUARI',
												'03' => 'MARET',
												'04' => 'APRIL',
												'05' => 'MEI',
												'06' => 'JUNI',
												'07' => 'JULI',
												'08' => 'AGUSTUS',
												'09' => 'SEPTEMBER',
												'10' => 'OKTOBER',
												'11' => 'NOVEMBER',
												'12' => 'DESEMBER',
											);

											$tmt_cpns 	= $thn_cpns . '-' . $bln_cpns . '-01';
											$waktuawal  = date_create($tmt_cpns);
											$waktuakhir = date_create($r_jab['jabatan_tgl']);
											$diff  		= date_diff($waktuawal, $waktuakhir);

											$thn_cpns_ok = $diff->y;
											$bln_cpns_ok = $diff->m;
										?>
											<div class="form-group m-t-40 row">
												<label for="example-text-input" class="col-2 col-form-label">TMT CPNS</label>
												<div class="col-10">
													<input class="form-control" type="text" value="<?= $bulan[$bln_cpns] ?> <?= $thn_cpns ?>" readonly>
												</div>
											</div>
											<div class="form-group m-t-40 row">
												<label for="example-text-input" class="col-2 col-form-label">Masa kerja dosen PNS DPK dengan jabatan sebelumnya </label>
												<div class="col-1">
													<input class="form-control" type="text" value="<?= $thn_cpns_ok ?>" readonly>Tahun
												</div>
												<div class="col-1">
													<input class="form-control" type="text" value="<?= $bln_cpns_ok ?>" readonly>Bulan
												</div>
											</div>
										<?php } ?>

										<div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">Pendidikan pada Jabatan/Pangkat Sebelumnya</label>
											<div class="col-8">
												<input class="form-control" type="text" name="jabatan_usulan_no" value="<?php echo $jenjang_lama_id; ?>" readonly>
											</div>
											<div class="col-2">
												<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#edit_jenjang" class="btn btn-warning"><i class="fa fa-edit"></i>Ubah Pendidikan</a>
											</div>
										</div>
									<?php } ?>

									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Pendidikan pada Usulan Kenaikan Jabatan/Pangkat </label>
										<div class="col-10">
											<input class="form-control" type="text" id="jenjang_id" value="<?php echo $data_dasar->nama_jenjang; ?> " readonly>
										</div>
									</div>

									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">JAD Usulan</label>
										<div class="col-8">
											<input class="form-control" type="text" name="jabatan_usulan_no" value="<?php echo $jad_usulan; ?>" readonly>
										</div>
										<div class="col-2">
											<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#edit" class="btn btn-warning"><i class="fa fa-edit"></i>Ubah JAD</a>
										</div>
									</div>
									<?php
									if ($role == '1') {
										$st = $this->db->query("SELECT * FROM usulan_statuses WHERE id='$data_dasar->usulan_status_id'")->row();
									?>
										<div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">Status Usulan</label>
											<div class="col-8">
												<input class="form-control" type="text" value="<?= $st->nama_status ?>" readonly>
											</div>
											<div class="col-2">
												<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#ubahStatus" class="btn btn-warning"><i class="fa fa-edit"></i>Ubah Status</a>
											</div>
										</div>
									<?php } ?>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php if (!is_null($data_dasar->no_surat) || $role <> '3') { ?>
					<form action="<?php echo base_url() . 'usulan/usulan/update_usulan/' . $data_dasar->no ?>" method="post" enctype="multipart/form-data">
						<div class="tab-content tabcontent-border">
							<div class="card">
								<div class="card-header bg-info">
									<h4 class="m-b-0 text-white">Data Usulan Dosen</h4>
								</div>
								<div class="card-body">
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Nomor Surat Usulan</label>
										<div class="col-10">
											<input class="form-control" type="text" name="no_surat" required value="<?php echo $data_dasar->no_surat; ?>">
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Tanggal Surat Usulan</label>
										<div class="col-10">
											<input class="form-control" type="date" name="tgl_surat" required value="<?php echo $data_dasar->tgl_surat; ?>">
											<input class="form-control" type="hidden" name="tempat_surat" value="Jakarta">
										</div>
									</div>

								</div>
							</div>
						</div>

						<?php
						if (substr($data_dasar->kd_pt, 0, 3) == '031' || substr($data_dasar->kd_pt, 0, 3) == '032') {
						?>
							<div class="tab-content tabcontent-border">
								<div class="card">
									<div class="card-header bg-info">
										<h4 class="m-b-0 text-white">Data Fakultas Dosen</h4>
									</div>
									<div class="card-body">
										<div class="form-group m-t-40 row">
											<label for="example-text-input" class="col-2 col-form-label">Fakultas</label>
											<div class="col-10">
												<input class="form-control" type="text" name="fakultas" value="<?= $data_dasar->fakultas; ?>">
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						?>

						<div class="tab-content tabcontent-border">
							<div class="card">
								<div class="card-header bg-info">
									<h4 class="m-b-0 text-white">Data Pimpinan PT</h4>
								</div>
								<div class="card-body">
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Nama dan Gelar</label>
										<div class="col-10">
											<input class="form-control" type="text" name="pimpinan_nama" value="<?php echo "$data_dasar->pimpinan_nama"; ?>">
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">NIK/NIP</label>
										<div class="col-10">
											<input class="form-control" type="text" name="pimpinan_nip" value="<?= $data_dasar->pimpinan_nip; ?> ">
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">NIDN</label>
										<div class="col-10">
											<input class="form-control" type="text" name="pimpinan_nidn" value="<?= $data_dasar->pimpinan_nidn; ?> ">
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan</label>
										<div class="col-10">
											<select name="pimpinan_golongan_kode" class="select2 m-b-10 select2-multiple" style="width: 100%" id="pimpinan_golongan_kode">
												<option value="<?php echo $nm_pimpinan_gol->kode; ?>"><?php echo $nm_pimpinan_gol->nm_golongan_pim; ?> golongan <?php echo $nm_pimpinan_gol->kode_gol; ?></option>
												<?php foreach ($golongan->result() as $g) { ?>
													<option value="<?php echo $g->kode; ?>"><?php echo $g->nama; ?> golongan <?php echo $g->kode_gol; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Jabatan</label>
										<div class="col-10">
											<select name="pimpinan_jabatan" class="select2 m-b-10 select2-multiple" style="width: 100%" id="pimpinan_jabatan">
												<option value="<?php echo $q_jabatan->id; ?>"><?php echo $q_jabatan->japim; ?></option>
												<?php foreach ($jabatan->result() as $jab) { ?>
													<option value="<?php echo $jab->id; ?>"><?php echo $jab->japim; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-content tabcontent-border">
							<div class="card">
								<div class="card-header bg-info">
									<h4 class="m-b-0 text-white">Data Pimpinan Langsung Dosen</h4>
								</div>
								<div class="card-body">
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Nama dan Gelar</label>
										<div class="col-10">
											<input class="form-control" type="text" name="kaprodi_nama" value="<?php echo "$data_dasar->kaprodi_nama"; ?>">
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">NIK/NIP</label>
										<div class="col-10">
											<input class="form-control" type="text" name="kaprodi_nip" value="<?php echo $data_dasar->kaprodi_nip; ?> ">
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">NIDN</label>
										<div class="col-10">
											<input class="form-control" type="text" name="kaprodi_nidn" value="<?php echo $data_dasar->kaprodi_nidn; ?> ">
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan</label>
										<div class="col-10">
											<select name="kaprodi_golongan_kode" class="select2 m-b-10 select2-multiple" style="width: 100%" id="kaprodi_golongan_kode">
												<option value="<?php echo $nm_kaprodi_gol->kode; ?>"><?php echo $nm_kaprodi_gol->nm_golongan_pim; ?> golongan <?php echo $nm_kaprodi_gol->kode_gol; ?></option>
												<?php foreach ($golongan->result() as $g) { ?>
													<option value="<?php echo $g->kode; ?>"><?php echo $g->nama; ?> golongan <?php echo $g->kode_gol; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group m-t-40 row">
										<label for="example-text-input" class="col-2 col-form-label">Jabatan</label>
										<div class="col-10">
											<select name="kaprodi_jabatan" class="select2 m-b-10 select2-multiple" style="width: 100%" id="kaprodi_jabatan">
												<option value="<?php echo $q_kap_jabatan->id; ?>"><?php echo $q_kap_jabatan->japim; ?></option>
												<?php foreach ($jabatan->result() as $jab) { ?>
													<option value="<?php echo $jab->id; ?>"><?php echo $jab->japim; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="text-xs-right">
											<?php if ($role == '3') {
											} else { ?>
												<hr>
												<center>
													<button type="submit" class="btn btn-primary btn-lg">UPDATE</button>
												</center>
											<?php  } ?>
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

<script>
	$(function() {
		$("#datepicker").datepicker();
	});

	window.onload = function() {
		$('#datepicker').on('change', function() {
			var tanggal_awal = (this.value);
			var today = new Date();
			var tanggal_sekarang = moment().format('YYYY-MM-DD');
			var tanggal_awal_moment = moment(tanggal_awal, 'YYYY-MM-DD');
			var tanggal_sekarang_moment = moment(tanggal_sekarang, 'YYYY-MM-DD');
			var selisih_tahun = tanggal_sekarang_moment.diff(tanggal_awal_moment, 'years');
			var selisih_bulan = tanggal_sekarang_moment.diff(tanggal_awal_moment, 'months');
			var selisih_hari = tanggal_sekarang_moment.diff(tanggal_awal_moment, 'days');
			var date_add_tahun = tanggal_awal_moment.add(selisih_tahun, 'years');
			var new_selisih_bulan = tanggal_sekarang_moment.diff(date_add_tahun, 'months');
			var date_add_bulan = date_add_tahun.add(new_selisih_bulan, 'months');
			var new_selisih_hari = tanggal_sekarang_moment.diff(date_add_bulan, 'days');
			var beda_bulan = new_selisih_bulan;
			var beda_tahun = selisih_tahun;
			$('#umur').val(beda_tahun);
			$('#bulan').val(beda_bulan);
		});
	}
</script>

<script>
	$(function() {
		$url = "<?php echo base_url('usulan/usulan/show_matakul/' . $no_usulan); ?>";
		$('#nav_mtk').click(function() {
			$('#mtk').load($url);

		});
	})

	$(function() {
		$urlriwayat = "<?php echo base_url('usulan/usulan/show_pendidikan/' . $no_usulan); ?>";
		$('#nav_riwayat').click(function() {
			$('#riwayat').load($urlriwayat);

		});
	})

	$(function() {
		$urlbidang = "<?php echo base_url('usulan/usulan/bidangA/'); ?>";
		$('#nav_bid_a').click(function() {
			$('#bidang_A').load($urlbidang);

		});
	})
	$(function() {
		$urlbidang_b = "<?php echo base_url('usulan/usulan/bidangB/'); ?>";
		$('#nav_bid_b').click(function() {
			$('#bidang_B').load($urlbidang_b);

		});
	})
	$(function() {
		$urlbidang_c = "<?php echo base_url('usulan/usulan/bidangC/'); ?>";
		$('#nav_bid_c').click(function() {
			$('#bidang_C').load($urlbidang_c);

		});
	})
	$(function() {
		$urlbidang_d = "<?php echo base_url('usulan/usulan/bidangD/'); ?>";
		$('#nav_bid_d').click(function() {
			$('#bidang_D').load($urlbidang_d);

		});
	})
</script>


<!-- Modal Tambah-->
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="tambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url(); ?>usulan/usulan/proses_usulanbaru/<?php echo $data_dasar->no; ?>" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>Anda yakin akan mengirim usulan baru ?</h3>
					<?php if ($data_dasar->usulan_status_id == '1') { ?>
						<input type="hidden" name="usulan_status" value="10">
						<input type="hidden" name="usulan_ket" value="Pengajuan Usulan Baru">
					<?php } elseif ($data_dasar->usulan_status_id == '10') { ?>
						<input type="hidden" name="usulan_status" value="3">
						<input type="hidden" name="usulan_ket" value="Pengajuan Usulan Baru">
					<?php } elseif ($data_dasar->usulan_status_id == '2') {  ?>
						<input type="hidden" name="usulan_status" value="10">
						<input type="hidden" name="usulan_ket" value="Pengajuan Usulan Baru Yang Telah Direvisi">
					<?php } ?>
					<!--<hr>
				<div class="row">
				<div class="col-md-12">
                <div class="form-group">
					  <label for="keterangan">Keterangan</label>
					  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
				</div>
				</div>
				</div>-->
				</div>
				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">KIRIM</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal Revisi-->
<div class="modal fade" aria-labelledby="myLargeModalLabel1" id="revisi">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url(); ?>usulan/usulan/proses_usulanbaru/<?php echo $data_dasar->no; ?>" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>Revsi Draft</h3>

					<input type="hidden" name="usulan_status" value="2">
					<!-- <input type="text" name="usulan_ket" value="Pengajuan Usulan Baru"> -->
					<label for="keterangan">Keterangan</label>
					<textarea name="usulan_ket" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
					<!--<hr>
				<div class="row">
				<div class="col-md-12">
                <div class="form-group">
					  <label for="keterangan">Keterangan</label>
					  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
				</div>
				</div>
				</div>-->
				</div>
				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">KIRIM</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit-->
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="edit">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url() ?>usulan/usulan/update_jad" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>Ubah JAD Usulan</h3>
					<hr>
					<div class="form-group m-t-40 row">
						<!-- <label for="example-text-input" class="col-2 col-form-label">NIP</label> -->
						<div class="col-10">
							<input class="form-control" type="hidden" name="no_usulan" value="<?php echo $data_dasar->no; ?>" readonly>
						</div>
					</div>
					<div class="form-group m-t-40 row">
						<label for="semester" class="col-2 col-form-label">Usulan JAD</label><br>
						<div class="col-10">
							<?php
							if ($role <> '1') {
								if ($data_dasar->jabatan_no == '41' || $data_dasar->jabatan_no == '40') {
							?>
									<div class="controls">
										<select name="jabatan_usulan_no" required data-validation-required-message="Data usulan jabatan belum dipilih" class="select2 m-b-10 select2-multiple" style="width: 100%" id="jabatan_usulan_no" data-placeholder="Click to Choose...">
											<option value=""></option>
											<?php
											include "koneksi.php";
											$jab = "SELECT
														a.`no`,
														a.`jabatan_kode`,
														b.`nama_jabatans`,
														b.`kum`,
														a.`jenjang_id`,
														c.`nama_jenjang`
													FROM
														`jabatan_jenjangs` AS a,
														`jabatans` AS b,
														`jenjangs` AS c
													WHERE a.`jabatan_kode` = b.`kode`
														AND a.`jenjang_id` = c.`id`
														AND a.`jabatan_kode` IN ('43', '44','46', '47','48')";
											$da_jab = mysqli_query($koneksi, $jab);
											while ($r_jab = mysqli_fetch_array($da_jab)) {
											?>
												<option value="<?= $r_jab['no'] ?>"><?= $r_jab['nama_jabatans'] ?> <?= $r_jab['kum'] ?> (<?= $r_jab['nama_jenjang'] ?>)</option>
											<?php } ?>
										</select>
									</div>
								<?php
								} elseif ($data_dasar->jabatan_no == '43' || $data_dasar->jabatan_no == '44') {
								?>
									<div class="controls">
										<select name="jabatan_usulan_no" required data-validation-required-message="Data usulan jabatan belum dipilih" class="select2 m-b-10 select2-multiple" style="width: 100%" id="jabatan_usulan_no" data-placeholder="Click to Choose...">
											<option value=""></option>
											<?php
											include "koneksi.php";
											$jab = "SELECT
													a.`no`,
													a.`jabatan_kode`,
													b.`nama_jabatans`,
													b.`kum`,
													a.`jenjang_id`,
													c.`nama_jenjang`
													FROM
													`jabatan_jenjangs` AS a,
													`jabatans` AS b,
													`jenjangs` AS c
													WHERE a.`jabatan_kode` = b.`kode`
													AND a.`jenjang_id` = c.`id`
													AND a.`jabatan_kode` IN ('46', '47','48')";
											$da_jab = mysqli_query($koneksi, $jab);
											while ($r_jab = mysqli_fetch_array($da_jab)) {
											?>
												<option value="<?= $r_jab['no'] ?>"><?= $r_jab['nama_jabatans'] ?> <?= $r_jab['kum'] ?> (<?= $r_jab['nama_jenjang'] ?>)</option>
											<?php } ?>
										</select>
									</div>
								<?php
								} elseif ($data_dasar->jabatan_no == '46' || $data_dasar->jabatan_no == '47' || $data_dasar->jabatan_no == '48') {
								?>
									<div class="controls">
										<select name="jabatan_usulan_no" required data-validation-required-message="Data usulan jabatan belum dipilih" class="select2 m-b-10 select2-multiple" style="width: 100%" id="jabatan_usulan_no" data-placeholder="Click to Choose...">
											<option value=""></option>
											<?php
											include "koneksi.php";
											$jab = "SELECT
														a.`no`,
														a.`jabatan_kode`,
														b.`nama_jabatans`,
														b.`kum`,
														a.`jenjang_id`,
														c.`nama_jenjang`
														FROM
														`jabatan_jenjangs` AS a,
														`jabatans` AS b,
														`jenjangs` AS c
														WHERE a.`jabatan_kode` = b.`kode`
														AND a.`jenjang_id` = c.`id`
														AND a.`jabatan_kode` IN ('46','47','48','50','51')";
											$da_jab = mysqli_query($koneksi, $jab);
											while ($r_jab = mysqli_fetch_array($da_jab)) {
											?>
												<option value="<?= $r_jab['no'] ?>"><?= $r_jab['nama_jabatans'] ?> <?= $r_jab['kum'] ?> (<?= $r_jab['nama_jenjang'] ?>)</option>
											<?php } ?>
										</select>
									</div>
								<?php
								} elseif ($data_dasar->jabatan_no == '31') {
								?>
									<div class="controls">
										<select name="jabatan_usulan_no" required data-validation-required-message="Data usulan jabatan belum dipilih" class="select2 m-b-10 select2-multiple" style="width: 100%" id="jabatan_usulan_no" data-placeholder="Click to Choose...">
											<option value=""></option>
											<?php
											include "koneksi.php";
											$jab = "SELECT
													a.`no`,
													a.`jabatan_kode`,
													b.`nama_jabatans`,
													b.`kum`,
													a.`jenjang_id`,
													c.`nama_jenjang`
													FROM
													`jabatan_jenjangs` AS a,
													`jabatans` AS b,
													`jenjangs` AS c
													WHERE a.`jabatan_kode` = b.`kode`
													AND a.`jenjang_id` = c.`id`
													AND a.`no` IN ('3', '6')";
											$da_jab = mysqli_query($koneksi, $jab);
											while ($r_jab = mysqli_fetch_array($da_jab)) {
											?>
												<option value="<?= $r_jab['no'] ?>"><?= $r_jab['nama_jabatans'] ?> <?= $r_jab['kum'] ?> (<?= $r_jab['nama_jenjang'] ?>)</option>
											<?php } ?>
										</select>
									</div>
								<?php
								}
							} else {
								?>
								<div class="controls">
									<select name="jabatan_usulan_no" required data-validation-required-message="Data usulan jabatan belum dipilih" class="select2 m-b-10 select2-multiple" style="width: 100%" id="jabatan_usulan_no" data-placeholder="Click to Choose...">
										<option value=""></option>
										<?php
										include "koneksi.php";
										$jab = "SELECT
														a.`no`,
														a.`jabatan_kode`,
														b.`nama_jabatans`,
														b.`kum`,
														a.`jenjang_id`,
														c.`nama_jenjang`
													FROM
														`jabatan_jenjangs` AS a,
														`jabatans` AS b,
														`jenjangs` AS c
													WHERE a.`jabatan_kode` = b.`kode`
														AND a.`jenjang_id` = c.`id`";
										$da_jab = mysqli_query($koneksi, $jab);
										while ($r_jab = mysqli_fetch_array($da_jab)) {
										?>
											<option value="<?= $r_jab['no'] ?>"><?= $r_jab['nama_jabatans'] ?> <?= $r_jab['kum'] ?> (<?= $r_jab['nama_jenjang'] ?>)</option>
										<?php } ?>
									</select>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>

				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">UPDATE</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit-->
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="ubahStatus">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url() ?>usulan/usulan/update_statusjad" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>Ubah Status Usulan</h3>
					<hr>
					<div class="form-group m-t-40 row">
						<div class="col-10">
							<input class="form-control" type="hidden" name="no_usulan" value="<?php echo $data_dasar->no; ?>" readonly>
						</div>
					</div>
					<div class="form-group m-t-40 row">
						<label for="semester" class="col-2 col-form-label">Status Usulan</label><br>
						<div class="col-10">
							<div class="controls">
								<select name="usulan_status_id" required data-validation-required-message="Data status usulan belum dipilih" class="select2 m-b-10 select2-multiple" style="width: 100%" id="usulan_status_id" data-placeholder="Click to Choose...">
									<option value=""></option>
									<?php
									include "koneksi.php";
									$usul 	= "SELECT * FROM usulan_statuses ORDER BY id ASC";
									$dus = mysqli_query($koneksi, $usul);
									while ($rus = mysqli_fetch_array($dus)) {
									?>
										<option value="<?= $rus['id'] ?>"><?= $rus['nama_status'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">UPDATE</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit Jenjang-->
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="edit_jenjang">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url() ?>usulan/usulan/update_jenjang" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>Ubah Pendidikan pada Jabatan/Pangkat Sebelumnya</h3>
					<hr>
					<div class="form-group m-t-40 row">
						<!-- <label for="example-text-input" class="col-2 col-form-label">NIP</label> -->
						<div class="col-10">
							<input class="form-control" type="hidden" name="no_usulan" value="<?php echo $data_dasar->no; ?>" readonly>
						</div>
					</div>
					<div class="form-group m-t-40 row">
						<label for="semester" class="col-2 col-form-label">Jenjang Lama</label><br>
						<div class="col-10">

							<div class="controls">
								<select name="jenjang_id_lama" required data-validation-required-message="Data pendidikan belum dipilih" class="select2 m-b-10 select2-multiple" style="width: 100%" id="jenjang_id" data-placeholder="Click to Choose...">
									<option value=""></option>
									<?php foreach ($jenjang->result() as $jenj) { ?>
										<option value="<?php echo $jenj->id; ?>"><?php echo $jenj->nama_jenjang; ?></option>
									<?php } ?>
								</select>
							</div>


						</div>
					</div>
				</div>

				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">UPDATE</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit tmt-->
<div class="modal fade" aria-labelledby="myModalLabel" id="edit_tmt">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url() ?>usulan/usulan/update_tmt" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>Ubah Masa Kerja Jabatan Sebelumnya</h3>
					<hr>
					<input class="form-control" type="hidden" name="usulan_no" value="<?php echo $data_dasar->no; ?>" readonly>
					<input class="form-control" type="hidden" name="dosen_no" value="<?php echo $data_dasar->dosen_no; ?>" readonly>
					<div class="form-group m-t-40 row">
						<label for="semester" class="col-2 col-form-label">Masa Kerja</label><br>

						<div class="col-2">
							<input class="form-control" type="number" name="tmt_tahun"> Tahun
						</div>
						<div class="col-2">
							<input class="form-control" type="number" max="12" name="tmt_bulan"> Bulan
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">UPDATE</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>