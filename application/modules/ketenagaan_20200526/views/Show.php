<?php
error_reporting(0);
?>

<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Detail Usulan JAD</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Sub PTK</a></li>                               
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Detail</a></li>
                                
                            </ol>
                            
                        </div>
                    </div>
                </div>
         
                <div class="card-body">    
                <?php if($data_dasar->usulan_status_id == '3' || $data_dasar->usulan_status_id == '6' || $data_dasar->usulan_status_id == '7' ){                  
                     ?>
                   <button  class="btn btn-info" data-toggle="modal" id="myModalLabel" data-target="#updateStatusModal">Update Status</button>  
                    
                    <?php } ?>
                    <a href="<?php echo base_url('ketenagaan/ketenagaan/'.$status_id); ?>" class="btn btn-success">Kembali</a>  
                    <?php if($data_dasar->usulan_status_id == '3'  ){                  
                     ?>   
                    <a href="#addPenilaiModal" data-toggle="modal" class="btn btn-rounded btn-outline-danger fa fa-user-circle-o pull-right" id="btn_add_penilai">Update Tim Penilai</a>           
                    <?php } ?>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $judul; ?></h4>
                                
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" id="nav_dasar" href="#dasar" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_mtk" href="#mtk" role="tab"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_riwayat" href="#riwayat" role="tab"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_bid_a" href="#bidang_A" role="tab"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_bid_b" href="#bidang_B" role="tab"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_bid_c" href="#bidang_C" role="tab"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_bid_d" href="#bidang_D" role="tab"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_ceklist"  href="#ceklist" role="tab"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_resume"  href="#resume" role="tab"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
                                    <?php if($usulan_status_id=='6' ){  ?>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_pak"  href="#pak" role="tab"><span class="hidden-sm-up"><i class="ti-ruler-pencil "></i></span> <span class="hidden-xs-down">PAK</span></a> </li>
                                   <?php } ?>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_log" href="#log" role="tab"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>
                            
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                <?php $no_usulan=$data_dasar->no ; ?>
                               
                                    <div class="tab-pane active p-20" id="dasar" role="tabpanel" >

                                    <div class="card">
            <div class="card-header bg-info">
				<h4 class="m-b-0 text-white">Data Dosen</h4>
			</div>
			<div class="card-body">                              
			<form class="form">
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">NIDN/NIDK</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="nidn" value="<?php echo "$data_dasar->nidn /$data_dasar->nidk"; ?>" readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">NIP</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="nip" value=" <?php echo $data_dasar->nip; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">No KARPEG</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="karpeg" value=" <?php echo $data_dasar->karpeg; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Nama</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="nama" value=" <?php echo $data_dasar->nm_dosen; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Gelar Depan</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="f_gelar" value=" <?php echo $data_dasar->gelar_depan; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Gelar Belakang</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="l_gelar" value=" <?php echo $data_dasar->gelar_belakang; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Ikatan Kerja</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="ikadin" value=" <?php echo $data_dasar->nm_ikadin; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Tanggal Pengangkatan</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="tgl_p" value=" <?php echo $data_dasar->pengangkatan_tgl; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Homebase PT</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="dosen_pt" value=" <?php echo "$data_dasar->kd_pt $data_dasar->nm_pt"; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Homebase Prodi</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="prodi" value=" <?php echo "$data_dasar->kd_prodi $data_dasar->nm_prodi"; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Tempat dan Tanggal Lahir</label>
					<div class="col-10">
						<input class="form-control" type="text"  id="dosen_ttl" value=" <?php echo  "$data_dasar->lahir_tempat, $data_dasar->lahir_tgl"; ?>" readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Jenis Kelamin</label>
					<div class="col-10">
					<?php if($data_dasar->jk=='L'){$jk="Laki-Laki";} else {$jk="Perempuan";}; ?> 
						<input class="form-control" type="text"  id="dosen_jk" value="<?php echo $jk; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">Pendidikan Terakhir</label>
					<div class="col-10">                                                   
						<input class="form-control" type="text"  id="jenjang_id" value="<?php echo $data_dasar->nama_jenjang; ?> " readonly>
					</div>
				</div>
				<div class="form-group m-t-40 row">
					<label for="example-text-input" class="col-2 col-form-label">JAD Usulan</label>
					<div class="col-10">
						<input class="form-control" type="text"  name="jabatan_usulan_no" value="<?php echo $jad_usulan; ?>" readonly>
					</div>
					
				</div>
			</form>
			</div>
		</div>          

        <div class="card">
	<div class="card-header bg-info">
		<h4 class="m-b-0 text-white">Data Usulan Dosen</h4>
	</div>
	<div class="card-body">                              
		<div class="form-group m-t-40 row">
			<label for="example-text-input" class="col-2 col-form-label">Nomor Surat Usulan</label>
			<div class="col-10">
				<input class="form-control" type="text"  name="no_surat" value="<?php echo $data_dasar->no_surat; ?>"readonly>
			</div>
		</div>
		<div class="form-group m-t-40 row">
			<label for="example-text-input" class="col-2 col-form-label">Tanggal Surat Usulan</label>
			<div class="col-10">
				<input class="form-control" type="text"  name="tgl_surat" value="<?php echo $data_dasar->tgl_surat; ?>" readonly>
				<input class="form-control" type="hidden"  name="tempat_surat" value="Jakarta">
			</div>
		</div>
		
	</div>
