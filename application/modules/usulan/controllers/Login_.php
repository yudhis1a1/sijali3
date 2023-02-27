<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MX_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
 
   
  }
  function index() {
    $this->load->view('akun/login_pts');
  }

  function cek($username, $password) {
    //  $p = sha1(md5($password));
    $this->db->where("username", $username);
    $this->db->where("password", $password);
    return $this->db->get("t_user");
  }

  function getLoginData($usr, $psw) {
    $u = $usr;
  //  $p = md5($psw);
  $p = sha1(md5($psw));
    $q_cek_login = $this->db->get_where('t_user', array('username' => $u, 'password' => $p));
    if (count($q_cek_login->result()) > 0) {
      foreach ($q_cek_login->result() as $qck) {
        foreach ($q_cek_login->result() as $qad) {
          $sess_data['logged_in'] = TRUE;
          $sess_data['id'] = $qad->id_user;
          $sess_data['username'] = $qad->username;
          $sess_data['password'] = $qad->password;
          $sess_data['nama'] = $qad->nama;
          $sess_data['id_unit_kerja'] = $qad->id_unit_kerja;
        //  $sess_data['level'] = $qad->level;
          $this->session->set_userdata($sess_data);
        }
      redirect('akun');
      }
    } else {
        $this->session->set_flashdata('result_login', '
Username atau Password yang anda masukkan salah.');
        header('location:' . base_url() . 'login');
      }
  }

  function proses() {
    $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('akun/login_pts');
    } else {
      $usr = $this->input->post('username');
      $psw = $this->input->post('password');
      $u = $usr;
      //$p = $psw;
       $p = sha1(md5($psw));
    //  $cek = $this->Mod_Login->cek($u, $p);
    $cek = $this->cek($u, $p);
      if ($cek->num_rows() > 0) {
        //login berhasil, buat session
        foreach ($cek->result() as $qad) {
          $sess_data['id'] = $qad->id_user;
          $sess_data['username'] = $qad->username;
          $sess_data['nama'] = $qad->nama;
          $sess_data['password'] = $qad->password;
          $sess_data['id_unit_kerja'] = $qad->id_unit_kerja;
          $this->session->set_userdata($sess_data);
		       $nmnya=$sess_data['nama'];
        }
        $this->session->set_flashdata('success', 'Login Berhasil !');
		 echo "<script>alert('selamat datang $nmnya');window.location.href='". base_url()."akun/beranda';</script>";
     //  redirect(base_url('usulan/beranda'));
      } else {      
          $px = ' Username atau Password yang anda masukkan salah.';
        $this->session->set_flashdata('result_login', $px);
        
        
        //redirect(base_url('akun/index'));
      }
    }
  }
}
