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








?>