</div>
                         
<div class="card">
	<div class="card-header bg-info">
		<h4 class="m-b-0 text-white">Data Pimpinan PT</h4>
	</div>
	<div class="card-body">                              
		<div class="form-group m-t-40 row">
			<label for="example-text-input" class="col-2 col-form-label">Nama dan Gelar</label>
			<div class="col-10">
				<input class="form-control" type="text"  name="pimpinan_nama" value="<?php echo "$data_dasar->pimpinan_nama"; ?>" readonly>
			</div>
		</div>
		<div class="form-group m-t-40 row">
			<label for="example-text-input" class="col-2 col-form-label">NIK/NIP</label>
			<div class="col-10">
				<input class="form-control" type="text"  name="pimpinan_nip" value="<?php echo $data_dasar->pimpinan_nip; ?> " readonly>
			</div>
		</div>
		<div class="form-group m-t-40 row">
			<label for="example-text-input" class="col-2 col-form-label">NIDN</label>
			<div class="col-10">
				<input class="form-control" type="text"  name="pimpinan_nidn" value="<?php echo $data_dasar->pimpinan_nidn; ?> " readonly>
			</div>
		</div>
		<div class="form-group m-t-40 row">
			<label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan</label>
			<div class="col-10">
			<select name="pimpinan_golongan_kode" class="select2 m-b-10 select2-multiple" style="width: 100%"  id="pimpinan_golongan_kode" disabled>
				<option value="<?php echo $nm_pimpinan_gol->kode; ?>"><?php echo $nm_pimpinan_gol->nm_golongan_pim; ?> golongan <?php echo $nm_pimpinan_gol->kode_gol; ?></option>
				<?php foreach($golongan->result() as $g) {?>
				<option value="<?php echo $g->kode; ?>"><?php echo $g->nama; ?> golongan <?php echo $g->kode_gol; ?></option>
				<?php } ?>
			</select>
			</div>
		</div>
		<div class="form-group m-t-40 row">
			<label for="example-text-input" class="col-2 col-form-label">Jabatan</label>
			<div class="col-10">
			<select name="pimpinan_jabatan" class="select2 m-b-10 select2-multiple" style="width: 100%"  id="pimpinan_jabatan" disabled>
				<option value="<?php echo $q_jabatan->id; ?>"><?php echo $q_jabatan->japim; ?></option>
				<?php foreach($jabatan->result() as $jab) {?>
				<option value="<?php echo $jab->id; ?>"><?php echo $jab->japim; ?></option>
				<?php } ?>
			</select>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header bg-info">
		<h4 class="m-b-0 text-white">Data Pimpinan Langsung Dosen</h4>
	</div>
	<div class="card-body">
	<div class="form-group m-t-40 row">
		<label for="example-text-input" class="col-2 col-form-label">Nama dan Gelar</label>
		<div class="col-10">
			<input class="form-control" type="text"  name="kaprodi_nama" value="<?php echo "$data_dasar->kaprodi_nama"; ?>" readonly>
		</div>
	</div>
	<div class="form-group m-t-40 row">
		<label for="example-text-input" class="col-2 col-form-label">NIK/NIP</label>
		<div class="col-10">
			<input class="form-control" type="text"  name="kaprodi_nip" value="<?php echo $data_dasar->kaprodi_nip; ?> " readonly>
		</div>
	</div>
	<div class="form-group m-t-40 row">
		<label for="example-text-input" class="col-2 col-form-label">NIDN</label>
		<div class="col-10">
			<input class="form-control" type="text"  name="kaprodi_nidn" value="<?php echo $data_dasar->kaprodi_nidn; ?> " readonly>
		</div>
	</div>
	<div class="form-group m-t-40 row">
		<label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan</label>
		<div class="col-10">
		<select name="kaprodi_golongan_kode" class="select2 m-b-10 select2-multiple" style="width: 100%"  id="kaprodi_golongan_kode" disabled>
			<option value="<?php echo $nm_kaprodi_gol->kode; ?>"><?php echo $nm_kaprodi_gol->nm_golongan_pim; ?> golongan <?php echo $nm_kaprodi_gol->kode_gol; ?></option>
            <?php foreach($golongan->result() as $g) {?>
            <option value="<?php echo $g->kode; ?>"><?php echo $g->nama; ?> golongan <?php echo $g->kode_gol; ?></option>
            <?php } ?>
		</select>
		</div>
	</div>
	<div class="form-group m-t-40 row">
		<label for="example-text-input" class="col-2 col-form-label">Jabatan</label>
		<div class="col-10">
		<select name="kaprodi_jabatan" class="select2 m-b-10 select2-multiple" style="width: 100%"  id="kaprodi_jabatan" disabled>
			<option value="<?php echo $q_kap_jabatan->id; ?>"><?php echo $q_kap_jabatan->japim; ?></option>
			<?php foreach($jabatan->result() as $jab) {?>
			<option value="<?php echo $jab->id; ?>"><?php echo $jab->japim; ?></option>
			<?php } ?>
		</select>
		</div>
	</div>
 
	</div>
