
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
            <h1 class="m-0">Riwayat Data Barang Keluar</h1>
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
          <div class="col-lg-12 col-6">
            <!-- small box -->
           <div class="card">
              <div class="card-header">
                   <a href="input_barangkeluar.php" class="btn btn-sm btn-primary"><i class=""></i> Tambah data</a>

                    <right> <a href="cetak_barangkeluar.php" class="btn btn-sm btn-primary" target="_blank"><i class=""></i> Cetak </a> </right>

              </div>
              

              <!-- /.card-header -->
              <div class="card-body p-0">


                   <?php


                    

                   $query1="SELECT * FROM tbbarang_keluar INNER JOIN  data_barang ON tbbarang_keluar.id_barang = data_barang.id_barang";
                    

                    $tampil=mysqli_query($kon, $query1) or die(mysqli_error());


                

                    ?>


                     <?php
             if(isset($_GET['aksi']) == 'hapus'){
        $id_brgkeluar = $_GET['id_brgkeluar'];
        $cek = mysqli_query($kon, "SELECT * FROM tbbarang_keluar WHERE id_brgkeluar='$id_brgkeluar'");
        if(mysqli_num_rows($cek) == 0){

          
        }else{
          $delete = mysqli_query($kon, "DELETE FROM tbbarang_keluar WHERE id_brgkeluar='$id_brgkeluar'");
          if($delete){
            
              echo "<script>alert('Data Berhasil di hapus gan!'); window.location = 'data_barangmasuk.php'</script>";



          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>




                  <table class="table">

                  <thead>
                    
                    <tr>
                    <th><center>No </center></th>
                        <th><left>no transaksi</center></th>
                        <th><left>tanggal keluar</center></th>
                           
                         <th><left>nama barang</center></th>
                          <th><left>warna </center></th>
                             <th><left>ukuran</center></th>
                        <th><left>jumlah keluar</center></th>
                        <th><center>aksi</center></th>
                         
                    </tr>
                  </thead>

                  <?php 

                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    {

                     

                     $no++; 


                      ?>
                  <tbody>
                    <tr>
                     <td><center><?php echo $no; ?></center></td>
                        
                             
                      <td><left><?php echo $data['id_brgkeluar']; ?></center></td>
                      <td><left><?php echo $data['tgl_keluar']; ?></center></td>
                  
                    <td><left><?php echo $data['nama_barang']; ?></center></td>
                                <td><left><?php echo $data['warna']; ?></center></td>
                            <td><left><?php echo $data['ukuran']; ?></center></td>
                    <td><left><?php echo $data['jumlah_keluar']; ?></center></td>
                      <td><center><div id="thanks">

                        
                       <a onclick="return confirm ('Yakin hapus <?php echo $data['id_brgkeluar'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Data pasien" href="data_barangkeluar.php?aksi=hapus&id_brgkeluar=<?php echo $data['id_brgkeluar'];?>">Hapus <span class="glyphicon glyphicon-trash"></a></center>

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
