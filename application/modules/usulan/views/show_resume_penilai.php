<!DOCTYPE html>
<?php
include "koneksi.php";

?>

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
<h4 class="card-title"><?php echo $judul; ?></h4>
<h6 class="card-subtitle"><?php echo $data_dasar->nip; ?> </code></h6>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item"> <a class="nav-link "  href="<?= base_url()?>usulan/usulan/usulans/view/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Data Dasar</span></a> </li>
	
	<?php if($role <>'3'){ ?> 
	<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/show_mtk_pak/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah PAK</span></a> </li>
	<?php } ?>
	
	<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/show_matakul/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-pencil-alt "></i></span> <span class="hidden-xs-down">Matakuliah</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/show_pendidikan/<?php echo $no; ?>" ><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Riwayat Pendidikan</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link " href="<?= base_url()?>usulan/usulan/bidangA/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda"></i></span> <span class="hidden-xs-down">Bidang A</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangB/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang B</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangC/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang C</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/bidangD/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-agenda "></i></span> <span class="hidden-xs-down">Bidang D</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/persyaratan/<?php echo $no; ?>"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Persyaratan</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link active" href="<?= base_url()?>usulan/usulan/show_resume/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Resume</span></a> </li>
	
	<li class="nav-item"> <a class="nav-link" href="<?= base_url()?>usulan/usulan/show_log/<?php echo $no; ?>"><span class="hidden-sm-up"><i class="ti-bookmark-alt "></i></span> <span class="hidden-xs-down">Log</span></a> </li>

</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border">
<?php $no_usulan=$data_dasar->no; ?>
	<div class="tab-pane active p-20" id="dasar" role="tabpanel" >

<div class="card">
<div class="card-header bg-info">
<h4 class="m-b-0 text-white">RESUME</h4>
</div>
<div class="card-body">                              
<h4 class="card-title"></h4>

<div class="row">    
                    
<table  class="ui celled table">
	<tr>
		<td>
		<center>
		<a href="<?= base_url()?>usulan/usulan/print_resume/<?php echo $no; ?>" target="_blank" class="btn btn-success fa fa-print">PRINT RESUME</a>
		</center>
		</td>
	</tr>
	</table>  
<table border="1" class="ui celled table">

<col width="30"/>
<col width="120"/>
<col width="90"/>
<col width="90"/>
<col width="90"/>
<col width="90"/>
<col width="90"/>
<col width="90"/>


<thead>
<tr class="text-center">
<th colspan="8" class="text-center">
<h3 style="text-align: center;">RESUME USULAN<br>JABATAN AKADEMIK DOSEN</h3> 
</th>
</tr>
</thead>
<?php
date_default_timezone_set('Asia/Jakarta');
$query_dosens="SELECT
			  a.dosen_no,
			  a.fakultas,
			  b.`no`,
			  b.`jabatan_no`,
			  b.`jabatan_tgl`,
			  e.`nama_ikatan`,
			  b.`karpeg`,
			  b.`lahir_tempat`,
			  b.`jk`,
			  b.`lahir_tgl`,
			  b.`nama`,
			  b.`jenjang_id`,
			  f.`nama_jenjang`,
			  b.`gelar_belakang`,
			  b.`gelar_depan`,
			  a.user_penilai_tgl,
			  b.`nip`,
			  b.`nidn`,
			  c.`instansi_kode`,
			  c.`nama_prodi`,
			  c.jenjang_id as prodi_jen,
			  d.`nama_instansi`,
			  b.`bidang_ilmu_kode`
			FROM
			  usulans AS a,
			  dosens AS b,
			  `prodis` AS c,
			  `instansis` AS d,
			  ikatan_kerjas AS e,
			  `jenjangs` AS f
			WHERE a.`no` = '$no'
			  AND a.`dosen_no` = b.`no`
			  AND b.`prodi_kode` = c.`kode`
			  AND c.`instansi_kode` = d.`kode`
			  AND b.`ikatan_kerja_kode` = e.`kode`
			  AND b.`jenjang_id` = f.`id`";
$data_dos=mysqli_query($koneksi,$query_dosens);
$row_dos=mysqli_fetch_array($data_dos);

$g_depan=ltrim($row_dos['gelar_depan']," ,");

$tgl_lahir=gfDateStandart($row_dos['lahir_tgl']);
$tgl= $tgl_lahir;
?>
<tbody>
<tr class="text-center">
<th colspan="8" class="text-center">
<h4>BIODATA DOSEN</h4>
</th>
</tr>
<tr>
	<td colspan="3" style="vertical-align: top;">1. Nama</td>
