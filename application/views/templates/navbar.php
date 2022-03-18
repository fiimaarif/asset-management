      <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-dark navbar-cyan">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
        </ul>
         <ul class="navbar-nav ml-auto pb-1">
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="image user-panel">
            <span class="hidden-xs mr-2">Hi, <?= $user['name']; ?></span>
              <img
                src="<?= base_url('assets/images/profil/').$user['image']; ?>"
                class="img-circle"
                alt="User Image"
              />
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?= $user['name']; ?></span>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
          
      </li>
      
    </ul>
   
      </nav>