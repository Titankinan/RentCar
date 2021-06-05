  <!-- Page Content -->
  <div class="container">
    <?php echo $this->session->flashdata('pesan') ?>

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="<?php echo base_url('assets/upload/carusel1.jpg') ?>" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="<?php echo base_url('assets/upload/carusel2.jpg') ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="<?php echo base_url('assets/upload/carusel4.jpg') ?>" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

          <?php foreach($mobil as $mb) : ?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <?php foreach($review as $rv) if ($rv->id_mobil == $mb->id_mobil): ?>
                    <a type="button" class="btn btn-light" href="#">&#11088; <?php echo $rv->total_review ?> </a>
                    <!-- <a type="button" class="btn btn-light" href="<?php echo base_url('customer/review/lihat_review/'.$mb->id_mobil) ?>">&#11088; <?php echo $rv->bintang ?> </a> -->
                <?php endif; ?>
                <a href="#"><img class="card-img-top" src="<?php echo base_url('assets/upload/'.$mb->gambar) ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $mb->nama_mobil ?></a>
                  </h4>
                  <h5>Harga : Rp.<?php echo number_format($mb->harga,0,',','.') ?></h5>
                </div>
                <div class="card-footer">
                  <?php 
                      if ($mb->status == "0"){
                        echo "<span class='btn btn-danger' disable>Telah Di Sewa</span>";
                      }else{
                        echo anchor('customer/rental/tambah_rental'.$mb->id_mobil, '<button class="btn btn-success">Tersedia</button>');
                      }
                    ?>

                    <a class="btn btn-warning" href="<?php echo base_url('customer/dashboard/detail_mobil/').$mb->id_mobil ?>">Detail</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

 