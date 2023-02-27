<div class="row">
    <div class="col-12">
        <div class="tab-content tabcontent-border">
            <div class="card">
                <div class="card-header bg-info"></div>
                <div class="card-body">
                    <h4 class="card-title">Data Dosen LLDIKTI III</h4>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#identitas" role="tab"><span class="hidden-sm-up"><i class=" ti-user"></i></span> <span class="hidden-xs-down">Identitas</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#rwy_pendidikan" role="tab"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#rwy_ajar" role="tab"><span class="hidden-sm-up"><i class="ti-briefcase"></i></span> <span class="hidden-xs-down">Riwayat Pengajaran</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active" id="identitas" role="tabpanel">
                            <form class="form" method="post" action="<?= base_url(); ?>ketenagaan/ketenagaan/update_data_dosen" role="form" enctype="multipart/form-data">
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">NIDN</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="nidn" value="<?= $nidn ?>" readonly required>
                                    </div>
                                </div>
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="nama" value="<?= $nama ?>" readonly required>
                                    </div>
                                </div>
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Perguruan Tinggi</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="nama_instansi" value="<?= $nm_pt ?> ( <?= $kode_pt ?>)" readonly required>
                                        <input class="form-control" type="hidden" name="instansi_kode" value="<?= $kode_pt ?>" readonly required>
                                    </div>
                                </div>
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Program Studi</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="nama_prodi" value="<?= $nm_prodi ?>" readonly required>
                                    </div>
                                </div>
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Jabatan Akademik</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="nama_jabatans" value="<?= $dajab->nama_jabatans ?> (<?= $dajab->kum ?>)" readonly>
                                    </div>
                                </div>
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Status Pegawai</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="nama_ikatan" value="<?= $daikatan->nama_ikatan ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Pangkat</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="nama_gol" value="<?= $dagol->nama ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Golongan</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="kode_gol" value="<?= $dagol->kode_gol ?>" readonly>
                                    </div>
                                </div>
                                <!-- <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Nomor Sertifikat Pendidik</label>
                                    <div class="col-10">
                                        <input class="form-control" type="number" name="no_sertifikat" value="<?= $sql->no_serdik ?>" readonly>
                                    </div>
                                </div> -->

                                <center><button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Update Data Dosen</button></center>
                            </form>
                        </div>

                        <div class="tab-pane p-20" id="rwy_pendidikan" role="tabpanel">
                            <table class="table color-table info-table" border="1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Perguruan Tinggi</th>
                                        <th>Jenjang</th>
                                        <th>Bidang Ilmu</th>
                                        <th>Tahun Lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $urut = 1;
                                    $ipen = file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/pendidikan_dosen.php?nidn=' . $nidn);
                                    $hapen = json_decode($ipen, true);
                                    foreach ($hapen as $pen) {
                                    ?>
                                        <tr>
                                            <td><?= $urut; ?></td>
                                            <td><?= $pen['pt'] ?></td>
                                            <td><?= $pen['jenjang_didik']['nama'] ?></td>
                                            <td><?= $pen['bidang_studi']['nama'] ?></td>
                                            <td><?= $pen['thn_lulus'] ?></td>
                                        </tr>
                                    <?php
                                        $urut++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane p-20" id="rwy_ajar" role="tabpanel">
                            <table width="100%" class="table color-table info-table" border="1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>SEMESTER</th>
                                        <th>KODE MATAKULIAH</th>
                                        <th>MATA KULIAH</th>
                                        <th>KODE KELAS</th>
                                        <th>PERGURUAN TINGGI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nom = 1;
                                    $imeng = file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/mengajar.php?nidn=' . $nidn);
                                    $hameng = json_decode($imeng, true);
                                    foreach ($hameng as $aj) {
                                    ?>
                                        <tr>
                                            <td><?= $nom; ?></td>
                                            <td><?= $aj['semester'] ?></td>
                                            <td><?= $aj['kode_mk'] ?></td>
                                            <td><?= $aj['nama_mk'] ?></td>
                                            <td><?= $aj['kelas'] ?></td>
                                            <td><?= $aj['pt']['nama'] ?></td>
                                        </tr>
                                    <?php
                                        $nom++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>