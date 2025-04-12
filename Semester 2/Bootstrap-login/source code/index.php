<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

include "koneksi.php";

// Menangani tambah data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $kelas = $_POST['kelas'];
  $hobi = $_POST['hobi'];
  $nis = strval(mt_rand(1000000000000000, 9999999999999999)); // NIS 16 digit acak


}

// Ambil semua data siswa
$data = $koneksi->query("SELECT * FROM siswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/data.css">
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <a href="#" class="active"><i class="fa fa-users me-2"></i> Data Siswa</a>
    <a href="logout.php"><i class="fa fa-sign-out me-2"></i> Logout</a>
  </div>

  <!-- Konten Utama -->
  <div class="main-content">
    <h2 class="custom-title">Data Siswa</h2>

    <div class="text-end mb-3">
      <a href="tambah.php"> <button class="btn btn-custom-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
          <i class="fa fa-plus me-2"></i> Tambah Data
        </button></a>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="table-header-custom">
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Hobi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($row = $data->fetch_assoc()):
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nis'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td><?= $row['hobi'] ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>"><i class="fa fa-pencil action-icons edit-icon" title="Edit"></i></a>
              <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                <i class="fa fa-trash action-icons delete-icon" title="Delete"></i>
              </a>
            </td>

          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Tambah Data Siswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <div class="mb-3">
              <label for="studentName" class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" id="studentName" placeholder="Masukkan nama siswa" required>
            </div>
            <div class="mb-3">
              <label for="studentClass" class="form-label">Kelas</label>
              <select class="form-select" name="kelas" required>
                <option value="" disabled selected>Pilih kelas</option>
                <option value="X RPL 1">X RPL 1</option>
                <option value="X RPL 2">X RPL 2</option>
                <option value="X RPL 3">X RPL 3</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="studentHobby" class="form-label">Hobi</label>
              <input type="text" name="hobi" class="form-control" id="studentHobby" placeholder="Masukkan hobi siswa" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" name="simpan" class="btn btn-custom-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>