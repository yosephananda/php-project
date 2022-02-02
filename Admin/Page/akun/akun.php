<?php

include 'Models/m_akun.php';

$akun = new Akun($koneksi);
?>

<div class="content-header mt-5">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Akun User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Akun</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="col">
              <h3 class="card-title">Akun User</h3>
            </div>
            <div class="col text-right">
              <a href="#" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-warning">Tambah</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="pesan"></div>
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Username</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $tampil = $akun->tampilAkun();
                while ($data_akun = $tampil->fetch_object()) :
                ?>
                  <tr>
                    <td align="center"><?= $no++ . '.' ?></td>
                    <td><?= $data_akun->username ?></td>
                    <td><?= $data_akun->fullname ?></td>
                    <td><?= $data_akun->email ?></td>
                    <td><?= $data_akun->password ?></td>
                    <td width="15%"><img src="../img/akun_user/<?= $data_akun->foto ?>" width="40%" class="img-circle elevation-2"></td>
                    <td><a id="ubah-akun" href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalubah" data-id="<?php echo $data_akun->id; ?>" data-username="<?php echo $data_akun->username; ?>" data-fullname="<?php echo $data_akun->fullname; ?>" data-email="<?php echo $data_akun->email; ?>" data-password="<?php echo $data_akun->password; ?>" data-foto="<?php echo $data_akun->foto; ?>"><i class="fa fa-pen"></i></a>
                      <a href="#" id="hapus_akun" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalhapus" data-id="<?php echo $data_akun->id; ?>"><i class="fa fa-trash-alt"></i></a>
                    </td>
                  </tr>
                <?php
                endwhile;
                ?>
              </tbody>

            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>

<!-- modal tambah -->

<div class="modal fade" id="modaltambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Akun</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" required>
            </div>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="submit" name="tambah" value="simpan" class="btn btn-primary">Tambah</button>
        </div>
      </form>

      <?php
      if (@$_POST['tambah']) {
        $email = $koneksi->conn->real_escape_string($_POST['email']);
        $password = $koneksi->conn->real_escape_string($_POST['password']);
        $username = $koneksi->conn->real_escape_string($_POST['username']);
        $fullname = $koneksi->conn->real_escape_string($_POST['fullname']);
        $foto = $_FILES['foto']['name'];

        $passhash = password_hash($password, PASSWORD_DEFAULT);

        $akun->tambahAkun($username, $fullname, $email, $passhash, $foto);

        header('Location: ?page=akun');
      }
      ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- modal ubah -->
<div class="modal fade" id="modalubah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Akun</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="form" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="hidden" id="id_akun" name="id_akun">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" required>
            </div>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="ubah" name="ubah" value="simpan" class="btn btn-success">Ubah</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- modal Hapus -->

<div class="modal fade" id="modalhapus">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Akun</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="id_akun" name="id_akun">
          <p>Apakah yakin akun di hapus?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="hapus" name="hapus" value="hapus" class="btn btn-danger">Hapus</button>
        </div>
      </form>
      <?php
      if (@$_POST['hapus']) {
        $idakun = $_POST['id_akun'];
        if ($idakun != '') {
          $foto_awal = $akun->tampilAkun($idakun)->fetch_object()->foto;
          unlink('img/akun_user/' . $foto_awal);

          $akun->hapusAkun($idakun);
          header('location: ?page=akun');
        } else {
          echo "<script>alert('Hapus Tidak Berhasil')</script>";
        }
      }
      ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<!-- DataTables  & Plugins -->
<script src="Assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="Assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="Assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="Assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="Assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="Assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="Assets/plugins/jszip/jszip.min.js"></script>
<script src="Assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="Assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="Assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="Assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="Assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- jQuery -->
<script src="Assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).on('click', '#hapus_akun', function() {
    var idakun = $(this).data('id');

    $('#modalhapus #id_akun').val(idakun);
  });

  $(document).on('click', '#ubah-akun', function() {
    var idakun = $(this).data('id');
    var username = $(this).data('username');
    var fullname = $(this).data('fullname');
    var email = $(this).data('email');
    var password = $(this).data('password');
    var foto = $(this).data('foto');

    $('#modalubah #id_akun').val(idakun);
    $('#modalubah #username').val(username);
    $('#modalubah #fullname').val(fullname);
    $('#modalubah #email').val(email);
    $('#modalubah #password').val(password);
    $('#modalubah #foto').attr("src", "img/akun_user/" + foto);
  });

  $(document).ready(function(e) {
    $('#form').on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: 'Models/ubah_akun.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(pesan) {
          $('.table').html(pesan);
        }
      })
    }))
  });
</script>