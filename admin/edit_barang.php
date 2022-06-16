<?php


include 'koneksidb.php';
include 'template/header.php';

include 'template/sidebar.php';



?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">edit data </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
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
        <!-- left column -->
        <div class="col-md-6">
          <?php
          $id_barang = $_GET['id_barang'];
          $sql = mysqli_query($kon, "SELECT * FROM data_barang WHERE id_barang='$id_barang'");
          if (mysqli_num_rows($sql) == 0) {
            header("Location: data_barang.php");
          } else {
            $row = mysqli_fetch_assoc($sql);
          }
          if (isset($_POST['update'])) {
            $nama_barang = $_POST['nama_barang'];
            $id_jenis  = $_POST['id_jenis'];
            $stok = $_POST['stok'];
            $nama_satuan  = $_POST['nama_satuan'];
            $warna  = $_POST['warna'];
            $ukuran  = $_POST['ukuran'];



            $update = mysqli_query($kon, "UPDATE data_barang SET nama_barang='$nama_barang', id_jenis='$id_jenis', stok='$stok',id_satuan='$nama_satuan', warna='$warna', ukuran='$ukuran' WHERE id_barang='$id_barang'") or die(mysqli_error());

            if ($update) {
              echo "<script>window.location = 'data_barang.php'</script>";
              $_SESSION['flash'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Data berhasil diupdate!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            } else {
              $_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Data gagal diupdate!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
          }
          ?>


          <!-- general form elements -->
          <!-- Horizontal Form -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">edit data barang</h3>
            </div>


            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

              <div class="card-body">




                <div class="form-group">
                  <label> nama barang</label>
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" placeholder=" nama supplier">
                </div>




                <div class="form-group">
                  <label>stok</label>
                  <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $row['stok']; ?>" placeholder="stok">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">jenis</label>


                  <select name="id_jenis" id="id_jenis" value="<?php echo $row['id_jenis']; ?>" class="form-control" required>
                    <?php
                    // if old data is available show them in the select box
                    if (isset($row['id_jenis'])) {
                      $id_jenis = $row['id_jenis'];
                      $query2 = "select * from jenis_barang order by id_jenis";
                      $tampil = mysqli_query($kon, $query2) or die(mysqli_error());
                      while ($data1 = mysqli_fetch_array($tampil)) {
                        if ($id_jenis == $data1['id_jenis']) {
                          echo "<option value='$data1[id_jenis]' selected>$data1[nama_jenis]</option>";
                        } else {
                          echo "<option value='$data1[id_jenis]'>$data1[nama_jenis]</option>";
                        }
                      }
                    } else {
                      $query2 = "select * from jenis_barang order by id_jenis";
                      $tampil = mysqli_query($kon, $query2) or die(mysqli_error());
                      while ($data1 = mysqli_fetch_array($tampil)) {
                        echo "<option value='$data1[id_jenis]'>$data1[nama_jenis]</option>";
                      }
                    }

                    ?>

                  </select>


                </div>





                <div class="form-group">
                  <label for="exampleInputEmail1">satuan</label>





                  <select name="nama_satuan" id="nama_satuan" class="form-control select2" required>
                    <?php
                    // if old data is available show them in the select box
                    if (isset($row['id_satuan'])) {
                      $id_satuan = $row['id_satuan'];
                      $query2 = "select * from satuan order by id_satuan";
                      $tampil = mysqli_query($kon, $query2) or die(mysqli_error());
                      while ($data1 = mysqli_fetch_array($tampil)) {
                        if ($id_satuan == $data1['id_satuan']) {
                          echo "<option value='$data1[id_satuan]' selected>$data1[nama_satuan]</option>";
                        } else {
                          echo "<option value='$data1[id_satuan]'>$data1[nama_satuan]</option>";
                        }
                      }
                    } else {
                      $query2 = "select * from satuan order by id_satuan";
                      $tampil = mysqli_query($kon, $query2) or die(mysqli_error());
                      while ($data1 = mysqli_fetch_array($tampil)) {
                        echo "<option value='$data1[id_satuan]'>$data1[nama_satuan]</option>";
                      }
                    }

                    ?>

                  </select>
                </div>

                <div class="form-group">
                  <label>warna</label>
                  <input type="text" class="form-control" id="warna" name="warna" value="<?php echo $row['warna']; ?>" placeholder="stok">
                </div>

                <div class="form-group">
                  <label>ukuran</label>
                  <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?php echo $row['ukuran']; ?>" placeholder="stok">
                </div>

                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">

                  </div>
                </div>
              </div>
              <!-- /.card-body -->



              <div class="card-footer">
                <button type="submit" name="update" class="btn btn-primary">Simpan data</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->




        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.card-header -->
    <div class="card-body pt-0">
      <!--The calendar -->
      <div id="calendar" style="width: 100%"></div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
</div>

<!-- /.content-wrapper -->
<?php include 'template/footer.php'; ?>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="dist/js/pages/dashboard.js"></script>
</body>

</html>