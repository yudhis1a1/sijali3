<?php
error_reporting(0);
include "koneksi.php";
?>
 
 <!-- row -->

                

                               
                                <div class="row">

              <div class="col-md-12">
                
              
               
				 
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
				  b.`jabatan_no`,
				  b.`jabatan_tgl`,
				  e.`nama_ikatan`,
				  b.`karpeg`,
				  b.`lahir_tempat`,
				  b.`jk`,
				  b.`lahir_tgl`,
				  b.`nama`,
				  b.`jenjang_id`,
				  f.`nama_jenjang`,
				  b.`gelar_belakang`,
				  b.`gelar_depan`,
				  b.`nip`,
				  b.`nidn`,
				  c.`nama_prodi`,
				  d.`nama_instansi`,
				  b.`bidang_ilmu_kode`
				FROM
				  usulans AS a,
				  dosens AS b,
				  `prodis` AS c,
				  `instansis` AS d,
				  ikatan_kerjas AS e,
				  `jenjangs` AS f
				WHERE a.`no` = '$no'
				  AND a.`dosen_no` = b.`no`
				  AND b.`prodi_kode` = c.`kode`
				  AND c.`instansi_kode` = d.`kode`
				  AND b.`ikatan_kerja_kode` = e.`kode`
				  AND b.`jenjang_id` = f.`id`")->row();
				

