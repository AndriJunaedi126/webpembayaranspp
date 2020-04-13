<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";

    $nama_kelas           = addcslashes($nama_kelas);
    $komp_keahlian        = addcslashes($komp_keahlian);
    
    $nama_kelas           = mysqli_real_escape_string($koneksi, $_POST['nama_kelas']);
    $komp_keahlian        = mysqli_real_escape_string($koneksi, $_POST['komp_keahlian']);

    $sql = "INSERT INTO kelas (id_kelas, nama_kelas, komp_keahlian) VALUES (NULL, '$nama_kelas', '$komp_keahlian')";

    $query = mysqli_query($koneksi, $sql);
    if($query){
        header('location:../kelas.php');
    } else {
        echo "gagal";
        var_dump($sql);
    }
?>