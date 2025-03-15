<?php
include('koneksi.php');
$db = new database();
$data_siswa = $db->tampil_data();
?>

<h1>Menampilkan data pada PHP menggunakan OOP</h1>
<h3>Data Siswa</h3>
<a href="tambah.php">Input Data</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Hobi</th>
    </tr>

    <?php
    $no = 1;
    foreach ($data_siswa as $x) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $x['nis']; ?></td>
            <td><?php echo $x['nama']; ?></td>
            <td><?php echo $x['kelas']; ?></td>
            <td><?php echo $x['hobi']; ?></td>
            <td>
            <a href="edit.php?id=<?php echo $x['nis']; ?>&aksi=edit"> Edit</a>
            <a href="proses.php?id=<?php echo $x['nis']; ?>&aksi=hapus"> Hapus</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
