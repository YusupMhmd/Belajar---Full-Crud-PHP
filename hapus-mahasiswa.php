<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}

include 'config/app.php';

// Menerima id_mahasiswa
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if (delete_mahasiswa($id_mahasiswa) > 0) {
    echo '<script>
    alert("Data mahasiswa berhasil dihapus");
    document.location.href = "mahasiswa.php";
    </script>';
} else {
    echo '<script>
    alert("Data mahasiswa gagal dihapus");
    document.location.href = "mahasiswa.php";
    </script>';
}