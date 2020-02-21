



  <!-- Page Content -->
  <div class="container-fluid">

    <div class="row mt-5 mb-5">

      <div class="col-lg-6 ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?= base_url('assets/upload/slider/slider1.jpg');?>" class="d-block w-100" alt="first slide">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/upload/slider/slider2.jpg');?>" class="d-block w-100" alt="Second slide slide">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/upload/slider/slider3.jpg');?>" class="d-block w-100" alt="Third slide">
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
      </div>
      <div class="col-lg-6 mt-5">
        <div class="owl-carousel owl-theme">
          <div class="item">
            <img src="http://placehold.it/40x50" >
          </div>
          <div class="item">
            <img src="http://placehold.it/40x50" >
          </div>
          <div class="item">
            <img src="http://placehold.it/40x50" >
          </div>
          <div class="item">
            <img src="http://placehold.it/40x50" >
          </div>
          <div class="item">
            <img src="http://placehold.it/40x50" >
          </div>
        </div>
      </div>
    </div>
      
    

    <div class="row">
        <?php foreach ($allProduct as $ap) : ?>
          
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-4 mt-3">
              <a class="text-dark text-decoration-none" href="<?= base_url('home/singleProduct/') . $ap['id']; ?>">
              <div class="card h-100">
                
                  <!-- gambar resolusi 236x158 -->
                <div id="img-prime">
                <img class="card-img-top" src="<?= base_url('assets/upload/products/') . $ap['image'];?>" alt="">
                </div>
                
                <div class="card-body">
                  <h4 class="card-title">
                    <?= $ap['name'] ?>
                  </h4>
                  <h5>
                    <?php
                     if ($user) {
                      echo 'Rp '. $ap['old_price'];
                      } else {
                      echo'Rp '. $ap['price'];
                      } 

                    ?>
                    
                  </h5>
                  
                </div>

                <?php if ($ap['free_delivery']) : ?>
                <div class="card-footer">
                  <span class="fa-layers fa-fw">
                    <span class="fa-layers-text fa-inverse" data-fa-transform="shrink-2 right-6" style="font-weight:900; color: black;">FREE</span>
                    <i class="fas fa-shipping-fast fa-lg text-primary"></i>
                    <small class="card-text">
                    <?= $ap['free_delivery']; ?>
                  </small>
                  </span>
                </div>
                <?php else : ?>
                <div class="card-footer">
                  <a class="text-decoration-none" href="<?= base_url('home/shipping'); ?>">Cek Ongkir</a>
                </div>  
                <?php endif; ?>
              </div>
              </a>
            </div>
         
        <?php endforeach; ?>
    </div>
    
      


  </div>
  

  