

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/rsu.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Sistem inventory Barang</a>
        </div>


      </div>



      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">

            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          
          </li>
         
         
          
          
          
          <li class="nav-header">Data Master</li>
          
          <li class="nav-item">
            <a href="data_supplier.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                supplier
                              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Barang
                <i class="fas fa-angle- right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="data_barang.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data_satuan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Satuan Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="data_jenis.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="data_warna.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warna barang</p>
                </a>
              </li>
              
             <li class="nav-item">
                <a href="data_ukuran.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ukuran barang</p>
                </a>
              </li>
              
            </ul>
          </li>


           <li class="nav-header">Transaksi</li>
          
          <li class="nav-item">
            <a href="data_barangmasuk.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                    Data Barang Masuk
                              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_barangkeluar.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Barang Keluar
                <i class="fas fa-angle- "></i>
                <span class="badge badge-info "></span>
              </p>
            </a>
           
          </li>
        
         <li class="nav-header">Laporan</li>
          
          

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Cetak Laporan
                <i class="fas fa-angle- right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="data_laporanmasuk.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="data_laporankeluar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Barang Keluar</p>
                </a>
              </li>
              
              
             
              
            </ul>
          </li>




          <li class="nav-header">Setting</li>
          
          <li class="nav-item">
            <a href="data_admin.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                    Data penngguna sistem
                              </p>
            </a>
          </li>
        
        <li class="nav-header">Log out </li>
          
       


          <li class="nav-item">
            <a href="../logout.php" onclick="return confirm ('Apakah Anda Akan Keluar.?');" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                    keluar aplikasi
                              </p>
            </a>
          </li>


        </ul>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  