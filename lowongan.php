<?php

require 'Admin/Config/connect.php';
require 'Admin/Models/database.php';

$koneksi = new Database($host, $user, $pass, $dbase);

include 'Admin/Models/m_konten.php';

$konten = new Konten($koneksi);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link rel="stylesheet" href="css/lowongan.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="png">
    <title>GudJob - Lowongan</title>
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

        <div class="card-header mt-3 ">
            <div class="col text-center">
                <h3 class="card-title">List Lowongan</h3>
            </div>
            <div class="col text-right">
                <a href="#" class="btn btn-sm btn-primary">Buka Lowongan</a>
            </div>
        </div>

        <?php
        $tampil = $konten->tampilKonten();
        while ($data_konten = $tampil->fetch_object()) :
        ?>

            <div class="card border-dark mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="Admin/img/logo_lowong/<?= $data_konten->logo ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data_konten->perusahaan ?></h5>
                            <p class="card-text"><?= $data_konten->kategori ?></p>
                            <a class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" data-id="<?= $data_konten->id ?>" aria-controls="offcanvasScrolling" id="detail_konten" >Detail</a>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-end" style="width: 950px; margin-top: 90px;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel"><?= $data_konten->perusahaan ?></h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <center>
                        <img src="Admin/img/logo_lowong/<?= $data_konten->logo ?>" width="30%" class="img-fluid rounded-start" alt="...">
                    </center>
                    <h3> <?= $data_konten->kategori ?> </h3>
                    <h4>Deskripsi :</h4>
                    <p> <?= $data_konten->deskripsi ?> </p>
                </div>
            </div>

        <?php
        endwhile;
        ?>
    </section>


    <!-- <?php
            $idkonten = isset($_GET['id']) ? $_GET['id'] * 1 : 0;
            $tampilcan = $konten->tampilKonten($idkonten);
            while ($tampil_konten = $tampilcan->fetch_object()) :
            ?>
        <div class="offcanvas offcanvas-end" style="width: 950px; margin-top: 90px;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel"><?= $tampil_konten->perusahaan ?></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <center>
                    <img src="Admin/img/logo_lowong/<?= $tampil_konten->logo ?>" width="30%" class="img-fluid rounded-start" alt="...">
                </center>
                <h3> <?= $tampil_konten->kategori ?> </h3>
                <h4>Deskripsi :</h4>
                <p> <?= $tampil_konten->deskripsi ?> </p>
            </div>
        </div>
    <?php endwhile; ?> -->

    <script src="js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).on('click', '#detail_konten', function() {
            var idkonten = $(this).data('id');

            $('#offcanvasScrolling #testid').val(idkonten);
        });
    </script>

</body>

</html>