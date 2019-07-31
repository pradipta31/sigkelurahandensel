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
                        <h4 class="page-title">Data Operator <?= $row['nama_kelurahan'];?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Operator</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                  <button type="button" class="btn btn-default"
                                      data-toggle="modal" data-target="#tambahOperator">
                                      Tambah Operator
                                  </button>
                                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="tambahOperator">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <form class="form-horizontal" action="tambah-operator.php" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="id_kelurahan" value="<?= $row['id_kelurahan'];?>">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Tambah Operator Baru</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="nama" placeholder="Masukan nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                                            <div class="col-sm-9">
                                                                <input type="email" class="form-control" name="email" placeholder="Masukan alamat email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="username" placeholder="Masukan username">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="password" placeholder="Masukan password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-default" name="submit">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>

																</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kelurahan</th>
                                                <th>Nama Lurah</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            include 'koneksi.php';
                                            $no = 1;
                                            $query_operator = mysqli_query($koneksi,
                                            "SELECT * FROM operator
                                            JOIN kelurahan ON kelurahan.id_kelurahan = operator.id_kelurahan
                                            WHERE kelurahan.id_kelurahan = '$row[id_kelurahan]'");
                                            while ($row_operator = mysqli_fetch_assoc($query_operator)) {
                                          ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row_operator['nama_kelurahan'];?></td>
                                                <td><?= $row_operator['nama_lurah'];?></td>
                                                <td>
                                                  <?= $row_operator['nama'];?>
                                                </td>
                                                <td>
                                                  <?= $row_operator['email']; ?>
                                                </td>
                                                <td><?= $row_operator['username'];?></td>
                                                <td>
                                                  <?php
                                										if ($row_operator['status'] == 'aktif'){
                                											echo "<center><label class='alert alert-success' style='padding: 5px 5px'>Aktif</label></center>";
                                										}else{
                                											echo "<center><label class='alert alert-warning' style='padding: 5px 5px'>Tidak Aktif</label></center>";
                                										}
                                									?>
                                                </td>
                                                <td>
                                                  <button type="button" class="btn btn-warning btn-sm"
                                                      data-toggle="modal" data-target="#editOperator<?= $row_operator['id_operator']; ?>">
                                                      Edit
                                                  </button>
                                                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="editOperator<?= $row_operator['id_operator'];?>">
                                                      <div class="modal-dialog modal-lg">
                                                          <div class="modal-content">
                                                            <form class="form-horizontal" action="edit-operator.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_operator" value="<?= $row_operator['id_operator'];?>">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">Edit Operator <?= $row_operator['nama'];?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                      <div class="form-group row">
                                                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                                                                          <div class="col-sm-9">
                                                                              <input type="text" class="form-control" name="nama" value="<?= $row_operator['nama'];?>">
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                                                          <div class="col-sm-9">
                                                                              <input type="email" class="form-control" name="email" value="<?= $row_operator['email'];?>">
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                                                          <div class="col-sm-9">
                                                                              <input type="text" class="form-control" name="username" value="<?= $row_operator['username'];?>">
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                                                          <div class="col-sm-9">
                                                                              <input type="text" class="form-control" name="password" placeholder="Masukan password">
                                                                          </div>
                                                                          <small>NB: Kosongkan jika tidak ingin mengubah password</small>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                                          <div class="col-sm-9">
                                                                              <select class="form-control" name="status" value="<?= $row_operator['status'];?>">
                                                                                <option value="aktif" <?= $row_operator['status'] == 'aktif' ? 'selected' : '';?>>Aktif</option>
                                                                                <option value="nonaktif" <?= $row_operator['status'] == 'nonaktif' ? 'selected' : '';?>>Non Aktif</option>
                                                                              </select>
                                                                          </div>
                                                                      </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-default" name="submit">Simpan</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    <script>
        $('#zero_config').DataTable();
    </script>

</body>

</html>
