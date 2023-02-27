<?php 
error_reporting(0);
if($jenjang_id_lama=='0' && $jenjang_id_lama<>$jenjang_id_baru)
{
	$kum="200";
}elseif($jenjang_id_lama=='30')
{
	$kum="100";
}elseif($jenjang_id_lama<>$jenjang_id_baru)
{
	$kum="50";
}elseif($jenjang_id_lama==$jenjang_id_baru)
{
	$kum="0";
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
					</tr>
					<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
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
						<!-- <td><?=$jumlah?></td> -->
					</tr>
				
					<tr class="text-center">
						<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){echo "<td></td><td></td>";}else{ ?>
						<td>
							
						</td>
						<td>
							<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah"  class="btn btn-success"><i class="fa fa-plus-square"> TAMBAH</i>
							</a>
						</td>
						<?php } ?>
						<td></td>
					</tr>
				
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
		<table border="1" class="ui celled table" width="100%">
			<thead>
				<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
					<th>Uraian Kegiatan</th>
					<!-- <th>Semester</th> -->
					<th>Tanggal</th>
					<th>Satuan Hasil</th>
					<th>Angka Kredit</th>
					<th>Bukti Fisik</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<tr class="text-center">
					<td><?=$q1->uraian?></td>
					<!-- <td><?=$q1->semester?> <?=$q1->tahun_akademik?>/<?=$q1->thn_akademik_baru?></td> -->
					<td><?=$q1->tgl?></td>
					<td><?=$q1->satuan_hasil?></td>
					<td><?=$q1->angka_kredit?></td>
					<td>Scan Ijazah: 
						<?php  
						if(isset($q1->berkas))
						{?>
							<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$q1->berkas?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Scan Ijazah]</a>
							<a href="<?= base_url()?>usulan/usulan_dupak/hapus_berkas/<?=$q1->berkas?>/<?= $q1->usulan_no ?>/berkas/<?=$dupak_no?>" class="btn btn-xs btn-danger tombol-hapus">
							<i class="fa fa-trash"></i></a><br>
						<?php  
						}else
						{ ?>
							<a href="#uploadModal" data-toggle="modal" data-nama="berkas,<?=$q1->no?>" data-judul="Upload Scan Ijazah" class="btn  btn-sm btn-warning" ><i class="fa fa-upload"></i>[Scan Ijazah]</a><br>
						<?php  
						} 
						?>
						<br>
						Transkrip Ijazah: 
						<?php  
						if(isset($q1->transkrip))
						{?>
							<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$q1->transkrip?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Transkrip Ijazah]</a>
							<a href="<?= base_url()?>usulan/usulan_dupak/hapus_berkas/<?=$q1->transkrip?>/<?= $q1->usulan_no ?>/transkrip/<?=$dupak_no?>" class="btn btn-xs btn-danger tombol-hapus">
							<i class="fa fa-trash"></i></a><br>
						<?php  
						}else
						{ ?>
							<a href="#uploadModal" data-toggle="modal" data-nama="transkrip,<?=$q1->no?>" data-judul="Upload Transkrip Ijazah" class="btn  btn-sm btn-warning" ><i class="fa fa-upload"></i>[Transkrip Ijazah]</a><br>
						<?php  
						} 
						?>
						
						<?php
						/*
						<br>
						File Disertasi: <br>
						<?php  
						if(isset($q1->bukti_kinerja))
						{?>
							<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$q1->bukti_kinerja?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[File Disertasi]</a>
							<a href="<?= base_url()?>usulan/usulan_dupak/hapus_berkas/<?=$q1->bukti_kinerja?>/<?= $q1->usulan_no ?>/bukti_kinerja/<?=$dupak_no?>" class="btn btn-xs btn-danger tombol-hapus">
							<i class="fa fa-trash"></i></a>
						<?php  
						}else
						{ ?>
							<a href="#uploadModal" data-toggle="modal" data-nama="bukti_kinerja,<?=$q1->no?>" data-judul="Upload File Disertasi" class="btn  btn-sm btn-warning" ><i class="fa fa-upload"></i>[File Disertasi]</a><br>
						<?php  
						} 
						?>
						<br>
						*/?>
					</td>
					</td>
					<td>
					<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
					<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#edit<?=$q1->no;?>"  class="btn btn-warning"><i class="fa fa-edit"></i></a>
					<a href="<?= base_url()?>usulan/usulan_dupak/hapus_ijazah/<?=$q1->no?>/<?=$q1->usulan_no?>/<?=$dupak_no?>" class="btn btn-danger tombol-hapus" >
					<i class="fa fa-trash-o"></i></a>
					<?php } ?>
					</td>
				</tr>
				<?php
				if($role=='1') 
				{
				?>
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
			
  		    <a href="<?= base_url()?>usulan/usulan/bidangA/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
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
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak/tambah_a0001/A0001/<?= $kum ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
		
				<h3>BIDANG A</h3>
				<b>Pendidikan Formal</b><br>
				Doktor (S3)
                <hr>

                <div class="form-group">
                  <label for="uraian">Uraian Kegiatan</label>
                  <textarea name="uraian" class="form-control" id="uraian" rows="2" required></textarea>
				  <input type="hidden" name="no_usulan" value="<?=$no?>"required>
                </div>

                <!-- <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="semester">Semester</label><br>
                      <select type="hidden" name="semester" class="form-control select2"  style="width: 100%; " id="semester" data-placeholder="Click to Choose..." required>
                          <option value=""></option>
                          <option value="Ganjil">Ganjil</option>
                          <option value="Genap">Genap</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tahun_akademik">Tahun Dasar Akademik</label>
                      <select type="hidden" name="thn_akademik" class="form-control select2"  style="width: 100%;" id="thn_akademik" data-placeholder="Click to Choose..." required>
                          <option value=""></option>
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
						  <option value="2019">2019</option>
                      </select>
                    </div>
                  </div>

                  
                </div> -->
				<input type="hidden"  name="semester" class="form-control"  value="">
					  <input type="hidden"  name="thn_akademik" class="form-control"  value="">

                <div class="row">
				  <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl">Tanggal Ijazah</label>
                        <div class="input-group date">
                            <input type="date" name="tgl" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd"required>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="satuan_hasil">Satuan Hasil</label>
                      <input type="text" name="satuan_hasil" class="form-control" id="satuan_hasil" maxlength="150" required>
					  <input type="hidden" step="any" name="jumlah_volume" class="form-control" id="jumlah_volume"  value="1">
                    </div>
                  </div>
                </div>
                

                <!--
				<div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="berkas">Berkas Upload</label>
                      <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                      <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                    </div>
                  </div>
                </div>
				-->
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



<!-- Modal Edit-->
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="edit<?=$q1->no;?>" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak/update_a0001/A0001/<?= $kum ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>BIDANG A</h3>
				<b>Pendidikan Formal</b><br>
				Doktor (S3)
                <hr>

                <div class="form-group">
                  <label for="uraian">Uraian Kegiatan</label>
                  <textarea name="uraian" class="form-control" id="uraian" rows="2" required><?= $q1->uraian; ?></textarea>
				<input type="hidden" name="no_dupak" value="<?= $q1->no; ?>"required>
				  <input type="hidden" name="no_usulan" value="<?= $q1->usulan_no; ?>"required>
				  
                </div>

                <div class="row">
                  <!-- <div class="col-md-4">
                    <div class="form-group">
                      <label for="semester">Semester</label><br>
					  <input type="text" name="semester" value="<?=$q1->semester?>"  class="form-control" id="semester" readonly>
                      
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tahun_akademik">Tahun Dasar Akademik</label>
					  <input type="text" name="thn_akademik" value="<?=$q1->tahun_akademik?>"  class="form-control" id="thn_akademik" maxlength="150" readonly>
                    </div>
                  </div> -->
				  <input type="hidden"  name="semester" class="form-control"  value="">
					  <input type="hidden"  name="thn_akademik" class="form-control"  value="">
                  <div class="col-md-4">
                    <div class="form-group">
                        
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
					<label for="tgl">Tanggal</label>
                        <div class="input-group date">
                            <input type="date" name="tgl" value="<?=$q1->tgl?>" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd"required>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
					<label for="satuan_hasil">Satuan Hasil</label>
                      <input type="text" name="satuan_hasil" value="<?=$q1->satuan_hasil?>"  class="form-control" id="satuan_hasil" maxlength="150" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <!-- <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"><?=$q1->keterangan?></textarea> -->
                </div>
                <!--
				<div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="berkas">Berkas Upload</label>
											<input type="hidden"  name="old_pict" value="<?=$q1->berkas?>" class="form-control">
                      <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                      <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                    </div>
                  </div>
                </div>
				-->
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

<!-- Modal Upload -->
<?php foreach($q3->result() as $row){?>
<form  method="post" action="<?= base_url()?>usulan/usulan_dupak/upload_file/A0001" role="form" enctype="multipart/form-data">
<div class="modal fade" id="uploadModal" 
        role="dialog" 
        aria-labelledby="uploadModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <h4 id="modalLabel"></h4>

                <input type="hidden" name="jenis" value="">
                <input type="hidden" name="no_usulan" value="<?php echo $no; ?>">
				

                <div class="form-group">
                  <label for="berkas">Berkas Upload</label>
                  <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                  <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                </div>
                   
            </div>

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
</form>
<?php } ?>

