<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log Pembayaran | Petugas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="../admin/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->
    <?php include "components/left-panel.php"; ?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "components/header.php"; ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard Petugas</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Log Pembayaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Log Pembayaran</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NISN</th>
                                            <th>Siswa</th>
                                            <th>Kelas</th>
                                            <th>SPP Dibayar</th>
                                            <th>Nominal</th>
                                            <th>Waktu Pembayaran</th>
                                            <th>Operator</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "select id_log,nisn,nama_lengkap,nama_kelas,bulan,tahun,username,jumlah_bayar, waktu_bayar from log_pembayaran inner join pembayaran on log_pembayaran.id_pembayaran = pembayaran.id_pembayaran join siswa on pembayaran.id_siswa = siswa.id_siswa join user on pembayaran.id_user = user.id_user JOIN spp ON pembayaran.id_spp= spp.id_spp JOIN kelas ON siswa.id_kelas = kelas.id_kelas";
                                        $query = mysqli_query($koneksi, $sql);
                                        while($data = mysqli_fetch_array($query)){
                                            echo "<tr>
                                                    <td>$data[id_log]</td>
                                                    <td>$data[nisn]</td>
                                                    <td>$data[nama_lengkap]</td>
                                                    <td>$data[nama_kelas]</td>
                                                    <td>$data[bulan] - $data[tahun]</td>
                                                    <td>$data[jumlah_bayar]</td>
                                                    <td>$data[waktu_bayar]</td>
                                                    <td>$data[username]</td>
                                                    <td>
                                                        <div class='dropdown float-right'>
                                                            <button class='btn bg-transparent dropdown-toggle theme-toggle text-dark'
                                                            type='button' id='opsi-siswa' data-toggle='dropdown'>
                                                            <i class='fa fa-cog'></i></button>
                                                            <div class='dropdown-menu' aria-labelledby='opsi-siswa'>
                                                                <div class='dropdown-menu-content'>
                                                                    <a class='dropdown-item text-primary'
                                                                    href='detail-log.php?id=$data[id_log]'>Detail</a>
                                                                    <a class='dropdown-item text-success'
                                                                    href='cetak/nota.php?id=$data[id_log]'>Cetak</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                  </tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../admin/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="../admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../admin/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>