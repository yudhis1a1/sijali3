<?php 
 error_reporting(0);
if($usulan->jabatan_usulan_no =='6'||$usulan->jabatan_usulan_no =='3'){
	$kum="2";
}
$kum="2";
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
					<b>Membimbing & Ikut Membimbing Dalam Menghasilkan Disertasi, Thesis, Skripsi & Laporan Akhir Studi</b><br>
			Pembimbing Pendamping Thesis
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
				
			<?php if($usulan_status_id=='3'){ ?>
					<tr >
					<form  method="post" action="<?= base_url()?>ketenagaan/ketenagaan/catatanPTK/<?php echo $dasar->no; ?>" role="form" enctype="multipart/form-data">               
                  <td colspan="5">
				 
				  <input type="hidden" class="form-control" value="A0012" name="bidang" readonly>
				  <input type="hidden" class="form-control" value="<?php echo $usulan_status_id ?>" name="statusnya" readonly>
     			  <input type="hidden" class="form-control" value="<?php echo $dasar->no; ?>" name="no_usulan" readonly> 
                    Catatan:
                    <textarea name="keterangan_ptk" class="form-control"  rows="3" required="requiered"></textarea>
                  </td>
                  <td  class="text-center">   				           
					<button type="submit" class="btn btn-success" name="btnSub"><i class="fa fa-comment"></i> Tambah Catatan</button>
				  </td>
				</form>
             	 </tr>
				<?php } ?>
					
				</tbody>
		</table>
	</div>
	
	<?php
	
	if($q3->row() > 0)
	{	
	?>
	<div class="card-body">
		<div class="tile">
            <h3>Usulan Baru Untuk Penilaian</h3>
		</div>
		<table border="1" class="ui celled table" width="100%">
		<?php 
		// foreach($q4->result() as $data)
		// {
		
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
			<td colspan='3'>Semester <?=$row_thn['semester']?> <?=$row_thn['tahun_akademik']?>/<?=$row_thn['thn_akademik_baru']?>
			</td>
			<td>
			<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>		
			<a href="<?= base_url()?>ketenagaan/usulan_dupak/hapus_a0007/<?=$row_thn['NO']?>/<?=$row_thn['usulan_no']?>/<?=$row_thn['berkas']?>/<?=$row_thn['semester']?>/<?=$row_thn['tahun_akademik']?>/A0012/<?=$kum?>" class="btn btn-danger tombol-hapus"> Hapus
			<i class="fa fa-trash-o"></i></a>
			<?php } ?>
			</td>
		</tr>
		<tr style="background-color: #e4e4e4;">
			<td>Uraian : <?=$row_thn['uraian']?>
			</td>
			<td>Tanggal : <?=$row_thn['tgl']?>
			</td>
			<td>Bukti Fisik : <a href="<?= base_url()?>ketenagaan/usulan_dupak/download_bidanga/<?=$row_thn['berkas']?>" class="btn  btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a>
			</td>
			<?php
			$q_ak="SELECT
					COUNT(dupak_no) as jml_mhs
				  FROM
					`usulan_dupak_details`
				  WHERE usulan_no = '$q_dupak->usulan_no'
				  AND `dupak_no` = '$q_dupak->dupak_no'
				  AND semester = '$row_thn[semester]'
				  AND tahun_akademik = '$row_thn[tahun_akademik]'";
			$d_ak=mysqli_query($koneksi,$q_ak);
			$r_ak=mysqli_fetch_array($d_ak);
			$ak=$r_ak['jml_mhs']*$kum;
			?>
			
			<td style="background-color: #e4e4e4; font-weight: bold;">
			Angka Kredit : <?=$ak?>
			</td>
		</tr>
		<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
			<th>NIM</th>
			<th colspan='3'>Nama Mahasiswa</th>
		</tr>
			<tbody>
			<?php 
			// foreach($q5->result() as $row){
			$q_detail="SELECT
					  usulan_no,
					  NO,
					  `uraian`,
					  `semester`,
					  nim,
					  nm_mhs,
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
					  AND semester = '$row_thn[semester]'
					  AND tahun_akademik = '$row_thn[tahun_akademik]'";
			$data_detail=mysqli_query($koneksi,$q_detail);
			while($row=mysqli_fetch_array($data_detail))
			{
			?>
				<tr class="text-center">
					<td><?=$row['nim']?></td>
					<td colspan='3'><?=$row['nm_mhs']?></td>
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
			
  		   <a href="<?= base_url()?>ketenagaan/ketenagaan/show/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
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
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url()?>ketenagaan/usulan_dupak/tambah_a0007/A0012/<?= $kum ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>BIDANG A</h3>
				<b>Membimbing & Ikut Membimbing Dalam Menghasilkan Disertasi, Thesis, Skripsi & Laporan Akhir Studi</b><br>
			Pembimbing Pendamping Thesis
			<hr>
				<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label for="uraian">Uraian Kegiatan</label>
					<textarea name="uraian" class="form-control" rows="2" maxlength="255"></textarea>
					</div>
                </div>
				</div>
				<div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="semester">Semester</label><br>
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
							<br><input type="hidden" name="no_usulan" value="<?=$no?>">
						</div>
                    </div>
                  </div>
				  <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl">Satuan Hasil</label>
                        <div class="input-group">
						<input type="text" name="satuan_hasil" class="form-control"  required>
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
				  <button type="button"  id="btn_tambah_form_mhs"  class="btn btn-success"><i class="fa fa-plus-square">Tambah Data</i></button>
                  <button type="button" id="btn_reset_form_mhs" class="btn btn-danger"><i class="fa fa-plus-square"> Reset</i></button>
                </div>
				<h4>Data Mahasiswa ke 1 :</h4>
				<table id="table-data" class="ui celled table" >
					<tr>
						<td>NIM :</td> 
						<td>
						<input type="number" name="nim[]" style="width:500px;" required>
						<input type="hidden" name="no_usulan_detail[]" id="no_usulan_detail" value="<?=$no_usulan_dupak_details?>">
						</td>
					 </tr>
					<tr>
						<td>Nama Mahasiswa : </td> 
						<td>
						<input type="text" name="mhs[]" style="width:500px;" required>
						</td>
					 </tr>
				</table>
				<div  id="insert_form_mhs"></div>
			 </div>

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
			<!-- Kita buat textbox untuk menampung jumlah data form -->
			<input type="hidden" id="jumlah-form" name="jumlah-form" value="1">
			<input type="hidden" id="sf" name="sf" value="6">
			<input type="hidden" id="kali" name="kali" value="2">
		</form>
		
	</div>
</div>
</div>

<!-- Modal Edit-->
<?php foreach($q3->result() as $row){?>
	<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="edit<?=$row->no;?>" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="pages/usulan/bidang_a/A0007/update_A0007.php" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>BIDANG A</h3>
				<b>Membimbing & Ikut Membimbing Dalam Menghasilkan Disertasi, Thesis, Skripsi & Laporan Akhir Studi</b><br>
				Pembimbing Utama Disertasi
                <hr>

                <div class="form-group">
                  <label for="uraian">Uraian Kegiatan</label>
                  <textarea name="uraian" class="form-control" id="uraian" rows="2" required><?=$row->uraian?></textarea>
				  <input type="hidden" name="no_usulan" value="<?=$no?>"required>
				  <input type="hidden" name="no_usulan_dupak_details" value="<?=$row->no?>"required>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="semester">Semester</label><br>
                      <select name="semester" class="form-control select2"  style="width: 100%; " id="semester" required>
                          <?php
							if($row->semester='Ganjil')
							{
						  ?>
							<option value="Ganjil">Ganjil</option>
							<option value="Genap">Genap</option>
                          <?php
						    }else
							{
						   ?>
						    <option value="Genap">Genap</option>
							<option value="Ganjil">Ganjil</option>
						  <?php	
							}
						  ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tahun_akademik">Tahun Dasar Akademik</label>
                      <select name="thn_akademik" class="form-control select2"  style="width: 100%;" id="thn_akademik" required>
                          <?php
							if($row->tahun_akademik=='2015')
							{
						  ?>
							<option value="2015" selected>2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
                          <?php
						    }
							elseif($row->tahun_akademik=='2016')
							{
						   ?>
						    <option value="2015">2015</option>
							<option value="2016" selected>2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
						  <?php	
							}
							elseif($row->tahun_akademik=='2017')
							{
						  ?>
                          <option value="2016">2016</option>
                          <option value="2017" selected>2017</option>
                          <option value="2018">2018</option>
						  <option value="2019">2019</option>
						  <?php
							}
							elseif($row->tahun_akademik=='2018')
							{
							?>
						    <option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018" selected>2018</option>
							<option value="2019">2019</option>
						  <?php	
							}else
							{
						  ?>
						    <option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018" >2018</option>
							<option value="2019" selected>2019</option>
						  <?php	
							}
							?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <div class="input-group date">
                            <input type="date" name="tgl" value="<?=$row->tgl?>" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd"required>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="satuan_hasil">Satuan Hasil</label>
                      <input type="text" name="satuan_hasil" value="<?=$row->satuan_hasil?>"  class="form-control" id="satuan_hasil" maxlength="150" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="jumlah_volume">Jumlah Volume Kegiatan</label>
                        <input type="number" step="any" name="jumlah_volume" value="<?=$row->jumlah_volume?>" class="form-control" id="jumlah_volume"  min="0" required>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="angka_kredit">Angka Kredit</label>
                        <input type="number" step="any" value="<?=$row->kum_usulan?>" name="angka_kredit" class="form-control" id="angka_kredit" min="0" >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"><?=$row->keterangan?></textarea>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="url">URL</label>
                      <input type="text" name="url" value="<?=$row->url?>" class="form-control" id="url" maxlength="150">
                    </div>
                    <div class="form-group">
                      <label for="url_index">URL Index</label>
                      <input type="text" name="url_index" value="<?=$row->url_index?>" class="form-control" id="url_index"  maxlength="150">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Berkas Upload
					  </label>
                      <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                      <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                    </div>
                  </div>
                </div>
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
<?php } ?>

