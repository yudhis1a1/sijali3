<?php
defined('BASEPATH') or exit('No direct script access allowed');



/**
 * @author akil
 * @version 1.0
 * @created 13-Mar-2016 20:19:38
 */
class Usulan extends MX_Controller
{


	function __construct()
	{
		$username = $this->session->userdata('username');
		$this->load->model('draft');
		$this->load->model('dupak');
		// $this->load->model('M_monitor');
		$this->load->helper(array('url', 'download', 'date_helper'));
		$this->load->helper('date_helper');
		parent::__construct();


		if ($this->session->userdata('status') != "login") {
			redirect(base_url() . 'login/login?pesan=belumlogin');
		}
	}

	// public function pddikti()
	// {
	// 	$this->dbpddikti = $this->load->database('dbpddikti', TRUE);

	// 	$d = $this->dbpddikti->query("select * from sdm where nidn='0415089001'")->row();
	// 	echo "$d->nidn";
	// }

	function __destruct()
	{
	}
	function phpinfo()
	{
		phpinfo();
	}
	function logout()
	{
		$this->session->sess_destroy();
		// 	 echo "<script>window.location.href='". base_url()."akun/login';</script>";

		redirect(base_url('login/login?pesan=logout'));
	}

	public function cari_dosen($nama, $id_pt)
	{
		$isian = file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/dosen_pt.php?nama=' . $nama . '&id_pt=' . $id_pt);
		$hasil = json_decode($isian, true);

		foreach ($hasil as $hasil) {
			$id_sdm 			= $hasil["id"];
			$nama 				= addslashes($hasil["nama"]);
			$nidn 				= $hasil["nidn"];
			$jabatan_no 		= $hasil["jabatan_fungsional"]["id"];

			echo "id_sdm = $id_sdm<br>";
			echo "nama = $nama<br>";
			echo "nidn = $nidn<br>";
			echo "jabatan_no = $jabatan_no<br><br>";
		}
	}

