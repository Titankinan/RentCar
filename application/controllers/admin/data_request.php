<?php

Class Data_request extends CI_Controller{
	public function index()
	{
		$data['customer'] = $this->rental_model->get_data('customer')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_customer',$data);
		$this->load->view('template_admin/footer');
	}

    
}