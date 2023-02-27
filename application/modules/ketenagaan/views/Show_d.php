<?php
error_reporting(0);
include "koneksi.php";
?>
<div class="row">




	<table class="cust-table cust-table-bordered">

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
			<tr class="text-center">
				<td rowspan="57">V</td>
				<td colspan="5" class="text-left">PENUNJANG TUGAS DOSEN</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="text-center">
				<td rowspan="3">A</td>
				<td colspan="4" class="text-left">Menjadi anggota dalam suatu Panitia/Badan pada perguruan tinggi</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0001 = "select *from usulan_dupaks where dupak_no='d0001' and usulan_no='$no'";
			$data_d0001 = mysqli_query($koneksi, $sql_d0001);
			$data_bid_d_d0001 = mysqli_fetch_array($data_d0001);
			$jumlah_d0001 = $data_bid_d_d0001['kum_usulan_lama'] + $data_bid_d_d0001['kum_usulan_baru'];
			$kum_nilai_d0001 = $data_bid_d_d0001['kum_penilai_lama'] + $data_bid_d_d0001['kum_penilai_baru'];
			?>
			<?php
			$cek_D0001 = "select *from usulan_dupak_details where dupak_no='D0001' and usulan_no='$no'";
			$da_D0001 = mysqli_query($koneksi, $cek_D0001);
			$r_D0001 = mysqli_fetch_array($da_D0001);

			if ($r_D0001['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd1">
				<td>1</td>
				<td colspan="3" class="text-left">Sebagai ketua/wakil ketua merangkap anggota</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0001['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0001['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0001; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0001['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0001['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0001 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0001['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0001" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0001" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="1"><i class=" fa fa-plus-square"></i></a>
						<div id="div1" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0001['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0001['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0001['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0002 = "select *from usulan_dupaks where dupak_no='d0002' and usulan_no='$no'";
			$data_d0002 = mysqli_query($koneksi, $sql_d0002);
			$data_bid_d_d0002 = mysqli_fetch_array($data_d0002);
			$jumlah_d0002 = $data_bid_d_d0002['kum_usulan_lama'] + $data_bid_d_d0002['kum_usulan_baru'];
			$kum_nilai_d0002 = $data_bid_d_d0002['kum_penilai_lama'] + $data_bid_d_d0002['kum_penilai_baru'];
			?>
			<?php
			$cek_D0002 = "select *from usulan_dupak_details where dupak_no='D0002' and usulan_no='$no'";
			$da_D0002 = mysqli_query($koneksi, $cek_D0002);
			$r_D0002 = mysqli_fetch_array($da_D0002);

			if ($r_D0002['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd2">
				<td>2</td>
				<td colspan="3" class="text-left">Sebagai anggota</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0002['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0002['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0002; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0002['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0002['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0002 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0002['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0002" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0002" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="2"><i class=" fa fa-plus-square"></i></a>
						<div id="div2" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0002['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0002['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0002['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="7">B</td>
				<td colspan="4" class="text-left">Menjadi anggota panitia/badan pada lembaga pemerintah</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="text-center">
				<td rowspan="3">1</td>
				<td colspan="3" class="text-left">Panitia pusat</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0003 = "select *from usulan_dupaks where dupak_no='d0003' and usulan_no='$no'";
			$data_d0003 = mysqli_query($koneksi, $sql_d0003);
			$data_bid_d_d0003 = mysqli_fetch_array($data_d0003);
			$jumlah_d0003 = $data_bid_d_d0003['kum_usulan_lama'] + $data_bid_d_d0003['kum_usulan_baru'];
			$kum_nilai_d0003 = $data_bid_d_d0003['kum_penilai_lama'] + $data_bid_d_d0003['kum_penilai_baru'];
			?>
			<?php
			$cek_D0003 = "select *from usulan_dupak_details where dupak_no='D0003' and usulan_no='$no'";
			$da_D0003 = mysqli_query($koneksi, $cek_D0003);
			$r_D0003 = mysqli_fetch_array($da_D0003);

			if ($r_D0003['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd3">
				<td>a.</td>
				<td colspan="2" class="text-left">Ketua/Wakil Ketua</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0003['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0003['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0003; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0003['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0003['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0003 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0003['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0003" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0003" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="3"><i class=" fa fa-plus-square"></i></a>
						<div id="div3" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0003['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0003['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0003['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0004 = "select *from usulan_dupaks where dupak_no='d0004' and usulan_no='$no'";
			$data_d0004 = mysqli_query($koneksi, $sql_d0004);
			$data_bid_d_d0004 = mysqli_fetch_array($data_d0004);
			$jumlah_d0004 = $data_bid_d_d0004['kum_usulan_lama'] + $data_bid_d_d0004['kum_usulan_baru'];
			$kum_nilai_d0004 = $data_bid_d_d0004['kum_penilai_lama'] + $data_bid_d_d0004['kum_penilai_baru'];
			?>
			<?php
			$cek_D0004 = "select *from usulan_dupak_details where dupak_no='D0004' and usulan_no='$no'";
			$da_D0004 = mysqli_query($koneksi, $cek_D0004);
			$r_D0004 = mysqli_fetch_array($da_D0004);

			if ($r_D0004['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd4">
				<td>b.</td>
				<td colspan="2" class="text-left">Anggota</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0004['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0004['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0004; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0004['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0004['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0004 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0004['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0004" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0004" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="4"><i class=" fa fa-plus-square"></i></a>
						<div id="div4" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0004['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0004['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0004['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="3">2</td>
				<td colspan="3" class="text-left">Panitia daerah</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$cek_D0005 = "select *from usulan_dupak_details where dupak_no='D0005' and usulan_no='$no'";
			$da_D0005 = mysqli_query($koneksi, $cek_D0005);
			$r_D0005 = mysqli_fetch_array($da_D0005);

			if ($r_D0005['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd5">
				<?php
				$sql_d0005 = "select *from usulan_dupaks where dupak_no='d0005' and usulan_no='$no'";
				$data_d0005 = mysqli_query($koneksi, $sql_d0005);
				$data_bid_d_d0005 = mysqli_fetch_array($data_d0005);
				$jumlah_d0005 = $data_bid_d_d0005['kum_usulan_lama'] + $data_bid_d_d0005['kum_usulan_baru'];
				$kum_nilai_d0005 = $data_bid_d_d0005['kum_penilai_lama'] + $data_bid_d_d0005['kum_penilai_baru'];
				?>

				<td>a.</td>
				<td colspan="2" class="text-left">Ketua/Wakil Ketua</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0005['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0005['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0005; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0005['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0005['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0005 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0005['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0005" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0005" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="5"><i class=" fa fa-plus-square"></i></a>
						<div id="div5" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0005['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0005['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0005['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0006 = "select *from usulan_dupaks where dupak_no='d0006' and usulan_no='$no'";
			$data_d0006 = mysqli_query($koneksi, $sql_d0006);
			$data_bid_d_d0006 = mysqli_fetch_array($data_d0006);
			$jumlah_d0006 = $data_bid_d_d0006['kum_usulan_lama'] + $data_bid_d_d0006['kum_usulan_baru'];
			$kum_nilai_d0006 = $data_bid_d_d0006['kum_penilai_lama'] + $data_bid_d_d0006['kum_penilai_baru'];
			?>
			<?php
			$cek_D0006 = "select *from usulan_dupak_details where dupak_no='D0006' and usulan_no='$no'";
			$da_D0006 = mysqli_query($koneksi, $cek_D0006);
			$r_D0006 = mysqli_fetch_array($da_D0006);

			if ($r_D0006['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd6">

				<td>b.</td>
				<td colspan="2" class="text-left">Anggota</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0006['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0006['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0006; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0006['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0006['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0006 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0006['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0006" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0006" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="6"><i class=" fa fa-plus-square"></i></a>
						<div id="div6" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0006['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0006['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0006['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="9">C</td>
				<td colspan="4" class="text-left">Menjadi anggota organisasi profesi</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="text-center">
				<td rowspan="4">1</td>
				<td colspan="3" class="text-left">Tingkat internasional</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0007 = "select *from usulan_dupaks where dupak_no='d0007' and usulan_no='$no'";
			$data_d0007 = mysqli_query($koneksi, $sql_d0007);
			$data_bid_d_d0007 = mysqli_fetch_array($data_d0007);
			$jumlah_d0007 = $data_bid_d_d0007['kum_usulan_lama'] + $data_bid_d_d0007['kum_usulan_baru'];
			$kum_nilai_d0007 = $data_bid_d_d0007['kum_penilai_lama'] + $data_bid_d_d0007['kum_penilai_baru'];
			?>
			<?php
			$cek_D0007 = "select *from usulan_dupak_details where dupak_no='D0007' and usulan_no='$no'";
			$da_D0007 = mysqli_query($koneksi, $cek_D0007);
			$r_D0007 = mysqli_fetch_array($da_D0007);

			if ($r_D0007['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd7">
				<td>a.</td>
				<td colspan="2" class="text-left">Pengurus</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0007['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0007['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0007; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0007['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0007['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0007 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0007['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0007" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0007" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="7"><i class=" fa fa-plus-square"></i></a>
						<div id="div7" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0007['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0007['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0007['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0008 = "select *from usulan_dupaks where dupak_no='d0008' and usulan_no='$no'";
			$data_d0008 = mysqli_query($koneksi, $sql_d0008);
			$data_bid_d_d0008 = mysqli_fetch_array($data_d0008);
			$jumlah_d0008 = $data_bid_d_d0008['kum_usulan_lama'] + $data_bid_d_d0008['kum_usulan_baru'];
			$kum_nilai_d0008 = $data_bid_d_d0008['kum_penilai_lama'] + $data_bid_d_d0008['kum_penilai_baru'];
			?>
			<?php
			$cek_D0008 = "select *from usulan_dupak_details where dupak_no='D0008' and usulan_no='$no'";
			$da_D0008 = mysqli_query($koneksi, $cek_D0008);
			$r_D0008 = mysqli_fetch_array($da_D0008);

			if ($r_D0008['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd8">
				<td>b.</td>
				<td colspan="2" class="text-left">Anggota atas permintaan</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0008['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0008['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0008; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0008['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0008['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0008 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0008['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0008" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0008" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="8"><i class=" fa fa-plus-square"></i></a>
						<div id="div8" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0008['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0008['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0008['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0009 = "select *from usulan_dupaks where dupak_no='d0009' and usulan_no='$no'";
			$data_d0009 = mysqli_query($koneksi, $sql_d0009);
			$data_bid_d_d0009 = mysqli_fetch_array($data_d0009);
			$jumlah_d0009 = $data_bid_d_d0009['kum_usulan_lama'] + $data_bid_d_d0009['kum_usulan_baru'];
			$kum_nilai_d0009 = $data_bid_d_d0009['kum_penilai_lama'] + $data_bid_d_d0009['kum_penilai_baru'];
			?>
			<?php
			$cek_D0009 = "select *from usulan_dupak_details where dupak_no='D0009' and usulan_no='$no'";
			$da_D0009 = mysqli_query($koneksi, $cek_D0009);
			$r_D0009 = mysqli_fetch_array($da_D0009);

			if ($r_D0009['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd9">
				<td>c.</td>
				<td colspan="2" class="text-left">Anggota</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0009['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0009['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0009; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0009['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0009['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0009 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0009['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0009" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0009" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="9"><i class=" fa fa-plus-square"></i></a>
						<div id="div9" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0009['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0009['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0009['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="4">2</td>
				<td colspan="3" class="text-left">Tingkat nasional</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0010 = "select *from usulan_dupaks where dupak_no='d0010' and usulan_no='$no'";
			$data_d0010 = mysqli_query($koneksi, $sql_d0010);
			$data_bid_d_d0010 = mysqli_fetch_array($data_d0010);
			$jumlah_d0010 = $data_bid_d_d0010['kum_usulan_lama'] + $data_bid_d_d0010['kum_usulan_baru'];
			$kum_nilai_d0010 = $data_bid_d_d0010['kum_penilai_lama'] + $data_bid_d_d0010['kum_penilai_baru'];
			?>
			<?php
			$cek_D0010 = "select *from usulan_dupak_details where dupak_no='D0010' and usulan_no='$no'";
			$da_D0010 = mysqli_query($koneksi, $cek_D0010);
			$r_D0010 = mysqli_fetch_array($da_D0010);

			if ($r_D0010['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd10">
				<td>a.</td>
				<td colspan="2" class="text-left">Pengurus</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0010['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0010['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0010; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0010['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0010['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0010 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0010['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0010" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0010" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="10"><i class=" fa fa-plus-square"></i></a>
						<div id="div10" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0010['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0010['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0010['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0011 = "select *from usulan_dupaks where dupak_no='d0011' and usulan_no='$no'";
			$data_d0011 = mysqli_query($koneksi, $sql_d0011);
			$data_bid_d_d0011 = mysqli_fetch_array($data_d0011);
			$jumlah_d0011 = $data_bid_d_d0011['kum_usulan_lama'] + $data_bid_d_d0011['kum_usulan_baru'];
			$kum_nilai_d0011 = $data_bid_d_d0011['kum_penilai_lama'] + $data_bid_d_d0011['kum_penilai_baru'];
			?>
			<?php
			$cek_D0011 = "select *from usulan_dupak_details where dupak_no='D0011' and usulan_no='$no'";
			$da_D0011 = mysqli_query($koneksi, $cek_D0011);
			$r_D0011 = mysqli_fetch_array($da_D0011);

			if ($r_D0011['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd11">
				<td>b.</td>
				<td colspan="2" class="text-left">Anggota atas permintaan</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0011['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0011['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0011; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0011['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0011['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0011 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0011['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0011" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0011" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="11"><i class=" fa fa-plus-square"></i></a>
						<div id="div11" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0011['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0011['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0011['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0012 = "select *from usulan_dupaks where dupak_no='d0012' and usulan_no='$no'";
			$data_d0012 = mysqli_query($koneksi, $sql_d0012);
			$data_bid_d_d0012 = mysqli_fetch_array($data_d0012);
			$jumlah_d0012 = $data_bid_d_d0012['kum_usulan_lama'] + $data_bid_d_d0012['kum_usulan_baru'];
			$kum_nilai_d0012 = $data_bid_d_d0012['kum_penilai_lama'] + $data_bid_d_d0012['kum_penilai_baru'];
			?>
			<?php
			$cek_D0012 = "select *from usulan_dupak_details where dupak_no='D0012' and usulan_no='$no'";
			$da_D0012 = mysqli_query($koneksi, $cek_D0012);
			$r_D0012 = mysqli_fetch_array($da_D0012);

			if ($r_D0012['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd12">
				<td>c.</td>
				<td colspan="2" class="text-left">Anggota</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0012['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0012['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0012; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0012['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0012['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0012 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0012['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0012" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0012" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="12"><i class=" fa fa-plus-square"></i></a>
						<div id="div12" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0012['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0012['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0012['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="3">D</td>
				<td colspan="4" class="text-left">Mewakili perguruan tinggi/lembaga pemerintah</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0013 = "select *from usulan_dupaks where dupak_no='d0013' and usulan_no='$no'";
			$data_d0013 = mysqli_query($koneksi, $sql_d0013);
			$data_bid_d_d0013 = mysqli_fetch_array($data_d0013);
			$jumlah_d0013 = $data_bid_d_d0013['kum_usulan_lama'] + $data_bid_d_d0013['kum_usulan_baru'];
			$kum_nilai_d0013 = $data_bid_d_d0013['kum_penilai_lama'] + $data_bid_d_d0013['kum_penilai_baru'];
			?>
			<?php
			$cek_D0013 = "select *from usulan_dupak_details where dupak_no='D0013' and usulan_no='$no'";
			$da_D0013 = mysqli_query($koneksi, $cek_D0013);
			$r_D0013 = mysqli_fetch_array($da_D0013);

			if ($r_D0013['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd13">
				<td rowspan="2">1</td>
				<td colspan="3" rowspan="2" class="text-left">Mewakili perguruan tinggi/ Iembaga pemerintah duduk dalam panitia antar lembaga</td>
				<td rowspan="2" style="white-space: nowrap"><?= $data_bid_d_d0013['kum_usulan_lama']; ?></td>
				<td rowspan="2" style="white-space: nowrap"><?= $data_bid_d_d0013['kum_usulan_baru'] ?></td>
				<td rowspan="2" style="white-space: nowrap"><?= $jumlah_d0013; ?></td>
				<td rowspan="2" style="white-space: nowrap"><?= $data_bid_d_d0013['kum_penilai_lama'] ?></td>
				<td rowspan="2" style="white-space: nowrap"><?= $data_bid_d_d0013['kum_penilai_baru'] ?></td>
				<td rowspan="2" style="white-space: nowrap"><?= $kum_nilai_d0013 ?></td>
				<td rowspan="2" style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0013['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0013" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0013" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="13"><i class=" fa fa-plus-square"></i></a>
						<div id="div13" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0013['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0013['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0013['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr>
			</tr>
			<tr class="text-center">
				<td rowspan="3">E</td>
				<td colspan="4" class="text-left">Menjadi anggota delegasi nasional ke pertemuan internasional</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0014 = "select *from usulan_dupaks where dupak_no='d0014' and usulan_no='$no'";
			$data_d0014 = mysqli_query($koneksi, $sql_d0014);
			$data_bid_d_d0014 = mysqli_fetch_array($data_d0014);
			$jumlah_d0014 = $data_bid_d_d0014['kum_usulan_lama'] + $data_bid_d_d0014['kum_usulan_baru'];
			$kum_nilai_d0014 = $data_bid_d_d0014['kum_penilai_lama'] + $data_bid_d_d0014['kum_penilai_baru'];
			?>
			<?php
			$cek_D0014 = "select *from usulan_dupak_details where dupak_no='D0014' and usulan_no='$no'";
			$da_D0014 = mysqli_query($koneksi, $cek_D0014);
			$r_D0014 = mysqli_fetch_array($da_D0014);

			if ($r_D0014['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd14">
				<td>1</td>
				<td colspan="3" class="text-left">Sebagai ketua delegasi</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0014['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0014['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0014; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0014['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0014['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0014 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0014['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0014" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0014" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="14"><i class=" fa fa-plus-square"></i></a>
						<div id="div14" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0014['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0014['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0014['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0015 = "select *from usulan_dupaks where dupak_no='d0015' and usulan_no='$no'";
			$data_d0015 = mysqli_query($koneksi, $sql_d0015);
			$data_bid_d_d0015 = mysqli_fetch_array($data_d0015);
			$jumlah_d0015 = $data_bid_d_d0015['kum_usulan_lama'] + $data_bid_d_d0015['kum_usulan_baru'];
			$kum_nilai_d0015 = $data_bid_d_d0015['kum_penilai_lama'] + $data_bid_d_d0015['kum_penilai_baru'];
			?>
			<?php
			$cek_D0015 = "select *from usulan_dupak_details where dupak_no='D0015' and usulan_no='$no'";
			$da_D0015 = mysqli_query($koneksi, $cek_D0015);
			$r_D0015 = mysqli_fetch_array($da_D0015);

			if ($r_D0015['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd15">
				<td>2</td>
				<td colspan="3" class="text-left">Sebagai anggota delegasi</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0015['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0015['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0015; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0015['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0015['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0015 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0015['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0015" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0015" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="15"><i class=" fa fa-plus-square"></i></a>
						<div id="div15" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0015['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0015['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0015['valid'] ?>" name="dwarna">
				</td>
			</tr>

			</tr>
			<tr class="text-center">
				<td rowspan="7">F</td>
				<td colspan="4" class="text-left">Berperan serta aktif dalam pertemuan ilmiah</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="text-center">
				<td rowspan="3">1</td>
				<td colspan="3" class="text-left">Tingkat internasional/nasional/regional sebagai:</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0016 = "select *from usulan_dupaks where dupak_no='d0016' and usulan_no='$no'";
			$data_d0016 = mysqli_query($koneksi, $sql_d0016);
			$data_bid_d_d0016 = mysqli_fetch_array($data_d0016);
			$jumlah_d0016 = $data_bid_d_d0016['kum_usulan_lama'] + $data_bid_d_d0016['kum_usulan_baru'];
			$kum_nilai_d0016 = $data_bid_d_d0016['kum_penilai_lama'] + $data_bid_d_d0016['kum_penilai_baru'];
			?>
			<?php
			$cek_D0016 = "select *from usulan_dupak_details where dupak_no='D0016' and usulan_no='$no'";
			$da_D0016 = mysqli_query($koneksi, $cek_D0016);
			$r_D0016 = mysqli_fetch_array($da_D0016);

			if ($r_D0016['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd16">

				<td>a.</td>
				<td colspan="2" class="text-left">Ketua</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0016['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0016['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0016; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0016['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0016['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0016 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0016['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0016" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0016" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="16"><i class=" fa fa-plus-square"></i></a>
						<div id="div16" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0016['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0016['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0016['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0017 = "select *from usulan_dupaks where dupak_no='d0017' and usulan_no='$no'";
			$data_d0017 = mysqli_query($koneksi, $sql_d0017);
			$data_bid_d_d0017 = mysqli_fetch_array($data_d0017);
			$jumlah_d0017 = $data_bid_d_d0017['kum_usulan_lama'] + $data_bid_d_d0017['kum_usulan_baru'];
			$kum_nilai_d0017 = $data_bid_d_d0017['kum_penilai_lama'] + $data_bid_d_d0017['kum_penilai_baru'];
			?>
			<?php
			$cek_D0017 = "select *from usulan_dupak_details where dupak_no='D0017' and usulan_no='$no'";
			$da_D0017 = mysqli_query($koneksi, $cek_D0017);
			$r_D0017 = mysqli_fetch_array($da_D0017);

			if ($r_D0017['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd17">

				<td>b.</td>
				<td colspan="2" class="text-left">Anggota</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0017['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0017['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0017; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0017['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0017['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0017 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0017/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0017['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0017" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0017" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="17"><i class=" fa fa-plus-square"></i></a>
						<div id="div17" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0017['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0017['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0017['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="3">2</td>
				<td colspan="3" class="text-left">Di lingkungan perguruan tinggi sebagai:</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0018 = "select *from usulan_dupaks where dupak_no='d0018' and usulan_no='$no'";
			$data_d0018 = mysqli_query($koneksi, $sql_d0018);
			$data_bid_d_d0018 = mysqli_fetch_array($data_d0018);
			$jumlah_d0018 = $data_bid_d_d0018['kum_usulan_lama'] + $data_bid_d_d0018['kum_usulan_baru'];
			$kum_nilai_d0018 = $data_bid_d_d0018['kum_penilai_lama'] + $data_bid_d_d0018['kum_penilai_baru'];
			?>
			<?php
			$cek_D0018 = "select *from usulan_dupak_details where dupak_no='D0018' and usulan_no='$no'";
			$da_D0018 = mysqli_query($koneksi, $cek_D0018);
			$r_D0018 = mysqli_fetch_array($da_D0018);

			if ($r_D0018['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd18">

				<td>a.</td>
				<td colspan="2" class="text-left">Ketua</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0018['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0018['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0018; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0018['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0018['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0018 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0018/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0018['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0018" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0018" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="18"><i class=" fa fa-plus-square"></i></a>
						<div id="div18" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0018['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0018['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0018['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0019 = "select *from usulan_dupaks where dupak_no='d0019' and usulan_no='$no'";
			$data_d0019 = mysqli_query($koneksi, $sql_d0019);
			$data_bid_d_d0019 = mysqli_fetch_array($data_d0019);
			$jumlah_d0019 = $data_bid_d_d0019['kum_usulan_lama'] + $data_bid_d_d0019['kum_usulan_baru'];
			$kum_nilai_d0019 = $data_bid_d_d0019['kum_penilai_lama'] + $data_bid_d_d0019['kum_penilai_baru'];
			?>
			<?php
			$cek_D0019 = "select *from usulan_dupak_details where dupak_no='D0019' and usulan_no='$no'";
			$da_D0019 = mysqli_query($koneksi, $cek_D0019);
			$r_D0019 = mysqli_fetch_array($da_D0019);

			if ($r_D0019['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd19">

				<td>b.</td>
				<td colspan="2" class="text-left">Anggota</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0019['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0019['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0019; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0019['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0019['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0019 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0019/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0019['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0019" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0019" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="19"><i class=" fa fa-plus-square"></i></a>
						<div id="div19" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0019['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0019['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0019['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="9">G</td>
				<td colspan="4" class="text-left">Mendapat penghargaan / tanda jasa</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="text-center">
				<td rowspan="4">1</td>
				<td colspan="3" class="text-left">Penghargaan/tanda jasa Satya Lancana Karya Satya</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0020 = "select *from usulan_dupaks where dupak_no='d0020' and usulan_no='$no'";
			$data_d0020 = mysqli_query($koneksi, $sql_d0020);
			$data_bid_d_d0020 = mysqli_fetch_array($data_d0020);
			$jumlah_d0020 = $data_bid_d_d0020['kum_usulan_lama'] + $data_bid_d_d0020['kum_usulan_baru'];
			$kum_nilai_d0020 = $data_bid_d_d0020['kum_penilai_lama'] + $data_bid_d_d0020['kum_penilai_baru'];
			?>
			<?php
			$cek_D0020 = "select *from usulan_dupak_details where dupak_no='D0020' and usulan_no='$no'";
			$da_D0020 = mysqli_query($koneksi, $cek_D0020);
			$r_D0020 = mysqli_fetch_array($da_D0020);

			if ($r_D0020['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd20">

				<td>a.</td>
				<td colspan="2" class="text-left">30 (tiga puluh) tahun</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0020['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0020['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0020; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0020['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0020['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0020 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0020/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0020['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0020" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0020" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="20"><i class=" fa fa-plus-square"></i></a>
						<div id="div20" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0020['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0020['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0020['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0021 = "select *from usulan_dupaks where dupak_no='d0021' and usulan_no='$no'";
			$data_d0021 = mysqli_query($koneksi, $sql_d0021);
			$data_bid_d_d0021 = mysqli_fetch_array($data_d0021);
			$jumlah_d0021 = $data_bid_d_d0021['kum_usulan_lama'] + $data_bid_d_d0021['kum_usulan_baru'];
			$kum_nilai_d0021 = $data_bid_d_d0021['kum_penilai_lama'] + $data_bid_d_d0021['kum_penilai_baru'];
			?>
			<?php
			$cek_D0021 = "select *from usulan_dupak_details where dupak_no='D0021' and usulan_no='$no'";
			$da_D0021 = mysqli_query($koneksi, $cek_D0021);
			$r_D0021 = mysqli_fetch_array($da_D0021);

			if ($r_D0021['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd21">

				<td>b.</td>
				<td colspan="2" class="text-left">20 (dua puluh) tahun</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0021['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0021['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0021; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0021['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0021['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0021 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0021/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0021['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0021" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0021" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="21"><i class=" fa fa-plus-square"></i></a>
						<div id="div21" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0021['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0021['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0021['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0022 = "select *from usulan_dupaks where dupak_no='d0022' and usulan_no='$no'";
			$data_d0022 = mysqli_query($koneksi, $sql_d0022);
			$data_bid_d_d0022 = mysqli_fetch_array($data_d0022);
			$jumlah_d0022 = $data_bid_d_d0022['kum_usulan_lama'] + $data_bid_d_d0022['kum_usulan_baru'];
			$kum_nilai_d0022 = $data_bid_d_d0022['kum_penilai_lama'] + $data_bid_d_d0022['kum_penilai_baru'];
			?>
			<?php
			$cek_D0022 = "select *from usulan_dupak_details where dupak_no='D0022' and usulan_no='$no'";
			$da_D0022 = mysqli_query($koneksi, $cek_D0022);
			$r_D0022 = mysqli_fetch_array($da_D0022);

			if ($r_D0022['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd22">

				<td>c.</td>
				<td colspan="2" class="text-left">10 (sepuluh) tahun</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0022['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0022['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0022; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0022['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0022['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0022 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0022/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0022['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0022" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0022" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="22"><i class=" fa fa-plus-square"></i></a>
						<div id="div22" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0022['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0022['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0022['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="4">2</td>
				<td colspan="3" class="text-left">Memperoleh penghargaan lainnya</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0023 = "select *from usulan_dupaks where dupak_no='d0023' and usulan_no='$no'";
			$data_d0023 = mysqli_query($koneksi, $sql_d0023);
			$data_bid_d_d0023 = mysqli_fetch_array($data_d0023);
			$jumlah_d0023 = $data_bid_d_d0023['kum_usulan_lama'] + $data_bid_d_d0023['kum_usulan_baru'];
			$kum_nilai_d0023 = $data_bid_d_d0023['kum_penilai_lama'] + $data_bid_d_d0023['kum_penilai_baru'];
			?>
			<?php
			$cek_D0023 = "select *from usulan_dupak_details where dupak_no='D0023' and usulan_no='$no'";
			$da_D0023 = mysqli_query($koneksi, $cek_D0023);
			$r_D0023 = mysqli_fetch_array($da_D0023);

			if ($r_D0023['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd23">

				<td>a.</td>
				<td colspan="2" class="text-left">Tingkat internasional</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0023['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0023['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0023; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0023['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0023['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0023 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0023/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0023['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0023" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0023" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="23"><i class=" fa fa-plus-square"></i></a>
						<div id="div23" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0023['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0023['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0023['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0024 = "select *from usulan_dupaks where dupak_no='d0024' and usulan_no='$no'";
			$data_d0024 = mysqli_query($koneksi, $sql_d0024);
			$data_bid_d_d0024 = mysqli_fetch_array($data_d0024);
			$jumlah_d0024 = $data_bid_d_d0024['kum_usulan_lama'] + $data_bid_d_d0024['kum_usulan_baru'];
			$kum_nilai_d0024 = $data_bid_d_d0024['kum_penilai_lama'] + $data_bid_d_d0024['kum_penilai_baru'];
			?>
			<?php
			$cek_D0024 = "select *from usulan_dupak_details where dupak_no='D0024' and usulan_no='$no'";
			$da_D0024 = mysqli_query($koneksi, $cek_D0024);
			$r_D0024 = mysqli_fetch_array($da_D0024);

			if ($r_D0024['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd24">

				<td>b.</td>
				<td colspan="2" class="text-left">Tingkat nasional</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0024['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0024['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0024; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0024['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0024['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0024 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0024/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0024['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0024" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0024" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="24"><i class=" fa fa-plus-square"></i></a>
						<div id="div24" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0024['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0024['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0024['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0025 = "select *from usulan_dupaks where dupak_no='d0025' and usulan_no='$no'";
			$data_d0025 = mysqli_query($koneksi, $sql_d0025);
			$data_bid_d_d0025 = mysqli_fetch_array($data_d0025);
			$jumlah_d0025 = $data_bid_d_d0025['kum_usulan_lama'] + $data_bid_d_d0025['kum_usulan_baru'];
			$kum_nilai_d0025 = $data_bid_d_d0025['kum_penilai_lama'] + $data_bid_d_d0025['kum_penilai_baru'];
			?>
			<?php
			$cek_D0025 = "select *from usulan_dupak_details where dupak_no='D0025' and usulan_no='$no'";
			$da_D0025 = mysqli_query($koneksi, $cek_D0025);
			$r_D0025 = mysqli_fetch_array($da_D0025);

			if ($r_D0025['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd25">

				<td>c.</td>
				<td colspan="2" class="text-left">Tingkat provinsi</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0025['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0025['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0025; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0025['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0025['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0025 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0025/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0025['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0025" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0025" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="25"><i class=" fa fa-plus-square"></i></a>
						<div id="div25" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0025['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0025['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0025['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="5">H</td>
				<td colspan="4" rowspan="2" class="text-left">Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional</td>
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
			$sql_d0026 = "select *from usulan_dupaks where dupak_no='d0026' and usulan_no='$no'";
			$data_d0026 = mysqli_query($koneksi, $sql_d0026);
			$data_bid_d_d0026 = mysqli_fetch_array($data_d0026);
			$jumlah_d0026 = $data_bid_d_d0026['kum_usulan_lama'] + $data_bid_d_d0026['kum_usulan_baru'];
			$kum_nilai_d0026 = $data_bid_d_d0026['kum_penilai_lama'] + $data_bid_d_d0026['kum_penilai_baru'];
			?>
			<?php
			$cek_D0026 = "select *from usulan_dupak_details where dupak_no='D0026' and usulan_no='$no'";
			$da_D0026 = mysqli_query($koneksi, $cek_D0026);
			$r_D0026 = mysqli_fetch_array($da_D0026);

			if ($r_D0026['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd26">

				<td>1</td>
				<td colspan="3" class="text-left">Buku SLTA atau setingkat</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0026['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0026['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0026; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0026['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0026['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0026 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0026/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0026['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0026" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0026" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="26"><i class=" fa fa-plus-square"></i></a>
						<div id="div26" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0026['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0026['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0026['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0027 = "select *from usulan_dupaks where dupak_no='d0027' and usulan_no='$no'";
			$data_d0027 = mysqli_query($koneksi, $sql_d0027);
			$data_bid_d_d0027 = mysqli_fetch_array($data_d0027);
			$jumlah_d0027 = $data_bid_d_d0027['kum_usulan_lama'] + $data_bid_d_d0027['kum_usulan_baru'];
			$kum_nilai_d0027 = $data_bid_d_d0027['kum_penilai_lama'] + $data_bid_d_d0027['kum_penilai_baru'];
			?>
			<?php
			$cek_D0027 = "select *from usulan_dupak_details where dupak_no='D0027' and usulan_no='$no'";
			$da_D0027 = mysqli_query($koneksi, $cek_D0027);
			$r_D0027 = mysqli_fetch_array($da_D0027);

			if ($r_D0027['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd27">

				<td>2</td>
				<td colspan="3" class="text-left">Buku SLTP atau setingkat</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0027['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0027['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0027; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0027['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0027['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0027 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0027/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0027['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0027" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0027" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="27"><i class=" fa fa-plus-square"></i></a>
						<div id="div27" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0027['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0027['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0027['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0028 = "select *from usulan_dupaks where dupak_no='d0028' and usulan_no='$no'";
			$data_d0028 = mysqli_query($koneksi, $sql_d0028);
			$data_bid_d_d0028 = mysqli_fetch_array($data_d0028);
			$jumlah_d0028 = $data_bid_d_d0028['kum_usulan_lama'] + $data_bid_d_d0028['kum_usulan_baru'];
			$kum_nilai_d0028 = $data_bid_d_d0028['kum_penilai_lama'] + $data_bid_d_d0028['kum_penilai_baru'];
			?>
			<?php
			$cek_D0028 = "select *from usulan_dupak_details where dupak_no='D0028' and usulan_no='$no'";
			$da_D0028 = mysqli_query($koneksi, $cek_D0028);
			$r_D0028 = mysqli_fetch_array($da_D0028);

			if ($r_D0028['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd28">

				<td>3</td>
				<td colspan="3" class="text-left">Buku SD atau setingkat</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0028['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0028['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0028; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0028['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0028['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0028 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0028/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0028['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0028" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0028" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="28"><i class=" fa fa-plus-square"></i></a>
						<div id="div28" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0028['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0028['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0028['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="4">I</td>
				<td colspan="4" class="text-left">Mempunyai prestasi di bidang olahraga/humaniora</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0029 = "select *from usulan_dupaks where dupak_no='d0029' and usulan_no='$no'";
			$data_d0029 = mysqli_query($koneksi, $sql_d0029);
			$data_bid_d_d0029 = mysqli_fetch_array($data_d0029);
			$jumlah_d0029 = $data_bid_d_d0029['kum_usulan_lama'] + $data_bid_d_d0029['kum_usulan_baru'];
			$kum_nilai_d0029 = $data_bid_d_d0029['kum_penilai_lama'] + $data_bid_d_d0029['kum_penilai_baru'];
			?>
			<?php
			$cek_D0029 = "select *from usulan_dupak_details where dupak_no='D0029' and usulan_no='$no'";
			$da_D0029 = mysqli_query($koneksi, $cek_D0029);
			$r_D0029 = mysqli_fetch_array($da_D0029);

			if ($r_D0029['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd29">

				<td>1</td>
				<td colspan="3" class="text-left">Tingkat internasional</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0029['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0029['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0029; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0029['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0029['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0029 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0029/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0029['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0029" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0029" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="29"><i class=" fa fa-plus-square"></i></a>
						<div id="div29" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0029['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0029['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0029['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0030 = "select *from usulan_dupaks where dupak_no='d0030' and usulan_no='$no'";
			$data_d0030 = mysqli_query($koneksi, $sql_d0030);
			$data_bid_d_d0030 = mysqli_fetch_array($data_d0030);
			$jumlah_d0030 = $data_bid_d_d0030['kum_usulan_lama'] + $data_bid_d_d0030['kum_usulan_baru'];
			$kum_nilai_d0030 = $data_bid_d_d0030['kum_penilai_lama'] + $data_bid_d_d0030['kum_penilai_baru'];
			?>
			<?php
			$cek_D0030 = "select *from usulan_dupak_details where dupak_no='D0030' and usulan_no='$no'";
			$da_D0030 = mysqli_query($koneksi, $cek_D0030);
			$r_D0030 = mysqli_fetch_array($da_D0030);

			if ($r_D0030['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd30">

				<td>2</td>
				<td colspan="3" class="text-left">Tingkat nasional</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0030['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0030['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0030; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0030['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0030['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0030 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0030/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0030['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0030" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0030" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="30"><i class=" fa fa-plus-square"></i></a>
						<div id="div30" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0030['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0030['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0030['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_d0031 = "select *from usulan_dupaks where dupak_no='d0031' and usulan_no='$no'";
			$data_d0031 = mysqli_query($koneksi, $sql_d0031);
			$data_bid_d_d0031 = mysqli_fetch_array($data_d0031);
			$jumlah_d0031 = $data_bid_d_d0031['kum_usulan_lama'] + $data_bid_d_d0031['kum_usulan_baru'];
			$kum_nilai_d0031 = $data_bid_d_d0031['kum_penilai_lama'] + $data_bid_d_d0031['kum_penilai_baru'];
			?>
			<?php
			$cek_D0031 = "select *from usulan_dupak_details where dupak_no='D0031' and usulan_no='$no'";
			$da_D0031 = mysqli_query($koneksi, $cek_D0031);
			$r_D0031 = mysqli_fetch_array($da_D0031);

			if ($r_D0031['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd31">

				<td>3</td>
				<td colspan="3" class="text-left">Tingkat daerah/lokal</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0031['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0031['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0031; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0031['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0031['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0031 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0031/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0031['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0031" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0031" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="31"><i class=" fa fa-plus-square"></i></a>
						<div id="div31" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0031['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0031['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0031['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<tr class="text-center">
				<td rowspan="2">J</td>
				<td colspan="4" class="text-left">Keanggotaan dalam tim penilaian</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_d0032 = "select *from usulan_dupaks where dupak_no='d0032' and usulan_no='$no'";
			$data_d0032 = mysqli_query($koneksi, $sql_d0032);
			$data_bid_d_d0032 = mysqli_fetch_array($data_d0032);
			$jumlah_d0032 = $data_bid_d_d0032['kum_usulan_lama'] + $data_bid_d_d0032['kum_usulan_baru'];
			$kum_nilai_d0032 = $data_bid_d_d0032['kum_penilai_lama'] + $data_bid_d_d0032['kum_penilai_baru'];
			?>
			<?php
			$cek_D0032 = "select *from usulan_dupak_details where dupak_no='D0032' and usulan_no='$no'";
			$da_D0032 = mysqli_query($koneksi, $cek_D0032);
			$r_D0032 = mysqli_fetch_array($da_D0032);

			if ($r_D0032['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd32">

				<td>1</td>
				<td colspan="3" class="text-left">Menjadi anggota tim penilaian jabatan Akademik Dosen</td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0032['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0032['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_d0032; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0032['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_d0032['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_d0032 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0032/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0032['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0032" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0032" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="32"><i class=" fa fa-plus-square"></i></a>
						<div id="div32" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0032['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0032['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0032['valid'] ?>" name="dwarna">
				</td>
			</tr>

			<tr class="text-center">
				<td rowspan="4">K</td>
				<td colspan="4" class="text-left">Menjadi Asesor kegiatan seperti PAK, BKD, Hibah Penelitian dan Pengabdian (tiap kegiatan)</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
			$sql_D0033 = "select *from usulan_dupaks where dupak_no='D0033' and usulan_no='$no'";
			$data_D0033 = mysqli_query($koneksi, $sql_D0033);
			$data_bid_d_D0033 = mysqli_fetch_array($data_D0033);
			$jumlah_D0033 = $data_bid_d_D0033['kum_usulan_lama'] + $data_bid_d_D0033['kum_usulan_baru'];
			$kum_nilai_D0033 = $data_bid_d_D0033['kum_penilai_lama'] + $data_bid_d_D0033['kum_penilai_baru'];
			?>
			<?php
			$cek_D0033 = "select *from usulan_dupak_details where dupak_no='D0033' and usulan_no='$no'";
			$da_D0033 = mysqli_query($koneksi, $cek_D0033);
			$r_D0033 = mysqli_fetch_array($da_D0033);

			if ($r_D0033['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd33">

				<td>1</td>
				<td colspan="3" class="text-left">Skala internasional</td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0033['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0033['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_D0033; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0033['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0033['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_D0033 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0033/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0033['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0033" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0033" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="33"><i class=" fa fa-plus-square"></i></a>
						<div id="div33" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0033['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0033['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0033['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_D0034 = "select *from usulan_dupaks where dupak_no='D0034' and usulan_no='$no'";
			$data_D0034 = mysqli_query($koneksi, $sql_D0034);
			$data_bid_d_D0034 = mysqli_fetch_array($data_D0034);
			$jumlah_D0034 = $data_bid_d_D0034['kum_usulan_lama'] + $data_bid_d_D0034['kum_usulan_baru'];
			$kum_nilai_D0034 = $data_bid_d_D0034['kum_penilai_lama'] + $data_bid_d_D0034['kum_penilai_baru'];
			?>
			<?php
			$cek_D0034 = "select *from usulan_dupak_details where dupak_no='D0034' and usulan_no='$no'";
			$da_D0034 = mysqli_query($koneksi, $cek_D0034);
			$r_D0034 = mysqli_fetch_array($da_D0034);

			if ($r_D0034['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd34">

				<td>2</td>
				<td colspan="3" class="text-left">Skala nasional</td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0034['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0034['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_D0034; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0034['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0034['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_D0034 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0034/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0034['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0034" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0034" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="34"><i class=" fa fa-plus-square"></i></a>
						<div id="div34" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0034['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0034['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0034['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_D0035 = "select *from usulan_dupaks where dupak_no='D0035' and usulan_no='$no'";
			$data_D0035 = mysqli_query($koneksi, $sql_D0035);
			$data_bid_d_D0035 = mysqli_fetch_array($data_D0035);
			$jumlah_D0035 = $data_bid_d_D0035['kum_usulan_lama'] + $data_bid_d_D0035['kum_usulan_baru'];
			$kum_nilai_D0035 = $data_bid_d_D0035['kum_penilai_lama'] + $data_bid_d_D0035['kum_penilai_baru'];
			?>
			<?php
			$cek_D0035 = "select *from usulan_dupak_details where dupak_no='D0035' and usulan_no='$no'";
			$da_D0035 = mysqli_query($koneksi, $cek_D0035);
			$r_D0035 = mysqli_fetch_array($da_D0035);

			if ($r_D0035['kunci'] == '1') {
				$warna = "#00FF00";
			} else {
				$warna = "";
			}
			?>
			<tr bgcolor="<?= $warna ?>" id="trd35">

				<td>3</td>
				<td colspan="3" class="text-left">Tingkat Regional/lokal</td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0035['kum_usulan_lama']; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0035['kum_usulan_baru'] ?></td>
				<td style="white-space: nowrap"><?= $jumlah_D0035; ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0035['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap"><?= $data_bid_d_D0035['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap"><?= $kum_nilai_D0035 ?></td>
				<td style="white-space: nowrap">

					<a href="<?= base_url() ?>ketenagaan/usulan_dupak_d/dupak/D0035/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_blank'><i class="fa fa-search"></i></a>
					<?php if ($data_bid_d_d0035['dupak_no'] && ($role == '1' || $role == '6') && $usulan_status_id == '3') {

					?>
						<a href="<?= base_url() ?>ketenagaan/ketenagaan/validate_a/<?= $no ?>/D0035" class="btn btn-xs btn-success  " onclick="return confirm('Berkas Sudah Sesuai ??')"><i class=" fa fa-check-square-o"></i></a>
						<a data-target="#myModal-D0035" data-toggle="modal" class="btn btn-xs btn-danger"><i class=" fa fa-window-close-o"></i></a>

						<a class="showSingle buttons" target="35"><i class=" fa fa-plus-square"></i></a>
						<div id="div35" class="targetDivD" style="display:none;">
							<p><?= $data_bid_d_d0035['keterangan'] ?></p>
							<p><b>PIC: </b><?= $data_bid_d_d0035['user_val'] ?></p>
						</div>



					<?php } ?>
					<input type="hidden" value="<?= $data_bid_d_d0035['valid'] ?>" name="dwarna">
				</td>
			</tr>
			<?php
			$sql_total = "SELECT
					  SUM(`kum_usulan_lama`) AS kum_lama,
					  SUM(`kum_usulan_baru`) AS kum_baru,
					  SUM(`kum_penilai_lama`) AS kum_penilai_lama,
					  SUM(`kum_penilai_baru`) AS kum_penilai_baru
					FROM
					  usulan_dupaks
					WHERE usulan_no = '$no'
					  AND LEFT(dupak_no, 1) = 'D'";
			$data_total = mysqli_query($koneksi, $sql_total);
			$data_kum_total = mysqli_fetch_array($data_total);
			$jmlah_kum = $data_kum_total['kum_lama'] + $data_kum_total['kum_baru'];
			$jmlah_kum_penilai = $data_kum_total['kum_penilai_lama'] + $data_kum_total['kum_penilai_baru'];
			?>
			<tr style="background-color: #e4e4e4; font-weight: bold;">

				<td colspan="6" class="text-right"><b>JUMLAH BIDANG D</b></td>
				<td style="white-space: nowrap" class="text-center"><?= $data_kum_total['kum_lama'] ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $data_kum_total['kum_baru'] ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $jmlah_kum ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $data_kum_total['kum_penilai_lama'] ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $data_kum_total['kum_penilai_baru'] ?></td>
				<td style="white-space: nowrap" class="text-center"><?= $jmlah_kum_penilai ?></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript">
	wxd = [];
	wrd = [];

	var trdIDs = ["trd1", "trd2", "trd3", "trd4", "trd5", "trd6", "trd7", "trd8", "trd9", "trd10", "trd11", "trd12", "trd13", "trd14", "trd15", "trd16",
		"trd17", "trd18", "trd19", "trd20", "trd21", "trd22", "trd23", "trd24", "trd25", "trd26", "trd27", "trd28", "trd29", "trd30", "trd31", "trd32", "trd33", "trd34", "trd35"
	];

	//var trcIDs = document.getElementsById("trc");


	$("input[name='dwarna']").each(function() {
		wxd.push($(this).val())
	});
	for (i = 0; i < trdIDs.length; i++) {
		wrd[i] = wxd[i] == "200" ? "rgba(0, 204, 255, .6)" : wxd[i] == "400" ? "rgba(255, 0, 0, .5)" : "";
		document.getElementById(trdIDs[i]).style.backgroundColor = wrd[i];

	};
</script>
<script>
	$(function() {
		$('.showSingle').click(function() {
			$('.targetDivD').not('#div' + $(this).attr('target')).hide();
			$('#div' + $(this).attr('target')).toggle();
		});
	});
</script>

<?php

foreach ($qrd_dupak as $rdd) {


?>
	<!-- Modal -->
	<form method="post" action="<?= base_url() ?>ketenagaan/ketenagaan/validate_dupax/<?php echo $no; ?>" role="form" enctype="multipart/form-data">
		<div id="myModal-<?= $rdd->dupak_no ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Validasi Berkas</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="nodupak" value="<?= $rdd->dupak_no ?>" />
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

<?php } ?>