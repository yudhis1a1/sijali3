<?php
error_reporting(0);
include "koneksi.php";
?>
<div class="row">    
                                         
                               
                             
<table class="cust-table cust-table-bordered">

<col width="30" span="5" />
				<col width="309" />
				<col width="61" span="2" />
				<col width="75" />
				<col width="61" span="2" />
				<col width="75" />
				<col width="100" />

		<thead>
		  <tr class="text-center">
			<th rowspan="4" class="text-center" style="white-space: nowrap">NO.</th>
			<th colspan="11" class="text-center">UNSUR YANG DINILAI</th>
			<th rowspan="4" class="text-center" style="white-space: nowrap">
			AKSI
			</th>
		  </tr>
		  <tr class="text-center">
			<th colspan="5" rowspan="3" class="text-center" style="white-space: nowrap">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</th>
			<th colspan="6" class="text-center">ANGKA KREDIT MENURUT</th>
		  </tr>
		  <tr>
			<th colspan="3" class="text-center">INSTANSI PENGUSUL</th>
			<th colspan="3" class="text-center">TIM PENILAI</th>
		  </tr>
		  <tr>
			<th class="text-center">LAMA</th>
			<th class="text-center">BARU</th>
			<th class="text-center">JUMLAH</th>
			<th class="text-center">LAMA</th>
			<th class="text-center">BARU</th>
			<th class="text-center">JUMLAH</th>
		  </tr>
		  <tr>
			<th class="text-center">1</th>
			<th colspan="5" class="text-center">2</th>
			<th class="text-center">3</th>
			<th class="text-center">4</th>
			<th class="text-center">5</th>
			<th class="text-center">6</th>
			<th class="text-center">7</th>
			<th class="text-center">8</th>
			<th class="text-center">9</th>
		  </tr>
		</thead>
		<tbody>
		<tr class="text-center">
		<td rowspan="31">IV</td>
		<td colspan="5" class="text-left">PELAKSANAAN PENGABDIAN KEPADA MASYARAKAT</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<tr class="text-center">
		<td rowspan="4">A</td>
		<td colspan="4" class="text-left">Menduduki jabatan pimpinan</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<?php
		$sql_c0001="select *from usulan_dupaks where dupak_no='c0001' and usulan_no='$no'";
		$data_c0001=mysqli_query($koneksi,$sql_c0001);
		$data_bid_c_c0001=mysqli_fetch_array($data_c0001);
		$jumlah_c0001=$data_bid_c_c0001['kum_usulan_lama']+$data_bid_c_c0001['kum_usulan_baru'];
		$kum_nilai_c0001=$data_bid_c_c0001['kum_penilai_lama']+$data_bid_c_c0001['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0001="select *from usulan_dupak_details where dupak_no='C0001' and usulan_no='$no'";
		  $da_C0001=mysqli_query($koneksi,$cek_C0001);
		  $r_C0001=mysqli_fetch_array($da_C0001);
		  
		  if($r_C0001['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		  ?>
		<tr bgcolor="<?= $warna ?>"  id="trc1">
		<td rowspan="3">1</td>
		<td colspan="3" rowspan="3" class="text-left">Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya</td>
		<td rowspan="3" style="white-space: nowrap"><?=$data_bid_c_c0001['kum_usulan_lama'];?></td>
		<td rowspan="3" style="white-space: nowrap"><?=$data_bid_c_c0001['kum_usulan_baru']?></td>
		<td rowspan="3" style="white-space: nowrap"><?= $jumlah_c0001 ;?></td>
		<td rowspan="3" style="white-space: nowrap"><?=$data_bid_c_c0001['kum_penilai_lama']?></td>
		<td rowspan="3" style="white-space: nowrap"><?=$data_bid_c_c0001['kum_penilai_baru']?></td>
		<td rowspan="3" style="white-space: nowrap"><?=$kum_nilai_c0001?></td>
		<td rowspan="3" style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0001['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0001" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0001" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="1"><i class=" fa fa-plus-square"></i></a>
                             <div id="div1" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0001['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0001['user_val']?></p></div>
                             
                            
                               
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0001['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<tr>
		</tr>
		<tr>
		</tr>
		<tr class="text-center">
		<td rowspan="3">B</td>
		<td colspan="4" class="text-left">Melaksankan pengembangan hasil pendidikan dan penelitian</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<?php
		$sql_c0002="select *from usulan_dupaks where dupak_no='c0002' and usulan_no='$no'";
		$data_c0002=mysqli_query($koneksi,$sql_c0002);
		$data_bid_c_c0002=mysqli_fetch_array($data_c0002);
		$jumlah_c0002=$data_bid_c_c0002['kum_usulan_lama']+$data_bid_c_c0002['kum_usulan_baru'];
		$kum_nilai_c0002=$data_bid_c_c0002['kum_penilai_lama']+$data_bid_c_c0002['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0002="select *from usulan_dupak_details where dupak_no='C0002' and usulan_no='$no'";
		  $da_C0002=mysqli_query($koneksi,$cek_C0002);
		  $r_C0002=mysqli_fetch_array($da_C0002);
		  
		  if($r_C0002['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		  ?>
		<tr bgcolor="<?= $warna ?>"  id="trc2">
		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Melaksanakan pengembangan hasil pendidikan dan penelitian yang dapat dimanfaatkan oleh
		masyarakat</td>
		<td rowspan="2" style="white-space: nowrap"><?=$data_bid_c_c0002['kum_usulan_lama'];?></td>
		<td rowspan="2" style="white-space: nowrap"><?=$data_bid_c_c0002['kum_usulan_baru']?></td>
		<td rowspan="2" style="white-space: nowrap"><?= $jumlah_c0002 ;?></td>
		<td rowspan="2" style="white-space: nowrap"><?=$data_bid_c_c0002['kum_penilai_lama']?></td>
		<td rowspan="2" style="white-space: nowrap"><?=$data_bid_c_c0002['kum_penilai_baru']?></td>
		<td rowspan="2" style="white-space: nowrap"><?=$kum_nilai_c0002?></td>
		<td rowspan="2" style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0002['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0002" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0002" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="2"><i class=" fa fa-plus-square"></i></a>
                             <div id="div2" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0002['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0002['user_val']?></p></div>
                             
                            
                              
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0002['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<tr>
		</tr>
		<tr class="text-center">
		<td rowspan="11">C</td>
		<td colspan="4" class="text-left">Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<tr class="text-center">
		<td rowspan="10">1</td>
		<td colspan="3" class="text-left">Terjadwal/terprogram</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<tr class="text-center">
		<td rowspan="4">a.</td>
		<td colspan="2" class="text-left">Dalam satu semester atau lebih</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<?php
		$sql_c0003="select *from usulan_dupaks where dupak_no='c0003' and usulan_no='$no'";
		$data_c0003=mysqli_query($koneksi,$sql_c0003);
		$data_bid_c_c0003=mysqli_fetch_array($data_c0003);
		$jumlah_c0003=$data_bid_c_c0003['kum_usulan_lama']+$data_bid_c_c0003['kum_usulan_baru'];
		$kum_nilai_c0003=$data_bid_c_c0003['kum_penilai_lama']+$data_bid_c_c0003['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0003="select *from usulan_dupak_details where dupak_no='C0003' and usulan_no='$no'";
		  $da_C0003=mysqli_query($koneksi,$cek_C0003);
		  $r_C0003=mysqli_fetch_array($da_C0003);
		  
		  if($r_C0003['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc3">
		<td>1)</td>
		<td class="text-left">Tingkat internasional</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0003['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0003['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0003 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0003['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0003['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0003?></td>
		<td style="white-space: nowrap">
		
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0003['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0003" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0003" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="3"><i class=" fa fa-plus-square"></i></a>
                             <div id="div3" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0003['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0003['user_val']?></p></div>
                             
                            
                               
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0003['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<?php
		$sql_c0004="select *from usulan_dupaks where dupak_no='c0004' and usulan_no='$no'";
		$data_c0004=mysqli_query($koneksi,$sql_c0004);
		$data_bid_c_c0004=mysqli_fetch_array($data_c0004);
		$jumlah_c0004=$data_bid_c_c0004['kum_usulan_lama']+$data_bid_c_c0004['kum_usulan_baru'];
		$kum_nilai_c0004=$data_bid_c_c0004['kum_penilai_lama']+$data_bid_c_c0004['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0004="select *from usulan_dupak_details where dupak_no='C0004' and usulan_no='$no'";
		  $da_C0004=mysqli_query($koneksi,$cek_C0004);
		  $r_C0004=mysqli_fetch_array($da_C0004);
		  
		  if($r_C0004['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>"  id="trc4">
		<td>2)</td>
		<td class="text-left">Tingkat nasional</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0004['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0004['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0004 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0004['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0004['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0004?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0004['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0004" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0004" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="4"><i class=" fa fa-plus-square"></i></a>
                             <div id="div4" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0004['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0004['user_val']?></p></div>
                             
                            
                               
								<?php } ?>	
								<input type="hidden" value="<?=$data_bid_c_c0004['valid']?>" name="cwarna" >
		</td>
		</tr>
		<?php
		$sql_c0005="select *from usulan_dupaks where dupak_no='c0005' and usulan_no='$no'";
		$data_c0005=mysqli_query($koneksi,$sql_c0005);
		$data_bid_c_c0005=mysqli_fetch_array($data_c0005);
		$jumlah_c0005=$data_bid_c_c0005['kum_usulan_lama']+$data_bid_c_c0005['kum_usulan_baru'];
		$kum_nilai_c0005=$data_bid_c_c0005['kum_penilai_lama']+$data_bid_c_c0005['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0005="select *from usulan_dupak_details where dupak_no='C0005' and usulan_no='$no'";
		  $da_C0005=mysqli_query($koneksi,$cek_C0005);
		  $r_C0005=mysqli_fetch_array($da_C0005);
		  
		  if($r_C0005['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>"  id="trc5">
		<td>3)</td>
		<td class="text-left">Tingkat lokal</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0005['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0005['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0005 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0005['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0005['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0005?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0005['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0005" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0005" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="5"><i class=" fa fa-plus-square"></i></a>
                             <div id="div5" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0005['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0005['user_val']?></p></div>
                             
                            
                               
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0005['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<tr class="text-center">
		<td rowspan="5">b.</td>
		<td colspan="2" class="text-left">Kurang dari satu semester dan minimal satu bulan</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<?php
		$sql_c0006="select *from usulan_dupaks where dupak_no='c0006' and usulan_no='$no'";
		$data_c0006=mysqli_query($koneksi,$sql_c0006);
		$data_bid_c_c0006=mysqli_fetch_array($data_c0006);
		$jumlah_c0006=$data_bid_c_c0006['kum_usulan_lama']+$data_bid_c_c0006['kum_usulan_baru'];
		$kum_nilai_c0006=$data_bid_c_c0006['kum_penilai_lama']+$data_bid_c_c0006['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0006="select *from usulan_dupak_details where dupak_no='C0006' and usulan_no='$no'";
		  $da_C0006=mysqli_query($koneksi,$cek_C0006);
		  $r_C0006=mysqli_fetch_array($da_C0006);
		  
		  if($r_C0006['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc6">
		<td>1)</td>
		<td class="text-left">Tingkat internasional</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0006['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0006['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0006 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0006['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0006['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0006?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0006['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0006" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0006" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="6"><i class=" fa fa-plus-square"></i></a>
                             <div id="div6" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0006['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0006['user_val']?></p></div>
                             
                            
                               
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0006['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<?php
		$sql_c0007="select *from usulan_dupaks where dupak_no='c0007' and usulan_no='$no'";
		$data_c0007=mysqli_query($koneksi,$sql_c0007);
		$data_bid_c_c0007=mysqli_fetch_array($data_c0007);
		$jumlah_c0007=$data_bid_c_c0007['kum_usulan_lama']+$data_bid_c_c0007['kum_usulan_baru'];
		$kum_nilai_c0007=$data_bid_c_c0007['kum_penilai_lama']+$data_bid_c_c0007['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0007="select *from usulan_dupak_details where dupak_no='C0007' and usulan_no='$no'";
		  $da_C0007=mysqli_query($koneksi,$cek_C0007);
		  $r_C0007=mysqli_fetch_array($da_C0007);
		  
		  if($r_C0007['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc7">
		<td>2)</td>
		<td class="text-left">Tingkat nasional</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0007['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0007['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0007 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0007['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0007['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0007?></td>
		<td style="white-space: nowrap">
		
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0007['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0007" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0007" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="7"><i class=" fa fa-plus-square"></i></a>
                             <div id="div7" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0007['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0007['user_val']?></p></div>
                             
                            
                               
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0007['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<?php
		$sql_c0008="select *from usulan_dupaks where dupak_no='c0008' and usulan_no='$no'";
		$data_c0008=mysqli_query($koneksi,$sql_c0008);
		$data_bid_c_c0008=mysqli_fetch_array($data_c0008);
		$jumlah_c0008=$data_bid_c_c0008['kum_usulan_lama']+$data_bid_c_c0008['kum_usulan_baru'];
		$kum_nilai_c0008=$data_bid_c_c0008['kum_penilai_lama']+$data_bid_c_c0008['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0008="select *from usulan_dupak_details where dupak_no='C0008' and usulan_no='$no'";
		  $da_C0008=mysqli_query($koneksi,$cek_C0008);
		  $r_C0008=mysqli_fetch_array($da_C0008);
		  
		  if($r_C0008['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc8">
		<td>3)</td>
		<td class="text-left">Tingkat lokal</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0008['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0008['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0008 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0008['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0008['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0008?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0008['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0008" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0008" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="8"><i class=" fa fa-plus-square"></i></a>
                             <div id="div8" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0008['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0008['user_val']?></p></div>
                             
                            
                           
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0008['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<?php
		$sql_c0009="select *from usulan_dupaks where dupak_no='c0009' and usulan_no='$no'";
		$data_c0009=mysqli_query($koneksi,$sql_c0009);
		$data_bid_c_c0009=mysqli_fetch_array($data_c0009);
		$jumlah_c0009=$data_bid_c_c0009['kum_usulan_lama']+$data_bid_c_c0009['kum_usulan_baru'];
		$kum_nilai_c0009=$data_bid_c_c0009['kum_penilai_lama']+$data_bid_c_c0009['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0009="select *from usulan_dupak_details where dupak_no='C0009' and usulan_no='$no'";
		  $da_C0009=mysqli_query($koneksi,$cek_C0009);
		  $r_C0009=mysqli_fetch_array($da_C0009);
		  
		  if($r_C0009['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc9">
		<td>4)</td>
		<td class="text-left">Insidental</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0009['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0009['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0009 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0009['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0009['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0009?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0009['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0009" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0009" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="9"><i class=" fa fa-plus-square"></i></a>
                             <div id="div9" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0009['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0009['user_val']?></p></div>
                             
                            
                               
								<?php } ?>	
								<input type="hidden" value="<?=$data_bid_c_c0009['valid']?>" name="cwarna" >
		</td>
		</tr>
		<tr class="text-center">
		<td rowspan="5">D</td>
		<td colspan="4" rowspan="2" class="text-left">Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas
		umum pemerintah dan pembangunan</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		</tr>
		<tr>
		</tr>
		<?php
		$sql_c0010="select *from usulan_dupaks where dupak_no='c0010' and usulan_no='$no'";
		$data_c0010=mysqli_query($koneksi,$sql_c0010);
		$data_bid_c_c0010=mysqli_fetch_array($data_c0010);
		$jumlah_c0010=$data_bid_c_c0010['kum_usulan_lama']+$data_bid_c_c0010['kum_usulan_baru'];
		$kum_nilai_c0010=$data_bid_c_c0010['kum_penilai_lama']+$data_bid_c_c0010['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0010="select *from usulan_dupak_details where dupak_no='C0010' and usulan_no='$no'";
		  $da_C0010=mysqli_query($koneksi,$cek_C0010);
		  $r_C0010=mysqli_fetch_array($da_C0010);
		  
		  if($r_C0010['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc10">
		<td>1</td>
		<td colspan="3" class="text-left">Berdasarkan bidang keahlian</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0010['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0010['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0010 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0010['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0010['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0010?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0010['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0010" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0010" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="10"><i class=" fa fa-plus-square"></i></a>
                             <div id="div10" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0010['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0010['user_val']?></p></div>
                             
                            
                              
								<?php } ?>	
								<input type="hidden" value="<?=$data_bid_c_c0010['valid']?>" name="cwarna" >
		</td>
		</tr>
		<?php
		$sql_c0011="select *from usulan_dupaks where dupak_no='c0011' and usulan_no='$no'";
		$data_c0011=mysqli_query($koneksi,$sql_c0011);
		$data_bid_c_c0011=mysqli_fetch_array($data_c0011);
		$jumlah_c0011=$data_bid_c_c0011['kum_usulan_lama']+$data_bid_c_c0011['kum_usulan_baru'];
		$kum_nilai_c0011=$data_bid_c_c0011['kum_penilai_lama']+$data_bid_c_c0011['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0011="select *from usulan_dupak_details where dupak_no='C0011' and usulan_no='$no'";
		  $da_C0011=mysqli_query($koneksi,$cek_C0011);
		  $r_C0011=mysqli_fetch_array($da_C0011);
		  
		  if($r_C0011['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc11">
		<td>2</td>
		<td colspan="3" class="text-left">Berdasarkan penugasan lembaga perguruan tinggi</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0011['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0011['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0011 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0011['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0011['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0011?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0011['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0011" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0011" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="11"><i class=" fa fa-plus-square"></i></a>
                             <div id="div11" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0011['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0011['user_val']?></p></div>
                             
                            
                               
								<?php } ?>	
								<input type="hidden" value="<?=$data_bid_c_c0011['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<?php
		$sql_c0012="select *from usulan_dupaks where dupak_no='c0012' and usulan_no='$no'";
		$data_c0012=mysqli_query($koneksi,$sql_c0012);
		$data_bid_c_c0012=mysqli_fetch_array($data_c0012);
		$jumlah_c0012=$data_bid_c_c0012['kum_usulan_lama']+$data_bid_c_c0012['kum_usulan_baru'];
		$kum_nilai_c0012=$data_bid_c_c0012['kum_penilai_lama']+$data_bid_c_c0012['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0012="select *from usulan_dupak_details where dupak_no='C0012' and usulan_no='$no'";
		  $da_C0012=mysqli_query($koneksi,$cek_C0012);
		  $r_C0012=mysqli_fetch_array($da_C0012);
		  
		  if($r_C0012['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc12">
		<td>3</td>
		<td colspan="3" class="text-left">Berdasarkan fungsi / jabatan</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0012['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0012['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0012 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0012['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0012['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0012?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0012['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0012" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0012" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="12"><i class=" fa fa-plus-square"></i></a>
                             <div id="div12" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0012['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0012['user_val']?></p></div>
                             
                            
                               
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0012['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<?php
		$sql_c0013="select *from usulan_dupaks where dupak_no='c0013' and usulan_no='$no'";
		$data_c0013=mysqli_query($koneksi,$sql_c0013);
		$data_bid_c_c0013=mysqli_fetch_array($data_c0013);
		$jumlah_c0013=$data_bid_c_c0013['kum_usulan_lama']+$data_bid_c_c0013['kum_usulan_baru'];
		$kum_nilai_c0013=$data_bid_c_c0013['kum_penilai_lama']+$data_bid_c_c0013['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0013="select *from usulan_dupak_details where dupak_no='C0013' and usulan_no='$no'";
		  $da_C0013=mysqli_query($koneksi,$cek_C0013);
		  $r_C0013=mysqli_fetch_array($da_C0013);
		  
		  if($r_C0013['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc13">
		<td rowspan="1">E</td>
		<td colspan="4" class="text-left">Membuat/ menulis karya pengabdian</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0013['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0013['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0013 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0013['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0013['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0013?></td>
		<td>
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0013['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0013" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0013" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="13"><i class=" fa fa-plus-square"></i></a>
                             <div id="div13" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0013['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0013['user_val']?></p></div>
                             
                            
                              
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0013['valid']?>" name="cwarna" >	
		</td>
		</tr>
		<?php
		$sql_c0014="select *from usulan_dupaks where dupak_no='c0014' and usulan_no='$no'";
		$data_c0014=mysqli_query($koneksi,$sql_c0014);
		$data_bid_c_c0014=mysqli_fetch_array($data_c0014);
		$jumlah_c0014=$data_bid_c_c0014['kum_usulan_lama']+$data_bid_c_c0014['kum_usulan_baru'];
		$kum_nilai_c0014=$data_bid_c_c0014['kum_penilai_lama']+$data_bid_c_c0014['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0014="select *from usulan_dupak_details where dupak_no='C0014' and usulan_no='$no'";
		  $da_C0014=mysqli_query($koneksi,$cek_C0014);
		  $r_C0014=mysqli_fetch_array($da_C0014);
		  
		  if($r_C0014['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc14">
		<td>F</td>
		<td colspan="4" class="text-left">Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala/jurnal pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0014['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0014['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0014 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0014['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0014['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0014?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0014['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0014" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0014" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="14"><i class=" fa fa-plus-square"></i></a>
                             <div id="div14" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0014['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0014['user_val']?></p></div>
                             
                            
                               
								<?php } ?>
								<input type="hidden" value="<?=$data_bid_c_c0014['valid']?>" name="cwarna" >	
		</td>
		</tr>

		<tr class="text-center">
		<td rowspan="5">G</td>
		<td colspan="4" rowspan="2" class="text-left">Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun)*</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		</tr>
		<tr>
		</tr>
		<?php
		$sql_c0015="select *from usulan_dupaks where dupak_no='c0015' and usulan_no='$no'";
		$data_c0015=mysqli_query($koneksi,$sql_c0015);
		$data_bid_c_c0015=mysqli_fetch_array($data_c0015);
		$jumlah_c0015=$data_bid_c_c0015['kum_usulan_lama']+$data_bid_c_c0015['kum_usulan_baru'];
		$kum_nilai_c0015=$data_bid_c_c0015['kum_penilai_lama']+$data_bid_c_c0015['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0015="select *from usulan_dupak_details where dupak_no='C0015' and usulan_no='$no'";
		  $da_C0015=mysqli_query($koneksi,$cek_C0015);
		  $r_C0015=mysqli_fetch_array($da_C0015);
		  
		  if($r_C0015['kunci']=='1')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc15">
		<td>1</td>
		<td colspan="3" class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0015['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0015['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0015 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0015['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0015['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0015?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0015['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0015" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0015" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="15"><i class=" fa fa-plus-square"></i></a>
                             <div id="div15" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0015['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0015['user_val']?></p></div>
                             
                            
                               
								<?php } ?>	
								<input type="hidden" value="<?=$data_bid_c_c0015['valid']?>" name="cwarna" >
		</td>
		</tr>
		<?php
		$sql_c0016="select *from usulan_dupaks where dupak_no='c0016' and usulan_no='$no'";
		$data_c0016=mysqli_query($koneksi,$sql_c0016);
		$data_bid_c_c0016=mysqli_fetch_array($data_c0016);
		$jumlah_c0016=$data_bid_c_c0016['kum_usulan_lama']+$data_bid_c_c0016['kum_usulan_baru'];
		$kum_nilai_c0016=$data_bid_c_c0016['kum_penilai_lama']+$data_bid_c_c0016['kum_penilai_baru'];
		?>
		<?php
		  $cek_C0016="select *from usulan_dupak_details where dupak_no='C0016' and usulan_no='$no'";
		  $da_C0016=mysqli_query($koneksi,$cek_C0016);
		  $r_C0016=mysqli_fetch_array($da_C0016);
		  
		  if($r_C0016['kunci']=='16')
		  {
			$warna="#00FF00";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr bgcolor="<?= $warna ?>" id="trc16">
		<td>2</td>
		<td colspan="3" class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah nasional</td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0016['kum_usulan_lama'];?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0016['kum_usulan_baru']?></td>
		<td style="white-space: nowrap"><?= $jumlah_c0016 ;?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0016['kum_penilai_lama']?></td>
		<td style="white-space: nowrap"><?=$data_bid_c_c0016['kum_penilai_baru']?></td>
		<td style="white-space: nowrap"><?=$kum_nilai_c0016?></td>
		<td style="white-space: nowrap">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
			<?php if ($data_bid_c_c0016['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') { 
			
			?>
		<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?=$no ?>/C0016" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
		<a data-target="#myModal-C0016" data-toggle="modal" class="btn btn-xs btn-danger"  ><i class=" fa fa-window-close-o"></i></a>

                             <a class="showSingle buttons" target="16"><i class=" fa fa-plus-square"></i></a>
                             <div id="div16" class="targetDivC" style="display:none;"><p><?=$data_bid_c_c0016['keterangan']?></p>
                            <p><b>PIC: </b><?=$data_bid_c_c0016['user_val']?></p></div>
                             
                            
                            
								<?php } ?>	
								<input type="hidden" value="<?=$data_bid_c_c0016['valid']?>" name="cwarna" >
		</td>
		</tr>

		<?php
		$sql_total="SELECT
					  SUM(`kum_usulan_lama`) AS kum_lama,
					  SUM(`kum_usulan_baru`) AS kum_baru,
					  SUM(`kum_penilai_lama`) AS kum_penilai_lama,
					  SUM(`kum_penilai_baru`) AS kum_penilai_baru
					FROM
					  usulan_dupaks
					WHERE usulan_no = '$no'
					  AND LEFT(dupak_no, 1) = 'C'";
		$data_total=mysqli_query($koneksi,$sql_total);
		$data_kum_total=mysqli_fetch_array($data_total);
		$jmlah_kum=$data_kum_total['kum_lama']+$data_kum_total['kum_baru'];
		$jmlah_kum_penilai=$data_kum_total['kum_penilai_lama']+$data_kum_total['kum_penilai_baru'];
		?>
		<tr>
		</tr>
		<tr style="background-color: #e4e4e4; font-weight: bold;">
		<td colspan="6" class="text-right"><b>JUMLAH BIDANG C</b></td>
		<td style="white-space: nowrap" class="text-center"><?=$data_kum_total['kum_lama']?></td>
		<td style="white-space: nowrap" class="text-center"><?=$data_kum_total['kum_baru']?></td>
		<td style="white-space: nowrap" class="text-center"><?=$jmlah_kum?></td>
		<td style="white-space: nowrap" class="text-center"><?=$data_kum_total['kum_penilai_lama']?></td>
		<td style="white-space: nowrap" class="text-center"><?=$data_kum_total['kum_penilai_baru']?></td>
		<td style="white-space: nowrap" class="text-center"><?=$jmlah_kum_penilai?></td>
		<td></td>
		</tr>
                </tbody>
            </table>
        </div>
     

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript">

 wxc=[];
wrc=[];

var trcIDs = ["trc1", "trc2", "trc3", "trc4", "trc5", "trc6", "trc7", "trc8", "trc9", "trc10", "trc11", "trc12", "trc13", "trc14", "trc15", "trc16"];
  
//var trcIDs = document.getElementsById("trc");


$("input[name='cwarna']").each(function() {
	wxc.push($(this).val())
}); 
for ( i = 0 ; i < trcIDs.length; i++){
    wrc[i] = wxc[i] == "200"?"rgba(0, 204, 255, .6)":wxc[i] == "400"?"rgba(255, 0, 0, .5)" :"" ;
	 document.getElementById(trcIDs[i]).style.backgroundColor = wrc[i];

  }; 

</script>
<script>
  $(function() {
  $('.showSingle').click(function() {
    $('.targetDivC').not('#div' + $(this).attr('target')).hide();
    $('#div' + $(this).attr('target')).toggle();
  });
});
</script>

<?php  

foreach($qrc_dupak as $rdc)
{


?>
<!-- Modal -->
<form  method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_dupax/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
<div id="myModal-<?=$rdc->dupak_no?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Validasi Berkas</h4>
      </div>
      <div class="modal-body">
      <input type="hidden" name="nodupak" value="<?=$rdc->dupak_no?>"/>
      <p><label for="keterangan">Keterangan</label></p>
        <textarea name="keterangan"rows="4" cols="50"  required />
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>

</form>

<?php } ?>