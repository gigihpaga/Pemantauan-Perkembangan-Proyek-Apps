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
            <form action="<?= base_url('lappengembangan'); ?>" method="POST">
              <div class="row">
                  <div class="col-lg-6">
                    <?= csrf_field() ?>
                    <div class="form-group">
                      <label for="namaproyek">Nama proyek</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <input type="checkbox" <?= isset($post['ckidproyek']) ? 'checked' : '' ?> name="ckidproyek">
                          </span>
                        </div>
                        <select name="idproyek" id="idproyek" class="form-control">
                          <option value="">- Semua -</option>
                          <?php foreach ($data_proyek as $data) : ?>
                            <option value="<?= $data['idproyek'] ?>" <?= (isset($post['idproyek']) ? ($post['idproyek'] == $data['idproyek'] ? 'selected' : '') : '') ?>><?= $data['namaproyek'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tahun">Tahun Proyek</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <input type="checkbox" <?= isset($post['cktahun']) ? 'checked' : '' ?> name="cktahun">
                          </span>
                        </div>
                        <select name="tahun" id="tahun" class="form-control form-control-sm">
                          <?php for ($i = date('Y'); $i < date('Y')+5; $i++): ?>
                              <option value="<?= $i ?>" <?= isset($post['tahun']) ? ($post['tahun'] == $i ? 'selected' : '') : '' ?>><?= $i ?></option>
                          <?php endfor; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="idtipeproyek">Tipe Proyek</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <input type="checkbox" <?= isset($post['ckidtipeproyek']) ? 'checked' : '' ?> name="ckidtipeproyek">
                          </span>
                        </div>
                        <select name="idtipeproyek" class="form-control form-control-sm">
                          <option value="">- Pilih -</option>
                          <?php foreach ($data_tipeproyek as $value): ?>
                            <option value="<?= $value['idtipeproyek'] ?>" <?= isset($post['idtipeproyek']) ? ($post['idtipeproyek'] == $value['idtipeproyek'] ? 'selected' : '') : '' ?>><?= $value['namatipeproyek'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label>Sub Produk</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <input type="checkbox" <?= isset($post['ckidsubproduk']) ? 'checked' : '' ?> name="ckidsubproduk">
                          </span>
                        </div>
                        <select class="form-control form-control-sm js-example-basic-single js-states" id="idcbsubproduk" name="idsubproduk">
                          <option value="">- Pilih -</option>
                          <?php
                          foreach ($data_mastersubproduk as $datacbsubproduk) : ?>
                            <option value="<?= $datacbsubproduk['idsubproduk'] ?>" <?= isset($post['idsubproduk']) ? ($post['idsubproduk'] == $datacbsubproduk['idsubproduk'] ? 'selected' : '') : '' ?>><?= $datacbsubproduk['namasubproduk'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success">Cari</button>
                  </div>
              </div>
            </form><br>
            <table id="example2" class="table table-bordered table-striped table-sm">
              <thead>
                <tr>
                  <th>ID Proyek</th>
                  <th>Nama Proyek</th>
                  <th>Tipe Proyek</th>
                  <th>Deskripsi</th>
                  <th>Jumlah Modul</th>
                  <th>QC Accept (%)</th>
                  <th>User Accept (%)</th>
                  <th>Sub Produk</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $urut = 1;
                $arr_data = $qc_acc = $user_acc = array();

                foreach ($data_lappengembangan['qc_acc'] as $val) {
                  $qc_acc[$val['idproyek']] = $val['jml'];
                }
                foreach ($data_lappengembangan['user_acc'] as $val) {
                  $user_acc[$val['idproyek']] = $val['jml'];
                }
                foreach ($data_lappengembangan['data'] as $key) {
                  $arr_data[$key['idproyek']]['namatipeproyek'] = $key['namatipeproyek'];
                  $arr_data[$key['idproyek']]['deskripsi'] = $key['deskripsi'];
                  $arr_data[$key['idproyek']]['namaproyek'] = $key['namaproyek'];
                  $arr_data[$key['idproyek']]['namasubproduk'][] = $key['namasubproduk'];
                }
                // var_dump($qc_acc);
                ?>
                <?php foreach ($arr_data as $key => $value): ?>
                  <tr>
                    <td><?= $key ?></td>
                    <td><?= $arr_data[$key]['namaproyek'] ?></td>
                    <td><?= $arr_data[$key]['namatipeproyek'] ?></td>
                    <td><?= $arr_data[$key]['deskripsi'] ?></td>
                    <td><?= count($arr_data[$key]['namasubproduk']) ?></td>
                    <td><span class="btn btn-xs btn-success"><?= (!empty($qc_acc[$key]) ? round($qc_acc[$key] / count($arr_data[$key]['namasubproduk']) * 100 ): 0) ?>%</span></td>
                    <td><span class="btn btn-xs btn-success"><?= (!empty($user_acc[$key]) ? round($user_acc[$key] / count($arr_data[$key]['namasubproduk']) * 100 ): 0) ?>%</span></td>
                    <td>
                      <table class="table">
                        <?php foreach ($arr_data[$key]['namasubproduk'] as $namasubproduk): ?>
                        <tr><td><?= $namasubproduk ?></td></tr>
                        <?php endforeach ?>
                      </table>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>

              </tfoot>
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
</section>
<?= $this->endSection(); ?>