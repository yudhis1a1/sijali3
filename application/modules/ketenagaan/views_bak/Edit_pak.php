<?php
error_reporting(0);
?>
 
 <!-- row -->

 
<?php 
$resume=$this->db->query("SELECT a.*,
b.`no` as no_dosen,
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
c.`nama_prodi`,
d.`nama_instansi`

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
$no_usulan=$resume->no;
?>
<style>
hr {
display: block;
margin-top: auto;
margin-bottom: auto;
margin-left: auto;
margin-right: auto;
border-style: inset;
border-width: 1px;
}
</style>
   <!-- bootstrap datepicker -->
 
   <link href="<?= base_url()?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="<?= base_url()?>assets/node_modules/bootstrap-datepicker/jquery.js"></script>  
  
    <script src="<?= base_url()?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.js"></script>
   

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
                <hr/>
                </center>
              </div>
            </div>  

                <?php           
				date_default_timezone_set('Asia/Jakarta');
    
				


$awal=$resume->masa_penilaian_awal;
$tgl_awal=date_create($awal);
$masa_awal= date_format($tgl_awal, 'd F Y'); 

$akhir=$resume->masa_penilaian_akhir;
$tgl_akhir=date_create($akhir);
$masa_akhir= date_format($tgl_akhir, 'd F Y');

$tgl_lahir=$resume->lahir_tgl;
$tgl_ok=date_create($tgl_lahir);
$tgl= date_format($tgl_ok, 'd F Y');


$tgl_t=$resume->tmt_tgl;
$tgl_tmt=date_create($tgl_t);
$tgl_terhitung= date_format($tgl_tmt, 'd F Y');
?>       
                 <form  method="post" action="<?= base_url()?>ketenagaan/ketenagaan/updatePak/<?php echo $no_usulan; ?>" role="form" enctype="multipart/form-data">
                 <table  class="cust-table cust-table-bordered">
                  
                  <col width="30" />
                  <col width="30" />
                  <col width="200" />
                  <col width="30" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />
                  <col width="90" />

                  <tbody>
                    
                    <tr class="text-center ">
                     <center>
                       <b style="font-weight: bold;">PENETAPAN ANGKA KREDIT</b>
                        <br>Nomor : <input type="text" name="tmt_no"  value="<?=$resume->tmt_no?>" style="width: 250px;" minlength="5" required="required">
                        <input type="hidden" name="no_usulan" value="<?=$resume->no?> " style="width: 250px;"  required="required">
                        <input type="hidden" name="usulan_status_id" value="<?=$resume->usulan_status_id?> " style="width: 250px;"  required="required">
                        <br><b style="font-weight: bold;">Masa Penilaian : Tanggal <input type="text" class="date-picker"  name="masa_penilaian_awal" value="<?=$resume->masa_penilaian_awal;?> " style="width: 150px;"  required="required"> s/d <input type="text" class="date-picker"  name="masa_penilaian_akhir" value="<?=$resume->masa_penilaian_akhir;?> " style="width: 150px;"  required="required">  </b>
                        </center>
                    </tr>
                    
                    <tr class="text-center btop">
                      <th class="text-center" rowspan="15" style="vertical-align: top;">I</th>
                      <th colspan="8" class="text-center" style="font-weight: bold;">KETERANGAN PERORANGAN</th>
                    </tr>
                    <tr >
                      <td class="text-center">1.</td>
                      <td colspan="2">Nama</td>
                      <td colspan="5" style="font-weight: bold;"><?=$resume->nama?>, <?=$resume->gelar_belakang?> </td>
                    </tr>
                    <tr>
                      <td class="text-center">2.</td>
                      <td colspan="2">Status Kepegawaian</td>
                      <td colspan="5"><?=$resume->nama_ikatan?> </td>
                    </tr>
                    <tr>
                      <td class="text-center">3.</td>
                      <td colspan="2">NIDN</td>
                      <td colspan="5"><?=$resume->nidn?><?=$resume->nidk?></td>
                    </tr>
                    <tr>
                      <td class="text-center">4.</td>
                      <td colspan="2">Nomor Seri KARPEG</td>
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
                
                    <tr>
                      <td class="text-center">7.</td>
                      <td colspan="2">Pendidikan Tertinggi </td>
                      <td colspan="5">
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
                    ORDER BY a.`jenjang_id` ASC")->result();
                    ?>
                      <?php
                
                      foreach($resume_didik as $pendidikan) :
                        $tgl_lulus=$pendidikan->tgl;
                        $lulusan=date_create($tgl_lulus);
                        $lulus_tgl= date_format($lulusan, 'd-m-Y');
                      ?>
                        <?=$pendidikan->nama_jenjang;?>, <?=$pendidikan->nama_bidang;?>, <?=$lulus_tgl;?> </br>
                     
                      
                          <br>
                          <?php endforeach; ?>
                      </td>
                     
                    </tr>
                    <?php
                    $resume_golongan=$this->db->query("SELECT
                             a.`nidn`,
                            a.`golongan_kode`,
                            b.`nama`,
                            b.`kode_gol`,
                            a.`golongan_tgl`
                          FROM
                            dosens AS a,
                            `golongans` AS b
                          WHERE  a.`nidn` = '$resume->nidn'
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
                      a.`nidn`,
                      c.`nama_jabatans`,
                      d.`nama_jenjang`,
                      a.`jabatan_tgl`
                      FROM
                      dosens AS a,
                      `jabatan_jenjangs` AS b,
                      `jabatans` AS c,
                      `jenjangs` AS d
                      WHERE a.`nidn`= '$resume->nidn'
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
                      <td colspan="5"><?=$resume_jabatan->nama_jabatans?> <?=$resume_jabatan->nama_jenjang?>, <?=$jabatan_tgl?></td>
                    </tr>
                    <tr>
                      <td class="text-center">10.</td>
                      <td colspan="2">Program Studi</td>
                      <td colspan="5"><?=$resume->nama_prodi?></td>
                    </tr>
                    <tr>
                      <td class="text-center">11.</td>
                  
                      <td >Masa Kerja</td>
                      <td style="border-left: none;">a. Lama</td>
                     
                      <td colspan="5">0 Tahun 0 Bulan</td>
                      
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>                      
                      <td style="border-left: none;">a. Baru</td>
                      <td colspan="5"><?=$resume->tmt_tahun?> Tahun <?=$resume->tmt_bulan?> Bulan</td>
                    </tr>
            
                    <tr>
                      <td class="text-center">12.</td>
                      <td colspan="2">Unit Kerja</td>
                      <td colspan="5">Lembaga Layanan Pendidikan Tinggi Wilayah III Pada <?=$resume->nama_instansi?></td>
                    </tr>
                    <tr>
                      
                     
                    </tr>
                    <tr >
                      <th class="text-center" rowspan="9" style="vertical-align: top;">II</th>
                      <th colspan="4" style="font-weight: bold;">PENETAPAN ANGKA KREDIT</th>
                      <th class="text-center">Lama</th>
                      <th class="text-center">Baru</th>
                      <th class="text-center">Jumlah</th>
                     
                    </tr>
                    <tr >
                      <th class="text-center" rowspan="5" style="vertical-align: top;">1.</th>
                      <th colspan="3" style="font-weight: bold;">UNSUR UTAMA</th>
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
                    <tr >
                      <td colspan="3">a. Mengikuti dan Memperoleh Gelar/Ijazah</td>
                      <td class="text-center"><?=$kat_1->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_1->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_1->kum_usulan_baru+$kat_1->kum_penilai_baru?></td>
               
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
                    <tr >
                      <td colspan="3">b. Melaksanakan Pengajaran</td>
                      <td class="text-center"><?=$kat_2->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_2->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_2->kum_usulan_baru+$kat_2->kum_penilai_baru?></td>
                  
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
                    <tr >
                      <td colspan="3">c. Melaksanakan Penelitian</td>
                      <td class="text-center"><?=$kat_3->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_3->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_3->kum_usulan_baru+$kat_3->kum_penilai_baru?></td>
                  
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
                    <tr >
                      <td colspan="3">d. Melaksanakan Pengabdian Pada Masyarakat</td>
                      <td class="text-center"><?=$kat_4->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_4->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_4->kum_usulan_baru+$kat_4->kum_penilai_baru?></td>
                     
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
                    <tr>
                      <td></td>
                      <td colspan="3" class="text-center" style="font-weight: bold;">Jumlah Unsur Utama</td>
                      <td class="text-center"><?=$ptotal->kum_penilai_lama?></td>
                      <td class="text-center"><?=$ptotal->kum_penilai_baru?></td>
                      <td class="text-center"><?=$ptotal->kum_usulan_baru+$ptotal->kum_penilai_baru?></td>
                    
                    </tr>
                    <tr >
                      <th class="text-center" rowspan="2" style="vertical-align: top;">2.</th>
                      <th colspan="3" style="font-weight: bold;">UNSUR PENUNJANG</th>
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
                      <td colspan="3">Melaksanakan Penunjang Tugas Pokok Dosen</td>
                      <td class="text-center"><?=$kat_5->kum_penilai_lama?></td>
                      <td class="text-center"><?=$kat_5->kum_penilai_baru?></td>
                      <td class="text-center"><?=$kat_5->kum_usulan_baru+$kat_5->kum_penilai_baru?></td>
                     
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
                    <tr class="text-center">
                      <td colspan="5" class="text-center" style="font-weight: bold;">Jumlah Unsur Utama dan Unsur Penunjang</td>
                      <td class="text-center"><?=$ptotal_all->kum_penilai_lama?></td>
                      <td class="text-center"><?=$ptotal_all->kum_penilai_baru?></td>
                      <td class="text-center"><?=$ptotal_all->kum_usulan_baru+$ptotal_all->kum_penilai_baru?></td>
                   
                    </tr>
                    <?php
                      $resume_jab_usulan=$this->db->query("SELECT
                      a.`no`,
                      c.`nama_jabatans`,
                      c.`kum`,
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
                    <tr >
                      <th class="text-center" style="vertical-align: top;">III</th>
                      <td colspan="8">
                        Dapat Diangkat Dalam Jabatan Akademik Dosen :  <b style="font-weight: bold;"><?=$resume_jab_usulan->nama_jabatans?> <?=$resume_jab_usulan->kum?> KUM</b>, Terhitung Mulai Tanggal <input type="text" class="date-picker"  name="tgl_tmt" value="<?=$resume->tmt_tgl;?> " style="width: 150px;" data-date-format="yyyy-mm-dd" required="required">
                      </td>
                    </tr>
                    <?php
                      $resume_ajar=$this->db->query("SELECT * from usulan_matkuls where usulan_no='$no'")->result();
                      ?>
                    <tr>
                      <td></td>
                      <td colspan="2">
                        Dengan Mata Kuliah :
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
                        <br>Kepala Badan Kepegawaian Negara 
                       
                      </td>
                      <td colspan="4" style="vertical-align: top; border-left: none; border-right: none;">
                      Ditetapkan di Jakarta
                        <br>Pada Tanggal : <?=$tgl_penatapan?>
                      <hr/>
                         Kementerian Riset, Teknologi, dan Pendidikan Tinggi
                        <br>Kepala LLDIKTI Wilayah III,
                        <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                         Illah  Sailah
                        <br>NIP. 19580521 198211 2 001
                      </td>
                    </tr>
                    <tr>
                      <td colspan="9" style="border-left: none; border-right: none; border-bottom: none;">
                     <br> Tembusan disampaikan kepada :
                     <br> 1. Dirjen Sumber Daya IPTEK dan DIKTI;
                     <br> 2. <?=$resume->pimpinan_jabatan?> <?=$resume->nama_instansi?>;
                     <br> 3. Sdr. <?=$resume->nama?>, <?=$resume->gelar_belakang?>;
                     <br> 4. Sekretaris Tim Penilai yang bersangkutan;
                     <br> 5. Arsip. 
                        <br>&nbsp;
                      </td>
                    </tr>
                  </tbody>
                </table>
                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"> Update PAK</i></button>
             
             </form>   
                </div>
            </div>
         
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- row -->
                


<script>
 
    $('.date-picker').datepicker({
        autoclose: true,         
        format: "yyyy-mm-dd",
        startDate: '-60d',
        daysOfWeekDisabled:[0,6]
    }); 
    </script>
<script>