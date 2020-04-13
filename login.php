<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="generator" content="Jekyll v3.8.5" />
  <title>Masuk | SMK PGRI Sumedang</title>
  <link rel="apple-touch-icon" href="img/apple-icon.png" />
  <link rel="shortcut icon" href="img/favicon.ico" />

  <link rel="canonical" href="css/jumbotron.html" />

  <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css" />

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <link rel="stylesheet" type="text/css" href="jumbotron.css" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="./">SMK PGRI Sumedang</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active" href="login.php">Masuk</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main role="main">

    <div class="jumbotron">
      <div class="container text-center">
        <h1 class="display-4 mt-3">Masuk</h1>
        <p>
          Selamat datang di <span class="text-info">SMK PGRI Sumedang</span><br />
          Gunakan akun Anda untuk dapat mengakses seluruh fitur kami.
        </p>
      </div>
    </div>

    <div class="container">

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form method="POST" action="models/cek-login.php">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email.." />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Kata kunci.." />
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" />
              <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>

  </main>

  <footer class="container mb-3 fixed-bottom">
    <hr />
    &copy; 2020 ~ Andri Junaedi &middot;
  </footer>
  <script type="text/javascript" src="vendors/jquery.js"></script>
  <script type="text/javascript" src="vendors/popper.min.js"></script>
  <script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>