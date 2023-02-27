<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>

    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <center>
                    <h3>Rekap Usulan Berdasarkan Usulan JFA<br>
                        Per PT dan Prodi<br> Tahun <?= $tahun ?></h3>
                </center>
                <div class="table-responsive m-t-40">
                    <table id="tablePenilaian" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Kode PT</th>
                                <th>Nama PT</th>
                                <th>Kode Prodi</th>
                                <th>Nama Prodi</th>
                                <th>
                                    <div align="center">Asisten Ahli</div>
                                </th>
                                <th>
                                    <div align="center">Lektor</div>
                                </th>
                                <th>
                                    <div align="center">Lektor Kepala</div>
                                </th>
                                <th>
                                    <div align="center">Guru Besar</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($hasil->result() as $ha) {
                            ?>
                                <tr>
                                    <td><?= $ha->instansi_kode ?></td>
                                    <td><?= $ha->nama_instansi ?></td>
                                    <td><?= $ha->kode_prodi ?></td>
                                    <td><?= $ha->nama_prodi ?></td>
                                    <td>
                                        <?php
                                        $univ     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE `instansi_kode` = '$ha->instansi_kode'
                                                                            AND `nama_prodi` = '$ha->nama_prodi'
                                                                            AND LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND `nama_jabatans`='Asisten Ahli'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>usulan/pimpinan/tampil_rekap_jfa_prodi/1/<?= $tahun ?>/<?= $ha->instansi_kode ?>/<?= $ha->prodi_kode ?>" target="_blank">
                                                <h5><?= $univ->jml ?></h5>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $inst     = $this->db->query("SELECT
                                                                        count(*) AS jml
                                                                    FROM
                                                                        `v_usulan_rekap_pim`
                                                                    WHERE `instansi_kode` = '$ha->instansi_kode'
                                                                        AND `nama_prodi` = '$ha->nama_prodi'
                                                                        AND LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                        AND `nama_jabatans`='Lektor'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>usulan/pimpinan/tampil_rekap_jfa_prodi/2/<?= $tahun ?>/<?= $ha->instansi_kode ?>/<?= $ha->prodi_kode ?>" target="_blank">
                                                <h5><?= $inst->jml ?></h5>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $st     = $this->db->query("SELECT
                                                                        count(*) AS jml
                                                                    FROM
                                                                        `v_usulan_rekap_pim`
                                                                    WHERE `instansi_kode` = '$ha->instansi_kode'
                                                                        AND `nama_prodi` = '$ha->nama_prodi'
                                                                        AND LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                        AND `nama_jabatans`='Lektor Kepala'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>usulan/pimpinan/tampil_rekap_jfa_prodi/3/<?= $tahun ?>/<?= $ha->instansi_kode ?>/<?= $ha->prodi_kode ?>" target="_blank">
                                                <h5><?= $st->jml ?></h5>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $aka     = $this->db->query("SELECT
                                                                        count(*) AS jml
                                                                    FROM
                                                                        `v_usulan_rekap_pim`
                                                                    WHERE `instansi_kode` = '$ha->instansi_kode'
                                                                        AND `nama_prodi` = '$ha->nama_prodi'
                                                                        AND LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                        AND `nama_jabatans`='Guru Besar'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>usulan/pimpinan/tampil_rekap_jfa_prodi/4/<?= $tahun ?>/<?= $ha->instansi_kode ?>/<?= $ha->prodi_kode ?>" target="_blank">
                                                <h5><?= $aka->jml ?></h5>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>