	public function update_miror($nidn_dos)
	{
		$this->db2 	= $this->load->database('db2', TRUE);
		$username 	= $this->session->userdata('username');
		$user_no  	= $this->session->userdata('no');

		$isian = file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/dosen.php?nidn=' . $nidn_dos);
		$hasil = json_decode($isian, true);

		foreach ($hasil as $h) {
			$no 				= $h['id'];
			$nip 				= $h['nip'];
			$nama 				= addslashes($h['nama']);

			$pend_ter 			= $h['pendidikan_terakhir'];
			$cjp				= $this->db->query("SELECT * FROM jenjang_pendidikan WHERE nm_jenj_didik='$pend_ter'")->row();
			$jenjang_id 		= $cjp->id_jenj_didik;

			$ikatan_kerja_kode 	= $h['ikatan_kerja']['id'];
			$golongan_kode 		= $h['pangkat_golongan']['id'];
			$jabatan_no_now		= $h['jabatan_fungsional']['id'];

			if ($jabatan_no_now == '') {
				$jabatan_no_now = '31';
			} else {
				$jabatan_no_now = $jabatan_no_now;
			}

			$lahir_tgl 			= $h['tgl_lahir'];
			$lahir_tempat 		= $h['tempat_lahir'];
			$nik 				= $h['nik'];
			$npwp 				= $h['npwp'];
			$no_hp 				= $h['handphone'];
			$prodi_kode 		= $h['id_prodi'];
			$kode_prodi 		= $h['kode_prodi'];
			$nm_prodi 			= $h['nm_prodi'];
			$kode_pt 			= $h['kode_pt'];
			$tmt_sk_pengangkatan = $h['tmt_sk_pengangkatan'];
			$jk 				= $h['jenis_kelamin'];

			//awal proses update jafung dosen 
			$this->db->query("DELETE FROM api_jafung WHERE dosen_no='$no'");

			$ijab 	= file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/jafung.php?nidn=' . $nidn_dos);
			$jb 	= json_decode($ijab, true);

			foreach ($jb as $ja) {
				$id_jafung 		= $ja['id'];
				$jabatan_no 	= $ja['jabfung']['id'];
				$nm_jafung 		= $ja['jabfung']['nama'];
				$ak 			= $ja['jabfung']['angka_kredit'];
				$no_sk_jafung 	= $ja['sk_jabfung'];
				$tmt_sk_jabfung = $ja['tmt_sk_jabfung'];
				$last_update 	= $ja['last_update'];

				$this->db->query("INSERT INTO `api_jafung` (
									`id_jafung`,
									`dosen_no`,
									`jabatan_no`,
									`nm_jafung`,
									`ak`,
									`no_sk_jafung`,
									`tmt_sk_jabfung`,
									`last_update`
								)
								VALUES
									(
									'$id_jafung',
									'$no',
									'$jabatan_no',
									'$nm_jafung',
									'$ak',
									'$no_sk_jafung',
									'$tmt_sk_jabfung',
									'$last_update'
									)");
			}

			$djab	= $this->db->query("SELECT
											*
										FROM
											api_jafung
										WHERE `dosen_no` = '$no'
										ORDER BY `jabatan_no` DESC
										LIMIT 1")->row();
			//akhir proses update jafung dosen 

			//awal proses update kepangkatan dosen 
			$this->db->query("DELETE FROM api_kepangkatan WHERE dosen_no='$no'");

			$ipang 	= file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/kepangkatan.php?nidn=' . $nidn_dos);
			$jpang 	= json_decode($ipang, true);

			foreach ($jpang as $jang) {
				$id_kepangkatan = $jang['id'];
				$golongan_no 	= $jang['pangkat_gol']['id'];
				$nm_golongan	= $jang['pangkat_gol']['golongan'];
				$nm_pangkat		= $jang['pangkat_gol']['pangkat'];
				$no_sk_pangkat 	= $jang['sk_pangkat'];
				$tmt_sk_pangkat = $jang['tmt_sk_pangkat'];
				$tgl_sk_pangkat = $jang['tgl_sk_pangkat'];
				$masa_kerja_thn = $jang['masa_kerja_thn'];
				$masa_kerja_bln = $jang['masa_kerja_bln'];
				$last_update 	= $jang['last_update'];

				$this->db->query("INSERT INTO `api_kepangkatan` (
										`id_kepangkatan`,
										`dosen_no`,
										`golongan_no`,
										`nm_golongan`,
										`nm_pangkat`,
										`no_sk_pangkat`,
										`tgl_sk_pangkat`,
										`tmt_sk_pangkat`,
										`masa_kerja_thn`,
										`masa_kerja_bln`,
										`last_update`
									)
									VALUES
										(
										'$id_kepangkatan',
										'$no',
										'$golongan_no',
										'$nm_golongan',
										'$nm_pangkat',
										'$no_sk_pangkat',
										'$tgl_sk_pangkat',
										'$tmt_sk_pangkat',
										'$masa_kerja_thn',
										'$masa_kerja_bln',
										'$last_update'
										)");
			}

			$dpan	= $this->db->query("SELECT
											*
										FROM
											api_kepangkatan
										WHERE `dosen_no` = '$no'
										ORDER BY `golongan_no` DESC
										LIMIT 1")->row();
			//akhir proses kepangkatan dosen 

			//awal proses update sertifikasi dosen 
			$this->db->query("DELETE FROM api_sertifikasi WHERE dosen_no='$no'");

			$iser 	= file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/sertifikasi.php?nidn=' . $nidn_dos);
			$dser 	= json_decode($iser, true);

			foreach ($dser as $ds) {
				$id_sertifikasi = $ds['id'];
				$id_jenis_sertifikasi = $ds['jenis_sertifikasi']['id'];
				$nm_sertifikasi	= $ds['jenis_sertifikasi']['nama'];
				$id_bidang_studi = $ds['bidang_studi']['id'];
				$nm_bidang_studi = $ds['bidang_studi']['nama'];
				$tahun 			= $ds['tahun'];
				$sk_sertifikasi = $ds['sk_sertifikasi'];
				$last_update 	= $ds['last_update'];


				$this->db->query("INSERT INTO `api_sertifikasi` (
									`id_sertifikasi`,
									dosen_no,
									`id_jenis_sertifikasi`,
									`nm_sertifikasi`,
									`id_bidang_studi`,
									`nm_bidang_studi`,
									`tahun`,
									`sk_sertifikasi`,
									`last_update`
								)
								VALUES
									(
									'$id_sertifikasi',
									'$no',
									'$id_jenis_sertifikasi',
									'$nm_sertifikasi',
									'$id_bidang_studi',
									'$nm_bidang_studi',
									'$tahun',
									'$sk_sertifikasi',
									'$last_update'
									)");
			}

			$dser	= $this->db->query("SELECT
											*
										FROM
											`api_sertifikasi`
										WHERE `id_jenis_sertifikasi` = '1'
											AND `dosen_no` = '$no'
										LIMIT 1")->row();
			//akhir proses sertifikasi dosen 

			//AWAL CARI FAKULTAS DI MIRROR
			$sql2 = $this->db2->query("SELECT * FROM sms WHERE id_sms= (SELECT id_induk_sms FROM sms WHERE id_sms='$prodi_kode')")->row();
			//AKHIR CARI FAKULTAS DI MIRROR

			//AWAL CARI BIDANG ILMU KODE 
			$dbik = $this->db->query("SELECT
										`thn_lulus`,
										`id_jenj_didik`,
										`id_bid_studi`
									FROM
										rwy_pend_formal
									WHERE id_sdm = '$no'
									ORDER BY `id_jenj_didik` DESC,
										`thn_lulus` DESC
									LIMIT 1")->row();
			//AKHIR CARI BIDANG ILMU KODE

			// AWAL CARI DATA NO SERDIK (nrg) DI MIRROR
			$dnodos = $this->db2->query("SELECT TOP 1
											id_sdm AS id_sdm,
											nrg AS no_serdik,
											id_bid_studi AS id_bid_studi 
										FROM
											rwy_sertifikasi 
										WHERE
											nrg IS NOT NULL 
											AND soft_delete = '0' 
											AND id_jns_sert = '1' 
											AND id_sdm = '$no'")->row();
			// AKHIR CARI DATA NO SERDIK (nrg) DI MIRROR

			$this->db->query("UPDATE
							dosens
						SET
							nip 				= '$nip',
							nama		 		= '$nama',
							jenjang_id 			= '$jenjang_id',
							bidang_ilmu_kode 	= '$dbik->id_bid_studi',
							ikatan_kerja_kode 	= '$ikatan_kerja_kode',
							golongan_kode 		= '$golongan_kode',
							jabatan_no 			= '$jabatan_no_now',
							prodi_kode 			= '$prodi_kode',
							lahir_tgl 			= '$lahir_tgl',
							lahir_tempat 		= '$lahir_tempat',
							jk 					= '$jk',
							nik 				= '$nik',
							npwp 				= '$npwp',
							no_hp 				= '$no_hp',
							nm_fakultas 		= '$sql2->nm_lemb',
							pengangkatan_tgl 	= '$tmt_sk_pengangkatan',
							golongan_tgl 		= '$dpan->tmt_sk_pangkat',
							jabatan_tgl 		= '$djab->tmt_sk_jabfung',
							masa_kerja_gol_thn 	= '$dpan->masa_kerja_thn',
							masa_kerja_gol_bln 	= '$dpan->masa_kerja_bln',
							no_serdik 			= '$dnodos->no_serdik',
							sinkron_at 			= NOW()
						WHERE nidn = '$nidn_dos'");

			$this->db->query("UPDATE
							users
						SET
							instansi_kode 			= '$kode_pt'
						WHERE username = '$nidn_dos'");

			$this->db->query("UPDATE
								usulans
							SET
								jabatan_no 			= '$jabatan_no_now',
								jenjang_id_baru 	= '$jenjang_id',
								user_updated_no		= '$user_no'
							WHERE dosen_no = '$no'
								AND usulan_status_id IN ('1','2')");
			$this->db->query("REPLACE INTO `prodis` (
								`kode`,
								`prodi_kode`,
								`instansi_kode`,
								`nama_prodi`,
								`aktif`,
								create_at,
								update_at
							)
							VALUES
								(
								'$prodi_kode',
								'$kode_prodi',
								'$kode_pt',
								'$nm_prodi',
								'1',
								'0000-00-00',
								'0000-00-00'
								);
							");
		}
	}

	public function update_rwy_pend($nidn_dos)
	{
		$username 	= $this->session->userdata('username');

		$sql_dos 	= $this->db->query("SELECT no FROM dosens WHERE nidn='$nidn_dos'")->row();
		$no 		= $sql_dos->no;

		$this->db->query("DELETE FROM rwy_pend_formal WHERE id_sdm='$no'");

		$isian = file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/pendidikan_dosen.php?nidn=' . $no);
		$hasil = json_decode($isian, true);

		foreach ($hasil as $h) {
			$id_rwy_didik_formal = $h['id'];
			$nm_sp_formal		= $h['pt'];
			$thn_masuk			= $h['thn_masuk'];
			$thn_lulus			= $h['thn_lulus'];
			$id_bid_studi		= $h['bidang_studi']['id'];
			$id_jenj_didik		= $h['jenjang_didik']['id'];
			$id_gelar_akad		= $h['gelar']['id'];
			$id_sms				= $h['prodi']['id'];
			$prodi 				= addslashes($h['prodi']['nama']);

			$perintah = "INSERT INTO `rwy_pend_formal` (
								`id_rwy_didik_formal`,
								`id_sdm`,
								`nm_sp_formal`,
								`thn_masuk`,
								`thn_lulus`,
								`id_bid_studi`,
								`id_jenj_didik`,
								`id_gelar_akad`,
								`id_sms`,
								`prodi`,
								sinkron_at
							)
							VALUES
								(
								'$id_rwy_didik_formal',
								'$no',
								'$nm_sp_formal',
								'$thn_masuk',
								'$thn_lulus',
								'$id_bid_studi',
								'$id_jenj_didik',
								'$id_gelar_akad',
								'$id_sms',
								'$prodi',
								NOW()
								)";
			$tes = $this->db->query($perintah);
		}

		$gel_bel = $this->db->query("SELECT
									REPLACE(
										GROUP_CONCAT(`gelar_belakang`),
										',',
										', '
									) AS gelar_belakang
									FROM
									v_gelar_belakang
									WHERE nidn = '$nidn_dos'")->row();

		$this->db->query("UPDATE dosens set gelar_belakang='$gel_bel->gelar_belakang' WHERE nidn = '$nidn_dos'");

		$gel_dep = $this->db->query("SELECT
							  REPLACE(
								GROUP_CONCAT(`gelar_depan`),
								',',
								', '
							  ) AS gelar_depan
							FROM
							  v_gelar_depan
							WHERE nidn = '$nidn_dos'")->row();

		$this->db->query("UPDATE dosens set gelar_depan='$gel_dep->gelar_depan' WHERE nidn = '$nidn_dos'");

		$usulans = $this->db->query("SELECT `no` FROM usulans WHERE `dosen_no` = '$no' AND usulan_status_id<>'9'")->row();

		$this->db->query("REPLACE INTO `rwy_pak` (
						`no_dosen`,
						`no_usulan`,
						`gelar_depan`,
						`gelar_belakang`
						)
						VALUES
						(
							'$no',
							'$usulans->no',
							'$gel_dep->gelar_depan',
							'$gel_bel->gelar_belakang'
						)");

		$this->db->query("DELETE from rwy_pend_pak WHERE no_dosen='$no'");

		$sql_rwy_pak = $this->db->query("SELECT * FROM v_rwy_pend_pak WHERE `no_dosen` = '$no'");
		foreach ($sql_rwy_pak->result() as $data_rwy_pak) {
			$prodi_pak 		= addslashes($data_rwy_pak->prodi_pak);
			$nm_prodi 		= addslashes($data_rwy_pak->prodi);
			$institusi_pak 	= addslashes($data_rwy_pak->institusi_pak);
			$nipd 			= addslashes($data_rwy_pak->nipd);

			$perintah_rwy_pend_pak = "REPLACE INTO `rwy_pend_pak` (
								  `no_dosen`,
								  `id_rwy_didik_formal`,
								  `no_usulan`,
								  `id_jenjang_pak`,
								  `jenjang_pak`,
								  `prodi_pak`,
								  `prodi`,
								  `institusi_pak`,
								  `tgl_lulus_pak`,
								  `id_sms`,
								  `id_bid_studi`,
								  `thn_lulus`,
								  `nipd`
								)
								VALUES
								  (
									'$data_rwy_pak->no_dosen',
									'$data_rwy_pak->id_rwy_didik_formal',
									'$data_rwy_pak->no_usulan',
									'$data_rwy_pak->id_jenjang_pak',
									'$data_rwy_pak->jenjang_pak',
									'$prodi_pak',
									'$nm_prodi',
									'$institusi_pak',
									'$data_rwy_pak->tgl_lulus_pak',
									'$data_rwy_pak->id_sms',
									'$data_rwy_pak->id_bid_studi',
									'$data_rwy_pak->thn_lulus',
									'$nipd'
								  )";
			$this->db->query($perintah_rwy_pend_pak);
		}

		//AWAL CARI BIDANG ILMU KODE 
		$dbik = $this->db->query("SELECT
										`thn_lulus`,
										`id_jenj_didik`,
										`id_bid_studi`
									FROM
										rwy_pend_formal
									WHERE id_sdm = '$no'
									ORDER BY `id_jenj_didik` DESC,
										`thn_lulus` DESC
									LIMIT 1")->row();
		//AKHIR CARI BIDANG ILMU KODE
		$this->db->query("UPDATE dosens SET bidang_ilmu_kode 	= '$dbik->id_bid_studi' WHERE no = '$no'");
	}

	public function index()
	{
		$datax 			= $this->db->query("SELECT * from berita_beranda where tampil='1' ")->row_array();

		$role 			= $this->session->userdata('role');
		if ($role <> '3') {
			$jml_us			= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan")->row();
			$jml_us_baru	= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='3'")->row();
			$jml_penilai	= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='5'")->row();
			$jml_pen_penilai = $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='12'")->row();
			$jml_ptk		= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='6'")->row();
			$jml_hkt		= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='8'")->row();
			$jml_dikti		= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='7'")->row();
			$jml_selesai	= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='9'")->row();
			$jml_us_dikti	= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='11'")->row();
			$jml_val_adm	= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='13'")->row();
			$jml_val_pak	= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='14'")->row();
			$jml_ralat		= $this->db->query("SELECT COUNT(*) AS jml FROM v_total_usulan WHERE `usulan_status_id`='15'")->row();


			$data['jml_us'] 		= $jml_us;
			$data['jml_us_baru'] 	= $jml_us_baru;
			$data['jml_penilai'] 	= $jml_penilai;
			$data['jml_pen_penilai'] = $jml_pen_penilai;
			$data['jml_ptk'] 		= $jml_ptk;
			$data['jml_hkt'] 		= $jml_hkt;
			$data['jml_dikti'] 		= $jml_dikti;
			$data['jml_selesai'] 	= $jml_selesai;
			$data['jml_us_dikti'] 	= $jml_us_dikti;
			$data['jml_val_adm'] 	= $jml_val_adm;
			$data['jml_val_pak'] 	= $jml_val_pak;
			$data['jml_ralat'] 		= $jml_ralat;
		}

		$data['judul'] 	= $datax['judul'];
		$data['isi'] 	= $datax['isi'];
		$data['id'] 	= $datax['id'];

		$data['status'] = $this->session->userdata('status');
		$data['role'] 	= $role;
		vusulan('beranda', $data);
	}



	public function update_rwy_pend_lama($nidn_dos)
	{
		$this->db2 = $this->load->database('db2', TRUE);
		$username = $this->session->userdata('username');

		$sql_dos = $this->db->query("SELECT no from dosens where nidn='$nidn_dos'")->row();
		$no = $sql_dos->no;

		$hapus = "DELETE from rwy_pend_formal WHERE id_sdm='$no'";
		$hap = $this->db->query($hapus);

		$sql = $this->db2->query("SELECT * FROM v_new_rwy_pend_formal WHERE id_sdm='$no'");
		foreach ($sql->result() as $data) {
			$nipd = addslashes($data->nipd);
			$no_ijazah = addslashes($data->no_ijazah);
			$fak = addslashes($data->fak);
			$judul_tesis = addslashes($data->judul_tesis);
			$prodi = addslashes($data->prodi);

			$perintah = "INSERT INTO `rwy_pend_formal` (
					  `id_rwy_didik_formal`,
					  `id_sdm`,
					  `npsn`,
					  `nm_sp_formal`,
					  `fak`,
					  `thn_masuk`,
					  `thn_lulus`,
					  `nipd`,
					  `tgl_lulus`,
					  `id_bid_studi`,
					  `id_jenj_didik`,
					  `id_gelar_akad`,
					  `id_sms`,
					  `prodi`,
					  sinkron_at
					)
					VALUES
					  (
						'$data->id_rwy_didik_formal',
						'$data->id_sdm',
						'$data->npsn',
						'$data->nm_sp_formal',
						'$fak',
						'$data->thn_masuk',
						'$data->thn_lulus',
						'$nipd',
						'$data->tgl_lulus',
						'$data->id_bid_studi',
						'$data->id_jenj_didik',
						'$data->id_gelar_akad',
						'$data->id_sms',
						'$prodi',
						NOW()
					  )";
			$tes = $this->db->query($perintah);
		}

		$gel_bel = $this->db->query("SELECT
							  REPLACE(
								GROUP_CONCAT(`gelar_belakang`),
								',',
								', '
							  ) AS gelar_belakang
							FROM
							  v_gelar_belakang
							WHERE nidn = '$nidn_dos'")->row();

		$up_gel_bel = "UPDATE dosens set gelar_belakang='$gel_bel->gelar_belakang' WHERE nidn = '$nidn_dos'";
		$this->db->query($up_gel_bel);

		$gel_dep = $this->db->query("SELECT
							  REPLACE(
								GROUP_CONCAT(`gelar_depan`),
								',',
								', '
							  ) AS gelar_depan
							FROM
							  v_gelar_depan
							WHERE nidn = '$nidn_dos'")->row();

		$up_gel_dep = "UPDATE dosens set gelar_depan='$gel_dep->gelar_depan' WHERE nidn = '$nidn_dos'";
		$this->db->query($up_gel_dep);

		$usulans = $this->db->query("SELECT `no` FROM usulans WHERE `dosen_no` = '$no'")->row();

		$rwy_pak = "REPLACE INTO `rwy_pak` (
			  `no_dosen`,
			  `no_usulan`,
			  `gelar_depan`,
			  `gelar_belakang`
			)
			VALUES
			  (
				'$no',
				'$usulans->no',
				'$gel_dep->gelar_depan',
				'$gel_bel->gelar_belakang'
			  )";
		$this->db->query($rwy_pak);

		$hapus_rwy_pak = "DELETE from rwy_pend_pak WHERE no_dosen='$no'";
		$this->db->query($hapus_rwy_pak);

		$sql_rwy_pak = $this->db->query("SELECT * FROM v_rwy_pend_pak WHERE `no_dosen` = '$no'");
		foreach ($sql_rwy_pak->result() as $data_rwy_pak) {
			$prodi_pak 		= addslashes($data_rwy_pak->prodi_pak);
			$nm_prodi 		= addslashes($data_rwy_pak->prodi);
			$institusi_pak 	= addslashes($data_rwy_pak->institusi_pak);
			$nipd 			= addslashes($data_rwy_pak->nipd);

			$perintah_rwy_pend_pak = "INSERT INTO `rwy_pend_pak` (
								  `no_dosen`,
								  `id_rwy_didik_formal`,
								  `no_usulan`,
								  `id_jenjang_pak`,
								  `jenjang_pak`,
								  `prodi_pak`,
								  `prodi`,
								  `institusi_pak`,
								  `tgl_lulus_pak`,
								  `id_sms`,
								  `id_bid_studi`,
								  `thn_lulus`,
								  `nipd`
								)
								VALUES
								  (
									'$data_rwy_pak->no_dosen',
									'$data_rwy_pak->id_rwy_didik_formal',
									'$data_rwy_pak->no_usulan',
									'$data_rwy_pak->id_jenjang_pak',
									'$data_rwy_pak->jenjang_pak',
									'$prodi_pak',
									'$nm_prodi',
									'$institusi_pak',
									'$data_rwy_pak->tgl_lulus_pak',
									'$data_rwy_pak->id_sms',
									'$data_rwy_pak->id_bid_studi',
									'$data_rwy_pak->thn_lulus',
									'$nipd'
								  )";
			$this->db->query($perintah_rwy_pend_pak);
		}
	}

	// public function update_ajar_miror()
	// {
	// 	$this->db2 = $this->load->database('db2', TRUE);
	// 	$username = $this->session->userdata('username');

	// 	$hapus = "DELETE from ajar_dosen WHERE NIDN='$username'";
	// 	$hap = $this->db->query($hapus);
	// 	if ($hap) {
	// 		echo "hapus berhasil<br>";
	// 	} else {
	// 		echo "hapus gagal";
	// 	}

	// 	$sql = $this->db2->query("SELECT * FROM v_ajar_dosen_sijali WHERE NIDN='$username'");
	// 	foreach ($sql->result() as $data) {

	// 		$NMDSN = addslashes($data->NMDSN);
	// 		$NMMK = addslashes($data->NMMK);

	// 		$perintah = "INSERT INTO `ajar_dosen` (
	// 					  `SEMESTER`,
	// 					  `NMDSN`,
	// 					  `NIDN`,
	// 					  `JENJANG_ID`,
	// 					  `PENDTERAKHIR`,
	// 					  `KODEMK`,
	// 					  `NMMK`,
	// 					  `SKS`,
	// 					  `KELAS`,
	// 					  `KODEPT`,
	// 					  `NMPT`,
	// 					  `KODEPS`,
	// 					  `NMPS`,
	// 					  `REN_TM`,
	// 					  `REN_REAL`,
	// 					  `id_reg_ptk`,
	// 					  `SKS_DOS`,
	// 					  sinkron_at
	// 					)
	// 					VALUES
	// 					  (
	// 						'$data->SEMESTER',
	// 						'$NMDSN',
	// 						'$data->NIDN',
	// 						'$data->JENJANG_ID',
	// 						'$data->PENDTERAKHIR',
	// 						'$data->KODEMK',
	// 						'$NMMK',
	// 						'$data->SKS',
	// 						'$data->KELAS',
	// 						'$data->KODEPT',
	// 						'$data->NMPT',
	// 						'$data->KODEPS',
	// 						'$data->NMPS',
	// 						'$data->REN_TM',
	// 						'$data->REN_REAL',
	// 						'$data->id_reg_ptk',
	// 						'$data->SKS_DOS',
	// 						NOW()
	// 					  )";
	// 		$tes = $this->db->query($perintah);
	// 	}

	// 	if ($tes) {
	// 		echo "sukses";
	// 	} else {
	// 		echo "gagal";
	// 	}
	// }

	public function update_ajar_miror()
	{
		$username 	= $this->session->userdata('username');
		$hapus 		= "DELETE from ajar_dosen WHERE NIDN='$username'";
		$hap 		= $this->db->query($hapus);
		if ($hap) {
			echo "hapus berhasil<br>";
		} else {
			echo "hapus gagal";
		}

		$do		  = $this->db->query("SELECT * FROM dosens WHERE nidn='$username'")->row();

		$nama_dosen = addslashes($do->nama);

		$isian = file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/mengajar.php?nidn=' . $username);
		$hasil = json_decode($isian, true);

		foreach ($hasil as $hasil) {
			$SEMESTER 			= $hasil["semester"];
			$JENJANG_ID 		= $hasil["prodi"]["jenjang_didik"]["id"];
			$PENDTERAKHIR 		= $hasil["prodi"]["jenjang_didik"]["nama"];
			$KODEMK 			= $hasil["kode_mk"];
			$NMPT 				= addslashes($hasil["pt"]["nama"]);
			$NMMK 				= addslashes($hasil["nama_mk"]);
			$SKS 				= $hasil["sks_ajar"];
			$KELAS 				= $hasil["kelas"];
			$KODEPT 			= $hasil["pt"]["kode"];
			$NMPT 				= addslashes($hasil["pt"]["nama"]);
			$KODEPS 			= $hasil["prodi"]["kode"];
			$NMPS 				= addslashes($hasil["prodi"]["nama"]);

			$perintah = "INSERT INTO `ajar_dosen` (
						  `SEMESTER`,
						  `NMDSN`,
						  `NIDN`,
						  `JENJANG_ID`,
						  `PENDTERAKHIR`,
						  `KODEMK`,
						  `NMMK`,
						  `SKS`,
						  `KELAS`,
						  `KODEPT`,
						  `NMPT`,
						  `KODEPS`,
						  `NMPS`,
						  sinkron_at
						)
						VALUES
						  (
							'$SEMESTER',
							'$nama_dosen',
							'$username',
							'$JENJANG_ID',
							'$PENDTERAKHIR',
							'$KODEMK',
							'$NMMK',
							'$SKS',
							'$KELAS',
							'$KODEPT',
							'$NMPT',
							'$KODEPS',
							'$NMPS',
							NOW()
						  )";
			$tes = $this->db->query($perintah);
		}

		if ($tes) {
			echo "sukses";
		} else {
			echo "gagal";
		}
	}

	function ganti_password()
	{
		$pass_baru = addslashes($this->input->post('pass_baru'));
		$ulang_pass = addslashes($this->input->post('ulang_pass'));
		$email = $this->session->userdata('email');
		$nama = $this->session->userdata('nama');
		$username = $this->session->userdata('username');

		$this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass', 'Ulangi Password Baru', 'required');
		if ($this->form_validation->run() != false) {
			$data = array('password' => md5($pass_baru), 'password_64' => base64_encode($pass_baru));
			$w = array('username' => $this->session->userdata('username'));
			$this->db->where($w);
			$this->db->update('users', $data);
			$config = array(
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'protocol'  => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_user' => 'sijali3.kemdikbud@gmail.com',
				'smtp_pass'   => 'spkdxzbfeicidhjh',
				'smtp_crypto' => 'tls',
				'smtp_port'   => 587,
				'crlf'    => "\r\n",
				'newline' => "\r\n"
			);
			$this->load->library('email', $config);
			$this->email->from('sijali3.kemdikbud@gmail.com', 'SIJALI LLDIKTI 3 - KEMDIKBUD');
			$this->email->to($email);
			$this->email->subject('Perubahan Password Baru');
			$this->email->message("<div style='border:1px solid #dcdcdc;border-radius:3px;width:400px'><div style='float:left;padding:16px'><img src='https://silat-lldikti3.kemdikbud.go.id/assets/images/logo/logo-ristek-2.png' style='vertical-align:middle' class='CToWUd' width='56' height='56'></div><div style='padding:16px 16px 16px 88px;min-height:56px'><div style='font-size:20px;line-height:24px;text-decoration:none;color:#1a0dab'>" . $nama . "</div><div>" . $email . "</div><div style='color:#666'><div style='line-height:16px'>&nbsp;</div><div>Username      : " . $username . "</div><div>Password Baru : " . $ulang_pass . "</div><div></div></div></div></div>");
			$this->email->send();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url() . 'usulan');
		} else {
			$this->session->set_flashdata('error', 'Password tidak sama.');
			redirect(base_url() . 'usulan');
		}
	}


	public function draft()
	{

		$username = $this->session->userdata('username');
		$role = $this->session->userdata('role');
		$instansi = $this->session->userdata('instansi');


		$data['dosen'] = $this->draft->get_draft($username, $role, $instansi);
		$q_cek = $this->db->query("SELECT
								  a.`no`,
								  a.dosen_no,
								  b.nidn
								FROM
								  usulans a
								  JOIN dosens b
									ON a.dosen_no = b.no
								WHERE b.nidn = '$username'
								AND `usulan_status_id`NOT IN ('9','0');")->row();

		$cek_jab_no = $this->db->query("SELECT * from dosens where nidn='$username'")->row();
		$jabatan_no = $cek_jab_no->jabatan_no;

		$data['jabatan_no'] = $jabatan_no;
		$data['username'] 	= $username;
		$data['role'] 		= $role;
		$data['nidn'] 		= $q_cek->nidn;
		$data['filter'] 	= '1';
		$data['judul'] 		= 'Usulan Baru';
		Vusulan('draft', $data);
	}

	public function proses()
	{
		$username = $this->session->userdata('username');
		$role = $this->session->userdata('role');
		$instansi = $this->session->userdata('instansi');

		$cek_jab_no = $this->db->query("SELECT * from dosens where nidn='$username'")->row();

		$q_cek = $this->db->query("SELECT
								  a.`no`,
								  a.dosen_no,
								  b.nidn
								FROM
								  usulans a
								  JOIN dosens b
									ON a.dosen_no = b.no
								WHERE b.nidn = '$username'
								AND `usulan_status_id`NOT IN ('9','0')")->row();

		$data['jabatan_no'] = $cek_jab_no->jabatan_no;
		$data['nidn'] = $q_cek->nidn;
		$data['username'] = $username;
		$data['role'] = $role;
		$data['dosen'] = $this->draft->get_proses($username, $role, $instansi);
		$data['filter'] = '99';
		vusulan('draft', $data);
	}
	public function selesai()
	{
		$username = $this->session->userdata('username');
		$role = $this->session->userdata('role');
		$instansi = $this->session->userdata('instansi');

		$cek_jab_no = $this->db->query("SELECT * from dosens where nidn='$username'")->row();

		$q_cek = $this->db->query("SELECT
								  a.`no`,
								  a.dosen_no,
								  b.nidn
								FROM
								  usulans a
								  JOIN dosens b
									ON a.dosen_no = b.no
								WHERE b.nidn = '$username'
								AND `usulan_status_id`NOT IN ('9','0');")->row();

		$data['jabatan_no'] = $cek_jab_no->jabatan_no;
		$data['nidn'] = $q_cek->nidn;
		$data['username'] = $username;
		$data['role'] = $role;
		$data['dosen'] = $this->draft->get_selesai($username, $role, $instansi);
		$data['filter'] = '9';
		vusulan('draft', $data);
	}

	public function usulans($edit, $no)
	{
		$data_dasar = $this->db->query("SELECT
										a.`no`,
										a.`pimpinan_jabatan`,
										a.no_surat,
										a.tgl_surat,
										a.tempat_surat,
										a.usulan_status_id,
										d.`nidn`,
										d.pengangkatan_tgl,
										d.`nidk`,
										d.`nip`,
										d.`karpeg`,
										d.`nama` AS nm_dosen,
										d.`gelar_depan`,
										d.`gelar_belakang`,
										e.`nama_ikatan` AS nm_ikadin,
										b.`instansi_kode` AS kd_pt,
										c.`nama_instansi` AS nm_pt,
										b.`prodi_kode` AS kd_prodi,
										b.`nama_prodi` AS nm_prodi,
										d.`lahir_tempat`,
										d.`lahir_tgl`,
										d.`jk`,
										d.`golongan_kode`,
										a.tmt_tahun,
										a.tmt_bulan,
										d.`golongan_tgl`,
										d.`jabatan_no`,
										d.`jabatan_tgl`,
										d.`jenjang_id`,
										a.`masa_penilaian_awal`,
										a.`masa_penilaian_akhir`,
										a.`no_surat`,
										a.`jabatan_akhir_no`,
										a.`tempat_surat`,
										a.`jabatan_usulan_no`,
										a.`jenjang_id_lama`,
										a.`usulan_status_id`,
										d.`jabatan_no` AS jad_akhir,
										d.jabatan_tgl,
										d.golongan_kode,
										d.golongan_tgl,
										d.bidang_ilmu_kode,
										a.user_pengusul_keterangan,
										a.pimpinan_nama,
										a.pimpinan_nidn,
										a.pimpinan_nip,
										a.pimpinan_golongan_kode,
										a.pimpinan_jabatan,
										a.pimpinan_unit_kerja,
										a.kaprodi_nama,
										a.kaprodi_nidn,
										a.kaprodi_nip,
										a.kaprodi_golongan_kode,
										a.kaprodi_jabatan,
										a.kaprodi_unit_kerja,
										f.`nama_jenjang`,
										a.`fakultas`,
										a.dosen_no,
										a.pak,
										a.sk_jafung,
										d.sinkron_at,
										d.`ikatan_kerja_kode`
									FROM
										usulans a
										LEFT JOIN dosens d
										ON a.dosen_no = d.no
										LEFT JOIN prodis b
										ON d.prodi_kode = b.kode
										LEFT JOIN `instansis` c
										ON b.instansi_kode = c.kode
										LEFT JOIN `ikatan_kerjas` e
										ON d.`ikatan_kerja_kode` = e.`kode`
										LEFT JOIN `jenjangs` f
										ON d.`jenjang_id` = f.`id`
									WHERE a.no = '$no'")->row();
		$jabatan_akhir_no	= $data_dasar->jabatan_akhir_no;
		$kd_bid				= $data_dasar->bidang_ilmu_kode;
		$kd_jab				= $data_dasar->pimpinan_jabatan;
		$kd_kap_jab			= $data_dasar->kaprodi_jabatan;

		$q_bidil_jad		= $this->db->query("SELECT
													kode,
													nama_bidang
												FROM
													bidang_ilmus
												WHERE kode = '$kd_bid'")->row();

		$q_jabatan 				= $this->db->query("SELECT
														*
													FROM
														reff_japim
													WHERE id = '$kd_jab'")->row();

		$q_kap_jabatan 			= $this->db->query("SELECT
														*
													FROM
														reff_japim
													WHERE id = '$kd_kap_jab'")->row();

		$kd_golongan 			= $data_dasar->golongan_kode;
		$kd_gol_pimpinan 		= $data_dasar->pimpinan_golongan_kode;
		$kaprodi_golongan_kode 	= $data_dasar->kaprodi_golongan_kode;
		$q_golongan 			= $this->db->query("SELECT
														kode,
														kode_gol,
														nama AS nm_golongan
													FROM
														golongans
													WHERE kode = '$kd_golongan'")->row();

		$q_pimpinan_golongan 	= $this->db->query("SELECT
														kode,
														kode_gol,
														nama AS nm_golongan_pim
													FROM
														golongans
													WHERE kode = '$kd_gol_pimpinan'")->row();

		$q_kaprodi_golongan 	= $this->db->query("SELECT
														kode,
														kode_gol,
														nama AS nm_golongan_pim
													FROM
														golongans
													WHERE kode = '$kaprodi_golongan_kode'")->row();
		$sts_usulan 			= $data_dasar->usulan_status_id;
		$q_stat 				= $this->db->query("SELECT
														*
													FROM
														usulan_statuses
													WHERE id = '$sts_usulan'")->row();
		$status 				= $q_stat->nama_status;
		$no_jad_akhir 			= $data_dasar->jad_akhir;
		$q_jad_akhir 			= $this->db->query("SELECT
														a.`no`,
														a.`jabatan_kode`,
														a.`jenjang_id`,
														b.`nama_jabatans` AS nm_jabatan,
														c.`nama_jenjang` AS nm_jenjang,
														b.kum
													FROM
														`jabatan_jenjangs` a
														JOIN `jabatans` b
														ON a.`jabatan_kode` = b.`kode`
														JOIN `jenjangs` c
														ON a.`jenjang_id` = c.`id`
													WHERE a.`no` = '$no_jad_akhir'")->row();

		$nm_jad_akhir 		= $q_jad_akhir->nm_jabatan;
		$jen_jad_akhir 		= $q_jad_akhir->nm_jenjang;
		$kum_jad_akhir 		= $q_jad_akhir->kum;
		$jad_akhir 			= $nm_jad_akhir . ' ' . $kum_jad_akhir . ' (' . $jen_jad_akhir . ')';
		$no_jfa_usulan 		= $data_dasar->jabatan_usulan_no;
		$no_jenjang_lama 	= $data_dasar->jenjang_id_lama;
		$no_jad_usulan 		= $this->get_usulan_jad($no_jfa_usulan);
		$jenjang_lama 		= $this->get_jenjang_id($no_jenjang_lama);
		$data_usulans 		= $this->db->query("SELECT
													usulan_status_id
												FROM
													usulans
												WHERE NO = '$no'")->row();
		$usulan_status_id 	= $data_usulans->usulan_status_id;
		$role 				= $this->session->userdata('role');

		$data['jenjang'] 			= $this->draft->tampil_jenjang();
		$data['jenjang_lama_id'] 	= $jenjang_lama;
		$data['jabatan_akhir_no'] 	= $jabatan_akhir_no;
		$data['jabatan_jenjang'] 	= $this->draft->tampil_jabatan_jenjang($jabatan_akhir_no);
		$data['usulan_status_id'] 	= $usulan_status_id;
		$data['nm_gol'] 			= $q_golongan;
		$data['nm_pimpinan_gol'] 	= $q_pimpinan_golongan;
		$data['nm_kaprodi_gol'] 	= $q_kaprodi_golongan;
		$data['jad_akhir'] 			= $jad_akhir;
		$data['nm_jen_akhir'] 		= $jen_jad_akhir;
		$data['bidil_jad'] 			= $q_bidil_jad;
		$data['jad_usulan'] 		= $no_jad_usulan;
		$data['data_dasar'] 		= $data_dasar;
		$data['q_jabatan'] 			= $q_jabatan;
		$data['q_kap_jabatan'] 		= $q_kap_jabatan;
		$data['judul'] 				= $status;
		$data['nidn_dos'] 				= $data_dasar->nidn;
		$data['role'] 				= $role;
		$data['jabatan_no'] 		= $jabatan_no;
		$data['sinkron_at'] 		= $data_dasar->sinkron_at;
		$data['golongan'] 			= $this->draft->tampil_golongan();
		$data['jabatan'] 			= $this->draft->tampil_jabat();

		if ($edit == 'edit') {
			vusulan('edit_usulan', $data);
		} else {
			vusulan('daftar_usulan', $data);
		}
	}

	function get_usulan_jad($no_jfa_usulan)
	{
		$q_usulan_jfa = $this->db->query("SELECT a.`no`,a.`jabatan_kode`,a.`jenjang_id`,b.`nama_jabatans` AS nm_jabatan,c.`nama_jenjang` AS nm_jenjang,b.kum FROM `jabatan_jenjangs` a  JOIN `jabatans` b ON a.`jabatan_kode`=b.`kode` JOIN `jenjangs` c ON a.`jenjang_id`=c.`id` WHERE a.`no`='$no_jfa_usulan'")->row();
		$nm_jad_usul = $q_usulan_jfa->nm_jabatan;
		$jen_jad_usulan = $q_usulan_jfa->nm_jenjang;
		$kum_jad_usulan = $q_usulan_jfa->kum;
		$jad_usulan = $nm_jad_usul . ' ' . $kum_jad_usulan . ' (' . $jen_jad_usulan . ')';

		return $jad_usulan;
	}

	function get_jenjang_id($no_jenjang_lama)
	{
		$q_jenjang = $this->db->query("SELECT nama_jenjang from jenjangs WHERE `id`='$no_jenjang_lama'")->row();
		$jenjang_lama_id = $q_jenjang->nama_jenjang;
		return $jenjang_lama_id;
	}

	function usulan($filter)
	{
		$draw 		= $_REQUEST['draw'];
		$username 	= $this->session->userdata('username');
		$role 		= $this->session->userdata('role');
		$instansi 	= $this->session->userdata('instansi');

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length 	= $_REQUEST['length'];
		$start 		= $_REQUEST['start'];
		$search 	= $_REQUEST['search']["value"];

		$q_stat = $this->db->query("select id,nama_status from usulan_statuses where id='$filter' ")->row();
		$id_sts = $q_stat->id;
		$status = $q_stat->nama_status;
		$in 	= array('2', '3', '4', '5', '6', '7', '8', '10', '11', '12', '13', '14', '15');
		$inx 	= "'2','3','4','5','6','7','8','10','11','12','13','14','15'";

		if ($filter == '99') {
			if ($role == '3') {
				$where = array('nidn' => $username);
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where($where);
				$this->db->where_in('usulan_status_id', $in);
				$total = $this->db->count_all_results();
			} elseif ($role == '4') {
				$where = array('kd_instansis' => $instansi);
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where($where);
				$this->db->where_in('usulan_status_id', $in);
				$total = $this->db->count_all_results();
			} else {
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where_in('usulan_status_id', $in);
				$total = $this->db->count_all_results();
			}
		} else {
			if ($role == '3') {
				$where = array('usulan_status_id' => $filter, 'nidn' => $username);
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where($where);
				$total = $this->db->count_all_results();
			} elseif ($role == '4') {
				$where = array('usulan_status_id' => $filter, 'kd_instansis' => $instansi);
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where($where);
				$total = $this->db->count_all_results();
			} else {
				$where = array('usulan_status_id' => $filter);
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where($where);
				$total = $this->db->count_all_results();
			}
		}

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
			1 => 'no',
			2 => 'nidn',
			3 => 'nama',
			4 => 'nama_instansi',
			5 => 'nama_prodi',
			6 => 'jabatan_usulan_no',
			7 => 'usulan_status_id',
			8 => 'updated_at',
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
		if ($filter == '99') {
			if ($role == '3') {
				$where = array('nidn' => $username);
				$this->db->order_by('updated_at', 'DESC');
				$this->db->order_by('no', 'DESC');
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where_in('usulan_status_id', $in);
				$this->db->where($where);
				$query = $this->db->get();
			} elseif ($role == '4') {
				$where = array('kd_instansis' => $instansi);
				$this->db->order_by('updated_at', 'DESC');
				$this->db->order_by('no', 'DESC');
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where_in('usulan_status_id', $in);
				$this->db->where($where);
				$query = $this->db->get();
			} else {
				$this->db->order_by('updated_at', 'DESC');
				$this->db->order_by('no', 'DESC');
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where_in('usulan_status_id', $in);
				$query = $this->db->get();
			}
		} else {
			if ($role == '3') {
				$where = array('usulan_status_id' => $filter, 'nidn' => $username);
				$this->db->order_by('updated_at', 'DESC');
				$this->db->order_by('no', 'DESC');
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where($where);
				$query = $this->db->get();
			} elseif ($role == '4') {
				$where = array('kd_instansis' => $instansi, 'usulan_status_id' => $filter);
				$this->db->order_by('updated_at', 'DESC');
				$this->db->order_by('no', 'DESC');
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where($where);
				$query = $this->db->get();
			} else {
				$where = array('usulan_status_id' => $filter);
				$this->db->order_by('updated_at', 'DESC');
				$this->db->order_by('no', 'DESC');
				$this->db->select('*');
				$this->db->from('v_usulans');
				$this->db->where($where);
				$query = $this->db->get();
			}
		}

		if ($search != "") {
			if ($filter == '99') {
				if ($role == '3') {
					$query = $this->db->query("select * from v_usulans where (usulan_status_id in($inx) and kd_instansis='$instansi' and no LIKE '%$search%') or (usulan_status_id in($inx) and kd_instansis='$instansi' and nidn LIKE '%$search%') or (usulan_status_id in($inx) and kd_instansis='$instansi' and nidk LIKE '%$search%') or
			(usulan_status_id in($inx) and kd_instansis='$instansi' and nama LIKE '%$search%') or (usulan_status_id in($inx) and kd_instansis='$instansi' and nama_instansi LIKE '%$search%') or (usulan_status_id in($inx) and kd_instansis='$instansi' and nama_prodi LIKE '%$search%' )");
				} elseif ($role == '4') {
					$query = $this->db->query("select * from v_usulans where (usulan_status_id in($inx) and kd_instansis='$instansi' and no LIKE '%$search%') or (usulan_status_id in($inx) and kd_instansis='$instansi' and nidn LIKE '%$search%') or (usulan_status_id in($inx) and kd_instansis='$instansi' and nidk LIKE '%$search%') or
			(usulan_status_id in($inx) and kd_instansis='$instansi' and nama LIKE '%$search%') or (usulan_status_id in($inx) and kd_instansis='$instansi' and nama_instansi LIKE '%$search%') or (usulan_status_id in($inx) and kd_instansis='$instansi' and nama_prodi LIKE '%$search%' )");
				} else {
					$query = $this->db->query("select * from v_usulans where (usulan_status_id in($inx) and no LIKE '%$search%') or (usulan_status_id in($inx) and nidn LIKE '%$search%') or (usulan_status_id in($inx) and nidk LIKE '%$search%') or
			(usulan_status_id in($inx) and nama LIKE '%$search%') or (usulan_status_id in($inx) and nama_instansi LIKE '%$search%') or (usulan_status_id in($inx) and nama_prodi LIKE '%$search%' )");
				}
			} else {
				if ($role == '3') {
					$query = $this->db->query("select * from v_usulans where (usulan_status_id='$filter' and kd_instansis='$instansi' and no LIKE '%$search%') or (usulan_status_id='$filter' and kd_instansis='$instansi' and nidn LIKE '%$search%') or (usulan_status_id='$filter' and kd_instansis='$instansi' and nidk LIKE '%$search%') or
			(usulan_status_id='$filter' and kd_instansis='$instansi' and nama LIKE '%$search%') or (usulan_status_id='$filter' and kd_instansis='$instansi' and nama_instansi LIKE '%$search%') or (usulan_status_id='$filter' and kd_instansis='$instansi' and nama_prodi LIKE '%$search%' )");
				} elseif ($role == '4') {
					$query = $this->db->query("select * from v_usulans where (usulan_status_id='$filter' and kd_instansis='$instansi' and no LIKE '%$search%') or (usulan_status_id='$filter' and kd_instansis='$instansi' and nidn LIKE '%$search%') or (usulan_status_id='$filter' and kd_instansis='$instansi' and nidk LIKE '%$search%') or
			(usulan_status_id='$filter' and kd_instansis='$instansi' and nama LIKE '%$search%') or (usulan_status_id='$filter' and kd_instansis='$instansi' and nama_instansi LIKE '%$search%') or (usulan_status_id='$filter' and kd_instansis='$instansi' and nama_prodi LIKE '%$search%' )");
				} else {
					$query = $this->db->query("select * from v_usulans where usulan_status_id='$filter' and( ( no LIKE '%$search%') or ( nidn LIKE '%$search%') or ( nidk LIKE '%$search%') or ( nama LIKE '%$search%') or ( nama_instansi LIKE '%$search%') or ( nama_prodi LIKE '%$search%' ))");
				}
			}

			$output['recordsTotal'] = $output['recordsFiltered'] = $query->num_rows();
		}

		$nomor_urut = $start + 1;
		foreach ($query->result_array() as $surat) {
			$no_jfa_usulan = $surat['jabatan_usulan_no'];
			$no_jad_usulan = $this->get_usulan_jad($no_jfa_usulan);

			$output['data'][] = array(
				'<a href=usulans/usul/' . $surat['no'] . ' data-toggle="tooltip" title="Detail Ajuan"><button type="button" class="btn btn-info btn-md"><i class="fa fa-search"></i></button></a> &nbsp;

				<a href="hapus_usulan/' . $surat['no'] . '" onClick="javascript:return confirm(\'Anda yakin akan menghapus ajuan usulan ? ?\')"><button type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button></a>',

				'<h3><center><span class="label label-danger">' . $surat['nama_status'] . ' </span></center></h3>',
				$surat['no'],
				$surat['nidn'],
				$surat['nama'],
				$surat['nama_instansi'],
				$surat['nama_prodi'],
				$no_jad_usulan,
				$status, $surat['updated_at']
			);

			$nomor_urut++;
		}
		echo json_encode($output);
	}

	function file_riwayat_pendidik()
	{
		$username = $this->session->userdata('username');
		$jenis = $this->input->post('jenis');
		$no_usulan = $this->input->post('no_usulan');
		$tgl_create = date("y-m-d H:i:s");
		$no = date("ymdHis") . $username;
		$pecah = explode(',', $jenis);
		$nm_field = $pecah[0];
		$id_rwy = $pecah[1];
		$id_sdm = $pecah[2];

		$file_path = './assets/download_pendidik/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		$cek_q1 = $this->db->query("select*from file_rwy_pendidik where id_rwy_didik_formal='$id_rwy' and id_sdm='$id_sdm'")->row();
		if ($cek_q1 > 0) {
			if ($this->upload->do_upload('berkas')) {
				$image = $this->upload->data();
				$update = "update file_rwy_pendidik set $nm_field = '$image[file_name]',tgl_update='$tgl_create' where id_rwy_didik_formal='$id_rwy' and id_sdm='$id_sdm'";
				$this->db->query($update);
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			}
		} else {
			if ($this->upload->do_upload('berkas')) {
				$image = $this->upload->data();
				$create = "INSERT INTO file_rwy_pendidik (id_file_rwy,id_rwy_didik_formal,id_sdm,$nm_field,tgl_create)VALUES
					('$no','$id_rwy','$id_sdm','$image[file_name]','$tgl_create')";
				$this->db->query($create);
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			}
		}
	}

	function file_riwayat_pendidikSk()
	{
		$username = $this->session->userdata('username');
		$nm_field = $this->input->post('nm_field');
		$id_rwy = $this->input->post('id_rwy');
		$id_sdm = $this->input->post('id_sdm');
		$no_usulan = $this->input->post('no_usulan');
		$tgl_create = date("y-m-d H:i:s");
		$no = date("ymdHis") . $username;


		$file_path = './assets/download_pendidik/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);

		$cek_q1 = $this->db->query("select*from file_rwy_pendidik where id_rwy_didik_formal='$id_rwy' and id_sdm='$id_sdm'")->row();
		if ($cek_q1 > 0) {
			if ($this->upload->do_upload('berkas')) {
				$image = $this->upload->data();
				$update = "update file_rwy_pendidik set $nm_field = '$image[file_name]',tgl_update='$tgl_create' where id_rwy_didik_formal='$id_rwy' and id_sdm='$id_sdm'";
				$this->db->query($update);
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			}
		} else {
			if ($this->upload->do_upload('berkas')) {
				$image = $this->upload->data();
				$create = "INSERT INTO file_rwy_pendidik (id_file_rwy,id_rwy_didik_formal,id_sdm,$nm_field,tgl_create)VALUES
						('$no','$id_rwy','$id_sdm','$image[file_name]','$tgl_create')";
				$this->db->query($create);
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			}
		}
	}

	function file_riwayat_pendidikPaper()
	{
		$username 	= $this->session->userdata('username');
		$nm_field 	= $this->input->post('nm_field');
		$link	 	= addslashes($this->input->post('link'));
		$id_rwy 	= $this->input->post('id_rwy');
		$id_sdm 	= $this->input->post('id_sdm');
		$no_usulan 	= $this->input->post('no_usulan');
		$tgl_create = date("y-m-d H:i:s");
		$no 		= date("ymdHis") . $username;

		$file_path = './assets/download_pendidik/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);

		$cek_q1 = $this->db->query("SELECT * FROM file_rwy_pendidik WHERE id_rwy_didik_formal='$id_rwy' and id_sdm='$id_sdm'")->row();
		if ($cek_q1 > 0) {
			if ($this->upload->do_upload('berkas')) {
				$image = $this->upload->data();
				$update = "UPDATE
								file_rwy_pendidik
							SET
								$nm_field = '$image[file_name]',
								link_$nm_field='$link',
								tgl_update = '$tgl_create'
							WHERE id_rwy_didik_formal = '$id_rwy'
								AND id_sdm = '$id_sdm'";
				$this->db->query($update);
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			}
		} else {
			if ($this->upload->do_upload('berkas')) {
				$image = $this->upload->data();
				$create = "INSERT INTO file_rwy_pendidik (
								id_file_rwy,
								id_rwy_didik_formal,
								id_sdm,
								$nm_field,
								link_$nm_field,
								tgl_create
							)
							VALUES
								(
								'$no',
								'$id_rwy',
								'$id_sdm',
								'$image[file_name]',
								'$link',
								'$tgl_create'
								)";
				$this->db->query($create);
				$this->session->set_flashdata('flash', 'Ditambah');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			}
		}
	}

	function update_paper()
	{
		$username 	= $this->session->userdata('username');
		$nm_field 	= $this->input->post('nm_field');
		$link	 	= addslashes($this->input->post('link'));
		$id_rwy 	= $this->input->post('id_rwy');
		$id_sdm 	= $this->input->post('id_sdm');
		$no_usulan 	= $this->input->post('no_usulan');
		$file_old 	= $this->input->post('file_old');
		$tgl_create = date("y-m-d H:i:s");
		$no 		= date("ymdHis") . $username;


		unlink('assets/download_pendidik/' . $file_old);

		$file_path = './assets/download_pendidik/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('berkas')) {
			$image = $this->upload->data();
			$update = "UPDATE
							file_rwy_pendidik
						SET
							$nm_field = '$image[file_name]',
							link_$nm_field='$link',
							tgl_update = '$tgl_create'
						WHERE id_rwy_didik_formal = '$id_rwy'
							AND id_sdm = '$id_sdm'";
			$this->db->query($update);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
		} else {
			$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
		}
	}

	function download_file_rwy_pendidik($id)
	{
		echo '<iframe src="' . base_url() . 'assets/download_pendidik/' . $id . '" width="100%" height="900" style="border: none;"></iframe>';

		//force_download('assets/download_pendidik/'.$id,NULL);
	}

	function hapus_pendidik($field, $berkas, $no_usulan)
	{
		unlink('assets/download_pendidik/' . $berkas);
		$tgl_update = date("y-m-d H:i:s");
		$update = "update file_rwy_pendidik set $field =null,tgl_update='$tgl_update' where $field ='$berkas'";
		$this->db->query($update);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
	}

	function bidangA($no_usulan)
	{
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$dosen_no = $data->dosen_no;

		$q_data = $this->db->query("SELECT no,jabatan_no,pengangkatan_tgl from dosens where no='$dosen_no'")->row();

		$showa['role'] 				= $this->session->userdata('role');
		$showa['usulan_status_id'] 	= $data->usulan_status_id;
		$showa['no'] 				= $no_usulan;
		$showa['jabatan_no'] 		= $q_data->jabatan_no;
		$showa['jabatan_usulan_no'] = $data->jabatan_usulan_no;
		$showa['pengangkatan_tgl'] 	= $q_data->pengangkatan_tgl;

		vusulan('bidang_a/show_a', $showa);
	}

	function bidangB($no_usulan)
	{
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;
		$dosen_no = $data->dosen_no;

		$q_data = $this->db->query("SELECT no,jabatan_no,pengangkatan_tgl from dosens where no='$dosen_no'")->row();
		$jabatan_no = $q_data->jabatan_no;

		$role = $this->session->userdata('role');
		$showb['role'] = $role;

		$showb['usulan_status_id'] = $usulan_status_id;
		$showb['no'] = $no_usulan;
		$showb['jabatan_no'] = $jabatan_no;
		$showb['jabatan_usulan_no'] = $data->jabatan_usulan_no;
		$showb['pengangkatan_tgl'] = $q_data->pengangkatan_tgl;

		vusulan('bidang_b/show_b', $showb);
	}

	function bidangC($no_usulan)
	{
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;
		$dosen_no = $data->dosen_no;

		$q_data = $this->db->query("SELECT no,jabatan_no,pengangkatan_tgl from dosens where no='$dosen_no'")->row();

		$role = $this->session->userdata('role');
		$showc['role'] = $role;

		$showc['usulan_status_id'] = $usulan_status_id;

		$showc['no'] = $no_usulan;
		$showc['jabatan_no'] = $jabatan_no;
		$showc['jabatan_usulan_no'] = $data->jabatan_usulan_no;
		$showc['pengangkatan_tgl'] = $q_data->pengangkatan_tgl;

		vusulan('bidang_c/show_c', $showc);
	}

	function bidangD($no_usulan)
	{
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;
		$dosen_no = $data->dosen_no;

		$q_data = $this->db->query("SELECT no,jabatan_no,pengangkatan_tgl from dosens where no='$dosen_no'")->row();

		$role = $this->session->userdata('role');
		$showd['role'] = $role;

		$showd['usulan_status_id'] = $usulan_status_id;
		$showd['no'] = $no_usulan;
		$showd['jabatan_no'] = $jabatan_no;
		$showd['jabatan_usulan_no'] = $data->jabatan_usulan_no;
		$showd['pengangkatan_tgl'] = $q_data->pengangkatan_tgl;

		vusulan('bidang_d/show_d', $showd);
	}

	function bidangE($no_usulan)
	{
		$data = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data->usulan_status_id;

		$role = $this->session->userdata('role');
		$showe['role'] = $role;

		$showe['usulan_status_id'] = $usulan_status_id;
		$showe['no'] = $no_usulan;
		$showe['jabatan_no'] = $jabatan_no;
		vusulan('bidang_e/show_e', $showe);
	}

	function show_resume($no_usulan)
	{
		$tanggalakhir 	= date('Y-m-22');
		$data_dasar 	= $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$nidn 			= $data_dasar->dosen_no;

		$data_nidnx 	= $this->db->query("SELECT no,nidn,jabatan_no,pengangkatan_tgl from dosens where no='$nidn'")->row();
		$nidnx 			= $data_nidnx->nidn;

		$data_nidn 		= $this->db->query("SELECT email,nama from users where username='$nidnx'")->row();
		$priode 		= $this->db->query("SELECT created_at from usulans where LEFT(created_at,10)='$tanggalakhir' order by created_at desc ")->row();

		// cari apakah ada dokumen yg belum diupload di bidang C 
		$cari_berkas_c 	= $this->db->query("select 
												*
											from
												`usulan_dupak_details`
											where `usulan_no` = '$no_usulan'
												and left (`dupak_no`, 1) = 'C'
												and (
												(`berkas` = ''
													or `berkas` is null)
												OR (
													`sertifikat` is null
													or `sertifikat` = ''
												)
												)")->num_rows();

		$showr['cari_berkas_c'] 	= $cari_berkas_c;

		$usulan_status_id 			= $data_dasar->usulan_status_id;
		$role 						= $this->session->userdata('role');
		$showr['data_nidn'] 		= $data_nidn;
		$showr['priode'] 			= $priode;
		$showr['usulan_status_id'] 	= $usulan_status_id;
		$showr['no'] 				= $no_usulan;
		$showr['jabatan_no'] 		= $data_nidnx->jabatan_no;
		$showr['data_dasar'] 		= $data_dasar;
		$showr['role'] 				= $role;
		$showr['jabatan_usulan_no'] = $data_dasar->jabatan_usulan_no;
		$showr['pengangkatan_tgl'] 	= $data_nidnx->pengangkatan_tgl;

		if ($role == '3' || $role == '4' || $role == '9') {
			vusulan('show_resume', $showr);
		} elseif ($role == '1') {
			vusulan('show_resume_penilai', $showr);
		}
	}

	function show_log($no_usulan)
	{
		$data_log = $this->db->query("SELECT
									  a.*,
									  b.nama_status,
									  b.id,
  									  b.`ket_status`
									FROM
									  `usulan_riwayat_statuses` AS a,
									  usulan_statuses AS b
									WHERE a.usulan_status_id = b.id
									  AND a.usulan_no = '$no_usulan'");

		$data_dasar = $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id = $data_dasar->usulan_status_id;
		$dosen_no = $data_dasar->dosen_no;

		$logs['usulan_status_id'] = $usulan_status_id;

		$data_nidnx = $this->db->query("SELECT no,nidn,jabatan_no,pengangkatan_tgl from dosens where no='$dosen_no'")->row();

		$data_penilai = $this->db->query("SELECT
										  a.`user_penilai_no`,
										  a.`updated_at`,
										  b.`nama` AS nama_penilai
										FROM
										  `usulan_riwayat_penilais` AS a,
										  `users` AS b
										 WHERE a.`user_penilai_no`=b.`no`
										 AND a.`usulan_no`='$no_usulan'
										 ORDER BY `updated_at` ASC");
		$logs['data_penilai'] = $data_penilai;

		$role = $this->session->userdata('role');
		$logs['role'] = $role;

		$logs['no'] 				= $no_usulan;
		$logs['logs'] 				= $data_log;
		$logs['jabatan_no'] 		= $jabatan_no;
		$logs['jabatan_usulan_no'] 	= $data_dasar->jabatan_usulan_no;
		$logs['pengangkatan_tgl'] 	= $data_nidnx->pengangkatan_tgl;

		vusulan('show_log', $logs);
	}

	function show_matakul($no_usulan)
	{
		$data_mtk 	= $this->db->query("SELECT
											a.`usulan_status_id`,
											b.*
										FROM
											usulans AS a,
											usulan_matkuls AS b
										WHERE a.no = '$no_usulan'
											AND b.`usulan_no` = a.`no`")->result();
		$data 		= $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$r_nidn		= $this->db->query("SELECT
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

		$sinkron_ajar	= $this->db->query("SELECT sinkron_at from ajar_dosen WHERE NIDN='$r_nidn->nidn' GROUP by NIDN")->row();


		$usulan_status_id = $data->usulan_status_id;
		$nidn = $r_nidn->nidn;

		$d_mtk['usulan_status_id'] = $usulan_status_id;

		$role = $this->session->userdata('role');
		$d_mtk['role'] = $role;

		$d_mtk['nidn'] 				= $nidn;
		$d_mtk['data_mtk'] 			= $data_mtk;
		$d_mtk['no'] 				= $no_usulan;
		$d_mtk['jabatan_usulan_no'] = $r_nidn->jabatan_usulan_no;
		$d_mtk['pengangkatan_tgl'] 	= $r_nidn->pengangkatan_tgl;
		$d_mtk['sinkron_ajar'] 		= $sinkron_ajar;

		vusulan('show_mtk', $d_mtk);
	}

	function show_dosen($no_usulan)
	{
		$d_nidn['no'] = $no_usulan;
		vusulan('show_dosen', $d_nidn);
	}

	function show_pendidikan($no_usulan)
	{
		$data 								= $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$usulan_status_id 					= $data->usulan_status_id;
		$d_pendidikan['id_sdm']				= $data->dosen_no;
		$d_pendidikan['usulan_status_id'] 	= $usulan_status_id;
		$d_pendidikan['no'] 				= $no_usulan;
		$role 								= $this->session->userdata('role');
		$d_pendidikan['role'] 				= $role;

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

		$sinkron_pen	= $this->db->query("SELECT
												sinkron_at
											FROM
												rwy_pend_formal
											WHERE id_sdm = '$r_nidn->dosen_no'
											GROUP BY id_sdm")->row();

		$d_pendidikan['jabatan_usulan_no'] 	= $r_nidn->jabatan_usulan_no;
		$d_pendidikan['pengangkatan_tgl'] 	= $r_nidn->pengangkatan_tgl;
		$d_pendidikan['nidn_dos'] 			= $r_nidn->nidn;
		$d_pendidikan['sinkron_pen'] 		= $sinkron_pen;

		$username 		= $this->session->userdata('username');
		$sql 			= $this->db->query("SELECT *FROM v_gelar_belakang WHERE nidn='$username'")->result();
		$d_pendidikan['sql'] = $sql;

		vusulan('show_pendidikan', $d_pendidikan);
	}

	function persyaratan($no_usulan)
	{
		$role 			= $this->session->userdata('role');
		$data_ceklis 	= $this->db->query("SELECT * FROM `usulan_ceklists` WHERE usulan_no='$no_usulan'")->row();
		$data_isi 		= $this->db->query("SELECT
												a.*,
												b.nidn,
												b.`jabatan_no`,
												b.pengangkatan_tgl,
												b.lahir_tgl
											FROM
												usulans AS a,
												dosens AS b
											WHERE a.`dosen_no` = b.`no`
												AND a.no = '$no_usulan'")->row();

		$showa['no'] 				= $no_usulan;
		$showa['ceklis'] 			= $data_ceklis;
		$showa['role'] 				= $role;
		$showa['jabatan_no'] 		= $data_isi->jabatan_no;
		$showa['jabatan_usulan_no'] = $data_isi->jabatan_usulan_no;
		$showa['pengangkatan_tgl'] 	= $data_isi->pengangkatan_tgl;
		$showa['usulan_status_id'] 	= $data_isi->usulan_status_id;
		$showa['isi'] 				= $data_isi;

		// utk usulan LK 
		if ($data_isi->jabatan_usulan_no == '8' || $data_isi->jabatan_usulan_no == '9' || $data_isi->jabatan_usulan_no == '10' || $data_isi->jabatan_usulan_no == '11' || $data_isi->jabatan_usulan_no == '12' || $data_isi->jabatan_usulan_no == '13' || $data_isi->jabatan_usulan_no == '14' || $data_isi->jabatan_usulan_no == '15') {
			vusulan('show_persyaratan_lk_gb', $showa);
		} else {
			vusulan('show_persyaratan', $showa);
		}
	}

	function pensiun($no_usulan)
	{
		$d["d"] 		= $this->db->query("SELECT
												a.`no`,
												b.`gelar_depan`,
												b.`gelar_belakang`,
												b.`nama`,
												b.`nidn`,
												b.`lahir_tempat`,
												b.`lahir_tgl`,
												c.`nama_jabatans`,
												c.`kum`,
												b.`jabatan_tgl`,
												e.`nama_jabatans` AS nama_jabatans_usul,
												e.`kum` AS kum_usul,
												i.`nama` AS nama_gol,
												i.`kode_gol`,
												b.`golongan_tgl`,
												g.`kode`,
												g.`nama_instansi`,
												h.`japim`,
												a.`pimpinan_nama`,
												a.`pimpinan_nidn`
											FROM
												usulans a
												JOIN dosens b
												ON a.`dosen_no` = b.`no`
												JOIN `jabatans` c
												ON b.`jabatan_no` = c.`kode`
												JOIN `jabatan_jenjangs` d
												ON a.`jabatan_usulan_no` = d.`no`
												JOIN `jabatans` e
												ON d.`jabatan_kode` = e.`kode`
												JOIN `prodis` f
												ON b.`prodi_kode` = f.`kode`
												JOIN `instansis` g
												ON f.`instansi_kode` = g.`kode`
												JOIN `reff_japim` h
												ON a.`pimpinan_jabatan` = h.`id`
												JOIN `golongans` i
												ON b.`golongan_kode` = i.`kode`
									WHERE a.`no` = '$no_usulan'")->row();

		$this->load->view('surat_pensiun', $d);
	}

	public function tambah()
	{
		$username 			= $this->session->userdata('username');
		$data['role'] 		= $this->session->userdata('role');
		$data['username'] 	= $username;
		$data['nidn_dos'] 	= $username;

		$data['j'] 			= $this->db->query("SELECT
													a.*,
													b.`kum`,
													b.`nama_jabatans`
												FROM
													`dosens` a
													JOIN `jabatans` b
													ON a.`jabatan_no` = b.`kode`
												WHERE a.`nidn` = '$username'
												AND a.`jabatan_no` IN (
													'31',
													'40',
													'41',
													'43',
													'44',
													'46',
													'47',
													'48',
													'50',
													'51')")->row();

		vusulan('tambah', $data);
	}

	public function pilih($jabatan_no)
	{
		$data['jabatan_no'] = $jabatan_no;
		$data['dosen'] = $this->draft->get_draft($jabatan_no, $jabatan_no, $jabatan_no);
		vusulan('pilih', $data);
	}

	public function print_bidanga($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak_a', $printa);
	}

	function tampil_resume($no_usulan)
	{
		$printres['no'] = $no_usulan;
		$this->load->view('tampil_resume', $printres);
	}

	public function print_resume($no_usulan)
	{
		$printres['no'] = $no_usulan;
		$this->load->view('print_resume', $printres);
	}

	public function print_bidangb($no_usulan)
	{
		$printa['no_usulan'] = $no_usulan;
		$this->load->view('bidang_b/print_dupak_b', $printa);
	}

	public function print_dupak($no_usulan)
	{
		$printp['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak', $printp);
	}

	public function print_dupak2($no_usulan)
	{
		$printp['no_usulan'] = $no_usulan;
		$this->load->view('print_dupak2', $printp);
	}

	public function proses_usulanbaru($no_usulan, $dosen_no, $jabatan_no)
	{
		$email 			= $this->input->post('email');
		$nama 			= $this->input->post('nama');
		$username 		= $this->session->userdata('username');
		$usulan_status 	= $this->input->post('usulan_status');
		$usulan_ket 	= $this->input->post('usulan_ket');
		$rule 			= $this->input->post('rule');
		$tgl_create 	= date("y-m-d H:i:s");
		$tgl_update 	= date("y-m-d H:i:s");
		$no 			= date("ymdHis") . $username;

		$cari_jml_rwy = $this->db->query("SELECT
													COUNT(*) AS jml_rwy
												FROM
													`rwy_pend_formal`
												WHERE
													`id_sdm`='$dosen_no'")->row();
		$jml_rwy = $cari_jml_rwy->jml_rwy;

		$cari_jml_file_rwy = $this->db->query("SELECT
											  COUNT(*) AS jml_file_rwy
											FROM
											  `file_rwy_pendidik` AS a,
											  `rwy_pend_formal` AS b
											WHERE a.`id_rwy_didik_formal` = b.`id_rwy_didik_formal`
											  AND a.`id_sdm` = '$dosen_no'
											  AND a.`transkip` IS NOT NULL
											  AND a.ijazah IS NOT NULL")->row();
		$jml_file_rwy = $cari_jml_file_rwy->jml_file_rwy;

		if ($jml_rwy <> $jml_file_rwy) {
			$this->session->set_flashdata('error', 'Anda masih belum mengupload scan ijazah atau transkrip pada menu Riwayat Pendidikan');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			die;
		}

		$tgl_ijazah = $this->db->query("SELECT
											  a.`no_dosen`,
											  a.`id_rwy_didik_formal`,
											  a.`tgl_ijazah_pak`
											FROM
											  `rwy_pend_pak` AS a,
											  `rwy_pend_formal` AS b
											WHERE a.`id_rwy_didik_formal` = b.`id_rwy_didik_formal`
											  AND a.`tgl_ijazah_pak` = '0000-00-00'
											  AND a.`no_dosen` = '$dosen_no'")->row();
		if ($tgl_ijazah > 0) {
			$this->session->set_flashdata('error', 'Tanggal penerbitan ijazah masih belum diupdate');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
			die;
		}

		// pengajuan utk usulan baru
		if ($usulan_status == '3') {
			$mtk_pak	= $this->db->query("SELECT mtk FROM `usulan_matkuls` WHERE `usulan_no`='$no_usulan';")->num_rows();
			$st 		= $this->db->query("SELECT no_surat,tgl_surat FROM usulans WHERE no='$no_usulan'")->row();

			if ($st->no_surat == '' || $st->tgl_surat == '0000-00-00') {
				$this->session->set_flashdata('error', 'No. surat dan tanggal surat usulan belum terisi');
				redirect(base_url() . 'usulan/usulan/usulans/view/' . $no_usulan);
				die;
			}

			if ($mtk_pak < 1) {
				$this->session->set_flashdata('error', 'Matakuliah PAK masih belum diinput');
				redirect(base_url() . 'usulan/usulan/show_mtk_pak/' . $no_usulan);
				die;
			}

			$where = array('no' => $no_usulan);
			$data = array(
				'usulan_status_id' => $usulan_status,
				'user_updated_no' => $this->session->userdata('no'),
				'updated_at' => $tgl_update
			);
			$this->dupak->update_data($where, $data, 'usulans');

			$data_riwayat = array(
				'no' => $no,
				'usulan_no' => $no_usulan,
				'usulan_status_id' => $usulan_status,
				'keterangan_pengusul' => addslashes($usulan_ket),
				'user_no' => $this->session->userdata('no'),
				'created_at' => $tgl_create,
				'updated_at' => $tgl_update
			);
			$this->draft->insert_data($data_riwayat, 'usulan_riwayat_statuses');

			$this->db->query("UPDATE usulan_dupaks SET kum_penilai_baru='0' WHERE usulan_no='$no_usulan'");
			$this->db->query("UPDATE usulan_dupak_details SET kum_penilai='0',kum_penilai_keterangan='' WHERE usulan_no='$no_usulan'");

			$this->session->set_flashdata('flash', 'Diproses');
			redirect(base_url() . 'usulan/usulan/proses');
		} else { //utk draft revisi dan utk pengajuan usulan baru
			$where = array('no' => $no_usulan);
			$data = array(
				'usulan_status_id' => $usulan_status,
				'user_updated_no' => $this->session->userdata('no'),
				'updated_at' => $tgl_update,
				'no_surat' => '',
				'tgl_surat' => ''
			);
			$this->dupak->update_data($where, $data, 'usulans');

			$data = array(
				'no' => $no,
				'usulan_no' => $no_usulan,
				'usulan_status_id' => $usulan_status,
				'keterangan_pengusul' => addslashes($usulan_ket),
				'user_no' => $this->session->userdata('no'),
				'created_at' => $tgl_create,
				'updated_at' => $tgl_update
			);
			$this->draft->insert_data($data, 'usulan_riwayat_statuses');

			$this->session->set_flashdata('flash', 'Diproses');
			redirect(base_url() . 'usulan/usulan/proses');
		}
	}

	function update_jad()
	{
		$no_usulan = $this->input->post('no_usulan');
		$jad = $this->input->post('jabatan_usulan_no');
		$where = array('no' => $no_usulan);
		$data = array(
			'jabatan_usulan_no' => $jad,
			'user_updated_no' => $this->session->userdata('no')
		);
		$this->dupak->update_data($where, $data, 'usulans');
		$this->session->set_flashdata('flash', 'Diubah');
		redirect(base_url() . 'usulan/usulan/usulans/usul/' . $no_usulan);
	}

	function update_statusjad()
	{
		$no_usulan 			= $this->input->post('no_usulan');
		$usulan_status_id 	= $this->input->post('usulan_status_id');

		$where = array('no' => $no_usulan);
		$data = array(
			'usulan_status_id' => $usulan_status_id,
			'user_updated_no' => $this->session->userdata('no')
		);
		$this->dupak->update_data($where, $data, 'usulans');
		$this->session->set_flashdata('flash', 'Diubah');

		redirect(base_url() . 'usulan/usulan/usulans/usul/' . $no_usulan);
	}

	function update_jenjang()
	{
		$no_usulan = $this->input->post('no_usulan');
		$jenjang = $this->input->post('jenjang_id_lama');
		$where = array('no' => $no_usulan);
		$data = array(
			'jenjang_id_lama' => $jenjang,
			'user_updated_no' => $this->session->userdata('no'),
		);
		$this->dupak->update_data($where, $data, 'usulans');
		$this->session->set_flashdata('flash', 'Diubah');
		redirect(base_url() . 'usulan/usulan/usulans/usul/' . $no_usulan);
	}

	function update_mtk($no, $jabatan_no)
	{
		$nidn = $this->input->post('nidn');
		$semester = $this->input->post('semester');
		$config['upload_path'] = './assets/download_matkul/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {
			$where = array(
				'SEMESTER' => $semester,
				'NIDN' => $nidn
			);
			$image = $this->upload->data();
			$data = array(
				'BERKAS' => $image['file_name']
			);
			unlink('assets/download_matkul/' . $this->input->post('old_pict', TRUE));
			$this->session->set_flashdata('flash', 'Diubah');
			$this->dupak->update_data($where, $data, 'ajar_dosen');
			redirect(base_url() . 'usulan/usulan/show_matakul/' . $no . '/' . $jabatan_no);
		} else {
			$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
			redirect(base_url() . 'usulan/usulan/show_matakul/' . $no . '/' . $jabatan_no);
		}
	}

	function update_usulan($no)
	{
		$no_surat = $this->input->post('no_surat');
		$tgl_surat = $this->input->post('tgl_surat');
		$tempat_surat = $this->input->post('tempat_surat');
		$pimpinan_nama = $this->input->post('pimpinan_nama');
		$pimpinan_nip = $this->input->post('pimpinan_nip');
		$pimpinan_nidn = $this->input->post('pimpinan_nidn');
		$pimpinan_golongan_kode = $this->input->post('pimpinan_golongan_kode');
		$pimpinan_jabatan = $this->input->post('pimpinan_jabatan');
		$kaprodi_nama = $this->input->post('kaprodi_nama');
		$kaprodi_nip = $this->input->post('kaprodi_nip');
		$kaprodi_nidn = $this->input->post('kaprodi_nidn');
		$kaprodi_golongan_kode = $this->input->post('kaprodi_golongan_kode');
		$kaprodi_jabatan = $this->input->post('kaprodi_jabatan');
		$fakultas = $this->input->post('fakultas');
		$tgl_update = date("y-m-d H:i:s");
		$where = array('no' => $no);
		$data = array(
			'no_surat' => $no_surat,
			'tgl_surat' => $tgl_surat,
			'tempat_surat' => $tempat_surat,
			'pimpinan_nama' => $pimpinan_nama,
			'pimpinan_nip' => $pimpinan_nip,
			'pimpinan_nidn' => $pimpinan_nidn,
			'pimpinan_golongan_kode' => $pimpinan_golongan_kode,
			'pimpinan_jabatan' => $pimpinan_jabatan,
			'kaprodi_nama' => $kaprodi_nama,
			'kaprodi_nip' => $kaprodi_nip,
			'kaprodi_nidn' => $kaprodi_nidn,
			'kaprodi_golongan_kode' => $kaprodi_golongan_kode,
			'kaprodi_jabatan' => $kaprodi_jabatan,
			'fakultas' => $fakultas,
			'updated_at' => $tgl_update,
			'user_updated_no' => $this->session->userdata('no')
		);
		$this->session->set_flashdata('flash', 'Diubah');
		$this->dupak->update_data($where, $data, 'usulans');
		redirect(base_url() . 'usulan/usulan/usulans/view/' . $no);
	}

	function download_matkul($id)
	{
		force_download('assets/download_matkul/' . $id, NULL);
	}

	function download_pendidik($id)
	{
		force_download('assets/download_pendidik/' . $id, NULL);
	}

	public function create()
	{
		$username 			= $this->session->userdata('username');
		$role 				= $this->session->userdata('role');
		$jabatan_akhir_no 	= $this->input->post('jabatan_akhir_no');
		$jabatan_no 		= $this->input->post('jabatan_no');

		$dos     			= $this->db->query("SELECT * from dosens WHERE nidn='$username'")->row();
		$sinkron_pen		= $this->db->query("SELECT sinkron_at from rwy_pend_formal WHERE id_sdm='$dos->no' GROUP by id_sdm")->row();
		$sinkron_ajar		= $this->db->query("SELECT sinkron_at from ajar_dosen WHERE NIDN='$username' GROUP by NIDN")->row();

		$data['dosen'] 		= $this->draft->tampil_data($jabatan_no, $username, $role);
		$data['golongan'] 	= $this->draft->tampil_golongan();
		$data['japim'] 		= $this->draft->tampil_japim();
		$data['jenjang'] 	= $this->draft->tampil_jenjang();
		$data['bidang'] 	= $this->draft->tampil_bidang();
		$data['jabatan'] 	= $this->draft->tampil_jabatan();
		$data['jabatan_akhir_no'] 	= $jabatan_akhir_no;
		$data['nidn_dos'] 			= $dos->nidn;
		$data['nidn'] 				= $username;
		$data['dosen_no'] 			= $dos->no;
		$data['sinkron_at'] 		= $dos->sinkron_at;
		$data['sinkron_pen'] 		= $sinkron_pen;
		$data['sinkron_ajar'] 		= $sinkron_ajar;
		$data['jabatan_jenjang'] 	= $this->draft->tampil_jabatan_jenjang($jabatan_akhir_no);
		vusulan('tambah_draft', $data);
	}

	public function tambah_usulan()
	{
		$no_surat 			= $this->input->post('no_surat');
		$tgl_surat 			= $this->input->post('tgl_surat');
		$tempat_surat 		= $this->input->post('tempat_surat');
		$node 				= $this->input->post('node');
		$nidn 				= $this->input->post('nidn');
		$jabatan_akhir_no 	= $this->input->post('jabatan_akhir_no');
		$keterangan 		= $this->input->post('keterangan');
		$jabatan_usulan_no 	= $this->input->post('jabatan_usulan_no');
		$pimpinan_nama 		= $this->input->post('pimpinan_nama');
		$pimpinan_nip 		= $this->input->post('pimpinan_nip');
		$pimpinan_nidn 		= $this->input->post('pimpinan_nidn');
		$jenjang_id_lama 	= '0';
		$jenjang_id_usulan 	= $this->input->post('jenjang_id_usulan');
		$pimpinan_golongan_kode = $this->input->post('pimpinan_golongan_kode');
		$pimpinan_jabatan 		= $this->input->post('pimpinan_jabatan');
		$pimpinan_unit_kerja 	= $this->input->post('pimpinan_unit_kerja');
		$tmt_tgl 				= $this->input->post('tmt_tgl');
		$tmt_tahun 				= $this->input->post('tmt_tahun');
		$tmt_bulan 				= $this->input->post('tmt_bulan');
		$tgl_create 			= date("y-m-d H:i:s");
		$tgl_update 			= date("y-m-d H:i:s");
		$no 					= date("ymdHis") . '02' . $nidn;
		$no2 					= date("ymdHis") . $nidn;
		$status_usulan 			= '1';
		$nip 					= $this->input->post('nip');
		$dosen_karpeg 			= $this->input->post('dosen_karpeg');


		//buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12 utk pengangkatan_tgl
		$pengangkatan_tgl 		= $this->input->post('pengangkatan_tgl');
		$tahunx					= substr($pengangkatan_tgl, 0, 4);

		$array_bulan = array(
			1 => ' Gasal' . ($tahunx - 1) . '/' . $tahunx,
			' Gasal' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Gasal' . $tahunx . '/' . ($tahunx + 1),
			' Gasal' . $tahunx . '/' . ($tahunx + 1),
			' Gasal' . $tahunx . '/' . ($tahunx + 1),
			' Gasal' . $tahunx . '/' . ($tahunx + 1)
		);

		//jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut utk pengangkatan_tgl
		$date 				= strtotime($pengangkatan_tgl);
		$tgl_akademik 		= $array_bulan[date('n', $date)];
		$tgl_akademik_thn	= substr($tgl_akademik, 6, 4);

		echo "pengangkatan_tgl = $pengangkatan_tgl  <br>tgl_akademik = $tgl_akademik  <br> tgl_akademik_thn = $tgl_akademik_thn<br><br>";

		//buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12 utk tgl now
		$tgl_now				= date("Y-m-d");
		$thn_now				= substr($tgl_now, 0, 4);
		$array_bulan_now = array(
			1 => ' Gasal' . ($thn_now - 1) . '/' . $thn_now,
			' Gasal' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Gasal' . $thn_now . '/' . ($thn_now + 1),
			' Gasal' . $thn_now . '/' . ($thn_now + 1),
			' Gasal' . $thn_now . '/' . ($thn_now + 1),
			' Gasal' . $thn_now . '/' . ($thn_now + 1)
		);

		//jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut utk tgl now
		$date_now 				= strtotime($tgl_now);
		$tgl_akademik_now 		= $array_bulan_now[date('n', $date_now)];
		$tgl_akademik_now_thn	= substr($tgl_akademik_now, 6, 4);
		echo "Tanggal NOW = $tgl_now<br>tgl_akademik_now = $tgl_akademik_now  <br> tgl_akademik_now_thn = $tgl_akademik_now_thn";

		$selisih_thn_akademik = $tgl_akademik_now_thn - $tgl_akademik_thn;
		if ($selisih_thn_akademik < "1") {
			$this->session->set_flashdata('error', 'Melaksanakan tugas sebagai dosen masih belum terpenuhi 1 tahun (2 semester)');
			redirect(base_url() . 'usulan/usulan/draft');
		}

		$data1 = array(
			'no' => $no2,
			'usulan_no' => $no,
			'usulan_status_id' => $status_usulan,
			'keterangan_pengusul' => 'Tambah Draft Usulan Baru',
			'user_no' => $role = $this->session->userdata('no'),
			'created_at' => $tgl_create,
			'updated_at' => $tgl_update
		);
		$data = array(
			'no' => $no,
			'dosen_no' => $node,
			'jabatan_akhir_no' => $jabatan_akhir_no,
			'jabatan_usulan_no' => $jabatan_usulan_no,
			'jenjang_id_lama' =>  $jenjang_id_lama,
			'jenjang_id_baru' =>  $jenjang_id_usulan,
			'usulan_status_id' =>  $status_usulan,
			'user_updated_no' => $this->session->userdata('no'),
			'created_at' => $tgl_create,
			'updated_at' => $tgl_update
		);

		$this->draft->insert_data($data, 'usulans');
		$this->draft->insert_data($data1, 'usulan_riwayat_statuses');

		$update = "update dosens set nip ='$nip', karpeg='$dosen_karpeg' where no='$node'";
		$this->db->query($update);

		//INSERT table rwy_pend_pak
		$id_rwy_didik_formal = $this->input->post('id_rwy_didik_formal');
		$id_jenj_didik = $this->input->post('id_jenj_didik');
		$nama_jen = $this->input->post('nama_jen');
		$tgl_ijazah_pak = $this->input->post('tgl_ijazah_pak');
		$id_bid_studi = $this->input->post('id_bid_studi');

		$index = 0; // Set index array awal dengan 0
		foreach ($id_rwy_didik_formal as $id_rwy) {
			$perintah = "REPLACE INTO rwy_pend_pak (
						  no_dosen,
						  id_rwy_didik_formal,
						  no_usulan,
						  id_jenjang_pak,
						  jenjang_pak,
						  tgl_ijazah_pak,
						  created_at,
						  id_bid_studi
						)
						VALUES
						  (
						  '$node',
						  '" . $id_rwy . "',
						  '$no',
						  '" . $id_jenj_didik[$index] . "',
						  '" . $nama_jen[$index] . "',
						  '" . $tgl_ijazah_pak[$index] . "',
						  '" . $tgl_create . "',
						  '" . $id_bid_studi[$index] . "'
						  )";
			$index++;
			$masuk = $this->db->query($perintah);
		}

		if ($masuk) {
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url() . 'usulan/usulan/draft');
		} else {
			$this->session->set_flashdata('error', 'Gagal');
			redirect(base_url() . 'usulan/usulan/draft');
		}
	}

	public function create_naik_jab_reg()
	{
		$username 			= $this->session->userdata('username');
		$role 				= $this->session->userdata('role');
		$jabatan_akhir_no 	= $this->input->post('jabatan_akhir_no');
		$jabatan_no 		= $this->input->post('jabatan_no');

		$dos     = $this->db->query("SELECT no,nidn,lahir_tgl,ikatan_kerja_kode,sinkron_at from dosens WHERE nidn='$username'")->row();
		$sinkron_pen		= $this->db->query("SELECT sinkron_at from rwy_pend_formal WHERE id_sdm='$dos->no' GROUP by id_sdm")->row();
		$sinkron_ajar		= $this->db->query("SELECT sinkron_at from ajar_dosen WHERE NIDN='$username' GROUP by NIDN")->row();

		$data['jabatan_akhir_no'] 	= $jabatan_akhir_no;
		$data['dosen'] 				= $this->draft->tampil_data($jabatan_no, $username, $role);
		$data['golongan'] 			= $this->draft->tampil_golongan();
		$data['japim'] 				= $this->draft->tampil_japim();
		$data['jenjang'] 			= $this->draft->tampil_jenjang();
		$data['bidang'] 			= $this->draft->tampil_bidang();
		$data['jabatan'] 			= $this->draft->tampil_jabatan();
		$data['jabatan_jenjang'] 	= $this->draft->tampil_jabatan_jenjang($jabatan_akhir_no);
		$data['nidn_dos'] 			= $dos->nidn;
		$data['nidn'] 				= $username;
		$data['dosen_no'] 			= $dos->no;
		$data['sinkron_at'] 		= $dos->sinkron_at;
		$data['sinkron_pen'] 		= $sinkron_pen;
		$data['sinkron_ajar'] 		= $sinkron_ajar;
		$data['lahir_tgl'] 			= $dos->lahir_tgl;
		$data['ikatan_kerja_kode'] 	= $dos->ikatan_kerja_kode;

		vusulan('tambah_draft_naik_jab_reg', $data);
	}

	public function tambah_usulan_naik_jab_reg()
	{
		$node 				= $this->input->post('node');
		$nidn 				= $this->input->post('nidn');
		$keterangan 		= $this->input->post('keterangan');
		$jabatan_akhir_no 	= $this->input->post('jabatan_akhir_no');
		$jabatan_usulan_no 	= $this->input->post('jabatan_usulan_no');
		$jabatan_no 		= $this->input->post('jabatan_no');
		$jabatan_tgl 		= $this->input->post('jabatan_tgl');
		$jenjang_id_lama 	= $this->input->post('jenjang_id_lama');
		$jenjang_id_usulan 	= $this->input->post('jenjang_id_usulan');
		$nip 				= $this->input->post('nip');
		$dosen_karpeg 		= $this->input->post('dosen_karpeg');
		$selisih_thn 		= $this->input->post('selisih_thn');
		$selisih_bln 		= $this->input->post('selisih_bln');
		$ikatan_kerja_kode 	= $this->input->post('ikatan_kerja_kode');
		$tgl_create 		= date("y-m-d H:i:s");
		$tgl_update 		= date("y-m-d H:i:s");
		$no 				= date("ymdHis") . '02' . $nidn;
		$no2 				= date("ymdHis") . $nidn;
		$status_usulan = '1';

		//buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12 utk jabatan_tgl
		$tahunx					= substr($jabatan_tgl, 0, 4);

		$array_bulan = array(
			1 => ' Gasal' . ($tahunx - 1) . '/' . $tahunx,
			' Gasal' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Gasal' . $tahunx . '/' . ($tahunx + 1),
			' Gasal' . $tahunx . '/' . ($tahunx + 1),
			' Gasal' . $tahunx . '/' . ($tahunx + 1),
			' Gasal' . $tahunx . '/' . ($tahunx + 1)
		);

		//jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut utk jabatan_tgl
		$date 				= strtotime($jabatan_tgl);
		$tgl_akademik 		= $array_bulan[date('n', $date)];
		$tgl_akademik_thn	= substr($tgl_akademik, 6, 4);

		echo "jabatan_tgl = $jabatan_tgl  <br>tgl_akademik = $tgl_akademik  <br> tgl_akademik_thn = $tgl_akademik_thn<br><br>";

		//buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12 utk tgl now
		$tgl_now				= date("Y-m-d");
		$thn_now				= substr($tgl_now, 0, 4);
		$array_bulan_now = array(
			1 => ' Gasal' . ($thn_now - 1) . '/' . $thn_now,
			' Gasal' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Gasal' . $thn_now . '/' . ($thn_now + 1),
			' Gasal' . $thn_now . '/' . ($thn_now + 1),
			' Gasal' . $thn_now . '/' . ($thn_now + 1),
			' Gasal' . $thn_now . '/' . ($thn_now + 1)
		);

		//jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut utk tgl now
		$date_now 				= strtotime($tgl_now);
		$tgl_akademik_now 		= $array_bulan_now[date('n', $date_now)];
		$tgl_akademik_now_thn	= substr($tgl_akademik_now, 6, 4);
		echo "Tanggal NOW = $tgl_now<br>tgl_akademik_now = $tgl_akademik_now  <br> tgl_akademik_now_thn = $tgl_akademik_now_thn";
		// exit();
		$selisih_thn_akademik = $tgl_akademik_now_thn - $tgl_akademik_thn;
		// if ($selisih_thn_akademik < "2") {
		// 	$this->session->set_flashdata('error', 'Belum memenuhi 2 tahun (4 semester) setelah TMT pada jabatan terakhir');
		// 	redirect(base_url() . 'usulan/usulan/draft');
		// }

		//jika usulan LK/GB
		// if (($jabatan_usulan_no == '8' || $jabatan_usulan_no == '11' || $jabatan_usulan_no == '12' || $jabatan_usulan_no == '9' || $jabatan_usulan_no == '10' || $jabatan_usulan_no == '13' || $jabatan_usulan_no == '14' || $jabatan_usulan_no == '15') && $selisih_thn >= '63' && $ikatan_kerja_kode <> 'I' && $nidn <> '0016025804') {
		// 	$this->session->set_flashdata('error', 'Usia Anda sudah memasuki atau melewati usia pensiun untuk mengajukan usulan baru LK/GB');
		// 	redirect(base_url() . 'usulan/usulan/draft');
		// 	exit();
		// } 

		$data1 = array(
			'no' => $no2,
			'usulan_no' => $no,
			'usulan_status_id' => $status_usulan,
			'keterangan_pengusul' => 'Tambah Draft Usulan Baru',
			'user_no' => $role = $this->session->userdata('no'),
			'created_at' => $tgl_create,
			'updated_at' => $tgl_update
		);
		$data = array(
			'no' => $no,
			'dosen_no' => $node,
			'jabatan_akhir_no' => $jabatan_akhir_no,
			'jabatan_usulan_no' => $jabatan_usulan_no,
			'jabatan_no' => $jabatan_no,
			'jabatan_tgl' => $jabatan_tgl,
			'jenjang_id_lama' => $jenjang_id_lama,
			'jenjang_id_baru' => $jenjang_id_usulan,
			'usulan_status_id' =>  $status_usulan,
			'user_updated_no' => $this->session->userdata('no'),
			'created_at' => $tgl_create,
			'updated_at' => $tgl_update
		);
		$this->draft->insert_data($data, 'usulans');
		$this->draft->insert_data($data1, 'usulan_riwayat_statuses');

		$update = "update dosens set nip ='$nip', karpeg='$dosen_karpeg' where no='$node'";
		$this->db->query($update);

		//INSERT table rwy_pend_pak
		$id_rwy_didik_formal = $this->input->post('id_rwy_didik_formal');
		$id_jenj_didik = $this->input->post('id_jenj_didik');
		$nama_jen = $this->input->post('nama_jen');
		$tgl_ijazah_pak = $this->input->post('tgl_ijazah_pak');
		$id_bid_studi = $this->input->post('id_bid_studi');

		$index = 0; // Set index array awal dengan 0
		foreach ($id_rwy_didik_formal as $id_rwy) {
			$perintah = "REPLACE INTO rwy_pend_pak (
							  no_dosen,
							  id_rwy_didik_formal,
							  no_usulan,
							  id_jenjang_pak,
							  jenjang_pak,
							  tgl_ijazah_pak,
							  created_at,
							  id_bid_studi
							)
							VALUES
							  (
							  '$node',
							  '" . $id_rwy . "',
							  '$no',
							  '" . $id_jenj_didik[$index] . "',
							  '" . $nama_jen[$index] . "',
							  '" . $tgl_ijazah_pak[$index] . "',
							  '" . $tgl_create . "',
							  '" . $id_bid_studi[$index] . "'
							  )";
			$index++;
			$masuk = $this->db->query($perintah);
		}

		if ($masuk) {
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url() . 'usulan/usulan/draft');
		} else {
			$this->session->set_flashdata('error', 'Gagal');
			redirect(base_url() . 'usulan/usulan/draft');
		}
	}

	public function create_naik_jab_sama()
	{
		$username 					= $this->session->userdata('username');
		$role 						= $this->session->userdata('role');
		$jabatan_akhir_no 			= $this->input->post('jabatan_akhir_no');
		$jabatan_no 				= $this->input->post('jabatan_no');
		$data['jabatan_akhir_no'] 	= $jabatan_akhir_no;

		$dos     = $this->db->query("SELECT no,nidn,lahir_tgl,ikatan_kerja_kode,sinkron_at from dosens WHERE nidn='$username'")->row();
		$sinkron_pen	= $this->db->query("SELECT sinkron_at from rwy_pend_formal WHERE id_sdm='$dos->no' GROUP by id_sdm")->row();
		$sinkron_ajar	= $this->db->query("SELECT sinkron_at from ajar_dosen WHERE NIDN='$username' GROUP by NIDN")->row();

		$data['dosen'] 				= $this->draft->tampil_data($jabatan_no, $username, $role);
		$data['golongan'] 			= $this->draft->tampil_golongan();
		$data['japim'] 				= $this->draft->tampil_japim();
		$data['jenjang'] 			= $this->draft->tampil_jenjang();
		$data['bidang'] 			= $this->draft->tampil_bidang();
		$data['jabatan'] 			= $this->draft->tampil_jabatan();
		$data['jabatan_jenjang'] 	= $this->draft->tampil_jabatan_jenjang($jabatan_akhir_no);
		$data['nidn_dos'] 			= $dos->nidn;
		$data['nidn'] 				= $username;
		$data['dosen_no'] 			= $dos->no;
		$data['sinkron_at'] 		= $dos->sinkron_at;
		$data['sinkron_pen'] 		= $sinkron_pen;
		$data['sinkron_ajar'] 		= $sinkron_ajar;
		$data['lahir_tgl'] 			= $dos->lahir_tgl;
		$data['ikatan_kerja_kode'] 	= $dos->ikatan_kerja_kode;

		vusulan('tambah_draft_naik_jab_sama', $data);
	}

	public function tambah_usulan_naik_jab_sama()
	{
		$node 				= $this->input->post('node');
		$nidn 				= $this->input->post('nidn');
		$keterangan 		= $this->input->post('keterangan');
		$jabatan_usulan_no 	= $this->input->post('jabatan_usulan_no');
		$jabatan_no 		= $this->input->post('jabatan_no');
		$jabatan_tgl 		= $this->input->post('jabatan_tgl');
		$jenjang_id_lama 	= $this->input->post('jenjang_id_lama');
		$jenjang_id_usulan 	= $this->input->post('jenjang_id_usulan');
		$selisih_thn 		= $this->input->post('selisih_thn');
		$selisih_bln 		= $this->input->post('selisih_bln');
		$ikatan_kerja_kode 	= $this->input->post('ikatan_kerja_kode');
		$tgl_create 		= date("y-m-d H:i:s");
		$tgl_update 		= date("y-m-d H:i:s");
		$no 				= date("ymdHis") . '02' . $nidn;
		$no2 				= date("ymdHis") . $nidn;
		$status_usulan 		= '1';
		$nip 				= $this->input->post('nip');
		$dosen_karpeg 		= $this->input->post('dosen_karpeg');

		//buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12 utk jabatan_tgl
		$tahunx					= substr($jabatan_tgl, 0, 4);

		$array_bulan = array(
			1 => ' Gasal' . ($tahunx - 1) . '/' . $tahunx,
			' Gasal' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Genap' . ($tahunx - 1) . '/' . $tahunx,
			' Gasal' . $tahunx . '/' . ($tahunx + 1),
			' Gasal' . $tahunx . '/' . ($tahunx + 1),
			' Gasal' . $tahunx . '/' . ($tahunx + 1),
			' Gasal' . $tahunx . '/' . ($tahunx + 1)
		);

		//jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut utk jabatan_tgl
		$date 				= strtotime($jabatan_tgl);
		$tgl_akademik 		= $array_bulan[date('n', $date)];
		$tgl_akademik_thn	= substr($tgl_akademik, 6, 4);

		echo "jabatan_tgl = $jabatan_tgl  <br>tgl_akademik = $tgl_akademik  <br> tgl_akademik_thn = $tgl_akademik_thn<br><br>";

		//buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12 utk tgl now
		$tgl_now				= date("Y-m-d");
		$thn_now				= substr($tgl_now, 0, 4);
		$array_bulan_now = array(
			1 => ' Gasal' . ($thn_now - 1) . '/' . $thn_now,
			' Gasal' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Genap' . ($thn_now - 1) . '/' . $thn_now,
			' Gasal' . $thn_now . '/' . ($thn_now + 1),
			' Gasal' . $thn_now . '/' . ($thn_now + 1),
			' Gasal' . $thn_now . '/' . ($thn_now + 1),
			' Gasal' . $thn_now . '/' . ($thn_now + 1)
		);

		//jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut utk tgl now
		$date_now 				= strtotime($tgl_now);
		$tgl_akademik_now 		= $array_bulan_now[date('n', $date_now)];
		$tgl_akademik_now_thn	= substr($tgl_akademik_now, 6, 4);
		echo "Tanggal NOW = $tgl_now<br>tgl_akademik_now = $tgl_akademik_now  <br> tgl_akademik_now_thn = $tgl_akademik_now_thn";
		// exit();
		$selisih_thn_akademik = $tgl_akademik_now_thn - $tgl_akademik_thn;
		// if ($selisih_thn_akademik < "2") {
		// 	$this->session->set_flashdata('error', 'Belum memenuhi 2 tahun (4 semester) setelah TMT pada jabatan terakhir');
		// 	redirect(base_url() . 'usulan/usulan/draft');
		// }

		//jika usulan GB kondisi jabatan sebelumnya GB
		if ($jabatan_usulan_no == '15' && $jabatan_no == '50' && $selisih_thn >= '70' && $ikatan_kerja_kode <> 'I') {
			$this->session->set_flashdata('error', 'Usia Anda sudah memasuki atau melewati usia pensiun untuk mengajukan usulan baru GB');
			redirect(base_url() . 'usulan/usulan/draft');
			exit();
		}

		//jika usulan LK/GB NON GB
		// if (($jabatan_usulan_no == '8' || $jabatan_usulan_no == '11' || $jabatan_usulan_no == '12' || $jabatan_usulan_no == '9' || $jabatan_usulan_no == '10' || $jabatan_usulan_no == '13' || $jabatan_usulan_no == '14') && $selisih_thn >= '63' && $ikatan_kerja_kode <> 'I') {
		// 	$this->session->set_flashdata('error', 'Usia Anda sudah memasuki atau melewati usia pensiun untuk mengajukan usulan baru LK/GB');
		// 	redirect(base_url() . 'usulan/usulan/draft');
		// 	exit();
		// }

		$data1 = array(
			'no' => $no2,
			'usulan_no' => $no,
			'usulan_status_id' => $status_usulan,
			'keterangan_pengusul' => 'Tambah Draft Usulan Baru',
			'user_no' => $role = $this->session->userdata('no'),
			'created_at' => $tgl_create,
			'updated_at' => $tgl_update
		);
		$data = array(
			'no' => $no,
			'dosen_no' => $node,
			'jabatan_akhir_no' => $jabatan_akhir_no,
			'jabatan_usulan_no' => $jabatan_usulan_no,
			'jabatan_no' => $jabatan_no,
			'jabatan_tgl' => $jabatan_tgl,
			'jenjang_id_lama' => $jenjang_id_lama,
			'jenjang_id_baru' => $jenjang_id_usulan,
			'usulan_status_id' =>  $status_usulan,
			'created_at' => $tgl_create,
			'updated_at' => $tgl_update
		);
		$this->draft->insert_data($data, 'usulans');
		$this->draft->insert_data($data1, 'usulan_riwayat_statuses');

		$update = "update dosens set nip ='$nip', karpeg='$dosen_karpeg' where no='$node'";
		$this->db->query($update);

		//INSERT table rwy_pend_pak
		$id_rwy_didik_formal = $this->input->post('id_rwy_didik_formal');
		$id_jenj_didik = $this->input->post('id_jenj_didik');
		$nama_jen = $this->input->post('nama_jen');
		$tgl_ijazah_pak = $this->input->post('tgl_ijazah_pak');
		$id_bid_studi = $this->input->post('id_bid_studi');

		$index = 0; // Set index array awal dengan 0
		foreach ($id_rwy_didik_formal as $id_rwy) {
			$perintah = "REPLACE INTO rwy_pend_pak (
							  no_dosen,
							  id_rwy_didik_formal,
							  no_usulan,
							  id_jenjang_pak,
							  jenjang_pak,
							  tgl_ijazah_pak,
							  created_at,
							  id_bid_studi
							)
							VALUES
							  (
							  '$node',
							  '" . $id_rwy . "',
							  '$no',
							  '" . $id_jenj_didik[$index] . "',
							  '" . $nama_jen[$index] . "',
							  '" . $tgl_ijazah_pak[$index] . "',
							  '" . $tgl_create . "',
							  '" . $id_bid_studi[$index] . "'
							  )";
			$index++;
			$masuk = $this->db->query($perintah);
		}

		if ($masuk) {
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect(base_url() . 'usulan/usulan/draft');
		} else {
			$this->session->set_flashdata('error', 'Gagal');
			redirect(base_url() . 'usulan/usulan/draft');
		}
	}

	public function create_loncat_jab()
	{
		$username 			= $this->session->userdata('username');
		$role 				= $this->session->userdata('role');
		$jabatan_akhir_no 	= $this->input->post('jabatan_akhir_no');
		$jabatan_no 		= $this->input->post('jabatan_no');

		$dos     = $this->db->query("SELECT no,nidn,lahir_tgl,ikatan_kerja_kode,sinkron_at from dosens WHERE nidn='$username'")->row();
		$sinkron_pen	= $this->db->query("SELECT sinkron_at from rwy_pend_formal WHERE id_sdm='$dos->no' GROUP by id_sdm")->row();
		$sinkron_ajar	= $this->db->query("SELECT sinkron_at from ajar_dosen WHERE NIDN='$username' GROUP by NIDN")->row();

		$data['jabatan_akhir_no'] 	= $jabatan_akhir_no;
		$data['dosen'] 				= $this->draft->tampil_data($jabatan_no, $username, $role);
		$data['golongan'] 			= $this->draft->tampil_golongan();
		$data['japim'] 				= $this->draft->tampil_japim();
		$data['jenjang'] 			= $this->draft->tampil_jenjang();
		$data['bidang'] 			= $this->draft->tampil_bidang();
		$data['jabatan'] 			= $this->draft->tampil_jabatan();
		$data['jabatan_jenjang'] 	= $this->draft->tampil_jabatan_jenjang($jabatan_akhir_no);
		$data['nidn_dos'] 			= $dos->nidn;
		$data['nidn'] 				= $username;
		$data['dosen_no'] 			= $dos->no;
		$data['sinkron_at'] 		= $dos->sinkron_at;
		$data['sinkron_pen'] 		= $sinkron_pen;
		$data['sinkron_ajar'] 		= $sinkron_ajar;
		$data['lahir_tgl'] 			= $dos->lahir_tgl;
		$data['ikatan_kerja_kode'] 	= $dos->ikatan_kerja_kode;

		vusulan('tambah_draft_loncat_jab', $data);
	}

	function tambah_matkul($id)
	{
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$matkul = $this->input->post('matkul');
		$no = date("ymdHis") . '01';
		$file_path = './assets/download_matkul/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {
			$image = $this->upload->data();
			$data = array(
				'no' => $no,
				'usulan_no' => $id,
				'nama' => $matkul,
				'berkas' => $image['file_name'],
				'created_at' => $tgl_create,
				'updated_at' => $tgl_update
			);
			$this->session->set_flashdata('flash', 'Ditambah');
			$this->draft->insert_data($data, 'usulan_matkuls');
			redirect(base_url() . 'usulan/usulan/show_matakul/' . $id);
		} else {
			$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
			redirect(base_url() . 'usulan/usulan/show_matakul/' . $id);
		}
	}

	function tambah_syarat()
	{
		$jenis = $this->input->post('jenis');
		$no_usulan = $this->input->post('no_usulan');
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$no = date("ymdHis") . '03' . $username;
		$file_path = './assets/download_syarat/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '10048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		$data_ceklis = $this->db->query("SELECT * FROM `usulan_ceklists` WHERE usulan_no='$no_usulan'")->num_rows();
		if ($data_ceklis == 0) {
			$tambah = "INSERT INTO usulan_ceklists (
				no,
				usulan_no,
				created_at,
				updated_at
			  )
			  VALUES
				(
				  '$no',
				  '$no_usulan',
				  '$tgl_create',
				  '$tgl_create'
				)";
			$this->db->query($tambah);
		}
		if ($this->upload->do_upload('berkas')) {
			$image = $this->upload->data();
			$update = "update usulan_ceklists set $jenis = '$image[file_name]',updated_at='$tgl_update' where  usulan_no='$no_usulan'";
			$this->db->query($update);
		} else {
			$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
			redirect(base_url() . 'usulan/usulan/persyaratan/' . $no_usulan);
		}
		$this->session->set_flashdata('flash', 'Ditambah');
		redirect(base_url() . 'usulan/usulan/persyaratan/' . $no_usulan);
	}

	function tambah_pendidik($id)
	{
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$jenjang = $this->input->post('jenjang');
		$bidang_ilmu = $this->input->post('bidang_ilmu');
		$tgl_wisuda = $this->input->post('tgl_wisuda');
		$no = date("ymdHis") . '04' . $username;
		$file_path = './assets/download_pendidik/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		$nidn = $this->session->userdata('username');
		$cari_dosen = $this->db->query("select no,nidn from dosens where nidn='$nidn' ")->row();
		$id_sdm = $cari_dosen->no;

		if ($this->upload->do_upload('berkas')) {
			$image = $this->upload->data();
			$data = array(
				'id' => $no,
				'id_rwy_didik_formal' => $no,
				'id_sdm' => $id_sdm,
				'thn_lulus' => $tgl_wisuda,
				'id_bid_studi' => $bidang_ilmu,
				'id_jenj_didik' => $jenjang,
				'berkas' => $image['file_name'],
				'tgl_create' => $tgl_create,
				'last_update' => $tgl_update
			);
			$this->session->set_flashdata('flash', 'Ditambah');
			$this->draft->insert_data($data, 'rwy_pend_formal');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $id);
		} else {
			$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $id);
		}
	}

	function update_pendidik($no)
	{
		$id = $this->input->post('id');
		$semester = $this->input->post('semester');
		$config['upload_path'] = './assets/download_pendidik/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {
			$where = array('id_rwy_didik_formal' => $id);
			$image = $this->upload->data();
			$data = array(
				'berkas' => $image['file_name']
			);
			//unlink('assets/download_pendidik/'.$this->input->post('old_pict', TRUE));
			$this->session->set_flashdata('flash', 'Diubah');
			$this->dupak->update_data($where, $data, 'rwy_pend_formal');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no);
		} else {
			$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no);
		}
	}

	function hapus_matkul($id, $no_usulan, $berkas)
	{
		unlink('assets/download_matkul/' . $berkas);
		$this->draft->hapus_data($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'usulan/usulan/show_matakul/' . $no_usulan);
	}

	function hapus_syarat($berkas, $no_usulan, $jenis)
	{
		unlink('assets/download_syarat/' . $berkas);
		$tgl_update = date("y-m-d H:i:s");
		$update = "update usulan_ceklists set $jenis =null,updated_at='$tgl_update'  where  usulan_no='$no_usulan'";
		$this->db->query($update);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'usulan/usulan/persyaratan/' . $no_usulan);
	}

	function edit_usulan($id)
	{
		$data['no'] = $id;
		if (isset($_POST['tambah'])) {
		} else {
			vusulan('edit_usulan', $data);
		}
	}

	function hapus_usulan($no_usulan)
	{
		$q_ceklis = $this->db->query("select * from usulan_dupaks where usulan_no='$no_usulan' ")->row();
		if ($q_ceklis > 0) {
			$this->session->set_flashdata('error', 'Data ajuan di bidang A,B,C,dan D masih ada, silakan hapus terlebih dahulu !!!');
			redirect(base_url() . 'usulan/usulan/draft');
			//echo "Data ajuan di bidang A,B,C,dan D masih ada, silakan hapus terlebih dahulu !!!";
		} else {
			$hapus = "DELETE from usulans where no='$no_usulan'";
			$this->db->query($hapus);
			if ($hapus) {
				$this->session->set_flashdata('flash', 'dihapus');
				redirect(base_url() . 'usulan/usulan/draft');
			} else {
				$this->session->set_flashdata('error', 'Gagal dihapus');
				redirect(base_url() . 'usulan/usulan/draft');
			}
		}
	}

	function show_mtk_pak($no_usulan)
	{
		$data_mtk 	= $this->db->query("SELECT
											a.`usulan_status_id`,
											b.*
										FROM
											usulans AS a,
											usulan_matkuls AS b
										WHERE a.no = '$no_usulan'
											AND b.`usulan_no` = a.`no`")->result();
		$data 		= $this->db->query("SELECT * from usulans where no='$no_usulan'")->row();
		$r_nidn 	= $this->db->query("SELECT
											a.no,
											a.dosen_no,
											b.nidn
										FROM
											usulans AS a,
											dosens AS b
										WHERE a.dosen_no = b.no
											AND a.no = '$no_usulan'")->row();

		$usulan_status_id 	= $data->usulan_status_id;
		$nidn 				= $r_nidn->nidn;
		$d_mtk['usulan_status_id'] = $usulan_status_id;

		$role 			= $this->session->userdata('role');
		$d_mtk['role'] 	= $role;

		$d_mtk['nidn'] 	= $nidn;
		$d_mtk['data_mtk'] 	= $data_mtk;
		$d_mtk['no'] 		= $no_usulan;

		vusulan('show_mtk_pak', $d_mtk);
	}

	function skpak($no_usulan)
	{
		$role = $this->session->userdata('role');
		$d['da']		= $this->db->query("SELECT * FROM usulans WHERE no='$no_usulan'")->row();
		$d['no']		= $no_usulan;
		$d['role'] 		= $role;

		$data_doc 		= $this->db->query("SELECT
												a.`pak`,
												a.`sk_inpassing`,
												a.`sk_jafung`
											FROM
												usulans a
											WHERE a.no = '$no_usulan'")->row();
		$docPak 		= $data_doc->pak;
		$url 			= base_url('assets/pak/' . $docPak);
		if (isset($docPak)) {
			$d['f_pak'] = '<a href="' . base_url() . 'assets/pak/' . $docPak . '" data-toggle="tooltip" title="View/Unduh" target="_blank" class="btn btn-success">
						<i class="fa fa-download"></i>
						Download PAK
					</a>';
			$d['doc_pak'] = '<embed type="application/pdf" src="' . $url . '" width="100%" height="850"></embed>';
		} else {
			$d['f_pak'] = '<a href="" data-toggle="modal" title="Dokumen tidak tersedia" class="btn btn-danger">
						<i class="fa fa-close"></i>
						Download PAK
						 </a>';
			$d['doc_pak'] = '<h4>Dokumen tidak tersedia</h4>';
		}
		// sk jafung
		$docSk = $data_doc->sk_jafung;
		$urlsk = base_url('assets/sk/' . $docSk);
		if (isset($docSk)) {
			$d['f_jfa'] = '<a href="' . base_url() . 'assets/sk/' . $docSk . '" data-toggle="tooltip" title="View/Unduh" target="_blank" class="btn btn-success">
						<i class="fa fa-download"></i>
						Download PAK
					</a>';
			$d['doc_jfa'] = '<embed type="application/pdf" src="' . $urlsk . '" width="100%" height="850"></embed>';
		} else {
			$d['f_jfa'] = '<a href="" data-toggle="modal" title="Dokumen tidak tersedia" class="btn btn-danger">
						<i class="fa fa-close"></i>
						Download PAK
						 </a>';
			$d['doc_jfa'] = '<h4>Dokumen tidak tersedia</h4>';
		}

		vusulan('skpak', $d);
	}

	function update_mtk_pak($usulan_no)
	{
		$mtk = $this->input->post('mtk');

		$cari_mtk = $this->db->query("select *from usulan_matkuls where usulan_no='$usulan_no' AND mtk='$mtk'")->row();
		if ($cari_mtk > 0) {
			$this->session->set_flashdata('error', 'Matakuliah sudah ada.');
			redirect(base_url() . 'usulan/usulan/show_mtk_pak/' . $usulan_no);
		} else {
			$jml_mtk = $this->db->query("SELECT COUNT(*) AS jml FROM usulan_matkuls WHERE usulan_no='$usulan_no'")->row();
			$jml = $jml_mtk->jml;
			if ($jml == 3) {
				$this->session->set_flashdata('error', 'Matakuliah tidak boleh lebih dari 3 matakuliah');
				redirect(base_url() . 'usulan/usulan/show_mtk_pak/' . $usulan_no);
			} else {
				$perintah = "INSERT INTO `usulan_matkuls` (`usulan_no`, mtk)VALUES ('$usulan_no', '$mtk')";
				$this->db->query($perintah);

				$this->session->set_flashdata('flash', 'Diupdate');
				redirect(base_url() . 'usulan/usulan/show_mtk_pak/' . $usulan_no);
			}
		}
	}

	function update_tgl_ijazah($id_sdm)
	{
		$id_rwy_didik_formal 	= $this->input->post('id_rwy_didik_formal');
		$tgl_ijazah 			= $this->input->post('tgl_ijazah');
		$no_usulan 				= $this->input->post('no_usulan');

		$update = $this->db->query("UPDATE
									rwy_pend_pak
								SET
									tgl_ijazah_pak = '$tgl_ijazah'
								WHERE id_rwy_didik_formal = '$id_rwy_didik_formal'
									AND no_dosen = '$id_sdm'");

		if ($update) {
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
		} else {
			$this->session->set_flashdata('error', 'Diubah');
			redirect(base_url() . 'usulan/usulan/show_pendidikan/' . $no_usulan);
		}
	}

	function hapus_mtk_pak($no_usulan_mtk, $usulan_no)
	{
		$perintah = "DELETE FROM `usulan_matkuls` WHERE `no_usulan_matkul`='$no_usulan_mtk' AND `usulan_no`='$usulan_no'";
		$this->db->query($perintah);

		$this->session->set_flashdata('flash', 'Dihapus');
		redirect(base_url() . 'usulan/usulan/show_mtk_pak/' . $usulan_no);
	}

	function update_tmt()
	{
		$usulan_no = $this->input->post('usulan_no');
		$dosen_no = $this->input->post('dosen_no');
		$tmt_tahun = $this->input->post('tmt_tahun');
		$tmt_bulan = $this->input->post('tmt_bulan');

		$c_tmt = $this->db->query("SELECT id FROM tmt_jab WHERE usulan_no='$usulan_no' and dosen_no='$dosen_no'")->row();
		if ($c_tmt->id > 0) {
			$tmt = "UPDATE
					  tmt_jab
					SET
					  tmt_bulan = '$tmt_bulan',
					  tmt_tahun = '$tmt_tahun'
					WHERE usulan_no = '$usulan_no'
					  AND dosen_no = '$dosen_no'";
			$this->db->query($tmt);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url() . 'usulan/usulan/usulans/usul/' . $usulan_no);
		} else {
			$tmt = "INSERT INTO tmt_jab (
							  usulan_no,
							  dosen_no,
							  tmt_bulan,
							  tmt_tahun
							)
							VALUES
							  (
								'$usulan_no',
								'$dosen_no',
								'$tmt_bulan',
								'$tmt_tahun'
							  )";
			$this->db->query($tmt);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect(base_url() . 'usulan/usulan/usulans/usul/' . $usulan_no);
		}
	}

	function updateberitaberanda()
	{
		$judul = $this->input->post('xjud');
		$isi = $this->input->post('xisi');
		$id = $this->input->post('id');
		$tgl_create = date("y-m-d H:i:s");
		$username    = $this->session->userdata('username');
		$where = array('id' => $id);
		$data = array(
			'judul' => $judul,
			'isi' => $isi,
			'nip_log' => $username,
			'tgl_log' => $tgl_create
		);
		$this->dupak->update_data($where, $data, 'berita_beranda');
		redirect(base_url() . 'usulan/usulan');
	}

	function download_pak($pak)
	{
		force_download('assets/pak/' . $pak, NULL);
	}

	function download_sk($sk_jafung)
	{
		force_download('assets/sk/' . $sk_jafung, NULL);
	}

	function vem()
	{
		Vusulan('v_email');
	}

	function kirim()
	{
		$email = $this->input->post("email");

		// mengirim aktifasi ke email 
		$config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'sijali3.kemdikbud@gmail.com',
			'smtp_pass' => 'spkdxzbfeicidhjh',
			'smtp_crypto' => 'tls',
			'smtp_port' => 587,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		);
		$this->load->library('email', $config);
		$this->email->from('sijali3.kemdikbud@gmail.com', 'Testing');
		$this->email->to($email);
		$this->email->subject('Konfirmasi Akun');
		$this->email->message("<p>silakan aktifasi akun Anda</p>");


		if ($this->email->send()) {
			echo 'Email berhasil dikirim';
		} else {
			echo 'Email tidak berhasil dikirim';
			echo '<br />';
			echo $this->email->print_debugger();
		}
	}
}
