<?php 

Class Rental extends CI_Controller{
	public function tambah_rental($id)
	{
		$data['detail'] = $this->rental_model->ambil_id_mobil($id);
		$this->load->view('template_customer/header');
		$this->load->view('customer/tambah_rental',$data);
		$this->load->view('template_customer/footer');
	}

	public function tambah_rental_aksi()
	{
		$no_ktp					=$this->session->userdata('no_ktp');
		$id_customer			=$this->session->userdata('id_customer');
		$id_mobil				=$this->input->post('id_mobil');
		$tanggal_pesan			=$this->input->post('tanggal_pesan');
		$tanggal_kembali		=$this->input->post('tanggal_kembali');
		$total					=$this->input->post('total');

		/*mengambil data untuk masukan ke tabel database*/
		$data=array(
			'no_ktp'					=>$no_ktp,
			'id_customer'				=>$id_customer,
			'id_mobil'					=>$id_mobil,
			'tanggal_pesan'				=>$tanggal_pesan,
			'tanggal_kembali'			=>$tanggal_kembali,
			'total'						=>$total,
			'status_Pengembalian'		=> 'Belum Kembali',
			'status_rental'				=> 'Belum Selesai'
		);

		/*masukan ke tabel database*/
		$this->rental_model->insert_data($data,'pemesanan');

		/*ubah status mobil menjadi telah disewa*/
		$status = array (
			'status' => '0'
		);

		$id = array(
			'id_mobil' => $id_mobil
		);

		$this->rental_model->update_data('mobil',$status,$id);

		/*notifikasi*/
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Transaksi Berhasil, Silahkan checkout!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('customer/dashboard');
	}

	public function wishlist()
	{
		$id_mobil				=$this->input->post('id_mobil');
		$no_ktp					=$this->session->userdata('no_ktp');
		$cek = $this->rental_model->cek_wishlist($no_ktp,$id_mobil);
		if ($cek) {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Anda sudah memasukkan mobil ini kedalam wishlist
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('customer/dashboard/detail_mobil/'.$id_mobil);
		} else {
			$data=array(
				'no_ktp'			=>$no_ktp,
				'id_mobil'			=>$id_mobil
			);
	
			$this->rental_model->insert_data($data,'daftar_keinginan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Wishlist telah ditambahkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('customer/dashboard/detail_mobil/'.$id_mobil);
		}
		
	}
}

?>