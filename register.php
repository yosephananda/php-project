<?php
require 'Admin/Config/conn.php';
require 'Admin/Config/func_reg.php';

include 'Admin/Models/m_akun.php';

// $akun = new Akun($koneksi);

if (isset($_POST["daftar"])) {
    if (userdaftar($_POST) > 0) {
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="png">
    <title>GudJob - Register</title>
</head>

<body>
    <!-- start nav -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <img src="img/logo.png" alt="">
            <a class="navbar-brand" href="./"><span class="txtlogo">Gud</span>Job.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lowongan.php">Lowongan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <form class="container-fluid">
                        <a href="#" class="btn btn-outline-success me-2" type="button">LOGIN</a>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end nav -->
    <section>
        <img class="bg2" src="img/bg-page2.png" alt="">
        <div class="row box">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Register User</h2>
                        <form class="loginform" action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="InputUsername" class="form-label">Username :</label>
                                <input type="text" class="form-control" name="InputUsername" id="InputUsername" required>
                            </div>
                            <div class="mb-3">
                                <label for="InputFullname" class="form-label">Full Name :</label>
                                <input type="text" class="form-control" name="InputFullname" id="InputFullname" required>
                            </div>
                            <div class="mb-3">
                                <label for="InputEmail" class="form-label">Email :</label>
                                <input type="email" class="form-control" name="InputEmail" id="InputEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="InputPassword1" class="form-label">Password :</label>
                                <input type="password" class="form-control" name="InputPassword1" id="InputPassword1" required>
                            </div>
                            <div class="mb-3">
                                <label for="InputPassword2" class="form-label">Verifikasi Password :</label>
                                <input type="password" class="form-control" name="InputPassword2" id="InputPassword2" required>
                            </div>
                            <div class="mb-3">
                                <label for="InputFoto" class="form-label">Foto :</label>
                                <input type="file" class="form-control" name="InputFoto" id="InputFoto" required>
                            </div>
                            <button type="submit" name="daftar" id="daftar" class="btn btn-primary">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>