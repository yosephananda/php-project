<?php 
    require_once ('../Config/connect.php');
    require_once ('../Models/database.php');

    include '../Models/m_akun.php';
   
    $koneksi = new Database($host, $user, $pass, $dbase);

    $akun = new Akun($koneksi);
  
    $idakun = $_POST['id_akun'];
    $username = $koneksi->conn->real_escape_string($_POST['username']);
    $fullname = $koneksi->conn->real_escape_string($_POST['fullname']);
    $email = $koneksi->conn->real_escape_string($_POST['email']);
    $password = $koneksi->conn->real_escape_string($_POST['password']);
    
    $foto = $_FILES['foto']['name'];

    $extensi = explode(".", $_FILES['foto']['name']);
    $namabaru = $username . "." . end($extensi);
    $sumber = $_FILES['foto']['tmp_name'];

    echo $sumber;
    $passhash = password_hash($password, PASSWORD_DEFAULT);

    if( $foto == ''){
        $akun->ubahAkun("UPDATE acc_users SET id='$idakun',username='$username',fullname='$fullname',email='$email',password='$passhash',foto='$namabaru' WHERE id='$idakun'");        
        echo "<script> window.location='?page=akun';</script>";
    }else{
        $foto_awal = $akun->tampilAkun($idakun)->fetch_object()->foto;
        unlink('../../img/akun_user/' . $foto_awal);
        $upload = move_uploaded_file($sumber, '../../img/akun_user/'.$namabaru);
        if($upload){
            $akun->ubahAkun("UPDATE acc_users SET id='$idakun',username='$username',fullname='$fullname',email='$email',password='$passhash',foto='$namabaru' WHERE id='$idakun'");       
            echo "<script> window.location='?page=akun';</script>";
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

 <!-- <img src="/Admin/img/akun_user/" alt=""> -->