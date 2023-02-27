<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">USULAN JAD</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            
                            <a href="<?php echo base_url(); ?>usulan/usulan/pilih" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Tambah Data</a>
                           
                        </div>
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
                              
                               
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th class="text-center" ><i class="fa fa-eye"></i></th>
											<th>Resume</th>
                                            <th>Status Usulan</th>                                       
                                            <th>No</th>
                                            <th>NIDN</th>
                                            <th>Nama</th>
                                            <th>Nama Instansi</th>
                                            <th>Prodi</th>
                                            <th>JAD Usulan</th>
                                            <th>Updated</th> 
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                            <?php
                                           // $query=$this->db->query('Select * from dosens order by nidn');

                                                foreach ($dosen as $row)
                                                {
                                               
                                                ?>
                                            <tr>
                                                <td >
                                                <a href="<?= base_url(); ?>usulan/usulan/usulans/usul/<?php echo $row->no ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a>
                                
                                                <!--<a href="<?= base_url(); ?>usulan/usulan/usulans/edit/<?php echo $row->no ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square"></i></a>
                                                
                                                <a href="<?= base_url(); ?>usulan/usulan/hapus_usulan/<?php echo $row->no ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash-o"></i></a>
                                                -->
                                                </td>
												<td>
												<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#lihat<?=$row->no?>"  class="btn btn-success">Lihat</a>
												</td>
                                                <td><h3><center><span class="label label-danger"><?php echo $row->nama_status ?></span></center></h3></td>
                                                <td><?php echo $row->no ?></td>
                                                <td><?php echo $row->nidn ?></td>
                                                <td><?php echo $row->nama ?></td>
                                                <td><?php echo $row->nama_instansi ?></td>
                                                <td><?php echo $row->nama_prodi ?></td>
                                                <td><?php echo $row->nama_jabatans ?>-<?php echo $row->kum ?>(<?php echo $row->nama_jenjang ?>)</td>
                                                <td><?php echo $row->updated_at ?></td>
                                                
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>

<!-- Modal Lihat-->
<?php
include "koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$query_dosens="SELECT
				a.no AS no_usulan,
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
				d.`nama_instansi`
			  FROM
				usulans AS a,
				dosens AS b,
				`prodis` AS c,
				`instansis` AS d,
				ikatan_kerjas AS e
			  WHERE a.`dosen_no` = b.`no`
				AND b.`prodi_kode` = c.`kode`
				AND c.`instansi_kode` = d.`kode`
				AND b.`ikatan_kerja_kode`=e.`kode`";
$data_dos=mysqli_query($koneksi,$query_dosens);
while($row_dos=mysqli_fetch_array($data_dos))
{

$tgl_lahir=$row_dos['lahir_tgl'];
$tgl_ok=date_create($tgl_lahir);
$tgl= date_format($tgl_ok, 'd F Y');
?>
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="lihat<?=$row_dos['no_usulan'] ?>" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-body">
		<div class="card">
		<div class="card-body">                              
		<h4 class="card-title"></h4>
		
		<td style="vertical-align:top"><center>KEMENTRIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI<br>RESUME USUL PENETAPAN ANGKA KREDIT<br>JABATAN DOSEN PERGURUAN TINGGI</center></td><br><br>
		<h5>PERGURUAN TINGGI NEGERI/LLDIKTI : <?=$row_dos['nama_instansi']?>/LLDIKTI III</h5>
		<div class="row">    
		<table border="1" class="ui celled table">
		<col width="30"/>
		<col width="120"/>
		<col width="90"/>
		<col width="90"/>
		<col width="90"/>
		<col width="90"/>
		<col width="90"/>
		<thead>
		<tr class="text-center">
		<th colspan="7" class="text-center" style="background-color: green;">
		<h3 style="text-align: center;"><font color="white">RESUME USULAN<br>JABATAN AKADEMIK DOSEN</font></h3>
		</th>
		</tr>
		</thead>
		
		<tbody>
		<tr class="text-center">
		<th colspan="7" class="text-center">
		<h4>BIODATA DOSEN</h4>
		</th>
		</tr>
		<tr>
		<td colspan="3" style="vertical-align: top;">1. Nama</td>
		<td colspan="4" style="vertical-align: top;">: <?=$row_dos['nama']?>, <?=$row_dos['gelar_belakang']?></td>
		</tr>
		<tr>
		<td colspan="3" style="vertical-align: top;">2. Status Kepegawaian</td>
		<td colspan="4" style="vertical-align: top;">: <?=$row_dos['nama_ikatan']?></td>
		</tr>
		<tr>
		<td colspan="3" style="vertical-align: top;">3. NIDN</td>
		<td colspan="4" style="vertical-align: top;">: <?=$row_dos['nidn']?></td>
		</tr>
		<?php
		$dosen_no="SELECT
					  a.no,
					  a.dosen_no,
					  b.nidn	
					FROM
						usulans AS a,
						dosens AS b 
					WHERE
						a.dosen_no = b.no 
						AND a.no = '$row_dos[no_usulan]'";
		$da_dosen_no=mysqli_query($koneksi,$dosen_no);
		$r_dosen_no=mysqli_fetch_array($da_dosen_no);
		
		$pend="SELECT
					 a.id_sdm,
					 a.thn_lulus,
					 b.nama_jenjang,
					 c.nama_bidang
				FROM
					rwy_pend_formal AS a,
					jenjangs AS b,
					bidang_ilmus AS c 
				WHERE
					a.id_sdm = '$r_dosen_no[dosen_no]' 
					AND a.id_jenj_didik =b.id
					AND a.id_bid_studi=c.kode";
		$da_pend=mysqli_query($koneksi,$pend);
		?>
		<tr>
		<td colspan="3" style="vertical-align: top;">4. Riwayat Pendidikan</td>
		<td colspan="4" style="vertical-align: top;">: 
		<?php
		while($r_pend=mysqli_fetch_array($da_pend))
		{
		?>
		<?=$r_pend['nama_jenjang']?> - <?=$r_pend['nama_bidang']?><br>
		<?php
		}?>
		</td>
		</tr>
		<?php
		$q_mt="SELECT * from usulan_matkuls where usulan_no='$row_dos[no_usulan]'";
		$d_mt=mysqli_query($koneksi,$q_mt);
		?>
		<tr>
		<td colspan="3" style="vertical-align: top;">5. Matakuliah Yang Diampu</td>
		<td colspan="4" style="vertical-align: top;">: 
		<?php
		while($r_mt=mysqli_fetch_array($d_mt))
		{
		?>
			<?=$r_mt['nama']?>;
		<?php
		}
		?>
		</td>
		</tr>
		<tr>
		<td colspan="3" style="vertical-align: top;">6. PTS</td>
		<td colspan="4" style="vertical-align: top;">: <?=$row_dos['nama_instansi']?></td>
		</tr>
		<tr>
		<td colspan="3" style="vertical-align: top;">7. Homebase</td>
		<td colspan="4" style="vertical-align: top;">: <?=$row_dos['nama_prodi']?></td>
		</tr>
		<?php
		$q_cari_gol="SELECT
					  a.`no`,
					  a.`golongan_kode`,
					  b.`nama`,
					  b.`kode_gol`
					FROM
					  dosens AS a,
					  `golongans` AS b
					WHERE a.`no` = '$row_dos[no]'
					  AND a.`golongan_kode` = b.`kode`";
		$dq_cari_gol=mysqli_query($koneksi,$q_cari_gol);
		$rdq_cari_gol=mysqli_fetch_array($dq_cari_gol);
		?>
		<tr class="text-center">
		<th colspan="2" class="text-center">URAIAN</th>
		<th colspan="2" class="text-center">LAMA</th>
		<th colspan="3" class="text-center">BARU</th>
		</tr>
		<tr>
		<td colspan="2">Pangkat/Gol/TMT</td>
		<td colspan="2"><?=$rdq_cari_gol['nama']?> / <?=$rdq_cari_gol['kode_gol']?>/ <?=$row_dos['jabatan_tgl']?></td>
		<td colspan="3"></td>
		</tr>
		<?php
		$q_cari_jab="SELECT
					  a.`no`,
					  c.`nama_jabatans`,
					  d.`nama_jenjang`,
					  a.`jabatan_tgl`
					FROM
					  dosens AS a,
					  `jabatan_jenjangs` AS b,
					  `jabatans` AS c,
					  `jenjangs` AS d
					WHERE a.`no` = '$row_dos[no]'
					  AND a.`jabatan_no` = b.`no`
					  AND b.`jabatan_kode`=c.`kode`
					  AND b.`jenjang_id`=d.`id`";
		$dq_cari_jab=mysqli_query($koneksi,$q_cari_jab);
		$rdq_cari_jab=mysqli_fetch_array($dq_cari_jab);
		?>
		<tr>
		<td colspan="2">Jabatan/TMT</td>
		<td colspan="2"><?=$rdq_cari_jab['nama_jabatans']?> (<?=$rdq_cari_jab['nama_jenjang']?>), <?=$rdq_cari_jab['jabatan_tgl']?></td>

		<?php
		$q_jab_us="SELECT
					  a.`no`,
					  c.`nama_jabatans`,
					  d.`nama_jenjang`,
					  a.`jabatan_tgl`
					FROM
					  `usulans` AS a,
					  `jabatan_jenjangs` AS b,
					  `jabatans` AS c,
					  `jenjangs` AS d
					WHERE a.`no` = '$row_dos[no_usulan]'
					  AND a.`jabatan_usulan_no` = b.`no`
					  AND b.`jabatan_kode` = c.`kode`
					  AND b.`jenjang_id` = d.`id`";
		$dq_jab_us=mysqli_query($koneksi,$q_jab_us);
		$rdq_jab_us=mysqli_fetch_array($dq_jab_us);
		?>
		<td colspan="3"><?=$rdq_jab_us['nama_jabatans']?> (<?=$rdq_jab_us['nama_jenjang']?>)</td>
		</tr>
		<?php
		$q_ak_lama="SELECT
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
					a.`no` = '$row_dos[no]' 
					AND a.`jabatan_no` = b.`kode` 
					AND a.`jenjang_id` = c.`id`";
		$d_ak_lama=mysqli_query($koneksi,$q_ak_lama);
		$r_ak_lama=mysqli_fetch_array($d_ak_lama);
		?>
		<tr>
		<td colspan="2">Angka Kredit</td>
		<td colspan="2"><?=$r_ak_lama['kum']?></td>
		<?php
		$q_ak_baru="SELECT
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
					WHERE a.`no` = '$row_dos[no_usulan]'
					  AND a.`jabatan_usulan_no` = b.`no`
					  AND b.`jabatan_kode` = c.`kode`
					  AND b.`jenjang_id` = d.`id`";
		$d_ak_baru=mysqli_query($koneksi,$q_ak_baru);
		$r_ak_baru=mysqli_fetch_array($d_ak_baru);
		?>
		<td colspan="3"><?=$r_ak_baru['kum']?> </td>
		</tr>
		<tr>
		<th colspan="2">A.K. Yang Dibutuhkan</th>
		<th colspan="5">
		<?php
		$dasar=$r_ak_baru['kum']-$r_ak_lama['kum'];

		if($r_ak_lama['kum'] == 0)//jika nilai kum lama = 0
		{
			// $pendidikan = nilai angka kredit dari table jenjangs jabatan_usulan_no 
			$pendidikan = $r_ak_baru['ak']; 
		} else {
			//jika jejang_id pada dosens = jenjang_id pada usulans
			if($r_ak_lama['jenjang_id'] == $r_ak_baru['jenjang_id']) 
			{
				$pendidikan = 0;
			} else {
				$pendidikan = $r_ak_baru['ak'] - $r_ak_lama['ak'];
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
		if($r_ak_lama['kum']=='0')
		{
			echo $dasar;
		}elseif($pendidikan>0)
		{
			echo '('.$r_ak_baru['kum'].'-'.$r_ak_lama['kum'].') -'.$pendidikan.' = '.$kebutuhan;
		}else
		{
			echo $r_ak_baru['kum'].'-'.$r_ak_lama['kum'].' = '.$kebutuhan;
		}
		?>
		</th>
		</tr>
		<th colspan="7" class="text-center" style="background-color: grey;"><b>UNSUR YANG DINILAI</b></th>
		<tr class="text-center">
		<th class="text-center" rowspan="2" style="vertical-align: middle;">NO</th>
		<th class="text-center" colspan="3" rowspan="2" style="vertical-align: middle;">BIDANG</th>
		<th class="text-center" rowspan="2" style="vertical-align: middle;">PERS(%)</th>
		<th class="text-center" colspan="2">ANGKA KREDIT</th>
		</tr>
		<tr class="text-center">
		<th class="text-center" style="vertical-align: middle;">A.K. YANG<br>DIBUTUHKAN</th>
		<th class="text-center" style="vertical-align: middle;">A.K. USULAN</th>
		</tr>
		<?php
		$q_persen="SELECT
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
					 WHERE a.`no`='$row_dos[no_usulan]'
					 AND a.`jabatan_usulan_no`=b.`no`
					 AND b.`jabatan_kode`=c.`kode`";
		$d_persen=mysqli_query($koneksi,$q_persen);
		$r_persen=mysqli_fetch_array($d_persen);
		?>

		<?php
		$kat_1="SELECT
				  *
				FROM
				  dupaks AS a,
				  `usulan_dupaks` AS b
				WHERE b.`dupak_no` = a.`no`
				  AND b.`usulan_no` = '$row_dos[no_usulan]'
				  AND a.`dupak_kategori_id` = '1'";
		$d_kat_1=mysqli_query($koneksi,$kat_1);
		while($r_kat_1=mysqli_fetch_array($d_kat_1))
		{
			$kum_baru_kat_1+=$r_kat_1['kum_usulan_baru'];
		}
		?>
		<tr>
		<td class="text-center">1</td>
		<td colspan="3">Bidang Ijazah/Pendidikan</td>
		<td class="text-center">-</td>
		<td class="text-center">-</td>
		<td class="text-center"><?=$kum_baru_kat_1?></td>
		</tr>

		<?php
		$kat_2="SELECT
				  *
				FROM
				  dupaks AS a,
				  `usulan_dupaks` AS b
				WHERE b.`dupak_no` = a.`no`
				  AND b.`usulan_no` = '$row_dos[no_usulan]'
				  AND a.`dupak_kategori_id` = '2'";
		$d_kat_2=mysqli_query($koneksi,$kat_2);
		while($r_kat_2=mysqli_fetch_array($d_kat_2))
		{
			$kum_baru_kat_2+=$r_kat_2['kum_usulan_baru'];
		}
		$k=$r_persen['pa']*0.01*$kebutuhan;
		?>
		<tr>
		<td class="text-center">2</td>
		<td colspan="3">Bidang Pengajaran</td>
		<td class="text-center">>= <?=$r_persen['pa']?>%</td>
		<td class="text-center">>= <?=$k?></td>
		<?php if($kum_baru_kat_2 < $k)
		{
		?>	
		<td class="text-center"
		  style="background-color: #db2828;" ><?=$kum_baru_kat_2?></td>
		<?php
		}else
		{?>
			<td class="text-center"><?=$kum_baru_kat_2?></td>
		<?php
		}?>
		</tr>


		<?php
		$kat_3="SELECT
				  *
				FROM
				  dupaks AS a,
				  `usulan_dupaks` AS b
				WHERE b.`dupak_no` = a.`no`
				  AND b.`usulan_no` = '$row_dos[no_usulan]'
				  AND a.`dupak_kategori_id` = '3'";
		$d_kat_3=mysqli_query($koneksi,$kat_3);
		while($r_kat_3=mysqli_fetch_array($d_kat_3))
		{
			$kum_baru_kat_3+=$r_kat_3['kum_usulan_baru'];
		}
		$k=$r_persen['pb']*0.01*$kebutuhan;
		?>
		<tr>
		<td class="text-center">3</td>
		<td colspan="3">Bidang Penelitian</td>
		<td class="text-center">>= <?=$r_persen['pb']?>%</td>
		<td class="text-center">>= <?=$k?></td>
		<?php if($kum_baru_kat_3 < $k)
		{
		?>	
		<td class="text-center"
		  style="background-color: #db2828;" ><?=$kum_baru_kat_3?></td>
		<?php
		}else
		{?>
			<td class="text-center"><?=$kum_baru_kat_3?></td>
		<?php
		}?>
		</tr>

		<?php
		$kat_4="SELECT
				  *
				FROM
				  dupaks AS a,
				  `usulan_dupaks` AS b
				WHERE b.`dupak_no` = a.`no`
				  AND b.`usulan_no` = '$row_dos[no_usulan]'
				  AND a.`dupak_kategori_id` = '4'";
		$d_kat_4=mysqli_query($koneksi,$kat_4);
		while($r_kat_4=mysqli_fetch_array($d_kat_4))
		{
			$kum_baru_kat_4+=$r_kat_4['kum_usulan_baru'];
		}
		$k=$r_persen['pc']*0.01*$kebutuhan;
		?>
		<tr>
		<td class="text-center">4</td>
		<td colspan="3">Bidang Pengabdian pada Masyarakat</td>
		<td class="text-center"><= <?=$r_persen['pc']?>%</td>
		<td class="text-center"><= <?=$k?></td>
		<?php if($kum_baru_kat_4 < $k)
		{
		?>	
		<td class="text-center"
		  style="background-color: #db2828;" ><?=$kum_baru_kat_4?></td>
		<?php
		}else
		{?>
			<td class="text-center"><?=$kum_baru_kat_4?></td>
		<?php
		}?>
		</tr>


		<?php
		$kat_5="SELECT
				  *
				FROM
				  dupaks AS a,
				  `usulan_dupaks` AS b
				WHERE b.`dupak_no` = a.`no`
				  AND b.`usulan_no` = '$row_dos[no_usulan]'
				  AND a.`dupak_kategori_id` = '5'";
		$d_kat_5=mysqli_query($koneksi,$kat_5);
		while($r_kat_5=mysqli_fetch_array($d_kat_5))
		{
			$kum_baru_kat_5+=$r_kat_5['kum_usulan_baru'];
		}
		$k=$r_persen['pd']*0.01*$kebutuhan;
		?>
		<tr>
		<td class="text-center">5</td>
		<td colspan="3">Bidang Penunjang</td>
		<td class="text-center"><= <?=$r_persen['pd']?>%</td>
		<td class="text-center"><= <?=$k?></td>
		<?php if($kum_baru_kat_5 < $k)
		{
		?>	
		<td class="text-center"
		  style="background-color: #db2828;" ><?=$kum_baru_kat_5?></td>
		<?php
		}else
		{?>
			<td class="text-center"><?=$kum_baru_kat_5?></td>
		<?php
		}?>
		</tr>



		<tr class="text-center">
		<th colspan="5" class="text-center">USULAN ANGKA KREDIT</th>
		<th colspan="2" class="text-center">ANGKA KREDIT</th>
		</tr>
		<?php
		$kat_total="SELECT
				  *
				FROM
				  dupaks AS a,
				  `usulan_dupaks` AS b
				WHERE b.`dupak_no` = a.`no`
				  AND b.`usulan_no` = '$row_dos[no_usulan]'
				  AND a.`dupak_kategori_id` IN('1','2','3','4','5')";
		$d_kat_total=mysqli_query($koneksi,$kat_total);
		while($r_kat_total=mysqli_fetch_array($d_kat_total))
		{
			$kum_baru_kat_total+=$r_kat_total['kum_usulan_baru'];
		}

		$kurang = $dasar - $kum_baru_kat_total;

		if($kurang <= 0)
		{
			$kurang = 0;
		}
		?>
		<tr>
		<td colspan="5">Jumlah Angka Kredit</td>
		<td colspan="2" class="text-center"><?=$kum_baru_kat_total?></td>
		</tr>
		<tr>
		<td colspan="5">Jumlah Kekurangan Angka Kredit</td>
		<td colspan="2" class="text-center"><?=$kurang?> </td>
		</tr>
		</tbody>
		</table>

		</div>



		</div>
		</div>
		</div>
		</div>
</div>
</div>
<?php } ?>
						


                        
