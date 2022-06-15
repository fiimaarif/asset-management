      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User</a></li>
                  <li class="breadcrumb-item active">edit</li>
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
              <h5 class="text-center">Edit Data</h5> 
             </div>
             <?= form_open_multipart('user/edit'); ?>
             <input type="hidden" name="id" value="<?= $user['id'] ?>">
              <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukkan Fulll Name" value="<?= $user['fullname']; ?>">
                <small class="form-text text-danger"><?= form_error('fullname') ?></small>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?= $user['username']; ?>">
                <small class="form-text text-danger"><?= form_error('username') ?></small>
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <select type="level" class="form-control" name="level" id="level" aria-label="Default select example">
                  <option selected  value="<?= $user['level']; ?>"><?= $user['level']; ?></option>
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
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
  </body>
</html>
