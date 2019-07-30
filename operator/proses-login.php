<?php
  // mengaktifkan session php
  session_start();

  // menghubungkan dengan koneksi
  include 'koneksi.php';

  // menangkap data yang dikirim dari form
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // menyeleksi data admin dengan username dan password yang sesuai
  $data = mysqli_query($koneksi,"SELECT * FROM operator WHERE username='$username' AND password='$password'");

  // menghitung jumlah data yang ditemukan
  $cek = mysqli_num_rows($data);

  $row = mysqli_fetch_assoc($data);

  if($cek > 0){
  	if ($row['status'] == 'aktif') {
      $_SESSION['id_operator'] = $row['id_operator'];
      $_SESSION['id_kelurahan'] = $row['id_kelurahan'];
      $_SESSION['username'] = $username;
    	$_SESSION['status'] = "login";
    	header("location:dashboard.php");
    }else{
      header("location:index.php?pesan=gagal");
    }
  }else{
  	header("location:index.php?pesan=gagal");
  }
?>
