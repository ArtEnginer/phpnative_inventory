
<?php 


include 'koneksidb.php'; 


?>


<?php
             
                $no=0;
                $mulai   = $_GET['awal'];
                $selesai = $_GET['akhir'];
              

             


                      $sql="select * FROM tbbarang_masuk INNER JOIN  supplier ON tbbarang_masuk.id_supplier = supplier.id_supplier INNER JOIN  data_barang ON tbbarang_masuk.id_barang = data_barang.id_barang AND 
                     tbbarang_masuk.tgl_masuk BETWEEN '$mulai' AND '$selesai' ORDER BY tbbarang_masuk.id_brgmasuk DESC";



                $ress = mysqli_query($kon, $sql);

              ?>


<html>

<head>
  <title>Laporan Transaksi barang Masuk </title>







  <div class="box-body">
    <div class="form-panel">
      <table width="100%">



        <html lang="en">

        <head>


          <title><?php echo $pagetitle ?></title>

          <link href="foto/logo.png" rel="icon" type="images/x-icon">



        </head>

<body>
  <section id="header-kop">
    <div class="container-fluid">
      <table class="table border">
        <tbody>


          <tr>
            <left>

            </left>



            <center>

              <b>Laporan Transaksi  barang Masuk </b> <br>
            <br>
             <br>

            </center>


            </td>
          </tr>
        </tbody>
      </table>


      </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Tanggal Cetak  :  <?php
 $tgl=date('d-m-Y');
 echo $tgl;
 ?></b><br> 
          <br>
           <br>

          <table width="20%">

                    
 
  


   


   
  <tr>
    <tr>
    <td width="40%"><b>Dari Tgl</b></td>
    <td width="2%"><b> : </b></td>
    <td width="20%"> <?php echo $mulai;?></td>
   
</tr>


 <tr>
    <tr>
    <td width="40%"><b>Sampai Tgl</b></td>
    <td width="2%"><b> : </b></td>
    <td width="20%"> <?php echo $selesai;?></td>
   

   

</tr>



  </td>
   
  </tr>
 
</table>


      <hr class="line-top" />
    </div>
  </section>
  <section id="body-of-report">
    <div class="container-fluid">

   

      <table border style="width: 100%">
        <thead>
          <tr>




             <th><center>No </center></th>
                        <th><left>no transaksi</center></th>
                        <th><left>tanggal masuk</center></th>
                             <th><left>supllier</center></th>
                         <th><left>nama barang</center></th>
                        <th><left>jumlah masuk</center></th>
                      

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
                        
                      <td><left><?php echo $data['id_brgmasuk']; ?></center></td>
                      <td><left><?php echo $data['tgl_masuk']; ?></center></td>
                    <td><left><?php echo $data['nama_supplier']; ?></center></td>
                    <td><left><?php echo $data['nama_barang']; ?></center></td>
                    <td><left><?php echo $data['jumlah']; ?></center></td>
                     

            <tr>












            <?php
          }
            ?>
          </tbody>



      </table>

    </div>
    </div>
    </div>
    </div>

    <script>
      window.print();
    </script>

</body>

</html>