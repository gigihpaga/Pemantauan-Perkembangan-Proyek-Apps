<?= $this->extend('layout/v_index'); ?>
<?= $this->section('content'); ?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- alert dengan sweetalert -->
        <div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>
        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div> -->
          <!-- /.card-header -->
          <div class="card-body">
            <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#formtambah"><span class="far fa-plus-square"></span> Tambah Data</button>
            <!-- <button id="btncoba" type="button" class="btn btn-sm btn-success swalDefaultSuccess">Button Coba</button> -->
            <table id="example1" class="table table-bordered table-striped table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Id Produk</th>
                  <th>Nama Produk IT</th>
                  <th>Diskripsi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- use App\Controllers\Masteritproduk; -->
                <?php $urut = 1;
                foreach ($data_masteritproduk as $key) : ?>
                  <tr>
                    <td><?= $urut++; ?></td>
                    <td><?= $key['idproduk']; ?></td>
                    <td><?= $key['namaproduk']; ?></td>
                    <td><?= $key['deskripsi']; ?></td>
                    <td>
                      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#formubah<?= $key['idproduk']; ?>"><span class="far fa-edit"></span> Ubah</button>
                      <!-- <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#formhapus<?= $key['idproduk']; ?>"><span class="far fa-trash-alt"></span>Hapus</button> -->
                      <a href="<?= site_url('masterproduk/delete/' . $key['idproduk']); ?>" id="btnHapus" class="btn btn-sm btn-danger"><span class="far fa-trash-alt"></span></a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>

              </tfoot>
            </table>
            <!-- <div class="card-footer">
              </div> -->

            <!-- ini tombol hapus dibawah tabel -->
            <!-- <div class="row mt-3">
              <div class="col-12">
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                <label for="" class="float-right">Data Terpilih : -</label>
              </div>
            </div> -->

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

  <!-- Modal Tambah -->
  <div class="modal fade" id="formtambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

      <div class="modal-content">
        <form action="<?= base_url('masterproduk/add'); ?>" method="POST" class="needs-validation" novalidate>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <?= csrf_field() ?>
            <div class="form-group">
              <label for="namaproduk">Nama produk</label>
              <input type="text" class="form-control form-control-sm" id="namaproduk" required name="txtNamaproduk" placeholder="Isi nama produk...">
              <div class="invalid-feedback">
                Nama produk harus diisi
              </div>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control form-control-sm" id="deskripsi" name="txtDeskripsi" placeholder="Isi deskrisi...">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    // java script untuk validasi form
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

  <!-- end Modal Tambah -->

  <!-- Modal Ubah -->
  <?php foreach ($data_masteritproduk as $key) : ?>
    <div class="modal fade" id="formubah<?= $key['idproduk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <form action="<?= base_url('masterproduk/edit/' . $key['idproduk']); ?>" method="POST" class="needs-validation" novalidate>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Data : Id (<?= $key['idproduk']; ?>)</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <!-- <?= form_open('masterproduk/edit/' . $key['idproduk']) ?> -->
              <?= csrf_field() ?>
              <div class="form-group">
                <label for="namaproduk">Nama produk</label>
                <input type="text" class="form-control form-control-sm" id="namaproduk" name="txtNamaproduk" value="<?= $key['namaproduk']; ?>" required placeholder="Isi nama produk...">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control form-control-sm" id="deskripsi" name="txtDeskripsi" value="<?= $key['deskripsi']; ?>" placeholder="Isi deskrisi...">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

            <!-- <?= form_close(); ?> -->
          </form>
        </div>
      </div>
    </div>
    <!-- end Modal Ubah -->


  <?php endforeach ?>


</section>
<?= $this->endSection(); ?>