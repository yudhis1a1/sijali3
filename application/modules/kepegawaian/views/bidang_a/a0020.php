<?php 
 error_reporting(0);
if($usulan->jabatan_usulan_no =='6'||$usulan->jabatan_usulan_no =='3'){
	$kum="5";
	$volum="1";
}
$kum="5";
	$volum="1";
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
			Diktat, modul, petunjuk praktikum, model, alat bantu, audio visual, naskah tutorial	
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
					<form  method="post" action="<?= base_url()?>kepegawaian/kepegawaian/catatanPTK/<?php echo $dasar->no; ?>" role="form" enctype="multipart/form-data">               
                  <td colspan="5">
				 
				  <input type="hidden" class="form-control" value="A0020" name="bidang" readonly>
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
		<form method="post" action="<?= base_url()?>penilai/penilai_dupak/update_A0018/A0020" role="form" enctype="multipart/form-data">
		<div class="table-responsive m-t-40">
		<table border="1" class="ui celled table" width="100%">
			<thead>
				<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
					<th>Judul</th>
					<th>Semester</th>
					<th>Tanggal</th>
					<th>Jumlah Penulis</th>
					<th>Penulis ke</th>
					<th>Link Publikasi (repository/e-book)</th>
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
					<td>
						<a href="<?=$row->url?>" target="_blank"><?=$row->url?></a>
					</td>
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
				<tr style="background-color: <?=$warna?>; font-weight: bold;">
                  <td colspan="7">
                    KETERANGAN:
                    <textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?=$row->kum_penilai_keterangan?></textarea>
                  </td>
                  <td >
                    AK Tim Penilai:
                    <input type="text"  class="form-control" value="<?=$row->kum_penilai?>"> 
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
			
  		   <a href="<?= base_url()?>kepegawaian/kepegawaian/show/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
		</div>
    </div>
	</div>
	</div>
</div>
