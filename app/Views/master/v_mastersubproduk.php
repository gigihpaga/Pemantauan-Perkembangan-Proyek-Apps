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
                  <th>ID Sub Produk</th>
                  <th>Nama Sub Produk</th>
                  <th>Deskripsi</th>
                  <th>ID Produk</th>
                  <th>Nama Produk</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- use App\Controllers\Masteritproduk; -->
                <?php $urut = 1;
                foreach ($data_mastersubproduk as $key) : ?>
                  <tr>
                    <td><?= $urut++; ?></td>
                    <!-- <td><span class="badge badge-pill badge-warning">kosong</span> </td> -->
                    <td><?= $key['idsubproduk']; ?></td>
                    <td><?= $key['namasubproduk']; ?></td>
                    <td><?= $key['deskripsisub']; ?></td>
                    <td><?= $key['idproduk']; ?></td>
                    <td><?= $key['namaproduk']; ?></td>
                    <td>
                      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#formubah<?= $key['idsubproduk']; ?>"><span class="far fa-edit"></span> Ubah</button>
                      <!-- <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#formhapus<?= $key['idsubproduk']; ?>"><span class="far fa-trash-alt"></span>Hapus</button> -->
                      <a href="<?= site_url('mastersubproduk/delete/' . $key['idsubproduk']); ?>" id="btnHapus" class="btn btn-sm btn-danger"><span class="far fa-trash-alt"></span></a>
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
        <form action="<?= base_url('mastersubproduk/add'); ?>" method="POST" class="needs-validation" novalidate>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= csrf_field() ?>
            <div class="form-group ">
              <label>Produk</label>
              <select class="form-control form-control-sm input-group-sm form-group-sm custom-select custom-select-sm input-sm select2-single js-example-basic-single js-states form-control select2bs4" name="cbProduk" required style="width: 100%;">
                <!-- <select class="selectpicker" data-live-search="true" required style="width: 100%;"> -->
                <!-- <option selected="selected">--Pilih Data--</option> -->
                <option value="">--pilih data--</option>
                <?php
                foreach ($data_masterproduk as $datacbproduk) : ?>
                  <option value="<?= $datacbproduk['idproduk'] ?>"><?= $datacbproduk['namaproduk'] ?></option>
                <?php endforeach ?>
              </select>
              <div class="invalid-feedback">
                Produk harus dipilih
              </div>
            </div>
            <!-- <div class="form-group ">
              <label>Produk 2</label>
              <?php echo form_dropdown('cbProduk2', $data_masterproduk2, $selectedproduk, ['class' => 'form-control select2bs4', 'required' => 'required']) ?>
              <div class="invalid-feedback">
                Produk harus dipilih
              </div>
            </div> -->
            <div class="form-group">
              <label for="namasubproduk">Nama Sub produk</label>
              <input type="text" class="form-control form-control-sm" id="namasubproduk" required name="txtNamasubproduk" placeholder="Isi nama produk...">
              <div class="invalid-feedback">
                Nama produk harus diisi
              </div>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control form-control-sm" id="" name="txtDeskripsi" placeholder="Isi deskrisi...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
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
  <?php foreach ($data_mastersubproduk as $key) : ?>
    <div class="modal fade" id="formubah<?= $key['idsubproduk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <form action="<?= base_url('mastersubproduk/edit/' . $key['idsubproduk']); ?>" method="POST" class="needs-validation" novalidate>

            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Data : Id (<?= $key['idsubproduk']; ?>)</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <?= form_open('mastersubproduk/edit/' . $key['idsubproduk']) ?>
              <?= csrf_field() ?>
              <div class="form-group ">
                <label>Produk</label>
                <select class="form-control form-control-sm input-group-sm form-group-sm custom-select custom-select-sm input-sm select2-single js-example-basic-single js-states form-control select2bs4" name="cbProduk" required style="width: 100%;">
                  <!-- <select class="selectpicker" data-live-search="true" required style="width: 100%;"> -->
                  <!-- <option selected="selected">--Pilih Data--</option> -->
                  <option value="">--pilih data--</option>
                  <?php
                  foreach ($data_masterproduk as $datacbproduk) : ?>
                    <option value="<?= $datacbproduk['idproduk'] ?>" <?= $datacbproduk['idproduk'] == $key['idproduk'] ? "selected" : null ?>><?= $datacbproduk['namaproduk'] ?></option>
                  <?php endforeach ?>
                </select>
                <div class="invalid-feedback">
                  Produk harus dipilih
                </div>
              </div>
              <!-- <div class="form-group ">
              <label>Produk 2</label>
              <?php echo form_dropdown('cbProduk2', $data_masterproduk2, $selectedproduk, ['class' => 'form-control select2bs4', 'required' => 'required']) ?>
              <div class="invalid-feedback">
                Produk harus dipilih
              </div>
            </div> -->
              <div class="form-group">
                <label for="namasubproduk">Nama Sub produk</label>
                <input type="text" class="form-control form-control-sm" id="namasubproduk" name="txtNamasubproduk" value="<?= $key['namasubproduk']; ?>" required placeholder="Isi nama produk...">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control form-control-sm" id="" name="txtDeskripsi" value="<?= $key['deskripsisub']; ?>" placeholder="Isi deskrisi...">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

            <?= form_close(); ?>
          </form>
        </div>
      </div>
    </div>
    <!-- end Modal Ubah -->


  <?php endforeach ?>


</section>
<?= $this->endSection(); ?>