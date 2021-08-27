<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengembangan Proyek | IT</title>
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/select2/css/select2.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.css"> -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/toastr/toastr.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/sweetalert2/sweetalert2.all.min.js"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
</head>


<?php if (session()->get('username')) : ?>

  <body class="hold-transition sidebar-mini text-sm">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url(); ?>/template/index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('login/logout'); ?>" role="button">
              <i class="fas fa-sign-in-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar elevation-4 sidebar-dark-lightblue ">
        <!-- Brand Logo -->
        <a href="<?= base_url(); ?>/template/index3.html" class="brand-link">
          <!-- <img src="<?= base_url(); ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
          <img src="<?= base_url(); ?>/template/dist/img/logo-mpm.png" class="brand-image elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Proyek Apps</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <!-- <img src="<?= base_url(); ?>/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
              <img src="<?= base_url(); ?>/template/dist/img/double emposure 2.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="<?= base_url(); ?>" class="d-block"><?= session()->get('namauser') . " [" . session()->get('role') . "]" ?></a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav-child-indent nav-compact nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
              <?php
              // $uri = $this->request->uri->getSegment(1); //$this->uri->segment(1);
              // $uri = $this->uri->segment(1);
              // echo $uri;
              ?>
              <li class="nav-item">
                <a href="<?= base_url(); ?>" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon text-warning"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <?php if (session()->get('role') == 'administrator') : ?>
                <li class="nav-header">Master</li>
                <!-- menu-open -->
                <li class="nav-item <?= $untukmenu == 'masterproduk' || $untukmenu == 'mastersubproduk' || $untukmenu == 'mastermodul' ? 'menu-open' : ''; ?>">
                  <!-- active -->
                  <a href="#" class="nav-link <?= $untukmenu == 'masterproduk' || $untukmenu == 'mastersubproduk' || $untukmenu == 'mastermodul' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-project-diagram"></i>
                    <p>
                      Master
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('masterproduk'); ?>" class="nav-link <?= $untukmenu == 'masterproduk' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-copy text-indigo"></i>
                        <p>Master Product</p>
                      </a>
                    </li>
                  </ul>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('mastersubproduk'); ?>" class="nav-link <?= $untukmenu == 'mastersubproduk' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-book text-pink"></i>
                        <p>Master Sub Product</p>
                      </a>
                    </li>
                  </ul>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('mastermodul'); ?>" class="nav-link <?= $untukmenu == 'mastermodul' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-file text-teal"></i>
                        <p>Master Modul</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-header">Proyek</li>
                <li class="nav-item <?= $untukmenu == 'proyek' || $untukmenu == 'monitoring' ? 'menu-open' : ''; ?>">
                  <a href="#" class="nav-link <?= $untukmenu == 'proyek' || $untukmenu == 'monitoring' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                      Proyek
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('proyek') ?>" class="nav-link <?= $untukmenu == 'proyek' ? 'active' : ''; ?>">
                        <i class="fas  fa-cubes nav-icon text-success"></i>
                        <p>Kelola Proyek</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url(); ?>/template/forms/advanced.html" class="nav-link <?= $untukmenu == 'monitoring' ? 'active' : ''; ?>">
                        <i class="fas fa-desktop nav-icon text-info"></i>
                        <p>Monitoring Proyek</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-header">Laporan</li>
                <li class="nav-item <?= $untukmenu == 'lappengembangan' || $untukmenu == 'lappic' ? 'menu-open' : ''; ?>">
                  <a href="#" class="nav-link <?= $untukmenu == 'lappengembangan' || $untukmenu == 'lappic' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                      Laporan
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('lappengembangan') ?>" class="nav-link <?= $untukmenu == 'lappengembangan' ? 'active' : ''; ?>">
                        <i class="fas fa-chart-line nav-icon text-success"></i>
                        <p>Pengembangan Proyek</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('lappic'); ?>" class="nav-link <?= $untukmenu == 'lappic' ? 'active' : ''; ?>">
                        <i class="fas fa-user-check nav-icon text-info"></i>
                        <p>PIC Proyek</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php endif ?>

              <?php if (in_array(session()->get('role'), array('ba', 'dev', 'qc', 'user'))) : ?>
                <li class="nav-header">Pekerjaan</li>
                <li class="nav-item <?= $untukmenu == 'pekerjaan' ? 'menu-open' : ''; ?>">
                  <a href="#" class="nav-link <?= $untukmenu == 'pekerjaan' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                      Daftar Pekerjaan
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <?php if (session()->get('role') == 'ba') : ?>
                      <li class="nav-item">
                        <a href="<?= base_url('pekerjaan'); ?>" class="nav-link <?= $untukmenu == 'pekerjaan' ? 'active' : ''; ?>">
                          <i class="far fa-circle nav-icon text-success"></i>
                          <p>Dokumentasi</p>
                        </a>
                      </li>
                    <?php endif ?>
                    <?php if (session()->get('role') == 'dev') : ?>
                      <li class="nav-item">
                        <a href="<?= base_url('pekerjaan'); ?>" class="nav-link <?= $untukmenu == 'pekerjaan' ? 'active' : ''; ?>">
                          <i class="far fa-circle nav-icon text-warning"></i>
                          <p>Development</p>
                        </a>
                      </li>
                    <?php endif ?>
                    <?php if (session()->get('role') == 'qc') : ?>
                      <li class="nav-item">
                        <a href="<?= base_url('pekerjaan'); ?>" class="nav-link <?= $untukmenu == 'pekerjaan' ? 'active' : ''; ?>">
                          <i class="far fa-circle nav-icon text-info"></i>
                          <p>Quality Control</p>
                        </a>
                      </li>
                    <?php endif ?>
                    <?php if (session()->get('role') == 'user') : ?>
                      <li class="nav-item">
                        <a href="<?= base_url('pekerjaan'); ?>" class="nav-link <?= $untukmenu == 'pekerjaan' ? 'active' : ''; ?>">
                          <i class="far fa-circle nav-icon text-info"></i>
                          <p>User Accepted</p>
                        </a>
                      </li>
                    <?php endif ?>
                  </ul>
                </li>
              <?php endif ?>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?= $titlemenu; ?></h1>
              </div>
              <!-- <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div> -->
            </div>
          </div>
        </section>

        <!-- Main content ini isi konten-->
        <?php if (session()->getFlashdata('pesan_login')) : ?>
          <div class="swal" data-swal="<?= session()->getFlashdata('pesan_login'); ?>"></div>
        <?php endif; ?>
        <?= $this->renderSection('content'); ?>
        <!-- /.content -->

      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <!-- <b>Version</b> 3.1.0-rc -->
          <b>Version</b> 1.1
        </div>
        <!-- <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
        <strong>Copyright &copy; 2021 <a href="<?= base_url(); ?>">Proyek Apps</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
  <?php else : ?>

    <body class="hold-transition login-page">
      <?= view('layout/v_login'); ?>
    <?php endif; ?>
    <!-- ./wrapper -->

    <!-- ajax -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url(); ?>/template/plugins/select2/js/select2.full.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url(); ?>/template/plugins/chart.js/Chart.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url(); ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>/template/dist/js/demo.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url(); ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url(); ?>/template/plugins/toastr/toastr.min.js"></script>
    <!-- script paga -->
    <script src="<?= base_url(); ?>/template/scriptpaga.js"></script>
    <script src="<?= base_url(); ?>/public/jsku/scriptpaga2.js"></script>
    <!-- Page specific script 
    -->
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
          "buttons": ["pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
      });
    </script>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          // timer: 3000,
          timer: 2000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });
        $('.swalDefaultSuccess').click(function() {
          Toast.fire({
            title: "Notifikasi coba",
            // type: 'success',
            // type: 'info',
            // icon: 'success',
            icon: 'info',
            // text: ' jalkdsjksd jaslkjffs jafs kjfsa afjkfasjfl'
          })
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        // jquery di form modul bagian add -> untuk combobox bertingkat
        $('#idcbproduk').change(function() {
          var idproduk = $(this).val();
          // console.log(id_cbproduk);
          // console.log("<?= base_url('mastermodul/getDataproduk') ?>");
          try {
            $.ajax({
              type: "POST",
              url: "<?= base_url('mastermodul/getDatasubproduk') ?>",
              data: {
                paramidproduk: idproduk
              },
              dataType: "json",
              success: function(response) {
                // console.log(response);
                $('#idcbsubproduk').html(response);

              },
              error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
              }
            });

          } catch (e) {
            alert("You messed something up!");
          }
        });



        // jquery di form modul bagian edit -> untuk combobox bertingkat (get data combobox sub produk dari combobox produk)
        $('.classcbproduk').change(function() {
          var idproduk = $(this).val();
          // console.log(id_cbproduk);
          // console.log("<?= base_url('mastermodul/getDataproduk') ?>");
          try {
            $.ajax({
              type: "POST",
              url: "<?= base_url('mastermodul/getDatasubproduk') ?>",
              data: {
                paramidproduk: idproduk
              },
              dataType: "json",
              success: function(response) {
                // console.log(response);
                // $('.classcbsubproduk').prop('disabled', false);
                $('.classcbsubproduk').html(response);

              },
              error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
              }
            });

          } catch (e) {
            alert("You messed something up!");
          }


        });






      });
    </script>






    <!-- <script>
    $(document).ready(function() {
      $('#btncoba').click(function() {
        // const flashData = $(".flash-data").data("dataflash");
        // const flashData = $(".flash-data").data("dataflash");
        const swal = $('.swal').data('swal');
        // const pss = $(".pusing").val();
        alert(swal);
        // alert(pss);
        // alert('haloo');
      });
    });
  </script> -->

    </body>

</html>