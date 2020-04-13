<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>SPP | Siswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="apple-icon.png" />
  <link rel="shortcut icon" href="favicon.ico" />

  <link rel="stylesheet" href="../admin/vendors/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../admin/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../admin/vendors/themify-icons/css/themify-icons.css" />
  <link rel="stylesheet" href="../admin/vendors/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="../admin/vendors/selectFX/css/cs-skin-elastic.css" />
  <link rel="stylesheet" href="../admin/vendors/jqvmap/dist/jqvmap.min.css" />

  <link rel="stylesheet" href="assets/css/style.css" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- Left Panel -->
  <?php include "components/left-panel.php" ?>
  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <?php include "components/header.php"; ?>
    <!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Dashboard Siswa</h1>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li class="active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-1">
        <div class="card-body pb-0">
          <div class="dropdown float-right">
            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button"
              id="dropdownMenuButton1" data-toggle="dropdown">
              <i class="fa fa-cog"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <div class="dropdown-menu-content">
                <a class="dropdown-item" href="log-pembayaran.php">Log Pembayaran</a>
              </div>
            </div>
          </div>
          <h4 class="mb-0">
            <span class="count"><?php
            $id = $_SESSION['id_siswa'];
            $sql = "select COUNT(*) FROM pembayaran WHERE id_siswa=$id";
            $query = mysqli_query($koneksi, $sql);
            $data  = mysqli_fetch_array($query);
             echo $data['COUNT(*)'];
            ?></span>
          </h4>
          <p class="text-light">Total Pembayaran</p>

          <div class="chart-wrapper px-0" style="height:70px;" height="70">
            <canvas id="widgetChart1"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->

  </div>
  <!-- .content -->
  </div>
  <!-- /#right-panel -->

  <!-- Right Panel -->

  <script src="../admin/vendors/jquery/dist/jquery.min.js"></script>
  <script src="../admin/vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="../admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../admin/assets/js/main.js"></script>

  <script src="../admin/vendors/chart.js/dist/Chart.bundle.min.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/widgets.js"></script>
  <script src="../admin/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="../admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <script src="../admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script>
    (function ($) {
      "use strict";

      jQuery("#vmap").vectorMap({
        map: "world_en",
        backgroundColor: null,
        color: "#ffffff",
        hoverOpacity: 0.7,
        selectedColor: "#1de9b6",
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: ["#1de9b6", "#03a9f5"],
        normalizeFunction: "polynomial"
      });
    })(jQuery);
  </script>
</body>

</html>