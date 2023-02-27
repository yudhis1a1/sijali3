<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "new_db_jja";
$tanggal=date("Y-m-d H:i:s");
$entries=3;

$koneksi = mysqli_connect($server,$username,$password) or die ('Koneksi gagal');

if($koneksi){
mysqli_select_db($koneksi,$database) or die ('Database belum dibuat');	
}
error_reporting(0);
?>



                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Detail Usulan JAD</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Ketenagaan</a></li>                               
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Detail</a></li>
                                
                            </ol>
                            
                        </div>
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
                                    <li class="nav-item"> <a class="nav-link "  href="<?= base_url()?>usulan/usulan/usulans/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/show_matakul/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/show_pendidikan/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
                                    
									<li class="nav-item"> 
										<a class="nav-link " href="<?= base_url()?>usulan/usulan/bidangA/<?php echo $no; ?>">
										<span class="hidden-sm-up">
											<i class="ti-agenda"></i>
										</span> 
										<span class="hidden-xs-down">Bidang A</span>
										</a> 
									</li>
                                    
									<li class="nav-item"> 
										<a class="nav-link "  href="<?= base_url()?>usulan/usulan/bidangB/<?php echo $no; ?>" >
										<span class="hidden-sm-up">
											<i class="ti-agenda "></i>
										</span> 
										<span class="hidden-xs-down">Bidang B</span>
										</a> 
									</li>
                                    
									<li class="nav-item"> 
										<a class="nav-link active"  href="<?= base_url()?>usulan/usulan/bidangC/<?php echo $no; ?>" >
										<span class="hidden-sm-up">
											<i class="ti-agenda "></i>
										</span> 
										<span class="hidden-xs-down">Bidang C</span>
										</a> 
									</li>
									
									<li class="nav-item"> 
										<a class="nav-link "  href="<?= base_url()?>usulan/usulan/bidangD/<?php echo $no; ?>" >
										<span class="hidden-sm-up">
											<i class="ti-agenda "></i>
										</span> 
										<span class="hidden-xs-down">Bidang D</span>
										</a> 
									</li>
									
                                    
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/persyaratan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#resume" role="tab"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pak" role="tab"><span class="hidden-sm-up"><i class="ti-ruler-pencil "></i></span> <span class="hidden-xs-down">PAK</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#log" role="tab"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>
                            
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
                    
                                                     
                               
    <table  class="ui celled table">
	<tr>
		<td>
		<center>
		<a href="<?= base_url()?>usulan/usulan_dupak_c/print_bidangc/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> BIDANG C</a>
		<a href="<?= base_url()?>usulan/usulan/print_dupak/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> PRINT DUPAK</a>
		</center>
		</td>
	</tr>
	</table>                        
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
		$sql_C0001="select *from usulan_dupaks where dupak_no='C0001' and usulan_no='$no'";
		$data_C0001=mysqli_query($koneksi,$sql_C0001);
		$data_bid_a_C0001=mysqli_fetch_array($data_C0001);
		$jumlah_C0001=$data_bid_a_C0001['kum_usulan_lama']+$data_bid_a_C0001['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td rowspan="3">1</td>
		<td colspan="3" rowspan="3" class="text-left">Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya</td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_a_C0001['kum_usulan_lama'];?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$data_bid_a_C0001['kum_usulan_baru']?></td>
		<td rowspan="3" style="vertical-align: middle;"><?= $jumlah_C0001 ;?></td>
		<td rowspan="3" style="vertical-align: middle;"></td>
		<td rowspan="3" style="vertical-align: middle;"></td>
		<td rowspan="3" style="vertical-align: middle;"></td>
		<td rowspan="3" style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
				
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
		$sql_C0002="select *from usulan_dupaks where dupak_no='C0002' and usulan_no='$no'";
		$data_C0002=mysqli_query($koneksi,$sql_C0002);
		$data_bid_a_C0002=mysqli_fetch_array($data_C0002);
		$jumlah_C0002=$data_bid_a_C0002['kum_usulan_lama']+$data_bid_a_C0002['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Melaksanakan pengembangan hasil pendidikan dan penelitian yang dapat dimanfaatkan oleh
		masyarakat</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_C0002['kum_usulan_lama'];?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$data_bid_a_C0002['kum_usulan_baru']?></td>
		<td rowspan="2" style="vertical-align: middle;"><?= $jumlah_C0002 ;?></td>
		<td rowspan="2" style="vertical-align: middle;"></td>
		<td rowspan="2" style="vertical-align: middle;"></td>
		<td rowspan="2" style="vertical-align: middle;"></td>
		<td rowspan="2" style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		$sql_C0003="select *from usulan_dupaks where dupak_no='C0003' and usulan_no='$no'";
		$data_C0003=mysqli_query($koneksi,$sql_C0003);
		$data_bid_a_C0003=mysqli_fetch_array($data_C0003);
		$jumlah_C0003=$data_bid_a_C0003['kum_usulan_lama']+$data_bid_a_C0003['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>1)</td>
		<td class="text-left">Tingkat internasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0003['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0003['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0003?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
		
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0004="select *from usulan_dupaks where dupak_no='C0004' and usulan_no='$no'";
		$data_C0004=mysqli_query($koneksi,$sql_C0004);
		$data_bid_a_C0004=mysqli_fetch_array($data_C0004);
		$jumlah_C0004=$data_bid_a_C0004['kum_usulan_lama']+$data_bid_a_C0004['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>2)</td>
		<td class="text-left">Tingkat nasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0004['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0004['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0004?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0005="select *from usulan_dupaks where dupak_no='C0005' and usulan_no='$no'";
		$data_C0005=mysqli_query($koneksi,$sql_C0005);
		$data_bid_a_C0005=mysqli_fetch_array($data_C0005);
		$jumlah_C0005=$data_bid_a_C0005['kum_usulan_lama']+$data_bid_a_C0005['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>3)</td>
		<td class="text-left">Tingkat lokal</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0005['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0005['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0005?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		$sql_C0006="select *from usulan_dupaks where dupak_no='C0006' and usulan_no='$no'";
		$data_C0006=mysqli_query($koneksi,$sql_C0006);
		$data_bid_a_C0006=mysqli_fetch_array($data_C0006);
		$jumlah_C0006=$data_bid_a_C0006['kum_usulan_lama']+$data_bid_a_C0006['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>1)</td>
		<td class="text-left">Tingkat internasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0006['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0006['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0006?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0007="select *from usulan_dupaks where dupak_no='C0007' and usulan_no='$no'";
		$data_C0007=mysqli_query($koneksi,$sql_C0007);
		$data_bid_a_C0007=mysqli_fetch_array($data_C0007);
		$jumlah_C0007=$data_bid_a_C0007['kum_usulan_lama']+$data_bid_a_C0007['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>2)</td>
		<td class="text-left">Tingkat nasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0007['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0007['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0007?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
		
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0008="select *from usulan_dupaks where dupak_no='C0008' and usulan_no='$no'";
		$data_C0008=mysqli_query($koneksi,$sql_C0008);
		$data_bid_a_C0008=mysqli_fetch_array($data_C0008);
		$jumlah_C0008=$data_bid_a_C0008['kum_usulan_lama']+$data_bid_a_C0008['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>3)</td>
		<td class="text-left">Tingkat lokal</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0008['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0008['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0008?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0009="select *from usulan_dupaks where dupak_no='C0009' and usulan_no='$no'";
		$data_C0009=mysqli_query($koneksi,$sql_C0009);
		$data_bid_a_C0009=mysqli_fetch_array($data_C0009);
		$jumlah_C0009=$data_bid_a_C0009['kum_usulan_lama']+$data_bid_a_C0009['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>4)</td>
		<td class="text-left">Insidental</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0009['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0009['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0009?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		$sql_C0010="select *from usulan_dupaks where dupak_no='C0010' and usulan_no='$no'";
		$data_C0010=mysqli_query($koneksi,$sql_C0010);
		$data_bid_a_C0010=mysqli_fetch_array($data_C0010);
		$jumlah_C0010=$data_bid_a_C0010['kum_usulan_lama']+$data_bid_a_C0010['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>1</td>
		<td colspan="3" class="text-left">Berdasarkan bidang keahlian</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0010['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0010['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0010?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0011="select *from usulan_dupaks where dupak_no='C0011' and usulan_no='$no'";
		$data_C0011=mysqli_query($koneksi,$sql_C0011);
		$data_bid_a_C0011=mysqli_fetch_array($data_C0011);
		$jumlah_C0011=$data_bid_a_C0011['kum_usulan_lama']+$data_bid_a_C0011['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>2</td>
		<td colspan="3" class="text-left">Berdasarkan penugasan lembaga perguruan tinggi</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0011['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0011['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0011?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0012="select *from usulan_dupaks where dupak_no='C0012' and usulan_no='$no'";
		$data_C0012=mysqli_query($koneksi,$sql_C0012);
		$data_bid_a_C0012=mysqli_fetch_array($data_C0012);
		$jumlah_C0012=$data_bid_a_C0012['kum_usulan_lama']+$data_bid_a_C0012['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>3</td>
		<td colspan="3" class="text-left">Berdasarkan fungsi / jabatan</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0012['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0012['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0012?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0013="select *from usulan_dupaks where dupak_no='C0013' and usulan_no='$no'";
		$data_C0013=mysqli_query($koneksi,$sql_C0013);
		$data_bid_a_C0013=mysqli_fetch_array($data_C0013);
		$jumlah_C0013=$data_bid_a_C0013['kum_usulan_lama']+$data_bid_a_C0013['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td rowspan="1">E</td>
		<td colspan="4" class="text-left">Membuat/ menulis karya pengabdian</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0013['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0013['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0013?></td>
		<td></td>
		<td></td>
		<td></td>
		<td>
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0014="select *from usulan_dupaks where dupak_no='C0014' and usulan_no='$no'";
		$data_C0014=mysqli_query($koneksi,$sql_C0014);
		$data_bid_a_C0014=mysqli_fetch_array($data_C0014);
		$jumlah_C0014=$data_bid_a_C0014['kum_usulan_lama']+$data_bid_a_C0014['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>F</td>
		<td colspan="4" class="text-left">Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala/jurnal pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0014['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0014['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0014?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
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
		$sql_C0015="select *from usulan_dupaks where dupak_no='C0015' and usulan_no='$no'";
		$data_C0015=mysqli_query($koneksi,$sql_C0015);
		$data_bid_a_C0015=mysqli_fetch_array($data_C0015);
		$jumlah_C0015=$data_bid_a_C0015['kum_usulan_lama']+$data_bid_a_C0015['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>1</td>
		<td colspan="3" class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0015['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0015['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0015?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$sql_C0016="select *from usulan_dupaks where dupak_no='C0016' and usulan_no='$no'";
		$data_C0016=mysqli_query($koneksi,$sql_C0016);
		$data_bid_a_C0016=mysqli_fetch_array($data_C0016);
		$jumlah_C0016=$data_bid_a_C0016['kum_usulan_lama']+$data_bid_a_C0016['kum_usulan_baru'];
		?>
		<tr class="text-center">
		<td>2</td>
		<td colspan="3" class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah nasional</td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0016['kum_usulan_lama']?></td>
		<td style="vertical-align: middle;"><?=$data_bid_a_C0016['kum_usulan_baru']?></td>
		<td style="vertical-align: middle;"><?=$jumlah_C0016?></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;"></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>usulan/usulan_dupak_c/dupak/C0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
			
		</td>
		</tr>

		<?php
		$sql_total="SELECT
					  SUM(`kum_usulan_lama`) AS kum_lama,
					  SUM(`kum_usulan_baru`) AS kum_baru
					FROM
					  usulan_dupaks
					WHERE usulan_no = '$no'
					  AND LEFT(dupak_no, 1) = 'C'";
		$data_total=mysqli_query($koneksi,$sql_total);
		$data_kum_total=mysqli_fetch_array($data_total);
		$jmlah_kum=$data_kum_total['kum_lama']+$data_kum_total['kum_baru'];
		?>
		<tr>
		</tr>
		<tr style="background-color: #e4e4e4; font-weight: bold;">
		<td colspan="6" class="text-right"><b>JUMLAH BIDANG C</b></td>
		<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_lama']?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$data_kum_total['kum_baru']?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$jmlah_kum?></td>
		<td style="vertical-align: middle;" class="text-center"></td>
		<td style="vertical-align: middle;" class="text-center"></td>
		<td style="vertical-align: middle;" class="text-center"></td>
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
           