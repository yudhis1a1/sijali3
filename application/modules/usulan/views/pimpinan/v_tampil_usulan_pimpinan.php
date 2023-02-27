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
                    <h3>Status Ajuan : <?= $judul ?></h3>
                </center>
                <div class="table-responsive m-t-40">
                    <table id="tablePenilaian" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Detail Ajuan</th>
                                <th>NIDN/NIDK</th>
                                <th>Nama</th>
                                <th>Homebase<br>(Prodi)</th>
                                <th>JFA Usulan</th>

                                <?php if ($tipe == '2') { ?>
                                    <th>Tim Penilai</th>
                                <?php } ?>

                                <th>Tanggal Masuk LLDIKTI</th>

                                <?php if ($tipe == '2') { ?>
                                    <th>Tanggal Proses Penilaian</th>
                                <?php } ?>

                                <?php if ($tipe == '7') { ?>
                                    <th>Tanggal SELESAI</th>
                                <?php } ?>

                                <?php if ($tipe == '8') { ?>
                                    <th>Tanggal Diusulkan ke DIKTI</th>
                                <?php } ?>

                                <th>Lama Ajuan dari tgl Masuk LLDIKTI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $urut = 1;
                            foreach ($que as $da) {
                            ?>
                                <tr>
                                    <td><?= $urut ?></td>
                                    <td>
                                        <a target="_blank" href="<?php echo base_url(); ?>usulan/usulan/usulans/usul/<?= $da->no ?>" data-toggle="tooltip" title="Detail Ajuan"><button type="button" class="btn btn-info btn-md"><i class="fa fa-search"></i></button></a>
                                    </td>
                                    <td><?= $da->nidn ?></td>
                                    <td><?= $da->nama ?></td>
                                    <td><?= $da->nama_instansi ?><br>
                                        <font color="red"><b>(<?= $da->nama_prodi ?>)</b></font>
                                    </td>
                                    <td><?= $da->nama_jabatans ?> <?= $da->kum ?> (<?= $da->nama_jenjang ?>)</td>
                                    <?php if ($tipe == '2') { ?>
                                        <td>
                                            <?= $da->nama_penilai ?>
                                        </td>
                                    <?php } ?>
                                    <td>
                                        <?php
                                        $aju = $this->db->query("SELECT
                                                                usulan_no,
                                                                `created_at` AS tgl_ajuan
                                                            FROM
                                                                `usulan_riwayat_statuses`
                                                            WHERE `usulan_status_id` = '3'
                                                                AND `keterangan_pengusul` = 'Pengajuan Usulan Baru'
                                                                AND usulan_no = '$da->no'
                                                            ORDER BY `created_at` DESC
                                                            LIMIT 1")->row();
                                        ?>
                                        <?= $aju->tgl_ajuan ?>
                                    </td>
                                    <?php if ($tipe == '2') { ?>
                                        <td>
                                            <div align="center">
                                                <b><?= $da->penilaian_tgl; ?></b>
                                                <br>s/d<br>
                                                <b><?= $da->batas_penilaian_tgl ?></b>
                                            </div>
                                        </td>
                                    <?php } ?>

                                    <?php if ($da->usulan_status_id == '9') { ?>
                                        <td><?= $da->tgl_selesai ?></td>
                                    <?php } ?>

                                    <?php if ($da->usulan_status_id == '11') { ?>
                                        <td><?= $da->tgl_dikti ?></td>
                                    <?php } ?>

                                    <td>
                                        <?php
                                        if ($da->usulan_status_id == '9') {
                                            $awal  = date_create($aju->tgl_ajuan);
                                            $akhir = date_create($da->tgl_selesai);
                                            $diff  = date_diff($awal, $akhir);
                                        } elseif ($da->usulan_status_id == '11') {
                                            $awal  = date_create($aju->tgl_ajuan);
                                            $akhir = date_create($da->tgl_dikti);
                                            $diff  = date_diff($awal, $akhir);
                                        } else {
                                            $diff  = date_diff(date_create($aju->tgl_ajuan), date_create());
                                        }
                                        $durasi_thn = $diff->y;
                                        $durasi_bln = $diff->m;
                                        $durasi_hari = $diff->d;
                                        ?>
                                        <b><?= $durasi_thn ?></b> tahun <br>
                                        <b><?= $durasi_bln ?></b> bulan <br>
                                        <b><?= $durasi_hari ?></b> hari
                                    </td>
                                </tr>
                            <?php
                                $urut++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="<?= base_url() ?>assets/node_modules/popper/popper.min.js"></script>
<script src="<?= base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/node_modules/datatables/jquery.dataTables.min.js"></script>