<?php if(!empty($row_dos['gelar_depan'])){ ?>
	<td colspan="5" style="vertical-align: top;"><?=$g_depan?>. <?=$row_dos['nama']?>, <?=$row_dos['gelar_belakang']?></td>
<?php } else { ?>
	<td colspan="5" style="vertical-align: top;"><?=$row_dos['nama']?>, <?=$row_dos['gelar_belakang']?></td>
<?php }?>
</tr>
<tr>
<td colspan="3" style="vertical-align: top;">2. Status Kepegawaian</td>
<td colspan="5" style="vertical-align: top;"><?=$row_dos['nama_ikatan']?></td>
</tr>
<tr>
<td colspan="3" style="vertical-align: top;">3. NIDN / NIDK</td>
<td colspan="5" style="vertical-align: top;"><?=$row_dos['nidn']?></td>
</tr>
<?php if(!empty($row_dos['nip'])){
  $nip=$row_dos['nip'];
} else {
  $nip='-';
}
if(!empty($row_dos['karpeg'])){
  $karpeg=$row_dos['karpeg'];
} else {
  $karpeg='-';
}
?>
<tr>
<td colspan="3" style="vertical-align: top;">4. NIP. / No. KARPEG</td>
<td colspan="5" style="vertical-align: top;"><?=$nip?> / <?=$karpeg?></td>
</tr>

<tr>
<td colspan="3" style="vertical-align: top;">5. Tempat dan Tanggal Lahir</td>
<td colspan="5" style="vertical-align: top;"><?=$row_dos['lahir_tempat']?>, <?=$tgl?></td>
</tr>

<?php 
if($row_dos['jk']=='L'){ $jkel="Laki-Laki" ;} else { $jkel="Perempuan"; }
?>
<tr>
<td colspan="3" style="vertical-align: top;">6. Jenis Kelamin</td>
<td colspan="5" style="vertical-align: top;"><?=$jkel ?></td>
</tr>

