
  <body class="hold-transition sidebar-mini">

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar elevation-4 sidebar-dark-info">
        <!-- Brand Logo -->
          <a href="#" class="brand-link navbar-info pb-3">
            <img src="<?= base_url() ?>vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
            <span class="brand-text font-weight-light"><strong>Asset Management</strong></span>
          </a>
        <!-- Sidebar -->
        <div class="sidebar">

          <!-- Sidebar Menu -->
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
                <a href="<?= base_url('Department') ?>" class="nav-link">
                  <i class="fas fa-folder"></i>
                  <p>Asset Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Department') ?>" class="nav-link navbar-info active">
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
                <a href="<?=base_url('Aset') ?>" class="nav-link">
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
                <a href="<?= base_url('auth/logout') ?>" class="nav-link">
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
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item"><a href="<?= base_url('Department') ?>">Department</a></li>
                  <li class="breadcrumb-item active">tambah</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <a href="<?= base_url('Department') ?>" class="btn btn-info mb-2">
              <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
           <div class="card p-2">
             <div class="card-header bg-info">
              <h5 class="text-center"> <strong>Tambah Department Baru</strong></h5> 
             </div>
              <!-- error message -->
             

            <?= form_open_multipart('Department/tambah'); ?>
              <div class="form-group">
                <label for="department_code">Kode Department</label>
                <input type="number" class="form-control" id="department_code" name="department_code" placeholder="Masukkan Kode Department">
                <small class="form-text text-danger"><?= form_error('department_code') ?></small>
              </div>
              
              <div class="form-group">
                <label for="department_name">Nama Department</label>
                <input type="text" class="form-control" id="department_name" name="department_name" placeholder="Masukkan Nama Department">
                <small class="form-text text-danger"><?= form_error('department_name') ?></small>
              </div>
            <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-plus"></i> Tambah</button>
            </form>
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
