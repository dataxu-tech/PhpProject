<body id="page-top"> 
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class= 'row'>
    	<div class= "col-lg">
        <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">          
          <?= validation_errors(); ?>
        </div>
        <?php endif; ?>
    		<?= $this->session->flashdata('message'); ?>

			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#SubMenuModal">Tambah Submenu</a>
	        <table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">NO</th>
			      <th scope="col">menu</th>
			      <th scope="col">title</th>
            <th scope="col">url</th>
            <th scope="col">icon</th>
            <th scope="col">is_active</th>
            <th scope="col">Action</th>			     
			    </tr>
			  </thead>
			  <tbody>
			  <?php $i=1; ?>
			  <?php foreach ($subMenu as $sm) : ?>
			    <tr>
			      <th scope="row"><?= $i; ?></th>
			      <td><?= $sm['menu']; ?></td>
            <td><?= $sm['title']; ?></td>
            <td><?= $sm['url']; ?></td>
            <td><?= $sm['icon']; ?></td>
            <td><?= $sm['is_active']; ?></td>
			      <td>
			      	<a href="<?= base_url('adminSubMenu/update/') ?><?= $sm['id']; ?>" class="btn btn-outline-success btn-sm" >edit</a> | 
					<a href="<?= base_url('adminSubMenu/delete/') ?><?= $sm['id']; ?>" class="btn btn-outline-danger btn-sm">delete</a>
			      </td>			      
			    </tr>
			    <?php $i++; ?>
			   <?php endforeach; ?>			    
			  </tbody>
			</table>
		</div>
	</div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- Akhir konten utama -->

          
<!-- Modal tambah sub menu -->
<div class="modal fade" id="SubMenuModal" tabindex="-1" role="dialog" aria-labelledby="SubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SubMenuModalLabel">Tambah Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('adminSubMenu/index') ?>" method="post">
      <div class="modal-body">      	
        <div class="form-group">
          <select name="menu_id" id="menu_id" class="form-control">
            <option value="">Pilih menu</option>
            <?php foreach ($menu as $m) : ?>
            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
          <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="title" name="title" placeholder="title">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="url" name="url" placeholder="url">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="icon" name="icon" placeholder="icon">
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
            <label class="form-check-label" for="is_active">
              apakah aktif?
            </label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- akhir modal tambah sub menu -->

