


<?php 


include 'koneksidb.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 

include 'scrp.php'; 


?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">input transaksi barang masuk </h1>
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
$query = mysqli_query($kon, "SELECT max(id_brgmasuk) as max_kode FROM tbbarang_masuk");
$data = mysqli_fetch_array($query);
// Sudah dapat nih gan
$id_brgmasuk = $data['max_kode'];

// Oke sekarang kita ambil bagian angkanya saja dan membuang string yang ada diawal
$no = substr($id_brgmasuk, 5, 4);
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
$str = 'T-BM-';

// perintah sprintf("%04s", $no); digunakan untuk memformat string sebanyak 4 karakter
// misal sprintf("%04s", 2); maka akan dihasilkan '0002'
// atau misal sprintf("%04s", 1); maka akan dihasilkan string '0001'
$newKode = $str . sprintf("%03s", $no);



//proses
   if(isset($_POST['simpan'])){

$id_brgmasuk  = $_POST['id_brgmasuk'];
$id_barang = $_POST['id_barang'];
$id_supplier  = $_POST['id_supplier'];
$jumlah = $_POST['jumlah'];
$tgl_masuk  = $_POST['tgl_masuk'];
$warna  = $_POST['warna'];
$ukuran  = $_POST['ukuran'];
$status  = "ok";


$sql    = "SELECT * FROM data_barang WHERE id_barang='$id_barang' AND warna='$warna' AND ukuran='$ukuran' ";




$query  = mysqli_query($kon,$sql);
$res    = mysqli_fetch_array($query);
$stok   = $res['stok'];
$stok_akhir = $res['stok'] + $jumlah;


    $sql_update     = "UPDATE data_barang SET stok = '$stok_akhir' WHERE id_barang='$id_barang' AND warna='$warna' AND ukuran='$ukuran'";
    $update_data  = mysqli_query($kon, $sql_update);

 
    $cek = mysqli_num_rows(mysqli_query($kon,"SELECT * FROM tbbarang_masuk WHERE id_brgmasuk='$id_brgmasuk'"));

    if ($cek > 0){
    echo "<script>window.alert('data obat sudah ada coba cek ulang')
    window.location='data_barangmasuk.php'</script>";
    }else {
    mysqli_query($kon, "INSERT INTO tbbarang_masuk (id_brgmasuk, id_barang,id_supplier,jumlah,tgl_masuk,warna,ukuran,status) VALUES ('$id_brgmasuk', '$id_barang', '$id_supplier', '$jumlah', '$tgl_masuk', '$ukuran', '$warna', '$status')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='data_barangmasuk.php'</script>";
    }
    }
    ?>


            <!-- general form elements -->
            <!-- Horizontal Form -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">input data</h3>
              </div>

             
              <!-- /.card-header -->
              <!-- form start -->
             <form class="forms-sample" action="input_barangmasuk.php" method="post" >
                <div class="card-body">

 


                  <div class="form-group">
                     <label> id transaksi</label>
                   

                       <input name="id_brgmasuk" type="text" id="id_brgmasuk" class="form-control" placeholder="Tidak perlu di isi" value="<?php echo $newKode; ?>" autofocus="on" readonly="readonly" />


                  </div>
                 
                
                 

                     <div class="form-group">
                     <label>tanggal masuk</label>
                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?php echo date("Y-m-d"); ?>" placeholder="tgl_masuk">
                  </div>



                   <div class="form-group">
                      <label for="exampleInputEmail1">supplier</label>
                      
 <select name="id_supplier" id="id_supplier" class="form-control select2" style="width: 100%;" required>
                        
                              <?php 
                    $query2="select * from supplier order by id_supplier";
                    $tampil=mysqli_query($kon, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['id_supplier'];?>"> <?php echo $data1['nama_supplier'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 


                    </div>


                   <div class="form-group">
                      <label for="exampleInputEmail1">nama barang</label>
                      

                      <select name="id_barang" id="id_barang" class="form-control select2" style="width: 100%;" required>
                           
                              <?php 
                    $query2="select * from data_barang order by id_barang";
                    $tampil=mysqli_query($kon, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['id_barang'];?>"><?php echo $data1['nama_barang'];?>- <?php echo $data1['warna'];?>-<?php echo $data1['ukuran'];?></option>
                <?php

                 } 

                 ?>
                              
                              </select> 


                    </div>


                   
 <div class="form-group">
                     <label> jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah masuk">
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






<script src="dist/js/pages/dashboard.js"></script>

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
</body>
</html>
