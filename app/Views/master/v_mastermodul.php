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
                  <th>ID Modul</th>
                  <th>Nama Modul</th>
                  <th>Tipe Modul</th>
                  <th>Deskripsi</th>
                  <th>Status</th>
                  <th>ID Sub</th>
                  <th>Nama Sub Produk</th>
                  <th>ID Produk</th>
                  <th>Nama Produk</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- use App\Controllers\Masteritproduk; -->
                <?php $urut = 1;
                foreach ($data_mastermodul as $d_modul) : ?>
                  <tr>
                    <td><?= $urut++; ?></td>
                    <td><?= $d_modul['idmodul']; ?></td>
                    <td><?= $d_modul['namamodul']; ?></td>
                    <td><?= $d_modul['kodetipemodul']; ?></td>
                    <td><?= $d_modul['deskripsi']; ?></td>
                    <td><?= $d_modul['status']; ?></td>
                    <td><?= $d_modul['idsubproduk']; ?></td>
                    <td><?= $d_modul['namasubproduk']; ?></td>
                    <td><?= $d_modul['idproduk']; ?></td>
                    <td><?= $d_modul['namaproduk']; ?></td>
                    <td>
                      <button class="btn btn-sm btn-primary ubah" data-id-subproduk="<?= $d_modul['idsubproduk'] ?>" data-toggle="modal" data-target="#formubah<?= $d_modul['idmodul']; ?>"><span class="far fa-edit"></span> Ubah</button>
                      <a href="<?= site_url('mastermodul/delete/' . $d_modul['idmodul']); ?>" id="btnHapus" class="btn btn-sm btn-danger"><span class="far fa-trash-alt"></span></a>
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
        <form action="<?= base_url('mastermodul/add'); ?>" method="POST" class="needs-validation" novalidate>
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
              <select class="form-control form-control-sm input-group-sm form-group-sm custom-select custom-select-sm input-sm select2-single js-example-basic-single js-states form-control select2bs4" id="idcbproduk" name="cbProduk" required style="width: 100%;">
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

            <div class="form-group ">
              <label>Sub Produk</label>
              <select class="form-control form-control-sm input-group-sm form-group-sm custom-select custom-select-sm input-sm select2-single js-example-basic-single js-states form-control select2bs4" id="idcbsubproduk" name="cbSubproduk" required style="width: 100%;">
                <option value="">--pilih data--</option>
              </select>
              <div class="invalid-feedback">
                Sub produk harus dipilih
              </div>
            </div>

            <div class="form-group">
              <label for="namamodul">Nama Modul</label>
              <input type="text" class="form-control form-control-sm" id="namamodul" required name="txtNamamodul" placeholder="Isi nama modul...">
              <div class="invalid-feedback">
                Nama modul harus diisi
              </div>
            </div>

            <div class="form-group ">
              <label>Tipe Modul</label>
              <select class="form-control select2bs4" id="idtipemodul" name="cbTipemodul" required style="width: 100%;">
                <option value="">--pilih data--</option>
                <?php
                foreach ($data_tipemodul as $datacbtipe) : ?>
                  <option value="<?= $datacbtipe['idtipemodul'] ?>"><?= $datacbtipe['kodetipemodul'] ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group ">
              <label>Status</label>
              <select class="form-control select2bs4" id="idstatus" name="cbStatus" required style="width: 100%;">
                <option value="" selected>--pilih data--</option>
                <option value="0">Nothing</option>
                <option value="1">Done</option>
              </select>
            </div>

            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control form-control-sm" id="deskripsi" name="txtDeskripsi" placeholder="Isi deskrisi...">
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
  <?php foreach ($data_mastermodul as $d_modul) : ?>
    <div class="modal fade" id="formubah<?= $d_modul['idmodul']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <form action="<?= base_url('mastermodul/edit/' . $d_modul['idmodul']); ?>" method="POST" class="needs-validation" novalidate>

            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Data : Id (<?= $d_modul['idmodul']; ?>)</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?= form_open('mastermodul/edit/' . $d_modul['idmodul']) ?>
              <?= csrf_field() ?>

              <!-- disini combobox nya -->
              <div class="form-group ">
                <label>Produk</label>
                <select class="form-control form-control-sm input-group-sm classcbproduk" name="cbProduk" required style="width: 100%;">
                  <option value="">--pilih data--</option>
                  <?php
                  foreach ($data_masterproduk as $datacbproduk) : ?>
                    <option value="<?= $datacbproduk['idproduk'] ?>" <?= $datacbproduk['idproduk'] == $d_modul['idproduk'] ? "selected" : null ?>><?= $datacbproduk['namaproduk'] ?></option>
                  <?php endforeach ?>
                </select>
                <div class="invalid-feedback">
                  Produk harus dipilih
                </div>
              </div>

              <div class="form-group ">
                <label>Sub Produk</label>
                <select class="form-control form-control-sm classcbsubproduk" name="cbSubproduk" required style="width: 100%;">
                  <option value="">--pilih data--</option>
                  <!-- <?php foreach ($data_mastersubproduk as $datacbsubproduk) : ?>
                    <option value="<?= $datacbsubproduk['idsubproduk'] ?>" <?= $datacbsubproduk['idsubproduk'] == $d_modul['idsubproduk'] ? "selected" : null ?>><?= $datacbsubproduk['namasubproduk'] ?></option>
                  <?php endforeach ?> -->
                </select>
                <div class="invalid-feedback">
                  Sub Produk harus dipilih
                </div>
              </div>

              <div class="form-group">
                <label for="namamodul">Nama Modul</label>
                <input type="text" class="form-control form-control-sm" id="namamodul" name="txtNamamodul" value="<?= $d_modul['namamodul']; ?>" required placeholder="Isi nama modul...">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control form-control-sm" id="deskripsi" name="txtDeskripsi" value="<?= $d_modul['deskripsi']; ?>" placeholder="Isi deskrisi...">
              </div>

              <div class="form-group ">
                <label>Tipe Modul</label>
                <select class="form-control select2bs4" id="idtipemodul" name="cbTipemodul" required style="width: 100%;">
                  <option value="">--pilih data--</option>
                  <?php
                  foreach ($data_tipemodul as $datacbtipe) : ?>
                    <option value="<?= $datacbtipe['idtipemodul'] ?>" <?= $datacbtipe['idtipemodul'] == $d_modul['idtipemodul'] ? "selected" : null ?>><?= $datacbtipe['kodetipemodul'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group ">
                <label>Status</label>
                <select class="form-control select2bs4" id="idstatus" name="cbStatus" required style="width: 100%;">
                  <option value="" selected>--pilih data--</option>
                  <option value="0" <?= $d_modul['status'] == 0 ? "selected" : null ?>>Nothing</option>
                  <option value="1" <?= $d_modul['status'] == 1 ? "selected" : null ?>>Done</option>
                </select>
              </div>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary classbtnsimpan">Simpan</button>
            </div>

            <?= form_close(); ?>
          </form>
        </div>
      </div>
    </div>
    <!-- end Modal Ubah -->

    <script>
      $('.ubah').on('click',function(){
        var idsubproduk = $(this).data("id-subproduk");
        console.log(idsubproduk);
        // $(".classcbproduk").trigger('change');
        var idproduk = $(".classcbproduk").val();
        try {
          $.ajax({
            type: "POST",
            url: "<?= base_url('mastermodul/getDatasubproduk') ?>",
            data: {
              paramidproduk: idproduk
            },
            dataType: "json",
            success: function(response) {
              $('.classcbsubproduk').html(response);

              $(".classcbsubproduk").val(idsubproduk).change();
            },
            error: function(xhr, ajaxOptions, thrownError) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });

        } catch (e) {
          alert("You messed something up!");
        }
        console.log(idproduk);
      })
    </script>
  <?php endforeach ?>
</section>
<?= $this->endSection(); ?>