<?php
error_reporting(0);
?>
 
 <!-- row -->

                

                               
                                <div class="row">

              <div class="col-md-12">
                
              
                  <h3>Data Tim Penilai</h3>
				 
              </div>
            </div>      

                               
         <div class="table-responsive">
            <table id="table-bidang" class="cust-table cust-table-bordered">

            	<col width="30"/>
				<col width="120"/>
				<col width="90"/>
				<col width="90"/>
				<col width="90"/>
				<col width="90"/>
				<col width="90"/>
				<col width="90"/>

                <thead>			
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
				a.`tmt_tahun`,
				a.`tmt_bulan`,
				c.`nama_prodi`,
				d.`nama_instansi`,
				a.user_penilai_keterangan
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
				


/* $tgl_lahir=$row_dos['lahir_tgl'];
$tgl_ok=date_create($tgl_lahir);
$tgl= date_format($tgl_ok, 'd F Y'); */
?>   
                  <tr class="text-center">
                  	<th colspan="8" class="text-center">
                  		<h3 style="text-align: center;">RESUME PENILAIAN USULAN<br>JABATAN AKADEMIK DOSEN</h3>
                  	</th>
                  </tr>
                </thead>
                <tbody>
	                <tr class="text-center">
	                	<th colspan="8" class="text-center">
	                  		<h4>BIODATA DOSEN</h4>
	                  	</th>
	                </tr>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">1. Nama</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume->nama?>, <?=$resume->gelar_belakang?> </td>
	                </tr>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">2. Status Kepegawaian</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume->nama_ikatan?></td>
	                </tr>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">3. NIDN</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume->nidn?></td>
	                </tr>
					<?php
					$resume_didik=$this->db->query("SELECT
					a.`jenjang_id`,
					b.`nama_jenjang`,
					c.`nama_bidang`
				  FROM
					`usulan_pendidikans` AS a,
					jenjangs AS b,
					`bidang_ilmus` AS c
					WHERE a.`usulan_no`='$no'
					AND a.`jenjang_id`=b.`id`
					AND a.`bidang_ilmu_kode`=c.`kode`
					ORDER BY a.`jenjang_id` DESC")->row();
					?>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">4. Pendidikan Terakhir</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume_didik->nama_jenjang?> - <?=$resume_didik->nama_bidang?></td>
	                </tr>
					<?php
					$resume_ajar=$this->db->query("SELECT * from usulan_matkuls where usulan_no='$no'")->result();
					?>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">5. Matakuliah Yang Diampu</td>
	                	<td colspan="5" style="vertical-align: top;">: 
						<?php
				
							foreach($resume_ajar as $ajar) :
							?>
								<?=$ajar->nama?>;
							<?php endforeach; ?>
					</td>
	                </tr>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">6. PTS</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume->nama_instansi?></td>
	                </tr>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">7. Homebase</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume->nama_prodi?></td>
	                </tr>
	                <tr class="text-center">
	                	<th colspan="2" class="text-center">URAIAN</th>
	                	<th colspan="3" class="text-center">LAMA</th>
	                	<th colspan="3" class="text-center">BARU</th>
	                </tr>
					<?php
					$resume_golongan=$this->db->query("SELECT
								  a.`no`,
								  a.`golongan_kode`,
								  b.`nama`,
								  b.`kode_gol`
								FROM
								  dosens AS a,
								  `golongans` AS b
								WHERE a.`no` = '$resume->no'
								  AND a.`golongan_kode` = b.`kode`")->row();
				   ?>
					<tr>
	                	<td colspan="2">Pangkat/Gol/TMT</td>
	                	<td colspan="3"><?=$resume_golongan->nama?> / <?=$resume_golongan->kode_gol?>/ <?=$resume->jabatan_tgl?></td>
	                	<td colspan="3"></td>
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
				   ?>
	                <tr>
	                	<td colspan="2">Jabatan/TMT</td>
	                	<td colspan="3"><?=$resume_jabatan->nama_jabatans?> (<?=$resume_jabatan->nama_jenjang?>), <?=$resume_jabatan->jabatan_tgl?></td>
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
						<td colspan="3"><?=$resume_jab_usulan->nama_jabatans?> (<?=$resume_jab_usulan->nama_jenjang?>)</td>
	                </tr>
					<?php
	$ak_lama=$this->db->query("SELECT
	a.`no`,
	a.`jabatan_no`,
	b.`jenjang_id`,
	c.`nama_jabatans`,
	c.`kum`,
	d.`nama_jenjang`,
	d.`ak`,
	a.`jabatan_tgl`
  FROM
	`dosens` AS a,
	`jabatan_jenjangs` AS b,
	`jabatans` AS c,
	`jenjangs` AS d
  WHERE a.`no` = '$resume->no'
	AND a.`jabatan_no` = b.`no`
	AND b.`jabatan_kode` = c.`kode`
	AND b.`jenjang_id` = d.`id`")->row();
				   ?>
	                <tr>
	                	<td colspan="2">Angka Kredit</td>
	                	<td colspan="3"><?=$ak_lama->kum?></td>
						<?php
	$ak_baru=$this->db->query("SELECT
	a.`no`,
	b.`jenjang_id`,
	c.`nama_jabatans`,
	c.`kum`,
	d.`nama_jenjang`,
	d.`ak`,
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
	                	<td colspan="3"><?=$ak_baru->kum?></td>
	                </tr>
	                <tr>
	                	<th colspan="2">A.K. Yang Dibutuhkan</th>
	                	<th colspan="6">
	<?php 
$dasar=$ak_baru->kum - $ak_lama->kum;
if($ak_lama->kum == 0)//jika nilai kum lama = 0
{
	// $pendidikan = nilai angka kredit dari table jenjangs jabatan_usulan_no 
	$pendidikan = $ak_baru->ak; 
} else {
	//jika jejang_id pada dosens = jenjang_id pada usulans
	if($ak_lama->jenjang_id == $ak_baru->jenjang_id) 
	{
		$pendidikan = 0;
	} else {
		$pendidikan = $ak_baru->ak - $ak_lama->ak;
	}
}

$kebutuhan = $dasar - $pendidikan;
if($kebutuhan <= 0)
{
	$kebutuhan = 10;
} elseif($pendidikan <= 0) {
	$kebutuhan = $dasar;
}

//jika nilai kum lama = 0
if($ak_lama->kum=='0')
{
	echo $dasar;
}elseif($pendidikan>0)
{
	echo '('.$ak_baru->kum.'-'.$ak_lama->kum.') -'.$pendidikan.' = '.$kebutuhan;
}else
{
	echo $ak_baru->kum.'-'.$ak_lama->kum.' = '.$kebutuhan;
}
	                		?>
	                
	                	</th>
	                </tr>
	                <tr class="text-center">
	                	<th colspan="8" class="text-center">UNSUR YANG DINILAI</th>
	                </tr>
	                <tr class="text-center">
	                	<th class="text-center" rowspan="2" style="vertical-align: middle;">NO</th>
	                	<th class="text-center" colspan="3" rowspan="2" style="vertical-align: middle;">BIDANG</th>
	                	<th class="text-center" rowspan="2" style="vertical-align: middle;">PERS(%)</th>
	                	<th class="text-center" colspan="3">ANGKA KREDIT</th>
	                </tr>
	                <tr class="text-center">
	                	<th class="text-center" style="vertical-align: middle;">A.K. YANG<br>DIBUTUHKAN</th>
	                	<th class="text-center" style="vertical-align: middle;">A.K. USULAN</th>
	                	<th class="text-center" style="vertical-align: middle;">A.K. DARI<br>TIM PENILAI</th>
	                </tr>
					<?php
	$q_persen=$this->db->query("SELECT
	a.`no`,
	a.`jabatan_usulan_no`,
	b.`jabatan_kode`,
	c.`kum`,
	c.`nama_jabatans`,
	c.`pa`,
	c.`pb`,
	c.`pc`,
	c.`pd`
  FROM
	`usulans` AS a,
	`jabatan_jenjangs` AS b,
	`jabatans` AS c
   WHERE a.`no`='$no'
   AND a.`jabatan_usulan_no`=b.`no`
   AND b.`jabatan_kode`=c.`kode`")->row();

   $kat_1=$this->db->query("SELECT
    a.*,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
 FROM
   dupaks AS a,
   `usulan_dupaks` AS b
 WHERE b.`dupak_no` = a.`no`
   AND b.`usulan_no` = '$no'
   AND a.`dupak_kategori_id` = '1' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();

				


				 ?>
	                <tr>
	                	<td class="text-center">1</td>
	                	<td colspan="3">Bidang Ijazah/Pendidikan</td>
	                	<td class="text-center">-</td>
	                	<td class="text-center">-</td>
	                	<td class="text-center"><?=$kat_1->kum_usulan_baru?></td>
	                	<td class="text-center"><?=$kat_1->kum_penilai_baru?></td>
	                </tr>
	                <?php
				    $kat_2=$this->db->query("SELECT
					a.*,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
				 FROM
				   dupaks AS a,
				   `usulan_dupaks` AS b
				 WHERE b.`dupak_no` = a.`no`
				   AND b.`usulan_no` = '$no'
				   AND a.`dupak_kategori_id` = '2' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
				 $k=$q_persen ->pa *0.01*$kebutuhan;
								
				
				  	?>
	                <tr>
	                	<td class="text-center">2</td>
	                	<td colspan="3">Bidang Pengajaran</td>
	                	<td class="text-center">>= <?=$q_persen ->pa?> %</td>
	                	<td class="text-center">>= <?=$k?></td>
						<?php if($kat_2->kum_usulan_baru < $k)
							{
							?>	
	                	<td class="text-center"  style="background-color: #db2828;" ><?=$kat_2->kum_usulan_baru?></td>
							<?php } else {?>
					   <td class="text-center" ><?=$kat_2->kum_usulan_baru?></td>
					   <?php }?>
					   <?php if($kat_2->kum_penilai_baru < $k)
							{
							?>	
	                	<td class="text-center"  style="background-color: #db2828;" ><?=$kat_2->kum_penilai_baru?></td>
						<?php } else {?>
							<td class="text-center" ><?=$kat_2->kum_penilai_baru?></td>
					   <?php }?>
	                </tr>
	                <?php
		 $kat_3=$this->db->query("SELECT
				   a.*,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
				FROM
				  dupaks AS a,
				  `usulan_dupaks` AS b
				WHERE b.`dupak_no` = a.`no`
				  AND b.`usulan_no` = '$no'
				  AND a.`dupak_kategori_id` = '3' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
				$k=$q_persen ->pb *0.01*$kebutuhan;
				  	?>
	                <tr>
	                	<td class="text-center">3</td>
	                	<td colspan="3">Bidang Penelitian</td>
	                	<td class="text-center">>= <?=$q_persen ->pb?>%</td>
	                	<td class="text-center">>= <?=$k?></td>
						<?php if($kat_3->kum_usulan_baru < $k)
							{ ?>
	                	<td class="text-center" style="background-color: #db2828;" ><?=$kat_3->kum_usulan_baru?></td>
						<?php } else {?>
							<td class="text-center" ><?=$kat_3->kum_usulan_baru?></td>
							<?php }?>
					   <?php if($kat_3->kum_penilai_baru < $k)
							{	?>
	                	<td class="text-center" style="background-color: #db2828;" ><?=$kat_3->kum_penilai_baru?></td>
						<?php } else {?>
							<td class="text-center" ><?=$kat_3->kum_penilai_baru?></td>
							<?php }?>
	                </tr>
	                <?php
	$kat_4=$this->db->query("SELECT
				   a.*,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
				FROM
				  dupaks AS a,
				  `usulan_dupaks` AS b
				WHERE b.`dupak_no` = a.`no`
				  AND b.`usulan_no` = '$no'
				  AND a.`dupak_kategori_id` = '4' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
				$k=$q_persen ->pc *0.01*$kebutuhan;
				  	?>
	                <tr>
	                	<td class="text-center">4</td>
	                	<td colspan="3">Bidang Pengabdian pada Masyarakat</td>
	                	<td class="text-center"><= <?=$q_persen ->pc?>%</td>
	                	<td class="text-center"><= <?=$k?></td>
						<?php if($kat_4->kum_usulan_baru < $k)
							{ ?>
	                	<td class="text-center" style="background-color: #db2828;"><?=$kat_4->kum_usulan_baru?></td>
						<?php } else {?>
							<td class="text-center" ><?=$kat_4->kum_usulan_baru?></td>
							<?php }?>
					   <?php if($kat_4->kum_penilai_baru < $k)
							{ ?>
	                	<td class="text-center" style="background-color: #db2828;"><?=$kat_4->kum_penilai_baru?></td>
						<?php } else {?>
						<td class="text-center" ><?=$kat_4->kum_penilai_baru?></td>
						<?php }?>
	                </tr>
	                <?php
				   $kat_5=$this->db->query("SELECT
				   a.*,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
				FROM
				  dupaks AS a,
				  `usulan_dupaks` AS b
				WHERE b.`dupak_no` = a.`no`
				  AND b.`usulan_no` = '$no'
				  AND a.`dupak_kategori_id` = '5' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
				$k=$q_persen ->pd *0.01*$kebutuhan;
				  	?>
	                <tr>
	                	<td class="text-center">5</td>
	                	<td colspan="3">Bidang Penunjang</td>
	                	<td class="text-center"><= <?=$q_persen ->pd?>%</td>
	                	<td class="text-center"><= <?=$k?></td>
						<?php if($kat_5->kum_usulan_baru < $k)
							{ ?>
	                	<td class="text-center" style="background-color: #db2828;"><?=$kat_5->kum_usulan_baru?></td>
						<?php } else {?>
							<td class="text-center" ><?=$kat_5->kum_usulan_baru?></td>
							<?php }?>
					   <?php if($kat_5->kum_penilai_baru < $k)
							{ ?>
	                	<td class="text-center" style="background-color: #db2828;"><?=$kat_5->kum_penilai_baru?></td>
						<?php } else {?>
						<td class="text-center" ><?=$kat_5->kum_penilai_baru?></td>
						<?php }?>
	                </tr>
	                <tr class="text-center">
	                	<th colspan="5" class="text-center">USULAN ANGKA KREDIT</th>
	                	<th colspan="3" class="text-center">ANGKA KREDIT</th>
	                </tr>
	                <?php
					 $kat_total=$this->db->query("SELECT
					 a.*,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru
				  FROM
					dupaks AS a,
					`usulan_dupaks` AS b
				  WHERE b.`dupak_no` = a.`no`
					AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('1','2','3','4','5')
					 GROUP BY b.`usulan_no`")->row();

					 $kurang_usulan=$dasar - $kat_total->kum_usulan_baru;
					 if($kurang_usulan <= 0)
						{
							$kurang_usulan = 0;
						}

						$kurang_penilai=$dasar - $kat_total->kum_penilai_baru;
						if($kurang_penilai <= 0)
						   {
							   $kurang_penilai = 0;
						   }
				  	?>
	                <tr>
	                	<td colspan="6">Jumlah Angka Kredit</td>
	                	<td class="text-center"><?=$kat_total->kum_usulan_baru?></td>
	                	<td class="text-center"><?=$kat_total->kum_penilai_baru?></td>
	                </tr>
		
	                <tr>
	                	<td colspan="6">Jumlah Kekurangan Angka Kredit</td>
	                	<td class="text-center"><?=$kurang_usulan?></td>
	                	<td class="text-center"><?=$kurang_penilai?></td>
	                </tr>
	                <tr class="text-center">
	                	<th colspan="8" class="text-center">CATATAN/ KESIMPULAN DARI TIM PENILAI</th>
	                </tr>
	                <tr>
	                	<td colspan="8" class="text-center alert alert-success"> <?=$resume->user_penilai_keterangan?>
	                	
								    <br>&nbsp;
							
	                	</td>
	                </tr>
                </tbody>
            </table>
        </div>
                </div>
            </div>
         
                     
                    </div>
               
               
                <!-- row -->
                
