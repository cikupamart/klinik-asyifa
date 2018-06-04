<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        } else {
        	$this->load->library('template_dashboard');
        }
    }
    
    public function index(){
            $this->template_dashboard->display('dashboard/home_view');
    }
}
/* Location: ./application/controller/dashboard/Home.php */