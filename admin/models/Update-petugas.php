<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";
    
    $id_user    = mysqli_real_escape_string($koneksi, $_POST['id_user']);
    $username   = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email      = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password   = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql        = "UPDATE user SET username = '$username', email = '$email', password = '$password' WHERE id_user = '$id_user'";

    $query      = mysqli_query($koneksi,$sql);

    if($query){
        header('location:../petugas.php');
    } else {
        var_dump($sql);
        echo "Update gagal";
    }
?>