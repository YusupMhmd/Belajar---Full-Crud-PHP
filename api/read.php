<?php

// Agar data berubah jadi json
header('Content-Type: application/json');

require '../config/app.php';

$query = select("SELECT * FROM barang ORDER BY id_barang DESC");

echo json_encode(['data_barang' => $query]);

?>