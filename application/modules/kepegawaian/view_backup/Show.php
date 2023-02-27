<?php
error_reporting(0);
?>

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
                <?php if($data_dasar->usulan_status_id == '8'){                  
                     ?>
                   <button  class="btn btn-info" data-toggle="modal" id="myModalLabel" data-target="#updateStatusModal">Update Status</button>  
                    
                    <?php } ?>
                    <a href="<?php echo base_url('kepegawaian/kepegawaian/'.$status_id); ?>" class="btn btn-success">Kembali</a>  
                    <?php ?>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $judul; ?></h4>
                                <h6 class="card-subtitle"><?php echo $data_dasar->nip; ?> </code></h6>
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
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_pak"  href="#pak" role="tab"><span class="hidden-sm-up"><i class="ti-ruler-pencil "></i></span> <span class="hidden-xs-down">SK</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="nav_log"  href="#log" role="tab"><span class="hidden-sm-up"><i class="ti-ruler-pencil "></i></span> <span class="hidden-xs-down">Log</span></a> </li>
                                  
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                <?php $no_usulan=$data_dasar->no ; ?>
                               
                                    <div class="tab-pane active p-20" id="dasar" role="tabpanel" >

            <div class="card">
         
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Dosen   </h4>
                            </div>
                         <div class="card-body">                              
                                <h6 class="card-subtitle"> Detail Dosen </h6>
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
                                            <input class="form-control" type="text"  id="nama" value=" <?php echo $data_dasar->nama; ?> " readonly>
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
                                            <input class="form-control" type="text"  id="ikadin" value=" <?php echo $data_dasar->nama_ikatan; ?> " readonly>
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
                                            <input class="form-control" type="text"  id="dosen_pt" value=" <?php echo "$data_dasar->instansi_kode $data_dasar->nama_instansi"; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Homebase Prodi</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="prodi" value=" <?php echo "$data_dasar->prodi_kode $data_dasar->nama_prodi"; ?> " readonly>
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
                                        <label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan Terakhir</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="dosen_golongan" value="<?php echo  "$nm_gol->nm_golongan, $data_dasar->golongan_tgl"; ?>" readonly>
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
                                <h6 class="card-subtitle"> Detail Usulan Dosen</h6>
                                <form class="form">
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Masa Penilaian</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="masa_penilaian_awal" value="<?php echo "$data_dasar->masa_penilaian_awal  s/d  $data_dasar->masa_penilaian_akhir"; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Nomor Surat Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="no_surat" value=" <?php echo $data_dasar->no_surat; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Tanggal Surat Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="tgl_surat" value=" <?php echo $data_dasar->tgl_surat; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Tempat Kota Surat Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="tempat_surat" value=" <?php echo $data_dasar->tempat_surat; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Pendidikan Terakhir Yang Diperhitungkan Angka Kreditnya</label>
                                        <div class="col-10">                                                   
                                            <input class="form-control" type="text"  id="jenjang_id" value="<?php echo $nm_jen_akhir; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Bidang Ilmu Yang Diperhitungkan Angka Kreditnya</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="bidang_ilmu_kode" value="<?php echo "$bidil_jad->kode - $bidil_jad->nama_bidang"; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">JAD Terakhir</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="jabatan_no" value=" <?php echo  "$jad_akhir, $data_dasar->jabatan_tgl"; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Masa Kerja JAD Terakhir</label>
                                        <div class="col-2">
                                            <span class="pull-left">Tahun</span>
                                          </div>
                                          <div class="col-3">
                                              <input type="text" class="form-control" id="jabatan_tahun_bulan" value="<?php echo $data_dasar->tmt_tahun; ?>" min="0" readonly>
                                          </div>
                                            <div class="col-2">
                                              <span class="pull-left">Bulan</span>
                                            </div>
                                            <div class="col-3">
                                              <input type="text" class="form-control" id="jabatan_tahun_bulan" value="<?php echo $data_dasar->tmt_bulan; ?>" min="0" readonly>
                                            </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">JAD Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="jabatan_usulan_no" value=" <?php echo $jad_usulan; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Keterangan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="keterangan" value=" <?php echo $data_dasar->user_pengusul_keterangan; ?> " readonly>
                                        </div>
                                    </div>
                                   
                          
                                </form>
                            </div>
                            </div>
                         
                            <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Pimpinan PT/Prodi Pengusul</h4>
                            </div>
                         <div class="card-body">                              
    
                                <form class="form">
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nama" value="<?php echo "$data_dasar->pimpinan_nama"; ?>" readonly>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIK/NIP</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nip" value=" <?php echo $data_dasar->pimpinan_nip; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIDN</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nidn" value=" <?php echo $data_dasar->pimpinan_nidn; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_golongan_kode" value=" <?php echo $nm_pimpinan_gol->nm_golongan_pim; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Jabatan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_jabatan" value=" <?php echo $data_dasar->pimpinan_jabatan; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Unit Kerja</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_unit_kerja" value=" <?php echo $data_dasar->pimpinan_unit_kerja; ?> " readonly>
                                        </div>
                                    </div>
                                   
                          
                                </form>
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
                    <?php if($data_dasar->usulan_status_id == '8'){                  
                     ?>
                   <button  class="btn btn-info" data-toggle="modal" id="myModalLabel" data-target="#updateStatusModal">Update Status</button>  
                    <?php } ?>                  
                    <a href="<?php echo base_url('kepegawaian/kepegawaian/'.$status_id); ?>" class="btn btn-success">Kembali</a>                                 
                    </div>
               
                </div>
                
            </div>
            
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script>


