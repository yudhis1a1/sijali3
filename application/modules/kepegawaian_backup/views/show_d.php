<?php
error_reporting(0);
?>
<div class="row">    
<table  class="ui celled table">
<tr>
<td>
<center>

<a href="<?= base_url()?>kepegawaian/kepegawaian/print_bidangd/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> BIDANG D</a>
<a href="<?= base_url()?>kepegawaian/kepegawaian/print_dupak/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> PRINT DUPAK</a>
</center>

</td>
</tr>
</table>                    
                                                     
                               
                             
<table class="cust-table cust-table-bordered">

<col width="30" span="5" />
<col width="309" />
<col width="61" span="2" />
<col width="75" />
<col width="61" span="2" />
<col width="75" />
<col width="88" />

<thead>
  <tr class="text-center">
	<th rowspan="4" class="text-center" style="vertical-align: middle;">NO.</th>
	<th colspan="11" class="text-center">UNSUR YANG DINILAI</th>
	<th rowspan="4" class="text-center" style="vertical-align: middle;">
	AKSI
	</th>
  </tr>
  <tr class="text-center">
	<th colspan="5" rowspan="3" class="text-center" style="vertical-align: middle;">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</th>
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
	<td rowspan="53">V</td>
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
	$no;			
	$D0001= $this->db->query("select * from usulan_dupaks where dupak_no='D0001' and usulan_no='$no'")->row();
	$sum_D0001=$D0001->kum_usulan_lama+$D0001->kum_usulan_baru;
	$sum_P0001=$D0001->kum_penilai_lama+$D0001->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Sebagai ketua/wakil ketua merangkap anggota</td>
	<td  style="vertical-align: middle;"><?=$D0001->kum_usulan_lama;?></td>
	<td  style="vertical-align: middle;"><?=$D0001->kum_usulan_baru;?></td>
	<td  style="vertical-align: middle;"><?=$sum_D0001?></td>
	<td  style="vertical-align: middle;"><?=$D0001->kum_penilai_lama;?></td>
	<td  style="vertical-align: middle;"><?=$D0001->kum_penilai_baru;?></td>
	<td  style="vertical-align: middle;"><?=$sum_P0001?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0002= $this->db->query("select * from usulan_dupaks where dupak_no='D0002' and usulan_no='$no'")->row();
	$sum_D0002=$D0002->kum_usulan_lama+$D0002->kum_usulan_baru;
	$sum_P0002=$D0002->kum_penilai_lama+$D0002->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>2</td>
	<td colspan="3" class="text-left">Sebagai anggota</td>
	<td style="vertical-align: middle;"><?=$D0002->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0002->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0002?></td>
	<td style="vertical-align: middle;"><?=$D0002->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0002->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0002?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
		$D0003= $this->db->query("select * from usulan_dupaks where dupak_no='D0003' and usulan_no='$no'")->row();
		$sum_D0003=$D0003->kum_usulan_lama+$D0003->kum_usulan_baru;
		$sum_P0003=$D0003->kum_penilai_lama+$D0003->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>a.</td>
	<td colspan="2" class="text-left">Ketua/Wakil Ketua</td>
	<td style="vertical-align: middle;"><?=$D0003->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0003->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0003?></td>
	<td style="vertical-align: middle;"><?=$D0003->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0003->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0003?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0004= $this->db->query("select * from usulan_dupaks where dupak_no='D0004' and usulan_no='$no'")->row();
	$sum_D0004=$D0004->kum_usulan_lama+$D0004->kum_usulan_baru;
	$sum_P0004=$D0004->kum_penilai_lama+$D0004->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>b.</td>
	<td colspan="2" class="text-left">Anggota</td>
	<td style="vertical-align: middle;"><?=$D0004->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0004->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0004?></td>
	<td style="vertical-align: middle;"><?=$D0004->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0004->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0004?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	<tr class="text-center">
	<?php
		$D0005= $this->db->query("select * from usulan_dupaks where dupak_no='D0005' and usulan_no='$no'")->row();
		$sum_D0005=$D0005->kum_usulan_lama+$D0005->kum_usulan_baru;
		$sum_P0005=$D0005->kum_penilai_lama+$D0005->kum_penilai_baru;
	?>
	<td>a.</td>
	<td colspan="2" class="text-left">Ketua/Wakil Ketua</td>
	<td style="vertical-align: middle;"><?=$D0005->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0005->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0005?></td>
	<td style="vertical-align: middle;"><?=$D0005->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0005->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0005?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0006= $this->db->query("select * from usulan_dupaks where dupak_no='D0006' and usulan_no='$no'")->row();
	$sum_D0006=$D0006->kum_usulan_lama+$D0006->kum_usulan_baru;
	$sum_P0006=$D0006->kum_penilai_lama+$D0006->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>b.</td>
	<td colspan="2" class="text-left">Anggota</td>
	<td style="vertical-align: middle;"><?=$D0006->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0006->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0006?></td>
	<td style="vertical-align: middle;"><?=$D0006->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0006->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0006?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0007= $this->db->query("select * from usulan_dupaks where dupak_no='D0007' and usulan_no='$no'")->row();
	$sum_D0007=$D0007->kum_usulan_lama+$D0007->kum_usulan_baru;
	$sum_P0007=$D0007->kum_penilai_lama+$D0007->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>a.</td>
	<td colspan="2" class="text-left">Pengurus</td>
	<td style="vertical-align: middle;"><?=$D0007->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0007->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0007?></td>
	<td style="vertical-align: middle;"><?=$D0007->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0007->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0007?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
		$D0008= $this->db->query("select * from usulan_dupaks where dupak_no='D0008' and usulan_no='$no'")->row();
		$sum_D0008=$D0008->kum_usulan_lama+$D0008->kum_usulan_baru;
		$sum_P0008=$D0008->kum_penilai_lama+$D0008->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>b.</td>
	<td colspan="2" class="text-left">Anggota atas permintaan</td>
	<td style="vertical-align: middle;"><?=$D0008->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0008->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0008;?></td>
	<td style="vertical-align: middle;"><?=$D0008->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0008->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0008;?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0009= $this->db->query("select * from usulan_dupaks where dupak_no='D0009' and usulan_no='$no'")->row();
	$sum_D0009=$D0009->kum_usulan_lama+$D0009->kum_usulan_baru;
	$sum_P0009=$D0009->kum_penilai_lama+$D0009->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>c.</td>
	<td colspan="2" class="text-left">Anggota</td>
	<td style="vertical-align: middle;"><?=$D0009->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0009->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0009?></td>
	<td style="vertical-align: middle;"><?=$D0009->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0009->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0009?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0010= $this->db->query("select * from usulan_dupaks where dupak_no='D0010' and usulan_no='$no'")->row();
	$sum_D0010=$D0010->kum_usulan_lama+$D0010->kum_usulan_baru;
	$sum_P0010=$D0010->kum_penilai_lama+$D0010->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>a.</td>
	<td colspan="2" class="text-left">Pengurus</td>
	<td style="vertical-align: middle;"><?=$D0010->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0010->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0010?></td>
	<td style="vertical-align: middle;"><?=$D0010->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0010->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0010?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0011= $this->db->query("select * from usulan_dupaks where dupak_no='D0011' and usulan_no='$no'")->row();
	$sum_D0011=$D0011->kum_usulan_lama+$D0011->kum_usulan_baru;
	$sum_P0011=$D0011->kum_penilai_lama+$D0011->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>b.</td>
	<td colspan="2" class="text-left">Anggota atas permintaan</td>
	<td style="vertical-align: middle;"><?=$D0011->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0011->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0011?></td>
	<td style="vertical-align: middle;"><?=$D0011->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0011->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0011?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0012= $this->db->query("select * from usulan_dupaks where dupak_no='D0012' and usulan_no='$no'")->row();
	$sum_D0012=$D0012->kum_usulan_lama+$D0012->kum_usulan_baru;
	$sum_P0012=$D0012->kum_penilai_lama+$D0012->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>c.</td>
	<td colspan="2" class="text-left">Anggota</td>
	<td style="vertical-align: middle;"><?=$D0012->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0012->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0012?></td>
	<td style="vertical-align: middle;"><?=$D0012->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0012->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0012?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0013= $this->db->query("select * from usulan_dupaks where dupak_no='D0013' and usulan_no='$no'")->row();
	$sum_D0013=$D0013->kum_usulan_lama+$D0013->kum_usulan_baru;
	$sum_P0013=$D0013->kum_penilai_lama+$D0013->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td >1</td>
	<td colspan="3" rowspan="2" class="text-left">Mewakili perguruan tinggi/ Iembaga pemerintah duduk dalam panitia antar lembaga</td>
	<td style="vertical-align: middle;"><?=$D0013->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0013->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0013?></td>
	<td style="vertical-align: middle;"><?=$D0013->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0013->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0013?></td>
	<td  style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0014= $this->db->query("select * from usulan_dupaks where dupak_no='D0014' and usulan_no='$no'")->row();
	$sum_D0014=$D0014->kum_usulan_lama+$D0014->kum_usulan_baru;
	$sum_P0014=$D0014->kum_penilai_lama+$D0014->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>1</td>
	<td colspan="3" class="text-left">Sebagai ketua delegasi</td>
	<td style="vertical-align: middle;"><?=$D0014->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0014->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0014?></td>
	<td style="vertical-align: middle;"><?=$D0014->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0014->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0014?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0015= $this->db->query("select * from usulan_dupaks where dupak_no='D0015' and usulan_no='$no'")->row();
	$sum_D0015=$D0015->kum_usulan_lama+$D0015->kum_usulan_baru;
	$sum_P0015=$D0015->kum_penilai_lama+$D0015->kum_penilai_baru;
	?>
	<tr class="text-center">
	<td>2</td>
	<td colspan="3" class="text-left">Sebagai anggota delegasi</td>
	<td style="vertical-align: middle;"><?=$D0015->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0015->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0015?></td>
	<td style="vertical-align: middle;"><?=$D0015->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0015->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0015?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0016= $this->db->query("select * from usulan_dupaks where dupak_no='D0016' and usulan_no='$no'")->row();
	$sum_D0016=$D0016->kum_usulan_lama+$D0016->kum_usulan_baru;
	$sum_P0016=$D0016->kum_penilai_lama+$D0016->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>a.</td>
	<td colspan="2" class="text-left">Ketua</td>
	<td style="vertical-align: middle;"><?=$D0016->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0016->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0016?></td>
	<td style="vertical-align: middle;"><?=$D0016->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0016->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0016?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0017= $this->db->query("select * from usulan_dupaks where dupak_no='D0017' and usulan_no='$no'")->row();
	$sum_D0017=$D0017->kum_usulan_lama+$D0017->kum_usulan_baru;
	$sum_P0017=$D0017->kum_penilai_lama+$D0017->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>b.</td>
	<td colspan="2" class="text-left">Anggota</td>
	<td style="vertical-align: middle;"><?=$D0017->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0017->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0017?></td>
	<td style="vertical-align: middle;"><?=$D0017->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0017->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0017?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0017/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0018= $this->db->query("select * from usulan_dupaks where dupak_no='D0018' and usulan_no='$no'")->row();
	$sum_D0018=$D0018->kum_usulan_lama+$D0001->kum_usulan_baru;
	$sum_P0018=$D0018->kum_penilai_lama+$D0001->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>a.</td>
	<td colspan="2" class="text-left">Ketua</td>
	<td style="vertical-align: middle;"><?=$D0018->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0018->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0018?></td>
	<td style="vertical-align: middle;"><?=$D0018->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0018->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0018?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0018/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0019= $this->db->query("select * from usulan_dupaks where dupak_no='D0019' and usulan_no='$no'")->row();
	$sum_D0019=$D0019->kum_usulan_lama+$D0019->kum_usulan_baru;
	$sum_P0019=$D0019->kum_penilai_lama+$D0019->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>b.</td>
	<td colspan="2" class="text-left">Anggota</td>
	<td style="vertical-align: middle;"><?=$D0019->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0019->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0019?></td>
	<td style="vertical-align: middle;"><?=$D0019->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0019->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0019?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0019/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0020= $this->db->query("select * from usulan_dupaks where dupak_no='D0020' and usulan_no='$no'")->row();
	$sum_D0020=$D0020->kum_usulan_lama+$D0020->kum_usulan_baru;
	$sum_P0020=$D0020->kum_penilai_lama+$D0020->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>a.</td>
	<td colspan="2" class="text-left">30 (tiga puluh) tahun</td>
	<td style="vertical-align: middle;"><?=$D0020->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0020->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0020?></td>
	<td style="vertical-align: middle;"><?=$D0020->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0020->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0020?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0020/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
		$D0021= $this->db->query("select * from usulan_dupaks where dupak_no='D0021' and usulan_no='$no'")->row();
		$sum_D0021=$D0021->kum_usulan_lama+$D0021->kum_usulan_baru;
		$sum_P0021=$D0021->kum_penilai_lama+$D0021->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>b.</td>
	<td colspan="2" class="text-left">20 (dua puluh) tahun</td>
	<td style="vertical-align: middle;"><?=$D0021->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0021->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0021?></td>
	<td style="vertical-align: middle;"><?=$D0021->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0021->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0021?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0021/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0022= $this->db->query("select * from usulan_dupaks where dupak_no='D0022' and usulan_no='$no'")->row();
	$sum_D0022=$D0022->kum_usulan_lama+$D0022->kum_usulan_baru;
	$sum_P0022=$D0022->kum_penilai_lama+$D0022->kum_penilai_baru;;
	?>
	<tr class="text-center">

	<td>c.</td>
	<td colspan="2" class="text-left">10 (sepuluh) tahun</td>
	<td style="vertical-align: middle;"><?=$D0022->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0022->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0022?></td>
	<td style="vertical-align: middle;"><?=$D0022->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0022->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0022?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0022/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0023= $this->db->query("select * from usulan_dupaks where dupak_no='D0023' and usulan_no='$no'")->row();
	$sum_D0023=$D0023->kum_usulan_lama+$D0023->kum_usulan_baru;
	$sum_P0023=$D0023->kum_penilai_lama+$D0023->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>a.</td>
	<td colspan="2" class="text-left">Tingkat internasional</td>
	<td style="vertical-align: middle;"><?=$D0023->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0023->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0023?></td>
	<td style="vertical-align: middle;"><?=$D0023->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0023->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0023?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0023/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0024= $this->db->query("select * from usulan_dupaks where dupak_no='D0024' and usulan_no='$no'")->row();
	$sum_D0024=$D0024->kum_usulan_lama+$D0024->kum_usulan_baru;
	$sum_P0024=$D0024->kum_penilai_lama+$D0024->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>b.</td>
	<td colspan="2" class="text-left">Tingkat nasional</td>
	<td style="vertical-align: middle;"><?=$D0024->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0024->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0024?></td>
	<td style="vertical-align: middle;"><?=$D0024->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0024->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0024?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0024/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0025= $this->db->query("select * from usulan_dupaks where dupak_no='D0025' and usulan_no='$no'")->row();
	$sum_D0025=$D0025->kum_usulan_lama+$D0025->kum_usulan_baru;
	$sum_P0025=$D0025->kum_penilai_lama+$D0025->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>c.</td>
	<td colspan="2" class="text-left">Tingkat provinsi</td>
	<td style="vertical-align: middle;"><?=$D0025->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0025->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0025?></td>
	<td style="vertical-align: middle;"><?=$D0025->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0025->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0025?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0025/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0026= $this->db->query("select * from usulan_dupaks where dupak_no='D0026' and usulan_no='$no'")->row();
	$sum_D0026=$D0026->kum_usulan_lama+$D0026->kum_usulan_baru;
	$sum_P0026=$D0026->kum_penilai_lama+$D0026->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>1</td>
	<td colspan="3" class="text-left">Buku SLTA atau setingkat</td>
	<td style="vertical-align: middle;"><?=$D0026->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0026->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0026?></td>
	<td style="vertical-align: middle;"><?=$D0026->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0026->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0026?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0026/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0027= $this->db->query("select * from usulan_dupaks where dupak_no='D0027' and usulan_no='$no'")->row();
	$sum_D0027=$D0027->kum_usulan_lama+$D0027->kum_usulan_baru;
	$sum_P0027=$D0027->kum_penilai_lama+$D0027->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>2</td>
	<td colspan="3" class="text-left">Buku SLTP atau setingkat</td>
	<td style="vertical-align: middle;"><?=$D0027->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0027->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0027?></td>
	<td style="vertical-align: middle;"><?=$D0027->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0027->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0027?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0027/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
	</td>
	</tr>
	<?php
	$D0028= $this->db->query("select * from usulan_dupaks where dupak_no='D0028' and usulan_no='$no'")->row();
	$sum_D0028=$D0028->kum_usulan_lama+$D0028->kum_usulan_baru;
	$sum_P0028=$D0028->kum_penilai_lama+$D0028->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>3</td>
	<td colspan="3" class="text-left">Buku SD atau setingkat</td>
	<td style="vertical-align: middle;"><?=$D0028->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0028->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0028?></td>
	<td style="vertical-align: middle;"><?=$D0028->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0028->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0028?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0028/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0029= $this->db->query("select * from usulan_dupaks where dupak_no='D0029' and usulan_no='$no'")->row();
	$sum_D0029=$D0029->kum_usulan_lama+$D0029->kum_usulan_baru;
	$sum_P0029=$D0029->kum_penilai_lama+$D0029->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>1</td>
	<td colspan="3" class="text-left">Tingkat internasional</td>
	<td style="vertical-align: middle;"><?=$D0029->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0029->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0029?></td>
	<td style="vertical-align: middle;"><?=$D0029->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0029->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0029?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0029/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0030= $this->db->query("select * from usulan_dupaks where dupak_no='D0030' and usulan_no='$no'")->row();
	$sum_D0030=$D0030->kum_usulan_lama+$D0030->kum_usulan_baru;
	$sum_P0030=$D0030->kum_penilai_lama+$D0030->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>2</td>
	<td colspan="3" class="text-left">Tingkat nasional</td>
	<td style="vertical-align: middle;"><?=$D0030->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0030->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0030?></td>
	<td style="vertical-align: middle;"><?=$D0030->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0030->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0030?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0030/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php
	$D0031= $this->db->query("select * from usulan_dupaks where dupak_no='D0031' and usulan_no='$no'")->row();
	$sum_D0031=$D0031->kum_usulan_lama+$D0031->kum_usulan_baru;
	$sum_P0031=$D0031->kum_penilai_lama+$D0031->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>3</td>
	<td colspan="3" class="text-left">Tingkat daerah/lokal</td>
	<td style="vertical-align: middle;"><?=$D0031->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0031->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0031?></td>
	<td style="vertical-align: middle;"><?=$D0031->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0031->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0031?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0031/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
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
	$D0032= $this->db->query("select * from usulan_dupaks where dupak_no='D0032' and usulan_no='$no'")->row();
	$sum_D0032=$D0032->kum_usulan_lama+$D0032->kum_usulan_baru;
	$sum_P0032=$D0032->kum_penilai_lama+$D0032->kum_penilai_baru;
	?>
	<tr class="text-center">

	<td>1</td>
	<td colspan="3" class="text-left">Menjadi anggota tim penilaian jabatan Akademik Dosen</td>
	<td style="vertical-align: middle;"><?=$D0032->kum_usulan_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0032->kum_usulan_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_D0032?></td>
	<td style="vertical-align: middle;"><?=$D0032->kum_penilai_lama;?></td>
	<td style="vertical-align: middle;"><?=$D0032->kum_penilai_baru;?></td>
	<td style="vertical-align: middle;"><?=$sum_P0032?></td>
	<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak_d/dupak/D0032/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
	</td>
	</tr>
	<?php	    			
	    $C_total= $this->db->query("SELECT a.`usulan_no`,a.`dupak_no`,SUM(a.`kum_usulan_lama`) AS jum_kum_lama,SUM(a.`kum_usulan_baru`) AS jum_kum_baru,
		SUM(a.`kum_penilai_lama`) AS jum_nil_lama,SUM(a.`kum_penilai_baru`) AS jum_nil_baru FROM `usulan_dupaks` a
		 WHERE a.`usulan_no`='$no' AND LEFT(a.`dupak_no`,1)='C'")->row();
		$total_bid_c=$C_total->jum_kum_lama+$C_total->jum_kum_baru;
		$total_penilaian_c=$C_total->jum_nil_lama+$C_total->jum_nil_baru;
	 ?>
	  <tr style="background-color: #e4e4e4; font-weight: bold;">

		<td></td>
		<td colspan="5" class="text-right"><b>JUMLAH BIDANG D</b></td>
		<td style="vertical-align: middle;" class="text-center"><?=$C_total->jum_kum_lama?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$C_total->jum_kum_baru?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$total_bid_c?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$C_total->jum_nil_lama?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$C_total->jum_nil_baru?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$total_penilaian_c?></td>
		<td></td>
	  </tr>
	</tbody>
</table>
        </div>
     

