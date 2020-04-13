<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";
    
    $nisn           = mysqli_real_escape_string($koneksi, $_POST['nisn']);
    $nis            = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama_lengkap   = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $alamat         = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_telp        = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
    $kelas          = mysqli_real_escape_string($koneksi, $_POST['kelas']);

    $sql = "INSERT INTO siswa ( id_siswa, nisn, nis, nama_lengkap, id_kelas, alamat, no_telp) VALUES (NULL, '$nisn', '$nis', '$nama_lengkap', '$kelas', '$alamat', '$no_telp')";

    $query = mysqli_query($koneksi, $sql);
    if($query){
        $sql2 = "SELECT id_siswa FROM `siswa` WHERE id_kelas='$kelas' ORDER BY `id_siswa` DESC LIMIT 1";
        $query = mysqli_query($koneksi,$sql2);
        $data   = mysqli_fetch_array($query);
        echo $data['id_siswa'];
        header('location:../add-akses-siswa.php?id_siswa='.$data[id_siswa]);
    } else {
        echo "gagal";
        var_dump($sql);
    }

?>
