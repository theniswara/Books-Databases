<?php 
require('functions.php');

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$book = query("SELECT * FROM books WHERE id = $id")[0];



// cek apakah tombol sudah ditekan/belum
if( isset($_POST["submit"]) ) {

  // cek apakah data berhasil diubah/tidak
  if( ubah($_POST) > 0 ) {
    echo " 
        <script>
          alert('Data berhasil diubah!');
          document.location.href = 'index.php';
        </script>
    ";
  } else {
    "<script>
          alert('Data gagal diubah!');
          document.location.href = 'index.php'
    </script>
    ";
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        
        <h1 class="mb-3">Update Books</h1>  
        
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $book["id"];?>">
          <input type="hidden" name="gambarLama" value="<?= $book["cover"];?>">

        <div class="mb-3">
          <label for="ISBN" class="form-label">ISBN</label>
          <input type="text" name="ISBN" id="ISBN" class="form-control" value="<?= $book['ISBN']; ?>">
        </div>
        
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" id="title" name="title" class="form-control" value="<?= $book['title']; ?>">
        </div>
        
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" id="author" name="author" class="form-control" value="<?= $book['author']; ?>">
        </div>
      
        <div class="mb-3">
          <label for="og_release_date" class="form-label">Release date</label>
          <input type="og_release_date" id="og_release_date" name="og_release_date" class="form-control" value="<?= $book['og_release_date']; ?>">
        </div>
      
        <div class="mb-3">
          <label for="cover" class="form-label">Cover</label>
          <!-- <img src="./assets/img/<?= $book['cover'] ?>" alt=""> -->
          <input type="file" id="cover" name="cover" class="form-control">
          <br>
          <div class="card" style="width: 10rem;">
            <img src="./assets/img/<?= $book['cover'] ?>" class="card-img-top" alt="...">
          </div>
          <br>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>