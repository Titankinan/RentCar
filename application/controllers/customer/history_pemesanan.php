<?php 

Class History_pemesanan extends CI_Controller{
	public function index()
	{
		$this->load->view('template_customer/header');
		$this->load->view('template_customer/sidebar');
		$this->load->view('customer/history_pemesanan');
		$this->load->view('template_customer/footer');
	}
}

?>