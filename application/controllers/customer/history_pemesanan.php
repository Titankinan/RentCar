<?php

Class History_Pemesanan extends CI_Controller{
	public function index()
	{
		$data['pemesanan'] = $this->db->query("SELECT * FROM pemesanan pm, mobil mb, customer cs WHERE pm.id_mobil=mb.id_mobil AND pm.id_customer=cs.id_customer ")->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/laporan_pembayaran',$data);
		$this->load->view('template_admin/footer');
	}
}

?>