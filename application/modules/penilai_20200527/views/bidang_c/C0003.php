<?php 
error_reporting(0);
$kum="4";
$volum="1";
include "koneksi.php";
?>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Bidang C</h4>
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
  		    <h3>Bidang C</h3>
			<b>Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat</b><br>
			Terjadwal/terprogram Dalam satu semester atau lebih Tingkat internasional
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
		<form method="post" action="<?= base_url()?>penilai/penilai_dupak_c/update_C0001/<?=$q_dupak->dupak_no?>" role="form" enctype="multipart/form-data">
		<table border="1" class="ui celled table" width="100%">
			<thead>
				<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
					<th>Uraian Kegiatan</th>
					<th>Semester</th>
					<th>Tanggal</th>
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
					<td><?=$row->satuan_hasil?></td>
					<td><?=$row->angka_kredit?></td>
					<td><?=$row->keterangan?><br>
					<?php  if(isset($row->berkas)){ ?>
						<?php if($role<>'3' || $usulan_status_id<>'1' && $usulan_status_id<>'2'){?>
							<a href="<?= base_url()?>usulan/usulan_dupak_c/download_bidangc/<?=$row->berkas?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Surat Tugas]</a>
						<?php }else{ ?>
							<a href="<?= base_url()?>usulan/usulan_dupak_c/download_bidangc/<?=$row->berkas?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Surat Tugas]</a>
							<a href="<?= base_url()?>usulan/usulan_dupak_c/hapus_berkas/<?=$row->berkas?>/<?= $row->usulan_no ?>/berkas/C0001" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a><br>
						<?php } ?>
					<?php  }else{ ?>
						<?php if($role<>'3'){?>
							<a href="#" class="btn  btn-xs btn-danger" ><i class="fa fa-upload"></i>[Surat Tugas]</a><br>
						<?php }else{ ?>
							<a href="" data-toggle="modal" data-nama="berkas,<?=$row->no?>" data-judul="Upload SK Surat Tugas" class="btn  btn-xs btn-warning" ><i class="fa fa-upload"></i>[Surat Tugas]</a><br>
						<?php } ?>
					<?php  } ?>

					<?php  if(isset($row->sertifikat)){ ?>
						<?php if($role<>'3' || $usulan_status_id<>'1' && $usulan_status_id<>'2'){?>
							<a href="<?= base_url()?>usulan/usulan_dupak_c/download_bidangc/<?= $row->sertifikat ?>" target="_blank" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Sertifikat]</a>
						<?php }else{ ?>
							<a href="<?= base_url()?>usulan/usulan_dupak_c/download_bidangc/<?= $row->sertifikat ?>" target="_blank" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Sertifikat]</a>
							<a href="<?= base_url()?>usulan/usulan_dupak_c/hapus_berkas/<?=$row->sertifikat?>/<?= $row->usulan_no ?>/sertifikat/C0001" class="btn btn-xs btn-danger tombol-hapus">
							<i class="fa fa-trash"></i></a>
						<?php } ?>
					<?php  }else{ ?>
						<?php if($role<>'3'){?>
							<a href="#"  class="btn  btn-xs btn-danger" ><i class="fa fa-upload"></i>[Sertifikat]</a>
						<?php }else{ ?>
							<a href="" data-toggle="modal" data-nama="sertifikat,<?=$row->no?>" data-judul="Upload Sertifikat" class="btn  btn-xs btn-warning" ><i class="fa fa-upload"></i>[Sertifikat]</a>
							<?php  } ?>
					<?php  } ?>
					
					</td>
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
                  <td>
                    FORM PENILAIAN:
                    <br><i>Dilakukan penilaian oleh <?=$r_penilai['nama']?><input type="hidden" name="user_penilai_no[]" value=<?=$r_penilai['user_penilai_no']?>><input type="hidden" name="no[]" value=<?=$row->no?>><input type="hidden" name="sms[]" value="<?=$row->semester?>,<?=$row->tahun_akademik?>"><input type="hidden" name="no_usulan" value=<?=$q1->usulan_no?>>
				  </td>
                  <td colspan="4">
                    KETERANGAN:
                    <textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?=$row->kum_penilai_keterangan?></textarea>
                  </td>
                  <td style="min-width: 50px">
                    PENILAIAN<br>TIM PENILAI:<br><select name="kum_penilai[]"><option value="" disabled selected hidden>Pilih Nilai AK</option><?php for($i=0;$i<=$kum;$i+=0.5){ ?><option value="<?=$i?>,<?=$row->semester?>,<?=$row->tahun_akademik?>"><?=$i?></option><?php };?></select>
                  </td>
                 </tr>
				<?php
				}
				?>
			</tbody>
		</table>
			<tr class="text-center">
                 <?php if($usulan_status_id<>'5'){}else{ ?><center><a href="<?=base_url()?>penilai/penilai_dupak_c/hapus_c0001/<?=$q_dupak->dupak_no?>/<?=$q_dupak->usulan_no?>" class="btn btn-danger">RESET PENILAIAN</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">SIMPAN PENILAIAN</button></center><?php } ?>
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
  		    <a href="<?= base_url()?>penilai/penilai/bidangC/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
		</div>
    </div>
	</div>
	</div>
</div>
