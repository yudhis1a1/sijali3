<div class="table-responsive">
	<?php if ($sinkron_pen->sinkron_at <> '') { ?>
		<font color="red">
			<b><i>*Data telah disinkron pada tanggal <?= $sinkron_pen->sinkron_at ?></i></b>
		</font>
	<?php } ?>
	<table class="table color-table info-table">
		<thead>
			<tr>
				<th valign="top">No</th>
				<th valign="top" width="40%">Perguruan Tinggi</th>
				<th valign="top" width="5%">Jenjang</th>
				<th valign="top" width="25%">Bidang Ilmu</th>
				<th valign="top" width="25%">Tanggal <br>Penerbitan ijazah</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			$pend = "SELECT
				  a.`nm_sp_formal`,
				  a.`id_rwy_didik_formal`,
				  a.id_jenj_didik,
				  b.`nama_jenjang`,
				  a.id_bid_studi,
				  c.`nama_bidang`,
				  a.`thn_lulus`
				FROM
				  `rwy_pend_formal` a
				  LEFT JOIN `jenjangs` b
					ON a.`id_jenj_didik` = b.`id`
				  LEFT JOIN `bidang_ilmus` c
					ON a.`id_bid_studi` = c.`kode`
				WHERE a.`id_sdm` = '$dosen_no'";
			$da_pend = mysqli_query($koneksi, $pend);
			while ($r_pend = mysqli_fetch_array($da_pend)) {

				$cek_q1 = $this->db->query("SELECT
									  *
									FROM
									  file_rwy_pendidik
									WHERE id_rwy_didik_formal = '$r_pend[id_rwy_didik_formal]'
									  AND id_sdm = '$dosen_no'")->row();
			?>
				<tr>
					<td>
						<?php echo $no; ?>
					</td>
					<td width="40%">
						<input type="hidden" value="<?= $r_pend['id_rwy_didik_formal'] ?>" name="id_rwy_didik_formal[]" readonly>

						<textarea class="form-control" required data-validation-required-message="This field is required" name="nm_sp_formal[<?= $r_pend['id_rwy_didik_formal'] ?>]" readonly><?= $r_pend['nm_sp_formal'] ?></textarea>

					</td>
					<td width="5%">
						<input type="hidden" value="<?= $r_pend['id_jenj_didik'] ?>" name="id_jenj_didik[]" readonly>
						<input type="hidden" value="<?= $r_pend['nama_jenjang'] ?>" name="nama_jen[]" readonly>

						<input type="text" class="form-control" required data-validation-required-message="This field is required" name="nm_jenjang[<?= $r_pend['id_rwy_didik_formal'] ?>]" value="<?= $r_pend['nama_jenjang'] ?>" readonly>
					</td>
					<td width="25%">
						<input type="hidden" value="<?= $r_pend['id_bid_studi'] ?>" name="id_bid_studi[]" readonly>

						<textarea class="form-control" required data-validation-required-message="This field is required" name="nm_bidang[<?= $r_pend['id_rwy_didik_formal'] ?>]" readonly><?= $r_pend['nama_bidang'] ?></textarea>
					</td>
					<td width="25%">
						<div class="col-11">
							<?php
							$ta = $this->db->query("SELECT
														*
													FROM
														`rwy_pend_pak`
													WHERE `no_dosen` = '$dosen_no'
														AND `id_rwy_didik_formal` = '$r_pend[id_rwy_didik_formal]'")->row();
							?>
							<input class="form-control" required data-validation-required-message="This field is required" name="tgl_ijazah_pak[]" type="date" value="<?= $ta->tgl_ijazah_pak ?>" placeholder="0000-00-00">
						</div>
					</td>
				</tr>
			<?php
				$no++;
			};
			?>
		</tbody>
	</table>

	<div class="card text-white bg-danger">
		<div class="card-body">
			<h3 class="card-title">Catatan :</h3>
			<p class="card-text"><b>1. Pastikan data Anda sudah benar. Jika data Anda masih salah atau kosong, silakan Anda perbarui data PDDIKTI Anda melalui SISTER atau Admin Perguruan Tinggi.</b></p>
			<p class="card-text"><b>2. Data yang telah diperbaharui dan sudah tervalidasi melalui laman SISTER akan terproses dalam jangka waktu 2 x 24 jam untuk ditampilkan pada Sistem Jabatan Fungsional LLDIKTI III (SIJALI III).</b></p>
			<p class="card-text"><b>3. Data yang tidak lengkap atau tidak sesuai maka akan membuat waktu pengajuan Anda semakin lama.</b></p>
		</div>
	</div>
</div>