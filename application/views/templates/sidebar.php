      <aside class="main-sidebar elevation-4 sidebar-dark-info">
          <a href="#" class="brand-link navbar-info">
            <img src="<?= base_url() ?>assets/images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle">
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
                <a href="<?= base_url('user') ?>" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>Data Users</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-folder"></i>
                  <p>Data Master</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?=base_url('Aset') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Aset</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="<?=base_url('Satuan_aset') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Satuan Aset</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="<?=base_url('Location') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lokasi Aset</p>
                </a>
              </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-folder"></i>
                  <p>Data Transaksi</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?=base_url('Aset_masuk') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aset Masuk</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="<?=base_url('Aset_keluar') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aset Keluar</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url('Pengajuan_aset') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengajuan Aset</p>
                  </a>
                </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-alt"></i>
                  <p>Laporan</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?=base_url('Laporan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Aset</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="<?=base_url('Aset_keluar') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Aset Masuk</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="<?=base_url('Aset_keluar') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Aset Keluar</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url('Pengajuan_aset') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Pengajuan Aset</p>
                  </a>
                </li>
                </ul>
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