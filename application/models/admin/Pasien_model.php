<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pasien_model extends CI_Model{ 
    function select_all() {
        $this->db->select('*');
        $this->db->from('clinic_pasien');
        $this->db->order_by('id_pasien','desc');
        
        return $this->db->get();
    }

    function lastid() {
        $this->db->select_max('no_rm');
        $this->db->from('clinic_pasien');
        $this->db->order_by('id_pasien','desc', 'LIMIT 1');
        
        return $this->db->get();
    }

    public function tambah($data){
        $res = $this->db->insert('clinic_pasien', $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }
 
    public function update($data, $where){
        $this->db->where('id_pasien',$where);
        $res = $this->db->update('clinic_pasien',$data); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $res;
    }
 
    public function hapus($where){
        $this->db->where('id_pasien',$where);
        $res = $this->db->delete('clinic_pasien'); // Kode ini digunakan untuk menghapus record yang sudah ada

        return;
    }

    public function detail($where,$table){
        // $this->db->select('*');
        // $this->db->from('clinic_pasien');
        // $this->db->where('id_pasien',$id);
        // $res=$this->db->get(); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        // return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
         return $this->db->get_where($table,$where);


    }
}
?>