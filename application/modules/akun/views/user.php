<style type="text/css">
    .upper {
        text-transform: uppercase;
    }

    .lower {
        text-transform: lowercase;
    }

    .cap {
        text-transform: capitalize;
    }

    .small {
        font-variant: small-caps;
    }
</style>
<br>
<div class="card">
    <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Master User </h4>
    </div>
    <div class="card-body">
        <h6 class="card-subtitle"> Tambah User</h6>
        <form method="post" action="<?= base_url() ?>akun/akun/tambah_user/1" role="form" enctype="multipart/form-data">
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Nama Lengkap</label>
                <div class="col-10">
                    <input class="form-control cap" type="text" id="nama" name="nama" required>
                </div>
            </div>
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input class="form-control" type="text" id="email" name="email" required>
                </div>
            </div>
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Telp</label>
                <div class="col-10">
                    <input class="form-control" type="text" id="telp" name="telp" required>
                </div>
            </div>

            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Instansi</label>
                <div class="col-10">
                    <?php if ($no == '2') { ?>
                        <?php foreach ($instan as $int) { ?>
                            <input class="form-control" type="hidden" id="instansi" name="sub" value="1">
                            <input class="form-control" type="hidden" id="instansi" name="instansi" value="<?php echo $int->kode; ?>">
                            <input class="form-control" type="text" id="instansi" value="<?php echo $int->nama_instansi; ?>" readonly>
                        <?php } ?>
                    <?php } else { ?>
                        <select name="instansi" class="select2 m-b-10 select2-multiple" id="instansi" style="width: 100%" data-placeholder="Click to Choose...">
                            <option value=""></option>
                            <?php foreach ($instansis as $instansi) { ?>
                                <option value="<?php echo $instansi->kode; ?>"><?php echo $instansi->kode; ?> <?php echo $instansi->nama_instansi; ?></option>

                            <?php } ?>
                        </select>

                    <?php } ?>

                </div>
            </div>

            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Hak Akses</label>
                <div class="col-10">
                    <?php if ($no == '2') { ?>
                        <?php foreach ($q_rolept as $rolept) { ?>
                            <input class="form-control" type="hidden" id="user" name="sub" value="1">
                            <input class="form-control" type="hidden" id="user" name="bagian" value="<?php echo $rolept->id; ?>">
                            <input class="form-control" type="text" id="user" value="<?php echo $rolept->nama; ?>" readonly>
                        <?php } ?>
                    <?php } else { ?>
                        <input class="form-control" type="hidden" id="user" name="sub" value="0">
                        <select name="bagian" class="select2 m-b-10 select2-multiple" id="bagian" style="width: 100%" data-placeholder="Click to Choose..." required>
                            <option value=""></option>
                            <?php foreach ($roles as $role) { ?>
                                <option value="<?php echo $role->id; ?>"><?php echo $role->nama; ?> </option>
                            <?php } ?>
                        </select>

                    <?php } ?>

                </div>
            </div>
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Username</label>
                <div class="col-10">
                    <input class="form-control lower" type="text" id="user" name="user" required>
                </div>
            </div>
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                    <input class="form-control lower" type="text" id="pass" name="pass" required>
                </div>
            </div>
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Surat Keterangan/Surat Tugas</label>
                <div class="col-10">
                    <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                    <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>