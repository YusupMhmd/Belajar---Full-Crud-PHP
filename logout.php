<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}

// Kosongkan session user login
$_SESSION = [];

session_unset();
session_destroy();

header("location: login.php");

?>