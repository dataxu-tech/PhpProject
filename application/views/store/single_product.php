
<div class="row mt-2">
    <div class="col-md-12 col-lg-6">
        <div class="d-flex justify-content-center">
        <img class="w-75" src="<?= base_url('assets/upload/products/') . $singleProduct['image']; ?>">
        </div>
    </div>
    <div class="col-md-12 col-lg-4 ml-3 mt-4">
        <div class="d-flex justify-content-center text-uppercase font-weight-bolder text-primary">
        <h2><?= $singleProduct['name']; ?></h2>
        </div>

        <hr id="detile-product">
        <?php if ($user) : ?>
        <div class="d-flex justify-content-left text-capitalize">
        <h4><?= 'Harga : ' . 'Rp' . $singleProduct['old_price']; ?></h4>
        </div>
        <?php else : ?>
        <div class="d-flex justify-content-left text-capitalize">
        <h4><?= 'Harga : ' . 'Rp' . $singleProduct['price']; ?></h4>
        </div>
        <?php endif; ?>
        <div class="d-flex justify-content-left text-capitalize">
        <h4><?= 'kategori : ' . $singleProduct['category']; ?></h4>
        </div>
        <div class="d-flex justify-content-left text-capitalize">
        <h4><?= 'deskripsi : ' . $singleProduct['description']; ?></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-6">
        
    </div>
</div>