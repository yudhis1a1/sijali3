

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h4 class="text-themecolor">Detail Usulan JAD</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Ketenagaan</a></li>                               
<li class="breadcrumb-item"><a href="javascript:void(0)">Detail</a></li>

</ol>

</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body">

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item"> <a class="nav-link "  href="<?= base_url()?>usulan/usulan/usulans/view/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
	<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/show_matakul/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/show_pendidikan/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
	<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
	
	<li class="nav-item"> 
		<a class="nav-link"  href="<?= base_url()?>usulan/usulan/bidangB/<?php echo $no; ?>" >
		<span class="hidden-sm-up">
			<i class="ti-agenda "></i>
		</span> 
		<span class="hidden-xs-down">Bidang B</span>
		</a> 
	</li>
	
		
	<li class="nav-item"> 
		<a class="nav-link"  href="<?= base_url()?>usulan/usulan/bidangC/<?php echo $no; ?>" >
		<span class="hidden-sm-up">
			<i class="ti-agenda "></i>
		</span> 
		<span class="hidden-xs-down">Bidang C</span>
		</a> 
	</li>
	
	<li class="nav-item"> 
		<a class="nav-link"  href="<?= base_url()?>usulan/usulan/bidangD/<?php echo $no; ?>" >
		<span class="hidden-sm-up">
			<i class="ti-agenda "></i>
		</span> 
		<span class="hidden-xs-down">Bidang D</span>
		</a> 
	</li>
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/persyaratan/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
	
	<li class="nav-item"> 
		<a class="nav-link "  href="<?= base_url()?>usulan/usulan/show_resume/<?php echo $no; ?>" >
		<span class="hidden-sm-up">
			<i class="ti-agenda "></i>
		</span> 
		<span class="hidden-xs-down">Resume</span>
		</a> 
	</li>
	
	<li class="nav-item"> <a class="nav- active" href="<?= base_url()?>usulan/usulan/show_log/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>

</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border">
<?php $no_usulan=$no; ?>
	<div class="tab-pane active p-20" id="dasar" role="tabpanel" >
	<div class="row">
  <div class="col-md-12">
      <div class="tile">
        <div class="table-responsive">
            <table id="table-matkul" class="table table-bordered table-hover">
                <thead>
                  <tr class="text-center">
                    <th colspan="3" class="text-center"><h3>Log Riwayat Usulan</h3></th>
                  </tr>
                  <tr>
                    <th>Date/Time</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($logs as $log){ ?>
                  <tr>
                    <td><?php echo $log->updated_at; ?></td>
                    <td><?php echo $log->nama_status; ?></td>
                    <td>
					<?php echo $log->keterangan_pengusul; ?>
                    </td>
                  </tr>
				  <?php } ?>
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
