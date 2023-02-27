<?php 
error_reporting(0);
if($usulan->jabatan_usulan_no =='6'||$usulan->jabatan_usulan_no =='3'){
	$kum="3";
	$volum="1";
}
$kum="3";
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
			<b>Pendidikan & Pelatihan Prajabatan</b><br>
			Pendidikan & Pelatihan Prajabatan Golongan III
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
				 
				  <input type="hidden" class="form-control" value="A0003" name="bidang" readonly>
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
		<table border="1" class="ui celled table" width="100%">
			<thead>
				<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
					<th>Uraian Kegiatan</th>
					<th>Semester</th>
					<th>Tanggal</th>
					<th>Satuan Hasil</th>
					<th>Angka Kredit</th>
					<th>Bukti Fisik</th>
					<th>Aksi</th>
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
					<td><?=$row->keterangan?><br><a href="<?= base_url()?>kepegawaian/usulan_dupak/download_bidanga/<?=$row->berkas?>" class="btn  btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a>
					<td>
					<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
					<a href="<?= base_url()?>kepegawaian/usulan_dupak/hapus_a0005/<?=$row->no?>/<?=$row->usulan_no?>/<?=$row->berkas?>/A0003/<?=$kum?>" class="btn btn-danger tombol-hapus">
					<i class="fa fa-trash-o"></i></a>
					<?php } ?>
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
			
  		   <a href="<?= base_url()?>kepegawaian/kepegawaian/show/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
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
		<form method="post" action="<?= base_url()?>kepegawaian/usulan_dupak/tambah_a0005/A0003/<?= $kum ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
		
				<h3>BIDANG A</h3>
			<b>Pendidikan & Pelatihan Prajabatan</b><br>
			Pendidikan & Pelatihan Prajabatan Golongan III
                <hr>

                <div class="form-group">
                  <label for="uraian">Uraian Kegiatan</label>
                  <textarea name="uraian" class="form-control" id="uraian" rows="2" required></textarea>
									<input type="hidden" name="no_usulan" value="<?=$no?>"required>
									<input type="hidden" name="kum" value="<?=$kum?>"required>
				  <input type="hidden" name="volum" value="<?=$volum?>"required>
                </div>

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
								<div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <div class="input-group date">
                            <input type="date" name="tgl" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd"required>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="satuan_hasil">Satuan Hasil</label>
                      <input type="text" name="satuan_hasil" class="form-control" id="satuan_hasil" maxlength="150" required>
                    </div>
                  </div>
                  <div class="col-md-">
                    <div class="form-group">
                        <label for="jumlah_volume"></label>
                        <input type="hidden" step="any" name="jumlah_volume" class="form-control" id="jumlah_volume"  min="0" >
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

<!-- Modal Edit-->
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="edit<?=$q1->no;?>" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url()?>kepegawaian/usulan_dupak/update_a0001/A0003/<?= $dupak ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
		<h3>BIDANG A</h3>
				<b>Pendidikan & Pelatihan Prajabatan</b><br>
				Pendidikan & Pelatihan Prajabatan Golongan III
                <hr>

                <div class="form-group">
                  <label for="uraian">Uraian Kegiatan</label>
                  <textarea name="uraian" class="form-control" id="uraian" rows="2" required><?= $q1->uraian; ?></textarea>
									<input type="hidden" name="no_dupak" value="<?= $q1->no; ?>"required>
				  <input type="hidden" name="no_usulan" value="<?= $q1->usulan_no; ?>"required>
				  
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="semester">Semester</label><br>
                      <select name="semester" class="form-control select2"  style="width: 100%; " id="semester" required>
                          <?php
							if($q1->semester='Ganjil')
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
							if($q1->tahun_akademik=='2015')
							{
						  ?>
							<option value="2015" selected>2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
                          <?php
						    }
							elseif($q1->tahun_akademik=='2016')
							{
						   ?>
						    <option value="2015">2015</option>
							<option value="2016" selected>2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
						  <?php	
							}
							elseif($q1->tahun_akademik=='2017')
							{
						  ?>
                          <option value="2016">2016</option>
                          <option value="2017" selected>2017</option>
                          <option value="2018">2018</option>
						  <option value="2019">2019</option>
						  <?php
							}
							elseif($q1->tahun_akademik=='2018')
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
                            <input type="date" name="tgl" value="<?=$q1->tgl?>" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd"required>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="satuan_hasil">Satuan Hasil</label>
                      <input type="text" name="satuan_hasil" value="<?=$q1->satuan_hasil?>"  class="form-control" id="satuan_hasil" maxlength="150" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="jumlah_volume">Jumlah Volume Kegiatan</label>
                        <input type="number" step="any" name="jumlah_volume" value="<?=$q1->jumlah_volume?>" class="form-control" id="jumlah_volume"  min="0" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"><?=$q1->keterangan?></textarea>
                </div>
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