$g_depan=ltrim($resume->gelar_depan," ,");
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
						<?php if(!empty($resume->gelar_depan)){ ?>
	                	<td colspan="5" style="vertical-align: top;">: <?=$g_depan?>. <?=$resume->nama?>, <?=$resume->gelar_belakang?> </td>
						<?php } else { ?>
							<td colspan="5" style="vertical-align: top;">: <?=$resume->nama?>, <?=$resume->gelar_belakang?> </td>
						<?php }?>
					</tr>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">2. Status Kepegawaian</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume->nama_ikatan?></td>
	                </tr>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">3. NIDN</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume->nidn?></td>
	                </tr>
				
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">4. Pendidikan Terakhir</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume->nama_jenjang?> - <?=$resume->nama_prodi?></td>
	                </tr>
				
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">5. PTS</td>
	                	<td colspan="5" style="vertical-align: top;">: <?=$resume->nama_instansi?></td>
	                </tr>
	                <tr>
	                	<td colspan="3" style="vertical-align: top;">6. Homebase</td>
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
					if($resume->jabatan_no<>31)
					{
						$resume_jabatan=$this->db->query("SELECT
									  a.`dosen_no`,
									  a.`no`,
									  a.`jabatan_no`,
									  b.`nama_jabatans`,
									  b.`kum`,
									  a.`jabatan_tgl`,
									  a.`jenjang_id_lama`,
									  c.`nama_jenjang`
									FROM
									  `usulans` AS a,
									  `jabatans` AS b,
									  `jenjangs` AS c
									WHERE a.`dosen_no`= '$resume->no'
									  AND a.`jabatan_no`=b.`kode`
									  AND a.`jenjang_id_lama`=c.`id`")->row();
					}else
					{
						$resume_jabatan=$this->db->query("SELECT
									  a.`no`,
									  a.`jabatan_no`,
									  b.`nama_jabatans`,
									  a.`jenjang_id`,
									  c.`nama_jenjang`,
									  a.`jabatan_tgl`
									FROM
									  dosens AS a,
									  `jabatans` AS b,
									  `jenjangs` AS c
									WHERE a.`no` = '$resume->no'
									  AND a.`jabatan_no` = b.`kode`
									  AND a.`jenjang_id` = c.`id`")->row();
					}
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
					if($resume->jabatan_no<>31)
					{
						$ak_lama=$this->db->query("SELECT
									  a.`dosen_no`,
									  a.`no`,
									  a.`jabatan_no`,
									  b.`nama_jabatans`,
									  b.`kum`,
									  a.`jabatan_tgl`,
									  a.`jenjang_id_lama`,
									  c.`nama_jenjang`,
									  c.`ak`
									FROM
									  `usulans` AS a,
									  `jabatans` AS b,
									  `jenjangs` AS c
									WHERE a.`dosen_no`= '$resume->no'
									  AND a.`jabatan_no`=b.`kode`
									  AND a.`jenjang_id_lama`=c.`id`")->row();
					}else
					{
						$ak_lama=$this->db->query("SELECT
									a.`no`,
									a.`jabatan_no`,
									a.`jenjang_id`,
									b.`nama_jabatans`,
									b.`kum`,
									c.`nama_jenjang`,
									c.`ak`,
									a.`jabatan_tgl` 
								FROM
									`dosens` AS a,
									`jabatans` AS b,
									`jenjangs` AS c 
								WHERE
									a.`no` = '$resume->no'
									AND a.`jabatan_no` = b.`kode` 
									AND a.`jenjang_id` = c.`id`")->row();
					}
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
							$k3=$q_persen ->pb *0.01*$kebutuhan;
				  	?>
	                <tr>
	                	<td class="text-center">3</td>
	                	<td colspan="3">Bidang Penelitian</td>
	                	<td class="text-center">>= <?=$q_persen ->pb?>%</td>
	                	<td class="text-center">>= <?=$k3?></td>
						<?php if($kat_3->kum_usulan_baru < $k3)
							{ ?>
	                	<td class="text-center" style="background-color: #db2828;" ><?=$kat_3->kum_usulan_baru?></td>
						<?php } else {?>
							<td class="text-center" ><?=$kat_3->kum_usulan_baru?></td>
							<?php }?>
					   <?php if($kat_3->kum_penilai_baru < $k3)
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
								$k4=$q_persen ->pc *0.01*$kebutuhan;
								if($kat_4->kum_penilai_baru == 0)
								{
									$kum_k4_penilai=number_format(0,2);
								}
								elseif($kat_4->kum_penilai_baru > $k4)
								{
									$kum_k4_penilai=number_format($k4,2);
								}else
								{
									$kum_k4_penilai=number_format($kat_4->kum_penilai_baru,2);
								}
			
						
				  	?>
	                <tr>
	                	<td class="text-center">4</td>
	                	<td colspan="3">Bidang Pengabdian pada Masyarakat</td>
	                	<td class="text-center"><= <?=$q_persen ->pc?>%</td>
	                	<td class="text-center"><= <?=$k4?></td>
						<?php if($kat_4->kum_usulan_baru == 0)
						{ ?>
	                	<td class="text-center" style="background-color: #db2828;"><?=$kat_4->kum_usulan_baru?></td>
						<?php } else {?>
						<td class="text-center" ><?=$kat_4->kum_usulan_baru?></td>
						<?php }?>
						
						<?php if($kat_4->kum_penilai_baru == 0)
						{ ?>
	                	<td class="text-center" style="background-color: #db2828;"><?=$kum_k4_penilai?></td>
						<?php 
						} elseif($kat_4->kum_penilai_baru > $k4) 
						{?>
							<td class="text-center" ><?=$kum_k4_penilai?></td>
						<?php 
						}else 
						{?>
							<td class="text-center" ><?=$kum_k4_penilai?></td>
						<?php 
						}?>
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
											$k5=$q_persen ->pd *0.01*$kebutuhan;
												//cari nilai kategori 5 (penunjang)
								if($kat_5->kum_usulan_baru == 0)
								{
									$kum_k5_penilai=number_format(0,2);
								}
								elseif($kat_5->kum_usulan_baru > $k5)
								{
									$kum_k5_penilai=number_format($k5,2);
								}else
								{
									$kum_k5_penilai=number_format($kat_5->kum_usulan_baru,2);
								}
				  	?>
	                <tr>
	                	<td class="text-center">5</td>
	                	<td colspan="3">Bidang Penunjang</td>
	                	<td class="text-center"><= <?=$q_persen ->pd?>%</td>
	                	<td class="text-center"><= <?=$k5?></td>
						<?php if($kat_5->kum_usulan_baru == 0)
						{ ?>
	                	<td class="text-center" style="background-color: #db2828;"><?=$kat_5->kum_usulan_baru?></td>
						<?php } else {?>
						<td class="text-center" ><?=$kat_5->kum_usulan_baru?></td>
						<?php }?>
						
					   <?php if($kat_5->kum_penilai_baru == 0)
						{ ?>
							<td class="text-center" style="background-color: #db2828;"><?=$kum_k5_penilai?></td>
						<?php 
						}elseif ($kat_5->kum_penilai_baru > $k5)
						{?>
							<td class="text-center" ><?=$kum_k5_penilai?></td>
						<?php 
						}else 
						{?>
							<td class="text-center" ><?=$kum_k5_penilai?></td>
						<?php 
						}?>
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
													AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('2','3','4','5')
													 GROUP BY b.`usulan_no`")->row();

						$kurang_usulan=$kebutuhan - $kat_total->kum_usulan_baru;
						if($kurang_usulan <= 0)
						{
							$kurang_usulan = 0;
						}

						$kurang_penilai=$kebutuhan - $kat_total->kum_penilai_baru;
						
						if($kurang_penilai <= 0)
						   {
							   $kurang_penilai = 0;
						   }
				  	?>
					
					<?php
					$kat_total_penilai="SELECT
							  *
							FROM
							  dupaks AS a,
							  `usulan_dupaks` AS b
							WHERE b.`dupak_no` = a.`no`
							  AND b.`usulan_no` = '$no'
							  AND a.`dupak_kategori_id` IN('2','3')";
					$d_kat_total_penilai=mysqli_query($koneksi,$kat_total_penilai);
					while($r_kat_total_penilai=mysqli_fetch_array($d_kat_total_penilai))
					{
						$kum_baru_kat_total_penilai+=$r_kat_total_penilai['kum_penilai_baru'];
					}

					//cari nilai kategori 4 (PM)
					if($kat_4->kum_usulan_baru == 0)
					{
						$kum_k4_penilai=0;
					}
					elseif($kat_4->kum_usulan_baru > $k4)
					{
						$kum_k4_penilai=$k4;
					}else
					{
						$kum_k4_penilai=$kat_4->kum_usulan_baru;
					}

					//cari nilai kategori 5 (penunjang)
					if($kat_5->kum_usulan_baru == 0)
					{
						$kum_k5_penilai=0;
					}
					elseif($kat_5->kum_usulan_baru > $k5)
					{
						$kum_k5_penilai=$k5;
					}else
					{
						$kum_k5_penilai=$kat_5->kum_usulan_baru;
					}

					$kum_total= $kum_baru_kat_total_penilai + $kum_k4_penilai + $kum_k5_penilai;

					$kurang_penilai = $dasar - $kum_total ;

					if($kurang_penilai <= 0)
					{
						$kurang_penilai = 0;
					}
					?>
	                <tr>
	                	<td colspan="6">Jumlah Angka Kredit diluar Ijazah/Pendidikan dan pelatihan Prajabatan</td>
	                	<td class="text-center"><?=$kat_total->kum_usulan_baru?></td>
	                	<td class="text-center"><?=$kum_total?></td>
	                </tr>
		
	                <tr>
	                	<td colspan="6">Jumlah Kekurangan Angka Kredit</td>
	                	<td class="text-center"><?=$kurang_usulan?></td>
	                	<td class="text-center"><?=$kurang_penilai?></td>
	                </tr>
					<?php 
					$catatan=$this->db->query("SELECT no,user_penilai_keterangan from usulans where no='$no' ")->result_array(); ?>
	                <tr class="text-center">
	                	<th colspan="8" class="text-center">CATATAN/ KESIMPULAN DARI TIM PENILAI</th>
	                </tr>
	                <tr>
	                	<td colspan="8" class="text-left alert alert-success"> 
						<textarea name="catatan_tim_penilai"  class="form-control" rows="10" required><?php foreach($catatan as $cat_penilai) : echo $cat_penilai['user_penilai_keterangan']; endforeach;?>
						</textarea>
	                	</td>
	                </tr>
					<?php
					$q_cat_penilai="SELECT user_penilai_keterangan,user_penilai_keputusan from usulans where no='$no'";
					$d_cat_penilai=mysqli_query($koneksi,$q_cat_penilai);
					$r_cat_penilai=mysqli_fetch_array($d_cat_penilai);
					?>
					<tr align="center">
					<th colspan="8">
					<?php
					if($r_cat_penilai['user_penilai_keputusan']=="DITERIMA")
					{
					?>
					KEPUTUSAN AKHIR DARI TIM PENILAI :  <h3><center><span class="label label-success"><?=$r_cat_penilai['user_penilai_keputusan'];?></span></center></h3>
					<?php	
					}elseif($r_cat_penilai['user_penilai_keputusan']=="DITOLAK")
					{
					?>
					KEPUTUSAN AKHIR DARI TIM PENILAI :  <h3><center><span class="label label-danger"><?=$r_cat_penilai['user_penilai_keputusan'];?></span></center></h3>
					<?php	
					}
					?>
					</th>
					</tr>
                </tbody>
            </table>
        </div>
                </div>
            </div>
         
                     
                    </div>
               
               
                <!-- row -->
                
