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
                        <h4 class="page-title">Data Program Kerja <?= $row['nama_kelurahan'];?></h4>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
																	<a href="tambah-program-kerja.php" class="btn btn-default" style="border-radius: 3px">Tambah Program Kerja</a>
																</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kelurahan</th>
                                                <th>Nama Lurah</th>
                                                <th>Judul</th>
                                                <th style="width: 60px">Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th style="width: 150px">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            include 'koneksi.php';
                                            $no = 1;
                                            $query_proker = mysqli_query($koneksi,
                                            "SELECT * FROM program_kerja
                                            JOIN kelurahan ON kelurahan.id_kelurahan = program_kerja.id_kelurahan
                                            JOIN operator ON operator.id_operator = program_kerja.id_operator
                                            WHERE kelurahan.id_kelurahan = '$row[id_kelurahan]'");
                                            while ($row_proker = mysqli_fetch_assoc($query_proker)) {
                                          ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row_proker['nama_kelurahan'];?></td>
                                                <td><?= $row_proker['nama_lurah'];?></td>
                                                <td><?= $row_proker['judul'];?></td>
                                                <td><?= date('d-m-Y',strtotime($row_proker['tanggal']));?></td>
                                                <td><?= $row_proker['keterangan'];?></td>
                                                <td>
                                                  <?php
                                										if ($row_proker['status'] == 'aktif'){
                                											echo "<center><label class='alert alert-success' style='padding: 5px 5px'>Aktif</label></center>";
                                										}else{
                                											echo "<center><label class='alert alert-warning' style='padding: 5px 5px'>Tidak Aktif</label></center>";
                                										}
                                									?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default btn-sm"
                                                        data-toggle="modal" data-target="#detailProker<?= $row_proker['id_program_kerja']; ?>">
                                                        Lihat
                                                    </button>
                                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="detailProker<?= $row_proker['id_program_kerja'];?>">
                                                      <div class="modal-dialog modal-lg">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h4 class="modal-title" id="myModalLabel">Data Program Kerja : <?= $row_proker['judul']; ?></h4>
                                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                  </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <div class="row">
                                                                      <div class="col-md-3">
                                                                        Kelurahan
                                                                        </br>
                                                                        Nama Lurah
                                                                        </br>
                                                                        Judul Program Kerja
                                                                        </br>
                                                                        Tanggal
                                                                        </br>
                                                                        Status
                                                                        </br>
                                                                        Keterangan
                                                                        </br>
                                                                      </div>
                                                                      <div class="col-md-9">
                                                                        : <?= $row_proker['nama_kelurahan']; ?>
                                                                        </br>
                                                                        : <?= $row_proker['nama_lurah']; ?>
                                                                        </br>
                                                                        : <?= $row_proker['judul']; ?>
                                                                        </br>
                                                                        : <?= $row_proker['tanggal']; ?>
                                                                        </br>
                                                                        : <?= $row_proker['status']; ?>
                                                                        </br>
                                                                        : <?= $row_proker['keterangan']; ?>
                                                                        </br>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <button type="button" class="btn btn-warning btn-sm"
                                                      data-toggle="modal" data-target="#editProker<?= $row_proker['id_program_kerja']; ?>">
                                                      Edit
                                                  </button>
                                                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="editProker<?= $row_proker['id_program_kerja'];?>">
                                                      <div class="modal-dialog modal-lg">
                                                          <div class="modal-content">
                                                            <form class="form-horizontal" action="edit-proker.php" method="POST">
                                                                <input type="hidden" name="id_program_kerja" value="<?= $row_proker['id_program_kerja'];?>">
                                                                <input type="hidden" name="id_kelurahan" value="<?= $row_proker['id_kelurahan'];?>">
                                                                <input type="hidden" name="id_operator" value="<?= $row_proker['id_operator'];?>">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">Data Program Kerja : <?= $row_proker['judul']; ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <div class="form-group row">
                                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Judul</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="judul" value="<?= $row_proker['judul']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tanggal</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="date" class="form-control" name="tanggal" value="<?= $row_proker['tanggal']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                                                            <div class="col-sm-9">
                                                                                <select class="form-control" name="status" value="<?= $row_proker['status'];?>">
                                                                                  <option value="aktif" <?= $row['status'] == 'aktif' ? 'selected' : ''?>>Aktif</option>
                                                                                  <option value="nonaktif" <?= $row['status'] == 'nonaktif' ? 'selected' : ''?>>Non Aktif</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea class="form-control" name="keterangan" cols="40" rows="8"><?= $row_proker['keterangan'];?></textarea>
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
                                                  <a href="hapus-proker.php?id_program_kerja=<?= $row_proker['id_program_kerja']; ?>"
                                                    onclick = "return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
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
