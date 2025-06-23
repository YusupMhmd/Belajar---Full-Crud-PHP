<?php

// Agar data berubah jadi json
header('Content-Type: application/json');

require '../config/app.php';

// menerima request put/delete
parse_str(file_get_contents('php://input'), $delete);

// Menerima input id data yang akan dihapus
$id_barang = $delete['id_barang'];

// Query delete data
$query = "DELETE FROM barang WHERE id_barang = $id_barang";
mysqli_query($db, $query);

// Cek apakah data berhasil atau tidak
if ($query) {
    echo json_encode(['pesan' => 'Data berhasil dihapus']);
} else {
    echo json_encode(['pesan' => 'Data gagal dihapus']);
}


echo json_encode(['data_barang' => $query]);

?>