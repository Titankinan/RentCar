<?php

Class Laporan_pembayaran extends CI_Controller{
	public function index()
	{
		$data['pemesanan'] = $this->db->query("SELECT * FROM pemesanan pm, mobil mb, customer cs WHERE pm.id_mobil=mb.id_mobil AND pm.id_customer=cs.id_customer ")->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/laporan_pembayaran',$data);
		$this->load->view('template_admin/footer');
	}

	public function pembayaran_selesai($id){
		$where = array('id_pemesanan' => $id);
		$data['pemesanan'] = $this->db->query("SELECT * FROM pemesanan WHERE id_pemesanan='$id'")->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/transaksi_selesai',$data);
		$this->load->view('template_admin/footer');
	}

	public function pembayaran_selesai_aksi(){
		$id 					= $this->input->post('id_pemesanan');
		$status_pengembalian 	= $this->input->post('status_pengembalian');
		$status_rental 			= $this->input->post('status_rental');

		$data = array(
			'status_rental' 		=> $status_rental,
			'status_pengembalian' 	=> $status_pengembalian
		);

		$where = array(
			'id_pemesanan' => $id
		);

		$this->rental_model->update_data('pemesanan', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Transaksi berhasil diupdate!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
		redirect('admin/laporan_pembayaran');

	}
}

?>