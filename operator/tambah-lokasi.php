<?php
  if (isset($_POST['submit'])) {
    include 'koneksi.php';
    $id_kelurahan = $_POST['id_kelurahan'];
    $id_operator = $_POST['id_operator'];
    $data_lokasi = $_POST['data_lokasi'];
    $latitude = $_POST['latitude'];
    $longtitude = $_POST['longtitude'];

    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $tipe_foto = $_FILES['foto']['type'];
    $nama_foto = $_FILES['foto']['name'];
    $direktori = "foto/$nama_foto";

    if(!empty($lokasi_foto)){
      move_uploaded_file($lokasi_foto,$direktori);
      $query ="INSERT INTO lokasi (id_kelurahan, id_operator, data_lokasi, foto, latitude, longtitude)
      VALUES ('$id_kelurahan','$id_operator','$data_lokasi','$nama_foto','$latitude', '$longtitude')";
      $mysqli = $koneksi->query($query);
      // if ($query) {
      //   echo "Berhasil bro!";
      //   echo $id_kelurahan;
      // }else{
      //   echo "Gagal anjg!";
      // }
      echo "<script>
          alert('Data lokasi berhasil ditambahkan!');
          window.location.href='lokasi.php';
      </script>";
    }
  }
?>
