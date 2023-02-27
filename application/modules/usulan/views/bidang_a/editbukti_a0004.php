<?php
date_default_timezone_set('Asia/Jakarta');
$no_usulan_dupak_details = date("his") . $no;
?>
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="editbukti<?= $row_thn['berkas'] ?>">
    <div class="modal-dialog text-justify">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <form method="post" action="<?= base_url() ?>usulan/usulan_dupak/upberkas_a0004/A0004" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <center>
                        <h3><b>Edit Berkas Semester <?= $row_thn['semester'] ?></b></h3>
                    </center>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="no_usulan_detail" id="no_usulan_detail" value="<?= $no_usulan_dupak_details ?>">
                            <input type="hidden" name="usulan_no" value="<?= $no; ?>" required>
                            <input type="hidden" name="semester" value="<?= $row_thn['semester'] ?>" required>

                            <div class="form-group">
                                <label for="berkas">
                                    <font size="4"> Surat Tugas Mengajar :</font>
                                </label><br>
                                <?php
                                if ($row_thn['berkas'] <> '') {
                                    $bt = "success";
                                    $ic = "fa-cloud-download";
                                    $l  = base_url() . "usulan/usulan_dupak/download_bidanga/" . $row_thn['berkas'];
                                    $ta = "_blank";
                                } else {
                                    $bt = "danger";
                                    $ic = "fa-ban";
                                    $l  = "#";
                                    $ta = "";
                                }

                                if ($row_thn['bukti_pengajaran'] <> '') {
                                    $bt2 = "success";
                                    $ic2 = "fa-cloud-download";
                                    $l2  = base_url() . "usulan/usulan_dupak/download_bidanga/" . $row_thn['bukti_pengajaran'];
                                    $ta2 = "_blank";
                                } else {
                                    $bt2 = "danger";
                                    $ic2 = "fa-ban";
                                    $l2  = "#";
                                    $ta2 = "";
                                }
                                ?>

                                <a target="<?= $ta ?>" href="<?= $l ?>" class="btn btn-sm btn-<?= $bt ?>"><i class="fa <?= $ic ?>"></i> ST Mengajar yang sudah diupload [PDF]</a>

                                <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                                <p class="help-block">Ukuran File maksimal 5MB dengan ekstensi .pdf</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="berkas">
                                    <font size="4"> Bukti Pengajaran (BAP, Presensi, & Penilaian) : </font>
                                </label>
                                <br>
                                <?php
                                if (substr($row_thn['bukti_pengajaran'], 0, 5) == "bukti") {
                                ?>
                                    <a target="<?= $ta2 ?>" href="<?= $l2 ?>" class="btn btn-sm btn-<?= $bt2 ?>"><i class="fa <?= $ic2 ?>"></i> Bukti Pengajaran [PDF]</a>
                                    <?php
                                } else {
                                    if ($row_thn['bukti_pengajaran'] <> '') {
                                    ?>
                                        <a href="<?= $row_thn['bukti_pengajaran'] ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-external-link"></i> Bukti Pengajaran [Link Repository]</a>
                                    <?php } else { ?>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Bukti Pengajaran</a>
                                <?php
                                    }
                                }
                                ?>
                                <br>
                                <label for="berkas">Silakan pilih salah satu metode dibawah ini :</label>
                                <br>
                                <input type="radio" class="largerCheckbox" name="pilihan" value="upload" onchange="handleRadioChange(<?= $i ?>, event)"> Upload File
                                <input type="radio" class="largerCheckbox" name="pilihan" value="link" onchange="handleRadioChange(<?= $i ?>, event)"> Input Link Repository
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div id="upfil<?= $i ?>" style="display: none;">
                                    <input type="file" name="bukti_pengajaran" class="form-control" accept="application/pdf" max="10000">
                                    <p class="help-block">Ukuran file maksimal 10 MB. Dijadikan 1 file .pdf</p>
                                </div>
                                <div id="lipo<?= $i ?>" style="display: none;">
                                    <textarea name="link_repo" class="form-control" placeholder="https://repository..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="btn-group pull-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>