
<?php $total_barang = number_format($this->cart->total()); ?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" colspan="2">Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Banyak</th>
      <th scope="col">Sub-total</th>
    </tr>
  </thead>
  <tbody>
<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>
    <tr>

      <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
      <td><img src="<?= base_url('assets/upload/products/') . $items['image']; ?>" style="width: 80px;"></td>
      <td><?= $items['name']; ?>

                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                        <p>
                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                <?php endforeach; ?>
                        </p>

                <?php endif; ?>
        </td>
      <td>Rp<?= number_format($items['price']);?></td>
      <td><?= $items['qty']; ?></td>
        
      <td>Rp <?= number_format($items['subtotal']); ?></td>
      
      <td>
        <a href="#" class="text-decoration-none" data-toggle="modal" data-target="#edit_cart">
             <i class="fas fa-edit fa-lg"></i>   
        </a>
          
         | 
        <a class="pl-2 text-danger" href="<?= base_url('home/removeCart/') . $items['rowid']; ?>">
                <i class="fas fa-trash-alt fa-lg"></i>
        </a> 
        
      </td>
      
    </tr>
    <?php $i++; ?>

<?php endforeach; ?>

    <tr class="table-active">
        <td colspan="2"> </td>
        <td colspan="2" class="right text-right"><strong>Total Barang :</strong></td>
        <td class="right">Rp <?= $total_barang; ?></td>
        <td></td>
    </tr>
    <tr class="table-light">
        <td colspan="2"> </td>
        <td colspan="2" class="right text-right"><strong>Ongkos Kirim :</strong></td>
        <td class="right">Rp <?= '1,000'; ?></td>
        <td></td>
    </tr>
    <tr class="table-active">
        <td colspan="2"> </td>
        <td colspan="2" class="right text-right"><strong>Total Barang :</strong></td>
        <td class="right"><h4><strong>Rp <?php 
        $ongkir = 1000;
        $total = $ongkir + $this->cart->total(); 
        echo number_format($total)
        ?></strong></h4></td>
        <td></td>
    </tr>
  </tbody>
</table>

<div class="modal fade" id="edit_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
            <div class="modal-header">
              <h5 class="modal-title text-uppercase font-weight-bold">masukkan jumlah barang
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <p class="justify-content-left text-capitalize">
            
            </p>

            <form action="<?= base_url('home/updateCart') ?>" method="post">
                <input type="hidden" name="rowid" value="<?= $items['rowid']; ?>">
                <input type="number" name="qty" value="<?= $items['qty']; ?>">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah Jumlah Produk</button>
            </div>
            </form>
      
    </div>
  </div>
</div>