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
                  <li class="breadcrumb-item active">Data Aset</li>
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
                Tambah Data
            </a>
            <div class="card p-2">
              <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Aset</th>
                    <th scope="col">Nama Aset</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Ruangan</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach($aset as $ast) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $ast['kode_barang'] ?></td>
                    <td><?= $ast['nama_barang'] ?></td>
                    <td><?= $ast['satuan'] ?></td>
                    <td><?= $ast['kuantitas'] ?></td>
                    <td><?= $ast['kode_ruangan'] ?></td>
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
