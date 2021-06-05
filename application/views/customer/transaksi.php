<div class="container">
	<div class="card mx-auto" style="margin-top: 100px; width: 80%">
		<div class="card-header">
			Data Transaksi Anda
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<tr>
					<th>No</th>
					<th>Nama Customer</th>
					<th>Mobil</th>
					<th>No Plat</th>
					<th>Total harga</th>
					<th>Aksi</th>
				</tr>

				<?php $no=1; foreach($pemesanan as $tr) : ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $tr->nama ?></td>
					<td><?php echo $tr->nama_mobil ?></td>
					<td><?php echo $tr->plat_nomor ?></td>
					<td>Rp. <?php echo $tr->total ?></td>
					<td>
						<?php if($tr->status_rental == "Selesai") { ?>
							<button class="btn bnt-sm btn-danger">Rental Selesai</button>
						<?php }else{?>
							<a href="<?php echo base_url('customer/transaksi/pembayaran/'.$tr->id_pemesanan) ?>" class="btn btn-sm btn-success">Cek Pembayaran</a>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>