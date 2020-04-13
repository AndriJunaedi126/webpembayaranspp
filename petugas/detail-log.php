<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";

  error_reporting(0);
  $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
  if(empty($id)){
      header('location:log-pembayaran.php');
  }
  if(isset($id)){

    $sql        = "select id_log,nisn,nis,nama_lengkap,alamat,no_telp,nama_kelas,komp_keahlian,username,email,role,bulan,tahun,nominal,jumlah_bayar, waktu_bayar from log_pembayaran inner join pembayaran on log_pembayaran.id_pembayaran = pembayaran.id_pembayaran join siswa on pembayaran.id_siswa = siswa.id_siswa join user on pembayaran.id_user = user.id_user JOIN spp ON pembayaran.id_spp= spp.id_spp JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE id_log = $id";
    $query      = mysqli_query($koneksi,$sql);
    $data       = mysqli_fetch_array($query);
  }

?>

<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail Log Pembayaran | Petugas</title>
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
                            <li class="active">Detail Log Pembayaran</li>
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
                                <strong>Detail Log Pembayaran</strong>
                            </div>
                            <div class="card-header">
                                <strong>Siswa</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="nisn"
                                                class=" form-control-label">NISN</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nisn" name="nisn"
                                                placeholder="NISN.." class="form-control"
                                                value="<?php echo $data['nisn'] ?>" readonly><small
                                                class="form-text text-muted">Nomor
                                                Induk
                                                Siswa
                                                Nasional</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="nis"
                                                class=" form-control-label">NIS</label></div>
                                        <div class="col-12 col-md-6"><input type="tel" id="nis" name="nis"
                                                placeholder="NIS.." class="form-control"
                                                value="<?php echo $data['nis']; ?>" readonly><small
                                                class="form-text text-muted">Nomor Induk
                                                Sekolah</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="nama_lengkap"
                                                class=" form-control-label">Nama Lengkap</label></div>
                                        <div class="col-12 col-md-7"><input type="text" id="nama_lengkap"
                                                name="nama_lengkap" placeholder="Nama lengkap.." class="form-control"
                                                value="<?php echo $data['nama_lengkap'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="alamat" class=" form-control-label">Alamat
                                                Lengkap</label></div>
                                        <div class="col-12 col-md-8"><textarea name="alamat" id="alamat" rows="9"
                                                placeholder="Alamat lengkap.." class="form-control"
                                                readonly><?php echo $data['alamat'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="no_telp" class=" form-control-label">Nomor
                                                Telepon</label></div>
                                        <div class="col-12 col-md-6"><input type="tel" id="no_telp" name="no_telp"
                                                placeholder="Nomor telepon.." class="form-control"
                                                value="<?php echo $data['no_telp'] ?>" readonly><small
                                                class="form-text text-muted">Nomor Whatsapp atau yang bisa
                                                dihubungi.</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="kelas"
                                                class=" form-control-label">Kelas</label>
                                        </div>
                                        <div class="col-12 col-md-4"><input type="text" id="kelas" name="kelas"
                                                placeholder="Kelas.." class="form-control"
                                                value="<?php echo $data['nama_kelas'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="komp_keahlian"
                                                class=" form-control-label">Kompetensi Keahlian</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="komp_keahlian"
                                                name="komp_keahlian" placeholder="Kompetensi Keahlian.."
                                                class="form-control" value="<?php echo $data['komp_keahlian'] ?>"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col col-md-2">
                                    </div>
                                    <div class="col col-md-10 mt-3">
                                </form>
                            </div>

                        </div>
                    </div>

                </div><!-- .animated -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <strong>Operator</strong>
                        </div>                        
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="username"
                                        class=" form-control-label">Username</label></div>
                                <div class="col-12 col-md-7"><input type="text" id="username" name="username"
                                        placeholder="Username.." class="form-control"
                                        value="<?php echo $data['username'] ?>" readonly></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9"><input type="email" id="email" name="email"
                                        placeholder="Email.." class="form-control" value="<?php echo $data['email'] ?>"
                                        readonly></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="akses"
                                        class=" form-control-label">Jabatan</label></div>
                                <div class="col-12 col-md-5"><input type="text" id="jabatan" name="jabatan"
                                        placeholder="Jabatan.." value="<?php echo $data['role'] ?>"
                                        class="form-control" readonly>
                                </div>
                                </form>
                            </div>
                            <div class="col col-md-3">

                            </div>
                            <div class="col col-md-9">
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong>SPP</strong>
                        </div>                        
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="spp"
                                        class=" form-control-label">SPP Dibayar</label></div>
                                <div class="col-12 col-md-8"><input type="text" id="spp" name="spp"
                                        placeholder="SPP Dibayar.." class="form-control"
                                        value="<?php echo $data['bulan'], ' - ', $data['tahun'] ?>" readonly></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nominal" class=" form-control-label">Nominal</label>
                                </div>
                                <div class="col-12 col-md-9"><input type="text" id="nominal" name="nominal"
                                        placeholder="Nominal.." class="form-control" value="<?php echo 'Rp ', $data['nominal'] ?>"
                                        readonly></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nominal_bayar" class=" form-control-label">Nominal Dibayar</label>
                                </div>
                                <div class="col-12 col-md-9"><input type="text" id="nominal_bayar" name="nominal_bayar"
                                        placeholder="Nominal Dibayar.." class="form-control" value="<?php echo 'Rp ', $data['jumlah_bayar'] ?>"
                                        readonly></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="waktu"
                                        class=" form-control-label">Waktu Pembayaran</label></div>
                                <div class="col-12 col-md-6"><input type="text" id="waktu" name="waktu"
                                        placeholder="Waktu Pembayaran.." value="<?php echo $data['waktu_bayar'] ?>"
                                        class="form-control" readonly>
                                </div>
                                </form>
                            </div>
                            <div class="col col-md-3">

                            </div>
                            <div class="col col-md-9">
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- .content -->


        </div><!-- /#right-panel -->

        <!-- Right Panel -->

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