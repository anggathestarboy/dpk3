<?php
session_start();
include 'koneksi.php'; 

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if ($cek > 0) {
  $_SESSION['username'] = $username;
  header("Location: index.php");
  exit();
} else {
  echo "<script>alert('Login gagal! Username atau password salah.'); window.location='login.php';</script>";
}
