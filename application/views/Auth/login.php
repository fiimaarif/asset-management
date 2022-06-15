<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Asset Management | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="<?= base_url(); ?>vendor/adminlte/plugins/fontawesome-free/css/all.min.css"
    />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- icheck bootstrap -->
    <link
      rel="stylesheet"
      href="<?= base_url(); ?>vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/adminlte/dist/css/adminlte.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
      rel="stylesheet"
    />
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#">Asset Management</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Silahkan Login</p>
          <?= $this->session->flashdata('message'); ?>

          <form action="<?= base_url('auth/login') ?>" method="post">
            <div class="input-group mb-3">
              <input type="username" id="username" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <small class="text-danger">
              <?= form_error('username'); ?>
            </small>
            <div class="input-group mb-3">
              <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                placeholder="Password"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <small class="text-danger">
              <?= form_error('password'); ?>
            </small>
            <div class="form-group">
              <select name="level" class="form-control" required>
                <option value="">Pilih Level User</option>
                <option value="direktur">Direktur</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
              </select>
					  </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">
                  Sign In
                </button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <!-- /.social-auth-links -->

          <!-- <p class="mb-0 mt-1">
            <a href="<?= base_url('auth/register'); ?>" class="text-center"
              >Daftar akun baru</a
            >
          </p> -->
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>vendor/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>vendor/adminlte/dist/js/adminlte.min.js"></script>
  </body>
</html>
