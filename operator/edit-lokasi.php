<?php
  if (isset($_POST['submit'])) {
    include 'koneksi.php';
    $id_lokasi = $_POST['id_lokasi'];
    $id_kelurahan = $_POST['id_kelurahan'];
    $id_operator = $_POST['id_operator'];
    $data_lokasi = $_POST['data_lokasi'];
    $alamat = $_POST['alamat'];
    $latitude = $_POST['latitude'];
    $longtitude = $_POST['longtitude'];



    if(!empty($_FILES['foto']['tmp_name'])){
      $lokasi_foto = $_FILES['foto']['tmp_name'];
      $tipe_foto = $_FILES['foto']['type'];
      $nama_foto = $_FILES['foto']['name'];
      $direktori = "foto/$nama_foto";
      move_uploaded_file($lokasi_foto,$direktori);
      $query = "UPDATE lokasi SET data_lokasi='$data_lokasi', alamat='$alamat', foto='$nama_foto', latitude='$latitude', longtitude='$longtitude' WHERE id_lokasi='$id_lokasi'";
      $mysqli = $koneksi->query($query);

      echo "<script>
          alert('Data lokasi berhasil diubah!');
          window.location.href='lokasi.php';
      </script>";
    }else{
      $query = "UPDATE lokasi SET data_lokasi='$data_lokasi', alamat='$alamat', latitude='$latitude', longtitude='$longtitude' WHERE id_lokasi='$id_lokasi'";
      $mysqli = $koneksi->query($query);

      echo "<script>
          alert('Data lokasi berhasil diubah!');
          window.location.href='lokasi.php';
      </script>";
    }
  }
?>
