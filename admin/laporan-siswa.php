<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";
?>

<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Siswa | Admin</title>
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
                            <li class="active">Siswa</li>
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
                                <strong class="card-title" v-if="headerText">Laporan Siswa</strong>
                            </div>

                            <div class="card-body">

                                <div class="typo-headers">
                                    <div class="col-sm-3">
                                        <h4 class="pb-2 display-5">Semua Siswa</h4>
                                    </div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary btn-sm ml-3">
                                            <i class="ti ti-import mr-2"></i>   Cetak
                                        </button>
                                    </div>
                                    <div class="col-sm-3 mt-3">
                                        <h4 class="pb-2 display-5">Siswa Berdasarkan Kelas</h4>
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <div class="col-sm-3">
                                            <form method="GET" action="#">
                                            <select name="kelas" id="kelas" class="form-control mt-1" required>
                                                <option value="">Pilih Kelas..</option>
                                                <?php
                                                    $sql = "select id_kelas, nama_kelas from kelas";
                                                    $query = mysqli_query($koneksi, $sql);
                                                    while($data = mysqli_fetch_array($query)){
                                                        echo "<option value='$data[id_kelas]'>$data[nama_kelas]</option>";
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

                                    <div class="col-sm-3">
                                        <h4 class="pb-2 display-5 mt-2">Siswa Berdasarkan Komptensi Keahlian</h4>
                                    </div>
                                    <div class="col-sm-9 mt-2">
                                        <div class="col-sm-5">
                                            <form method="GET" action="#">
                                                <select name="komp_keahlian" id="komp_keahlian" class="form-control"
                                                        required>
                                                        <option value="">Pilih Keahlian..</option>
                                                        <script>
                                                            var komp = ["Rekayasa Perangkat Lunak", "Perbankan Syari'ah", "Elektronika"];
                                                            komp.forEach((komp) => {
                                                                document.write('<option value="' + komp + '">' + komp + '</option>');
                                                            });
                                                        </script>
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