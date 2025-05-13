<?php 
 session_start();

  if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
  }
require('functions.php');
// cek apakah tombol sudah ditekan/belum
if( isset($_POST["submit"]) ) {

  // cek apakah data berhasil ditambah/tidak
  if( tambah($_POST) > 0 ) {
    echo " 
        <script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'index.php';
        </script>
    ";
  } else {
    "<script>
          alert('Data gagal ditambahkan!');
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
      <div class="col-md-8">
        <h1>Add New Books</h1>  
        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="ISBN" class="form-label">ISBN</label>
          <input type="text" name="ISBN" id="ISBN" class="form-control">
        </div>
        
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" id="title" name="title" class="form-control">
        </div>
        
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" id="author" name="author" class="form-control">
        </div>
      
        <div class="mb-3">
          <label for="og_release_date" class="form-label">Release date</label>
          <input type="og_release_date" id="og_release_date" name="og_release_date" class="form-control">
        </div>
      
        <div class="mb-3">
          <label for="cover" class="form-label">Cover</label>
          <input type="file" id="cover" name="cover" class="form-control">
        </div>
        
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>