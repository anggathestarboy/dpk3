<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

include 'koneksi.php';

// Ambil data siswa berdasarkan ID
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM siswa WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($result) > 0) {
    $siswa = mysqli_fetch_assoc($result);
  } else {
    echo "<script>alert('Data tidak ditemukan'); window.location.href='index.php';</script>";
    exit();
  }
} else {
  header("Location: index.php");
  exit();
}

// Proses update data saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $kelas = $_POST['kelas'];
  $hobi = $_POST['hobi'];

  $update = mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', kelas='$kelas', hobi='$hobi' WHERE id='$id'");

  if ($update) {
    echo "<script>alert('Data berhasil diperbarui'); window.location.href='index.php';</script>";
  } else {
    echo "<script>alert('Gagal memperbarui data');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Siswa</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/tambah.css">
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <a href="index.php"><i class="fa fa-users me-2"></i> Data Siswa</a>
    <a href="logout.php"><i class="fa fa-sign-out me-2"></i> Logout</a>
  </div>

  <!-- Konten Utama -->
  <div class="main-content">
    <h2 class="custom-title">Edit Data Siswa</h2>

    <!-- Form Edit Data -->
    <form action="" method="POST">
      <div class="mb-3">
        <label for="studentName" class="form-label">Nama:</label>
        <input type="text" class="form-control" name="nama" id="studentName" value="<?= htmlspecialchars($siswa['nama']) ?>" required>
      </div>
      <div class="mb-3">
        <label for="studentClass" class="form-label">Kelas:</label>
        <select class="form-select" name="kelas" required>
          <option value="" disabled>Pilih kelas</option>
          <option value="X RPL 1" <?= $siswa['kelas'] == 'X RPL 1' ? 'selected' : '' ?>>X RPL 1</option>
          <option value="X RPL 2" <?= $siswa['kelas'] == 'X RPL 2' ? 'selected' : '' ?>>X RPL 2</option>
          <option value="X RPL 3" <?= $siswa['kelas'] == 'X RPL 3' ? 'selected' : '' ?>>X RPL 3</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="studentHobby" class="form-label">Hobi:</label>
        <input type="text" class="form-control" name="hobi" id="studentHobby" value="<?= htmlspecialchars($siswa['hobi']) ?>" required>
      </div>
      <button type="submit" name="update" class="btn btn-save">
        <i class="fa fa-save me-2"></i> Simpan Perubahan
      </button>
    </form>
  </div>

  <!-- jQuery & Bootstrap JS -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
