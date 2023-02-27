<?php
error_reporting(0);
?>

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Usulan JAD : 
						<?php
						if($data_dasar->usulan_status_id =='1')
						{
							echo "Draft";
						}elseif($data_dasar->usulan_status_id =='2')
						{
							echo "Draft Revisi";
						}elseif($data_dasar->usulan_status_id =='3')
						{
							echo "Usulan Baru";
						}elseif($data_dasar->usulan_status_id =='4')
						{
							echo "Proses Approval Tim Penilai";
						}elseif($data_dasar->usulan_status_id =='5')
						{
							echo "Proses Penilaian";
						}elseif($data_dasar->usulan_status_id =='6')
						{
							echo "Proses Operator Ketenagaan";
						}elseif($data_dasar->usulan_status_id =='7')
						{
							echo "Proses Dikti";
						}elseif($data_dasar->usulan_status_id =='8')
						{
							echo "Proses Operator Kepegawaian";
						}else
						{
							echo "Selesai";
						}
						?>
						</h4>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
						   <div class="card-body">
                                <!-- <h4 class="card-title"><?php echo $judul; ?></h4>
                                <h6 class="card-subtitle"><?php echo $data_dasar->nip; ?> </code></h6> -->
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" id="nav_dasar" href="#dasar" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link " href="<?= base_url()?>penilai/penilai/show_matakul/<?php echo $data_dasar->no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/show_pendidikan/<?php echo $data_dasar->no; ?>" ><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangA/<?php echo $data_dasar->no; ?>" ><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangB/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangC/<?php echo $data_dasar->no;?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangD/<?php echo $data_dasar->no;?>" role="tab"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/persyaratan/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/show_resume/<?php echo $data_dasar->no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
                                   
                            
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                <?php $no_usulan=$data_dasar->no; ?>
                                    <div class="tab-pane active p-20" id="dasar" role="tabpanel" >

