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
                    <h3>Rekap Usulan Berdasarkan Usulan JFA<br> Tahun <?= $tahun ?></h3>
                </center>
                <div class="table-responsive m-t-40">
                    <table id="table_rekap_pt" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Bulan/JFA</th>
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
                            $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                            $pt = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");

                            for ($index = 0; $index < 12; $index++) {
                            ?>
                                <tr>
                                    <th><?= $bulan[$index] ?>
                                    </th>
                                    <td>
                                        <?php
                                        $univ     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `nama_jabatans`='Asisten Ahli'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>usulan/pimpinan/tampil_rekap_jfa/1/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
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
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `nama_jabatans`='Lektor'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>usulan/pimpinan/tampil_rekap_jfa/2/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
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
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `nama_jabatans`='Lektor Kepala'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>usulan/pimpinan/tampil_rekap_jfa/3/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
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
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `nama_jabatans`='Guru Besar'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>usulan/pimpinan/tampil_rekap_jfa/4/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
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