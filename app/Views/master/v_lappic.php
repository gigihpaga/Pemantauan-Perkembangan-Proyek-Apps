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
            <form action="<?= base_url('lappic'); ?>" method="POST">
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
                      <label for="">PIC</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <input type="checkbox" <?= isset($post['ckiduser']) ? 'checked' : '' ?> name="ckiduser">
                          </span>
                        </div>
                        <select name="iduser" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                          <?php foreach ($data_user as $user): $arr_user[$user['iduser']] = $user['namauser']; ?>
                            <option value="<?= $user['iduser'] ?>" <?= (isset($post['iduser']) ? ($post['iduser'] == $user['iduser'] ? 'selected' : '') : '') ?>><?= $user['namauser'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Jabatan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <input type="checkbox" <?= isset($post['ckjabatan']) ? 'checked' : '' ?> name="ckjabatan">
                          </span>
                        </div>
                        <?php 
                          $arr_jabatan = array('ba' => 'Dokementasi','dev' => 'Development','qc' => 'Quality Control','user' =>'User Accepted');
                        ?>
                        <select name="jabatan" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <?php foreach ($arr_jabatan as $key => $value): ?>
                            <option value="<?= $key ?>" <?= (isset($post['jabatan']) ? ($post['jabatan'] == $key ? 'selected' : '') : '') ?>><?= $value ?></option>
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
            <table id="example2x" class="table table-bordered table-striped table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama PIC Proyek</th>
                  <th>Jabatan</th>
                  <th>Total Modul</th>
                  <th>User Accepted (%)</th>
                  <th>
                    <table width="100%">
                      <tr>
                        <td width="50%">Nama Proyek</td>
                        <td width="50%">
                          <table width="100%">
                            <tr>
                              <td width="50%">Sub Produk</td>
                              <td width="50%">User Accepted (%)</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $urut = 1;
                $arr_data = $jml_modul = $jml_useracc = $jml_useracc_modul = $jml_subproduk = array();
                foreach ($data_lappengembangan['data'] as $key) {
                  $arr_data[$key['iduser']]['namauser'] = $key['namauser'];
                  $arr_data[$key['iduser']]['jabatan'] = $key['jabatan'];
                  $arr_data[$key['iduser']]['namaproyek'][$key['idproyek']] = $key['namaproyek'];
                  $arr_data[$key['iduser']]['submodul'][$key['idproyek']][$key['idsubproduk']] = $key['namasubproduk'];
                } 

                foreach ($data_lappengembangan['jmlmodul'] as $val) {
                  $jml_modul[$val['iduser']] = $val['jml'];
                } 

                foreach ($data_lappengembangan['jmluseracc'] as $val) {
                  $jml_useracc[$val['iduser']] = $val['jml'];
                } 

                foreach ($data_lappengembangan['jmluseraccmodul'] as $val) {
                  $jml_useracc_modul[$val['iduser']][$val['idsubproduk']] = $val['jml'];
                } 

                foreach ($data_lappengembangan['jmlsubproduk'] as $val) {
                  $jml_subproduk[$val['iduser']][$val['idsubproduk']] = $val['jml'];
                } 

                ?>
                <?php foreach ($arr_data as $key => $value): ?>
                  <tr>
                    <td><?= $urut ?></td>
                    <td><?= $arr_data[$key]['namauser'] ?></td>
                    <td><?= $arr_data[$key]['jabatan'] ?></td>
                    <td><?= $jml_modul[$key] ?></td>
                    <td><span class="btn btn-xs btn-success"><?= (isset($jml_useracc[$key]) ? round($jml_useracc[$key] / $jml_modul[$key] * 100) : 0) ?>%</span></td>
                    <td>
                      <table width="100%">
                        <?php foreach ($arr_data[$key]['namaproyek'] as $idproyek => $namaproyek): ?>
                        <tr>
                          <td width="50%"><?= ($namaproyek ? $namaproyek : '-') ?></td>
                          <td width="50%">
                            <table width="100%">
                              <?php foreach ($arr_data[$key]['submodul'][$idproyek] as $idsubproduk => $namasubproduk): ?>
                              <?php $j_modul = (isset($jml_subproduk[$key][$idsubproduk]) ? $jml_subproduk[$key][$idsubproduk] : 0)  ?>
                              <tr>
                                <td width="50%"><?= ($namasubproduk ? $namasubproduk : '-') ?></td>
                                <!-- <td width="50%">??</td> -->
                                <td width="50%"><span class="btn btn-xs btn-success"><?= (isset($jml_useracc_modul[$key][$idsubproduk]) ? round($jml_useracc_modul[$key][$idsubproduk] / $j_modul * 100) : 0) ?>%</span></td>
                              </tr>
                              <?php endforeach ?>
                            </table>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </table>
                    </td>
                <?php $urut++; endforeach ?>
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