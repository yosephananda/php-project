<?php 
    require_once ('../Config/connect.php');
    require_once ('../Models/database.php');

    include '../Models/m_konten.php';
   
    $koneksi = new Database($host, $user, $pass, $dbase);

    $konten = new Konten($koneksi);
  
    $idkonten = $_POST['id_konten'];
    $perusahaan = $koneksi->conn->real_escape_string($_POST['perusahaan']);
    $kategori = $koneksi->conn->real_escape_string($_POST['kategori']);
    $alamat = $koneksi->conn->real_escape_string($_POST['alamat']);
    $deskripsi = $koneksi->conn->real_escape_string($_POST['deskripsi']);
    
    $logo = $_FILES['logo']['name'];

    $extensi = explode(".", $_FILES['logo']['name']);
    $namabaru = $idkonten . "." . end($extensi);
    $sumber = $_FILES['logo']['tmp_name'];

    //$passhash = password_hash($password, PASSWORD_DEFAULT);

    if( $logo == ''){
        $konten->ubahKonten("UPDATE lowongan SET id='$idkonten',perusahaan='$perusahaan',kategori='$kategori',alamat='$alamat',deskripsi='$deskripsi',logo='$namabaru' WHERE id='$idkonten'");        
        echo "<script> window.location='?page=content';</script>";
    }else{
        $logo_awal = $konten->tampilKonten($idkonten)->fetch_object()->logo;
        unlink('../img/logo_lowong/' . $logo_awal);
        $upload = move_uploaded_file($sumber, '../img/logo_lowong/'.$namabaru);
        if($upload){
            $konten->ubahKonten("UPDATE lowongan SET id='$idkonten',perusahaan='$perusahaan',kategori='$kategori',alamat='$alamat',deskripsi='$deskripsi',logo='$namabaru' WHERE id='$idkonten'");       
            echo "<script> window.location='?page=content';</script>";
        }else{
            echo "<script>alert('Update gagal.')</script>";
        }
    }   
    
    

    // if( $idakun == $idakun ){
    //     $akun->ubahAkun("UPDATE acc_users SET id='$idakun',username='$username',fullname='$fullname',email='$email',password='$passhash',foto='$namabaru' WHERE id='$idakun'");        
    //     //echo "<script>window.location='?page=akun';</script>";
    // }else{
    //         echo "<script>alert('Tidak berhasil!');</script>";
    //     }    

?>