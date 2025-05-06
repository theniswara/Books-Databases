<?php 
  // konek ke database
  $conn = mysqli_connect("localhost", "root", "", "phpdasar");

  // ambil data dari tabel books / query data books
  $result = mysqli_query($conn, "SELECT * FROM books");
  if( !$result ) {
    echo mysqli_error($conn);
  }

  // ambil data ( fetch ) books dari objek result
  // mysqli_fetch_row() // mengembalikan array numerik ( indeksnya angka )
  // mysqli_fetch_assoc() // mengembalikan array assosiative ( indeksnya karakter/nama ) 
  // mysqli_fetch_array() // mengembalikan keduanya 
  // mysqli_fetch_object()

//   while( $book = mysqli_fetch_assoc($result) ) {
//   var_dump($book);
// }


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
    <div class="container mt-4">
      <h1>Books Databases</h1>

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
        <?php while( $row = mysqli_fetch_assoc($result) ) : ?>
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
              <a href="" class="btn btn-success btn-sm me-2">Update</a>
              <a href="" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endwhile; ?>
      </thead>
      </table>
      <!-- table -->


      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>