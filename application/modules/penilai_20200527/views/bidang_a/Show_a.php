
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
				<li class="nav-item"> <a class="nav-link active" href="<?= base_url()?>penilai/penilai/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>

				<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
				
		
			</ul>
			<!-- Tab panes -->
			<div class="tab-content tabcontent-border">
			<?php $no_usulan=$data_dasar->no; ?>
				<div class="tab-pane active p-20" id="dasar" role="tabpanel" >

            <div class="card">
            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Bidang A</h4>
                            </div>
                         <div class="card-body">                              
                               <h4 class="card-title"></h4>
                               
                                <div class="row">    
                    
                                                     
                               
	<!--<table  class="ui celled table">
	<tr>
		<td>
		<center>
		<a href="<?= base_url()?>penilai/penilai/print_bidanga/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> BIDANG A</a>
		<a href="<?= base_url()?>penilai/penilai/print_dupak/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> PRINT DUPAK</a>
		</center>
		</td>
	</tr>
	</table>-->                  
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
				<tr>
		<td rowspan="6" class="text-center">I</td>
		<td colspan="5" class="text-left">PENDIDIKAN</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td> </td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="3">A</td>
		<td colspan="4" class="text-left">Pendidikan Formal</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0001="select *from usulan_dupak_details where dupak_no='A0001' and usulan_no='$no'";
	  $da_A0001=mysqli_query($koneksi,$cek_A0001);
	  $r_A0001=mysqli_fetch_array($da_A0001);
	  
	  if($r_A0001['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0001['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
		<?php
		$sql_a0001="select *from usulan_dupaks where dupak_no='A0001' and usulan_no='$no'";
		$data_a0001=mysqli_query($koneksi,$sql_a0001);
		$data_bid_a_a0001=mysqli_fetch_array($data_a0001);
		$jumlah_a0001=$data_bid_a_a0001['kum_usulan_lama']+$data_bid_a_a0001['kum_usulan_baru'];
		$kum_nilai_a0001=$data_bid_a_a0001['kum_penilai_lama']+$data_bid_a_a0001['kum_penilai_baru'];
		?>
		<td>1</td>
		<td colspan="3" class="text-left">Doktor (S3)</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0001['kum_usulan_lama'];?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0001['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?= $jumlah_a0001 ;?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0001['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0001['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0001?></td>
		<td style="vertical-align: middle;">
			
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0002="select *from usulan_dupak_details where dupak_no='A0002' and usulan_no='$no'";
	  $da_A0002=mysqli_query($koneksi,$cek_A0002);
	  $r_A0002=mysqli_fetch_array($da_A0002);
	  
	  if($r_A0002['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0002['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>
		<?php
		$sql_a0002="select *from usulan_dupaks where dupak_no='A0002' and usulan_no='$no'";
		$data_a0002=mysqli_query($koneksi,$sql_a0002);
		$data_bid_a_a0002=mysqli_fetch_array($data_a0002);
		$jumlah_a0002=$data_bid_a_a0002['kum_usulan_lama']+$data_bid_a_a0002['kum_usulan_baru'];
		$kum_nilai_a0002=$data_bid_a_a0002['kum_penilai_lama']+$data_bid_a_a0002['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td>2</td>
		<td colspan="3" class="text-left">Magister (S2)</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0002['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0002['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0002?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0002['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0002['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0002?></td>
		<td style="vertical-align: middle;">
			
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="2" height="40">B</td>
		<td colspan="4" class="text-left">Pendidikan dan pelatihan Prajabatan</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_a0003="select *from usulan_dupak_details where dupak_no='a0003' and usulan_no='$no'";
	  $da_a0003=mysqli_query($koneksi,$cek_a0003);
	  $r_a0003=mysqli_fetch_array($da_a0003);
	  
	  if($r_a0003['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0003['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>
	  
	  <tr class="text-center" bgcolor="<?=$warna?>">
		<?php
		$sql_a0003="select *from usulan_dupaks where dupak_no='a0003' and usulan_no='$no'";
		$data_a0003=mysqli_query($koneksi,$sql_a0003);
		$data_bid_a_a0003=mysqli_fetch_array($data_a0003);
		$jumlah_a0003=$data_bid_a_a0003['kum_usulan_lama']+$data_bid_a_a0003['kum_usulan_baru'];
		$kum_nilai_a0003=$data_bid_a_a0003['kum_penilai_lama']+$data_bid_a_a0003['kum_penilai_baru'];
		?>
			<td>1</td>
		<td colspan="3" class="text-left">Pendidikan dan pelatihan Prajabatan golongan III</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0003['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0003['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0003?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0003['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0003['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0003?></td>
		<td style="vertical-align: middle;">
	
			<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="75">II</td>
		<td colspan="5" class="text-left">PELAKSANAAN PENDIDIKAN</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="11">A</td>
		<td colspan="4" rowspan="4" class="text-left">Melaksanakan perkulihan/ tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktek keguruan bengkel/studio/kebun percobaan/teknologi pengajaran dan praktek lapangan</td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php
	  $cek_A0004="select *from usulan_dupak_details where dupak_no='A0004' and usulan_no='$no'";
	  $da_A0004=mysqli_query($koneksi,$cek_A0004);
	  $r_A0004=mysqli_fetch_array($da_A0004);
	  
	  if($r_A0004['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0004['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		
	  <?php
		$sql_a0004="select *from usulan_dupaks where dupak_no='a0004' and usulan_no='$no'";
		$data_a0004=mysqli_query($koneksi,$sql_a0004);
		$data_bid_a_a0004=mysqli_fetch_array($data_a0004);
		$jumlah_a0004=$data_bid_a_a0004['kum_usulan_lama']+$data_bid_a_a0004['kum_usulan_baru'];
		$kum_nilai_a0004=$data_bid_a_a0004['kum_penilai_lama']+$data_bid_a_a0004['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td rowspan="7">1</td>
		<td colspan="3" rowspan="7" class="text-left">Melaksanakan perkuliahan/tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di Laboratorium, Praktik Keguruan Bengkel/Studio/Kebun pada Fakultas/Sekolah Tinggi/Akademi/Politeknik sendiri, pada fakultas lain dalam lingkungan Universitas/lnstitut sendiri, maupun di luar perguruan tinggi sendiri secara melembaga paling banyak 12 sks per semester</td>
		<td rowspan="7" style="vertical-align: middle;"><?=$data_bid_a_a0004['kum_usulan_lama']?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$data_bid_a_a0004['kum_usulan_baru']?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$jumlah_a0004?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$data_bid_a_a0004['kum_penilai_lama']?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$data_bid_a_a0004['kum_penilai_baru']?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$kum_nilai_a0004?></td>
		<td rowspan="7" style="vertical-align: middle;">
			
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="2">B</td>
		<td colspan="4" class="text-left">Membimbing seminar</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0005="select *from usulan_dupak_details where dupak_no='A0005' and usulan_no='$no'";
	  $da_A0005=mysqli_query($koneksi,$cek_A0005);
	  $r_A0005=mysqli_fetch_array($da_A0005);
	  
	  if($r_A0005['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0005['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0005="select *from usulan_dupaks where dupak_no='a0005' and usulan_no='$no'";
		$data_a0005=mysqli_query($koneksi,$sql_a0005);
		$data_bid_a_a0005=mysqli_fetch_array($data_a0005);
		$jumlah_a0005=$data_bid_a_a0005['kum_usulan_lama']+$data_bid_a_a0005['kum_usulan_baru'];
		$kum_nilai_a0005=$data_bid_a_a0005['kum_penilai_lama']+$data_bid_a_a0005['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td>1</td>
		<td colspan="3" class="text-left">Membimbing mahasiswa seminar</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0005['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0005['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0005?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0005['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0005['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0005?></td>
		<td style="vertical-align: middle;">
		
			<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="4">C</td>
		<td colspan="4" rowspan="2" class="text-left">Membing kuliah kerja nyata, pratek kerja nyata, praktek kerja
		lapangan</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php
	  $cek_A0006="select *from usulan_dupak_details where dupak_no='A0006' and usulan_no='$no'";
	  $da_A0006=mysqli_query($koneksi,$cek_A0006);
	  $r_A0006=mysqli_fetch_array($da_A0006);
	  
	  if($r_A0006['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0006['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0006="select *from usulan_dupaks where dupak_no='a0006' and usulan_no='$no'";
		$data_a0006=mysqli_query($koneksi,$sql_a0006);
		$data_bid_a_a0006=mysqli_fetch_array($data_a0006);
		$jumlah_a0006=$data_bid_a_a0006['kum_usulan_lama']+$data_bid_a_a0006['kum_usulan_baru'];
		$kum_nilai_a0006=$data_bid_a_a0006['kum_penilai_lama']+$data_bid_a_a0006['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Membimbing mahasiswa kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0006['kum_usulan_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0006['kum_usulan_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0006?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0006['kum_penilai_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0006['kum_penilai_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_a0006?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="12">D</td>
		<td colspan="4" rowspan="2" class="text-left">Membimbing dan ikut membimbing dalam menghasilkan disertasi, thesis,
		skripsi dan laporan akhir studi</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="5">1</td>
		<td colspan="3" class="text-left">Pembimbing utama</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0007="select *from usulan_dupak_details where dupak_no='A0007' and usulan_no='$no'";
	  $da_A0007=mysqli_query($koneksi,$cek_A0007);
	  $r_A0007=mysqli_fetch_array($da_A0007);
	  
	  if($r_A0007['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0007['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0007="select *from usulan_dupaks where dupak_no='a0007' and usulan_no='$no'";
		$data_a0007=mysqli_query($koneksi,$sql_a0007);
		$data_bid_a_a0007=mysqli_fetch_array($data_a0007);
		$jumlah_a0007=$data_bid_a_a0007['kum_usulan_lama']+$data_bid_a_a0007['kum_usulan_baru'];
		$kum_nilai_a0007=$data_bid_a_a0007['kum_penilai_lama']+$data_bid_a_a0007['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td height="20">a.</td>
		<td colspan="2" class="text-left">Disertasi</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0007['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0007['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0007?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0007['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0007['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0007?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0008="select *from usulan_dupak_details where dupak_no='A0008' and usulan_no='$no'";
	  $da_A0008=mysqli_query($koneksi,$cek_A0008);
	  $r_A0008=mysqli_fetch_array($da_A0008);
	  
	  if($r_A0008['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0008['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0008="select *from usulan_dupaks where dupak_no='a0008' and usulan_no='$no'";
		$data_a0008=mysqli_query($koneksi,$sql_a0008);
		$data_bid_a_a0008=mysqli_fetch_array($data_a0008);
		$jumlah_a0008=$data_bid_a_a0008['kum_usulan_lama']+$data_bid_a_a0008['kum_usulan_baru'];
		$kum_nilai_a0008=$data_bid_a_a0008['kum_penilai_lama']+$data_bid_a_a0008['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
		
		<td>b.</td>
		<td colspan="2" class="text-left">Thesis</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0008['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0008['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0008?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0008['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0008['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0008?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0009="select *from usulan_dupak_details where dupak_no='A0009' and usulan_no='$no'";
	  $da_A0009=mysqli_query($koneksi,$cek_A0009);
	  $r_A0009=mysqli_fetch_array($da_A0009);
	  
	  if($r_A0009['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0009['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0009="select *from usulan_dupaks where dupak_no='a0009' and usulan_no='$no'";
		$data_a0009=mysqli_query($koneksi,$sql_a0009);
		$data_bid_a_a0009=mysqli_fetch_array($data_a0009);
		$jumlah_a0009=$data_bid_a_a0009['kum_usulan_lama']+$data_bid_a_a0009['kum_usulan_baru'];
		$kum_nilai_a0009=$data_bid_a_a0009['kum_penilai_lama']+$data_bid_a_a0009['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	  
		<td>c.</td>
		<td colspan="2" class="text-left">Skripsi</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0009['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0009['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0009?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0009['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0009['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0009?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0010="select *from usulan_dupak_details where dupak_no='A0010' and usulan_no='$no'";
	  $da_A0010=mysqli_query($koneksi,$cek_A0010);
	  $r_A0010=mysqli_fetch_array($da_A0010);
	  
	  if($r_A0010['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0010['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0010="select *from usulan_dupaks where dupak_no='a0010' and usulan_no='$no'";
		$data_a0010=mysqli_query($koneksi,$sql_a0010);
		$data_bid_a_a0010=mysqli_fetch_array($data_a0010);
		$jumlah_a0010=$data_bid_a_a0010['kum_usulan_lama']+$data_bid_a_a0010['kum_usulan_baru'];
		$kum_nilai_a0010=$data_bid_a_a0010['kum_penilai_lama']+$data_bid_a_a0010['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td>d.</td>
		<td colspan="2" class="text-left">Laporan Akhir</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0010['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0010['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0010?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0010['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0010['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0010?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="5">2</td>
		<td colspan="3" class="text-left">Pembimbing pendamping/ pembantu</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0011="select *from usulan_dupak_details where dupak_no='A0011' and usulan_no='$no'";
	  $da_A0011=mysqli_query($koneksi,$cek_A0011);
	  $r_A0011=mysqli_fetch_array($da_A0011);
	  
	  if($r_A0011['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0011['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0011="select *from usulan_dupaks where dupak_no='a0011' and usulan_no='$no'";
		$data_a0011=mysqli_query($koneksi,$sql_a0011);
		$data_bid_a_a0011=mysqli_fetch_array($data_a0011);
		$jumlah_a0011=$data_bid_a_a0011['kum_usulan_lama']+$data_bid_a_a0011['kum_usulan_baru'];
		$kum_nilai_a0011=$data_bid_a_a0011['kum_penilai_lama']+$data_bid_a_a0011['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td>a.</td>
		<td colspan="2" class="text-left">Disertasi</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0011['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0011['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0011?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0011['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0011['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0011?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0012="select *from usulan_dupak_details where dupak_no='A0012' and usulan_no='$no'";
	  $da_A0012=mysqli_query($koneksi,$cek_A0012);
	  $r_A0012=mysqli_fetch_array($da_A0012);
	  
	  if($r_A0012['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0012['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0012="select *from usulan_dupaks where dupak_no='a0012' and usulan_no='$no'";
		$data_a0012=mysqli_query($koneksi,$sql_a0012);
		$data_bid_a_a0012=mysqli_fetch_array($data_a0012);
		$jumlah_a0012=$data_bid_a_a0012['kum_usulan_lama']+$data_bid_a_a0012['kum_usulan_baru'];
		$kum_nilai_a0012=$data_bid_a_a0012['kum_penilai_lama']+$data_bid_a_a0012['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

	  
		<td>b.</td>
		<td colspan="2" class="text-left">Thesis</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0012['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0012['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0012?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0012['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0012['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0012?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0013="select *from usulan_dupak_details where dupak_no='A0013' and usulan_no='$no'";
	  $da_A0013=mysqli_query($koneksi,$cek_A0013);
	  $r_A0013=mysqli_fetch_array($da_A0013);
	  
	  if($r_A0013['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0013['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0013="select *from usulan_dupaks where dupak_no='a0013' and usulan_no='$no'";
		$data_a0013=mysqli_query($koneksi,$sql_a0013);
		$data_bid_a_a0013=mysqli_fetch_array($data_a0013);
		$jumlah_a0013=$data_bid_a_a0013['kum_usulan_lama']+$data_bid_a_a0013['kum_usulan_baru'];
		$kum_nilai_a0013=$data_bid_a_a0013['kum_penilai_lama']+$data_bid_a_a0013['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td>c.</td>
		<td colspan="2" class="text-left">Skripsi</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0013['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0013['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0013?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0013['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0013['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0013?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0014="select *from usulan_dupak_details where dupak_no='A0014' and usulan_no='$no'";
	  $da_A0014=mysqli_query($koneksi,$cek_A0014);
	  $r_A0014=mysqli_fetch_array($da_A0014);
	  
	  if($r_A0014['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0014['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0014="select *from usulan_dupaks where dupak_no='a0014' and usulan_no='$no'";
		$data_a0014=mysqli_query($koneksi,$sql_a0014);
		$data_bid_a_a0014=mysqli_fetch_array($data_a0014);
		$jumlah_a0014=$data_bid_a_a0014['kum_usulan_lama']+$data_bid_a_a0014['kum_usulan_baru'];
		$kum_nilai_a0014=$data_bid_a_a0014['kum_penilai_lama']+$data_bid_a_a0014['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td>d.</td>
		<td colspan="2" class="text-left">Laporan Akhir</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0014['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0014['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0014?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0014['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0014['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0014?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="3">E</td>
		<td colspan="4" class="text-left">Bertugas sebagai penguji pada ujian akhir</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0015="select *from usulan_dupak_details where dupak_no='A0015' and usulan_no='$no'";
	  $da_A0015=mysqli_query($koneksi,$cek_A0015);
	  $r_A0015=mysqli_fetch_array($da_A0015);
	  
	  if($r_A0015['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0015['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0015="select *from usulan_dupaks where dupak_no='a0015' and usulan_no='$no'";
		$data_a0015=mysqli_query($koneksi,$sql_a0015);
		$data_bid_a_a0015=mysqli_fetch_array($data_a0015);
		$jumlah_a0015=$data_bid_a_a0015['kum_usulan_lama']+$data_bid_a_a0015['kum_usulan_baru'];
		$kum_nilai_a0015=$data_bid_a_a0015['kum_penilai_lama']+$data_bid_a_a0015['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	  
		<td>1</td>
		<td colspan="3" class="text-left">Ketua penguji</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0015['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0015['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0015?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0015['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0015['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0015?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0016="select *from usulan_dupak_details where dupak_no='A0016' and usulan_no='$no'";
	  $da_A0016=mysqli_query($koneksi,$cek_A0016);
	  $r_A0016=mysqli_fetch_array($da_A0016);
	  
	  if($r_A0016['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0016['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0016="select *from usulan_dupaks where dupak_no='a0016' and usulan_no='$no'";
		$data_a0016=mysqli_query($koneksi,$sql_a0016);
		$data_bid_a_a0016=mysqli_fetch_array($data_a0016);
		$jumlah_a0016=$data_bid_a_a0016['kum_usulan_lama']+$data_bid_a_a0016['kum_usulan_baru'];
		$kum_nilai_a0016=$data_bid_a_a0016['kum_penilai_lama']+$data_bid_a_a0016['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td>2</td>
		<td colspan="3" class="text-left">Anggota penguji</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0016['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0016['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0016?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0016['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0016['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0016?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="3">F</td>
		<td colspan="4" class="text-left">Membina kegiatan mahasiswa</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0017="select *from usulan_dupak_details where dupak_no='A0017' and usulan_no='$no'";
	  $da_A0017=mysqli_query($koneksi,$cek_A0017);
	  $r_A0017=mysqli_fetch_array($da_A0017);
	  
	  if($r_A0017['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0017['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0017="select *from usulan_dupaks where dupak_no='a0017' and usulan_no='$no'";
		$data_a0017=mysqli_query($koneksi,$sql_a0017);
		$data_bid_a_a0017=mysqli_fetch_array($data_a0017);
		$jumlah_a0017=$data_bid_a_a0017['kum_usulan_lama']+$data_bid_a_a0017['kum_usulan_baru'];
		$kum_nilai_a0017=$data_bid_a_a0017['kum_penilai_lama']+$data_bid_a_a0017['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Melakukan pembinaan kegiatan mahasiswa di bidang Akademik dan kemahasiswaan</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0017['kum_usulan_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0017['kum_usulan_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0017?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0017['kum_penilai_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0017['kum_penilai_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_a0017?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0017/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="2">G</td>
		<td colspan="4" class="text-left">Mengembangkan program kuliah</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0018="select *from usulan_dupak_details where dupak_no='A0018' and usulan_no='$no'";
	  $da_A0018=mysqli_query($koneksi,$cek_A0018);
	  $r_A0018=mysqli_fetch_array($da_A0018);
	  
	  if($r_A0018['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0018['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0018="select *from usulan_dupaks where dupak_no='a0018' and usulan_no='$no'";
		$data_a0018=mysqli_query($koneksi,$sql_a0018);
		$data_bid_a_a0018=mysqli_fetch_array($data_a0018);
		$jumlah_a0018=$data_bid_a_a0018['kum_usulan_lama']+$data_bid_a_a0018['kum_usulan_baru'];
		$kum_nilai_a0018=$data_bid_a_a0018['kum_penilai_lama']+$data_bid_a_a0018['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td>1</td>
		<td colspan="3" class="text-left">Melakukan kegiatan pengembangan program kuliah</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0018['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0018['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0018?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0018['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0018['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0018?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0018/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="4">H</td>
		<td colspan="4" class="text-left">Mengembangkan bahan pengajaran</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0019="select *from usulan_dupak_details where dupak_no='A0019' and usulan_no='$no'";
	  $da_A0019=mysqli_query($koneksi,$cek_A0019);
	  $r_A0019=mysqli_fetch_array($da_A0019);
	  
	  if($r_A0019['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0019['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0019="select *from usulan_dupaks where dupak_no='a0019' and usulan_no='$no'";
		$data_a0019=mysqli_query($koneksi,$sql_a0019);
		$data_bid_a_a0019=mysqli_fetch_array($data_a0019);
		$jumlah_a0019=$data_bid_a_a0019['kum_usulan_lama']+$data_bid_a_a0019['kum_usulan_baru'];
		$kum_nilai_a0019=$data_bid_a_a0019['kum_penilai_lama']+$data_bid_a_a0019['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td>1</td>
		<td colspan="3" class="text-left">Buku ajar</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0019['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0019['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0019?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0019['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0019['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0019?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0019/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0020="select *from usulan_dupak_details where dupak_no='A0020' and usulan_no='$no'";
	  $da_A0020=mysqli_query($koneksi,$cek_A0020);
	  $r_A0020=mysqli_fetch_array($da_A0020);
	  
	  if($r_A0020['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0020['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0020="select *from usulan_dupaks where dupak_no='a0020' and usulan_no='$no'";
		$data_a0020=mysqli_query($koneksi,$sql_a0020);
		$data_bid_a_a0020=mysqli_fetch_array($data_a0020);
		$jumlah_a0020=$data_bid_a_a0020['kum_usulan_lama']+$data_bid_a_a0020['kum_usulan_baru'];
		$kum_nilai_a0020=$data_bid_a_a0020['kum_penilai_lama']+$data_bid_a_a0020['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td rowspan="2">2</td>
		<td colspan="3" rowspan="2" class="text-left">Diktat, modul, petunjuk praktikum, model, alat bantu, audio visual, naskah tutorial</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0020['kum_usulan_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0020['kum_usulan_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0020?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0020['kum_penilai_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0020['kum_penilai_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_a0020?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0020/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="3">I</td>
		<td colspan="4" class="text-left">Menyampaikan orasi ilmiah</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0021="select *from usulan_dupak_details where dupak_no='A0021' and usulan_no='$no'";
	  $da_A0021=mysqli_query($koneksi,$cek_A0021);
	  $r_A0021=mysqli_fetch_array($da_A0021);
	  
	  if($r_A0021['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0021['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0021="select *from usulan_dupaks where dupak_no='a0021' and usulan_no='$no'";
		$data_a0021=mysqli_query($koneksi,$sql_a0021);
		$data_bid_a_a0021=mysqli_fetch_array($data_a0021);
		$jumlah_a0021=$data_bid_a_a0021['kum_usulan_lama']+$data_bid_a_a0021['kum_usulan_baru'];
		$kum_nilai_a0021=$data_bid_a_a0021['kum_penilai_lama']+$data_bid_a_a0021['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Melakukan kegiatan orasi ilmiah pada perguruan tinggi tiap tahun</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0021['kum_usulan_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0021['kum_usulan_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0021?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0021['kum_penilai_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0021['kum_penilai_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_a0021?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0021/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="14">J</td>
		<td colspan="4" class="text-left">Menduduki jabatan pimpinan perguruan tinggi</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0022="select *from usulan_dupak_details where dupak_no='A0022' and usulan_no='$no'";
	  $da_A0022=mysqli_query($koneksi,$cek_A0022);
	  $r_A0022=mysqli_fetch_array($da_A0022);
	  
	  if($r_A0022['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0022['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0022="select *from usulan_dupaks where dupak_no='a0022' and usulan_no='$no'";
		$data_a0022=mysqli_query($koneksi,$sql_a0022);
		$data_bid_a_a0022=mysqli_fetch_array($data_a0022);
		$jumlah_a0022=$data_bid_a_a0022['kum_usulan_lama']+$data_bid_a_a0022['kum_usulan_baru'];
		$kum_nilai_a0022=$data_bid_a_a0022['kum_penilai_lama']+$data_bid_a_a0022['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td height="20">1</td>
		<td colspan="3" class="text-left">Rektor</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0022['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0022['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0022?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0022['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0022['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0022?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0022/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0023="select *from usulan_dupak_details where dupak_no='A0023' and usulan_no='$no'";
	  $da_A0023=mysqli_query($koneksi,$cek_A0023);
	  $r_A0023=mysqli_fetch_array($da_A0023);
	  
	  if($r_A0023['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0023['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0023="select *from usulan_dupaks where dupak_no='a0023' and usulan_no='$no'";
		$data_a0023=mysqli_query($koneksi,$sql_a0023);
		$data_bid_a_a0023=mysqli_fetch_array($data_a0023);
		$jumlah_a0023=$data_bid_a_a0023['kum_usulan_lama']+$data_bid_a_a0023['kum_usulan_baru'];
		$kum_nilai_a0023=$data_bid_a_a0023['kum_penilai_lama']+$data_bid_a_a0023['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td height="20">2</td>
		<td colspan="3" class="text-left">Pembantu rektor/dekan/direktur program pasca sarjana</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0023['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0023['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0023?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0023['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0023['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0023?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0023/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0024="select *from usulan_dupak_details where dupak_no='A0024' and usulan_no='$no'";
	  $da_A0024=mysqli_query($koneksi,$cek_A0024);
	  $r_A0024=mysqli_fetch_array($da_A0024);
	  
	  if($r_A0024['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0024['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0024="select *from usulan_dupaks where dupak_no='a0024' and usulan_no='$no'";
		$data_a0024=mysqli_query($koneksi,$sql_a0024);
		$data_bid_a_a0024=mysqli_fetch_array($data_a0024);
		$jumlah_a0024=$data_bid_a_a0024['kum_usulan_lama']+$data_bid_a_a0024['kum_usulan_baru'];
		$kum_nilai_a0024=$data_bid_a_a0024['kum_penilai_lama']+$data_bid_a_a0024['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td rowspan="2">3</td>
		<td colspan="3" rowspan="2" class="text-left">Ketua sekolah tinggi/pembantu dekan/asisten direktur program pasca sarjana/direktur politeknik</td>
		<td rowspan="2"style="vertical-align: middle;"><?=$data_bid_a_a0024['kum_usulan_lama']?></td>
		<td rowspan="2"style="vertical-align: middle;"><?=$data_bid_a_a0024['kum_usulan_baru']?></td>
		<td rowspan="2"style="vertical-align: middle;"><?=$jumlah_a0024?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0024['kum_penilai_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0024['kum_penilai_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_a0024?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0024/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php
	  $cek_A0025="select *from usulan_dupak_details where dupak_no='A0025' and usulan_no='$no'";
	  $da_A0025=mysqli_query($koneksi,$cek_A0025);
	  $r_A0025=mysqli_fetch_array($da_A0025);
	  
	  if($r_A0025['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0025['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0025="select *from usulan_dupaks where dupak_no='a0025' and usulan_no='$no'";
		$data_a0025=mysqli_query($koneksi,$sql_a0025);
		$data_bid_a_a0025=mysqli_fetch_array($data_a0025);
		$jumlah_a0025=$data_bid_a_a0025['kum_usulan_lama']+$data_bid_a_a0025['kum_usulan_baru'];
		$kum_nilai_a0025=$data_bid_a_a0025['kum_penilai_lama']+$data_bid_a_a0025['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td>4</td>
		<td colspan="3" class="text-left">Pembantu ketua sekolah tinggi/pembantu direktur politeknik</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0025['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0025['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0025?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0025['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0025['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0025?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0025/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0026="select *from usulan_dupak_details where dupak_no='A0026' and usulan_no='$no'";
	  $da_A0026=mysqli_query($koneksi,$cek_A0026);
	  $r_A0026=mysqli_fetch_array($da_A0026);
	  
	  if($r_A0026['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0026['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0026="select *from usulan_dupaks where dupak_no='a0026' and usulan_no='$no'";
		$data_a0026=mysqli_query($koneksi,$sql_a0026);
		$data_bid_a_a0026=mysqli_fetch_array($data_a0026);
		$jumlah_a0026=$data_bid_a_a0026['kum_usulan_lama']+$data_bid_a_a0026['kum_usulan_baru'];
		$kum_nilai_a0026=$data_bid_a_a0026['kum_penilai_lama']+$data_bid_a_a0026['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td height="20">5</td>
		<td colspan="3" class="text-left">Direktur akademi</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0026['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0026['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0026?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0026['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0026['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0026?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0026/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0027="select *from usulan_dupak_details where dupak_no='A0027' and usulan_no='$no'";
	  $da_A0027=mysqli_query($koneksi,$cek_A0027);
	  $r_A0027=mysqli_fetch_array($da_A0027);
	  
	  if($r_A0027['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0027['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	 <?php
		$sql_a0027="select *from usulan_dupaks where dupak_no='a0027' and usulan_no='$no'";
		$data_a0027=mysqli_query($koneksi,$sql_a0027);
		$data_bid_a_a0027=mysqli_fetch_array($data_a0027);
		$jumlah_a0027=$data_bid_a_a0027['kum_usulan_lama']+$data_bid_a_a0027['kum_usulan_baru'];
		$kum_nilai_a0027=$data_bid_a_a0027['kum_penilai_lama']+$data_bid_a_a0027['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td rowspan="2">6</td>
		<td colspan="3" rowspan="2" class="text-left">Pembantu direktur akademi/ketua jurusan/bagian pada Universitas/institut/sekolah tinggi</td>
	    <td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0027['kum_usulan_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0027['kum_usulan_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0027?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0027['kum_penilai_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0027['kum_penilai_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_a0027?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0027/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php
	  $cek_A0028="select *from usulan_dupak_details where dupak_no='A0028' and usulan_no='$no'";
	  $da_A0028=mysqli_query($koneksi,$cek_A0028);
	  $r_A0028=mysqli_fetch_array($da_A0028);
	  
	  if($r_A0028['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0028['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0028="select *from usulan_dupaks where dupak_no='a0028' and usulan_no='$no'";
		$data_a0028=mysqli_query($koneksi,$sql_a0028);
		$data_bid_a_a0028=mysqli_fetch_array($data_a0028);
		$jumlah_a0028=$data_bid_a_a0028['kum_usulan_lama']+$data_bid_a_a0028['kum_usulan_baru'];
		$kum_nilai_a0028=$data_bid_a_a0028['kum_penilai_lama']+$data_bid_a_a0028['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td rowspan="2">7</td>
		<td colspan="3" rowspan="2" class="text-left">Ketua jurusan pada politeknik/akademi/sekretaris jurusan /bagian pada universitas/ institut/ sekolah tinggi</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0028['kum_usulan_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0028['kum_usulan_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$jumlah_a0028?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0028['kum_penilai_lama']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_a0028['kum_penilai_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$kum_nilai_a0028?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0028/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php
	  $cek_A0029="select *from usulan_dupak_details where dupak_no='A0029' and usulan_no='$no'";
	  $da_A0029=mysqli_query($koneksi,$cek_A0029);
	  $r_A0029=mysqli_fetch_array($da_A0029);
	  
	  if($r_A0029['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0029['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0029="select *from usulan_dupaks where dupak_no='a0029' and usulan_no='$no'";
		$data_a0029=mysqli_query($koneksi,$sql_a0029);
		$data_bid_a_a0029=mysqli_fetch_array($data_a0029);
		$jumlah_a0029=$data_bid_a_a0029['kum_usulan_lama']+$data_bid_a_a0029['kum_usulan_baru'];
		$kum_nilai_a0029=$data_bid_a_a0029['kum_penilai_lama']+$data_bid_a_a0029['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td rowspan="3">8</td>
		<td colspan="3" rowspan="3" class="text-left">Sekretaris jurusan pada politeknik/akademik dan kepala laboratorium universitas/institut/ sekolah tinggi / politeknik/ akademi</td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_a_a0029['kum_usulan_lama']?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_a_a0029['kum_usulan_baru']?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$jumlah_a0029?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_a_a0029['kum_penilai_lama']?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_a_a0029['kum_penilai_baru']?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$kum_nilai_a0029?></td>
		<td rowspan="3" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0029/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="3">K</td>
		<td colspan="4" class="text-left">Membimbing Akademik Dosen yang lebih rendah jabatannya</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php
	  $cek_A0030="select *from usulan_dupak_details where dupak_no='A0030' and usulan_no='$no'";
	  $da_A0030=mysqli_query($koneksi,$cek_A0030);
	  $r_A0030=mysqli_fetch_array($da_A0030);
	  
	  if($r_A0030['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0030['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0030="select *from usulan_dupaks where dupak_no='a0030' and usulan_no='$no'";
		$data_a0030=mysqli_query($koneksi,$sql_a0030);
		$data_bid_a_a0030=mysqli_fetch_array($data_a0030);
		$jumlah_a0030=$data_bid_a_a0030['kum_usulan_lama']+$data_bid_a_a0030['kum_usulan_baru'];
		$kum_nilai_a0030=$data_bid_a_a0030['kum_penilai_lama']+$data_bid_a_a0030['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td>1</td>
		<td colspan="3" class="text-left">Pembimbing pencangkokan</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0030['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0030['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0030?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0030['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0030['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0030?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0030/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0031="select *from usulan_dupak_details where dupak_no='A0031' and usulan_no='$no'";
	  $da_A0031=mysqli_query($koneksi,$cek_A0031);
	  $r_A0031=mysqli_fetch_array($da_A0031);
	  
	  if($r_A0031['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0031['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	   <?php
		$sql_a0031="select *from usulan_dupaks where dupak_no='a0031' and usulan_no='$no'";
		$data_a0031=mysqli_query($koneksi,$sql_a0031);
		$data_bid_a_a0031=mysqli_fetch_array($data_a0031);
		$jumlah_a0031=$data_bid_a_a0031['kum_usulan_lama']+$data_bid_a_a0031['kum_usulan_baru'];
		$kum_nilai_a0031=$data_bid_a_a0031['kum_penilai_lama']+$data_bid_a_a0031['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td>2</td>
		<td colspan="3" class="text-left">Reguler</td>
		<td  style="vertical-align: middle;"><?=$data_bid_a_a0031['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0031['kum_usulan_baru']?></td>
		<td  style="vertical-align: middle;"><?=$jumlah_a0031?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0031['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0031['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0031?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0031/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="4">L</td>
		<td colspan="4" rowspan="2" class="text-left">Melaksanakan kegiatan Detasering dan pencangkokan Akademik Dosen</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php
	  $cek_A0032="select *from usulan_dupak_details where dupak_no='A0032' and usulan_no='$no'";
	  $da_A0032=mysqli_query($koneksi,$cek_A0032);
	  $r_A0032=mysqli_fetch_array($da_A0032);
	  
	  if($r_A0032['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0032['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0032="select *from usulan_dupaks where dupak_no='a0032' and usulan_no='$no'";
		$data_a0032=mysqli_query($koneksi,$sql_a0032);
		$data_bid_a_a0032=mysqli_fetch_array($data_a0032);
		$jumlah_a0032=$data_bid_a_a0032['kum_usulan_lama']+$data_bid_a_a0032['kum_usulan_baru'];
		$kum_nilai_a0032=$data_bid_a_a0032['kum_penilai_lama']+$data_bid_a_a0032['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td>1</td>
		<td colspan="3" class="text-left">Detasering</td>
		<td  style="vertical-align: middle;"><?=$data_bid_a_a0032['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0032['kum_usulan_baru']?></td>
		<td  style="vertical-align: middle;"><?=$jumlah_a0032?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0032['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0032['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0032?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0032/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0033="select *from usulan_dupak_details where dupak_no='A0033' and usulan_no='$no'";
	  $da_A0033=mysqli_query($koneksi,$cek_A0033);
	  $r_A0033=mysqli_fetch_array($da_A0033);
	  
	  if($r_A0033['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0033['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0033="select *from usulan_dupaks where dupak_no='a0033' and usulan_no='$no'";
		$data_a0033=mysqli_query($koneksi,$sql_a0033);
		$data_bid_a_a0033=mysqli_fetch_array($data_a0033);
		$jumlah_a0033=$data_bid_a_a0033['kum_usulan_lama']+$data_bid_a_a0033['kum_usulan_baru'];
		$kum_nilai_a0033=$data_bid_a_a0033['kum_penilai_lama']+$data_bid_a_a0033['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td>2</td>
		<td colspan="3" class="text-left">Pencangkokan</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0033['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0033['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0033?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0033['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0033['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0033?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0033/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="9">M</td>
		<td colspan="4" rowspan="2" class="text-left">Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php
	  $cek_A0034="select *from usulan_dupak_details where dupak_no='A0034' and usulan_no='$no'";
	  $da_A0034=mysqli_query($koneksi,$cek_A0034);
	  $r_A0034=mysqli_fetch_array($da_A0034);
	  
	  if($r_A0034['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0034['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0034="select *from usulan_dupaks where dupak_no='a0034' and usulan_no='$no'";
		$data_a0034=mysqli_query($koneksi,$sql_a0034);
		$data_bid_a_a0034=mysqli_fetch_array($data_a0034);
		$jumlah_a0034=$data_bid_a_a0034['kum_usulan_lama']+$data_bid_a_a0034['kum_usulan_baru'];
		$kum_nilai_a0034=$data_bid_a_a0034['kum_penilai_lama']+$data_bid_a_a0034['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td>1.</td>
		<td colspan="3" class="text-left">Lamanya lebih dari 960 jam</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0034['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0034['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0034?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0034['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0034['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0034?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0034/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0035="select *from usulan_dupak_details where dupak_no='A0035' and usulan_no='$no'";
	  $da_A0035=mysqli_query($koneksi,$cek_A0035);
	  $r_A0035=mysqli_fetch_array($da_A0035);
	  
	  if($r_A0035['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0035['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	 <?php
		$sql_a0035="select *from usulan_dupaks where dupak_no='a0035' and usulan_no='$no'";
		$data_a0035=mysqli_query($koneksi,$sql_a0035);
		$data_bid_a_a0035=mysqli_fetch_array($data_a0035);
		$jumlah_a0035=$data_bid_a_a0035['kum_usulan_lama']+$data_bid_a_a0035['kum_usulan_baru'];
		$kum_nilai_a0035=$data_bid_a_a0035['kum_penilai_lama']+$data_bid_a_a0035['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">

		<td>2.</td>
		<td colspan="3" class="text-left">Lamanya 641-960 jam</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0035['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0035['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0035?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0035['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0035['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0035?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0035/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0036="select *from usulan_dupak_details where dupak_no='A0036' and usulan_no='$no'";
	  $da_A0036=mysqli_query($koneksi,$cek_A0036);
	  $r_A0036=mysqli_fetch_array($da_A0036);
	  
	  if($r_A0036['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0036['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0036="select *from usulan_dupaks where dupak_no='a0036' and usulan_no='$no'";
		$data_a0036=mysqli_query($koneksi,$sql_a0036);
		$data_bid_a_a0036=mysqli_fetch_array($data_a0036);
		$jumlah_a0036=$data_bid_a_a0036['kum_usulan_lama']+$data_bid_a_a0036['kum_usulan_baru'];
		$kum_nilai_a0036=$data_bid_a_a0036['kum_penilai_lama']+$data_bid_a_a0036['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td>3.</td>
		<td colspan="3" class="text-left">Lamanya 481-640 jam</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0036['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0036['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0036?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0036['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0036['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0036?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0036/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0037="select *from usulan_dupak_details where dupak_no='A0037' and usulan_no='$no'";
	  $da_A0037=mysqli_query($koneksi,$cek_A0037);
	  $r_A0037=mysqli_fetch_array($da_A0037);
	  
	  if($r_A0037['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0037['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0037="select *from usulan_dupaks where dupak_no='a0037' and usulan_no='$no'";
		$data_a0037=mysqli_query($koneksi,$sql_a0037);
		$data_bid_a_a0037=mysqli_fetch_array($data_a0037);
		$jumlah_a0037=$data_bid_a_a0037['kum_usulan_lama']+$data_bid_a_a0037['kum_usulan_baru'];
		$kum_nilai_a0037=$data_bid_a_a0037['kum_penilai_lama']+$data_bid_a_a0037['kum_penilai_baru'];
		?>
	  <tr class="text-center"bgcolor="<?=$warna?>">
	
		<td>4.</td>
		<td colspan="3" class="text-left">Lamanya 161-480 jam</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0037['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0037['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0037?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0037['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0037['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0037?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0037/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0038="select *from usulan_dupak_details where dupak_no='A0038' and usulan_no='$no'";
	  $da_A0038=mysqli_query($koneksi,$cek_A0038);
	  $r_A0038=mysqli_fetch_array($da_A0038);
	  
	  if($r_A0038['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0038['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
	  <?php
		$sql_a0038="select *from usulan_dupaks where dupak_no='a0038' and usulan_no='$no'";
		$data_a0038=mysqli_query($koneksi,$sql_a0038);
		$data_bid_a_a0038=mysqli_fetch_array($data_a0038);
		$jumlah_a0038=$data_bid_a_a0038['kum_usulan_lama']+$data_bid_a_a0038['kum_usulan_baru'];
		$kum_nilai_a0038=$data_bid_a_a0038['kum_penilai_lama']+$data_bid_a_a0038['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	  
		<td>5.</td>
		<td colspan="3" class="text-left">Lamanya 81- 160 jam</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0038['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0038['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0038?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0038['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0038['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0038?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0038/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0039="select *from usulan_dupak_details where dupak_no='A0039' and usulan_no='$no'";
	  $da_A0039=mysqli_query($koneksi,$cek_A0039);
	  $r_A0039=mysqli_fetch_array($da_A0039);
	  
	  if($r_A0039['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0039['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0039="select *from usulan_dupaks where dupak_no='a0039' and usulan_no='$no'";
		$data_a0039=mysqli_query($koneksi,$sql_a0039);
		$data_bid_a_a0039=mysqli_fetch_array($data_a0039);
		$jumlah_a0039=$data_bid_a_a0039['kum_usulan_lama']+$data_bid_a_a0039['kum_usulan_baru'];
		$kum_nilai_a0039=$data_bid_a_a0039['kum_penilai_lama']+$data_bid_a_a0039['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	 
		<td>6.</td>
		<td colspan="3" class="text-left">Lamanya 31-80 jam</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0039['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0039['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0039?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0039['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0039['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0039?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0039/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
	  $cek_A0040="select *from usulan_dupak_details where dupak_no='A0040' and usulan_no='$no'";
	  $da_A0040=mysqli_query($koneksi,$cek_A0040);
	  $r_A0040=mysqli_fetch_array($da_A0040);
	  
	  if($r_A0040['kunci']=='1')
	  {
		$warna="#00FF00";
	  }elseif($r_A0040['kunci']=='0')
	  {
		$warna="red";
	  }
	  else
	  {
		$warna="";
	  }
	  ?>	
		<?php
		$sql_a0040="select *from usulan_dupaks where dupak_no='a0040' and usulan_no='$no'";
		$data_a0040=mysqli_query($koneksi,$sql_a0040);
		$data_bid_a_a0040=mysqli_fetch_array($data_a0040);
		$jumlah_a0040=$data_bid_a_a0040['kum_usulan_lama']+$data_bid_a_a0040['kum_usulan_baru'];
		$kum_nilai_a0040=$data_bid_a_a0040['kum_penilai_lama']+$data_bid_a_a0040['kum_penilai_baru'];
		?>
	  <tr class="text-center" bgcolor="<?=$warna?>">
	
		<td>7.</td>
		<td colspan="3" class="text-left">Lamanya 10-30 jam</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0040['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0040['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_a0040?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0040['kum_penilai_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_a0040['kum_penilai_baru']?></td>
		<td style="vertical-align: middle;"><?=$kum_nilai_a0040?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>penilai/penilai_dupak/dupak/A0040/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php
		$sql_total="select *from usulan_dupaks where  usulan_no='$no' and left(dupak_no,1)='A'";
		$data_total=mysqli_query($koneksi,$sql_total);
		while($data_kum_total=mysqli_fetch_array($data_total))
		{
			$jml_kum_lama+=$data_kum_total['kum_usulan_lama'];
			$jml_kum_baru+=$data_kum_total['kum_usulan_baru'];
			$jml_kum_penilai_lama+=$data_kum_total['kum_penilai_lama'];
			$jml_kum_penilai_baru+=$data_kum_total['kum_penilai_baru'];
		}
			$total_bid_a=$jml_kum_lama+$jml_kum_baru;
			$total_penilai_bid_a=$jml_kum_penilai_lama+$jml_kum_penilai_baru;
		?>
	  <tr style="background-color: #e4e4e4; font-weight: bold;">

		<td></td>
		<td colspan="5" class="text-right"><b>JUMLAH BIDANG A</b></td>
		<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_lama?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_baru?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$total_bid_a?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_penilai_lama?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$jml_kum_penilai_baru?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$total_penilai_bid_a?></td>
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
           