<?= $this->extend('layout/v_index'); ?>
<?= $this->section('content'); ?>

<div class="contaiter">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <!-- general form elements -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          <form action="<?= base_url('masteritproject/save'); ?>" method="POST">
            <!-- amankan form -->
            <?= csrf_field() ?>
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Proyek</label>
                <input type="text" class="form-control form-control-sm" id="idtxtNama" name="txtNama" autofocus>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Diskripsi</label>
                <input type="text" class="form-control form-control-sm" id="idtxtDiskripsi" name="txtDeskripsi">
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            </div>
          </form>
        </div>

        <!-- general form elements -->
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>