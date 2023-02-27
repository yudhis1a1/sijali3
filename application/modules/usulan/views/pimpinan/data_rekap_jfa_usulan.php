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
                    <h3>Rekap JFA Usulan<br> Tahun <?= $tahun ?></h3>
                </center>
                <div class="table-responsive m-t-40">
                    <table id="table_rekap_pt" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2">Bulan/Usulan</th>
                                <th colspan="4">
                                    <div align="center">Asisten Ahli</div>
                                </th>
                                <th colspan="4">
                                    <div align="center">Lektor</div>
                                </th>
                                <th colspan="4">
                                    <div align="center">Lektor Kepala</div>
                                </th>
                                <th colspan="4">
                                    <div align="center">Guru Besar</div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div align="center">Usul</div>
                                </th>
                                <th>
                                    <div align="center">Dikembalikan</div>
                                </th>
                                <th>
                                    <div align="center">Ditolak</div>
                                </th>
                                <th>
                                    <div align="center">Selesai</div>
                                </th>
                                <th>
                                    <div align="center">Usul</div>
                                </th>
                                <th>
                                    <div align="center">Dikembalikan</div>
                                </th>
                                <th>
                                    <div align="center">Ditolak</div>
                                </th>
                                <th>
                                    <div align="center">Selesai</div>
                                </th>
                                <th>
                                    <div align="center">Usul</div>
                                </th>
                                <th>
                                    <div align="center">Dikembalikan</div>
                                </th>
                                <th>
                                    <div align="center">Ditolak</div>
                                </th>
                                <th>
                                    <div align="center">Selesai</div>
                                </th>
                                <th>
                                    <div align="center">Usul</div>
                                </th>
                                <th>
                                    <div align="center">Dikembalikan</div>
                                </th>
                                <th>
                                    <div align="center">Ditolak</div>
                                </th>
                                <th>
                                    <div align="center">Selesai</div>
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
                                    <th>
                                        <?= $bulan[$index] ?>
                                    </th>
                                    <!-- Awal Assiten Ahli -->
                                    <td>
                                        <?php
                                        $ausul     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='3'
                                                                            AND `nama_jabatans`='Asisten Ahli'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $ausul->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $akembali     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='2'
                                                                            AND `nama_jabatans`='Asisten Ahli'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $akembali->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $atolak     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan` = 'DITOLAK'
                                                                            AND `nama_jabatans`='Asisten Ahli'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $atolak->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $aselesai     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='9'
                                                                            AND `nama_jabatans`='Asisten Ahli'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $aselesai->jml ?></h5>
                                        </div>
                                    </td>
                                    <!-- Akhir Asisten Ahli -->

                                    <!-- Awal Lektor -->
                                    <td>
                                        <?php
                                        $lusul     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='3'
                                                                            AND `nama_jabatans`='Lektor'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $lusul->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $lkembali     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='2'
                                                                            AND `nama_jabatans`='Lektor'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $lkembali->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $ltolak     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan` = 'DITOLAK'
                                                                            AND `nama_jabatans`='Lektor'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $ltolak->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $lselesai     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='9'
                                                                            AND `nama_jabatans`='Lektor'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $lselesai->jml ?></h5>
                                        </div>
                                    </td>
                                    <!-- Akhir Lektor -->

                                    <!-- Awal Lektor Kepala -->
                                    <td>
                                        <?php
                                        $lkusul     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='3'
                                                                            AND `nama_jabatans`='Lektor Kepala'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $lkusul->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $lkkembali     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='2'
                                                                            AND `nama_jabatans`='Lektor Kepala'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $lkkembali->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $lktolak     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan` = 'DITOLAK'
                                                                            AND `nama_jabatans`='Lektor Kepala'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $lktolak->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $lkselesai     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='9'
                                                                            AND `nama_jabatans`='Lektor Kepala'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $lkselesai->jml ?></h5>
                                        </div>
                                    </td>
                                    <!-- Akhir Lektor Kepala -->

                                    <!-- Awal Guru Besar -->
                                    <td>
                                        <?php
                                        $gbusul     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='3'
                                                                            AND `nama_jabatans`='Guru Besar'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $gbusul->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $gbkembali     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='2'
                                                                            AND `nama_jabatans`='Guru Besar'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $gbkembali->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $gbtolak     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `user_penilai_keputusan` = 'DITOLAK'
                                                                            AND `nama_jabatans`='Guru Besar'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $gbtolak->jml ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $gbselesai     = $this->db->query("SELECT
                                                                            count(*) AS jml
                                                                        FROM
                                                                            `v_usulan_rekap_pim`
                                                                        WHERE LEFT(`tgl_ajuan`, 4) = '$tahun'
                                                                            AND MID(`tgl_ajuan`, 6, 2) = '$pt[$index]'
                                                                            AND `usulan_status_id`='9'
                                                                            AND `nama_jabatans`='Guru Besar'")->row();
                                        ?>
                                        <div align="center">
                                            <h5><?= $gbselesai->jml ?></h5>
                                        </div>
                                    </td>
                                    <!-- Akhir Guru Besar -->
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