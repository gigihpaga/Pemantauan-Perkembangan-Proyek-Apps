<?= $this->extend('layout/v_index'); ?>
<?= $this->section('content'); ?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php endif; ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="<?= site_url('masteritproject/add'); ?>" class="btn btn-sm btn-success mb-2">Tambah Data</a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Nama Proyek IT</th>
                  <th>Diskripsi(s)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- use App\Controllers\Masteritproject; -->
                <?php foreach ($data_masteritproyek as $d) : ?>
                  <tr>
                    <td><?= $d['idproyek']; ?></td>
                    <td><?= $d['namaproyek']; ?></td>
                    <td><?= $d['deskripsi']; ?></td>
                    <td>
                      <a href="<?= site_url('masteritproject/edit/' . $d['slug']); ?>" class="btn btn-sm btn-primary">Edit</a>
                      <form action="<?= base_url('masteritproject/delete/' . $d['idproyek']); ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?');">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>

              </tfoot>
            </table>
            <!-- <div class="card-footer">
                
              </div> -->

            <div class="row mt-3">
              <div class="col-12">

                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>


                <label for="" class="float-right">Data Terpilih : -</label>

              </div>
            </div>



          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->




  </div>
  <!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>