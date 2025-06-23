<?php

include 'config/app.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
  </head>
  <body>
    <div>
      <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container">
          <a class="navbar-brand" href="#">CRUD PHP</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

              <?php if($_SESSION['level'] == 1 or $_SESSION['level'] == 2) : ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./index.php">Barang</a>
              </li>
              <?php endif ?>

              <?php if($_SESSION['level'] == 1 or $_SESSION['level'] == 3) : ?>
              <li class="nav-item">
                <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
              </li>
              <?php endif ?>

              <li class="nav-item">
                <a class="nav-link" href="crud-modal.php">Akun</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php" onclick="return confirm('Yakin ingin keluar?')">Logout</a>
              </li>
            </ul>
          </div>
            <div>
              <a class="navbar-brand" href="#"><?= $_SESSION['nama']; ?></a>
            </div>
        </div>
      </nav>
    </div>