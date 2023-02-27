<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">USULAN JAD</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <?php if($role=='3' && ($cek_status=='9' || $cek_status== 0 ))
							{ 
							?>
							<a href="<?php echo base_url(); ?>usulan/usulan/pilih/<?php echo $jabatan_no ?>" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>Tambah Data</a>
							<?php 
								
							}
							else{} ?>
                           
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
                                                foreach ($dosen as $row)
                                                {
                                                ?>
                                            <tr>
                                                <td >
                                                <a href="<?= base_url(); ?>usulan/usulan/usulans/usul/<?php echo $row->no ?>/<?=$jabatan_no?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a>
                                
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
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
$query_dosens="SELECT
				a.no AS no_usulan,
				a.`jabatan_usulan_no`,
				f.`nama_jabatans`,
				f.kum,
				b.`jabatan_tgl`,
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
				ikatan_kerjas AS e,
				`jabatans` AS f
			  WHERE a.`dosen_no` = b.`no`
				AND b.`prodi_kode` = c.`kode`
				AND c.`instansi_kode` = d.`kode`
				AND b.`ikatan_kerja_kode`=e.`kode`
				AND b.`jabatan_no`=f.`kode`";
$data_dos=mysqli_query($koneksi,$query_dosens);
while($row_dos=mysqli_fetch_array($data_dos))
{

$tgl_lahir=$row_dos['lahir_tgl'];
$tgl_ok=date_create($tgl_lahir);
$tgl_lhr_dosen= date_format($tgl_ok, 'd F Y');



?>
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="lihat<?=$row_dos['no_usulan'] ?>" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-body">
		<div class="card">
		<div class="card-body">                              
		<h4 class="card-title"></h4>
		
		<td style="vertical-align:top"><center><b>LEMBAGA LAYANAN PENDIDIKAN TINGGI WILAYAH III
<br>RESUME USULAN PENETAPAN ANGKA KREDIT<br>JABATAN AKADEMIK DOSEN</b></center></td><br><br>
		<h6> UNIVERSITAS /  INSTITUT / SEKOLAH TINGGI / AKADEMI / POLITEKNIK : <?=$row_dos['nama_instansi']?></h6>
		<div class="row">    
		<table width="100%" border="1">
		  <tr>
			<td width="38" bgcolor="#CCCCCC"><div align="center"><strong>I</strong></div></td>
			<td colspan="13" bgcolor="#CCCCCC"><div align="center"><strong>KETERANGAN PERORANGAN</strong></div></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td width="118"><div align="center">1</div></td>
			<td colspan="4">Nama</td>
			<td colspan="8">&nbsp; <?=$row_dos['nama']?>,<?=$row_dos['gelar_belakang']?></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><div align="center">2</div></td>
			<td colspan="4">NIDN/NIDK/NIP/Karpeg</td>
			<td colspan="8"> &nbsp;<?=$row_dos['nidn']?>/<?=$row_dos['nip']?>/<?=$row_dos['karpeg']?></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><div align="center">3</div></td>
			<td colspan="4">Tempat dan Tanggal Lahir</td>
			<td colspan="8"> &nbsp;<?=$row_dos['lahir_tempat']?>, <?=tgl_indo($row_dos['lahir_tgl']);?></td>
		  </tr>
		  <?php
		  $gol="SELECT
					  a.golongan_kode,
					  a.golongan_tgl,
					  b.kode_gol,
					  b.nama
					FROM
					  `dosens` AS a,
					  golongans AS b
					WHERE a.`no` = '$row_dos[no]'
					  AND a.golongan_kode = b.`kode`";
		  $da_gol=mysqli_query($koneksi,$gol);
		  $r_gol=mysqli_fetch_array($da_gol);
		  ?>
		  <tr>
			<td>&nbsp;</td>
			<td><div align="center">4</div></td>
			<td colspan="4">Pangkat dan Golongan/TMT</td>
			<td colspan="8">&nbsp;<?=$r_gol['nama']?>(Gol.<?=$r_gol['kode_gol']?>), <?=tgl_indo($r_gol['golongan_tgl'])?></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><div align="center">5</div></td>
			<td colspan="4">Jabatan Dosen/TMT</td>
			<td colspan="8">&nbsp;<?=$row_dos['nama_jabatans']?>(<?=$row_dos['kum']?>), <?=tgl_indo($row_dos['jabatan_tgl'])?></td>
		  </tr>
		  <?php
		  $pend="SELECT
					 a.id_sdm,
					 a.thn_lulus,
					 a.nm_sp_formal,
					 b.nama_jenjang,
					 c.nama_bidang
				FROM
					rwy_pend_formal AS a,
					jenjangs AS b,
					bidang_ilmus AS c 
				WHERE
					a.id_sdm = '$row_dos[no]' 
					AND a.id_jenj_didik =b.id
					AND a.id_bid_studi=c.kode";
		  $da_pend=mysqli_query($koneksi,$pend);
		  ?>
		  <tr>
			<td>&nbsp;</td>
			<td><div align="center">6</div></td>
			<td colspan="4">Riwayat Pendidikan</td>
			<td colspan="8">
			<?php
			$no=1;
			while($r_pend=mysqli_fetch_array($da_pend))
			{
			?>
			&nbsp;<?=$no?>. <?=$r_pend['nama_jenjang']?>, <?=$r_pend['nama_bidang']?> - <?=$r_pend['nm_sp_formal']?><br>
			<?php
			$no++;
			}?>
			</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><div align="center">7</div></td>
			<td colspan="4">Jurusan/Program Studi/Mata Kuliah yang dibina/Bidang Ilmu</td>
			<td colspan="8"></td>
		  </tr>
		   <?php
		  $jabjen="SELECT
					  a.`jabatan_usulan_no`,
					  c.`nama_jabatans`,
					  c.`kum`
					FROM
					  `usulans` AS a,
					  `jabatan_jenjangs` AS b,
					  jabatans AS c
					WHERE a.`jabatan_usulan_no` = '$row_dos[jabatan_usulan_no]'
					  AND a.`no`='$row_dos[no_usulan]'
					  AND a.`jabatan_usulan_no` = b.`no`
					  AND b.`jabatan_kode` = c.`kode`";
		  $da_jabjen=mysqli_query($koneksi,$jabjen);
		  $r_jabjen=mysqli_fetch_array($da_jabjen);
		  ?>
		  <tr>
			<td>&nbsp;</td>
			<td><div align="center">8</div></td>
			<td colspan="4">Diusulkan Menjadi</td>
			<td colspan="8"> &nbsp;<?=$r_jabjen['nama_jabatans']?>(<?=$r_jabjen['kum']?>)</td>
		  </tr>
		  <tr>
			<td rowspan="3" bgcolor="#CCCCCC"><div align="center"><strong>II</strong></div></td>
			<td rowspan="3" bgcolor="#CCCCCC"><div align="center"><strong>Sub Unsur </strong></div></td>
			<td colspan="12" bgcolor="#CCCCCC"><div align="center"><strong>BIDANG DAN BUTIR YANG DINILAI</strong></div></td>
		  </tr>
		  <tr>
			<td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>IJAZAH</strong></div></td>
			<td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>PELAKSANAAN PENDIDIKAN</strong></div></td>
			<td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>PELAKSANAAN PENELITIAN</strong></div></td>
			<td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>PELAKSANAAN P2M</strong></div></td>
			<td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>UNSUR PENUNJANG</strong></div></td>
			<td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>JUMLAH</strong></div></td>
		  </tr>
		  <tr>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>L</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>B</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>L</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>B</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>L</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>B</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>L</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>B</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>L</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>B</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>L</strong></div></td>
			<td width="94" bgcolor="#CCCCCC"><div align="center"><strong>B</strong></div></td>
		  </tr>
		  <?php
			
		  ?>
		  <tr>
			<td><div align="center">1</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$sql_a0004="select *from usulan_dupaks where dupak_no='A0004' and usulan_no='$row_dos[no_usulan]'";
			$data_a0004=mysqli_query($koneksi,$sql_a0004);
			$data_bid_a_a0004=mysqli_fetch_array($data_a0004);
			$jumlah_a0004=$data_bid_a_a0004['kum_usulan_lama']+$data_bid_a_a0004['kum_usulan_baru'];
			
			if($data_bid_a_a0004['kum_usulan_lama']==0)
			{$da_bid_a0004_lama='';}else{$da_bid_a0004_lama=$data_bid_a_a0004['kum_usulan_lama'];}
			
			if($data_bid_a_a0004['kum_usulan_baru']==0)
			{$da_bid_a0004_baru='';}else{$da_bid_a0004_baru=$data_bid_a_a0004['kum_usulan_baru'];}
			?>
			<td align="center"><?=$da_bid_a0004_lama?></td>
			<td align="center"><?=$da_bid_a0004_baru?></td>
			
			<?php
			//bidang b
			$kum_lama_b_02=0;
			$kum_baru_b_02=0;
			$jumlah_b_02=0;
			$sql_b_02="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('B0002','B0001','B0003','B0037','B0004','B0025','B0026','B0006','B0005','B0007','B0024','B0038') ";
			$data_b_02=mysqli_query($koneksi,$sql_b_02);
			while($data_bid_b_02=mysqli_fetch_array($data_b_02))
			{
				$kum_lama_b_02+=$data_bid_b_02['kum_usulan_lama'];
				$kum_baru_b_02+=$data_bid_b_02['kum_usulan_baru'];
				$jumlah_b_02+=$kum_lama_b_02+$kum_baru_b_02;
			}
			
			if($kum_lama_b_02==0)
			{$da_bid_b_02_lama='';}else{$da_bid_b_02_lama=$kum_lama_b_02;}
			
			if($kum_baru_b_02==0)
			{$da_bid_b_02_baru='';}else{$da_bid_b_02_baru=$kum_baru_b_02;}
			?>
			<td align="center"><?=$da_bid_b_02_lama?></td>
			<td align="center"><?=$da_bid_b_02_baru?></td>
			
			<?php
			//bidang c
			$kum_lama_c_01=0;
			$kum_baru_c_01=0;
			$jumlah_c_01=0;
			$sql_c_01="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('C0001') ";
			$data_c_01=mysqli_query($koneksi,$sql_c_01);
			while($data_bid_c_01=mysqli_fetch_array($data_c_01))
			{
				$kum_lama_c_01+=$data_bid_c_01['kum_usulan_lama'];
				$kum_baru_c_01+=$data_bid_c_01['kum_usulan_baru'];
				$jumlah_c_01+=$kum_lama_c_01+$kum_baru_c_01;
			}
			
			if($kum_lama_c_01==0)
			{$da_bid_c_01_lama='';}else{$da_bid_c_01_lama=$kum_lama_c_01;}
			
			if($kum_baru_c_01==0)
			{$da_bid_c_01_baru='';}else{$da_bid_c_01_baru=$kum_baru_c_01;}
			?>
			<td align="center"><?=$da_bid_c_01_lama?></td>
			<td align="center"><?=$da_bid_c_01_baru?></td>
			
			<?php
			//bidang d
			$kum_lama_d_01=0;
			$kum_baru_d_01=0;
			$jumlah_d_01=0;
			$sql_d_01="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0001','D0002') ";
			$data_d_01=mysqli_query($koneksi,$sql_d_01);
			while($data_bid_d_01=mysqli_fetch_array($data_d_01))
			{
				$kum_lama_d_01+=$data_bid_d_01['kum_usulan_lama'];
				$kum_baru_d_01+=$data_bid_d_01['kum_usulan_baru'];
				$jumlah_d_01+=$kum_lama_d_01+$kum_baru_d_01;
			}
			
			if($kum_lama_d_01==0)
			{$da_bid_d_01_lama='';}else{$da_bid_d_01_lama=$kum_lama_d_01;}
			
			if($kum_baru_d_01==0)
			{$da_bid_d_01_baru='';}else{$da_bid_d_01_baru=$kum_baru_d_01;}
			?>
			<td align="center"><?=$da_bid_d_01_lama?></td>
			<td align="center"><?=$da_bid_d_01_baru?></td>
			
			<td>&nbsp;</td>
			<?php
			$jml_baru_01_ok=0;
			$jml_baru_01_ok=$da_bid_a0004_baru+$da_bid_b_02_baru+$da_bid_c_01_baru+$da_bid_d_01_baru;
			if($jml_baru_01_ok==0)
			{$jml_baru_01='';}else{$jml_baru_01=$jml_baru_01_ok;}
			?>
			<td align="center"><?=$jml_baru_01?></td>
		  </tr>
		  <tr>
			<td><div align="center">2</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$sql_a0005="select *from usulan_dupaks where dupak_no='A0005' and usulan_no='$row_dos[no_usulan]'";
			$data_a0005=mysqli_query($koneksi,$sql_a0005);
			$data_bid_a_a0005=mysqli_fetch_array($data_a0005);
			$jumlah_a0005=$data_bid_a_a0005['kum_usulan_lama']+$data_bid_a_a0005['kum_usulan_baru'];
			
			if($data_bid_a_a0005['kum_usulan_lama']==0)
			{$da_bid_a0005_lama='';}else{$da_bid_a0005_lama=$data_bid_a_a0005['kum_usulan_lama'];}
			
			if($data_bid_a_a0005['kum_usulan_baru']==0)
			{$da_bid_a0005_baru='';}else{$da_bid_a0005_baru=$data_bid_a_a0005['kum_usulan_baru'];}
			?>
			<td align="center"><?=$da_bid_a0005_lama?></td>
			<td align="center"><?=$da_bid_a0005_baru?></td>
			
			<?php
			//bidang b
			$kum_lama_b_35=0;
			$kum_baru_b_35=0;
			$jumlah_b_35=0;
			$sql_b_35="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('B0035','B0036','B0034','B0033','B0031','B0032','B0029','B0030','B0027','B0028','B0011') ";
			$data_b_35=mysqli_query($koneksi,$sql_b_35);
			while($data_bid_b_35=mysqli_fetch_array($data_b_35))
			{
				$kum_lama_b_35+=$data_bid_b_35['kum_usulan_lama'];
				$kum_baru_b_35+=$data_bid_b_35['kum_usulan_baru'];
				$jumlah_b_35+=$kum_lama_b_35+$kum_baru_b_35;
			}
			
			if($kum_lama_b_35==0)
			{$da_bid_b_35_lama='';}else{$da_bid_b_35_lama=$kum_lama_b_35;}
			
			if($kum_baru_b_35==0)
			{$da_bid_b_35_baru='';}else{$da_bid_b_35_baru=$kum_baru_b_35;}
			?>
			<td align="center"><?=$da_bid_b_35_lama?></td>
			<td align="center"><?=$da_bid_b_35_baru?></td>
			
			<?php
			//bidang c
			$kum_lama_c_02=0;
			$kum_baru_c_02=0;
			$jumlah_c_02=0;
			$sql_c_02="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('C0002') ";
			$data_c_02=mysqli_query($koneksi,$sql_c_02);
			while($data_bid_c_02=mysqli_fetch_array($data_c_02))
			{
				$kum_lama_c_02+=$data_bid_c_02['kum_usulan_lama'];
				$kum_baru_c_02+=$data_bid_c_02['kum_usulan_baru'];
				$jumlah_c_02+=$kum_lama_c_02+$kum_baru_c_02;
			}
			
			if($kum_lama_c_02==0)
			{$da_bid_c_02_lama='';}else{$da_bid_c_02_lama=$kum_lama_c_02;}
			
			if($kum_baru_c_02==0)
			{$da_bid_c_02_baru='';}else{$da_bid_c_02_baru=$kum_baru_c_02;}
			?>
			<td align="center"><?=$da_bid_c_02_lama?></td>
			<td align="center"><?=$da_bid_c_02_baru?></td>
			
			<?php
			//bidang d
			$kum_lama_d_03=0;
			$kum_baru_d_03=0;
			$jumlah_d_03=0;
			$sql_d_03="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0003','D0004','D0005','D0006') ";
			$data_d_03=mysqli_query($koneksi,$sql_d_03);
			while($data_bid_d_03=mysqli_fetch_array($data_d_03))
			{
				$kum_lama_d_03+=$data_bid_d_03['kum_usulan_lama'];
				$kum_baru_d_03+=$data_bid_d_03['kum_usulan_baru'];
				$jumlah_d_03+=$kum_lama_d_03+$kum_baru_d_03;
			}
			
			if($kum_lama_d_03==0)
			{$da_bid_d_03_lama='';}else{$da_bid_d_03_lama=$kum_lama_d_03;}
			
			if($kum_baru_d_03==0)
			{$da_bid_d_03_baru='';}else{$da_bid_d_03_baru=$kum_baru_d_03;}
			?>
			<td align="center"><?=$da_bid_d_03_lama?></td>
			<td align="center"><?=$da_bid_d_03_baru?></td>
			<td>&nbsp;</td>
			<?php
			$jml_baru_02_ok=0;
			$jml_baru_02_ok=$da_bid_a0005_baru+$da_bid_b_35_baru+$da_bid_c_02_baru+$da_bid_d_03_baru;
			
			if($jml_baru_02_ok==0)
			{$jml_baru_2='';}else{$jml_baru_2=$jml_baru_02_ok;}
			?>
			<td align="center"><?=$jml_baru_2?></td>
		  </tr>
		  <tr>
			<td><div align="center">3</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$sql_a0006="select *from usulan_dupaks where dupak_no='A0006' and usulan_no='$row_dos[no_usulan]'";
			$data_a0006=mysqli_query($koneksi,$sql_a0006);
			$data_bid_a_a0006=mysqli_fetch_array($data_a0006);
			$jumlah_a0006=$data_bid_a_a0006['kum_usulan_lama']+$data_bid_a_a0006['kum_usulan_baru'];
			
			if($data_bid_a_a0006['kum_usulan_lama']==0)
			{$da_bid_a0006_lama='';}else{$da_bid_a0006_lama=$data_bid_a_a0006['kum_usulan_lama'];}
			
			if($data_bid_a_a0006['kum_usulan_baru']==0)
			{$da_bid_a0006_baru='';}else{$da_bid_a0006_baru=$data_bid_a_a0006['kum_usulan_baru'];}
			?>
			<td align="center"><?=$da_bid_a0006_lama?></td>
			<td align="center"><?=$da_bid_a0006_baru?></td>
			<?php
			//bidang b
			$kum_lama_b_12=0;
			$kum_baru_b_12=0;
			$jumlah_b_12=0;
			$sql_b_12="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('B0012') ";
			$data_b_12=mysqli_query($koneksi,$sql_b_12);
			while($data_bid_b_12=mysqli_fetch_array($data_b_12))
			{
				$kum_lama_b_12+=$data_bid_b_12['kum_usulan_lama'];
				$kum_baru_b_12+=$data_bid_b_12['kum_usulan_baru'];
				$jumlah_b_12+=$kum_lama_b_12+$kum_baru_b_12;
			}
			
			if($kum_lama_b_12==0)
			{$da_bid_b_12_lama='';}else{$da_bid_b_12_lama=$kum_lama_b_12;}
			
			if($kum_baru_b_12==0)
			{$da_bid_b_12_baru='';}else{$da_bid_b_12_baru=$kum_baru_b_12;}
			?>
			<td align="center"><?=$da_bid_b_12_lama?></td>
			<td align="center"><?=$da_bid_b_12_baru?></td>
			
			<?php
			//bidang c
			$kum_lama_c_03=0;
			$kum_baru_c_03=0;
			$jumlah_c_03=0;
			$sql_c_03="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('C0003','C0004','C0005','C0006','C0007','C0008','C0009') ";
			$data_c_03=mysqli_query($koneksi,$sql_c_03);
			while($data_bid_c_03=mysqli_fetch_array($data_c_03))
			{
				$kum_lama_c_03+=$data_bid_c_03['kum_usulan_lama'];
				$kum_baru_c_03+=$data_bid_c_03['kum_usulan_baru'];
				$jumlah_c_03+=$kum_lama_c_03+$kum_baru_c_03;
			}
			
			if($kum_lama_c_03==0)
			{$da_bid_c_03_lama='';}else{$da_bid_c_03_lama=$kum_lama_c_03;}
			
			if($kum_baru_c_03==0)
			{$da_bid_c_03_baru='';}else{$da_bid_c_03_baru=$kum_baru_c_03;}
			?>
			<td align="center"><?=$da_bid_c_03_lama?></td>
			<td align="center"><?=$da_bid_c_03_baru?></td>
			
			<?php
			//bidang d
			$kum_lama_d_07=0;
			$kum_baru_d_07=0;
			$jumlah_d_07=0;
			$sql_d_07="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0007','D0008','D0009','D0010','D0011','D0012') ";
			$data_d_07=mysqli_query($koneksi,$sql_d_07);
			while($data_bid_d_07=mysqli_fetch_array($data_d_07))
			{
				$kum_lama_d_07+=$data_bid_d_07['kum_usulan_lama'];
				$kum_baru_d_07+=$data_bid_d_07['kum_usulan_baru'];
				$jumlah_d_07+=$kum_lama_d_07+$kum_baru_d_07;
			}
			
			if($kum_lama_d_07==0)
			{$da_bid_d_07_lama='';}else{$da_bid_d_07_lama=$kum_lama_d_07;}
			
			if($kum_baru_d_07==0)
			{$da_bid_d_07_baru='';}else{$da_bid_d_07_baru=$kum_baru_d_07;}
			?>
			<td align="center"><?=$da_bid_d_07_lama?></td>
			<td align="center"><?=$da_bid_d_07_baru?></td>
			
			<td>&nbsp;</td>
			<?php
			$jml_baru_3_ok=0;
			$jml_baru_3_ok=$da_bid_a0006_baru+$da_bid_b_12_baru+$da_bid_c_03_baru+$da_bid_d_07_baru;
			
			if($jml_baru_3_ok==0)
			{$jml_baru_3='';}else{$jml_baru_3=$jml_baru_3_ok;}
			?>
			<td align="center"><?=$jml_baru_3?></td>
		  </tr>
		  <tr>
			<td><div align="center">4</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$kum_lama_07=0;
			$kum_baru_07=0;
			$jumlah_a0007=0;
			$sql_a0007="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('A0007','A0008','A0009','A0010','A0011','A0012','A0013','A0014') ";
			$data_a0007=mysqli_query($koneksi,$sql_a0007);
			while($data_bid_a_a0007=mysqli_fetch_array($data_a0007))
			{
				$kum_lama_07+=$data_bid_a_a0007['kum_usulan_lama'];
				$kum_baru_07+=$data_bid_a_a0007['kum_usulan_baru'];
				$jumlah_a0007+=$kum_lama_07+$kum_baru_07;
			}
			
			if($kum_lama_07==0)
			{$da_bid_a0007_lama='';}else{$da_bid_a0007_lama=$kum_lama_07;}
			
			if($kum_baru_07==0)
			{$da_bid_a0007_baru='';}else{$da_bid_a0007_baru=$kum_baru_07;}
			?>
			<td align="center"><?=$da_bid_a0007_lama?></td>
			<td align="center"><?=$da_bid_a0007_baru?></td>
			
			<?php
			//bidang b
			$kum_lama_b_13=0;
			$kum_baru_b_13=0;
			$jumlah_b_13=0;
			$sql_b_13="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('B0013') ";
			$data_b_13=mysqli_query($koneksi,$sql_b_13);
			while($data_bid_b_13=mysqli_fetch_array($data_b_13))
			{
				$kum_lama_b_13+=$data_bid_b_13['kum_usulan_lama'];
				$kum_baru_b_13+=$data_bid_b_13['kum_usulan_baru'];
				$jumlah_b_13+=$kum_lama_b_13+$kum_baru_b_13;
			}
			
			if($kum_lama_b_13==0)
			{$da_bid_b_13_lama='';}else{$da_bid_b_13_lama=$kum_lama_b_13;}
			
			if($kum_baru_b_13==0)
			{$da_bid_b_13_baru='';}else{$da_bid_b_13_baru=$kum_baru_b_13;}
			?>
			<td align="center"><?=$da_bid_b_13_lama?></td>
			<td align="center"><?=$da_bid_b_13_baru?></td>
			
			<?php
			//bidang c
			$kum_lama_c_10=0;
			$kum_baru_c_10=0;
			$jumlah_c_10=0;
			$sql_c_10="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('C0010','C0011','C0012') ";
			$data_c_10=mysqli_query($koneksi,$sql_c_10);
			while($data_bid_c_10=mysqli_fetch_array($data_c_10))
			{
				$kum_lama_c_10+=$data_bid_c_10['kum_usulan_lama'];
				$kum_baru_c_10+=$data_bid_c_10['kum_usulan_baru'];
				$jumlah_c_10+=$kum_lama_c_10+$kum_baru_c_10;
			}
			
			if($kum_lama_c_10==0)
			{$da_bid_c_10_lama='';}else{$da_bid_c_10_lama=$kum_lama_c_10;}
			
			if($kum_baru_c_10==0)
			{$da_bid_c_10_baru='';}else{$da_bid_c_10_baru=$kum_baru_c_10;}
			?>
			<td align="center"><?=$da_bid_c_10_lama?></td>
			<td align="center"><?=$da_bid_c_10_baru?></td>
			
			<?php
			//bidang d
			$kum_lama_d_13=0;
			$kum_baru_d_13=0;
			$jumlah_d_13=0;
			$sql_d_13="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0013') ";
			$data_d_13=mysqli_query($koneksi,$sql_d_13);
			while($data_bid_d_13=mysqli_fetch_array($data_d_13))
			{
				$kum_lama_d_13+=$data_bid_d_13['kum_usulan_lama'];
				$kum_baru_d_13+=$data_bid_d_13['kum_usulan_baru'];
				$jumlah_d_13+=$kum_lama_d_13+$kum_baru_d_13;
			}
			
			if($kum_lama_d_13==0)
			{$da_bid_d_13_lama='';}else{$da_bid_d_13_lama=$kum_lama_d_13;}
			
			if($kum_baru_d_13==0)
			{$da_bid_d_13_baru='';}else{$da_bid_d_13_baru=$kum_baru_d_13;}
			?>
			<td align="center"><?=$da_bid_d_13_lama?></td>
			<td align="center"><?=$da_bid_d_13_baru?></td>
			
			<td>&nbsp;</td>
			<?php
			$jml_baru_4_ok=0;
			$jml_baru_4_ok=$da_bid_a0007_baru+$da_bid_b_13_baru+$da_bid_c_10_baru+$da_bid_d_13_baru;
			
			if($jml_baru_4_ok==0)
			{$jml_baru_4='';}else{$jml_baru_4=$jml_baru_4_ok;}
			?>
			<td align="center"><?=$jml_baru_4?></td>
		  </tr>
		  <tr>
			<td><div align="center">5</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$kum_lama_15=0;
			$kum_baru_15=0;
			$jumlah_a0015=0;
			$sql_a0015="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('A0015','A0016') ";
			$data_a0015=mysqli_query($koneksi,$sql_a0015);
			while($data_bid_a_a0015=mysqli_fetch_array($data_a0015))
			{
				$kum_lama_15+=$data_bid_a_a0015['kum_usulan_lama'];
				$kum_baru_15+=$data_bid_a_a0015['kum_usulan_baru'];
				$jumlah_a0015+=$kum_lama_15+$kum_baru_15;
			}
			if($kum_lama_15==0)
			{$da_bid_a0015_lama='';}else{$da_bid_a0015_lama=$kum_lama_15;}
			
			if($kum_baru_15==0)
			{$da_bid_a0015_baru='';}else{$da_bid_a0015_baru=$kum_baru_15;}
			?>
			<td align="center"><?=$da_bid_a0015_lama?></td>
			<td align="center"><?=$da_bid_a0015_baru?></td>
			
			<?php
			//bidang b
			$kum_lama_b_14=0;
			$kum_baru_b_14=0;
			$jumlah_b_14=0;
			$sql_b_14="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('B0014') ";
			$data_b_14=mysqli_query($koneksi,$sql_b_14);
			while($data_bid_b_14=mysqli_fetch_array($data_b_14))
			{
				$kum_lama_b_14+=$data_bid_b_14['kum_usulan_lama'];
				$kum_baru_b_14+=$data_bid_b_14['kum_usulan_baru'];
				$jumlah_b_14+=$kum_lama_b_14+$kum_baru_b_14;
			}
			
			if($kum_lama_b_14==0)
			{$da_bid_b_14_lama='';}else{$da_bid_b_14_lama=$kum_lama_b_14;}
			
			if($kum_baru_b_14==0)
			{$da_bid_b_14_baru='';}else{$da_bid_b_14_baru=$kum_baru_b_14;}
			?>
			<td align="center"><?=$da_bid_b_14_lama?></td>
			<td align="center"><?=$da_bid_b_14_baru?></td>
			
			<?php
			//bidang c
			$kum_lama_c_13=0;
			$kum_baru_c_13=0;
			$jumlah_c_13=0;
			$sql_c_13="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('C0013') ";
			$data_c_13=mysqli_query($koneksi,$sql_c_13);
			while($data_bid_c_13=mysqli_fetch_array($data_c_13))
			{
				$kum_lama_c_13+=$data_bid_c_13['kum_usulan_lama'];
				$kum_baru_c_13+=$data_bid_c_13['kum_usulan_baru'];
				$jumlah_c_13+=$kum_lama_c_13+$kum_baru_c_13;
			}
			
			if($kum_lama_c_13==0)
			{$da_bid_c_13_lama='';}else{$da_bid_c_13_lama=$kum_lama_c_13;}
			
			if($kum_baru_c_13==0)
			{$da_bid_c_13_baru='';}else{$da_bid_c_13_baru=$kum_baru_c_13;}
			?>
			<td align="center"><?=$da_bid_c_13_lama?></td>
			<td align="center"><?=$da_bid_c_13_baru?></td>
			
			<?php
			//bidang d
			$kum_lama_d_14=0;
			$kum_baru_d_14=0;
			$jumlah_d_14=0;
			$sql_d_14="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0014','D0015') ";
			$data_d_14=mysqli_query($koneksi,$sql_d_14);
			while($data_bid_d_14=mysqli_fetch_array($data_d_14))
			{
				$kum_lama_d_14+=$data_bid_d_14['kum_usulan_lama'];
				$kum_baru_d_14+=$data_bid_d_14['kum_usulan_baru'];
				$jumlah_d_14+=$kum_lama_d_14+$kum_baru_d_14;
			}
			
			if($kum_lama_d_14==0)
			{$da_bid_d_14_lama='';}else{$da_bid_d_14_lama=$kum_lama_d_14;}
			
			if($kum_baru_d_14==0)
			{$da_bid_d_14_baru='';}else{$da_bid_d_14_baru=$kum_baru_d_14;}
			?>
			<td align="center"><?=$da_bid_d_14_lama?></td>
			<td align="center"><?=$da_bid_d_14_baru?></td>
			
			<td>&nbsp;</td>
			<?php
			$jml_baru_5_ok=0;
			$jml_baru_5_ok=$da_bid_a0015_baru+$da_bid_b_14_baru+$da_bid_c_13_baru+$da_bid_d_14_baru;
			
			if($jml_baru_5_ok==0)
			{$jml_baru_5='';}else{$jml_baru_5=$jml_baru_5_ok;}
			?>
			<td align="center"><?=$jml_baru_5?></td>
		  </tr>
		  <tr>
			<td><div align="center">6</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$sql_a0017="select *from usulan_dupaks where dupak_no='A0017' and usulan_no='$row_dos[no_usulan]'";
			$data_a0017=mysqli_query($koneksi,$sql_a0017);
			$data_bid_a_a0017=mysqli_fetch_array($data_a0017);
			$jumlah_a0017=$data_bid_a_a0017['kum_usulan_lama']+$data_bid_a_a0017['kum_usulan_baru'];
			
			if($data_bid_a_a0017['kum_usulan_lama']==0)
			{$da_bid_a0017_lama='';}else{$da_bid_a0017_lama=$data_bid_a_a0017['kum_usulan_lama'];}
			
			if($data_bid_a_a0017['kum_usulan_baru']==0)
			{$da_bid_a0017_baru='';}else{$da_bid_a0017_baru=$data_bid_a_a0017['kum_usulan_baru'];}
			?>
			<td align="center"><?=$da_bid_a0017_lama?></td>
			<td align="center"><?=$da_bid_a0017_baru?></td>
			
			<?php
			//bidang b
			$kum_lama_b_15=0;
			$kum_baru_b_15=0;
			$jumlah_b_15=0;
			$sql_b_15="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('B0015','B0016','B0017','B0018','B0019','B0020') ";
			$data_b_15=mysqli_query($koneksi,$sql_b_15);
			while($data_bid_b_15=mysqli_fetch_array($data_b_15))
			{
				$kum_lama_b_15+=$data_bid_b_15['kum_usulan_lama'];
				$kum_baru_b_15+=$data_bid_b_15['kum_usulan_baru'];
				$jumlah_b_15+=$kum_lama_b_15+$kum_baru_b_15;
			}
			
			if($kum_lama_b_15==0)
			{$da_bid_b_15_lama='';}else{$da_bid_b_15_lama=$kum_lama_b_15;}
			
			if($kum_baru_b_15==0)
			{$da_bid_b_15_baru='';}else{$da_bid_b_15_baru=$kum_baru_b_15;}
			?>
			<td align="center"><?=$da_bid_b_15_lama?></td>
			<td align="center"><?=$da_bid_b_15_baru?></td>
			
			<?php
			//bidang c
			$kum_lama_c_14=0;
			$kum_baru_c_14=0;
			$jumlah_c_14=0;
			$sql_c_14="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('C0014') ";
			$data_c_14=mysqli_query($koneksi,$sql_c_14);
			while($data_bid_c_14=mysqli_fetch_array($data_c_14))
			{
				$kum_lama_c_14+=$data_bid_c_14['kum_usulan_lama'];
				$kum_baru_c_14+=$data_bid_c_14['kum_usulan_baru'];
				$jumlah_c_14+=$kum_lama_c_14+$kum_baru_c_14;
			}
			
			if($kum_lama_c_14==0)
			{$da_bid_c_14_lama='';}else{$da_bid_c_14_lama=$kum_lama_c_14;}
			
			if($kum_baru_c_14==0)
			{$da_bid_c_14_baru='';}else{$da_bid_c_14_baru=$kum_baru_c_14;}
			?>
			<td align="center"><?=$da_bid_c_14_lama?></td>
			<td align="center"><?=$da_bid_c_14_baru?></td>
			
			<?php
			//bidang d
			$kum_lama_d_16=0;
			$kum_baru_d_16=0;
			$jumlah_d_16=0;
			$sql_d_16="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0016','D0017','D0018','D0019') ";
			$data_d_16=mysqli_query($koneksi,$sql_d_16);
			while($data_bid_d_16=mysqli_fetch_array($data_d_16))
			{
				$kum_lama_d_16+=$data_bid_d_16['kum_usulan_lama'];
				$kum_baru_d_16+=$data_bid_d_16['kum_usulan_baru'];
				$jumlah_d_16+=$kum_lama_d_16+$kum_baru_d_16;
			}
			
			if($kum_lama_d_16==0)
			{$da_bid_d_16_lama='';}else{$da_bid_d_16_lama=$kum_lama_d_16;}
			
			if($kum_baru_d_16==0)
			{$da_bid_d_16_baru='';}else{$da_bid_d_16_baru=$kum_baru_d_16;}
			?>
			<td align="center"><?=$da_bid_d_16_lama?></td>
			<td align="center"><?=$da_bid_d_16_baru?></td>
			
			<td>&nbsp;</td>
			<?php
			$jml_baru_6_ok=0;
			$jml_baru_6_ok=$da_bid_a0017_baru+$da_bid_b_15_baru+$da_bid_c_14_baru+$da_bid_d_16_baru;
			
			if($jml_baru_6_ok==0)
			{$jml_baru_6='';}else{$jml_baru_6=$jml_baru_6_ok;}
			?>
			<td align="center"><?=$jml_baru_6?></td>
		  </tr>
		  <tr>
			<td><div align="center">7</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$sql_a0018="select *from usulan_dupaks where dupak_no='A0018' and usulan_no='$row_dos[no_usulan]'";
			$data_a0018=mysqli_query($koneksi,$sql_a0018);
			$data_bid_a_a0018=mysqli_fetch_array($data_a0018);
			$jumlah_a0018=$data_bid_a_a0018['kum_usulan_lama']+$data_bid_a_a0018['kum_usulan_baru'];
			
			if($data_bid_a_a0018['kum_usulan_lama']==0)
			{$da_bid_a0018_lama='';}else{$da_bid_a0018_lama=$data_bid_a_a0018['kum_usulan_lama'];}
			
			if($data_bid_a_a0018['kum_usulan_baru']==0)
			{$da_bid_a0018_baru='';}else{$da_bid_a0018_baru=$data_bid_a_a0018['kum_usulan_baru'];}
			?>
			<td align="center"><?=$da_bid_a0018_lama?></td>
			<td align="center"><?=$da_bid_a0018_baru?></td>
			
			<?php
			//bidang b
			$kum_lama_b_21=0;
			$kum_baru_b_21=0;
			$jumlah_b_21=0;
			$sql_b_21="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('B0021','B0022','B0023') ";
			$data_b_21=mysqli_query($koneksi,$sql_b_21);
			while($data_bid_b_21=mysqli_fetch_array($data_b_21))
			{
				$kum_lama_b_21+=$data_bid_b_21['kum_usulan_lama'];
				$kum_baru_b_21+=$data_bid_b_21['kum_usulan_baru'];
				$jumlah_b_21+=$kum_lama_b_21+$kum_baru_b_21;
			}
			
			if($kum_lama_b_21==0)
			{$da_bid_b_21_lama='';}else{$da_bid_b_21_lama=$kum_lama_b_21;}
			
			if($kum_baru_b_21==0)
			{$da_bid_b_21_baru='';}else{$da_bid_b_21_baru=$kum_baru_b_21;}
			?>
			<td align="center"><?=$da_bid_b_21_lama?></td>
			<td align="center"><?=$da_bid_b_21_baru?></td>
			
			<?php
			//bidang c
			$kum_lama_c_15=0;
			$kum_baru_c_15=0;
			$jumlah_c_15=0;
			$sql_c_15="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('C0015','C0016') ";
			$data_c_15=mysqli_query($koneksi,$sql_c_15);
			while($data_bid_c_15=mysqli_fetch_array($data_c_15))
			{
				$kum_lama_c_15+=$data_bid_c_15['kum_usulan_lama'];
				$kum_baru_c_15+=$data_bid_c_15['kum_usulan_baru'];
				$jumlah_c_15+=$kum_lama_c_15+$kum_baru_c_15;
			}
			
			if($kum_lama_c_15==0)
			{$da_bid_c_15_lama='';}else{$da_bid_c_15_lama=$kum_lama_c_15;}
			
			if($kum_baru_c_15==0)
			{$da_bid_c_15_baru='';}else{$da_bid_c_15_baru=$kum_baru_c_15;}
			?>
			<td align="center"><?=$da_bid_c_15_lama?></td>
			<td align="center"><?=$da_bid_c_15_baru?></td>
			
			<?php
			//bidang d
			$kum_lama_d_20=0;
			$kum_baru_d_20=0;
			$jumlah_d_20=0;
			$sql_d_20="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0020','D0021','D0022','D0023','D0024','D0025') ";
			$data_d_20=mysqli_query($koneksi,$sql_d_20);
			while($data_bid_d_20=mysqli_fetch_array($data_d_20))
			{
				$kum_lama_d_20+=$data_bid_d_20['kum_usulan_lama'];
				$kum_baru_d_20+=$data_bid_d_20['kum_usulan_baru'];
				$jumlah_d_20+=$kum_lama_d_20+$kum_baru_d_20;
			}
			
			if($kum_lama_d_20==0)
			{$da_bid_d_20_lama='';}else{$da_bid_d_20_lama=$kum_lama_d_20;}
			
			if($kum_baru_d_20==0)
			{$da_bid_d_20_baru='';}else{$da_bid_d_20_baru=$kum_baru_d_20;}
			?>
			<td align="center"><?=$da_bid_d_20_lama?></td>
			<td align="center"><?=$da_bid_d_20_baru?></td>
			
			<td>&nbsp;</td>
			<?php
			$jml_baru_7_ok=0;
			$jml_baru_7_ok=$da_bid_a0018_baru+$da_bid_b_21_baru+$da_bid_c_15_baru+$da_bid_d_20_baru;
			
			if($jml_baru_7_ok==0)
			{$jml_baru_7='';}else{$jml_baru_7=$jml_baru_7_ok;}
			?>
			<td align="center"><?=$jml_baru_7?></td>
		  </tr>
		  <tr>
			<td><div align="center">8</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$kum_lama_19=0;
			$kum_baru_19=0;
			$jumlah_a0019=0;
			$sql_a0019="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('A0019','A0020') ";
			$data_a0019=mysqli_query($koneksi,$sql_a0019);
			while($data_bid_a_a0019=mysqli_fetch_array($data_a0019))
			{
				$kum_lama_19+=$data_bid_a_a0019['kum_usulan_lama'];
				$kum_baru_19+=$data_bid_a_a0019['kum_usulan_baru'];
				$jumlah_a0019+=$kum_lama_19+$kum_baru_19;
			}
			
			if($kum_lama_19==0)
			{$da_bid_a0019_lama='';}else{$da_bid_a0019_lama=$kum_lama_19;}
			
			if($kum_baru_19==0)
			{$da_bid_a0019_baru='';}else{$da_bid_a0019_baru=$kum_baru_19;}
			?>
			<td align="center"><?=$da_bid_a0019_lama?></td>
			<td align="center"><?=$da_bid_a0019_baru?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			
			<?php
			//bidang d
			$kum_lama_d_26=0;
			$kum_baru_d_26=0;
			$jumlah_d_26=0;
			$sql_d_26="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0026','D0027','D0028') ";
			$data_d_26=mysqli_query($koneksi,$sql_d_26);
			while($data_bid_d_26=mysqli_fetch_array($data_d_26))
			{
				$kum_lama_d_26+=$data_bid_d_26['kum_usulan_lama'];
				$kum_baru_d_26+=$data_bid_d_26['kum_usulan_baru'];
				$jumlah_d_26+=$kum_lama_d_26+$kum_baru_d_26;
			}
			
			if($kum_lama_d_26==0)
			{$da_bid_d_26_lama='';}else{$da_bid_d_26_lama=$kum_lama_d_26;}
			
			if($kum_baru_d_26==0)
			{$da_bid_d_26_baru='';}else{$da_bid_d_26_baru=$kum_baru_d_26;}
			?>
			<td align="center"><?=$da_bid_d_26_lama?></td>
			<td align="center"><?=$da_bid_d_26_baru?></td>
			
			<td>&nbsp;</td>
			<?php
			$jml_baru_8_ok=0;
			$jml_baru_8_ok=$da_bid_a0019_baru+$da_bid_d_26_baru;
			
			if($jml_baru_8_ok==0)
			{$jml_baru_8='';}else{$jml_baru_8=$jml_baru_8_ok;}
			?>
			<td align="center"><?=$jml_baru_8?></td>
		  </tr>
		  <tr>
			<td><div align="center">9</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$sql_a0021="select *from usulan_dupaks where dupak_no='A0021' and usulan_no='$row_dos[no_usulan]'";
			$data_a0021=mysqli_query($koneksi,$sql_a0021);
			$data_bid_a_a0021=mysqli_fetch_array($data_a0021);
			$jumlah_a0021=$data_bid_a_a0021['kum_usulan_lama']+$data_bid_a_a0021['kum_usulan_baru'];
			
			if($data_bid_a_a0021['kum_usulan_lama']==0)
			{$da_bid_a0021_lama='';}else{$da_bid_a0021_lama=$data_bid_a_a0021['kum_usulan_lama'];}
			
			if($data_bid_a_a0021['kum_usulan_baru']==0)
			{$da_bid_a0021_baru='';}else{$da_bid_a0021_baru=$data_bid_a_a0021['kum_usulan_baru'];}
			?>
			<td align="center"><?=$da_bid_a0021_lama?></td>
			<td align="center"><?=$da_bid_a0021_baru?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			
			<?php
			//bidang d
			$kum_lama_d_29=0;
			$kum_baru_d_29=0;
			$jumlah_d_29=0;
			$sql_d_29="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0029','D0030','D0031') ";
			$data_d_29=mysqli_query($koneksi,$sql_d_29);
			while($data_bid_d_29=mysqli_fetch_array($data_d_29))
			{
				$kum_lama_d_29+=$data_bid_d_29['kum_usulan_lama'];
				$kum_baru_d_29+=$data_bid_d_29['kum_usulan_baru'];
				$jumlah_d_29+=$kum_lama_d_29+$kum_baru_d_29;
			}
			
			if($kum_lama_d_29==0)
			{$da_bid_d_29_lama='';}else{$da_bid_d_29_lama=$kum_lama_d_29;}
			
			if($kum_baru_d_29==0)
			{$da_bid_d_29_baru='';}else{$da_bid_d_29_baru=$kum_baru_d_29;}
			?>
			<td align="center"><?=$da_bid_d_29_lama?></td>
			<td align="center"><?=$da_bid_d_29_baru?></td>
			
			<td>&nbsp;</td>
			<?php
			$jml_baru_9_ok=0;
			$jml_baru_9_ok=$da_bid_a0021_baru+$da_bid_d_29_baru;
			
			if($jml_baru_9_ok==0)
			{$jml_baru_9='';}else{$jml_baru_9=$jml_baru_9_ok;}
			?>
			<td align="center"><?=$jml_baru_9?></td>
		  </tr>
		  <tr>
			<td><div align="center">10</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang a
			$kum_lama_22=0;
			$kum_baru_22=0;
			$jumlah_a0022=0;
			$sql_a0022="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('A0022','A0023','A0024','A0025','A0026','A0027','A0028','A0029') ";
			$data_a0022=mysqli_query($koneksi,$sql_a0022);
			while($data_bid_a_a0022=mysqli_fetch_array($data_a0022))
			{
				$kum_lama_22+=$data_bid_a_a0022['kum_usulan_lama'];
				$kum_baru_22+=$data_bid_a_a0022['kum_usulan_baru'];
				$jumlah_a0022+=$kum_lama_22+$kum_baru_22;
			}
			
			if($kum_lama_22==0)
			{$da_bid_a0022_lama='';}else{$da_bid_a0022_lama=$kum_lama_22;}
			
			if($kum_baru_22==0)
			{$da_bid_a0022_baru='';}else{$da_bid_a0022_baru=$kum_baru_22;}
			?>
			<td align="center"><?=$da_bid_a0022_lama?></td>
			<td align="center"><?=$da_bid_a0022_baru?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			//bidang d
			$kum_lama_d_32=0;
			$kum_baru_d_32=0;
			$jumlah_d_32=0;
			$sql_d_32="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('D0032') ";
			$data_d_32=mysqli_query($koneksi,$sql_d_32);
			while($data_bid_d_32=mysqli_fetch_array($data_d_32))
			{
				$kum_lama_d_32+=$data_bid_d_32['kum_usulan_lama'];
				$kum_baru_d_32+=$data_bid_d_32['kum_usulan_baru'];
				$jumlah_d_32+=$kum_lama_d_32+$kum_baru_d_32;
			}
			
			if($kum_lama_d_32==0)
			{$da_bid_d_32_lama='';}else{$da_bid_d_32_lama=$kum_lama_d_32;}
			
			if($kum_baru_d_32==0)
			{$da_bid_d_32_baru='';}else{$da_bid_d_32_baru=$kum_baru_d_32;}
			?>
			<td align="center"><?=$da_bid_d_32_lama?></td>
			<td align="center"><?=$da_bid_d_32_baru?></td>
			<td>&nbsp;</td>
			<?php
			$jml_baru_10_ok=0;
			$jml_baru_10_ok=$da_bid_a0022_baru+$da_bid_d_32_baru;
			
			if($jml_baru_10_ok==0)
			{$jml_baru_10='';}else{$jml_baru_10=$jml_baru_10_ok;}
			?>
			<td align="center"><?=$jml_baru_10?></td>
		  </tr>
		  <tr>
			<td><div align="center">11</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			$kum_lama_30=0;
			$kum_baru_30=0;
			$jumlah_a0030=0;
			$sql_a0030="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('A0030','A0031') ";
			$data_a0030=mysqli_query($koneksi,$sql_a0030);
			while($data_bid_a_a0030=mysqli_fetch_array($data_a0030))
			{
				$kum_lama_30+=$data_bid_a_a0030['kum_usulan_lama'];
				$kum_baru_30+=$data_bid_a_a0030['kum_usulan_baru'];
				$jumlah_a0030+=$kum_lama_30+$kum_baru_30;
			}
			
			if($kum_lama_30==0)
			{$da_bid_a0030_lama='';}else{$da_bid_a0030_lama=$kum_lama_30;}
			
			if($kum_baru_30==0)
			{$da_bid_a0030_baru='';}else{$da_bid_a0030_baru=$kum_baru_30;}
			?>
			<td align="center"><?=$da_bid_a0030_lama?></td>
			<td align="center"><?=$da_bid_a0030_baru?></td>
		
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			$jml_baru_11_ok=0;
			$jml_baru_11_ok=$da_bid_a0030_baru;
			
			if($jml_baru_11_ok==0)
			{$jml_baru_11='';}else{$jml_baru_11=$jml_baru_11_ok;}
			?>
			<td align="center"><?=$jml_baru_11?></td>
		  </tr>
		  <tr>
			<td><div align="center">12</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			$kum_lama_32=0;
			$kum_baru_32=0;
			$jumlah_a0032=0;
			$sql_a0032="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('A0032','A0033') ";
			$data_a0032=mysqli_query($koneksi,$sql_a0032);
			while($data_bid_a_a0032=mysqli_fetch_array($data_a0032))
			{
				$kum_lama_32+=$data_bid_a_a0032['kum_usulan_lama'];
				$kum_baru_32+=$data_bid_a_a0032['kum_usulan_baru'];
				$jumlah_a0032+=$kum_lama_32+$kum_baru_32;
			}
			
			if($kum_lama_32==0)
			{$da_bid_a0032_lama='';}else{$da_bid_a0032_lama=$kum_lama_32;}
			
			if($kum_baru_32==0)
			{$da_bid_a0032_baru='';}else{$da_bid_a0032_baru=$kum_baru_32;}
			?>
			<td align="center"><?=$da_bid_a0032_lama?></td>
			<td align="center"><?=$da_bid_a0032_baru?></td>
			
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			$jml_baru_12_ok=0;
			$jml_baru_12_ok=$da_bid_a0032_baru;
			
			if($jml_baru_12_ok==0)
			{$jml_baru_12='';}else{$jml_baru_12=$jml_baru_12_ok;}
			?>
			<td align="center"><?=$jml_baru_12?></td>
		  </tr>
		  <tr>
			<td><div align="center">13</div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			$kum_lama_34=0;
			$kum_baru_34=0;
			$jumlah_a0034=0;
			$sql_a0034="select *from usulan_dupaks where usulan_no='$row_dos[no_usulan]' and 
						dupak_no in ('A0034','A0035','A0036','A0037','A0038','A0039','A0040') ";
			$data_a0034=mysqli_query($koneksi,$sql_a0034);
			while($data_bid_a_a0034=mysqli_fetch_array($data_a0034))
			{
				$kum_lama_34+=$data_bid_a_a0034['kum_usulan_lama'];
				$kum_baru_34+=$data_bid_a_a0034['kum_usulan_baru'];
				$jumlah_a0034+=$kum_lama_34+$kum_baru_34;
			}
			
			if($kum_lama_34==0)
			{$da_bid_a0034_lama='';}else{$da_bid_a0034_lama=$kum_lama_34;}
			
			if($kum_baru_34==0)
			{$da_bid_a0034_baru='';}else{$da_bid_a0034_baru=$kum_baru_34;}
			?>
			<td align="center"><?=$da_bid_a0034_lama?></td>
			<td align="center"><?=$da_bid_a0034_baru?></td>
			
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<?php
			$jml_baru_13_ok=0;
			$jml_baru_13_ok=$da_bid_a0032_baru;
			
			if($jml_baru_13_ok==0)
			{$jml_baru_13='';}else{$jml_baru_13=$jml_baru_13_ok;}
			?>
			<td align="center"><?=$jml_baru_13?></td>
		  </tr>
		  
		  <tr>
			<td colspan="2" rowspan="2" bgcolor="#CCCCCC">&nbsp;Jumlah Angka Kredit Diusulkan</td>
			<td bgcolor="#CCCCCC" align="center">&nbsp;</td>
			<?php
			//bidang a1
			$kum_lama_a1=0;
			$kum_baru_a1=0;
			$jumlah_a1=0;
			$sql_a1="SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$row_dos[no_usulan]'
						  AND a.`dupak_kategori_id` = '1'";
			$data_a1=mysqli_query($koneksi,$sql_a1);
			while($data_bid_a1=mysqli_fetch_array($data_a1))
			{
				$kum_lama_a1+=$data_bid_a1['kum_usulan_lama'];
				$kum_baru_a1+=$data_bid_a1['kum_usulan_baru'];
				$jumlah_a1+=$kum_lama_a1+$kum_baru_a1;
			}
			
			if($kum_lama_a1==0)
			{$da_bid_a1_lama='';}else{$da_bid_a1_lama=$kum_lama_a1;}
			
			if($kum_baru_a1==0)
			{$da_bid_a1_baru='';}else{$da_bid_a1_baru=$kum_baru_a1;}
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$da_bid_a1_baru?></td>
			<td bgcolor="#CCCCCC" >&nbsp;</td>
			<?php
			//bidang a2
			$kum_lama_a2=0;
			$kum_baru_a2=0;
			$jumlah_a2=0;
			$sql_a2="SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$row_dos[no_usulan]'
						  AND a.`dupak_kategori_id` = '2'";
			$data_a2=mysqli_query($koneksi,$sql_a2);
			while($data_bid_a2=mysqli_fetch_array($data_a2))
			{
				$kum_lama_a2+=$data_bid_a2['kum_usulan_lama'];
				$kum_baru_a2+=$data_bid_a2['kum_usulan_baru'];
				$jumlah_a2+=$kum_lama_a2+$kum_baru_a2;
			}
			
			if($kum_lama_a2==0)
			{$da_bid_a2_lama='';}else{$da_bid_a2_lama=$kum_lama_a2;}
			
			if($kum_baru_a2==0)
			{$da_bid_a2_baru='';}else{$da_bid_a2_baru=$kum_baru_a2;}
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$da_bid_a2_baru?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			
			<?php
			//bidang b
			$jml_kum_lama_bid_b=0;
			$jml_kum_baru_bid_b=0;
			$total_bid_b=0;
			
			$sql_total_bid_b="select *from usulan_dupaks where  usulan_no='$row_dos[no_usulan]' and left(dupak_no,1)='B'";
			$data_total_bid_b=mysqli_query($koneksi,$sql_total_bid_b);
			while($data_kum_total_bid_b=mysqli_fetch_array($data_total_bid_b))
			{
				$jml_kum_lama_bid_b+=$data_kum_total_bid_b['kum_usulan_lama'];
				$jml_kum_baru_bid_b+=$data_kum_total_bid_b['kum_usulan_baru'];
			}
			$total_bid_b=$jml_kum_lama_bid_b+$jml_kum_baru_bid_b;
			
			if($jml_kum_lama_bid_b==0)
			{$da_bid_b_lama='';}else{$da_bid_b_lama=$jml_kum_lama_bid_b;}
			
			if($jml_kum_baru_bid_b==0)
			{$da_bid_b_baru='';}else{$da_bid_b_baru=$jml_kum_baru_bid_b;}
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$da_bid_b_baru?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			
			<?php
			//bidang c
			$jml_kum_lama_bid_c=0;
			$jml_kum_baru_bid_c=0;
			$total_bid_c=0;
			
			$sql_total_bid_c="select *from usulan_dupaks where  usulan_no='$row_dos[no_usulan]' and left(dupak_no,1)='C'";
			$data_total_bid_c=mysqli_query($koneksi,$sql_total_bid_c);
			while($data_kum_total_bid_c=mysqli_fetch_array($data_total_bid_c))
			{
				$jml_kum_lama_bid_c+=$data_kum_total_bid_c['kum_usulan_lama'];
				$jml_kum_baru_bid_c+=$data_kum_total_bid_c['kum_usulan_baru'];
			}
			$total_bid_c=$jml_kum_lama_bid_c+$jml_kum_baru_bid_c;
			
			if($jml_kum_lama_bid_c==0)
			{$da_bid_c_lama='';}else{$da_bid_c_lama=$jml_kum_lama_bid_c;}
			
			if($jml_kum_baru_bid_c==0)
			{$da_bid_c_baru='';}else{$da_bid_c_baru=$jml_kum_baru_bid_c;}
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$da_bid_c_baru?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			
			<?php
			//bidang d
			$jml_kum_lama_bid_d=0;
			$jml_kum_baru_bid_d=0;
			$total_bid_d=0;
			
			$sql_total_bid_d="select *from usulan_dupaks where  usulan_no='$row_dos[no_usulan]' and left(dupak_no,1)='D'";
			$data_total_bid_d=mysqli_query($koneksi,$sql_total_bid_d);
			while($data_kum_total_bid_d=mysqli_fetch_array($data_total_bid_d))
			{
				$jml_kum_lama_bid_d+=$data_kum_total_bid_d['kum_usulan_lama'];
				$jml_kum_baru_bid_d+=$data_kum_total_bid_d['kum_usulan_baru'];
			}
			$total_bid_d=$jml_kum_lama_bid_d+$jml_kum_baru_bid_d;
			
			if($jml_kum_lama_bid_d==0)
			{$da_bid_d_lama='';}else{$da_bid_d_lama=$jml_kum_lama_bid_d;}
			
			if($jml_kum_baru_bid_d==0)
			{$da_bid_d_baru='';}else{$da_bid_d_baru=$jml_kum_baru_bid_d;}
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$da_bid_d_baru?></td>
			
			<td bgcolor="#CCCCCC">&nbsp;</td>
			
			<?php
			$jml_usul_ak_baru=0;
			$jml_usul_ak_baru=$da_bid_a1_baru+$da_bid_a2_baru+$da_bid_b_baru+$da_bid_c_baru+$da_bid_d_baru;
						
			if($jml_usul_ak_baru==0)
			{$ju_ak_baru='';}else{$ju_ak_baru=$jml_usul_ak_baru;}
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$ju_ak_baru?></td>
		  </tr>
		  <?php
			$ak_persen="SELECT
					  a.no,
					  a.jenjang_id_lama,
					  c.`nama_jabatans`,
					  c.`kum`,
					  d.`nama_jenjang`,
					  d.`ak`+10 AS ak_ijazah,
					  c.`pa`,
					  c.`pb`,
					  c.`pc`,
					  c.`pd`
					FROM
					  usulans AS a,
					  `jabatan_jenjangs` AS b,
					  jabatans AS c,
					  jenjangs AS d
					WHERE a.no = '$row_dos[no_usulan]'
					  AND a.jabatan_no = b.`jabatan_kode`
					  AND a.jenjang_id_lama = b.`jenjang_id`
					  AND b.`jabatan_kode` = c.`kode`
					  AND b.`jenjang_id` = d.`id`";
			$d_ak_persen=mysqli_query($koneksi,$ak_persen);
			$r_ak_persen=mysqli_fetch_array($d_ak_persen);
			$kali=$r_ak_persen['kum']-$r_ak_persen['ak_ijazah'];
			
			$pa=$r_ak_persen['pa']*0.01*$kali;
			$pb=$r_ak_persen['pb']*0.01*$kali;
			$pc=$r_ak_persen['pc']*0.01*$kali;
			$pd=$r_ak_persen['pd']*0.01*$kali;
			$jp=$r_ak_persen['ak_ijazah']+$pa+$pb+$pc+$pd;
		  ?>
		  <tr>
		    <?php 
				if($r_ak_persen['ak_ijazah']==0)
				{$nilai_ijazah='';}else{$nilai_ijazah=$r_ak_persen['ak_ijazah'];}	
			?>
			<td bgcolor="#CCCCCC"  align="center"><?=$nilai_ijazah;?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<?php 
				if($pa==0)
				{$nilai_pa='';}else{$nilai_pa=$pa;}	
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$nilai_pa?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<?php 
				if($pb==0)
				{$nilai_pb='';}else{$nilai_pb=$pb;}	
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$nilai_pb?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<?php 
				if($pc==0)
				{$nilai_pc='';}else{$nilai_pc=$pc;}	
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$nilai_pc?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<?php 
				if($pd==0)
				{$nilai_pd='';}else{$nilai_pd=$pd;}	
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$nilai_pd?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<?php 
				if($jp==0)
				{$nilai_jp='';}else{$nilai_jp=$jp;}	
			?>
			<td bgcolor="#CCCCCC" align="center"><?=$nilai_jp?></td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
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
			?>
		  <?php
			$jml_k=0;
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
			$ka=$r_persen['pa']*0.01*$kebutuhan;
			$kb=$r_persen['pb']*0.01*$kebutuhan;
			$kc=$r_persen['pc']*0.01*$kebutuhan;
			$kd=$r_persen['pd']*0.01*$kebutuhan;
			$jml_k=$ka+$kb+$kc+$kd;
			?>
		  <tr>
			<td colspan="2" rowspan="2">&nbsp;Jumlah Angka Kredit Dibutuhkan</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center"><?=$ka?></td>
			<td>&nbsp;</td>
			<td align="center"><?=$kb?></td>
			<td>&nbsp;</td>
			<td align="center"><?=$kc?></td>
			<td>&nbsp;</td>
			<td align="center"><?=$kd?></td>
			<td align="center"><?=$r_ak_baru['kum']?></td>
			<td align="center"><?=$dasar?></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="2" rowspan="2" bgcolor="#CCCCCC">&nbsp;Jumlah Angka Kredit yang lalu</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
		  </tr>
		  <tr>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
			<td bgcolor="#CCCCCC">&nbsp;</td>
		  </tr>
		</table>

		</div>



		</div>
		</div>
		</div>
		</div>
</div>
</div>
<?php } ?>
						


                        
