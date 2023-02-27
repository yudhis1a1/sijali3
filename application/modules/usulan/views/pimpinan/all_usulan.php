<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">USULAN JAD</h4>

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
                <div class="table-responsive m-t-40">
                    <table id="myTablesya_pimpinan" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Detail Ajuan</th>
                                <th>Status Usulan</th>
                                <th>NIDN/NIDK</th>
                                <th>Nama</th>
                                <th>Homebase<br>(Prodi)</th>
                                <th>JFA Usulan</th>
                                <th>Tanggal Masuk LLDIKTI</th>
                                <th>Lama Ajuan</th>
                            </tr>
                        </thead>
                        <tbody>

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