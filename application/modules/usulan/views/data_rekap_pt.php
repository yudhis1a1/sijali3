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
                    <h3>Rekap Usulan Tahun <?= $tahun ?></h3>
                </center>
                <div class="table-responsive m-t-40">
                    <table id="table_rekap_pt" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Bulan/PT</th>
                                <th>
                                    <div align="center">Universitas</div>
                                </th>
                                <th>
                                    <div align="center">Institut</div>
                                </th>
                                <th>
                                    <div align="center">Sekolah Tinggi</div>
                                </th>
                                <th>
                                    <div align="center">Akademi</div>
                                </th>
                                <th>
                                    <div align="center">Politeknik</div>
                                </th>
                                <th>
                                    <div align="center">Akademi Komunitas</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                            $pt = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");

                            $noPt = 1;
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
                                                                            AND LEFT(`instansi_kode`, 3) = '031'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>/usulan/usulan/tampil_rekap_pt/031/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
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
                                                                            AND LEFT(`instansi_kode`, 3) = '032'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>/usulan/usulan/tampil_rekap_pt/032/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
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
                                                                            AND LEFT(`instansi_kode`, 3) = '033'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>/usulan/usulan/tampil_rekap_pt/033/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
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
                                                                            AND LEFT(`instansi_kode`, 3) = '034'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>/usulan/usulan/tampil_rekap_pt/034/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
                                                <h5><?= $aka->jml ?></h5>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $poli     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND LEFT(`instansi_kode`, 3) = '035'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>/usulan/usulan/tampil_rekap_pt/035/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
                                                <h5><?= $poli->jml ?></h5>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $aka_kom     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND LEFT(`instansi_kode`, 3) = '036'")->row();
                                        ?>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>/usulan/usulan/tampil_rekap_pt/036/<?= $tahun ?>/<?= $pt[$index] ?>" target="_blank">
                                                <h5><?= $aka_kom->jml ?></h5>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $noPt++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>