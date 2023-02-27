<?php
error_reporting(0);
include "koneksi.php";
?>
 
 <!-- row -->
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
							<?php
							$nidn="SELECT a.no, a.dosen_no, b.nidn	
									FROM usulans AS a, dosens AS b 
									WHERE a.dosen_no = b.no  AND a.no = '$no'";
							$da_nidn=mysqli_query($koneksi,$nidn);
							$r_nidn=mysqli_fetch_array($da_nidn);
							?>
							<table class="table color-table info-table" border="1">
							<thead>
								<tr>
								  <th colspan="7">
									<h2>Riwayat Pengajaran</h2>
								  </th>
								</tr>
								<tr>
								<th>NO</th>
								<th>SEMESTER</th>
								<th>KODE MATAKULIAH</th>
								<th>MATA KULIAH</th>
								<th>KODE KELAS</th>
								<th>PERGURUAN TINGGI</th>
								</tr>
							</thead>
							<?php
							$no_matkul=1;
							$q_thn="SELECT SEMESTER,KODEMK,NMMK,KELAS,NMPT FROM `ajar_dosen` where NIDN='$r_nidn[nidn]' ORDER BY SEMESTER,KODEMK,KELAS ASC";
							$data_thn=mysqli_query($koneksi,$q_thn);
							while($row_thn=mysqli_fetch_array($data_thn))
							{
							?>
							  
							<tbody>
							<tr>
								<td><?=$no_matkul;?></td>
								<td><?=$row_thn['SEMESTER']?> </td>
								<td><?=$row_thn['KODEMK']?> </td>
								<td><?=$row_thn['NMMK']?> </td>
								<td><?=$row_thn['KELAS']?> </td>
								<td><?=$row_thn['NMPT']?></td>
							</tr>
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
                <!-- row -->