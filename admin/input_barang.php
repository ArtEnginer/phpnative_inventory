
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
            <h1 class="m-0">input data barang </h1>
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




// Mencari data (kode) yang paling besar (terakhir) dari database
$query = mysqli_query($kon, "SELECT max(id_barang) as max_kode FROM data_barang");
$data = mysqli_fetch_array($query);
// Sudah dapat nih gan
$id_barang = $data['max_kode'];

// Oke sekarang kita ambil bagian angkanya saja dan membuang string yang ada diawal
$no = substr($id_barang, 3, 4);
// Contoh kodenya 'B0001'
// Setelah dibuang string 'B', hasilnya menjadi '0001'
// maksud substr diatas adalah mengambil 4 katakter dimulai dari index ke 1 (karakter ke-2)

// Selanjutnya kita convert ke tipe data Integer agar bisa di Increment (ditambah)
$no = (int) $no;
// Ditambah 1
$no += 1;
/**
 * Atau bisa gunakan cara ini 
 * $no++;
 * $no = $no + 1;
 * bebas ya, silahkan pilih sesuai selera :v
 */

//  Oke next kita bakal generate kode otomatisnya
$str = 'BRG';

// perintah sprintf("%04s", $no); digunakan untuk memformat string sebanyak 4 karakter
// misal sprintf("%04s", 2); maka akan dihasilkan '0002'
// atau misal sprintf("%04s", 1); maka akan dihasilkan string '0001'
$newKode = $str . sprintf("%03s", $no);



//proses
   if(isset($_POST['simpan'])){

$id_barang  = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$id_jenis  = $_POST['id_jenis'];
$stok = $_POST['stok'];
$id_satuan  = $_POST['id_satuan'];
$warna  = $_POST['warna'];
$ukuran  = $_POST['ukuran'];
 $keterangan  = $_POST['keterangan'];

    $cek = mysqli_num_rows(mysqli_query($kon,"SELECT * FROM data_barang WHERE nama_barang='$nama_barang'"));

    if ($cek > 0){
    echo "<script>window.alert('data obat sudah ada coba cek ulang')
    window.location='data_barang.php'</script>";
    }else {
    mysqli_query($kon, "INSERT INTO data_barang (id_barang, nama_barang,id_jenis,stok,id_satuan,warna,ukuran,keterangan) VALUES ('$id_barang', '$nama_barang', '$id_jenis', '$stok', '$id_satuan', '$warna', '$ukuran', '$keterangan')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='data_barang.php'</script>";
    }
    }
    ?>


            <!-- general form elements -->
            <!-- Horizontal Form -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">input data barang</h3>
              </div>

             
              <!-- /.card-header -->
              <!-- form start -->
             <form class="forms-sample" action="input_barang.php" method="post" >
                <div class="card-body">

 


                  <div class="form-group">
                     <label> id barang</label>
                   

                       <input name="id_barang" type="text" id="id_barang" class="form-control" placeholder="Tidak perlu di isi" value="<?php echo $newKode; ?>" autofocus="on" readonly="readonly" />


                  </div>
                 
                
                  <div class="form-group">
                     <label>nama barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="nama barang">
                  </div>


                   

                   <div class="form-group">
                      <label for="exampleInputEmail1">jenis</label>
                      

                      <select name="id_jenis" id="id_jenis" class="form-control" required>
                           
                              <?php 
                    $query2="select * from jenis_barang order by id_jenis";
                    $tampil=mysqli_query($kon, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['id_jenis'];?>"><?php echo $data1['nama_jenis'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 


                    </div>





                    <div class="form-group">
                      <label for="exampleInputEmail1">satuan</label>
                      

                      <select name="id_satuan" id="id_satuan" class="form-control" required>
                           
                              <?php 
                    $query2="select * from satuan order by id_satuan";
                    $tampil=mysqli_query($kon, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['id_satuan'];?>"><?php echo $data1['nama_satuan'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 


                    </div>


                     <div class="form-group">
                     <label>warna</label>


                    

                     <select name="warna" id="warna" class="form-control" required>
                           
                              <?php 
                    $query25="select * from warna order by warna";
                    $tampil6=mysqli_query($kon, $query25) or die(mysqli_error());
                    while($data19=mysqli_fetch_array($tampil6))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data19['warna'];?>"><?php echo $data19['warna'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 


                  </div>

                   <div class="form-group">
                     <label>ukuran</label>
            



                     <select name="ukuran" id="ukuran" class="form-control" required>
                           
                              <?php 
                    $query277="select * from ukuran order by ukuran";
                    $tampil77=mysqli_query($kon, $query277) or die(mysqli_error());
                    while($data177=mysqli_fetch_array($tampil77))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data177['ukuran'];?>"><?php echo $data177['ukuran'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 
                  </div>


                    <div class="form-group">
                     <label>stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" placeholder="stok">
                  </div>


                    <div class="form-group">
                     <label>keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan barang">
                  </div>


                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
               


                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan data</button>
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
