<?php
include "koneksi_mirror.php";
?>
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor"></h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
			   
			</ol>
			
		</div>
	</div>
</div>

<div class="row">
<div class="col-12">
<div class="tab-content tabcontent-border">                        
<div class="card">
	<div class="card-header bg-info">
		<h4 class="m-b-0 text-white">Cari Data Dosen</h4>
	</div>
	<div class="card-body"> 
        <form action="" method="post" enctype="multipart/form-data" >  
		<div class="form-group m-t-40 row">
			<label for="example-text-input" class="col-2 col-form-label">Masukkan NIDN</label>
			<div class="col-5">
				<input class="form-control" type="number"  name="nidn" >
			</div>
			<button type="submit" name="cari" value="cari" class="btn btn-info">Cari</button>
		</div>	
		</form>
	</div>
</div>
</div>
</div>
</div>

<?php
if (isset($_POST['cari']))
{
	$nidn=$_POST['nidn'];
	$dosen="SELECT
			  a.`no`,
			  a.`nidn`,
			  a.`nama`,
			  a.`no_sertifikat`,
			  b.`instansi_kode`,
			  c.`nama_instansi`,
			  a.`lahir_tempat`,
			  a.`lahir_tgl`,
			  a.`jabatan_no`,
			  d.`nama_jabatans`,
			  d.`kum`,
			  a.`golongan_kode`,
			  e.`nama` AS nama_gol,
			  e.`kode_gol`,
			  a.`ikatan_kerja_kode`,
			  f.`nama_ikatan`
			FROM
			  `dosens` AS a,
			  `prodis` AS b,
			  `instansis` AS c,
			  `jabatans` AS d,
			  `golongans` AS e,
			  `ikatan_kerjas` AS f
			WHERE a.`prodi_kode` = b.`kode`
			  AND b.`instansi_kode` = c.`kode`
			  AND a.`jabatan_no` = d.`kode`
			  AND a.`golongan_kode` = e.`kode`
			  AND a.`ikatan_kerja_kode` = f.`kode`
			  AND a.`nidn` = '$nidn'";
	$d_dosen=mysqli_query($koneksi,$dosen);
	$cari_dosen=mysqli_num_rows($d_dosen);
	if($cari_dosen>0)
	{
		$r_dosen=mysqli_fetch_array($d_dosen);
	?>
	<div class="row">
	<div class="col-12">
	<div class="tab-content tabcontent-border">                        
	<div class="card">
		<div class="card-header bg-info">
			<h4 class="m-b-0 text-white">Data Dosen</h4>
		</div>
		<div class="card-body"> 
		   <form action="<?php echo base_url().'usulan/usulan/simpan_dosen_tambahan' ?>" method="post" enctype="multipart/form-data" >  
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">NIDN</label>
				<div class="col-10">
					<input class="form-control" type="text"  name="nidn" value="<?=$r_dosen['nidn']?>" readonly required>
					<input class="form-control" type="hidden"  name="periode" value="<?=$periode?>" readonly required>
					<input class="form-control" type="hidden"  name="instansi" value="<?=$instansi?>" readonly required>
				</div>
			</div>
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Nama Lengkap</label>
				<div class="col-10">
					<input class="form-control" type="text"  name="nama" value="<?=$r_dosen['nama']?>" readonly required>
				</div>
			</div>
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Perguruan Tinggi</label>
				<div class="col-10">
					<input class="form-control" type="text"  name="nama_instansi" value="<?=$r_dosen['nama_instansi']?>" readonly required>
					<input class="form-control" type="hidden"  name="instansi_kode" value="<?=$r_dosen['instansi_kode']?>" readonly required>
				</div>
			</div>
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Tempat Lahir</label>
				<div class="col-10">
					<input class="form-control" type="text"  name="lahir_tempat" value="<?=$r_dosen['lahir_tempat']?>" readonly required>
				</div>
			</div>
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Tanggal Lahir</label>
				<div class="col-10">
					<input class="form-control" type="text"  name="lahir_tgl" value="<?=$r_dosen['lahir_tgl']?>" readonly required>
				</div>
			</div>
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Jabatan Akademik</label>
				<div class="col-10">
					<input class="form-control" type="text"  name="nama_jabatans" value="<?=$r_dosen['nama_jabatans']?>" readonly required>
				</div>
			</div>
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Status Pegawai</label>
				<div class="col-10">
					<input class="form-control" type="text"  name="nama_ikatan" value="<?=$r_dosen['nama_ikatan']?>" readonly required>
				</div>
			</div>
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Pangkat</label>
				<div class="col-10">
					<input class="form-control" type="text"  name="nama_gol" value="<?=$r_dosen['nama_gol']?>" readonly required>
				</div>
			</div>
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Golongan</label>
				<div class="col-10">
					<input class="form-control" type="text"  name="kode_gol" value="<?=$r_dosen['kode_gol']?>" readonly required>
				</div>
			</div>
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Nomor Sertifikat Pendidik</label>
				<div class="col-10">
					<input class="form-control" type="number"  name="no_sertifikat"  value="<?=$r_dosen['no_sertifikat']?>" required>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	
	<div class="row">
	<div class="col-12">
	<div class="tab-content tabcontent-border">                        
	<div class="card">
		<div class="card-header bg-info">
			<h4 class="m-b-0 text-white">Pilihan untuk Klarifikasi Dosen yang tidak ada di daftar :</h4>
		</div>
		<div class="card-body"> 
			<div class="form-group m-t-40 row">
				<label for="example-text-input" class="col-2 col-form-label">Status tidak lapor</label>
				<div class="col-10">
					<ul class="icheck-list">
					<li>
						<input type="radio"  id="hide" name="status" value="1" required>
						<label>Tugas Belajar</label>
					</li>
					<li>
						<input type="radio"  id="hide1" name="status" value="2" required>
						<label>Cuti</label>
					</li>
					<li>
						<input type="radio"  id="hide2" name="status" value="3" required>
						<label>Pindah Kampus</label>
					</li>
					<li>
						<input type="radio"  id="hide3" name="status" value="4" required>
						<label>Pensiun</label>
					</li>
					<li>
						<input type="radio"  id="hide4" name="status" value="5" required>
						<label>Meninggal</label>
					</li>
					<li>
						<input type="radio"  id="hide4" name="status" value="6" required>
						<label>Alasan lainnya</label>
						<input type="text" name="keterangan" id="keterangan" class="form-control alamat" maxlength="50" placeholder="Alasan Lainnya" >
                    </li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="text-center">
				<button type="submit" class="btn btn-info">Submit</button>
				<button type="reset" class="btn btn-inverse">Cancel</button>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</form>
	
	<?php
	}else
	{
		echo "<script>
			  alert('Data tidak ditemukan, Silakan input manual');
			</script>";
	}
}
?>
