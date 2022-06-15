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
                  <li class="breadcrumb-item active">Laporan Aset Masuk</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="card p-2">
              <div class="card-header bg-info mb-1">
              <h5 class="text-center">Laporan Aset Masuk</h5>
              </div>
              <table class="table" id="laporanAset" class="table table-striped table-bordered" style="width:100%">
              <div class="">
                <a href="<?= base_url('laporan_aset_masuk/pdf') ?>" class="btn btn-warning mb-2">
                    <i class="fas fa-file"></i>
                      Export PDF
                    </a>
              </div>
                 <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Kode Aset</th>
                    <th scope="col">Nama Aset</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Satuan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach($aset_masuk as $astmk) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $astmk['id_transaksi'] ?></td>
                    <td><?= $astmk['tanggal'] ?></td>
                    <td><?= $astmk['kode_aset'] ?></td>
                    <td><?= $astmk['nama_aset'] ?></td>
                    <td><?= $astmk['pengirim'] ?></td>
                    <td><?= $astmk['jumlah'] ?></td>
                    <td><?= $astmk['satuan'] ?></td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
  </body>
</html>
