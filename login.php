<?php

session_start();

include 'config/app.php';

// Cek apakah tombol login ditekan
if (isset($_POST['login'])) {
  // Ambil input username dan password
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Cek username
  $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");

  // Jika username ketemu
  if (mysqli_num_rows($result) == 1) {
    // Cek password
    $hasil = mysqli_fetch_assoc($result);
    if (password_verify($password, $hasil['password'])) {
      // Set session
      $_SESSION['login']    = true;
      $_SESSION['id_akun']  = $hasil['id_akun'];
      $_SESSION['nama']     = $hasil['nama'];
      $_SESSION['username'] = $hasil['username'];
      $_SESSION['email']    = $hasil['email'];
      $_SESSION['level']    = $hasil['level'];

      // Jika login benar maka arahkan ke index.php
      header("location: index.php");
      exit();
    }
  }

  // Jika ada usernya/login salah
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link href="assets/css/sign-in.css" rel="stylesheet" />
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: #0000001a;
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em #0000001a,
        inset 0 .125em .5em #00000026;
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .bi {
      width: 1em;
      height: 1em;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <!-- Login Form -->
  <main class="form-signin w-100 m-auto">
    <form action="" method="post">
      <h1 class="h3 mb-3 fw-normal text-center">Harap login untuk masuk</h1>

      <?php if(isset($error)) : ?>
        <div class="alert alert-danger text-center">
          <strong>Username atau Password SALAH</strong>
        </div>
      <?php endif ?>

      <div class="form-floating">
        <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Masukan username" required/>
        <label for="floatingInput">Username</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Masukan password" required/>
        <label for="floatingPassword">Password</label>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit" name="login"><i class="bi bi-box-arrow-in-right" style="font-size: 20px;"></i> <b>Login</b></button>
      <p class="mt-2 mb-3 text-body-secondary text-center">Copyright &copy; Yusup Muhamad <?= date('Y'); ?></p>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
