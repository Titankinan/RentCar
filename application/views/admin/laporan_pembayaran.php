<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan Pembayaran</h1>
          </div>
         </section>

         <table class="table table-hover table-striped table-borderd">
         	<thead>
         		<th>Id pembayaran</th>
         		<th>Id pemesanan</th>
         		<th>Total harga</th>
         		<th></th>
         		<th>Aksi</th>
         		<th></th>
         	</thead>
         	<tbody>
         		<?php
         			foreach($pembayaran as $pb):  ?>
         				<td><?php echo $pb->id_pembayaran ?></td>
         				<td><?php echo $pb->id_pemesanan?></td>
         				<td><?php echo $pb->total_harga?></td>
         				

         				<td>
         					<a href="" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
         					
         				</td>
         				<td>
         					<a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
         				</td>
         				<td>
         					<a href="" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
         				</td>
         		<?php endforeach; ?>
         	</tbody>
         	
         </table>

         
</div>