<?php
error_reporting(0);

?>

<style>
  .valid {
    background-color: rgba(0, 204, 255, .6);
  }

  .unvalid {
    background-color: rgba(255, 0, 0, .5);
  }
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"></h4>
        <?php
        $no;



        ?>


        <div class="table-responsive">
          <table class="table color-table info-table" id="tabsyarat">
            <thead>
              <tr>

                <th class="text-center" style="width: 50px;">No.</th>
                <th class="text-center">Persyaratan.</th>
                <th class="text-center" style="width: 50px;" colspan="4">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>

                <td class="text-center">1</td>
                <td>Surat Pengantar dari Pimpinan PTS (Rektor/Ketua/Direktur)</td>
                <?php if (isset($ceklis->surat_pengantar)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->surat_pengantar ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') &&  $usulan_status == '3') {
                      $sp = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='surat_pengantar';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/surat_pengantar" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-sp" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="1"><i class=" fa fa-plus-square"></i></a>
                    <div id="div1" class="targetDiv" style="display:none;">
                      <p><?= $sp->keterangan ?></p>
                      <p><b>PIC: </b><?= $sp->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  }
              ?>
              <input type="hidden" value="<?= $sp->status ?>">
              </td>

              </tr>

              <tr>
                <td class="text-center">2 </td>
                <td>Fotocopy SK Pengangkatan sebagai Dosen Tetap Yayasan dilegalisir</td>
                <?php if (isset($ceklis->sk_pengangkatan)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_pengangkatan ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $skp = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sk_pengangkatan';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sk_pengangkatan" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-skp" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="2"><i class=" fa fa-plus-square"></i></a>
                    <div id="div2" class="targetDiv" style="display:none;">
                      <p><?= $skp->keterangan ?></p>
                      <p><b>PIC: </b><?= $skp->nama ?></p>
                    </div>
                  </td>
              <?php } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $skp->status ?>">
              </td>

              </tr>

              <tr>
                <td class="text-center">3</td>
                <td>Daftar Usul Penetapan Angka Kredit (DUPAK)</td>
                <?php if (isset($ceklis->dupak)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->dupak ?>" target="_blank" class="btn btn-xs btn-info">
                      <i class="fa fa-search"></i>
                    </a>

                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $dupak = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='dupak';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/dupak" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-dpk" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="3"><i class=" fa fa-plus-square"></i></a>
                    <div id="div3" class="targetDiv" style="display:none;">
                      <p><?= $dupak->keterangan ?></p>
                      <p><b>PIC: </b><?= $dupak->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $dupak->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">4</td>
                <td>Surat Pernyataan Melaksanakan Pendidikan dan Pengajaran (Bidang A)</td>
                <?php if (isset($ceklis->sp_pengajaran)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_pengajaran ?>" target="_blank" class="btn btn-xs btn-info">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $sp_ajar = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sp_pengajaran';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sp_pengajaran" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-spaj" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="4"><i class=" fa fa-plus-square"></i></a>
                    <div id="div4" class="targetDiv" style="display:none;">
                      <p><?= $sp_ajar->keterangan ?></p>
                      <p><b>PIC: </b><?= $sp_ajar->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $sp_ajar->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">5</td>
                <td>Surat Pernyataan Melaksanakan Penelitian (Bidang B), beserta Karya llmiah yang asli</td>
                <?php if (isset($ceklis->sp_penelitian)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_penelitian ?>" target="_blank" class="btn btn-xs btn-info">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $sp_penelitian = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sp_penelitian';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sp_penelitian" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')">
                        <i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-spp" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="5"><i class=" fa fa-plus-square"></i></a>
                    <div id="div5" class="targetDiv" style="display:none;">
                      <p><?= $sp_penelitian->keterangan ?></p>
                      <p><b>PIC: </b><?= $sp_penelitian->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $sp_penelitian->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">6</td>
                <td>Surat Pernyataan Melaksanakan Pengabdian Pada Masyarakat (Bidang C)</td>
                <?php if (isset($ceklis->sp_pengabdian)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_pengabdian ?>" target="_blank" class="btn btn-xs btn-info">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $sp_pengabdian = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sp_pengabdian';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sp_pengabdian" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"> <i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-spabdian" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="6"><i class=" fa fa-plus-square"></i></a>
                    <div id="div6" class="targetDiv" style="display:none;">
                      <p><?= $sp_pengabdian->keterangan ?></p>
                      <p><b>PIC: </b><?= $sp_pengabdian->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $sp_pengabdian->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">7</td>
                <td>Surat Pernyataan Melaksanakan Penunjang Tri Dharma Perguruan Tinggi (Bidang D)</td>
                <?php if (isset($ceklis->sp_penunjang)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_penunjang ?>" target="_blank" class="btn btn-xs btn-info">
                      <i class="fa fa-search"></i>
                    </a>

                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $sp_penunjang = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sp_penunjang';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sp_penunjang" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"> <i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-spnunjang" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="7"><i class=" fa fa-plus-square"></i></a>
                    <div id="div7" class="targetDiv" style="display:none;">
                      <p><?= $sp_penunjang->keterangan ?></p>
                      <p><b>PIC: </b><?= $sp_penunjang->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $sp_penunjang->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">8</td>
                <td>Berita Acara Senat Fakultas bagi Universitas/Institut atau Senat Perguruan Tinggi bagi Sekolah Tinggi/Akademi dan Politeknik (<a href="<?= base_url() ?>assets/download_berkas/SENAT.pdf" target="_blank">Format Terlampir</a>) + Daftar Hadir</td>
                <?php if (isset($ceklis->ba_senat)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->ba_senat ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i>
                    </a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $ba_senat = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='ba_senat';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/ba_senat" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"> <i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-ba" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="8"><i class=" fa fa-plus-square"></i></a>
                    <div id="div8" class="targetDiv" style="display:none;">
                      <p><?= $ba_senat->keterangan ?></p>
                      <p><b>PIC: </b><?= $ba_senat->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $ba_senat->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">9</td>
                <td>Surat Pernyataan Keabsahan Karya llmiah yang ditandatangani Dosen ybs. (<a href="<?= base_url() ?>assets/download_berkas/KEABSAHAN KARYA ILMIAH .pdf" target="_blank">Format Terlampir</a>)</td>
                <?php if (isset($ceklis->sp_karya_ilmiah)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sp_karya_ilmiah ?>" target="_blank" class="btn btn-xs btn-info"> <i class="fa fa-search"></i>
                    </a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $sp_ilmiah = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sp_karya_ilmiah';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sp_karya_ilmiah" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-karya" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="9"><i class=" fa fa-plus-square"></i></a>
                    <div id="div9" class="targetDiv" style="display:none;">
                      <p><?= $sp_ilmiah->keterangan ?></p>
                      <p><b>PIC: </b><?= $sp_ilmiah->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $sp_ilmiah->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">10</td>
                <td>Lembar Pernyataan Pengesahan Hasil Validasi Karya Ilmiah yang ditandatangani oleh Pimpinan PTS (<a href="<?= base_url() ?>assets/download_berkas/PENGESAHAN VALIDASI KARYA ILMIAH.pdf" target="_blank">Format Terlampir</a>)</td>
                <?php if (isset($ceklis->validasi_karya_ilmiah)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->validasi_karya_ilmiah ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $vad_ilmiah = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='validasi_karya_ilmiah';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/validasi_karya_ilmiah" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-vadkarya" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="10"><i class=" fa fa-plus-square"></i></a>
                    <div id="div10" class="targetDiv" style="display:none;">
                      <p><?= $vad_ilmiah->keterangan ?></p>
                      <p><b>PIC: </b><?= $vad_ilmiah->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $vad_ilmiah->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">11</td>
                <td>Fotocopy SK/Surat Izin Studi Lanjut dari Pimpinan PTS (bagi Dosen yang sedang melaksanakan/ menyelesaikan studi lanjut)</td>
                <?php if (isset($ceklis->sk_tugas_belajar)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_tugas_belajar ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $t_ajar = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sk_tugas_belajar';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sk_tugas_belajar" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-tubel" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="11"><i class=" fa fa-plus-square"></i></a>
                    <div id="div11" class="targetDiv" style="display:none;">
                      <p><?= $t_ajar->keterangan ?></p>
                      <p><b>PIC: </b><?= $t_ajar->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $t_ajar->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">12</td>
                <td>Fotocopy SK Pengaktifan Kembali (untuk dosen yang sudah menyelesaikan studi lanjut dengan status tugas belajar)</td>
                <?php if (isset($ceklis->sk_aktif_kembali)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_aktif_kembali ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i>
                    </a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $sk_aktif = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sk_aktif_kembali';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sk_aktif_kembali" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-sk_aktif" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="12"><i class=" fa fa-plus-square"></i></a>
                    <div id="div12" class="targetDiv" style="display:none;">
                      <p><?= $sk_aktif->keterangan ?></p>
                      <p><b>PIC: </b><?= $sk_aktif->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $sk_aktif->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">13</td>
                <td>Fotocopy SK Dosen PNS, SK CPNS, SK Golongan terakhir (bagi dosen PNS dpk.)</td>
                <?php if (isset($ceklis->sk_dosen_pns)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_dosen_pns ?>" target="_blank" class="btn btn-xs btn-info">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $sk_pns = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sk_dosen_pns';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sk_dosen_pns" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-sk_pns" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="13"><i class=" fa fa-plus-square"></i></a>
                    <div id="div13" class="targetDiv" style="display:none;">
                      <p><?= $sk_pns->keterangan ?></p>
                      <p><b>PIC: </b><?= $sk_pns->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $sk_pns->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">14</td>
                <td>Fotocopy Keputusan Kepala BKN tentang penetapan NIP Baru (bagi dosen PNS dpk.)</td>
                <?php if (isset($ceklis->sk_nip_baru)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_nip_baru ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $sk_nip = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sk_nip_baru';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sk_nip_baru" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-sk_nip" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="14"><i class=" fa fa-plus-square"></i></a>
                    <div id="div14" class="targetDiv" style="display:none;">
                      <p><?= $sk_nip->keterangan ?></p>
                      <p><b>PIC: </b><?= $sk_nip->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $sk_nip->status ?>">
              </td>

              </tr>
              <tr>
                <td class="text-center">15</td>
                <td>Fotocopy Surat Pernyataan Menduduki Jabatan (SPMJ) dan Surat Pernyataan Melaksanakan Tugas (SPMT) (bagi dosen PNS dpk.)</td>
                <?php if (isset($ceklis->spmj_spmt)) { ?>
                  <td class="text-center" style="width: 50px;">
                    <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->spmj_spmt ?>" target="_blank" class="btn btn-xs btn-info">
                      <i class="fa fa-search"></i>
                    </a>
                  </td>
                  <td class="text-center" style="width: 50px;">
                    <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                      $spmj_spmt = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='spmj_spmt';")->row();
                    ?>


                      <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/spmj_spmt" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                  </td>
                  <td><a data-target="#myModal-sk_spmj" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                  <td>
                    <a class="showSingle buttons" target="15"><i class=" fa fa-plus-square"></i></a>
                    <div id="div15" class="targetDiv" style="display:none;">
                      <p><?= $spmj_spmt->keterangan ?></p>
                      <p><b>PIC: </b><?= $spmj_spmt->nama ?></p>
                    </div>
                  </td>
              <?php
                    } else {
                    }
                  } ?>
              <input type="hidden" value="<?= $spmj_spmt->status ?>">
              </td>

              </tr>
              <?php
              if ($jabatan_usulan_no == '8' || $jabatan_usulan_no == '11' || $jabatan_usulan_no == '12' || $jabatan_usulan_no == '9' || $jabatan_usulan_no == '10' || $jabatan_usulan_no == '13' || $jabatan_usulan_no == '14' || $jabatan_usulan_no == '15') {
              ?>
                <tr>
                  <td class="text-center">16</td>
                  <td>2 (Dua) Tahun Terakhir Penilaian Prestasi Kerja dari Pimpinan PTS (<a href="<?= base_url() ?>files/Format-Lampiran-Penilaian-Prestasi-Kerja.xls" target="_blank">Format Terlampir</a>)</td>
                  <?php if (isset($ceklis->penilaian_kerja)) { ?>
                    <td class="text-center" style="width: 50px;">
                      <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->penilaian_kerja ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                    </td>
                    <td class="text-center" style="width: 50px;">
                      <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                        $pj = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='penilaian_kerja';")->row();
                      ?>


                        <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/penilaian_kerja" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                    </td>
                    <td><a data-target="#myModal-prestasi" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                    <td>
                      <a class="showSingle buttons" target="16"><i class=" fa fa-plus-square"></i></a>
                      <div id="div16" class="targetDiv" style="display:none;">
                        <p><?= $pj->keterangan ?></p>
                        <p><b>PIC: </b><?= $pj->nama ?></p>
                      </div>
                    </td>
                <?php
                      } else {
                      }
                    } ?>
                <input type="hidden" value="<?= $pj->status ?>">
                </td>

                </tr>
              <?php
              } else {
              ?>
                <tr>
                  <td class="text-center">16</td>
                  <td>1 (Satu) Tahun Terakhir Penilaian Prestasi Kerja dari Pimpinan PTS 1 (Satu) Tahun Terakhir Penilaian Prestasi Kerja dari Pimpinan PTS (<a href="<?= base_url() ?>files/Format-Lampiran-Penilaian-Prestasi-Kerja.xls" target="_blank">Format Terlampir</a>)</td>
                  <?php if (isset($ceklis->penilaian_kerja)) { ?>
                    <td class="text-center" style="width: 50px;">
                      <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->penilaian_kerja ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                    </td>
                    <td class="text-center" style="width: 50px;">
                      <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                        $pj = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='penilaian_kerja';")->row();
                      ?>


                        <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/penilaian_kerja" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                    </td>
                    <td><a data-target="#myModal-prestasi" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                    <td>
                      <a class="showSingle buttons" target="16"><i class=" fa fa-plus-square"></i></a>
                      <div id="div16" class="targetDiv" style="display:none;">
                        <p><?= $pj->keterangan ?></p>
                        <p><b>PIC: </b><?= $pj->nama ?></p>
                      </div>
                    </td>
                <?php
                      } else {
                      }
                    } ?>
                <input type="hidden" value="<?= $pj->status ?>">
                </td>

                </tr>
              <?php }  ?>
              <?php if ($jabatan_no == '31') {
                if (substr($isi->nidn, 0, 2) == '88' || substr($isi->nidn, 0, 2) == '89') {
              ?>
                  <tr>
                    <td class="text-center">17</td>
                    <td>Surat Pernyataan Mendekati Pensiun (<a href="<?= base_url() ?>files/Format_surat_pernyataan_mendekati_pensiun.docx" target="_blank">Format Terlampir</a>)</td>
                  </tr>
                <?php } ?>
              <?php } elseif ($jabatan_no <> '31') { ?>
                <tr>
                  <td class="text-center">17</td>
                  <td>Fotocopy PAK dan SK Jabatan Akademik Dosen (bagi yang mengajukan Kenaikan Jabatan/Pangkat)</td>
                  <?php if (isset($ceklis->sk_jad_dosen)) { ?>
                    <td class="text-center" style="width: 50px;">
                      <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_jad_dosen ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                    </td>
                    <td class="text-center" style="width: 50px;">
                      <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                        $sk_jad = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sk_jad_dosen';")->row();
                      ?>


                        <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sk_jad_dosen" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                    </td>
                    <td><a data-target="#myModal-jad" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                    <td>
                      <a class="showSingle buttons" target="17"><i class=" fa fa-plus-square"></i></a>
                      <div id="div17" class="targetDiv" style="display:none;">
                        <p><?= $sk_jad->keterangan ?></p>
                        <p><b>PIC: </b><?= $sk_jad->nama ?></p>
                      </div>
                    </td>
                <?php
                      } else {
                      }
                    } ?>
                <input type="hidden" value="<?= $sk_jad->status ?>">
                </td>

                </tr>
                <tr>
                  <td class="text-center">18</td>
                  <td>Fotocopy SK Pangkat/Inpassing
                    Terakhir (bagi yang mengajukan Kenaikan Jabatan/Pangkat)</td>
                  <?php if (isset($ceklis->sk_jad_inpassing)) { ?>
                    <td class="text-center" style="width: 50px;">
                      <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sk_jad_inpassing ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                    </td>
                    <td class="text-center" style="width: 50px;">
                      <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                        $sk_inp = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sk_jad_inpassing';")->row();
                      ?>


                        <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sk_jad_inpassing" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                    </td>
                    <td><a data-target="#myModal-inp" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                    <td>
                      <a class="showSingle buttons" target="18"><i class=" fa fa-plus-square"></i></a>
                      <div id="div18" class="targetDiv" style="display:none;">
                        <p><?= $sk_inp->keterangan ?></p>
                        <p><b>PIC: </b><?= $sk_inp->nama ?></p>
                      </div>
                    </td>
                <?php
                      } else {
                      }
                    } ?>
                <input type="hidden" value="<?= $sk_inp->status ?>">
                </td>

                </tr>
                <tr>
                  <td class="text-center">19</td>
                  <td>Scan Asli Sertifikat Pendidik (bagi yang telah memiliki)</td>
                  <?php if (isset($ceklis->serdik)) { ?>
                    <td class="text-center" style="width: 50px;">
                      <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->serdik ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                    </td>
                    <td class="text-center" style="width: 50px;">
                      <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                        $serdik = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='serdik';")->row();
                      ?>


                        <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/serdik" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                    </td>
                    <td><a data-target="#myModal-serdik" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                    <td>
                      <a class="showSingle buttons" target="19"><i class=" fa fa-plus-square"></i></a>
                      <div id="div19" class="targetDiv" style="display:none;">
                        <p><?= $serdik->keterangan ?></p>
                        <p><b>PIC: </b><?= $serdik->nama ?></p>
                      </div>
                    </td>
                <?php
                      } else {
                      }
                    } ?>
                <input type="hidden" value="<?= $serdik->status ?>">
                </td>

                </tr>

             

                  <tr>
                    <td class="text-center">20</td>
                    <td>Sertifikat Akreditasi Ijazah Terakhir</td>
                    <?php
                    if (isset($ceklis->sertifikat_akre)) {
                    ?>
                      <td class="text-center" style="width: 50px;">
                        <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->sertifikat_akre ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                      </td>
                      <td class="text-center" style="width: 50px;">
                        <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                          $st_akre = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='sertifikat_akre';")->row();
                        ?>


                          <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/sertifikat_akre" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                      </td>
                      <td><a data-target="#myModal-akre" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                      <td>
                        <a class="showSingle buttons" target="20"><i class=" fa fa-plus-square"></i></a>
                        <div id="div20" class="targetDiv" style="display:none;">
                          <p><?= $st_akre->keterangan ?></p>
                          <p><b>PIC: </b><?= $st_akre->nama ?></p>
                        </div>
                      </td>
                  <?php } else {
                        }
                      } ?>
                  <input type="hidden" value="<?= $st_akre->status ?>">
                  </td>

                  </tr>

                  <tr>
                    <td class="text-center">21</td>
                    <td>Dokumen Formasi Jabatan Fungsional (<a href="<?= base_url() ?>files/formasi_jafung.docx" target="_blank">Format Terlampir</a>)</td>
                    <?php
                    if (isset($ceklis->formasi_jafung)) {
                    ?>
                      <td class="text-center" style="width: 50px;">
                        <a href="<?= base_url() ?>assets/download_syarat/<?= $ceklis->formasi_jafung ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-search"></i></a>
                      </td>
                      <td class="text-center" style="width: 50px;">
                        <?php if (($role == '1' || $role == '6') && $usulan_status == '3') {
                          $st_akre = $this->db->query("SELECT * FROM `rwy_ceklist` a 	WHERE a.usulan_no='$no' AND  a.`jns_berkas`='formasi_jafung';")->row();
                        ?>


                          <a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_ok/<?= $ceklis->usulan_no ?>/formasi_jafung" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
                      </td>
                      <td><a data-target="#myModal-jfa" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>
                      <td>
                        <a class="showSingle buttons" target="21"><i class=" fa fa-plus-square"></i></a>
                        <div id="div21" class="targetDiv" style="display:none;">
                          <p><?= $st_akre->keterangan ?></p>
                          <p><b>PIC: </b><?= $st_akre->nama ?></p>
                        </div>
                      </td>
                  <?php } else {
                        }
                      } ?>
                  <input type="hidden" value="<?= $st_akre->status ?>">
                  </td>

                  </tr>
             



              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
</div>


<!-- row -->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript">
  var rows = document.getElementById("tabsyarat").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

  for (i = 0; i < rows.length; i++) {
    cells = rows[i].getElementsByTagName("input");
    if (cells[0].value == '1')
      rows[i].className = "valid";

    if (cells[0].value == '2')
      rows[i].className = "unvalid";
  }
</script>
<script>
  $(function() {
    $('.showSingle').click(function() {
      $('.targetDiv').not('#div' + $(this).attr('target')).hide();
      $('#div' + $(this).attr('target')).toggle();
    });
  });
</script>



<!-- Modal -->
<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-sp" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="surat_pengantar" />
          <p><label for="keterangan">Keterangan Surat Pengantar</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-skp" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sk_pengangkatan" />
          <p><label for="keterangan">Keterangan SK Pengangkatan</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-dpk" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="dupak" />
          <p><label for="keterangan">Keterangan Dupak</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-spaj" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sp_pengajaran" />
          <p><label for="keterangan">Keterangan SP Pengajaran</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-spp" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sp_penelitian" />
          <p><label for="keterangan">Keterangan SP Penelitian</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-spabdian" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sp_pengabdian" />
          <p><label for="keterangan">Keterangan SP Pengabdian</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>


<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-spnunjang" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sp_penunjang" />
          <p><label for="keterangan">Keterangan SP Penunjang</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-ba" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="ba_senat" />
          <p><label for="keterangan">Keterangan BA Senat</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-karya" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sp_karya_ilmiah" />
          <p><label for="keterangan">Keterangan SP Karya Ilmiah</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-vadkarya" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="validasi_karya_ilmiah" />
          <p><label for="keterangan">Keterangan Validasi Karya Ilmiah</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-tubel" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sk_tugas_belajar" />
          <p><label for="keterangan">Keterangan SK Tugas belajar</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-sk_aktif" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sk_aktif_kembali" />
          <p><label for="keterangan">Keterangan SK Aktif Kembali</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-sk_pns" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sk_dosen_pns" />
          <p><label for="keterangan">Keterangan SK Dosen PNS</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-sk_spmj" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="spmj_spmt" />
          <p><label for="keterangan">Keterangan SPMJ SPMT</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-prestasi2" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="penilaian_kerja" />
          <p><label for="keterangan">Keterangan Prestasi Kerja(2)</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-prestasi" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="penilaian_kerja" />
          <p><label for="keterangan">Keterangan Prestasi Kerja(1)</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-jad" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sk_jad_dosen" />
          <p><label for="keterangan">Keterangan SK JAD</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-inp" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sk_jad_inpassing" />
          <p><label for="keterangan">Keterangan SK Inpassing</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-serdik" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="serdik" />
          <p><label for="keterangan">Keterangan Serdik</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>


<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-akre" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="sertifikat_akre" />
          <p><label for="keterangan">Keterangan Akred Ijazah</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>

<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_x/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
  <div id="myModal-jfa" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Berkas</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="jnsberkas" value="formasi_jafung" />
          <p><label for="keterangan">Keterangan Dokumen Formasi Jabatan Fungsional</label></p>
          <textarea name="keterangan" rows="4" cols="50" required />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

</form>