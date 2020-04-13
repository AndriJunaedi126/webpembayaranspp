<?php
    include "../../models/koneksi.php";
    include "../models/cek-akses.php";

    error_reporting(0);
    $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
    if(empty($id)){
      header('location:../log-pembayaran.php');
    }
    if(isset($id)){

    $sql        = "select log_pembayaran.id_pembayaran,nisn,nama_lengkap,nama_kelas,bulan,tahun,jumlah_bayar, waktu_bayar,status from log_pembayaran inner join pembayaran on log_pembayaran.id_pembayaran = pembayaran.id_pembayaran join siswa on pembayaran.id_siswa = siswa.id_siswa join user on pembayaran.id_user = user.id_user JOIN spp ON pembayaran.id_spp= spp.id_spp JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE id_log = $id";
    $query      = mysqli_query($koneksi,$sql);
    $data       = mysqli_fetch_array($query);
  }

?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bukti Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">


    <link rel="stylesheet" href="../../admin/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../admin/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../admin/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <script>
        window.print();
    </script>


    <div id="right-panel" class="right-panel">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="card-title">Bukti Pembayaran SPP</strong>
                                <strong class="card-title">SMK PGRI Sumedang</strong>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <strong class="card-title">ID Pembayaran</strong>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php echo ':   ', $data['id_pembayaran']; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <strong class="card-title">NISN</strong>
                                        </div>
                                        <div class="col-sm-9">
                                        <?php echo ':   ', $data['nisn']; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <strong class="card-title">Nama</strong>
                                        </div>
                                        <div class="col-sm-9">
                                        <?php echo ':   ', $data['nama_lengkap']; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <strong class="card-title">Kelas</strong>
                                        </div>
                                        <div class="col-sm-9">
                                        <?php echo ':   ', $data['nama_kelas']; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <strong class="card-title">SPP Dibayar</strong>
                                        </div>
                                        <div class="col-sm-9">
                                        <?php echo ':   ', $data['bulan'],' - ', $data['tahun']; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <strong class="card-title">Nominal</strong>
                                        </div>
                                        <div class="col-sm-9">
                                        <?php echo ':   Rp ', $data['jumlah_bayar']; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <strong class="card-title">Waktu Pembayaran</strong>
                                        </div>
                                        <div class="col-sm-9">
                                            <?php echo ':   ', $data['waktu_bayar']; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <strong class="card-title">Keterangan</strong>
                                        </div>
                                        <div class="col-sm-9">
                                        <?php echo ':   ', $data['status']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../../admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../admin/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>

</html>
