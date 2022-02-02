<?php

include 'Models/m_konten.php';

$konten = new Konten($koneksi);
?>

<div class="content-header mt-5">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Content</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Content</li>
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
              <h3 class="card-title">Content</h3>
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
                  <th width="4%">No</th>
                  <th>Perusahaan</th>
                  <th>Kategori</th>
                  <th>Alamat</th>
                  <th>Deskripsi</th>
                  <th>Logo</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $view = $konten->tampilKonten();
                while ($data_konten = $view->fetch_object()) :
                ?>
                  <tr>
                    <td align="center"><?= $no++ . '.' ?></td>
                    <td><?= $data_konten->perusahaan ?></td>
                    <td><?= $data_konten->kategori ?></td>
                    <td><?= $data_konten->alamat ?></td>
                    <td><?= $data_konten->deskripsi ?></td>
                    <td><img src="img/logo_lowong/<?= $data_konten->logo ?>" width="60%" class="img-circle elevation-2"></td>
                    <td><a id="ubah-konten" href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalubah" data-id="<?php echo $data_konten->id; ?>" data-user="<?php echo $data_konten->perusahaan; ?>" data-name="<?php echo $data_konten->kategori; ?>" data-alamat="<?php echo $data_konten->alamat; ?>" data-pass="<?php echo $data_konten->deskripsi; ?>" data-logo="<?php echo $data_konten->logo; ?>"><i class="fa fa-pen"></i></a>
                      <a href="#" id="hapus_konten" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalhapus" data-id="<?php echo $data_konten->id; ?>"><i class="fa fa-trash-alt"></i></a>
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
        <h4 class="modal-title">Tambah konten</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label for="perusahaan" class="col-sm-2 col-form-label">Perusahaan</label>
            <div class="col-sm-9 ml-3">
              <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Perusahaan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-9 ml-3">
              <input type="text" list="datalistOptions" class="form-control" id="kategori" name="kategori" placeholder="Katergori" required>
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
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-9 ml-3">
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-9 ml-3">
              <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="logo" class="col-sm-2 col-form-label">Logo</label>
            <div class="col-sm-9 ml-3">
              <input type="file" class="form-control" id="logo" name="logo" placeholder="logo" required>
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
        $perusahaan = $koneksi->conn->real_escape_string($_POST['perusahaan']);
        $kategori = $koneksi->conn->real_escape_string($_POST['kategori']);
        $alamat = $koneksi->conn->real_escape_string($_POST['alamat']);
        $deskripsi = $koneksi->conn->real_escape_string($_POST['deskripsi']);
        $logo = $_FILES['logo']['name'];

        //$passhash = password_hash($password, PASSWORD_DEFAULT);

        $konten->tambahKonten($perusahaan, $kategori, $alamat, $deskripsi, $logo);

        header('Location: ?page=content');
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
        <h4 class="modal-title">Ubah konten</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="form" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label for="perusahaan" class="col-sm-2 col-form-label">Perusahaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Perusahaan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-2 col-form-label">Fullname</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Fullname" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="hidden" id="id_konten" name="id_konten">
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <textarea type="deskripsi" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="logo" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="logo" name="logo" placeholder="Foto" required>
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
        <h4 class="modal-title">Hapus konten</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="id_konten" name="id_konten">
          <p>Apakah yakin konten di hapus?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="hapus" name="hapus" value="hapus" class="btn btn-danger">Hapus</button>
        </div>
      </form>
      <?php
      if (@$_POST['hapus']) {
        $idkonten = $_POST['id_konten'];
        if ($idkonten != '') {
          $foto_awal = $konten->tampilKonten($idkonten)->fetch_object()->logo;
          unlink('img/logo_lowong/' . $foto_awal);

          $konten->hapusKonten($idkonten);
          header('location: ?page=content');
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
  $(document).on('click', '#hapus_konten', function() {
    var idkonten = $(this).data('id');

    $('#modalhapus #id_konten').val(idkonten);
  });

  $(document).on('click', '#ubah-konten', function() {
    var idkonten = $(this).data('id');
    var perusahaan = $(this).data('user');
    var kategori = $(this).data('name');
    var alamat = $(this).data('alamat');
    var pass = $(this).data('pass');
    var logo = $(this).data('logo');

    $('#modalubah #id_konten').val(idkonten);
    $('#modalubah #perusahaan').val(perusahaan);
    $('#modalubah #kategori').val(kategori);
    $('#modalubah #alamat').val(alamat);
    $('#modalubah #deskripsi').val(pass);
    $('#modalubah #logo').attr("src", "img/logo_lowong/" + logo);
  });

  $(document).ready(function(e) {
    $('#form').on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: 'Models/ubah_konten.php',
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