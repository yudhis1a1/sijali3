<?php 
 error_reporting(0);
	$kum="20";
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
				
			<?php if($usulan_status_id=='3'){ ?>
					<tr >
					<form  method="post" action="<?= base_url()?>ketenagaan/ketenagaan/catatanPTK/<?php echo $dasar->no; ?>" role="form" enctype="multipart/form-data">               
                  <td colspan="5">
				 
				  <input type="hidden" class="form-control" value="A0019" name="bidang" readonly>
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
			
  		   <a href="<?= base_url()?>ketenagaan/ketenagaan/show/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
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
		<form method="post" action="<?= base_url()?>ketenagaan/usulan_dupak/tambah_a0019/A0019/<?= $kum ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
		
				<h3>BIDANG A</h3>
				<b>Mengembangkan bahan pengajaran</b><br>
			Buku ajar	
                <hr>

                <div class="form-group">
                  <label for="uraian">Judul Buku</label>
                  <textarea name="uraian" class="form-control" id="uraian" rows="2" required></textarea>
									<input type="hidden" name="no_usulan" value="<?=$no?>"required>
									<input type="hidden" name="kum" value="<?=$kum?>"required>
				  <input type="hidden" name="volum" value="<?=$volum?>"required>
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
                <input type="hidden" name="semester" value=" "required>
                <div class="row">
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
				
                    <div class="form-group">
                        <label for="jumlah_volume"></label>
                        <input type="hidden" step="any" name="jumlah_volume" class="form-control" id="jumlah_volume"  min="0" >
                    </div>
                </div>
				
				<div class="row">
				  <div class="col-md-6">
                    <div class="form-group">
                      <label>ISBN</label>
                      <input type="text" name="isbn" class="form-control" id="isbn" maxlength="150" required>
                    </div>
                  </div>
				
				  <div class="col-md-6">
                    <div class="form-group">
                      <label>Link Publikasi (repository/e-book)</label>
                      <input type="text" name="url" class="form-control" id="isbn" maxlength="150" required>
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

