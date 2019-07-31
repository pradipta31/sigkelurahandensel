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
								<li><a href="index.php">Program Kerja</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div class="courses">
		<div class="container">
			<div class="row">

				<!-- Courses Main Content -->
				<div class="col-lg-12">

					<div class="courses_container">
						<div class="row courses_row">

              <?php
                include 'operator/koneksi.php';
                $query_lokasi = mysqli_query($koneksi,
                "SELECT * FROM lokasi
                JOIN kelurahan ON kelurahan.id_kelurahan = lokasi.id_kelurahan
                JOIN operator ON operator.id_operator = lokasi.id_operator");
                while ($row_lokasi = mysqli_fetch_assoc($query_lokasi)) {
              ?>
							<div class="col-lg-4 course_col">
								<div class="course">
									<div class="course_image"><img src="operator/foto/<?= $row_lokasi['foto'];?>" alt=""></div>
									<div class="course_body">
										<h3 class="course_title"><a href="<?= $row_lokasi['data_lokasi'];?>" target="_blank"><?= $row_lokasi['nama_kelurahan'];?></a></h3>
										<div class="course_teacher"><?= $row_lokasi['nama_lurah']; ?></div>
									</div>
									<div class="course_footer">
										<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
											<div class="course_price ml-auto">
                        <a href="<?= $row_lokasi['data_lokasi'];?>" target="_blank">Lihat Lokasi</a>
                      </div>
										</div>
									</div>
								</div>
							</div>
              <?php } ?>

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
