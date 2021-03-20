<?php

Class Datamobil extends CI_Controller{
	public function index()
	{
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/datamobil');
		$this->load->view('template_admin/footer');
	}
}

?>