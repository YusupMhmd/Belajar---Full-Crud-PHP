<?php

// Agar data berubah jadi json
header('Content-Type: application/json');

require '../config/app.php';

// Menerima input
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

// Validasi data
if ($nama == null) {
    echo json_encode(['pesan' => 'Nama barang tidak boleh kosong']);
    exit;
}

// Query tambah data
$query = "INSERT INTO barang VALUE (null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";
mysqli_query($db, $query);

// Cek apakah data berhasil atau tidak
if ($query) {
    echo json_encode(['pesan' => 'Data berhasil ditambahkan']);
} else {
    echo json_encode(['pesan' => 'Data gagal ditambahkan']);
}


echo json_encode(['data_barang' => $query]);

?>