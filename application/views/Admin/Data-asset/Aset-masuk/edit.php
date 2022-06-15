      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item"><a href="<?= base_url('aset_masuk') ?>">Aset Masuk</a></li>
                  <li class="breadcrumb-item active">edit</li>
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
              <h5 class="text-center"> Edit Data</h5> 
             </div>
             <?= form_open_multipart('aset_masuk/edit'); ?>
             <input type="hidden" name="id" value="<?= $aset_masuk['id'] ?>">
             <div class="form-group">
                <label for="id_transaksi">ID Transaksi</label>
                <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" placeholder="Masukkan Kode Aset" value="<?= $aset_masuk['id_transaksi'] ?>">
              <small class="form-text text-danger"><?= form_error('id_transaksi') ?></small>
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" value="<?= $aset_masuk['tanggal'] ?>">
                <small class="form-text text-danger"><?= form_error('tanggal') ?></small>
              </div>
              <div class="form-group">
                <label for="kode_aset">Kode Aset</label>
                <input type="text" class="form-control" id="kode_aset" name="kode_aset" placeholder="Masukkan Kode Aset" value="<?= $aset_masuk['kode_aset'] ?>">
              <small class="form-text text-danger"><?= form_error('kode_aset') ?></small>
              </div>
              <div class="form-group">
                <label for="nama_aset">Nama Aset</label>
                <input type="text" class="form-control" id="nama_aset" name="nama_aset" placeholder="Masukkan Nama Aset" value="<?= $aset_masuk['nama_aset'] ?>">
              <small class="form-text text-danger"><?= form_error('nama_aset') ?></small>
              </div>
              <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Masukkan pengirim" value="<?= $aset_masuk['pengirim'] ?>">
              <small class="form-text text-danger"><?= form_error('pengirim') ?></small>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah" value="<?= $aset_masuk['jumlah'] ?>">
              <small class="form-text text-danger"><?= form_error('jumlah') ?></small>
              </div>
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" value="<?= $aset_masuk['satuan'] ?>">
              <small class="form-text text-danger"><?= form_error('satuan') ?></small>
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
