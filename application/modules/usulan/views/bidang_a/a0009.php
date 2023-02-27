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
		<table border="1" class="ui celled table" width="100%">
		<?php 
		// foreach($q4->result() as $data)
		// {
		
		$q_thn="SELECT
				  usulan_no,
				  dupak_no,
				  NO,
				  `uraian`,
				  `semester`,
				  `tahun_akademik`,
				  `tahun_akademik` + 1 AS thn_akademik_baru,
				  `tgl`,
				  satuan_hasil,
				  `keterangan`,
				  angka_kredit,
				  berkas,
				  bukti_kinerja,
				  kum_penilai,
				  kum_penilai_keterangan
				FROM
				  `usulan_dupak_details`
				WHERE usulan_no = '$q_dupak->usulan_no'
				  AND `dupak_no` = '$q_dupak->dupak_no'
				  GROUP BY semester,tahun_akademik";
		$data_thn=mysqli_query($koneksi,$q_thn);
		while($row_thn=mysqli_fetch_array($data_thn))
		{
		?>
		<tr style="background-color: #e4e4e4; font-weight: bold;">
			<td colspan='3'>Semester <?=$row_thn['semester']?> <?=$row_thn['tahun_akademik']?>/<?=$row_thn['thn_akademik_baru']?>
			</td>
			<td>
				<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
				<a href="<?= base_url()?>usulan/usulan_dupak/hapus_a0007/<?=$row_thn['NO']?>/<?=$row_thn['usulan_no']?>/<?=$row_thn['semester']?>/<?=$row_thn['tahun_akademik']?>/A0009/<?=$kum?>" class="btn btn-danger tombol-hapus"> Hapus
				<i class="fa fa-trash-o"></i></a>
				<?php } ?>
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
					<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row_thn['berkas']?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Surat Tugas]</a>
				<?php }else{ ?>
					<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row_thn['berkas']?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Surat Tugas]</a>
				<a href="<?= base_url()?>usulan/usulan_dupak/hapus_berkas/<?=$row_thn['berkas']?>/<?=$row_thn['usulan_no']?>/berkas/A0007" class="btn btn-xs btn-danger tombol-hapus">
				<i class="fa fa-trash"></i></a>
				<?php } ?>
				<?php }else{ ?>
					<?php if($role<>'3'){?>
						<a href="#" class="btn btn-xs btn-danger" ><i class="fa fa-upload"></i>[Surat Tugas]</a>
					<?php }else{ ?>
						<a href="#uploadModal" data-toggle="modal" data-nama="berkas,<?=$row_thn['NO']?>" data-judul="Upload Surat TUgas" class="btn  btn-xs btn-warning" ><i class="fa fa-upload"></i>[Surat Tugas]</a>
					<?php } ?>
			<?php  } ?>
			<br>
			
			Bukti Kinerja :
			<?php  if(isset($row_thn['bukti_kinerja'])){ ?>
				<?php if($role<>'3' || $usulan_status_id<>'1' && $usulan_status_id<>'2'){?> 
					<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row_thn['bukti_kinerja']?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Bukti Kinerja]</a>
				<?php  }else{ ?>
					<a href="<?= base_url()?>usulan/usulan_dupak/download_bidanga/<?=$row_thn['bukti_kinerja']?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Bukti Kinerja]</a>
					<a href="<?= base_url()?>usulan/usulan_dupak/hapus_berkas/<?=$row_thn['bukti_kinerja']?>/<?=$row_thn['usulan_no']?>/bukti_kinerja/A0007" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
				<?php  } ?>
			<?php  }else{ ?>
				<?php if($role<>'3'){?>
					<a href="#uploadModal" class="btn btn-xs btn-danger" ><i class="fa fa-upload"></i>[Bukti Kinerja]</a>
				<?php  }else{ ?>
					<a href="#uploadModal" data-toggle="modal" data-nama="bukti_kinerja,<?=$row_thn['NO']?>" data-judul="Bukti Kinerja (cover, halaman judul, lembar pengesahan, berita acara)" class="btn  btn-xs btn-warning" ><i class="fa fa-upload"></i>[Bukti Kinerja]</a>
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
				}
				if($role=='1') 
				{
				?>
				<tr style="background-color: <?=$warna?>; font-weight: bold;">
                  <td colspan="3">
                    KETERANGAN:
                    <textarea name="kum_penilai_keterangan[]" class="form-control" rows="2"><?=$row_thn['kum_penilai_keterangan']?></textarea>
                  </td>
                  <td >
                    AK Tim Penilai:
                    <input type="text"  class="form-control" value="<?=$row_thn['kum_penilai']?>"> 
                  </td>
                </tr>
				<?php
				}
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
<?php
date_default_timezone_set('Asia/Jakarta');
$no_usulan_dupak_details=date("ymdHis").'01';
?>
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="tambah" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url()?>usulan/usulan_dupak/tambah_a0007/A0009/<?= $kum ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>BIDANG A</h3>
				<b>Membimbing & Ikut Membimbing Dalam Menghasilkan Disertasi, Thesis, Skripsi & Laporan Akhir Studi</b><br>
			Pembimbing Utama Skripsi
			<hr>
				<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label for="uraian">Uraian Kegiatan</label>
					<textarea name="uraian" class="form-control" rows="2" maxlength="255"></textarea>
					</div>
                </div>
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
						  <?php if($jabatan_no<>'31'){$thn_jab_mulai=substr($jabatan_tgl,0,4)-1;$thn_jab=substr($jabatan_tgl,0,4);$thn_now=date('Y');$thn=$thn_now-$thn_jab; ?><option value="<?=$thn_jab_mulai?>"><?=$thn_jab_mulai?></option><?php for($i=0;$i<=$thn;$i++){ ?><option value="<?=$thn_jab?>"><?=$thn_jab?></option><?php $thn_jab++;}}else{ $thn_jab_mulai=substr($pengangkatan_tgl,0,4)-1;$thn_jab=substr($pengangkatan_tgl,0,4);$thn_now=date('Y');$thn=$thn_now-$thn_jab; ?><option value="<?=$thn_jab_mulai?>"><?=$thn_jab_mulai?></option> <?php	for($i=0;$i<=$thn;$i++){?><option value="<?=$thn_jab?>"><?=$thn_jab?></option><?php $thn_jab++;} }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <div class="input-group date">
                            <input type="date" name="tgl" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd"required>
							<br><input type="hidden" name="no_usulan" value="<?=$no?>">
						</div>
                    </div>
                  </div>
				  <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl">Satuan Hasil</label>
                        <div class="input-group">
						<input type="text" name="satuan_hasil" class="form-control"  required>
                        </div>
                    </div>
                  </div>
				  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="berkas">Berkas Upload</label>
                      <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                      <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                    </div>
                  </div> -->
                </div>
				
				<div class="form-group">
				  <button type="button"  id="btn_tambah_form_mhs"  class="btn btn-success"><i class="fa fa-plus-square">Tambah Data</i></button>
                  <button type="button" id="btn_reset_form_mhs" class="btn btn-danger"><i class="fa fa-plus-square"> Reset</i></button>
                </div>
				<h4>Data Mahasiswa ke 1 :</h4>
				<table id="table-data" class="ui celled table" >
					<tr>
						<td>NIM :</td> 
						<td>
						<input type="number" name="nim[]" style="width:500px;" required>
						<input type="hidden" name="no_usulan_detail[]" id="no_usulan_detail" value="<?=$no_usulan_dupak_details?>">
						</td>
					 </tr>
					<tr>
						<td>Nama Mahasiswa : </td> 
						<td>
						<input type="text" name="mhs[]" style="width:500px;" required>
						</td>
					 </tr>
				</table>
				<div  id="insert_form_mhs"></div>
			 </div>

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
			<!-- Kita buat textbox untuk menampung jumlah data form -->
			<input type="hidden" id="jumlah-form" name="jumlah-form" value="1">
			<input type="hidden" id="sf" name="sf" value="8">
			<input type="hidden" id="kali" name="kali" value="1">
		</form>
		
	</div>
</div>
</div>

<!-- Modal Upload -->

<form  method="post" action="<?= base_url()?>usulan/usulan_dupak/upload_file/<?=$dupak_no?>" role="form" enctype="multipart/form-data">
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