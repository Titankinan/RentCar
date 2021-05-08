<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Data Mobil</h1>
          </div>

          <div class="card">
          	<div class="card-body">
                    <?php foreach($mobil as $mb) : ?>
               		<form method="POST" action="<?php echo base_url('admin/datamobil/update_mobil_aksi')?>" enctype="multipart/form-data">

               		<div class="row">
               			<div class="col-md-6">
               				<div class="form-group">
               					<label>No KTP Pemilik</label>
                                        <input type="hidden" name="id_mobil" value="<?php echo $mb->id_mobil ?>">
               					<input type="text" name="no_ktp_pemilik" class="form-control" value="<?php echo $mb->no_ktp_pemilik ?>">
               					<?php echo form_error('no_ktp_pemilik','<div class="text-small text-danger">','</div>')?>
               				</div>

               				<div class="form-group">
               					<label>Nama Mobil</label>
               					<input type="text" name="nama_mobil" class="form-control" value="<?php echo $mb->nama_mobil ?>">
               					<?php echo form_error('nama_mobil','<div class="text-small text-danger">','</div>')?>
               				</div>

               				<div class="form-group">
               					<label>Harga</label>
               					<input type="text" name="harga" class="form-control" value="<?php echo $mb->harga ?>">
               					<?php echo form_error('harga','<div class="text-small text-danger">','</div>')?>
               				</div>

               				<div class="form-group">
               					<label>Warna</label>
               					<input type="text" name="warna" class="form-control" value="<?php echo $mb->warna ?>">
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
               					<input type="text" name="plat_nomor" class="form-control" value="<?php echo $mb->plat_nomor ?>" >
               					<?php echo form_error('plat_nomor','<div class="text-small text-danger">','</div>')?>
               				</div>

               				<div class="form-group">
               					<label>Deskripsi</label>
               					<input type="text" name="deskripsi" class="form-control" value="<?php echo $mb->deskripsi ?>">
               					<?php echo form_error('deskripsi','<div class="text-small text-danger">','</div>')?>
               				</div>

               				<div class="form-group">
               					<label>Status</label>

               					<select name="status" class="form-control">
               						<option <?php if($mb->status == "1"){echo "selected='selected'";}
                                             echo $mb->status; ?> value="1" >Tersedia</option>
               						<option <?php if($mb->status == "0"){echo "selected='selected'";}
                                             echo $mb->status; ?> value="0" >Tidak Tersedia</option>
               					</select>
               					<?php echo form_error('status','<div class="text-small text-danger">','</div>')?>
               				</div>

               				<button type="submit" class="btn btn-primary mt-4">Simpan</button>
               				<button type="reset" class="btn btn-danger mt-4">Reset</button>
               			</div>	
                              <?php echo('_______________________________________________________________________________________') ?>
               		</div>
               		</form>

                    <?php endforeach; ?>
          	</div>
          </div>

         </section>
</div>