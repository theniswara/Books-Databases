<?php 

require 'functions.php';

  if( isset($_POST["register"])){

    if( registrasi($_POST) > 0 ) {
      echo "<script>
              alert('user baru berhasil ditambahkan!')
            </script>";
    } else {
      mysqli_error($conn);
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1>Registration Page</h1>
      
        <form action="" method="post" autocomplete="off">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" required/>
        </div>
        <div class="mb-3">
          <label for="password2">Password Confirmation</label>
          <input type="password" id="password2" name="password2" class="form-control" />
        </div>
         <button type="submit" name="register" class="btn btn-primary">Register</button>
      </div>
    </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>