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
      $cover = htmlspecialchars($data["cover"]);
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
          $cover = htmlspecialchars($data["cover"]);
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







?>