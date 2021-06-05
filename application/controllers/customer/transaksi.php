<?php 

class Transaksi extends CI_Controller{
	public function index(){
		$customer = $this->session->userdata('id_customer');
		$data['pemesanan'] = $this->db->query("SELECT * FROM pemesanan pm, mobil mb, customer cs WHERE pm.id_mobil=mb.id_mobil AND pm.id_customer=cs.id_customer AND cs.id_customer='$customer' ORDER BY id_pemesanan DESC")->result();

		$this->load->view('template_customer/header');
		$this->load->view('customer/transaksi',$data);
		$this->load->view('template_customer/footer');
	}

	public function pembayaran($id){
		$data['pemesanan'] = $this->db->query("SELECT * FROM pemesanan pm, mobil mb, customer cs WHERE pm.id_mobil=mb.id_mobil AND pm.id_customer=cs.id_customer AND pm.id_pemesanan='$id' ORDER BY id_pemesanan DESC")->result();
		
		$this->load->view('template_customer/header');
		$this->load->view('customer/pembayaran',$data);
		$this->load->view('template_customer/footer');

	}
}

 ?>
