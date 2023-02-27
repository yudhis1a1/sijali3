<?php 
 error_reporting(0);

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
			Pembimbing Utama Laporan Akhir Studi
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
        <table border="1" class="cust-table cust-table-bordered" width="100%">
				<thead>
					<tr style="background-color: #c4e5f6; font-weight: bold;" class="text-center">
						<th colspan="3">ANGKA KREDIT MENURUT INSTANSI PENGUSUL</th>
						<th colspan="3">ANGKA KREDIT MENURUT TIM PENILAI</th>
					</tr>
					<tr style="background-color: #c4e5f6; font-weight: bold;" class="text-center">
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
				
				
				</tbody>
		</table>
	</div>
	
	<?php
	
	if($q3->row() > 0)
	{	
	?>
	<div class="card-body">
		<div class="tile">
            <h3>Usulan Baru/ Belum Dikunci Untuk Penilaian</h3>
		</div>
		<table border="1" class="cust-table cust-table-bordered" width="100%">
			<thead>
				<tr style="background-color: #c4e5f6; font-weight: bold;" class="text-center">
					<th>Uraian Kegiatan</th>
					<th>Semester</th>
					<th>Tanggal</th>
					<th>Satuan Hasil</th>
					<th>Keterangan / Bukti Fisik</th>
				
				</tr>
			</thead>
			<tbody>
			<?php foreach($q3->result() as $row){?>
				<tr class="text-center">
					<td><?=$row->uraian?></td>
					<td><?=$row->semester?> <?=$row->tahun_akademik?>/<?=$row->thn_akademik_baru?></td>
					<td><?=$row->tgl?></td>
					<td><?=$row->satuan_hasil?></td>
					<td><?=$row->keterangan?><br><a href="<?= base_url()?>kepegawaian/usulan_dupak/download_bidanga/<?=$row->berkas?>" class="btn  btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a>
				
				</tr>
				<?php
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
			
  		    <a href="<?= base_url()?>kepegawaian/kepegawaian/show/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
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
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak/tambah_a0007/A0010/<?= $kum ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>BIDANG A</h3>
				<b>Membimbing & Ikut Membimbing Dalam Menghasilkan Disertasi, Thesis, Skripsi & Laporan Akhir Studi</b><br>
			Pembimbing Utama Laporan Akhir Studi
			<hr>
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
				
				<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<textarea name="keterangan" class="form-control" rows="2" maxlength="255"></textarea>
					</div>
                </div>
				</div>
				
				<div class="form-group">
				  <button type="button"  id="btn_tambah_form_mhs"  class="btn btn-success"><i class="fa fa-plus-square">Tambah Data</i></button>
                  <button type="button" id="btn_reset_form_mhs" class="btn btn-danger"><i class="fa fa-plus-square"> Reset</i></button>
                </div>
				<h4>Data Mahasiswa ke 1 :</h4>
				<table id="table-data" class="cust-table cust-table-bordered" >
					<tr>
						<td>Nama Mahasiswa : 
						<input type="text" name="mhs[]" style="width:500px;" required>
						<input type="hidden" name="no_usulan_detail[]" id="no_usulan_detail" value="<?=$no_usulan_dupak_details?>">
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
			<input type="hidden" id="sf" name="sf" value="10">
			<input type="hidden" id="kali" name="kali" value="1">
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
			Pembimbing Utama Skripsi
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

