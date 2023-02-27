<?php
error_reporting(0);
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
			} elseif ($usulan_status_id == '9') {
				echo "Selesai";
			} elseif ($usulan_status_id == '10') {
				echo "Pengajuan Usulan Baru";
			} elseif ($usulan_status_id == '11') {
				echo "Diusulkan Ke Dikti";
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
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangC/<?php echo $no; ?>""><span class=" hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>

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

					<li class="nav-item"> <a class="nav-link active" href="<?= base_url() ?>penilai/penilai/persyaratan/<?php echo $data_dasar->no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>penilai/penilai/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>


				</ul>
				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<?php $no_usulan = $data_dasar->no; ?>
					<div class="tab-pane active p-20" id="dasar" role="tabpanel">

						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table color-table info-table">
										<thead>
											<tr>
												<th class="text-center" style="width: 50px;">No.</th>
												<th class="text-center">Persyaratan.</th>
												<th class="text-center" style="width: 50px;" colspan="2">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-center">1</td>
												<td>Surat Pengantar dari Pimpinan PTS (Rektor/Ketua/Direktur)<?= $usulan_status ?></td>
												<?php if (isset($ceklis->surat_pengantar)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->surat_pengantar ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?>
															<a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->surat_pengantar ?>/<?= $ceklis->usulan_no ?>/surat_pengantar" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a> <?php
																																																																	} else {
																																																																	} ?>
													</td>
												<?php
												} else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <?php}else{ ?>
															<a href="#uploadModal" data-toggle="modal" data-nama="surat_pengantar" data-judul="Surat Pengantar dari Pimpinan PTS" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a>
														<?php } ?>
													</td>
												<?php
												} ?>
											</tr>

											<tr>
												<td class="text-center">2</td>
												<td>Fotocopy SK Pengangkatan sebagai Dosen Tetap Yayasan dilegalisir</td>
												<?php if (isset($ceklis->sk_pengangkatan)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_pengangkatan ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?>
															<a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sk_pengangkatan ?>/<?= $ceklis->usulan_no ?>/sk_pengangkatan" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
														<?php } else {
														} ?>
													</td>
												<?php
												} else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sk_pengangkatan" data-judul="Fotocopy SK Pengangkatan sebagai Dosen Tetap Yayasan dilegalisir" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a> <?php } else {
																																																																																} ?>
													</td>
												<?php
												} ?>
											</tr>

											<tr>
												<td class="text-center">3</td>
												<td>Daftar Usul Penetapan Angka Kredit (DUPAK)</td>
												<?php if (isset($ceklis->dupak)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->dupak ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>

													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->dupak ?>/<?= $ceklis->usulan_no ?>/dupak" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a> <?php}else{ ?>

														<?php } ?>

													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="dupak" data-judul="Daftar Usul Penetapan Angka Kredit (DUPAK)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">4</td>
												<td>Surat Pernyataan Melaksanakan Pendidikan dan Pengajaran (Bidang A)</td>
												<?php if (isset($ceklis->sp_pengajaran)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_pengajaran ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sp_pengajaran ?>/<?= $ceklis->usulan_no ?>/sp_pengajaran" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a><?php}else{ ?>

														<?php } ?>

													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sp_pengajaran" data-judul="Surat Pernyataan Melaksanakan Pendidikan dan Pengajaran (Bidang A)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">5</td>
												<td>Surat Pernyataan Melaksanakan Penelitian (Bidang B), beserta Karya llmiah yang asli</td>
												<?php if (isset($ceklis->sp_penelitian)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_penelitian ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>


													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sp_penelitian ?>/<?= $ceklis->usulan_no ?>/sp_penelitian" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?><a href="#uploadModal" data-toggle="modal" data-nama="sp_penelitian" data-judul="Surat Pernyataan Melaksanakan Penelitian (Bidang B), beserta Karya llmiah yang asli" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">6</td>
												<td>Surat Pernyataan Melaksanakan Pengabdian Pada Masyarakat (Bidang C)</td>
												<?php if (isset($ceklis->sp_pengabdian)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_pengabdian ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sp_pengabdian ?>/<?= $ceklis->usulan_no ?>/sp_pengabdian" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sp_pengabdian" data-judul="Surat Pernyataan Melaksanakan Pengabdian Pada Masyarakat (Bidang C)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">7</td>
												<td>Surat Pernyataan Melaksanakan Penunjang Tri Dharma Perguruan Tinggi (Bidang D)</td>
												<?php if (isset($ceklis->sp_penunjang)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_penunjang ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>

													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sp_penunjang ?>/<?= $ceklis->usulan_no ?>/sp_penunjang" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sp_penunjang" data-judul="Surat Pernyataan Melaksanakan Penunjang Tri Dharma Perguruan Tinggi (Bidang D)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">8</td>
												<td>Berita Acara Senat Fakultas bagi Universitas/Institut atau Senat Perguruan Tinggi bagi Sekolah Tinggi/Akademi dan Politeknik (<a href="<?= base_url() ?>assets/download_berkas/SENAT.pdf" target="_blank">Format Terlampir</a>) + Daftar Hadir</td>
												<?php if (isset($ceklis->ba_senat)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->ba_senat ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->ba_senat ?>/<?= $ceklis->usulan_no ?>/ba_senat" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="ba_senat" data-judul="Berita Acara Senat Fakultas bagi Universitas/Institut atau Senat Perguruan Tinggi bagi Sekolah Tinggi/Akademi dan Politeknik (Format Terlampir) + Daftar Hadir" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">9</td>
												<td>Surat Pernyataan Keabsahan Karya llmiah yang ditandatangani Dosen ybs. (<a href="<?= base_url() ?>assets/download_berkas/KEABSAHAN KARYA ILMIAH .pdf" target="_blank">Format Terlampir</a>)</td>
												<?php if (isset($ceklis->sp_karya_ilmiah)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_karya_ilmiah ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sp_karya_ilmiah ?>/<?= $ceklis->usulan_no ?>/sp_karya_ilmiah" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sp_karya_ilmiah" data-judul="Surat Pernyataan Keabsahan Karya llmiah yang ditandatangani Dosen ybs. (Format Terlampir)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">10</td>
												<td>Lembar Pernyataan Pengesahan Hasil Validasi Karya Ilmiah yang ditandatangani oleh Pimpinan PTS (<a href="<?= base_url() ?>assets/download_berkas/PENGESAHAN VALIDASI KARYA ILMIAH.pdf" target="_blank">Format Terlampir</a>)</td>
												<?php if (isset($ceklis->validasi_karya_ilmiah)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->validasi_karya_ilmiah ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>

													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->validasi_karya_ilmiah ?>/<?= $ceklis->usulan_no ?>/validasi_karya_ilmiah" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="validasi_karya_ilmiah" data-judul="Lembar Pernyataan Pengesahan Hasil Validasi Karya Ilmiah yang ditandatangani oleh Pimpinan PTS (Format Terlampir)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>



											<tr>
												<td class="text-center">11</td>
												<td>Fotocopy SK/Surat Izin Studi Lanjut dari Pimpinan PTS (bagi Dosen yang sedang melaksanakan/ menyelesaikan studi lanjut)</td>
												<?php if (isset($ceklis->sk_tugas_belajar)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_tugas_belajar ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sk_tugas_belajar ?>/<?= $ceklis->usulan_no ?>/sk_tugas_belajar" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sk_tugas_belajar" data-judul="Fotocopy SK/Surat Izin Studi Lanjut dari Pimpinan PTS (bagi Dosen yang sedang melaksanakan/ menyelesaikan studi lanjut)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">12</td>
												<td>Fotocopy SK Pengaktifan Kembali (untuk dosen yang sudah menyelesaikan studi lanjut dengan status tugas belajar)</td>
												<?php if (isset($ceklis->sk_aktif_kembali)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_aktif_kembali ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sk_aktif_kembali ?>/<?= $ceklis->usulan_no ?>/sk_aktif_kembali" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sk_aktif_kembali" data-judul="Fotocopy SK Pengaktifan Kembali (untuk dosen yang sudah menyelesaikan studi lanjut dengan status tugas belajar)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">13</td>
												<td>Fotocopy SK Dosen PNS, SK CPNS, SK Golongan terakhir (bagi dosen PNS dpk.)</td>
												<?php if (isset($ceklis->sk_dosen_pns)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_dosen_pns ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sk_dosen_pns ?>/<?= $ceklis->usulan_no ?>/sk_dosen_pns" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a><?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?><a href="#uploadModal" data-toggle="modal" data-nama="sk_dosen_pns" data-judul="Fotocopy SK Dosen PNS (bagi dosen PNS dpk.)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">14</td>
												<td>Fotocopy Keputusan Kepala BKN tentang penetapan NIP Baru (bagi dosen PNS dpk.)</td>
												<?php if (isset($ceklis->sk_nip_baru)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_nip_baru ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sk_nip_baru ?>/<?= $ceklis->usulan_no ?>/sk_nip_baru" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a><?php}else{ ?>

														<?php } ?>

													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sk_nip_baru" data-judul="Fotocopy Keputusan Kepala BKN tentang penetapan NIP Baru (bagi dosen PNS dpk.)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>
											<tr>
												<td class="text-center">15</td>
												<td>Fotocopy Surat Pernyataan Menduduki Jabatan (SPMJ) dan Surat Pernyataan Melaksanakan Tugas (SPMT) (bagi dosen PNS dpk.)</td>
												<?php if (isset($ceklis->spmj_spmt)) { ?>
													<td class="text-center" style="width: 50px;">
														<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->spmj_spmt ?>" target="_blank" class="btn btn-xs btn-info">
															<i class="fa fa-search"></i>
														</a>
													</td>
													<td class="text-center" style="width: 50px;">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->spmj_spmt ?>/<?= $ceklis->usulan_no ?>/spmj_spmt" class="btn btn-xs btn-danger tombol-hapus">
																<i class="fa fa-trash"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } else { ?>
													<td class="text-center" style="width: 50px;" colspan="2">
														<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="spmj_spmt" data-judul="Fotocopy Surat Pernyataan Menduduki Jabatan (SPMJ) dan Surat Pernyataan Melaksanakan Tugas (SPMT)  (bagi dosen PNS dpk.)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a> <?php}else{ ?>

														<?php } ?>
													</td>
												<?php } ?>
											</tr>

											<?php 
											if ($jabatan_usulan_no == '8' || $jabatan_usulan_no == '11' || $jabatan_usulan_no == '12' || $jabatan_usulan_no == '9' || $jabatan_usulan_no == '10' || $jabatan_usulan_no == '13') {
											?>
											<tr>
												<td class="text-center">16</td>
												<td>2 (Dua) Tahun Terakhir Penilaian Prestasi Kerja dari Pimpinan PTS (<a href="<?= base_url() ?>files/Format-Lampiran-Penilaian-Prestasi-Kerja.xls" target="_blank">Format Terlampir</a>)</td>
												<?php if (isset($ceklis->penilaian_kerja)) { ?>
												<td class="text-center" style="width: 50px;">
													<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->penilaian_kerja ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
												</td>
												<td class="text-center" style="width: 50px;">
													<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->penilaian_kerja ?>/<?= $ceklis->usulan_no ?>/penilaian_kerja" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
													<?php
													} else {
													} ?>
												</td>
												<?php } else { ?>
												<td class="text-center" style="width: 50px;" colspan="2">
													<?php if ( $role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="penilaian_kerja" data-judul="Upload 2 (Dua) Tahun Terakhir Penilaian Prestasi Kerja dari Pimpinan PTS" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a>
													<?php
													} else {
													} ?>
												</td>
												<?php } ?>
											</tr>
											<?php 
											}else { 
											?>
											<tr>
												<td class="text-center">16</td>
												<td>1 (Satu) Tahun Terakhir Penilaian Prestasi Kerja dari Pimpinan PTS (<a href="<?= base_url() ?>files/Format-Lampiran-Penilaian-Prestasi-Kerja.xls" target="_blank">Format Terlampir</a>)</td>
												<?php if (isset($ceklis->penilaian_kerja)) { ?>
												<td class="text-center" style="width: 50px;">
													<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->penilaian_kerja ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
												</td>
												<td class="text-center" style="width: 50px;">
													<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->penilaian_kerja ?>/<?= $ceklis->usulan_no ?>/penilaian_kerja" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
													<?php
													} else {
													} ?>
												</td>
												<?php } else { ?>
												<td class="text-center" style="width: 50px;" colspan="2">
													<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="penilaian_kerja" data-judul="Upload 1 (Satu) Tahun Terakhir Penilaian Prestasi Kerja dari Pimpinan PTS" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a>
													<?php
													} else {
													} ?>
												</td>
												<?php } ?>
											</tr>
											<?php } ?>

											<?php if ($jabatan_no == '31') {
											} else { ?>
												<tr>
													<td class="text-center">17</td>
													<td>Fotocopy PAK dan SK Jabatan Akademik Dosen (bagi yang mengajukan Kenaikan Jabatan/Pangkat)</td>
													<?php if (isset($ceklis->sk_jad_dosen)) { ?>
														<td class="text-center" style="width: 50px;">
															<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_jad_dosen ?>" target="_blank" class="btn btn-xs btn-info">
																<i class="fa fa-search"></i>
															</a>
														</td>
														<td class="text-center" style="width: 50px;">
															<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sk_jad_dosen ?>/<?= $ceklis->usulan_no ?>/sk_jad_dosen" class="btn btn-xs btn-danger tombol-hapus">
																	<i class="fa fa-trash"></i></a><?php}else{ ?>

															<?php } ?>

														</td>
													<?php } else { ?>
														<td class="text-center" style="width: 50px;" colspan="2">
															<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sk_jad_dosen" data-judul="Fotocopy SK Jabatan Akademik Dosen (bagi yang mengajukan Kenaikan Jabatan/Pangkat)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a><?php}else{ ?>

															<?php } ?>
														</td>
													<?php } ?>
												</tr>
												<tr>
													<td class="text-center">18</td>
													<td>Fotocopy SK Pangkat/Inpassing
														Terakhir (bagi yang mengajukan Kenaikan Jabatan/Pangkat)</td>
													<?php if (isset($ceklis->sk_jad_inpassing)) { ?>
														<td class="text-center" style="width: 50px;">
															<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_jad_inpassing ?>" target="_blank" class="btn btn-xs btn-info">
																<i class="fa fa-search"></i>
															</a>
														</td>
														<td class="text-center" style="width: 50px;">
															<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sk_jad_inpassing ?>/<?= $ceklis->usulan_no ?>/sk_jad_inpassing" class="btn btn-xs btn-danger tombol-hapus">
																	<i class="fa fa-trash"></i></a><?php}else{ ?>

															<?php } ?>

														</td>
													<?php } else { ?>
														<td class="text-center" style="width: 50px;" colspan="2">
															<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sk_jad_inpassing" data-judul="Fotocopy SK Pangkat/Inpassing Terakhir (bagi yang mengajukan Kenaikan Jabatan/Pangkat)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a><?php}else{ ?>

															<?php } ?>
														</td>
													<?php } ?>
												</tr>
												<tr>
													<td class="text-center">19</td>
													<td>Scan Asli Sertifikat Pendidik (bagi yang telah memiliki)</td>
													<?php if (isset($ceklis->serdik)) { ?>
														<td class="text-center" style="width: 50px;">
															<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->serdik ?>" target="_blank" class="btn btn-xs btn-info">
																<i class="fa fa-search"></i>
															</a>
														</td>
														<td class="text-center" style="width: 50px;">
															<?php if ($role == '4' && $usulan_status == '1') { ?><a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->serdik ?>/<?= $ceklis->usulan_no ?>/serdik" class="btn btn-xs btn-danger tombol-hapus">
																	<i class="fa fa-trash"></i></a> <?php}else{ ?>

															<?php } ?>
														</td>
													<?php } else { ?>
														<td class="text-center" style="width: 50px;" colspan="2">
															<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="serdik" data-judul="Fotocopy Sertifikat Pendidik Legalisir (bagi yang telah memiliki)" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a><?php}else{ ?>

															<?php } ?>
														</td>
													<?php } ?>
												</tr>

												<?php 
												if ($jabatan_usulan_no == '8' || $jabatan_usulan_no == '11' || $jabatan_usulan_no == '12' || $jabatan_usulan_no == '9' || $jabatan_usulan_no == '10' || $jabatan_usulan_no == '13') 
												{
												?>
												
												<tr>
												<td class="text-center">20</td>
												<td>Sertifikat Akreditasi Ijazah Terakhir</td>
												<?php 
												if (isset($ceklis->sertifikat_akre)) 
												{ 
												?>
													<td class="text-center" style="width: 50px;">
													<a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sertifikat_akre ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
													</td>
													<td class="text-center" style="width: 50px;">
													<?php if ($role == '4' && $usulan_status == '1') { ?><a href="<?= base_url() ?>usulan/usulan/hapus_syarat/<?= $ceklis->sertifikat_akre ?>/<?= $ceklis->usulan_no ?>/sertifikat_akre" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
													<?php } else { } ?>
													</td>
												<?php 
												}else{ 
												?>
													<td class="text-center" style="width: 50px;" colspan="2">
													<?php if ($role == '4' && $usulan_status == '1') { ?> <a href="#uploadModal" data-toggle="modal" data-nama="sertifikat_akre" data-judul="Sertifikat Akreditasi Ijazah Terakhir" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a>
													<?php } else { } ?>
													</td>
												<?php 
												} 
												?>
												</tr>
												
												<?php 
												} 
												?>

											<?php } ?>
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
<!-- UPLOAD MODAL -->
<form method="post" action="<?= base_url() ?>usulan/usulan/tambah_syarat" role="form" enctype="multipart/form-data">

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
						<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="10000">
						<p class="help-block">Ukuran file maksimal 10MB. Ekstensi .pdf</p>
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