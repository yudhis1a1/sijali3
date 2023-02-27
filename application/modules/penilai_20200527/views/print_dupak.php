<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRINT DUPAK | LLDikti Wilayah III</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Favicon -->
    <link type="image/x-icon" href="<?= base_url()?>assets/images/favicon.ico" rel="shortcut icon">
    <link rel="canonical" href="" itemprop="url">
    
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/vali-admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/vali-admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/semantic/css/tables.css">
    <!-- Semantic UI CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/semantic/semantic.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/semantic/fontawesome-5.1.1/css/all.css" crossorigin="anonymous">
    <script src="<?= base_url()?>assets/vali-admin/js/jquery-3.2.1.min.js"></script>
	
	
  </head>
  <body class="app sidebar-mini rtl pace-done sidenav-toggled">
    <main class="app-content">
      <div class="bs-component">
        <div class="tab-content" id="myTabContent">
          <div class="ui tab-pane fade active show" id="first">
		
<!---------------------------batas awal konten-------------------------------------------->
<div class="row">
  <div class="col-md-12">
      <div class="tile">

      	<h3 class="text-center">DAFTAR USUL PENETAPAN ANGKA KREDIT<br>JABATAN AKADEMIK DOSEN
</h3>

      	<div class="clearfix">&nbsp;</div>
		<?php
		date_default_timezone_set('Asia/Jakarta');
		$query_dosens="SELECT
						  b.`no`,
						  b.`nama`,
						  b.`jk`,
						  b.`karpeg`,
						  b.`lahir_tempat`,
						  b.`lahir_tgl`,
						  b.`gelar_belakang`,
						  b.`nip`,
						  b.`nidn`,
						  a.`tmt_tahun`,
						  a.`tmt_bulan`,
						  c.`nama_prodi`,
						  d.`nama_instansi`
						FROM
						  usulans AS a,
						  dosens AS b,
						  `prodis` AS c,
						  `instansis` AS d
						WHERE a.`no` = '$no_usulan'
						AND a.`dosen_no`=b.`no`
						AND b.`prodi_kode`=c.`kode`
						AND c.`instansi_kode`=d.`kode`";
		$data_dos=mysqli_query($koneksi,$query_dosens);
		$row_dos=mysqli_fetch_array($data_dos);
		
		$tgl_lahir=$row_dos['lahir_tgl'];
		$tgl_ok=date_create($tgl_lahir);
		$tgl= date_format($tgl_ok, 'd F Y');
		?>
		<div class="row">
      		<div class="col-md-6">
      			INSTANSI : <strong><?=$row_dos['nama_instansi']?></strong>
      		</div>
      		<div class="col-md-6">
      			<strong>MASA PENILAIAN :</strong>
      			<br> s/d 
      		</div>
      	</div>
		
      	<div class="table-responsive">
      		<table id="table-header" class="cust-table cust-table-bordered">

      			<col width="30"/>
				<col width="150" />
				<col width="350"/>

      			<tbody>
      				<tr class="text-center">
      					<th class="text-center">NO</th>
      					<th colspan="2" class="text-center">KETERANGAN PERORANGAN</th>
      				</tr>
      				<tr>
      					<td class="text-center">1</td>
      					<td>Nama</td>
      					<td><?=$row_dos['nama']?>, <?=$row_dos['gelar_belakang']?></td>
      				</tr>
      				<tr>
      					<td class="text-center">2</td>
      					<td>NIP/NIK/NIDN</td>
      					<td><?=$row_dos['nip']?> / <?=$row_dos['nidn']?></td>
      				</tr>
      				<tr>
      					<td class="text-center">3</td>
      					<td>Nomor Seri Kartu Pegawai</td>
      					<td> <?=$row_dos['karpeg']?></td>
      				</tr>
      				<tr>
      					<td class="text-center">4</td>
      					<td>Tempat dan Tanggal Lahir</td>
      					<td><?=$row_dos['lahir_tempat']?>, <?=$tgl?></td>
      				</tr>
      				<tr>
      					<td class="text-center">5</td>
      					<td>Jenis Kelamin</td>
      					<td>
						<?php
						if($row_dos['jk']=='L')
						{
							echo'Laki-laki';
						}else
						{
							echo'Perempuan';
						}
						?>
						</td>
      				</tr>
      				<tr>
      					<td class="text-center">6</td>
      					<td>Pendidikan Yang Diperhitungkan Angka Kreditnya</td>
      					<td>{{$data->jenjang->nama}} {{$data->bidang->nama}}</td>
      				</tr>
					<?php
					$q_cari_jab="SELECT
								  a.`no`,
								  c.`nama_jabatans`,
								  d.`nama_jenjang`,
								  a.`jabatan_tgl`
								FROM
								  dosens AS a,
								  `jabatan_jenjangs` AS b,
								  `jabatans` AS c,
								  `jenjangs` AS d
								WHERE a.`no` = '$row_dos[no]'
								  AND a.`jabatan_no` = b.`no`
								  AND b.`jabatan_kode`=c.`kode`
								  AND b.`jenjang_id`=d.`id`";
					$dq_cari_jab=mysqli_query($koneksi,$q_cari_jab);
					$rdq_cari_jab=mysqli_fetch_array($dq_cari_jab);
					?>
      				<tr>
      					<td class="text-center">7</td>
      					<td>Jabatan Akademik Dosen/TMT</td>
      					<td><?=$rdq_cari_jab['nama_jabatans']?>, <?=$rdq_cari_jab['jabatan_tgl']?></td>
      				</tr>
      				<tr>
      					<td class="text-center">8</td>
      					<td>Masa Kerja Golongan Lama</td>
      					<td><?=$row_dos['tmt_tahun']?> Tahun <?=$row_dos['tmt_tahun']?> Bulan</td>
      				</tr>
      				<tr>
      					<td class="text-center">9</td>
      					<td>Masa Kerja Golongan Baru</td>
      					<td></td>
      				</tr>
      				<tr>
      					<td class="text-center">10</td>
      					<td>Unit Kerja</td>
      					<td>Program Studi <?=$row_dos['nama_prodi']?> Pada <?=$row_dos['nama_instansi']?></td>
      				</tr>
      			</tbody>
      		</table>
      	</div>

            <div class="clearfix">&nbsp;</div>

            <div class="table-responsive">
                <table id="table-bidang" class="cust-table cust-table-bordered">

                <col width="30" span="5" />
				<col width="309" />
				<col width="61" span="2" />
				<col width="75" />
				<col width="61" span="2" />
				<col width="75" />
				<col width="88" />

                <thead>
                  <tr class="text-center">
					<th rowspan="4" class="text-center" style="vertical-align: middle;">NO.</th>
					<th colspan="11" class="text-center">UNSUR YANG DINILAI</th>
					<th rowspan="4" class="text-center" style="vertical-align: middle;">
                    KET
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
				<?php include "print_dupak_total_a.php"; ?>
				<?php include "print_dupak_total_b.php"; ?>
				<?php include "print_dupak_total_c.php"; ?>
				<?php include "print_dupak_total_d.php"; ?>
				
				<?php
					$sql_total="SELECT
									SUM(`kum_usulan_lama`) AS kum_lama,
									SUM(`kum_usulan_baru`) AS kum_baru,
									SUM(`kum_penilai_lama`) AS kum_penilai_lama,
									SUM(`kum_penilai_baru`) AS kum_penilai_baru
								FROM
									usulan_dupaks
								WHERE usulan_no = '$no_usulan'";
					$data_total=mysqli_query($koneksi,$sql_total);
					$data_kum_total=mysqli_fetch_array($data_total);
					$jmlah_kum=$data_kum_total['kum_lama']+$data_kum_total['kum_baru'];
					$jmlah_kum_penilai=$data_kum_total['kum_penilai_lama']+$data_kum_total['kum_penilai_baru'];
				?>
				<tbody>
				<tr style="background-color: #e4e4e4; font-weight: bold;">
				<td colspan="6" class="text-right"><b>TOTAL (UNSUR UTAMA + UNSUR PENUNJANG)</b></td>
				<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_lama']?></td>
				<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_baru']?></td>
				<td style="vertical-align: middle;" class="text-center"><?=$jmlah_kum?></td>
				<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_penilai_lama']?></td>
				<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_penilai_baru']?></td>
				<td style="vertical-align: middle;" class="text-center"><?=$jmlah_kum_penilai?></td>
				<td></td>
				</tbody>
				</tr>
			</table>
            </div>

            <div class="clearfix">&nbsp;</div>

            <div class="table-responsive">
      		<table id="table-header" class="cust-table cust-table-bordered">

      			<col width="30"/>
				<col width="350" />
				<col width="350"/>

      			<tbody>
      				<tr>
      					<th class="text-center">VI</th>
      					<th colspan="2">LAMPIRAN PENDUKUNG DUPAK :</th>
      				</tr>
      				<tr>
      					<td class="text-center"></td>
      					<td>
      						<ol>
      							<li>Surat Pernyataan Telah Melaksanakan Kegiatan Pendidikan</li>
      							<li>Surat Pernyataan Telah Melakukan Kegiatan Pengajaran</li>
      							<li>Surat Pernyataan Telah Melakukan Kegiatan Penelitian</li>
      							<li>Surat Pernyataan Telah Melakukan Kegiatan Pengabdian Kepada Masyarakat</li>
      							<li>Surat Pernyataan Melakukan Kegiatan Penunjang</li>
      						</ol>
      					</td>
						<?php
						$query_pimpinan="SELECT
										  a.`pimpinan_nama`,
										  a.`pimpinan_nip`,
										  a.`pimpinan_nidn`,
										  b.`nama`,
										  b.`kode_gol`,
										  a.`pimpinan_jabatan`,
										  a.`pimpinan_unit_kerja`
										FROM
										  usulans AS a,
										  `golongans` AS b
										WHERE a.`no` = '$no_usulan'
										AND a.`pimpinan_golongan_kode`=b.`kode`";
						$data_pim=mysqli_query($koneksi,$query_pimpinan);
						$row_pim=mysqli_fetch_array($data_pim);
						?>
      					<td class="text-center">
      						<br>&nbsp;<br>&nbsp;<br>&nbsp;
      						<strong><?=$row_pim['pimpinan_jabatan']?> <?=$row_pim['pimpinan_unit_kerja']?></strong>
      						<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
      						<strong><?=$row_pim['pimpinan_nama']?></strong>
      						<br>NIP/NIK.<?=$row_pim['pimpinan_nip']?> 
      					</td>
      				</tr>
      				<tr>
      					<th class="text-center">VII</th>
      					<th colspan="2">Catatan Pejabat Pengusul :</th>
      				</tr>
      				<tr>
      					<td class="text-center"></td>
      					<td>
      						&nbsp;
      					</td>
      					<td class="text-center">
      						<br>&nbsp;<br>&nbsp;<br>&nbsp;
      						<strong>Rektor <?=$row_dos['nama_instansi']?></strong>
      						<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
      						(
      						 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      						 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							)
      						<br>NIP/NIK.
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</td>
      				</tr>
      				<tr>
      					<th class="text-center">VIII</th>
      					<th colspan="2">Catatan Anggota Tim Penilai :</th>
      				</tr>
      				<tr>
      					<td class="text-center"></td>
      					<td>
      						&nbsp;
      					</td>
      					<td class="text-center">
      						<strong>Anggota Tim Penilai 1</strong>
      						<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
      						(
      						 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      						 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							)
      						<br>NIP/NIDN.
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							<br>&nbsp;<br>&nbsp;
							<strong>Anggota Tim Penilai 2</strong>
      						<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
      						(
      						 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      						 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							)
      						<br>NIP/NIDN.
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      					</td>
      				</tr>
      				<tr>
      					<th class="text-center">IX</th>
      					<th colspan="2">Catatan Ketua Tim Penilai :</th>
      				</tr>
      				<tr>
      					<td class="text-center"></td>
      					<td>
      						&nbsp;
      					</td>
      					<td class="text-center">
      						<strong>Ketua Tim Penilai 1</strong>
      						<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
      						(
      						 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      						 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							)
      						<br>NIP/NIDN.
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      					</td>
      				</tr>
      			</tbody>
      		</table>
      	</div>
      </div>
  </div>
</div>
<!---------------------------batas akhir konten-------------------------------------------->

         </div>
        </div>
      </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url()?>assets/vali-admin/js/popper.min.js"></script>
    <script src="<?= base_url()?>assets/vali-admin/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/vali-admin/js/plugins/sweetalert.min.js"></script>
    <script src="<?= base_url()?>assets/vali-admin/js/plugins/bootstrap-notify.min.js"></script>
    <script src="<?= base_url()?>assets/vali-admin/js/main.js"></script>

    <!-- Semantic UI Plugin -->
    <script type="text/javascript" src="<?= base_url()?>assets/semantic/semantic.min.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url()?>assets/vali-admin/js/plugins/pace.min.js"></script>

   </body>
</html>