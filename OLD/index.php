<?php 
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
<body>
  <div class="container mt-3">
    <h1>Daftar Mahasiswa</h1>
    <br>
    <a href="tambah.php">Add data</a>
    <table class="table table-bordered text-center">
      <tr class="text-center">
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
      </tr>

      <?php $i = 1; ?> 
      <?php foreach ( $mahasiswa as $row ) : ?>
      <tr class="text-center">
        <td><?= $i; ?> </td>
        <td>
          <a href="">Edit</a> | 
          <a href="">Delete</a>
        </td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
        <td><?= $row["nim"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["email"];  ?></td>
        <td><?= $row["jurusan"] ?></td>
      </tr>
      <?php $i++ ?>
      <?php endforeach; ?>
      
    </table>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
