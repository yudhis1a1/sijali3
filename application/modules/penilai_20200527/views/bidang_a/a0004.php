<?php 
error_reporting(0);

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
						<th colspan="3">ANGKA KREDIT MENURUT PENILAI</th>
					</tr>
					<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
						<th>LAMA</th>
						<th>BARU</th>
						<th>JUMLAH</th>
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
						<td><?= $q_dupak->kum_penilai_lama;?></td>
						<td><?= $q_dupak->kum_penilai_baru;?></td>
						<td><?= $q_dupak->kum_penilai_lama + $q_dupak->kum_penilai_baru ;?></td>
					</tr>
				
					<tr class="text-center">
						<td></td>
						<td></td>
						<td></td>
						<td>
							
						</td>
						<td></td>
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
		<form method="post" action="<?= base_url()?>penilai/penilai_dupak/update_A0004/A0004" role="form" enctype="multipart/form-data">
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
					  berkas,
					  kum_penilai,
					  kum_penilai_keterangan
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
			<td colspan='4'>Semester <?=$row_thn['semester']?> <?=$row_thn['tahun_akademik']?>
			</td>
		</tr>
		<tr style="background-color: #e4e4e4;">
			<td>Tanggal : <?=$row_thn['tgl']?>
			</td>
			<td>Bukti Fisik : <a href="<?= base_url()?>penilai/penilai_dupak/download_bidanga/<?=$row_thn['berkas']?>" class="btn  btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a>
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
			
			if($jabatan_no=='43' || $jabatan_no=='44' || $jabatan_no=='46' || $jabatan_no=='47' || $jabatan_no=='48'|| $jabatan_no=='50'|| $jabatan_no=='51')
			{
			
				if($total_sks<11)
				{
					$ak=$total_sks;
				}elseif ($total_sks<12)
				{
					$ak=(10*1)+(($total_sks-10)*0.5);
				}else
				{
					$ak=11;
				}
			}elseif ($jabatan_no=='31' || $jabatan_no=='40' || $jabatan_no=='41')
			{
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
			}
			?>
			<td colspan="2" style="background-color: #e4e4e4; font-weight: bold;">
			<center>Angka Kredit : <?=$ak?> </center>
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
			$q_detail="SELECT
					  usulan_no,
					  kum_penilai,
					  berkas,
					  kunci,
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
			  if($row['kum_penilai']<>0)
			  {
				$cek="checked";
			  }else
			  {
				$cek="";
			  }
			  
			  if($row['kunci']=='1')
			  {
				$warna="#FFFF00";
			  }else
			  {
				$warna="#e3ffeb";
			  }
			}
			?>
			<?php
				$q_penilai="SELECT
							  a.`user_penilai_no`,
							  b.`nama`
							FROM
							  `usulans` AS a,
							  `users` AS b
							WHERE a.`user_penilai_no` = b.`no`
							AND a.`no`='$q_dupak->usulan_no'";
				$d_penilai=mysqli_query($koneksi,$q_penilai);
				$r_penilai=mysqli_fetch_array($d_penilai);
				?>
				<tr style="background-color: <?=$warna?>; font-weight: bold;">
                  <td>
                    FORM PENILAIAN:
                    <br><i>Dilakukan penilaian oleh <?=$r_penilai['nama']?> 
					<input type="hidden" name="user_penilai_no[]" value=<?=$r_penilai['user_penilai_no']?>>
                    <input type="hidden" name="berkas[]" value=<?=$row_thn['berkas']?>>
					<input type="hidden" name="sms[]" value=<?=$row_thn['semester']?>,<?=$row_thn['tahun_akademik']?>>
					<input type="hidden" name="no_usulan" value=<?=$q_dupak->usulan_no?>>
				  </td>
                  <td colspan="2">
                    KETERANGAN:
                    <textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?=$row_thn['kum_penilai_keterangan']?></textarea>
                  </td>
				  <td style="min-width: 50px">
                    PENILAIAN<br>TIM PENILAI:<br>
					<input type="checkbox" name="kum_penilai[]" value="<?=$ak?>,<?=$row_thn['semester']?>,<?=$row_thn['tahun_akademik']?>"  <?=$cek?>>
					<label class="custom-control-label" for="customCheck1">diterima </label>
			     </td>
                 </tr>
			<?php
			}
			?>
			</tbody>
		</table>
		<?php if($usulan_status_id<>'5'){}else{ ?>
		<center>
		<a href="<?=base_url()?>penilai/penilai_dupak/hapus_a0004/<?=$q_dupak->dupak_no?>/<?=$q_dupak->usulan_no?>" class="btn btn-danger">
		RESET PENILAIAN
		</a>&nbsp;&nbsp;&nbsp;
		<button type="submit" class="btn btn-success">SIMPAN PENILAIAN</button>
		</center>
		<?php } ?>
		</form>
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
			<a href="<?= base_url()?>penilai/penilai/bidangA/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
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
		<form method="post" action="<?= base_url()?>penilai/penilai_dupak/tambah_a0004/A0004/200" role="form" enctype="multipart/form-data">
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
						<td>uraian </td>
						<td>
						<input type="text" name="uraian[ ]" required>
						<input type="hidden" name="no_usulan_detail[ ]" id="no_usulan_detail" value="<?=$no_usulan_dupak_details?>">
						</td>
					    <td>satuan hasil</td><td><input type="text" name="satuan_hasil[ ]" required></td>
					</tr>
					<tr>
						<td>SKS/mtk</td>
						<td><input type="number" id="txt1"  onkeyup="sum();" name="sks[ ]" required></td>
						<td>volume</td>  
						<td><input type="number" id="txt2"  onkeyup="sum();"  name="jumlah_volume[ ]" required></td>
					</tr>
					<tr>
						<td>keterangan  </td>
						<td><textarea name="keterangan[ ]" required></textarea></td>
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

	


