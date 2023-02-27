<?php
error_reporting(0);
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
				<li class="nav-item"> <a class="nav-link "  href="<?= base_url()?>usulan/usulan/usulans/view/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
				<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/show_matakul/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
				<li class="nav-item"> <a class="nav-link active" href="<?= base_url()?>usulan/usulan/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pak" role="tab"><span class="hidden-sm-up"><i class="ti-ruler-pencil "></i></span> <span class="hidden-xs-down">PAK</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/show_log/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>
			</ul>
		<!-- Tab panes -->
		<div class="tab-content tabcontent-border">
		<?php $no_usulan=$data_dasar->no; ?>
			<div class="tab-pane active p-20" id="pendidikan" role="tabpanel" >
				
					
					                            
						<div class="table-responsive">
							<table class="table color-table info-table">
							<thead>
							<tr>
							  <th colspan="4">
								<h2>Riwayat Pendidikan</h2>
							  </th>
							  <th>
								<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
								<a href="" data-toggle="modal" data-target="#tambah_pendidikan"  class="btn btn-success"><i class="fa fa-plus-square"> TAMBAH</i></a>
								<?php } ?>
							  </th>
							</tr>
							<tr>
								<th>No</th>
								<th>Jenjang</th>
								<th>Bidang Ilmu</th>
								<th>Tanggal Wisuda</th>
								<th>AKSI</th>                                                
							</tr>
							</thead>
							<tbody>
							<?php
							foreach($data_didik as $didik){
							$i= $i + 1;
							?>
							<tr>
								<td>
								<?php echo $i ;?>
								</td>
								<td>
								<?php echo "$didik->nm_jenjang";?>
								</td>
								<td>
								<?php echo "$didik->bidil";?>
								</td>
								<td>
								<?php echo "$didik->tgl";?>
								</td>
								<td>
								<?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
								<a href="<?= base_url(); ?>usulan/usulan/hapus_pendidik/<?php echo $didik->no; ?>/<?php echo $didik->usulan_no; ?>" class="btn btn-danger waves-effect waves-light m-t-20 tombol-hapus"><i class="fa fa-trash-o"></i></a>
								 <?php } ?>
								</td>
							</tr>
							<?php }; ?>
							</tbody>
							</table>
						</div>
<!-- Modal Tambah-->
<div id="tambah_pendidikan" class="modal fade"  role="dialog" aria-hidden="true" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
        <div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel1">Tambah Data Pendidikan:</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
		
        <form action="<?= base_url()?>usulan/usulan/tambah_pendidik/<?php echo $no; ?>" method="post" enctype="multipart/form-data">
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


