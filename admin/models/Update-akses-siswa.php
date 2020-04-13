<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";
    
    $username       = mysqli_real_escape_string($koneksi, $_POST['username']);
    $id_siswa           = mysqli_real_escape_string($koneksi, $_POST['id_siswa']);
    $email          = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password       = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql        = "UPDATE user SET username = '$username', email = '$email', password = '$password' WHERE id_siswa = '$id_siswa';";

    $query      = mysqli_query($koneksi,$sql);

    if($query){
        header('location:../all-siswa.php');
    } else {
        var_dump($sql);
        echo "Update gagal";
    }
?>