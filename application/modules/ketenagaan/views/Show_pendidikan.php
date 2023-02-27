<?php
error_reporting(0);
include "koneksi.php";
?>

<!-- row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table color-table info-table">
						<thead>
							<tr>
								<th colspan="9">
									<h2>Riwayat Pendidikan</h2>
								</th>



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

									</td>
									<td>
										<?php
										if (!isset($cek_q1->ijazah)) {
										?>
											<a href="#" data-toggle="modal" data-nama="ijazah,<?= $r_pend['id_rwy_didik_formal'] ?>,<?= $r_pend['id_sdm'] ?>" data-judul=" Scan Ijazah" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload Scan Ijazah]</a>
										<?php } else { ?>
											<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->ijazah ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[Scan Ijazah]</a>
											<a href="<?= base_url() ?>usulan/usulan/hapus_pendidik/ijazah/<?= $cek_q1->ijazah ?>/<?= $id_usulan ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
										<?php } ?>

										<br><br>

										<?php
										if (!isset($cek_q1->transkip)) {
										?>
											<a href="#" data-toggle="modal" data-nama="transkip,<?= $r_pend['id_rwy_didik_formal'] ?>,<?= $r_pend['id_sdm'] ?>" data-judul=" Scan Transkip" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload Scan Transkip]</a>
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
												<a href="" data-toggle="modal" data-target="#Paper<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload File Disertasi]</a>
											<?php } else { ?>
												<!-- <a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->disertasi ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[File Disertasi]</a>

														<a href="<?= base_url() ?>usulan/usulan/hapus_pendidik/disertasi/<?= $cek_q1->disertasi ?>/<?= $id_usulan ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a> -->

												<a href="" data-toggle="modal" data-target="#lihatDisertasi<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[Klik Untuk Melihat File Disertasi]</a>
										<?php
											}
										}
										?>

										<?php
										if ($r_pend['id_jenj_didik'] == '35' || $r_pend['id_jenj_didik'] == '32') {
											$nama_file = "tesis";
										?>
											<br><br>
											<?php
											if ($cek_q1->tesis == '') {
											?>
												<a href="" data-toggle="modal" data-target="#Paper<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload File Tesis]</a>

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
											<a href="" data-toggle="modal" data-target="#Sk<?= $r_pend['id_rwy_didik_formal'] ?>" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i> [Upload Scan SK Penyetaraan]</a>
										<?php } else { ?>
											<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $cek_q1->sk_penyetaraan ?>" class="btn btn-xs btn-success"><i class="fa  fa-cloud-download"></i>[Scan SK Penyetaraan]</a>
											<a href="<?= base_url() ?>usulan/usulan/hapus_pendidik/sk_penyetaraan/<?= $cek_q1->sk_penyetaraan ?>/<?= $id_usulan ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
										<?php } ?>

									</td>
								</tr>

								</tr>

							<?php
								$no_pend++;
							};
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- row -->