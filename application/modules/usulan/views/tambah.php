<?php
error_reporting(0);
include "koneksi.php";
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Tambah Usulan JAD </h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Verifikasi Jabatan Fungsional</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <label class="control-label"><b>Jabatan Fungsional Terakhir Anda</b></label>
                                <br>
                                <span class="badge badge-warning">
                                    <font style="font-size:23px; font-family:verdana;">&nbsp;<?= $j->nama_jabatans ?> (<?= $j->kum ?>)&nbsp;</font>
                                </span>
                            </div>
                        </div>
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h3 class="card-title"><img src="<?= base_url() . 'assets/images/info.png' ?>" height="30" width="30"> Informasi :</h3>
                                <p class="card-text">
                                <ul>
                                    <li>
                                        <b>Jika data fungsional terakhir Anda belum sesuai dengan data SISTER/PDDIKTI, silakan klik tombol dibawah ini :</b>
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
                                        <b>Data yang telah diperbaharui dan sudah tervalidasi melalui laman SISTER akan terproses dalam jangka waktu 2 x 24 jam untuk ditampilkan pada Sistem Jabatan Fungsional LLDIKTI III (SIJALI III).</b>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <?php if ($j->jabatan_no <> '') { ?>
                                    <a href="<?php echo base_url(); ?>usulan/usulan/pilih/<?= $j->jabatan_no ?>" class="btn btn-lg btn-success"><i class="fa fa-paper-plane-o"></i> Klik untuk ke langkah selanjutnya</a>
                                <?php } else { ?>
                                    <a href="#" class="btn btn-lg btn-danger" onclick="alert('Jabatan fungional terakhir Anda belum berhak untuk mengajukan usulan baru')"><i class="fa fa-ban"></i> Klik untuk ke langkah selanjutnya</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>