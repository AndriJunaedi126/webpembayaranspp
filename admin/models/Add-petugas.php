<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";


    $username           = addcslashes($username);
    $email              = addcslashes($email);
    $password           = addcslashes($password);

    $username           = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email              = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password           = mysqli_real_escape_string($koneksi, $_POST['password']);


    $sql = "INSERT INTO user (id_user, username, email, password, role, id_siswa) VALUES (NULL, '$username', '$email', '$password', 'petugas', NULL)";

    $query = mysqli_query($koneksi, $sql);
    if($query){
        header('location:../petugas.php');
    } else {
        echo "gagal";
        var_dump($sql);
    }
?>