
<body id="page-top">

   
<!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="nav-store">

          
          <!-- brand -->
            <a class="navbar-brand" href="<?= base_url('home/index') ?>"><?= $title ?></a>
          <!-- end brand -->

          <!-- button for collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <!-- end booton -->

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <!-- menu -->
            
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home/index') ?>">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kategori Produk
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tentang kami</a>
              </li>
            <!-- end menu -->

            <!-- search -->
            <form class="d-none d-sm-inline-block form-inline ml-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="cari" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </ul>
          <!-- endsearch -->
        </div>
        <!-- endcollapse -->

          <ul class="navbar-nav ml-auto">

            
            <!-- Nav cart -->
            <a href="<?= base_url('home/detailOrder') ?>" class="text-dark text-decoration-none">
            <li class="nav-item mt-2">
                <span class="fa-layers fa-fw ">
                  <i class="fas fa-shopping-cart fa-2x text-dark"></i>
                  <span class="fa-layers-counter fa-xs text-white">
                    <?php if ($this->cart->total_items() < 100) {
                      echo $this->cart->total_items();
                    } else {
                      echo "+99";
                    }  ?></span>
                </span>
            </li>
            </a>   
          </ul>
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-4">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              
                <?php if (!$user) : ?>
              <a href="<?= base_url('auth/index'); ?>">
                <span class="mr-2 d-none d-lg-inline text-white small">akun</span>
                <img class="img-profile rounded-circle" width="25px" src="<?= base_url('assets/upload/profile/default.jpg'); ?>">
              </a>
              
              <?php else : ?>
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                <img class="img-profile rounded-circle" width="25px" src="<?= base_url('assets/upload/profile/') . $user['image']; ?>">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('Profiles'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
              <?php endif; ?>
              <!-- Dropdown - User Information -->
            </li>
          </ul>
      </nav>
      <!-- End of Topbar -->
    </div>
  </div>