</div>
                                   
                                    </div>                             
                                    <div class="tab-pane  p-20" id="mtk" role="tabpanel"></div>                                   
                                    <div class="tab-pane p-20" id="riwayat" role="tabpanel"></div>
                                    <div class="tab-pane p-20" id="bidang_A" role="tabpanel"></div>                             
                                    <div class="tab-pane  p-20" id="bidang_B" role="tabpanel"></div>
                                    <div class="tab-pane p-20" id="bidang_C" role="tabpanel"></div>
                                    <div class="tab-pane p-20" id="bidang_D" role="tabpanel"></div>                             
                                    <div class="tab-pane  p-20" id="ceklist" role="tabpanel"> </div>
                                    <div class="tab-pane p-20" id="resume" role="tabpanel"></div>
                                    <div class="tab-pane p-20" id="pak" role="tabpanel"></div>                             
                                    <div class="tab-pane  p-20" id="log" role="tabpanel"></div>
                                    
                                </div>
                            </div>
                        </div>
                      
                    <div class="card-body">                      
                    <?php if($data_dasar->usulan_status_id == '3' || $data_dasar->usulan_status_id == '4' || $data_dasar->usulan_status_id == '6' || $data_dasar->usulan_status_id == '7' ){                  
                     ?>
                   <button  class="btn btn-info" data-toggle="modal" id="myModalLabel" data-target="#updateStatusModal">Update Status</button>  
                    <?php } ?>                  
                    <a href="<?php echo base_url('ketenagaan/ketenagaan/'.$status_id); ?>" class="btn btn-success">Kembali</a>                                 
                    </div>
               
                </div>
                
            </div>
            
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script>


