<?php
error_reporting(0);
?>
<style>
	.collapsible {
		background-color: #b3e7ff;
		color: #ff8080;
		cursor: pointer;
		padding: 18px;
		width: 100%;
		border: none;
		text-align: left;
		outline: none;
		font-size: 15px;

	}

	.active,
	.collapsible:hover {
		background-color: #ffffff;
	}

	.content {
		padding: 0 18px;
		display: none;
		overflow: hidden;
		background-color: #ffffff;
	}
</style>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Usulan JAD :
			<?php
			if ($da->usulan_status_id == '1') {
				echo "Draft";
			} elseif ($da->usulan_status_id == '2') {
				echo "Draft Revisi";
			} elseif ($da->usulan_status_id == '3') {
				echo "Usulan Baru";
			} elseif ($da->usulan_status_id == '4') {
				echo "Proses Approval Tim Penilai";
			} elseif ($da->usulan_status_id == '5') {
				echo "Proses Penilaian";
			} elseif ($da->usulan_status_id == '6') {
				echo "Proses Operator Ketenagaan";
			} elseif ($da->usulan_status_id == '7') {
				echo "Proses Dikti";
			} elseif ($da->usulan_status_id == '8') {
				echo "Proses Operator Kepegawaian";
			} elseif ($da->usulan_status_id == '9') {
				echo "Selesai";
			} elseif ($da->usulan_status_id == '10') {
				echo "Pengajuan Usulan Baru";
			}
			?>
		</h4>
	</div>
</div>

<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"> <a class="nav-link " href="<?= base_url() ?>usulan/usulan/usulans/view/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>

					<?php if ($role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_mtk_pak/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah PAK</span></a> </li>
					<?php } ?>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_matakul/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_pendidikan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>

					<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>usulan/usulan/show_log/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>

					<?php if ($da->usulan_status_id == '9'  && $role <> '3') { ?>
						<li class="nav-item"> <a class="nav-link active" href="<?= base_url() ?>usulan/usulan/skpak/<?php echo $no_usulan; ?>"><span class="hidden-sm-up"><i class="ti-files"></i></span> <span class="hidden-xs-down">SK & PAK</span></a> </li>
					<?php } ?>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<div class="tab-pane active p-20" id="dasar" role="tabpanel">
						<div class="card">
							<div class="col-lg-12">
								<button type="button" class="collapsible">PAK</button>
								<div class="content">
									<?= $doc_pak; ?>
									<?= $f_pak; ?>
								</div>

								<button type="button" class="collapsible">SK JFA</button>
								<div class="content">
									<?= $doc_jfa; ?>
									<?= $f_jfa; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
				content.style.display = "none";
			} else {
				content.style.display = "block";
			}
		});
	}
</script>