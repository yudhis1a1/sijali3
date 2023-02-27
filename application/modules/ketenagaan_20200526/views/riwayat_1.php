<?php
error_reporting(0);
 ?>   




<script src="<?= base_url()?>assets/node_modules/timeline/js/jquery.js"></script>
<link rel="stylesheet" type="text/css"  href="<?= base_url()?>assets/node_modules/timeline/css/timeline.min.css">
<script src="<?= base_url()?>assets/node_modules/timeline/js/timeline.min.js"></script>


<div id="content">

<div class="row">
	
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class=" txt-color-blueDark text-left well">
			
			<!-- PAGE HEADER -->
			<i class=""></i> <?php echo $label; ?><br>
				
		</h1>
		
	</div>
<?php
  if($rwy->num_rows()>0){
?>
<article class="col-sm-12">
			<br />
			<h3 align="center"><a href="">History Pengajuan Surat</a></a></h3><br />
			<div class="panel panel-default">
				<div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-envelope"></span> Riwayat Ajuan</h3>
                </div>
                <div class="panel-body ">
                	<div class="timeline ">
                        <div class="timeline__wrap">
                            <div class="timeline__items">                        
                            <?php
                          
                           
                            foreach($rwy -> result_array() as $row )
                            {
                               $tgl=gfDateDays($row['created_at']);
                               $date = new DateTime($row['created_at']);
								$ftgl=$tgl.'   '.$date->format('H:i:s'); 
                            ?>
                            	<div class="timeline__item">
                                    <div class="timeline__content ">
                                    	<h2><?php echo $ftgl; ?></h2>
                                        <p><strong><?php echo $row["nama_status"]; ?></strong></p>
                                    	<p><?php echo $row["keterangan"]; ?></p>
                                        <p><?php echo $row["keterangan_pengusul"]; ?></p>
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
<script>
$(document).ready(function(){
    jQuery('.timeline').timeline();
});
</script>