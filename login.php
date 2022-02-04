<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="png">
    <title>GudJob - Login</title>
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
                <a href="login.php" class="btn btn-outline-success me-2" type="button">LOGIN</a>
            </form>     
            </ul>
        </div>
        </div>
    </nav>
<!-- end nav -->
<section>
        <img class="bg2" src="img/bg-page2.png" alt="">
        <div class="row box">
            <div class="col-12s">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Login User</h2>
                        <form class="loginform" action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="InputEmail1" class="form-label">Email :</label>
                                <input type="email" class="form-control" id="InputEmail1" required>
                            </div>
                            <div class="mb-3">
                                <label for="InputPassword1" class="form-label">Password :</label>
                                <input type="password" class="form-control" id="InputPassword1" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <p>Belum punya akun? <a href="register.php">Daftar</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>