$(function() {
      $url ="<?php echo base_url('ketenagaan/ketenagaan/show_matakul/'.$no_usulan); ?>";
    $('#nav_mtk').click(function() {
        $('#mtk').load($url);
        $(this).removeClass('active'); 
    });
})

$(function() {
      $urlriwayat ="<?php echo base_url('ketenagaan/ketenagaan/show_pendidikan/'.$no_usulan); ?>";
    $('#nav_riwayat').click(function() {
        $('#riwayat').load($urlriwayat);
        $(this).removeClass('active'); 
      
    });
})

$(function() {
      $urlbidang ="<?php echo base_url('ketenagaan/ketenagaan/bidangA/'.$no_usulan); ?>";
    $('#nav_bid_a').click(function() {
        $('#bidang_A').load($urlbidang);
        $(this).removeClass('active'); 
      
    });
})
$(function() {
      $urlbidang_b ="<?php echo base_url('ketenagaan/ketenagaan/bidangB/'.$no_usulan); ?>";
    $('#nav_bid_b').click(function() {
        $('#bidang_B').load($urlbidang_b);
        $(this).removeClass('active'); 
      
    });
})
$(function() {
      $urlbidang_c ="<?php echo base_url('ketenagaan/ketenagaan/bidangC/'.$no_usulan); ?>";
    $('#nav_bid_c').click(function() {
        $('#bidang_C').load($urlbidang_c);
        $(this).removeClass('active'); 
      
    });
})
$(function() {
      $urlbidang_d ="<?php echo base_url('ketenagaan/ketenagaan/bidangD/'.$no_usulan); ?>";
    $('#nav_bid_d').click(function() {
        $('#bidang_D').load($urlbidang_d);
        $(this).removeClass('active'); 
      
    });
})
$(function() {
      $urlp ="<?php echo base_url('ketenagaan/ketenagaan/show_pak/'.$no_usulan); ?>";
    $('#nav_pak').click(function() {
        $('#pak').load($urlp);
        $(this).removeClass('active'); 
      
    });
})

$(function() {
      $urlresume ="<?php echo base_url('ketenagaan/ketenagaan/show_resume/'.$no_usulan); ?>";
    $('#nav_resume').click(function() {
        $('#resume').load($urlresume);
        $(this).removeClass('active'); 
      
    });
})

$(function() {
      $urlceklist ="<?php echo base_url('ketenagaan/ketenagaan/show_ceklist/'.$no_usulan); ?>";
    $('#nav_ceklist').click(function() {
        $('#ceklist').load($urlceklist);
        $(this).removeClass('active'); 
      
    });
})

$(function() {
      $urllog ="<?php echo base_url('ketenagaan/ketenagaan/show_riwayat/'.$no_usulan); ?>";
    $('#nav_log').click(function() {
        $('#log').load($urllog);
        $(this).removeClass('active'); 
      
    });
})
  </script>



  
<!-- UPDATE STATUS MODAL -->
<form id="updateStatusForm" method="post" action="<?= base_url()?>ketenagaan/ketenagaan/updateStatus/<?php echo $no_usulan; ?>" role="form" enctype="multipart/form-data">

