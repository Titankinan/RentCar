<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Data Mobil</h1>
          </div>

          <div class="card">
          	<div class="card-body">

          		
                    <form method="POST" action="<?php echo base_url('admin/datamobil/tambah_mobil_aksi')?>" enctype="multipart/form-data">

          		<div class="row">
          			<div class="col-md-6">
          				<div class="form-group">
          					<label>No KTP Pemilik</label>
          					<input type="text" name="no_ktp_pemilik" class="form-control">
          					<?php echo form_error('no_ktp_pemilik','<div class="text-small text-danger">','</div>')?>
          				</div>

          				<div class="form-group">
          					<label>Nama Mobil</label>
          					<input type="text" name="nama_mobil" class="form-control">
          					<?php echo form_error('nama_mobil','<div class="text-small text-danger">','</div>')?>
          				</div>

          				<div class="form-group">
          					<label>Harga</label>
          					<input type="text" name="harga" class="form-control">
          					<?php echo form_error('harga','<div class="text-small text-danger">','</div>')?>
          				</div>

          				<div class="form-group">
          					<label>Warna</label>
          					<input type="text" name="warna" class="form-control">
          					<?php echo form_error('warna','<div class="text-small text-danger">','</div>')?>
          				</div>

          				<div class="form-group">
          					<label>Gambar</label>
          					<input type="file" name="gambar" class="form-control">

          				</div>

          			</div>
          			<div class="col-md-6">
          				<div class="form-group">
          					<label>Plat Nomor</label>
          					<input type="text" name="plat_nomor" class="form-control">
          					<?php echo form_error('plat_nomor','<div class="text-small text-danger">','</div>')?>
          				</div>

          				<div class="form-group">
          					<label>Deskripsi</label>
          					<input type="text" name="deskripsi" class="form-control">
          					<?php echo form_error('deskripsi','<div class="text-small text-danger">','</div>')?>
          				</div>

          				<div class="form-group">
          					<label>Status</label>
          					<select name="status" class="form-control">
          						<option value="">--Pilih Status--</option>
          						<option value="1">Tersedia</option>
          						<option value="0">Tidak tersedia</option>
          					</select>
          					<?php echo form_error('status','<div class="text-small text-danger">','</div>')?>
          				</div>

          				<button type="submit" class="btn btn-primary mt-4">Simpan</button>
          				<button type="reset" class="btn btn-danger mt-4">Reset</button>
          			</div>	
          		</div>
          		</form>
          	</div>
          </div>

         </section>
</div>