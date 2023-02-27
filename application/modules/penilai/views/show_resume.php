<!DOCTYPE html>
<?php
include "koneksi.php";

?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
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
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>penilai/penilai/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>

					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangB/<?php echo $no; ?>">
							<span class="hidden-sm-up">
								<i class="ti-agenda "></i>
							</span>
							<span class="hidden-xs-down">Bidang B</span>
						</a>
					</li>


					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangC/<?php echo $no; ?>">
							<span class="hidden-sm-up">
								<i class="ti-agenda "></i>
							</span>
							<span class="hidden-xs-down">Bidang C</span>
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangD/<?php echo $no; ?>">
							<span class="hidden-sm-up">
								<i class="ti-agenda "></i>
							</span>
							<span class="hidden-xs-down">Bidang D</span>
						</a>
					</li>

					<?php
					$tgl = date('Y-m-d');
					$selisih = $tgl - $pengangkatan_tgl;

					if ($jabatan_usulan_no == '8' || $jabatan_usulan_no == '11' || $jabatan_usulan_no == '12' || $jabatan_usulan_no == '9' || $jabatan_usulan_no == '10' || $jabatan_usulan_no == '13') {
						if ($selisih < '8') {
					?>
							<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangE/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Tambahan LK/GB</span></a> </li>
						<?php
						}
					} elseif ($jabatan_usulan_no == '14' || $jabatan_usulan_no == '15') {
						if ($selisih > '9' && $selisih < '21') {
						?>
							<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangE/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Tambahan LK/GB</span></a> </li>
					<?php
						}
					}
					?>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/persyaratan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>

					<li class="nav-item">
						<a class="nav-link active" href="<?= base_url() ?>penilai/penilai/show_resume/<?php echo $no; ?>">
							<span class="hidden-sm-up">
								<i class="ti-agenda "></i>
							</span>
							<span class="hidden-xs-down">Resume</span>
						</a>
					</li>



				</ul>
				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<?php $no_usulan = $data_dasar->no; ?>
					<div class="tab-pane active p-20" id="dasar" role="tabpanel">

						<div class="card">
							<div class="card-header bg-info">
								<h4 class="m-b-0 text-white">RESUME</h4>
							</div>
							<div class="card-body">
								<h4 class="card-title"></h4>
								<div class="row">
									<table border="1" class="ui celled table">
										<col width="30" />
										<col width="120" />
										<col width="90" />
										<col width="90" />
										<col width="90" />
										<col width="90" />
										<col width="90" />

										<thead>
											<tr bgcolor="#E0FFFF" class="text-center">
												<th colspan="7" class="text-center">
													<h3 style="text-align: center;">RESUME PENILAIAN USULAN<br>JABATAN AKADEMIK DOSEN</h3>
												</th>
											</tr>
										</thead>
										<?php
										date_default_timezone_set('Asia/Jakarta');
										$query_dosens = "SELECT
															b.`no`,
															b.`jabatan_no`,
															b.`jabatan_tgl`,
															e.`nama_ikatan`,
															b.`karpeg`,
															b.`lahir_tempat`,
															b.`jk`,
															b.`lahir_tgl`,
															b.`nama`,
															b.`jenjang_id`,
															f.`nama_jenjang`,
															b.`gelar_belakang`,
															b.`nip`,
															b.`nidn`,
															c.`nama_prodi`,
															d.`nama_instansi`,
															b.`bidang_ilmu_kode`
															FROM
															usulans AS a,
															dosens AS b,
															`prodis` AS c,
															`instansis` AS d,
															ikatan_kerjas AS e,
															`jenjangs` AS f
															WHERE a.`no` = '$no'
															AND a.`dosen_no` = b.`no`
															AND b.`prodi_kode` = c.`kode`
															AND c.`instansi_kode` = d.`kode`
															AND b.`ikatan_kerja_kode` = e.`kode`
															AND b.`jenjang_id` = f.`id`";
										$data_dos = mysqli_query($koneksi, $query_dosens);
										$row_dos = mysqli_fetch_array($data_dos);

										$tgl_lahir = $row_dos['lahir_tgl'];
										$tgl_ok = date_create($tgl_lahir);
										$tgl = date_format($tgl_ok, 'd F Y');
										?>
										<tbody>
											<tr bgcolor="#E0FFFF" class="text-center">
												<th colspan="7" class="text-center">
													<h4>BIODATA DOSEN</h4>
												</th>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">1. Nama</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nama'] ?>, <?= $row_dos['gelar_belakang'] ?></td>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">2. Status Kepegawaian</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nama_ikatan'] ?></td>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">3. NIDN</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nidn'] ?></td>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">4. Pendidikan Terakhir</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nama_jenjang'] ?></td>
											</tr>
											<?php
											$q_mt = "SELECT * from usulan_matkuls where usulan_no='$no'";
											$d_mt = mysqli_query($koneksi, $q_mt);
											?>

											<tr>
												<td colspan="3" style="vertical-align: top;">5. PTS</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nama_instansi'] ?></td>
											</tr>
											<tr>
												<td colspan="3" style="vertical-align: top;">6. Homebase</td>
												<td colspan="4" style="vertical-align: top;">: <?= $row_dos['nama_prodi'] ?></td>
											</tr>
											<?php
											$q_cari_gol = "SELECT
															a.`no`,
															a.`golongan_kode`,
															b.`nama`,
															b.`kode_gol`
															FROM
															dosens AS a,
															`golongans` AS b
															WHERE a.`no` = '$row_dos[no]'
															AND a.`golongan_kode` = b.`kode`";
											$dq_cari_gol = mysqli_query($koneksi, $q_cari_gol);
											$rdq_cari_gol = mysqli_fetch_array($dq_cari_gol);
											?>
											<tr bgcolor="#E0FFFF" class="text-center">
												<th colspan="2" class="text-center">URAIAN</th>
												<th colspan="2" class="text-center">LAMA</th>
												<th colspan="3" class="text-center">BARU</th>
											</tr>
											<tr>
												<td colspan="2">Pangkat/Gol/TMT</td>
												<td colspan="2"><?= $rdq_cari_gol['nama'] ?> / <?= $rdq_cari_gol['kode_gol'] ?>/ <?= $row_dos['jabatan_tgl'] ?></td>
												<td colspan="3"></td>
											</tr>
											<?php
											if ($row_dos['jabatan_no'] <> 31) {
												$q_cari_jab = "SELECT
																a.`dosen_no`,
																a.`no`,
																a.`jabatan_no`,
																b.`nama_jabatans`,
																b.`kum`,
																a.`jabatan_tgl`,
																a.`jenjang_id_lama`,
																c.`nama_jenjang`
																FROM
																`usulans` AS a,
																`jabatans` AS b,
																`jenjangs` AS c
																WHERE a.no= '$no'
																AND a.`jabatan_no`=b.`kode`
																AND a.`jenjang_id_lama`=c.`id`";
											} else {
												$q_cari_jab = "SELECT
																a.`no`,
																a.`jabatan_no`,
																b.`nama_jabatans`,
																a.`jenjang_id`,
																c.`nama_jenjang`,
																a.`jabatan_tgl`
																FROM
																dosens AS a,
																`jabatans` AS b,
																`jenjangs` AS c
																WHERE a.`no` = '$row_dos[no]'
																AND a.`jabatan_no` = b.`kode`
																AND a.`jenjang_id` = c.`id`";
											}
											$dq_cari_jab = mysqli_query($koneksi, $q_cari_jab);
											$rdq_cari_jab = mysqli_fetch_array($dq_cari_jab);
											?>
											<tr>
												<td colspan="2">Jabatan/TMT</td>
												<td colspan="2"><?= $rdq_cari_jab['nama_jabatans'] ?> (<?= $rdq_cari_jab['nama_jenjang'] ?>), <?= $rdq_cari_jab['jabatan_tgl'] ?></td>

												<?php
												$q_jab_us = "SELECT
																a.`no`,
																c.`nama_jabatans`,
																d.`nama_jenjang`,
																a.`jabatan_tgl`
																FROM
																`usulans` AS a,
																`jabatan_jenjangs` AS b,
																`jabatans` AS c,
																`jenjangs` AS d
																WHERE a.`no` = '$no'
																AND a.`jabatan_usulan_no` = b.`no`
																AND b.`jabatan_kode` = c.`kode`
																AND b.`jenjang_id` = d.`id`";
												$dq_jab_us = mysqli_query($koneksi, $q_jab_us);
												$rdq_jab_us = mysqli_fetch_array($dq_jab_us);
												?>
												<td colspan="3"><?= $rdq_jab_us['nama_jabatans'] ?> (<?= $rdq_jab_us['nama_jenjang'] ?>)</td>
											</tr>
											<?php
											if ($row_dos['jabatan_no'] <> 31) {
												$q_ak_lama = "SELECT
																a.`dosen_no`,
																a.`no`,
																a.`jabatan_no`,
																b.`nama_jabatans`,
																b.`kum`,
																a.`jabatan_tgl`,
																a.`jenjang_id_lama`,
																c.`nama_jenjang`,
																c.`ak`
																FROM
																`usulans` AS a,
																`jabatans` AS b,
																`jenjangs` AS c
																WHERE a.no= '$no'
																AND a.`jabatan_no`=b.`kode`
																AND a.`jenjang_id_lama`=c.`id`";
											} else {
												$q_ak_lama = "SELECT
																a.`no`,
																a.`jabatan_no`,
																a.`jenjang_id`,
																b.`nama_jabatans`,
																b.`kum`,
																c.`nama_jenjang`,
																c.`ak`,
																a.`jabatan_tgl` 
															FROM
																`dosens` AS a,
																`jabatans` AS b,
																`jenjangs` AS c 
															WHERE
																a.`no` = '$row_dos[no]' 
																AND a.`jabatan_no` = b.`kode` 
																AND a.`jenjang_id` = c.`id`";
											}
											$d_ak_lama = mysqli_query($koneksi, $q_ak_lama);
											$r_ak_lama = mysqli_fetch_array($d_ak_lama);
											?>
											<tr>
												<td colspan="2">Angka Kredit</td>
												<td colspan="2"><?= $r_ak_lama['kum'] ?></td>
												<?php
												$q_ak_baru = "SELECT
																a.`no`,
																b.`jenjang_id`,
																c.`nama_jabatans`,
																c.`kum`,
																d.`nama_jenjang`,
																d.`ak`,
																a.`jabatan_tgl`
																FROM
																`usulans` AS a,
																`jabatan_jenjangs` AS b,
																`jabatans` AS c,
																`jenjangs` AS d
																WHERE a.`no` = '$no'
																AND a.`jabatan_usulan_no` = b.`no`
																AND b.`jabatan_kode` = c.`kode`
																AND b.`jenjang_id` = d.`id`";
												$d_ak_baru = mysqli_query($koneksi, $q_ak_baru);
												$r_ak_baru = mysqli_fetch_array($d_ak_baru);
												?>
												<td colspan="3"><?= $r_ak_baru['kum'] ?> </td>
											</tr>
											<tr>
												<th colspan="2">A.K. Yang Dibutuhkan</th>
												<th colspan="5">
													<?php
													$dasar = $r_ak_baru['kum'] - $r_ak_lama['kum'];

													if ($r_ak_lama['kum'] == 0) //jika nilai kum lama = 0
													{
														// $pendidikan = nilai angka kredit dari table jenjangs jabatan_usulan_no 
														$pendidikan = $r_ak_baru['ak'];
													} else {
														//jika jejang_id pada dosens = jenjang_id pada usulans
														if ($r_ak_lama['jenjang_id'] == $r_ak_baru['jenjang_id']) {
															$pendidikan = 0;
														} else {
															$pendidikan = $r_ak_baru['ak'] - $r_ak_lama['ak'];
														}
													}

													$kebutuhan = $dasar - $pendidikan;
													if ($kebutuhan <= 0) {
														$kebutuhan = 10;
													} elseif ($pendidikan <= 0) {
														$kebutuhan = $dasar;
													}

													//jika nilai kum lama = 0
													if ($r_ak_lama['kum'] == '0') {
														echo $kebutuhan;
													} elseif ($pendidikan > 0) {
														echo '(' . $r_ak_baru['kum'] . '-' . $r_ak_lama['kum'] . ') -' . $pendidikan . ' = ' . $kebutuhan;
													} else {
														echo $r_ak_baru['kum'] . '-' . $r_ak_lama['kum'] . ' = ' . $kebutuhan;
													}
													?>
												</th>
											</tr>
											<th bgcolor="#E0FFFF" colspan="7" class="text-center">UNSUR YANG DINILAI</th>
											<tr bgcolor="#E0FFFF" class="text-center">
												<th class="text-center" rowspan="2" style="vertical-align: middle;">NO</th>
												<th class="text-center" colspan="3" rowspan="2" style="vertical-align: middle;">BIDANG</th>
												<th class="text-center" rowspan="2" style="vertical-align: middle;">PERS(%)</th>
												<th class="text-center" colspan="2">ANGKA KREDIT</th>
											</tr>
											<tr bgcolor="#E0FFFF" class="text-center">
												<th class="text-center" style="vertical-align: middle;">A.K. YANG<br>DIBUTUHKAN</th>
												<th class="text-center" style="vertical-align: middle;">A.K. DARI <br> TIM PENILAI</th>
											</tr>
											<?php
											$q_persen = "SELECT
															a.`no`,
															a.`jabatan_usulan_no`,
															b.`jabatan_kode`,
															c.`kum`,
															c.`nama_jabatans`,
															c.`pa`,
															c.`pb`,
															c.`pc`,
															c.`pd`
															FROM
															`usulans` AS a,
															`jabatan_jenjangs` AS b,
															`jabatans` AS c
															WHERE a.`no`='$no'
															AND a.`jabatan_usulan_no`=b.`no`
															AND b.`jabatan_kode`=c.`kode`";
											$d_persen = mysqli_query($koneksi, $q_persen);
											$r_persen = mysqli_fetch_array($d_persen);
											?>

											<?php
											$kat_1 = "SELECT
		  *
		FROM
		  dupaks AS a,
		  `usulan_dupaks` AS b
		WHERE b.`dupak_no` = a.`no`
		  AND b.`usulan_no` = '$no'
		  AND a.`dupak_kategori_id` = '1'";
											$d_kat_1 = mysqli_query($koneksi, $kat_1);
											while ($r_kat_1 = mysqli_fetch_array($d_kat_1)) {
												$kum_baru_kat_1 += $r_kat_1['kum_penilai_baru'];
											}
											?>
											<tr>
												<th class="text-center">1</th>
												<th colspan="3">Bidang Ijazah/Pendidikan</th>
												<th class="text-center">-</th>
												<th class="text-center">-</th>
												<th class="text-center"><?= $kum_baru_kat_1 ?></th>
											</tr>

											<?php
											$kat_2 = "SELECT
		  *
		FROM
		  dupaks AS a,
		  `usulan_dupaks` AS b
		WHERE b.`dupak_no` = a.`no`
		  AND b.`usulan_no` = '$no'
		  AND a.`dupak_kategori_id` = '2'";
											$d_kat_2 = mysqli_query($koneksi, $kat_2);
											while ($r_kat_2 = mysqli_fetch_array($d_kat_2)) {
												$kum_baru_kat_2 += $r_kat_2['kum_penilai_baru'];
											}
											$k = $r_persen['pa'] * 0.01 * $kebutuhan;
											?>
											<tr>
												<th class="text-center">2</th>
												<th colspan="3">Bidang Pengajaran</th>
												<th class="text-center">>= <?= $r_persen['pa'] ?>%</th>
												<th class="text-center">>= <?= $k ?></th>
												<?php if ($kum_baru_kat_2 < $k) {
												?>
													<th class="text-center" style="background-color: #fd8888;"><?= $kum_baru_kat_2 ?></th>
												<?php
												} else { ?>
													<th class="text-center"><?= $kum_baru_kat_2 ?></th>
												<?php
												} ?>
											</tr>


											<?php
											$kat_3 = "SELECT
														*
														FROM
														dupaks AS a,
														`usulan_dupaks` AS b
														WHERE b.`dupak_no` = a.`no`
														AND b.`usulan_no` = '$no'
														AND a.`dupak_kategori_id` = '3'";
											$d_kat_3 = mysqli_query($koneksi, $kat_3);
											while ($r_kat_3 = mysqli_fetch_array($d_kat_3)) {
												$kum_baru_kat_3 += $r_kat_3['kum_penilai_baru'];
											}
											$k = $r_persen['pb'] * 0.01 * $kebutuhan;
											?>

											<!-- ============= khusus LK/GB =================== -->
											<?php
											$ak_b = "SELECT
															SUM(kum_penilai) AS ak_bidb
														FROM
															`usulan_dupak_details`
														WHERE `usulan_no` = '$no'
															AND `dupak_no` IN ('B0038', 'B0033','B0024','B0032','B0030','B0028')";
											$d_ak_b = mysqli_query($koneksi, $ak_b);
											$r_ak_b = mysqli_fetch_array($d_ak_b);
											$r_akb = $r_ak_b['ak_bidb'];

											// persentase keseluruhan apa adanya
											$pr_akb = ($r_akb / $k) * 100;
											$npr_akb = round($pr_akb, 1);

											// nilai maksimal 25%
											$nil_25 = $k * 0.25;

											if ($npr_akb > 25) {
												$nilai_tampil = $nil_25;
											} else {
												$nilai_tampil = $r_akb;
											}

											$ak_nob 				= $kum_baru_kat_3 - $r_akb;
											$kum_baru_kat_3_lk_gb 	= $nilai_tampil + $ak_nob;
											?>
											<!-- ============= khusus LK/GB =================== -->
											<?php
											// untuk usulan LK/GB
											if (($jabatan_usulan_no == '8' || $jabatan_usulan_no == '11' || $jabatan_usulan_no == '12' || $jabatan_usulan_no == '9' || $jabatan_usulan_no == '10' || $jabatan_usulan_no == '13' || $jabatan_usulan_no == '14' || $jabatan_usulan_no == '15') && ($cj->nm_jab_awal <> $cj->nm_jab_usul)) {

												$kum_baru_kat_3_update = $kum_baru_kat_3_lk_gb;
											?>
												<tr>
													<th class="text-center">3</th>
													<th colspan="6">Bidang Penelitian</th>
												</tr>

												<tr>
													<td class="text-center"></td>
													<td colspan="3">- Angka Kredit hasil penelitian / pemikiran yang didesiminasikan / dipublikasikan secara nasional</td>

													<td colspan="2" class="text-center">AK hasil penelitian / pemikiran yang didesiminasikan / dipublikasikan secara nasional sudah mencapai <b><?= $npr_akb ?>%</b> dari Total AK yang dibutuhkan pada bidang penelitian, sehingga nilai AK yang diambil adalah <b><?= $nilai_tampil ?></b></td>

													<td class="text-center"><?= $nilai_tampil ?></td>
												</tr>
												<tr>
													<td class="text-center"></td>
													<td colspan="5">- Angka Kredit Bidang Penelitian Lainnya</td>
													<td class="text-center"><?= $ak_nob ?></td>
												</tr>
												<tr>
													<td></td>
													<th colspan="3">Total Angka Kredit Bidang Penelitian</th>
													<th class="text-center">>= <?= $r_persen['pb'] ?>%</th>
													<th class="text-center">>= <?= $k ?></th>
													<?php
													if ($kum_baru_kat_3_update < $k) {
													?>
														<th class="text-center" style="background-color: #fd8888;"><?= $kum_baru_kat_3_update ?></th>
													<?php
													} else { ?>
														<th class="text-center"><?= $kum_baru_kat_3_update ?></th>
													<?php
													} ?>
												</tr>
											<?php
											} else {
												// untuk usulan AA/Lektor
												$kum_baru_kat_3_update = $kum_baru_kat_3;
											?>
												<tr>
													<th class="text-center">3</th>
													<th colspan="3">Bidang Penelitian</th>
													<th class="text-center">>= <?= $r_persen['pb'] ?>%</th>
													<th class="text-center">>= <?= $k ?></th>
													<?php if ($kum_baru_kat_3_update < $k) {
													?>
														<th class="text-center" style="background-color: #fd8888;"><?= $kum_baru_kat_3_update ?></th>
													<?php
													} else { ?>
														<th class="text-center"><?= $kum_baru_kat_3_update ?></th>
													<?php
													} ?>
												</tr>
											<?php
											}
											?>

											<?php
											$kat_4 = "SELECT
														*
														FROM
														dupaks AS a,
														`usulan_dupaks` AS b
														WHERE b.`dupak_no` = a.`no`
														AND b.`usulan_no` = '$no'
														AND a.`dupak_kategori_id` = '4'";
											$d_kat_4 = mysqli_query($koneksi, $kat_4);
											while ($r_kat_4 = mysqli_fetch_array($d_kat_4)) {
												$kum_baru_kat_4 += $r_kat_4['kum_penilai_baru'];
											}
											$k4 = $r_persen['pc'] * 0.01 * $kebutuhan;
											?>
											<tr>
												<th class="text-center">4</th>
												<th colspan="3">Bidang Pengabdian pada Masyarakat</th>
												<th class="text-center">
													<= <?= $r_persen['pc'] ?>%</th>
												<th class="text-center">
													<= <?= $k4 ?></th>
														<?php if ($kum_baru_kat_4 == 0) {
														?>
												<th class="text-center" style="background-color: #fd8888;"><?= $kum_baru_kat_4 ?></th>
											<?php
														} elseif ($kum_baru_kat_4 > $k4) {
											?>
												<th class="text-center"><?= $k4 ?></th>
											<?php
														} else { ?>
												<th class="text-center"><?= $kum_baru_kat_4 ?></th>
											<?php
														} ?>
											</tr>


											<?php
											$kat_5 = "SELECT
														*
														FROM
														dupaks AS a,
														`usulan_dupaks` AS b
														WHERE b.`dupak_no` = a.`no`
														AND b.`usulan_no` = '$no'
														AND a.`dupak_kategori_id` = '5'";
											$d_kat_5 = mysqli_query($koneksi, $kat_5);
											while ($r_kat_5 = mysqli_fetch_array($d_kat_5)) {
												$kum_baru_kat_5 += $r_kat_5['kum_penilai_baru'];
											}
											$k5 = $r_persen['pd'] * 0.01 * $kebutuhan;
											?>
											<tr>
												<th class="text-center">5</th>
												<th colspan="3">Bidang Penunjang</th>
												<th class="text-center">
													<= <?= $r_persen['pd'] ?>%</th>
												<th class="text-center">
													<= <?= $k5 ?></th>
														<?php if ($kum_baru_kat_5 == 0) {
														?>
												<th class="text-center" style="background-color: #fd8888;"><?= $kum_baru_kat_5 ?></th>
											<?php
														} elseif ($kum_baru_kat_5 > $k5) {
											?>
												<th class="text-center"><?= $k5 ?></th>
											<?php
														} else { ?>
												<th class="text-center"><?= $kum_baru_kat_5 ?></th>
											<?php
														} ?>
											</tr>



											<tr class="text-center">
												<th colspan="5" class="text-center">USULAN ANGKA KREDIT</th>
												<th colspan="2" class="text-center">ANGKA KREDIT</th>
											</tr>
											<?php
											$kat_total = "SELECT
															*
															FROM
															dupaks AS a,
															`usulan_dupaks` AS b
															WHERE b.`dupak_no` = a.`no`
															AND b.`usulan_no` = '$no'
															AND a.`dupak_kategori_id` IN('2')";
											$d_kat_total = mysqli_query($koneksi, $kat_total);
											while ($r_kat_total = mysqli_fetch_array($d_kat_total)) {
												$kum_baru_kat_total += $r_kat_total['kum_penilai_baru'];
											}

											//cari nilai kategori 4 (PM)
											if ($kum_baru_kat_4 == 0) {
												$kum_k4 = 0;
											} elseif ($kum_baru_kat_4 > $k4) {
												$kum_k4 = $k4;
											} else {
												$kum_k4 = $kum_baru_kat_4;
											}

											//cari nilai kategori 5 (penunjang)
											if ($kum_baru_kat_5 == 0) {
												$kum_k5 = 0;
											} elseif ($kum_baru_kat_5 > $k5) {
												$kum_k5 = $k5;
											} else {
												$kum_k5 = $kum_baru_kat_5;
											}

											$kum_total = $kum_baru_kat_total + $kum_baru_kat_3_update + $kum_k4 + $kum_k5;

											$kurang = $kum_baru_kat_1 + $kum_total;

											if ($kurang <= 0) {
												$kurang = 0;
											}
											?>
											<tr>
												<th colspan="5">Jumlah Angka Kredit yang dibutuhkan</th>
												<th colspan="2" class="text-center"><?= $kebutuhan ?> </th>
											</tr>
											<tr>
												<th colspan="5">Jumlah Angka Kredit Tim Penilai diluar Ijazah/Pendidikan dan pelatihan Prajabatan</th>
												<?php
												if ($kum_total < $kebutuhan) {
												?>
													<th colspan="2" class="text-center" style="background-color: #fd8888;"><b><?= $kum_total ?></b></th>
												<?php
												} else {
												?>
													<th colspan="2" class="text-center"><b><?= $kum_total ?></b></th>
												<?php
												}
												?>
												</th>
											</tr>

											<form method="post" action="<?= base_url() ?>penilai/penilai/simpan_penilaian" role="form" enctype="multipart/form-data">
												<?php
												if ($usulan_status_id <> '5' && $usulan_status_id <> '6') {
												?>
													<tr class="text-center">
														<td colspan="7">
															<a href="<?= base_url() ?>penilai/penilai/penilai_terima/<?= $no ?>" class="btn btn-success">TERIMA</a>
															<a href="<?= base_url() ?>penilai/penilai/penilai_tolak/<?= $no ?>" class="btn btn-danger">TOLAK</a>
														</td>
													</tr>
												<?php
												} elseif ($usulan_status_id == '6') {
												?>
													<tr bgcolor="#E0FFFF">
														<th colspan="7">
															<center>CATATAN/ KESIMPULAN DARI TIM PENILAI</center>
														</th>
													</tr>
													<?php
													$q_cat_penilai = "SELECT user_penilai_keterangan,user_penilai_keputusan from usulans where no='$no'";
													$d_cat_penilai = mysqli_query($koneksi, $q_cat_penilai);
													$r_cat_penilai = mysqli_fetch_array($d_cat_penilai);
													?>
													<tr>
														<td colspan="7">
															<textarea name="catatan_tim_penilai" class="form-control" rows="10" required>
<?= $r_cat_penilai['user_penilai_keterangan']; ?>
</textarea>
														</td>
													</tr>
													<tr align="center">
														<th colspan="7">
															<?php
															if ($r_cat_penilai['user_penilai_keputusan'] == "DITERIMA") {
															?>
																KEPUTUSAN AKHIR DARI TIM PENILAI : <h3>
																	<center><span class="label label-success"><?= $r_cat_penilai['user_penilai_keputusan']; ?></span></center>
																</h3>
															<?php
															} elseif ($r_cat_penilai['user_penilai_keputusan'] == "DITOLAK") {
															?>
																KEPUTUSAN AKHIR DARI TIM PENILAI : <h3>
																	<center><span class="label label-danger"><?= $r_cat_penilai['user_penilai_keputusan']; ?></span></center>
																</h3>
															<?php
															}
															?>
														</th>
													</tr>
												<?php
												} elseif ($usulan_status_id == '5') {
												?>
													<tr bgcolor="#E0FFFF">
														<th colspan="7">
															<center>CATATAN/ KESIMPULAN DARI TIM PENILAI</center>
														</th>
													</tr>
													<tr>
														<td colspan="7">
															<?php
															//catatan bidang A
															$cat_bida = "SELECT
				  b.`poin_dupak`,
				  a.`no`,
				  a.`usulan_no`,
				  a.`dupak_no`,
				  a.`uraian`,
				  a.`kum_penilai_keterangan`,
				  a.`user_penilai_no`
				FROM
				  `usulan_dupak_details` AS a,
				  `dupaks` AS b
				WHERE a.`dupak_no` = b.`no`
				  AND a.`usulan_no` = '$no'
				  AND LEFT(a.`dupak_no`, 1) = 'A'
				  AND a.`kum_penilai_keterangan` IS NOT NULL
				  AND a.`kum_penilai_keterangan` <> ''
				GROUP BY a.`kum_penilai_keterangan`
				ORDER BY a.`dupak_no` ASC";
															$d_cat_bida = mysqli_query($koneksi, $cat_bida);

															//catatan bidang B
															$cat_bidb = "SELECT
				  b.`poin_dupak`,
				  a.`no`,
				  a.`usulan_no`,
				  a.`dupak_no`,
				  a.`uraian`,
				  a.`kum_penilai_keterangan`,
				  a.`user_penilai_no`
				FROM
				  `usulan_dupak_details` AS a,
				  `dupaks` AS b
				WHERE a.`dupak_no` = b.`no`
				  AND a.`usulan_no` = '$no'
				  AND LEFT(a.`dupak_no`, 1) = 'B'
				  AND a.`kum_penilai_keterangan` IS NOT NULL
				  AND a.`kum_penilai_keterangan` <> ''
				GROUP BY a.`kum_penilai_keterangan`
				ORDER BY a.`dupak_no` ASC";
															$d_cat_bidb = mysqli_query($koneksi, $cat_bidb);

															//catatan bidang C
															$cat_bidc = "SELECT
				  b.`poin_dupak`,
				  a.`no`,
				  a.`usulan_no`,
				  a.`dupak_no`,
				  a.`uraian`,
				  a.`kum_penilai_keterangan`,
				  a.`user_penilai_no`
				FROM
				  `usulan_dupak_details` AS a,
				  `dupaks` AS b
				WHERE a.`dupak_no` = b.`no`
				  AND a.`usulan_no` = '$no'
				  AND LEFT(a.`dupak_no`, 1) = 'C'
				  AND a.`kum_penilai_keterangan` IS NOT NULL
				  AND a.`kum_penilai_keterangan` <> ''
				GROUP BY a.`kum_penilai_keterangan`
				ORDER BY a.`dupak_no` ASC";
															$d_cat_bidc = mysqli_query($koneksi, $cat_bidc);

															//catatan bidang d
															$cat_bidd = "SELECT
				  b.`poin_dupak`,
				  a.`no`,
				  a.`usulan_no`,
				  a.`dupak_no`,
				  a.`uraian`,
				  a.`kum_penilai_keterangan`,
				  a.`user_penilai_no`
				FROM
				  `usulan_dupak_details` AS a,
				  `dupaks` AS b
				WHERE a.`dupak_no` = b.`no`
				  AND a.`usulan_no` = '$no'
				  AND LEFT(a.`dupak_no`, 1) = 'D'
				  AND a.`kum_penilai_keterangan` IS NOT NULL
				  AND a.`kum_penilai_keterangan` <> ''
				GROUP BY a.`kum_penilai_keterangan`
				ORDER BY a.`dupak_no` ASC";
															$d_cat_bidd = mysqli_query($koneksi, $cat_bidd);
															?>
															<textarea name="catatan_tim_penilai" class="form-control" rows="10" required>
<?php
													if (mysqli_num_rows($d_cat_bida) > 0) {
														echo "Catatan Bidang A :";

														while ($r_cat_bida = mysqli_fetch_array($d_cat_bida)) {
															echo "
- Kategori  " . $r_cat_bida['poin_dupak'] . " : " . $r_cat_bida['kum_penilai_keterangan'];
														}
													}
?>
	
	<?php
													if (mysqli_num_rows($d_cat_bidb) > 0) {
														echo "\nCatatan Bidang B :";
														while ($r_cat_bidb = mysqli_fetch_array($d_cat_bidb)) {
															echo "
- Kategori  " . $r_cat_bidb['poin_dupak'] . " : " . $r_cat_bidb['kum_penilai_keterangan'];
														}
													}
	?>
	
	<?php
													if (mysqli_num_rows($d_cat_bidc) > 0) {
														echo "\nCatatan Bidang C :";
														while ($r_cat_bidc = mysqli_fetch_array($d_cat_bidc)) {
															echo "
- Kategori  " . $r_cat_bidc['poin_dupak'] . " : " . $r_cat_bidc['kum_penilai_keterangan'];
														}
													}
	?>
	
	<?php
													if (mysqli_num_rows($d_cat_bidd) > 0) {
														echo "\nCatatan Bidang D :";
														while ($r_cat_bidd = mysqli_fetch_array($d_cat_bidd)) {
															echo "
- Kategori  " . $r_cat_bidd['poin_dupak'] . " : " . $r_cat_bidd['kum_penilai_keterangan'];
														}
													}
	?>
</textarea>
														</td>
														<input type="hidden" value=<?= $no ?> name="usulan_no"><br>
													</tr>
													<tr>
														<th colspan="7">
															KEPUTUSAN AKHIR DARI TIM PENILAI :
															<div class="custom-control custom-radio">
																<input type="radio" id="customRadio1" name="keputusan" class="custom-control-input" value="DITERIMA" required>
																<label class="custom-control-label" for="customRadio1">DITERIMA</label>
															</div>
															<div class="custom-control custom-radio">
																<input type="radio" id="customRadio2" name="keputusan" class="custom-control-input" value="DITOLAK" required>
																<label class="custom-control-label" for="customRadio2">DITOLAK</label>
															</div>
														</th>
													</tr>
													<tr class="text-center">
														<td colspan="7">
															<button type="submit" onclick="return confirm('Anda yakin akan mengirim Hasil Penilaian ?')" style="float: center" class="btn btn-success">Kirim Hasil Penilaian</button>
														</td>
													</tr>
												<?php } ?>
											</form>

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