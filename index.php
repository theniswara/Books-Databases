<?php 
  require 'functions.php';
  $books = query("SELECT * FROM books");

?>


<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>

  <body>
    <div class="container mt-5 mb-5">
      <h1 class="fw-bold mb-4">Books Databases</h1>
 
      <div class="container-fluid">
        <form action="" method="post" class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="keyword" autofocus autocomplete="off"  placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
        </form>
      </div>

      <br>
      <!-- table  -->
      <div class="table-responsive">
      <table class="table table-bordered table-striped">
      <thead class="text-center">
        <tr>
          <th>No</th>
          <th>ISBN</th>
          <th>Cover</th>
          <th>Title</th>
          <th>Author</th>
          <th>Original Release Date</th>
          <th>Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ( $books as $row ) : ?>
        <tr class="text-centered align-middle">
          <td><?= $i; ?></td>
          <td><?= $row["ISBN"] ?></td>
          <td>
            <img src="assets/img/<?= $row["cover"]; ?> " alt="" width="100" height="147">
          </td>
          <td><?= $row["title"] ?></td>
          <td><?= $row["author"] ?></td>
          <td><?= $row["og_release_date"] ?></td>
          


          <td class="text-center">
              <a href="ubah.php?id=<?= $row["id"] ?>" class="btn btn-success btn-sm me-2 rounded-3 fw-semibold">Update</a>
              <a href="hapus.php?id=<?= $row["id"]?>" onclick="return confirm('Are You sure?')" class="btn btn-danger btn-sm rounded-3 fw-semibold">Delete</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
      </thead>
      </table>
      <!-- table -->

      <a href="tambah.php" class="btn btn-primary me-2 rounded-3 fw-semibold "> + Add Books</a>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>