<?php
class Akun
{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampilAkun($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM acc_users";
        if ($id != null) {
            $sql .= " WHERE id = $id";
        }

        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tambahAkun($username, $fullname, $email, $password, $foto)
    {
        $foto = $_FILES['foto']['name'];
        $extensi = explode(".", $_FILES['foto']['name']);
        $namabaru = $username . "." . end($extensi);
        $sumber = $_FILES['foto']['tmp_name'];

        $upload = move_uploaded_file($sumber, '../img/akun_user/' . $namabaru);
        if ($upload) {
            header('location: ?page=akun');
        } else {
            echo "<script>alert('Daftar gagal.')</script>";
        }

        $db = $this->mysqli->conn;
        $sql = "INSERT INTO acc_users VALUES ('', '$username','$fullname','$email','$password','$namabaru' )";
        $db->query($sql) or die($db->error);
    }

    public function ubahAkun($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapusAkun($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM acc_users WHERE id='$id'") or die($db->error);
    }

    public function tampilAdmin($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM acc_adm";
        if ($id != null) {
            $sql .= " WHERE id = $id";
        }

        $query = $db->query($sql) or die($db->error);
        return $query;
    }
}
