<?php
  include 'koneksi.php';
  $query = mysqli_query($koneksi, "DELETE FROM program_kerja WHERE id_program_kerja = ('$_GET[id_program_kerja]')");
  if($query){
    echo "<script>
        alert('Program Kerja yang dipilih berhasil dihapus!');
        window.location.href='program-kerja.php';
    </script>";
  }else{
    echo "Terjadi kesalahan";
  }
?>
