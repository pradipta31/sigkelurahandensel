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
  <div class="news">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Daftar Program Kerja SIGDENSEL</h2>
					</div>
				</div>
			</div>
			<div class="row news_row">

				<div class="col-lg-12 news_col">
					<div class="news_posts_small">

						<?php
              include 'operator/koneksi.php';
							$id_kelurahan = $_GET['id_kelurahan'];
              $query_proker = mysqli_query($koneksi,
              "SELECT * FROM program_kerja
              JOIN kelurahan ON kelurahan.id_kelurahan = program_kerja.id_kelurahan
              JOIN operator ON operator.id_operator = program_kerja.id_operator
              WHERE program_kerja.id_kelurahan='$id_kelurahan' AND program_kerja.status = 'aktif'");
              while ($row_proker = mysqli_fetch_assoc($query_proker)) {
                $query_lokasi = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE id_kelurahan = '$row_proker[id_kelurahan]'");
                $row_loc = mysqli_fetch_assoc($query_lokasi);
            ?>
            <div class="news_post_small">
							<div class="news_post_small_title"><a href="<?= $row_loc['data_lokasi'];?>" target="_blank"><?= $row_proker['judul'];?></a></div>
							<div class="news_post_meta">
								<ul>
                  <p style="text-align: justify"><?= $row_proker['keterangan'];?></p>
									<li><?= $row_proker['nama_kelurahan'];?></li>
									<li><?= date('d-m-Y', strtotime($row_proker['tanggal']));?></li>
								</ul>
							</div>
						</div>
            <?php } ?>

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
