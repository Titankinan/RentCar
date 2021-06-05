<?php 

Class Dashboard extends CI_Controller{
	public function index()
	{
		$data['mobil'] = $this->rental_model->get_data('mobil')->result();
		$data['review'] = $this->rental_model->get_data('review')->result();
		$this->load->view('template_customer/header');
		$this->load->view('customer/dashboard',$data);
		$this->load->view('template_customer/footer');
	}

	public function detail_mobil($id)
	{
		$data['detail'] = $this->rental_model->ambil_id_mobil($id);
		$this->load->view('template_customer/header');
		$this->load->view('customer/detail_mobil',$data);
		$this->load->view('template_customer/footer');
	}
	public function about()
	{
		$this->load->view('template_customer/header');
		$this->load->view('customer/about');
		$this->load->view('template_customer/footer');
	}
	public function wish()
	{
		$data['daftar_keinginan'] = $this->db->query("SELECT * FROM daftar_keinginan ws, mobil mb, customer cs WHERE ws.id_mobil=mb.id_mobil AND ws.no_ktp=cs.no_ktp ")->result();
		$this->load->view('template_customer/header');
		$this->load->view('customer/wishlist',$data);
		$this->load->view('template_customer/footer');
	}
}

?>