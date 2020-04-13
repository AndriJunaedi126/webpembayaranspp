<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";

    error_reporting(0);
  $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
  if(empty($id)){
      header('location:kelas.php');
  }
  if(isset($id)){
    $sql        = "SELECT * FROM kelas WHERE id_kelas='$id';";
    $query      = mysqli_query($koneksi,$sql);
    $data       = mysqli_fetch_array($query);
  }

?>
<!doctype html>
<html class="no-js" lang="en"> 


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Kelas | Admin</title>
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
                                <strong>Edit Kelas</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="models/Update-kelas.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $data['id_kelas'] ?>">
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="nama_kelas"
                                                class=" form-control-label">Nama Kelas</label></div>
                                        <div class="col-12 col-md-3"><input type="text" id="nama_kelas"
                                                name="nama_kelas" placeholder="Nama Kelas.." class="form-control" value="<?php echo $data['nama_kelas'] ?>"
                                                required><small class="form-text text-muted">Disarankan menggunakan
                                                huruf kapital.</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="tahun"
                                                class=" form-control-label">Kompetensi Keahlian</label></div>
                                        <div class="col-12 col-md-4">
                                        <select name="komp_keahlian" id="komp_keahlian" class="form-control"
                                                required>
                                                <script>
                                                    <?php  $sql = "select id_kelas, komp_keahlian from kelas where id_kelas=$data[id_kelas]";
                                                    $query = mysqli_query($koneksi, $sql);
                                                    $data = mysqli_fetch_array($query);
                                                    ?>
                                                    var komp = ["<?php echo $data['komp_keahlian'];?>","Rekayasa Perangkat Lunak", "Perbankan Syari'ah", "Elektronika"];
                                                    komp.forEach((komp) => {
                                                        document.write('<option value="' + komp + '">' + komp + '</option>');
                                                    });
                                                </script>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                            <a class="text-light" href="kelas.php"><i
                                                    class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                                    </div>
                                    <div class="col col-md-10">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
                                    </div>
                                    <div class="col col-md-12">                                        
                                        
                                        </button></div>
                                </form>

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