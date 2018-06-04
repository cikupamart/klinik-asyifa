<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_clinic')) redirect(base_url());
		$this->load->library('template_apotek');
		$this->load->model('apotek/pembelian_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in_clinic'))
		{
			$data['daftarlist'] = $this->pembelian_model->select_all()->result();
			$this->template_apotek->display('apotek/pembelian_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function adddata() {		
		$data['listSuplier'] 	= $this->pembelian_model->select_suplier()->result();		
		$data['listObat'] 		= $this->pembelian_model->select_obat()->result();

		$ID_Pembelian			= $this->uri->segment(4);
		if (empty($ID_Pembelian) || $ID_Pembelian == '') {
			$data['KodePB'] 	= $this->pembelian_model->getkodeunik();
			$data['Total']		= 0;
		} else {
			$CekPO 				= $this->pembelian_model->check_transaksi($ID_Pembelian)->row();
			$data['KodePB'] 	= $CekPO->pembelian_no_lpb;
			$Total 				= $this->pembelian_model->select_total($ID_Pembelian)->row();
			$data['Total']		= $Total->total; // Total PO
		}
		$data['listItem'] 		= $this->pembelian_model->select_item($ID_Pembelian)->result();
		$this->template_apotek->display('apotek/pembelian_add_view', $data);
	}

	public function savedataitem() {
		$ID_Pembelian			= $this->uri->segment(4);
		
		if (empty($ID_Pembelian) || $ID_Pembelian == '') {
			// Insert Baru ke Pembelian
			$CodePB = $this->pembelian_model->getkodeunik(); //Cek lagi jika ada 2 Nota lewat Jaringan
			$data = array(
				'pembelian_no_lpb'			=> $CodePB,
		   		'pembelian_date_in' 		=> date('Y-m-d'),
		   		'pembelian_date_update' 	=> date('Y-m-d'),
		   		'pembelian_time_update' 	=> date('Y-m-d H:i:s'),
		   		'user_username' 			=> trim($this->session->userdata('username')),
		   		'pembelian_status' 			=> 0
			);

			$this->db->insert('clinic_pembelian', $data);
			$id = $this->db->insert_id();
		} else {
			$id = $ID_Pembelian;			
		}

		$tgl_expired 	= $this->input->post('tgl_expired');
		$xtg1ex 		= explode("-",$tgl_expired);
		$thn1 			= $xtg1ex[2];
		$bln1 			= $xtg1ex[1];
		$tgl1 			= $xtg1ex[0];
		$tanggal_ex 	= $thn1.'-'.$bln1.'-'.$tgl1;

		// Insert Item
		// Cek jika ada Item yang Sama dimasukkan
		// Variabel Obat
		$CodeObat 	= trim($this->input->post('code'));
		$kemasan 	= strtoupper(trim($this->input->post('satuan'))); // Kemasan
		$satuan 	= strtoupper(trim($this->input->post('satuankecil'))); // Satuan Kecil
		$isi 		= $this->input->post('isikecil'); // Isi Satuan Kecil		
		$stokakhir 	= $this->input->post('stokakhir'); // Stok Terakhir	

		// Konversi String ke Integer
		$Qty 		= $this->input->post('qty');
		$Harga 		= intval(str_replace(",", "", $this->input->post('harga')));
		$Diskon 	= intval($this->input->post('disc'));			
		$TotalNoDisc= ($Qty * $Harga);
		$DiscRp		= (($Diskon * $TotalNoDisc)/100);
		$SubTotal 	= intval(str_replace(",", "", $this->input->post('subtotal')));
		$HPP 		= 0;
		// Update Stok Barang ke Obat
		if ($kemasan == $satuan) { // Jika Kemasan = Satuan
			$Disc1 		= (($Harga*$Diskon)/100); // Nominal Disc Harga Satuan
			$HPP 		= ($Harga - $Disc1); // HPP Obat
			$Hrg_sat	= $Harga; // Harga Satuan Kecil
			$Stok   	= ($stokakhir + $Qty); // Stok terakhir + Qty
		} else {			
			$Hrg_sat	= ($Harga/$isi); // Harga Kecil
			$Disc1 		= (($Hrg_sat*$Diskon)/100); // Nominal Disc Harga Satuan
			$HPP 		= ($Hrg_sat-$Disc1); // HPP Obat			
			$Convert	= ($Qty*$isi); // Qty x Isi Satuan (karena stok = satuan kecil)
			$Stok   	= ($stokakhir + $Convert); // Stok terakhir + Konversi qty
		}		

		$data = array(
				'obat_hrg_kms' 		=> $Harga, // Harga Beli Kemasan Obat
				'obat_hrg_kcl' 		=> $Hrg_sat, // Harga Beli Kemasan Obat
				'obat_hpp' 			=> $HPP, // HPP
				'obat_date_expired' => $tanggal_ex, // Tgl. Expired Obat 
				'obat_stok'			=> $Stok // Stok Obat
			);

		$this->db->where('obat_code', $CodeObat);
		$this->db->update('clinic_obat', $data);
		// Cek Item		
		$CekItem  = $this->pembelian_model->check_item($CodeObat)->row();		
		if (count($CekItem) > 0) { // Jika Ada, Maka Update Item			
			$Qty 		= $CekItem->detail_qty;
			$Disc 		= $CekItem->detail_disc;
			$Diskon 	= intval($this->input->post('disc'));
			$Sub 		= $CekItem->detail_total;
			$SubTotal 	= intval(str_replace(",", "", $this->input->post('subtotal')));

			$data = array(
					'detail_qty'			=> ($Qty + $this->input->post('qty')),
					'detail_disc'			=> ($Disc + $Diskon),
					'detail_total'			=> ($Sub + $SubTotal),
					'detail_date_expired'	=> $tanggal_ex,
			   		'detail_date_update' 	=> date('Y-m-d'),
			   		'detail_time_update' 	=> date('Y-m-d H:i:s')
			);

			$this->db->where('obat_code', $CodeObat);
			$this->db->where('pembelian_id', $id);
			$this->db->update('clinic_pembelian_detail', $data);			
		} else { // Jika belum, Insert Data Item Baru			
			$data = array(
					'pembelian_id'			=> $id,				
					'obat_code'				=> trim($this->input->post('code')),
					'detail_name'			=> trim($this->input->post('name')),
					'detail_qty'			=> $this->input->post('qty'),
					'detail_isi_kcl'		=> $isi,
					'detail_satuan'			=> trim($this->input->post('satuan')),
					'detail_sat_kcl'		=> $satuan,
					'detail_harga'			=> $Harga,
					'detail_hpp'			=> $HPP,
					'detail_disc'			=> $Diskon,
					'detail_disc_nominal'	=> $DiscRp,
					'detail_total'			=> $SubTotal,
					'detail_date_expired'	=> $tanggal_ex,
			   		'detail_date_update' 	=> date('Y-m-d'),
			   		'detail_time_update' 	=> date('Y-m-d H:i:s')
			);
			$this->db->insert('clinic_pembelian_detail', $data);			
		}		
		
		// Update Total Purchase
		$Total 		= $this->pembelian_model->select_total($ID_Pembelian)->row();
		$TotalPB	= $Total->total; // Total PO

		$data = array(
			'pembelian_bruto'			=> $TotalPB,
			'pembelian_netto'			=> $TotalPB,
		   	'pembelian_date_update' 	=> date('Y-m-d'),
		   	'pembelian_time_update' 	=> date('Y-m-d H:i:s'),
		   	'user_username' 			=> trim($this->session->userdata('username'))		   		
		);

		$this->db->where('pembelian_id', $id);
		$this->db->update('clinic_pembelian', $data);		

		// Redirect ke Halaman Adddata
		redirect(site_url('apotek/pembelian/adddata/'.$id));		
	}

	public function savedataitemedit() {
		$ID_Pembelian	= $this->uri->segment(4);
		$tgl_expired 	= $this->input->post('tgl_expired');
		$xtg1ex 		= explode("-",$tgl_expired);
		$thn1 			= $xtg1ex[2];
		$bln1 			= $xtg1ex[1];
		$tgl1 			= $xtg1ex[0];
		$tanggal_ex 	= $thn1.'-'.$bln1.'-'.$tgl1;			
		// Insert Item
		// Variabel Obat
		$CodeObat 	= trim($this->input->post('code'));
		$kemasan 	= strtoupper(trim($this->input->post('satuan'))); // Kemasan
		$satuan 	= strtoupper(trim($this->input->post('satuankecil'))); // Satuan Kecil
		$isi 		= $this->input->post('isikecil'); // Isi Satuan Kecil		
		$stokakhir 	= $this->input->post('stokakhir'); // Stok Terakhir	
		// Konversi String ke Integer
		$Qty 		= $this->input->post('qty');
		$Harga 		= intval(str_replace(",", "", $this->input->post('harga')));
		$Diskon 	= intval($this->input->post('disc'));			
		$TotalNoDisc= ($Qty * $Harga);
		$DiscRp		= (($Diskon * $TotalNoDisc)/100);
		$SubTotal 	= intval(str_replace(",", "", $this->input->post('subtotal')));
		$HPP 		= 0;
				
		// Update Stok Barang ke Obat
		if ($kemasan == $satuan) { // Jika Kemasan = Satuan
			$Disc1 		= (($Harga*$Diskon)/100); // Nominal Disc Harga Satuan
			$HPP 		= ($Harga - $Disc1); // HPP Obat
			$Hrg_sat	= $Harga; // Harga Satuan Kecil
			$Stok   	= ($stokakhir + $Qty); // Stok terakhir + Qty
		} else {			
			$Hrg_sat	= ($Harga/$isi); // Harga Kecil
			$Disc1 		= (($Hrg_sat*$Diskon)/100); // Nominal Disc Harga Satuan
			$HPP 		= ($Hrg_sat-$Disc1); // HPP Obat			
			$Convert	= ($Qty*$isi); // Qty x Isi Satuan (karena stok = satuan kecil)
			$Stok   	= ($stokakhir + $Convert); // Stok terakhir + Konversi qty
		}		

		$data = array(
				'obat_hrg_kms' 		=> $Harga, // Harga Beli Kemasan Obat
				'obat_hrg_kcl' 		=> $Hrg_sat, // Harga Beli Kemasan Obat
				'obat_hpp' 			=> $HPP, // HPP
				'obat_date_expired' => $tanggal_ex, // Tgl. Expired Obat 
				'obat_stok'			=> $Stok // Stok Obat
			);

		$this->db->where('obat_code', $CodeObat);
		$this->db->update('clinic_obat', $data);

		// Cek jika ada Item yang Sama dimasukkan
		$CekItem  = $this->pembelian_model->check_item($CodeObat)->row();		
		if (count($CekItem) > 0) { // Jika Ada, Maka Update Item			
			$Qty 		= $CekItem->detail_qty;
			$Disc 		= $CekItem->detail_disc;
			$Diskon 	= intval($this->input->post('disc'));
			$Sub 		= $CekItem->detail_total;
			$SubTotal 	= intval(str_replace(",", "", $this->input->post('subtotal')));

			$data = array(
					'detail_qty'			=> ($Qty + $this->input->post('qty')),					
					'detail_disc'			=> ($Disc + $Diskon),
					'detail_total'			=> ($Sub + $SubTotal),
					'detail_date_expired'	=> $tanggal_ex,
			   		'detail_date_update' 	=> date('Y-m-d'),
			   		'detail_time_update' 	=> date('Y-m-d H:i:s')
			);

			$this->db->where('obat_code', $CodeObat);
			$this->db->where('pembelian_id', $ID_Pembelian);
			$this->db->update('clinic_pembelian_detail', $data);		
		} else {			
			$data = array(
					'pembelian_id'			=> $ID_Pembelian,				
					'obat_code'				=> trim($this->input->post('code')),
					'detail_name'			=> trim($this->input->post('name')),
					'detail_qty'			=> $this->input->post('qty'),
					'detail_isi_kcl'		=> $isi,
					'detail_satuan'			=> trim($this->input->post('satuan')),
					'detail_sat_kcl'		=> $satuan,
					'detail_harga'			=> $Harga,
					'detail_hpp'			=> $HPP,
					'detail_disc'			=> $Diskon,
					'detail_disc_nominal'	=> $DiscRp,
					'detail_total'			=> $SubTotal,
					'detail_date_expired'	=> $tanggal_ex,
			   		'detail_date_update' 	=> date('Y-m-d'),
			   		'detail_time_update' 	=> date('Y-m-d H:i:s')
			);
			$this->db->insert('clinic_pembelian_detail', $data);
		}		
		
		// Update Total Invoice
		$Total 		= $this->pembelian_model->select_total($ID_Pembelian)->row();
		$TotalPB	= $Total->total; // Total PO

		$data = array(
			'pembelian_bruto'			=> $TotalPB,
			'pembelian_netto'			=> $TotalPB,
		   	'pembelian_date_update' 	=> date('Y-m-d'),
		   	'pembelian_time_update' 	=> date('Y-m-d H:i:s'),
		   	'user_username' 			=> trim($this->session->userdata('username'))		   		
		);

		$this->db->where('pembelian_id', $id);
		$this->db->update('clinic_pembelian', $data);

		// Redirect ke Halaman EditData
		redirect(site_url('apotek/pembelian/editdata/'.$ID_Pembelian));		
	}

	public function editdata($ID_Pembelian) {		
		$data['listSuplier'] 	= $this->pembelian_model->select_suplier()->result();
		$data['listObat'] 		= $this->pembelian_model->select_obat()->result();
		$data['detail'] 		= $this->pembelian_model->select_by_id($ID_Pembelian)->row();
		$data['listItem'] 		= $this->pembelian_model->select_item($ID_Pembelian)->result();
		$Total 					= $this->pembelian_model->select_total($ID_Pembelian)->row();
		$data['Total']			= $Total->total; // Total PO
		$this->template_apotek->display('apotek/pembelian_edit_view', $data);
	}
	
	public function updatedataitem() {		
		$this->pembelian_model->update_data_item();
		$this->session->set_flashdata('notification','Data Item Tersimpan.');
		redirect(site_url('apotek/pembelian/adddata/'.$this->uri->segment(4)));
	}

	public function updatedataitemedit() {		
		$this->pembelian_model->update_data_item();
		$this->session->set_flashdata('notification','Data Item Tersimpan.');
		redirect(site_url('apotek/pembelian/editdata/'.$this->uri->segment(4)));
	}

	public function updatedata() {		
		$this->pembelian_model->update_data();
		$this->session->set_flashdata('notification','Data Purchase Tersimpan.');
		redirect(site_url('apotek/pembelian'));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('apotek/pembelian'));
		} else {
			$this->pembelian_model->delete_data($kode);
			$this->session->set_flashdata('notification','Hapus Data Purchase Sukses.');
			redirect(site_url('apotek/pembelian'));
		}
	}

	public function deletedataitem($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url('apotek/pembelian/adddata/'.$this->uri->segment(4)));
		} else {
			$this->pembelian_model->delete_data_item($kode);
			$this->session->set_flashdata('notification','Hapus Item Sukses.');
			redirect(site_url('apotek/pembelian/adddata/'.$this->uri->segment(4)));
		}
	}

	public function deletedataitemedit($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url('apotek/pembelian/editdata/'.$this->uri->segment(4)));
		} else {
			$this->pembelian_model->delete_data_item($kode);
			$this->session->set_flashdata('notification','Hapus Item Sukses.');
			redirect(site_url('apotek/pembelian/editdata/'.$this->uri->segment(4)));
		}
	}
}
/* Location: ./application/controller/apotek/Pembelian.php */