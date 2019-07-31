<?php
	include 'koneksi.php';
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	$id_operator = $_SESSION['id_operator'];
	$query = mysqli_query($koneksi,"SELECT * FROM operator
		LEFT JOIN kelurahan
		ON kelurahan.id_kelurahan = operator.id_kelurahan
		WHERE operator.id_operator = '$id_operator'");
	$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'top-script.php'; ?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <?php include 'header.php'; ?>
        <?php include 'navigation.php'; ?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
								<div class="row">
									<div class="alert alert-success" role="alert">
										<h4 class="alert-heading">Well done!</h4>
										<p>Selamat datang <b> <?= $row['nama'];?> </b>, selamat datang di Sistem Informasi Geografis Kantor Kelurahan di Kecamatan Denpasar Selatan. Mohon untuk menggunakan sistem ini dengan baik demi kenyamanan bersama.</p>
										<hr>
										<p class="mb-0"><?= $row['nama_kelurahan']; ?></p>
									</div>
								</div>
								<hr>
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <a href="program-kerja.php">
													<div class="card card-hover">
	                            <div class="box bg-danger text-center">
	                                <h1 class="font-light text-white"><i class="mdi mdi-worker"></i></h1>
	                                <h6 class="text-white">Program Kerja</h6>
	                            </div>
	                        </div>
												</a>
                    </div>
										<div class="col-md-6 col-lg-4 col-xlg-3">
                        <a href="lokasi.php">
													<div class="card card-hover">
	                            <div class="box bg-success text-center">
	                                <h1 class="font-light text-white"><i class="mdi mdi-google-maps"></i></h1>
	                                <h6 class="text-white">Lokasi</h6>
	                            </div>
	                        </div>
												</a>
                    </div>
										<div class="col-md-6 col-lg-4 col-xlg-3">
                        <a href="operator.php">
													<div class="card card-hover">
	                            <div class="box bg-info text-center">
	                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
	                                <h6 class="text-white">Operator</h6>
	                            </div>
	                        </div>
												</a>
                    </div>
                    <!-- Column -->
                </div>
								<hr>
            </div>
            <footer class="footer text-center" style="margin-top: 25px">
                Sistem Informasi Geografis Kantor Kelurahan di Kecamatan Denpasar Selatan
            </footer>
        </div>
    </div>
    <?php include 'bottom-script.php'; ?>
</body>

</html>
