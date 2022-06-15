      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item"><a href="<?= base_url('pengajuan_aset') ?>">Pengajuan Aset</a></li>
                  <li class="breadcrumb-item active">tambah</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <a href="<?= base_url('pengajuan_aset') ?>" class="btn btn-info mb-2">
              <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
           <div class="card p-2">
             <div class="card-header bg-info">
              <h5 class="text-center"> Tambah Data</h5> 
             </div>
              <!-- error message -->
             

            <?= form_open_multipart('pengajuan_aset/tambah'); ?>
              <div class="form-group">
                <label for="nama_aset">Nama Aset</label>
                <input type="text" class="form-control" id="nama_aset" name="nama_aset" placeholder="Masukkan Nama Aset">
              <small class="form-text text-danger"><?= form_error('nama_aset') ?></small>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">
              <small class="form-text text-danger"><?= form_error('jumlah') ?></small>
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Nama Aset">
              <small class="form-text text-danger"><?= form_error('tanggal') ?></small>
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
              <small class="form-text text-danger"><?= form_error('keterangan') ?></small>
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
