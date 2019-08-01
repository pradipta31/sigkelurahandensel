<?php
	include 'operator/koneksi.php';
	$id_kelurahan = $_GET['id_kelurahan'];
  $query_lokasi = mysqli_query($koneksi,
  "SELECT * FROM lokasi
  JOIN kelurahan ON kelurahan.id_kelurahan = lokasi.id_kelurahan
  JOIN operator ON operator.id_operator = lokasi.id_operator
  WHERE kelurahan.id_kelurahan = '$id_kelurahan'");
	$row_lokasi = mysqli_fetch_assoc($query_lokasi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'asset/top-script.php'; ?>
<link rel="stylesheet" type="text/css" href="frontend/styles/course.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/course_responsive.css">
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
								<li><a href="daftar-kelurahan.php">Daftar Kelurahan</a></li>
                <li><?= $row_lokasi['nama_kelurahan'];?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div class="course">
		<div class="container">
			<div class="row">

				<!-- Course -->
				<div class="col-lg-8">

					<div class="course_container">
						<div class="course_title"><?= $row_lokasi['nama_kelurahan'];?></div>

						<!-- Course Image -->
						<div class="course_image"><img src="operator/foto/<?= $row_lokasi['foto'];?>" alt=""></div>

						<!-- Course Tabs -->

					</div>
				</div>
        <div class="col-lg-4">
					<div class="sidebar">

						<!-- Feature -->
            <div class="sidebar_section">
							<div class="sidebar_section_title"><?= $row_lokasi['nama_kelurahan'];?></div>
							<div class="sidebar_teacher">
								<div class="teacher_meta_container">
									<!-- Teacher Rating -->
									<div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
										<div class="teacher_meta_title">Nama Lurah</div>
										<div class="teacher_meta_text ml-auto"><span><?= $row_lokasi['nama_lurah'];?></span></div>
									</div>
									<!-- Teacher Review -->
									<div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
										<div class="teacher_meta_title">Alamat</div>
									</div>
								</div>
								<div class="teacher_info">
									<p><?= $row_lokasi['alamat'];?></p>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>
</div>

<?php include 'asset/bottom-script.php'; ?>
<script src="frontend.js/course.js"></script>
</body>
</html>
