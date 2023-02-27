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
                    <h3>Rekap Ajuan JFA ke LLDIKTI III per PT</h3>
                </center>
                <div class="table-responsive m-t-40">
                    <table id="tablePenilaian" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode Instansi</th>
                                <th>Nama Instansi</th>
                                <th>
                                    <div align="center">Jumlah Ajuan</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $urut = 1;
                            foreach ($hasil->result() as $da) {
                            ?>
                                <tr>
                                    <td><?= $urut ?></td>
                                    <td><?= $da->instansi_kode ?></td>
                                    <td><?= $da->nama_instansi ?></td>
                                    <td>
                                        <div align="center">
                                            <a style="color:Blue" href="<?= base_url() ?>usulan/pimpinan/tampil_rekap_jfa_pt_dosen/<?= $da->instansi_kode ?>" target="_blank">
                                                <h5><?= $da->jml ?></h5>
                                            </a>
                                        </div>
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