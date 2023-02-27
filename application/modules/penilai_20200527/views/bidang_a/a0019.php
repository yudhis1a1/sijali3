<?php 
error_reporting(0);
$kum="20";
$volum="1";
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
					<b>Mengembangkan bahan pengajaran</b><br>
			Buku ajar	
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
						<td></td>
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
		<form method="post" action="<?= base_url()?>penilai/penilai_dupak/update_A0018/A0019" role="form" enctype="multipart/form-data">
		<div class="table-responsive m-t-40">
		<table border="1" class="ui celled table" width="100%">
			<thead>
				<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
					<th>Judul Buku</th>
					<th>Tahun Akademik</th>
					<th>Tanggal</th>
					<th>Jumlah Penulis</th>
					<th>Penulis ke</th>
					<th>Satuan Hasil</th>
					<th>Link Publikasi (repository/e-book)</th>
					<th>ISBN</th>
					<th>Angka Kredit</th>
					<th>Bukti Fisik</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($q3->result() as $row)
			{?>
				<tr class="text-center">
					<td><?=$row->uraian?></td>
					<td><?=$row->semester?> <?=$row->tahun_akademik?>/<?=$row->thn_akademik_baru?></td>
					<td><?=$row->tgl?></td>
					<td><?=$row->jml_penulis?></td>
					<td><?=$row->penulis_ke?></td>
					<td><?=$row->satuan_hasil?></td>
					<td>
						<a href="<?=$row->url?>" target="_blank"><?=$row->url?></a>
					</td>
					<td><?=$row->isbn?></td>
					<td><?=$row->angka_kredit?></td>
					<td><?=$row->keterangan?><br><a href="<?= base_url()?>penilai/penilai_dupak/download_bidanga/<?=$row->berkas?>" class="btn  btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a>
				</tr>
				<?php
				  if($row->kum_penilai<>0)
				  {
					$cek="checked";
				  }else
				  {
					$cek="";
				  }
				  
				  if($row->kunci=='1')
				  {
					$warna="#FFFF00";
				  }else
				  {
					$warna="#e3ffeb";
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
							AND a.`no`='$q1->usulan_no'";
				$d_penilai=mysqli_query($koneksi,$q_penilai);
				$r_penilai=mysqli_fetch_array($d_penilai);
				?>
				<tr style="background-color: <?=$warna?>; font-weight: bold;">
                  <td colspan="3">
                    FORM PENILAIAN:
                    <br><i>Dilakukan penilaian oleh <?=$r_penilai['nama']?> 
					<input type="hidden" name="user_penilai_no[]" value=<?=$r_penilai['user_penilai_no']?>>
                    <input type="hidden" name="no[]" value=<?=$row->no?>>
					<input type="hidden" name="no_usulan" value=<?=$q1->usulan_no?>>
				  </td>
                  <td colspan="6">
                    KETERANGAN:
                    <textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?=$row->kum_penilai_keterangan?></textarea>
                  </td>
                  <td style="min-width: 50px">
                    A.K. DARI<br>TIM PENILAI:
                    <input type="number" step="any" name="kum_penilai[]" class="form-control"  value="<?=$row->kum_penilai?>" min="0" required>
                  </td>
                 </tr>
				<?php
				}
				?>
			</tbody>
	   </table>
	   </div>
			<tr class="text-center">
                 <?php if($usulan_status_id<>'5'){}else{ ?>
				<center>
				<a href="<?=base_url()?>penilai/penilai_dupak/hapus_a0004/<?=$q_dupak->dupak_no?>/<?=$q_dupak->usulan_no?>" class="btn btn-danger">
				RESET PENILAIAN
				</a>&nbsp;&nbsp;&nbsp;
				<button type="submit" class="btn btn-success">SIMPAN PENILAIAN</button>
				</center>
				<?php } ?>
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
			
  		    <a href="<?= base_url()?>penilai/penilai/bidangA/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
		</div>
    </div>
	</div>
	</div>
</div>
