<?php
date_default_timezone_set('Asia/Jakarta');
$no_usulan_dupak_details = date("his") . $no;
?>
<div class="modal fade" aria-labelledby="myLargeModalLabel" id="edit<?= $row_thn['berkas'] ?>">
    <div class="modal-dialog modal-lg text-justify">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <form method="post" action="<?= base_url() ?>usulan/usulan_dupak/edit_a0004/A0004" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <h3>BIDANG A</h3>
                    <b>Melaksanakan Perkulihan/Tutorial & Membimbing, Menguji Serta Menyelenggarakan Pendidikan di Laboratorium, Praktek Keguruan Bengkel/Studio/Kebun</b><br>
                    Melaksanakan Perkulihan/Tutorial & Membimbing, Menguji Serta Menyelenggarakan Pendidikan di Laboratorium, Praktik Keguruan Bengkel/Studio/Kebun Pada Fakultas/Sekolah Tinggi/Akademi/ Politeknik Sendiri, Pada Fakultas Lain Dalam Lingkungan Universitas/Institut Sendiri, maupun di Luar Perguruan Tinggi Sendiri Secara Melembaga Paling Banyak 12 SKS/Semester
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="semester">Semester</label><br>
                                <input type="hidden" name="no_usulan_detail" id="no_usulan_detail" value="<?= $no_usulan_dupak_details ?>">
                                <input type="hidden" name="no_usulan" value="<?= $no; ?>" required>
                                <input type="hidden" name="jabatan_no" value="<?= $jabatan_no; ?>" required>
                                <input type="text" class="form-control" disabled name="semester" value="<?= $row_thn['semester'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tgl">Tanggal ST</label>
                                <div class="input-group date">
                                    <input type="date" name="tgl" value="<?= $row_thn['tgl'] ?>" class="form-control pull-right date-picker" id="tgl" placeholder="yyyy-mm-dd" required>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="berkas">Upload Surat Tugas Mengajar</label><br>
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

                                <input type="file" required name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                                <p class="help-block">Ukuran File maksimal 5MB dengan ekstensi .pdf</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <b>*Gunakan Angka dan tanda titik (.) jika bilangan desimal</b>
                        <table border="1" width="100%">
                            <thead>
                                <tr style="background-color: #e4e4e4; font-weight: bold;">
                                    <th width="20">#</th>
                                    <th>Mata Kuliah</th>
                                    <th width="50">SKS/mtk</th>
                                    <th width="50">Jumlah Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dmt = $this->db->query("SELECT * FROM usulan_dupak_details WHERE usulan_no='$no' AND berkas='$row_thn[berkas]'")->result();

                                $mor = 1;
                                foreach ($dmt as $m) {
                                ?>
                                    <tr>
                                        <td><?= $mor++; ?></td>
                                        <td><?= $m->uraian ?></td>
                                        <td class="text-center"><input type="text" style="width:100px;" value="<?= $m->sks ?>" name="sks[]" class="form-control" required></td>
                                        <td class="text-center"><input type="text" style="width:100px;" value="<?= $m->jumlah_volume ?>" name="jumlah_volume[]" class="form-control" required></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="berkas">Bukti Pengajaran (BAP, Presensi, & Penilaian).</label>
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
                                    <input type="text" name="link_repo" id="text_link" class="form-control" placeholder="https://repository...">
                                    <p class="help-block"></p>
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