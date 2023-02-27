<?php 
error_reporting(0);
if($usulan->jabatan_usulan_no =='6'||$usulan->jabatan_usulan_no =='3'){
}
include "koneksi.php";
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
						<td><?= $q_dupak->kum_usulan_lama;?></td>
						<td><?= $q_dupak->kum_usulan_baru;?></td>
						<td><?= $q_dupak->kum_usulan_lama + $q_dupak->kum_usulan_baru ;?></td>
					</tr>
					
					<tr class="text-center">
						<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){echo "<td></td><td></td>";}else{ ?>
						<td>
							<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#edit"  class="btn btn-warning"><i class="fa fa-edit"> EDIT</i>
							</a>
						</td>
						<td>
							<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah"  class="btn btn-success"><i class="fa fa-plus-square"> TAMBAH</i>
							</a>
						</td>
						<?php } ?>
						<td></td>
					</tr>
					
				</tbody>
		</table>
	</div>
	
	<?php
	if($q2->row() > 0)
	{	
	?>
	<div class="card-body">
		<div class="tile">
            <h3>Usulan Baru Untuk Penilaian</h3>
		</div>
		<table border="1" class="ui celled table" width="100%">
			<?php 
			$q_thn="SELECT
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
					  berkas
					FROM
					  `usulan_dupak_details`
					WHERE usulan_no = '$q_dupak->usulan_no'
					  AND `dupak_no` = '$q_dupak->dupak_no'
					  GROUP BY `berkas`";
			$data_thn=mysqli_query($koneksi,$q_thn);
			while($row_thn=mysqli_fetch_array($data_thn))
			{
			?>
		<tr style="background-color: #e4e4e4; font-weight: bold;">
			<td colspan='4'>Semester <?=$row_thn['semester']?> <?=$row_thn['tahun_akademik']?>/<?=$row_thn['thn_akademik_baru']?>
			</td>
		</tr>
		<tr style="background-color: #e4e4e4;">
			<td>Tanggal : <?=$row_thn['tgl']?>
			</td>
			<td>Bukti Fisik : <a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row_thn['berkas']?>" class="btn  btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a>
			</td>
			<?php
			$total_sks=0;
			$q1="SELECT
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
			$data_q1=mysqli_query($koneksi,$q1);
			while($row_q1=mysqli_fetch_array($data_q1))
			{$total_sks+=$row_q1['total_sks'];} 
			
			if($total_sks<11)
			{
				$ak=$total_sks/2;
			}elseif ($total_sks<12)
			{
				$ak=(10*0.5)+(($total_sks-10)*0.25);
			}else
			{
				$ak=5.5;
			}
			?>
			<td style="background-color: #e4e4e4; font-weight: bold;">
			Angka Kredit : <?=$ak?> 
			</td>
			<td>
			<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
			<a href="<?= base_url()?>usulan/usulan_dupak/hapus_a0004/<?=$row_thn['NO']?>/<?=$row_thn['usulan_no']?>/<?=$row_thn['berkas']?>/<?=$row_thn['semester']?>/<?=$row_thn['tahun_akademik']?>" class="btn tombol-hapus btn-danger" >Hapus
			<i class="fa fa-trash-o"></i></a>
			<?php } ?>
			</td>
		</tr>
		<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
			<th>Mata Kuliah</th>
			<th>SKS/MTK</th>
			<th>Jumlah Volume Kegiatan</th>
			<th>Total SKS</th>
		</tr>
			<tbody>
		    <?php 
			// foreach($q5->result() as $row){
			$q_detail="SELECT
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
			$data_detail=mysqli_query($koneksi,$q_detail);
			while($row=mysqli_fetch_array($data_detail))
			{
			?>
			<tr class="text-center">
			<td><?=$row['uraian']?></td>
				<td><?=$row['sks']?></td>
				<td><?=$row['jumlah_volume']?></td>
				<td><?=$row['total_sks']?></td>
			</tr>
			<?php
			}
			}
			?>
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
			<a href="<?= base_url()?>usulan/usulan/bidangA/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
		</div>
    </div>
	</div>
	</div>
</div>

