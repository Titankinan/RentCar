<?php
/**
* Membuat Class Controller Data_customer.
*/
Class Data_customer extends CI_Controller{

	/**
	* Membuat fungsi index, fungsi yang akan dipanggil saat menampilkan data customer.
	*/
	public function index()
	{
		//mengambil data customer dari tabel customer
		$data['customer'] = $this->rental_model->get_data('customer')->result();
		//menampilkan view header
		$this->load->view('template_admin/header');
		//menampilkan view sidebar
		$this->load->view('template_admin/sidebar');
		//menampilkan data yang didapatkan dari hasil query pada halaman web
		$this->load->view('admin/data_customer',$data);
		//menampilkan view footer
		$this->load->view('template_admin/footer');
	}

	/**
	* Membuat fungsi tambah customer.
	*/
	public function tambah_customer(){
		//menampilkan view header
		$this->load->view('template_admin/header');
		//menampilkan view sidebar
		$this->load->view('template_admin/sidebar');
		//menampilkan view form_tambah_customer
		$this->load->view('admin/form_tambah_customer');
		//menampilkan view footer
		$this->load->view('template_admin/footer');
	}
	
	/**
	* Membuat fungsi tambah customer.
	*/
	public function tambah_customer_aksi(){
		//menerapkan rules yang ditentukan kedalam form halaman web
		$this->_rules();
		//jika data yang diinputkan tidak sesuai dengan rules
		if($this->form_validation->run()==FALSE){
			//kembali ke halaman tambah customer
			$this->tambah_customer();
		//jika data yang diinputkan sesuai dengan rules
		}else{
			//masukkan data yang diinputkan kedalam variable
			$no_ktp				= $this->input->post('no_ktp');
			$nama				= $this->input->post('nama');
			$email				= $this->input->post('email');
			$username			= $this->input->post('username');
			$password			= md5($this->input->post('password'));

			//masukkan variable yang telah menjadi array kedalam variable data 
			$data = array (
				'no_ktp' => $no_ktp,
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => $password
			);

			//variabel data yang telah berisi array diinputkan ke dalam database pada tabel mobil
			$this->rental_model->insert_data($data,'customer');
			//menampilkan pesan singkat bahwa data customer berhasil ditambahkan
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Customer berhasil Ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			//arahkan kembali ke halaman data_customer
			redirect('admin/data_customer');
	
		}
	}

	/**
	* Membuat fungsi update_customer.
	*/
	public function update_customer($id){
		//memfilter data customer dengan id yang ditentukan
		$where = array('id_customer' => $id);
		//ambil data customer berdasarkan id
		$data['customer'] = $this->db->query("SELECT * FROM customer WHERE id_customer ='$id'")->result();
		//menampilkan view header
		$this->load->view('template_admin/header');
		//menampilkan view sidebar
		$this->load->view('template_admin/sidebar');
		//menampilkan form update customer dengan data customer
		$this->load->view('admin/form_update_customer',$data);
		//menampilkan view footer
		$this->load->view('template_admin/footer');
	}

	/**
	* Membuat fungsi update_customer_aksi.
	*/
	public function update_customer_aksi(){
		//menerapkan rules yang ditentukan kedalam form halaman web
		$this->_rules();
		//jika data yang diinputkan tidak sesuai dengan rules
		if($this->form_validation->run()==FALSE){
			//kembali ke halaman update customer
			$this->update_customer();
		//jika data yang diinputkan sesuai dengan rules
		}else{
			//masukkan data yang diinputkan kedalam variable
			$id 				= $this->input->post('id_customer');
			$no_ktp				= $this->input->post('no_ktp');
			$nama				= $this->input->post('nama');
			$email				= $this->input->post('email');
			$username			= $this->input->post('username');
			$password			= md5($this->input->post('password'));

			//masukkan variable yang telah menjadi array kedalam variable data
			$data = array (
				'no_ktp' => $no_ktp,
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => $password
			);

			//dimana id_customer adalah data dari $id
			$where = array(
				'id_customer' => $id
			);

			//ubah data customer dengan id yang sesuai dengan data baru pada $data
			$this->rental_model->update_data('customer',$data,$where);
			//menampilkan pesan singkat bahwa data customer berhasil diupdate
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Customer berhasil Diupdate
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			//arahkan kembali ke halaman data_customer
			redirect('admin/data_customer');
		}

	}

	/**
	* Membuat fungsi delete_customer.
	*/
	public function delete_customer($id){
		//memfilter data customer dengan id yang ditentukan
		$where = array('id_customer' => $id);
		//menghapus data customer dengan id tersebut
		$this->rental_model->delete_mobil($where,'customer');
		//menampilkan pesan singkat bahwa data customer berhasil dihapus
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Customer berhasil Dihapus
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			//arahkan kembali ke halaman data_customer
			redirect('admin/data_customer');
	}

	/**
	* Membuat fungsi _rules.
	*/
	public function _rules(){
		//membuat rules/peraturan pada inputan form
		$this->form_validation->set_rules('no_ktp','No_ktp','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
	}
}

?>
