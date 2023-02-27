<?php
error_reporting(0);
include "koneksi.php";
?>
<div class="row">





	<table class="cust-table cust-table-bordered" id="bsyarat">

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
			<tr>
				<td width="3%" rowspan="48">
					<div align="center">III</div>
				</td>
				<td colspan="5"><strong>PELAKSANAAN PENELITIAN</strong></td>
				<td width="8%"></td>
				<td width="7%"></td>
				<td width="8%"></td>
				<td width="8%"></td>
				<td width="8%"></td>
				<td width="7%"></td>
				<td width="6%"></td>
			</tr>
			<tr>
				<td width="2%">
					<div align="justify"><strong>1.</strong></div>
				</td>
				<td width="43%" colspan="4">
					<div align="justify"><strong>Menghasilkan karya ilmiah sesuai
							dengan bidang ilmunya: </strong></div>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>
					<div align="justify">a. </div>
				</td>
				<td colspan="4">
					<div align="justify">Hasil penelitian atau hasil pemikiran
						yang dipublikasikan dalam bentuk
						buku </div>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_b0002 = "select *from usulan_dupaks where dupak_no='B0002' and usulan_no='$no'";
			$data_b0002 = mysqli_query($koneksi, $sql_b0002);
			$data_bid_b_b0002 = mysqli_fetch_array($data_b0002);
			$jumlah_b0002 = $data_bid_b_b0002['kum_usulan_lama'] + $data_bid_b_b0002['kum_usulan_baru'];
			$kum_nilai_b0002 = $data_bid_b_b0002['kum_penilai_lama'] + $data_bid_b_b0002['kum_penilai_baru'];
			?>
			<?php
			$cek_B0002 = "select *from usulan_dupak_details where dupak_no='B0002' and usulan_no='$no'";
			$da_B0002 = mysqli_query($koneksi, $cek_B0002);
			$r_B0002 = mysqli_fetch_array($da_B0002);

			if ($r_B0002['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}

			?>
			<tr class="text-center" bgcolor="<?= $warna ?>" id="trb2">
				<td>
					<div align="justify"></div>
				</td>
				<td colspan="4">
					<div align="justify"> 1) Buku referensi </div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0002['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0002['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0002; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0002['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0002['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0002 ?></td>
				<td style="white-space: nowrap"><a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0002['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0002" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0002" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="2"><i class=" fa fa-plus-square"></i></a>
						<div id="div2" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0002['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0002['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0002['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0002" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0002['valid'] ?>" name="bwarna">

				</td>
			</tr>
			<?php
			$sql_b0001 = "select *from usulan_dupaks where dupak_no='B0001' and usulan_no='$no'";
			$data_b0001 = mysqli_query($koneksi, $sql_b0001);
			$data_bid_b_b0001 = mysqli_fetch_array($data_b0001);
			$jumlah_b0001 = $data_bid_b_b0001['kum_usulan_lama'] + $data_bid_b_b0001['kum_usulan_baru'];
			$kum_nilai_b0001 = $data_bid_b_b0001['kum_penilai_lama'] + $data_bid_b_b0001['kum_penilai_baru'];
			?>
			<?php
			$cek_B0001 = "select *from usulan_dupak_details where dupak_no='B0001' and usulan_no='$no'";
			$da_B0001 = mysqli_query($koneksi, $cek_B0001);
			$r_B0001 = mysqli_fetch_array($da_B0001);

			if ($r_B0001['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}

			?>
			<tr class="text-center" bgcolor="<?= $warna ?>" id="trb1">

				<td>
					<div align="justify"></div>
				</td>
				<td colspan="4">
					<div align="justify">2) Monograf</div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0001['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0001['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0001; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0001['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0001['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0001 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0001['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0001" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0001" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="1"><i class=" fa fa-plus-square"></i></a>
						<div id="div1" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0001['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0001['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0001['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0001" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0001['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<tr>
				<td>
					<div align="justify">b. </div>
				</td>
				<td colspan="4">
					<div align="justify">Hasil penelitian atau hasil pemikiran
						dalam buku yang dipublikasikan dan
						berisi berbagai tulisan dari berbagai
						penulis (book chapter): </div>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_b0003 = "select *from usulan_dupaks where dupak_no='B0003' and usulan_no='$no'";
			$data_b0003 = mysqli_query($koneksi, $sql_b0003);
			$data_bid_b_b0003 = mysqli_fetch_array($data_b0003);
			$jumlah_b0003 = $data_bid_b_b0003['kum_usulan_lama'] + $data_bid_b_b0003['kum_usulan_baru'];
			$kum_nilai_b0003 = $data_bid_b_b0003['kum_penilai_lama'] + $data_bid_b_b0003['kum_penilai_baru'];
			?>
			<?php
			$cek_B0003 = "select *from usulan_dupak_details where dupak_no='B0003' and usulan_no='$no'";
			$da_B0003 = mysqli_query($koneksi, $cek_B0003);
			$r_B0003 = mysqli_fetch_array($da_B0003);

			if ($r_B0003['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}

			?>
			<tr class="text-center" bgcolor="<?= $warna ?>" id="trb3">

				<td></td>
				<td colspan="4"> 1) Internasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0003['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0003['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0003; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0003['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0003['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0003 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0003['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0003" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0003" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="3"><i class=" fa fa-plus-square"></i></a>
						<div id="div3" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0003['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0003['user_val'] ?></p>
						</div>

					<?php } ?>
					<?php if ($data_bid_b_b0003['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0003" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0003['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0037 = "select *from usulan_dupaks where dupak_no='B0037' and usulan_no='$no'";
			$data_b0037 = mysqli_query($koneksi, $sql_b0037);
			$data_bid_b_b0037 = mysqli_fetch_array($data_b0037);
			$jumlah_b0037 = $data_bid_b_b0037['kum_usulan_lama'] + $data_bid_b_b0037['kum_usulan_baru'];
			$kum_nilai_b0037 = $data_bid_b_b0037['kum_penilai_lama'] + $data_bid_b_b0037['kum_penilai_baru'];
			?>
			<?php
			$cek_B0037 = "select *from usulan_dupak_details where dupak_no='B0037' and usulan_no='$no'";
			$da_B0037 = mysqli_query($koneksi, $cek_B0037);
			$r_B0037 = mysqli_fetch_array($da_B0037);

			if ($r_B0037['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb37">
				<td></td>
				<td colspan="4"> 2) Nasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0037['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0037['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0037; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0037['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0037['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0037 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0037/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0037['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0037" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0037" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="37"><i class=" fa fa-plus-square"></i></a>
						<div id="div37" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0037['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0037['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0037['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0037" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0037['valid'] ?>" name="bwarna">
				</td>
			</tr>

			<tr>
				<td>c.</td>
				<td colspan="4"> Hasil penelitian atau hasil pemikiran
					yang dipublikasikan: </td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_b0004 = "select *from usulan_dupaks where dupak_no='B0004' and usulan_no='$no'";
			$data_b0004 = mysqli_query($koneksi, $sql_b0004);
			$data_bid_b_b0004 = mysqli_fetch_array($data_b0004);
			$jumlah_b0004 = $data_bid_b_b0004['kum_usulan_lama'] + $data_bid_b_b0004['kum_usulan_baru'];
			$kum_nilai_b0004 = $data_bid_b_b0004['kum_penilai_lama'] + $data_bid_b_b0004['kum_penilai_baru'];
			?>
			<?php
			$cek_B0004 = "select *from usulan_dupak_details where dupak_no='B0004' and usulan_no='$no'";
			$da_B0004 = mysqli_query($koneksi, $cek_B0004);
			$r_B0004 = mysqli_fetch_array($da_B0004);

			if ($r_B0004['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb4">
				<td></td>
				<td colspan="4">
					<div align="justify">1) Jurnal internasional bereputasi
						(terindeks pada database
						internasional bereputasi dan
						berfaktor dampak) </div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0004['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0004['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0004; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0004['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0004['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0004 ?></td>
				<td><a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0004['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0004" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0004" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="4"><i class=" fa fa-plus-square"></i></a>
						<div id="div4" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0004['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0004['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0004['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0004" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0004['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0025 = "select *from usulan_dupaks where dupak_no='B0025' and usulan_no='$no'";
			$data_b0025 = mysqli_query($koneksi, $sql_b0025);
			$data_bid_b_b0025 = mysqli_fetch_array($data_b0025);
			$jumlah_b0025 = $data_bid_b_b0025['kum_usulan_lama'] + $data_bid_b_b0025['kum_usulan_baru'];
			$kum_nilai_b0025 = $data_bid_b_b0025['kum_penilai_lama'] + $data_bid_b_b0025['kum_penilai_baru'];
			?>
			<?php
			$cek_B0025 = "select *from usulan_dupak_details where dupak_no='B0025' and usulan_no='$no'";
			$da_B0025 = mysqli_query($koneksi, $cek_B0025);
			$r_B0025 = mysqli_fetch_array($da_B0025);

			if ($r_B0025['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb25">
				<td></td>
				<td colspan="4">
					<div align="justify">2) Jurnal internasional terindeks pada
						basis data internasional bereputasi </div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0025['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0025['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0025; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0025['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0025['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0025 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0025/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0025['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0025" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0025" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="25"><i class=" fa fa-plus-square"></i></a>
						<div id="div25" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0025['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0025['user_val'] ?></p>
						</div>

					<?php } ?>
					<?php if ($data_bid_b_b0025['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0025" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0025['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0026 = "select *from usulan_dupaks where dupak_no='B0026' and usulan_no='$no'";
			$data_b0026 = mysqli_query($koneksi, $sql_b0026);
			$data_bid_b_b0026 = mysqli_fetch_array($data_b0026);
			$jumlah_b0026 = $data_bid_b_b0026['kum_usulan_lama'] + $data_bid_b_b0026['kum_usulan_baru'];
			$kum_nilai_b0026 = $data_bid_b_b0026['kum_penilai_lama'] + $data_bid_b_b0026['kum_penilai_baru'];
			?>
			<?php
			$cek_B0026 = "select *from usulan_dupak_details where dupak_no='B0026' and usulan_no='$no'";
			$da_B0026 = mysqli_query($koneksi, $cek_B0026);
			$r_B0026 = mysqli_fetch_array($da_B0026);

			if ($r_B0026['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb26">
				<td height="31"></td>
				<td colspan="4">
					<div align="justify">3) Jurnal internasional terindeks pada
						basis data internasional di luar
					</div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0026['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0026['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0026; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0026['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0026['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0026 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0026/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0026['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0026" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0026" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="26"><i class=" fa fa-plus-square"></i></a>
						<div id="div26" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0026['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0026['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0026['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0026" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0026['valid'] ?>" name="bwarna">
				</td>
			</tr>

			<?php
			$sql_b0005 = "select *from usulan_dupaks where dupak_no='B0005' and usulan_no='$no'";
			$data_b0005 = mysqli_query($koneksi, $sql_b0005);
			$data_bid_b_b0005 = mysqli_fetch_array($data_b0005);
			$jumlah_b0005 = $data_bid_b_b0005['kum_usulan_lama'] + $data_bid_b_b0005['kum_usulan_baru'];
			$kum_nilai_b0005 = $data_bid_b_b0005['kum_penilai_lama'] + $data_bid_b_b0005['kum_penilai_baru'];
			?>
			<?php
			$cek_B0005 = "select *from usulan_dupak_details where dupak_no='B0005' and usulan_no='$no'";
			$da_B0005 = mysqli_query($koneksi, $cek_B0005);
			$r_B0005 = mysqli_fetch_array($da_B0005);

			if ($r_B0005['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb5">
				<td></td>
				<td colspan="4">
					<div align="justify">4) Jurnal Nasional terakreditasi Dikti atau Jurnal nasional terakreditasi
						Kemenristekdikti peringkat 1 dan
						2 </div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0005['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0005['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0005; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0005['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0005['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0005 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0005['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0005" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0005" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="5"><i class=" fa fa-plus-square"></i></a>
						<div id="div5" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0005['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0005['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0005['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0005" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0005['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0006 = "select *from usulan_dupaks where dupak_no='B0006' and usulan_no='$no'";
			$data_b0006 = mysqli_query($koneksi, $sql_b0006);
			$data_bid_b_b0006 = mysqli_fetch_array($data_b0006);
			$jumlah_b0006 = $data_bid_b_b0006['kum_usulan_lama'] + $data_bid_b_b0006['kum_usulan_baru'];
			$kum_nilai_b0006 = $data_bid_b_b0006['kum_penilai_lama'] + $data_bid_b_b0006['kum_penilai_baru'];
			?>
			<?php
			$cek_B0006 = "select *from usulan_dupak_details where dupak_no='B0006' and usulan_no='$no'";
			$da_B0006 = mysqli_query($koneksi, $cek_B0006);
			$r_B0006 = mysqli_fetch_array($da_B0006);

			if ($r_B0006['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb6">
				<td></td>
				<td colspan="4">5) a) Jurnal Nasional berbahasa Inggris atau bahasa resmi (PBB) terindeks pada basis data yang diakui Kemenristekdikti atau Jurnal nasional terakreditasi
					peringkat 3 dan 4 </td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0006['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0006['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0006; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0006['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0006['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0006 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0006['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0006" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0006" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="6"><i class=" fa fa-plus-square"></i></a>
						<div id="div6" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0006['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0006['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0006['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0006" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0006['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0007 = "select *from usulan_dupaks where dupak_no='B0007' and usulan_no='$no'";
			$data_b0007 = mysqli_query($koneksi, $sql_b0007);
			$data_bid_b_b0007 = mysqli_fetch_array($data_b0007);
			$jumlah_b0007 = $data_bid_b_b0007['kum_usulan_lama'] + $data_bid_b_b0007['kum_usulan_baru'];
			$kum_nilai_b0007 = $data_bid_b_b0007['kum_penilai_lama'] + $data_bid_b_b0007['kum_penilai_baru'];
			?>
			<?php
			$cek_B0007 = "select *from usulan_dupak_details where dupak_no='B0007' and usulan_no='$no'";
			$da_B0007 = mysqli_query($koneksi, $cek_B0007);
			$r_B0007 = mysqli_fetch_array($da_B0007);

			if ($r_B0007['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb7">
				<td></td>
				<td colspan="4">b) Jurnal Nasional berbahasa
					Indonesia terindeks pada basis
					data yang diakui
					Kemenristekdikti, contohnya:
					akreditasi peringkat 5 dan 6</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0007['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0007['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0007; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0007['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0007['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0007 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0007['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0007" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0007" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="7"><i class=" fa fa-plus-square"></i></a>
						<div id="div7" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0007['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0007['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0007['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0007" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0007['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0038 = "select *from usulan_dupaks where dupak_no='B0038' and usulan_no='$no'";
			$data_b0038 = mysqli_query($koneksi, $sql_b0038);
			$data_bid_b_b0038 = mysqli_fetch_array($data_b0038);
			$jumlah_b0038 = $data_bid_b_b0038['kum_usulan_lama'] + $data_bid_b_b0038['kum_usulan_baru'];
			$kum_nilai_b0038 = $data_bid_b_b0038['kum_penilai_lama'] + $data_bid_b_b0038['kum_penilai_baru'];
			?>
			<?php
			$cek_B0038 = "select *from usulan_dupak_details where dupak_no='B0038' and usulan_no='$no'";
			$da_B0038 = mysqli_query($koneksi, $cek_B0038);
			$r_B0038 = mysqli_fetch_array($da_B0038);

			if ($r_B0038['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb38">
				<td></td>
				<td colspan="4">6) Jurnal Nasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0038['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0038['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0038; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0038['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0038['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0038 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0038/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0038['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0038" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0038" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="38"><i class=" fa fa-plus-square"></i></a>
						<div id="div38" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0038['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0038['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0038['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0038" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0038['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0024 = "select *from usulan_dupaks where dupak_no='B0024' and usulan_no='$no'";
			$data_b0024 = mysqli_query($koneksi, $sql_b0024);
			$data_bid_b_b0024 = mysqli_fetch_array($data_b0024);
			$jumlah_b0024 = $data_bid_b_b0024['kum_usulan_lama'] + $data_bid_b_b0024['kum_usulan_baru'];
			$kum_nilai_b0024 = $data_bid_b_b0024['kum_penilai_lama'] + $data_bid_b_b0024['kum_penilai_baru'];
			?>
			<?php
			$cek_B0024 = "select *from usulan_dupak_details where dupak_no='B0024' and usulan_no='$no'";
			$da_B0024 = mysqli_query($koneksi, $cek_B0024);
			$r_B0024 = mysqli_fetch_array($da_B0024);

			if ($r_B0024['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb24">
				<td></td>
				<td colspan="4">7) Jurnal ilmiah yang ditulis dalam
					Bahasa Resmi PBB namun tidak
					memenuhi syarat-syarat sebagai
					jurnal ilmiah internasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0024['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0024['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0024; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0024['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0024['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0024 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0024/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0024['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0024" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0024" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="24"><i class=" fa fa-plus-square"></i></a>
						<div id="div24" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0024['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0024['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0024['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0024" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0024['valid'] ?>" name="bwarna">
				</td>
			</tr>

			<tr>
				<td><strong>2</strong></td>
				<td colspan="4"><strong>Hasil penelitian atau hasil pemikiran
						yang didesiminasikan </strong></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>a.</td>
				<td colspan="4"> Dipresentasikan secara oral dan
					dimuat dalam prosiding yang
					dipublikasikan (ber ISSN/ISBN):</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_b0035 = "select *from usulan_dupaks where dupak_no='B0035' and usulan_no='$no'";
			$data_b0035 = mysqli_query($koneksi, $sql_b0035);
			$data_bid_b_b0035 = mysqli_fetch_array($data_b0035);
			$jumlah_b0035 = $data_bid_b_b0035['kum_usulan_lama'] + $data_bid_b_b0035['kum_usulan_baru'];
			$kum_nilai_b0035 = $data_bid_b_b0035['kum_penilai_lama'] + $data_bid_b_b0035['kum_penilai_baru'];
			?>
			<?php
			$cek_B0035 = "select *from usulan_dupak_details where dupak_no='B0035' and usulan_no='$no'";
			$da_B0035 = mysqli_query($koneksi, $cek_B0035);
			$r_B0035 = mysqli_fetch_array($da_B0035);

			if ($r_B0035['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb35">
				<td></td>
				<td colspan="4">1). Internasional terindeks pada
					Scimagojr dan Scopus </td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0035['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0035['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0035; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0035['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0035['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0035 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0035/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0035['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0035" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0035" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="35"><i class=" fa fa-plus-square"></i></a>
						<div id="div35" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0035['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0035['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0036['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0036" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0035['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0036 = "select *from usulan_dupaks where dupak_no='B0036' and usulan_no='$no'";
			$data_b0036 = mysqli_query($koneksi, $sql_b0036);
			$data_bid_b_b0036 = mysqli_fetch_array($data_b0036);
			$jumlah_b0036 = $data_bid_b_b0036['kum_usulan_lama'] + $data_bid_b_b0036['kum_usulan_baru'];
			$kum_nilai_b0036 = $data_bid_b_b0036['kum_penilai_lama'] + $data_bid_b_b0036['kum_penilai_baru'];
			?>
			<?php
			$cek_B0036 = "select *from usulan_dupak_details where dupak_no='B0036' and usulan_no='$no'";
			$da_B0036 = mysqli_query($koneksi, $cek_B0036);
			$r_B0036 = mysqli_fetch_array($da_B0036);

			if ($r_B0036['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb36">
				<td></td>
				<td colspan="4">2). Internasional terindeks pada
					SCOPUS, IEEE Explore, SPIE</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0036['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0036['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0036; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0036['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0036['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0036 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0036/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0036['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0036" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0036" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="36"><i class=" fa fa-plus-square"></i></a>
						<div id="div36" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0036['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0036['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0036['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0036" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0036['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0034 = "select *from usulan_dupaks where dupak_no='B0034' and usulan_no='$no'";
			$data_b0034 = mysqli_query($koneksi, $sql_b0034);
			$data_bid_b_b0034 = mysqli_fetch_array($data_b0034);
			$jumlah_b0034 = $data_bid_b_b0034['kum_usulan_lama'] + $data_bid_b_b0034['kum_usulan_baru'];
			$kum_nilai_b0034 = $data_bid_b_b0034['kum_penilai_lama'] + $data_bid_b_b0034['kum_penilai_baru'];
			?>
			<?php
			$cek_B0034 = "select *from usulan_dupak_details where dupak_no='B0034' and usulan_no='$no'";
			$da_B0034 = mysqli_query($koneksi, $cek_B0034);
			$r_B0034 = mysqli_fetch_array($da_B0034);

			if ($r_B0034['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb34">
				<td></td>
				<td colspan="4">3). Internasional </td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0034['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0034['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0034; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0034['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0034['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0034 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0034/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0034['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0034" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0034" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="34"><i class=" fa fa-plus-square"></i></a>
						<div id="div34" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0034['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0034['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0034['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0034" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0034['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0033 = "select *from usulan_dupaks where dupak_no='B0033' and usulan_no='$no'";
			$data_b0033 = mysqli_query($koneksi, $sql_b0033);
			$data_bid_b_b0033 = mysqli_fetch_array($data_b0033);
			$jumlah_b0033 = $data_bid_b_b0033['kum_usulan_lama'] + $data_bid_b_b0033['kum_usulan_baru'];
			$kum_nilai_b0033 = $data_bid_b_b0033['kum_penilai_lama'] + $data_bid_b_b0033['kum_penilai_baru'];
			?>
			<?php
			$cek_B0033 = "select *from usulan_dupak_details where dupak_no='B0033' and usulan_no='$no'";
			$da_B0033 = mysqli_query($koneksi, $cek_B0033);
			$r_B0033 = mysqli_fetch_array($da_B0033);

			if ($r_B0033['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb33">
				<td></td>
				<td colspan="4">4). Nasional </td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0033['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0033['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0033; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0033['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0033['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0033 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0033/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0033['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0033" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0033" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="33"><i class=" fa fa-plus-square"></i></a>
						<div id="div33" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0033['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0033['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0033['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0033" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0033['valid'] ?>" name="bwarna">
				</td>
			</tr>

			<tr>
				<td>b.</td>
				<td colspan="4"> Disajikan dalam bentuk poster dan
					dimuat dalam prosiding yang
					dipublikasikan: </td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_b0031 = "select *from usulan_dupaks where dupak_no='B0031' and usulan_no='$no'";
			$data_b0031 = mysqli_query($koneksi, $sql_b0031);
			$data_bid_b_b0031 = mysqli_fetch_array($data_b0031);
			$jumlah_b0031 = $data_bid_b_b0031['kum_usulan_lama'] + $data_bid_b_b0031['kum_usulan_baru'];
			$kum_nilai_b0031 = $data_bid_b_b0031['kum_penilai_lama'] + $data_bid_b_b0031['kum_penilai_baru'];
			?>
			<?php
			$cek_B0031 = "select *from usulan_dupak_details where dupak_no='B0031' and usulan_no='$no'";
			$da_B0031 = mysqli_query($koneksi, $cek_B0031);
			$r_B0031 = mysqli_fetch_array($da_B0031);

			if ($r_B0031['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb31">
				<td></td>
				<td colspan="4">1). Internasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0031['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0031['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0031; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0031['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0031['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0031 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0031/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0031['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0031" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0031" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="31"><i class=" fa fa-plus-square"></i></a>
						<div id="div31" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0031['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0031['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0031['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0031" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0031['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0032 = "select *from usulan_dupaks where dupak_no='B0032' and usulan_no='$no'";
			$data_b0032 = mysqli_query($koneksi, $sql_b0032);
			$data_bid_b_b0032 = mysqli_fetch_array($data_b0032);
			$jumlah_b0032 = $data_bid_b_b0032['kum_usulan_lama'] + $data_bid_b_b0032['kum_usulan_baru'];
			$kum_nilai_b0032 = $data_bid_b_b0032['kum_penilai_lama'] + $data_bid_b_b0032['kum_penilai_baru'];
			?>
			<?php
			$cek_B0032 = "select *from usulan_dupak_details where dupak_no='B0032' and usulan_no='$no'";
			$da_B0032 = mysqli_query($koneksi, $cek_B0032);
			$r_B0032 = mysqli_fetch_array($da_B0032);

			if ($r_B0032['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb32">
				<td></td>
				<td colspan="4">2). Nasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0032['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0032['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0032; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0032['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0032['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0032 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0032/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0032['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0032" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0032" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="32"><i class=" fa fa-plus-square"></i></a>
						<div id="div32" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0032['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0032['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0032['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0032" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0032['valid'] ?>" name="bwarna">
				</td>
			</tr>

			<tr>
				<td>c.</td>
				<td colspan="4">Disajikan dalam seminar/simposium/
					lokakarya, tetapi tidak dimuat dalam
					prosiding yang dipublikasikan: </td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_b0029 = "select *from usulan_dupaks where dupak_no='B0029' and usulan_no='$no'";
			$data_b0029 = mysqli_query($koneksi, $sql_b0029);
			$data_bid_b_b0029 = mysqli_fetch_array($data_b0029);
			$jumlah_b0029 = $data_bid_b_b0029['kum_usulan_lama'] + $data_bid_b_b0029['kum_usulan_baru'];
			$kum_nilai_b0029 = $data_bid_b_b0029['kum_penilai_lama'] + $data_bid_b_b0029['kum_penilai_baru'];
			?>
			<?php
			$cek_B0029 = "select *from usulan_dupak_details where dupak_no='B0029' and usulan_no='$no'";
			$da_B0029 = mysqli_query($koneksi, $cek_B0029);
			$r_B0029 = mysqli_fetch_array($da_B0029);

			if ($r_B0029['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb29">
				<td></td>
				<td colspan="4">1) Internasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0029['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0029['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0029; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0029['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0029['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0029 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0029/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0029['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0029" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0029" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="29"><i class=" fa fa-plus-square"></i></a>
						<div id="div29" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0029['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0029['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0029['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0029" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0029['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0030 = "select *from usulan_dupaks where dupak_no='B0030' and usulan_no='$no'";
			$data_b0030 = mysqli_query($koneksi, $sql_b0030);
			$data_bid_b_b0030 = mysqli_fetch_array($data_b0030);
			$jumlah_b0030 = $data_bid_b_b0030['kum_usulan_lama'] + $data_bid_b_b0030['kum_usulan_baru'];
			$kum_nilai_b0030 = $data_bid_b_b0030['kum_penilai_lama'] + $data_bid_b_b0030['kum_penilai_baru'];
			?>
			<?php
			$cek_B0030 = "select *from usulan_dupak_details where dupak_no='B0030' and usulan_no='$no'";
			$da_B0030 = mysqli_query($koneksi, $cek_B0030);
			$r_B0030 = mysqli_fetch_array($da_B0030);

			if ($r_B0030['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb30">
				<td></td>
				<td colspan="4">2) Nasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0030['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0030['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0030; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0030['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0030['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0030 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0030/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0030['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0030" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0030" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="30"><i class=" fa fa-plus-square"></i></a>
						<div id="div30" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0030['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0030['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0030['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0030" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0030['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<tr>
				<td>d.</td>
				<td colspan="4">Hasil penelitian/pemikiran yang
					tidak disajikan dalam seminar/simposium/ lokakarya, tetapi dimuat
					dalam prosiding: </td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_b0027 = "select *from usulan_dupaks where dupak_no='B0027' and usulan_no='$no'";
			$data_b0027 = mysqli_query($koneksi, $sql_b0027);
			$data_bid_b_b0027 = mysqli_fetch_array($data_b0027);
			$jumlah_b0027 = $data_bid_b_b0027['kum_usulan_lama'] + $data_bid_b_b0027['kum_usulan_baru'];
			$kum_nilai_b0027 = $data_bid_b_b0027['kum_penilai_lama'] + $data_bid_b_b0027['kum_penilai_baru'];
			?>
			<?php
			$cek_B0027 = "select *from usulan_dupak_details where dupak_no='B0027' and usulan_no='$no'";
			$da_B0027 = mysqli_query($koneksi, $cek_B0027);
			$r_B0027 = mysqli_fetch_array($da_B0027);

			if ($r_B0027['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb27">
				<td></td>
				<td colspan="4">1) Internasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0027['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0027['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0027; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0027['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0027['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0027 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0027/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0027['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0027" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0027" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="27"><i class=" fa fa-plus-square"></i></a>
						<div id="div27" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0027['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0027['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0027['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0027" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0027['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0028 = "select *from usulan_dupaks where dupak_no='B0028' and usulan_no='$no'";
			$data_b0028 = mysqli_query($koneksi, $sql_b0028);
			$data_bid_b_b0028 = mysqli_fetch_array($data_b0028);
			$jumlah_b0028 = $data_bid_b_b0028['kum_usulan_lama'] + $data_bid_b_b0028['kum_usulan_baru'];
			$kum_nilai_b0028 = $data_bid_b_b0028['kum_penilai_lama'] + $data_bid_b_b0028['kum_penilai_baru'];
			?>
			<?php
			$cek_B0028 = "select *from usulan_dupak_details where dupak_no='B0028' and usulan_no='$no'";
			$da_B0028 = mysqli_query($koneksi, $cek_B0028);
			$r_B0028 = mysqli_fetch_array($da_B0028);

			if ($r_B0028['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb28">
				<td></td>
				<td colspan="4">2) Nasional</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0028['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0028['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0028; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0028['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0028['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0028 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0028/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0028['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0028" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0028" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="28"><i class=" fa fa-plus-square"></i></a>
						<div id="div28" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0028['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0028['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0028['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0028" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0028['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0011 = "select *from usulan_dupaks where dupak_no='B0011' and usulan_no='$no'";
			$data_b0011 = mysqli_query($koneksi, $sql_b0011);
			$data_bid_b_b0011 = mysqli_fetch_array($data_b0011);
			$jumlah_b0011 = $data_bid_b_b0011['kum_usulan_lama'] + $data_bid_b_b0011['kum_usulan_baru'];
			$kum_nilai_b0011 = $data_bid_b_b0011['kum_penilai_lama'] + $data_bid_b_b0011['kum_penilai_baru'];
			?>
			<?php
			$cek_B0011 = "select *from usulan_dupak_details where dupak_no='B0011' and usulan_no='$no'";
			$da_B0011 = mysqli_query($koneksi, $cek_B0011);
			$r_B0011 = mysqli_fetch_array($da_B0011);

			if ($r_B0011['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb11">
				<td>e.</td>
				<td colspan="4">Hasil penelitian/pemikiran yang
					disajikan dalam koran/majalah
					populer/umum</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0011['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0011['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0011; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0011['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0011['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0011 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0011['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0011" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0011" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="11"><i class=" fa fa-plus-square"></i></a>
						<div id="div11" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0011['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0011['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0011['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0011" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0011['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0012 = "select *from usulan_dupaks where dupak_no='B0012' and usulan_no='$no'";
			$data_b0012 = mysqli_query($koneksi, $sql_b0012);
			$data_bid_b_b0012 = mysqli_fetch_array($data_b0012);
			$jumlah_b0012 = $data_bid_b_b0012['kum_usulan_lama'] + $data_bid_b_b0012['kum_usulan_baru'];
			$kum_nilai_b0012 = $data_bid_b_b0012['kum_penilai_lama'] + $data_bid_b_b0012['kum_penilai_baru'];
			?>
			<?php
			$cek_B0012 = "select *from usulan_dupak_details where dupak_no='B0012' and usulan_no='$no'";
			$da_B0012 = mysqli_query($koneksi, $cek_B0012);
			$r_B0012 = mysqli_fetch_array($da_B0012);

			if ($r_B0012['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb12">
				<td><strong>3.</strong></td>
				<td colspan="4">
					<div align="justify"><strong>Hasil penelitian atau pemikiran atau
							kerjasama industri yang tidak
							dipublikasikan (tersimpan dalam
							perpustakaan) yang dilakukan secara
							melembaga.</strong></div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0012['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0012['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0012; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0012['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0012['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0012 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0012['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0012" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0012" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="12"><i class=" fa fa-plus-square"></i></a>
						<div id="div12" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0012['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0012['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0012['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0012" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0012['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0013 = "select *from usulan_dupaks where dupak_no='B0013' and usulan_no='$no'";
			$data_b0013 = mysqli_query($koneksi, $sql_b0013);
			$data_bid_b_b0013 = mysqli_fetch_array($data_b0013);
			$jumlah_b0013 = $data_bid_b_b0013['kum_usulan_lama'] + $data_bid_b_b0013['kum_usulan_baru'];
			$kum_nilai_b0013 = $data_bid_b_b0013['kum_penilai_lama'] + $data_bid_b_b0013['kum_penilai_baru'];
			?>
			<?php
			$cek_B0013 = "select *from usulan_dupak_details where dupak_no='B0013' and usulan_no='$no'";
			$da_B0013 = mysqli_query($koneksi, $cek_B0013);
			$r_B0013 = mysqli_fetch_array($da_B0013);

			if ($r_B0013['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb13">
				<td><strong>4.</strong></td>
				<td colspan="4">
					<div align="justify"><strong>Menerjemahkan/menyadur buku ilmiah
							yang diterbitkan (ber ISBN)</strong></div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0013['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0013['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0013; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0013['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0013['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0013 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0013['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0013" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0013" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="13"><i class=" fa fa-plus-square"></i></a>
						<div id="div13" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0013['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0013['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0013['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0013" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0013['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0014 = "select *from usulan_dupaks where dupak_no='B0014' and usulan_no='$no'";
			$data_b0014 = mysqli_query($koneksi, $sql_b0014);
			$data_bid_b_b0014 = mysqli_fetch_array($data_b0014);
			$jumlah_b0014 = $data_bid_b_b0014['kum_usulan_lama'] + $data_bid_b_b0014['kum_usulan_baru'];
			$kum_nilai_b0014 = $data_bid_b_b0014['kum_penilai_lama'] + $data_bid_b_b0014['kum_penilai_baru'];
			?>
			<?php
			$cek_B0014 = "select *from usulan_dupak_details where dupak_no='B0014' and usulan_no='$no'";
			$da_B0014 = mysqli_query($koneksi, $cek_B0014);
			$r_B0014 = mysqli_fetch_array($da_B0014);

			if ($r_B0014['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb14">
				<td><strong>5.</strong></td>
				<td colspan="4">
					<div align="justify"><strong>Mengedit/menyunting karya ilmiah
							dalam bentuk buku yang diterbitkan
							(ber ISBN). </strong></div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0014['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0014['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0014; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0014['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0014['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0014 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0014['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0014" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0014" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="14"><i class=" fa fa-plus-square"></i></a>
						<div id="div14" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0014['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0014['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0014['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0014" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0014['valid'] ?>" name="bwarna">
				</td>
			</tr>

			<tr>
				<td><strong>6.</strong></td>
				<td colspan="4">
					<div align="justify"><strong>Membuat rancangan dan karya
							teknologi yang dipatenkan atau seni
							yang terdaftar di HaKI secara nasional
							atau internasional :</strong></div>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_b0015 = "select *from usulan_dupaks where dupak_no='B0015' and usulan_no='$no'";
			$data_b0015 = mysqli_query($koneksi, $sql_b0015);
			$data_bid_b_b0015 = mysqli_fetch_array($data_b0015);
			$jumlah_b0015 = $data_bid_b_b0015['kum_usulan_lama'] + $data_bid_b_b0015['kum_usulan_baru'];
			$kum_nilai_b0015 = $data_bid_b_b0015['kum_penilai_lama'] + $data_bid_b_b0015['kum_penilai_baru'];
			?>
			<?php
			$cek_B0015 = "select *from usulan_dupak_details where dupak_no='B0015' and usulan_no='$no'";
			$da_B0015 = mysqli_query($koneksi, $cek_B0015);
			$r_B0015 = mysqli_fetch_array($da_B0015);

			if ($r_B0015['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb15">
				<td>a.</td>
				<td colspan="4">
					<div align="justify">Internasional yang sudah
						diimplementasikan di industri
						(paling sedikit diakui oleh 4
						Negara) </div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0015['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0015['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0015; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0015['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0015['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0015 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0015['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0015" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0015" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="15"><i class=" fa fa-plus-square"></i></a>
						<div id="div15" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0015['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0015['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0015['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0015" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0015['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0016 = "select *from usulan_dupaks where dupak_no='B0016' and usulan_no='$no'";
			$data_b0016 = mysqli_query($koneksi, $sql_b0016);
			$data_bid_b_b0016 = mysqli_fetch_array($data_b0016);
			$jumlah_b0016 = $data_bid_b_b0016['kum_usulan_lama'] + $data_bid_b_b0016['kum_usulan_baru'];
			$kum_nilai_b0016 = $data_bid_b_b0016['kum_penilai_lama'] + $data_bid_b_b0016['kum_penilai_baru'];
			?>
			<?php
			$cek_B0016 = "select *from usulan_dupak_details where dupak_no='B0016' and usulan_no='$no'";
			$da_B0016 = mysqli_query($koneksi, $cek_B0016);
			$r_B0016 = mysqli_fetch_array($da_B0016);

			if ($r_B0016['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb16">
				<td>b.</td>
				<td colspan="4">
					<div align="justify">Internasional
						(paling sedikit diakui oleh 4 Negara) </div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0016['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0016['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0016; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0016['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0016['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0016 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0016['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0016" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0016" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="16"><i class=" fa fa-plus-square"></i></a>
						<div id="div16" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0016['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0016['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0016['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0016" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0016['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0017 = "select *from usulan_dupaks where dupak_no='B0017' and usulan_no='$no'";
			$data_b0017 = mysqli_query($koneksi, $sql_b0017);
			$data_bid_b_b0017 = mysqli_fetch_array($data_b0017);
			$jumlah_b0017 = $data_bid_b_b0017['kum_usulan_lama'] + $data_bid_b_b0017['kum_usulan_baru'];
			$kum_nilai_b0017 = $data_bid_b_b0017['kum_penilai_lama'] + $data_bid_b_b0017['kum_penilai_baru'];
			?>
			<?php
			$cek_B0017 = "select *from usulan_dupak_details where dupak_no='B0017' and usulan_no='$no'";
			$da_B0017 = mysqli_query($koneksi, $cek_B0017);
			$r_B0017 = mysqli_fetch_array($da_B0017);

			if ($r_B0017['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb17">
				<td>c.</td>
				<td colspan="4">
					<div align="justify">Nasional (yang sudah
						diimplementasikan di industri)</div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0017['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0017['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0017; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0017['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0017['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0017 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0017/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0017['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0017" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0017" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="17"><i class=" fa fa-plus-square"></i></a>
						<div id="div17" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0017['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0017['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0017['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0017" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0017['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0018 = "select *from usulan_dupaks where dupak_no='B0018' and usulan_no='$no'";
			$data_b0018 = mysqli_query($koneksi, $sql_b0018);
			$data_bid_b_b0018 = mysqli_fetch_array($data_b0018);
			$jumlah_b0018 = $data_bid_b_b0018['kum_usulan_lama'] + $data_bid_b_b0018['kum_usulan_baru'];
			$kum_nilai_b0018 = $data_bid_b_b0018['kum_penilai_lama'] + $data_bid_b_b0018['kum_penilai_baru'];
			?>
			<?php
			$cek_B0018 = "select *from usulan_dupak_details where dupak_no='B0018' and usulan_no='$no'";
			$da_B0018 = mysqli_query($koneksi, $cek_B0018);
			$r_B0018 = mysqli_fetch_array($da_B0018);

			if ($r_B0018['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb18">
				<td>d.</td>
				<td colspan="4">
					<div align="justify">Nasional</div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0018['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0018['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0018; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0018['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0018['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0018 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0018/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0018['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0018" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0018" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="18"><i class=" fa fa-plus-square"></i></a>
						<div id="div18" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0018['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0018['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0018['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0018" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0018['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0019 = "select *from usulan_dupaks where dupak_no='B0019' and usulan_no='$no'";
			$data_b0019 = mysqli_query($koneksi, $sql_b0019);
			$data_bid_b_b0019 = mysqli_fetch_array($data_b0019);
			$jumlah_b0019 = $data_bid_b_b0019['kum_usulan_lama'] + $data_bid_b_b0019['kum_usulan_baru'];
			$kum_nilai_b0019 = $data_bid_b_b0019['kum_penilai_lama'] + $data_bid_b_b0019['kum_penilai_baru'];
			?>
			<?php
			$cek_B0019 = "select *from usulan_dupak_details where dupak_no='B0019' and usulan_no='$no'";
			$da_B0019 = mysqli_query($koneksi, $cek_B0019);
			$r_B0019 = mysqli_fetch_array($da_B0019);

			if ($r_B0019['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb19">
				<td>e.</td>
				<td colspan="4">
					<div align="justify">Nasional, dalam bentuk paten
						sederhana yang telah memiliki
						sertifikat dari Direktorat
						Jenderal Kekayaan Intelektual,Kemenkumham; </div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0019['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0019['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0019; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0019['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0019['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0019 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0019/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0019['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0019" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0019" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="19"><i class=" fa fa-plus-square"></i></a>
						<div id="div19" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0019['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0019['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0019['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0019" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0019['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0020 = "select *from usulan_dupaks where dupak_no='B0020' and usulan_no='$no'";
			$data_b0020 = mysqli_query($koneksi, $sql_b0020);
			$data_bid_b_b0020 = mysqli_fetch_array($data_b0020);
			$jumlah_b0020 = $data_bid_b_b0020['kum_usulan_lama'] + $data_bid_b_b0020['kum_usulan_baru'];
			$kum_nilai_b0020 = $data_bid_b_b0020['kum_penilai_lama'] + $data_bid_b_b0020['kum_penilai_baru'];
			?>
			<?php
			$cek_B0020 = "select *from usulan_dupak_details where dupak_no='B0020' and usulan_no='$no'";
			$da_B0020 = mysqli_query($koneksi, $cek_B0020);
			$r_B0020 = mysqli_fetch_array($da_B0020);

			if ($r_B0020['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb20">
				<td colspan="4">f.</td>
				<td>
					<div align="justify">Karya ciptaan, desain industri,
						indikasi geografis yang telah
						memiliki sertifikat dari
						Direktorat Jenderal Kekayaan
						Intelektual, Kemenkumham;</div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0020['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0020['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0020; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0020['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0020['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0020 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0020/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0020['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0020" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0020" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="20"><i class=" fa fa-plus-square"></i></a>
						<div id="div20" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0020['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0020['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0020['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0020" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0020['valid'] ?>" name="bwarna">
				</td>
			</tr>

			<tr>
				<td><strong>7.</strong></td>
				<td colspan="4">
					<div align="justify"><strong>Membuat rancangan dan karya
							teknologi yang tidak dipatenkan;
							rancangan dan karya seni monumental
							yang tidak terdaftar di HaKI tetapi telah
							dipresentasikan pada forum yang
							teragenda :</strong></div>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_b0021 = "select *from usulan_dupaks where dupak_no='B0021' and usulan_no='$no'";
			$data_b0021 = mysqli_query($koneksi, $sql_b0021);
			$data_bid_b_b0021 = mysqli_fetch_array($data_b0021);
			$jumlah_b0021 = $data_bid_b_b0021['kum_usulan_lama'] + $data_bid_b_b0021['kum_usulan_baru'];
			$kum_nilai_b0021 = $data_bid_b_b0021['kum_penilai_lama'] + $data_bid_b_b0021['kum_penilai_baru'];
			?>
			<?php
			$cek_B0021 = "select *from usulan_dupak_details where dupak_no='B0021' and usulan_no='$no'";
			$da_B0021 = mysqli_query($koneksi, $cek_B0021);
			$r_B0021 = mysqli_fetch_array($da_B0021);

			if ($r_B0021['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb21">
				<td>a.</td>
				<td colspan="4">
					<div align="justify">Tingkat Internasional</div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0021['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0021['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0021; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0021['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0021['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0021 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0021/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0021['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0021" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0021" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="21"><i class=" fa fa-plus-square"></i></a>
						<div id="div21" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0021['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0021['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0021['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0021" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0021['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0022 = "select *from usulan_dupaks where dupak_no='B0022' and usulan_no='$no'";
			$data_b0022 = mysqli_query($koneksi, $sql_b0022);
			$data_bid_b_b0022 = mysqli_fetch_array($data_b0022);
			$jumlah_b0022 = $data_bid_b_b0022['kum_usulan_lama'] + $data_bid_b_b0022['kum_usulan_baru'];
			$kum_nilai_b0022 = $data_bid_b_b0022['kum_penilai_lama'] + $data_bid_b_b0022['kum_penilai_baru'];
			?>
			<?php
			$cek_B0022 = "select *from usulan_dupak_details where dupak_no='B0022' and usulan_no='$no'";
			$da_B0022 = mysqli_query($koneksi, $cek_B0022);
			$r_B0022 = mysqli_fetch_array($da_B0022);

			if ($r_B0022['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trb22">
				<td>b.</td>
				<td colspan="4">
					<div align="justify">Tingkat Nasional</div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0022['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0022['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0022; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0022['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0022['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0022 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0022/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0022['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0022" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0022" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="22"><i class=" fa fa-plus-square"></i></a>
						<div id="div22" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0022['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0022['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0022['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0022" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0022['valid'] ?>" name="bwarna">
				</td>
			</tr>
			<?php
			$sql_b0023 = "select *from usulan_dupaks where dupak_no='B0023' and usulan_no='$no'";
			$data_b0023 = mysqli_query($koneksi, $sql_b0023);
			$data_bid_b_b0023 = mysqli_fetch_array($data_b0023);
			$jumlah_b0023 = $data_bid_b_b0023['kum_usulan_lama'] + $data_bid_b_b0023['kum_usulan_baru'];
			$kum_nilai_b0023 = $data_bid_b_b0023['kum_penilai_lama'] + $data_bid_b_b0023['kum_penilai_baru'];
			?>
			<?php
			$cek_B0023 = "select *from usulan_dupak_details where dupak_no='B0023' and usulan_no='$no'";
			$da_B0023 = mysqli_query($koneksi, $cek_B0023);
			$r_B0023 = mysqli_fetch_array($da_B0023);

			if ($r_B0023['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}


			?>
			<tr bgcolor="<?= $warna ?>" id="trb23">
				<td>c.</td>
				<td colspan="4">
					<div align="justify">Tingkat Lokal</div>
				</td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0023['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0023['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_b0023; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0023['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_b_b0023['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0023 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_b/dupak/B0023/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_b_b0023['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/B0023" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-B0023" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="23"><i class=" fa fa-plus-square"></i></a>
						<div id="div23" class="targetDivB" style="display:none;">
							<p><?= $data_bid_b_b0023['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_b_b0023['user_val'] ?></p>
						</div>



					<?php } ?>
					<?php if ($data_bid_b_b0023['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '14') {

					?>

						<a data-target="#Modalnilai-B0023" data-toggle="modal" class="btn btn-xs btn-success"><i class=" fa fa-edit"></i></a>
					<?php } ?>
					<input type="hidden" value="<?= $data_bid_b_b0023['valid'] ?>" name="bwarna">
				</td>
			</tr>

			<tr>
				<td><strong>8.</strong></td>
				<td colspan="4">
					<div align="justify"><strong>Membuat rancangan dan karya seni
							yang tidak terdaftar HaKI</strong></div>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

			<?php
			$sql_b0040 = "select *from usulan_dupaks where dupak_no='B0040' and usulan_no='$no'";
			$data_b0040 = mysqli_query($koneksi, $sql_b0040);
			$d_b0040 = mysqli_fetch_array($data_b0040);
			$jml_b0040 = $d_b0040['kum_usulan_lama'] + $d_b0040['kum_usulan_baru'];
			$kum_nilai_b0040 = $d_b0040['kum_penilai_lama'] + $d_b0040['kum_penilai_baru'];
			?>
			<?php
			$cek_B0040 = "select *from usulan_dupak_details where dupak_no='B0040' AND usulan_no='$no' GROUP BY `kunci` ORDER BY kunci ASC";
			$da_B0040 = mysqli_query($koneksi, $cek_B0040);
			$r_B0040 = mysqli_fetch_array($da_B0040);

			if ($r_B0040['kunci'] == '1') {
				$warna = "7bf360";
			} elseif ($r_B0040['kunci'] == '0') {
				$warna = "fd8888";
			} else {
				$warna = "";
			}
			?>
			<!-- 		<tr>
				<td>

				</td>
				<td><strong>9.</strong></td>
				<td colspan="4">
					<div align="justify"><strong>Menambahkan Sisa Angka Kredit pada Jabatan Sebelumnya (AK x 40%)</strong></div>
				</td>
				<td style="white-space: nowrap"><?= $d_b0040['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $d_b0040['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jml_b0040; ?></td>
				<td style="white-space: nowrap"><?= $d_b0040['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $d_b0040['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_b0040 ?></td>
				<td>

				</td>
			</tr> -->
			<?php
			$sql_total = "select *from usulan_dupaks where  usulan_no='$no' and left(dupak_no,1)='B'";
			$data_total = mysqli_query($koneksi, $sql_total);
			while ($data_kum_total = mysqli_fetch_array($data_total)) {
				$jml_kum_lama += $data_kum_total['kum_usulan_lama'];
				$jml_kum_baru += $data_kum_total['kum_usulan_baru'];
				$jml_kum_penilai_lama += $data_kum_total['kum_penilai_lama'];
				$jml_kum_penilai_baru += $data_kum_total['kum_penilai_baru'];
			}
			$total_bid_a = $jml_kum_lama + $jml_kum_baru;
			$total_penilai_bid_b = $jml_kum_penilai_lama + $jml_kum_penilai_baru;
			?>
			<tr style="background-color: #e4e4e4; font-weight: bold;">
				<td colspan="6">
					<div align="right"><strong>JUMLAH BIDANG B</strong></div>
				</td>
				<td style="white-space: nowrap" class="text-center"><?= $jml_kum_lama ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $jml_kum_baru ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $total_bid_a ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $jml_kum_penilai_lama ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $jml_kum_penilai_baru ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $total_penilai_bid_b ?></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript">
	wxb = [];
	wrb = [];
	var trbIDs = ["trb2", "trb1", "trb3", "trb37", "trb4", "trb25", "trb26", "trb5", "trb6", "trb7", "trb38", "trb24", "trb35", "trb36", "trb34", "trb33", "trb31", "trb32", "trb29", "trb30", "trb27",
		"trb28", "trb11", "trb12", "trb13", "trb14", "trb15", "trb16", "trb17", "trb18", "trb19", "trb20", "trb21", "trb22", "trb23"
	];

	//var trbIDs = document.getElementsById("trb");


	$("input[name='bwarna']").each(function() {
		wxb.push($(this).val())
	});
	for (j = 0; j <= trbIDs.length; j++) {
		wrb[j] = wxb[j] == "200" ? "rgba(0, 204, 255, .6)" : wxb[j] == "400" ? "rgba(255, 0, 0, .5)" : "";
		document.getElementById(trbIDs[j]).style.backgroundColor = wrb[j];

	};
</script>
<script>
	$(function() {
		$('.showSingle').click(function() {
			$('.targetDivB').not('#div' + $(this).attr('target')).hide();
			$('#div' + $(this).attr('target')).toggle();
		});
	});
</script>


<?php

foreach ($qrb_dupak as $rdb) {


?>
	<!-- Modal -->
	<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_dupax/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
		<div id="myModal-<?= $rdb->dupak_no ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Validasi Berkas</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="nodupak" value="<?= $rdb->dupak_no ?>" />
						<p><label for="keterangan">Keterangan</label></p>
						<textarea name="keterangan" rows="4" cols="50" required />
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
				</div>

			</div>
		</div>

	</form>

	<!-- Modal -->
	<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/pushnilai_kum/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
		<div id="Modalnilai-<?= $rdb->dupak_no ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Update Nilai Kum</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="nodupak" value="<?= $rdb->dupak_no ?>" />
						<p><label for="nilai_kum">Nilai Kum Penilai</label></p>
						<input type="number" min="0" name="nilai_kum" value="<?= $rdb->kum_penilai_baru ?>" step=".01" required />
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