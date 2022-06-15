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
                <h3 class="text-center">Laporan Pengajuan Aset</h3>
                <h3 class="text-center">PDAM TIRTA KEUMUENENG KOTA LANGSA</h3>
                <hr>
          </div>
          <table>
  <thead class="table-primary">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Aset</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
        <?php $i=1; ?>
        <?php foreach($pengajuan as $pjn) : ?>
            <tr>
                <th style="border: 1px solid;" scope="row"><?= $i; ?></th>
                <td><?= $pjn['nama_aset'] ?></td>
                <td><?= $pjn['jumlah'] ?></td>
                <td><?= $pjn['tanggal'] ?></td>
                <td><?= $pjn['keterangan'] ?></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
  </tbody>
</table>
      </div>
  </body>
  </html>