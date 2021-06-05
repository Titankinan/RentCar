<div class="container">
	
	<div class="card" style ="margin-top :100px; margin-bottom: 50px">
		<div class="card-header">
			Form Request Mobil
		</div>

		<div class="card-body">
				<form method="POST" action="<?php echo base_url('customer/request/tambah_request_aksi') ?>">
					<div class="form-group">
						<label>Request</label>
                        <input type="text" class="form-control" name="jenis_mobil" id="jenis_mobil">
					</div>

					<button type="submit" class="btn btn-warning">Request</button>

				</form>
		</div>
	</div>
</div>