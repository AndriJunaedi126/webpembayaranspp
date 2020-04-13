<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";
    $id_kelas   = mysqli_real_escape_string($koneksi, $_GET['id'] ) ;

    $sql        = "DELETE FROM kelas WHERE id_kelas = '$id_kelas'";
    $query      = mysqli_query($koneksi,$sql);

    if($query){
        header('location:../kelas.php');
    } else {
        echo "Hapus gagal";
    }
?>
