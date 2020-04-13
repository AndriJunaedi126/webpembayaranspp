<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";
?>
<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelas | Admin</title>
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
                            <li class="active">Kelas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Semua Kelas</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Kelas</th>
                                            <th>Kompetensi Keahlian</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "select * from kelas";
                                        $query = mysqli_query($koneksi, $sql);
                                        while($data = mysqli_fetch_array($query)){
                                            echo "<tr>
                                            <td>$data[id_kelas]</td>
                                            <td>$data[nama_kelas]</td>
                                            <td>$data[komp_keahlian]</td>
                                            <td>                                                        
                                            <div class='dropdown float-right'>
                                            <button class='btn bg-transparent dropdown-toggle theme-toggle text-dark'
                                            type='button' id='opsi-siswa' data-toggle='dropdown'>
                                            <i class='fa fa-cog'></i></button>
                                            <div class='dropdown-menu' aria-labelledby='opsi-siswa'>
                                                <div class='dropdown-menu-content'>
                                                    <a class='dropdown-item text-warning'
                                                    href='edit-kelas.php?id=$data[id_kelas]'>Edit</a>
                                                    <a class='dropdown-item text-danger' href='models/Delete-kelas.php?id=$data[id_kelas]'>Delete</a>
                                                </div>
                                                </div>
                                                </div>
                                            </td>
                                            ";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <strong>Tambah Kelas</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="models/Add-kelas.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nama_kelas"
                                                class=" form-control-label">Nama Kelas</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nama_kelas"
                                                name="nama_kelas" placeholder="Nama Kelas.." class="form-control" maxlength="20"
                                                required><small class="form-text text-muted">Disarankan menggunakan
                                                huruf kapital.</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="komp_keahlian"
                                                class=" form-control-label">Kompetensi Keahlian</label></div>
                                        <div class="col-12 col-md-9">
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
                                    </div>
                                    <div class="col col-md-3">

                                    </div>
                                    <div class="col col-md-9">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>

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