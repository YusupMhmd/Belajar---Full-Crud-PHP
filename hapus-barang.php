<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}

include 'config/app.php';

// Menerima id_barang
$id_barang = (int)$_GET['id_barang'];

if (delete_barang($id_barang) > 0) {
    echo '<script>
    alert("Data barang berhasil dihapus");
    document.location.href = "index.php";
    </script>';
} else {
    echo '<script>
    alert("Data barang gagal dihapus");
    document.location.href = "index.php";
    </script>';
}