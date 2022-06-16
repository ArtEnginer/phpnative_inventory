
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
            <h1 class="m-0">Laporan Data Transaksi Barang keluar </h1>
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
          <div class="col-md-3">

            <!-- Profile Image -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Laporan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                     <form method="get" name="laporan" onSubmit="return valid();"> 
                <div class="card-body">
                  <div class="form-group">
                     <label>Tanggal Awal</label>
                    <input type="date" class="form-control" name="awal" placeholder="From Date(yyyy/mm/dd)"  value="<?php echo $mulai; ?>" required>
                  </div>
                  <div class="form-group">
                     <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" name="akhir" placeholder="To Date(yyyy/mm/dd)" value="<?php echo $selesai; ?>"  required>
                  </div>

                  <div class="card-footer">

                  <button type="submit"  name="submit"  class="btn btn-primary">Lihat Laporan</button>

                 </div>

                  </div>
                </div>

                  </div>
            <!-- /.card -->

            <!-- About Me Box -->
           
           
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">laporan Transaksi Barang keluar </a></li>
                 
                </ul>
              </div><!-- /.card-header -->

              <?php
              if(isset($_GET['submit'])){
                $no=0;
                $mulai   = $_GET['awal'];
                $selesai = $_GET['akhir'];
              

            
                    $sql="select * FROM tbbarang_keluar INNER JOIN data_barang ON tbbarang_keluar.id_barang = data_barang.id_barang AND 
                     tbbarang_keluar.tgl_keluar BETWEEN '$mulai' AND '$selesai' ORDER BY tbbarang_keluar.id_brgkeluar DESC";


                      


                $ress = mysqli_query($kon, $sql);
              ?>

                <div class="card">
              <div class="card-header">

         

                <h3 class="card-title"> Cetak laporan Transaksi Dari Tanggal - <?php echo $mulai; ?> s/d <?php echo $selesai; ?> </h3>
              </div>



<div class="card-body p-0">


                <table class="table table-sm">
                  <thead>
                    <tr>
                    <th><center>No </center></th>
                        <th><left>no transaksi</center></th>
                        <th><left>tanggal keluar</center></th>
                     
                         <th><left>nama barang</center></th>
                        <th><left>jumlah keluar</center></th>
                    </tr>
                  </thead>

                      <?php 

                      $i = 0;
                  
                     while($data=mysqli_fetch_array($ress)) { 
                          $i++; 
                     
                      ?>



                  <tbody>
                    <tr>
                        <td><center><?php echo $i; ?></center></td>
                        
                       <td><left><?php echo $data['id_brgkeluar']; ?></center></td>
                      <td><left><?php echo $data['tgl_keluar']; ?></center></td>

                    <td><left><?php echo $data['nama_barang']; ?></center></td>
                    <td><left><?php echo $data['jumlah_keluar']; ?></center></td>

                    </tr>

                     <?php   
              } 
              ?>
                  </tbody>
                </table>

 
              </div>

           

                 
             
              <!-- /.card-body -->
            </div>


            <!-- /.card -->
          </div>

<div class="text-right">
  
                  <a href="cetak_laporan.php?awal=<?php echo $mulai;?>&akhir=<?php echo $selesai;?>" target="_blank" class="btn btn-primary">Cetak <i class="
                    "></i></a>
           
                
                  </div>
 <?php }?>
            <!-- /.card -->
          </div>

          
          <!-- /.col -->
        </div>


          </div>



        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
