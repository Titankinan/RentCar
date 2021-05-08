<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Mobil</h1>
          </div>
         </section>


         <?php foreach($detail as $dt):  ?>
         	<div class="car">
         		<div class="card-body">
         			<div class="row">
         				<div class="col-md-6">
         					<img src="<?php  echo base_url().'assets/upload/'.$dt->gambar ?>" width="550 px" height="320px">
         				</div>
         				<div class="col-md-5">
         					<table class="table">
         						<tr>
         							<td>Nama Mobil</td>
         							<td><?php echo $dt->nama_mobil ?></td>
         						</tr>

         						<tr>
         							<td>Harga Sewa</td>
         							<td><?php echo $dt->harga ?></td>
         						</tr>

         						<tr>
         							<td>Warna</td>
         							<td><?php echo $dt->warna ?></td>
         						</tr>

         						<tr>
         							<td>Plat Nomor</td>
         							<td><?php echo $dt->plat_nomor ?></td>
         						</tr>

         						<tr>
         							<td>Deskripsi</td>
         							<td><?php echo $dt->deskripsi ?></td>
         						</tr>

         						<tr>
         							<td>Status</td>
         							<td>
         								<?php 
         									if($dt->status == "0"){
         										echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
         									} else {
         										echo "<span class='badge badge-primary'>Tersedia</span>";
         									}
         								  ?>
         							</td>
         						</tr>
         					</table>
         					<a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('admin/datamobil') ?>">Kembali</a>
         					<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/datamobil/update_mobil/'.$dt->id_mobil) ?>">Update Mobil</a>

         				</div>
         			</div>
         		</div>
         	</div>

         <?php endforeach; ?>       
</div>