<?php
error_reporting(0);
 ?>   




<script src="<?= base_url()?>assets/node_modules/timeline/js/jquery.js"></script>
<link rel="stylesheet" type="text/css"  href="<?= base_url()?>assets/node_modules/timeline/css/timeline.min.css">
<script src="<?= base_url()?>assets/node_modules/timeline/js/timeline.min.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="<?= base_url()?>assets/dist/js/perfect-scrollbar.jquery.min.js"></script>

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

<article class="col-md-10 offset-md-1">
			<br />
			<h3 align="center"><a href="">Status Pengajuan Jabatan</a></a></h3><br />
            
			<div class="panel panel-default">
				<div class="panel-heading">
                    
                </div>
                
                <div class="panel-body ">
                
                	<div class="timeline ">
                    
                        <div class="timeline__wrap">
                        <div class="col-sm-12" id="slimtest4" style="height: 500px;">
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

<script type="text/javascript">
    $('#slimtest1, #slimtest2, #slimtest3, #slimtest4').perfectScrollbar();
    </script>