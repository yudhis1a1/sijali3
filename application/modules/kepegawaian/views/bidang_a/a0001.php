<?php 
error_reporting(0);
if($usulan->jabatan_usulan_no =='6'||$usulan->jabatan_usulan_no =='3'){

	if($jenjang_id_lama=='0' && $jenjang_id_lama<>$jenjang_id_baru)
	{
		$dupak="200";
	}elseif($jenjang_id_lama<>$jenjang_id_baru)
	{
		$dupak="50";
	}elseif($jenjang_id_lama==$jenjang_id_baru)
	{
		$dupak="0";
	}
}
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
			<b>Pendidikan Formal</b><br>
			Doktor (S3)
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
				 
				  <input type="hidden" class="form-control" value="A0001" name="bidang" readonly>
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
	
	if($q1->no > 0)
	{
	
	?>
	<div class="card-body">
		<div class="tile">
            <h3>Usulan Baru Untuk Penilaian</h3>
		</div>
		<form method="post" action="<?= base_url()?>penilai/penilai_dupak/update_A0001/A0001" role="form" enctype="multipart/form-data">
		<table border="1" class="ui celled table" width="100%">
			<thead>
				<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
					<th>Uraian Kegiatan</th>
					
					<th>Tanggal</th>
					<th>Satuan Hasil</th>
					<th>Angka Kredit</th>
					<th>Keterangan / Bukti Fisik</th>
				</tr>
			</thead>
			<tbody>
				<tr class="text-center">
					<td><?=$q1->uraian?></td>			
					<td><?=$q1->tgl?></td>
					<td><?=$q1->satuan_hasil?></td>
					<td><?=$q1->angka_kredit?></td>
					<td>
					Scan Ijazah: <br>
					<?php  
					if(isset($q1->berkas))
					{?>
						<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$q1->berkas?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Scan Ijazah]</a>
					<?php  
					}else
					{ ?>
						<a href="#uploadModal" data-toggle="modal" data-nama="berkas,<?=$q1->no?>" data-judul="Upload Scan Ijazah" class="btn  btn-sm btn-warning" ><i class="fa fa-upload"></i>[Scan Ijazah]</a><br>
					<?php  
					} 
					?>
					<br>
					Transkrip Ijazah: <br>
					<?php  
					if(isset($q1->transkrip))
					{?>
						<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$q1->transkrip?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Transkrip Ijazah]</a>
					<?php  
					}else
					{ ?>
						<a href="#uploadModal" data-toggle="modal" data-nama="transkrip,<?=$q1->no?>" data-judul="Upload Transkrip Ijazah" class="btn  btn-sm btn-warning" ><i class="fa fa-upload"></i>[Transkrip Ijazah]</a><br>
					<?php  
					} 
					?>
					<br>
					</td>
				</tr>
				<tr style="background-color:#FFFF00; font-weight: bold;">
                  <td colspan="4">
                    Catatan Tim Penilai:
                    <textarea class="form-control" rows="4"><?=$q1->kum_penilai_keterangan?></textarea>
                  </td>
				  <td >
                    AK Tim Penilai:
                    <input type="text"  class="form-control" value="<?=$q1->kum_penilai?>"> 
                  </td>
                </tr>
			</tbody>
		</table>
		<?php if($usulan_status_id<>'5' && $usulan_status_id<>'6'){}else{ ?>
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
			
  		   <a href="<?= base_url()?>kepegawaian/kepegawaian/show/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
			</div>
    </div>
	</div>
	</div>
</div>


                     
                          