$(function() {
      $url ="<?php echo base_url('kepegawaian/kepegawaian/show_matakul/'.$no_usulan); ?>";
    $('#nav_mtk').click(function() {
        $('#mtk').load($url);
      
    });
})

$(function() {
      $urlriwayat ="<?php echo base_url('kepegawaian/kepegawaian/show_pendidikan/'.$no_usulan); ?>";
    $('#nav_riwayat').click(function() {
        $('#riwayat').load($urlriwayat);
      
    });
})

$(function() {
      $urlbidang ="<?php echo base_url('kepegawaian/kepegawaian/bidangA/'.$no_usulan); ?>";
    $('#nav_bid_a').click(function() {
        $('#bidang_A').load($urlbidang);
      
    });
})
$(function() {
      $urlbidang_b ="<?php echo base_url('kepegawaian/kepegawaian/bidangB/'.$no_usulan); ?>";
    $('#nav_bid_b').click(function() {
        $('#bidang_B').load($urlbidang_b);
      
    });
})
$(function() {
      $urlbidang_c ="<?php echo base_url('kepegawaian/kepegawaian/bidangC/'.$no_usulan); ?>";
    $('#nav_bid_c').click(function() {
        $('#bidang_C').load($urlbidang_c);
      
    });
})
$(function() {
      $urlbidang_d ="<?php echo base_url('kepegawaian/kepegawaian/bidangD/'.$no_usulan); ?>";
    $('#nav_bid_d').click(function() {
        $('#bidang_D').load($urlbidang_d);
      
    });
})
$(function() {
      $urlpak ="<?php echo base_url('kepegawaian/kepegawaian/show_pak/'.$no_usulan); ?>";
    $('#nav_pak').click(function() {
        $('#pak').load($urlpak);
      
    });
})

$(function() {
      $urlresume ="<?php echo base_url('kepegawaian/kepegawaian/show_resume/'.$no_usulan); ?>";
    $('#nav_resume').click(function() {
        $('#resume').load($urlresume);
      
    });
})

$(function() {
      $urlceklist ="<?php echo base_url('kepegawaian/kepegawaian/show_ceklist/'.$no_usulan); ?>";
    $('#nav_ceklist').click(function() {
        $('#ceklist').load($urlceklist);
      
    });
})

$(function() {
      $urllog ="<?php echo base_url('kepegawaian/kepegawaian/show_log/'.$no_usulan); ?>";
    $('#nav_log').click(function() {
        $('#log').load($urllog);
      
    });
})
  </script>

  



  
<!-- UPDATE STATUS MODAL -->
<form id="updateStatusForm" method="post" action="<?= base_url()?>kepegawaian/kepegawaian/updateStatus/<?php echo $no_usulan; ?>" role="form" enctype="multipart/form-data">

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
                  <label for="status_usulan">Status Update</label>
                  <select name="status_usulan" class="form-control select" id="status_usulan" data-placeholder="Click to Choose..." required>
                      <option value=""></option>
                      <?php if($data_dasar->usulan_status_id == '8'){

                        ?>
                         <option value="6">Proses Operator Sub PTK</option>
                         <option value="9">Proses Selesai</option>
                     <?php }?>
                    </select>
                    </div>

                <div class="form-group">
                  <label for="keterangan">Keterangan Internal</label>
                  <textarea name="keterangan" class="form-control" id="keterangan" rows="2"></textarea>
                </div>

                <div class="form-group">
                  <label for="keterangan_pengusul">Keterangan Untuk Instansi Pengusul</label>
                  <textarea name="keterangan_pengusul" class="form-control" id="keterangan_pengusul" rows="2"></textarea>
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


<!-- ADD PENILAI MODAL -->
<form id="addPenilaiForm" method="post" action="<?= base_url()?>kepegawaian/kepegawaian/updatePenilai/<?php echo $no_usulan; ?>" role="form" enctype="multipart/form-data" onsubmit="return cekSubmitAddPenilai()">

<div class="modal fade" id="addPenilaiModal" 
        role="dialog" 
        aria-labelledby="addPenilaiModalLabel">
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



<script>
modal.on('shown.bs.modal', function () {
	modal.find('select.select2').select2({
		placeholder: "Select",
		width: 'auto', 
		allowClear: true
	});
});
</script>
<script>
  function cekSubmitAddPenilai(){
        var r = confirm('Update tim penilai?');
        if(r){
            $('button[type=submit], input[type=submit]').prop('disabled',true);
            return true;
        } else {
            return false;   
        }
    }
</script>

