<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Transaksi</h1>
      </div>

      <div class="table-responsive">
      <table class="table-responsive table table-bordered table-striped">
         <tr>
            <td>No 
               <th>KTP Customer</th>
               <th>Customer</th>
               <th>Mobil</th>
               <th>Tgl. Rental</th>
               <th>Tgl. Kembali</th>
               <th>Harga/hari</th>
               <th>Total</th>
               <th>Status Pengembalian</th>
               <th>Status Rental</th>
               <th>Aksi</th>
            </td>
         </tr>

         <?php $no=1;
         foreach($pemesanan as $pm) : ?>
            <tr>
               <td><?php echo $no++ ?></td>
               <td><?php echo $pm->no_ktp ?></td>
               <td><?php echo $pm->nama ?></td>
               <td><?php echo $pm->nama_mobil ?></td>
               <td><?php echo date('d/m/Y', strtotime($pm->tanggal_pesan)); ?></td>
               <td><?php echo date('d/m/Y', strtotime($pm->tanggal_kembali)); ?></td>
               <td>Rp. <?php echo $pm->harga ?></td>
               <td>Rp. <?php echo $pm->total ?></td>
               <td><?php echo $pm->status_pengembalian ?></td>
               <td><?php echo $pm->status_rental ?></td>
               <td>
                  <?php 
                     if($pm->status == "1"){
                        echo "-";
                     } else { ?>
                        <div class="row">
                           <a class="btn btn-sm btn-success mr-2 " href="<?php echo base_url('admin/laporan_pembayaran/pembayaran_selesai/'.$pm->id_pemesanan) ?>"><i class="fas fa-check"></i></a>

                           <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/laporan_pembayaran/pembayaran_batal/'.$pm->id_pemesanan) ?>"><i class="fas fa-times"></i></a>
                        </div>
                     <?php } ?>
               </td>

            </tr>
         <?php endforeach ?>
      </table>
      </div>
   </section>
</div>