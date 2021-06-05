<div class="main-content">
   <section class="section">
        <div class="section-header">
            <h1>Transaksi Selesai</h1>
        </div>
   </section>

   <?php foreach($pemesanan as $pm) : ?>
   <form method="POST" action="<?php echo base_url('admin/laporan_pembayaran/pembayaran_selesai_aksi/') ?>">
   		<input type="hidden" name="id_pemesanan" value="<?php echo $pm->id_pemesanan ?>">
		<input type="hidden" id="status1" value="<?php echo $pm->status_pengembalian ?>">
		<input type="hidden" id="status2" value="<?php echo $pm->status_rental ?>">
   		<div class="form-group">
   			<label>Status Pengembalian</label>
   			<select name="status_pengembalian" id="status_pengembalian" class="form-control">
   				<option value="Kembali">Kembali</option>
   				<option value="Belum Kembali">Belum Kembali</option>
   			</select>
   		</div>

   		<div class="form-group">
   			<label>Status Rental</label>
   			<select name="status_rental" id="status_rental" class="form-control">
   				<option value="Selesai">Selesai</option>
   				<option value="Belum Selesai">Belum Selesai</option>
   			</select>
   		</div>

   		<button type="submit" class="btn btn-success">Save</button>

   </form>
   <?php endforeach; ?>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
		// alert($("#status").val());
		if ($("#status1").val() == "Kembali"){
			document.getElementById('status_pengembalian').value="Kembali";
		} else {
			document.getElementById('status_pengembalian').value="Belum Kembali";
		}

		if ($("#status2").val() == "Selesai"){
			document.getElementById('status_rental').value="Selesai";
		} else {
			document.getElementById('status_rental').value="Belum Selesai";
		}
	});
</script>