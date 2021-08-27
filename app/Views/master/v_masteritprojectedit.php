<?= $this->extend('layout/v_index'); ?>
<?= $this->section('content'); ?>

<div class="contaiter">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('masteritproject/update/' . $data_masteritproyek['idproyek']); ?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="txtSlug" value="<?= $data_masteritproyek['slug']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Proyek</label>
                                <input type="text" class="form-control form-control-sm" id="" name="txtNama" placeholder="" value="<?= $data_masteritproyek['namaproyek']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Diskripsi</label>
                                <input type="text" class="form-control form-control-sm" id="" name="txtDeskripsi" placeholder="" value="<?= $data_masteritproyek['deskripsi']; ?>">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-info">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- general form elements -->
            </div>
        </div>

    </div>


    <?= $this->endSection(); ?>