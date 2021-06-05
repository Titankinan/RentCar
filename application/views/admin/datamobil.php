<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Mobil</h1>
          </div>
         </section>

         <a href="<?php echo base_url('admin/datamobil/tambah_mobil')?>" class="btn btn-primary mb-3">Tambah Data</a>
         <?php echo $this->session->flashdata('pesan') ?>

         <table class="table table-hover table-striped table-borderd">
         	<thead>
         		<tr>
         			<th>Gambar</th>
	         		<th>Id</th>
	         		<th>No KTP Pemilik</th>
	         		<th>Nama Mobil</th>
	         		<th>Harga Sewa</th>
	         		<th>Warna</th>
	         		<th>Plat Nomor</th>
	         		<th>Status</th>
	         		<th>Deskripsi</th>
	         		<th></th>
	         		<th>Aksi</th>
	         		<th></th>
         		</tr>
         	</thead>
         	<tbody>
         		<?php
         			foreach($mobil as $mb):  ?>
         				<tr> 
	         				<!-- <td><?php echo $id_mobil++ ?></td> -->
	         				<td>
         						<img width="60px" src="<?php echo base_url().'assets/upload/'.$mb->gambar ?>">
         					</td>
	         				<td><?php echo $mb->id_mobil ?></td>
	         				<td><?php echo $mb->no_ktp_pemilik ?></td>
	         				<td><?php echo $mb->nama_mobil ?></td>
	         				<td><?php echo $mb->harga ?></td>
	         				<td><?php echo $mb->warna ?></td>
	         				<td><?php echo $mb->plat_nomor ?></td>
	         				<td><?php 
	         					if ($mb->status=="0"){
	         						echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
	         					} else {
	         						echo "<span class='badge badge-primary'> Tersedia </span>";
	         					}

	         				 ?></td>
	         				<td><?php echo $mb->deskripsi ?></td>

	         				<td>
	         					<a href="<?php echo base_url('admin/datamobil/detail_mobil/').$mb->id_mobil?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
	         					
	         				</td>
	         				<td>
	         					<a href="<?php echo base_url('admin/datamobil/delete_mobil/').$mb->id_mobil?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
	         				</td>
	         				<td>
	         					<a href="<?php echo base_url('admin/datamobil/update_mobil/').$mb->id_mobil?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
	         				</td>
         				</tr>
         		<?php endforeach; ?>
         	</tbody>
         	
         </table>
</div>