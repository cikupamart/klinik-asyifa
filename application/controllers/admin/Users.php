<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_clinic')) redirect(base_url());
		$this->load->library('template');		
		$this->load->model('admin/users_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in_clinic')) 
		{
			$data['daftarlist'] = $this->users_model->select_all()->result();
			$this->template->display('admin/users_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}


	public function adddata() {
		$data['error']	= false;
		$this->template->display('admin/users_add_view', $data);
	}
	
	public function savedata() {										
		$this->form_validation->set_rules('username','<b>Username</b>','trim|required|is_unique[clinic_users.user_username]');
		$this->form_validation->set_rules('password','<b>Password</b>','trim|required');		
		$this->form_validation->set_rules('name','<b>Nama Lengkap</b>','trim|required');		
		$this->users_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/users'));
		
	}
	
	public function editdata($user_username) {		
		$data['detail'] = $this->users_model->select_by_id($user_username)->row();
		$this->template->display('admin/users_edit_view', $data);
	}
	
	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$kode 	= strtolower($this->input->post('user_username'));
					
			$config['file_name']    = 'Avatar_'.$kode.'_'.$jam.'.jpg';
			$config['upload_path'] = './icon/';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';		
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] = TRUE;
											
			$config['width'] = 200;
			$config['height'] = 200;
			$this->load->library('image_lib',$config);
			 
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}		
		
		$this->users_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/users'));
	}
	
	public function deletedata($id_admin){
		$this->users_model->ubah($id_admin)->row_array();
		$this->users_model->hapus($id_admin);
		$this->session->set_flashdata('notif','Delete Data Success.');
		redirect(site_url('admin/users'));
	}	

	public function hapus($clinic_id){

		$this->users_model->ubah($clinic_id)->row_array();
		$this->obat_model->hapus($clinic_id);
		$this->session->set_flashdata('notif','Delete Data Success.');
		redirect(site_url('clinic/clinic'));
	}
}
/* Location: ./application/controller/admin/Users.php */