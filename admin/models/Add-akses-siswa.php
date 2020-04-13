<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";

    $id_siswa       = addcslashes($id_siswa);
    $username       = addcslashes($username);
    $email          = addcslashes($email);
    $password       = addcslashes($password);
    
    $id_siswa       = mysqli_real_escape_string($koneksi, $_POST['id_siswa']);
    $username       = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email          = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password       = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = "INSERT INTO user (id_user, username, email, password, role, id_siswa) VALUES (NULL, '$username', '$email', '$password', 'siswa', '$id_siswa');";

    $query = mysqli_query($koneksi, $sql);
    if($query){
        header('location:../all-siswa.php');
    } else {
        var_dump($sql);
        echo "gagal";
    }
