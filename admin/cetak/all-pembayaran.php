<?php
    include "../../models/koneksi.php";
    include "cek-akses.php";
?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Semua Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

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
                            <div class="card-header">
                                <strong class="card-title">Laporan Pembayaran</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NISN</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Bulan</th>
                                            <th scope="col">Nominal</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "select nisn,nama_lengkap,nama_kelas,bulan,tahun,jumlah_bayar, waktu_bayar,status from log_pembayaran inner join pembayaran on log_pembayaran.id_pembayaran = pembayaran.id_pembayaran join siswa on pembayaran.id_siswa = siswa.id_siswa join user on pembayaran.id_user = user.id_user JOIN spp ON pembayaran.id_spp= spp.id_spp JOIN kelas ON siswa.id_kelas = kelas.id_kelas";
                                        $no=1;
                                        $query = mysqli_query($koneksi, $sql);
                                        while($data = mysqli_fetch_array($query)){
                                            echo "
                                            <tr>
                                            <th scope='row'>$no</th>
                                            <td>$data[nisn]</td>
                                            <td>$data[nama_lengkap]</td>
                                            <td>$data[nama_kelas]</td>
                                            <td>$data[bulan] - $data[tahun]</td>
                                            <td>$data[jumlah_bayar]</td>
                                            <td>$data[waktu_bayar]</td>
                                            <td>$data[status]</td>
                                        </tr>
                                            ";
                                            $no++;
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


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>

</html>
