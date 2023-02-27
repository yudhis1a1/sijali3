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
                    <h3>Rekap Masuk ke Tim penilai Diterima – Ditolak<br> Tahun <?= $tahun ?></h3>
                </center>
                <div class="table-responsive m-t-40">
                    <table id="table_rekap_pt" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2">Bulan/JFA</th>
                                <th rowspan="2">Total Ajuan</th>
                                <th colspan="2">
                                    <div align="center">Asisten Ahli</div>
                                </th>
                                <th colspan="2">
                                    <div align="center">Lektor</div>
                                </th>
                                <th colspan="2">
                                    <div align="center">Lektor Kepala</div>
                                </th>
                                <th colspan="2">
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
                                    <div align="center">diterima</div>
                                </th>
                                <th>
                                    <div align="center">ditolak</div>
                                </th>
                                <th>
                                    <div align="center">diterima</div>
                                </th>
                                <th>
                                    <div align="center">ditolak</div>
                                </th>
                                <th>
                                    <div align="center">diterima</div>
                                </th>
                                <th>
                                    <div align="center">ditolak</div>
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
                                    <?php
                                    $aok     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan`='DITERIMA'
                                                                            AND `nama_jabatans`='Asisten Ahli'")->row();

                                    $ano     = $this->db->query("SELECT
                                                                        count(*) AS jml
                                                                    FROM
                                                                        `v_usulan_rekap_pim`
                                                                    WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                        AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                        AND `user_penilai_keputusan`='DITOLAK'
                                                                        AND `nama_jabatans`='Asisten Ahli'")->row();

                                    $lok     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan`='DITERIMA'
                                                                            AND `nama_jabatans`='Lektor'")->row();

                                    $lno     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan`='DITOLAK'
                                                                            AND `nama_jabatans`='Lektor'")->row();

                                    $lkok     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan`='DITERIMA'
                                                                            AND `nama_jabatans`='Lektor Kepala'")->row();

                                    $lkno     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan`='DITOLAK'
                                                                            AND `nama_jabatans`='Lektor Kepala'")->row();

                                    $gbok     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan`='DITERIMA'
                                                                            AND `nama_jabatans`='Guru Besar'")->row();

                                    $gbno     = $this->db->query("SELECT
                                                                        count(*) AS jml
                                                                    FROM
                                                                        `v_usulan_rekap_pim`
                                                                    WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                        AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                        AND `user_penilai_keputusan`='DITOLAK'
                                                                        AND `nama_jabatans`='Guru Besar'")->row();

                                    $total_bln = $aok->jml + $ano->jml + $lok->jml + $lno->jml + $lkok->jml + $lkno->jml + $gbok->jml + $gbno->jml;
                                    ?>
                                    <th>
                                        <div align="center">
                                            <?= $total_bln ?>
                                        </div>
                                    </th>
                                    <td>
                                        <div align="center">
                                            <h5><?= $aok->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5><?= $ano->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5><?= $lok->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5><?= $lno->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5><?= $lkok->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5><?= $lkno->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5><?= $gbok->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <h5><?= $gbno->jml ?></h5>
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