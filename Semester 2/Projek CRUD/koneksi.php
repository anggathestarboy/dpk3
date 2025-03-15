<?php
class database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "smk6";
    private $koneksi;

    function __construct() {
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->koneksi->connect_error) {
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
    }

    function tampil_data() {
        $hasil = []; 
        $data = $this->koneksi->query("SELECT * FROM siswa");

        while ($row = $data->fetch_assoc()) {
            $hasil[] = $row;
        }

        return $hasil;
    }

    function tambah_data($nama, $kelas, $hobi) {
        $stmt = $this->koneksi->prepare("INSERT INTO siswa (nama, kelas, hobi) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $kelas, $hobi);
        $stmt->execute();
        $stmt->close();
    }

    function edit($nis)
{
    $data = mysqli_query($this->koneksi, "select * from siswa where nis = '$nis'");
    while ($row = mysqli_fetch_array($data)){
        $hasil[] = $row;
    }
    return $hasil;
}

function update($nis, $nama, $kelas, $hobi)
{
    mysqli_query($this->koneksi, "update siswa set nama='$nama', kelas='$kelas', hobi='$hobi' where nis='$nis' ");
}

function hapus($nis)
{
    mysqli_query($this->koneksi, "delete from siswa where nis = '$nis'");
}

}
?>
