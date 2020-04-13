<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";
    
    $id_siswa       = mysqli_real_escape_string($koneksi, $_POST['id_siswa']);
    $nisn           = mysqli_real_escape_string($koneksi, $_POST['nisn']);
    $nis            = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama_lengkap   = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $alamat         = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_telp        = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
    $kelas          = mysqli_real_escape_string($koneksi, $_POST['kelas']);

    $sql        = "UPDATE siswa SET nisn = '$nisn', nis = '$nis', nama_lengkap = '$nama_lengkap', id_kelas='$kelas', alamat ='$alamat', no_telp = '$no_telp' WHERE id_siswa ='$id_siswa';";

    $query      = mysqli_query($koneksi,$sql);

    if($query){
        header('location:../all-siswa.php');
    } else {
        var_dump($sql);
        echo "Update gagal";
    }
?>