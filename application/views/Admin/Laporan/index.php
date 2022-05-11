
<body class="hold-transition sidebar-mini">

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar elevation-4 sidebar-dark-info">
        <!-- Brand Logo -->
          <a href="#" class="brand-link navbar-info pb-3">
            <img src="<?= base_url() ?>vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
            <span class="brand-text font-weight-light"><strong>Asset Management</strong></span>
          </a>
        <div class="sidebar">

          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
               <li class="nav-header text-center">Menu</li>
              <li class="nav-item">
                <a href="<?=base_url('Dashboard') ?>" class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Aset') ?>" class="nav-link">
                  <i class="fas fa-folder"></i>
                  <p>Asset</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Location') ?>" class="nav-link">
                  <i class="fas fa-folder-plus"></i>
                  <p>Asset Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('user') ?>" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Laporan') ?>" class="nav-link navbar-info active">
                  <i class="fas fa-file-alt"></i>
                  <p>Laporan</p>
                </a>
              </li>
              <div class="dropdown-divider mt-5"></div>
              <li class="nav-item text-center">
                <a href="<?=base_url('auth/logout') ?>" class="nav-link">
                  <i class="fas fa-power-off text-danger"></i>
                  <p class="text-danger"><strong>Logout</strong></p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- flash message -->
        <div class="container-fluid">
          <?php if($this->session->flashdata('message') ) : ?>
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                   Data <strong>Berhasil</strong> <?= $this->session->flashdata('message'); ?>.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <?php endif; ?>
        </div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item active">Laporan</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="card p-2">
              <div class="card-header bg-info mb-1">
              <h5 class="text-center">Laporan Data Asset</h5>
              </div>
              <table class="table" id="laporanAset" class="table table-striped table-bordered" style="width:100%">
              <div class="">
                <a href="<?= base_url('Aset/tambah') ?>" class="btn btn-warning mb-2">
                    <i class="fas fa-file-alt"></i>
                      Export PDF
                    </a>
              </div>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Kode Ruangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach($aset as $ast) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $ast['nama_barang'] ?></td>
                    <td><?= $ast['kode_barang'] ?></td>
                    <td><?= $ast['satuan'] ?></td>
                    <td><?= $ast['kuantitas'] ?></td>
                    <td><?= $ast['kode_ruangan'] ?></td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
  </body>
</html>