<div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Dosen  </h4>
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
                                    <!-- <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan Terakhir</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="dosen_golongan" value="<?php echo  "$nm_gol->nm_golongan, $data_dasar->golongan_tgl"; ?>" readonly>
                                        </div>
                                    </div> -->
                          
                                </form>
                            </div>
                            </div>
                         
                            <!-- <form action="<?php echo base_url().'usulan/usulan/update_usulan/'.$data_dasar->no ?>" method="post" enctype="multipart/form-data" class="validation-wizard" id="form-submit"> -->
                            <form action="<?php echo base_url().'usulan/usulan/update_usulan/'.$data_dasar->no ?>" method="post" enctype="multipart/form-data" >
          <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Usulan Dosen</h4>
                            </div>
                         <div class="card-body">                              
									<div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Nomor Surat Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  name="no_surat" value="<?php echo $data_dasar->no_surat; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Tanggal Surat Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="date"  name="tgl_surat" value="<?php echo $data_dasar->tgl_surat; ?>">
                                        </div>
                                    </div>
                                   
                                            <input class="form-control" type="hidden"  name="tempat_surat" value="Jakarta">
                                        
                                    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
 
        window.onload=function(){
            $('#datepicker').on('change', function() {
                var tanggal_awal = (this.value);
                var today = new Date();
                var tanggal_sekarang = moment().format('YYYY-MM-DD');
                var tanggal_awal_moment = moment(tanggal_awal,'YYYY-MM-DD');
  var tanggal_sekarang_moment = moment(tanggal_sekarang,'YYYY-MM-DD');
  var selisih_tahun = tanggal_sekarang_moment.diff(tanggal_awal_moment,'years');
  var selisih_bulan = tanggal_sekarang_moment.diff(tanggal_awal_moment,'months');
  var selisih_hari = tanggal_sekarang_moment.diff(tanggal_awal_moment,'days');
  var date_add_tahun =  tanggal_awal_moment.add(selisih_tahun,'years');
  var new_selisih_bulan = tanggal_sekarang_moment.diff(date_add_tahun,'months');
  var date_add_bulan =  date_add_tahun.add(new_selisih_bulan,'months');
  var new_selisih_hari = tanggal_sekarang_moment.diff(date_add_bulan,'days');
  var beda_bulan = new_selisih_bulan;
  var beda_tahun = selisih_tahun;
                $('#umur').val(beda_tahun);
                $('#bulan').val(beda_bulan);
            });
        }
    </script>
           <!-- <div class="form-group">
                <label for="jabatan_tgl">TMT JAD Terakhir</label>
                <input type="date" id="datepicker" name="tmt_tgl" class="form-control required pull-right date-picker">
            </div> 
            <div class="form-group">
                <label for="jabatan_tahun_bulan">Masa Kerja JAD Terakhir</label>
                <div class="row">
                  <div class="col-md-3">
                    <span class="pull-right">Tahun</span>
                  </div>
                  <div class="col-md-3">
                      <input type="text" name="tmt_tahun" class="form-control required" id="umur"  min="0" >
                  </div>
                  <div class="col-md-3">
                    <span class="pull-right">Bulan</span>
                  </div>
                  <div class="col-md-3">
                    <input type="text" name="tmt_bulan" class="form-control required" id="bulan" min="0" >
                  </div>
                </div>
            </div> -->

                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">JAD Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  name="jabatan_usulan_no" value=" <?php echo $jad_usulan; ?> " readonly>
                                        </div>
                                    </div>
                                    <!--<div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Keterangan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="keterangan" value=" <?php echo $data_dasar->user_pengusul_keterangan; ?> ">
                                        </div>
                                    </div>-->
                                   
                          
                                
                            </div>
                            </div>
                         
                            <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Pimpinan PT</h4>
                            </div>
                         <div class="card-body">                              
    
                                
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  name="pimpinan_nama" value="<?php echo "$data_dasar->pimpinan_nama"; ?>">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIK/NIP</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  name="pimpinan_nip" value="<?php echo $data_dasar->pimpinan_nip; ?> ">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIDN</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  name="pimpinan_nidn" value="<?php echo $data_dasar->pimpinan_nidn; ?> ">
                                        </div>
                                    </div>
                <div class="form-group m-t-40 row">
                    <label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan</label>
                    <div class="col-10">
                    <select name="pimpinan_golongan_kode" class="select2 m-b-10 select2-multiple" style="width: 100%"  id="pimpinan_golongan_kode">
               
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
                                        <select name="pimpinan_jabatan" class="select2 m-b-10 select2-multiple" style="width: 100%"  id="pimpinan_jabatan" >
               
               <option value="<?php echo $q_jabatan->id; ?>"><?php echo $q_jabatan->japim; ?></option>
               <?php foreach($jabatan->result() as $jab) {?>
                       <option value="<?php echo $jab->id; ?>"><?php echo $jab->japim; ?></option>
                      
                       <?php } ?>
           </select>
                                        </div>
                                    </div>
                                    <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Prodi Pengusul</h4>
                            </div>
                         <div class="card-body">                              
    
                                
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  name="kaprodi_nama" value="<?php echo "$data_dasar->kaprodi_nama"; ?>">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIK/NIP</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  name="kaprodi_nip" value="<?php echo $data_dasar->kaprodi_nip; ?> ">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIDN</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  name="kaprodi_nidn" value="<?php echo $data_dasar->kaprodi_nidn; ?> ">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                    <label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan</label>
                    <div class="col-10">
                    <select name="kaprodi_golongan_kode" class="select2 m-b-10 select2-multiple" style="width: 100%"  id="kaprodi_golongan_kode">
               
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
                                        <select name="kaprodi_jabatan" class="select2 m-b-10 select2-multiple" style="width: 100%"  id="kaprodi_jabatan" >
               
               <option value="<?php echo $q_kap_jabatan->id; ?>"><?php echo $q_kap_jabatan->japim; ?></option>
               <?php foreach($jabatan->result() as $jab) {?>
                       <option value="<?php echo $jab->id; ?>"><?php echo $jab->japim; ?></option>
                      
                       <?php } ?>
           </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
		 <div class="text-xs-right">
         <?php if($role == '3'){ }else{?>
			<button type="submit" class="btn btn-info">Submit</button>
			<button type="reset" class="btn btn-inverse">Cancel</button>
            <?php  }?>
		</div>
	</div> 
                                </form>
                            </div>
                            </div>                            
                                   
                                    </div>                             
                                   
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script>


