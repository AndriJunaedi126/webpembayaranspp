<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";
?>

<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Pembayaran | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="images/favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

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
                            <li><a href="#">Laporan</a></li>
                            <li class="active">Pembayaran</li>
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
                                <strong class="card-title" v-if="headerText">Laporan Pembayaran</strong>
                            </div>

                            <div class="card-body">

                                <div class="typo-headers">
                                    <div class="col-sm-4">
                                        <h4 class="pb-2 display-5">Semua Pembayaran</h4>
                                    </div>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-sm ml-3">
                                            <a href="cetak/all-pembayaran.php" class="text-light"><i class="ti ti-import mr-2"></i>   Cetak </a>
                                        </button>
                                    </div>
                                    <div class="col-sm-4 mt-3">
                                        <h4 class="pb-2 display-5">Pembayaran Berdasarkan Tanggal</h4>
                                    </div>
                                    <div class="col-sm-8 mt-2">
                                        <div class="col-sm-3">
                                            <form method="GET" action="cetak/pembayaran-tanggal.php">
                                            <select name="tanggal" id="tanggal" class="form-control mt-1" required>
                                                <option value="">Pilih Tanggal..</option>
                                                <?php
                                                    $sql = "select tanggal_dibayar from log_pembayaran GROUP BY tanggal_dibayar";
                                                    $query = mysqli_query($koneksi, $sql);
                                                    while($data = mysqli_fetch_array($query)){
                                                        echo "<option value='$data[tanggal_dibayar]'>$data[tanggal_dibayar]</option>";
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary btn-sm mt-1">
                                                <i class="ti ti-import mr-2"></i>   Cetak
                                            </button>
                                        </form>
                                        </div>                             
                                    </div>
                                    <div class="col-sm-4 mt-3">
                                        <h4 class="pb-2 display-5">Pembayaran Berdasarkan Bulan</h4>
                                    </div>
                                    <div class="col-sm-8 mt-2">
                                        <div class="col-sm-3">
                                            <form method="GET" action="cetak/pembayaran-bulan.php">
                                            <select name="bulan" id="bulan" class="form-control mt-1" required>
                                                <option value="">Pilih Bulan..</option>
                                                <?php
                                                    $sql = "select bulan_dibayar, tahun_dibayar from log_pembayaran GROUP BY bulan_dibayar";
                                                    $query = mysqli_query($koneksi, $sql);
                                                    while($data = mysqli_fetch_array($query)){
                                                        echo "<option value='$data[bulan_dibayar]'>$data[bulan_dibayar] - $data[tahun_dibayar]</option>";
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary btn-sm mt-1">
                                                <i class="ti ti-import mr-2"></i>   Cetak
                                            </button>
                                        </form>
                                        </div>                             
                                    </div>

                                    <div class="col-sm-4">
                                        <h4 class="pb-2 display-5 mt-2">SPP Berdasarkan Tahun</h4>
                                    </div>
                                    <div class="col-sm-8 mt-2">
                                    <div class="col-sm-3">
                                            <form method="GET" action="cetak/pembayaran-tahun.php">
                                            <select name="tahun" id="tahun" class="form-control mt-1" required>
                                                <option value="">Pilih Tahun..</option>
                                                <?php
                                                    $sql = "select tahun_dibayar from log_pembayaran GROUP BY tahun_dibayar";
                                                    $query = mysqli_query($koneksi, $sql);
                                                    while($data = mysqli_fetch_array($query)){
                                                        echo "<option value='$data[tahun_dibayar]'>$data[tahun_dibayar]</option>";
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <button type="submit" class="btn btn-primary btn-sm mt-1">
                                                <i class="ti ti-import mr-2"></i>   Cetak
                                            </button>
                                        </form>
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


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>