<div class="d-lg-none">
	<nav class="navbar navbar-expand-lg navbar-dark fixed-bottom col-sm-11 nav-bot" >
	    
      	<a href="#" class="btn btn-outline-warning rounded-pill" >
      		<i class="far fa-comments rounded-pill" id="item-bottom"></i>
      	</a>
		
      	<button type="button" class="btn btn-outline-success rounded-pill">
      		<i class="far fa-heart" id="item-bottom"></i>
      	</button>

      	<button type="button" class="btn btn-outline-primary rounded-pill" data-toggle="modal" data-target="#cart">
      		<i class="fas fa-shopping-cart" id="item-bottom"></i>
      	</button>
      	

	    
	</nav>
</div>

<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
            <div class="modal-header">
              <h5 class="modal-title text-uppercase font-weight-bold"><?= $singleProduct['name']; ?>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <p class="justify-content-left text-capitalize">
            <?php if ($user) {
               echo 'harga : '.'Rp ' . $singleProduct['member_price'];  
            } else {
                  echo 'harga : '.'Rp ' . $singleProduct['price'];
            } ?>
                  
            </p>

            <form action="<?= base_url('home/addCart'); ?>" method="post">
                  <input type="hidden" name="id" value="<?= $singleProduct['id']; ?>">
                  <input type="hidden" id="name" name="name" value="<?= $singleProduct['name']; ?>">
                  <label for="qty">Quantity : </label>
                  <input type="number" class="" id="qty" name="qty" value="1">
                  <input type="hidden" id="price" name="price" value="<?php if ($user) {
                     echo $singleProduct['member_price'];  
                  } else {
                        echo $singleProduct['price'];
                  } ?>">
                  <input type="hidden" id="image" name="image" value="<?= $singleProduct['image']; ?>">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah Keranjang</button>
            </div>
            </form>
      
    </div>
  </div>
</div>