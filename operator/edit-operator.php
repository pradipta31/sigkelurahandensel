<?php
    if(isset($_POST['submit'])){
        include 'koneksi.php';
        $id_operator = $_POST['id_operator'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $status = $_POST['status'];

        if ($_POST['password'] == null) {
          $query = mysqli_query($koneksi, "UPDATE operator SET nama='$nama', email='$email', username='$username', status='$status' WHERE id_operator='$id_operator'");
          if($query){
              echo "<script>
                  alert('Operator yang terpilih berhasil diubah!');
                  window.location.href='operator.php';
              </script>";
          }else{
              echo "Terjadi kesalahan";
          }
        }else{
          $password = md5($_POST['password']);
          $query = mysqli_query($koneksi, "UPDATE operator SET nama='$nama', email='$email', username='$username', password='$password', status='$status' WHERE id_operator='$id_operator'");
          if($query){
              echo "<script>
                  alert('Operator yang terpilih berhasil diubah!');
                  window.location.href='operator.php';
              </script>";
          }else{
              echo "Terjadi kesalahan";
          }
        }
    }
?>
