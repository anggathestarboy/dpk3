<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

include 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Query hapus data berdasarkan ID
  $query = "DELETE FROM siswa WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php';</script>";
  } else {
    echo "<script>alert('Gagal menghapus data'); window.location.href='index.php';</script>";
  }
} else {
  header("Location: index.php");
}
