<div class="card">
    <div class="card-body">
        <center>
            <h3>Rekap Ajuan Usulan Dosen</h3>
        </center>
        <hr>
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" id="jml_usulan">
                            <center>
                                <h1><i class="icon-screen-desktop"></i>
                                    <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan"><?= $jml_us->jml ?></a>
                                </h1>
                                <h3 class="text-muted">Total Usulan yang masuk ke LLDIKTI</h3>
                            </center>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-docs"></i></h3>
                                    <p class="text-muted">Usulan Baru</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/1"><?= $jml_us_baru->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">Validasi Persyaratan Administrasi</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/9"><?= $jml_val_adm->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-note"></i></h3>
                                    <p class="text-muted">Proses Penilaian</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/2"><?= $jml_penilai->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-share-alt"></i></h3>
                                    <p class="text-muted">Pending Penilaian</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/3"><?= $jml_pen_penilai->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">Sub HST</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/4"><?= $jml_ptk->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">Validasi PAK</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/10"><?= $jml_val_pak->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">Proses Cetak & Pengesahan Pimpinan</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/5"><?= $jml_hkt->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">Proses Dikti</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/6"> <?= $jml_dikti->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">Diusulkan Ke Dikti</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-info">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/8"> <?= $jml_us_dikti->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-paper-plane"></i></h3>
                                    <p class="text-muted">Selesai</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-info">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/7"> <?= $jml_selesai->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-paper-plane"></i></h3>
                                    <p class="text-muted">Revisi PAK</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-info">
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/pimpinan/tampil_usulan_pimpinan/11"> <?= $jml_ralat->jml ?></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>