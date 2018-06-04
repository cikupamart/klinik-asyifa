<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('admin');		
		$this->db->order_by('username','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(    			
	    			'username' 		=> trim($this->input->post('username')),
	    			'password' 		=> md5(trim($this->input->post('password'))),
	    			'nama' 			=> strtoupper(trim($this->input->post('nama')))
				);
		} else {
			$data = array(    			
	    			'username' 		=> trim($this->input->post('username')),
	    			'password' 		=> md5(trim($this->input->post('password'))),
	    			'nama' 			=> strtoupper(trim($this->input->post('nama')))			
				);
		}
		
		$this->db->insert('admin', $data);
	}
	
	function select_by_id($username) {
		$this->db->select('*');
		$this->db->from('admin');		
		$this->db->where('username', $username);
		
		return $this->db->get();
	}

	function update_data() {
		$username  		= $this->input->post('username');
		$password 		= trim($this->input->post('password'));

		if (!empty($password)) { // Jika Password Diisi / Change Password
			
				$data = array(	  
						'username' 			=> strtoupper(trim($this->input->post('username'))) , 			
		    			'password' 		=> sha1(trim($this->input->post('password'))),
	    				'nama' 			=> strtoupper(trim($this->input->post('nama')))
					);
			
		} else {
				$data = array(		    					    			
	    				'username' 			=> strtoupper(trim($this->input->post('username'))),
	    				'nama' 			=> trim($this->input->post('nama'))
					);
		}

		$this->db->where('username', $username);
		$this->db->update('admin', $data);
	}	

	function delete_data($id_admin) {		
		$this->db->where('id_admin',$id_admin);
		$this->db->delete('admin');
	}

	function hapus($id_admin){
		$this->db->where('id_admin',$id_admin);
		$this->db->delete('admin');

	}

	function ubah($id_admin){
		$this->db->where("id_admin",$id_admin);
		return $this->db->get('admin');
	}
}
/* Location: ./application/model/admin/Users_model.php */