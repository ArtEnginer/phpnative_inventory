
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
            <h1 class="m-0">Dashboard</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">


          <?php $tampil2=mysqli_query($kon, "select * from data_barang ");
                        $total2=mysqli_num_rows($tampil2);
                    ?>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total2; ?></h3>

                <p>Total Data Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="data_barang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

           <?php $total3=mysqli_query($kon, "select * from supplier ");
                        $total3=mysqli_num_rows($total3);
                    ?>



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total3; ?><sup style="font-size: 20px"></sup></h3>

                <p>Data Supplier</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="data_supplier.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

       


             <?php


                    

                    $query1="SELECT * FROM data_barang  ";
                    

                    $tampil=mysqli_query($kon, $query1) or die(mysqli_error());

                     $subtotal=0;
                     
                     while($data=mysqli_fetch_array($tampil)) { 

                     
                      $total = $data['stok'] ;
                      
                      $subtotal = $subtotal + $total;
                

                    ?>

            


                    
                     


                     
                   <?php   
              } 
              ?>
                      


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $subtotal; ?></h3>

                <p>Total Stok Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="data_barang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>


            </div>

             
          

          </div>


<?php $total4=mysqli_query($kon, "select * from admin ");
                        $total4=mysqli_num_rows($total4);
                    ?>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $total4; ?></h3>

                <p>Pengguna Sistem</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="data_admin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
     
         
          <!-- /.col -->
 <!-- PIE CHART -->
            
            <!-- /.card -->

            <!-- /.col (LEFT) -->
          <div class="col-md-8">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Selamat Datang <?php echo $_SESSION['username']?> </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <p>gunakan Sistem inventori barang  untuk mengatur
persediaan barang </p>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
   </div>
      </div>


 <?php



              

                    $query124="SELECT * FROM data_barang WHERE stok < 500 ";


                    

                    $tampilsa=mysqli_query($kon, $query124) or die(mysqli_error());

                

                    ?>

          <div class="row">
          <div class="col-md-4">
            <div class="card card-primary shadow-none">
              <div class="card-header">
                <h3 class="card-title">Stok Barang Minimum < 500</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">

                  <thead>
                    
                    <tr>
                    <th><center>No </center></th>
                        <th><left>nama  brg</center></th>
                  
                         <th><left>stok</center></th>
                    
                     
                         
                    </tr>
                  </thead>

                  <?php 

                     $no=0;
                     while($datax=mysqli_fetch_array($tampilsa))
                    {

                     

                     $no++; 


                      ?>
                  <tbody>
                    <tr>
                     <td><center><?php echo $no; ?></center></td>
                        
                      <td><left><?php echo $datax['nama_barang']; ?></center></td>
                    
                    <td><left><?php echo $datax['stok']; ?></center></td>
                  
                    
                        
                      </center>

                        </td>
                      
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
          <!-- /.col -->

          
                    <?php


                       $tgl = date('Y-m-d');

                    $query96="SELECT * FROM tbbarang_masuk INNER JOIN  supplier ON tbbarang_masuk.id_supplier = supplier.id_supplier INNER JOIN  data_barang ON tbbarang_masuk.id_barang = data_barang.id_barang WHERE tgl_masuk='$tgl'  LIMIT 5 ";




                    

                    $tampil96=mysqli_query($kon, $query96) or die(mysqli_error());



                

                    ?>


          <div class="col-md-4">
            <div class="card card-success shadow-sm">
              <div class="card-header">
                <h3 class="card-title">5 Transaksi Terakhir Data Barang Masuk hari ini</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table class="table">

                  <thead>
                    
                    <tr>
                    <th><center>No </center></th>
                     
                        <th><left>tanggal</center></th>
                        
                         <th><left>brg</center></th>
                        <th><left>jumlah </center></th>
                    
                         
                    </tr>
                  </thead>

                  <?php 

                     $no=0;
                     while($datak=mysqli_fetch_array($tampil96))
                    {

                     

                     $no++; 


                      ?>
                  <tbody>
                    <tr>
                     <td><center><?php echo $no; ?></center></td>
                        
                     
                      <td><left><?php echo $datak['tgl_masuk']; ?></center></td>
                   
                    <td><left><?php echo $datak['nama_barang']; ?></center></td>
                    <td><left><?php echo $datak['jumlah']; ?></center></td>


                      
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
          <!-- /.col -->


       
                    <?php


                       $tgl = date('Y-m-d');

                    $query66="SELECT * FROM tbbarang_keluar INNER JOIN  data_barang ON tbbarang_keluar.id_barang = data_barang.id_barang WHERE tgl_keluar='$tgl'  LIMIT 5 ";




                    

                    $tampil66=mysqli_query($kon, $query66) or die(mysqli_error());



                

                    ?>




           <div class="col-md-4">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">5 Transaksi Terakhir Barang Keluar hari ini</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
             <table class="table">

                  <thead>
                    
                    <tr>
                    <th><center>No </center></th>
                        
                        <th><left>tanggal</center></th>
                        
                         <th><left>brg</center></th>
                        <th><left>jumlah </center></th>
                     
                         
                    </tr>
                  </thead>

                  <?php 

                     $no=0;
                     while($data7=mysqli_fetch_array($tampil66))
                    {

                     

                     $no++; 


                      ?>
                  <tbody>
                    <tr>
                     <td><center><?php echo $no; ?></center></td>
                        
                             
                 
                      <td><left><?php echo $data7['tgl_keluar']; ?></center></td>
         
                    <td><left><?php echo $data7['nama_barang']; ?></center></td>
                    <td><left><?php echo $data7['jumlah_keluar']; ?></center></td>
                    

                        
                    
                      
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
          <!-- /.col -->

       
            
        
       </div>
     
         </div>

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
