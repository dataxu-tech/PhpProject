<body class="" style="background-color: #05B7C2;">
<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">          
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Buat Akunmu.!</h1>
            </div>
            <form class="user" method="post" action=" <?= base_url('auth/registration') ?> ">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
              </div>
              <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
              </div>
              <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                </div>
                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                </div>
                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                Buat Akun
              </button>                
            </form>
            <hr>              
            <div class="text-center mb-3">
              <a class="small" href="<?= base_url('auth/index') ?>">Sudah Punya Akun.!</a>
            </div>
            <div class="text-center">
                <a class="small" href="<?= base_url('home/index') ?>" >Kembali ke Halaman Utama</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>