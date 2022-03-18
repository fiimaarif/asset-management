
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
                  <p>Home</p>
                </a>
              </li>
                
              <li class="nav-item">
                <a href="<?= base_url('user') ?>" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>Data Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Category') ?>" class="nav-link">
                  <i class="fas fa-folder"></i>
                  <p>Asset Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Department') ?>" class="nav-link">
                  <i class="fas fa-folder-open"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Location') ?>" class="nav-link">
                  <i class="fas fa-folder-plus"></i>
                  <p>Asset Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Aset') ?>" class="nav-link navbar-info active">
                  <i class="fas fa-folder"></i>
                  <p>Data Asset</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Laporan') ?>" class="nav-link">
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
                  <li class="breadcrumb-item active">Category</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <a href="<?= base_url('Aset/tambah') ?>" class="btn btn-info mb-2">
              <i class="fas fa-plus"></i>
                Tambah
            </a>
            <div class="card p-2">
              <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Department</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach($aset as $ast) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $ast['category'] ?></td>
                    <td><?= $ast['department'] ?></td>
                    <td><?= $ast['location'] ?></td>
                    <td>
                      <a href="<?= base_url(); ?>aset/edit/<?= $ast['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> edit</a>
                      <a href="<?= base_url(); ?>aset/hapus/<?= $ast['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ? ');"><i class="far fa-trash-alt"></i> delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
      </div>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
  </body>
</html>
