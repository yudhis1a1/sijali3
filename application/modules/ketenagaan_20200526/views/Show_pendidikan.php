<?php
error_reporting(0);
include "koneksi.php";
?>
 
 <!-- row -->
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Riwayat Pendidikan</h4>
                               
								<div class="table-responsive">
							<table class="table color-table info-table">
							<thead>
							<tr>
							  <th colspan="6">
								<h2>Riwayat Pendidikan</h2>
							  </th>
							
								<!-- <?php if($usulan_status_id<>'1' && $usulan_status_id<>'2'){}else{ ?>
								<a href="" data-toggle="modal" data-target="#tambah_pendidikan"  class="btn btn-success"><i class="fa fa-plus-square"> TAMBAH</i></a>
								<?php } ?> -->
								<hr>
							  
							</tr>
							<tr>
								<th>No</th>
								<th>Perguruan Tinggi</th>
								<th>Jenjang</th>
								<th>Bidang Ilmu</th>
								<th>Tahun Lulus</th>
								<!--<th>Aksi</th>-->
							</tr>
							</thead>
							<tbody>
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
										AND a.no = '$no'";
							$da_dosen_no=mysqli_query($koneksi,$dosen_no);
							$r_dosen_no=mysqli_fetch_array($da_dosen_no);
							$no=1;
							$pend="SELECT
										 a.id_sdm,
										 a.thn_lulus,
										 a.nm_sp_formal,
	 									 b.nama_jenjang,
										 c.nama_bidang,
										 a.id_rwy_didik_formal
									FROM
										rwy_pend_formal AS a,
										jenjangs AS b,
										bidang_ilmus AS c 
									WHERE
										a.id_sdm = '$r_dosen_no[dosen_no]' 
										AND a.id_jenj_didik =b.id
										AND a.id_bid_studi=c.kode
										order by a.thn_lulus ASC";
							$da_pend=mysqli_query($koneksi,$pend);
							while($r_pend=mysqli_fetch_array($da_pend))
							{
							?>
							<tr>
								<td>
								<?php echo $no ;?>
								</td>
								<td>
								<?=$r_pend['nm_sp_formal']?>
								</td>
								<td>
								<?=$r_pend['nama_jenjang']?>
								</td>
								<td>
								<?=$r_pend['nama_bidang']?>
								</td>
								<td>
								<?=$r_pend['thn_lulus']?>
								</td>
						
							</tr>

							<?php
								$no++;
								}; 
							?>
							</tbody>
							</table>
						</div>
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- row -->