<div class="modal fade" id="updateStatusModal" 
        role="dialog" 
        aria-labelledby="updateStatusModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <h4>Update Status Usulan JAD</h4>

                <div class="form-group">
                  <label for="status_sekarang">Status Saat Ini</label>
                  <input type="text" class="form-control" value="<?php echo $judul; ?>" readonly>
                  <input type="hidden" class="form-control" value="<?php echo $status_id; ?>" name="statusnya" readonly>
                  <input type="hidden" class="form-control" value="<?php echo $no_usulan; ?>" name="no_usulan" readonly>
                </div>

                <div class="form-group">
                  <label for="penilai">Tim Penilai </label>
                  <input type="hidden" class="form-control" value="<?php echo $data_dasar->user_penilai_no; ?>" name="id_penilai" readonly>
                  <input type="text" class="form-control" value="<?php echo $penilai->nama .' ('.$penilai->nama_instansi.')' ; ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="status_usulan">Status Update</label>
                  <select name="status_usulan" class="form-control select" id="status_usulan" data-placeholder="Click to Choose..." required>
                      <option value=""></option>
                  <?php if($data_dasar->usulan_status_id == '3' || $data_dasar->usulan_status_id == '4' || $data_dasar->usulan_status_id == '6' || $data_dasar->usulan_status_id == '7' ){

                  ?>
                      <option <?php if ($data_dasar->usulan_status_id == '2'  ) echo 'selected' ; ?>  value="2">Proses Revisi Usulan</option>
                       <?php }  if($data_dasar->usulan_status_id == '3' || $data_dasar->usulan_status_id == '4' ){ ?>
                      <option <?php if ($data_dasar->usulan_status_id == '5'  ) echo 'selected' ; ?> value="5" >Proses Tim Penilai</option>
                 
                      <?php }  if($data_dasar->usulan_status_id == '6' || $data_dasar->usulan_status_id == '7' ){ ?>
                      <option <?php if ($data_dasar->usulan_status_id == '7'  ) echo 'selected' ; ?> value="7" >Proses Dikti</option>
                      <option <?php if ($data_dasar->usulan_status_id == '8'  ) echo 'selected' ; ?> value="8" >Proses Operator Sub HKT</option>
                      <?php }?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="keterangan">Keterangan Internal</label>
                  <textarea name="keterangan" class="form-control" id="keterangan" rows="2"></textarea>
                </div>
                <?php if($data_dasar->usulan_status_id == '3') { 
                       $catatan=$this->db->query("SELECT * from usulan_riwayat_ptk where usulan_no='$no_usulan' and posting='0'")->result_array();
                       
                      ?>
                <div class="form-group">
                  <label for="keterangan_pengusul">Keterangan Untuk Instansi Pengusul</label>                 
                  <textarea name="keterangan_pengusul" class="form-control" id="keterangan_pengusul" rows="4" ><?php foreach($catatan as $cat_ptk) : echo $cat_ptk['keterangan'].'; '; endforeach;?></textarea>
                </div>
                       <?php  } else {?>

                 <div class="form-group">
                  <label for="keterangan_pengusul">Keterangan Untuk Instansi Pengusul</label>                 
                  <textarea name="keterangan_pengusul" class="form-control" id="keterangan_pengusul" rows="2" ></textarea>
                </div>
                <?php  } ?>

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


<!-- ADD PENILAI MODAL -->
<form id="addPenilaiForm" method="post" action="<?= base_url()?>ketenagaan/ketenagaan/updatePenilai/<?php echo $no_usulan; ?>" role="form" enctype="multipart/form-data" onsubmit="return cekSubmitAddPenilai()">

<div class="modal fade" id="addPenilaiModal" 
        role="dialog" 
        aria-labelledby="addPenilaiModalLabel" style="overflow:hidden;">
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

                <h3>Update Tim Penilai</h3>
                <hr>

                <div class="form-group">
                  <label for="penilai">Tim Penilai </label>
                  <input type="text" class="form-control" value="<?php echo $penilai->nama .' ('.$penilai->nama_instansi.')' ; ?>" readonly>
                  <input type="hidden" class="form-control" value="<?php echo $no_usulan; ?>" name="no_usulan" readonly>
                  <input type="hidden" name="usulan_status_id" value="<?php echo $data_dasar->usulan_status_id; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="user_penilai_no">Pilih Penilai</label>
                    <select class="form-control select2" style="width: 100%; height:36px;"  id="caripenilai" name="caripenilai" required>

                    <?php
                    echo '<option value="" disabled selected hidden>Click to Choose...</option>';


                    foreach ($caripenilai->result() as $row)
                        { 
                        echo '<option value="' . $row->no_penilai . '">' . $row->nama . ' ('.$row->nama_instansi.')'.'</option>';
                    ?>	
                            <?php
                    }
                    echo '</select>';
                    ?>

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



<!-- <script>
  function cekSubmitAddPenilai(){
        var r = confirm('Update tim penilai?');
        if(r){
            $('button[type=submit], input[type=submit]').prop('disabled',true);
            return true;
        } else {
            return false;   
        }
    }
</script> -->


