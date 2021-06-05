<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header alert alert-success">
					Invoice Pembayaran Anda
				</div>
				<div class="card-body">
					<table class="table">
					<?php foreach($pemesanan as $pm) :  ?>
						<tr>
							<th>Nama Mobil</th>
							<td>:</td>
							<th><?php echo $pm->nama_mobil ?></th>
						</tr>
						<tr>
							<th>Tanggal Rental</th>
							<td>:</td>
							<th><?php echo $pm->tanggal_pesan ?></th>
						</tr>
						<tr>
							<th>Tanggal Kembali</th>
							<td>:</td>
							<th><?php echo $pm->tanggal_kembali ?></th>
						</tr>
						<tr>
							<th>Biaya Sewa/Hari</th>
							<td>:</td>
							<th>Rp.<?php echo $pm->harga ?></th>
						</tr>

						<tr>
							<?php 
								$x = strtotime($pm->tanggal_kembali);
								$y = strtotime($pm->tanggal_pesan);
								$jmlhari = abs(($x - $y)/(60*60*24))
							 ?>
							<th>Jumlah Hari Sewa</th>
							<td>:</td>
							<th><?php echo $jmlhari ?> Hari</th>
						</tr>

						<tr class="text-success">
							<th>Jumlah Pembayaran</th>
							<td>:</td>
							<th><button class="btn btn-sm btn-success">Rp.<?php echo number_format($pm->harga * $jmlhari,0,',','.') ?></button></th>
						</tr>
						
						<!-- <tr>
							<th><a class="btn btn-primary mt-2" href="<?php echo base_url('customer/review/tambah_review/') ?>">+ Review Mobil</a></th>
						</tr> -->

					<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header alert alert-success">
					Informasi Pembayaran
				</div>
				<div class="card-body">
					<p class="text-success mb-2">Silahkan melakukan pembayaran melalui nomor rekening dibawah ini:</p>
					<ul class="list-group list-group-flush">
					  <li class="list-group-item">Bank Mandiri 10011112211</li>
					  <li class="list-group-item">Bank BCA 10011112211</li>
					  <li class="list-group-item">Bank BNI 10011143211</li>
					  <li class="list-group-item">Bank Danamon 10054612211</li>
					  <li class="list-group-item">Bank BRI 10018972211</li>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>