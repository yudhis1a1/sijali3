<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor"></h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">


		</div>
	</div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
	<div class="col-12">
		<p class="text-muted m-t-0"></p>
		<div id="code1" class="collapse">
			<div class="highlight">
				<pre>
    <code><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card"</span> <span class="na">style=</span><span class="s">"width: 20rem;"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;img</span> <span class="na">class=</span><span class="s">"card-img-top"</span> <span class="na">src=</span><span class="s">"..."</span> <span class="na">alt=</span><span class="s">"Card image cap"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;h4</span> <span class="na">class=</span><span class="s">"card-title"</span><span class="nt">&gt;</span>Card title<span class="nt">&lt;/h4&gt;</span>
        <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"card-text"</span><span class="nt">&gt;</span>Some quick example text to build on the card title and make up the bulk of the card's content.<span class="nt">&lt;/p&gt;</span>
        <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span class="nt">&gt;</span>Daftar<span class="nt">&lt;/a&gt;</span>
      <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span></code>
</pre>
			</div>
		</div>
		<!-- Row -->
		<center>
			<div class="row">
				<!-- column -->
				<?php
				if ($jabatan_no == '31') {
				?>
					<div class="col-lg-4 col-md-6">
					</div>
					<div class="col-lg-4 col-md-6">
						<!-- Card -->
						<div class="card">
							<img class="card-img-top img-responsive" src="<?= base_url() ?>assets/images/big/dosen.jpg" alt="Card image cap">
							<div class="card-body">
								<h4 class="card-title">PENGANGKATAN AWAL</h4>

								<button type="submit" class="btn btn-success waves-effect waves-light m-t-20" data-toggle="modal" data-target="#exampleModal">Daftar</button>

							</div>
						</div>
						<!-- Card -->
					</div>
					<div class="col-lg-4 col-md-6">
					</div>
				<?php
				}
				if ($jabatan_no == '40' || $jabatan_no == '41' || $jabatan_no == '43' || $jabatan_no == '44' || $jabatan_no == '46' || $jabatan_no == '47' || $jabatan_no == '48') {
				?>
					<!-- column -->
					<!-- column -->
					<div class="col-lg-2 col-md-6">
					</div>
					<div class="col-lg-3 col-md-6">
						<!-- Card -->
						<div class="card">
							<img class="card-img-top img-responsive" src="<?= base_url() ?>assets/images/big/dosen.jpg" alt="Card image cap">
							<div class="card-body">
								<h4 class="card-title">NAIK JABATAN REGULER</h4>
								<button type="submit" class="btn btn-success waves-effect waves-light m-t-20" data-toggle="modal" data-target="#exampleModal2">Daftar</button>
							</div>
						</div>
						<!-- Card -->
					</div>
					<!-- column -->
					<!-- column -->
				<?php
				}

				if ($jabatan_no == '40' || $jabatan_no == '41' || $jabatan_no == '43' || $jabatan_no == '44') {
				?>
					<div class="col-lg-3 col-md-6">
						<div class="card">
							<img class="card-img-top img-responsive" src="<?= base_url() ?>assets/images/big/dosen.jpg" alt="Card image cap">
							<div class="card-body">
								<h4 class="card-title">LONCAT JABATAN</h4>
								<button type="submit" class="btn btn-success waves-effect waves-light m-t-20" data-toggle="modal" data-target="#exampleModal3">Daftar</button>
							</div>
						</div>
					</div>
				<?php
				}

				if ($jabatan_no == '43' || $jabatan_no == '46' || $jabatan_no == '47' || $jabatan_no == '50') {
				?>
					<!-- column -->
					<!-- column -->
					<div class="col-lg-3 col-md-6 img-responsive">
						<div class="card">
							<img class="card-img-top img-responsive" src="<?= base_url() ?>assets/images/big/dosen.jpg" alt="Card image cap">
							<div class="card-body">
								<h4 class="card-title">NAIK PANGKAT DALAM JABATAN YANG SAMA</h4>
								<button type="submit" class="btn btn-success waves-effect waves-light m-t-20" data-toggle="modal" data-target="#exampleModal4">Daftar</button>
							</div>
						</div>
					</div>
				<?php
				}
				?>
				<!-- column -->
			</div>
		</center>
		<!-- Row -->
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">SYARAT PENGANGKATAN AWAL</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url(); ?>usulan/usulan/create" method="post">

					<input type="hidden" name="id" value="1">
					<input type="hidden" name="no" value="1">
					<input type="hidden" value="1" name="jabatan_akhir_no">
					<input type="hidden" value="31" name="jabatan_no">
					<p class="card-text">• Ijazah S2/S3 atau yang setara</p>
					<p class="card-text">• 10 Angka Kredit diluar Ijazah (Tridharma)</p>
					<p class="card-text">• 1 Karya Ilmiah Pada Jurnal Ilmiah Nasional sbg Penulis Pertama/tunggal</p>
					<p class="card-text">• 1 Kegiatan Pengabdian Kepada Masyarakat</p>
					<p class="card-text">• Minimal 1 Tahun Melaksanakan Tugas Sbg Dosen</p>
					<p class="card-text">• Prestasi Kerja 1 Tahun Terakhir Minimal Bernilai Baik</p>
					<p class="card-text">• Persetujuan Senat Fakultas</p>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Masuk</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">SYARAT NAIK JABATAN REGULER</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url(); ?>usulan/usulan/create_naik_jab_reg" method="post">

					<input type="hidden" name="id" value="1">
					<input type="hidden" value="3" name="jabatan_akhir_no">
					<input type="hidden" value="<?= $jabatan_no ?>" name="jabatan_no">
					<p>
					<h5 class="modal-title" id="exampleModalLabel1">A. LEKTOR</h5>
					</p>
					<p class="card-text">• Paling kurang 2 (dua) tahun dalam jabatan terakhir (Asisten Ahli)</p>
					<p class="card-text">• Mencapai Angka Kredit yang dipersyaratkan (Kumulatif, Per Unsur Kegiatan)</p>
					<p class="card-text">• Memiliki Karya ilmiah pd jurnal ilmiah nasional sbg penulis pertama / tunggal</p>
					<p class="card-text">• Persetujuan Senat Fakultas</p>
					<hr>
					<p>
					<h5 class="modal-title" id="exampleModalLabel1">B. LEKTOR KEPALA</h5>
					</p>
					<p class="card-text">• Minimal telah 2 (dua) tahun dalam jabatan terakhir (Lektor)</p>
					<p class="card-text">• Mencapai Angka Kredit yang dipersyaratkan (Kumulatif, Per Unsur Kegiatan)</p>
					<p class="card-text">• S3/Doktor, Karya ilmiah pd jurnal ilmiah Nasional Terakreditasi atau internasional sbg penulis pertama/tunggal, S2/Magister,Karya ilmiah pd jurnal Internasional atau internasional bereputasi sbg penulis pertama/tunggal</p>
					<p class="card-text">• Persetujuan Senat Universitas</p>
					<p class="card-text">• Memiliki Sertifikat Pendidik</p>
					<hr>
					<p>
					<h5 class="modal-title" id="exampleModalLabel1">C. PROFESOR</h5>
					</p>
					<p class="card-text">• Ijazah Harus S3/Doktor/Setara, dan telah 3 (tiga) tahun</p>
					<p class="card-text">• Minimal telah 2 (dua) tahun dalam jabatan terakhir (Lektor Kepala)</p>
					<p class="card-text">• Minimal 10 Tahun Pengalaman Kerja sejak Dosen tetap</p>
					<p class="card-text">• Mencapai Angka Kredit yang dipersyaratkan (Kumulatif, Per Unsur Kegiatan)</p>
					<p class="card-text">• Karya ilmiah pd jurnal Internasional Bereputasi sbg penulis pertama</p>
					<p class="card-text">• Persetujuan Senat Universitas</p>
					<p class="card-text">• Memiliki Sertifikat Pendidik</p>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Masuk</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">SYARAT LONCAT JABATAN</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url(); ?>usulan/usulan/create_loncat_jab" method="post">

					<input type="hidden" name="id" value="1">
					<input type="hidden" value="<?= $jabatan_no ?>" name="jabatan_no">

					<p>
					<h5 class="modal-title" id="exampleModalLabel1">A. ASISTEN AHLI --> LEKTOR KEPALA</h5>
					</p>
					<p class="card-text">• Ijazah Harus S3/Doktor/Setara</p>
					<p class="card-text">• Minimal telah 2 (dua) tahun dalam jabatan terakhir (Asisten Ahli)</p>
					<p class="card-text">• Mencapai Angka Kredit yang dipersyaratkan (Kumulatif, Per Unsur Kegiatan)</p>
					<p class="card-text">• Minimal 2 (dua) Karya ilmiah pd jurnal Internasional Bereputasi sbg penulis Pertama</p>
					<p class="card-text">• Persetujuan Senat Universitas</p>
					<p class="card-text">• Memiliki Sertifikat Pendidik</p>
					<hr>
					<p>
					<h5 class="modal-title" id="exampleModalLabel1">B. LEKTOR --> PROFESOR</h5>
					</p>
					<p class="card-text">• Minimal telah 2 (dua) tahun dalam jabatan terakhir (Lektor)</p>
					<p class="card-text">• Telah 3 (tiga) Tahun Sejak Gelar Doktor</p>
					<p class="card-text">• Minimal 10 Tahun Pengalaman Kerja sebagai Dosen Tetap</p>
					<p class="card-text">• Mencapai Angka Kredit yang dipersyaratkan (Kumulatif, Per Unsur Kegiatan)</p>
					<p class="card-text">• Minimal 4 (empat) Karya ilmiah pd jurnal Internasional Bereputasi sbg penulis Pertama</p>
					<p class="card-text">• Persetujuan Senat Universitas</p>
					<p class="card-text">• Memiliki Sertifikat Pendidik</p>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Masuk</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">SYARAT NAIK PANGKAT DALAM JABATAN YANG SAMA</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url(); ?>usulan/usulan/create_naik_jab_sama" method="post">
					<input type="hidden" name="id" value="1">
					<input type="hidden" value="3" name="jabatan_akhir_no">
					<input type="hidden" value="<?= $jabatan_no ?>" name="jabatan_no">
					<p>
					<h5 class="modal-title" id="exampleModalLabel1">A. LEKTOR : Penata, III/c --> Penata Tk I, III/d</h5>
					</p>
					<p class="card-text">• Telah 2 (dua) Tahun dalam pangkat terakhir (III/c)</p>
					<p class="card-text">• Memenuhi Angka Kredit yang dipersyaratkan (Kumulatif, Per Unsur Kegiatan)</p>
					<p class="card-text">• Karya ilmiah pd jurnal nasional sbg penulis Pertama</p>
					<hr>
					<p>
					<h5 class="modal-title" id="exampleModalLabel1">B. LEKTOR KEPALA : Pembina, IV/a --> Pembina Tk I, IV/b --> Pembina Utama Muda, IV/c</h5>
					</p>
					<p class="card-text">• Telah 2 (dua) Tahun dalam pangkat terakhir (IV/a atau IV/b)</p>
					<p class="card-text">• Memenuhi Angka Kredit yang dipersyaratkan (Kumulatif, Per Unsur Kegiatan)</p>
					<p class="card-text">• Karya ilmiah pd jurnal nasional dan/ atau Internasional sbg penulis Pertama</p>
					<p>
					<h5 class="modal-title" id="exampleModalLabel1">C. PROFESOR : Pembina Utama Madya, IV/d --> Pembina Utama, IV/e</h5>
					</p>
					<p class="card-text">• Telah 2 (dua) Tahun dalam pangkat terakhir (IV/d)</p>
					<p class="card-text">• Memenuhi Angka Kredit yang dipersyaratkan (Kumulatif, Per Unsur Kegiatan)</p>
					<p class="card-text">• Karya ilmiah pd jurnal nasional terakreditasi dikti sbg penulis Pertama</p>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Masuk</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>