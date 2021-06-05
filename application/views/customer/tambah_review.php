<div class="container">
	
	<div class="card" style ="margin-top :100px; margin-bottom: 50px">
		<div class="card-header">
			Form Rental Mobil
		</div>
		<?php foreach($detail as $dt) : ?>
    <div class="card h-100">	
        <img class="card-img-top" src="<?php  echo base_url().'assets/upload/'.$dt->gambar ?>">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('customer/review/tambah_review_aksi') ?>">
              <div class="form-group">
                <label>Bintang</label>
                <select class="form-control" name="bintang" id="bintang">
                  <option value="0" selected>-</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>

                  <input type="hidden" name="id_mobil" value="<?php echo $dt->id_mobil ?>" class="form-control" >
                  <input type="hidden" name="total_review" class="form-control">
                  <input type="hidden" name="jumlah_review" class="form-control">
      
              <button type="submit" class="btn btn-success mt-2">Tambah Review</button>

            </form>
    <?php endforeach;?>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

    $('#jumlah_review').prop('value', function(){
      var jum_review = 0;
      var jum_review = var jum_review + 1;
        // var jum_review = Math.ceil(diff / (1000 * 3600 * 24));
			return jum_review;
		});
	
</script>