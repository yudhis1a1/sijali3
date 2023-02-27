
<?php
$get_usulans = $this->db->query("SELECT * from usulans where usulan_status_id='3'")->result();
foreach($get_usulans as $us) {
    $nox=$us->no;
$v_usulans = $this->db->query("SELECT * from v_usulans where no='$nox'")->row();
$jenjang = $this->db->query("SELECT nama_jenjang from jenjangs where id='$v_usulans->jenjang_id'")->row();
$jab_awal = $this->db->query("SELECT nama_jabatans,kum from jabatans where kode='$v_usulans->jabatan_no'")->row();
$jab_usulan = $this->db->query("SELECT nama_jabatans,kum from jabatans where kode='$v_usulans->jabatan_no'")->row();
$jenjang_baru = $this->db->query("SELECT nama_jenjang from jenjangs where id='$v_usulans->jenjang_id_baru'")->row();
$cek_jab = $this->db->query("SELECT
											  jabatan_akhir_no,
											  jabatan_usulan_no
											FROM
											  jabatan_syarats
											WHERE jabatan_akhir_no = '$v_usulans->jabatan_akhir_no'
											  AND jabatan_usulan_no = '$v_usulans->jabatan_usulan_no'")->row();
$awal_jab = $this->db->query("SELECT
											  c.`nama_jabatans`,
											  c.kum
											FROM
											  `jabatan_syarats` a
											  JOIN `jabatan_jenjangs` b
												ON a.`jabatan_akhir_no` = b.`no`
											  JOIN `jabatans` c
												ON b.`jabatan_kode` = c.`kode`
											WHERE a.`jabatan_akhir_no` = '$cek_jab->jabatan_akhir_no'")->row();
$usul_jab = $this->db->query("SELECT
                                            a.`no`,
                                            b.`kode`,
                                            b.`nama_jabatans`,
                                            b.`kum`,
                                            c.`id`,
                                            c.`nama_jenjang`
                                            FROM
                                            `jabatan_jenjangs` a
                                            JOIN `jabatans` b
                                                ON a.`jabatan_kode` = b.`kode`
                                            JOIN `jenjangs` c
                                                ON a.`jenjang_id` = c.`id`
                                            WHERE a.`no`= '$v_usulans->jabatan_usulan_no'")->row();
$bid_ilmu_usul = $this->db->query("SELECT
												  a.`id_rwy_didik_formal`,
												  a.`id_sdm`,
												  a.`nm_sp_formal`,
												  a.`thn_lulus`,
												  a.`tgl_lulus`,
												  a.`id_jenj_didik`,
												  b.`nama_jenjang`,
												  a.`id_bid_studi`,
												  c.`nama_bidang`
												FROM
												  `rwy_pend_formal` a
												  LEFT JOIN `jenjangs` b
													ON a.`id_jenj_didik` = b.`id`
												  JOIN `bidang_ilmus` AS c
													ON a.`id_bid_studi` = c.`kode`
												WHERE a.`id_sdm` = '$v_usulans->dosen_no'
												ORDER BY a.`id_jenj_didik` DESC
												LIMIT 1")->row();
?>


<div class="modal fade" id="usulanbaru-<?=$nox;?>" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" style='font-weight: bold'>Usulan Baru</h4></br>
                                           
                                            </div>
											
                                            <div class="modal-body">
                                               <form id="form" class="smart-form" action="<?php echo base_url('ketenagaan/ketenagaan/kirimUsulan'); ?>"  enctype="multipart/form-data" method="POST">
	                            
                                            

	
	<div class="form-group m-t-40 row">

		<div class="col-md-5">
			<label for="berkas">NIDN/NIDK</label>
			<input class="form-control" type="text" id="nidn" value="<?php echo "$v_usulans->nidn /$v_usulans->nidk"; ?>" readonly>
            <input  type="hidden" name="noUsulan" value="<?=$nox?>" >
		</div>
		<div class="col-md-7">
			<label for="berkas">NAMA</label>
			<?php if (!empty($v_usulans->gelar_depan)) { ?>
				<input class="form-control" type="text" id="nama" value=" <?php echo $v_usulans->gelar_depan; ?>.<?php echo $v_usulans->nama; ?>, <?php echo $v_usulans->gelar_belakang; ?> " readonly>
			<?php } else { ?>
				<input class="form-control" type="text" id="nama" value=" <?php echo $v_usulans->nama; ?>, <?php echo $v_usulans->gelar_belakang; ?> " readonly>
			<?php } ?>
		</div>


	</div>
	<div class="form-group m-t-40 row">
		<div class="col-md-6">
			<label for="berkas">JABATAN AWAL</label>
			<input class="form-control" type="text" id="nidn" value="<?php echo "$jab_awal->nama_jabatans"; ?> (<?php echo $jab_awal->kum; ?>)" readonly>
		</div>
	
		<div class="col-md-6">
			<label for="berkas">Usulan Jabatan</label>
			<input class="form-control" type="text" id="nama" value=" <?php echo $usul_jab->nama_jabatans; ?> (<?php echo $usul_jab->kum; ?>)" readonly>
		</div>
	
	</div>
    <div class="form-group m-t-40 row">
	
		<div class="col-md-6">
			<label for="berkas">Pendidikan Pada Jab.terakhir</label>
			<input class="form-control" type="text" id="nama" value=" <?php echo $jenjang->nama_jenjang; ?>" readonly>
		</div>
	
		<div class="col-md-6">
			<label for="berkas">Pend. & Bid. Ilmu Usulan Jabatan</label>
			<input class="form-control" type="text" id="nama" value=" <?php echo $jenjang_baru->nama_jenjang; ?>, <?php echo $bid_ilmu_usul->nama_bidang; ?>" readonly>
		</div>
	
	</div>
  
			<div class="form-group">
						<label for="user_penilai_no">Pilih Staf</label>
						<select class="form-control select2" style="width: 100%; height:36px;" id="stafptk" name="stafptk" required>

							<?php
							echo '<option value="" disabled selected hidden>Click to Choose...</option>';


							foreach ($staf as $stf) {
								echo '<option value="' . $stf->no . '">' . $stf->nama . ' </option>';
							?>
							<?php
							}
							echo '</select>';
							?>

					</div>

                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary" >Tugaskan</button>
                                            </div>
											</form>
                                           
                                        </div>
                                    </div>
                                </div>   
                                <?php } ?>
                      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