<!-- Modal Tambah-->
<?php
date_default_timezone_set('Asia/Jakarta');
$no_usulan_dupak_details=date("ymdHis").'01';
?>
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="tambah" >
	<div class="modal-dialog modal-lg text-justify">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak/tambah_a0004/A0004/200" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>BIDANG A</h3>
				<b>Melaksanakan Perkulihan/Tutorial & Membimbing, Menguji Serta Menyelenggarakan Pendidikan di Laboratorium, Praktek Keguruan Bengkel/Studio/Kebun</b><br>
				Melaksanakan Perkulihan/Tutorial & Membimbing, Menguji Serta Menyelenggarakan Pendidikan di Laboratorium, Praktik Keguruan Bengkel/Studio/Kebun Pada Fakultas/Sekolah Tinggi/Akademi/ Politeknik Sendiri, Pada Fakultas Lain Dalam Lingkungan Universitas/Institut Sendiri, maupun di Luar Perguruan Tinggi Sendiri Secara Melembaga Paling Banyak 12 SKS/Semester
                <hr>
				<div class="row">
				<?php
					$nidn="SELECT a.no, a.dosen_no, b.nidn	
							FROM usulans AS a, dosens AS b 
							WHERE a.dosen_no = b.no  AND a.no = '$no'";
					$da_nidn=mysqli_query($koneksi,$nidn);
					$r_nidn=mysqli_fetch_array($da_nidn);
					?>
				 <div class="table-responsive">
				  <table class="table color-table info-table" width="100%">
					<?php 
					$q_thn="SELECT * FROM `ajar_dosen` where NIDN='$r_nidn[nidn]' GROUP BY SEMESTER ORDER BY SEMESTER ASC";
					$data_thn=mysqli_query($koneksi,$q_thn);
					while($row_thn=mysqli_fetch_array($data_thn))
					{
					?>
				<thead>	
				<tr style="font-weight: bold;">
					<th>
						Semester <?=$row_thn['SEMESTER']?> <input type="text" name="semester" value="<?=$row_thn['SEMESTER']?>"><input type="text" name="no_usulan" value="<?= $no; ?>">
					</th>
					<th colspan='2'>
					<?php if($row_thn['BERKAS'] ==''){ ?> 
					Upload SK :
					<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah<?=$row_thn['SEMESTER']?>"  class="btn btn-danger"><i class="fa  fa-cloud-upload"></i> Upload</a> 
					<?php }else{ ?> 
					Download SK :
					<a href="<?= base_url()?>usulan/usulan/download_matkul/<?=$row_thn['BERKAS']?>" class="btn  btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a> <input type="text" name="berkas" value="<?=$row_thn['BERKAS']?>">
					<?php } ?>
					</th>
				</tr>
				<tr style="font-weight: bold;" class="text-center">
					<th>Mata Kuliah</th>
					<th>SKS/Mata Kuliah</th>
					<th>Volume</th>
				</tr>
				</thead>
					<tbody>
					<?php 
					$q_detail="SELECT *
							FROM `ajar_dosen`
							WHERE semester = '$row_thn[SEMESTER]'
							AND NIDN='$r_nidn[nidn]' 
							GROUP BY KODEMK";
					$data_detail=mysqli_query($koneksi,$q_detail);
					while($row=mysqli_fetch_array($data_detail))
					{
					?>
					<tr class="text-center">
						<td><?=$row['NMMK']?><input type="text" name="uraian[]" value="<?=$row['NMMK']?>"></td>
						<td><input type="number" min="1" name="sks[]" style="width:70px;" ></td>
						<td><input type="number" min="1" name="jumlah_volume[]" style="width:70px;" ><input type="text" name="no_usulan_detail[]"  value="<?=$no_usulan_dupak_details?>"></td>
					</tr>
					<?php
					$no_usulan_dupak_details++;
					}
					?>
					<tr>
						<td colspan="3">
						<center>
						<button type="submit" class="btn btn-primary">SIMPAN</button>
						</center>
						</td>
					</tr>
					<tr>
						<td colspan="3"></td>
					</tr>
					<?php
					}
					?>
					</tbody>
				</table>
				</div>
                </div>
		</div>
		</form>
	</div>
</div>
</div>

	


