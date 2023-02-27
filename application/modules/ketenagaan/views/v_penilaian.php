<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Ketenagaan</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Ketenagaan</a></li>
                <li class="breadcrumb-item active">Proses Penilaian</li>
            </ol>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Proses Penilaian</h4>
                <div class="table-responsive m-t-40">
                    <table id="tablePenilaian" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px"><i class="fa  fa icon-screen-desktop  "></i></th>
                                <th>NIDN / NIDK</th>
                                <th>Nama</th>
                                <th>Usia Dosen (Tahun)</th>
                                <th>Homebase</th>
                                <th>Prodi</th>
                                <th>JAD Usulan</th>
                                <th>Tanggal Pengusulan Ke LLDIKTI</th>
                                <th>Tanggal Proses Penilaian</th>
                                <th>Batas Tanggal Penilaian</th>
                                <th>Sisa Durasi Penilaian</th>
                                <th>Tim Penilai</th>
                                <th>Status Penilaian</th>
                                <th>PIC PTK</th>
                                <th>Diperiksa Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($hasil->result() as $ha) {

                                //Menambahkan 2 hari dari batas tgl penilaian
                                $tgl_batas  = date('Y-m-d', strtotime('+1days', strtotime($ha->batas_penilaian_tgl)));

                                //Menghitung selisih hari
                                $diff       = date_diff(date_create($tgl_batas), date_create());
                                $durasi     = $diff->d;

                                if ($durasi == "0" && $ha->penilaian_tgl <> '') {
                                    $warna = "#FFFF00";
                                } else {
                                    $warna = "#FFFFFF";
                                }
                            ?>
                                <tr style="background-color: <?= $warna; ?>;">
                                    <td>
                                        <a href="show/<?= $ha->no ?>" target="blank" data-toggle="tooltip" title="Detail Ajuan"><button type="button" class="btn btn-sm btn-circle btn-primary"><i class="  icon-book-open"></i> </button></a>
                                    </td>
                                    <td><?= $ha->nidn ?></td>
                                    <td><?= $ha->nama ?></td>
                                    <td><?= $ha->usia ?></td>
                                    <td><?= $ha->nama_instansi ?></td>
                                    <td><?= $ha->nama_prodi ?></td>
                                    <td>
                                        <?= $ha->nama_jabatans ?> <?= $ha->kum ?> (<?= $ha->nama_jenjang ?>)
                                    </td>
                                    <td><?= $ha->updated_at ?></td>
                                    <td><?= $ha->penilaian_tgl ?></td>
                                    <td><?= $ha->batas_penilaian_tgl ?></td>
                                    <td>
                                        <?php
                                        if ($ha->batas_penilaian_tgl == '') {
                                            echo "0 Hari";
                                        } elseif ($durasi == '0') {
                                            echo "Hari Terakhir Penilaian";
                                        } else {
                                            echo "$durasi Hari";
                                        }

                                        if ($ha->status_penilaian == '1') {
                                        ?>
                                            <br>
                                            <a href="#" data-toggle="modal" data-target="#formModal<?= $ha->no ?>" class="btn waves-effect waves-light btn-sm btn-success">[Keterangan]</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?= $ha->nama_penilai ?></td>
                                    <td><?= $ha->user_penilai_keputusan ?></td>
                                    <td><?= $ha->nama_pic_ptk ?></td>
                                    <td><?= $ha->nama_pic_validasi ?></td>
                                </tr>

                                <div class="modal fade" id="formModal<?= $ha->no ?>" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="formModalLabel">Keterangan Perpanjangan Proses Penilaian</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <?php
                                            $data = $this->db->query("SELECT * FROM v_usulans_penilaian WHERE no='$ha->no'")->row();
                                            ?>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label> Nama Tim Penilai</label>
                                                    <input class="form-control" type="text" name="nama_penilai" value="<?= $ha->nama_penilai ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label> Keterangan</label>
                                                    <textarea class="form-control" name="ket_tambah_penilaian" rows="10"><?= $data->ket_tambah_penilaian ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            };
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>