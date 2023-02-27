<?php 
 error_reporting(0);

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
	
	if($q3->row() > 0)
	{	
	?>
	<div class="card-body">
		<div class="tile">
            <h3>Usulan Baru Untuk Penilaian</h3>
		</div>
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
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($q3->result() as $row){?>
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
					<td><?=$row->keterangan?><br><a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row->berkas?>" class="btn  btn-success" ><i class="fa  fa-cloud-download"></i>[PDF]</a>
					<td>
					<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
						<a href="#" title="Ubah"  data-toggle="modal" data-target="#edit<?=$row->no?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					<a href="<?= base_url()?>usulan/usulan_dupak/hapus_a0018/<?=$row->no?>/<?=$row->usulan_no?>/<?=$row->berkas?>/A0020/<?=$kum?>" class="btn btn-danger tombol-hapus">
					<i class="fa fa-trash-o"></i></a>
					<?php } ?>
					</td>
				</tr>
				<?php
				if($role=='1') 
				{
				?>
				<tr style="background-color: #FFFF00; font-weight: bold;">
                  <td colspan="7">
                    Catatan Tim Penilai:
                    <textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?=$row->kum_penilai_keterangan?></textarea>
                  </td>
                  <td >
                    AK Tim Penilai:
                    <input type="text"  class="form-control" value="<?=$row->kum_penilai?>"> 
                  </td>
                </tr>
				<?php
				}
	}
	?>
			</tbody>
		</table>
		</div>
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
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak/tambah_A0018/A0020/<?= $kum ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
		
				<h3>BIDANG A</h3>
				<b>Mengembangkan bahan pengajaran</b><br>
			Diktat, modul, petunjuk praktikum, model, alat bantu, audio visual, naskah tutorial	
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
						  <?php if($jabatan_no<>'31'){$thn_jab_mulai=substr($jabatan_tgl,0,4)-1;$thn_jab=substr($jabatan_tgl,0,4);$thn_now=date('Y');$thn=$thn_now-$thn_jab; ?><option value="<?=$thn_jab_mulai?>"><?=$thn_jab_mulai?></option><?php for($i=0;$i<=$thn;$i++){ ?><option value="<?=$thn_jab?>"><?=$thn_jab?></option><?php $thn_jab++;}}else{ $thn_jab_mulai=substr($pengangkatan_tgl,0,4)-1;$thn_jab=substr($pengangkatan_tgl,0,4);$thn_now=date('Y');$thn=$thn_now-$thn_jab; ?><option value="<?=$thn_jab_mulai?>"><?=$thn_jab_mulai?></option> <?php	for($i=0;$i<=$thn;$i++){?><option value="<?=$thn_jab?>"><?=$thn_jab?></option><?php $thn_jab++;} }?>
                      </select>
                    </div>
                  </div>
				</div>
				
				<div class="row">
				  <div class="col-md-2">
                    <div class="form-group">
                      <label for="jp">Jumlah Penulis</label>
                        <input type="number" name="jp" min="1" max="15" class="form-control" id="jp" required>
						<input type="hidden" name="volum" value=<?=$volum?>>
                    </div>
                  </div>
				  <div class="col-md-2">
                    <div class="form-group">
                      <label for="pk">Penulis ke</label>
                        <input type="number" name="pk" min="1" max="15" class="form-control" id="pk" required>
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
                  <label for="judul">Judul</label>
                  <textarea name="uraian" class="form-control" id="uraian" rows="2" required></textarea>
				  <input type="hidden" name="no_usulan" value="<?=$no?>"required>
				  <input type="hidden" name="kum" value="<?=$kum?>"required>
                </div>
				</div>
				</div>
				<div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="url">Link Publikasi (repository/e-book)</label>
                        <div class="input-group date">
                            <input type="text" name="url" class="form-control " id="url" placeholder="https://repository.com/Jurnal.pdf" required>
                        </div>
						<code>*Gunakan (https://) sebelum alamat url, contoh : https://repository.com/Jurnal.pdf</code>
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
<?php foreach($q3->result() as $row){?>
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="edit<?=$row->no;?>" >

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak/update_a0018/A0020" role="form" enctype="multipart/form-data">
		<div class="modal-body">
		
				<h3>BIDANG A</h3>
				<b>Mengembangkan bahan pengajaran</b><br>
			Melakukan kegiatan pengembangan program kuliah	
                <hr>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="semester">Semesterrr</label><br>
                      <input type="text" name="semester" value="<?=$row->semester?>"  class="form-control" id="semester" readonly>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tahun_akademik">Tahun Dasar Akademik</label>
					  <input type="text" name="thn_akademik" value="<?=$row->tahun_akademik?>"  class="form-control" id="thn_akademik" maxlength="150" readonly>
                    </div>
                  </div>
				</div>
				
				<div class="row">
				  <div class="col-md-2">
                    <div class="form-group">
                      <label for="jp">Jumlah Penulis</label>
                        <input type="number" name="jp" class="form-control" id="jp" value=<?=$row->jml_penulis?> readonly>
						<input type="hidden" name="volum" value=<?=$volum?>>
                    </div>
                  </div>
				  <div class="col-md-2">
                    <div class="form-group">
                      <label for="pk">Penulis ke</label>
                        <input type="number" name="pk" class="form-control" id="pk" value=<?=$row->penulis_ke?> readonly>
                    </div>
                  </div>
				  <div class="col-md-4">
				<div class="form-group">
					<label for="tgl">Tanggal</label>
					<div class="input-group date">
                            <input type="date" name="tgl" value="<?=$row->tgl?>" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd"required>
                        </div>
				</div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="satuan_hasil">Satuan Hasil</label>
                      <input type="text" name="satuan_hasil" class="form-control" id="satuan_hasil" maxlength="150" value="<?=$row->satuan_hasil?>" required>
                    </div>
				</div>
				</div>
				
				<div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <textarea name="uraian" class="form-control" id="uraian" rows="2" required><?=$row->uraian?></textarea>
				  <input type="hidden" name="no_usulan" value="<?=$no?>"required>
				  <input type="hidden" name="no_usulan_dupak_details" value="<?=$row->no?>"required>
				  <input type="hidden" name="kum" value="<?=$kum?>">
                </div>
				</div>
				</div>
				
				
				
				<div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Link Publikasi (repository/e-book)</label>
                        <div class="input-group date">
                            <input type="text" name="url" class="form-control " id="url" value="<?=$row->url?>" required>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="berkas">Berkas Upload</label>
					  <input type="hidden"  name="old_pict" value="<?=$row->berkas?>" class="form-control">
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
<?php } ?>

