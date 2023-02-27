<?php
error_reporting(0);
?>
<div class="row">    
<table  class="ui celled table">
<tr>
<td>
<center>

<a href="<?= base_url()?>ketenagaan/ketenagaan/print_bidangc/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> BIDANG C</a>
<a href="<?= base_url()?>ketenagaan/ketenagaan/print_dupak/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print"> PRINT DUPAK</a>
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
		<td rowspan="31">IV</td>
		<td colspan="5" class="text-left">PELAKSANAAN PENGABDIAN KEPADA MASYARAKAT</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<tr class="text-center">
		<td rowspan="4">A</td>
		<td colspan="4" class="text-left">Menduduki jabatan pimpinan</td>
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
		 $C0001= $this->db->query("select * from usulan_dupaks where dupak_no='C0001' and usulan_no='$no'")->row();
		 $sum_C0001=$C0001->kum_usulan_lama+$C0001->kum_usulan_baru;
		 $sum_P0001=$C0001->kum_penilai_lama+$C0001->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td rowspan="3">1</td>
		<td colspan="3" rowspan="3" class="text-left">Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya</td>
		<td rowspan="3"  style="vertical-align: middle;"><?=$C0001->kum_usulan_lama;?></td>
		<td rowspan="3"  style="vertical-align: middle;"><?=$C0001->kum_usulan_baru?></td>
		<td rowspan="3"  style="vertical-align: middle;"><?=$sum_C0001;?></td>
		<td rowspan="3"  style="vertical-align: middle;"><?=$C0001->kum_penilai_lama;?></td>
		<td rowspan="3"  style="vertical-align: middle;"><?=$C0001->kum_penilai_baru;?></td>
		<td rowspan="3"  style="vertical-align: middle;"><?=$sum_P0001;?></td>
		<td rowspan="3" style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0001/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
				
		</td>
		</tr>
		<tr>
		</tr>
		<tr>
		</tr>
		<tr class="text-center">
		<td rowspan="3">B</td>
		<td colspan="4" class="text-left">Melaksankan pengembangan hasil pendidikan dan penelitian</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<?php
		 $C0002= $this->db->query("select * from usulan_dupaks where dupak_no='C0002' and usulan_no='$no'")->row();
		 $sum_C0002=$C0002->kum_usulan_lama+$C0002->kum_usulan_baru;
		 $sum_P0002=$C0002->kum_penilai_lama+$C0002->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td rowspan="2">1</td>
		<td colspan="3" rowspan="2" class="text-left">Melaksanakan pengembangan hasil pendidikan dan penelitian yang dapat dimanfaatkan oleh
		masyarakat</td>
		<td rowspan="2" style="vertical-align: middle;"><?=$C0002->kum_usulan_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$C0002->kum_usulan_baru?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_C0002;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$C0002->kum_penilai_lama;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$C0002->kum_penilai_baru;?></td>
		<td rowspan="2" style="vertical-align: middle;"><?=$sum_P0002;?></td>
		<td rowspan="2" style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0002/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<tr>
		</tr>
		<tr class="text-center">
		<td rowspan="11">C</td>
		<td colspan="4" class="text-left">Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<tr class="text-center">
		<td rowspan="10">1</td>
		<td colspan="3" class="text-left">Terjadwal/terprogram</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<tr class="text-center">
		<td rowspan="4">a.</td>
		<td colspan="2" class="text-left">Dalam satu semester atau lebih</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<?php
		$C0003= $this->db->query("select * from usulan_dupaks where dupak_no='C0003' and usulan_no='$no'")->row();
		$sum_C0003=$C0003->kum_usulan_lama+$C0003->kum_usulan_baru;
		$sum_P0003=$C0003->kum_penilai_lama+$C0003->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>1)</td>
		<td class="text-left">Tingkat internasional</td>
		<td style="vertical-align: middle;"><?=$C0003->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0003->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0003;?></td>
		<td style="vertical-align: middle;"><?=$C0003->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0003->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0003;?></td>
		<td style="vertical-align: middle;">
		
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0003/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$C0004= $this->db->query("select * from usulan_dupaks where dupak_no='C0004' and usulan_no='$no'")->row();
		$sum_C0004=$C0004->kum_usulan_lama+$C0004->kum_usulan_baru;
		$sum_P0004=$C0004->kum_penilai_lama+$C0004->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>2)</td>
		<td class="text-left">Tingkat nasional</td>
		<td style="vertical-align: middle;"><?=$C0004->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0004->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0004;?></td>
		<td style="vertical-align: middle;"><?=$C0004->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0004->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0004;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0004/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$C0005= $this->db->query("select * from usulan_dupaks where dupak_no='C0005' and usulan_no='$no'")->row();
		$sum_C0005=$C0005->kum_usulan_lama+$C0005->kum_usulan_baru;
		$sum_P0005=$C0005->kum_penilai_lama+$C0005->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>3)</td>
		<td class="text-left">Tingkat lokal</td>
		<td style="vertical-align: middle;"><?=$C0005->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0005->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0005;?></td>
		<td style="vertical-align: middle;"><?=$C0005->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0005->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0005;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0005/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<tr class="text-center">
		<td rowspan="5">b.</td>
		<td colspan="2" class="text-left">Kurang dari satu semester dan minimal satu bulan</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		</tr>
		<?php
		$C0006= $this->db->query("select * from usulan_dupaks where dupak_no='C0006' and usulan_no='$no'")->row();
		$sum_C0006=$C0006->kum_usulan_lama+$C0006->kum_usulan_baru;
		$sum_P0006=$C0006->kum_penilai_lama+$C0006->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>1)</td>
		<td class="text-left">Tingkat internasional</td>
		<td style="vertical-align: middle;"><?=$C0006->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0006->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0006;?></td>
		<td style="vertical-align: middle;"><?=$C0006->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0006->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0006;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0006/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$C0007= $this->db->query("select * from usulan_dupaks where dupak_no='C0007' and usulan_no='$no'")->row();
		$sum_C0007=$C0007->kum_usulan_lama+$C0007->kum_usulan_baru;
		$sum_P0007=$C0007->kum_penilai_lama+$C0007->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>2)</td>
		<td class="text-left">Tingkat nasional</td>
		<td style="vertical-align: middle;"><?=$C0007->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0007->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0007;?></td>
		<td style="vertical-align: middle;"><?=$C0007->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0007->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0007;?></td>
		<td style="vertical-align: middle;">
		
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0007/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$C0008= $this->db->query("select * from usulan_dupaks where dupak_no='C0008' and usulan_no='$no'")->row();
		$sum_C0008=$C0008->kum_usulan_lama+$C0008->kum_usulan_baru;
		$sum_P0008=$C0008->kum_penilai_lama+$C0008->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>3)</td>
		<td class="text-left">Tingkat lokal</td>
		<td style="vertical-align: middle;"><?=$C0008->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0008->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0008;?></td>
		<td style="vertical-align: middle;"><?=$C0008->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0008->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0008;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0008/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
			$C0009= $this->db->query("select * from usulan_dupaks where dupak_no='C0009' and usulan_no='$no'")->row();
			$sum_C0009=$C0009->kum_usulan_lama+$C0009->kum_usulan_baru;
			$sum_P0009=$C0009->kum_penilai_lama+$C0009->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>4)</td>
		<td class="text-left">Insidental</td>
		<td style="vertical-align: middle;"><?=$C0009->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0009->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0009;?></td>
		<td style="vertical-align: middle;"><?=$C0009->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0009->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0009;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0009/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<tr class="text-center">
		<td rowspan="5">D</td>
		<td colspan="4" rowspan="2" class="text-left">Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas
		umum pemerintah dan pembangunan</td>
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
		$C0010= $this->db->query("select * from usulan_dupaks where dupak_no='C0010' and usulan_no='$no'")->row();
		$sum_C0010=$C0010->kum_usulan_lama+$C0010->kum_usulan_baru;
		$sum_P0010=$C0010->kum_penilai_lama+$C0010->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>1</td>
		<td colspan="3" class="text-left">Berdasarkan bidang keahlian</td>
		<td style="vertical-align: middle;"><?=$C0010->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0010->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0010;?></td>
		<td style="vertical-align: middle;"><?=$C0010->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0010->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0010;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0010/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
			$C0011= $this->db->query("select * from usulan_dupaks where dupak_no='C0011' and usulan_no='$no'")->row();
			$sum_C0011=$C0011->kum_usulan_lama+$C0011->kum_usulan_baru;
			$sum_P0011=$C0011->kum_penilai_lama+$C0011->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>2</td>
		<td colspan="3" class="text-left">Berdasarkan penugasan lembaga perguruan tinggi</td>
		<td style="vertical-align: middle;"><?=$C0011->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0011->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0011?></td>
		<td style="vertical-align: middle;"><?=$C0011->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0011->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0011;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0011/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
			$C0012= $this->db->query("select * from usulan_dupaks where dupak_no='C0012' and usulan_no='$no'")->row();
			$sum_C0012=$C0012->kum_usulan_lama+$C0012->kum_usulan_baru;
			$sum_P0012=$C0012->kum_penilai_lama+$C0012->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>3</td>
		<td colspan="3" class="text-left">Berdasarkan fungsi / jabatan</td>
		<td style="vertical-align: middle;"><?=$C0012->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0012->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0012;?></td>
		<td style="vertical-align: middle;"><?=$C0012->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0012->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0012;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0012/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$C0013= $this->db->query("select * from usulan_dupaks where dupak_no='C0013' and usulan_no='$no'")->row();
		$sum_C0013=$C0013->kum_usulan_lama+$C0013->kum_usulan_baru;
		$sum_P0013=$C0013->kum_penilai_lama+$C0013->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td rowspan="1">E</td>
		<td colspan="4" class="text-left">Membuat/ menulis karya pengabdian</td>
		<td style="vertical-align: middle;"><?=$C0013->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0013->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0013;?></td>
		<td style="vertical-align: middle;"><?=$C0013->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0013->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0013;?></td>
		<td>
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0013/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$C0014= $this->db->query("select * from usulan_dupaks where dupak_no='C0014' and usulan_no='$no'")->row();
		$sum_C0014=$C0014->kum_usulan_lama+$C0014->kum_usulan_baru;
		$sum_P0014=$C0014->kum_penilai_lama+$C0014->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td >F</td>
		<td colspan="4" class="text-left">Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala/jurnal pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya</td>
		<td style="vertical-align: middle;"><?=$C0014->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0014->kum_usulan_baru?></td>
		<td style="vertical-align: middle;"><?=$sum_C0014;?></td>
		<td style="vertical-align: middle;"><?=$C0014->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0014->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0014;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0014/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>

		<tr class="text-center">
		<td rowspan="5">G</td>
		<td colspan="4" rowspan="2" class="text-left">Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun)*</td>
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
	$C0015= $this->db->query("select * from usulan_dupaks where dupak_no='C0015' and usulan_no='$no'")->row();
	$sum_C0015=$C0015->kum_usulan_lama+$C0015->kum_usulan_baru;
	$sum_P0015=$C0015->kum_penilai_lama+$C0015->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>1</td>
		<td colspan="3"   class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional</td>
		<td  style="vertical-align: middle;"><?=$C0015->kum_usulan_lama;?></td>
		<td  style="vertical-align: middle;"><?=$C0015->kum_usulan_baru?></td>
		<td  style="vertical-align: middle;"><?=$sum_C0015;?></td>
		<td  style="vertical-align: middle;"><?=$C0015->kum_penilai_lama;?></td>
		<td  style="vertical-align: middle;"><?=$C0015->kum_penilai_baru;?></td>
		<td  style="vertical-align: middle;"><?=$sum_P0015;?></td>
		<td  style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0015/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>
		<?php
		$C0016= $this->db->query("select * from usulan_dupaks where dupak_no='C0016' and usulan_no='$no'")->row();
		$sum_C0016=$C0016->kum_usulan_lama+$C0016->kum_usulan_baru;
		$sum_P0016=$C0016->kum_penilai_lama+$C0016->kum_penilai_baru;
		?>
		<tr class="text-center">
		<td>2</td>
		<td colspan="3"  class="text-left">Editor/dewan penyunting/dewan redaksi jurnal ilmiah nasional</td>
		<td style="vertical-align: middle;"><?=$C0016->kum_usulan_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0016->kum_usulan_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_C0016;?></td>
		<td style="vertical-align: middle;"><?=$C0016->kum_penilai_lama;?></td>
		<td style="vertical-align: middle;"><?=$C0016->kum_penilai_baru;?></td>
		<td style="vertical-align: middle;"><?=$sum_P0016;?></td>
		<td style="vertical-align: middle;">
			
			<a href="<?= base_url()?>ketenagaan/usulan_dupak_c/dupak/C0016/<?php echo $no; ?>" class="btn btn-circle btn-info waves-effect waves-light m-t-20" target='_BLANK'><i class="fa fa-search"></i></a>
			
		</td>
		</tr>

		<?php	    			
	    $C_total= $this->db->query("SELECT a.`usulan_no`,a.`dupak_no`,SUM(a.`kum_usulan_lama`) AS jum_kum_lama,SUM(a.`kum_usulan_baru`) AS jum_kum_baru,
		SUM(a.`kum_penilai_lama`) AS jum_nil_lama,SUM(a.`kum_penilai_baru`) AS jum_nil_baru FROM `usulan_dupaks` a
		 WHERE a.`usulan_no`='$no' AND LEFT(a.`dupak_no`,1)='C'")->row();
		$total_bid_c=$C_total->jum_kum_lama+$C_total->jum_kum_baru;
		$total_penilaian_c=$C_total->jum_nil_lama+$C_total->jum_nil_baru;
	 ?>
	 <tr>
		</tr>
	  <tr style="background-color: #e4e4e4; font-weight: bold;">	
		<td colspan="6" class="text-right"><b>JUMLAH BIDANG C</b></td>
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
     

