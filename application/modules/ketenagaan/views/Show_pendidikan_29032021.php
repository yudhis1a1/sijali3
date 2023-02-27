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
							<table class="table color-table info-table">
							<thead>
							<tr>
							  <th colspan="8">
								<h2>Riwayat Pendidikan</h2>
							  </th>
							
								
							  
							</tr>
							<tr>
								<th>No</th>
								<th>Perguruan Tinggi</th>
								<th>Jenjang</th>
								<th>Bidang Ilmu</th>
								<th>Tanggal Lulus</th>
								<th>Tanggal Penerbitan ijazah</th>
								<th>Berkas</th>
								<th>Hapus</th>
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
							$no_pend=1;
							$pend="SELECT 
							b.`no_dosen`,
							f.nama_instansi ,
							b.`institusi_pak`,
							 g. nama_jenjang,
							 d.`nama_bidang`,                   
							 b.`thn_lulus`,
							  b.`tgl_lulus_pak`, 
							 b.`tgl_ijazah_pak` ,
							 b.`id_jenjang_pak`,
							 b.`id_rwy_didik_formal`                     
							 FROM dosens a
							 LEFT JOIN `rwy_pend_pak` b
							 ON a.`no`=b.`no_dosen`
							 LEFT JOIN bidang_ilmus d
							 ON b.`id_bid_studi`=d.`kode` 
							 LEFT JOIN sms e
							 ON b.`id_sms`=e.`id_sms` 
							 LEFT JOIN instansis f
							 ON e.`id_sp`=f.`id_sp`
							 LEFT JOIN jenjangs g
							 ON e.`id_jenj_didik`=g.`id`
							 WHERE a.`no`='$r_dosen_no[dosen_no]' AND b.`id_jenjang_pak` >'22' ORDER BY b.`thn_lulus`,b.`id_jenjang_pak` ASC";
							$da_pend=mysqli_query($koneksi,$pend);
							while($r_pend=mysqli_fetch_array($da_pend))
							{
							?>
							<tr>
								<td>
								<?php echo $no_pend ;?>
								</td>
								<td>
								<?=$r_pend['institusi_pak']?>
								</td>
								<td>
								<?=$r_pend['nama_jenjang']?>
								</td>
								<td>
								<?=$r_pend['nama_bidang']?>
								</td>
								<td>
								<?=$r_pend['tgl_lulus_pak']?>								
								</td>
								<td>
								<?=$r_pend['tgl_ijazah_pak']?>								
								</td>
						        <td>
								<?php
								$cek_q1=$this->db->query("select*from file_rwy_pendidik where id_rwy_didik_formal='$r_pend[id_rwy_didik_formal]' and id_sdm='$r_pend[no_dosen]'")->row();
								?>
								<?php
								if(!isset($cek_q1->ijazah))
								{
								?>
									<a href="#" class="btn btn-xs btn-danger" ><i class="fa  fa-cloud-download"></i>[Scan Ijazah]</a>
								<?php 
								}else
								{
								?>	
									<a href="<?= base_url()?>assets/download_pendidik/<?=$cek_q1->ijazah?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Scan Ijazah]</a>
								<?php
								}
								?>
									<br><br>
								<?php
								if(!isset($cek_q1->transkip))
								{
								?>
									<a href="#" class="btn btn-xs btn-danger" ><i class="fa  fa-cloud-download"></i>[Scan Transkip]</a>
								<?php 
								}else
								{
								?>	
									<a href="<?= base_url()?>assets/download_pendidik/<?=$cek_q1->transkip?>" class="btn btn-xs btn-success" ><i class="fa  fa-cloud-download"></i>[Scan Transkip]</a>
								<?php
								}
								?>
								</td>
								<td class="txt-oflo"><a href="<?php echo base_url().'ketenagaan/ketenagaan/hapus_pendidikan_pak/'.$r_pend[id_rwy_didik_formal].'/'.$no?>" title="Hapus Pendidikan" >
								<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash" ></i> </button></a></td>
								
							</tr>

							<?php
								$no_pend++;
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