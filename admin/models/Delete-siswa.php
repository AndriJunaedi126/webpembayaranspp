<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";
    $id_siswa    = mysqli_real_escape_string($koneksi, $_GET['id'] ) ;

    $sql        = "DELETE FROM siswa WHERE id_siswa = '$id_siswa'";
    $query      = mysqli_query($koneksi,$sql);

    if($query){
        header('location:../all-siswa.php');
    } else {
        echo "Hapus gagal";
    }
?>
