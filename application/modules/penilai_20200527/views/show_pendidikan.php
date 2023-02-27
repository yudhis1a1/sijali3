<?php
error_reporting(0);
include "koneksi.php";
?>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                       <h4 class="text-themecolor">Usulan JAD : 
						<?php
						if($usulan_status_id =='1')
						{
							echo "Draft";
						}elseif($usulan_status_id =='2')
						{
							echo "Draft Revisi";
						}elseif($usulan_status_id =='3')
						{
							echo "Usulan Baru";
						}elseif($usulan_status_id =='4')
						{
							echo "Proses Approval Tim Penilai";
						}elseif($usulan_status_id =='5')
						{
							echo "Proses Penilaian";
						}elseif($usulan_status_id =='6')
						{
							echo "Proses Operator Ketenagaan";
						}elseif($usulan_status_id =='7')
						{
							echo "Proses Dikti";
						}elseif($usulan_status_id =='8')
						{
							echo "Proses Operator Kepegawaian";
						}else
						{
							echo "Selesai";
						}
						?>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $judul; ?></h4>
                                <h6 class="card-subtitle"><?php echo $data_dasar->nip; ?> </code></h6>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link "  href="<?= base_url()?>penilai/penilai/penilaian/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link " href="<?= base_url()?>penilai/penilai/show_matakul/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link active" href="<?= base_url()?>penilai/penilai/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
                                    
                                    
                            
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                <?php $no_usulan=$data_dasar->no; ?>
                                    <div class="tab-pane active p-20" id="dasar" role="tabpanel" >

<div class="table-responsive">
							<table class="table color-table info-table">
							<thead>
							<tr>
							  <th colspan="6">
								<h2>Riwayat Pendidikan</h2>
							  </th>
							
								<!-- <?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
								<a href="" data-toggle="modal" data-target="#tambah_pendidikan"  class="btn btn-success"><i class="fa fa-plus-square"> TAMBAH</i></a>
								<?php } ?> -->
								<hr>
							  
							</tr>
							<tr>
								<th>No</th>
								<th>Perguruan Tinggi</th>
								<th>Jenjang</th>
								<th>Bidang Ilmu</th>
								<th>Tahun Lulus</th>
								<!--<th>Aksi</th>-->
							</tr>
							</thead>
							<tbody>
							<?php
							$dosen_no="SELECT
									  a.no,
									  a.dosen_no,
									  b.nidn	
									FROM
										usulans AS a,
										dosens AS b 
									WHERE
										a.dosen_no = b.no 
										AND a.no = '$no'";
							$da_dosen_no=mysqli_query($koneksi,$dosen_no);
							$r_dosen_no=mysqli_fetch_array($da_dosen_no);
							$no=1;
							$pend="SELECT
										 a.id_sdm,
										 a.thn_lulus,
										 a.nm_sp_formal,
										 b.nama_jenjang,
										 c.nama_bidang,
										 a.id_rwy_didik_formal
									FROM
										rwy_pend_formal AS a,
										jenjangs AS b,
										bidang_ilmus AS c 
									WHERE
										a.id_sdm = '$r_dosen_no[dosen_no]' 
										AND a.id_jenj_didik =b.id
										AND a.id_bid_studi=c.kode";
							$da_pend=mysqli_query($koneksi,$pend);
							while($r_pend=mysqli_fetch_array($da_pend))
							{
							?>
							<tr>
								<td>
								<?php echo $no ;?>
								</td>
								<td>
								<?=$r_pend['nm_sp_formal']?>
								</td>
								<td>
								<?=$r_pend['nama_jenjang']?>
								</td>
								<td>
								<?=$r_pend['nama_bidang']?>
								</td>
								<td>
								<?=$r_pend['thn_lulus']?>
								</td>
								<!--<td>
								<a href="<?= base_url(); ?>usulan/usulan/hapus_pendidik/<?php echo $id_usulan; ?>/<?=$r_pend['id_rwy_didik_formal']?>/<?=$r_pend['berkas']?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash-o"></i></a>
								</td>-->
							</tr>
<!-- Modal Tambah Upload Berkas-->
<!--
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="tambah<?=$r_pend['id_rwy_didik_formal']?>" >
<div class="modal-dialog modal-lg">
	<div class="modal-content">
	<div class="modal-header">
	</div>
	<form method="post" action="<?= base_url(); ?>usulan/usulan/update_pendidik/<?php echo $id_usulan; ?>" role="form" enctype="multipart/form-data">
	<div class="modal-body">
			<h3>Upload File</h3>
			<hr>
			<label for="berkas">Berkas Upload</label>
			<input type="text" name="id" value="<?=$r_pend['id_rwy_didik_formal']?>">
			 
				  <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
				  <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
		</div>
		<div class="modal-footer">
			<div class="btn-group pull-right">
				<button type="submit" class="btn btn-primary">UPLOAD</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
			</div>
		</div>
	</form>
</div>
</div>
</div>
-->
<?php
	$no++;
	}; 
?>
</tbody>
</table>
</div>

<!-- Modal Tambah Data Pendidikan-->
<div id="tambah_pendidikan" class="modal fade"  role="dialog" aria-hidden="true" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
        <div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel1">Tambah Data Pendidikan:</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
		
        <form action="<?= base_url()?>usulan/usulan/tambah_pendidik/<?php echo $id_usulan; ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label >Jenjang</label>
			<select name="jenjang" class="select2 form-control custom-select" style="width: 100%; height:36px;" data-placeholder="Click to Choose..." >
				<option value="" ></option>
				<?php foreach($jenjang->result() as $j) {?>
				<option value="<?php echo $j->id; ?>"><?php echo $j->nama_jenjang; ?> </option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="bidang_ilmu">Bidang Ilmu</label>
			<select  name="bidang_ilmu" class="select2 form-control custom-select" style="width: 100%; height:36px;"  id="bidang_ilmu" data-placeholder="Click to Choose...">
				<option value=""></option>
				<?php foreach($bidang_ilmu->result() as $b) {?>
				<option value="<?php echo $b->kode; ?>"><?php echo $b->kode; ?> - <?php echo $b->nama_bidang; ?> </option>
			   <?php } ?>
			</select>
        </div>
        <div class="form-group">
			<label for="tgl_wisuda">Tanggal Wisuda</label>
				<input type="date" name="tgl_wisuda" class="form-control required pull-right date-picker" id="tgl_wisuda" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" >
		</div> 

		<div class="form-group">
			<label for="berkas">Upload SK</label>
			<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
			<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
		</div>
        </div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			<button type="submit" class="btn btn-primary">Tambah</button>
		</div>
        </form>
		</div>
	</div>
</div>
<!--akhir modal tambah-->
								



			</div>
		</div>
		</div>
	</div>
</div>
</div>
