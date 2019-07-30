<!DOCTYPE html>
<html lang="en">
<head>
<title>SIGKELDENSEL | Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Unicat project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="frontend/styles/bootstrap4/bootstrap.min.css">
<link href="frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="frontend/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/about.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/about_responsive.css">
</head>
<body>
<div class="super_container">
	<header class="header">
    <?php include 'top-bar.php'; ?>
		<?php include 'navigation.php'; ?>
	</header>

	<?php include 'navigation-collapse.php'; ?>
	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.php">Home</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="about">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Selamat datang di simagang</h2>
						<div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu Vestibulum</p></div>
					</div>
				</div>
			</div>
			<div class="row about_row">

				<!-- About Item -->
				<div class="col-lg-6 about_col about_col_left">
					<div class="about_item">
						<div class="about_item_image"><img src="frontend/images/about_1.jpg" alt=""></div>
						<div class="about_item_title"><a href="daftar-magang.php">Daftar Magang</a></div>
						<div class="about_item_text">
							<p>Pendaftaran mahasiswa magang dapat diakses pada <a href="daftar-magang.php"> link ini </a></p>
						</div>
					</div>
				</div>

				<!-- About Item -->
				<div class="col-lg-6 about_col about_col_middle">
					<div class="about_item">
						<div class="about_item_image"><img src="frontend/images/about_2.jpg" alt=""></div>
						<div class="about_item_title"><a href="pengumuman.php">Pengumuman</a></div>
						<div class="about_item_text">
							<p>Pengumuman penerimaan mahasiswa magang dapat di akses pada <a href="pengumuman.php">link ini</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<?php include 'footer.php'; ?>
</div>

<script src="frontend/js/jquery-3.2.1.min.js"></script>
<script src="frontend/styles/bootstrap4/popper.js"></script>
<script src="frontend/styles/bootstrap4/bootstrap.min.js"></script>
<script src="frontend/plugins/greensock/TweenMax.min.js"></script>
<script src="frontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="frontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="frontend/plugins/easing/easing.js"></script>
<script src="frontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="frontend/js/custom.js"></script>
</body>
</html>
