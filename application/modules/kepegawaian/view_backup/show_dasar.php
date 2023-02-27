<?php
error_reporting(0);
?>

            <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Data Dosen</h4>
                            </div>
                         <div class="card-body">                              
                                <h6 class="card-subtitle"> Detail Dosen</h6>
                                <form class="form">
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIDN/NIDK</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="nidn" value="<?php echo "$data_dasar->nidn/$data_dasar->nidk"; ?>" readonly>
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
                                            <input class="form-control" type="text"  id="dosen_ttl" value=" <?php echo  "$data_dasar->lahir_tempat $data_dasar->lahir_tgl"; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-10">
                                        <?php  if(($data_dasar->jk)=='L'){ $jk="Laki-Laki"; } else { $jk="Perempuan"; } ; ?> 
                                            <input class="form-control" type="text"  id="dosen_jk"  value=" <?php echo $jk; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan Terakhir</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="dosen_golongan"  readonly>
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
                                            <input class="form-control" type="text"  id="masa_penilaian_awal" value="<?php echo "$data_dasar->nidn /$data_dasar->nidk"; ?>" readonly>
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
                                            <input class="form-control" type="text"  id="jenjang_id" value=" <?php echo $data_dasar->gelar_depan; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Bidang Ilmu Yang Diperhitungkan Angka Kreditnya</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="bidang_ilmu_kode" value=" <?php echo $data_dasar->gelar_belakang; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">JAD Terakhir</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="jabatan_no" value=" <?php echo $data_dasar->nm_ikadin; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Masa Kerja JAD Terakhir</label>
                                        <div class="col-2">
                                            <span class="pull-left">Tahun</span>
                                          </div>
                                          <div class="col-3">
                                              <input type="text" class="form-control" id="jabatan_tahun_bulan" value="" min="0" readonly>
                                          </div>
                                            <div class="col-2">
                                              <span class="pull-left">Bulan</span>
                                            </div>
                                            <div class="col-3">
                                              <input type="text" class="form-control" id="jabatan_tahun_bulan" value="" min="0" readonly>
                                            </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">JAD Usulan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="jabatan_usulan_no" value=" <?php echo "$data_dasar->kode_pt $data_dasar->nm_pt"; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Keterangan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="keterangan" value=" <?php echo "$data_dasar->prodi_kode $data_dasar->nm_prodi"; ?> " readonly>
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
                                        <label for="example-text-input" class="col-2 col-form-label">Data Pimpinan PT/Prodi Pengusul</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nama" value="<?php echo "$data_dasar->nidn /$data_dasar->nidk"; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nama" value=" <?php echo $data_dasar->nip; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIK/NIP</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nip" value=" <?php echo $data_dasar->karpeg; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">NIDN</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_nidn" value=" <?php echo $data_dasar->nm_dosen; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Pangkat/Golongan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_golongan_kode" value=" <?php echo $data_dasar->gelar_depan; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Jabatan</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_jabatan" value=" <?php echo $data_dasar->gelar_belakang; ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">Unit Kerja</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"  id="pimpinan_unit_kerja" value=" <?php echo $data_dasar->nm_ikadin; ?> " readonly>
                                        </div>
                                    </div>
                                   
                          
                                </form>
                            </div>
                            </div>