<tr>
<td colspan="3" style="vertical-align: top;">7. Pendidikan Tertinggi</td>
<td colspan="5" style="vertical-align: top;">
<?php
$resume_didik=$this->db->query("SELECT
								  a.id_sdm,
								  a.thn_lulus,
								  a.`tgl_lulus`,
								  a.nm_sp_formal,
								  b.nama_jenjang,
								  c.nama_bidang,
								  a.id_rwy_didik_formal,
								  d.`tgl_ijazah_pak`
								FROM
								  rwy_pend_formal a
								  LEFT JOIN jenjangs b
									ON a.id_jenj_didik = b.id
								  LEFT JOIN bidang_ilmus c
									ON a.id_bid_studi = c.kode
								  LEFT JOIN `rwy_pend_pak` d
									ON a.`id_rwy_didik_formal` = d.`id_rwy_didik_formal`
								WHERE a.id_sdm = '$row_dos[dosen_no]'")->result();
?>
<?php
	foreach($resume_didik as $pendidikan) :
	$tgl_ijazah_pak=gfDateStandart($pendidikan->tgl_ijazah_pak);
	$tgl_ijazah=$tgl_ijazah_pak;
	$bidang=ucfirst(strtolower($pendidikan->nama_bidang));
?>
<?=$pendidikan->nama_jenjang;?>, <?=$bidang;?>, <?=$pendidikan->nm_sp_formal;?>, <?=$tgl_ijazah_pak;?> </br>                     
<?php endforeach; ?>
</td>
</tr>

<?php
$resume_golongan=$this->db->query("SELECT
								  a.`no`,
								  a.`golongan_kode`,
								  a.`golongan_tgl`,
								  b.`nama`,
								  b.`kode_gol`
								FROM
								  dosens AS a,
								  `golongans` AS b
								WHERE a.`no` = '$row_dos[dosen_no]'
								  AND a.`golongan_kode` = b.`kode`")->row();
$gol_next=$resume_golongan->golongan_kode+1;      
$gol=gfDateStandart($resume_golongan->golongan_tgl);
$golongan_tgl=  $gol; 
?>
<tr>
<td colspan="3" style="vertical-align: top;">8. Pangkat/Golongan Ruang/TMT</td>
<?php if($resume_golongan->golongan_kode='99' || empty($resume_golongan->golongan_kode)){ ?>
<td colspan="5"><?=$resume_golongan->nama?> <?=$resume_golongan->kode_gol?> / <?=$golongan_tgl?> </td>
<?php } else { ?>
<td colspan="5"><?=$resume_golongan->nama?> <?=$resume_golongan->kode_gol?> / <?=$golongan_tgl?></td>
<?php }?>
</tr>

<?php
$resume_jabatan=$this->db->query("SELECT
								  a.`no`,
								  a.`jabatan_no`,
								  b.`nama_jabatans`,
								  b.`kum`,
								  a.`pengangkatan_tgl`,
								  a.`jenjang_id`,
								  c.`nama_jenjang`,
								  a.`jabatan_tgl`
								  FROM
								  dosens AS a,
								  `jabatans` AS b,
								  `jenjangs` AS c
								  WHERE a.`no` = '$row_dos[dosen_no]'
								  AND a.`jabatan_no` = b.`kode`
								  AND a.`jenjang_id` = c.`id`")->row();
$tgl=gfDateStandart($resume_jabatan->jabatan_tgl);
$jabatan_tgl= $tgl; 
$tgl_angkat=gfDateStandart($resume_jabatan->pengangkatan_tgl);
$pengangkatan_tgl=$tgl_angkat;
?>
<tr>
<td colspan="3" style="vertical-align: top;">9. Jabatan Akademik Dosen/TMT</td>
<?php if(empty($resume_jabatan->jabatan_no)){ ?>
<td colspan="5">-/- </td>
<?php } elseif ($resume_jabatan->jabatan_no=='31') { ?>
<td colspan="5"><?=$resume_jabatan->nama_jabatans?>, <?=$resume_jabatan->kum?> KUM / <?=$pengangkatan_tgl?></td> 
<?php } else { ?>
<td colspan="5"><?=$resume_jabatan->nama_jabatans?>, <?=$resume_jabatan->kum?> KUM / <?=$jabatan_tgl?></td>  
<?php  } ?>
</tr>

<tr>
<?php 
$jenjang_prodi=$this->db->query("SELECT nama_jenjang FROM `jenjangs` a WHERE a.`id`='$row_dos[prodi_jen]'")->row();
if (substr($row_dos['instansi_kode'],0,3)=='031'||substr($row_dos['instansi_kode'],0,3)=='032'){ ?>
<td colspan="3">10. Fakultas / Program Studi</td>                      
<td colspan="5"><?=$row_dos['fakultas']?> / <?=$row_dos['nama_prodi']?> <?=$jenjang_prodi->nama_jenjang?></td>
<?php } else {  ?>
<td colspan="3">10. Program Studi</td>                      
<td colspan="5"> <?=$row_dos['nama_prodi']?>  <?=$jenjang_prodi->nama_jenjang?></td>
<?php } ?>
</tr>

<tr>
<td colspan="3" style="vertical-align: top;">11. PTS</td>
<td colspan="5" style="vertical-align: top;"><?=$row_dos['nama_instansi']?></td>
</tr>

<?php
$q_cari_gol="SELECT
			  a.`no`,
			  a.`golongan_kode`,
			  a.golongan_tgl,
			  b.`nama`,
			  b.`kode_gol`
			FROM
			  dosens AS a,
			  `golongans` AS b
			WHERE a.`no` = '$row_dos[no]'
			  AND a.`golongan_kode` = b.`kode`";
$dq_cari_gol=mysqli_query($koneksi,$q_cari_gol);
$rdq_cari_gol=mysqli_fetch_array($dq_cari_gol);
?>
<tr class="text-center">
<th colspan="2" class="text-center">URAIAN</th>
<th colspan="3" class="text-center">LAMA</th>
<th colspan="3" class="text-center">BARU</th>
</tr>
<tr>
<td colspan="2">Pangkat/Gol/TMT</td>
<td colspan="3"><?=$rdq_cari_gol['nama']?> / <?=$rdq_cari_gol['kode_gol']?>/ <?=$rdq_cari_gol['golongan_tgl']?></td>
<td colspan="3"></td>
</tr>
<?php
if($row_dos['jabatan_no']<>31)
{
	$q_cari_jab="SELECT
				  a.`dosen_no`,
				  a.`no`,
				  a.`jabatan_no`,
				  b.`nama_jabatans`,
				  b.`kum`,
				  a.`jabatan_tgl`,
				  a.`jenjang_id_lama`,
				  c.`nama_jenjang`
				FROM
				  `usulans` AS a,
				  `jabatans` AS b,
				  `jenjangs` AS c
				WHERE a.`dosen_no`= '$row_dos[no]'
				  AND a.`jabatan_no`=b.`kode`
				  AND a.`jenjang_id_lama`=c.`id`";
}else
{
	$q_cari_jab="SELECT
				  a.`no`,
				  a.`jabatan_no`,
				  a.pengangkatan_tgl,
				  b.`nama_jabatans`,
				  a.`jenjang_id`,
				  c.`nama_jenjang`,
				  a.`jabatan_tgl`
				FROM
				  dosens AS a,
				  `jabatans` AS b,
				  `jenjangs` AS c
				WHERE a.`no` = '$row_dos[no]'
				  AND a.`jabatan_no` = b.`kode`
				  AND a.`jenjang_id` = c.`id`";
}
$dq_cari_jab=mysqli_query($koneksi,$q_cari_jab);
$rdq_cari_jab=mysqli_fetch_array($dq_cari_jab);
?>
<tr>
<td colspan="2">Jabatan/TMT</td>
<?php if(empty($rdq_cari_jab['jabatan_no'])){ ?>
<td colspan="3">-/- </td>
<?php } elseif ($rdq_cari_jab['jabatan_no']=='31') { ?>
<td colspan="3"><?=$rdq_cari_jab['nama_jabatans']?> (<?=$rdq_cari_jab['nama_jenjang']?>), <?=$rdq_cari_jab['pengangkatan_tgl']?></td> 
<?php } else { ?>
<td colspan="3"><?=$rdq_cari_jab['nama_jabatans']?> (<?=$rdq_cari_jab['nama_jenjang']?>), <?=$rdq_cari_jab['jabatan_tgl']?></td>
<?php  } ?>


<?php
$q_jab_us="SELECT
			  a.`no`,
			  c.`nama_jabatans`,
			  d.`nama_jenjang`,
			  a.`jabatan_tgl`
			FROM
			  `usulans` AS a,
			  `jabatan_jenjangs` AS b,
			  `jabatans` AS c,
			  `jenjangs` AS d
			WHERE a.`no` = '$no'
			  AND a.`jabatan_usulan_no` = b.`no`
			  AND b.`jabatan_kode` = c.`kode`
			  AND b.`jenjang_id` = d.`id`";
$dq_jab_us=mysqli_query($koneksi,$q_jab_us);
$rdq_jab_us=mysqli_fetch_array($dq_jab_us);
?>
<td colspan="3"><?=$rdq_jab_us['nama_jabatans']?> (<?=$rdq_jab_us['nama_jenjang']?>)</td>
</tr>
<?php
if($row_dos['jabatan_no']<>31)
{
	$q_ak_lama="SELECT
				  a.`dosen_no`,
				  a.`no`,
				  a.`jabatan_no`,
				  b.`nama_jabatans`,
				  b.`kum`,
				  a.`jabatan_tgl`,
				  a.`jenjang_id_lama`,
				  c.`nama_jenjang`,
				  c.`ak`
				FROM
				  `usulans` AS a,
				  `jabatans` AS b,
				  `jenjangs` AS c
				WHERE a.`dosen_no`= '$row_dos[no]'
				  AND a.`jabatan_no`=b.`kode`
				  AND a.`jenjang_id_lama`=c.`id`";
}else
{
	$q_ak_lama="SELECT
				a.`no`,
				a.`jabatan_no`,
				a.`jenjang_id`,
				b.`nama_jabatans`,
				b.`kum`,
				c.`nama_jenjang`,
				c.`ak`,
				a.`jabatan_tgl` 
			FROM
				`dosens` AS a,
				`jabatans` AS b,
				`jenjangs` AS c 
			WHERE
				a.`no` = '$row_dos[no]' 
				AND a.`jabatan_no` = b.`kode` 
				AND a.`jenjang_id` = c.`id`";
}
$d_ak_lama=mysqli_query($koneksi,$q_ak_lama);
$r_ak_lama=mysqli_fetch_array($d_ak_lama);
?>
<tr>
<td colspan="2">Angka Kredit</td>
<td colspan="3"><?=$r_ak_lama['kum']?></td>
<?php
$q_ak_baru="SELECT
			  a.`no`,
			  b.`jenjang_id`,
			  c.`nama_jabatans`,
			  c.`kum`,
			  d.`nama_jenjang`,
			  d.`ak`,
			  a.`jabatan_tgl`
			FROM
			  `usulans` AS a,
			  `jabatan_jenjangs` AS b,
			  `jabatans` AS c,
			  `jenjangs` AS d
			WHERE a.`no` = '$no'
			  AND a.`jabatan_usulan_no` = b.`no`
			  AND b.`jabatan_kode` = c.`kode`
			  AND b.`jenjang_id` = d.`id`";
$d_ak_baru=mysqli_query($koneksi,$q_ak_baru);
$r_ak_baru=mysqli_fetch_array($d_ak_baru);
?>
<td colspan="3"><?=$r_ak_baru['kum']?> </td>
</tr>
<tr>
<th colspan="2">A.K. Yang Dibutuhkan</th>
<th colspan="6">
<?php
$dasar=$r_ak_baru['kum']-$r_ak_lama['kum'];

if($r_ak_lama['kum'] == 0)//jika nilai kum lama = 0
{
	// $pendidikan = nilai angka kredit dari table jenjangs jabatan_usulan_no 
	$pendidikan = $r_ak_baru['ak']; 
} else {
	//jika jejang_id pada dosens = jenjang_id pada usulans
	if($r_ak_lama['jenjang_id'] == $r_ak_baru['jenjang_id']) 
	{
		$pendidikan = 0;
	} else {
		$pendidikan = $r_ak_baru['ak'] - $r_ak_lama['ak'];
	}
}

$kebutuhan = $dasar - $pendidikan;
if($kebutuhan <= 0)
{
	$kebutuhan = 10;
} elseif($pendidikan <= 0) {
	$kebutuhan = $dasar;
}

//jika nilai kum lama = 0
if($r_ak_lama['kum']=='0')
{
	echo $kebutuhan;
}elseif($pendidikan>0)
{
	echo '('.$r_ak_baru['kum'].'-'.$r_ak_lama['kum'].') -'.$pendidikan.' = '.$kebutuhan;
}else
{
	echo $r_ak_baru['kum'].'-'.$r_ak_lama['kum'].' = '.$kebutuhan;
}
?>
</th>
</tr>
<th colspan="8" class="text-center">UNSUR YANG DINILAI</th>
<tr class="text-center">
<th class="text-center" rowspan="2" style="vertical-align: middle;">NO</th>
<th class="text-center" colspan="3" rowspan="2" style="vertical-align: middle;">BIDANG</th>
<th class="text-center" rowspan="2" style="vertical-align: middle;">PERS(%)</th>
<th class="text-center" colspan="3">ANGKA KREDIT</th>
</tr>
<tr class="text-center">
<th class="text-center" style="vertical-align: middle;">A.K. YANG<br>DIBUTUHKAN</th>
<th class="text-center" style="vertical-align: middle;">A.K. USULAN</th>
<th class="text-center" style="vertical-align: middle;">A.K. DARI<br> TIM PENILAI</th>
</tr>
<?php
$q_persen="SELECT
			  a.`no`,
			  a.`jabatan_usulan_no`,
			  b.`jabatan_kode`,
			  c.`kum`,
			  c.`nama_jabatans`,
			  c.`pa`,
			  c.`pb`,
			  c.`pc`,
			  c.`pd`
			FROM
			  `usulans` AS a,
			  `jabatan_jenjangs` AS b,
			  `jabatans` AS c
			 WHERE a.`no`='$no'
			 AND a.`jabatan_usulan_no`=b.`no`
			 AND b.`jabatan_kode`=c.`kode`";
$d_persen=mysqli_query($koneksi,$q_persen);
$r_persen=mysqli_fetch_array($d_persen);
?>

<?php
$kat_1="SELECT
		  *
		FROM
		  dupaks AS a,
		  `usulan_dupaks` AS b
		WHERE b.`dupak_no` = a.`no`
		  AND b.`usulan_no` = '$no'
		  AND a.`dupak_kategori_id` = '1'";
$d_kat_1=mysqli_query($koneksi,$kat_1);
while($r_kat_1=mysqli_fetch_array($d_kat_1))
{
	$kum_baru_kat_1+=$r_kat_1['kum_usulan_baru'];
	$kum_pen_baru_kat_1+=$r_kat_1['kum_usulan_baru'];
}
?>
<tr>
<td class="text-center">1</td>
<td colspan="3">Bidang Ijazah/Pendidikan dan pelatihan Prajabatan</td>
<td class="text-center">-</td>
<td class="text-center">-</td>
<td class="text-center"><?=$kum_baru_kat_1?></td>
<td class="text-center"><?=$kum_pen_baru_kat_1?></td>
</tr>

<?php
$kat_2="SELECT
		  *
		FROM
		  dupaks AS a,
		  `usulan_dupaks` AS b
		WHERE b.`dupak_no` = a.`no`
		  AND b.`usulan_no` = '$no'
		  AND a.`dupak_kategori_id` = '2'";
$d_kat_2=mysqli_query($koneksi,$kat_2);
while($r_kat_2=mysqli_fetch_array($d_kat_2))
{
	$kum_baru_kat_2+=$r_kat_2['kum_usulan_baru'];
	$kum_pen_baru_kat_2+=$r_kat_2['kum_penilai_baru'];
}
$k2=$r_persen['pa']*0.01*$kebutuhan;
?>
<tr>
<td class="text-center">2</td>
<td colspan="3">Bidang Pengajaran</td>
<td class="text-center">>= <?=$r_persen['pa']?>%</td>
<td class="text-center">>= <?=$k2?></td>
<?php if($kum_baru_kat_2 < $k2)
{
?>	
	<td class="text-center" style="background-color: #db2828;" ><?=$kum_baru_kat_2?></td>
<?php
}else
{?>
	<td class="text-center"><?=$kum_baru_kat_2?></td>
<?php
}?>

<?php if($kum_pen_baru_kat_2 < $k2) //cari nilai dari tim penilai
{
?>	
	<td class="text-center" style="background-color: #db2828;" ><?=$kum_pen_baru_kat_2?></td>
<?php
}else
{?>
	<td class="text-center"><?=$kum_pen_baru_kat_2?></td>
<?php
}?>
</tr>


<?php
$kat_3="SELECT
		  *
		FROM
		  dupaks AS a,
		  `usulan_dupaks` AS b
		WHERE b.`dupak_no` = a.`no`
		  AND b.`usulan_no` = '$no'
		  AND a.`dupak_kategori_id` = '3'";
$d_kat_3=mysqli_query($koneksi,$kat_3);
while($r_kat_3=mysqli_fetch_array($d_kat_3))
{
	$kum_baru_kat_3+=$r_kat_3['kum_usulan_baru'];
	$kum_pen_baru_kat_3+=$r_kat_3['kum_penilai_baru'];
}
$k3=$r_persen['pb']*0.01*$kebutuhan;
?>
<tr>
<td class="text-center">3</td>
<td colspan="3">Bidang Penelitian</td>
<td class="text-center">>= <?=$r_persen['pb']?>%</td>
<td class="text-center">>= <?=$k3?></td>
<?php if($kum_baru_kat_3 < $k3)
{
?>	
	<td class="text-center" style="background-color: #db2828;" ><?=$kum_baru_kat_3?></td>
<?php
}else
{?>
	<td class="text-center"><?=$kum_baru_kat_3?></td>
<?php
}?>

<?php if($kum_pen_baru_kat_3 < $k3) //cari nilai dari tim penilai
{
?>	
	<td class="text-center" style="background-color: #db2828;" ><?=$kum_pen_baru_kat_3?></td>
<?php
}else
{?>
	<td class="text-center"><?=$kum_pen_baru_kat_3?></td>
<?php
}?>
</tr>

<?php
$kat_4="SELECT
		  *
		FROM
		  dupaks AS a,
		  `usulan_dupaks` AS b
		WHERE b.`dupak_no` = a.`no`
		  AND b.`usulan_no` = '$no'
		  AND a.`dupak_kategori_id` = '4'";
$d_kat_4=mysqli_query($koneksi,$kat_4);
while($r_kat_4=mysqli_fetch_array($d_kat_4))
{
	$kum_baru_kat_4+=$r_kat_4['kum_usulan_baru'];
	$kum_pen_baru_kat_4+=$r_kat_4['kum_penilai_baru'];
}
$k4=$r_persen['pc']*0.01*$kebutuhan;
?>
<tr>
<td class="text-center">4</td>
<td colspan="3">Bidang Pengabdian pada Masyarakat</td>
<td class="text-center"><= <?=$r_persen['pc']?>%</td>
<td class="text-center"><= <?=$k4?></td>
<?php if($kum_baru_kat_4 ==0 )
{
?>	
	<td class="text-center" style="background-color: #db2828;" ><?=$kum_baru_kat_4?></td>
<?php
}else
{?>
	<td class="text-center"><?=$kum_baru_kat_4?></td>
<?php
}?>

<?php if($kum_pen_baru_kat_4 ==0 ) //cari nilai dari tim penilai
{
?>	
	<td class="text-center" style="background-color: #db2828;" ><?=$kum_pen_baru_kat_4?></td>
<?php
}elseif($kum_pen_baru_kat_4 > $k4)
{
?>	
	<td class="text-center"><?=$k4?></td>
<?php
}else
{?>
	<td class="text-center"><?=$kum_pen_baru_kat_4?></td>
<?php
}?>
</tr>


<?php
$kat_5="SELECT
		  *
		FROM
		  dupaks AS a,
		  `usulan_dupaks` AS b
		WHERE b.`dupak_no` = a.`no`
		  AND b.`usulan_no` = '$no'
		  AND a.`dupak_kategori_id` = '5'";
$d_kat_5=mysqli_query($koneksi,$kat_5);
while($r_kat_5=mysqli_fetch_array($d_kat_5))
{
	$kum_baru_kat_5+=$r_kat_5['kum_usulan_baru'];
	$kum_pen_baru_kat_5+=$r_kat_5['kum_penilai_baru'];
}
$k5=$r_persen['pd']*0.01*$kebutuhan;
?>
<tr>
<td class="text-center">5</td>
<td colspan="3">Bidang Penunjang</td>
<td class="text-center"><= <?=$r_persen['pd']?>%</td>
<td class="text-center"><= <?=$k5?></td>
<?php if($kum_baru_kat_5 ==0)
{
?>	
	<td class="text-center" style="background-color: #db2828;" ><?=$kum_baru_kat_5?></td>
<?php
}else
{?>
	<td class="text-center"><?=$kum_baru_kat_5?></td>
<?php
}?>

<?php if($kum_pen_baru_kat_5 ==0) //cari nilai dari tim penilai
{
?>	
	<td class="text-center" style="background-color: #db2828;" ><?=$kum_pen_baru_kat_5?></td>
<?php
}elseif($kum_pen_baru_kat_5 > $k5)
{
?>	
	<td class="text-center"><?=$k5?></td>
<?php
}else
{?>
	<td class="text-center"><?=$kum_pen_baru_kat_5?></td>
<?php
}?>
</tr>



<tr class="text-center">
<th colspan="5" class="text-center">USULAN ANGKA KREDIT</th>
<th colspan="3" class="text-center">ANGKA KREDIT</th>
</tr>
<?php
//awal cari nilai usulan
$kat_total="SELECT
		  *
		FROM
		  dupaks AS a,
		  `usulan_dupaks` AS b
		WHERE b.`dupak_no` = a.`no`
		  AND b.`usulan_no` = '$no'
		  AND a.`dupak_kategori_id` IN('2','3','4','5')";
$d_kat_total=mysqli_query($koneksi,$kat_total);
while($r_kat_total=mysqli_fetch_array($d_kat_total))
{
	$kum_baru_kat_total+=$r_kat_total['kum_usulan_baru'];
}

$kurang = $kebutuhan - $kum_baru_kat_total;

if($kurang <= 0)
{
	$kurang = 0;
}
//akhir cari nilai usulan

//awal cari nilai dari tim penilai
$kat_total_pen="SELECT
		  *
		FROM
		  dupaks AS a,
		  `usulan_dupaks` AS b
		WHERE b.`dupak_no` = a.`no`
		  AND b.`usulan_no` = '$no'
		  AND a.`dupak_kategori_id` IN('2','3')";
$d_kat_total_pen=mysqli_query($koneksi,$kat_total_pen);
while($r_kat_total_pen=mysqli_fetch_array($d_kat_total_pen))
{
	$kum_baru_kat_total_pen+=$r_kat_total_pen['kum_penilai_baru'];
}

//cari nilai kategori 4 (PM)
if($kum_pen_baru_kat_4 == 0)
{
	$kum_k4_pen=0;
}
elseif($kum_pen_baru_kat_4 > $k4)
{
	$kum_k4_pen=$k4;
}else
{
	$kum_k4_pen=$kum_pen_baru_kat_4;
}

//cari nilai kategori 5 (penunjang)
if($kum_pen_baru_kat_5 == 0)
{
	$kum_k5_pen=0;
}
elseif($kum_pen_baru_kat_5 > $k5)
{
	$kum_k5_pen=$k5;
}else
{
	$kum_k5_pen=$kum_pen_baru_kat_5;
}

$kum_total_pen= $kum_baru_kat_total_pen + $kum_k4_pen + $kum_k5_pen;

$kurang_pen = $kebutuhan - $kum_total_pen ;

if($kurang_pen <= 0)
{
	$kurang_pen = 0;
}
//akhir cari nilai dari tim penilai
?>
<tr>
<td colspan="5">Jumlah Angka Kredit diluar Ijazah/Pendidikan dan pelatihan Prajabatan</td>
<td colspan="2" class="text-center"><?=$kum_baru_kat_total?></td>
<td class="text-center"><?=$kum_total_pen?></td>
</tr>
<tr>
<td colspan="5">Jumlah Kekurangan Angka Kredit</td>
<td colspan="2" class="text-center"><?=$kurang?> </td>
<td class="text-center"><?=$kurang_pen?></td>
</tr>
</tbody>
</table>

</div>
<?php 
$tanggal_buka = date('Y-m-d', strtotime("1 month", strtotime(date("Y-m-01"))));
$tutup=date('Y-m-d', strtotime("0 day", strtotime(date("Y-m-25"))));
$todayis=date('Y-m-d', strtotime("0 day", strtotime(date("Y-m-d"))));

// $tanggal_buka = "2020-02-25";
// $tutup="2020-01-01";
// $todayis="2020-01-03";

// var_dump($tutup);
if($data_dasar->usulan_status_id =='10' ) 
{ ?>
	<?php if($role =='3' )
	{ ?> 
		<!--<center>
		<hr>
		<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#error" class="btn btn-danger"><i class="fa fa-warning"></i> Pengajuan Usulan Baru <i class="fa fa-warning"></i></a>
		<hr>
		</center>-->
	
	
<?php 
	}elseif ($role <>'3')
	{ 
		if ($todayis > $tanggal_buka || $todayis >= $tutup )
		{  ?>
		<div class="alert alert-danger" role="alert">Proses ajuan usulan baru ditutup pada tanggal <b><?= $tutup ?></b> dan akan dibuka kembali pada tanggal <b><?= $tanggal_buka ?></b>.</div>
		<?php }else
		{  
			// echo "TUTUP = $tutup<br>BUKA = $tanggal_buka<br>TGL SKRG = $todayis";
		?>
	<center>
	<div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> Proses ajuan usulan baru ditutup pada tanggal <b><?= $tutup ?></b> dan akan dibuka kembali pada tanggal <b><?= $tanggal_buka ?></b>.</div>
	<hr>
	<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah"  class="btn btn-success"><i class="fa fa-flask"></i> Proses Usulan Baru</a> 
	<a href="" data-toggle="modal" id="myLargeModalLabel1" data-target="#revisi"  class="btn btn-warning"><i class="fa fa-retweet"></i> Revisi Draft</a>
	<hr>
	</center>
	<?php }
} 
}elseif($usulan_status_id<>'1' && $usulan_status_id<>'2' )
{}elseif($role=='3' )
{ 
	if($kum_baru_kat_2 < $k2 || $kum_baru_kat_3 < $k3 || $kum_baru_kat_4 ==0 || $kum_baru_kat_5 ==0 )
	{
		echo"
		<center>
		<hr>
		<a href='' data-toggle='modal' id='myLargeModalLabel' data-target='#error' class='btn btn-danger'><i class='fa fa-warning'></i> Pengajuan Usulan Baru <i class='fa fa-warning'></i></a>
		<hr>
		</center>";
	}else{
		?>

<center>
<hr>
	<a href="" data-toggle="modal" id="myLargeModalLabel" data-target="#tambah"  class="btn btn-success"><i class="fa fa-flask"></i> Pengajuan Usulan Baru <i class="fa fa-flask"></i></a>
	<hr>
	</center>
<?php 
	}
} ?>


</div>
</div>
</div>                            

</div>                             


</div>
</div>
</div>
</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade"  aria-labelledby="myLargeModalLabel" id="tambah" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url(); ?>usulan/usulan/proses_usulanbaru/<?php echo $data_dasar->no; ?>/<?=$data_dasar->dosen_no?>/<?=$jabatan_no;?>" role="form" enctype="multipart/form-data">
			<div class="modal-body">
				<h3>Anda yakin akan mengirim usulan baru ?</h3>
                <?php if($data_dasar->usulan_status_id=='1'){ ?>
                <input type="hidden" name="usulan_status" value="10">
                <input type="hidden" name="usulan_ket" value="Pengajuan Usulan Baru">
                <?php }elseif($data_dasar->usulan_status_id=='10'){ ?>
                <input type="hidden" name="usulan_status" value="3">
                <input type="hidden" name="usulan_ket" value="Pengajuan Usulan Baru">
                <?php } elseif($data_dasar->usulan_status_id=='2'){  ?>
                <input type="hidden" name="usulan_status" value="10">
                <input type="hidden" name="usulan_ket" value="Pengajuan Usulan Baru Yang Telah Direvisi">
                <?php } ?>
                <!--<hr>
				<div class="row">
				<div class="col-md-12">
                <div class="form-group">
					  <label for="keterangan">Keterangan</label>
					  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
				</div>
				</div>
				</div>-->
            </div>
            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">KIRIM</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                </div>
            </div>
		</form>
	</div>
</div>
</div>
<!-- Modal Revisi-->
<div class="modal fade"  aria-labelledby="myLargeModalLabel1" id="revisi" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url(); ?>usulan/usulan/proses_usulanbaru/<?php echo $data_dasar->no; ?>/<?=$data_dasar->dosen_no?>/<?=$jabatan_no;?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
				<h3>Revsi Draft</h3>
                
                <input type="hidden" name="usulan_status" value="2">
                <!-- <input type="text" name="usulan_ket" value="Pengajuan Usulan Baru"> -->
                <label for="keterangan">Keterangan</label>
				<input type="hidden" name="rule" value="99">
				<input type="hidden" name="email" value="<?php echo $data_nidn->email; ?>">
				<input type="hidden" name="nama" value="<?php echo $data_nidn->nama; ?>">
                <textarea name="usulan_ket" class="form-control" id="keterangan" rows="20" maxlength="65000"></textarea>
                <!--<hr>
				<div class="row">
				<div class="col-md-12">
                <div class="form-group">
					  <label for="keterangan">Keterangan</label>
					  <textarea name="keterangan" class="form-control" id="keterangan" rows="2" maxlength="255"></textarea>
				</div>
				</div>
				</div>-->
            </div>
            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">KIRIM</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                </div>
            </div>
		</form>
	</div>
</div>
</div>
<!-- Modal warning-->
<div class="modal fade"  aria-labelledby="myLargeModalLabel1" id="error" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<form method="post" action="<?= base_url(); ?>usulan/usulan/proses_usulanbaru/<?php echo $data_dasar->no; ?>" role="form" enctype="multipart/form-data">
		<div class="modal-body">
		<div style="text-align: center; color: #8c0000; font-size: 2.3em; padding-bottom: 10px"><strong>Peringatan..!!!</strong></div>
							
                
				<div style="text-align: center; color: #000066; font-size: 1.5em;">Angka kredit usulan anda masih belum memenuhi ketentuan. Silakan dicek kembali<br><br>
							   
				</div>
            </div>
            <div class="modal-footer">
                <div class="btn-group pull-right">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
		</form>
	</div>
</div>
</div>