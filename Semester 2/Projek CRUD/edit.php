<?php
include 'koneksi.php';
$db = new database();
?>

<h1>CRUD OOP PHP</h1>
<h3>Edit data siswa</h3>
<form action="proses.php?aksi=update" method="post">
<?php
foreach ($db->edit($_GET['id']) as $row) {
?>
    <table>
        <tr>
            <td>Nama</td>
            <td>
                <input type="hidden" name="nis" value="<?php echo $row['nis'] ?>">
                <input type="text" name="nama" value="<?php echo $row['nama'] ?>">
            </td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>
                <input type="text" name="kelas" value="<?php echo $row['kelas'] ?>">
            </td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td>
                <input type="text" name="hobi" value="<?php echo $row['hobi'] ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Simpan">
            </td>
        </tr>
    </table>
<?php } ?>
</form>
