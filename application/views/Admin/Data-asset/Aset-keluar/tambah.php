      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item"><a href="<?= base_url('aset_keluar') ?>">Aset Keluar</a></li>
                  <li class="breadcrumb-item active">tambah</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <a href="<?= base_url('aset_masuk') ?>" class="btn btn-info mb-2">
              <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
           <div class="card p-2">
             <div class="card-header bg-info">
              <h5 class="text-center">Tambah Data</h5> 
             </div>
              <!-- error message -->
             

            <?= form_open_multipart('Aset_keluar/tambah'); ?>
              <div class="form-group">
                <label for="id_transaksi">ID Transaksi</label>
                <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" placeholder="Masukkan ID Transaksi">
                <small class="form-text text-danger"><?= form_error('id_transaksi') ?></small>
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal Masuk">
              <small class="form-text text-danger"><?= form_error('tanggal') ?></small>
              </div>
              <div class="form-group">
                <label for="kode_aset">Kode Aset</label>
                <input type="text" class="form-control" id="kode_aset" name="kode_aset" placeholder="Masukkan Kode Aset">
              <small class="form-text text-danger"><?= form_error('kode_aset') ?></small>
              </div>
              <div class="form-group">
                <label for="nama_aset">Nama Aset</label>
                <input type="text" class="form-control" id="nama_aset" name="nama_aset" placeholder="Masukkan Nama Aset">
              <small class="form-text text-danger"><?= form_error('nama_aset') ?></small>
              </div>
              <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan Tujuan">
              <small class="form-text text-danger"><?= form_error('tujuan') ?></small>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">
              <small class="form-text text-danger"><?= form_error('jumlah') ?></small>
              </div>
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan">
              <small class="form-text text-danger"><?= form_error('satuan') ?></small>
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
