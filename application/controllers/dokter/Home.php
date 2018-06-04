<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_clinic')) redirect(base_url());
		$this->load->library('template_apotek');
		$this->load->model('dokter/obat_model');
		$this->data['sql'] = $this->obat_model->select_all();
	}
	
	public function index() {
		if($this->session->userdata('logged_in_clinic')){
			$data['daftarlist'] = $this->obat_model->select_all();
			$this->template_apotek->display('apotek/home_view',$data);
		}
		else
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function adddata() {
		$data['getDataKategori'] = $this->obat_model->getDataKategori();
		$data['ed'] = 'simpan';		
		$this->template_apotek->display('apotek/obat_add_view', $data);
	}

	public function savedata() {		
		$kategori_dokter =  $this->input->post('kategori_dokter');
   		$dokter_name = $this->input->post('dokter_name');
   		$dokter_city = $this->input->post('dokter_city');
   		$dokter_address = $this->input->post('dokter_address');
   		$dokter_phone = $this->input->post('dokter_phone');
    	$data   	= array(
      		'kategori_dokter' 	=> $kategori_dokter,
      		'dokter_name' => $dokter_name,
      		'dokter_city' => $dokter_city,
      		'dokter_address' => $dokter_address,
      		'dokter_phone' => $dokter_phone
      			);
		$this->obat_model->simpan($data);
		// $this->load->model('dokter/obat_model');
		$this->session->set_flashdata('success_msg','<div class="alert alert-success">Data Sukses Ditambah </div>');
		redirect('dokter/home');
	}


	// public function editdata($data) {
	// 	$data['getDataKategori'] = $this->obat_model->getDataKategori();
	// 	$data['ed'] = 'update';
	// 	$data['sql'] = $this->obat_model->ubah($dokter_id);
	// 	$this->template_apotek->display('apotek/obat_add_view', $data);
	// }

	public function ubah($id)	{
		$data['getDataKategori'] = $this->obat_model->getDataKategori();
		$data['ed'] = 'update';
		$data['sql'] = $this->obat_model->ubah($id);
		$this->template_apotek->display('apotek/obat_add_view', $data);
	}

	function update() {		
		$kategori_dokter =  $this->input->post('kategori_dokter');
		$dokter_name 		= $this->input->post('dokter_name');
		$dokter_city 		= $this->input->post('dokter_city');
		$dokter_address 	= $this->input->post('dokter_address');
		$dokter_phone 		= $this->input->post('dokter_phone');

		$data 		= array(
			'kategori_dokter' 	=> $kategori_dokter,
			'dokter_name' => $dokter_name,
			'dokter_city' => $dokter_city,
			'dokter_address' => $dokter_address,
			'dokter_phone' => $dokter_phone
			);
		$id = $this->input->post('dokter_id');
		$this->obat_model->update($id,$data);
		redirect(site_url('dokter/home'));
	}

	public function hapus($dokter_id){

		$this->obat_model->ubah($dokter_id)->row_array();
		$this->obat_model->hapus($dokter_id);
		$this->session->set_flashdata('delete_msg','<div class="alert alert-warning">success dihapus </div>');
		redirect(site_url('dokter/home'));
	}
}
/* Location: ./application/controller/apotek/Home.php */