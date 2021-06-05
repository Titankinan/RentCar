<div class="container mt-5 mb-5">
	<?php echo $this->session->flashdata('pesan') ?>
	<div class="card">
		<div class="card-body">
			 
			<?php foreach ($detail as $dt) : ?>
				<div class="row">
					<div class="col-md-6">
						<img style="width: 80%" src="<?php echo base_url('assets/upload/'.$dt->gambar) ?>">
						
					</div>

					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>No KTP Pemilik</th>
								<td><?php echo $dt->no_ktp_pemilik ?></td>
							</tr>
							<tr>
								<th>Nama Mobil</th>
								<td><?php echo $dt->nama_mobil ?></td>
							</tr>
							<tr>
								<th>Harga</th>
								<td><?php echo $dt->harga ?> /Hari</td>
							</tr>
							<tr>
								<th>Warna</th>
								<td><?php echo $dt->warna ?></td>
							</tr>
							<tr>
								<th>plat_nomor</th>
								<td><?php echo $dt->plat_nomor ?></td>
							</tr>
							<tr>
								<th>Deskripsi</th>
								<td><?php echo $dt->deskripsi ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td>
									<?php if ($dt->status =="1") {
										echo "Tersedia";
									}else{
										echo "Sedang Di Sewa";
									}?>
										
								</td>
								<tr>
									<td></td>
									<td>
										<?php 
						                    if ($dt->status == "0"){
						                      echo "<span class='btn btn-danger' disable>Telah Di Sewa</span>";
						                    }else{
						                      echo anchor('customer/rental/tambah_rental/'.$dt->id_mobil, '<button class="btn btn-success">Sewa</button>');
						                    }
					                  	?> 
										<form method="POST" action="<?php echo base_url('customer/rental/wishlist') ?>">
										<input type="hidden" name="id_mobil" value="<?php echo $dt->id_mobil ?>">
										<button type="submit" class="btn btn-warning mt-2">Wishlist</button>
										<a class="btn btn-primary mt-2" href="<?php echo base_url('customer/review/tambah_review/'.$dt->id_mobil) ?>">+ Review Mobil</a>
										</form>
										
					                 </td>
								</tr>
							</tr>
						</table>
					</div>
				</div>
			<?php endforeach ; ?>
		</div>
	</div>
</div>