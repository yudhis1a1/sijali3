
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Ketenagaan</a></li>                               
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Detail</a></li>
                                
                            </ol>
                            
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Data Usulan</h4>
                                
                                <!-- Nav tabs -->
                                
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                <!-- <?php $no_usulan=$data_dasar->no; ?> -->
                                    <div class="tab-pane active p-20" id="dasar" role="tabpanel" >

            <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Dosen  </h4>
                            </div>
                         <div class="card-body">                              
                                <h6 class="card-subtitle"> Detail Dosen</h6>
                                <form method="post" action="">
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
                                            <input class="form-control" type="text"  id="jenjang_id" value="<?php echo $nm_jen_akhir; ?> " readonly>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan Terakhir</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="dosen_golongan" value="<?php echo  "$nm_gol->nm_golongan, $data_dasar->golongan_tgl"; ?>" readonly>
                                        </div>
                                    </div> -->
                          
                               
                            </div>
                            </div>
                         

          <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Usulan Dosen</h4>
                            </div>
                         <div class="card-body">                              
                                <h6 class="card-subtitle"> Detail Usulan Dosen</h6>
                                
                                    <!-- <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Masa Penilaian</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="masa_penilaian_awal" value="<?php echo "$data_dasar->masa_penilaian_awal  s/d  $data_dasar->masa_penilaian_akhir"; ?>" readonly>
                                        </div>
                                    </div> -->
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Nomor Surat Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="no_surat" value=" <?php echo $data_dasar->no_surat; ?> " >
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Tanggal Surat Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="tgl_surat" value=" <?php echo $data_dasar->tgl_surat; ?> " >
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Tempat Kota Surat Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="tempat_surat" value=" <?php echo $data_dasar->tempat_surat; ?> " >
                                        </div>
                                    </div>
                                    <!-- <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Pendidikan Terakhir Yang Diperhitungkan Angka Kreditnya</label>
                                        <div class="col-10">                                                   
                                            <input class="form-control" type="text"  id="jenjang_id" value="<?php echo $nm_jen_akhir; ?> " >
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Bidang Ilmu Yang Diperhitungkan Angka Kreditnya</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="bidang_ilmu_kode" value="<?php echo "$bidil_jad->kode - $bidil_jad->nama"; ?> " >
                                        </div>
                                    </div> -->
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">JAD Terakhir</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="jabatan_no" value=" <?php echo  "$jad_akhir, $data_dasar->jabatan_tgl"; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Masa Kerja JAD Terakhir</label>
                                        <div class="col-2">
                                            <span class="pull-left">Tahun</span>
                                          </div>
                                          <div class="col-3">
                                              <input type="text" class="form-control" id="jabatan_tahun_bulan" value="<?php echo $data_dasar->tmt_tahun; ?>" min="0" >
                                          </div>
                                            <div class="col-2">
                                              <span class="pull-left">Bulan</span>
                                            </div>
                                            <div class="col-3">
                                              <input type="text" class="form-control" id="jabatan_tahun_bulan" value="<?php echo $data_dasar->tmt_bulan; ?>" min="0" >
                                            </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">JAD Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="jabatan_usulan_no" value=" <?php echo $jad_usulan; ?> " >
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Keterangan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="keterangan" value=" <?php echo $data_dasar->user_pengusul_keterangan; ?> " >
                                        </div>
                                    </div>
                                   
                          
                               
                            </div>
                            </div>
                         
                            <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Pimpinan PT/Prodi Pengusul</h4>
                            </div>
                         <div class="card-body">                              
    
                                
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nama" value="<?php echo "$data_dasar->pimpinan_nama"; ?>" >
                                        </div>
                                    </div>
                                  
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIK/NIP</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nip" value=" <?php echo $data_dasar->pimpinan_nip; ?> " >
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIDN</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nidn" value=" <?php echo $data_dasar->pimpinan_nidn; ?> " >
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_golongan_kode" value=" <?php echo $nm_pimpinan_gol->nm_golongan_pim; ?> " >
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Jabatan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_jabatan" value=" <?php echo $data_dasar->pimpinan_jabatan; ?> " >
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Unit Kerja</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_unit_kerja" value=" <?php echo $data_dasar->pimpinan_unit_kerja; ?> " >
                                        </div>
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary">Submit</button>
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


  