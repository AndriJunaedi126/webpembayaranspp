<?php
 session_start();
 include 'koneksi.php';

 $email = mysqli_real_escape_string($koneksi, $_POST['email']);
 $password = mysqli_real_escape_string($koneksi, $_POST['password']);

 $login = mysqli_query($koneksi, "select * from user where email='$email' and password='$password'");

 $cek = mysqli_num_rows($login);

if($cek != 0){

    $data = mysqli_fetch_assoc($login);

    if($data['role']=="admin"){
         $_SESSION['id_user'] = $data['id_user'];
         $_SESSION['username'] = $data['username'];
         $_SESSION['role'] = "admin";

         header("location:../admin");
    } 

    else if($data['role']=="petugas"){
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = "petugas";

        header("location:../petugas");
    }

    else if($data['role']=="siswa"){
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_siswa'] = $data['id_siswa'];
        $_SESSION['role'] = "siswa";

        header("location:../siswa");
    }

    else{
        header("location:../");
    }    
 }
 else{
    header("location:../");
 }    
?>