<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>CRUD OOP pada PHP</h1>
<h3>Tambah data siswa</h3>

<form action="proses.php?aksi=tambah" method="post">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>
                <select name="kelas">
                    <option>X RPL 1</option>
                    <option>X RPL 2</option>
                    <option>X RPL 3</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td><input type="text" name="hobi"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
</form>

</body>
</html>