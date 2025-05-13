<?php 
    // konek ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    function query($query) {
      global $conn;
      $result = mysqli_query($conn, $query);
      $rows = [];
      while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
      }
      return $rows;
    }



    function tambah($data) {
      global $conn;
  // ambil data dari tiap elemen dalam form
      $ISBN = htmlspecialchars($data["ISBN"]);


      // upload cover/gambar
      $cover = upload();
      if( !$cover ) {
        return false;
      }

      $title = htmlspecialchars($data["title"]);
      $author = htmlspecialchars($data["author"]);
      $og_release_date = htmlspecialchars($data["og_release_date"]);

      //  query insert data
      $query = "INSERT INTO books
                    VALUES 
                ('', '$ISBN', '$cover', '$title', '$author', '$og_release_date')
      ";
      mysqli_query($conn, $query);

      return mysqli_affected_rows($conn);

    }

    function upload(){
      $namaFile = $_FILES['cover']['name'];
      $ukuranFile = $_FILES['cover']['size'];
      $error = $_FILES['cover']['error'];
      $tmpName = $_FILES['cover']['tmp_name'];

      // cek apakah tidak ada gambar yang diupload
      if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu')
              </script>
        " ;
        return false;
      }

      // cek apakah yang diupload adalah gambar
      $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
      $ekstensiGambar = explode('.', $namaFile);
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar')
              </script>
        " ;
        return false;
      }

      // cek jika ukuran terlalu besar
      if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('ukuran gambar terlalu besar')
              </script>
        " ;
        return false;
      }

      //  lolos pengecekan, gambar siap diuload
      // generate nama baru
      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiGambar;

      move_uploaded_file($tmpName, './assets/img/' . $namaFileBaru);

      return $namaFileBaru;



    }

    function hapus($id) {
      global $conn;
      mysqli_query($conn, "DELETE FROM books WHERE id = $id");

      return mysqli_affected_rows($conn);

    }
    
    function ubah($data) {
      global $conn;
      // ambil data dari tiap elemen dalam form
          $id = $data["id"];
          $ISBN = htmlspecialchars($data["ISBN"]);

          $gambarLama = htmlspecialchars($data["gambarLama"]);

          // cek apakah user pilih gambar baru/tidak
          if( $_FILES['cover']['error'] === 4 ) {
            $cover = $gambarLama;
          } else {
            $cover = upload();
          }

         


          $title = htmlspecialchars($data["title"]);
          $author = htmlspecialchars($data["author"]);
          $og_release_date = htmlspecialchars($data["og_release_date"]);
    
          //  query insert data
          $query = "UPDATE books SET 
                    ISBN = '$ISBN',
                    cover = '$cover',
                    title = '$title',
                    author = '$author',
                    og_release_date = '$og_release_date'
                    WHERE id = $id
                  ";
          mysqli_query($conn, $query);
    
          return mysqli_affected_rows($conn);
    
    }


    function cari($keyword) {
      $query = "SELECT * FROM books 
                  WHERE 
                title LIKE '%$keyword%' OR
                ISBN LIKE '%$keyword%' OR
                author LIKE '%$keyword%' OR
                og_release_date LIKE '%$keyword%'
                
      ";
      return query($query);
    }

    function registrasi($data) {
      global $conn;

      $username = strtolower(stripslashes($data["username"]));
      $password = mysqli_real_escape_string($conn, $data["password"]); 
      $password2 = mysqli_real_escape_string($conn, $data["password2"]);
 
      // cek username sudah ada / belum
      $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
      if( mysqli_fetch_assoc($result) ) {
        echo "<script>
              alert('username sudah terdaftar')
            </script>";
        return false;
      }

      // cek konfirmasi password
      if( $password !== $password2 ) {
        echo "<script>
              alert('password tidak sesuai')
            </script>
        ";
        return false;
      }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
   
    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password') ");
    return mysqli_affected_rows($conn);



    }



?>