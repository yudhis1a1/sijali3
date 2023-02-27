<?php
error_reporting(0);
?>   
 
<script src="<?= base_url()?>assets/node_modules/timeline/js/jquery.js"></script>
<link rel="stylesheet" type="text/css"  href="<?= base_url()?>assets/node_modules/timeline/css/timeline.min.css">
<script src="<?= base_url()?>assets/node_modules/timeline/js/timeline.min.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= base_url()?>assets/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h4 class="text-themecolor">Usulan JAD : 
	<?php
	if($usulan_status_id =='1')
	{
		echo "Draft";
	}elseif($usulan_status_id =='2')
	{
		echo "Draft Revisi";
	}elseif($usulan_status_id =='3')
	{
		echo "Usulan Baru";
	}elseif($usulan_status_id =='4')
	{
		echo "Proses Approval Tim Penilai";
	}elseif($usulan_status_id =='5')
	{
		echo "Proses Penilaian";
	}elseif($usulan_status_id =='6')
	{
		echo "Proses Operator Ketenagaan";
	}elseif($usulan_status_id =='7')
	{
		echo "Proses Dikti";
	}elseif($usulan_status_id =='8')
	{
		echo "Proses Operator Kepegawaian";
	}else
	{
		echo "Selesai";
	}
	?>
</div>

</div>

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body">

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item"> <a class="nav-link "  href="<?= base_url()?>usulan/usulan/usulans/view/<?php echo $no; ?>/<?=$jabatan_no?>" ><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/show_matakul/<?php echo $no; ?>/<?=$jabatan_no?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/show_pendidikan/<?php echo $no; ?>/<?=$jabatan_no?>" ><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/bidangA/<?php echo $no; ?>/<?=$jabatan_no?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangB/<?php echo $no; ?>/<?=$jabatan_no?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangC/<?php echo $no; ?>/<?=$jabatan_no?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangD/<?php echo $no; ?>/<?=$jabatan_no?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/persyaratan/<?php echo $no; ?>/<?=$jabatan_no?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/show_resume/<?php echo $no; ?>/<?=$jabatan_no?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link active" href="<?= base_url()?>usulan/usulan/show_log/<?php echo $no; ?>/<?=$jabatan_no?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>

</ul>
<!-- Tab panes -->

<div id="content">

<div class="row">
	
<?php
  if($logs->num_rows()>0){
?>

<article class="col-md-10 offset-md-1">
			<br />
			<h3 align="center">Status Pengajuan Jabatan</h3><br />
            
			<div class="panel panel-default">
				<div class="panel-heading">
                    
                </div>
                
                <div class="panel-body ">
                
                	<div class="timeline ">
                    
                        <div class="timeline__wrap">
                        <div class="col-sm-12" id="slimtest4" style="height: 500px;">
                            <div class="timeline__items">   
                             <?php foreach($logs-> result_array() as $log)
							 {
							   $tgl=gfDateDays($log['updated_at']);
                               $date = new DateTime($log['updated_at']);
								$ftgl=$tgl.'   '.$date->format('H:i:s'); 
							 ?>
								<div class="timeline__item">
                                    <div class="timeline__content ">
                                    	<h2><?php echo $ftgl; ?></h2>
                                        <p><strong><?php echo $log["nama_status"]; ?></strong></p>
                                    	<p><?php echo $log["keterangan_pengusul"]; ?></p>
                                    </div>
                                </div>
                            <?php
                            } 
                            ?>
                           
                            </div>
                        </div>
                       </div>
                    </div>
                </div>                
			</div>
																	
																				


</article> 

<?php
                        } else {
                            ?> 
                                <article class="col-sm-12">
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <blockquote class="blockquote-reverse">     
                                <h1 align="center"><strong>Tidak Ditemukan Riwayat Ajuan</strong></h1><br />                                                                       
                                </blockquote>                                                                            
                                        </article> 

                            <?php
                            } 
                        
                            ?> 
</div>
																	 
<!-- /menu kanan end -->                                         
																								
																								


</div><!-- /.row -->      


	
	
	
</div>
</div>
</div>
</div>

<script>
$(document).ready(function(){
    jQuery('.timeline').timeline();
});
</script>

<script type="text/javascript">
    $('#slimtest1, #slimtest2, #slimtest3, #slimtest4').perfectScrollbar();
    </script>