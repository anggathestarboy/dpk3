<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'];
  $kelas = $_POST['kelas'];
  $hobi = $_POST['hobi'];

  // Auto-generate NIS 16 digit tanpa titik
  $nis = str_pad(mt_rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT);

  $query = "INSERT INTO siswa (nis, nama, kelas, hobi) VALUES ('$nis', '$nama', '$kelas', '$hobi')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    echo "<script>alert('Data berhasil disimpan!'); window.location.href='index.php';</script>";
  } else {
    echo "<script>alert('Gagal menyimpan data');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Data Siswa</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/tambah.css">
</head>
<body>
  <div class="sidebar">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <a href="index.php"><i class="fa fa-users me-2"></i> Data Siswa</a>
    <a href="logout.php"><i class="fa fa-sign-out me-2"></i> Logout</a>
  </div>

  <div class="main-content">
    <h2 class="custom-title">Tambah Data Siswa</h2>

    <form method="POST" action="">
      <div class="mb-3">
        <label for="studentName" class="form-label">Nama:</label>
        <input type="text" class="form-control" id="studentName" name="nama" placeholder="Masukkan nama siswa" required>
      </div>
      <div class="mb-3">
        <label for="studentClass" class="form-label">Kelas:</label>
        <select class="form-select" id="studentClass" name="kelas" required>
          <option value="" disabled selected>Pilih kelas</option>
          <option value="X RPL 1">X RPL 1</option>
          <option value="X RPL 2">X RPL 2</option>
          <option value="X RPL 3">X RPL 3</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="studentHobby" class="form-label">Hobi:</label>
        <input type="text" class="form-control" id="studentHobby" name="hobi" placeholder="Masukkan hobi siswa" required>
      </div>
      <button type="submit" class="btn btn-save">
        <i class="fa fa-save me-2"></i> Simpan Data
      </button>
    </form>
  </div>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
