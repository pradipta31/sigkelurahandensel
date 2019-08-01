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
                        <h4 class="page-title">Data Lokasi <?= $row['nama_kelurahan'];?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lokasi</li>
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
                                  <?php
                                    include 'koneksi.php';
                                    $check_lokasi = mysqli_query($koneksi,
                                    "SELECT COUNT(*) as total FROM lokasi
                                    WHERE id_kelurahan = '$row[id_kelurahan]'");
                                    $row_loc = mysqli_fetch_assoc($check_lokasi);
                                    if ($row_loc['total'] == '1') {

                                  ?>

                                <?php }else{ ?>
                                  <button type="button" class="btn btn-default"
                                      data-toggle="modal" data-target="#tambahLokasi">
                                      Tambah Lokasi
                                  </button>
                                <?php } ?>
                                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="tambahLokasi">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <form class="form-horizontal" action="tambah-lokasi.php" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="id_kelurahan" value="<?= $row['id_kelurahan'];?>">
                                                <input type="hidden" name="id_operator" value="<?= $row['id_operator'];?>">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Tambah Lokasi Baru</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data Lokasi</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="data_lokasi" placeholder="Masukan data lokasi">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Foto</label>
                                                            <div class="col-sm-9">
                                                                <input type="file" class="form-control" name="foto">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Latitude</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="latitude" placeholder="Masukan latitude">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Longtitude</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="longtitude" placeholder="Masukan longtitude">
                                                            </div>
                                                        </div>
																												<div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                                                            <div class="col-sm-9">
                                                                <textarea name="alamat" rows="8" cols="80" class="form-control"></textarea>
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
                                                <th>Data Lokasi</th>
																								<th>Alamat</th>
                                                <th>Foto</th>
                                                <th>Latitude</th>
                                                <th>Longtitude</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            include 'koneksi.php';
                                            $no = 1;
                                            $query_lokasi = mysqli_query($koneksi,
                                            "SELECT * FROM lokasi
                                            JOIN kelurahan ON kelurahan.id_kelurahan = lokasi.id_kelurahan
                                            JOIN operator ON operator.id_operator = lokasi.id_operator
                                            WHERE kelurahan.id_kelurahan = '$row[id_kelurahan]'");
                                            while ($row_lokasi = mysqli_fetch_assoc($query_lokasi)) {
                                          ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row_lokasi['nama_kelurahan'];?></td>
                                                <td><?= $row_lokasi['nama_lurah'];?></td>
                                                <td>
                                                  <a href="<?= $row_lokasi['data_lokasi'];?>" target="_blank">Lihat</a>
                                                </td>
																								<td><?= $row_lokasi['alamat'];?></td>
                                                <td>
                                                  <a href="#" onClick="showImage('<?= $row_lokasi['foto'];?>');" class="btn btn-default btn-sm">Lihat Foto</a>
                                                </td>
                                                <td><?= $row_lokasi['latitude'];?></td>
                                                <td><?= $row_lokasi['longtitude'];?></td>
                                                <td>
                                                  <button type="button" class="btn btn-warning btn-sm"
                                                      data-toggle="modal" data-target="#editProker<?= $row_lokasi['id_lokasi']; ?>">
                                                      Edit
                                                  </button>
                                                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="editProker<?= $row_lokasi['id_lokasi'];?>">
                                                      <div class="modal-dialog modal-lg">
                                                          <div class="modal-content">
                                                            <form class="form-horizontal" action="edit-lokasi.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_lokasi" value="<?= $row_lokasi['id_lokasi'];?>">
                                                                <input type="hidden" name="id_kelurahan" value="<?= $row_lokasi['id_kelurahan'];?>">
                                                                <input type="hidden" name="id_operator" value="<?= $row_lokasi['id_operator'];?>">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">Edit Lokasi</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                      <div class="form-group row">
                                                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data Lokasi</label>
                                                                          <div class="col-sm-9">
                                                                              <input type="text" class="form-control" name="data_lokasi" value="<?= $row_lokasi['data_lokasi'];?>">
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label for="lname" class="col-sm-3 text-right control-label col-form-label">Foto</label>
                                                                          <div class="col-sm-9">
                                                                              <input type="file" class="form-control" name="foto">
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Latitude</label>
                                                                          <div class="col-sm-9">
                                                                              <input type="text" class="form-control" name="latitude" value="<?= $row_lokasi['latitude'];?>">
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label for="fname" class="col-sm-3 text-right control-label col-form-label">Longtitude</label>
                                                                          <div class="col-sm-9">
                                                                              <input type="text" class="form-control" name="longtitude" value="<?= $row_lokasi['longtitude'];?>">
                                                                          </div>
                                                                      </div>
																																			<div class="form-group row">
							                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
							                                                            <div class="col-sm-9">
							                                                                <textarea name="alamat" class="form-control" rows="8" cols="80"><?= $row_lokasi['alamat'];?></textarea>
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
                                                  <!-- <a href="hapus-proker.php?id_program_kerja=<?= $row_proker['id_program_kerja']; ?>"
                                                    onclick = "return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a> -->
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
    <script src="../dist/js/bootbox/bootbox.min.js"></script>
    <script type="text/javascript">
      function showImage(foto){
        bootbox.dialog({
          message: '<img src="../operator/foto/'+foto+'" class="img-responsive" style="height: 350px; width: 350px">',
          closeButton: true,
          size: 'medium'
        });
      }
    </script>
    <script>
        $('#zero_config').DataTable();
    </script>

</body>

</html>
