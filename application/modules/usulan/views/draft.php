<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">USULAN JAD</h4>

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <?php
            if (($role == '3' && $nidn == $username) || $role <> '3') {
            } else {
            ?>
                <a href="<?php echo base_url(); ?>usulan/usulan/tambah" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Tambah Data</a>
            <?php
            }
            ?>
        </div>
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
                    <?php if ($role <> '3') { ?>
                        <table id="myTablesya" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <?php } else {  ?>
                            <table id="myTablesya_dosen" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <?php }  ?>
                            <thead>
                                <tr>
                                    <th class="text-center" width="50px"><i class="fa  fa icon-screen-desktop  "></i></th>
                                    <!-- <th>Resume</th> -->
                                    <th>Status Usulan</th>
                                    <th>No</th>
                                    <th>NIDN/NIDK</th>
                                    <th>Nama</th>
                                    <th>Homebase</th>
                                    <th>Prodi</th>
                                    <th>JAD Usulan</th>
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

<!-- Modal HAPUS-->
<?php
/*
include "koneksi.php";
$query_dosens = "SELECT
				a.no AS no_usulan,
				a.`jabatan_usulan_no`,
				f.`nama_jabatans`,
				f.kum,
				b.`jabatan_tgl`,
				b.`no`,
				b.`jabatan_tgl`,
				e.`nama_ikatan`,
				b.`karpeg`,
				b.`lahir_tempat`,
				b.`jk`,
				b.`lahir_tgl`,
				b.`nama`,
				b.`gelar_belakang`,
				b.`nip`,
				b.`nidn`,
				a.`tmt_tahun`,
				a.`tmt_bulan`,
				c.`nama_prodi`,
				d.`nama_instansi`
			  FROM
				usulans AS a,
				dosens AS b,
				`prodis` AS c,
				`instansis` AS d,
				ikatan_kerjas AS e,
				`jabatans` AS f
			  WHERE a.`dosen_no` = b.`no`
				AND b.`prodi_kode` = c.`kode`
				AND c.`instansi_kode` = d.`kode`
				AND b.`ikatan_kerja_kode`=e.`kode`
				AND b.`jabatan_no`=f.`kode`";
$data_dos = mysqli_query($koneksi, $query_dosens);
while ($row_dos = mysqli_fetch_array($data_dos)) {

    $tgl_lahir = $row_dos['lahir_tgl'];
    $tgl_ok = date_create($tgl_lahir);
    $tgl_lhr_dosen = date_format($tgl_ok, 'd F Y');
?>
    <div class="modal fade" aria-labelledby="myLargeModalLabel" id="hapus<?= $row_dos['no_usulan'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <form method="post" action="<?= base_url(); ?>usulan/usulan/hapus_usulan/<?= $row_dos['no_usulan'] ?>" role="form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <h3>Anda yakin akan menghapus ajuan usulan ?</h3>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary">YA</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } 
*/
?>