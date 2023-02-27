<?php 
error_reporting(0);
$kum="3";
$volum="1";
include "koneksi.php";
?>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Bidang B</h4>
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
  		    <h3>Bidang B</h3>
			<b>Menghasilkan karya ilmiah hasil penelitian atau pemikiran yang dipublikasikan</b><br>
			Disajikan dalam seminar/simposium/ lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan Nasional
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
	if($q3->row() > 0)
	{	
	?>
	<div class="card-body">
		<div class="tile">
            <h3>Usulan Baru Untuk Penilaian</h3>
		</div>
		<form method="post" action="<?= base_url()?>penilai/penilai_dupak_b/update_B0029/<?=$q_dupak->dupak_no?>" role="form" enctype="multipart/form-data">
		<div class="table-responsive m-t-40">
		<table border="1" class="ui celled table" width="100%">
			<thead>
				<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
					<th>Judul</th>
					<th>Semester</th>
					<th>Tanggal</th>
					<th>URL</th>
					<th>Keterangan</th>
					<th>Jumlah Penulis</th>
					<th>Penulis Ke</th>
					<th>Satuan Hasil</th>
					<th>Angka Kredit</th>
					<th>Bukti Fisik</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($q3->result() as $row){?>
				<tr class="text-center">
					<td><?=$row->uraian?></td>
					<td><?=$row->semester?> <?=$row->tahun_akademik?>/<?=$row->thn_akademik_baru?></td>
					<td><?=$row->tgl?></td>
					<td>
						URL Dokumen : <a href="<?=$row->url?>" target="_blank"><?=$row->url?></a><br>
						URL Peer Review : <a href="<?=$row->url_peer?>" target="_blank"><?=$row->url_peer?></a><br>
						URL Web Prosiding (Optional) : <a href="<?=$row->url_web?>" target="_blank"><?=$row->url_web?></a><br>
					</td>
					<td><?=$row->keterangan?></td>
					<td><?=$row->jml_penulis?></td>
					<td><?=$row->penulis_ke?></td>
					<td><?=$row->satuan_hasil?></td>
					<td><?=$row->angka_kredit?></td>
					<td><a href="<?= base_url()?>usulan/usulan_dupak_b/download_bidangb/<?=$row->berkas?>" class="btn  btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a></td>
				</tr><?php if($row->kum_penilai<>0){$cek="checked";}else{$cek="";}if($row->kunci=='1'){$warna="#FFFF00";}else{$warna="#e3ffeb";}?><?php $q_penilai="SELECT
							  a.`user_penilai_no`,
							  b.`nama`
							FROM
							  `usulans` AS a,
							  `users` AS b
							WHERE a.`user_penilai_no` = b.`no`
							AND a.`no`='$q1->usulan_no'";
				$d_penilai=mysqli_query($koneksi,$q_penilai);
				$r_penilai=mysqli_fetch_array($d_penilai);
				?>
				<tr style="background-color: <?=$warna?>; font-weight: bold;">
                  <td colspan="2">
                    FORM PENILAIAN:
                    <br><i>Dilakukan penilaian oleh <?=$r_penilai['nama']?><input type="hidden" name="user_penilai_no[]" value=<?=$r_penilai['user_penilai_no']?>><input type="hidden" name="no[]" value=<?=$row->no?>><input type="hidden" name="sms[]" value="<?=$row->semester?>,<?=$row->tahun_akademik?>"><input type="hidden" name="no_usulan" value=<?=$q1->usulan_no?>>
				  </td>
                  <td colspan="5">
                    KETERANGAN:
                    <textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?=$row->kum_penilai_keterangan?></textarea>
                  </td>
                  <td style="min-width: 50px" colspan="3">
                    PENILAIAN<br>TIM PENILAI:<br><input type="checkbox" name="kum_penilai[]" value="<?=$row->angka_kredit?>,<?=$row->semester?>,<?=$row->tahun_akademik?>"  <?=$cek?>><label class="custom-control-label" for="customCheck1">diterima </label>
                  </td>
                 </tr>
				<?php
				}
				?>
			</tbody>
		</table>
		</div>
			<tr class="text-center">
                 <?php if($usulan_status_id<>'5'){}else{ ?><center><a href="<?=base_url()?>penilai/penilai_dupak_b/hapus_b0029/<?=$q_dupak->dupak_no?>/<?=$q_dupak->usulan_no?>" class="btn btn-danger">RESET PENILAIAN</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">SIMPAN PENILAIAN</button></center><?php } ?>
			</tr>
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
  		    <a href="<?= base_url()?>penilai/penilai/bidangB/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
		</div>
    </div>
	</div>
	</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="tambah" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak_b/tambah_B0005/B0030/<?= $kum ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>Bidang B</h3>
				<b>Menghasilkan karya ilmiah hasil penelitian atau pemikiran yang dipublikasikan</b><br>
			Disajikan dalam seminar/simposium/ lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan Nasional
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
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
						  <option value="2019">2019</option>
                      </select>
                    </div>
                  </div>
				</div>
				
				<div class="row">
				  <div class="col-md-2">
                    <div class="form-group">
                      <label for="jp">Jumlah Penulis</label>
                        <input type="number" name="jp" class="form-control" id="jp" required>
						<input type="hidden" name="volum" value=<?=$volum?>>
                    </div>
                  </div>
				  <div class="col-md-2">
                    <div class="form-group">
                      <label for="pk">Penulis ke</label>
                        <input type="number" name="pk" class="form-control" id="pk" required>
                    </div>
                  </div>
				  <div class="col-md-4">
				<div class="form-group">
					<label for="tgl">Tanggal</label>
					<div class="input-group date">
						<input type="date" name="tgl" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd"required>
					</div>
				</div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="satuan_hasil">Satuan Hasil</label>
                      <input type="text" name="satuan_hasil" class="form-control" id="satuan_hasil" maxlength="150" required>
                    </div>
				</div>
				</div>
				
				<div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <label for="uraian">Uraian Kegiatan</label>
                  <textarea name="uraian" class="form-control" id="uraian" rows="2" required></textarea>
				  <input type="hidden" name="no_usulan" value="<?=$no?>"required>
				  <input type="hidden" name="kum" value="<?=$kum?>"required>
                </div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-md-12">
                <div class="form-group">
					  <label for="keterangan">Keterangan</label>
					  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
				</div>
				</div>
				</div>
				
				<div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <div class="input-group date">
                            <input type="text" name="url" class="form-control " id="url" required>
                        </div>
                    </div>
                  </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="url_index">URL Index</label>
                      <input type="text" name="url_index" class="form-control" id="url_index"  required>
                    </div>
				</div>
				</div>
                

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="berkas">Berkas Upload</label>
                      <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                      <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
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
</div>



