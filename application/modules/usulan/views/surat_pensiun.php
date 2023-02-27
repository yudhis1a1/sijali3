<!DOCTYPE html>
<?php
header('Content-Type: application/msword');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=surat_pensiun_' . $d->no . '.doc');
date_default_timezone_set('Asia/Jakarta');

//menghitung selsih tanggal lahir dengan tanggal sekarang
$diff 			= date_diff(date_create($d->lahir_tgl), date_create());
$thn_now 		= date('Y');

// jika NIDK 
if (substr($d->nidn, 0, 2) == '88' || substr($d->nidn, 0, 2) == '89') {
	$selisih_thn 	= 70 - $diff->y;
	$tahun_baru 	= $thn_now + $selisih_thn;
} elseif (substr($d->nidn, 0, 2) <> '88' && substr($d->nidn, 0, 2) <> '89') {
	$selisih_thn 	= 65 - $diff->y;
	$tahun_baru 	= $thn_now + $selisih_thn;
}

$lahir_bln 		= date('m', strtotime($d->lahir_tgl));
$jabatan_bln 	= date('m', strtotime($d->jabatan_tgl));
$golongan_bln 	= date('m', strtotime($d->golongan_tgl));

$bln_indo = array(
	'01'  => 'Januari',
	'02'  => 'Februari',
	'03' => 'Maret',
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'11' => 'November',
	'12' => 'Desember'
);
?>

<p align="center" style="font-size:21px;line-height:2;">
	<font face="Times New Roman">
		<b>
			SURAT PERNYATAAN
		</b>
	</font>
</p>

<table id="table-header" border="0" align="justify">
	<tbody>
		<tr>
			<td colspan="3">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">
						Saya yang bertanda tangan di bawah ini :
					</font>
				</p>
			</td>
		</tr>
		<tr>
			<td valign="top" width="40%">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">Nama</font>
				</p>
			</td>
			<td valign="top" width="2%">
				<p style="font-size:16px;text-align:center;">
					<font face="Times New Roman">:</font>
				</p>
			</td>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman"><?= $d->gelar_depan ?>. <?= $d->nama ?>, <?= $d->gelar_belakang ?></font>
				</p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">NIDN</font>
				</p>
			</td>
			<td valign="top" width="5%">
				<p style="font-size:16px;text-align:center;">
					<font face="Times New Roman">:</font>
				</p>
			</td>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman"><?= $d->nidn ?></font>
				</p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">Tempat, tanggal lahir</font>
				</p>
			</td>
			<td valign="top" width="5%">
				<p style="font-size:16px;text-align:center;">
					<font face="Times New Roman">:</font>
				</p>
			</td>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman"><?= $d->lahir_tempat ?>, <?= substr($d->lahir_tgl, 8, 2) ?> <?= $bln_indo[$lahir_bln] ?> <?= substr($d->lahir_tgl, 0, 4) ?></font>
				</p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">Pangkat/Gol, TMT</font>
				</p>
			</td>
			<td valign="top" width="5%">
				<p style="font-size:16px;text-align:center;">
					<font face="Times New Roman">:</font>
				</p>
			</td>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman"><?= $d->nama_gol ?> (<?= $d->kode_gol ?>), <?= substr($d->golongan_tgl, 8, 2) ?> <?= $bln_indo[$golongan_bln] ?> <?= substr($d->golongan_tgl, 0, 4) ?></font>
				</p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">Jabatan Fungsional, TMT</font>
				</p>
			</td>
			<td valign="top" width="5%">
				<p style="font-size:16px;text-align:center;">
					<font face="Times New Roman">:</font>
				</p>
			</td>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman"><?= $d->nama_jabatans ?> (<?= $d->kum ?>), <?= substr($d->jabatan_tgl, 8, 2) ?> <?= $bln_indo[$jabatan_bln] ?> <?= substr($d->jabatan_tgl, 0, 4) ?></font>
				</p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">Jabatan Fungsional yang diusulkan</font>
				</p>
			</td>
			<td valign="top" width="5%">
				<p style="font-size:16px;text-align:center;">
					<font face="Times New Roman">:</font>
				</p>
			</td>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman"><?= $d->nama_jabatans_usul ?> (<?= $d->kum_usul ?>)</font>
				</p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">Asal Institusi</font>
				</p>
			</td>
			<td valign="top" width="5%">
				<p style="font-size:16px;text-align:center;">
					<font face="Times New Roman">:</font>
				</p>
			</td>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman"><?= $d->nama_instansi ?> (<?= $d->kode ?>)</font>
				</p>
			</td>
		</tr>
	</tbody>
