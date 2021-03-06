<?php
  include "../models/koneksi.php"; 
  include "models/cek-akses.php";
  error_reporting(0);
  $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pembayaran | Petugas</title>
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
                        <h1>Dashboard Admin</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Pembayaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <?php
                    if(empty($id)){
                        include "components/cari-siswa.php";
                    }

                    if(!empty($id)){
                        $sql ="select id_siswa,nisn,nama_lengkap from siswa where id_siswa=$id";
                        $query = mysqli_query($koneksi,$sql);
                        $data = mysqli_fetch_array($query);

                        include "components/pembayaran.php";
                    }
                ?>

                </div><!-- .animated -->
            </div><!-- .content -->


        </div><!-- /#right-panel -->

        <!-- Right Panel -->

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/script.js"></script>
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