<?php
error_reporting(0);
?>
 
 <!-- row -->

 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <a href="#uploadPakModal" data-toggle="modal" class="btn btn-info">
                               <i class="fa fa-upload"></i>
                                  Upload PAK
                                </a>
                                <a href="" data-toggle="modal" class="btn btn-primary" onclick="printDiv('content_surat');">
                               <i class="fa fa-upload"></i>
                                  Print PAK
                                </a>
                    
                            </div>
                        </div>
                    </div>
               
                </div>

                <div id="content_surat">   
                
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                               
                                  
                                <div class="row">
              <div class="col-md-12">
                <center>
                  <img src="<?= base_url()?>assets/images/logo_bw.png" height="100px;">
                  <h3>KEMENTRIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI<br>PENETAPAN ANGKA KREDIT JABATAN AKADEMIK DOSEN</h3>
                </center>
              </div>
            </div>  

                <?php           
				date_default_timezone_set('Asia/Jakarta');
$resume=$this->db->query("SELECT
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
        a.masa_penilaian_awal,
        a.masa_penilaian_akhir,
				a.`tmt_tahun`,
				a.`tmt_bulan`,
				c.`nama_prodi`,
				d.`nama_instansi`,
				a.user_penilai_keterangan,
        a.tempat_surat
			  FROM
				usulans AS a,
				dosens AS b,
				`prodis` AS c,
				`instansis` AS d,
				ikatan_kerjas AS e
			  WHERE a.`no` = '$no'
				AND a.`dosen_no` = b.`no`
				AND b.`prodi_kode` = c.`kode`
				AND c.`instansi_kode` = d.`kode`
				AND b.`ikatan_kerja_kode`=e.`kode`")->row();
				


$awal=$resume->masa_penilaian_awal;
$tgl_awal=date_create($awal);
$masa_awal= date_format($tgl_awal, 'd F Y'); 

$akhir=$resume->masa_penilaian_akhir;
$tgl_akhir=date_create($akhir);
$masa_akhir= date_format($tgl_akhir, 'd F Y');

$tgl_lahir=$resume->lahir_tgl;
$tgl_ok=date_create($tgl_lahir);
$tgl= date_format($tgl_ok, 'd F Y');


$tgl_tmt=date_create(date());
$tgl_penatapan= date_format($tgl_tmt, 'd F Y');
?>       
                 <table  class="cust-print-table cust-table-bordered">
                  
                  <col width="30" />
                  <col width="30" />
                  <col width="200" />
                  <col width="120" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />

                  <tbody>
                    <tr class="text-center btop">
                      <td colspan="9"></td>
                    </tr>
                    <tr class="text-center">
                      <td colspan="9" class="text-center">
                        Nomor : 
                        <br>Masa Penilaian : Tanggal<b> <?=$masa_awal?>  s/d <?=$masa_akhir?>  </b>
                      </td>
                    </tr>
                    <tr class="text-center btop">
                      <th class="text-center" rowspan="15" style="vertical-align: top;">I</th>
                      <th colspan="8" class="text-center">KETERANGAN PEROGRANGAN</th>
                    </tr>
                    <tr class="btop">
                      <td class="text-center">1.</td>
                      <td colspan="2">Nama</td>
                      <td colspan="5" style="font-weight: bold;"><?=$resume->nama?> </td>
                    </tr>
                    <tr>
                      <td class="text-center">2.</td>
                      <td colspan="2">Status Kepegawaian</td>
                      <td colspan="5"><?=$resume->nama_ikatan?> </td>
                    </tr>
                    <tr>
                      <td class="text-center">3.</td>
                      <td colspan="2">NIDN</td>
                      <td colspan="5"><?=$resume->nidn?></td>
                    </tr>
                    <tr>
                      <td class="text-center">4.</td>
                      <td colspan="2">Nomor KARPEG</td>
                      <td colspan="5"><?=$resume->karpeg?></td>
                    </tr>
                    <tr>
                      <td class="text-center">5.</td>
                      <td colspan="2">Tempat dan Tanggal Lahir</td>
                      <td colspan="5"><?=$resume->lahir_tempat?>, <?=$tgl?></td>
                    </tr>
                    <?php 
                    if($resume->jk=='L'){ $jkel="Laki-Laki" ;} else { $jkel="Perempuan"; }
                    ?>
                    <tr>
                      <td class="text-center">6.</td>
                      <td colspan="2">Jenis Kelamin</td>
                      <td colspan="5">
                      <?=$jkel ?>
                      </td>
                    </tr>
                    <?php
                    $resume_didik=$this->db->query("SELECT
                    a.`jenjang_id`,
                    b.`nama_jenjang`,
                    c.`nama_bidang`,
                    a.`tgl`
                    FROM
                    `usulan_pendidikans` AS a,
                    jenjangs AS b,
                    `bidang_ilmus` AS c
                    WHERE a.`usulan_no`='$no'
                    AND a.`jenjang_id`=b.`id`
                    AND a.`bidang_ilmu_kode`=c.`kode`
                    ORDER BY a.`jenjang_id` DESC")->result();
                    ?>
                    <tr>
                      <td class="text-center">7.</td>
                      <td colspan="2">Pendidikan Terakhir</td>
                      <td colspan="5">
                      <?php
                
                      foreach($resume_didik as $pendidikan) :
                        $tgl_lulus=$pendidikan->tgl;
                        $lulusan=date_create($tgl_lulus);
                        $lulus_tgl= date_format($lulusan, 'd F Y');
                      ?>
                        <?=$pendidikan->nama_jenjang?> <?=$pendidikan->nama_bidang?>, <?=$lulus_tgl?> </br>
                      <?php endforeach; ?>
                      
                          <br>
                        
                      </td>
                    </tr>
                    <?php
                    $resume_golongan=$this->db->query("SELECT
                            a.`no`,
                            a.`golongan_kode`,
                            b.`nama`,
                            b.`kode_gol`,
                            a.`golongan_tgl`
                          FROM
                            dosens AS a,
                            `golongans` AS b
                          WHERE a.`no` = '$resume->no'
                            AND a.`golongan_kode` = b.`kode`")->row();
                            $tgl_gol=$resume_golongan->golongan_tgl;
                            $gol=date_create($tgl_gol);
                            $golongan_tgl= date_format($gol, 'd F Y'); 
                            
                    ?>
                    <tr>
                      <td class="text-center">8.</td>
                      <td colspan="2">Pangkat/Golongan Ruang/TMT</td>
                      <td colspan="5"><?=$resume_golongan->nama?> <?=$resume_golongan->kode_gol?>, <?=$golongan_tgl?></td>
                    </tr>
                    <?php
                      $resume_jabatan=$this->db->query("SELECT
                      a.`no`,
                      c.`nama_jabatans`,
                      d.`nama_jenjang`,
                      a.`jabatan_tgl`
                      FROM
                      dosens AS a,
                      `jabatan_jenjangs` AS b,
                      `jabatans` AS c,
                      `jenjangs` AS d
                      WHERE a.`no` = '$resume->no'
                      AND a.`jabatan_no` = b.`no`
                      AND b.`jabatan_kode`=c.`kode`
                      AND b.`jenjang_id`=d.`id`")->row();
                      $tgl_jab=$resume_jabatan->jabatan_tgl;
                      $tgl=date_create($tgl_jab);
                      $jabatan_tgl= date_format($tgl, 'd F Y'); 
                      ?>
                    <tr>
                      <td class="text-center">9.</td>
                      <td colspan="2">Jabatan Akademik Dosen/TMT</td>
                      <td colspan="5"><?=$resume_jabatan->nama_jabatans?> (<?=$resume_jabatan->nama_jenjang?>), <?=$jabatan_tgl?></td>
                    </tr>
                    <tr>
                      <td class="text-center">10.</td>
                      <td>Masa Kerja</td>
                      <td style="border-left: none;">a. Lama</td>
                      <td colspan="5"><?=$resume->tmt_tahun?> Tahun <?=$resume->tmt_bulan?> Bulan</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td style="border-left: none;">a. Baru</td>
                      <td colspan="5">0 Tahun 0 Bulan</td>
                    </tr>
                    <tr>
                      <td class="text-center">11.</td>
                      <td colspan="2">Program Studi</td>
                      <td colspan="5"><?=$resume->nama_prodi?></td>
                    </tr>
                    <tr>
                      <td class="text-center">12.</td>
                      <td colspan="2">Unit Kerja</td>
                      <td colspan="5">LLDIKTI Wilayah III Pada <?=$resume->nama_instansi?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="2"></td>
                      <td colspan="5"></td>
                    </tr>
                    <tr class="btop">
                      <th class="text-center" rowspan="9" style="vertical-align: top;">II</th>
                      <th colspan="3">PENETAPAN ANGKA KREDIT</th>
                      <th class="text-center">Lama</th>
                      <th class="text-center">Baru</th>
                      <th class="text-center">Jumlah</th>
                      <th class="text-center">Digunakan</th>
                      <th class="text-center">Lebihan</th>
                    </tr>
                    <tr class="btop">
                      <th class="text-center" rowspan="5" style="vertical-align: top;">1.</th>
                      <th colspan="2">UNSUR UTAMA</th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                    </tr>
                    <?php
                       $dasar=$this->db->query("SELECT * FROM	usulans AS a	
                       WHERE a.`no`= '$no' ")->row();
                       $kat_1=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_lama`) AS kum_penilai_lama,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '1' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
                
                    ?>
                    <tr class="btop">
                      <td colspan="2">a. Mengikuti dan Memperoleh Gelar/Ijazah</td>
                      <td class="text-center"><?=$kat_1->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_1->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_1->kum_usulan_baru+$kat_1->kum_penilai_baru?></td>
                      <td class="text-center"><?=$dasar->tmt_digunakan_a?></td>
                      <td class="text-center"><?=$dasar->tmt_lebihan_a?></td>
                    </tr>
                    <?php
                     $kat_2=$this->db->query("SELECT
                     a.*,SUM(b.`kum_penilai_lama`) AS kum_penilai_lama,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
                  FROM
                    dupaks AS a,
                    `usulan_dupaks` AS b
                  WHERE b.`dupak_no` = a.`no`
                    AND b.`usulan_no` = '$no'
                    AND a.`dupak_kategori_id` = '2' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
                    ?>
                    <tr class="btop">
                      <td colspan="2">b. Melaksanakan Pengajaran</td>
                      <td class="text-center"><?=$kat_2->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_2->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_2->kum_usulan_baru+$kat_2->kum_penilai_baru?></td>
                      <td class="text-center"><?=$dasar->tmt_digunakan_b?></td>
                      <td class="text-center"><?=$dasar->tmt_lebihan_b?></td>
                    </tr>
                    <?php
                       $kat_3=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_lama`) AS kum_penilai_lama,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '3' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
                    ?>
                    <tr class="btop">
                      <td colspan="2">c. Melaksanakan Penelitian</td>
                      <td class="text-center"><?=$kat_3->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_3->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_3->kum_usulan_baru+$kat_3->kum_penilai_baru?></td>
                      <td class="text-center"><?=$dasar->tmt_digunakan_c?></td>
                      <td class="text-center"><?=$dasar->tmt_lebihan_c?></td>
                    </tr>
                    <?php
                       $kat_4=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_lama`) AS kum_penilai_lama,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '4' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
                    ?>
                    <tr class="btop">
                      <td colspan="2">d. Melaksanakan Pengabdian Pada Masyarakat</td>
                      <td class="text-center"><?=$kat_4->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_4->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_4->kum_usulan_baru+$kat_4->kum_penilai_baru?></td>
                      <td class="text-center"><?=$dasar->tmt_digunakan_d?></td>
                      <td class="text-center"><?=$dasar->tmt_lebihan_d?></td>
                    </tr>
                    <?php
                       $ptotal=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_lama`) AS kum_penilai_lama,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('1','2','3','4')
                     GROUP BY b.`usulan_no`")->row();
                     $total_digunakan=$dasar->tmt_digunakan_a+$dasar->tmt_digunakan_b+$dasar->tmt_digunakan_c+$dasar->tmt_digunakan_d;
                     $total_lebihan=$dasar->tmt_lebihan_a+$dasar->tmt_lebihan_b+$dasar->tmt_lebihan_c+$dasar->tmt_lebihan_d;
                    ?>
                    <tr class="btop">
                      <td></td>
                      <td colspan="2">Jumlah Unsur Utama</td>
                      <td class="text-center"><?=$ptotal->kum_penilai_lama?></td>
                      <td class="text-center"><?=$ptotal->kum_penilai_baru?></td>
                      <td class="text-center"><?=$ptotal->kum_usulan_baru+$ptotal->kum_penilai_baru?></td>
                      <td class="text-center"><?=$total_digunakan?></td>
                      <td class="text-center"><?=$total_lebihan?></td>
                    </tr>
                    <tr class="btop">
                      <th class="text-center" rowspan="2" style="vertical-align: top;">2.</th>
                      <th colspan="2">UNSUR PENUNJANG</th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                    </tr>
                    <?php
                       $kat_5=$this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_lama`) AS kum_penilai_lama,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '5' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
                    ?>
                    <tr>
                      <td colspan="2">Melaksanakan Penunjang Tugas Pokok Dosen</td>
                      <td class="text-center"><?=$kat_5->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_5->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_5->kum_usulan_baru+$kat_5->kum_penilai_baru?></td>
                      <td class="text-center"><?=$dasar->tmt_digunakan_e?></td>
                      <td class="text-center"><?=$dasar->tmt_lebihan_e?></td>
                    </tr>
                    <?php
                           $ptotal_all=$this->db->query("SELECT
                           a.*,SUM(b.`kum_penilai_lama`) AS kum_penilai_lama,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
                        FROM
                          dupaks AS a,
                          `usulan_dupaks` AS b
                        WHERE b.`dupak_no` = a.`no`
                          AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('1','2','3','4','5')
                         GROUP BY b.`usulan_no`")->row();
                         $total_digunakan_all=$dasar->tmt_digunakan_a+$dasar->tmt_digunakan_b+$dasar->tmt_digunakan_c+$dasar->tmt_digunakan_d+$dasar->tmt_digunakan_e;
                         $total_lebihan_all=$dasar->tmt_lebihan_a+$dasar->tmt_lebihan_b+$dasar->tmt_lebihan_c+$dasar->tmt_lebihan_d+$dasar->tmt_lebihan_e;
                    ?>
                    <tr class="text-center btop">
                      <td colspan="4" class="text-center">Jumlah Unsur Utama dan Unsur Penunjang</td>
                      <td class="text-center"><?=$ptotal_all->kum_penilai_lama?></td>
                      <td class="text-center"><?=$ptotal_all->kum_penilai_baru?></td>
                      <td class="text-center"><?=$ptotal_all->kum_usulan_baru+$ptotal_all->kum_penilai_baru?></td>
                      <td class="text-center"><?=$total_digunakan_all?></td>
                      <td class="text-center"><?=$total_lebihan_all?></td>
                    </tr>
                    <?php
                      $resume_jab_usulan=$this->db->query("SELECT
                      a.`no`,
                      c.`nama_jabatans`,
                      d.`nama_jenjang`,
                      a.`jabatan_tgl`
                      FROM
                      `usulans` AS a,
                      `jabatan_jenjangs` AS b,
                      `jabatans` AS c,
                      `jenjangs` AS d
                      WHERE a.`no` = '$no'
                      AND a.`jabatan_usulan_no` = b.`no`
                      AND b.`jabatan_kode` = c.`kode`
                      AND b.`jenjang_id` = d.`id`")->row();
                              ?>
                    <tr class="btop">
                      <th class="text-center" style="vertical-align: top;">III</th>
                      <td colspan="8">
                        Dapat Diangkat Dalam Jabatan Akademik Dosen : <?=$resume_jab_usulan->nama_jabatans?>, TMT
                      </td>
                    </tr>
                    <?php
                      $resume_ajar=$this->db->query("SELECT * from usulan_matkuls where usulan_no='$no'")->result();
                      ?>
                    <tr>
                      <td></td>
                      <td colspan="2">
                        Dengan Mata Kuliah/Bidang Penugasan :
                      </td>
                      <td colspan="7" style="border-left: none;">
                      <ol>
                      <?php
                           
                            foreach($resume_ajar as $ajar) :
                            ?>
                            <li>
                              <?=$ajar->nama?>
                            <?php endforeach; ?>
                            </li>
                            </ol>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>
           

           
            <br>&nbsp;
            <div class="table-responsive">
                <table width="100%">
                    <tr>
                      <td colspan="5" style="vertical-align: top; border-left: none; border-right: none; width: 60%">
                        Kepada Yth :
                        <br><strong><?=$resume->nama?>, <?=$resume->gelar_belakang?>.</strong>
                        <br> <?=$resume->nama_instansi?>
                        <br>di <?=$resume->tempat_surat?>
                      </td>
                      <td colspan="4" style="vertical-align: top; border-left: none; border-right: none;">
                        Ditetapkan di <?=$resume->tempat_surat?>
                        <br>Pada Tanggal: <?=$tgl_penatapan?>
                        <br>a.n. Direktur Jenderal Sumber Daya IPTEK &
                        <br>Kepala LLDIKTI Wilayah III
                        <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                        
                        <br>NIP.
                      </td>
                    </tr>
                    <tr>
                      <td colspan="9" style="border-left: none; border-right: none; border-bottom: none;">
                        Tembusan:
                        <br>1. Rektor ;
                        <br>2. Ketua Yayasan ;
                        <br>3. Sekretaris Tim Penilai;
                        <br>&nbsp;
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
            </div>
         
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- row -->
                
<form  method="post" action="<?= base_url()?>ketenagaan/ketenagaan/uploadPak" role="form" enctype="multipart/form-data">
  <div class="modal fade" id="uploadPakModal" 
        role="dialog" 
        aria-labelledby="uploadPakModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <input type="hidden" name="nidn" value="<?=$resume->nidn?>">
            <input type="hidden" name="no_usulan" value="<?php echo $no; ?>">
                <h4>Upload Scan Dokumen PAK</h4>

                <div class="form-group">
                  <label for="berkas">Berkas Upload</label>
                  <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000" required>
                  <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
                </div>

            </div>

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;
   }
</script>