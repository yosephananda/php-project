<?php
class Konten
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampilKonten($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM lowongan";
        if ($id != null) {
            $sql .= " WHERE id = $id";
        }

        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tambahKonten($perusahaan, $alamat, $kategori, $deskripsi, $logo)
    {
        $logo = $_FILES['logo']['name'];
        $extensi = explode(".", $_FILES['logo']['name']);
        //$rname = explode(".", $_FILES['logo']['tmp_name']);
        $namabaru = $perusahaan . "." . end($extensi);
        $sumber = $_FILES['logo']['tmp_name'];

        $upload = move_uploaded_file($sumber, 'img/logo_lowong/' . $namabaru);
        if ($upload) {
            header('location: ?page=content');
        } else {
            echo "<script>alert('Daftar gagal.')</script>";
        }

        $db = $this->mysqli->conn;
        $sql = "INSERT INTO lowongan VALUES ('', '$perusahaan','$alamat','$kategori','$deskripsi','$namabaru' )";
        $db->query($sql) or die($db->error);
    }

    public function ubahKonten($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapusKonten($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM lowongan WHERE id='$id'") or die($db->error);
    }
}
