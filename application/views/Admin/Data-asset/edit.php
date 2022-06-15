      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                  <li class="breadcrumb-item"><a href="<?= base_url('aset') ?>">Data Aset</a></li>
                  <li class="breadcrumb-item active">edit</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <a href="<?= base_url('aset') ?>" class="btn btn-info mb-2">
              <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
           <div class="card p-2">
              <div class="card-header bg-info">
              <h5 class="text-center"> Edit Data</h5> 
             </div>
             <?= form_open_multipart('aset/edit'); ?>
             <input type="hidden" name="id" value="<?= $aset['id'] ?>">
             <div class="form-group">
                <label for="kode_barang">Kode Aset</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Aset" value="<?= $aset['kode_barang'] ?>">
              <small class="form-text text-danger"><?= form_error('kode_barang') ?></small>
              </div>
              <div class="form-group">
                <label for="nama_barang">Nama Aset</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Aset" value="<?= $aset['nama_barang'] ?>">
                <small class="form-text text-danger"><?= form_error('nama_barang') ?></small>
              </div>
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" value="<?= $aset['satuan'] ?>">
              <small class="form-text text-danger"><?= form_error('satuan') ?></small>
              </div>
              <div class="form-group">
                <label for="kuantitas">Jumlah</label>
                <input type="number" class="form-control" id="kuantitas" name="kuantitas" placeholder="Masukkan kuantitas" value="<?= $aset['kuantitas'] ?>">
              <small class="form-text text-danger"><?= form_error('kuantitas') ?></small>
              </div>
              <div class="form-group">
                <label for="kode_ruangan">Ruangan</label>
                <select type="text" class="form-control" name="kode_ruangan" id="kode_ruangan" aria-label="Default select example">
                  <option selected value="<?= $aset['kode_ruangan'] ?>"><?= $aset['kode_ruangan'] ?></option>
                  <?php foreach($alldata as $data) : ?>
                  <option value="<?= $data['location_code'] ?>"><?= $data['location_code'] ?></option>
                  <?php endforeach; ?>
                </select>
              <small class="form-text text-danger"><?= form_error('kode_ruangan') ?></small>
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
