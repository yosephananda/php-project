<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GudJob.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/gudjob.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="png">
</head>
<body>
<!-- start nav -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container-fluid">
    <img src="img/logo.png" alt="">
    <a class="navbar-brand" href=""><span class="txtlogo">Gud</span>Job.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="">Home</a>
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
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="display-4">Dapatkan perkerjaan untukmu sekarang juga</h1>
              <input class="form-control" type="text" placeholder="Jabatan/Kata Kunci" aria-label="default input example">
              <input class="form-control" type="text" placeholder="Daerah, Kota, atau Kabupaten" aria-label="default input example">
              <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Profesi Pekerjaan">
               <datalist id="datalistOptions">
                  <option value="Akuntansi / Keuangan">
                  <option value="Sumber Daya Manusia / Personalia">
                  <option value="Penjualan / Marketing">
                  <option value="Seniman">
                  <option value="Pelayanan">
                  <option value="Hotel/Restoran">
                  <option value="Pendidikan / Akademik">
                  <option value="Komputer / Teknologi Informasi">
                  <option value="Teknik">
                  <option value="Manufaktur">
                  <option value="Konstruksi">
                  <option value="Sains">
                  <option value="Kesehatan">
               </datalist>
              <input class="btn" type="button" value="Cari">
            </div>
          </div>
        </div>
      </div>
</section>

<section class="tips">
  <img class="bg2" src="img/bg-page2.png" alt="">
  <div class="container box-tips">
    <div class="row text-start">
      <div class="col-12">        
        <p class="label-tips"><img src="img/info-circle-regular-24 1.svg" alt=""> Tips Karier</p>
        <h2 class="head-tips">Hal - hal yang <span class="head-mod">perlu kamu ingat </span></h2>
        <h2 class="head-tips2">sebelum melamar kerja</h2>
      </div>
    </div>
    <div class="row box">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Penggunaan kata yang formal</h2>
            <p class="card-text">Selalu menggunakan kata yang formal secara sopan, singkat dan jelas dalam mengisi data maupun surat lamaran kerjamu.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Berkas yang rapi dan elegan</h2>
            <p class="card-text">Selalu urutkan berkas - berkas lamaran kerjamu yang rapi agar mudah dilihat oleh penilai, dan gunakan template di CV-mu yang elegan dan indah.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Pelajari segala elemen penting saat interview</h2>
            <p class="card-text">Gunakan pakaian formal dan pelajari elemen - elemen penting saat interview.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="footer">
  <div class="container-fluid about">
    <div class="row abt1">
      <div class="col-4">
        <h4 class="jdlft">PROJECT</h4>
        <a class="nav-link" href="#">GudJob</a>
        <a class="nav-link" href="#">GudJob</a>
        <a class="nav-link" href="#">GudJob</a>
      </div>
      <div class="col-4">
        <h4 class="jdlft">SUPPORT</h4>
        <a class="nav-link" href="#">GudJob</a>
        <a class="nav-link" href="#">GudJob</a>
        <a class="nav-link" href="#">GudJob</a>
      </div>
      <div class="col-4">
        <h4 class="jdlft">COMPANY</h4>
        <a class="nav-link" href="#">GudJob</a>
        <a class="nav-link" href="#">GudJob</a>
        <a class="nav-link" href="#">GudJob</a>
      </div>
    </div>
    <div class="row abt2">
      <div class="col-6">
        <p class="foot1">Made with Bootstrap5</p>
      </div>
      <div class="col-6">
        <p class="footmod">Copyright by GudJob, inc</p>
      </div>
    </div>
  </div>
</section>
    
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>