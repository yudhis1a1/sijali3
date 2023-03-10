<?php
error_reporting(0);
if ($jenjang_id_lama == '0' && $jenjang_id_lama <> $jenjang_id_baru) {
	$kum = "150";
} elseif ($jenjang_id_lama <> $jenjang_id_baru) {
	$kum = "50";
} elseif ($jenjang_id_lama == $jenjang_id_baru) {
	$kum = "0";
}
?>
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
					<b>Pendidikan Formal</b><br>
					Magister (S2)
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
							<!-- <td><?= $jumlah ?></td> -->
						</tr>

						<tr class="text-center">
							<?php if ($usulan_status_id <> '1' && $usulan_status_id <> '2') {
								echo "<td></td><td></td>";
							} else { ?>
								<td></td>
								<td>
									<?php if ($q1 == 0) { ?>
										<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah" class="btn btn-success"><i class="fa fa-plus-square"> TAMBAH</i></a>
									<?php } ?>
								</td>
							<?php } ?>
							<td></td>
						</tr>
						<?php
						if ($role == '1') {
						?>
							<tr style="background-color:#FFFF00; font-weight: bold;">
								<td colspan="2">
									Catatan Tim Penilai:
									<textarea class="form-control" rows="4"><?= $q1->kum_penilai_keterangan ?></textarea>
								</td>
								<td>
									AK Tim Penilai:
									<input type="text" class="form-control" value="<?= $q1->kum_penilai ?>">
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<?php

			if ($q1->no > 0) {
			?>
				<div class="card-body">
					<div class="tile">
						<h3>Usulan Baru Untuk Penilaian</h3>
					</div>
					<table border="1" class="ui celled table" width="100%">
						<thead>
							<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
								<th>Perguruan Tinggi</th>
								<th>Bidang Ilmu</th>
								<th>Tanggal Penerbitan ijazah</th>
								<th>Angka Kredit</th>
								<th>File</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$dap = $this->db->query("SELECT
														a.*,
														b.`tesis`,
														b.link_tesis,
														b.`id_file_rwy`,
														b.`ijazah`,
														b.`transkip`,
														b.`sk_penyetaraan`,
														d.`nama_jenjang`,
														e.`nama_bidang`,
														c.`tgl_ijazah_pak`
													FROM
														`rwy_pend_formal` a
														LEFT JOIN `file_rwy_pendidik` b
														ON a.`id_rwy_didik_formal` = b.`id_rwy_didik_formal`
														LEFT JOIN `rwy_pend_pak` c
														ON a.`id_rwy_didik_formal` = c.`id_rwy_didik_formal`
														LEFT JOIN `jenjangs` d
														ON a.`id_jenj_didik` = d.`id`
														LEFT JOIN `bidang_ilmus` e
														ON a.`id_bid_studi` = e.`kode`
													WHERE a.`id_rwy_didik_formal` = '$q1->id_rwy_didik_formal'")->row();
							?>
							<tr class="text-center">
								<td><?= $dap->nm_sp_formal ?></td>
								<td><?= $dap->nama_bidang ?></td>
								<td><?= $dap->tgl_ijazah_pak ?></td>
								<td><?= $q1->angka_kredit ?></td>
								<td>
									<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $dap->ijazah ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Scan Ijazah]</a>

									<br><br>

									<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $dap->transkip ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Scan Transkip]</a>

									<br><br>

									<?php if ($dap->tesis <> '') { ?>
										<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $dap->tesis ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[File Resume Tesis]</a>
									<?php } else { ?>
										<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> [File Resume Tesis]</a>
									<?php } ?>

									<br><br>

									<?php if ($dap->link_tesis <> '') { ?>
										<a target="_blank" href="<?= $dap->link_tesis ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Link Repository Tesis]</a>
									<?php } else { ?>
										<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> [Link Repository Tesis]</a>
									<?php } ?>
									<br><br>

									<?php
									if (!isset($dap->sk_penyetaraan)) {
									?>
										<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> [Scan SK Penyetaraan (Lulusan Luar Negeri)]</a>
									<?php } else { ?>
										<a target="_blank" href="<?= base_url() ?>usulan/usulan/download_file_rwy_pendidik/<?= $dap->sk_penyetaraan ?>" class="btn btn-sm btn-success"><i class="fa  fa-cloud-download"></i>[Scan SK Penyetaraan (Lulusan Luar Negeri)]</a>
									<?php } ?>
								</td>
								<td>
									<?php if ($usulan_status_id <> '1' && $usulan_status_id <> '2') {
									} else { ?>
										<a href="<?= base_url() ?>usulan/usulan_dupak/hapus_ijazah/<?= $q1->no ?>/<?= $q1->usulan_no ?>/<?= $dupak_no ?>" class="btn btn-danger tombol-hapus">
											<i class="fa fa-trash-o"></i></a>
									<?php } ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			<?php
			}
			?>
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

