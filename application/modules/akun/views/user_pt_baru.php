<?php
// foreach ($hasil as $hasil) {
//     $id_sdm             = $hasil["id"];
//     $nama                 = addslashes($hasil["nama"]);
//     $nidn                 = $hasil["nidn"];
//     $jabatan_no         = $hasil["jabatan_fungsional"]["id"];

//     echo "id_sdm = $id_sdm<br>";
//     echo "nama = $nama<br>";
//     echo "nidn = $nidn<br>";
//     echo "jabatan_no = $jabatan_no<br><br>";
// }
?>

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
        <h4 class="m-b-0 text-white">Master User Dosen </h4>
    </div>
    <div class="card-body">
        <h6 class="card-subtitle"> Tambah User</h6>
        <form method="post" action="<?= base_url() ?>akun/akun/tambah_user/2" role="form" enctype="multipart/form-data">
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Nama Lengkap</label>

                <div class="col-10 m-b-20">
                    <input type="text" class="form-control" id="dosen" placeholder="Ketik nama dosen" required>
                </div>

                <label for="example-text-input" class="col-2 col-form-label">Nama Lengkap</label>
                <div class="col-10">
                    <select class="select2 m-b-10 " style="width: 100%" onchange="changeValue(this.value)">
                        <?php
                        echo '<option value="" disabled selected hidden>Click to Choose...</option>';
                        $jsArray = "var prdName = new Array();\n";
                        foreach ($hasil as $hasil) {
                            $id_sdm     = $hasil["id"];
                            $nama       = addslashes($hasil["nama"]);
                            $nidn       = $hasil["nidn"];
                            $jabatan_no = $hasil["jabatan_fungsional"]["id"];
                        ?>

                            <option value="<?= $nidn ?>"><?= $nidn ?> - <?= $nama ?></option>';

                        <?php
                            $jsArray .= "prdName['" . addslashes($nidn) . "'] = {nidn:'" . addslashes($nidn) . "',nama:'" . addslashes($nama) . "'};\n";
                        }
                        ?>
                    </select>
                    <script type="text/javascript">
                        <?php echo $jsArray; ?>

                        function changeValue(id) {
                            document.getElementById('nidn').value = prdName[id].nidn;
                            document.getElementById('nama').value = prdName[id].nama;
                        };
                    </script>

                </div>
            </div>
            <input class="form-control" type="hidden" name="nama" id="nama" readonly>
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="email">
                </div>
            </div>
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Telp</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="telp">
                </div>
            </div>

            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Instansi</label>
                <div class="col-10">
                    <select name="instansi" class="select2 m-b-10 select2-multiple" style="width: 100%">

                        <?php foreach ($instan as $instansi) { ?>
                            <option value="<?php echo $instansi->kode; ?>"><?php echo $instansi->kode; ?>
                                <?php echo $instansi->nama_instansi; ?></option>

                        <?php
                        } ?>
                    </select>
                    <input class="form-control" type="hidden" id="user" name="sub" value="0">
                </div>
            </div>

            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Hak Akses</label>
                <div class="col-10">
                    <select name="bagian" class="select2 m-b-10 select2-multiple" style="width: 100%">

                        <?php foreach ($role as $rol) { ?>
                            <option value="<?php echo $rol->id; ?>"><?php echo $rol->nama; ?> </option>

                        <?php
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Username</label>
                <div class="col-10">
                    <input class="form-control" type="text" id="nidn" name="user" readonly>
                </div>
            </div>

            <div class="form-group m-t-40 row">
                <!-- <label for="example-text-input" class="col-2 col-form-label">Password</label> -->
                <div class="col-10">
                    <input class="form-control" type="hidden" name="pass" value="<?php echo passAcak(5); ?>" readonly>
                </div>
            </div>
            <div class="form-group m-t-40 row">
                <label for="example-text-input" class="col-2 col-form-label">Surat Persetujuan</label>
                <div class="col-10">
                    <input type="file" name="berkas" class="form-control" accept="application/pdf" max="5000">
                    <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
<?php
function passAcak($panjang)
{
    $karakter .= '1234567890'; // karakter numerik
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter{
            $pos};
    }
    return $string;
}
?>