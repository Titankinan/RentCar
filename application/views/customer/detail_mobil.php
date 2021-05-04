<div class="container mt-5 mb-5">
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
								<td><?php echo $dt->harga ?></td>
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
								<th>Durasi</th>
								<td>
									<div class="form-group">
										<form action="" method="post">
											<label>Tanggal Sewa:</label>
											<input type="date" id="tanggal_sewa" name="tanggal_sewa" placeholder="naonnya" min="<?php echo date('Y-m-d');?>">
											<input class="btn btn-sm btn-success" type="submit">
											<?php
												$minsewa = $_POST['tanggal_sewa'];
											?>
										</form>
										
										<?php
										if ($_SERVER["REQUEST_METHOD"] == "POST") {
											// collect value of input field
											$name = $_POST['tanggal_sewa'];
											if (empty($name)) {
												echo "Name is empty";
											} else {
												echo $name;
											}
										}
										?>

										<?php echo form_error('no_ktp_pemilik','<div class="text-small text-danger">','</div>')?>
									</div>
									<div class="form-group">
										<form action="">
											<label>Tanggal Pengembalian:</label>
											<input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" min="<?php echo $name?>">
										</form>
										<?php echo form_error('no_ktp_pemilik','<div class="text-small text-danger">','</div>')?>
									</div>
								</td>
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
						                      echo anchor('customer/rental/tambah_rental'.$dt->id_mobil, '<button class="btn btn-success">Sewa</button>');
						                    }
					                  ?> 
									  <a href="<?php echo base_url('customer/dashboard/')?> "><button class="btn btn-success">Back</button></a>
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