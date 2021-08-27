<?= $this->extend('layout/v_index'); ?>
<?= $this->section('content'); ?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- alert dengan sweetalert -->
        <div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#formtambah"><span class="far fa-plus-square"></span> Tambah Data</button>
            <table id="example1" class="table table-bordered table-striped table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Id Proyek</th>
                  <th>Nama Proyek</th>
                  <th>Diskripsi</th>
                  <th>Tipe Proyek</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $urut = 1;
                foreach ($data_proyek as $key) : ?>
                  <tr>
                    <td><?= $urut++; ?></td>
                    <td><?= $key['idproyek']; ?></td>
                    <td><?= $key['namaproyek']; ?></td>
                    <td><?= $key['deskripsi']; ?></td>
                    <td><?= $key['namatipeproyek']; ?></td>
                    <td>
                      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#formubah<?= $key['idproyek']; ?>"><span class="far fa-edit"></span> Ubah</button>
                      <a href="<?= site_url('proyek/delete/' . $key['idproyek']); ?>" id="btnHapus" class="btn btn-sm btn-danger"><span class="far fa-trash-alt"></span></a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
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
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

      <div class="modal-content">
        <form action="<?= base_url('proyek/add'); ?>" method="POST" class="needs-validation" novalidate>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <?= csrf_field() ?>
            <div class="form-group">
              <label for="namaproyek">Nama proyek</label>
              <input type="text" class="form-control form-control-sm" id="namaproyek" name="namaproyek" placeholder="Isi nama proyek..." required>
              <div class="invalid-feedback">
                Nama proyek harus diisi
              </div>
            </div>
            <div class="form-group">
              <label for="tahun">Tahun</label>
              <select name="tahun" id="tahun" class="form-control form-control-sm" required>
                <?php for ($i = date('Y'); $i < date('Y')+5; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
              </select>
              <div class="invalid-feedback">
                Tahun harus diisi
              </div>
            </div>
            <div class="form-group">
              <label for="idtipeproyek">Tipe Proyek</label>
              <select name="idtipeproyek" required class="form-control form-control-sm">
                <?php foreach ($data_tipeproyek as $value): ?>
                  <option value="<?= $value['idtipeproyek'] ?>"><?= $value['namatipeproyek'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control form-control-sm" id="deskripsi" name="deskripsi" placeholder="Isi deskrisi...">
            </div>
            <div class="row">
              <table class="table table-bordered detail">
                <tr class="text-center"><td colspan="8">Detail Proyek</td></tr>
                <tr>
                  <td>Modul</td>
                  <td width="10%">Sprint</td>
                  <td>PIC BA</td>
                  <td>PIC Dev</td>
                  <td>PIC QC</td>
                  <td>PIC User</td>
                  <td>Deskripsi</td>
                  <td>Aksi</td>
                </tr>
                <tr id="init_tambah">
                  <td>
                    <select name="idmodul[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                      <?php foreach ($data_modul as $modul): ?>
                        <option value="<?= $modul['idmodul'] ?>"><?= $modul['namamodul'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </td>
                  <td><input type="number" name="sprint[]" min="1" max="12" class="form-control form-control-sm"></td>
                  <td>
                    <select name="pic_ba[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                      <?php foreach ($data_user_ba as $user): ?>
                        <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </td>
                  <td>
                    <select name="pic_dev[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                      <?php foreach ($data_user_dev as $user): ?>
                        <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </td>
                  <td>
                    <select name="pic_qc[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                      <?php foreach ($data_user_qc as $user): ?>
                        <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </td>
                  <td>
                    <select name="pic_user[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                      <?php foreach ($data_user_user as $user): ?>
                        <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </td>
                  <td><input type="text" class="form-control form-control-sm" name="deskripsidet[]"></td>
                  <td><button type="button" class="btn btn-sm btn-primary tambah" data-id="tambah"><span class="far fa-plus-square"></span></button></td>
                </tr>
              </table>
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
  <!-- end Modal Tambah -->

  <!-- Modal Ubah -->
  <?php foreach ($data_proyek as $key) : ?>
    <div class="modal fade" id="formubah<?= $key['idproyek']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <form action="<?= base_url('proyek/edit/' . $key['idproyek']); ?>" method="POST" class="needs-validation" novalidate>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Data : Id (<?= $key['idproyek']; ?>)</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <?= csrf_field() ?>
              <div class="form-group">
                <label for="namaproyek">Nama proyek</label>
                <input type="text" class="form-control form-control-sm" id="namaproyek" name="namaproyek" value="<?= $key['namaproyek']; ?>" required placeholder="Isi nama produk...">
              </div>
              <div class="form-group">
              <label for="tahun">Tahun</label>
              <select name="tahun" id="tahun" class="form-control form-control-sm" required>
                <?php for ($i = date('Y'); $i < date('Y')+5; $i++): ?>
                    <option value="<?= $i ?>" <?= ($i == $key['tahun'] ? 'selected' : '') ?>><?= $i ?></option>
                <?php endfor; ?>
              </select>
              <div class="invalid-feedback">
                Tahun harus diisi
              </div>
            </div>
              <div class="form-group">
                <label for="idtipeproyek">Tipe Proyek</label>
                <select name="idtipeproyek" required class="form-control form-control-sm">
                  <?php foreach ($data_tipeproyek as $value): ?>
                    <option value="<?= $value['idtipeproyek'] ?>" <?= ($value['idtipeproyek'] == $key['idtipeproyek'] ? 'selected' : '') ?>><?= $value['namatipeproyek'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control form-control-sm" id="deskripsi" name="deskripsi" value="<?= $key['deskripsi']; ?>" placeholder="Isi deskrisi...">
              </div>
              <div class="row">
                <table class="table table-bordered detail">
                  <tr class="text-center"><td colspan="8">Detail Proyek</td></tr>
                  <tr>
                    <td>Modul</td>
                    <td width="10%">Sprint</td>
                    <td>PIC BA</td>
                    <td>PIC Dev</td>
                    <td>PIC QC</td>
                    <td>PIC User</td>
                    <td>Deskripsi</td>
                    <td>Aksi</td>
                  </tr>
                  <tr id="init_edit">
                    <td>
                      <select name="idmodul[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_modul as $modul): ?>
                          <option value="<?= $modul['idmodul'] ?>"><?= $modul['namamodul'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td><input type="number" name="sprint[]" min="1" max="12" class="form-control form-control-sm"></td>
                    <td>
                      <select name="pic_ba[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_user_ba as $user): ?>
                          <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td>
                      <select name="pic_dev[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_user_dev as $user): ?>
                          <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td>
                      <select name="pic_qc[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_user_qc as $user): ?>
                          <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td>
                      <select name="pic_user[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_user_user as $user): ?>
                          <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td><input type="text" class="form-control form-control-sm" name="deskripsidet[]"></td>
                    <td><button type="button" class="btn btn-sm btn-primary tambah"><span class="far fa-plus-square"></span></button></td>
                  </tr>
                  <?php foreach ($data_detailproyek as $detail): ?>
                  <?php if ($detail['idproyek'] == $key['idproyek']): ?>
                  <tr id="<?= md5($detail['idproyekdetail']) ?>">
                    <td>
                      <select name="idmodul[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_modul as $modul): ?>
                          <option value="<?= $modul['idmodul'] ?>" <?= ($detail['idmodul'] == $modul['idmodul'] ? 'selected' : '') ?>><?= $modul['namamodul'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td><input type="number" name="sprint[]" min="1" max="12" class="form-control form-control-sm" value="<?= $detail['sprint'] ?>"></td>
                    <td>
                      <select name="pic_ba[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_user_ba as $user): ?>
                          <option value="<?= $user['iduser'] ?>" <?= ($detail['pic_ba'] == $user['iduser'] ? 'selected' : '') ?>><?= $user['namauser'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td>
                      <select name="pic_dev[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_user_dev as $user): ?>
                          <option value="<?= $user['iduser'] ?>" <?= ($detail['pic_dev'] == $user['iduser'] ? 'selected' : '') ?>><?= $user['namauser'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td>
                      <select name="pic_qc[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_user_qc as $user): ?>
                          <option value="<?= $user['iduser'] ?>" <?= ($detail['pic_qc'] == $user['iduser'] ? 'selected' : '') ?>><?= $user['namauser'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td>
                      <select name="pic_user[]" class="form-control form-control-sm">
                        <option value="">- Pilih -</option>
                        <?php foreach ($data_user_user as $user): ?>
                          <option value="<?= $user['iduser'] ?>" <?= ($detail['pic_user'] == $user['iduser'] ? 'selected' : '') ?>><?= $user['namauser'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td><input type="text" class="form-control form-control-sm" name="deskripsidet[]" value="<?= $detail['deskripsi'] ?>"></td>
                    <td><button type="button" class="btn btn-sm btn-primary tambah" data-id="edit"><span class="far fa-plus-square"></span></button></td>
                  </tr>
                  <?php endif ?>
                  <?php endforeach ?>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end Modal Ubah -->
  <?php endforeach ?>

  <script type="text/javascript">
    $(function() {
      $('.tambah').on('click', function(){
        var mode = $(this).data('id');
        // console.log(mode);
        var uniq = makeid();
        var html = '\
                <tr id="' + uniq +'">\
                  <td>\
                    <select name="idmodul[]" class="form-control form-control-sm">\
                      <option value="">- Pilih -</option>\
                      <?php foreach ($data_modul as $modul): ?>
                        <option value="<?= $modul['idmodul'] ?>"><?= $modul['namamodul'] ?></option>\
                      <?php endforeach ?>
                    </select>\
                  </td>\
                  <td><input type="number" name="sprint[]" min="1" max="12" class="form-control form-control-sm"></td>\
                  <td>\
                    <select name="pic_ba[]" class="form-control form-control-sm">\
                        <option value="">- Pilih -</option>\
                      <?php foreach ($data_user_ba as $user): ?>
                        <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>\
                      <?php endforeach ?>
                    </select>\
                  </td>\
                  <td>\
                    <select name="pic_dev[]" class="form-control form-control-sm">\
                        <option value="">- Pilih -</option>\
                      <?php foreach ($data_user_dev as $user): ?>
                        <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>\
                      <?php endforeach ?>
                    </select>\
                  </td>\
                  <td>\
                    <select name="pic_qc[]" class="form-control form-control-sm">\
                        <option value="">- Pilih -</option>\
                      <?php foreach ($data_user_qc as $user): ?>\
                        <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>\
                      <?php endforeach ?>
                    </select>\
                  </td>\
                  <td>\
                    <select name="pic_user[]" class="form-control form-control-sm">\
                        <option value="">- Pilih -</option>\
                      <?php foreach ($data_user_user as $user): ?>
                        <option value="<?= $user['iduser'] ?>"><?= $user['namauser'] ?></option>\
                      <?php endforeach ?>
                    </select>\
                  </td>\
                  <td><input type="text" class="form-control form-control-sm" name="deskripsidet[]"></td>\
                  <td><button type="button" class="btn btn-sm btn-danger" onClick="hapus(\'' + uniq + '\')"><span class="far fa-trash-alt"></span></button></td>\
                </tr>';
        if (mode == 'tambah')
          $( html ).insertAfter( "#init_tambah" );
        else
          $( html ).insertAfter( "#init_edit" );
      })
    });

    function hapus(id) {
      $('#'+id).remove();
    }

    function makeid(length = 6) {
      var result           = '';
      var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      var charactersLength = characters.length;
      for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
      }
      return result;
    }
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
</section>
<?= $this->endSection(); ?>