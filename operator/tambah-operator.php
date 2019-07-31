<?php
    if(isset($_POST['submit'])){
        include 'koneksi.php';
        $id_kelurahan = $_POST['id_kelurahan'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $status = 'aktif';

        $cek = mysqli_query($koneksi, "SELECT * FROM operator WHERE email = '$email'");
        $row = mysqli_num_rows($cek);
        if($row == null){
          $query = mysqli_query($koneksi, "INSERT INTO operator (id_kelurahan, nama, email, username, password, status)
          VALUES ('$id_kelurahan','$nama','$email','$username','$password','$status')");
          if($query){
              echo "<script>
                  alert('Operator baru berhasil ditambahkan!');
                  window.location.href='operator.php';
              </script>";
          }else{
              echo "Terjadi kesalahan";
          }
        }else{
          echo "Email sudah terpakai!";
        }
    }
?>
