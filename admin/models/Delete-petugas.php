<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";
    $id_user    = mysqli_real_escape_string($koneksi, $_GET['id'] ) ;

    $sql        = "DELETE FROM user WHERE id_user = '$id_user'";
    $query      = mysqli_query($koneksi,$sql);

    if($query){
        header('location:../petugas.php');
    } else {
        echo "Hapus gagal";
    }
?>
