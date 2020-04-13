<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";

    $id_kelas           = mysqli_real_escape_string($koneksi, $_POST['id_kelas']);
    $nama_kelas         = mysqli_real_escape_string($koneksi, $_POST['nama_kelas']);
    $komp_keahlian      = mysqli_real_escape_string($koneksi,   $_POST['komp_keahlian']);


    $sql        = "UPDATE kelas SET nama_kelas = '$nama_kelas', komp_keahlian = '$komp_keahlian' WHERE id_kelas = '$id_kelas'";

    $query      = mysqli_query($koneksi,$sql);

    if($query){
        header('location:../kelas.php');
    } else {
        var_dump($sql);
        echo "Update gagal";
    }
?>