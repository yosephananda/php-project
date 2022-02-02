<?php

require 'conn.php';

function userdaftar ($data){
    global $conn;

    $email = htmlspecialchars( $data["InputEmail"] );
    $username = htmlspecialchars( $data["InputUsername"] );
    $fullname = htmlspecialchars( $data["InputFullname"] );

    $password1 = mysqli_real_escape_string( $conn, $data["InputPassword1"] );
    $password2 = mysqli_real_escape_string( $conn, $data["InputPassword2"] );

    //$foto = $_FILES['InputFoto']['name'];

    $emailcek = mysqli_query($conn, "SELECT email FROM acc_users WHERE email = '$email'");
    if( mysqli_fetch_assoc($emailcek) ){
        
        echo "<script>alert('Akun berhasil dibuat');</script>";
        
        return false;
    }

    if($password1 !== $password2){
        echo "<script>alert('Password verifikasi salah, harap isi dengan benar.');</script>";
      return false;
    }

    $extensi = explode(".", $_FILES['InputFoto']['name']);
    $namabaru = $username . "." . end($extensi);
    $sumber = $_FILES['InputFoto']['tmp_name'];

    $upload = move_uploaded_file($sumber, 'img/akun_user/' . $namabaru);
    if ($upload) {
        header('location: gudjob2/login.php');
    } else {
        echo "<script>alert('Daftar gagal.')</script>";
    }

    //$password = password_hash($password1, PASSWORD_DEFAULT);
    $password = $password1;

    mysqli_query($conn, "INSERT INTO acc_users VALUES('', '$username','$fullname','$email','$password','$namabaru')");

    header('Location: /gudjob2/login.php');

    return mysqli_affected_rows($conn);
}

?>