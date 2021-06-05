<?php 

Class Review extends CI_Controller{
	public function lihat_review()
	{
        $data['review'] = $this->rental_model->get_data('review')->result();
        $this->load->view('template_customer/header');
		$this->load->view('customer/review',$data);
		$this->load->view('template_customer/footer');
	}
    
	public function tambah_review($id)
	{
        $data['detail'] = $this->rental_model->ambil_id_mobil($id);
        $data['review'] = $this->rental_model->get_data('review')->result();
        $this->load->view('template_customer/header');
		$this->load->view('customer/tambah_review',$data);
		$this->load->view('template_customer/footer');
	}

	public function tambah_review_aksi()
	{
		$id_customer			=$this->session->userdata('id_customer');
		$nama			        =$this->session->userdata('nama');
		$id_mobil				=$this->input->post('id_mobil');
		$bintang				=$this->input->post('bintang');
		$total_review			=$this->input->post('total_review');
		$jumlah_review			=$this->input->post('jumlah_review');

        $i = $i + 1;

        $temp = $bintang / $i;
		/*mengambil data untuk masukan ke tabel database*/
		$data=array(
			'id_customer'				=>$id_customer,
			'nama'				        =>$nama,
			'id_mobil'					=>$id_mobil,
			'bintang'				    =>$bintang,
			'total_review'			    =>$temp,
			'jumlah_review'				=>$i
		);

		/*masukan ke tabel database*/
		$this->rental_model->insert_data($data,'review');

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
			  Review Berhasil Ditambahkan, Terimakasih!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('customer/dashboard');
	}
}

?>