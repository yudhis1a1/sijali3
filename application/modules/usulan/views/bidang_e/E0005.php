<?php 
error_reporting(0);
?>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"></h4>
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
  		    <h3>Kegiatan Tambahan LK/GB</h3>
			<b>Membimbing Skripsi/TA</b><br>
		</div>
		<table border="1" class="ui celled table" width="100%">
		<thead>
			<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
				<th>TOTAL ANGKA KREDIT</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-center">
				<td><?= $q_dupak->kum_usulan_baru;?></td>
			</tr>
			<tr class="text-center">
			<?php if($role<>'3' || $usulan_status_id<>'1' && $usulan_status_id<>'2' ){echo "<td></td>";}else{ ?>
				<td>
					<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah"  class="btn btn-success"><i class="fa fa-plus-square"> TAMBAH</i>
					</a>
				</td>
			<?php } ?>
			</tr>
		</tbody>
		</table>
    </div>
	</div>
	</div>
</div>

<?php
if($q3->row() > 0)
{	
?>
<div class="row">
    <div class="col-md-12">
	<div class="card">
	<div class="card-body">
		<table border="1" class="ui celled table" width="100%">
			<thead>
				<tr style="background-color: #e4e4e4; font-weight: bold;" class="text-center">
					<th>Semester</th>
					<th>Uraian Kegiatan</th>
					<th>Jumlah Mahasiswa</th>
					<th>Angka Kredit</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($q3->result() as $row){?>
				<tr class="text-center">
					<td><?=$row->semester?> <?=$row->tahun_akademik?>/<?=$row->thn_akademik_baru?></td>
					<td><?=$row->uraian?></td>
					<td><?=$row->jumlah_volume?></td>
					<td><?=$row->angka_kredit?></td>
					<td>
					<?php if($role<>'3' || $usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
					
					<a href="#" title="Ubah"  data-toggle="modal" data-target="#edit<?=$row->no?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					
					<a href="<?= base_url()?>usulan/usulan_dupak_e/hapus_E0005/<?=$row->no?>/<?=$no?>/<?=$row->dupak_no?>" class="btn btn-danger tombol-hapus">
					<i class="fa fa-trash-o"></i></a>
					
					<?php } ?>
					</td>
				</tr>
				<?php
				if($role=='1') 
				{
				?>
				<tr style="background-color:#FFFF00; font-weight: bold;">
                  <td colspan="6">
                    Catatan Tim Penilai:
                    <textarea class="form-control" rows="4"><?=$row->kum_penilai_keterangan?></textarea>
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
    </div>
</div>
<?php
}
?>

<div class="row">
	<div class="col-md-12">
	<div class="card">
	<div class="card-body">
	  	<div class="tile">
  		    <a href="<?= base_url()?>usulan/usulan/bidangE/<?=$no?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali Ke Detail Usulan Dosen</a>
		</div>
    </div>
	</div>
	</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="tambah" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak_e/tambah_E0005/<?=$dupak_no?>/<?= $no ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
			<h3>Kegiatan Tambahan LK/GB</h3>
			<b>Membimbing Skripsi/TA</b><br>
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
				<div class="col-md-12">
				<div class="form-group">
				  <label for="uraian">Uraian</label>
				  <textarea name="uraian" class="form-control" id="uraian" rows="2" required></textarea>
				</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
				<div class="form-group">
				  <label for="satuan_hasil">Jumlah mahasiswa</label>
				  <input type="number" name="mhs" class="form-control" maxlength="150" required>
				</div>
				</div>
				<div class="col-md-4">
				<div class="form-group">
				  <label for="satuan_hasil">Angka Kredit yang didapat</label>
				  <input type="number" name="ak" class="form-control" maxlength="150" required>
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
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak_e/update_e0005/<?=$row->dupak_no;?>/<?=$row->no?>/<?=$no?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
			<h3>Kegiatan Tambahan LK/GB</h3>
			<b>Membimbing Skripsi/TA</b><br>
			<hr>
			<div class="row">
			  <div class="col-md-4">
				<div class="form-group">
				  <label for="tahun_akademik">Semester</label>
				  <input type="semester" name="semester" value="<?=$row->semester?> <?=$row->tahun_akademik?>/<?=$row->thn_akademik_baru?>"  class="form-control" id="semester" maxlength="150" readonly>
				</div>
			  </div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					  <label for="judul">Uraian</label>
					  <textarea name="uraian" class="form-control" id="uraian" rows="2" required><?=$row->uraian?></textarea>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
				<div class="form-group">
				  <label for="satuan_hasil">Jumlah mahasiswa</label>
				  <input type="number" name="mhs" class="form-control" maxlength="150" value="<?=$row->jumlah_volume?>" required>
				</div>
				</div>
				<div class="col-md-4">
				<div class="form-group">
				  <label for="satuan_hasil">Angka Kredit yang didapat</label>
				  <input type="number" name="ak" class="form-control" maxlength="150" value="<?=$row->angka_kredit?>" required>
				</div>
				</div>
            </div>
		</div>
		<div class="modal-footer">
			<div class="btn-group pull-right">
				<button type="submit" class="btn btn-primary">Update</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		</form>
		</div>
	</div>
</div>
<?php } ?>