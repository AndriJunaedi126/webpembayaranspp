<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";

    $id_spp           = mysqli_real_escape_string($koneksi, $_POST['id_spp']);
    $bulan         = mysqli_real_escape_string($koneksi, $_POST['bulan']);
    $tahun      = mysqli_real_escape_string($koneksi,   $_POST['tahun']);
    $nominal      = mysqli_real_escape_string($koneksi,   $_POST['nominal']);


    $sql        = "UPDATE `spp` SET `bulan` = '$bulan', `tahun` = '$tahun', `nominal` = '$nominal' WHERE `spp`.`id_spp` = '$id_spp'";

    $query      = mysqli_query($koneksi,$sql);

    if($query){
        header('location:../spp.php');
    } else {
        var_dump($sql);
        echo "Update gagal";
    }
?>