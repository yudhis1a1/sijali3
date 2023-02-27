<?php 
 error_reporting(0);
$kum="1";
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
			Pembimbing Utama Skripsi
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
		<form method="post" action="<?= base_url()?>penilai/penilai_dupak/update_A0004/A0009" role="form" enctype="multipart/form-data">
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
				  kum_penilai_keterangan,
				  berkas,
				  bukti_kinerja
				FROM
				  `usulan_dupak_details`
				WHERE usulan_no = '$q_dupak->usulan_no'
				  AND `dupak_no` = '$q_dupak->dupak_no'
				  GROUP BY semester,tahun_akademik ";
		$data_thn=mysqli_query($koneksi,$q_thn);
		while($row_thn=mysqli_fetch_array($data_thn))
		{
		?>
		<tr style="background-color: #e4e4e4; font-weight: bold;">
			<td colspan='4'>Semester <?=$row_thn['semester']?> <?=$row_thn['tahun_akademik']?>/<?=$row_thn['thn_akademik_baru']?>
			</td>
		</tr>
		<tr style="background-color: #e4e4e4;">
			<td>Uraian : <?=$row_thn['uraian']?>
			</td>
			<td>Tanggal : <?=$row_thn['tgl']?>
			</td>
			<td>Surat Tugas : 
			<?php  if(isset($row_thn['berkas'])){ ?>
				<?php if($role<>'3' || $usulan_status_id<>'1' && $usulan_status_id<>'2'){?>
					<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row_thn['berkas']?>" target="blank" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Surat Tugas]</a>
				<?php }else{ ?>
					<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row_thn['berkas']?>" target="blank" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Surat Tugas]</a>
				<a href="<?= base_url()?>usulan/usulan_dupak/hapus_berkas/<?=$row_thn['berkas']?>/<?=$row_thn['usulan_no']?>/berkas/A0007" class="btn btn-xs btn-danger tombol-hapus">
				<i class="fa fa-trash"></i></a>
				<?php } ?>
				<?php }else{ ?>
					<?php if($role<>'3'){?>
						<a href="#" class="btn btn-xs btn-danger" ><i class="fa fa-upload"></i>[Surat Tugas]</a>
					<?php }else{ ?>
						<a href="#" data-toggle="modal" data-nama="berkas,<?=$row_thn['NO']?>" data-judul="Upload Surat TUgas" class="btn  btn-xs btn-warning" ><i class="fa fa-upload"></i>[Surat Tugas]</a>
					<?php } ?>
			<?php  } ?>
			<br>
			
			Bukti Kinerja :
			<?php  if(isset($row_thn['bukti_kinerja'])){ ?>
				<?php if($role<>'3' || $usulan_status_id<>'1' && $usulan_status_id<>'2'){?> 
					<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row_thn['bukti_kinerja']?>" target="blank" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Bukti Kinerja]</a>
				<?php  }else{ ?>
					<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row_thn['bukti_kinerja']?>" target="blank" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Bukti Kinerja]</a>
					<a href="<?= base_url()?>usulan/usulan_dupak/hapus_berkas/<?=$row_thn['bukti_kinerja']?>/<?=$row_thn['usulan_no']?>/bukti_kinerja/A0007" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
				<?php  } ?>
			<?php  }else{ ?>
				<?php if($role<>'3'){?>
					<a href="#" class="btn btn-xs btn-danger" ><i class="fa fa-upload"></i>[Bukti Kinerja]</a>
				<?php  }else{ ?>
					<a href="#" data-toggle="modal" data-nama="bukti_kinerja,<?=$row_thn['NO']?>" data-judul="Bukti Kinerja (cover, halaman judul, lembar pengesahan, berita acara)" class="btn  btn-xs btn-warning" ><i class="fa fa-upload"></i>[Bukti Kinerja]</a>
				<?php  } ?>
			<?php  } ?>
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
					  kum_penilai,
					  kunci,
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
				?>
				<?php
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
                   PENILAIAN<br>TIM PENILAI:
				   <input type="number" step="any" name="kum_penilai[]" class="form-control"  value="<?=$row_thn['kum_penilai']?>" min="0" required>
				  </td>
                 </tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<?php if($usulan_status_id<>'5'){}else{ ?><center><a href="<?=base_url()?>penilai/penilai_dupak/hapus_a0004/<?=$q_dupak->dupak_no?>/<?=$q_dupak->usulan_no?>" class="btn btn-danger">	RESET PENILAIAN	</a>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">SIMPAN PENILAIAN</button></center><?php } ?>
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
