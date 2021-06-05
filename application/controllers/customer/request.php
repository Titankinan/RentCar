<?php 

Class Request extends CI_Controller{
	public function index()
	{
        $data['request'] = $this->rental_model->get_data('permintaan')->result();
        $this->load->view('template_customer/header');
		$this->load->view('customer/tambah_request',$data);
		$this->load->view('template_customer/footer');
	}

	public function tambah_request_aksi()
	{
		$id_customer			=$this->session->userdata('id_customer');
		$no_ktp			        =$this->session->userdata('no_ktp');
		$jenis_mobil			=$this->input->post('jenis_mobil');

		/*mengambil data untuk masukan ke tabel database*/
		$data=array(
			'id_customer'				=>$id_customer,
			'no_ktp'				    =>$no_ktp,
			'jenis_mobil'			    =>$jenis_mobil
		);

		/*masukan ke tabel database*/
		$this->rental_model->insert_data($data,'permintaan');

		// /*ubah status mobil menjadi telah disewa*/
		// $status = array (
		// 	'status' => '0'
		// );

		// $id = array(
		// 	'id_mobil' => $id_mobil
		// );

		// $this->rental_model->update_data('mobil',$status,$id);

		/*notifikasi*/
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Request Berhasil Ditambahkan, Terimakasih!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('customer/dashboard');
	}
}

?>