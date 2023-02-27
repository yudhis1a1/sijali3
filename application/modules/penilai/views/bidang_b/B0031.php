<?php 
error_reporting(0);
$kum="10";
$volum="1";
include "koneksi.php";
?>
<style type="text/css">
p {
   font-size: 17px;
}
</style>
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
			Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan Internasional
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
		<form method="post" action="<?= base_url()?>penilai/penilai_dupak_b/update_B0001/<?=$q_dupak->dupak_no?>" role="form" enctype="multipart/form-data">
		<table class="ui celled table"  width="100%" border="1">
		 <?php
		 $no_uj="1";
		 ?>
		  <?php foreach($q3->result() as $row){?>
		  <tr style="background-color: #e4e4e4; font-weight: bold;">
			<th colspan="2"><p>Data ke-<?=$no_uj?></p></td>
		  </tr>
		  <tr>
			<td><p>Judul</p></td>
			<td><p><?=$row->uraian?></p></td>
		  </tr>
		  <tr>
			<td><p>Semester</p></td>
			<td><p><?=$row->semester?> <?=$row->tahun_akademik?>/<?=$row->thn_akademik_baru?></p></td>
		  </tr>
		  <tr>
			<td><p>Tanggal</p></td>
			<td><p><?=$row->tgl?></p></td>
		  </tr>
		  <tr>
			<td><p>ISBN/ISSN</p></td>
			<td><p><?=$row->isbn?></p></td>
		  </tr>
		  <tr>
			<td><p>URL</p></td>
			<td>
			<p>
				URL Dokumen : <a href="<?=$row->url?>" target="_blank"><?=$row->url?></a><br>
				URL Peer Review : <a href="<?=$row->url_peer?>" target="_blank"><?=$row->url_peer?></a><br>
				URL Web Prosiding (Optional) : <a href="<?=$row->url_web?>" target="_blank"><?=$row->url_web?></a><br>
			</p></td>
		  </tr>
		  <tr>
			<td><p>Keterangan</p></td>
			<td><p><?=$row->keterangan?></p></td>
		  </tr>
		  <tr>
			<td><p>Jumlah Penulis</p></td>
			<td><p><?=$row->jml_penulis?></p></td>
		  </tr>
		  <tr>
			<td><p>Penulis Ke</p></td>
			<td><p><?=$row->penulis_ke?></p></td>
		  </tr>
		 <tr>
			<td><p>Satuan Hasil</p></td>
			<td><p><?=$row->satuan_hasil?></p></td>
		  </tr>
		  <tr>
			<td><p>Bukti fisik</p></td>
			<td><p><a href="<?= base_url()?>usulan/usulan_dupak_b/download_bidangb/<?=$row->berkas?>" target="blank" class="btn btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a></p></td>
		  </tr>
		  <tr>
			<td><p>Angka Kredit</p></td>
			<td><p><?=$row->angka_kredit?></p></td>
		  </tr>
		  <?php if($row->kum_penilai<>0){$cek="checked";}else{$cek="";}if($row->kunci=='1'){$warna="#FFFF00";}else{$warna="#e3ffeb";}?><?php $q_penilai="SELECT
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
		  <tr style="background-color: <?=$warna?>;font-weight: bold;">
			<td width="30%"><p>Penilaian<br>
			Dilakukan penilaian oleh <br><?=$r_penilai['nama']?>
			<input type="hidden" name="user_penilai_no[]" value=<?=$r_penilai['user_penilai_no']?>><br>
			<input type="hidden" name="no[]" value=<?=$row->no?>><br>
			<input type="hidden" name="no_usulan" value=<?=$q1->usulan_no?>>
			</td>
			<td><p>
			KETERANGAN :<br>
            <textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?=$row->kum_penilai_keterangan?></textarea><br><br>
			A.K. DARI<br>TIM PENILAI:<br>
			<input type="number" step="any" name="kum_penilai[]" class="form-control"  value="<?=$row->kum_penilai?>" min="0" required>
			</p></td>
		  </tr>
		  <?php
			$no_uj++;
			}
			?>
		</table>
			<tr class="text-center">
                  <?php if($usulan_status_id<>'5'){}else{ ?><center><a href="<?=base_url()?>penilai/penilai_dupak_b/hapus_b0002/<?=$q_dupak->dupak_no?>/<?=$q_dupak->usulan_no?>" class="btn btn-danger">RESET PENILAIAN</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">SIMPAN PENILAIAN</button></center><?php } ?>
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
