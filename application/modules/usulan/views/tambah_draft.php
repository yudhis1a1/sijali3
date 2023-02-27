<?php
error_reporting(0);
include "koneksi.php";
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Tambah Usulan JAD </h4>
    </div>
</div>


<div class="col-12">
    <!-- Progress Bar -->
    <div class="card text-white bg-danger">
        <div class="card-body">
            <h3 class="card-title"><img src="<?= base_url() . 'assets/images/info.png' ?>" height="30" width="30"> Informasi :</h3>
            <p class="card-text">
            <ul>
                <li>
                    <b>Pastikan data Anda sudah benar. Jika data Anda masih salah atau kosong, silakan Anda perbarui data PDDIKTI Anda melalui SISTER / Admin Perguruan Tinggi.</b>
                </li>
                <br>
                <li>
                    <b>Data yang telah diperbaharui dan sudah tervalidasi melalui laman SISTER akan terproses dalam jangka waktu 2 x 24 jam untuk ditampilkan pada Sistem Jabatan Fungsional LLDIKTI III (SIJALI III).</b>
                </li>
                <br>
                <li>
                    <b>Untuk memperbarui identitas dosen pada Sistem Jabatan Fungsional LLDIKTI III (SIJALI III) dengan data SISTER/PDDIKTI, Silakan klik tombol dibawah ini :
                    </b>
                    <form method="post" id="sample_form">
                        <button type="submit" class="btn btn-info" name="save" id="save"><i class="fa  fa-retweet"></i> [SINKRON IDENTITAS DOSEN PDDIKTI]</button>
                    </form>
                    <span id="success_message"></span>
                    <div class="form-group" id="process" style="display:none;">
                        <br>
                        <center>
                            <h3>processing...<h3>
                        </center>
                        <div class="progress">
                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:15%;height:20px;"> <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                </li>
                <br>
                <li>
                    <b>Untuk memperbarui data gelar dan riwayat pendidikan pada Sistem Jabatan Fungsional LLDIKTI III (SIJALI III) dengan data SISTER/PDDIKTI, Silakan klik tombol dibawah ini :</b>
                    <form method="post" id="form_pend">
                        <button type="submit" class="btn btn-info" name="save" id="save_pend"><i class="fa  fa-retweet"></i> [SINKRON DATA RIWAYAT PENDIDIKAN]</button>
                    </form>
                    <span id="success_message_pend"></span>
                    <div class="form-group" id="process_pend" style="display:none;">
                        <br>
                        <center>
                            <h3>processing...<h3>
                        </center>
                        <div class="progress">
                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:15%;height:20px;"> <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                </li>
                <br>
                <li>
                    <b>Untuk memperbarui data riwayat pendidikan pada Sistem Jabatan Fungsional LLDIKTI III (SIJALI III) dengan data SISTER/PDDIKTI, Silakan klik tombol dibawah ini :</b>
                    <form method="post" id="form_ajar">
                        <button type="submit" class="btn btn-info" name="save" id="save_ajar"><i class="fa  fa-retweet"></i> [SINKRON DATA RIWAYAT PENGAJARAN]</button>
                    </form>
                    <span id="success_message_ajar"></span>
                    <div class=" form-group" id="process_ajar" style="display:none;">
                        <br>
                        <center>
                            <h3>processing...<h3>
                        </center>
                        <div class="progress">
                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:15%;height:20px;"> <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                </li>
                <br>
                <li>
                    <b>Data yang tidak lengkap atau tidak sesuai maka akan membuat waktu pengajuan Anda semakin lama.</b>
                </li>
            </ul>
        </div>
    </div>

    <!-- Validation wizard -->
    <div class="row" id="validation">
        <div class="col-12">
            <div class="card wizard-content">
                <div class="card-body">
                    <form action="<?php echo base_url() . 'usulan/usulan/tambah_usulan' ?>" method="post" enctype="multipart/form-data" class="validation-wizard wizard-circle" id="form-submit">
                        <!-- Step 1 -->
                        <h6>Identitas Diri</h6>
                        <section>
                            <div class="row">
                                <?php foreach ($dosen->result() as $row) {  ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">NIDN/NIDK<span class="danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="form-control" required data-validation-required-message="This field is required" id="nidn" name="nidn" placeholder="nidn" value="<?= $row->nidn ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" required data-validation-required-message="khusus dosen PNS, jika tidak memiliki isi dengan tanda (-)" id="nip" name="nip" placeholder="NIP">
                                                <input type="hidden" class="form-control " id="node" name="node" value="<?= $row->no ?>">
                                                <input type="hidden" class="form-control " id="jabatan_akhir_no" name="jabatan_akhir_no" value="<?= $jabatan_akhir_no ?>">
                                            </div>
                                            <code>*khusus dosen PNS, jika tidak memiliki isi dengan tanda (-)</code>
                                        </div>
                                        <div class="form-group">
                                            <label for="dosen_karpeg">Nomor KARPEG</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" required data-validation-required-message="khusus dosen PNS, jika tidak memiliki isi dengan tanda (-)" id="karpeg" name="dosen_karpeg" value="<?= $row->karpeg ?>">
                                            </div>
                                            <code>*khusus dosen PNS, jika tidak memiliki isi dengan tanda (-)</code>
                                        </div>

                                        <div class="form-group">
                                            <label for="Nama">Nama<span class="danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="form-control" required data-validation-required-message="This field is required" name="dosen_nama" type="text" name="prod_name" id="nama" value="<?= $row->nama ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gelar_depan">Gelar Depan</label>
                                            <div class="controls">
                                                <?php
                                                if ($row->gelar_depan == '') {
                                                    $gel_dep = "-";
                                                } else {
                                                    $gel_dep = $row->gelar_depan;
                                                }
                                                ?>
                                                <input type="text" class="form-control " required data-validation-required-message="bila tidak memiliki gelar depan isi dengan (-)" id="gelar_depan" name="gelar_depan" value="<?= $gel_dep; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Gelar Belakang<span class="danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="form-control " required data-validation-required-message="This field is required" id="gelar_belakang" name="gelar_belakang" value="<?= $row->gelar_belakang ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Ikatan Kerja<span class="danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="form-control " required data-validation-required-message="This field is required" id="nama_ikatan" name="nama_ikatan" value="<?= $row->nama_ikatan ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Homebase PT<span class="danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="form-control " required data-validation-required-message="This field is required" id="nama_instansi" name="nama_instansi" value="<?= $row->nama_instansi ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Homebase Prodi<span class="danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="form-control " required data-validation-required-message="This field is required" id="nama_prodi" name="dosen_prodi" value="<?= $row->nama_prodi ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat dan Tanggal Lahir<span class="danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="dosen_ttl" class="form-control  pull-right date-picker" required data-validation-required-message="This field is required" id="tempat_lahir" value="<?= $row->lahir_tempat ?>, <?= $row->lahir_tgl ?>" readonly>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label>Jenis Kelamin<span class="danger">*</span></label>
                                            <div class="controls">
                                                <?php
                                                if ($row->jk == 'L') {
                                                    $jen_kel = "Laki-Laki";
                                                } elseif ($row->jk == 'P') {
                                                    $jen_kel = "Perempuan";
                                                }
                                                ?>
                                                <input type="text" name="jk" class="form-control  pull-right date-picker" required data-validation-required-message="This field is required" id="jk" value="<?= $jen_kel; ?>" readonly>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label>Pendidikan pada Usulan Kenaikan Jabatan/Pangkat <span class="danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" class="form-control " id="nama_jenjang" required data-validation-required-message="This field is required" name="nama_jenjang" value="<?= $row->nama_jenjang ?>" readonly>
                                                <input type="hidden" class="form-control " id="jenjang_id_usulan" name="jenjang_id_usulan" value="<?= $row->jenjang_id ?> " readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan_tgl">TMT sebagai Dosen Tetap<span class="danger">*</span></label>
                                            <div class="controls">
                                                <input type="date" name="pengangkatan_tgl" class="form-control  pull-right date-picker required" required data-validation-required-message="This field is required" id="tgl_pangkat" value="<?= $row->pengangkatan_tgl ?>" readonly>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label for="jabatan_usulan_no">Jabatan Usulan</label>
                                            <div class="controls">
                                                <select name="jabatan_usulan_no" class="select2 m-b-10 select2-multiple" style="width: 100%" id="jabatan_usulan_no" data-placeholder="Click to Choose..." required data-validation-required-message="Data jabatan usulan belum dipilih" required>
                                                    <option value=""></option>
                                                    <?php foreach ($jabatan_jenjang->result() as $jj) { ?>
                                                        <option value="<?php echo $jj->jabatan_usulan_no; ?>"><?php echo $jj->nama_jabatans; ?> <?php echo $jj->kum; ?> (<?php echo $jj->nama_jenjang; ?>)</option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    <?php }  ?>
                                    </div>
                                    <?php if ($sinkron_at <> '') { ?>
                                        <font color="red">
                                            <b><i>*Data telah disinkron pada tanggal <?= $sinkron_at ?></i></b>
                                        </font>
                                    <?php } ?>
                        </section>
                        <!-- Step 2 -->
                        <h6>Riwayat Pendidikan</h6>
                        <section>
                            <?php include "riwayat_pend.php" ?>
                        </section>
                        <!-- Step 3 -->
                        <h6>Riwayat Pengajaran</h6>
                        <section>
                            <?php include "riwayat_ajar.php" ?>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    <?php echo $jsArray; ?>

    function changeValue(id) {
        document.getElementById('nama').value = prdName[id].nama;
        document.getElementById('tgl_pangkat').value = prdName[id].tgl_pangkat;
        document.getElementById('karpeg').value = prdName[id].karpeg;
        document.getElementById('nip').value = prdName[id].nip;
        document.getElementById('gelar_depan').value = prdName[id].gelar_depan;
        document.getElementById('gelar_belakang').value = prdName[id].gelar_belakang;
        document.getElementById('nama_instansi').value = prdName[id].nama_instansi;
        document.getElementById('nama_ikatan').value = prdName[id].nama_ikatan;
        document.getElementById('nama_prodi').value = prdName[id].nama_prodi;
        document.getElementById('tempat_lahir').value = prdName[id].tempat_lahir;
        document.getElementById('jk').value = prdName[id].jk;
        document.getElementById('node').value = prdName[id].node;
        document.getElementById('nama_jenjang').value = prdName[id].nama_jenjang;

    };
</script>