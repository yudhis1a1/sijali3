<?php
error_reporting(0);
?>
<div class="row">    
                    
                                        
                               
<table  class="ui celled table">
<tr>
<td>
<center>

<a href="<?= base_url()?>kepegawaian/kepegawaian/print_bidanga/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> BIDANG A</a>
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
			
				<tr>
		<td rowspan="6" class="text-center">I</td>
		<td colspan="5" class="text-left">PENDIDIKAN</td>
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
		<td colspan="4" class="text-left">Pendidikan Formal</td>
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
	    $no;			
		$A0001= $this->db->query("select * from usulan_dupaks where dupak_no='A0001' and usulan_no='$no'")->row();
		$sum_A0001=$A0001->kum_usulan_lama+$A0001->kum_usulan_baru;
		$sum_P0001=$A0001->kum_penilai_lama+$A0001->kum_penilai_baru;
     ?>
		<td>1</td>
		<td colspan="3" class="text-left">Doktor (S3)</td>
		<td style="vertical-align: middle;"><?=$A0001->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0001->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_A0001?></td>
		<td style="vertical-align: middle;"><?=$A0001->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0001->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0001?></td>
		<td style="vertical-align: middle;">
			
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
	  <?php	    			
	    $A0002= $this->db->query("select * from usulan_dupaks where dupak_no='A0002' and usulan_no='$no'")->row();
		$sum_A0002=$A0002->kum_usulan_lama+$A0002->kum_usulan_baru;
		$sum_P0002=$A0002->kum_penilai_lama+$A0002->kum_penilai_baru;
	 ?>
		<td>2</td>
		<td colspan="3" class="text-left">Magister (S2)</td>
		<td style="vertical-align: middle;"><?=$A0002->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0002->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0002;?></td>
		<td style="vertical-align: middle;"><?=$A0002->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0002->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0002?></td>
		<td style="vertical-align: middle;">
			
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="2" height="40">B</td>
		<td colspan="4" class="text-left">Pendidikan dan pelatihan Prajabatan</td>
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
	    $A0003= $this->db->query("select * from usulan_dupaks where dupak_no='A0003' and usulan_no='$no'")->row();
		$sum_A0003=$A0003->kum_usulan_lama+$A0003->kum_usulan_baru;
		$sum_P0003=$A0003->kum_penilai_lama+$A0003->kum_penilai_baru;
	 ?>
		<td>1</td>
		<td colspan="3" class="text-left">Pendidikan dan pelatihan Prajabatan golongan III</td>
		<td style="vertical-align: middle;"><?=$A0003->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0003->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0003;?></td>
		<td style="vertical-align: middle;"><?=$A0003->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0003->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0003?></td>
		<td style="vertical-align: middle;">
	
				
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="75">II</td>
		<td colspan="5" class="text-left">PELAKSANAAN PENDIDIKAN</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="11">A</td>
		<td colspan="4" rowspan="4" class="text-left">Melaksanakan perkulihan/ tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktek keguruan bengkel/studio/kebun percobaan/teknologi pengajaran dan praktek lapangan</td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
		<td rowspan="4"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php	    			
	    $A0004= $this->db->query("select * from usulan_dupaks where dupak_no='A0004' and usulan_no='$no'")->row();
		$sum_A0004=$A0004->kum_usulan_lama+$A0004->kum_usulan_baru;
		$sum_P0004=$A0004->kum_penilai_lama+$A0004->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td rowspan="7">1</td>
		<td colspan="3" rowspan="7" class="text-left">Melaksanakan perkuliahan/tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di Laboratorium, Praktik Keguruan Bengkel/Studio/Kebun pada Fakultas/Sekolah Tinggi/Akademi/Politeknik sendiri, pada fakultas lain dalam lingkungan Universitas/lnstitut sendiri, maupun di luar perguruan tinggi sendiri secara melembaga paling banyak 12 sks per semester</td>
		<td rowspan="7" style="vertical-align: middle;"><?=$A0004->kum_usulan_lama;?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$A0004->kum_usulan_baru;?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$sum_A0004;?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$A0004->kum_penilai_lama;?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$A0004->kum_penilai_baru?></td>
		<td rowspan="7" style="vertical-align: middle;"><?=$sum_P0004?></td>
		<td rowspan="7" style="vertical-align: middle;">
			
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	
	  <tr class="text-center">
		<td rowspan="2">B</td>
		<td colspan="4" class="text-left">Membimbing seminar</td>
	    <td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0005= $this->db->query("select * from usulan_dupaks where dupak_no='A0005' and usulan_no='$no'")->row();
		$sum_A0005=$A0005->kum_usulan_lama+$A0005->kum_usulan_baru;
		$sum_P0005=$A0005->kum_penilai_lama+$A0005->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td>1</td>
		<td colspan="3" class="text-left">Membimbing mahasiswa seminar</td>
		<td style="vertical-align: middle;"><?=$A0005->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0005->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0005;?></td>
		<td style="vertical-align: middle;"><?=$A0005->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0005->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0005?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="4">C</td>
		<td colspan="4" rowspan="2" class="text-left">Membing kuliah kerja nyata, pratek kerja nyata, praktek kerja
		lapangan</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php	    			
	    $A0006= $this->db->query("select * from usulan_dupaks where dupak_no='A0006' and usulan_no='$no'")->row();
		$sum_A0006=$A0006->kum_usulan_lama+$A0006->kum_usulan_baru;
		$sum_P0006=$A0006->kum_penilai_lama+$A0006->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Membimbing mahasiswa kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0006->kum_usulan_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0006->kum_usulan_baru;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_A0006;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0006->kum_penilai_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0006->kum_penilai_baru?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_P0006?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="12">D</td>
		<td colspan="4" rowspan="2" class="text-left">Membimbing dan ikut membimbing dalam menghasilkan disertasi, thesis,
		skripsi dan laporan akhir studi</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="5">1</td>
		<td colspan="3" class="text-left">Pembimbing utama</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0007= $this->db->query("select * from usulan_dupaks where dupak_no='A0007' and usulan_no='$no'")->row();
		$sum_A0007=$A0007->kum_usulan_lama+$A0007->kum_usulan_baru;
		$sum_P0007=$A0007->kum_penilai_lama+$A0007->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td height="20">a.</td>
		<td colspan="2" class="text-left">Disertasi</td>
		<td style="vertical-align: middle;"><?=$A0007->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0007->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0007;?></td>
		<td style="vertical-align: middle;"><?=$A0007->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0007->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0007?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0008= $this->db->query("select * from usulan_dupaks where dupak_no='A0008' and usulan_no='$no'")->row();
		$sum_A0008=$A0008->kum_usulan_lama+$A0008->kum_usulan_baru;
		$sum_P0008=$A0008->kum_penilai_lama+$A0008->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td>b.</td>
		<td colspan="2" class="text-left">Thesis</td>
		<td style="vertical-align: middle;"><?=$A0008->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0008->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0008;?></td>
		<td style="vertical-align: middle;"><?=$A0008->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0008->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0008?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0009= $this->db->query("select * from usulan_dupaks where dupak_no='A0009' and usulan_no='$no'")->row();
		$sum_A0009=$A0009->kum_usulan_lama+$A0009->kum_usulan_baru;
		$sum_P0009=$A0009->kum_penilai_lama+$A0009->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	  
		<td>c.</td>
		<td colspan="2" class="text-left">Skripsi</td>
		<td style="vertical-align: middle;"><?=$A0009->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0009->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0009;?></td>
		<td style="vertical-align: middle;"><?=$A0009->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0009->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0009?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0010= $this->db->query("select * from usulan_dupaks where dupak_no='A0010' and usulan_no='$no'")->row();
		$sum_A0010=$A0010->kum_usulan_lama+$A0010->kum_usulan_baru;
		$sum_P0010=$A0010->kum_penilai_lama+$A0010->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td>d.</td>
		<td colspan="2" class="text-left">Laporan Akhir</td>
		<td style="vertical-align: middle;"><?=$A0010->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0010->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0010;?></td>
		<td style="vertical-align: middle;"><?=$A0010->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0010->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0010?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="5">2</td>
		<td colspan="3" class="text-left">Pembimbing pendamping/ pembantu</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0011= $this->db->query("select * from usulan_dupaks where dupak_no='A0011' and usulan_no='$no'")->row();
		$sum_A0011=$A0011->kum_usulan_lama+$A0011->kum_usulan_baru;
		$sum_P0011=$A0011->kum_penilai_lama+$A0011->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td>a.</td>
		<td colspan="2" class="text-left">Disertasi</td>
		<td style="vertical-align: middle;"><?=$A0011->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0011->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0011;?></td>
		<td style="vertical-align: middle;"><?=$A0011->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0011->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0011?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0012= $this->db->query("select * from usulan_dupaks where dupak_no='A0012' and usulan_no='$no'")->row();
		$sum_A0012=$A0012->kum_usulan_lama+$A0012->kum_usulan_baru;
		$sum_P0012=$A0012->kum_penilai_lama+$A0012->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td>b.</td>
		<td colspan="2" class="text-left">Thesis</td>
		<td style="vertical-align: middle;"><?=$A0012->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0012->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0012;?></td>
		<td style="vertical-align: middle;"><?=$A0012->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0012->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0012?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0013= $this->db->query("select * from usulan_dupaks where dupak_no='A0013' and usulan_no='$no'")->row();
		$sum_A0013=$A0013->kum_usulan_lama+$A0013->kum_usulan_baru;
		$sum_P0013=$A0013->kum_penilai_lama+$A0013->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td>c.</td>
		<td colspan="2" class="text-left">Skripsi</td>
		<td style="vertical-align: middle;"><?=$A0013->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0013->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0013;?></td>
		<td style="vertical-align: middle;"><?=$A0013->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0013->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0013?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0014= $this->db->query("select * from usulan_dupaks where dupak_no='A0014' and usulan_no='$no'")->row();
		$sum_A0014=$A0014->kum_usulan_lama+$A0014->kum_usulan_baru;
		$sum_P0014=$A0014->kum_penilai_lama+$A0014->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td>d.</td>
		<td colspan="2" class="text-left">Laporan Akhir</td>
		<td style="vertical-align: middle;"><?=$A0014->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0014->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0014;?></td>
		<td style="vertical-align: middle;"><?=$A0014->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0014->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0014?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="3">E</td>
		<td colspan="4" class="text-left">Bertugas sebagai penguji pada ujian akhir</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0015= $this->db->query("select * from usulan_dupaks where dupak_no='A0015' and usulan_no='$no'")->row();
		$sum_A0015=$A0015->kum_usulan_lama+$A0015->kum_usulan_baru;
		$sum_P0015=$A0015->kum_penilai_lama+$A0015->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	  
		<td>1</td>
		<td colspan="3" class="text-left">Ketua penguji</td>
		<td style="vertical-align: middle;"><?=$A0015->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0015->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0015;?></td>
		<td style="vertical-align: middle;"><?=$A0015->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0015->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0015?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0016= $this->db->query("select * from usulan_dupaks where dupak_no='A0016' and usulan_no='$no'")->row();
		$sum_A0016=$A0016->kum_usulan_lama+$A0016->kum_usulan_baru;
		$sum_P0016=$A0016->kum_penilai_lama+$A0016->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td>2</td>
		<td colspan="3" class="text-left">Anggota penguji</td>
		<td style="vertical-align: middle;"><?=$A0016->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0016->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0016;?></td>
		<td style="vertical-align: middle;"><?=$A0016->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0016->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0016?></td>
		<td style="vertical-align: middle;">
		
			<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="3">F</td>
		<td colspan="4" class="text-left">Membina kegiatan mahasiswa</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0017= $this->db->query("select * from usulan_dupaks where dupak_no='A0017' and usulan_no='$no'")->row();
		$sum_A0017=$A0017->kum_usulan_lama+$A0017->kum_usulan_baru;
		$sum_P0017=$A0017->kum_penilai_lama+$A0017->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Melakukan pembinaan kegiatan mahasiswa di bidang Akademik dan kemahasiswaan</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0017->kum_usulan_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0017->kum_usulan_baru;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_A0017;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0017->kum_penilai_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0017->kum_penilai_baru?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_P0017?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0017/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="2">G</td>
		<td colspan="4" class="text-left">Mengembangkan program kuliah</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0018= $this->db->query("select * from usulan_dupaks where dupak_no='A0018' and usulan_no='$no'")->row();
		$sum_A0018=$A0018->kum_usulan_lama+$A0018->kum_usulan_baru;
		$sum_P0018=$A0018->kum_penilai_lama+$A0018->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td>1</td>
		<td colspan="3" class="text-left">Melakukan kegiatan pengembangan program kuliah</td>
		<td style="vertical-align: middle;"><?=$A0018->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0018->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0018;?></td>
		<td style="vertical-align: middle;"><?=$A0018->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0018->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0018?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0018/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="4">H</td>
		<td colspan="4" class="text-left">Mengembangkan bahan pengajaran</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0019= $this->db->query("select * from usulan_dupaks where dupak_no='A0019' and usulan_no='$no'")->row();
		$sum_A0019=$A0019->kum_usulan_lama+$A0019->kum_usulan_baru;
		$sum_P0019=$A0019->kum_penilai_lama+$A0019->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td>1</td>
		<td colspan="3" class="text-left">Buku ajar</td>
		<td style="vertical-align: middle;"><?=$A0019->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0019->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0019;?></td>
		<td style="vertical-align: middle;"><?=$A0019->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0019->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0019?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0019/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0020= $this->db->query("select * from usulan_dupaks where dupak_no='A0020' and usulan_no='$no'")->row();
		$sum_A0020=$A0020->kum_usulan_lama+$A0020->kum_usulan_baru;
		$sum_P0020=$A0020->kum_penilai_lama+$A0020->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td rowspan="2">2</td>
		<td colspan="3" rowspan="2" class="text-left">Diktat, modul, petunjuk praktikum, model, alat bantu, audio visual, naskah tutorial</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0020->kum_usulan_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0020->kum_usulan_baru;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_A0020;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0020->kum_penilai_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0020->kum_penilai_baru?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_P0020?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0020/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="3">I</td>
		<td colspan="4" class="text-left">Menyampaikan orasi ilmiah</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0021= $this->db->query("select * from usulan_dupaks where dupak_no='A0021' and usulan_no='$no'")->row();
		$sum_A0021=$A0021->kum_usulan_lama+$A0021->kum_usulan_baru;
		$sum_P0021=$A0021->kum_penilai_lama+$A0021->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Melakukan kegiatan orasi ilmiah pada perguruan tinggi tiap tahun</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0021->kum_usulan_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0021->kum_usulan_baru;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_A0021;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0021->kum_penilai_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0021->kum_penilai_baru?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_P0021?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0021/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="14">J</td>
		<td colspan="4" class="text-left">Menduduki jabatan pimpinan perguruan tinggi</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0022= $this->db->query("select * from usulan_dupaks where dupak_no='A0022' and usulan_no='$no'")->row();
		$sum_A0022=$A0022->kum_usulan_lama+$A0022->kum_usulan_baru;
		$sum_P0022=$A0022->kum_penilai_lama+$A0022->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td height="20">1</td>
		<td colspan="3" class="text-left">Rektor</td>
		<td style="vertical-align: middle;"><?=$A0022->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0022->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0022;?></td>
		<td style="vertical-align: middle;"><?=$A0022->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0022->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0022?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0022/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0023= $this->db->query("select * from usulan_dupaks where dupak_no='A0023' and usulan_no='$no'")->row();
		$sum_A0023=$A0023->kum_usulan_lama+$A0023->kum_usulan_baru;
		$sum_P0023=$A0023->kum_penilai_lama+$A0023->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td height="20">2</td>
		<td colspan="3" class="text-left">Pembantu rektor/dekan/direktur program pasca sarjana</td>
		<td style="vertical-align: middle;"><?=$A0023->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0023->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0023;?></td>
		<td style="vertical-align: middle;"><?=$A0023->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0023->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0023?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0023/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0024= $this->db->query("select * from usulan_dupaks where dupak_no='A0024' and usulan_no='$no'")->row();
		$sum_A0024=$A0024->kum_usulan_lama+$A0024->kum_usulan_baru;
		$sum_P0024=$A0024->kum_penilai_lama+$A0024->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td rowspan="2">3</td>
		<td colspan="3" rowspan="2" class="text-left">Ketua sekolah tinggi/pembantu dekan/asisten direktur program pasca sarjana/direktur politeknik</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0024->kum_usulan_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0024->kum_usulan_baru;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_A0024;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0024->kum_penilai_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0024->kum_penilai_baru?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_P0024?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0024/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php	    			
	    $A0025= $this->db->query("select * from usulan_dupaks where dupak_no='A0025' and usulan_no='$no'")->row();
		$sum_A0025=$A0025->kum_usulan_lama+$A0025->kum_usulan_baru;
		$sum_P0025=$A0025->kum_penilai_lama+$A0025->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td>4</td>
		<td colspan="3" class="text-left">Pembantu ketua sekolah tinggi/pembantu direktur politeknik</td>
		<td style="vertical-align: middle;"><?=$A0025->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0025->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0025;?></td>
		<td style="vertical-align: middle;"><?=$A0025->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0025->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0025?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0025/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0026= $this->db->query("select * from usulan_dupaks where dupak_no='A0026' and usulan_no='$no'")->row();
		$sum_A0026=$A0026->kum_usulan_lama+$A0026->kum_usulan_baru;
		$sum_P0026=$A0026->kum_penilai_lama+$A0026->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td height="20">5</td>
		<td colspan="3" class="text-left">Direktur akademi</td>
		<td style="vertical-align: middle;"><?=$A0026->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0026->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0026;?></td>
		<td style="vertical-align: middle;"><?=$A0026->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0026->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0026?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0026/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0027= $this->db->query("select * from usulan_dupaks where dupak_no='A0027' and usulan_no='$no'")->row();
		$sum_A0027=$A0027->kum_usulan_lama+$A0027->kum_usulan_baru;
		$sum_P0027=$A0027->kum_penilai_lama+$A0027->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td rowspan="2">6</td>
		<td colspan="3" rowspan="2" class="text-left">Pembantu direktur akademi/ketua jurusan/bagian pada Universitas/institut/sekolah tinggi</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0027->kum_usulan_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0027->kum_usulan_baru;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_A0027;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0027->kum_penilai_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0027->kum_penilai_baru?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_P0027?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0027/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php	    			
	    $A0028= $this->db->query("select * from usulan_dupaks where dupak_no='A0028' and usulan_no='$no'")->row();
		$sum_A0028=$A0028->kum_usulan_lama+$A0028->kum_usulan_baru;
		$sum_P0027=$A0027->kum_penilai_lama+$A0027->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td rowspan="2">7</td>
		<td colspan="3" rowspan="2" class="text-left">Ketua jurusan pada politeknik/akademi/sekretaris jurusan /bagian pada universitas/ institut/ sekolah tinggi</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0028->kum_usulan_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0028->kum_usulan_baru;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_A0028;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0027->kum_penilai_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$A0027->kum_penilai_baru?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_P0027?></td>
		<td rowspan="2" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0028/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php	    			
	    $A0029= $this->db->query("select * from usulan_dupaks where dupak_no='A0029' and usulan_no='$no'")->row();
		$sum_A0029=$A0029->kum_usulan_lama+$A0029->kum_usulan_baru;
		$sum_P0029=$A0029->kum_penilai_lama+$A0029->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td rowspan="3">8</td>
		<td colspan="3" rowspan="3" class="text-left">Sekretaris jurusan pada politeknik/akademik dan kepala laboratorium universitas/institut/ sekolah tinggi / politeknik/ akademi</td>
		<td rowspan="3" style="vertical-align: middle;"><?=$A0029->kum_usulan_lama;?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$A0029->kum_usulan_baru;?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$sum_A0029;?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$A0029->kum_penilai_lama;?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$A0029->kum_penilai_baru?></td>
		<td rowspan="3" style="vertical-align: middle;"><?=$sum_P0029?></td>
		<td rowspan="3" style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0029/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <tr class="text-center">
		<td rowspan="3">K</td>
		<td colspan="4" class="text-left">Membimbing Akademik Dosen yang lebih rendah jabatannya</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	  <?php	    			
	    $A0030= $this->db->query("select * from usulan_dupaks where dupak_no='A0030' and usulan_no='$no'")->row();
		$sum_A0030=$A0030->kum_usulan_lama+$A0030->kum_usulan_baru;
		$sum_P0030=$A0030->kum_penilai_lama+$A0030->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td>1</td>
		<td colspan="3" class="text-left">Pembimbing pencangkokan</td>
		<td style="vertical-align: middle;"><?=$A0030->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0030->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0030;?></td>
		<td style="vertical-align: middle;"><?=$A0030->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0030->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0030?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0030/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0031= $this->db->query("select * from usulan_dupaks where dupak_no='A0031' and usulan_no='$no'")->row();
		$sum_A0031=$A0031->kum_usulan_lama+$A0031->kum_usulan_baru;
		$sum_P0031=$A0031->kum_penilai_lama+$A0031->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td>2</td>
		<td colspan="3" class="text-left">Reguler</td>
		<td style="vertical-align: middle;"><?=$A0031->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0031->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0031;?></td>
		<td style="vertical-align: middle;"><?=$A0031->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0031->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0031?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0031/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="4">L</td>
		<td colspan="4" rowspan="2" class="text-left">Melaksanakan kegiatan Detasering dan pencangkokan Akademik Dosen</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php	    			
	    $A0032= $this->db->query("select * from usulan_dupaks where dupak_no='A0032' and usulan_no='$no'")->row();
		$sum_A0032=$A0032->kum_usulan_lama+$A0032->kum_usulan_baru;
		$sum_P0032=$A0032->kum_penilai_lama+$A0032->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td>1</td>
		<td colspan="3" class="text-left">Detasering</td>
		<td style="vertical-align: middle;"><?=$A0032->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0032->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0032;?></td>
		<td style="vertical-align: middle;"><?=$A0032->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0032->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0032?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0032/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0033= $this->db->query("select * from usulan_dupaks where dupak_no='A0033' and usulan_no='$no'")->row();
		$sum_A0033=$A0033->kum_usulan_lama+$A0033->kum_usulan_baru;
		$sum_P0033=$A0033->kum_penilai_lama+$A0033->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td>2</td>
		<td colspan="3" class="text-left">Pencangkokan</td>
		<td style="vertical-align: middle;"><?=$A0033->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0033->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0033;?></td>
		<td style="vertical-align: middle;"><?=$A0033->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0033->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0033?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0033/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <tr class="text-center">
		<td rowspan="9">M</td>
		<td colspan="4" rowspan="2" class="text-left">Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi</td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
		<td rowspan="2"></td>
	  </tr>
	  <tr height="20" style='height:15.0pt'>

	  </tr>
	  <?php	    			
	    $A0034= $this->db->query("select * from usulan_dupaks where dupak_no='A0034' and usulan_no='$no'")->row();
		$sum_A0034=$A0034->kum_usulan_lama+$A0034->kum_usulan_baru;
		$sum_P0034=$A0034->kum_penilai_lama+$A0034->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td>1.</td>
		<td colspan="3" class="text-left">Lamanya lebih dari 960 jam</td>
		<td style="vertical-align: middle;"><?=$A0034->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0034->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0034;?></td>
		<td style="vertical-align: middle;"><?=$A0034->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0034->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0034?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0034/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0035= $this->db->query("select * from usulan_dupaks where dupak_no='A0035' and usulan_no='$no'")->row();
		$sum_A0035=$A0035->kum_usulan_lama+$A0035->kum_usulan_baru;
		$sum_P0035=$A0035->kum_penilai_lama+$A0035->kum_penilai_baru;
	 ?>
	  <tr class="text-center">

		<td>2.</td>
		<td colspan="3" class="text-left">Lamanya 641-960 jam</td>
		<td style="vertical-align: middle;"><?=$A0035->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0035->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0035;?></td>
		<td style="vertical-align: middle;"><?=$A0035->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0035->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0035?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0035/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0036= $this->db->query("select * from usulan_dupaks where dupak_no='A0036' and usulan_no='$no'")->row();
		$sum_A0036=$A0036->kum_usulan_lama+$A0036->kum_usulan_baru;
		$sum_P0036=$A0036->kum_penilai_lama+$A0036->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td>3.</td>
		<td colspan="3" class="text-left">Lamanya 481-640 jam</td>
		<td style="vertical-align: middle;"><?=$A0036->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0036->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0036;?></td>
		<td style="vertical-align: middle;"><?=$A0036->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0036->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0036?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0036/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0037= $this->db->query("select * from usulan_dupaks where dupak_no='A0037' and usulan_no='$no'")->row();
		$sum_A0037=$A0037->kum_usulan_lama+$A0037->kum_usulan_baru;
		$sum_P0037=$A0037->kum_penilai_lama+$A0037->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td>4.</td>
		<td colspan="3" class="text-left">Lamanya 161-480 jam</td>
		<td style="vertical-align: middle;"><?=$A0037->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0037->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0037;?></td>
		<td style="vertical-align: middle;"><?=$A0037->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0037->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0037?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0037/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0038= $this->db->query("select * from usulan_dupaks where dupak_no='A0038' and usulan_no='$no'")->row();
		$sum_A0038=$A0038->kum_usulan_lama+$A0038->kum_usulan_baru;
		$sum_P0038=$A0038->kum_penilai_lama+$A0038->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	  
		<td>5.</td>
		<td colspan="3" class="text-left">Lamanya 81- 160 jam</td>
		<td style="vertical-align: middle;"><?=$A0038->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0038->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0038;?></td>
		<td style="vertical-align: middle;"><?=$A0038->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0038->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0038?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0038/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0039= $this->db->query("select * from usulan_dupaks where dupak_no='A0039' and usulan_no='$no'")->row();
		$sum_A0039=$A0039->kum_usulan_lama+$A0039->kum_usulan_baru;
		$sum_P0039=$A0039->kum_penilai_lama+$A0039->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	 
		<td>6.</td>
		<td colspan="3" class="text-left">Lamanya 31-80 jam</td>
		<td style="vertical-align: middle;"><?=$A0039->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0039->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0039;?></td>
		<td style="vertical-align: middle;"><?=$A0039->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0039->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0039?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0039/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A0040= $this->db->query("select * from usulan_dupaks where dupak_no='A0040' and usulan_no='$no'")->row();
		$sum_A0040=$A0040->kum_usulan_lama+$A0040->kum_usulan_baru;
		$sum_P0040=$A0040->kum_penilai_lama+$A0040->kum_penilai_baru;
	 ?>
	  <tr class="text-center">
	
		<td>7.</td>
		<td colspan="3" class="text-left">Lamanya 10-30 jam</td>
		<td style="vertical-align: middle;"><?=$A0040->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0040->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_A0040;?></td>
		<td style="vertical-align: middle;"><?=$A0040->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$A0040->kum_penilai_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_P0040?></td>
		<td style="vertical-align: middle;">
		
		<a href="<?= base_url()?>kepegawaian/usulan_dupak/dupak/A0040/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
		
		</td>
	  </tr>
	  <?php	    			
	    $A_total= $this->db->query("SELECT a.`usulan_no`,a.`dupak_no`,SUM(a.`kum_usulan_lama`) AS jum_kum_lama,SUM(a.`kum_usulan_baru`) AS jum_kum_baru,
		SUM(a.`kum_penilai_lama`) AS jum_nil_lama,SUM(a.`kum_penilai_baru`) AS jum_nil_baru FROM `usulan_dupaks` a
		 WHERE a.`usulan_no`='$no' AND LEFT(a.`dupak_no`,1)='A'")->row();
		$total_bid_a=$A_total->jum_kum_lama+$A_total->jum_kum_baru;
		$total_penilaian_a=$A_total->jum_nil_lama+$A_total->jum_nil_baru;
	 ?>
	  <tr style="background-color: #e4e4e4; font-weight: bold;">

		<td></td>
		<td colspan="5" class="text-right"><b>JUMLAH BIDANG A</b></td>
		<td style="vertical-align: middle;" class="text-center"><?=$A_total->jum_kum_lama?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$A_total->jum_kum_baru?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$total_bid_a?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$A_total->jum_nil_lama?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$A_total->jum_nil_baru?></td>
		<td style="vertical-align: middle;" class="text-center"><?=$total_penilaian_a?></td>
		<td></td>
	  </tr>
	 
                </tbody>
            </table>
        </div>
     

