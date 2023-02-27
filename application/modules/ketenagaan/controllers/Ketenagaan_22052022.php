<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Ketenagaan extends MX_Controller
{


	function __construct()
	{

		//$this->load->helper('date_helper');
		$this->load->helper(array('url', 'download', 'date_helper', 'form'));
		if ($this->session->userdata('status') != "login") {
			redirect(base_url() . 'login/login?pesan=belumlogin');
		}
	}


	function __destruct()
	{
	}

	public function data_dosen()
	{
		vusulan('tambah_dosen');
	}

	function tampil_data_dosen_all()
	{
		$draw = $_REQUEST['draw'];
		$username = $this->session->userdata('username');
		$role = $this->session->userdata('role');

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length = $_REQUEST['length'];
		$start = $_REQUEST['start'];
		$search = $_REQUEST['search']["value"];

		$cek = $this->db->query("SELECT count(*) AS jml from v_dosen_user")->row();

		$output = array();
		$output['draw'] = $draw;
		$output['recordsTotal'] = $output['recordsFiltered'] = $cek->jml;
		$output['data'] = array();

		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}

		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}

		$valid_columns = array(
			1 => 'nidn',
			2 => 'nama',
			3 => 'homebase',
			4 => 'prodi',
			5 => 'golongan',
			6 => 'jabatan',
		);

		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}

		if ($order != null) {
			$this->db->order_by($order, $dir);
		}

		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length, $start);

		$this->db->order_by('nama', 'ASC');
		$this->db->select('*');
		$this->db->from('v_dosen_user');
		$query = $this->db->get();


		if ($search != "") {
			$query = $this->db->query("SELECT
									  *
									FROM
									v_dosen_user
									WHERE nidn LIKE '%$search%'
									  OR nama LIKE '%$search%'
									  OR `nama_jabatans` LIKE '%$search%'
									  OR `nama_instansi` LIKE '%$search%'
									  OR `instansi_kode` LIKE '%$search%'
									  OR `nama_gol` LIKE '%$search%'");

			$output['recordsTotal'] = $output['recordsFiltered'] = $query->num_rows();
		}

		foreach ($query->result_array() as $ase) {
			$output['data'][] = array(
				$ase['nidn'],
				$ase['nama'],
				$ase['nama_instansi'] . ' (' . $ase['instansi_kode'] . ')',
				$ase['nama_prodi'],
				$ase['nama_gol'] . ' (' . $ase['kode_gol'] . ')',
				$ase['nama_jabatans'] . ' (' . $ase['kum'] . ')',
			);
		}
		echo json_encode($output);
	}

	public function tampil_data_dosen()
	{
		$this->db2 = $this->load->database('db2', TRUE);
		$nidn_dos		= $this->input->post('nidn');

		$sql = $this->db2->query("SELECT DISTINCT
									s.id_sdm AS NO,
									s.nip,
									s.nidn,
									'' nidk,
									no_serdik,
									'' karpeg,
									s.nm_sdm AS nama,
									'' gelar_depan,
									'' gelar_belakang,
									j.id_jenjang_tertinggi AS jenjang_id,
									j.id_bid_studi AS bidang_ilmu_kode,
									r.id_ikatan_kerja AS ikatan_kerja_kode,
									s.tmt_sk_angkat AS pengangkatan_tgl,
									id_gol_tertinggi AS golongan_kode,
									tmt_sk_pangkat AS golongan_tgl,
									id_jabfung_tertinggi AS jabatan_no,
									tmt_sk_jabfung AS jabatan_tgl,
									pf.id_sms AS prodi_kode,
									s.tgl_lahir AS lahir_tgl,
									s.tmpt_lahir AS lahir_tempat,
									s.jk AS jk,
									s.id_stat_aktif AS aktif,
									s.nik AS nik,
									s.npwp AS npwp,
									s.no_hp AS no_hp,
									g.masa_kerja_gol_thn,
									g.masa_kerja_gol_bln,
									pf.nm_fakultas
								FROM
									sdm s
									INNER JOIN reg_ptk r ON s.id_sdm = r.id_sdm AND r.soft_delete = 0
									INNER JOIN keaktifan_ptk k ON r.id_reg_ptk = k.id_reg_ptk AND k.a_sp_homebase = '1'  AND 
									id_thn_ajaran='2021'
									LEFT JOIN satuan_pendidikan p ON r.id_sp = p.id_sp AND p.soft_delete = 0 AND p.stat_sp = 'A'

									LEFT JOIN (
										SELECT
											MAX( a.id_sdm ) AS id_sdm,
											MAX( m.id_jenj_didik ) AS id_jenjang_tertinggi,
											MAX( m.id_bid_studi ) AS id_bid_studi 
										FROM
											sdm a
											JOIN rwy_pend_formal m ON a.id_sdm = m.id_sdm 
										GROUP BY
											m.id_sdm 
									) j ON j.id_sdm = s.id_sdm 

									LEFT JOIN (
											SELECT 
												(id_pangkat_gol ) AS id_gol_tertinggi,
												(tmt_sk_pangkat ) AS tmt_sk_pangkat,
												id_sdm,
												(masa_kerja_gol_thn ) AS masa_kerja_gol_thn,
												(masa_kerja_gol_bln ) AS masa_kerja_gol_bln 
											FROM
												rwy_kepangkatan 
											WHERE
												soft_delete = 0 
												AND id_pangkat_gol <> 99 
												AND LEFT ( tmt_sk_pangkat, 4 ) <> '1970' 
												AND id_sdm = (select id_sdm from sdm where nidn='$nidn_dos') 
												AND id_pangkat_gol = (SELECT MAX(id_pangkat_gol) FROM rwy_kepangkatan WHERE id_sdm = (select id_sdm from sdm where nidn='$nidn_dos') AND id_pangkat_gol <> 99 )
										) g ON g.id_sdm = s.id_sdm 

									LEFT JOIN (
										SELECT 
											MAX( id_jabfung ) AS id_jabfung_tertinggi, 
											MAX( tmt_sk_jabfung ) AS tmt_sk_jabfung,  
											id_sdm 
										FROM rwy_fungsional 
										WHERE 
											soft_delete = 0 
										GROUP BY id_sdm
										) jf ON jf.id_sdm = s.id_sdm

									LEFT JOIN(
										SELECT
										MAX(rser.id_sdm) AS id_sdm,
										MAX(rser.nrg) AS no_serdik,
										MAX(rser.id_bid_studi) AS id_bid_studi
									FROM
										sdm ser
										JOIN rwy_sertifikasi rser ON ser.id_sdm= rser.id_sdm
										where
										rser.nrg is not null
										AND rser.soft_delete='0'
										AND rser.id_jns_sert='1'
										GROUP BY rser.id_sdm
									) ns ON ns.id_sdm=s.id_sdm

									LEFT JOIN(
											SELECT
											MAX(af.id_sdm)AS id_sdm,
											MAX(bf.id_sms) AS id_sms,
											MAX(nm_fakultas) AS nm_fakultas 
										FROM
											sdm af
											JOIN reg_ptk bf ON af.id_sdm = bf.id_sdm
											JOIN sms cf ON bf.id_sms = cf.id_sms
											JOIN keaktifan_ptk df ON bf.id_reg_ptk = df.id_reg_ptk
											JOIN satuan_pendidikan ef ON cf.id_sp = ef.id_sp
											LEFT JOIN ( SELECT id_sms, nm_lemb AS nm_fakultas FROM sms ) ff ON ff.id_sms = cf.id_induk_sms 
										WHERE
											bf.soft_delete = '0' 
											AND af.soft_delete = '0' 
											AND df.a_sp_homebase = '1' 
											AND df.id_thn_ajaran = '2021' 
											AND LEFT(ef.npsn,2)='03'
										GROUP BY af.id_sdm
									)pf ON pf.id_sdm=s.id_sdm
								WHERE s.soft_delete = '0' 
									AND k.soft_delete = '0' 
									AND k.id_thn_ajaran IN ( '2021' ) 
									AND LEFT ( p.npsn, 2 ) = '03'
									AND s.nidn='$nidn_dos'")->row();

		//cari PRODIS & FAKULTAS DI MIRROR
		$sql2 = $this->db2->query("SELECT TOP 1
								a.id_sdm AS id_sdm,
								a.nidn AS nidn,
								a.nm_sdm AS nm_sdm,
								b.id_sms AS id_sms,
								c.nm_lemb AS nm_lemb,
								e.npsn AS instansi_kode,
								e.nm_lemb AS instansi,
								c.id_induk_sms AS id_induk_sms,
								nm_fakultas AS nm_fakultas,
								c.kode_prodi AS prodi_kode,
								c.id_jenj_didik AS jenjang_id,
								'1' AS aktif 
							FROM
								sdm a
								JOIN reg_ptk b ON a.id_sdm = b.id_sdm
								JOIN sms c ON b.id_sms = c.id_sms
								JOIN keaktifan_ptk d ON b.id_reg_ptk = d.id_reg_ptk
								JOIN satuan_pendidikan e ON c.id_sp = e.id_sp
								LEFT JOIN ( SELECT id_sms, nm_lemb AS nm_fakultas FROM sms ) f ON f.id_sms = c.id_induk_sms 
							WHERE b.soft_delete = '0' 
								AND a.soft_delete = '0' 
								AND d.a_sp_homebase = '1' 
								AND d.id_thn_ajaran = '2021' 
								AND LEFT(e.npsn,2)='03'
								AND a.nidn='$nidn_dos'
								ORDER BY d.last_update DESC ")->row();


		//cari Pangkat dan Golongan
		$sql3 = $this->db->query("SELECT * FROM golongans WHERE kode='$sql->golongan_kode'")->row();

		//cari Jabatans
		$sql4 = $this->db->query("SELECT * FROM jabatans WHERE kode='$sql->jabatan_no'")->row();

		//cari Ikatan Kerja
		$sql5 = $this->db->query("SELECT * FROM ikatan_kerjas WHERE kode='$sql->ikatan_kerja_kode'")->row();

		//cari rwy pendidikan
		$pend = $this->db2->query("SELECT
									a.*,
									b.nm_jenj_didik,
									c.nm_bid_studi 
								FROM
									v_new_rwy_pend_formal a
									LEFT JOIN ref.jenjang_pendidikan b ON a.id_jenj_didik= b.id_jenj_didik
									LEFT JOIN ref.bidang_studi c ON a.id_bid_studi= c.id_bid_studi 
								WHERE
									a.nidn= '$nidn_dos'")->result();

		//cari rwy pengajaran
		$ajar = $this->db2->query("SELECT * FROM v_cari_ajar_dosen_all WHERE NIDN='$nidn_dos' ORDER BY SEMESTER ASC")->result();

		if ($sql->nidn <> '') {
			$data['sql']		= $sql;
			$data['sql2']		= $sql2;
			$data['dagol']		= $sql3;
			$data['dajab']		= $sql4;
			$data['daikatan']	= $sql5;
			$data['pend']		= $pend;
			$data['ajar']		= $ajar;
		} else {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect(base_url() . 'ketenagaan/ketenagaan/data_dosen');
		}

		vusulan('tampil_data_dosen', $data);
	}

	function update_data_dosen()
	{
		$this->db2 = $this->load->database('db2', TRUE);
		$nidn_dos		= $this->input->post('nidn');

		$sql = $this->db2->query("SELECT DISTINCT
									s.id_sdm AS NO,
									s.nip,
									s.nidn,
									'' nidk,
									no_serdik,
									'' karpeg,
									s.nm_sdm AS nama,
									'' gelar_depan,
									'' gelar_belakang,
									j.id_jenjang_tertinggi AS jenjang_id,
									j.id_bid_studi AS bidang_ilmu_kode,
									r.id_ikatan_kerja AS ikatan_kerja_kode,
									s.tmt_sk_angkat AS pengangkatan_tgl,
									id_gol_tertinggi AS golongan_kode,
									tmt_sk_pangkat AS golongan_tgl,
									id_jabfung_tertinggi AS jabatan_no,
									tmt_sk_jabfung AS jabatan_tgl,
									pf.id_sms AS prodi_kode,
									s.tgl_lahir AS lahir_tgl,
									s.tmpt_lahir AS lahir_tempat,
									s.jk AS jk,
									s.id_stat_aktif AS aktif,
									s.nik AS nik,
									s.npwp AS npwp,
									s.no_hp AS no_hp,
									g.masa_kerja_gol_thn,
									g.masa_kerja_gol_bln,
									pf.nm_fakultas
								FROM
									sdm s
									INNER JOIN reg_ptk r ON s.id_sdm = r.id_sdm AND r.soft_delete = 0
									INNER JOIN keaktifan_ptk k ON r.id_reg_ptk = k.id_reg_ptk AND k.a_sp_homebase = '1'  AND 
									id_thn_ajaran='2021'
									LEFT JOIN satuan_pendidikan p ON r.id_sp = p.id_sp AND p.soft_delete = 0 AND p.stat_sp = 'A'

									LEFT JOIN (
										SELECT
											MAX( a.id_sdm ) AS id_sdm,
											MAX( m.id_jenj_didik ) AS id_jenjang_tertinggi,
											MAX( m.id_bid_studi ) AS id_bid_studi 
										FROM
											sdm a
											JOIN rwy_pend_formal m ON a.id_sdm = m.id_sdm 
										GROUP BY
											m.id_sdm 
									) j ON j.id_sdm = s.id_sdm 

									LEFT JOIN (
											SELECT 
												(id_pangkat_gol ) AS id_gol_tertinggi,
												(tmt_sk_pangkat ) AS tmt_sk_pangkat,
												id_sdm,
												(masa_kerja_gol_thn ) AS masa_kerja_gol_thn,
												(masa_kerja_gol_bln ) AS masa_kerja_gol_bln 
											FROM
												rwy_kepangkatan 
											WHERE
												soft_delete = 0 
												AND id_pangkat_gol <> 99 
												AND LEFT ( tmt_sk_pangkat, 4 ) <> '1970' 
												AND id_sdm = (select id_sdm from sdm where nidn='$nidn_dos') 
												AND id_pangkat_gol = (SELECT MAX(id_pangkat_gol) FROM rwy_kepangkatan WHERE id_sdm = (select id_sdm from sdm where nidn='$nidn_dos') AND id_pangkat_gol <> 99 )
										) g ON g.id_sdm = s.id_sdm 

									LEFT JOIN (
										SELECT 
											MAX( id_jabfung ) AS id_jabfung_tertinggi, 
											MAX( tmt_sk_jabfung ) AS tmt_sk_jabfung,  
											id_sdm 
										FROM rwy_fungsional 
										WHERE 
											soft_delete = 0 
										GROUP BY id_sdm
										) jf ON jf.id_sdm = s.id_sdm

									LEFT JOIN(
										SELECT
										MAX(rser.id_sdm) AS id_sdm,
										MAX(rser.nrg) AS no_serdik,
										MAX(rser.id_bid_studi) AS id_bid_studi
									FROM
										sdm ser
										JOIN rwy_sertifikasi rser ON ser.id_sdm= rser.id_sdm
										where
										rser.nrg is not null
										AND rser.soft_delete='0'
										AND rser.id_jns_sert='1'
										GROUP BY rser.id_sdm
									) ns ON ns.id_sdm=s.id_sdm

									LEFT JOIN(
											SELECT
											MAX(af.id_sdm)AS id_sdm,
											MAX(bf.id_sms) AS id_sms,
											MAX(nm_fakultas) AS nm_fakultas 
										FROM
											sdm af
											JOIN reg_ptk bf ON af.id_sdm = bf.id_sdm
											JOIN sms cf ON bf.id_sms = cf.id_sms
											JOIN keaktifan_ptk df ON bf.id_reg_ptk = df.id_reg_ptk
											JOIN satuan_pendidikan ef ON cf.id_sp = ef.id_sp
											LEFT JOIN ( SELECT id_sms, nm_lemb AS nm_fakultas FROM sms ) ff ON ff.id_sms = cf.id_induk_sms 
										WHERE
											bf.soft_delete = '0' 
											AND af.soft_delete = '0' 
											AND df.a_sp_homebase = '1' 
											AND df.id_thn_ajaran = '2021' 
											AND LEFT(ef.npsn,2)='03'
										GROUP BY af.id_sdm
									)pf ON pf.id_sdm=s.id_sdm
								WHERE s.soft_delete = '0' 
									AND k.soft_delete = '0' 
									AND k.id_thn_ajaran IN ( '2021' ) 
									AND LEFT ( p.npsn, 2 ) = '03'
									AND s.nidn='$nidn_dos'")->row();

		//cari PRODIS & FAKULTAS DI MIRROR
		$sql2 = $this->db2->query("SELECT TOP 1
								a.id_sdm AS id_sdm,
								a.nidn AS nidn,
								a.nm_sdm AS nm_sdm,
								b.id_sms AS id_sms,
								c.nm_lemb AS nm_lemb,
								e.npsn AS instansi_kode,
								e.nm_lemb AS instansi,
								c.id_induk_sms AS id_induk_sms,
								nm_fakultas AS nm_fakultas,
								c.kode_prodi AS prodi_kode,
								c.id_jenj_didik AS jenjang_id,
								'1' AS aktif 
							FROM
								sdm a
								JOIN reg_ptk b ON a.id_sdm = b.id_sdm
								JOIN sms c ON b.id_sms = c.id_sms
								JOIN keaktifan_ptk d ON b.id_reg_ptk = d.id_reg_ptk
								JOIN satuan_pendidikan e ON c.id_sp = e.id_sp
								LEFT JOIN ( SELECT id_sms, nm_lemb AS nm_fakultas FROM sms ) f ON f.id_sms = c.id_induk_sms 
							WHERE b.soft_delete = '0' 
								AND a.soft_delete = '0' 
								AND d.a_sp_homebase = '1' 
								AND d.id_thn_ajaran = '2021' 
								AND LEFT(e.npsn,2)='03'
								AND a.nidn='$nidn_dos'
								ORDER BY d.last_update DESC ")->row();

		//update prodi kode ke table dosens
		$up = $this->db->query("UPDATE `dosens` SET `prodi_kode`='$sql2->id_sms' WHERE `nidn`='$nidn_dos'");

		$this->db->query("REPLACE INTO `prodis` (
								`kode`,
								`prodi_kode`,
								`instansi_kode`,
								`nama_prodi`,
								`jenjang_id`,
								`aktif`,
								create_at,
								update_at
							)
							VALUES
								(
								'$sql2->id_sms',
								'$sql2->prodi_kode',
								'$sql2->instansi_kode',
								'$sql2->nm_lemb',
								'$sql2->jenjang_id',
								'1',
								'0000-00-00',
								'0000-00-00'
								);
							");

		//Update homebase pada table user
		$this->db->query("UPDATE users SET 
							instansi_kode	='$sql2->instansi_kode',
							aktif			='1',
							password		=md5('$nidn_dos'),
							password_64		=''
							WHERE username='$nidn_dos' AND role_id='3'");

		if ($up) {
			$this->session->set_flashdata('flash', 'diupdate');
			redirect(base_url() . 'ketenagaan/ketenagaan/data_dosen');
		} else {
			$this->session->set_flashdata('error', 'Gagal diupdate');
			redirect(base_url() . 'ketenagaan/ketenagaan/data_dosen');
		}
	}

	function anti_xss($source)
	{
		$f = stripslashes(strip_tags(htmlspecialchars($source, ENT_QUOTES)));
		return $f;
	}
	function usulanbaru()
	{

		$data['filter'] = '3';

		$data['judul'] = 'Usulan Baru';
		Vusulan('Beranda', $data);
	}
	function usulanbaru2()
	{

		$data['filter'] = '3';

		$data['judul'] = 'Usulan Baru';
		Vusulan('Beranda2', $data);
	}
	function approval_penilai()
	{

		$data['filter'] = '4';
		$data['judul'] = 'Proses Approval Tim Penilai';
		Vusulan('Beranda', $data);
	}

	function proses_nilai()
	{
		$hasil = $this->db->query("SELECT * FROM v_usulans_penilaian WHERE usulan_status_id='5' ORDER BY `batas_penilaian_tgl` ASC");
		$data['hasil'] = $hasil;
		Vusulan('v_penilaian', $data);
	}

	function pending_nilai()
	{
		$hasil = $this->db->query("SELECT * FROM v_usulans_penilaian WHERE usulan_status_id='12'");
		$data['hasil'] = $hasil;
		Vusulan('v_pending_nilai', $data);
	}

	function proses_ketenagaan()
	{

		$data['filter'] = '6';
		$data['judul'] = 'Proses Operator Sub PTK';
		Vusulan('Beranda', $data);
	}

	function proses_dikti()
	{

		$data['filter'] = '7';
		$data['judul'] = 'Proses Dikti';
		Vusulan('Beranda', $data);
	}
	function proses_kepegawaian()
	{

		$data['filter'] = '8';
		$data['judul'] = 'Proses Operator Sub HKT';
		Vusulan('Beranda', $data);
	}
	function proses_selesai()
	{

		$data['filter'] = '9';
		$data['judul'] = 'Selesai';
		Vusulan('Beranda', $data);
	}
	function proses_ke_dikti()
	{

		$data['filter'] = '11';
		$data['judul'] = 'Proses Ke Dikti';
		Vusulan('Beranda', $data);
	}
	function validasi_persyaratan()
	{

		$data['filter'] = '13';
		$data['judul'] = 'Validasi Persyaratan Administrasi';
		Vusulan('Beranda', $data);
	}
	function validasi_pak()
	{

		$data['filter'] = '14';
		$data['judul'] = 'Validasi PAK';
		Vusulan('Beranda', $data);
	}
	function ralat_pak()
	{

		$data['filter'] = '15';
		$data['judul'] = 'Revisi PAK';
		Vusulan('Beranda', $data);
	}
	function tampil_golongan()
	{
		$query = "
		SELECT *from golongans order by nama asc
		";
		return $this->db->query($query);
	}
	function tampil_jabat()
	{
		$query = "
		SELECT *from reff_japim
		";
		return $this->db->query($query);
	}
	function tampil_japim()
	{
		$query = "
		  SELECT * from reff_japim
		  ";
		return $this->db->query($query);
	}
	function tampil_jenjang()
	{
		$query = "
		select * from
		jenjangs where id in ('30','32','35','37','40')
		";
		return $this->db->query($query);
	}
	function tampil_bidang()
	{
		$query = "
		select * from
		bidang_ilmus
		order by nama_bidang asc";
		return $this->db->query($query);
	}
	function tampil_jabatan()
	{
		$query = "
		select * from
		jabatan_jenjangs as a,
		jabatans as b,
		jenjangs as c
		where
		a.jabatan_kode=b.kode
		and a.jenjang_id=c.id
		order by b.kode asc
		";
		return $this->db->query($query);
	}

	function tampil_jabatan_jenjang($jabatan_akhir_no)
	{
		$query = "SELECT
				  a.no,
				  a.jabatan_akhir_no,
				  a.jabatan_usulan_no,
				  c.nama_jabatans,
				  c.kum,
				  d.nama_jenjang
				FROM
				  jabatan_syarats AS a,
				  jabatan_jenjangs AS b,
				  jabatans AS c,
				  jenjangs AS d
				WHERE a.jabatan_usulan_no = b.no
				  AND b.jabatan_kode = c.kode
				  AND b.jenjang_id = d.id
				  AND a.jabatan_akhir_no = '$jabatan_akhir_no'";
		return $this->db->query($query);
	}

	function show($no)
	{

		$data_dasar = $this->db->query("SELECT a.*, d.`nidn`, d.pengangkatan_tgl, d.`nidk`, d.`nip`, d.`karpeg`, d.`nama` AS nm_dosen, d.`gelar_depan`, d.`gelar_belakang`, e.`nama_ikatan` AS nm_ikadin, b.`instansi_kode` AS kd_pt, c.`nama_instansi` AS nm_pt, b.`prodi_kode` AS kd_prodi, b.`nama_prodi` AS nm_prodi, d.`lahir_tempat`, d.`lahir_tgl`, d.`jk`, d.`golongan_kode`, d.`golongan_tgl`, d.`jabatan_no`, d.`jabatan_tgl`, d.`jenjang_id`, d.`jabatan_no` AS jad_akhir, d.jabatan_tgl, d.golongan_kode, d.golongan_tgl, d.bidang_ilmu_kode, f.`nama_jenjang` FROM usulans AS a, dosens AS d, prodis AS b, `instansis` AS c, `ikatan_kerjas` AS e, `jenjangs` AS f
		WHERE a.dosen_no = d.no AND d.prodi_kode = b.kode AND b.instansi_kode = c.kode AND d.`ikatan_kerja_kode` = e.`kode` AND d.`jenjang_id` = f.`id` AND a.no = '$no'")->row();
		$jabatan_akhir_no = $data_dasar->jabatan_akhir_no;
		$kd_bid = $data_dasar->bidang_ilmu_kode;
		$kd_jab = $data_dasar->pimpinan_jabatan;
		$kd_kap_jab = $data_dasar->kaprodi_jabatan;
		$q_bidil_jad = $this->db->query("SELECT * from bidang_ilmus where kode='$kd_bid'")->row();
		$q_jabatan = $this->db->query("SELECT * from reff_japim where id='$kd_jab'")->row();
		$q_kap_jabatan = $this->db->query("SELECT * from reff_japim where id='$kd_kap_jab'")->row();
		$kd_golongan = $data_dasar->golongan_kode;
		$kd_gol_pimpinan = $data_dasar->pimpinan_golongan_kode;
		$kaprodi_golongan_kode = $data_dasar->kaprodi_golongan_kode;
		$q_golongan = $this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		//$q_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		$q_pimpinan_golongan = $this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kd_gol_pimpinan' ")->row();
		$q_kaprodi_golongan = $this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kaprodi_golongan_kode' ")->row();
		$sts_usulan = $data_dasar->usulan_status_id;
		$q_stat = $this->db->query("select * from usulan_statuses where id='$sts_usulan' ")->row();
		$status = $q_stat->nama_status;
		if (isset($data_dasar->jad_akhir)) {
			$no_jad_akhir = $data_dasar->jad_akhir;
		} else {
			$no_jad_akhir = '31';
		}
		$q_jad_akhir = $this->db->query("SELECT a.`no`, a.`jabatan_kode`, a.`jenjang_id`, b.`nama_jabatans` AS nm_jabatan, c.`nama_jenjang` AS nm_jenjang, b.kum FROM `jabatan_jenjangs` a JOIN `jabatans` b ON a.`jabatan_kode` = b.`kode` JOIN `jenjangs` c ON a.`jenjang_id` = c.`id` WHERE a.`jabatan_kode` = '$no_jad_akhir'")->row();

		$nm_jad_akhir = $q_jad_akhir->nm_jabatan;
		$jen_jad_akhir = $q_jad_akhir->nm_jenjang;
		$kum_jad_akhir = $q_jad_akhir->kum;
		$jad_akhir = $nm_jad_akhir . ' ' . $kum_jad_akhir . ' (' . $jen_jad_akhir . ')';
		$no_jfa_usulan = $data_dasar->jabatan_usulan_no;
		$no_jad_usulan = $this->get_usulan_jad($no_jfa_usulan);
		$data_usulans = $this->db->query("SELECT * from usulans where no='$no'")->row();
		$usulan_status_id = $data_usulans->usulan_status_id;

		$penilai = $data_dasar->user_penilai_no;
		$no_jenjang_lama = $data_dasar->jenjang_id_lama;
		$jenjang_lama = $this->get_jenjang_id($no_jenjang_lama);

		$data['jenjang_lama_id'] = $jenjang_lama;
		$data['penilai'] = $this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`no`='$penilai'")->row();
		$data['caripenilai'] = $this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`role_id`='5'");

		$data['jabatan_akhir_no'] = $jabatan_akhir_no;
		$data['jabatan_jenjang'] = $this->tampil_jabatan_jenjang($jabatan_akhir_no);
		$data['usulan_status_id'] = $usulan_status_id;
		$data['nm_gol'] = $q_golongan;
		$data['nm_pimpinan_gol'] = $q_pimpinan_golongan;
		$data['nm_kaprodi_gol'] = $q_kaprodi_golongan;
		$data['jad_akhir'] = $jad_akhir;
		$data['nm_jen_akhir'] = $jen_jad_akhir;
		$data['bidil_jad'] = $q_bidil_jad;
		$data['jad_usulan'] = $no_jad_usulan;
		$data['data_dasar'] = $data_dasar;
		$data['q_jabatan'] = $q_jabatan;
		$data['q_kap_jabatan'] = $q_kap_jabatan;
		$data['judul'] = $status;

		//$data['jabatan_no'] = $jabatan_no;
		$data['golongan'] = $this->tampil_golongan();
		$data['jabatan'] = $this->tampil_jabat();
		$data['status_id'] = $this->statusUsulan($sts_usulan);

		Vusulan('Show', $data);
	}
	function get_jenjang_id($no_jenjang_lama)
	{
		$q_jenjang = $this->db->query("SELECT nama_jenjang from jenjangs WHERE `id`='$no_jenjang_lama'")->row();
		$jenjang_lama_id = $q_jenjang->nama_jenjang;
		return $jenjang_lama_id;
	}
	function show2($no)
	{

		$data_dasar = $this->db->query("SELECT a.*, d.`nidn`, d.pengangkatan_tgl, d.`nidk`, d.`nip`, d.`karpeg`, d.`nama` AS nm_dosen, d.`gelar_depan`, d.`gelar_belakang`, e.`nama_ikatan` AS nm_ikadin, b.`instansi_kode` AS kd_pt, c.`nama_instansi` AS nm_pt, b.`prodi_kode` AS kd_prodi, b.`nama_prodi` AS nm_prodi, d.`lahir_tempat`, d.`lahir_tgl`, d.`jk`, d.`golongan_kode`, d.`golongan_tgl`, d.`jabatan_no`, d.`jabatan_tgl`, d.`jenjang_id`, d.`jabatan_no` AS jad_akhir, d.jabatan_tgl, d.golongan_kode, d.golongan_tgl, d.bidang_ilmu_kode, f.`nama_jenjang` FROM usulans AS a, dosens AS d, prodis AS b, `instansis` AS c, `ikatan_kerjas` AS e, `jenjangs` AS f
		WHERE a.dosen_no = d.no AND d.prodi_kode = b.kode AND b.instansi_kode = c.kode AND d.`ikatan_kerja_kode` = e.`kode` AND d.`jenjang_id` = f.`id` AND a.no = '$no'")->row();
		$jabatan_akhir_no = $data_dasar->jabatan_akhir_no;
		$kd_bid = $data_dasar->bidang_ilmu_kode;
		$kd_jab = $data_dasar->pimpinan_jabatan;
		$kd_kap_jab = $data_dasar->kaprodi_jabatan;
		$q_bidil_jad = $this->db->query("SELECT * from bidang_ilmus where kode='$kd_bid'")->row();
		$q_jabatan = $this->db->query("SELECT * from reff_japim where id='$kd_jab'")->row();
		$q_kap_jabatan = $this->db->query("SELECT * from reff_japim where id='$kd_kap_jab'")->row();
		$kd_golongan = $data_dasar->golongan_kode;
		$kd_gol_pimpinan = $data_dasar->pimpinan_golongan_kode;
		$kaprodi_golongan_kode = $data_dasar->kaprodi_golongan_kode;
		$q_golongan = $this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		//$q_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		$q_pimpinan_golongan = $this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kd_gol_pimpinan' ")->row();
		$q_kaprodi_golongan = $this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kaprodi_golongan_kode' ")->row();
		$sts_usulan = $data_dasar->usulan_status_id;
		$q_stat = $this->db->query("select * from usulan_statuses where id='$sts_usulan' ")->row();
		$status = $q_stat->nama_status;
		if (isset($data_dasar->jad_akhir)) {
			$no_jad_akhir = $data_dasar->jad_akhir;
		} else {
			$no_jad_akhir = '31';
		}
		$q_jad_akhir = $this->db->query("SELECT a.`no`, a.`jabatan_kode`, a.`jenjang_id`, b.`nama_jabatans` AS nm_jabatan, c.`nama_jenjang` AS nm_jenjang, b.kum FROM `jabatan_jenjangs` a JOIN `jabatans` b ON a.`jabatan_kode` = b.`kode` JOIN `jenjangs` c ON a.`jenjang_id` = c.`id` WHERE a.`jabatan_kode` = '$no_jad_akhir'")->row();

		$nm_jad_akhir = $q_jad_akhir->nm_jabatan;
		$jen_jad_akhir = $q_jad_akhir->nm_jenjang;
		$kum_jad_akhir = $q_jad_akhir->kum;
		$jad_akhir = $nm_jad_akhir . ' ' . $kum_jad_akhir . ' (' . $jen_jad_akhir . ')';
		$no_jfa_usulan = $data_dasar->jabatan_usulan_no;
		$no_jad_usulan = $this->get_usulan_jad($no_jfa_usulan);
		$data_usulans = $this->db->query("SELECT * from usulans where no='$no'")->row();
		$usulan_status_id = $data_usulans->usulan_status_id;

		$penilai = $data_dasar->user_penilai_no;

		$data['penilai'] = $this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`no`='$penilai'")->row();
		$data['caripenilai'] = $this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`role_id`='5'");

		$data['jabatan_akhir_no'] = $jabatan_akhir_no;
		$data['jabatan_jenjang'] = $this->tampil_jabatan_jenjang($jabatan_akhir_no);
		$data['usulan_status_id'] = $usulan_status_id;
		$data['nm_gol'] = $q_golongan;
		$data['nm_pimpinan_gol'] = $q_pimpinan_golongan;
		$data['nm_kaprodi_gol'] = $q_kaprodi_golongan;
		$data['jad_akhir'] = $jad_akhir;
		$data['nm_jen_akhir'] = $jen_jad_akhir;
		$data['bidil_jad'] = $q_bidil_jad;
		$data['jad_usulan'] = $no_jad_usulan;
		$data['data_dasar'] = $data_dasar;
		$data['q_jabatan'] = $q_jabatan;
		$data['q_kap_jabatan'] = $q_kap_jabatan;
		$data['judul'] = $status;

		//$data['jabatan_no'] = $jabatan_no;
		$data['golongan'] = $this->tampil_golongan();
		$data['jabatan'] = $this->tampil_jabat();
		$data['status_id'] = $this->statusUsulan($sts_usulan);

		Vusulan('Show2', $data);
	}

	function statusUsulan($sts_usulan)
	{

		if ($sts_usulan == '3') {
			$status = 'usulanbaru';
		} else if ($sts_usulan == '4') {
			$status = 'approval_penilai';
		} else if ($sts_usulan == '5') {
			$status = 'proses_nilai';
		} else if ($sts_usulan == '6') {
			$status = 'proses_ketenagaan';
		} else if ($sts_usulan == '7') {
			$status = 'proses_dikti';
		} else if ($sts_usulan == '8') {
			$status = 'proses_kepegawaian';
		} else if ($sts_usulan == '9') {
			$status = 'proses_selesai';
		} else if ($sts_usulan == '12') {
			$status = 'proses_nilai';
		} else if ($sts_usulan == '13') {
			$status = 'validasi_persyaratan';
		} else if ($sts_usulan == '14') {
			$status = 'validasi_pak';
		} else if ($sts_usulan == '15') {
			$status = 'ralat_pak';
		}
		return $status;
	}
	function Show_matakul($no_usulan)
	{
		$data_mtk = $this->db->query("SELECT a.`usulan_status_id`, b.* FROM usulans AS a, usulan_matkuls AS b WHERE a.no= '$no_usulan' AND b.`usulan_no`=a.`no`")->result();
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$r_nidn = $this->db->query("SELECT a.no, a.dosen_no, b.nidn	FROM usulans AS a, dosens AS b WHERE a.dosen_no = b.no  AND a.no = '$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;
		$nidn = $r_nidn->nidn;
		$d_mtk['usulan_status_id'] = $usulan_status_id;

		$d_mtk['nidn'] = $nidn;
		$d_mtk['data_mtk'] = $data_mtk;
		$d_mtk['no'] = $no_usulan;
		$d_mtk['jabatan_no'] = $jabatan_no;
		$this->load->view('Show_mtk', $d_mtk);
	}

	function Show_matakul_pak($no_usulan)
	{
		$data_mtk = $this->db->query("SELECT a.`usulan_status_id`, b.* FROM usulans AS a, usulan_matkuls AS b WHERE a.no= '$no_usulan' AND b.`usulan_no`=a.`no`")->result();
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$r_nidn = $this->db->query("SELECT a.no, a.dosen_no, b.nidn	FROM usulans AS a, dosens AS b WHERE a.dosen_no = b.no  AND a.no = '$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;
		$nidn = $r_nidn->nidn;
		$d_mtk['usulan_status_id'] = $usulan_status_id;

		$d_mtk['nidn'] = $nidn;
		$d_mtk['data_mtk'] = $data_mtk;
		$d_mtk['no'] = $no_usulan;
		$d_mtk['jabatan_no'] = $jabatan_no;
		$this->load->view('Show_mtk_pak', $d_mtk);
	}

	function update_mtk_pak($usulan_no)
	{
		$mtk = $this->input->post('mtk');

		$cari_mtk = $this->db->query("select *from usulan_matkuls where usulan_no='$usulan_no' AND mtk='$mtk'")->row();
		if ($cari_mtk > 0) {
			$this->session->set_flashdata('error', 'Matakuliah sudah ada.');
			redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $usulan_no);
		} else {
			$jml_mtk = $this->db->query("SELECT COUNT(*) AS jml FROM usulan_matkuls WHERE usulan_no='$usulan_no'")->row();
			$jml = $jml_mtk->jml;
			if ($jml == 3) {
				$this->session->set_flashdata('error', 'Matakuliah tidak boleh lebih dari 3 matakuliah');
				redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $usulan_no);
			} else {
				$perintah = "INSERT INTO `usulan_matkuls` (`usulan_no`, mtk)VALUES ('$usulan_no', '$mtk')";
				$this->db->query($perintah);

				$this->session->set_flashdata('flash', 'Diupdate');
				redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $usulan_no);
			}
		}
	}
	function hapus_mtk_pak($no_usulan_mtk, $usulan_no)
	{
		$perintah = "DELETE FROM `usulan_matkuls` WHERE `no_usulan_matkul`='$no_usulan_mtk' AND `usulan_no`='$usulan_no'";
		$this->db->query($perintah);

		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $usulan_no);
	}

	function hapus_pendidikan_pak($id_rwy_didik, $no_usulan)
	{
		$user = $this->session->userdata('nama');
		$no_log = date("ymdHis");



		$keterangan = "Riwayat pendidikan dihapus oleh:" . $user;
		$del_pend = "DELETE FROM `rwy_pend_pak` WHERE `id_rwy_didik_formal`='$id_rwy_didik' ";
		$this->db->query($del_pend);

		$log = "INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,created_at,updated_at)
			values ('$no_log','$no_usulan','6','$keterangan',now(),now())";
		$this->db->query($log);

		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $no_usulan);
	}
	function Show_pendidikan($no_usulan)
	{
		$pendidikan = $this->db->query("SELECT a.`no`,a.`usulan_no`,a.`tgl`,b.`nama_bidang` AS bidil,c.`nama_jenjang` AS nm_jenjang FROM `usulan_pendidikans` a LEFT JOIN `bidang_ilmus` b ON a.`bidang_ilmu_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`usulan_no`='$no_usulan' ")->result();
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;
		$d_pendidikan['usulan_status_id'] = $usulan_status_id;
		$d_pendidikan['data_didik'] = $pendidikan;
		$d_pendidikan['no'] = $no_usulan;
		$this->load->view('Show_pendidikan', $d_pendidikan);
	}



	/* 	function bidangA(){
			
				  
					$this->load->view('show_a');    
			
				} */
	function bidangA($no_usulan)
	{
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$dosen_no = $data->dosen_no;
		$q_data = $this->db->query("SELECT no,jabatan_no from dosens where no='$dosen_no'")->row();
		$jabatan_no = $q_data->jabatan_no;
		$usulan_status_id = $data->usulan_status_id;
		$showa['usulan_status_id'] = $usulan_status_id;
		$showa['no'] = $no_usulan;
		//$showa['jabatan_no'] = $jabatan_no;
		$this->load->view('Show_a', $showa);
	}


	function bidangB($no_usulan)
	{


		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;
		$showb['usulan_status_id'] = $usulan_status_id;
		$showb['no'] = $no_usulan;
		//$showb['jabatan_no'] = $jabatan_no;
		$this->load->view('Show_b', $showb);
	}
	function bidangC($no_usulan)
	{


		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;

		$showc['usulan_status_id'] = $usulan_status_id;

		$showc['no'] = $no_usulan;
		//$showc['jabatan_no'] = $jabatan_no;
		$this->load->view('Show_c', $showc);
	}
	function bidangD($no_usulan)
	{


		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;

		$showd['usulan_status_id'] = $usulan_status_id;
		$showd['no'] = $no_usulan;
		//$showd['jabatan_no'] = $jabatan_no;
		$this->load->view('Show_d', $showd);
	}
	function bidangE($no_usulan)
	{
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;

		$r_nidn = $this->db->query("SELECT
												a.no,
												a.dosen_no,
												b.nidn,
												a.jabatan_usulan_no,
												b.pengangkatan_tgl
												FROM
												usulans AS a,
												dosens AS b
												WHERE a.dosen_no = b.no
												AND a.no = '$no_usulan'")->row();

		$showe['jabatan_usulan_no'] = $r_nidn->jabatan_usulan_no;
		$showe['pengangkatan_tgl'] = $r_nidn->pengangkatan_tgl;

		$showe['usulan_status_id'] = $usulan_status_id;
		$showe['no'] = $no_usulan;
		//$showe['jabatan_no'] = $jabatan_no;
		$this->load->view('Show_e', $showe);
	}
	function show_pak($no_usulan)
	{

		$data_dasar = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$docPak = $data_dasar->pak;
		if (isset($docPak)) {
			$showp['sk_pak'] = '<a href="' . base_url() . 'assets/pak/' . $docPak . '" data-toggle="tooltip" title="View/Unduh" target="_blank" class="btn btn-success">
						<i class="fa fa-download"></i>
						Download PAK
					</a>';
		} else {
			$showp['sk_pak'] = '<a href="" data-toggle="modal" title="Dokumen tidak tersedia" class="btn btn-danger">
						<i class="fa fa-close"></i>
						Download PAK
						 </a>';
		}
		$usulan_status_id = $data_dasar->usulan_status_id;
		$showp['usulan_status_id'] = $usulan_status_id;
		$showp['no'] = $no_usulan;
		$this->load->view('Show_pak', $showp);
	}
	function show_pak_edit($no_usulan)
	{

		$data_dasar = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data_dasar->usulan_status_id;
		$showp['usulan_status_id'] = $usulan_status_id;
		$showp['no'] = $no_usulan;
		Vusulan('Show_pak_edit', $showp);
	}

	function editPak($no_usulan)
	{
		$data_dasar = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data_dasar->usulan_status_id;
		$showp['usulan_status_id'] = $usulan_status_id;
		$showp['no'] = $no_usulan;
		$showp['no_pak'] = $this->get_no_pak();
		Vusulan('Edit_pak', $showp);
	}
	function ralatPak($no_usulan)
	{
		$data_dasar = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data_dasar->usulan_status_id;
		$showp['usulan_status_id'] = $usulan_status_id;
		$showp['no'] = $no_usulan;
		$showp['no_pak'] = $this->get_no_pak();
		Vusulan('Revisi_pak', $showp);
	}
	function editPakcek($no_usulan)
	{
		$data_dasar = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data_dasar->usulan_status_id;
		$showp['usulan_status_id'] = $usulan_status_id;
		$showp['no'] = $no_usulan;
		Vusulan('Edit_pak_cek', $showp);
	}

	function show_resume($no_usulan)
	{
		$data_dasar = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data_dasar->usulan_status_id;
		$showr['usulan_status_id'] = $usulan_status_id;
		$showr['no'] = $no_usulan;
		$this->load->view('Show_resume', $showr);
	}

	function show_ceklist($no_usulan)
	{
		$data_ceklis = $this->db->query("SELECT * FROM `usulan_ceklists` WHERE usulan_no='$no_usulan'")->row();

		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;
		$jabatan_usulan_no = $data->jabatan_usulan_no;
		$show_syarat['jabatan_usulan_no'] = $jabatan_usulan_no;
		$show_syarat['usulan_status_id'] = $usulan_status_id;
		$show_syarat['no'] = $no_usulan;
		$show_syarat['ceklis'] = $data_ceklis;
		$this->load->view('Show_persyaratan', $show_syarat);
	}

	function show_riwayat($no_usulan)
	{

		$riwayat = $this->db->query("SELECT  a.*,b.`nama_status`,b.`ket_status` FROM `usulan_riwayat_statuses` a LEFT JOIN `usulan_statuses` b ON a.`usulan_status_id`=b.`id` 
											where a.usulan_no='$no_usulan' ORDER BY 1 DESC");


		$show_riwayat['label'] = 'Status Riwayat JFA';
		$show_riwayat['rwy'] = $riwayat;
		$this->load->view('riwayat', $show_riwayat);
	}
	function show_vpak($no_usulan)
	{

		$data_doc = $this->db->query("SELECT a.`pak`,a.`sk_inpassing`,a.`sk_jafung` FROM usulans a WHERE a.no='$no_usulan'")->row();
		$docPak = $data_doc->pak;
		$url = base_url('assets/pak/' . $docPak);
		if (isset($docPak)) {
			$show_dok['f_pak'] = '<a href="' . base_url() . 'assets/pak/' . $docPak . '" data-toggle="tooltip" title="View/Unduh" target="_blank" class="btn btn-success">
						<i class="fa fa-download"></i>
						Download PAK
					</a>';
			//$show_dok['doc_pak'] = '<iframe id="fred" style="border:1px solid #666CCC" title="File PAK" src="'.$url.'" frameborder="1" scrolling="auto" height="1000" width="850" ></iframe>';			
			$show_dok['doc_pak'] = '<embed type="application/pdf" src="' . $url . '" width="1100" height="850"></embed>';
		} else {
			$show_dok['f_pak'] = '<a href="" data-toggle="modal" title="Dokumen tidak tersedia" class="btn btn-danger">
						<i class="fa fa-close"></i>
						Download PAK
						 </a>';
			$show_dok['doc_pak'] = '<h4>Dokumen tidak tersedia</h4>';
		}
		// sk jafung
		$docSk = $data_doc->sk_jafung;
		$urlsk = base_url('assets/sk/' . $docSk);
		if (isset($docSk)) {
			$show_dok['f_jfa'] = '<a href="' . base_url() . 'assets/sk/' . $docSk . '" data-toggle="tooltip" title="View/Unduh" target="_blank" class="btn btn-success">
						<i class="fa fa-download"></i>
						Download PAK
					</a>';
			//$show_dok['doc_pak'] = '<iframe id="fred" style="border:1px solid #666CCC" title="File PAK" src="'.$url.'" frameborder="1" scrolling="auto" height="1000" width="850" ></iframe>';			
			$show_dok['doc_jfa'] = '<embed type="application/pdf" src="' . $urlsk . '" width="1100" height="850"></embed>';
		} else {
			$show_dok['f_jfa'] = '<a href="" data-toggle="modal" title="Dokumen tidak tersedia" class="btn btn-danger">
						<i class="fa fa-close"></i>
						Download PAK
						 </a>';
			$show_dok['doc_jfa'] = '<h4>Dokumen tidak tersedia</h4>';
		}

		// sk inp
		$docinp = $data_doc->sk_inpassing;
		$urlinp = base_url('assets/inpassing/' . $docinp);
		if (isset($docinp)) {
			$show_dok['f_inp'] = '<a href="' . base_url() . 'assets/inpassing/' . $docinp . '" data-toggle="tooltip" title="View/Unduh" target="_blank" class="btn btn-success">
							<i class="fa fa-download"></i>
							Download PAK
						</a>';
			//$show_dok['doc_pak'] = '<iframe id="fred" style="border:1px solid #666CCC" title="File PAK" src="'.$url.'" frameborder="1" scrolling="auto" height="1000" width="850" ></iframe>';			
			$show_dok['doc_inp'] = '<embed type="application/pdf" src="' . $urlinp . '" width="1100" height="850"></embed>';
		} else {
			$show_dok['f_inp'] = '<a href="" data-toggle="modal" title="Dokumen tidak tersedia" class="btn btn-danger">
							<i class="fa fa-close"></i>
							Download PAK
							 </a>';
			$show_dok['doc_inp'] = '<h4>Dokumen tidak tersedia</h4>';
		}

		$this->load->view('v_pak', $show_dok);
	}
	function usulan($filter)
	{

		$draw = $_REQUEST['draw'];

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length = $_REQUEST['length'];
		$start = $_REQUEST['start'];
		$search = $_REQUEST['search']["value"];
		$q_stat = $this->db->query("select * from usulan_statuses where id='$filter' ")->row();
		$id_sts = $q_stat->id;
		$status = $q_stat->nama_status;


		$this->db->select('*');
		$this->db->from('v_usulans');
		$this->db->where('usulan_status_id', $id_sts);
		$total = $this->db->count_all_results();


		$output = array();


		$output['draw'] = $draw;


		$output['recordsTotal'] = $output['recordsFiltered'] = $total;
		$output['data'] = array();


		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}

		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = array(

			1 => 'nidn',
			2 => 'nama',
			3 => 'nama_instansi',
			4 => 'nama_prodi',
			5 => 'jabatan_usulan_no',
			6 => 'usulan_status_id',
			7 => 'user_penilai_no',
			8 => 'updated_at',
			9 => 'tgl_submit_penilaian'

		);
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			$this->db->order_by($order, $dir);
		}



		/*Lanjutkan pencarian ke database*/

		$this->db->limit($length, $start);


		$this->db->order_by('tgl_submit_penilaian', 'DESC');
		$this->db->order_by('no', 'DESC');
		$this->db->select('*');
		$this->db->from('v_usulans');
		$this->db->where('usulan_status_id', $filter);
		$query = $this->db->get();


		if ($search != "") {


			$query = $this->db->query("select * from v_usulans where (usulan_status_id='$filter' and no LIKE '%$search%') or (usulan_status_id='$filter' and nidn LIKE '%$search%') or (usulan_status_id='$filter' and nidk LIKE '%$search%') or 
	 (usulan_status_id='$filter' and nama LIKE '%$search%') or (usulan_status_id='$filter' and  nama_instansi LIKE '%$search%') or  (usulan_status_id='$filter' and nama_prodi LIKE '%$search%' )  or  (nama='$filter' and no LIKE '%$search%') or
	 (usulan_status_id='$filter' and user_penilai_keputusan LIKE '%$search%' )");


			$output['recordsTotal'] = $output['recordsFiltered'] = $query->num_rows();
		}





		$nomor_urut = $start + 1;
		foreach ($query->result_array() as $surat) {
			$no_jfa_usulan = $surat['jabatan_usulan_no'];

			$no_jad_usulan = $this->get_usulan_jad($no_jfa_usulan);
			$penilai = $surat['user_penilai_no'];
			$nama_penilai = $this->get_penilai($penilai);

			$ptk = $surat['pic_ptk'];
			$nama_user_ptk = $this->get_userPtk($ptk);
			$user_val = $surat['pic_validasi'];
			$nama_user_validasi = $this->get_userPtk($user_val);
			$nidn = $surat['nidn'];
			$usia_dosen = $this->get_usia($nidn);

			if ($filter == '5' || $filter == '6' || $filter == '8') {
				$status_penilaian =	$surat['user_penilai_keputusan'];
			} else {
				$status_penilaian = '-';
			}
			$output['data'][] = array(
				'<a href=show/' . $surat['no'] . ' data-toggle="tooltip" title="Detail Ajuan"><button type="button" class="btn btn-sm btn-circle btn-primary"><i class="  icon-book-open" ></i> </button></a>',
				'<a href=tampil_resume/' . $surat['no'] . ' data-toggle="tooltip"  title="Resume Dosen" target="_blank" class="btn btn-success">Resume</a>',
				$surat['nidn'],
				$surat['nama'],
				$usia_dosen,
				$surat['nama_instansi'],
				$surat['nama_prodi'],
				$no_jad_usulan,
				$status,
				$nama_penilai,
				$status_penilaian,
				$nama_user_ptk,
				$nama_user_validasi,
				$surat['updated_at'],
				$surat['tgl_submit_penilaian']
			);

			$nomor_urut++;
		}






		echo json_encode($output);
	}


	// cek

	function usulan2($filter)
	{

		$draw = $_REQUEST['draw'];

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length = $_REQUEST['length'];
		$start = $_REQUEST['start'];
		$search = $_REQUEST['search']["value"];
		$q_stat = $this->db->query("select * from usulan_statuses where id='$filter' ")->row();
		$id_sts = $q_stat->id;
		$status = $q_stat->nama_status;

		$this->db->select('*');
		$this->db->from('v_usulans');
		$this->db->where('usulan_status_id', $id_sts);
		$total = $this->db->count_all_results();


		$output = array();


		$output['draw'] = $draw;


		$output['recordsTotal'] = $output['recordsFiltered'] = $total;
		$output['data'] = array();


		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}

		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = array(

			1 => 'nidn',
			2 => 'nidk',
			3 => 'nama',
			4 => 'nama_instansi',
			5 => 'nama_prodi',
			6 => 'jabatan_usulan_no',
			7 => 'usulan_status_id',
			8 => 'user_penilai_no',
			9 => 'updated_at',
		);
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			$this->db->order_by($order, $dir);
		}



		/*Lanjutkan pencarian ke database*/

		$this->db->limit($length, $start);


		$this->db->order_by('updated_at', 'DESC');
		$this->db->order_by('no', 'DESC');
		$this->db->select('*');
		$this->db->from('v_usulans');
		$this->db->where('usulan_status_id', $filter);
		$query = $this->db->get();


		if ($search != "") {


			$query = $this->db->query("select * from v_usulans where (usulan_status_id='$filter' and no LIKE '%$search%') or (usulan_status_id='$filter' and nidn LIKE '%$search%') or (usulan_status_id='$filter' and nidk LIKE '%$search%') or 
	 (usulan_status_id='$filter' and nama LIKE '%$search%') or (usulan_status_id='$filter' and  nama_instansi LIKE '%$search%') or  (usulan_status_id='$filter' and nama_prodi LIKE '%$search%' ) or  (usulan_status_id='$filter' and user_penilai_keputusan LIKE '%$search%' )");


			$output['recordsTotal'] = $output['recordsFiltered'] = $query->num_rows();
		}






		$nomor_urut = $start + 1;
		foreach ($query->result_array() as $surat) {
			$no_jfa_usulan = $surat['jabatan_usulan_no'];

			$no_jad_usulan = $this->get_usulan_jad($no_jfa_usulan);
			$penilai = $surat['user_penilai_no'];
			$nama_penilai = $this->get_penilai($penilai);

			$ptk = $surat['pic_ptk'];
			$nama_user_ptk = $this->get_userPtk($ptk);
			$user_val = $surat['pic_validasi'];
			$nama_user_validasi = $this->get_userPtk($user_val);
			if ($filter == '5' || $filter == '6') {
				$status_penilaian =	$surat['user_penilai_keputusan'];
			} else {
				$status_penilaian = '-';
			}
			$output['data'][] = array(
				'<a href=show/' . $surat['no'] . ' data-toggle="tooltip" title="Detail Ajuan"><button type="button" class="btn btn-sm btn-circle btn-primary"><i class="  icon-book-open" ></i> </button></a>',
				'<a href=tampil_resume/' . $surat['no'] . ' data-toggle="tooltip"  title="Resume Dosen" target="_blank" class="btn btn-success">Resume</a>', $surat['nidn'], $surat['nidk'], $surat['nama'], $surat['nama_instansi'], $surat['nama_prodi'], $no_jad_usulan, $status, $nama_penilai, $status_penilaian, $nama_user_ptk, $nama_user_validasi, $surat['updated_at']
			);

			$nomor_urut++;
		}






		echo json_encode($output);
	}







	// end cek
	function get_usia($nidn)
	{

		$umur_dosen = $this->db->query("SELECT TIMESTAMPDIFF (YEAR, lahir_tgl, CURDATE()) AS usia FROM `v_usulans` where nidn='$nidn'")->row();
		$usia_dosen = $umur_dosen->usia;
		return $usia_dosen;
	}
	function get_userPtk($ptk)
	{

		$user_ptk = $this->db->query("SELECT a.no,a.`instansi_kode`,a.`nama` FROM `users` a WHERE a.no='$ptk'")->row();
		$nm_user_ptk = $user_ptk->nama;
		return $nm_user_ptk;
	}

	function get_penilai($penilai)
	{


		$penilai = $this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a
	 LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`no`='$penilai'")->row();

		$nm_penilai = $penilai->nama;
		$nm_instansi_penilai = $penilai->nama_instansi;


		return $nm_penilai;
	}

	function get_usulan_jad($no_jfa_usulan)
	{


		$q_usulan_jfa = $this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum
	 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jfa_usulan'")->row();

		$nm_jad_usul = $q_usulan_jfa->nm_jabatan;
		$jen_jad_usulan = $q_usulan_jfa->nm_jenjang;
		$kum_jad_usulan = $q_usulan_jfa->kum;
		$jad_usulan = $nm_jad_usul . ' ' . $kum_jad_usulan . ' (' . $jen_jad_usulan . ')';

		return $jad_usulan;
	}

	function updateStatus($no_usulan)
	{
		$user = $this->session->userdata('nama');
		$userno = $this->session->userdata('no');
		$no_usulan = $this->input->post('no_usulan');
		$id_penilai = $this->input->post('id_penilai');
		$id_status = $this->input->post('status_usulan');
		$statusnya = $this->input->post('statusnya');

		$keterangan = $this->anti_xss($this->input->post('keterangan', TRUE));
		$keterangan_pengusul = $this->anti_xss($this->input->post('keterangan_pengusul', TRUE));
		$no = date("ymdHis");
		$file_path = './assets/catatan/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx';
		$config['max_size'] = '5048';
		$config['file_name'] = 'dikti_' . $no . '_' . $no_usulan;
		$this->load->library('upload', $config);

		$no_log = date("ymdHis");
		$errors = array();
		if ($id_status > '13' && $id_penilai == '') {
			$this->session->set_flashdata('error', 'Tim Penilai masih kosong');
			redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $no_usulan);
		}
		$count = count($errors);
		if ($count == 0) {
			if ($id_status == '5') {
				$tgl = date('Y-m-d');
				$tgl2 = date('Y-m-d', strtotime('+9days', strtotime($tgl)));

				$update = "UPDATE
								usulans
							SET
								usulan_status_id = '$id_status',
								user_ketenagaan_no = '$user',
								user_updated_no = '$userno',
								user_ketenagaan_tgl = NOW(),
								`penilaian_tgl`='$tgl',
								batas_penilaian_tgl='$tgl2'
							WHERE `no` = '$no_usulan'";
				$this->db->query($update);
			} else {
				$update = "UPDATE
								usulans
							SET
								usulan_status_id = '$id_status',
								user_ketenagaan_no = '$user',
								user_updated_no = '$userno',
								user_ketenagaan_tgl = NOW()
							WHERE NO = '$no_usulan'";
				$this->db->query($update);
			}
			$update_ptk = "update usulan_riwayat_ptk set posting='1' where usulan_no='$no_usulan'";
			$this->db->query($update_ptk);
			$this->upload->do_upload('berkas');
			$berkas = $this->upload->data();
			$log = "INSERT INTO usulan_riwayat_statuses (
						`no`,
						usulan_no,
						usulan_status_id,
						keterangan,
						keterangan_pengusul,
						user_no,
						penilai_no,
						`file`,
						created_at,
						updated_at
					)
					VALUES
						(
						'$no_log',
						'$no_usulan',
						'$id_status',
						'$keterangan',
						'$keterangan_pengusul',
						'$userno',
						'$id_penilai',
						'$berkas[file_name]',
						NOW(),
						NOW()
						)";
			$this->db->query($log);

			$this->session->set_flashdata('flash', 'Update Status');
			redirect(base_url() . 'ketenagaan/ketenagaan/' . $statusnya);
		}
	}

	function updateStatusPenilai($no_usulan)
	{
		$role 		= $this->session->userdata('role');
		$user 		= $this->session->userdata('nama');
		$userno 	= $this->session->userdata('no');
		$id_status 	= $this->input->post('status_usulan');
		$statusnya 	= $this->input->post('statusnya');
		$keterangan = $this->anti_xss($this->input->post('keterangan', TRUE));
		$keterangan_pengusul = $this->anti_xss($this->input->post('keterangan_pengusul', TRUE));
		$no_log 	= date("ymdHis");

		if ($role == '6') {
			$update = "UPDATE
						usulans
					SET
						usulan_status_id = '$id_status',
						user_ketenagaan_no = '$user',
						user_updated_no = '$userno',
						`penilaian_tgl` = '',
						`batas_penilaian_tgl` = '',
						`status_penilaian` = '',
						`ket_tambah_penilaian` = '',
						user_ketenagaan_tgl = NOW()
					WHERE NO = '$no_usulan'";
			$this->db->query($update);

			$log = "INSERT INTO usulan_riwayat_statuses (
						no,
						usulan_no,
						usulan_status_id,
						keterangan,
						keterangan_pengusul,
						user_no,
						created_at,
						updated_at
						)
						VALUES
						(
							'$no_log',
							'$no_usulan',
							'$id_status',
							'$keterangan',
							'$keterangan_pengusul',
							'$userno',
							NOW(),
							NOW()
						)";
			$this->db->query($log);
		}

		$this->session->set_flashdata('flash', 'Update Status');
		redirect(base_url() . 'ketenagaan/ketenagaan/' . $statusnya);
	}

	function catatanPTK($no_usulan)
	{
		$user = $this->session->userdata('nama');
		$no_usulan = $this->input->post('no_usulan');
		$bidang = $this->input->post('bidang');
		$keterangan = $this->anti_xss($this->input->post('keterangan_ptk', TRUE));

		$no_log = date("ymdHis");



		$log = "INSERT INTO usulan_riwayat_ptk(no,usulan_no,user_nama,keterangan,created_at,posting,bidang)
		  values ('$no_log','$no_usulan','$user','$keterangan',now(),0,'$bidang')";
		$this->db->query($log);

		$this->session->set_flashdata('flash', 'Keterangan Ditambahkan');
		redirect(base_url() . 'ketenagaan/usulan_dupak/dupak/A0001/' . $no_usulan, 'refresh');
	}

	function tampil_resume($no_usulan)
	{
		$printres['no'] = $no_usulan;
		$this->load->view('tampil_resume', $printres);
	}


	function updatePak($no_usulan)
	{
		$user = $this->session->userdata('nama');
		$user_no = $this->session->userdata('no');
		$usulan_status_id = $this->input->post('usulan_status_id');
		$no_dosen = $this->input->post('no_dosen');

		$tgl_awal = $this->input->post('masa_penilaian_awal');
		$tgl_akhir = $this->input->post('masa_penilaian_akhir');
		$tmt_no = $this->anti_xss($this->input->post('tmt_no'), TRUE);
		$tgl_tmt_pak = $this->input->post('tgl_tmt_pak');
		//	$tgl_pak= $this->input->post('pak_tanggal');
		$lebihan_b = $this->input->post('lebihan_b');

		$fakultas = $this->anti_xss($this->input->post('fakultas'), TRUE);
		$prodi_pak = $this->input->post('prodi_pak');
		$id_rwy_didik_formal = $this->input->post('id_rwy_didik_formal');
		$id_jen_pak = $this->input->post('id_jen_pak');
		$jen_pak = $this->input->post('jen_pak');
		$nm_sp_formal = $this->input->post('nm_sp_formal');
		$tgl_lls = $this->input->post('tgl_lls');
		$tgl_ijazah = $this->input->post('tgl_ijazah');
		$last_update = $this->input->post('last_update');
		$kodegol_pak = $this->input->post('golongan');
		$golongan_tgl = $this->input->post('golongan_tgl');
		$jab_lama_pak = $this->input->post('jab_lama_pak');
		$tmt_jab_lama_pak = $this->input->post('tmt_jab_lama_pak');
		$kum_lama = $this->input->post('kum_lama');
		$prodi_homebase = $this->input->post('prodi_homebase');
		$baru_th_pak = $this->anti_xss($this->input->post('baru_th_pak'), TRUE);
		$baru_bln_pak = $this->anti_xss($this->input->post('baru_bln_pak'), TRUE);
		$lama_th_pak = $this->anti_xss($this->input->post('lama_th_pak'), TRUE);
		$lama_bln_pak = $this->anti_xss($this->input->post('lama_bln_pak'), TRUE);
		$g_depan = $this->anti_xss($this->input->post('g_depan'), TRUE);
		$g_belakang = $this->anti_xss($this->input->post('g_belakang'), TRUE);
		$tmt_jab_dosen = $this->input->post('tmt_jab_dosen');
		$jab_baru_pak = $this->input->post('jab_baru_pak');
		$id_bid_studi = $this->input->post('id_bid_studi');
		$id_sms = $this->input->post('id_sms');
		$thn_lulus = $this->input->post('thn_lulus');
		$tmt_jab_baru_pak = $this->input->post('tmt_jab_baru_pak');
		$kum_baru = $this->input->post('kum_baru');
		$no_log = date("ymdHis");



		$keterangan = "Data PAK diupdate oleh:" . $user;


		$update = "UPDATE usulans SET user_updated_no='$user_no', masa_penilaian_awal='$tgl_awal',masa_penilaian_akhir='$tgl_akhir',fakultas='$fakultas',
				tmt_tgl='$tgl_tmt_pak',tmt_no='$tmt_no',pak_tgl='$tgl_tmt_pak',tmt_lebihan_b='$lebihan_b' where no='$no_usulan'";
		$this->db->query($update);

		$log = "INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,created_at,updated_at)
			  values ('$no_log','$no_usulan','$usulan_status_id','$keterangan',now(),now())";
		$this->db->query($log);

		$rwy_pak = "REPLACE INTO rwy_pak(no_dosen,no_usulan,kodegol_pak,golongan_tgl_pak,jab_lama_pak,tmt_jab_lama_pak,tmt_jab_dosen,kum_lama,fakultas_pak,prodi_homebase_pak,lama_tahun_pak,lama_bulan_pak,baru_tahun_pak,baru_bulan_pak,jab_baru_pak,tmt_jab_baru_pak,kum_baru,last_update,user_updater,gelar_depan,gelar_belakang)
			  values ('$no_dosen','$no_usulan','$kodegol_pak','$golongan_tgl','$jab_lama_pak','$tmt_jab_lama_pak','$tmt_jab_dosen','$kum_lama','$fakultas','$prodi_homebase','$lama_th_pak','$lama_bln_pak','$baru_th_pak','$baru_bln_pak','$jab_baru_pak','$tmt_jab_baru_pak','$kum_baru','$no_log','$user','$g_depan','$g_belakang')";
		$this->db->query($rwy_pak);

		$arr = count($id_jen_pak);

		for ($x = 0; $x < $arr; $x++) {
			$insdata = "REPLACE INTO rwy_pend_pak(no_dosen,id_rwy_didik_formal,no_usulan,id_jenjang_pak,jenjang_pak,prodi_pak,institusi_pak,tgl_lulus_pak,tgl_ijazah_pak,id_sms,last_update,user_updater,id_bid_studi,thn_lulus) 
				values('$no_dosen','$id_rwy_didik_formal[$x]','$no_usulan','$id_jen_pak[$x]','$jen_pak[$x]','$prodi_pak[$x]','$nm_sp_formal[$x]','$tgl_lls[$x]','$tgl_ijazah[$x]','$id_sms[$x]',now(),'$user','$id_bid_studi[$x]','$thn_lulus[$x]')";
			$this->db->query($insdata);
		}

		$this->session->set_flashdata('flash', 'PAK Telah Diupdate');
		if ($usulan_status_id == 6) {
			redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $no_usulan);
		} else {
			redirect(base_url() . 'kepegawaian/kepegawaian/show/' . $no_usulan);
		}
	}


	function revisiPak($no_usulan)
	{
		$user = $this->session->userdata('nama');
		$user_no = $this->session->userdata('no');
		$tgl_revisi = $this->input->post('pak_tgl');
		// tambahan data
		$usulan_status_id = $this->input->post('usulan_status_id');
		$no_dosen = $this->input->post('no_dosen');

		$tgl_awal = $this->input->post('masa_penilaian_awal');
		$tgl_akhir = $this->input->post('masa_penilaian_akhir');
		$tmt_no = $this->anti_xss($this->input->post('tmt_no'), TRUE);
		$tgl_tmt_pak = $this->input->post('tgl_tmt_pak');
		//	$tgl_pak= $this->input->post('pak_tanggal');
		$lebihan_b = $this->input->post('lebihan_b');

		$fakultas = $this->anti_xss($this->input->post('fakultas'), TRUE);
		$prodi_pak = $this->input->post('prodi_pak');
		$id_rwy_didik_formal = $this->input->post('id_rwy_didik_formal');
		$id_jen_pak = $this->input->post('id_jen_pak');
		$jen_pak = $this->input->post('jen_pak');
		$nm_sp_formal = $this->input->post('nm_sp_formal');
		$tgl_lls = $this->input->post('tgl_lls');
		$tgl_ijazah = $this->input->post('tgl_ijazah');
		$last_update = $this->input->post('last_update');
		$kodegol_pak = $this->input->post('golongan');
		$golongan_tgl = $this->input->post('golongan_tgl');
		$jab_lama_pak = $this->input->post('jab_lama_pak');
		$tmt_jab_lama_pak = $this->input->post('tmt_jab_lama_pak');
		$kum_lama = $this->input->post('kum_lama');
		$prodi_homebase = $this->input->post('prodi_homebase');
		$baru_th_pak = $this->anti_xss($this->input->post('baru_th_pak'), TRUE);
		$baru_bln_pak = $this->anti_xss($this->input->post('baru_bln_pak'), TRUE);
		$lama_th_pak = $this->anti_xss($this->input->post('lama_th_pak'), TRUE);
		$lama_bln_pak = $this->anti_xss($this->input->post('lama_bln_pak'), TRUE);
		$g_depan = $this->anti_xss($this->input->post('g_depan'), TRUE);
		$g_belakang = $this->anti_xss($this->input->post('g_belakang'), TRUE);
		$tmt_jab_dosen = $this->input->post('tmt_jab_dosen');
		$jab_baru_pak = $this->input->post('jab_baru_pak');
		$id_bid_studi = $this->input->post('id_bid_studi');
		$id_sms = $this->input->post('id_sms');
		$thn_lulus = $this->input->post('thn_lulus');
		$tmt_jab_baru_pak = $this->input->post('tmt_jab_baru_pak');
		$kum_baru = $this->input->post('kum_baru');
		// end
		$no_log = date("ymdHis");
		$keterangan = "Tanggal PAK direvisi oleh:" . $user;

		$update_rev = "UPDATE usulans SET user_updated_no='$user_no',masa_penilaian_awal='$tgl_awal',masa_penilaian_akhir='$tgl_akhir',fakultas='$fakultas',
				tmt_tgl='$tgl_tmt_pak',tmt_no='$tmt_no',pak_tgl='$tgl_tmt_pak',tmt_lebihan_b='$lebihan_b',tgl_revisi_pak='$tgl_revisi' where no='$no_usulan'";
		$this->db->query($update_rev);
		$log = "INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,created_at,updated_at)
		values ('$no_log','$no_usulan','15','$keterangan',now(),now())";
		$this->db->query($log);

		$rwy_pak = "REPLACE INTO rwy_pak(no_dosen,no_usulan,kodegol_pak,golongan_tgl_pak,jab_lama_pak,tmt_jab_lama_pak,tmt_jab_dosen,kum_lama,fakultas_pak,prodi_homebase_pak,lama_tahun_pak,lama_bulan_pak,baru_tahun_pak,baru_bulan_pak,jab_baru_pak,tmt_jab_baru_pak,kum_baru,last_update,user_updater,gelar_depan,gelar_belakang)
			  values ('$no_dosen','$no_usulan','$kodegol_pak','$golongan_tgl','$jab_lama_pak','$tmt_jab_lama_pak','$tmt_jab_dosen','$kum_lama','$fakultas','$prodi_homebase','$lama_th_pak','$lama_bln_pak','$baru_th_pak','$baru_bln_pak','$jab_baru_pak','$tmt_jab_baru_pak','$kum_baru','$no_log','$user','$g_depan','$g_belakang')";
		$this->db->query($rwy_pak);

		$arr = count($id_jen_pak);

		for ($x = 0; $x < $arr; $x++) {
			$insdata = "REPLACE INTO rwy_pend_pak(no_dosen,id_rwy_didik_formal,no_usulan,id_jenjang_pak,jenjang_pak,prodi_pak,institusi_pak,tgl_lulus_pak,tgl_ijazah_pak,id_sms,last_update,user_updater,id_bid_studi,thn_lulus) 
				values('$no_dosen','$id_rwy_didik_formal[$x]','$no_usulan','$id_jen_pak[$x]','$jen_pak[$x]','$prodi_pak[$x]','$nm_sp_formal[$x]','$tgl_lls[$x]','$tgl_ijazah[$x]','$id_sms[$x]',now(),'$user','$id_bid_studi[$x]','$thn_lulus[$x]')";
			$this->db->query($insdata);
		}
		$this->session->set_flashdata('flash', 'Data PAK Telah Direvisi');
		redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $no_usulan);
	}
	function test_aja($no_usulan)
	{
		$user = $this->session->userdata('nama');
		$no_dosen = $this->input->post('no_dosen');
		$golongan = $this->input->post('golongan');
		$rwy_pak = "UPDATE rwy_pak SET kodegol_pak='$golongan' where no_dosen='$no_dosen'";
		$this->db->query($rwy_pak);
		$this->session->set_flashdata('flash', 'PAK Telah Diupdate');
		redirect(base_url() . 'ketenagaan/ketenagaan/show_pak_edit/' . $no_usulan);
	}

	function updatePenilai($no_usulan)
	{
		$user 				= $this->session->userdata('no');
		$nm_user 			= $this->session->userdata('nama');
		$usulan_status_id 	= $this->input->post('usulan_status_id');
		$no_usulan 			= $this->input->post('no_usulan');
		$penilaibaru 		= $this->input->post('caripenilai');
		$no_log 			= date("ymdHis");


		$keterangan = "Tim Penilai diupdate oleh:" . $nm_user;


		$update = "update usulans set user_updated_no='$user', user_penilai_no='$penilaibaru',pic_ptk='$user' where no='$no_usulan'";
		$this->db->query($update);

		$log = "INSERT INTO usulan_riwayat_statuses (
			`no`,
			usulan_no,
			usulan_status_id,
			keterangan,
			user_no,
			created_at,
			updated_at
		)
		VALUES
			(
			'$no_log',
			'$no_usulan',
			'$usulan_status_id',
			'$keterangan',
			'$user',
			NOW(),
			NOW()
			)";
		$this->db->query($log);

		$this->session->set_flashdata('flash', 'Update Tim Penilai');
		redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $no_usulan);
	}
	function validasi_data($no_usulan)
	{
		$user = $this->session->userdata('no');
		$nm_user = $this->session->userdata('nama');
		$no_usulan = $this->input->post('no_usulan');
		$no_log = date("ymdHis");
		$usulan_status_id = $this->input->post('usulan_status_id');

		$keterangan = "Data Dosen diperiksa oleh:" . $nm_user;


		$update = "update usulans set pic_validasi='$user', user_updated_no='$user' where no='$no_usulan'";
		$this->db->query($update);

		$log = "INSERT INTO usulan_riwayat_statuses(no,usulan_no,usulan_status_id,keterangan,created_at,updated_at)
				values ('$no_log','$no_usulan','$usulan_status_id','$keterangan',now(),now())";
		$this->db->query($log);

		$this->session->set_flashdata('flash', 'Validasi Usulan Data Dosen');
		redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $no_usulan);
	}
	/* function get_jad_lama($no_jad_akhir){


	$q_jad_akhir=$this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama` AS nm_jabatan,c.`nama` AS nm_jenjang,b.kum
	 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jad_akhir'")->row();
	 
	 $nm_jad_akhir=$q_jad_akhir->nm_jabatan;
	 $jen_jad_akhir=$q_jad_akhir->nm_jenjang;
	 $kum_jad_akhir=$q_jad_akhir->kum;
	 $jad_akhir=$nm_jad_akhir.' '.$kum_jad_akhir.' ('.$jen_jad_akhir.')';

	 return $jad_akhir;
} */
	public function print_bidanga($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		// Vusulan('print_dupak_a',$printa);
		$this->load->view('print_dupak_a', $printa);
	}
	public function print_bidangb($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak_b', $printa);
	}

	public function print_dupak($no_usulan)
	{
		$printp['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak', $printp);
	}
	public function print_bidangc($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak_c', $printa);
	}
	public function print_bidangd($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak_d', $printa);
	}

	function uploadPak()
	{
		$user = $this->session->userdata('nama');
		$nidn = $this->input->post('nidn');
		$no_usulan = $this->input->post('no_usulan');
		$userno 	= $this->session->userdata('no');
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis");
		$file_path = './assets/pak/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'PAK_' . $no . '_' . $nidn;
		$this->load->library('upload', $config);
		$no_log = date("ymdHis");



		$keterangan = "Data PAK diupload oleh:" . $user;

		$data_pak = $this->db->query("SELECT no FROM `usulans` WHERE no='$no_usulan'")->num_rows();
		if ($data_pak > 0) {

			if ($this->upload->do_upload('berkas')) {
				$pak = $this->upload->data();
				$update = "update usulans set usulan_status_id='8',pak = '$pak[file_name]',user_updated_no = '$userno' where  no='$no_usulan'";
				$this->db->query($update);
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'ketenagaan/ketenagaan/show/' . $no_usulan);
			}
			$this->session->set_flashdata('flash', 'DiUpload');
			$log = "INSERT INTO usulan_riwayat_statuses(no,usulan_no,keterangan,created_at,updated_at)
			values ('$no_log','$no_usulan','$keterangan',now(),now())";
			$this->db->query($log);

			//redirect(base_url().'ketenagaan/ketenagaan/show/'.$no_usulan);
			redirect(base_url() . 'ketenagaan/ketenagaan/show/proses_ketenagaan');
		}
	}


	function download_matkul($id)
	{
		force_download('assets/download_matkul/' . $id, NULL);
	}

	function download_pendidik($id)
	{
		force_download('assets/download_pendidik/' . $id, NULL);
	}



	function show_cek($no)
	{

		$data_dasar = $this->db->query("SELECT a.`no`, a.`pimpinan_jabatan`,a.user_penilai_no, a.no_surat, a.tgl_surat, a.tempat_surat, a.usulan_status_id, d.`nidn`, d.pengangkatan_tgl, d.`nidk`, d.`nip`, d.`karpeg`, d.`nama` AS nm_dosen, d.`gelar_depan`, d.`gelar_belakang`, e.`nama_ikatan` AS nm_ikadin, b.`instansi_kode` AS kd_pt, c.`nama_instansi` AS nm_pt, b.`prodi_kode` AS kd_prodi, b.`nama_prodi` AS nm_prodi, d.`lahir_tempat`, d.`lahir_tgl`, d.`jk`, d.`golongan_kode`, a.tmt_tahun, a.tmt_bulan, d.`golongan_tgl`, d.`jabatan_no`, d.`jabatan_tgl`, d.`jenjang_id`, a.`masa_penilaian_awal`, a.`masa_penilaian_akhir`, a.`no_surat`, a.`jabatan_akhir_no`, a.`tempat_surat`, a.`jabatan_usulan_no`, a.`usulan_status_id`, d.`jabatan_no` AS jad_akhir, d.jabatan_tgl, d.golongan_kode, d.golongan_tgl, d.bidang_ilmu_kode, a.user_pengusul_keterangan, a.pimpinan_nama, a.pimpinan_nidn, a.pimpinan_nip, a.pimpinan_golongan_kode, a.pimpinan_jabatan, a.pimpinan_unit_kerja, a.kaprodi_nama, a.kaprodi_nidn, a.kaprodi_nip, a.kaprodi_golongan_kode, a.kaprodi_jabatan, a.kaprodi_unit_kerja, f.`nama_jenjang` FROM usulans AS a, dosens AS d, prodis AS b, `instansis` AS c, `ikatan_kerjas` AS e, `jenjangs` AS f
			 WHERE a.dosen_no = d.no AND d.prodi_kode = b.kode AND b.instansi_kode = c.kode AND d.`ikatan_kerja_kode` = e.`kode` AND d.`jenjang_id` = f.`id` AND a.no = '$no'")->row();
		$jabatan_akhir_no = $data_dasar->jabatan_akhir_no;
		$kd_bid = $data_dasar->bidang_ilmu_kode;
		$kd_jab = $data_dasar->pimpinan_jabatan;
		$kd_kap_jab = $data_dasar->kaprodi_jabatan;
		$q_bidil_jad = $this->db->query("SELECT * from bidang_ilmus where kode='$kd_bid'")->row();
		$q_jabatan = $this->db->query("SELECT * from reff_japim where id='$kd_jab'")->row();
		$q_kap_jabatan = $this->db->query("SELECT * from reff_japim where id='$kd_kap_jab'")->row();
		$kd_golongan = $data_dasar->golongan_kode;
		$kd_gol_pimpinan = $data_dasar->pimpinan_golongan_kode;
		$kaprodi_golongan_kode = $data_dasar->kaprodi_golongan_kode;
		$q_golongan = $this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		//$q_golongan=$this->db->query("SELECT kode,kode_gol,nama as nm_golongan from golongans where kode='$kd_golongan' ")->row();
		$q_pimpinan_golongan = $this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kd_gol_pimpinan' ")->row();
		$q_kaprodi_golongan = $this->db->query("SELECT kode,kode_gol,nama as nm_golongan_pim from golongans where kode='$kaprodi_golongan_kode' ")->row();
		$sts_usulan = $data_dasar->usulan_status_id;
		$q_stat = $this->db->query("select * from usulan_statuses where id='$sts_usulan' ")->row();
		$status = $q_stat->nama_status;
		if (isset($data_dasar->jad_akhir)) {
			$no_jad_akhir = $data_dasar->jad_akhir;
		} else {
			$no_jad_akhir = '31';
		}
		$q_jad_akhir = $this->db->query("SELECT a.`no`, a.`jabatan_kode`, a.`jenjang_id`, b.`nama_jabatans` AS nm_jabatan, c.`nama_jenjang` AS nm_jenjang, b.kum FROM `jabatan_jenjangs` a JOIN `jabatans` b ON a.`jabatan_kode` = b.`kode` JOIN `jenjangs` c ON a.`jenjang_id` = c.`id` WHERE a.`jabatan_kode` = '$no_jad_akhir'")->row();

		$nm_jad_akhir = $q_jad_akhir->nm_jabatan;
		$jen_jad_akhir = $q_jad_akhir->nm_jenjang;
		$kum_jad_akhir = $q_jad_akhir->kum;
		$jad_akhir = $nm_jad_akhir . ' ' . $kum_jad_akhir . ' (' . $jen_jad_akhir . ')';
		$no_jfa_usulan = $data_dasar->jabatan_usulan_no;
		$no_jad_usulan = $this->get_usulan_jad($no_jfa_usulan);
		$data_usulans = $this->db->query("SELECT * from usulans where no='$no'")->row();
		$usulan_status_id = $data_usulans->usulan_status_id;

		$penilai = $data_dasar->user_penilai_no;

		$data['penilai'] = $this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`no`='$penilai'")->row();
		$data['caripenilai'] = $this->db->query("SELECT a.no AS no_penilai,a.`nama`,b.`nama_instansi` FROM `users` a LEFT JOIN `instansis` b ON a.`instansi_kode`=b.`kode` WHERE a.`role_id`='5'");

		$data['jabatan_akhir_no'] = $jabatan_akhir_no;
		$data['jabatan_jenjang'] = $this->tampil_jabatan_jenjang($jabatan_akhir_no);
		$data['usulan_status_id'] = $usulan_status_id;
		$data['nm_gol'] = $q_golongan;
		$data['nm_pimpinan_gol'] = $q_pimpinan_golongan;
		$data['nm_kaprodi_gol'] = $q_kaprodi_golongan;
		$data['jad_akhir'] = $jad_akhir;
		$data['nm_jen_akhir'] = $jen_jad_akhir;
		$data['bidil_jad'] = $q_bidil_jad;
		$data['jad_usulan'] = $no_jad_usulan;
		$data['data_dasar'] = $data_dasar;
		$data['q_jabatan'] = $q_jabatan;
		$data['q_kap_jabatan'] = $q_kap_jabatan;
		$data['judul'] = $status;

		//$data['jabatan_no'] = $jabatan_no;
		$data['golongan'] = $this->tampil_golongan();
		$data['jabatan'] = $this->tampil_jabat();
		$data['status_id'] = $this->statusUsulan($sts_usulan);

		Vusulan('Show_cek', $data);
	}


	function get_no_pak()
	{

		$bulan = date('m');

		$tahun = date('Y');
		$nomor = "/LL3/KP.05.01/" . $tahun;

		//$query = $this->db->query("SELECT MAX(LEFT(tmt_no,3)) AS maxNo,tmt_tgl FROM usulans WHERE YEAR(tmt_tgl)='$tahun' AND MONTH(tmt_tgl)='$bulan'");
		$norut = $this->db->query("SELECT MAX(CAST(SUBSTRING_INDEX(a.`tmt_no`,'/',1) AS UNSIGNED)) AS nomax FROM `usulans` a WHERE tahun_nopak='$tahun'")->row();

		//$norut = $this->db->query("SELECT a.`no`,LEFT(a.`sk_no`,LENGTH(a.`sk_no`)-18) AS nomax, a.`sk_no`,a.`sk_tgl`,a.`sk_tmt` FROM `usulans` a WHERE RIGHT(a.`sk_no`,4)='$tahun' AND 
		//a.`sk_no` LIKE '%KP.05.01%' ORDER BY a.`sk_no` DESC LIMIT 1")->row();

		$no = intval($norut->nomax);
		$noUrut = $no + 1;
		//$kode =  sprintf("%03s", $noUrut);
		$nomorbaru = $noUrut . $nomor;
		return $nomorbaru;
	}

	function noBaru($no_usulan)
	{
		$tahun = date('Y');
		$user = $this->session->userdata('nama');
		$user_no = $this->session->userdata('no');
		$nopak = $this->get_no_pak();
		$nsk = explode('/', $nopak, 1);
		$no_sk = $nsk[0] + 1;
		$n = substr($nopak, -18);
		$sk_no = $no_sk . $n;
		$no_pak = "UPDATE usulans SET tmt_no='$nopak',tahun_nopak='$tahun', user_updated_no='$user' where no='$no_usulan'";
		$this->db->query($no_pak);
		$this->session->set_flashdata('flash', 'No PAK Telah Diupdate');
		redirect(base_url() . 'ketenagaan/ketenagaan/editPakcek/' . $no_usulan);
	}

	

	function get_kum_lama($no)
	{


		$kum_jab_lama = $this->db->query("SELECT a.*,b.`no`,b.`dosen_no`,b.`jabatan_no` FROM `jabatans` a RIGHT JOIN `usulans` b ON a.`kode`=b.`jabatan_no` WHERE b.`no`='$no' ")->row();


		if (isset($kum_jab_lama->kum)) {
			$kum_jab = number_format($kum_jab_lama->kum, 2);
		} else {
			$kum_jab = '0.00';
		}
		return  $kum_jab;
	}

	function get_kum_penilai($no)
	{


		$ptotal_all = $this->db->query("SELECT
	a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
 FROM
   dupaks AS a,
   `usulan_dupaks` AS b
 WHERE b.`dupak_no` = a.`no`
   AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('1','2','3','4','5')
  GROUP BY b.`usulan_no`")->row();

		$kumbaru = $ptotal_all->kum_penilai_baru;

		return $kumbaru;
	}

	function get_kum_lebihan($no)
	{
		$resume = $this->db->query("SELECT a.*,
        b.`no` as nodos,
        b.`jabatan_no`,
        b.`jabatan_tgl`,
        b.`pengangkatan_tgl`,
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
        b.`nip`,
        b.`nidn`,
        b.`nidk`,        
        c.`instansi_kode`,
        c.`nama_prodi`,
        d.`nama_instansi`,
        b.`bidang_ilmu_kode`,
        g.`nama_bidang`,
        a.user_penilai_tgl,
        d.kota,
        b.golongan_kode,
        c.jenjang_id as prodi_jen
        FROM
        usulans AS a,
        dosens AS b,
        `prodis` AS c,
        `instansis` AS d,
        ikatan_kerjas AS e,
        `jenjangs` AS f,
        `bidang_ilmus` AS g
        WHERE a.`no` = '$no'
        AND a.`dosen_no` = b.`no`
        AND b.`prodi_kode` = c.`kode`
        AND c.`instansi_kode` = d.`kode`
        AND b.`ikatan_kerja_kode` = e.`kode`
        AND b.`jenjang_id`=f.`id`
        AND b.`bidang_ilmu_kode`=g.`kode`")->row();

		$nodos = $resume->nodos;
		$g_depan = ltrim($resume->gelar_depan, " ,");

		$resume_jabatan = $this->db->query("SELECT
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
                            WHERE a.`no` = '$nodos'
                            AND a.`jabatan_no` = b.`kode`
                            AND a.`jenjang_id` = c.`id`")->row();

		if ($resume->jabatan_no <> 31) {
			$r_ak_lama = $this->db->query("SELECT
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
				WHERE a.`dosen_no`= '$resume->nodos'
				  AND a.`jabatan_no`=b.`kode`
				  AND a.`jenjang_id_lama`=c.`id`")->row();
		} else {
			$r_ak_lama = $this->db->query("SELECT
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
				a.`no` = '$resume->nodos' 
				AND a.`jabatan_no` = b.`kode` 
				AND a.`jenjang_id` = c.`id`")->row();
		}

		$r_ak_baru = $this->db->query("SELECT
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
        AND b.`jenjang_id` = d.`id`")->row();

		$dasar = $r_ak_baru->kum - $r_ak_lama->kum;


		if ($r_ak_lama->kum == 0) //jika nilai kum lama = 0
		{
			// $pendidikan = nilai angka kredit dari table jenjangs jabatan_usulan_no 
			$pendidikan = $r_ak_baru->ak;
		} else {
			//jika jejang_id pada dosens = jenjang_id pada usulans
			if ($r_ak_lama->jenjang_id == $r_ak_baru->jenjang_id) {
				$pendidikan = 0;
			} else {
				$pendidikan = $r_ak_baru->ak - $r_ak_lama->ak;
			}
		}

		$kebutuhan = $dasar - $pendidikan;
		if ($kebutuhan <= 0) {
			$kebutuhan = 10;
		} elseif ($pendidikan <= 0) {
			$kebutuhan = $dasar;
		}

		$r_persen = $this->db->query("SELECT
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
       AND b.`jabatan_kode`=c.`kode`")->row();


		$k = $r_persen->pb * 0.01 * $kebutuhan;
		$k4 = $r_persen->pc * 0.01 * $kebutuhan;
		$k5 = $r_persen->pd * 0.01 * $kebutuhan;

		$kat_1 = $this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '1' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();
	$kum_jab_lama = $this->db->query("SELECT a.*,b.`no`,b.`dosen_no`,b.`jabatan_no` FROM `jabatans` a RIGHT JOIN `usulans` b ON a.`kode`=b.`jabatan_no` WHERE b.`no`='$no' ")->row();

		if (isset($kum_jab_lama->kum)) {
			$kum_jab = number_format($kum_jab_lama->kum, 2);
		} else {
			$kum_jab = '0.00';
		}
		if (isset($kat_1->kum_usulan_baru)) {
			$kum_pendidikan = number_format($kat_1->kum_penilai_baru, 2);
		} else {
			$kum_pendidikan = '0.00';
		}

		$kum_diklat = $this->db->query("SELECT * FROM `usulan_dupaks` a WHERE a.`dupak_no`='A0003' AND a.`usulan_no`='$no' ")->row();
		if (isset($kum_diklat->kum_usulan_baru)) {
			$kum_prajab = number_format($kum_diklat->kum_usulan_baru, 2);
		} else {
			$kum_prajab = '-';
		}
		$kat_2 = $this->db->query("SELECT
                     a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                  FROM
                    dupaks AS a,
                    `usulan_dupaks` AS b
                  WHERE b.`dupak_no` = a.`no`
                    AND b.`usulan_no` = '$no'
                    AND a.`dupak_kategori_id` = '2' GROUP BY b.`usulan_no`")->row();
		$kum = '0.00';
		$kat_3 = $this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '3' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();

		$kat_4 = $this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '4' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();

		//cari nilai kategori 4 (PM)
		if ($kat_4->kum_penilai_baru == 0) {
			$kum_k4 = 0;
		} elseif ($kat_4->kum_penilai_baru > $k4) {
			$kum_k4 = number_format($k4, 2);
		} else {
			$kum_k4 = number_format($kat_4->kum_penilai_baru, 2);
		}

		$ptotal = $this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('1','2','3')
                     GROUP BY b.`usulan_no`")->row();

		$kat_5 = $this->db->query("SELECT
                       a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                    FROM
                      dupaks AS a,
                      `usulan_dupaks` AS b
                    WHERE b.`dupak_no` = a.`no`
                      AND b.`usulan_no` = '$no'
                      AND a.`dupak_kategori_id` = '5' GROUP BY b.`usulan_no`,a.`dupak_kategori_id`")->row();

		//cari nilai kategori 5 (penunjang)
		if ($kat_5->kum_penilai_baru == 0) {
			$kum_k5 = 0;
		} elseif ($kat_5->kum_penilai_baru > $k5) {
			$kum_k5 = number_format($k5, 2);
		} else {
			$kum_k5 = number_format($kat_5->kum_penilai_baru, 2);
		}

		$ptotal_all = $this->db->query("SELECT
                           a.*,SUM(b.`kum_penilai_baru`) AS kum_penilai_baru,SUM(b.`kum_usulan_baru`) AS kum_usulan_baru
                        FROM
                          dupaks AS a,
                          `usulan_dupaks` AS b
                        WHERE b.`dupak_no` = a.`no`
                          AND b.`usulan_no` = '$no' AND  a.`dupak_kategori_id` IN ('1','2','3')
                         GROUP BY b.`usulan_no`")->row();
		$resume_jab_usulan = $this->db->query("SELECT
                      a.`no`,
                      c.`nama_jabatans`,
                      c.`kum`,
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
                      AND b.`jenjang_id` = d.`id`")->row();

		$persen = $this->db->query("SELECT
                a.`no`,
                a.`jabatan_no`,
                a.`jabatan_usulan_no`,
                b.`jabatan_kode`,
                c.`kum` AS kum_usulan,
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
                 AND b.`jabatan_kode`=c.`kode`")->row();
		$kum_kebutuhan = $persen->kum_usulan - ($resume_jabatan->kum + $pendidikan);
		$kebutuhan_a = $persen->pa * 0.01 * $kum_kebutuhan;
		$kebutuhan_b = $persen->pb * 0.01 * $kum_kebutuhan;
		$kebutuhan_c = $persen->pc * 0.01 * $kum_kebutuhan;
		$kebutuhan_d = $persen->pd * 0.01 * $kum_kebutuhan;

		/*  $kum_a=69.50;
              $kum_b=56.40;
              $kum_c=5;
              $kum_d=10; */
		if (($kum_k4 + $kum_k5) < ($kebutuhan_c + $kebutuhan_d)) {
			$lebihan_a = $kat_2->kum_penilai_baru -  $kebutuhan_a;
			$lebihan_b = $kat_3->kum_penilai_baru -  $kebutuhan_b;
			$proposional_a = $lebihan_a / ($lebihan_a + $lebihan_b) * (($kebutuhan_c - $kum_k4)
				+ ($kebutuhan_d - $kum_k5));

			$proposional_b = $lebihan_b / ($lebihan_a + $lebihan_b) * (($kebutuhan_c - $kum_k4)
				+ ($kebutuhan_d - $kum_k5));
			//$kum_penelitian = number_format($lebihan_b - $proposional_b, 2); //yang lama 13 april 2022
			$kum_penelitian=number_format($kum_jab + $ptotal_all->kum_penilai_baru + $kum_k4 + $kum_k5, 2);
		} else {
		$kum_penelitian=number_format($kum_jab + $ptotal_all->kum_penilai_baru + $kum_k4 + $kum_k5, 2);
			//$kum_penelitian = number_format($kat_3->kum_penilai_baru -  $kebutuhan_b, 2);//yang lama 13 april 2022
		}

		return $kum_penelitian;
	}

	function get_kum_usulan_jad($no_jfa_usulan)
	{


		$q_usulan_jfa = $this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum
	 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jfa_usulan'")->row();

		$nm_jad_usul = $q_usulan_jfa->nm_jabatan;
		$jen_jad_usulan = $q_usulan_jfa->nm_jenjang;
		$kum_jad_usulan = $q_usulan_jfa->kum;
		$jad_usulan = $nm_jad_usul;
		// $label_kum=$nm_jad_akhir.'  dengan angka kredit sebesar '.$kum_jad_akhir.' ('.$this->terbilang($kum_jad_akhir).')';

		return $kum_jad_usulan;
	}

	function get_jad_usulan($no_jfa_usulan)
	{


		$q_usulan_jfa = $this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum
	 FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jfa_usulan'")->row();

		$nm_jad_usul = $q_usulan_jfa->nm_jabatan;
		$jen_jad_usulan = $q_usulan_jfa->nm_jenjang;
		$kum_jad_usulan = $q_usulan_jfa->kum;
		$jad_usulan = $nm_jad_usul . ' ' . $kum_jad_usulan . ' (' . $jen_jad_usulan . ')';

		return $jad_usulan;
	}
}
