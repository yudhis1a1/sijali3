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
                    <h3>Rekap Per Tim Penilai<br>Total Keseluruhan</h3>
                </center>
                <div class="table-responsive m-t-40">
                    <table id="table_rekap_pt" class="table nowarp table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2">Nama Tim</th>
                                <th rowspan="2">Total Ajuan</th>
                                <th colspan="3">
                                    <div align="center">Asisten Ahli</div>
                                </th>
                                <th colspan="3">
                                    <div align="center">Lektor</div>
                                </th>
                                <th colspan="3">
                                    <div align="center">Lektor Kepala</div>
                                </th>
                                <th colspan="3">
                                    <div align="center">Guru Besar</div>
                                </th>
                            </tr>

                            <tr>
                                <th>
                                    <div align="center">diterima</div>
                                </th>
                                <th>
                                    <div align="center">ditolak</div>
                                </th>
                                <th>
                                    <div align="center">pending</div>
                                </th>
                                <th>
                                    <div align="center">diterima</div>
                                </th>
                                <th>
                                    <div align="center">ditolak</div>
                                </th>
                                <th>
                                    <div align="center">pending</div>
                                </th>
                                <th>
                                    <div align="center">diterima</div>
                                </th>
                                <th>
                                    <div align="center">ditolak</div>
                                </th>
                                <th>
                                    <div align="center">pending</div>
                                </th>
                                <th>
                                    <div align="center">diterima</div>
                                </th>
                                <th>
                                    <div align="center">ditolak</div>
                                </th>
                                <th>
                                    <div align="center">pending</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($penilai as $pen) {
                            ?>
                                <tr>
                                    <td><?= $pen->nama ?></td>
                                    <th>
                                        <div align="center">
                                            <?= $pen->jml_usulan ?>
                                        </div>
                                    </th>
                                    <!-- AA DITERIMA -->
                                    <?php
                                    $aa_DITERIMA = $this->db->query("SELECT
                                                                        *
                                                                    FROM
                                                                        `v_aa`
                                                                    WHERE `keputusan`='DITERIMA'
                                                                        AND `user_penilai_no` = '$pen->user_penilai_no'")->num_rows();
                                    ?>
                                    <td>
                                        <div align="center">
                                            <h5><?= $aa_DITERIMA ?></h5>
                                        </div>
                                    </td>
                                    <!-- AA DITOLAK -->
                                    <?php
                                    $aa_DITOLAK = $this->db->query("SELECT
                                                                        *
                                                                    FROM
                                                                        `v_aa`
                                                                    WHERE `keputusan`='DITOLAK'
                                                                        AND `user_penilai_no` = '$pen->user_penilai_no'")->num_rows();
                                    ?>
                                    <td>
                                        <div align="center">
                                            <h5><?= $aa_DITOLAK ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5>0</h5>
                                        </div>
                                    </td>
                                    <!-- lektor DITERIMA -->
                                    <?php
                                    $lektor_DITERIMA = $this->db->query("SELECT
                                                                        *
                                                                    FROM
                                                                        `v_lektor`
                                                                    WHERE `keputusan`='DITERIMA'
                                                                        AND `user_penilai_no` = '$pen->user_penilai_no'")->num_rows();
                                    ?>
                                    <td>
                                        <div align="center">
                                            <h5><?= $lektor_DITERIMA ?></h5>
                                        </div>
                                    </td>
                                    <!-- lektor DITOLAK -->
                                    <?php
                                    $lektor_DITOLAK = $this->db->query("SELECT
                                                                        *
                                                                    FROM
                                                                        `v_lektor`
                                                                    WHERE `keputusan`='DITOLAK'
                                                                        AND `user_penilai_no` = '$pen->user_penilai_no'")->num_rows();
                                    ?>
                                    <td>
                                        <div align="center">
                                            <h5><?= $lektor_DITOLAK ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5>0</h5>
                                        </div>
                                    </td>
                                    <!-- lk DITERIMA -->
                                    <?php
                                    $lk_DITERIMA = $this->db->query("SELECT
                                                                        *
                                                                    FROM
                                                                        `v_lk`
                                                                    WHERE `keputusan`='DITERIMA'
                                                                        AND `user_penilai_no` = '$pen->user_penilai_no'")->num_rows();
                                    ?>
                                    <td>
                                        <div align="center">
                                            <h5><?= $lk_DITERIMA ?></h5>
                                        </div>
                                    </td>
                                    <!-- lk DITOLAK -->
                                    <?php
                                    $lk_DITOLAK = $this->db->query("SELECT
                                                                        *
                                                                    FROM
                                                                        `v_lk`
                                                                    WHERE `keputusan`='DITOLAK'
                                                                        AND `user_penilai_no` = '$pen->user_penilai_no'")->num_rows();
                                    ?>
                                    <td>
                                        <div align="center">
                                            <h5><?= $lk_DITOLAK ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5>0</h5>
                                        </div>
                                    </td>
                                    <!-- gb DITERIMA -->
                                    <?php
                                    $gb_DITERIMA = $this->db->query("SELECT
                                                                        *
                                                                    FROM
                                                                        `v_gb`
                                                                    WHERE `keputusan`='DITERIMA'
                                                                        AND `user_penilai_no` = '$pen->user_penilai_no'")->num_rows();
                                    ?>
                                    <td>
                                        <div align="center">
                                            <h5><?= $gb_DITERIMA ?></h5>
                                        </div>
                                    </td>
                                    <!-- gb DITOLAK -->
                                    <?php
                                    $gb_DITOLAK = $this->db->query("SELECT
                                                                        *
                                                                    FROM
                                                                        `v_gb`
                                                                    WHERE `keputusan`='DITOLAK'
                                                                        AND `user_penilai_no` = '$pen->user_penilai_no'")->num_rows();
                                    ?>
                                    <td>
                                        <div align="center">
                                            <h5><?= $gb_DITOLAK ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5>0</h5>
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