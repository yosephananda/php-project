<?php
require '../Config/connect.php';
require '../Config/func_users.php';

$userdata = tampiluser("SELECT * FROM acc_users");


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <button class="btn btn-primary" type="button">Tambah Akun</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php foreach( $userdata as $row ) : ?>
                  <tr>
                    <td><?= $row["id"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["password"]; ?></td>
                    <td>
                      <button class="btn btn-success" type="button" name="ubahakun" id="ubahakun">Ubah</button>
                      <button class="btn btn-danger" type="button " name="hapusakun" id="hapusakun">Hapus</button>
                    </td>
                  </tr>
                  <?php endforeach; ?>


                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>