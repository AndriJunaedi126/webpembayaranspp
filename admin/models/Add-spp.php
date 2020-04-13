<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";

    $bulan           = mysqli_real_escape_string($koneksi, $_POST['bulan']);
    $tahun              = mysqli_real_escape_string($koneksi, $_POST['tahun']);
    $nominal           = mysqli_real_escape_string($koneksi, $_POST['nominal']);


    $sql = "INSERT INTO spp (id_spp, bulan, tahun, nominal) VALUES (NULL, '$bulan', '$tahun', '$nominal')";

    $query = mysqli_query($koneksi, $sql);
    if($query){
        header('location:../spp.php');
    } else {
        echo "gagal";
        var_dump($sql);
    }
?>