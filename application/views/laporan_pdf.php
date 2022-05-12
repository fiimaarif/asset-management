<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laporan Data Aset</title>
  </head>
  <style type="text/css">
      *{
          font-family: Arial, Helvetica, sans-serif;
      }
      table{
          margin-top: 20px;
          width: 100%;
          border-collapse: collapse;
          border: 1px solid;
      }
      thead tr th{
          border: 1px solid;
          height: 35px;
          background-color: #1fafed;
      }
        tbody tr td{
            border: 1px solid;
            text-align: center;
        }
        .text-center{
            text-align: center;
        }
  </style>
  <body>
      <div class="container">
          <div class="row">
                <div class="col-md-12">
                <h3 class="text-center">Laporan Data Aset</h3>
                <h3 class="text-center">PDAM TIRTA KEUMUENENG KOTA LANGSA</h3>
                <hr>
          </div>
          <table>
  <thead class="table-primary">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Kode Barang</th>
        <th scope="col">Satuan</th>
        <th scope="col">Kuantitas</th>
        <th scope="col">Kode Ruangan</th>
    </tr>
  </thead>
  <tbody>
        <?php $i=1; ?>
        <?php foreach($aset as $ast) : ?>
            <tr>
                <th style="border: 1px solid;" scope="row"><?= $i; ?></th>
                <td><?= $ast['nama_barang'] ?></td>
                <td><?= $ast['kode_barang'] ?></td>
                <td><?= $ast['satuan'] ?></td>
                <td><?= $ast['kuantitas'] ?></td>
                <td><?= $ast['kode_ruangan'] ?></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
  </tbody>
</table>
      </div>
  </body>
  </html>