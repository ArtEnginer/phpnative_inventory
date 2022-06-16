
<?php 


include 'koneksidb.php'; 


?>


<html>

<head>
  <title>Data Barang Masuk</title>







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

              <b> Data barang Masuk </b> <br>
              <br>
             <br>

            </center>


            </td>
          </tr>
        </tbody>
      </table>
      <hr class="line-top" />
    </div>
  </section>
  <section id="body-of-report">
    <div class="container-fluid">

      <?php

  

       $query1="SELECT * FROM tbbarang_masuk INNER JOIN  supplier ON tbbarang_masuk.id_supplier = supplier.id_supplier INNER JOIN  data_barang ON tbbarang_masuk.id_barang = data_barang.id_barang";

      $tampil = mysqli_query($kon, $query1) or die(mysqli_error());
      ?>

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
        $no = 0;
        while ($data = mysqli_fetch_array($tampil)) {
          $no++; ?>
          <tbody>
            <tr>

              <td><center><?php echo $no; ?></center></td>
                        
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