<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'asset/top-script.php'; ?>
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
						<h2 class="section_title">Selamat datang di SIGDENSEL</h2>
						<div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu Vestibulum</p></div>
					</div>
				</div>
			</div>
			<div class="row about_row">

				<!-- About Item -->
				<div class="col-lg-6 about_col about_col_left">
					<div class="about_item">
						<div class="about_item_image"><img src="frontend/images/about_1.jpg" alt=""></div>
						<div class="about_item_title"><a href="daftar-kelurahan.php">Daftar Kelurahan</a></div>
						<div class="about_item_text">
							<p>Daftar seluruh kelurahan Denpasar Selatan dapat diakses pada <a href="daftar-kelurahan.php"> link ini </a></p>
						</div>
					</div>
				</div>

				<!-- About Item -->
				<div class="col-lg-6 about_col about_col_middle">
					<div class="about_item">
						<div class="about_item_image"><img src="frontend/images/about_2.jpg" alt=""></div>
						<div class="about_item_title"><a href="program-kerja.php">Daftar Program Kerja</a></div>
						<div class="about_item_text">
							<p>Daftar seluruh Program Kerja kelurahan Denpasar Selatan dapat diakses pada <a href="program-kerja.php">link ini</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<?php include 'footer.php'; ?>
</div>

<?php include 'asset/bottom-script.php'; ?>
</body>
</html>
