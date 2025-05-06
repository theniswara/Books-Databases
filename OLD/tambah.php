<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data Mahasiswa</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="mb-12 bg-light-subtle">
    
    <h1 class="mb-2 text-center fw-bold">Tambah data mahasiswa</h1>
    <br>
    <form action="" method="post" class="col-md-5 mx-auto bg-secondary-subtle p-5 rounded-4">
      <div class="mb-3 ">
        <label for="nrp" class="form-label fw-bold">NRP : </label>
        <input
          type="text"
          name="nrp"
          class="form-control"
          id="nrp"
        />
      </div>
    <div class="mb-3">
      <label for="nama" class="form-label fw-bold">Nama : </label>
      <input
          type="text"
          name="nama"
          class="form-control"
          id="nama"
        />
      </div>
      <div class="mb-3">
      <label for="email" class="form-label fw-bold">Email : </label>
      <input
          type="email"
          name="email"
          class="form-control"
          id="email"
        />
      </div>
      <div class="mb-3">
      <label for="jurusan" class="form-label fw-bold">Jurusan : </label>
      <input
          type="jurusan"
          name="jurusan"
          class="form-control"
          id="jurusan"
        />
      </div>
      <div class="mb-4">
      <label for="emial" class="form-label fw-bold">Gambar : </label>
      <input
          type="gambar"
          name="gambar"
          class="form-control"
          id="gambar"
        />
      </div>
      <div>
      <button type="submit" class="btn btn-light">Submit</button>
      </div>
          </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
