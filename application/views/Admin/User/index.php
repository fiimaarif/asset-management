      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item active">Users</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <div class="content">
          <a href="<?= base_url('user/tambah') ?>" class="btn btn-info mb-2">
              <i class="fas fa-plus"></i>
                Input Admin
          </a>
          <div class="card p-2">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach($user as $usr) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $usr['fullname'] ?></td>
                    <td><?= $usr['username'] ?></td>
                    <td><?= $usr['level'] ?></td>
                    <td>
                      <a href="<?= base_url(); ?>user/edit/<?= $usr['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> edit</a>
                      <a href="<?= base_url(); ?>user/hapus/<?= $usr['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ? ');"><i class="far fa-trash-alt"></i> delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
  </body>
</html>
