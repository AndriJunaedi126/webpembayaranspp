<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";
?>

<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ta,bah Siswa | Siswa Admin</title>
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
                            <li><a href="#">Siswa</a></li>
                            <li class="active">Tambah Siswa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Tambah Siswa</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="models/Add-siswa.php" method="POST" enctype="multipart/form-data"
                                    class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="nisn"
                                                class=" form-control-label">NISN</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="nisn" name="nisn"
                                                placeholder="NISN.." class="form-control" minlength="10"
                                                onkeypress="return Angka(event)" maxlength=" 10" required><small
                                                class="form-text text-muted">Nomor
                                                Induk
                                                Siswa
                                                Nasional</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="nis"
                                                class=" form-control-label">NIS</label></div>
                                        <div class="col-12 col-md-4"><input type="tel" id="nis" name="nis"
                                                placeholder="NIS.." class="form-control" minlength="8"
                                                onkeypress="return Angka(event)" maxlength=" 8" required><small
                                                class="form-text text-muted">Nomor Induk
                                                Sekolah</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="nama_lengkap"
                                                class=" form-control-label">Nama Lengkap</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nama_lengkap"
                                                name="nama_lengkap" placeholder="Nama lengkap.." class="form-control"
                                                minlength="3" maxlength="35" onkeypress="return Huruf(event)" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="alamat" class=" form-control-label">Alamat
                                                Lengkap</label></div>
                                        <div class="col-12 col-md-6"><textarea name="alamat" id="alamat" rows="9"
                                                placeholder="Alamat lengkap.." class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="no_telp" class=" form-control-label">Nomor
                                                Telepon</label></div>
                                        <div class="col-12 col-md-4"><input type="tel" id="no_telp" name="no_telp"
                                                placeholder="Nomor telepon.." class="form-control" minlength="12"
                                                onkeypress="return Angka(event)" maxlength=" 13" required><small
                                                class="form-text text-muted">Nomor Whatsapp atau yang bisa
                                                dihubungi.</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="kelas"
                                                class=" form-control-label">Kelas</label></div>
                                        <div class="col-12 col-md-3">
                                            <select name="kelas" id="kelas" class="form-control">
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
                                    </div>
                                    <div class="col col-md-2">
                                    </div>
                                    <div class="col col-md-10 mt-3">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
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