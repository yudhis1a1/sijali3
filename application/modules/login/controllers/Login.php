<?php
defined('BASEPATH') or exit('No direct script access allowed');



/**
 * @author akil
 * @version 1.0
 * @created 13-Mar-2016 20:19:38
 */
class Login extends MX_Controller
{


	function __construct()
	{
		parent::__construct();
		//load library form validasi
		$this->load->library('form_validation');
		$this->load->helper('date_helper');
		//load model admin
		$this->load->model('m_login');
		$silat = $this->load->database('silat', TRUE);
	}

	function __destruct()
	{
	}
	function logout()
	{
		$this->session->sess_destroy();
		// 	 echo "<script>window.location.href='". base_url()."akun/login';</script>";

		//  redirect(base_url('usulan/login'));
	}




	public function index()
	{

		if ($this->m_login->logged_id()) {
			// echo "tes";
			// die;

			//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
			redirect(base_url() . 'usulan/usulan');
			//redirect("asesi");

		} else {
			$this->silat = $this->load->database('silat', TRUE);
			//jika session belum terdaftar

			//set form validation
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			//set message form validation
			$this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
				<div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

			//cek validasi
			if ($this->form_validation->run() == TRUE) {
				//get data dari FORM
				$username = $this->input->post("username", TRUE);
				$status = '1';
				$password = md5($this->input->post('password', TRUE));


				//checking data via model
				$checking = $this->m_login->check_login('users', array('username' => $username), array('password' => $password), array('aktif' => $status));

				//jika ditemukan, maka create session
				if ($checking != FALSE) {
					foreach ($checking as $apps) {

						$user_no = $apps->no;
						$tgl = date("Y-m-d");

						//UPDATE pending penilaian
						$cl = $this->db->query("SELECT id_log FROM log_pending_penilaian WHERE tgl_eksekusi='$tgl'")->row();
						if ($cl == 0) {
							date_default_timezone_set('Asia/Jakarta');

							$this->db->query("INSERT INTO log_pending_penilaian(user_no,tgl_eksekusi,created_at)VALUES('$user_no',NOW(),NOW())");

							// ========= awal jika tim penilai sudah melebihi batas penilaian ==========
							$pe 	= $this->db->query("SELECT
															`no`,
															`user_penilai_no`,
															batas_penilaian_tgl
														FROM
															`usulans`
														WHERE `batas_penilaian_tgl` < CURDATE()
															AND usulan_status_id = '5'");

							foreach ($pe->result() as $pen) {
								$this->db->query("INSERT INTO `rwy_pending_penilaian` (
														`usulan_no`,
														`user_penilai_no`,
														`created_at`
													)
													VALUES
														(
														'$pen->no',
														'$pen->user_penilai_no',
														NOW()
														)");
							}

							$this->db->query("UPDATE
												`usulans`
												SET
												`usulan_status_id` = '12',
												`status_penilaian` = '',
												user_updated_no	='123456789',
												`ket_tambah_penilaian` = ''
												WHERE usulan_status_id = '5'
												AND `batas_penilaian_tgl` < CURDATE()");
							// ======== akhir jika tim penilai sudah melebihi batas penilaian ========== 
						}

						$session_data = array(
							'no'   => $user_no,
							'nama' => $apps->nama,
							'email' => $apps->email,
							'instansi' => $apps->instansi_kode,
							'role' => $apps->role_id,
							'username' => $apps->username,
							'status' => 'login'
						);
						//set session userdata
						$this->session->set_userdata($session_data);
						redirect(base_url() . 'usulan/usulan');
						//redirect('asesi');
					}
				} else {

					// $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
					// 	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
					redirect(base_url() . 'login/login?pesan=error');
					//$this->load->view('login', $data);
				}
			} else {
				$this->load->view('login');
			}
		}
		//$this->load->view('welcome_message');
		//sPusulan('lzogin');
	}

	public function validate()
	{
		//$user = base64_decode($this->uri->segment(4));
		$user = $this->input->post("username", TRUE);
		$this->silat = $this->load->database('silat', TRUE);
		//$password = md5($this->input->post('password', TRUE));
		$ambilnamapt = $this->silat->query("select * from users  where username='$user'");
		// var_dump($ambilnamapt->num_rows());die;
		//if($ambilnamapt->username > 0){
		if ($ambilnamapt->num_rows() > 0) {
			// $checking = $this->m_login->check_in('users', array('username' => $user));
			// var_dump($checking);
			foreach ($ambilnamapt->result() as $apps) {

				$session_data = array(
					'no'   => $apps->id,
					'nama' => $apps->name,
					'email' => $apps->email,
					'instansi' => $apps->username,
					'role' => '4',
					'username' => $apps->username,
					'status' => 'login'
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'usulan/usulan');
			}
			// if ($checking != FALSE) {
			// 	foreach ($checking as $apps) {

			// 		$session_data = array(
			// 			'no'   => $apps->no,
			// 			'nama' => $apps->nama,
			// 			'email' => $apps->email,
			// 			'instansi' => $apps->instansi_kode,
			// 			'role' => $apps->role_id,
			// 			'username' => $apps->username,
			// 			'status'=>'login'
			// 		);
			// 		//set session userdata
			// 		$this->session->set_userdata($session_data);
			// 		redirect(base_url().'usulan/usulan');
			// 		//redirect('asesi');

			// 	}
			// }else{

			// 	// $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
			// 	// 	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
			// 		redirect(base_url().'login/login?pesan=error');
			// 	//$this->load->view('login', $data);
			// }

		}
		$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
			<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
		redirect(base_url() . 'login/login?pesan=error');
		// else{
		// 	//$cekpt=$this->db->query("select b.nama_instansi,b.kode from db_silat.users a join db_silat.instansis b on a.kode_pt=b.kode where a.username='$user'")->row();
		// 	$cekpt=$this->db->query("select nama_instansi,kode from instansis  where kode='$user'")->row();
		// 	//var_dump($cekpt);exit();
		// 	$tgl_create=date("y-m-d H:i:s");
		// 	$tgl_update=date("y-m-d H:i:s");
		// 	$no=date("ymdHis").'04';
		// 	$nm_pt=$cekpt->nama_instansi;
		// 	$kd_pt=$cekpt->kode;

		// 	$data = array(
		// 	'no' => $no,
		// 	'role_id' => '4',
		// 	'instansi_kode' => $kd_pt,
		// 	'nama'=> $nm_pt,
		// 	'username'=> $user,
		// 	'aktif'=> '1',
		// 	'created_at' => $tgl_create,
		// 	'updated_at' => $tgl_update
		// 	);  
		// 	$this->db->insert('users',$data);
		// 	// $cekuser=$this->db->query("select * from users where instansi_kode='$user'")->row();
		// 	// $users=$cekuser->instansi_kode;
		// 	$checking = $this->m_login->check_in('users', array('username' => $user));
		// 	if ($checking != FALSE) {
		// 		foreach ($checking as $apps) {

		// 			$session_data = array(
		// 				'no'   => $apps->no,
		// 				'nama' => $apps->nama,
		// 				'email' => $apps->email,
		// 				'instansi' => $apps->instansi_kode,
		// 				'role' => $apps->role_id,
		// 				'username' => $apps->username,
		// 				'status'=>'login'
		// 			);
		// 			//set session userdata
		// 			$this->session->set_userdata($session_data);
		// 			redirect(base_url().'usulan/usulan');
		// 			//redirect('asesi');

		// 		}
		// 	}else{

		// 		// $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
		// 		// 	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
		// 			redirect(base_url().'login/login?pesan=error');
		// 		//$this->load->view('login', $data);
		// 	}
		// }
	}

	public function beranda()
	{




		//vusulan('beranda',$data);
		//vusulan('beranda');      
	}
}
