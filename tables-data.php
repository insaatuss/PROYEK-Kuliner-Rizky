<?php

require_once ("config/connection.php");
require_once ("config/session_check.php");

if ($sessionStatus == false) {
  header("Location: index.php");
}

$query ="SELECT * FROM produk";

$result = mysqli_query($mysqli, $query);

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kuliner Rizki | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="penyimpanan/KR.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!--Info delete-->
  <script type="text/javascript">
		function confirm_delete() {
			return confirm("Anda Yakin?");
		}
	</script>

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
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="penyimpanan/KR.png" alt="">
        <span class="d-none d-lg-block">Kuliner Rizki</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!-- End Search Icon-->


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
      <h1>Data Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="tables-data.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <a class="btn btn-primary mb-4" href="tambah-produk.php" >Tambah Produk</a>

              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table datatable responsive-utilities">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Gambar Produk</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Deskripsi Produk</th>
                      <th scope="col">Kategori Produk</th>
                      <th scope="col">Harga Produk</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $i = 1;

                    foreach( $result as $produk) {

                        if ( $produk['gambar_produk'] == null || empty($produk["gambar_produk"]) ) {
                            $produk['gambar_produk'] = 'penyimpanan/_default.jpg';
                        }

                    echo "";
                    echo '<tr>
                            <th scope="row">' . $i++ . '</th>
                            <td> <img src="' . $produk["gambar_produk"] . '"/> </td>
                            <td>' . $produk["nama_produk"] . '</td>
                            <td>' . $produk["deskripsi_produk"] . '</td>
                            <td>' . $produk["kategori"] . '</td>
                            <td>' . $produk["harga_produk"] . '</td>
                            <td>
                                <a href="delete.php?id='.$produk["id_produk"] . '" onclick=" return confirm_delete()" class="btn btn-danger" >Delete</a>
                                <a href="forms-layouts.php?id='.$produk["id_produk"] . '" class="btn btn-info" >edit</a>
                            </td>
                         </tr>';
                        }
                  
                    ?>
                  </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
              </div>
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
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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