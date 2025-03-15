<?php
include ('koneksi.php');
$db = new database();

$aksi = $_GET['aksi'];
if($aksi=="tambah"){
    $db->tambah_data($_POST['nama'], $_POST['kelas'], $_POST['hobi']);
    header('location:tampil.php');
}

elseif ($aksi=="update") {
    $db->update($_POST['nis'], $_POST['nama'], $_POST['kelas'], $_POST['hobi']);
    header("location:tampil.php");
}

elseif ($aksi=="hapus") {
    $db->hapus($_GET['id']);
    header("location:tampil.php");
}


?>
