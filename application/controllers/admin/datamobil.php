<?php

Class Datamobil extends CI_Controller{
	public function index()
	{
		$data['mobil'] = $this->rental_model->get_data('mobil')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/datamobil',$data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_mobil()
	{
		$data['mobil'] = $this->rental_model->get_data('mobil')->result();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_tambah_mobil',$data);
		$this->load->view('template_admin/footer');
	}


	public function tambah_mobil_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_mobil();
		}else{
			$no_ktp_pemilik				= $this->input->Post('no_ktp_pemilik');
			$nama_mobil					= $this->input->Post('nama_mobil');
			$harga						= $this->input->Post('harga');
			$warna						= $this->input->Post('warna');
			$plat_nomor					= $this->input->Post('plat_nomor');
			$deskripsi					= $this->input->Post('deskripsi');
			$status						= $this->input->Post('status');

			$gambar						= $_FILES['gambar']['name'];
			if($gambar=''){}else{
				$config ['upload_path']		= './assets/upload/';
				$config ['allowed_types']	= 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "gambar gagal di upload";
				}else{
					$gambar=$this->upload->data('file_name');
				}
			}

			$data=array(
				'no_ktp_pemilik'		=> $no_ktp_pemilik,
				'nama_mobil'			=> $nama_mobil,
				'harga'					=> $harga,
				'warna'					=> $warna,
				'plat_nomor'			=> $plat_nomor,
				'deskripsi'				=> $deskripsi,
				'status'				=> $status,
				'gambar'				=> $gambar
			);

			$this->rental_model->insert_data($data, 'mobil');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mobil berhasil Ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/datamobil'); 
		}
	}

	public function update_mobil($id)
	{
		$where = array('id_mobil' => $id);
		$data['mobil'] = $this->db->query("SELECT * FROM mobil mb WHERE mb.id_mobil = '$id'")->result();
		$data['detail'] = $this->rental_model->ambil_id_mobil($id);

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/form_update_mobil',$data);
		$this->load->view('template_admin/footer');
	}

	public function update_mobil_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE)
		{
			$this->update_mobil();
		}else{
			$id 						= $this->input->post('id_mobil');
			$no_ktp_pemilik				= $this->input->Post('no_ktp_pemilik');
			$nama_mobil					= $this->input->Post('nama_mobil');
			$harga						= $this->input->Post('harga');
			$warna						= $this->input->Post('warna');
			$plat_nomor					= $this->input->Post('plat_nomor');
			$deskripsi					= $this->input->Post('deskripsi');
			$status						= $this->input->Post('status');

			$gambar						= $_FILES['gambar']['name'];
			if($gambar){
				$config ['upload_path']		= './assets/upload/';
				$config ['allowed_types']	= 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
			 if($this->upload->do_upload('gambar')){
					$gambar=$this->upload->data('file_name');
					$this->db->set('gambar', $gambar);
				} else {
					echo $this->upload->display_error();
				}
			
			}

			$data=array(
				'no_ktp_pemilik'		=> $no_ktp_pemilik,
				'nama_mobil'			=> $nama_mobil,
				'harga'					=> $harga,
				'warna'					=> $warna,
				'plat_nomor'			=> $plat_nomor,
				'deskripsi'				=> $deskripsi,
				'status'				=> $status
			);

			$where = array(
				'id_mobil' => $id
			);

			$this->rental_model->update_data('mobil', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Mobil berhasil Diupdate
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/datamobil'); 
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('no_ktp_pemilik','No KTP Pemilik','required');
		$this->form_validation->set_rules('nama_mobil','Nama Mobil','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('warna','Warna','required');
		$this->form_validation->set_rules('plat_nomor','Plat Nomor','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('status','Status','required');
	}

	public function detail_mobil($id)
	{
		$data['detail'] = $this->rental_model->ambil_id_mobil($id);
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/detail_mobil',$data);
		$this->load->view('template_admin/footer');
	}

	public function delete_mobil($id)
	{
		$where = array('id_mobil' => $id);
		$this->rental_model->delete_mobil($where, 'mobil');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Mobil berhasil Dihapus
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/datamobil'); 	}
}

?>