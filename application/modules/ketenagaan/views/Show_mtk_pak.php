<?php
error_reporting(0);
include "koneksi.php";
?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->


<div class="flash-tambah" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
			
<!-- Tab panes -->
<!-- <?php if($role <>'3'){ ?>                     -->
<?php
$mtk="SELECT
		  `uraian`
		FROM
		  `usulan_dupak_details`
		WHERE `dupak_no` = 'A0004'
		  AND `usulan_no` = '$no'
		 GROUP BY `uraian` ASC ";
?>
<div class="tab-content tabcontent-border">     
<div class="tab-pane active p-20" id="dasar" role="tabpanel" >                   
<div class="card">
<div class="col-lg-12">
<div class="card-header bg-info">
	<h4 class="m-b-0 text-white">Mata Kuliah yang dipilih untuk PAK</h4>
</div>
<div class="card-body">
	<?php
	$no_mtk=1;
	$tampil_mtk="SELECT
				  *
				FROM
				  `usulan_matkuls`
				WHERE usulan_no = '$no'";
	$c_tampil_mtk=mysqli_query($koneksi,$tampil_mtk);
	?>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>NO</th>
					<th>Matakuliah</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while($r_tampil_mtk=mysqli_fetch_array($c_tampil_mtk))
				{
				?>
				<tr>
					<td class="txt-oflo"><?=$no_mtk?></td>
					<td class="txt-oflo"><?=$r_tampil_mtk['mtk']?></td>
					<td class="txt-oflo"><a href="<?php echo base_url().'ketenagaan/ketenagaan/hapus_mtk_pak/'.$r_tampil_mtk[no_usulan_matkul].'/'.$no?>" title="Hapus Matakuliah" ><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash" ></i> </button></a></td>
				</tr>
				<?php
				$no_mtk++;
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
</div>

<form action="<?php echo base_url().'ketenagaan/ketenagaan/update_mtk_pak/'.$no ?>" method="post" enctype="multipart/form-data" >              
<div class="card">
<div class="col-lg-12">
<div class="card-header bg-info">
	<h4 class="m-b-0 text-white">Tambah Mata Kuliah untuk PAK</h4>
</div>
	<div class="card-body">
		<div class="form-group m-t-40 row">
			<label for="example-text-input" class="col-2 col-form-label">Matakuliah</label>
			<div class="col-10">
			<select name="mtk" class="select2 input-default" style="width: 100%"  >
				<?php 
				$c_mtk1=mysqli_query($koneksi,$mtk);
				while($mtk1=mysqli_fetch_array($c_mtk1))
				{
				?>	
				<option value="<?=$mtk1['uraian']?>"><?=$mtk1['uraian']?></option>
				<?php	
				}
				?>
			</select>
			</div>
		</div>
		<div class="form-group">
			<div class="text-center">
				<?php if($role == '3' ){ }else{?>
				<button type="submit" class="btn btn-info">Update Matakuliah</button>
				<?php  }?>
			</div>
		</div> 
	</div>
</div>
</div>
</div>
</form>
<!-- <?php } ?>  -->


			</div>                             
		</div>
	</div>
</div>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
       
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<script>
 $('select').select2({ width: '100%', placeholder: "Pilih Mata Kuliah", allowClear: true });
    </script>