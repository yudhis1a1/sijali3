<?php
include "koneksi.php";
?>



                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Usulan JAD : 
						<?php
						if($usulan_status_id =='1')
						{
							echo "Draft";
						}elseif($usulan_status_id =='2')
						{
							echo "Draft Revisi";
						}elseif($usulan_status_id =='3')
						{
							echo "Usulan Baru";
						}elseif($usulan_status_id =='4')
						{
							echo "Proses Approval Tim Penilai";
						}elseif($usulan_status_id =='5')
						{
							echo "Proses Penilaian";
						}elseif($usulan_status_id =='6')
						{
							echo "Proses Operator Ketenagaan";
						}elseif($usulan_status_id =='7')
						{
							echo "Proses Dikti";
						}elseif($usulan_status_id =='8')
						{
							echo "Proses Operator Kepegawaian";
						}else
						{
							echo "Selesai";
						}
						?>
                    </div>
                 </div>

                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $judul; ?></h4>
                                <h6 class="card-subtitle"><?php echo $data_dasar->nip; ?> </code></h6>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link "  href="<?= base_url()?>penilai/penilai/penilaian/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link " href="<?= base_url()?>penilai/penilai/show_matakul/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/show_pendidikan/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
                                    
									<li class="nav-item"> 
										<a class="nav-link " href="<?= base_url()?>penilai/penilai/bidangA/<?php echo $no; ?>">
										<span class="hidden-sm-up">
											<i class="ti-agenda"></i>
										</span> 
										<span class="hidden-xs-down">Bidang A</span>
										</a> 
									</li>
                                    
									<li class="nav-item"> 
										<a class="nav-link "  href="<?= base_url()?>penilai/penilai/bidangB/<?php echo $no; ?>" >
										<span class="hidden-sm-up">
											<i class="ti-agenda "></i>
										</span> 
										<span class="hidden-xs-down">Bidang B</span>
										</a> 
									</li>
                                    
									<li class="nav-item"> 
										<a class="nav-link active"  href="<?= base_url()?>penilai/penilai/bidangC/<?php echo $no; ?>" >
										<span class="hidden-sm-up">
											<i class="ti-agenda "></i>
										</span> 
										<span class="hidden-xs-down">Bidang C</span>
										</a> 
									</li>
									
									<li class="nav-item"> 
										<a class="nav-link "  href="<?= base_url()?>penilai/penilai/bidangD/<?php echo $no; ?>" >
										<span class="hidden-sm-up">
											<i class="ti-agenda "></i>
										</span> 
										<span class="hidden-xs-down">Bidang D</span>
										</a> 
									</li>
									
                                    
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/persyaratan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
                                  
                            
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                <?php $no_usulan=$data_dasar->no; ?>
                                    <div class="tab-pane active p-20" id="dasar" role="tabpanel" >

            <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Bidang C</h4>
                            </div>
                         <div class="card-body">                              
                               <h4 class="card-title"></h4>
                               
                                <div class="row">    
                    
                                                     
                               
<!--<table  class="ui celled table">
<tr>
	<td>
	<center>
	<a href="<?= base_url()?>penilai/penilai_dupak_c/print_bidangc/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> BIDANG C</a>
	<a href="<?= base_url()?>penilai/penilai/print_dupak/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> PRINT DUPAK</a>
	</center>
	</td>
