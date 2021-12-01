<?php

// Pemanggilan file koneksi
require_once("config/connection.php");

require_once("config/session_check.php");

if ($sessionStatus == false) {
    header("Location: index.php");
}

// Status tidak error
$error = 0;

// Mendapatkan data Kode Barang




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tambah Produk | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style2.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="tables-data.php" class="logo d-flex align-items-center">
        <img src="assets/img/KR.png" alt="">
        <span class="d-none d-lg-block">Kuliner Rizki</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

      <li class="nav-item  pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" >
          <span class="d-none d-md-block  ps-2">Dashboard | <?=$_SESSION['email']?> </span>
        </a><!-- End Profile Iamge Icon -->

        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a href="tables-data.php" class="nav-link collapsed">
        <i class="bi bi-layout-text-window-reverse"></i>
        <span>Data Tabel</span>
      </a>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="seo.php">
        <i class="bi bi-card-list"></i>
        <span>Pengatur SEO</span>
      </a>
    </li><!-- End Pengaturan SEO -->

  

  <li class="nav-heading">Pages</li>

  
  <li class="nav-item">
    <a class="nav-link collapsed" href="data-admin.php">
      <i class="bi bi-card-list"></i>
      <span>Data Admin</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Log out</span>
    </a>
  </li><!-- End Login Page Nav -->

  

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tabel Tambah Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="tables-data.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Tambah Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Produk</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="action.php" method="POST" enctype="multipart/form-data">
              
              <div class="col-md-12">
                  <label for="gambar_produk" class="form-label">Gambar Produk</label>
                  <input type="file" name="gambar" class="form-control" id="gambar_produk" required >
                </div>

                <div class="col-md-12">
                  <label for="nama_produk" class="form-label">Nama Produk</label>
                  <input type="text" class="form-control" id="nama_produk" name="nama"  placeholder="Nama Produk" required>
                </div>

                <div class="col-md-12">
                  <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                  <textarea name="deskripsi" id="deskripsi_produk" class="form-control" value="<?php echo $deskripsi?>" placeholder="Deskripsi Produk" required></textarea>
                </div>
                
                <div class="col-md-4">
                  <label for="kategori_produk" class="form-label">Kategori Produk</label>
                  <select id="kategori_produk" class="form-select" name="kategori" required >
                      <option value="Minuman">Minuman</option>
                      <option value="Makanan">Makanan</option>
                  </select>
                </div>
                
                <div class="col-md-12">
                  <label for="harga_produk" class="form-label">Harga Produk</label>
                  <input type="number" class="form-control" id="harga_produk" name="harga"  placeholder="Harga Produk" required >
                </div>

                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>