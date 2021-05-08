<?php
	
class Register extends CI_Controller{

	public function index(){
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->load->view('template_admin/header');
			$this->load->view('register_form');
			$this->load->view('template_admin/footer');
		}else{
			$no_ktp				= $this->input->post('no_ktp');
			$nama				= $this->input->post('nama');
			$email				= $this->input->post('email');
			$username			= $this->input->post('username');
			$password			= md5($this->input->post('password'));
			$role_id			= '2';

			$data = array (
				'no_ktp' => $no_ktp,
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => $password,
				'role_id'  => $role_id
			);

			$this->rental_model->insert_data($data,'customer');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Berhasil Register, Silahkan Login!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('auth/login');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('no_ktp','No_ktp','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
	}
}


 ?>