<?php 	

class Auth extends CI_Controller{

	public function login(){

		/* inisialisasi fungsi rules */
		$this->_rules(); 
		/* jika form yang diisi tidak sesuai maka tampilkan halaman login lagi */
		if ($this->form_validation->run() == FALSE){
			/* menampilkan view header admin */
			$this->load->view('template_admin/header');
			/* menampilkan view form login */
			$this->load->view('form_login');
			/* menampilkan view footer admin */
			$this->load->view('template_admin/footer');
		}else{
			/* mengambil username yang diinput user */
			$username		= $this->input->post('username');
			/* mengambil password yang diinput user */
			$password		= md5($this->input->post('password'));
			/* memanggil fungsi cek_login yang ada di rental_model untuk mengecek username dan password yg diinput */
			$cek = $this->rental_model->cek_login($username, $password);

			/* jika variabel cek bernilai salah maka menampilkan pesan username/password salah */
			/* lalu redirect ke halaman login lagi */
			if ($cek == FALSE){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	Username atau Password salah!
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('auth/login');
			/* jika data yang diinput benar maka masuk else*/
			}else{
				/* pengecekan inputan berlanjut ke database */
				/* mengambil dan mengecek variabel session username yang ada didatabase */
				$this->session->set_userdata('username',$cek->username); 
				/* mengambil dan mengecek variabel session role id yang ada didatabase */
				/* berfungsi menandakan pembeda antara admin atau customer */
				$this->session->set_userdata('role_id',$cek->role_id);
				/* mengambil dan mengecek variabel session nama yang ada didatabase */
				$this->session->set_userdata('nama',$cek->nama);

				$this->session->set_userdata('id_customer', $cek->id_customer);
				$this->session->set_userdata('no_ktp',$cek->no_ktp); 

				/* mengecek role id dari akun user */
				switch ($cek->role_id) {
					/* jika role id akun adalah 1 maka masuk ke admin halaman dashboard*/
					case 1 : redirect('admin/dashboard');
							 break;
					/* jika role id akun adalah 2 maka masuk ke cutomer halaman dashboard*/
					case 2 : redirect('customer/dashboard');
							 break;
					
					default: break;
				}
			}
		}

		
	}

	/* function rules untuk mengecek username dan password agar inputan sesuai */
	public function _rules(){
		/* mengecek username yang input oleh user (pengecekan jika tidak diisi oleh user) */
		$this->form_validation->set_rules('username','Username','required');
		/* mengecek password yang input oleh user (pengecekan jika tidak diisi oleh user) */
		$this->form_validation->set_rules('password','Password','required');
	} 

	/* function logout untuk mengeluarkan akun dari status login */
	public function logout(){
		/* menghapus session login dari akun user */
		$this->session->sess_destroy();
		/* redirect ke halaman dashboard customer (tanpa status login akun) */
		redirect('customer/dashboard');
	}
}

 ?>