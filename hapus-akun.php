<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}


include 'config/app.php';

// Menerima id_akun
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
    echo '<script>
    alert("Data akun berhasil dihapus");
    document.location.href = "crud-modal.php";
    </script>';
} else {
    echo '<script>
    alert("Data akun gagal dihapus");
    document.location.href = "crud-modal.php";
    </script>';
}