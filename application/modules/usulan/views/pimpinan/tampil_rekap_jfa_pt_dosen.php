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
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <center>
                    <h3>Rekap Ajuan JFA <br><?= $da->nama_instansi ?></h3>
                </center>
                <div class="table-responsive m-t-40">
                    <table id="tablePenilaian" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIDN</th>
                                <th>Nama Dosen</th>
                                <th>Usulan Awal</th>
                                <th>Usulan Baru</th>
                                <th>
                                    <div align="center">Nilai Bidang A</div>
                                </th>
                                <th>
                                    <div align="center">Nilai Bidang B</div>
                                </th>
                                <th>
                                    <div align="center">Nilai Bidang C</div>
                                </th>
                                <th>
                                    <div align="center">Nilai Bidang D</div>
                                </th>
                                <th>Status Usulan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $urut = 1;
                            foreach ($ta as $data) {
                            ?>
                                <tr>
                                    <td><?= $urut ?></td>
                                    <td><?= $data->nidn ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->nama_jabatans_lama ?> (<?= $data->kum_lama ?>)</td>
                                    <td><?= $data->nama_jabatans ?> (<?= $data->kum ?>)</td>
                                    <?php
                                    $dasar = $data->kum - $data->kum_lama;

                                    if ($data->kum_lama == 0) //jika nilai kum lama = 0
                                    {
                                        // $pendidikan = nilai angka kredit dari table jenjangs jabatan_usulan_no 
                                        $pendidikan = $data->ak;
                                    } else {
                                        //jika jejang_id pada dosens = jenjang_id pada usulans
                                        if ($data->jenjang_id_lama == $data->jejang_id) {
                                            $pendidikan = 0;
                                        } else {
                                            $pendidikan = $data->ak - $data->ak_lama;
                                        }
                                    }

                                    $kebutuhan = $dasar - $pendidikan;
                                    if ($kebutuhan <= 0) {
                                        $kebutuhan = 10;
                                    } elseif ($pendidikan <= 0) {
                                        $kebutuhan = $dasar;
                                    }

                                    //jika belum dinilai
                                    if ($data->user_penilai_keputusan == '' && $data->nama_penilai == '') {
                                        include "nilai_dosen.php";
                                    } else {
                                        include "nilai_penilai.php";
                                    }
                                    ?>
                                    <td><?= $data->nama_status ?></td>
                                </tr>
                            <?php
                                $urut++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>