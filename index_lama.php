<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}

// Batasi halaman sesuai user login
if(($_SESSION["level"] != 1 and $_SESSION["level"] != 2)){
    echo "<script>
    document.location.href = 'crud-modal.php';
    </script>";
}

$title = 'Daftar Barang';

include 'layout/header.php';

$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");

?>

    <div class="container mt-3">
        <h1><i class="bi bi-list-task"></i> Data Barang</h1>
        <hr>    
        <a href="tambah-barang.php" class="btn btn-primary mb-1"><i class="bi bi-plus-lg"></i> Tambah Barang</a>
        <table class="table table-bordered table-striped mt-3" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Barcode</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_barang as $barang) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $barang['nama']; ?></td>
                    <td><?= $barang['jumlah']; ?></td>
                    <td>Rp. <?= number_format($barang['harga'],0,',','.'); ?></td>
                    <td class="text-center">
                        <img alt="barcode" src="barcode-barang.php?codetype=Code128&size=15&
                        text=<?= $barang['barcode']; ?>&print=true" />
                    </td>
                    <td><?= date('d/m/Y | H:i a', strtotime($barang['tanggal'])); ?></td>
                    <td width="15%" class="text-center">
                        <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> Ubah</a>
                        <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin data akan dihapus?');"><i class="bi bi-trash"></i> Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php include 'layout/footer.php' ?>