$(function() {
      $url ="<?php echo base_url('usulan/usulan/show_matakul/'.$no_usulan); ?>";
    $('#nav_mtk').click(function() {
        $('#mtk').load($url);
      
    });
})

$(function() {
      $urlriwayat ="<?php echo base_url('usulan/usulan/show_pendidikan/'.$no_usulan); ?>";
    $('#nav_riwayat').click(function() {
        $('#riwayat').load($urlriwayat);
      
    });
})

$(function() {
      $urlbidang ="<?php echo base_url('usulan/usulan/bidangA/'); ?>";
    $('#nav_bid_a').click(function() {
        $('#bidang_A').load($urlbidang);
      
    });
})
$(function() {
      $urlbidang_b ="<?php echo base_url('usulan/usulan/bidangB/'); ?>";
    $('#nav_bid_b').click(function() {
        $('#bidang_B').load($urlbidang_b);
      
    });
})
$(function() {
      $urlbidang_c ="<?php echo base_url('usulan/usulan/bidangC/'); ?>";
    $('#nav_bid_c').click(function() {
        $('#bidang_C').load($urlbidang_c);
      
    });
})
$(function() {
      $urlbidang_d ="<?php echo base_url('usulan/usulan/bidangD/'); ?>";
    $('#nav_bid_d').click(function() {
        $('#bidang_D').load($urlbidang_d);
      
    });
})
  </script>

 
<!-- Modal Tambah-->
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="tambah" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url(); ?>usulan/usulan/proses_usulanbaru/<?php echo $data_dasar->no; ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>Anda yakin akan mengirim usulan baru ?</h3>
                <?php if($data_dasar->usulan_status_id=='1'){ ?>
                <input type="hidden" name="usulan_status" value="10">
                <input type="hidden" name="usulan_ket" value="Pengajuan Usulan Baru">
                <?php }elseif($data_dasar->usulan_status_id=='10'){ ?>
                <input type="hidden" name="usulan_status" value="3">
                <input type="hidden" name="usulan_ket" value="Pengajuan Usulan Baru">
                <?php } elseif($data_dasar->usulan_status_id=='2'){  ?>
                <input type="hidden" name="usulan_status" value="10">
                <input type="hidden" name="usulan_ket" value="Pengajuan Usulan Baru Yang Telah Direvisi">
                <?php } ?>
                <!--<hr>
				<div class="row">
				<div class="col-md-12">
                <div class="form-group">
					  <label for="keterangan">Keterangan</label>
					  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
				</div>
				</div>
				</div>-->
            </div>
            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">KIRIM</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                </div>
            </div>
		</form>
	</div>
</div>
</div>


<!-- Modal Revisi-->
<div class="modal fade"  aria-labelledby="myLargeModalLabel1" id="revisi" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url(); ?>usulan/usulan/proses_usulanbaru/<?php echo $data_dasar->no; ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>Revsi Draft</h3>
                
                <input type="hidden" name="usulan_status" value="2">
                <!-- <input type="text" name="usulan_ket" value="Pengajuan Usulan Baru"> -->
                <label for="keterangan">Keterangan</label>
                <textarea name="usulan_ket" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
                <!--<hr>
				<div class="row">
				<div class="col-md-12">
                <div class="form-group">
					  <label for="keterangan">Keterangan</label>
					  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
				</div>
				</div>
				</div>-->
            </div>
            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">KIRIM</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                </div>
            </div>
		</form>
	</div>
</div>
</div>
