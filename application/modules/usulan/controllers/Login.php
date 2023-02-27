<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MX_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
 
   
  }
   //fungsi cek session
   function logged_id()
   {
       return $this->session->userdata('username');
   }

   //fungsi check login
   function check_login($table, $field1, $field2)
   {
       $this->db->select('*');
       $this->db->from($table);
       $this->db->where($field1);
       $this->db->where($field2);
       $this->db->limit(1);
       $query = $this->db->get();
       if ($query->num_rows() == 0) {
           return FALSE;
       } else {
           return $query->result();
       }
   }


   public function index()
   {

    redirect("usulan/beranda");

}

public function validate()
{ if($this->logged_id())
   {
       //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
       redirect("akun/beranda");

   }else{
    
    $username = $this->uri->segment(4);
    $token = $this->uri->segment(5);
    
    $logs=$this->db->query("select * from t_user where username='$username'")->row();
    $id   = $logs->id_user;
    $username = $logs->username;               
    $nama = $logs->nama;
    $id_unit_kerja = $logs->id_unit_kerja;
    $id_role = $logs->id_role;
    $last_login = $logs->last_login;
    $is_staff = $logs->is_staff;
    
   // echo 'username: '.$username.'<br>';
   // echo 'token: '.$token.'<br>';
    $this->session->set_userdata(array('token' => $token, 'username' => $username, 'nama' => $nama, 'id' => $id, 'id_unit_kerja' => $id_unit_kerja, 'id_role' => $id_role, 'last_login' => $last_login, 'is_staff' => $is_staff));
    
        /*if(!$this->sessionutility->isAuthenticated($token)){
            //redirect('http://silat-lldikti3.ristekdikti.go.id');
            echo 'not oke';
        }else{
            echo 'oke';
            $the_token = $this->session->userdata('token');
            if($the_token == NULL){
                $this->session->set_userdata(array('token' => $token, 'kd_pt' => $kd_pt));
            }else{
                $this->session->unset_userdata(array('token' , 'kd_pt'));
                $this->session->set_userdata(array('token' => $token, 'kd_pt' => $kd_pt));
            }
           // print_r($this->session->userdata('token'));
            //$data[''] = '';
            //$this->template->load('index','manajemen/dashboard', $data);
            //redirect(base_url().'pengusul/pts/');
        }*/
     $this->db->query("update t_user set last_login=now() where username='$username'");
               echo "<script>alert('selamat datang $logs->nama');window.location.href='". base_url()."akun/beranda';</script>";
   }
}
}


  







