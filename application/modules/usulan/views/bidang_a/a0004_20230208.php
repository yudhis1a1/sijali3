<?php
error_reporting(0);
include "koneksi.php";
function input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = strip_tags($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<!-- Style to set the size of checkbox -->
<style>
	input.largerCheckbox {
		width: 20px;
		height: 20px;
	}
</style>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Bidang A</h4>
	</div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="tile">
					<h3>BIDANG A</h3>
					<b>Melaksanakan Perkulihan/Tutorial & Membimbing, Menguji Serta Menyelenggarakan Pendidikan di Laboratorium, Praktek Keguruan Bengkel/Studio/Kebun</b><br>
					Melaksanakan Perkulihan/Tutorial & Membimbing, Menguji Serta Menyelenggarakan Pendidikan di Laboratorium, Praktik Keguruan Bengkel/Studio/Kebun Pada Fakultas/Sekolah Tinggi/Akademi/ Politeknik Sendiri, Pada Fakultas Lain Dalam Lingkungan Universitas/Institut Sendiri, maupun di Luar Perguruan Tinggi Sendiri Secara Melembaga Paling Banyak 12 SKS/Semester
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="tile">
					<h3>DUPAK Usulan</h3>
				</div>
				<table border="1" class="ui celled table" width="100%">
					<thead>
						<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
							<th colspan="3">ANGKA KREDIT MENURUT INSTANSI PENGUSUL</th>
						</tr>
						<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
							<th>LAMA</th>
							<th>BARU</th>
							<th>JUMLAH</th>
						</tr>
					</thead>
					<tbody>
						<tr class="text-center">
							<td><?= $q_dupak->kum_usulan_lama; ?></td>
							<td><?= $q_dupak->kum_usulan_baru; ?></td>
							<td><?= $q_dupak->kum_usulan_lama + $q_dupak->kum_usulan_baru; ?></td>
						</tr>

						<tr class="text-center">
							<?php if ($usulan_status_id <> '1' && $usulan_status_id <> '2') {
								echo "<td></td><td></td>";
							} else { ?>
								<td>

								</td>
								<td>
									<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah" class="btn btn-success"><i class="fa fa-plus-square"> TAMBAH</i>
									</a>
								</td>
							<?php } ?>
							<td></td>
						</tr>

					</tbody>
				</table>
			</div>

			<?php if ($q2->row() > 0) { ?>
				<div class="card-body">
					<div class="tile">
						<h3>Usulan Baru Untuk Penilaian</h3>
					</div>
					<?php
					$q_thn = "SELECT
					  usulan_no,
					  NO,
					  `uraian`,
					  `semester`,
					  `tahun_akademik`,
					  `tahun_akademik` + 1 AS thn_akademik_baru,
					  `tgl`,
					  satuan_hasil,
					  `keterangan`,
					  angka_kredit,
					  berkas,
					  bukti_pengajaran,
					  kum_penilai,
					  kum_penilai_keterangan
					FROM
					  `usulan_dupak_details`
					WHERE usulan_no = '$q_dupak->usulan_no'
					  AND `dupak_no` = '$q_dupak->dupak_no'
					  GROUP BY `berkas`";
					$data_thn = mysqli_query($koneksi, $q_thn);
					while ($row_thn = mysqli_fetch_array($data_thn)) {
					?>
						<div class="table-responsive ">
							<table class="table table-bordered" width="100%">
								<thead>
									<tr style="background-color: #e4e4e4; font-weight: bold; font-size:18px;">
										<th colspan='4' class="text-center">
											Semester : <?= $row_thn['semester'] ?> <br>
											Tanggal SK : <?= $row_thn['tgl'] ?>
										</th>
									</tr>
									<tr style="background-color: #e4e4e4;">
										<th colspan="2" class="text-center">
											<?php
											if ($row_thn['berkas'] <> '') {
												$bt = "success";
												$ic = "fa-cloud-download";
												$l  = base_url() . "usulan/usulan_dupak/download_bidanga/" . $row_thn['berkas'];
												$ta = "_blank";
											} else {
												$bt = "danger";
												$ic = "fa-ban";
												$l  = "#";
												$ta = "";
											}

											if ($row_thn['bukti_pengajaran'] <> '') {
												$bt2 = "success";
												$ic2 = "fa-cloud-download";
												$l2  = base_url() . "usulan/usulan_dupak/download_bidanga/" . $row_thn['bukti_pengajaran'];
												$ta2 = "_blank";
											} else {
												$bt2 = "danger";
												$ic2 = "fa-ban";
												$l2  = "#";
												$ta2 = "";
											}
											?>

											<a target="<?= $ta ?>" href="<?= $l ?>" class="btn btn-md btn-<?= $bt ?>"><i class="fa <?= $ic ?>"></i> ST Mengajar [PDF]</a>

											<?php
											if (substr($row_thn['bukti_pengajaran'], 0, 5) == "bukti") {
											?>
												<a target="<?= $ta2 ?>" href="<?= $l2 ?>" class="btn btn-md btn-<?= $bt2 ?>"><i class="fa <?= $ic2 ?>"></i> Bukti Pengajaran [PDF]</a>
												<?php
											} else {
												if ($row_thn['bukti_pengajaran'] <> '') {
												?>
													<a href="<?= $row_thn['bukti_pengajaran'] ?>" class="btn btn-md btn-success" target="_blank"><i class="fa fa-external-link"></i> Bukti Pengajaran [Link Repository]</a>
												<?php } else { ?>
													<a href="#" class="btn btn-md btn-danger"><i class="fa fa-ban"></i> Bukti Pengajaran</a>
											<?php
												}
											}
											?>
										</th>
										<?php
										$total_sks = 0;
										$q1 = "SELECT
										NO,
										`uraian`,
										`semester`,
										`tahun_akademik`,
										`sks`,
										`jumlah_volume`,
										(sks * jumlah_volume) AS total_sks
										FROM
										`usulan_dupak_details`
										WHERE usulan_no = '$q_dupak->usulan_no'
										AND `dupak_no` = '$q_dupak->dupak_no'
										AND semester = '$row_thn[semester]'
										AND tahun_akademik = '$row_thn[tahun_akademik]'";
										$data_q1 = mysqli_query($koneksi, $q1);
										while ($row_q1 = mysqli_fetch_array($data_q1)) {
											$total_sks += $row_q1['total_sks'];
										}

										if ($jabatan_no == '43' || $jabatan_no == '44' || $jabatan_no == '46' || $jabatan_no == '47' || $jabatan_no == '48' || $jabatan_no == '50' || $jabatan_no == '51') {

											if ($total_sks < 11) {
												$ak = $total_sks;
											} elseif ($total_sks < 12) {
												$ak = (10 * 1) + (($total_sks - 10) * 0.5);
											} else {
												$ak = 11;
											}
										} elseif ($jabatan_no == '31' || $jabatan_no == '40' || $jabatan_no == '41') {
											if ($total_sks < 11) {
												$ak = $total_sks / 2;
											} elseif ($total_sks < 12) {
												$ak = (10 * 0.5) + (($total_sks - 10) * 0.25);
											} else {
												$ak = 5.5;
											}
										}
										?>
										<th class="text-center" style="background-color: #e4e4e4; font-weight: bold; font-size:15px;">
											Angka Kredit : <?= $ak ?>
										</th>
										<td class="text-center">
											<?php
											if ($usulan_status_id <> '1' && $usulan_status_id <> '2') {
											} else {

												if (substr($row_thn['bukti_pengajaran'], 0, 5) == "bukti") { //jika bukti upload pdf
													$bukpeng = $row_thn['bukti_pengajaran'];
												} else {
													$bukpeng = '';
												}
											?>
												<a data-toggle="tooltip" title="Hapus" href="<?= base_url() ?>usulan/usulan_dupak/hapus_a0004/<?= $row_thn['NO'] ?>/<?= $row_thn['usulan_no'] ?>/<?= $row_thn['berkas'] ?>/<?= $row_thn['semester'] ?>/<?= $jabatan_no ?>/<?= $bukpeng ?>" class="btn btn-md tombol-hapus btn-danger"><i class="fa fa-trash-o"></i></a>
											<?php } ?>
										</td>
									</tr>
									<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
										<th>Mata Kuliah</th>
										<th>SKS/MTK</th>
										<th>Jumlah Volume Kegiatan</th>
										<th>Total SKS</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$q_detail = "SELECT
												usulan_no,
												NO,
												`uraian`,
												`semester`,
												sks,
												jumlah_volume,
												`tahun_akademik`,
												`tahun_akademik` + 1 AS thn_akademik_baru,
												`tgl`,
												(sks*jumlah_volume) AS total_sks
												FROM
												`usulan_dupak_details`
												WHERE usulan_no = '$q_dupak->usulan_no'
												AND `dupak_no` = '$q_dupak->dupak_no'
												AND semester = '$row_thn[semester]'
												AND tahun_akademik = '$row_thn[tahun_akademik]'";
									$data_detail = mysqli_query($koneksi, $q_detail);
									while ($row = mysqli_fetch_array($data_detail)) {
									?>
										<tr class="text-center">
											<td><?= $row['uraian'] ?></td>
											<td><?= $row['sks'] ?></td>
											<td><?= $row['jumlah_volume'] ?></td>
											<td><?= $row['total_sks'] ?></td>
										</tr>
									<?php
									}
									if ($role == '1') {
									?>
										<tr style="background-color:#FFFF00; font-weight: bold;">
											<td colspan="3">
												Catatan Tim Penilai:
												<textarea class="form-control" rows="4"><?= $row_thn['kum_penilai_keterangan'] ?></textarea>
											</td>
											<td>
												AK Tim Penilai:
												<input type="text" class="form-control" value="<?= $row_thn['kum_penilai'] ?>">
											</td>
										</tr>
									<?php
									}
									?>
							</table>
						</div>
					<?php
					}
					?>


				</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="tile">
					<a href="<?= base_url() ?>usulan/usulan/bidangA/<?= $no ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah-->
<?php
date_default_timezone_set('Asia/Jakarta');
$no_usulan_dupak_details = date("ymdHis") . '01';
?>
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="tambah">
	<div class="modal-dialog modal-lg text-justify">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url() ?>usulan/usulan_dupak/tambah_a0004/A0004/200" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>BIDANG A</h3>
					<b>Melaksanakan Perkulihan/Tutorial & Membimbing, Menguji Serta Menyelenggarakan Pendidikan di Laboratorium, Praktek Keguruan Bengkel/Studio/Kebun</b><br>
					Melaksanakan Perkulihan/Tutorial & Membimbing, Menguji Serta Menyelenggarakan Pendidikan di Laboratorium, Praktik Keguruan Bengkel/Studio/Kebun Pada Fakultas/Sekolah Tinggi/Akademi/ Politeknik Sendiri, Pada Fakultas Lain Dalam Lingkungan Universitas/Institut Sendiri, maupun di Luar Perguruan Tinggi Sendiri Secara Melembaga Paling Banyak 12 SKS/Semester
					<hr>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="semester">Semester</label><br>
								<input type="hidden" name="no_usulan" value="<?= $no; ?>" required>
								<input type="hidden" name="jabatan_no" value="<?= $jabatan_no; ?>" required>
								<select name="semester" class="form-control select2" style="width: 100%; " id="semester" data-placeholder="Click to Choose..." required>
									<option value=""></option>
									<?php
									$nidn = "SELECT
									  a.no,
									  a.dosen_no,
									  b.nidn,
									  b.`jabatan_tgl`,
									  LEFT(b.`jabatan_tgl`, 4) AS thn_jabatan,
									  MID(b.`jabatan_tgl`, 6, 2) AS bln_jabatan,
									  b.`pengangkatan_tgl`,
									  LEFT(b.`pengangkatan_tgl`, 4) AS thn_dosen_tetap,
									  MID(b.`pengangkatan_tgl`, 6, 2) AS bln_dosen_tetap
									FROM
									  usulans AS a,
									  dosens AS b
									WHERE a.dosen_no = b.no
									  AND a.no = '$no'";
									$da_nidn = mysqli_query($koneksi, $nidn);
									$r_nidn = mysqli_fetch_array($da_nidn);

									if ($jabatan_no == '31') {
										$thn_smt = $r_nidn['thn_dosen_tetap'];
										$bln_smt = $r_nidn['bln_dosen_tetap'];
									} else {
										$thn_smt = $r_nidn['thn_jabatan'];
										$bln_smt = $r_nidn['bln_jabatan'];
									}

									if ($bln_smt == '09' || $bln_smt == '10' || $bln_smt == '11' || $bln_smt == '12') {
										$thn_pakai = $thn_smt . "1";
									} elseif ($bln_smt == '01' || $bln_smt == '02') {
										$thn_smt2 = $thn_smt - 1;
										$thn_pakai = $thn_smt2 . "1";
									} elseif ($bln_smt == '03' || $bln_smt == '04' || $bln_smt == '05' || $bln_smt == '06'  || $bln_smt == '07' || $bln_smt == '08') {
										$thn_smt2 = $thn_smt - 1;
										$thn_pakai = $thn_smt2 . "2";
									}

									//buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12 utk tgl now
									$tgl_now				= date("Y-m-d");
									$thn_now				= substr($tgl_now, 0, 4);
									$array_bulan_now = array(
										1 => ($thn_now - 1) . '1',
										($thn_now - 1) . '1',
										($thn_now - 1) . '2',
										($thn_now - 1) . '2',
										($thn_now - 1) . '2',
										($thn_now - 1) . '2',
										($thn_now - 1) . '2',
										($thn_now - 1) . '2',
										$thn_now . '1',
										$thn_now . '1',
										$thn_now . '1',
										$thn_now . '1'
									);

									//jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut utk tgl now
									$date_now 				= strtotime($tgl_now);
									$tgl_akademik_now 		= $array_bulan_now[date('n', $date_now)];

									$q_thn = "SELECT
												  *
												FROM
												  `ajar_dosen`
												WHERE NIDN = '$r_nidn[nidn]'
													AND SEMESTER >='$thn_pakai'
													AND `SEMESTER` <> '$tgl_akademik_now'
												GROUP BY SEMESTER
												ORDER BY SEMESTER ASC";
									$data_thn = mysqli_query($koneksi, $q_thn);
									while ($row_thn = mysqli_fetch_array($data_thn)) {

										$csm = $this->db->query("SELECT
																	semester
																FROM
																	`usulan_dupak_details`
																WHERE `usulan_no` = '$no'
																	AND `dupak_no` = 'A0004'
																	AND semester= '$row_thn[SEMESTER]'
																LIMIT 1")->num_rows();

										if ($csm > 0) {
											$dis = "disabled";
											$kat = " (sudah digunakan)";
										} else {
											$dis = "";
											$kat = "";
										}
									?>
										<option value="<?= $row_thn['SEMESTER'] ?>" <?= $dis ?>><?= $row_thn['SEMESTER'] ?><?= $kat ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="tgl">Tanggal ST</label>
								<div class="input-group date">
									<input type="date" name="tgl" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd" required>
									<br>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="berkas">Upload Surat Tugas Mengajar</label>
								<input type="file" required name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
								<p class="help-block">Ukuran File maksimal 5MB dengan ekstensi .pdf</p>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="berkas">Bukti Pengajaran (BAP, Presensi, & Penilaian). Silakan pilih salah satu metode dibawah ini :</label>
								<br>
								<input type="radio" class="largerCheckbox" name="pilihan" value="upload" onclick="showUpload()"> Upload File
								<input type="radio" class="largerCheckbox" id="slink" name="pilihan" value="link" onclick="showLink()"> Input Link Repository
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<div id="upload_file" style="display: none;">
									<input type="file" name="bukti_pengajaran" class="form-control" accept="application/pdf" max="10000">
									<p class="help-block">Ukuran file maksimal 10 MB. Dijadikan 1 file .pdf</p>
								</div>
								<div id="link_repo" style="display: none;">
									<input type="text" name="link_repo" id="text_link" class="form-control" placeholder="https://repository...">
									<p class="help-block"></p>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<button type="button" id="btn-tambah-form" class="btn btn-success"><i class="fa fa-plus-square">Tambah Data</i></button>
						<button type="button" id="btn-reset-form" class="btn btn-danger"><i class="fa fa-plus-square"> Reset</i></button>
					</div>
					<h4>Data Mata Kuliah ke 1 :</h4>
					<table id="table-data" class="ui celled table">
						<tr>
							<td>Matakuliah </td>
							<td>
								<select name="uraian[ ]" class="form-control select2" style="width: 450 px" data-placeholder="Pilih Mata Kuliah.." required>
									<option value=""></option>
									<?php foreach ($ajar_dosen as $ajar) { ?>
										<option value="<?php echo $ajar->NMMK; ?>"><?php echo $ajar->NMMK; ?> </option>
									<?php } ?>
								</select>
								<input type="hidden" name="no_usulan_detail[]" id="no_usulan_detail" value="<?= $no_usulan_dupak_details ?>">
							</td>
						</tr>
						<tr>
							<td>SKS/mtk</td>
							<td>
								<input type="text" style="width:100px;" name="sks[]" class="form-control" required>&nbsp;&nbsp;&nbsp;
								Jumlah Kelas : <input type="text" style="width:100px;" name="jumlah_volume[]" class="form-control" required>
								<br>
								<code>*Gunakan Angka dan tanda titik (.) jika bilangan desimal</code>
							</td>
						</tr>
					</table>
					<div id="insert-form"></div>
				</div>

				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
			<!-- Kita buat textbox untuk menampung jumlah data form -->
			<input type="hidden" id="jumlah-form" value="1">
		</div>
	</div>
</div>

<script>
	function showUpload() {
		document.getElementById("upload_file").style.display = "block";
		document.getElementById("link_repo").style.display = "none";
	}

	function showLink() {
		document.getElementById("upload_file").style.display = "none";
		document.getElementById("link_repo").style.display = "block";

		document.getElementById('text_link').focus();
	}
</script>