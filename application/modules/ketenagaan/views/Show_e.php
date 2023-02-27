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
			if ($usulan_status_id == '1') {
				echo "Draft";
			} elseif ($usulan_status_id == '2') {
				echo "Draft Revisi";
			} elseif ($usulan_status_id == '3') {
				echo "Usulan Baru";
			} elseif ($usulan_status_id == '4') {
				echo "Proses Approval Tim Penilai";
			} elseif ($usulan_status_id == '5') {
				echo "Proses Penilaian";
			} elseif ($usulan_status_id == '6') {
				echo "Proses Operator Ketenagaan";
			} elseif ($usulan_status_id == '7') {
				echo "Proses Dikti";
			} elseif ($usulan_status_id == '8') {
				echo "Proses Operator Kepegawaian";
			} else {
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

				<div class="tab-content tabcontent-border">
					<?php $no_usulan = $data_dasar->no; ?>
					<div class="tab-pane active p-20" id="dasar" role="tabpanel">
						<div class="card-header bg-info">
							<h4 class="m-b-0 text-white">Kegiatan Tambahan LK/GB</h4>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="table-responsive m-t-40">
										<table class="table color-table info-table table-bordered">

											<thead>
												<tr class="text-center">
													<th>NO</th>
													<th colspan="2">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</th>
													<th>JUMLAH</th>
													<th>AKSI</th>
												</tr>
											</thead>
											<tbody>
												<tr class="text-center">
													<td rowspan="5">VI</td>
												</tr>
												<?php
												$je01 = $this->db->query("select *from usulan_dupaks where dupak_no='E0001' and usulan_no='$no'")->num_rows();
												?>
												<tr class="text-center">
													<td style="vertical-align: middle;">A</td>
													<td style="vertical-align: middle;" class="text-left">Mendapatkan Hibah Penelitian Kompetitif (sebagai ketua)</td>
													<td style="vertical-align: middle;">
														<h4><b><?= $je01 ?></b></h4>
													</td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>ketenagaan/usulan_dupak_e/dupak/E0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$je02 = $this->db->query("select *from usulan_dupaks where dupak_no='E0002' and usulan_no='$no'")->num_rows();
												?>
												<tr class="text-center">
													<td style="vertical-align: middle;">B</td>
													<td style="vertical-align: middle;" class="text-left">Membimbing Doktor</td>
													<td style="vertical-align: middle;">
														<h4><b><?= $je02 ?></b></h4>
													</td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>ketenagaan/usulan_dupak_e/dupak/E0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$je03 = $this->db->query("select *from usulan_dupaks where dupak_no='E0003' and usulan_no='$no'")->num_rows();
												?>
												<tr class="text-center">
													<td style="vertical-align: middle;">C</td>
													<td style="vertical-align: middle;" class="text-left">Menguji Doktor</td>
													<td style="vertical-align: middle;">
														<h4><b><?= $je03 ?></b></h4>
													</td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>ketenagaan/usulan_dupak_e/dupak/E0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$je04 = $this->db->query("select *from usulan_dupaks where dupak_no='E0004' and usulan_no='$no'")->num_rows();
												?>
												<tr class="text-center">
													<td style="vertical-align: middle;">D</td>
													<td style="vertical-align: middle;" class="text-left">Menjadi reviewer Jurnal Internasional Bereputasi</td>
													<td style="vertical-align: middle;">
														<h4><b><?= $je04 ?></b></h4>
													</td>
													<td style="vertical-align: middle;">
														<a href="<?= base_url() ?>ketenagaan/usulan_dupak_e/dupak/E0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20"><i class="fa fa-search"></i></a>
													</td>
												</tr>

												<?php
												$sql_total = "SELECT
					  SUM(`kum_usulan_lama`) AS kum_lama,
					  SUM(`kum_usulan_baru`) AS kum_baru
					FROM
					  usulan_dupaks
					WHERE usulan_no = '$no'
					  AND LEFT(dupak_no, 1) = 'E'";
												$data_total = mysqli_query($koneksi, $sql_total);
												$data_kum_total = mysqli_fetch_array($data_total);
												$jmlah_kum = $data_kum_total['kum_lama'] + $data_kum_total['kum_baru'];
												?>
												<tr>
												</tr>
												<tr style="background-color: #e4e4e4; font-weight: bold;">
													<td colspan="10"></td>
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