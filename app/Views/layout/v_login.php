<?php if (session()->getFlashdata('pesan_login')) : ?>
<div class="swal" data-swal="<?= session()->getFlashdata('pesan_login'); ?>"></div>
<?php endif; ?>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Pengembangan</b> Proyek</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url('login/cek_login'); ?>" method="POST">
        <!-- amankan form -->
        <?= csrf_field() ?>
        <div class="input-group mb-3">
          <input type="text" autocomplete="off" name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>