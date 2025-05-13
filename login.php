<?php 
  session_start();

  // cek cookie
  if( isset($_COOKIE['login']) ) {
    if( $_COOKIE['login'] == 'true' ) {
      $_SESSION['login'] = true;
    }
  }

  if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
  }

  require 'functions.php';

  if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

      // cek password
      $row = mysqli_fetch_assoc($result);
      if( password_verify($password, $row['password'])) {
        // set session
        $_SESSION["login"] = true;

        // cek remember me
        if ( isset($_POST['remember']) ) {
          // buat cookie
          setcookie('login', 'true', time() + 60);
        }


        header("Location: index.php");
        exit;
      }
    }

    $error = true;


  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <!-- Boostrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
      crossorigin="anonymous"
    />
    <!-- Boostrap -->

  </head>
  <body>

    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h1>Login Page</h1>

          <form action="" method="post" autocomplete="off">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                required
              />
            </div>
            <div class="mb-3">
              <label for="password">Password</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required
              />
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" name="remember" id="remember">
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <?php if( isset($error) ) :?>
            <div class="alert alert-danger mb-4" role="alert">
              Username / Password salah!
            </div>
          <?php endif;?>

            <button type="submit" name="login" class="btn btn-primary">
              Login
            </button>
          </form>
        </div>
      </div>

    <!-- Boostrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
    <!-- Boostrap -->
  </body>
</html>
