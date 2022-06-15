      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Admin</a></li>
                  <li class="breadcrumb-item active">tambah</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <a href="<?= base_url('user') ?>" class="btn btn-info mb-2">
              <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
           <div class="card p-2">
             <div class="card-header bg-info">
              <h5 class="text-center">Tambah Data</h5> 
             </div>
              <!-- error message -->
             

            <?= form_open_multipart('user/tambah'); ?>
              <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukkan Fulll Name">
                <small class="form-text text-danger"><?= form_error('fullname') ?></small>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                <small class="form-text text-danger"><?= form_error('username') ?></small>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                <small class="form-text text-danger"><?= form_error('password') ?></small>
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <select type="level" class="form-control" name="level" id="level" aria-label="Default select example">
                  <option selected>Pilih Level </option>
                  <option value="direktur">Direktur</option>
                  <option value="admin">Admin</option>
                  <option value="petugas">Petugas</option>
                </select>
              <small class="form-text text-danger"><?= form_error('level') ?></small>
              </div>
            <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-paper-plane"></i> Save</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
  </body>
</html>
