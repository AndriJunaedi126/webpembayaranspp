<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";

    error_reporting(0);
  $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
  if(empty($id)){
      header('location:spp.php');
  }
  if(isset($id)){
    $sql        = "SELECT * FROM spp WHERE id_spp='$id';";
    $query      = mysqli_query($koneksi,$sql);
    $data       = mysqli_fetch_array($query);
  }

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit SPP | Admin</title>
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
                            <li><a href="#">SPP</a></li>
                            <li class="active">Edit SPP</li>
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
                                <strong>Edit SPP</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="models/Update-spp.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="id_spp" id="id_spp" value="<?php echo $data['id_spp'] ?>">
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="bulan"
                                                class=" form-control-label">Bulan</label></div>
                                        <div class="col-12 col-md-3">
                                            <select name="bulan" id="bulan" class="form-control" required>
                                                <script>
                                                    var bulan = [ "<?php echo $data['bulan'] ?>","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                                                    bulan.forEach((bulan) => {
                                                        document.write('<option value="' + bulan + '">' + bulan + '</option>');
                                                    });
                                                </script>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="tahun"
                                                class=" form-control-label">Tahun</label></div>
                                        <div class="col-12 col-md-3">
                                            <select name="tahun" id="tahun" class="form-control" required>
                                                <script>
                                                    var tahun = ["<?php echo $data['tahun'] ?>","2019", "2020", "2021", "2022", "2023"];
                                                    tahun.forEach((tahun) => {
                                                        document.write('<option value="' + tahun + '">' + tahun + '</option>');
                                                    });
                                                </script>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="nominal"
                                                class=" form-control-label">Nominal</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="nominal" name="nominal"
                                                placeholder="Nominal.." class="form-control" minlength="4"
                                                onkeypress="return Angka(event)" maxlength="10" value="<?php echo $data['nominal'] ?>" required><small
                                                class="form-text text-muted"><small
                                                class="form-text text-muted">Tidak boleh menggunakan titik (.)</small>
                                        </div>
                                    </div>
                                    <div class="col col-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                            <a class="text-light" href="spp.php"><i
                                                    class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                                        </button>
                                    </div>
                                    <div class="col col-md-10">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
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

    <script src="assets/js/script.js"></script>
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