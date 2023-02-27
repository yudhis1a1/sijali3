<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <center>
                        <h1><b>Data Akun Dosen</b></h1>
                        <hr>
                    </center>
                    <a href="#" data-target="#tambahDosen" data-toggle='modal' class="btn btn-ms btn-success"><i class="fa fa-plus"></i> UPDATE DOSEN PINDAH HOMEBASE</a>
                    <table id="tableDosen" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>NIDN</th>
                                <th>NAMA</th>
                                <th>HOMEBASE</th>
                                <th>PRODI</th>
                                <th>GOLONGAN</th>
                                <th>JABATAN</th>
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


<!-- modal -->
<div class="modal fade" id="tambahDosen" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Cari Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>ketenagaan/ketenagaan/tampil_data_dosen" method="post">
                    <div class="form-group">
                        <label>Masukkan NIDN<span class="danger">*</span></label>
                        <input type="number" class="form-control" name="nidn" required>
                    </div>

                    <div class="form-group">
                        <center>
                            <input class="btn btn-primary btn-md" type="submit" name="submit" value="Cari">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>