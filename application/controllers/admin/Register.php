<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
	public function __construct(){
		parent::__construct();
		// if(!$this->session->userdata('status')!= 'login') redirect(base_url());
		$this->load->library('template');
		$this->load->helper('url');
		$this->load->model('admin/dokter_model');
		$this->load->model('admin/pasien_model');
	}
	
	public function index()
	{
		 if($this->session->userdata('status') == 'login')
		 {
			$maxid = 0;
			$row = $this->db->query('SELECT MAX(id_pasien) AS `maxid` FROM `clinic_pasien`')->row();
			if ($row) {
			    $maxid = $row->maxid; 
			}
			$number = $maxid;
			$width = 4;
			$padded = str_pad((string)$number, $width, "0", STR_PAD_LEFT); 
			$data['maxid'] = $padded + 1;
			$data['dokter'] 	= $this->dokter_model->select_all()->result();
			$this->template->display('admin/pasien_add_view',$data);
		}
		else
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function savedata(){
		$no_rm1 = $this->input->post('no_rm1');
		$no_rm2 = $this->input->post('no_rm2');
		$no_rm3 = $this->input->post('no_rm3');
		$no_rm  = $no_rm1 .'-'. $no_rm2 .'-'. $no_rm3;  
		$data = array(
			'no_rm'			=> $no_rm,
			'nama_pasien' 	=> $this->input->post('name'),
			'tanggal_kunjungan'	=> $this->input->post('tgl_kunjungan'),
			'tempat_lahir' 	=> $this->input->post('tmpt_lahir'),
			'tanggal_lahir'	=> $this->input->post('tgl_lahir'),
			'jenis_kelamin'	=> $this->input->post('jk'),
			'umur'			=> $this->input->post('umur'),
			'alamat'		=> $this->input->post('alamat'),
			'provinsi'		=> $this->input->post('provinsi'),
			'kabupaten'		=> $this->input->post('kabupaten'),
			'kecamatan'		=> $this->input->post('kecamatan'),
			'pendidikan'	=> $this->input->post('pendidikan'),
			'pekerjaan'		=> $this->input->post('pekerjaan'),
			'agama'			=> $this->input->post('agama'),
			'status'		=> $this->input->post('status'),
			'no_telp'		=> $this->input->post('no_telp'),
			'klinik'		=> $this->input->post('klinik'),
			'dokter_name'	=> $this->input->post('dokter'),
			'keluhan'		=> $this->input->post('keluhan')

		);
		$ex = $this->pasien_model->tambah($data);
        if ($ex) {
        	$row = $this->db->query('SELECT MAX(id_pasien) AS `maxid` FROM `clinic_pasien`')->row();
        	$this->session->set_flashdata('notif','Berhasil Ditambahkan');

        redirect('admin/register/cetak/'.$row->maxid);
        } else {
        	$this->session->set_flashdata('notif','Gagal Ditambahkan');
        redirect('admin/pasien');
        }

	}

	public function cetak($id){
		$where = array('id_pasien' => $id);
		$data['pasien'] = $this->pasien_model->detail($where,'clinic_pasien')->result();
		$this->load->view('admin/cetak',$data);
	}

	public function update($id){
		$where = $id;
		$no_rm1 = $this->input->post('no_rm1');
		$no_rm2 = $this->input->post('no_rm2');
		$no_rm3 = $this->input->post('no_rm3');
		$no_rm  = $no_rm1 .'-'. $no_rm2 .'-'. $no_rm3;  
		$data = array(
			'no_rm'			=> $no_rm,
			'nama_pasien' 	=> $this->input->post('name'),
			'tanggal_kunjungan'	=> $this->input->post('tgl_kunjungan'),
			'tempat_lahir' 	=> $this->input->post('tmpt_lahir'),
			'tanggal_lahir'	=> $this->input->post('tgl_lahir'),
			'jenis_kelamin'	=> $this->input->post('jk'),
			'umur'			=> $this->input->post('umur'),
			'alamat'		=> $this->input->post('alamat'),
			'provinsi'		=> $this->input->post('provinsi'),
			'kabupaten'		=> $this->input->post('kabupaten'),
			'kecamatan'		=> $this->input->post('kecamatan'),
			'pendidikan'	=> $this->input->post('pendidikan'),
			'pekerjaan'		=> $this->input->post('pekerjaan'),
			'agama'			=> $this->input->post('agama'),
			'status'		=> $this->input->post('status'),
			'no_telp'		=> $this->input->post('no_telp'),
			'klinik'		=> $this->input->post('klinik'),
			'dokter_name'	=> $this->input->post('dokter'),
			'keluhan'		=> $this->input->post('keluhan')

		);
		$ex = $this->pasien_model->update($data,$where);
        if ($ex) {
        	$this->session->set_flashdata('notif','Berhasil Ditambahkan');
        redirect('admin/pasien');
        } else {
        	$this->session->set_flashdata('notif','Gagal Ditambahkan');
        redirect('admin/pasien');
        }

	}

	public function delete($id){
		$ex = $this->pasien_model->hapus($id);
		if ($ex) {
			$this->session->set_flashdata('notif','Berhasil di hapus');
			redirect('admin/pasien');
		}else {
			$this->session->set_flashdata('gagal','Gagal dihapus');
			redirect ('admin/pasien');
		}

	}

	public function edit($id){
		if (empty($id)) {
			redirect('admin/register');
		}else{
			$where = array('id_pasien' => $id);
			$data['dokter'] 	= $this->dokter_model->select_all()->result();
			$data['pasien'] = $this->pasien_model->detail($where,'clinic_pasien')->result();
			$this->template->display('admin/pasien_edit_view',$data);
		}
	}

	public function detail($id){
		if (empty($id)) {
			redirect('admin/pasien');
		} else {
		$where = array('id_pasien' => $id);
		$data['pasien'] = $this->pasien_model->detail($where,'clinic_pasien')->result();
		$this->template->display('admin/pasien_view_detail',$data);
		}
	}
}
/* Location: ./application/controller/admin/Home.php */