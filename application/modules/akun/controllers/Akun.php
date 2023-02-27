<?php
defined('BASEPATH') or exit('No direct script access allowed');



/**
 * @author akil
 * @version 1.0
 * @created 13-Mar-2016 20:19:38
 */
class Akun extends MX_Controller
{


	function __construct()
	{

		$this->load->helper('date_helper');
		parent::__construct();

		if ($this->session->userdata('status') != "login") {
			redirect(base_url() . 'login/login?pesan=belumlogin');
		}
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
		$instansi 	= $this->session->userdata('instansi');
		$role 		= $this->session->userdata('role');
		$institusi 	= $this->input->post('institusi');

		if ($role == '1') { //jika administrator
			$data_users = $this->db->query("SELECT a.nama AS nm_lengkap, c.nama AS nm_roles,a.*,b.`nama_instansi` FROM users a JOIN instansis b  ON a.`instansi_kode` = b.`kode` JOIN `roles` c  ON a.`role_id` = c.`id`")->result();

			$users = $this->db->query("SELECT a.nama AS nm_lengkap, c.nama AS nm_roles,a.*,b.`nama_instansi` FROM users a JOIN instansis b  ON a.`instansi_kode` = b.`kode` JOIN `roles` c  ON a.`role_id` = c.`id` where a.instansi_kode='$institusi'")->result();

			$cek_instansi = $this->db->query("select b.kode,b.nama_instansi from users a join instansis b on a.instansi_kode=b.kode group by b.kode")->result();
		} elseif ($role == '4') { //jika operator pt
			$data_users = $this->db->query("SELECT a.nama AS nm_lengkap, c.nama AS nm_roles,a.*, b.`nama_instansi`FROM users a	JOIN instansis b  ON a.`instansi_kode` = b.`kode` JOIN `roles` c  ON a.`role_id` = c.`id`WHERE a.role_id in ('3','4') and a.password <> '' and a.instansi_kode='$instansi'")->result();
		}

		$data['cek_instansi'] 	= $cek_instansi;
		$data['data_users'] 	= $data_users;
		$data['users'] 			= $users;
		$data['role'] 			= $role;

		vusulan('daftar_user', $data);
	}
	public function beranda()
	{
		$username 		= $this->session->userdata('username');
		$data_users 	= $this->db->query("SELECT rayon_id FROM users where username='$username'")->row();
		$data['username'] = $data_users->rayon_id;
		$data['role'] 	= $this->session->userdata('role');

		vusulan('pilih', $data);
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

			// echo "id_sdm = $id_sdm<br>";
			// echo "nama = $nama<br>";
			// echo "nidn = $nidn<br>";
			// echo "jabatan_no = $jabatan_no<br><br>";
		}
	}

	function cari_dosen_pt()
	{
		$kd_pt 	= $this->session->userdata('instansi');

		// $nama = "fauzi";
		// $isian = file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/dosen_pt.php?nama=' . $nama . '&id_pt=' . $kd_pt);
		// $hasil = json_decode($isian, true);

		// if (count($hasil) > 0) {
		// 	foreach ($hasil as $hasil) {
		// 		$id_sdm 			= $hasil["id"];
		// 		$nama 				= addslashes($hasil["nama"]);
		// 		$nidn 				= $hasil["nidn"];
		// 		$jabatan_no 		= $hasil["jabatan_fungsional"]["id"];

		// 		$arr_result[] 		= $nidn . ' - ' . $nama;
		// 		echo json_encode($arr_result);
		// 	}
		// }

		$isi 	= $_GET['term'];
		if (isset($isi)) {
			$nama = "fauzi";
			$isian = file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/dosen_pt.php?nama=' . $isi . '&id_pt=' . $kd_pt);
			$hasil = json_decode($isian, true);

			if (count($hasil) > 0) {
				foreach ($hasil as $hasil) {
					$id_sdm 			= $hasil["id"];
					$nama 				= addslashes($hasil["nama"]);
					$nidn 				= $hasil["nidn"];
					$jabatan_no 		= $hasil["jabatan_fungsional"]["id"];

					$arr_result[] 		= $nidn . ' - ' . $nama;
					echo json_encode($arr_result);
				}
			}
		}
	}

	public function user_pt_baru()
	{
		$kd_pt 	= $this->session->userdata('instansi');
		$role 	= $this->session->userdata('role');

		$nama 	= "fauzi";

		$isian = file_get_contents('https://sijampang-lldikti3.kemdikbud.go.id/API/dosen_pt.php?nama=' . $nama . '&id_pt=' . $kd_pt);
		$hasil = json_decode($isian, true);

		$data['hasil'] = $hasil;

		$data['kd_pt']	= $kd_pt;
		$data['role']	= $role;

		Vusulan('user_pt_baru', $data);
	}



	public function daftar_user()
	{
		$this->db2 	= $this->load->database('db2', true);

		$instansi 	= $this->session->userdata('instansi');
		$role 		= $this->session->userdata('role');
		$no 		= $this->input->post('no');
		$q_stat 	= $this->db->query("select kode,nama_instansi from instansis ")->result();
		$q_inst 	= $this->db->query("select kode,nama_instansi from instansis where kode='$instansi' ")->result();
		$q_roles 	= $this->db->query("select id,nama from roles ")->result();
		$q_rolept 	= $this->db->query("select id,nama from roles where id='4'")->result();
		$q_role 	= $this->db->query("select id,nama from roles where id='3'")->result();
		$q_dosen 	= $this->db->query("SELECT
									  a.`nidn`,
									  a.`nama`,
									  a.`lahir_tgl`,
									  a.`jenjang_id`,
									  b.`nama_jenjang`,
									  d.`nama_instansi`,
									  a.`jabatan_no`,
									  e.`nama_jabatans`,
									  e.`kum`
									FROM
									  dosens a
									  LEFT JOIN `jenjangs` b
										ON a.`jenjang_id` = b.`id`
									  LEFT JOIN prodis c
										ON a.`prodi_kode` = c.`kode`
									  LEFT JOIN `instansis` d
										ON c.`instansi_kode` = d.`kode`
									  LEFT JOIN `jabatans` e
										ON a.`jabatan_no` = e.`kode`
									WHERE a.`jenjang_id` IN ('36', '41', '35', '37', '40', '30', '32')
									  AND c.`instansi_kode` = '$instansi'");

		$q_dosen_mirror = $this->db2->query("SELECT
												* 
											FROM
												v_users_pt 
											WHERE
												instansi_kode = '$instansi'
												ORDER BY nama asc");
		$data['instansis'] 	= $q_stat;
		$data['roles'] 		= $q_roles;
		$data['role'] 		= $q_role;
		$data['q_rolept'] 	= $q_rolept;
		$data['instan'] 	= $q_inst;
		$data['dosen'] 		= $q_dosen_mirror;
		$data['no'] 		= $no;

		if ($role == '1') { //jika adminstrator
			Vusulan('user', $data);
		} elseif ($role == '4' && $no == '2') { //jika operator pt dan ingin buat akun sub operator pt
			Vusulan('user', $data);
		} elseif ($role == '4') { //jika operator pt dan ingin buat akun dosen
			Vusulan('usert_pt', $data);
		}
	}

	public function tambah_user($status)
	{
		$this->db2 = $this->load->database('db2', true);

		$nama = $this->input->post('nama');
		$sub = $this->input->post('sub');
		$email = $this->input->post('email');
		$telp = $this->input->post('telp');
		$instansi = $this->input->post('instansi');
		$bagian = $this->input->post('bagian');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$pass_64 = base64_encode($pass);
		$pass_md5 = md5($pass);
		$berkas = $this->input->post('berkas');
		$username = $this->session->userdata('username');
		if ($status == '1') {
			$no = date("ymdHis") . '01' . $instansi;
		} else {
			$no = date("ymdHis") . '01' . $user;

			$sql = $this->db2->query("SELECT * from v_new_dosens where nidn='$user'")->row();

			$dosen_no = $sql->NO;
			$nip = $sql->nip;
			$nama_dosen = addslashes($sql->nama);
			$no_serdik = $sql->no_serdik;
			$jenjang_id = $sql->jenjang_id;
			$bidang_ilmu_kode = $sql->bidang_ilmu_kode;
			$ikatan_kerja_kode = $sql->ikatan_kerja_kode;
			$pengangkatan_tgl = $sql->pengangkatan_tgl;
			$golongan_kode = $sql->golongan_kode;
			$golongan_tgl = $sql->golongan_tgl;
			$jabatan_no = $sql->jabatan_no;

			if ($jabatan_no == '') {
				$jabatan_no = '31';
			} else {
				$jabatan_no = $jabatan_no;
			}

			$jabatan_tgl = $sql->jabatan_tgl;
			$lahir_tgl = $sql->lahir_tgl;
			$lahir_tempat = $sql->lahir_tempat;
			$jk = $sql->jk;
			$nik = $sql->nik;
			$npwp = $sql->npwp;
			$no_hp = $sql->no_hp;
			$masa_kerja_gol_thn = $sql->masa_kerja_gol_thn;
			$masa_kerja_gol_bln = $sql->masa_kerja_gol_bln;

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
										nm_fakultas AS nm_fakultas 
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
										AND d.id_thn_ajaran = '2020' 
										AND LEFT(e.npsn,2)='03'
										AND a.nidn='$user'
										ORDER BY d.last_update DESC ")->row();

			$this->db->query("REPLACE INTO `dosens` (
								`no`,
								`nip`,
								`nidn`,
								`no_serdik`,
								`nama`,
								`jenjang_id`,
								`bidang_ilmu_kode`,
								`ikatan_kerja_kode`,
								`pengangkatan_tgl`,
								`golongan_kode`,
								`golongan_tgl`,
								`jabatan_no`,
								`jabatan_tgl`,
								`prodi_kode`,
								`lahir_tgl`,
								`lahir_tempat`,
								`jk`,
								`aktif`,
								`nik`,
								`npwp`,
								`no_hp`,
								`masa_kerja_gol_thn`,
								`masa_kerja_gol_bln`,
								`nm_fakultas`
							)
							VALUES
								(
								'$dosen_no',
								'$nip',
								'$user',
								'$no_serdik',
								'$nama_dosen',
								'$jenjang_id',
								'$bidang_ilmu_kode',
								'$ikatan_kerja_kode',
								'$pengangkatan_tgl',
								'$golongan_kode',
								'$golongan_tgl',
								'$jabatan_no',
								'$jabatan_tgl',
								'$sql2->id_sms',
								'$lahir_tgl',
								'$lahir_tempat',
								'$jk',
								'1',
								'$nik',
								'$npwp',
								'$no_hp',
								'$masa_kerja_gol_thn',
								'$masa_kerja_gol_bln',
								'$sql2->nm_fakultas')");
		}
		$tgl_create = date("y-m-d H:i:s");
		$tgl_update = date("y-m-d H:i:s");
		$q_stat = $this->db->query("select username from users where username='$user' ")->row();
		// $q_akses= $this->db->query("select * from detail_akses where role_id='$bagian' ")->result();
		// foreach($q_akses as $akses){
		// 	$perintah2="INSERT INTO role_akses (no,user_id,system_id,role_id,created_at,updated_at)VALUES('','$no','$akses->system_id','$bagian','$tgl_create','$tgl_update')";
		// 		$this->db->query($perintah2);
		// }
		$file_path = './assets/download_user/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no;
		$this->load->library('upload', $config);
		if ($q_stat > 0) {
			$this->session->set_flashdata('error', 'Username Sudah Digunakan Sebelumnya');
			redirect(base_url() . 'akun/akun');
		} else {
			if ($this->upload->do_upload('berkas')) {
				$image = $this->upload->data();
				$data = array(
					'no' => $no,
					'role_id' => $bagian,
					'instansi_kode' => $instansi,
					'rayon_id' => $sub,
					'nama' => $nama,
					'email' => $email,
					'username' => $user,
					'aktif' => '1',
					'password' => $pass_md5,
					'password_64' => $pass_64,
					'telp' => $telp,
					'sk' => $image['file_name'],
					'user_created_no' => $username,
					'created_at' => $tgl_create,
					'updated_at' => $tgl_update
				);
				// $this->session->set_flashdata('flash', 'Ditambah');
				// $this->db->insert('users', $data);
				// redirect(base_url() . 'akun/akun');
				//end
				$gambar = $image['file_name'];
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
				// Load library email dan konfigurasinya
				$this->load->library('email', $config);
				// Email dan nama pengirim
				$this->email->from('sijali3.kemdikbud@gmail.com', 'SIJALI LLDIKTI 3 - KEMDIKBUD');
				// Email penerima
				$this->email->to($email); // Ganti dengan email tujuan
				// Lampiran email, isi dengan url/path file
				// $this->email->attach('http://sijali3.kemdikbud.go.id/assets/download_user/File19120420232419120420232401.pdf');
				$this->email->subject('Akses Login Ke SIJALI3');
				// Isi email
				$this->email->message("
		<table style='padding-bottom:20px;max-width:5169px;min-width:220px' cellspacing='0' cellpadding='0' border='0'><tbody></tbody></table></div><div style='border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px' class='m_-3495291044583463230mdv2rw' align='center'><img src='https://silat-lldikti3.kemdikbud.go.id/assets/images/logo/logo-ristek-2.png' style='width:103px;height:90px;margin-bottom:16px' class='CToWUd' width='75' height='24'><div style='border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word'><div style='font-size:24px'>SISTEM INFORMASI JENJANG JABATAN AKADEMIK LLDIKTI WILAYAH III</div><table style='margin-top:8px' align='center'><tbody><tr style='line-height:normal'><td style='padding-right:8px' align='right'></td><td><a style='color:rgba(0,0,0,0.87);font-size:14px;line-height:20px'>Selamat Datang, " . $nama . "</a></td></tr></tbody></table></div><div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center'>LLDIKTI Wilayah III Mengucapkan terima kasih kepada Anda yang telah berpartisipasi dalam kegiatan Pengajuan Jabatan Akademik Dosen secara digitar melalui sistem SIJALI.
		<div style='text-align:center'><strong>Username : " . $user . "</strong></div>
		<div style='text-align:center'><strong>Password : " . $pass . "</strong></div>
		<div style='padding-top:32px;text-align:center'>
		<a href='https://sijali-lldikti3.kemdikbud.go.id/' style='line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#4184f3;border-radius:5px;min-width:90px' target='_blank'>Login Accounts</a></div>
		<div style='padding-top:32px;text-align:center'><a href='https://sijali-lldikti3.kemdikbud.go.id/assets/download_user/" . $gambar . "' style='line-height:16px;color:#000000;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#00FF00;border-radius:5px;min-width:90px' target='_blank'>Download SK</a></div>
		
		</div></div><div style='text-align:left'><div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center'><div>Anda menerima email ini sebagai pemberitahuan tentang perubahan penting pada layanan dan Akun SIJALI3 Anda.</div><div style='direction:ltr'>© 2020 LLDIKTI III, <a class='m_-3495291044583463230afal' style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center'>Jl. SMA Negeri 14, RT.4/RW.9, Cawang, Jakarta 13630</a></div></div></div></td><td style='width:8px' width='8'></td></tr></tbody></table>");

				if ($this->email->send()) {
					$this->session->set_flashdata('flash', 'Ditambah');
					$this->db->insert('users', $data);
					redirect(base_url() . 'akun/akun');
				} else {
					$this->session->set_flashdata('error', 'Alamat Email Salah');
					redirect(base_url() . 'akun/akun');
				}
			} else {
				$this->session->set_flashdata('error', 'Format dan Ukuran File Tidak Sesuai');
				redirect(base_url() . 'akun/akun');
			}
		}
	}
	function nonaktif($no_user, $status)
	{
		$tgl_update = date("y-m-d H:i:s");
		$nonaktif = array('aktif' => $status, 'updated_at' => $tgl_update);
		$where = array('no' => $no_user);
		$this->db->where($where);
		$this->db->update('users', $nonaktif);
		$this->session->set_flashdata('flash', 'Dinonaktifkan');
		redirect(base_url() . 'akun/akun');
	}
	function aktif($no_user, $status)
	{
		$tgl_update = date("y-m-d H:i:s");
		$aktif = array('aktif' => $status, 'updated_at' => $tgl_update);
		$where = array('no' => $no_user);
		$this->db->where($where);
		$this->db->update('users', $aktif);
		$this->session->set_flashdata('flash', 'Diaktifkan');
		redirect(base_url() . 'akun/akun');
	}
	function hapus_user($no, $berkas)
	{
		if ($berkas == '') {
			$where = array('no' => $no);
			$this->db->where($where);
			$this->db->delete('users');
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'akun/akun');
		} else {
			unlink('assets/download_user/' . $berkas);
			$where = array('no' => $no);
			$this->db->where($where);
			$this->db->delete('users');
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect(base_url() . 'akun/akun');
		}
	}

	function update_user()
	{
		$nama = $this->input->post('nama');
		$no_user = $this->input->post('no_user');
		$email = $this->input->post('email');
		$telp = $this->input->post('telp');
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$pass_64 = base64_encode($pass);
		$pass_md5 = md5($pass);
		$tgl_update = date("y-m-d H:i:s");
		$file_path = './assets/download_user/';
		mkdir($file_path, 0777, true);
		$config['upload_path'] = $file_path;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5048';
		$config['file_name'] = 'File' . date("ymdHis") . $no_user;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkas')) {
			$image = $this->upload->data();
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => $pass_md5,
				'password_64' => $pass_64,
				'telp' => $telp,
				'sk' => $image['file_name'],
				'updated_at' => $tgl_update,
			);
			$gambar = $image['file_name'];
			unlink('assets/download_user/' . $this->input->post('old_pict', true));
		} else {
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => $pass_md5,
				'password_64' => $pass_64,
				'telp' => $telp,
				'updated_at' => $tgl_update,
			);
			$gambar = $this->input->post('old_pict');
		}

		$where = array('no' => $no_user);
		$this->db->where($where);
		$this->db->update('users', $data);
		// $this->session->set_flashdata('flash', 'Diubah');
		// redirect(base_url() . 'akun/akun');
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
		$this->email->from('sijali3.kemdikbud@gmail.com', 'SIJALI LLDIKTI 3 - KEMDIKBUD');
		$this->email->to($email);
		$this->email->subject('Perubahan Data User');
		$this->email->message("<div style='border:1px solid #dcdcdc;border-radius:3px;width:400px'><div style='float:left;padding:16px'><img src='https://silat-lldikti3.kemdikbud.go.id/assets/images/logo/logo-ristek-2.png' style='vertical-align:middle' class='CToWUd' width='56' height='56'></div><div style='padding:16px 16px 16px 88px;min-height:56px'><div style='font-size:20px;line-height:24px;text-decoration:none;color:#1a0dab'>" . $nama . "</div><div>" . $email . "</div><div>" . $telp . "</div><div style='color:#666'><div style='line-height:16px'>&nbsp;</div><div>Username : " . $username . "</div><div>Password  : " . $pass . "</div><div></div></div></div></div>");
		$this->email->send();
		$this->session->set_flashdata('flash', 'Diubah');
		redirect(base_url() . 'akun/akun');
	}
	public function reset($id)
	{
		$users = $this->db->query("select * from users where no='$id' ")->row();
		$tgl_update = date("y-m-d H:i:s");
		$chars = "0123456789";
		$password = substr(str_shuffle($chars), 0, 6);
		// var_dump($password);
		$data = array(
			'password' => md5($password),
			'password_64' => base64_encode($password),
			'updated_at' => $tgl_update,
		);
		$where = array('no' => $id);
		$this->db->where($where);
		$this->db->update('users', $data);
		// $this->session->set_flashdata('flash', 'Diubah');
		// redirect(base_url() . 'akun/akun');
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
		$this->email->from('sijali3.kemdikbud@gmail.com', 'SIJALI LLDIKTI 3 - KEMDIKBUD');
		$this->email->to($users->email);
		$this->email->subject('Reset Password');
		$this->email->message("<div style='border:1px solid #dcdcdc;border-radius:3px;width:400px'><div style='float:left;padding:16px'><img src='https://silat-lldikti3.kemdikbud.go.id/assets/images/logo/logo-ristek-2.png' style='vertical-align:middle' class='CToWUd' width='56' height='56'></div><div style='padding:16px 16px 16px 88px;min-height:56px'><div style='font-size:20px;line-height:24px;text-decoration:none;color:#1a0dab'>" . $users->nama . "</div><div>" . $users->email . "</div><div>" . $users->telp . "</div><div style='color:#666'><div style='line-height:16px'>&nbsp;</div><div>Username : " . $users->username . "</div><div>Password  : " . $password . "</div><div></div></div></div></div>");
		$this->email->send();
		$this->session->set_flashdata('flash', 'Diubah');
		redirect(base_url() . 'akun/akun');
	}
}
