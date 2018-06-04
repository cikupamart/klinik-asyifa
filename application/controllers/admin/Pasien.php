<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller{
	public function __construct(){
		parent::__construct();
		// if(!$this->session->userdata('status')!= 'login') redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/dokter_model');
		$this->load->model('admin/pasien_model');
	}
	
	public function index()
	{

		$data['pasien'] = $this->pasien_model->select_all()->result();
		$this->template->display('admin/pasien_view',$data);
	}

}
/* Location: ./application/controller/admin/Home.php */