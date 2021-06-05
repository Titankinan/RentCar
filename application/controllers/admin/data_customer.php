<?php

Class Data_customer extends CI_Controller{
	public function index()
	{
		$data['customer'] = $this->rental_model->get_data('customer')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/data_customer',$data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_customer(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_tambah_customer');
		$this->load->view('template_admin/footer');
	}
	
	public function tambah_customer_aksi(){
		$this->_rules();
		
		if($this->form_validation->run()==FALSE){
			$this->tambah_customer();
		}else{
			$no_ktp				= $this->input->post('no_ktp');
			$nama				= $this->input->post('nama');
			$email				= $this->input->post('email');
			$username			= $this->input->post('username');
			$password			= md5($this->input->post('password'));

			$data = array (
				'no_ktp' => $no_ktp,
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => $password
			);

			$this->rental_model->insert_data($data,'customer');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Customer berhasil Ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/data_customer');
	
		}
	}

	public function update_customer($id){
		$where = array('id_customer' => $id);
		$data['customer'] = $this->db->query("SELECT * FROM customer WHERE id_customer ='$id'")->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_update_customer',$data);
		$this->load->view('template_admin/footer');

	}

	public function update_customer_aksi(){
		$this->_rules();
		if($this->form_validation->run()==FALSE){
			$this->update_customer();
		}else{
			$id 				= $this->input->post('id_customer');
			$no_ktp				= $this->input->post('no_ktp');
			$nama				= $this->input->post('nama');
			$email				= $this->input->post('email');
			$username			= $this->input->post('username');
			$password			= md5($this->input->post('password'));

			$data = array (
				'no_ktp' => $no_ktp,
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => $password
			);
			$where = array(
				'id_customer' => $id
			);

			$this->rental_model->update_data('customer',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Customer berhasil Diupdate
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/data_customer');
		}

	}

	public function delete_customer($id){
		$where = array('id_customer' => $id);
		$this->rental_model->delete_mobil($where,'customer');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Customer berhasil Dihapus
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/data_customer');
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