<!-- Modal Tambah -->
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="tambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url() ?>usulan/usulan_dupak/tambah_a0001/A0002/<?= $kum ?>" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>BIDANG A</h3>
					<b>Pendidikan Formal</b><br>
					Magister (S2)
					<hr>
					<input type="hidden" name="no_usulan" value="<?= $no ?>" required>
					<div class="card text-white bg-danger">
						<div class="card-body">
							<h4 class="card-title">Informasi :</h4>
							<p class="card-text">
								<b>Silakan pilih pendidikan yang ingin anda klaim untuk penilaian. Jika data pendidikan tidak muncul, periksa kembali menu <a href="<?= base_url() ?>usulan/usulan/show_pendidikan/<?= $no ?>" class="btn btn-md btn-info"> <b>Riwayat Pendidikan</b></a> dan pastikan Anda sudah mengupload file ijazah, transkrip, SK penyetaraan (bagi lulusan luar negeri), tesis dan sudah mengisi tanggal penerbitan ijazah.</b>
							</p>
						</div>
					</div>
					<div class="form-group">
						<h5 class="m-t-30">Pilih Pendidikan</h5>
						<select name="id_rwy_didik_formal" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
							<?php
							$dpend = $this->db->query("SELECT
															a.*,
															b.`tesis`,
															b.`id_file_rwy`,
															b.`ijazah`,
															b.`transkip`,
															b.`link_tesis`,
															b.`sk_penyetaraan`,
															d.`nama_jenjang`,
															e.`nama_bidang`,
															c.`tgl_ijazah_pak`
														FROM
															`rwy_pend_formal` a
															LEFT JOIN `file_rwy_pendidik` b
															ON a.`id_rwy_didik_formal` = b.`id_rwy_didik_formal`
															LEFT JOIN `rwy_pend_pak` c
															ON a.`id_rwy_didik_formal` = c.`id_rwy_didik_formal`
															LEFT JOIN `jenjangs` d
															ON a.`id_jenj_didik` = d.`id`
															LEFT JOIN `bidang_ilmus` e
															ON a.`id_bid_studi` = e.`kode`
														WHERE a.`id_sdm` = '$id_sdm'
															AND b.`ijazah` IS NOT NULL
															AND b.`transkip` IS NOT NULL
															AND (
																	b.`link_tesis` IS NOT NULL
																	OR b.`tesis` IS NOT NULL
																)
															AND c.tgl_ijazah_pak <>'0000-00-00'
															AND (
															a.`id_jenj_didik` = '35'
															OR a.`id_jenj_didik` = '32'
															OR a.`id_jenj_didik` = '36'
															)")->result();

							foreach ($dpend as $dp) {
							?>
								<option value="<?= $dp->id_rwy_didik_formal ?>"><?= $dp->nama_bidang ?> - <?= $dp->nm_sp_formal ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Tambah lama-->
<!-- <div class="modal fade" aria-labelledby="myLargeModalLabel" id="tambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url() ?>usulan/usulan_dupak/tambah_a0001/A0002/<?= $kum ?>" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>BIDANG A</h3>
					<b>Pendidikan Formal</b><br>
					Magister (S2)
					<hr>
					<div class="form-group">
						<label for="uraian">Uraian Kegiatan</label>
						<textarea name="uraian" class="form-control" id="uraian" rows="2" required></textarea>
						<input type="hidden" name="no_usulan" value="<?= $no ?>" required>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="tgl">Tanggal Ijazah</label>
								<div class="input-group date">
									<input type="date" name="tgl" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="satuan_hasil">Satuan Hasil</label>
								<input type="text" name="satuan_hasil" class="form-control" id="satuan_hasil" maxlength="150" required>
								<input type="hidden" step="any" name="jumlah_volume" class="form-control" id="jumlah_volume" value="1">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> -->

<!-- Modal Edit-->
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="edit<?= $q1->no; ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<form method="post" action="<?= base_url() ?>usulan/usulan_dupak/update_a0001/A0002/<?= $kum ?>" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<h3>BIDANG A</h3>
					<b>Pendidikan Formal</b><br>
					Magister (S2)
					<hr>

					<div class="form-group">
						<label for="uraian">Uraian Kegiatan</label>
						<textarea name="uraian" class="form-control" id="uraian" rows="2" required><?= $q1->uraian; ?></textarea>
						<input type="hidden" name="no_dupak" value="<?= $q1->no; ?>" required>
						<input type="hidden" name="no_usulan" value="<?= $q1->usulan_no; ?>" required>

					</div>

					<div class="row">
						<!-- <div class="col-md-4">
                    <div class="form-group">
                      <label for="semester">Semester</label><br>
					  <input type="text" name="semester" value="<?= $q1->semester ?>"  class="form-control" id="semester" readonly>
                      
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tahun_akademik">Tahun Dasar Akademik</label>
					  <input type="text" name="thn_akademik" value="<?= $q1->tahun_akademik ?>"  class="form-control" id="thn_akademik" maxlength="150" readonly>
                    </div>
                  </div> -->

						<div class="col-md-4">
							<div class="form-group">

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="tgl">Tanggal</label>
								<div class="input-group date">
									<input type="date" name="tgl" value="<?= $q1->tgl ?>" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="satuan_hasil">Satuan Hasil</label>
								<input type="text" name="satuan_hasil" value="<?= $q1->satuan_hasil ?>" class="form-control" id="satuan_hasil" maxlength="150" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<!-- <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"><?= $q1->keterangan ?></textarea> -->
					</div>
					<!--
				<div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="berkas">Berkas Upload</label>
											<input type="hidden"  name="old_pict" value="<?= $q1->berkas ?>" class="form-control">
                      <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                      <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                    </div>
                  </div>
                </div>
				-->
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

<!-- Modal Upload -->
<?php foreach ($q3->result() as $row) { ?>
	<form method="post" action="<?= base_url() ?>usulan/usulan_dupak/upload_file/A0002" role="form" enctype="multipart/form-data">
		<div class="modal fade" id="uploadModal" role="dialog" aria-labelledby="uploadModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">

						<h4 id="modalLabel"></h4>

						<input type="hidden" name="jenis" value="">
						<input type="hidden" name="no_usulan" value="<?php echo $no; ?>">


						<div class="form-group">
							<label for="berkas">Berkas Upload</label>
							<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
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
<?php } ?>