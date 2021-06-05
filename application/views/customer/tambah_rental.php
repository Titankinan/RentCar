<div class="container">
	
	<div class="card" style ="margin-top :100px; margin-bottom: 50px">
		<div class="card-header">
			Form Rental Mobil
		</div>

		<div class="card-body">
			<?php foreach($detail as $dt) : ?>
				<form method="POST" action="<?php echo base_url('customer/rental/tambah_rental_aksi') ?>">
					<div class="form-group">
						<label>Harga Sewa/hari</label>
						<input type="hidden" name="id_mobil" value="<?php echo $dt->id_mobil ?>">
						<input type="text" name="harga" id="harga" class="form-control" value="<?php echo $dt->harga ?>" readonly>
					</div>

					<div class="form-group">
						<label>Tanggal Sewa</label>
						<input type="date" name="tanggal_pesan" id="tanggal_pesan" min="<?php echo date('Y-m-d');?>" class="form-control">
					</div>

					<div class="form-group">
						<label>Tanggal Kembali</label>
						<input type="date" name="tanggal_kembali" id="tanggal_kembali" min="<?php echo date('Y-m-d');?>" class="form-control">
					</div>

					<div class="form-group">
						<label>Harga Total</label>
						<input type="text" name="total" id="total" class="form-control" readonly>
					</div>

					<button type="submit" class="btn btn-warning">Rental</button>

				</form>
			<?php endforeach;?>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

	var harga = $('#harga').val();
	var tanggal_pesan;
	$('#tanggal_pesan').on('change', function(){
		tanggal_pesan = $(this).val();
		$('#tanggal_kembali').prop('min', function(){
			return tanggal_pesan;
		});
	});
	
	// var tanggal_kembali;
	$('#tanggal_kembali').on('change', function(){
		// tanggal_kembali = $(this).val();
		$('#total').prop('value', function(){
			var from = new Date($("#tanggal_pesan").val());
        	var until = new Date($("#tanggal_kembali").val());
			var substraction = Math.abs(until.getTime() - from.getTime());
        	var day = Math.ceil(substraction / (1000 * 3600 * 24));
			var total = day * harga;
			return total;
		});
	});

</script>