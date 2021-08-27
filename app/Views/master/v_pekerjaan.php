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
                  <th>Id Proyek Detail</th>
                  <th>Nama Proyek</th>
                  <th>Nama Modul</th>
                  <th>Diskripsi</th>
                  <th>Tahapan Saat ini</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $urut = 1;
                foreach ($data_pekerjaan as $key) : 
                  $button = $aksi = $namaAksi = "";
                  switch (session()->get('role')) {
                      case 'ba':
                        if (is_null($key['aksi']) OR in_array($key['aksi'], array('qcfailed','userreject'))) {
                          $aksi = 'docprogres';
                          $namaAksi = 'Progress';
                        } elseif ($key['aksi'] == 'docprogres') {
                          $aksi = 'docdone';
                          $namaAksi = 'Done';
                        }
                        break;
                      case 'dev':
                        if (in_array($key['aksi'], array('docdone'))) {
                          $aksi = 'devprogres';
                          $namaAksi = 'Progress';
                        } elseif ($key['aksi'] == 'devprogres') {
                          $aksi = 'devdone';
                          $namaAksi = 'Done';
                        }
                        break;
                      case 'qc':
                        if (in_array($key['aksi'], array('devdone'))) {
                          $aksi = 'qcprogres';
                          $namaAksi = 'Progress';
                        } elseif ($key['aksi'] == 'qcprogres') {
                          $aksi = 'qcfailed';
                          $namaAksi = 'Tidak Setuju';
                          $button .= '<a href="' . site_url('pekerjaan/progress/' . $key['idproyekdetail']) . '/' . $aksi .'" class="btn btn-sm btn-danger btnProgress">' . $namaAksi . '</a>&nbsp;';
                          $aksi = 'qcaccept';
                          $namaAksi = 'Setuju';
                        }
                        break;
                      case 'user':
                      default:
                        if (in_array($key['aksi'], array('qcaccept'))) {
                          $aksi = 'userreject';
                          $namaAksi = 'Tidak Setuju';
                          $button .= '<a href="' . site_url('pekerjaan/progress/' . $key['idproyekdetail']) . '/' . $aksi .'" class="btn btn-sm btn-danger btnProgress">' . $namaAksi . '</a>&nbsp;';
                          $aksi = 'useraccept';
                          $namaAksi = 'Setuju';
                        }
                        break;
                  }
                  if ($aksi) {
                    $button .= '<a href="' . site_url('pekerjaan/progress/' . $key['idproyekdetail']) . '/' . $aksi .'" class="btn btn-sm btn-success btnProgress">' . $namaAksi . '</a>';
                  }
                ?>
                  <tr>
                    <td><?= $urut++; ?></td>
                    <td><?= $key['idproyekdetail']; ?></td>
                    <td><?= $key['namaproyek']; ?></td>
                    <td><?= $key['namamodul']; ?></td>
                    <td><?= $key['deskripsi']; ?></td>
                    <td><span class="badge bg-warning"><?= getAksi($key['aksi']); ?></span></td>
                    <td> <?= $button ?></td>
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