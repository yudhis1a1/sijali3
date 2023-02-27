<?php
error_reporting(0);
include "koneksi.php";
?>
<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                         <h4 class="text-themecolor">Usulan JAD : 
						<?php
						 foreach($data_mtk as $mtk)
						 { $mtk->usulan_status_id ;}
						if($mtk->usulan_status_id =='1')
						{
							echo "Draft";
						}elseif($mtk->usulan_status_id =='2')
						{
							echo "Draft Revisi";
						}elseif($mtk->usulan_status_id =='3')
						{
							echo "Usulan Baru";
						}elseif($mtk->usulan_status_id =='4')
						{
							echo "Proses Approval Tim Penilai";
						}elseif($mtk->usulan_status_id =='5')
						{
							echo "Proses Penilaian";
						}elseif($mtk->usulan_status_id =='6')
						{
							echo "Proses Operator Ketenagaan";
						}elseif($mtk->usulan_status_id =='7')
						{
							echo "Proses Dikti";
						}elseif($mtk->usulan_status_id =='8')
						{
							echo "Proses Operator Kepegawaian";
						}else
						{
							echo "Selesai";
						}
						?>
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
                                    <li class="nav-item"> <a class="nav-link "  href="<?= base_url()?>penilai/penilai/penilaian/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link active" href="<?= base_url()?>penilai/penilai/show_matakul/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/show_pendidikan/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>

								    <?php
									$tgl=date('Y-m-d');
									$selisih=$tgl-$pengangkatan_tgl;
									
									if($jabatan_usulan_no=='8' || $jabatan_usulan_no=='11' || $jabatan_usulan_no=='12' || $jabatan_usulan_no=='9' || $jabatan_usulan_no=='10' || $jabatan_usulan_no=='13')
									{
										if($selisih<'8')
										{
									?>
											<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangE/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Tambahan LK/GB</span></a> </li>
									<?php
										}
									}elseif($jabatan_usulan_no=='14' || $jabatan_usulan_no=='15')
									{
										if($selisih>'9' && $selisih<'21')
										{
									?>
											<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/bidangE/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Tambahan LK/GB</span></a> </li>
									<?php	
										}
									}
									?>

                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url()?>penilai/penilai/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
                                    
                            
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                <?php $no_usulan=$data_dasar->no; ?>
                                    <div class="tab-pane active p-20" id="dasar" role="tabpanel" >

 <div class="card">
            <div class="card-body">                              
									<?php
									$nidn="SELECT a.no, a.dosen_no, b.nidn	
											FROM usulans AS a, dosens AS b 
											WHERE a.dosen_no = b.no  AND a.no = '$no'";
									$da_nidn=mysqli_query($koneksi,$nidn);
									$r_nidn=mysqli_fetch_array($da_nidn);
									?>
								 <div class="table-responsive">
								 <table width="100%" class="table color-table info-table" border="1">
								 <thead>
								  <tr>
									  <th colspan="5">
										<h2>Riwayat Pengajaran</h2>
									  </th>
								  </tr>
								  <tr>
									<th>NO</th>
									<th>SEMESTER</th>
									<th>PERGURUAN TINGGI</th>
									<th>MATA KULIAH</th>
								  </tr>
								  </thead>
								  <?php
									$no_matkul=1;
									$q_thn="SELECT * FROM `ajar_dosen` where NIDN='$r_nidn[nidn]' GROUP BY SEMESTER ORDER BY SEMESTER ASC";
									$data_thn=mysqli_query($koneksi,$q_thn);
									while($row_thn=mysqli_fetch_array($data_thn))
									{
									?>
									  <?php 
										$q_detail="SELECT *
												FROM `ajar_dosen`
												WHERE semester = '$row_thn[SEMESTER]'
												AND NIDN='$r_nidn[nidn]' 
												GROUP BY KODEMK";
										$data_detail=mysqli_query($koneksi,$q_detail);
										$cek_row=mysqli_num_rows($data_detail);
										
										if($cek_row>1)
										{
											$cols=$cek_row;
										}else
										{
											$cols=0;
										}
									   ?>
									  <tbody>
									  <tr>
											<td rowspan="<?=$cols?>"><?=$no_matkul;?></td>
											<td rowspan="<?=$cols?>"><?=$row_thn['SEMESTER']?> </td>
											<td rowspan="<?=$cols?>"><?=$row_thn['NMPT']?> </td>
											<?php 
											$pertama="SELECT *
													FROM `ajar_dosen`
													WHERE semester = '$row_thn[SEMESTER]'
													AND NIDN='$r_nidn[nidn]' 
													GROUP BY KODEMK ORDER BY `NMMK` ASC LIMIT 1";
											$data_pertama=mysqli_query($koneksi,$pertama);
											$r_pertama=mysqli_fetch_array($data_pertama);
											?>
											<td><?=$r_pertama['NMMK']?></td>
									   </tr>
									   <?php
										if($cek_row>1)
										{
											$matkul="SELECT *
												FROM `ajar_dosen`
												WHERE semester = '$row_thn[SEMESTER]'
												AND NIDN='$r_nidn[nidn]' 
												GROUP BY KODEMK ORDER BY `NMMK` ASC LIMIT 1,999999 ";
											$data_matkul=mysqli_query($koneksi,$matkul);
											while($r_matkul=mysqli_fetch_array($data_matkul))
											{
											?>
										   <tr>
												<td><?=$r_matkul['NMMK']?></td>
										   </tr>
										   <?php
											}
										}else
										{?>
											<tr>
												<td></td>
										   </tr>
										<?php
										}
										?>
										
									<?php
									$no_matkul++;
									}
									?>
								  
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

<!-- modal tambah matkul -->			
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Tambah Data Matkul:</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url()?>usulan/usulan/tambah_matkul/<?php echo $no; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Matakuliah</label>
						<input type="text" name="matkul" class="form-control" required placeholder="Matakuliah">
					</div>
<div class="form-group">
<label for="berkas">Berkas Upload</label>
<input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000" required>
<p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
</div>    
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
				<button type="submit" class="btn btn-primary">Tambah</button>
			</div>
			</form>
		</div>
	</div>
</div>

								
<!-- Modal Tambah berkas upload -->
<?php 
// $q2_thn="SELECT * FROM `ajar_dosen` where NIDN='$r_nidn[nidn]' GROUP BY SEMESTER ORDER BY SEMESTER ASC";
// $data2_thn=mysqli_query($koneksi,$q2_thn);
// while($row2_thn=mysqli_fetch_array($data2_thn))
// {
?>
<!--
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="tambah<?=$row2_thn['SEMESTER']?>" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url(); ?>usulan/usulan/update_mtk/<?php echo $no; ?>/<?=$jabatan_no?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>Upload File</h3>
				<hr>
				<label for="berkas">Berkas Upload</label>
				<input type="hidden" name="nidn" value="<?=$row2_thn['NIDN']?>">
				<input type="hidden" name="semester" value="<?=$row2_thn['SEMESTER']?>">
                      <input type="file" name="berkas" class="form-control" id="berkas" accept="application/pdf" max="5000">
                      <p class="help-block">Ukuran file maksimal 5MB. Ekstensi .pdf</p>
            </div>
            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">UPLOAD</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                </div>
            </div>
		</form>
	</div>
</div>
</div>
-->
<?php
// }
?>