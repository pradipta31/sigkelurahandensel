<?php
    if(isset($_POST['submit'])){
        include 'koneksi.php';
        $id_program_kerja = $_POST['id_program_kerja'];
        $id_kelurahan = $_POST['id_kelurahan'];
        $id_operator = $_POST['id_operator'];
        $judul = $_POST['judul'];
        $tanggal = date($_POST['tanggal']);
        $keterangan = $_POST['keterangan'];
        $status = $_POST['status'];
        $tahun = date('Y',strtotime($tanggal));

        $query = mysqli_query($koneksi, "UPDATE program_kerja SET judul='$judul', tanggal='$tanggal', keterangan='$keterangan', status='$status' WHERE id_program_kerja='$id_program_kerja'");
        if($query){
            echo "<script>
                alert('Program kerja berhasil diubah!');
                window.location.href='program-kerja.php';
            </script>";
        }else{
            echo "Terjadi kesalahan";
        }
    }
?>
