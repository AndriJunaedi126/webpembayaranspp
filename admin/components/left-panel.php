<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
          aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="./"><img src="images/logo-pgri.png" class="mr-2" width="32px" alt="Logo" />SMK PGRI</a>
        <a class="navbar-brand hidden" href="./"><img src="images/logo-pgri.png" alt="Logo" /></a>
      </div>

      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="./">
              <i class="menu-icon fa fa-dashboard"></i>Dashboard
            </a>
          </li>
          <h3 class="menu-title">Data</h3>
          <!-- /.menu-title -->
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-laptop"></i>Siswa</a>
            <ul class="sub-menu children dropdown-menu">
              <li>
                <i class="fa fa-puzzle-piece"></i><a href="all-siswa.php">Semua Siswa</a>
              </li>
              <li>
                <i class="fa fa-id-badge"></i><a href="add-siswa.php">Tambah Siswa</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="petugas.php">
            <i class="menu-icon fa fa-table"></i>Petugas</a>
            </a>
          </li>
          <li>
            <a href="kelas.php">
              <i class="menu-icon fa fa-th"></i>Kelas
            </a>
          </li>
          <li>
            <a href="spp.php">
              <i class="menu-icon fa fa-th"></i>SPP
            </a>
          </li>

          <h3 class="menu-title">Pembayaran</h3>
          <!-- /.menu-title -->
          <li>
            <a href="pembayaran.php">
              <i class="menu-icon ti-email"></i>Pembayaran
            </a>
          </li>
          <li>
            <a href="log-pembayaran.php">
              <i class="menu-icon fa fa-bar-chart"></i>Log Pembayaran
            </a>
          </li>

          <h3 class="menu-title">Laporan</h3>
          <!-- /.menu-title -->
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-glass"></i>Laporan</a>
            <ul class="sub-menu children dropdown-menu">
              <li>
                <i class="menu-icon fa fa-sign-in"></i><a href="laporan-siswa.php">Siswa</a>
              </li>
              <li>
                <i class="menu-icon fa fa-sign-in"></i><a href="laporan-petugas.php">Petugas</a>
              </li>
              <li>
                <i class="menu-icon fa fa-paper-plane"></i><a href="laporan-spp.php">SPP</a>
              </li>
              <li>
                <i class="menu-icon fa fa-paper-plane"></i><a href="laporan-pembayaran.php">Pembayaran</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
  </aside>