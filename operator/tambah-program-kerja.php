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

<head>
  <?php include 'top-script.php'; ?>
</head>

<body>
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
                        <h4 class="page-title">Tambah Program Kerja <?= $row['nama_kelurahan'];?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Program Kerja</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" action="proses-tambah-proker.php" method="POST">
                                <input type="hidden" name="id_kelurahan" value="<?= $row['id_kelurahan'];?>">
                                <input type="hidden" name="id_operator" value="<?= $row['id_operator'];?>">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah Program Kerja</h4>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Judul</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="judul" placeholder="Masukan judul program kerja">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="tanggal">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status">
                                              <option value="aktif">Aktif</option>
                                              <option value="nonaktif">Non Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="keterangan" cols="40" rows="8"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="submit" class="btn btn-default">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                Sistem Informasi Geografis Kantor Kelurahan di Kecamatan Denpasar Selatan
            </footer>
        </div>
    </div>
    <?php include 'bottom-script.php'; ?>
</body>

</html>
