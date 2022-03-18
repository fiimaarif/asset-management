<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/auth.css" />
    <title>Asset Management | Sign In</title>
  </head>
  <body>
    <div class="container2">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="<?= base_url('auth/login') ?>" method="post" class="sign-in-form">
                <?= $this->session->flashdata('message'); ?>
                <small class="text-danger">
                 <?= form_error('name'); ?>
                </small>
                <small class="text-danger">
                <?= form_error('email'); ?>
                </small>
                <small class="text-danger">
                <?= form_error('password1'); ?>
                </small>
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>
          <!-- Register -->
          <form action="<?= base_url('auth/register'); ?>" method="post" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="name" name="name" placeholder="Full name" value="<?= set_value('name'); ?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" required />
              
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password1" name="password1" placeholder="Password" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password2" name="password2" placeholder="Retype password" required />
            </div>
            <button type="submit" class="btn">Sign up</button>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>PERUMDA AM TIRTA KEUMUENENG KOTA LANGSA</h3>
            <p>
              Sistem Asset Management
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="<?= base_url(); ?>assets/images/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>PERUMDA AM TIRTA KEUMUENENG KOTA LANGSA</h3>
            <p>
              Sistem Asset Management
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="<?= base_url(); ?>assets/images/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="<?= base_url(); ?>assets/js/auth.js"></script>
  </body>
</html>
