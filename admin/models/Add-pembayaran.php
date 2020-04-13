<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";

    $id_user           = mysqli_real_escape_string($koneksi, $_POST['id_petugas']);
    $id_spp              = mysqli_real_escape_string($koneksi, $_POST['spp']);
    $nominal           = mysqli_real_escape_string($koneksi, $_POST['nominal']);
    $id_siswa           = mysqli_real_escape_string($koneksi, $_POST['id_siswa']);
    $nominal_bayar           = mysqli_real_escape_string($koneksi, $_POST['nominal_bayar']);


    if($nominal_bayar == $nominal){
        
        $sql = "INSERT INTO pembayaran (id_pembayaran, id_user, id_spp, id_siswa, jumlah_bayar, waktu_bayar, status) VALUES (NULL, '$id_user', '$id_spp', '$id_siswa', '$nominal_bayar', current_timestamp(), 'LUNAS')";

        $query = mysqli_query($koneksi, $sql);
        if($query){
            header('location:../log-pembayaran.php');
        } else {
            echo "gagal";
            var_dump($sql);
        }
    }
    else{
        echo "gagal";
    }

?>