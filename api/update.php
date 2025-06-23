<?php

// Agar data berubah jadi json
header('Content-Type: application/json');

require '../config/app.php';

parse_str(file_get_contents('php://input'), $put);

// Menerima input
$id_barang = $put['id_barang'];
$nama = $put['nama'];
$jumlah = $put['jumlah'];
$harga = $put['harga'];

// Validasi data
if ($nama == null) {
    echo json_encode(['pesan' => 'Nama barang tidak boleh kosong']);
    exit;
}

// Query tambah data
$query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";
mysqli_query($db, $query);

// Cek apakah data berhasil atau tidak
if ($query) {
    echo json_encode(['pesan' => 'Data berhasil diupdate']);
} else {
    echo json_encode(['pesan' => 'Data gagal diupdate']);
}


echo json_encode(['data_barang' => $query]);

?>