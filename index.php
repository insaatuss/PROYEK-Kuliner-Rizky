<?php

require_once ("config/connection.php");

$query ="SELECT * FROM produk";

$result = mysqli_query($mysqli, $query);


$select = "SELECT * FROM seo";

$data = mysqli_query($mysqli, $select);
$data = mysqli_fetch_assoc ($data);

if (is_null($data) ) {
  $data["deskripsi"] = "";
  $data["keywords"] = "";
  $data["author"] = "";
  $data["robots_index"] = 1;
  $data["robots_follow"] = 1;

}


?>


<!DOCTYPE html>
<html lang="en">
<head>

	<!-- title -->
	<title>Welcome | Kuliner Rizky</title>
	<!-- Pengaturan SEO -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="<?php echo $data["deskripsi"]?>"/>
	<meta name="keywords" content="<?php echo $data["keywords"]?>" />
	<meta name="author" content="<?php echo $data["author"]?>" />
	<meta name="robots" content="<?php echo ($data["robots_index"] ? "index" : "noindex")?>, <?php echo ($data["robots_follow"] ? "follow" : "nofollow")?>" />
	
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/KR.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- jquery -->
	<script src="assets/js/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- bootstrap dropdown -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	

</head>
<body>
	
	
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<img src="assets/img/KR.png" alt="">
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu show">
							
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="#Makanan">Makanan</a></li>
								<li><a href="#Minuman">Minuman</a></li>
								<li><a href="#contact">Contact</a></li>
								<li>
									<div class="header-icons">
										<!-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
									</div>
								</li>
							</ul>
						</nav>
						<!-- <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Makanan Pedas Khas Sasak Tulen</p>
							<h1>Kuliner Rizki</h1>
							<div class="hero-btns">
								<a href="https://wa.me/6282244417962?text=Hallo, Kak.%20saya mau memesan [Nama Makanan / Nama Minuman]%20" class="boxed-btn"><i class="fab fa-whatsapp"></i> Order Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->
	
	
	
	<!-- product section -->
	<div class="product-section mt-150 mb-150">

		<!--Container Makanan-->
		<div class="container" id="Makanan"> 
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3 id="Makanan"><span class="orange-text">Menu</span> Makanan</h3>
						<p>Tersedia berbagai macam makanan.</p>
					</div>
				</div>
			</div>

			<div class="row product-lists">

			<?php 

				$i = 1;

				foreach( $result as $produk) {
					
					if ($produk['kategori'] == 'Makanan') {?>
					
					<div class="col-lg-4 col-md-6 text-center">
									<div class="single-product-item">
										<div class="product-image">
											<a href="#"><img src="<?php echo $produk["gambar_produk"] ?>" alt=""></a>
										</div>
										<h3><?php echo $produk["nama_produk"]?></h3>
										<p class="product-price">
											<span>
												<?php
												if(strlen($produk["deskripsi_produk"]<100)){
													echo substr($produk["deskripsi_produk"],0,70)."...";

												}else
												{
													echo $produk["deskripsi_produk"];
												}
												?>
											</span>
											
											<?php echo $produk["harga_produk"] ?>
										</p>
										<a href="https://wa.me/6282244417962?text=Hallo, Kak.%20saya mau memesan [Nama Makanan / Nama Minuman]%20" class="cart-btn"><i class="fab fa-whatsapp"></i> Order Now</a>
									</div>
								</div>

					<?php
						

					}

				
				}
				
			?>


			

				
			</div>


			<br>
			<!--Container Minuman-->
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="section-title">	
							<h3 id="Minuman" class="pt-5"><span class="orange-text">Menu</span> Minuman</h3>
							<p>Tersedia minuman rasa.</p>
						</div>
					</div>
				</div>
	
				<div class="row product-lists">

					<?php 

					$i = 1;

						foreach( $result as $produk) {
						
						if ($produk['kategori'] == 'Minuman') {

							if ( $produk['gambar_produk'] == null || empty($produk["gambar_produk"]) ) {
								$produk['gambar_produk'] = 'penyimpanan/_default.jpg';
							}
		
							echo '	<div class="col-lg-4 col-md-6 text-center">
										<div class="single-product-item">
											<div class="product-image">
												<a href="#"><img src="' . $produk["gambar_produk"] . '" alt=""></a>
											</div>
											<h3>' . $produk["nama_produk"] . '</h3>
											<p class="product-price"><span>' . $produk["deskripsi_produk"] . '</span>' . $produk["harga_produk"] . '</p>
											<a href="https://wa.me/6282244417962?text=Hallo, Kak.%20saya mau memesan [Nama Makanan / Nama Minuman]%20"" class="cart-btn"><i class="fab fa-whatsapp"></i> Order Now</a>
										</div>
									</div>';
		
							echo "";

						}
					}
					
					?>

				</div>
			</div>
			<!-- end container minuman -->
		</div>
	</div>
	<!-- end product section -->

	
	
	

	

	

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<img src="assets/img/KR.png" alt="">
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 id="contact" class="widget-title">Get Contact</h2>
						<ul>
							<li>Loc. C3GF+M7G, Central Ampenan, Ampenan, Mataram City, West Nusa Tenggara</li>
							<li>nika.kuliner@gmail.com</li>
							<li>+6285942811052</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252478.09852431758!2d116.06345174595481!3d-8.598850780698985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc06925576331%3A0x6796df439d543ae4!2sKuliner%20RizQi!5e0!3m2!1sen!2sid!4v1638099154171!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
				
				
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.</p>
				</div>
				
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	
	
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main2.js"></script>

</body>
</html>