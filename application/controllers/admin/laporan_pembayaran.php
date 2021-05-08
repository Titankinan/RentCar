<?php

Class Laporan_pembayaran extends CI_Controller{
	public function index()
	{
		$data['pembayaran'] = $this->rental_model->get_data('pembayaran')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/laporan_pembayaran',$data);
		$this->load->view('template_admin/footer');
	}
}

?>