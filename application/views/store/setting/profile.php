


<div class="container mt-5">
            
  <div class="row">
        <div class="col-sm-3 mr-2">
            <div class="profile-img">
                <img src="<?= base_url('assets/upload/profile/') . $user['image']; ?>" class="img-thumbnail" alt="default"/>
                
            </div>
        </div>

        <div class="col-sm-7">
            <div class="profile-head">
                <h3>
                    <?= $user['name']; ?> 
                </h3>
                <ul class="nav nav-tabs align-self-end" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Alamat</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab mt-3" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <form>
                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control" id="name" value="<?= $user['name']; ?> ">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control" id="email" value="<?= $user['email']; ?> ">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control" id="name" value="<?= $user['name']; ?> ">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tanggal lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control" id="tanggal lahir" value="<?= $user['birth']; ?> ">
                      </div>
                    </div>
                  </form>
                      
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <form>
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="name" value="<?= $user['name']; ?> ">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tanggal lahir" class="col-sm-2 col-form-label">Tanggal/Lahir</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="tanggal lahir" value="<?= $user['birth']; ?> ">
                      </div>
                    </div>
                  </form>
                </div>

            </div>
          </div>
          
  </div>
       
</div>
                