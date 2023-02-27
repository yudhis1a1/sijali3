<?php
defined('BASEPATH') or exit('No direct script access allowed');



/**
 * @author akil
 * @version 1.0
 * @created 13-Mar-2016 20:19:38
 */
class Master extends MX_Controller
{


	function __construct()
	{

		$this->load->helper('date_helper');
		$this->load->library('excel');
	}


	function __destruct()
	{
	}
	function logout()
	{
		// $this->session->sess_destroy();
		// 	 echo "<script>window.location.href='". base_url()."akun/login';</script>";

		//  redirect(base_url('usulan/login'));
	}




	public function index()
	{
		//$this->load->view('welcome_message');
		//sPusulan('login');
	}
	public function beranda()
	{




		//vusulan('beranda',$data);
		//vusulan('beranda');      
	}

	public function rekap_jad()
	{
		$list_status 	= $this->db->query("SELECT id,nama_status from usulan_statuses")->result();
		$list_pts 		= $this->db->query("SELECT kode,nama_instansi from instansis where aktif='1'")->result();
		$data['list_status'] 	= $list_status;
		$data['list_instansi'] 	= $list_pts;
		Vusulan('show_rekap_usulan', $data);
	}

	function fetch_data($tglawal, $tglakhir, $status)
	{

		if ($status == '1') {
			$query = $this->db->query("SELECT
										a.no AS usulan_no,
										a.tmt_no,
										a.tmt_tgl,
										a.tmt_tahun,
										a.tmt_bulan,
										a.`fakultas`,
										a.`user_penilai_keterangan`,
										a.`user_penilai_no`,
										a.`user_penilai_tgl`,
										a.updated_at,
										a.usulan_status_id,
										a.jenjang_id_lama,
										a.jenjang_id_baru,
										a.jabatan_usulan_no,
										a.pic_ptk,
										a.created_at,
										b.no AS dosen_no,
										b.nama,
										b.`lahir_tempat`,
										b.`lahir_tgl`,
										b.`jk`,
										b.`nidn`,
										b.nip,
										b.`karpeg`,
										b.`golongan_tgl`,
										b.jabatan_tgl,
										b.jabatan_no,
										c.`nama_prodi`,
										c.`instansi_kode`,
										d.`nama_instansi`,
										e.`japim`,
										f.`nama_ikatan`,
										g.`kode_gol`,
										g.`nama` AS nama_gol,
										h.`nama` AS nama_user,
										j.no AS kode_jab_awal,
										k.nama_jabatans,
										k.kum,
										k.inisial,
										rp.lama_tahun_pak,
										rp.lama_bulan_pak,
										rp.baru_tahun_pak,
										rp.baru_bulan_pak,
										pak_tgl
										FROM
										v_usulan_new a
										LEFT JOIN dosens b
										ON a.`dosen_no`=b.`no`
										LEFT JOIN prodis c
										ON b.`prodi_kode`=c.kode
										LEFT JOIN instansis d
										ON c.`instansi_kode`=d.`kode`
										LEFT JOIN reff_japim e
										ON a.`pimpinan_jabatan`=e.`id`
										LEFT JOIN ikatan_kerjas f
										ON b.`ikatan_kerja_kode`=f.`kode`
										LEFT JOIN golongans g
										ON b.`golongan_kode`=g.`kode`
										LEFT JOIN users h
										ON a.`user_penilai_no`=h.`no` 
										LEFT JOIN jabatans k
										ON b.jabatan_no=k.kode 
										LEFT JOIN jabatan_jenjangs j
										ON b.jabatan_no=j.jabatan_kode
											LEFT JOIN rwy_pak rp
										ON b.no=rp.no_dosen
										WHERE a.user_penilai_tgl IS NULL AND LEFT(a.`tgl_ajuan`,10) BETWEEN '$tglawal' AND '$tglakhir' group by a.no");
		} else {
			$query = $this->db->query("SELECT
									a.no AS usulan_no,
									b.no AS dosen_no,
									a.tmt_no,
									a.tmt_tgl,
									a.tmt_tahun,
									a.tmt_bulan,
									b.nama,
									b.`lahir_tempat`,
									b.`lahir_tgl`,
									b.`jk`,
									b.`nidn`,
									b.nip,
									b.`karpeg`,
									a.`fakultas`,
									c.`nama_prodi`,
									c.`instansi_kode`,
									d.`nama_instansi`,
									e.`japim`,
									f.`nama_ikatan`,
									g.`kode_gol`,
									g.`nama` AS nama_gol,
									b.`golongan_tgl`,
									a.`user_penilai_keterangan`,
									a.`user_penilai_no`,
									h.`nama` AS nama_user,
									a.`user_penilai_tgl`,
									a.updated_at,
									a.usulan_status_id,
									k.nama_jabatans,
									k.kum,
									b.jabatan_tgl,
									b.jabatan_no,
									a.jenjang_id_lama,
									a.jenjang_id_baru,
									a.jabatan_usulan_no,
									k.inisial,
									j.no AS kode_jab_awal,
									a.pic_ptk,
									a.created_at,
									rp.lama_tahun_pak,
									rp.lama_bulan_pak,
									rp.baru_tahun_pak,
									rp.baru_bulan_pak,
									pak_tgl
									FROM
									v_usulan_new a
									LEFT JOIN dosens b
									ON a.`dosen_no`=b.`no`
									LEFT JOIN prodis c
									ON b.`prodi_kode`=c.kode
									LEFT JOIN instansis d
									ON c.`instansi_kode`=d.`kode`
									LEFT JOIN reff_japim e
									ON a.`pimpinan_jabatan`=e.`id`
									LEFT JOIN ikatan_kerjas f
									ON b.`ikatan_kerja_kode`=f.`kode`
									LEFT JOIN golongans g
									ON b.`golongan_kode`=g.`kode`
									LEFT JOIN users h
									ON a.`user_penilai_no`=h.`no` 
									LEFT JOIN jabatans k
									ON b.jabatan_no=k.kode 
									LEFT JOIN jabatan_jenjangs j
									ON b.jabatan_no=j.jabatan_kode
									LEFT JOIN rwy_pak rp
									ON b.no=rp.no_dosen
									WHERE a.user_penilai_tgl IS NOT NULL AND LEFT(a.`tgl_ajuan`,10) BETWEEN '$tglawal' AND '$tglakhir' group by a.no");
		}

		return $query->result();
	}

	function get_matkul($no)
	{
		$query = $this->db->query("SELECT * from usulan_matkuls WHERE usulan_no='$no'");
		return $query->result();
	}

	function get_rwy_pend_formal($no)
	{
		$query1 = $this->db->query("SELECT
									a.`no`,
									g. nama_jenjang,
									d.`nama_bidang`,
									b.`tgl_lulus_pak` AS tgl_lulus,
									f.`kode` AS kode_pt,
									f.nama_instansi AS `nm_sp_formal`,
									e.`id_sms`,
									e.`nm_lemb` AS nama_prodi,
									e.`kode_prodi`
									FROM dosens a
									LEFT JOIN `rwy_pend_pak` b
									ON a.`no`=b.`no_dosen`
									LEFT JOIN bidang_ilmus d
									ON b.`id_bid_studi`=d.`kode` 
									LEFT JOIN sms e
									ON b.`id_sms`=e.`id_sms` 
									LEFT JOIN instansis f
									ON e.`id_sp`=f.`id_sp`
									LEFT JOIN jenjangs g
									ON e.`id_jenj_didik`=g.`id`
									WHERE a.`no`='$no' ORDER BY g.nama_jenjang");
		return $query1->result();
	}

	function get_ijazah_lama($jenjang_id)
	{
		$querylama = $this->db->query("select * from jenjangs WHERE id='$jenjang_id'")->row();
		$jenjang = $querylama->nama_jenjang;

		return $jenjang;
	}

	function get_ijazah_baru($jenjang_id)
	{
		$querybaru = $this->db->query("select * from jenjangs WHERE id='$jenjang_id'")->row();
		$jenjang = $querybaru->nama_jenjang;

		return $jenjang;
	}

	function get_jabatan_usulan($jabatan_usulan_no)
	{
		$queryjabusul = $this->db->query("SELECT
							  a.no,
							  b.nama_jabatans,
							  b.kum
							FROM
							  jabatan_jenjangs a
							LEFT JOIN `jabatans` b
							ON a.`jabatan_kode`= b.kode
							WHERE a.`no`='$jabatan_usulan_no'");
		return $queryjabusul->result();
	}


	function get_inisial_jab_usulan($jabatan_usulan_no)
	{
		$queryinisial = $this->db->query("SELECT
							  *
							FROM
							  jabatan_jenjangs a
							LEFT JOIN `jabatans` b
							ON a.`jabatan_kode`= b.kode
							WHERE a.`no`='$jabatan_usulan_no'")->row();
		$inisial = $queryinisial->inisial;

		return $inisial;
	}

	function get_operator($pic_ptk)
	{
		$getop = $this->db->query("select * from users WHERE no='$pic_ptk'")->row();
		$nama = $getop->nama;

		return $nama;
	}

	function get_a_lama($usulan_no)
	{
		$get_alama = $this->db->query("SELECT
  SUM(kum_usulan_lama) AS a_lama
FROM
  `usulan_dupaks`
WHERE usulan_no = '$usulan_no'
  AND SUBSTR(dupak_no, 1, 1) = 'A'
  AND dupak_no > 'A0003'
GROUP BY usulan_no")->row();

		$a_lama = $get_alama->a_lama;

		return $a_lama;
	}

	function get_b_lama($usulan_no)
	{
		$get_blama = $this->db->query("SELECT
  SUM(kum_usulan_lama) AS b_lama
FROM
  `usulan_dupaks`
WHERE usulan_no = '$usulan_no'
  AND SUBSTR(dupak_no, 1, 1) = 'B'
GROUP BY usulan_no")->row();

		$b_lama = $get_blama->b_lama;

		return $b_lama;
	}

	function get_c_lama($usulan_no)
	{
		$get_clama = $this->db->query("SELECT
  SUM(kum_usulan_lama) AS c_lama
FROM
  `usulan_dupaks`
WHERE usulan_no = '$usulan_no'
  AND SUBSTR(dupak_no, 1, 1) = 'C'
GROUP BY usulan_no")->row();

		$c_lama = $get_clama->c_lama;

		return $c_lama;
	}

	function get_d_lama($usulan_no)
	{
		$get_dlama = $this->db->query("SELECT
  SUM(kum_usulan_lama) AS d_lama
FROM
  `usulan_dupaks`
WHERE usulan_no = '$usulan_no'
  AND SUBSTR(dupak_no, 1, 1) = 'D'
GROUP BY usulan_no")->row();

		$d_lama = $get_dlama->d_lama;

		return $d_lama;
	}


	function get_a_baru($usulan_no)
	{
		$get_abaru = $this->db->query("SELECT
  SUM(kum_usulan_baru) AS a_baru
FROM
  `usulan_dupaks`
WHERE usulan_no = '$usulan_no'
  AND SUBSTR(dupak_no, 1, 1) = 'A'
  AND dupak_no > 'A0003'
GROUP BY usulan_no")->row();

		$a_baru = $get_abaru->a_baru;

		return $a_baru;
	}

	function get_b_baru($usulan_no)
	{
		$get_bbaru = $this->db->query("SELECT
  SUM(kum_usulan_baru) AS b_baru
FROM
  `usulan_dupaks`
WHERE usulan_no = '$usulan_no'
  AND SUBSTR(dupak_no, 1, 1) = 'B'
GROUP BY usulan_no")->row();

		$b_baru = $get_bbaru->b_baru;

		return $b_baru;
	}

	function get_c_baru($usulan_no)
	{
		$get_cbaru = $this->db->query("SELECT
  SUM(kum_usulan_baru) AS c_baru
FROM
  `usulan_dupaks`
WHERE usulan_no = '$usulan_no'
  AND SUBSTR(dupak_no, 1, 1) = 'C'
GROUP BY usulan_no")->row();

		$c_baru = $get_cbaru->c_baru;

		return $c_baru;
	}

	function get_d_baru($usulan_no)
	{
		$get_dbaru = $this->db->query("SELECT
  SUM(kum_usulan_baru) AS d_baru
FROM
  `usulan_dupaks`
WHERE usulan_no = '$usulan_no'
  AND SUBSTR(dupak_no, 1, 1) = 'D'
GROUP BY usulan_no")->row();

		$d_baru = $get_dbaru->d_baru;

		return $d_baru;
	}

	function get_nil_ija_lama($usulan_no)
	{
		$qnilaiija = $this->db->query("SELECT
					  a.no,
					  a.jenjang_id_lama,
					  c.`nama_jabatans`,
					  c.`kum`,
					  d.`nama_jenjang`,
					  d.`ak`+10 AS ak_ijazah,
					  c.`pa`,
					  c.`pb`,
					  c.`pc`,
					  c.`pd`
					FROM
					  usulans AS a,
					  `jabatan_jenjangs` AS b,
					  jabatans AS c,
					  jenjangs AS d
					WHERE a.no = '$usulan_no'
					  AND a.jabatan_no = b.`jabatan_kode`
					  AND a.jenjang_id_lama = b.`jenjang_id`
					  AND b.`jabatan_kode` = c.`kode`
					  AND b.`jenjang_id` = d.`id`")->row();

		$kali = $qnilaiija->kum - $qnilaiija->ak_ijazah;

		$pa = $qnilaiija->pa * 0.01 * $kali;
		$pb = $qnilaiija->pb * 0.01 * $kali;
		$pc = $qnilaiija->pc * 0.01 * $kali;
		$pd = $qnilaiija->pd * 0.01 * $kali;
		$jp = $qnilaiija->ak_ijazah + $pa + $pb + $pc + $pd;

		if ($qnilaiija->ak_ijazah == 0) {
			$nilai_ijazah = '';
		} else {
			$nilai_ijazah = $qnilaiija->ak_ijazah;
		}

		$nilai_ijazah = $qnilaiija->ak_ijazah;

		return $nilai_ijazah;
	}

	function get_nil_ija_baru($usulan_no)
	{

		$kum_lama_a1 = 0;
		$kum_baru_a1 = 0;
		$jumlah_a1 = 0;

		$qnilaiija = $this->db->query("SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$usulan_no'
						  AND a.`dupak_kategori_id` = '1'")->result();

		foreach ($qnilaiija as $ijabaru) {
			$kum_lama_a1 += $ijabaru->kum_usulan_lama;
			$kum_baru_a1 += $ijabaru->kum_usulan_baru;
			$jumlah_a1 += $kum_lama_a1 + $kum_baru_a1;
		}
		if ($kum_lama_a1 == 0) {
			$da_bid_a1_lama = '';
		} else {
			$da_bid_a1_lama = $kum_lama_a1;
		}

		if ($kum_baru_a1 == 0) {
			$da_bid_a1_baru = '';
		} else {
			$da_bid_a1_baru = $kum_baru_a1;
		}



		return $da_bid_a1_baru;
	}

	function get_bid_a_baru($usulan_no)
	{

		$kum_lama_a2 = 0;
		$kum_baru_a2 = 0;
		$jumlah_a2 = 0;

		$qbid_abaru = $this->db->query("SELECT
						  *
						FROM
						  dupaks AS a,
						  `usulan_dupaks` AS b
						WHERE b.`dupak_no` = a.`no`
						  AND b.`usulan_no` = '$usulan_no'
						  AND a.`dupak_kategori_id` = '2'")->result();

		foreach ($qbid_abaru as $bid_a_baru) {
			$kum_lama_a2 += $bid_a_baru->kum_usulan_lama;
			$kum_baru_a2 += $bid_a_baru->kum_usulan_baru;
			$jumlah_a2 += $kum_lama_a2 + $kum_baru_a2;
		}


		if ($kum_lama_a2 == 0) {
			$da_bid_a2_lama = '';
		} else {
			$da_bid_a2_lama = $kum_lama_a2;
		}

		if ($kum_baru_a2 == 0) {
			$da_bid_a2_baru = '';
		} else {
			$da_bid_a2_baru = $kum_baru_a2;
		}

		//$da_bid_a2_baru=$da_bid_a2_baru / 100;

		return $da_bid_a2_baru;
	}

	function get_bid_b_baru($usulan_no)
	{

		$jml_kum_lama_bid_b = 0;
		$jml_kum_baru_bid_b = 0;
		$total_bid_b = 0;

		$qbid_bbaru = $this->db->query("select *from usulan_dupaks where  usulan_no='$usulan_no' and left(dupak_no,1)='B'")->result();

		foreach ($qbid_bbaru as $bid_b_baru) {
			$jml_kum_lama_bid_b += $bid_b_baru->kum_usulan_lama;
			$jml_kum_baru_bid_b += $bid_b_baru->kum_usulan_baru;
		}


		$total_bid_b = $jml_kum_lama_bid_b + $jml_kum_baru_bid_b;

		if ($jml_kum_lama_bid_b == 0) {
			$da_bid_b_lama = '';
		} else {
			$da_bid_b_lama = $jml_kum_lama_bid_b;
		}

		if ($jml_kum_baru_bid_b == 0) {
			$da_bid_b_baru = '';
		} else {
			$da_bid_b_baru = $jml_kum_baru_bid_b;
		}

		//$da_bid_b_baru=$da_bid_b_baru / 100;

		return $da_bid_b_baru;
	}

	function get_bid_c_baru($usulan_no)
	{

		$jml_kum_lama_bid_c = 0;
		$jml_kum_baru_bid_c = 0;
		$total_bid_c = 0;

		$qbid_cbaru = $this->db->query("select *from usulan_dupaks where  usulan_no='$usulan_no' and left(dupak_no,1)='C'")->result();

		foreach ($qbid_cbaru as $bid_c_baru) {
			$jml_kum_lama_bid_c += $bid_c_baru->kum_usulan_lama;
			$jml_kum_baru_bid_c += $bid_c_baru->kum_usulan_baru;
		}


		$total_bid_c = $jml_kum_lama_bid_c + $jml_kum_baru_bid_c;

		if ($jml_kum_lama_bid_c == 0) {
			$da_bid_c_lama = '';
		} else {
			$da_bid_c_lama = $jml_kum_lama_bid_c;
		}

		if ($jml_kum_baru_bid_c == 0) {
			$da_bid_c_baru = '';
		} else {
			$da_bid_c_baru = $jml_kum_baru_bid_c;
		}

		//$da_bid_c_baru=$da_bid_c_baru / 100;

		return $da_bid_c_baru;
	}

	function get_bid_d_baru($usulan_no)
	{

		$jml_kum_lama_bid_d = 0;
		$jml_kum_baru_bid_d = 0;
		$total_bid_d = 0;

		$qbid_dbaru = $this->db->query("select *from usulan_dupaks where  usulan_no='$usulan_no' and left(dupak_no,1)='D'")->result();

		foreach ($qbid_dbaru as $bid_d_baru) {
			$jml_kum_lama_bid_d += $bid_d_baru->kum_usulan_lama;
			$jml_kum_baru_bid_d += $bid_d_baru->kum_usulan_baru;
		}


		$total_bid_d = $jml_kum_lama_bid_d + $jml_kum_baru_bid_d;

		if ($jml_kum_lama_bid_d == 0) {
			$da_bid_d_lama = '';
		} else {
			$da_bid_d_lama = $jml_kum_lama_bid_d;
		}

		if ($jml_kum_baru_bid_d == 0) {
			$da_bid_d_baru = '';
		} else {
			$da_bid_d_baru = $jml_kum_baru_bid_d;
		}

		//$da_bid_d_baru=$da_bid_d_baru / 100;

		return $da_bid_d_baru;
	}

	function get_kurang_bid_a($usulan_no)
	{
		$qkurangbid_a = $this->db->query("SELECT
					  a.no,
					  a.jenjang_id_lama,
					  c.`nama_jabatans`,
					  c.`kum`,
					  d.`nama_jenjang`,
					  d.`ak`+10 AS ak_ijazah,
					  c.`pa`,
					  c.`pb`,
					  c.`pc`,
					  c.`pd`
					FROM
					  usulans AS a,
					  `jabatan_jenjangs` AS b,
					  jabatans AS c,
					  jenjangs AS d
					WHERE a.no = '$usulan_no'
					  AND a.jabatan_no = b.`jabatan_kode`
					  AND a.jenjang_id_lama = b.`jenjang_id`
					  AND b.`jabatan_kode` = c.`kode`
					  AND b.`jenjang_id` = d.`id`")->row();

		$kali = ($qkurangbid_a->kum) - ($qkurangbid_a->ak_ijazah);

		$pa = ($qkurangbid_a->pa * 0.01 * $kali) / 100;


		return $pa;
	}

	function get_kurang_bid_b($usulan_no)
	{
		$qkurangbid_b = $this->db->query("SELECT
					  a.no,
					  a.jenjang_id_lama,
					  c.`nama_jabatans`,
					  c.`kum`,
					  d.`nama_jenjang`,
					  d.`ak`+10 AS ak_ijazah,
					  c.`pa`,
					  c.`pb`,
					  c.`pc`,
					  c.`pd`
					FROM
					  usulans AS a,
					  `jabatan_jenjangs` AS b,
					  jabatans AS c,
					  jenjangs AS d
					WHERE a.no = '$usulan_no'
					  AND a.jabatan_no = b.`jabatan_kode`
					  AND a.jenjang_id_lama = b.`jenjang_id`
					  AND b.`jabatan_kode` = c.`kode`
					  AND b.`jenjang_id` = d.`id`")->row();

		$kali = $qkurangbid_b->kum - $qkurangbid_b->ak_ijazah;

		$pb = ($qkurangbid_b->pb * 0.01 * $kali) / 100;

		return $pb;
	}

	function get_kurang_bid_c($usulan_no)
	{
		$qkurangbid_c = $this->db->query("SELECT
					  a.no,
					  a.jenjang_id_lama,
					  c.`nama_jabatans`,
					  c.`kum`,
					  d.`nama_jenjang`,
					  d.`ak`+10 AS ak_ijazah,
					  c.`pa`,
					  c.`pb`,
					  c.`pc`,
					  c.`pd`
					FROM
					  usulans AS a,
					  `jabatan_jenjangs` AS b,
					  jabatans AS c,
					  jenjangs AS d
					WHERE a.no = '$usulan_no'
					  AND a.jabatan_no = b.`jabatan_kode`
					  AND a.jenjang_id_lama = b.`jenjang_id`
					  AND b.`jabatan_kode` = c.`kode`
					  AND b.`jenjang_id` = d.`id`")->row();

		$kali = $qkurangbid_c->kum - $qkurangbid_c->ak_ijazah;

		$pc = ($qkurangbid_c->pc * 0.01 * $kali) / 100;

		return $pc;
	}

	function get_kurang_bid_d($usulan_no)
	{
		$qkurangbid_d = $this->db->query("SELECT
					  a.no,
					  a.jenjang_id_lama,
					  c.`nama_jabatans`,
					  c.`kum`,
					  d.`nama_jenjang`,
					  d.`ak`+10 AS ak_ijazah,
					  c.`pa`,
					  c.`pb`,
					  c.`pc`,
					  c.`pd`
					FROM
					  usulans AS a,
					  `jabatan_jenjangs` AS b,
					  jabatans AS c,
					  jenjangs AS d
					WHERE a.no = '$usulan_no'
					  AND a.jabatan_no = b.`jabatan_kode`
					  AND a.jenjang_id_lama = b.`jenjang_id`
					  AND b.`jabatan_kode` = c.`kode`
					  AND b.`jenjang_id` = d.`id`")->row();

		$kali = $qkurangbid_d->kum - $qkurangbid_d->ak_ijazah;

		$pd = ($qkurangbid_d->pd * 0.01 * $kali) / 100;

		return $pd;
	}

	function count_rwy($no)
	{
		$query2 = $this->db->query("SELECT
 a.`no`,
 b. jenjang_pak AS `nama_jenjang`,
 d.`nama_bidang`,
 b.`tgl_lulus_pak` AS tgl_lulus,
 b.institusi_pak AS `nm_sp_formal`
 FROM dosens a
 LEFT JOIN `rwy_pend_pak` b
 ON a.`no`=b.`no_dosen`
 LEFT JOIN bidang_ilmus d
 ON b.`id_bid_studi`=d.`kode` WHERE a.`no`='$no'");
		return $query2->num_rows();
	}


	function count_matkul($no)
	{
		$query = $this->db->query("SELECT * from usulan_matkuls WHERE usulan_no='$no'");
		return $query->num_rows();
	}

	function get_excel($no)
	{
		ini_set('memory_limit', '256M');
		$tglawal = $this->input->post('tgl_mulai');
		$tglakhir = $this->input->post('tgl_akhir');

		$status = $this->input->post('status');
		//$list=$this->db->query("SELECT * from employee");
		$fileName = 'rekap_data_jad-' . $tglawal . '_sampai_' . $tglakhir;

		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array(
			"no", "operator", "tgl input", "nama dosen", "tmpat lahir", "tgl lahir", "kelamin", "nidn", "nip", "karpeg", "fakultas", "prodi", "kode pt", "nama pt", "nama yayasan", "jenis pimpinan pt (rektor, ketua, dll)", "usia-tahun",
			"usia-bulan", "kd status dsn", "status dosen (dosen tetap yayasan,dll)", "kd pangkat lama", "nama pangkat lama", "tmt pangkat lama", "kd pangkat baru", "nama pangkat baru",
			"tmt pangkat baru", "kd gaji lama", "nilai gaji lama", "terbilang gaji lama", "kd gaji baru", "nilai gaji baru", "terbilang gaji baru", "link nidn", "ijazah 1",
			"bidang ilmu ijazah 1", "kode pt ijazah 1", "pt ijazah 1", "nama pt ijazah 1", "Program Studi Ijazah 1", "tmt lulus ijazah 1", "ijazah 2", "bidang ilmu ijazah 2", "kode pt ijazah 2", "pt ijazah 2", "nama pt ijazah 2",
			"Program Studi ijazah 2", "tmt lulus ijazah 2", "ijazah 3", "bidang ilmu ijazah 3", "kode pt ijazah 3", "pt ijazah 3", "nama pt ijazah 3", "Program Studi Ijazah 3", "tmt lulus ijazah 3", "ijazah 4", "bidang ilmu ijazah 4",
			"kode pt ijazah 4", "pt ijazah 4", "nama pt ijazah 4", "Program Studi Ijazah 4", "tmt lulus ijazah 4", "matkul 1", "matkul 2", "matkul 3", "matkul 4", "kode acc", "acc / tidak acc", "catatan / alasan belum disetujui",
			"kd tim penilai", "nama tim penilai", "kode cetak", "cetak", "tgl penilaian", "tmt hasil", "no rekapan", "tgl rekap", "no PAK", "tgl PAK", "thn PAK",
			"Kode Jab Awal", "Jabatan Awal", "Kum Awal", "TMT Jab Awal", "Ijazah Lama", "Nilai Ijazah Lama", "A_Lama", "B_Lama", "C_Lama", "D_Lama", "Jumlah ABC Lama", "Total ABCD Lama",
			"MS Kerja Tahun", "MS Kerja Bulan", "Kode JAB Usulan", "Jabatan Usulan", "Kum Usulan", "Ijazah Baru", "Nilai Ijazah Baru", "A_Baru", "B_Baru", "C_Baru", "D_baru", "Jumlah ABC Baru", "Total ABCD Baru",
			"MS Kerja Tambahan Tahun", "MS Kerja Tambahan Bulan", "Kd Proses", "Proses JFD", "Awal-Naik Jabatan", "Jumlah Kum Ijazah", "Jumlah A (Lama+Baru)", "Jumlah B (Lama+Baru)", "Jumlah C (Lama+Baru)", "Jumlah D (Lama+Baru)", "Jumlah ABC (Lama+Baru)", "Jumlah ABCD (Lama+Baru)",
			"MS Kerja Baru Tahun", "MS Kerja Baru Bulan", "Kurang_KUM_Selain_Ijazah", "Kurang_Bid_A", "Kurang_Bid_B", "Kurang_Bid_C", "Kurang_Bid_D", "Bid_A_Digunakan", "Bid_B_Digunakan", "Bid_C_Digunakan", "Bid_D_Digunakan", "Jumlah ABC Digunakan", "Jumlah ABCD Digunakan",
			"A Lebihan", "B Lebihan", "PAK Bid A", "PAK Bid B", "PAK Bid C", "PAK Bid D", "PAK Bid Jumlah ABC", "PAK Jumlah ABCD", "Lebih Bidang B", "PAK Lebihan Bidang B", "Bulan Penilaian", "REVISI PAK BIDANG A", "REVISI PAK BIDANG B", "REVISI PAK BIDANG C", "REVISI PAK BIDANG D",
			"REVISI PAK JUMLAH ABC", "REVISI PAK JUMLAH ABCD", "Catatan Lebihan", "Angka Lebihan", "KUM",
			"update tgl", "update wkt"
		);

		$column = 0;

		foreach ($table_columns as $field) {
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$get_data = $this->fetch_data($tglawal, $tglakhir, $status);

		$excel_row = 2;
		$i = 1;
		foreach ($get_data as $row) {
			$usulan_no = $row->usulan_no;
			$dosen_no = $row->dosen_no;
			$matkul_data = $this->get_matkul($usulan_no);
			$matkul_count = $this->count_matkul($usulan_no);
			$rwy_data = $this->get_rwy_pend_formal($dosen_no);
			$rwy_count = $this->count_rwy($dosen_no);
			$jabatan_usul = $this->get_jabatan_usulan($row->jabatan_usulan_no);
			$jenjang_lama = $this->get_ijazah_lama($row->jenjang_id_lama);
			$jenjang_baru = $this->get_ijazah_baru($row->jenjang_id_baru);
			$inisialawal = $row->inisial;
			$inisialbaru = $this->get_inisial_jab_usulan($row->jabatan_usulan_no);
			$operator = $this->get_operator($row->pic_ptk);
			$prosesjfd = $inisialawal . '-' . $inisialbaru;
			$tahunpak = SUBSTR($row->tmt_no, -4, 4);

			if (isset($row->tmt_no)) {
				$tahunpak = SUBSTR($row->tmt_no, -4, 4);
			} else {
				$tahunpak = '';
			}

			if ($inisialawal == 'TP') {
				$awalnaik = 'Diangkat';
			} else {
				$awalnaik = 'Dinaikkan';
			}

			$tglinput = date("d/m/Y", strtotime($row->created_at));
			$nilai_ijazah = $this->get_nil_ija_lama($row->usulan_no);
			$nilai_ijazah_baru = $this->get_nil_ija_baru($row->usulan_no);
			$a_lama = $this->get_a_lama($row->usulan_no);
			$b_lama = $this->get_b_lama($row->usulan_no);
			$c_lama = $this->get_c_lama($row->usulan_no);
			$d_lama = $this->get_d_lama($row->usulan_no);
			$total_abc_lama = $a_lama + $b_lama + $c_lama;
			$total_abcd_lama = $a_lama + $b_lama + $c_lama + $d_lama;
			$a_baru = $this->get_a_baru($row->usulan_no);
			$b_baru = $this->get_b_baru($row->usulan_no);
			$c_baru = $this->get_c_baru($row->usulan_no);
			$d_baru = $this->get_d_baru($row->usulan_no);
			$total_abc = $a_baru + $b_baru + $c_baru;
			$total_abcd = $a_baru + $b_baru + $c_baru + $d_baru;
			$jml_kum_ijazah = $nilai_ijazah + $nilai_ijazah_baru;
			$jml_a = $a_lama + $a_baru;
			$jml_b = $b_lama + $b_baru;
			$jml_c = $c_lama + $c_baru;
			$jml_d = $d_lama + $d_baru;
			$jml_abc = $total_abc_lama + $total_abc;
			$jml_abcd = $total_abcd_lama + $total_abcd;
			$kurangbid_a = 1;
			$kurangbid_b = $this->get_kurang_bid_b($row->usulan_no);
			$kurangbid_c = $this->get_kurang_bid_c($row->usulan_no);
			$kurangbid_d = $this->get_kurang_bid_d($row->usulan_no);
			$bid_a_baru = $this->get_bid_a_baru($row->usulan_no);
			$bid_b_baru = $this->get_bid_b_baru($row->usulan_no);
			$bid_c_baru = $this->get_bid_c_baru($row->usulan_no);
			$bid_d_baru = $this->get_bid_d_baru($row->usulan_no);
			$jml_abc_digunakan = $bid_a_baru + $bid_b_baru + $bid_c_baru;
			$jml_abcd_digunakan = $bid_a_baru + $bid_b_baru + $bid_c_baru + $bid_d_baru;



			$tgllahir = $row->lahir_tgl;
			$pak_tgl = $row->pak_tgl;
			$birthday  = new DateTime($tgllahir);
			if (isset($pak_tgl)) {
				$sekarang = new DateTime($pak_tgl);
			} else {
				$sekarang = new DateTime();
			}
			$usia = $sekarang->diff($birthday);
			$y = $usia->y;
			$m = $usia->m;

			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $i);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $operator);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $tglinput);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->nama);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->lahir_tempat);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->lahir_tgl);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->jk);
			$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->nidn);
			$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->nip);
			$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->karpeg);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->fakultas);
			$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->nama_prodi);
			$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->instansi_kode);
			$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->nama_instansi);
			$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->japim);
			$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $y);
			$object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $m);
			$object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->nama_ikatan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row->nama_gol);
			$object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row->golongan_tgl);
			$object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, $a);
			$u = 33;
			$v = 34;
			$w = 35;
			$x = 36;
			$y = 37;
			$z = 38;
			$z1 = 39;
			foreach ($rwy_data as $rowz) {
				$nmsp = ucfirst(strtolower($rowz->nm_sp_formal));
				$nmbdg = ucfirst(strtolower($rowz->nama_bidang));
				$object->getActiveSheet()->setCellValueByColumnAndRow($u, $excel_row, $rowz->nama_jenjang);
				$object->getActiveSheet()->setCellValueByColumnAndRow($v, $excel_row,  $nmbdg);
				$object->getActiveSheet()->setCellValueByColumnAndRow($w, $excel_row, $rowz->kode_pt);
				$object->getActiveSheet()->setCellValueByColumnAndRow($x, $excel_row, $nmsp);
				$object->getActiveSheet()->setCellValueByColumnAndRow($y, $excel_row, $nmsp);
				$object->getActiveSheet()->setCellValueByColumnAndRow($z, $excel_row, $rowz->nama_prodi);
				$object->getActiveSheet()->setCellValueByColumnAndRow($z1, $excel_row, $rowz->tgl_lulus);

				$u = $u + 7;
				$v = $v + 7;
				$w = $w + 7;
				$x = $x + 7;
				$y = $y + 7;
				$z = $z + 7;
				$z1 = $z1 + 7;
			}
			if ($rwy_count == 0) {
				$object->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(37, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(38, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(39, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(40, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(41, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(42, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(43, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(44, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(45, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(46, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(47, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(48, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(50, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(51, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(52, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(53, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(56, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(57, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(58, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(59, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(60, $excel_row, $a);
			} else if ($rwy_count == 1) {
				$object->getActiveSheet()->setCellValueByColumnAndRow(40, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(41, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(42, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(43, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(44, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(45, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(46, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(47, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(48, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(50, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(51, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(52, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(53, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(56, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(57, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(58, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(59, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(60, $excel_row, $a);
			} else if ($rwy_count == 2) {
				$object->getActiveSheet()->setCellValueByColumnAndRow(47, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(48, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(50, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(51, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(52, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(53, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(56, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(57, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(58, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(59, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(60, $excel_row, $a);
			} else if ($rwy_count == 3) {
				$object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(56, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(57, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(58, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(59, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(60, $excel_row, $a);
			}

			$c = 61;
			foreach ($matkul_data as $rowx) {
				$mtk = ucfirst(strtolower($rowx->mtk));
				$object->getActiveSheet()->setCellValueByColumnAndRow($c, $excel_row, $mtk);
				$c++;
			}
			if ($matkul_count == 0) {
				$object->getActiveSheet()->setCellValueByColumnAndRow(61, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(62, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(63, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(64, $excel_row, $a);
			} else if ($matkul_count == 1) {
				$object->getActiveSheet()->setCellValueByColumnAndRow(62, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(63, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(64, $excel_row, $a);
			} else if ($matkul_count == 2) {
				$object->getActiveSheet()->setCellValueByColumnAndRow(63, $excel_row, $a);
				$object->getActiveSheet()->setCellValueByColumnAndRow(64, $excel_row, $a);
			} else if ($matkul_count == 3) {

				$object->getActiveSheet()->setCellValueByColumnAndRow(64, $excel_row, $a);
			}
			/* $object->getActiveSheet()->setCellValueByColumnAndRow(53, $excel_row, $a);
	  $object->getActiveSheet()->setCellValueByColumnAndRow(54, $excel_row, $a);
	  $object->getActiveSheet()->setCellValueByColumnAndRow(55, $excel_row, $a);
	  $object->getActiveSheet()->setCellValueByColumnAndRow(56, $excel_row, $a); */
			$object->getActiveSheet()->setCellValueByColumnAndRow(65, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(66, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(67, $excel_row, $row->user_penilai_keterangan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(68, $excel_row, $row->user_penilai_no);
			$object->getActiveSheet()->setCellValueByColumnAndRow(69, $excel_row, $row->nama_user);
			$object->getActiveSheet()->setCellValueByColumnAndRow(70, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(71, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(72, $excel_row, $row->user_penilai_tgl);
			$object->getActiveSheet()->setCellValueByColumnAndRow(73, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(74, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(75, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(76, $excel_row, $row->tmt_no);
			$object->getActiveSheet()->setCellValueByColumnAndRow(77, $excel_row, $row->pak_tgl);
			$object->getActiveSheet()->setCellValueByColumnAndRow(78, $excel_row, $tahunpak);
			$object->getActiveSheet()->setCellValueByColumnAndRow(79, $excel_row, $row->kode_jab_awal);
			$object->getActiveSheet()->setCellValueByColumnAndRow(80, $excel_row, $row->nama_jabatans);
			$object->getActiveSheet()->setCellValueByColumnAndRow(81, $excel_row, $row->kum);
			$object->getActiveSheet()->setCellValueByColumnAndRow(82, $excel_row, $row->jabatan_tgl);
			$object->getActiveSheet()->setCellValueByColumnAndRow(83, $excel_row, $jenjang_lama);
			$object->getActiveSheet()->setCellValueByColumnAndRow(84, $excel_row, $nilai_ijazah);
			$object->getActiveSheet()->setCellValueByColumnAndRow(85, $excel_row, $a_lama);
			$object->getActiveSheet()->setCellValueByColumnAndRow(86, $excel_row, $b_lama);
			$object->getActiveSheet()->setCellValueByColumnAndRow(87, $excel_row, $c_lama);
			$object->getActiveSheet()->setCellValueByColumnAndRow(88, $excel_row, $d_lama);
			$object->getActiveSheet()->setCellValueByColumnAndRow(89, $excel_row, $total_abc_lama);
			$object->getActiveSheet()->setCellValueByColumnAndRow(90, $excel_row, $total_abcd_lama);
			$object->getActiveSheet()->setCellValueByColumnAndRow(91, $excel_row, $row->lama_tahun_pak);
			$object->getActiveSheet()->setCellValueByColumnAndRow(92, $excel_row, $row->lama_bulan_pak);
			foreach ($jabatan_usul as $rowj) {

				$object->getActiveSheet()->setCellValueByColumnAndRow(93, $excel_row, $rowj->no);
				$object->getActiveSheet()->setCellValueByColumnAndRow(94, $excel_row, $rowj->nama_jabatans);
				$object->getActiveSheet()->setCellValueByColumnAndRow(95, $excel_row, $rowj->kum);
			}
			$object->getActiveSheet()->setCellValueByColumnAndRow(96, $excel_row, $jenjang_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(98, $excel_row, $nilai_ijazah_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(98, $excel_row, $a_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(99, $excel_row, $b_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(100, $excel_row, $c_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(101, $excel_row, $d_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(102, $excel_row, $total_abc);
			$object->getActiveSheet()->setCellValueByColumnAndRow(103, $excel_row, $total_abcd);
			$object->getActiveSheet()->setCellValueByColumnAndRow(104, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(105, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(106, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(107, $excel_row, $prosesjfd);
			$object->getActiveSheet()->setCellValueByColumnAndRow(108, $excel_row, $awalnaik);
			$object->getActiveSheet()->setCellValueByColumnAndRow(109, $excel_row, $jml_kum_ijazah);
			$object->getActiveSheet()->setCellValueByColumnAndRow(110, $excel_row, $jml_a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(111, $excel_row, $jml_b);
			$object->getActiveSheet()->setCellValueByColumnAndRow(112, $excel_row, $jml_c);
			$object->getActiveSheet()->setCellValueByColumnAndRow(113, $excel_row, $jml_d);
			$object->getActiveSheet()->setCellValueByColumnAndRow(114, $excel_row, $jml_abc);
			$object->getActiveSheet()->setCellValueByColumnAndRow(115, $excel_row, $jml_abcd);
			$object->getActiveSheet()->setCellValueByColumnAndRow(116, $excel_row, $row->baru_tahun_pak);
			$object->getActiveSheet()->setCellValueByColumnAndRow(117, $excel_row, $row->baru_bulan_pak);
			if ($row->kode_jab_awal == '1') {
				$kurang_kum_selain_ijazah = 10;
			} else {
				$kurang_kum_selain_ijazah = $rowj->kum - $nilai_ijazah;
			}

			$object->getActiveSheet()->setCellValueByColumnAndRow(118, $excel_row, $kurang_kum_selain_ijazah);
			$object->getActiveSheet()->setCellValueByColumnAndRow(119, $excel_row, $kurangbid_a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(120, $excel_row, $kurangbid_b);
			$object->getActiveSheet()->setCellValueByColumnAndRow(121, $excel_row, $kurangbid_c);
			$object->getActiveSheet()->setCellValueByColumnAndRow(122, $excel_row, $kurangbid_d);
			$object->getActiveSheet()->setCellValueByColumnAndRow(123, $excel_row, $bid_a_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(124, $excel_row, $bid_b_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(125, $excel_row, $bid_c_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(126, $excel_row, $bid_d_baru);
			$object->getActiveSheet()->setCellValueByColumnAndRow(127, $excel_row, $jml_abc_digunakan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(128, $excel_row, $jml_abcd_digunakan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(129, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(130, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(131, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(132, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(133, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(134, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(135, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(136, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(137, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(138, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(139, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(140, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(141, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(142, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(143, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(144, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(145, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(146, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(147, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(148, $excel_row, $a);
			$object->getActiveSheet()->setCellValueByColumnAndRow(149, $excel_row, $a);





			$excel_row++;
			$i++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $fileName . '.xls"');
		$object_writer->save('php://output');
	}
}
