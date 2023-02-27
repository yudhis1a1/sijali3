<?php
error_reporting(0);
include "koneksi.php";
?>
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
  <div class="card">
            <div class="card-body">    
                               
									<?php
									$nidn="SELECT a.no, a.dosen_no, b.nidn	
											FROM usulans AS a, dosens AS b 
											WHERE a.dosen_no = b.no  AND a.no = '$no_usulan'";
									$da_nidn=mysqli_query($koneksi,$nidn);
									$r_nidn=mysqli_fetch_array($da_nidn);
									?>
								 <div class="table-responsive">
								 <table width="100%" class="table color-table info-table" border="1">
								 <thead>
								  <tr>
									  <th colspan="5">
										<h2>Riwayat Pengajaran  </h2>
									  </th>
								  </tr>
								  <tr>
									<th>NO</th>
									<th>SEMESTER</th>
									<th>PERGURUAN TINGGI</th>
									<th>SK MENGAJAR</th>
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
											<td rowspan="<?=$cols?>" class="text-center"> 
											<?php if(!isset($row_thn['BERKAS'])){ ?> 
												<a href="" data-toggle="modal" id="myLargeModalLabel"  class="btn btn-danger"><i class="fa  fa-search"></i> </a> 
												<?php }else{ ?> 
												<a href="<?= base_url()?>kepegawaian/kepegawaian/download_matkul/<?=$row_thn['BERKAS']?>"  target="_blank" class="btn  btn-success" ><i class="fa fa-search"></i></a> 
												<?php } ?>
											</td>
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

            </div>
                </div>
            </div>