</tr>
</table>  -->    
<div class="table-responsive m-t-40">                  
    <table class="table color-table info-table table-bordered">

		<col width="30" span="5" />
		<col width="309" />
		<col width="61" span="2" />
		<col width="75" />
		<col width="61" span="2" />
		<col width="75" />
		<col width="88" />

		<thead>
		  <tr class="text-center">
			<th rowspan="4" class="text-center" style="vertical-align: middle;">NO.</th>
			<th colspan="11" class="text-center">UNSUR YANG DINILAI</th>
			<th rowspan="4" class="text-center" style="vertical-align: middle;">
			AKSI
			</th>
		  </tr>
		  <tr class="text-center">
			<th colspan="5" rowspan="3" class="text-center" style="vertical-align: middle;">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</th>
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
		  $cek_C0001="select *from usulan_dupak_details where dupak_no='C0001' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0001=mysqli_query($koneksi,$cek_C0001);
		  $r_C0001=mysqli_fetch_array($da_C0001);
		  
		  if($r_C0001['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0001['kunci']=='0')
		  {
			  $warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		  ?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td rowspan="3">1</td>
		<td colspan="3" rowspan="3" class="text-left">Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya</td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_c_c0001['kum_usulan_lama'];?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_c_c0001['kum_usulan_baru']?></td>
		<td rowspan="3" style="vertical-align: middle;"><?= $jumlah_c0001 ;?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_c_c0001['kum_penilai_lama']?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_c_c0001['kum_penilai_baru']?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$kum_nilai_c0001?></td>
		<td rowspan="3" style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
				
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
		  $cek_C0002="select *from usulan_dupak_details where dupak_no='C0002' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0002=mysqli_query($koneksi,$cek_C0002);
		  $r_C0002=mysqli_fetch_array($da_C0002);
		  
		  if($r_C0002['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0002['kunci']=='0')
		  {
			  $warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		  ?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Melaksanakan pengembangan hasil pendidikan dan penelitian yang dapat dimanfaatkan oleh
		masyarakat</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_c_c0002['kum_usulan_lama'];?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_c_c0002['kum_usulan_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?= $jumlah_c0002 ;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_c_c0002['kum_penilai_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_c_c0002['kum_penilai_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_c0002?></td>
		<td rowspan="2" style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0003="select *from usulan_dupak_details where dupak_no='C0003' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0003=mysqli_query($koneksi,$cek_C0003);
		  $r_C0003=mysqli_fetch_array($da_C0003);
		  
		  if($r_C0003['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0003['kunci']=='0')
		  {
			  $warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>1)</td>
		<td class="text-left">Tingkat internasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0003['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0003['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0003 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0003['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0003['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0003?></td>
		<td style="vertical-align: middle;">
		
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0004="select *from usulan_dupak_details where dupak_no='C0004' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0004=mysqli_query($koneksi,$cek_C0004);
		  $r_C0004=mysqli_fetch_array($da_C0004);
		  
		  if($r_C0004['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0004['kunci']=='0')
		  {
			$warna="fd8888";
		  }else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>2)</td>
		<td class="text-left">Tingkat nasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0004['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0004['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0004 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0004['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0004['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0004?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0005="select *from usulan_dupak_details where dupak_no='C0005' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0005=mysqli_query($koneksi,$cek_C0005);
		  $r_C0005=mysqli_fetch_array($da_C0005);
		  
		  if($r_C0005['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0005['kunci']=='0')
		  {
			  $warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>3)</td>
		<td class="text-left">Tingkat lokal</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0005['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0005['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0005 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0005['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0005['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0005?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0006="select *from usulan_dupak_details where dupak_no='C0006' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0006=mysqli_query($koneksi,$cek_C0006);
		  $r_C0006=mysqli_fetch_array($da_C0006);
		  
		  if($r_C0006['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0006['kunci']=='0')
		  {
			  $warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>1)</td>
		<td class="text-left">Tingkat internasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0006['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0006['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0006 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0006['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0006['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0006?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0007="select *from usulan_dupak_details where dupak_no='C0007' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0007=mysqli_query($koneksi,$cek_C0007);
		  $r_C0007=mysqli_fetch_array($da_C0007);
		  
		  if($r_C0007['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0007['kunci']=='0')
		  {
			  $warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>2)</td>
		<td class="text-left">Tingkat nasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0007['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0007['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0007 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0007['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0007['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0007?></td>
		<td style="vertical-align: middle;">
		
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0008="select *from usulan_dupak_details where dupak_no='C0008' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0008=mysqli_query($koneksi,$cek_C0008);
		  $r_C0008=mysqli_fetch_array($da_C0008);
		  
		  if($r_C0008['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0008['kunci']=='0')
		  {
			  $warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>3)</td>
		<td class="text-left">Tingkat lokal</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0008['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0008['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0008 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0008['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0008['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0008?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0009="select *from usulan_dupak_details where dupak_no='C0009' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0009=mysqli_query($koneksi,$cek_C0009);
		  $r_C0009=mysqli_fetch_array($da_C0009);
		  
		  if($r_C0009['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0009['kunci']=='0')
		  {
			$warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>4)</td>
		<td class="text-left">Insidental</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0009['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0009['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0009 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0009['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0009['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0009?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0010="select *from usulan_dupak_details where dupak_no='C0010' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0010=mysqli_query($koneksi,$cek_C0010);
		  $r_C0010=mysqli_fetch_array($da_C0010);
		  
		  if($r_C0010['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0010['kunci']=='0')
		  {
			$warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>1</td>
		<td colspan="3" class="text-left">Berdasarkan bidang keahlian</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0010['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0010['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0010 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0010['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0010['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0010?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0011="select *from usulan_dupak_details where dupak_no='C0011' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0011=mysqli_query($koneksi,$cek_C0011);
		  $r_C0011=mysqli_fetch_array($da_C0011);
		  
		  if($r_C0011['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0011['kunci']=='0')
		  {
			$warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>2</td>
		<td colspan="3" class="text-left">Berdasarkan penugasan lembaga perguruan tinggi</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0011['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0011['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0011 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0011['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0011['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0011?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0012="select *from usulan_dupak_details where dupak_no='C0012' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0012=mysqli_query($koneksi,$cek_C0012);
		  $r_C0012=mysqli_fetch_array($da_C0012);
		  
		  if($r_C0012['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0012['kunci']=='0')
		  {
			$warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>3</td>
		<td colspan="3" class="text-left">Berdasarkan fungsi / jabatan</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0012['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0012['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0012 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0012['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0012['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0012?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0013="select *from usulan_dupak_details where dupak_no='C0013' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0013=mysqli_query($koneksi,$cek_C0013);
		  $r_C0013=mysqli_fetch_array($da_C0013);
		  
		  if($r_C0013['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0013['kunci']=='0')
		  {
			$warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td rowspan="1">E</td>
		<td colspan="4" class="text-left">Membuat/ menulis karya pengabdian</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0013['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0013['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0013 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0013['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0013['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0013?></td>
		<td>
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0014="select *from usulan_dupak_details where dupak_no='C0014' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0014=mysqli_query($koneksi,$cek_C0014);
		  $r_C0014=mysqli_fetch_array($da_C0014);
		  
		  if($r_C0014['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0014['kunci']=='0')
		  {
			$warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>F</td>
		<td colspan="4" class="text-left">Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala/jurnal pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0014['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0014['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0014 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0014['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0014['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0014?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0015="select *from usulan_dupak_details where dupak_no='C0015' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0015=mysqli_query($koneksi,$cek_C0015);
		  $r_C0015=mysqli_fetch_array($da_C0015);
		  
		  if($r_C0015['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0015['kunci']=='0')
		  {
			$warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>1</td>
		<td colspan="3" class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0015['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0015['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0015 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0015['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0015['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0015?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		  $cek_C0016="select *from usulan_dupak_details where dupak_no='C0016' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
		  $da_C0016=mysqli_query($koneksi,$cek_C0016);
		  $r_C0016=mysqli_fetch_array($da_C0016);
		  
		  if($r_C0016['kunci']=='1')
		  {
			$warna="7bf360";
		  }elseif($r_C0016['kunci']=='0')
		  {
			$warna="fd8888";
		  }
		  else
		  {
			$warna="";
		  }
		?>
		<tr class="text-center" bgcolor="<?=$warna?>">
		<td>2</td>
		<td colspan="3" class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah nasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0016['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0016['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_c0016 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0016['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_c_c0016['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_c0016?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>penilai/penilai_dupak_c/dupak/C0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_lama']?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_baru']?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$jmlah_kum?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$jmlah_kum_penilai?></td>
		<td></td>
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
</div>
</div>
</div>
</div>
           