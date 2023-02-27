<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<?php if ($sinkron_ajar->sinkron_at <> '') { ?>
				<font color="red">
					<b><i>*Data telah disinkron pada tanggal <?= $sinkron_ajar->sinkron_at ?></i></b>
				</font>
			<?php } ?>
			<table width="100%" class="table color-table info-table" border="1">
				<thead>
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
				$no_matkul = 1;
				$q_thn = "SELECT SEMESTER,KODEMK,NMMK,KELAS,NMPT FROM `ajar_dosen` where NIDN='$nidn' ORDER BY SEMESTER,KODEMK,KELAS ASC";
				$data_thn = mysqli_query($koneksi, $q_thn);
				while ($row_thn = mysqli_fetch_array($data_thn)) {
				?>

					<tbody>
						<tr>
							<td><?= $no_matkul; ?></td>
							<td><?= $row_thn['SEMESTER'] ?> </td>
							<td><?= $row_thn['KODEMK'] ?> </td>
							<td><?= $row_thn['NMMK'] ?> </td>
							<td><?= $row_thn['KELAS'] ?> </td>
							<td><?= $row_thn['NMPT'] ?></td>
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