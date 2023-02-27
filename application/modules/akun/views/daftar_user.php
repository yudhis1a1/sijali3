<?php if ($role == '1') { ?>
    <!-- modal pilih data institusi -->
    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Pilih Institusi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>akun/akun" method="post">
                        <div class="form-group">
                            <label>Pemilihan Institusi<span class="danger">*</span></label>
                            <select name="institusi" class="select2 m-b-10 select2-multiple" style="width: 100%" data-placeholder="Click to Choose..." required data-validation-required-message="Data jabatan usulan belum dipilih" required>
                                <option value=""></option>
                                <?php
                                foreach ($cek_instansi as $ins) { ?>
                                    <option value="<?= $ins->kode ?>"> <?= $ins->nama_instansi ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Cari">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_POST['submit'])) { ?>
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">USER HAK AKSES</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <?php if ($role == '4') { ?>
                        <a href="<?php echo base_url(); ?>akun/akun/beranda" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Tambah Data</a>
                    <?php
                    } else { ?>
                        <a href="<?php echo base_url(); ?>akun/akun/daftar_user" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Tambah Data</a>
                    <?php
                    } ?>

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
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center"><i class="fa fa-eye"></i></th>
                                        <th>Hak Akses</th>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Instansi</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Username</th>
                                        <th>Updated</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($users as $user) {

                                    ?>
                                        <tr>
                                            <td>
                                                <?php if ($user->aktif == '1') { ?>
                                                    <a href="<?= base_url(); ?>akun/akun/nonaktif/<?php echo $user->no ?>/0" class="btn btn-danger btn-xs tombol-nonaktif"><i class="fa fa-ban"></i></a>
                                                    <a href="<?= base_url(); ?>akun/akun/reset/<?php echo $user->no ?>" class="btn btn-info btn-xs tombol-reset"><i class="fa fa-gears"></i></a>
                                                    <a href="#" data-toggle="modal" id="myLargeModalLabel" data-target="#edit<?= $user->username ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                                <?php
                                                } elseif ($user->aktif == '0') { ?>
                                                    <a href="<?= base_url(); ?>akun/akun/aktif/<?php echo $user->no ?>/1" class="btn btn-success btn-xs tombol-aktif"><i class="fa  fa-check-square-o"></i></a>
                                                <?php
                                                } ?>
                                            </td>
                                            <td>
                                                <h3><span class="label label-info"><?php echo $user->nm_roles ?></span></h3>
                                            </td>
                                            <td><?php echo $user->no ?></td>
                                            <td><?php echo $user->nm_lengkap ?></td>
                                            <td><?php echo $user->nama_instansi ?></td>
                                            <td><?php echo $user->email ?></td>
                                            <td><?php echo $user->telp ?></td>
                                            <td><?php echo $user->username ?></td>
                                            <td><?php echo $user->updated_at ?></td>


                                        </tr>
                                        <div class="modal fade" aria-labelledby="myLargeModalLabel" id="edit<?= $user->username ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    </div>
                                                    <form method="post" action="<?= base_url() ?>akun/akun/update_user" role="form" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <h3>Update User</h3>
                                                            <hr>
                                                            <?php if ($user->role_id == '3') { ?>

                                                                <div class="form-group">
                                                                    <!-- <label for="uraian">Nama Lengkap</label> -->
                                                                    <input type="hidden" name="nama" class="form-control" value="<?= $user->nama ?>">
                                                                    <input type="hidden" name="no_user" value="<?= $user->no ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="uraian">Email</label>
                                                                    <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="semester">Telp</label><br>
                                                                    <input type="text" name="telp" value="<?= $user->telp ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <!-- <label for="semester">UserName</label><br> -->
                                                                    <input type="hidden" name="username" value="<?= $user->username ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <!-- <label for="semester">Password</label><br> -->
                                                                    <input type="hidden" name="pass" value="<?= base64_decode($user->password_64) ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group m-t-40 row">
                                                                    <label for="example-text-input" class="col-2 col-form-label">Surat
                                                                        Keterangan/Surat Tugas</label>
                                                                    <div class="col-10">
                                                                        <input type="hidden" name="old_pict" value="<?= $user->sk ?>" class="form-control">
                                                                        <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                                                                        <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    <?php
                                                            } else { ?>
                                                        <div class="form-group">
                                                            <label for="uraian">Nama Lengkap</label>
                                                            <input type="text" name="nama" class="form-control" value="<?= $user->nama ?>">
                                                            <input type="hidden" name="no_user" value="<?= $user->no ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="uraian">Email</label>
                                                            <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="semester">Telp</label><br>
                                                            <input type="text" name="telp" value="<?= $user->telp ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="semester">UserName</label><br>
                                                            <input type="text" name="username" value="<?= $user->username ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="semester">Password</label><br>
                                                            <input type="text" name="pass" value="<?= base64_decode($user->password_64) ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group m-t-40 row">
                                                            <label for="example-text-input" class="col-2 col-form-label">Surat
                                                                Keterangan/Surat Tugas</label>
                                                            <div class="col-10">
                                                                <input type="hidden" name="old_pict" value="<?= $user->sk ?>" class="form-control">
                                                                <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                                                                <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                                                            </div>
                                                        </div>
                                                </div>

                                            <?php
                                                            } ?>
                                            <div class="modal-footer">
                                                <div class="btn-group pull-right">
                                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                        </div>
                    <?php
                                    } ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Modal Edit-->

    <?php }
} else { ?>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">USER HAK AKSES</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <?php if ($role == '4') { ?>
                    <a href="<?php echo base_url(); ?>akun/akun/beranda" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Tambah Data</a>
                <?php
                } else { ?>
                    <a href="<?php echo base_url(); ?>akun/akun/daftar_user" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Tambah Data</a>
                <?php
                } ?>

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
                        <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center"><i class="fa fa-eye"></i></th>
                                    <th>Hak Akses</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Instansi</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($data_users as $user) { ?>
                                    <tr>
                                        <td>
                                            <?php if ($user->aktif == '1') { ?>
                                                <a href="<?= base_url(); ?>akun/akun/nonaktif/<?php echo $user->no ?>/0" class="btn btn-danger btn-xs tombol-nonaktif" data-toggle="tooltip" title="Nonaktifkan Akun"><i class="fa fa-ban"></i></a>

                                                <a href="<?= base_url(); ?>akun/akun/reset/<?php echo $user->no ?>" class="btn btn-info btn-xs tombol-reset" data-toggle="tooltip" title="Reset Password"><i class="fa fa-gears"></i></a>

                                                <a href="#" data-toggle="modal" id="myLargeModalLabel" data-target="#edit<?= $user->username ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                            <?php
                                            } elseif ($user->aktif == '0') { ?>
                                                <a href="<?= base_url(); ?>akun/akun/aktif/<?php echo $user->no ?>/1" class="btn btn-success btn-xs tombol-aktif" data-toggle="tooltip" title="Aktifkan Akun"><i class="fa  fa-check-square-o"></i></a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                            <h3><span class="label label-info"><?php echo $user->nm_roles ?></span></h3>
                                        </td>
                                        <td><?php echo $user->username ?></td>
                                        <td><?php echo $user->nm_lengkap ?></td>
                                        <td><?php echo $user->nama_instansi ?></td>
                                        <td><?php echo $user->email ?></td>
                                        <td><?php echo $user->telp ?></td>
                                        <td><?php echo $user->updated_at ?></td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($data_users as $user) { ?>
        <!-- Modal Edit-->
        <div class="modal fade" aria-labelledby="myLargeModalLabel" id="edit<?= $user->username ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <form method="post" action="<?= base_url() ?>akun/akun/update_user" role="form" enctype="multipart/form-data">
                        <div class="modal-body">
                            <h3>Update User</h3>
                            <hr>
                            <?php if ($user->role_id == '3') { ?>

                                <div class="form-group">
                                    <!-- <label for="uraian">Nama Lengkap</label> -->
                                    <input type="hidden" name="nama" class="form-control" value="<?= $user->nama ?>">
                                    <input type="hidden" name="no_user" value="<?= $user->no ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="uraian">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="semester">Telp</label><br>
                                    <input type="text" name="telp" value="<?= $user->telp ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="semester">UserName</label><br> -->
                                    <input type="hidden" name="username" value="<?= $user->username ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="semester">Password</label><br> -->
                                    <input type="hidden" name="pass" value="<?= base64_decode($user->password_64) ?>" class="form-control">
                                </div>
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-2 col-form-label">Surat Keterangan/Surat
                                        Tugas</label>
                                    <div class="col-10">
                                        <input type="hidden" name="old_pict" value="<?= $user->sk ?>" class="form-control">
                                        <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                                        <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                                    </div>
                                </div>
                        </div>
                    <?php } else { ?>
                        <div class="form-group">
                            <label for="uraian">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?= $user->nama ?>">
                            <input type="hidden" name="no_user" value="<?= $user->no ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="uraian">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="semester">Telp</label><br>
                            <input type="text" name="telp" value="<?= $user->telp ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="semester">UserName</label><br>
                            <input type="text" name="username" value="<?= $user->username ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="semester">Password</label><br>
                            <input type="text" name="pass" value="<?= base64_decode($user->password_64) ?>" class="form-control">
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-2 col-form-label">Surat Keterangan/Surat Tugas</label>
                            <div class="col-10">
                                <input type="hidden" name="old_pict" value="<?= $user->sk ?>" class="form-control">
                                <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                                <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                            </div>
                        </div>
                </div>

            <?php } ?>
            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
            </div>
        </div>
        </div>

<?php }
}
?>