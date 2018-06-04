<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('data_login');
    }
 
    function index(){
        $this->load->view('login_view');
    }

  function salah(){
    $this->session->set_flashdata('salah','Username atau Password Salah');
    $this->load->view('login_view');
  }

 function cek_login(){
  $username = $this->input->post('username');
  $password = $this->input->post('password');
  $where = array(
   'username' => $username,
   'password' => md5($password)
   );
  $cek = $this->data_login->cek_login("admin",$where)->num_rows();
  if($cek > 0){

   $data_session = array(
    'nama' => $username,
    'status' => "login",
    'logged_in_clinic' => TRUE
    );

   $this->session->set_userdata($data_session);

   redirect(base_url("dashboard/home"));

  }else{
   redirect(base_url('login/salah'));
  }
 }

 function logout(){
  $this->session->sess_destroy();
  redirect(base_url('login'));
 }
}
?>