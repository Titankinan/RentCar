<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Customer</h1>
          </div>
         </section>

         <a href="<?php echo base_url('admin/data_customer/tambah_customer')?>" class="btn btn-primary mb-3">Tambah customer</a>
         <?php echo $this->session->flashdata('pesan') ?>

         <table class="table table-striped table-responsive table-bordered">
         <thead>
         	<tr>
         		<th>No</th>
         		<th>No KTP</th>
         		<th>Nama</th>
         		<th>Email</th>
         		<th>Username</th>
         		<th>Password</th>
         		<th>Aksi</th>
         		
         	</tr>
         </thead>
         <tbody>
         	 <?php foreach ($customer as $cs): ?>
         			<tr>
         				<td><?php echo $cs->id_customer ?></td>
         				<td><?php echo $cs->no_ktp ?></td>
         				<td><?php echo $cs->nama ?></td>
         				<td><?php echo $cs->email ?></td>
         				<td><?php echo $cs->username ?></td>
         				<td><?php echo $cs->password ?></td>
         				<td>
         					<a href="<?php echo base_url('admin/data_customer/delete_customer/').$cs->id_customer ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
         				</td>

         				<td>
         					<a href="<?php echo base_url('admin/data_customer/update_customer/').$cs->id_customer ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
         				</td>
         			</tr>

         	<?php endforeach; ?> 
         </tbody>
         </table>