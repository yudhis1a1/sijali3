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
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="semester">Semester</label><br>
											<input type="hidden" name="no_usulan" value="<?= $no; ?>"required>
                      <select name="semester" class="form-control select2"  style="width: 100%; " id="semester" data-placeholder="Click to Choose..." required>
                          <option value=""></option>
                          <option value="Ganjil">Ganjil</option>
                          <option value="Genap">Genap</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tahun_akademik">Tahun Dasar Akademik</label>
                      <select name="thn_akademik" class="form-control select2"  style="width: 100%;" id="thn_akademik" data-placeholder="Click to Choose..." required>
                          <option value=""></option>
						  <option value="2014">2014</option>
						  <option value="2015">2015</option>
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
						  <option value="2019">2019</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <div class="input-group date">
                            <input type="date" name="tgl" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd"required>
							<br>
                        </div>
                    </div>
                  </div>
				  <div class="col-md-6">
                    <div class="form-group">
                      <label for="berkas">Berkas Upload</label>
                      <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                      <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                    </div>
                  </div>
                </div>
				<div class="form-group">
				  <button type="button"  id="btn-tambah-form"  class="btn btn-success"><i class="fa fa-plus-square">Tambah Data</i></button>
                  <button type="button" id="btn-reset-form" class="btn btn-danger"><i class="fa fa-plus-square"> Reset</i></button>
                </div>
				<h4>Data Mata Kuliah ke 1 :</h4>
				<table id="table-data" class="ui celled table" >
					<tr>
						<td>Matakuliah </td>
						<td>
						<input type="text" name="uraian[ ]" required>
						<input type="hidden" name="no_usulan_detail[ ]" id="no_usulan_detail" value="<?=$no_usulan_dupak_details?>">
						</td>
					    <td>satuan hasil</td><td><input type="text" name="satuan_hasil[ ]" size="10" required></td>
					</tr>
					<tr>
						<td>SKS/mtk</td>
						<td><input type="number" id="txt1"  onkeyup="sum();" name="sks[ ]" required></td>
						<td>volume</td>  
						<td><input type="number" id="txt2"  onkeyup="sum();" size="5"  name="jumlah_volume[ ]" required></td>
					</tr>
				</table>
				
				
				<div  id="insert-form"></div>
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

	