</table>
<br><br>
<table id="table-header" border="0" align="justify">
	<tbody>
		<tr>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">
						Bahwa benar saya sudah mendekati usia pensiun terhitung pada <?= substr($d->lahir_tgl, 8, 2) ?> <?= $bln_indo[$lahir_bln] ?> <?= $tahun_baru ?>, dan berdasarkan Surat Edaran Direktur Jenderal Pendidikan Tinggi Kementerian Pendidikan dan Kebudayaan Nomor 166/E.E4/K8/2020 Tanggal 28 Februari 2020 Hal Usulan Kenaikan Jabatan Akademik Dosen ke Guru Besar/Profesor, saya bersedia mengikuti proses penilaian angka kredit sesuai prosedur dan ketentuan yang berlaku tanpa meminta perlakuan khusus.
					</font>
				</p>
			</td>
		</tr>
	</tbody>
</table>
<br>
<table id="table-header" border="0" align="justify">
	<tbody>
		<tr>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">
						Demikian surat pernyataan ini saya buat dengan sebenarnya, sebagai salah satu syarat untuk dapat diproses usulan Pengajuan Angka Kredit sebagaimana tersebut di atas.
					</font>
				</p>
			</td>
		</tr>
	</tbody>
</table>
<br><br>
<table id="table-header" border="0" align="justify">
	<tbody>
		<tr>
			<td valign="top">
				<p style="font-size:16px;text-align:justify;">
					<font face="Times New Roman">
						Jakarta,..........................
					</font>
				</p>
			</td>
		</tr>
	</tbody>
</table>
<br>
<table border="0" align="justify">
	<tbody>
		<tr>
			<td width="400">
				<p style="font-size:16px;text-align:left;">
					<font face="Times New Roman">Yang membuat pernyataan</font>
				</p>
			</td>
			<td colspan="2" width="150">&nbsp;</td>
			<td width="400">
				<p style="font-size:16px;text-align:left;">
					<font face="Times New Roman">Mengetahui </font>
				</p>
			</td>
		</tr>
		<tr>
			<td width="400">&nbsp;</td>
			<td colspan="2" width="150">&nbsp;</td>
			<td width="400">
				<p style="font-size:16px;text-align:left;">
					<font face="Times New Roman"><?= $d->japim ?>,</font>
				</p>
			</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td width="400">
				<p style="font-size:12px;text-align:left;">
					<font face="Times New Roman">Materai Rp. 10.000,00</font>
				</p>
			</td>
			<td colspan="2" width="150">&nbsp;</td>
			<td width="400">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td width="400">
				<p style="font-size:16px;text-align:left;">
					<font face="Times New Roman"><u><b><?= $d->gelar_depan ?>. <?= $d->nama ?>, <?= $d->gelar_belakang ?></b></u></font>
				</p>
			</td>
			<td colspan="2" width="150">&nbsp;</td>
			<td width="400">
				<p style="font-size:16px;text-align:left;">
					<font face="Times New Roman"><u><b><?= $d->pimpinan_nama ?></b></u></font>
				</p>
			</td>
		</tr>
		<tr>
			<td width="400">
				<p style="font-size:16px;text-align:left;">
					<font face="Times New Roman"><b><?= $d->nidn ?></b></font>
				</p>
			</td>
			<td colspan="2" width="150">&nbsp;</td>
			<td width="400">
				<p style="font-size:16px;text-align:left;">
					<font face="Times New Roman"><b><?= $d->pimpinan_nidn ?></b></font>
				</p>
			</td>
		</tr>
	</tbody>
</table>