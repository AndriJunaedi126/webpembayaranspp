<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'db_spp';

$koneksi = mysqli_connect($host, $user, $password, $db);

if(isset($koneksi)){
}else{
    echo "gagal terkoneksi harap periksa host, user, password atau nama database";
}

?>