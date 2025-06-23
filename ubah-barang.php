<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}


$title = 'Ubah Barang';

include 'layout/header.php';

// Mengambil id barang dari url
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

// cek apakah tombol ubah ditekan
if(isset($_POST['ubah'])){
    if (update_barang($_POST) > 0) {
        echo "<script>
            alert('Data barang berhasil diubah');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data barang gagal diubah');
            document.location.href = 'index.php';
        </script>";
    }
}

?>

    <div class="container mt-3">
        <h1>Ubah Barang</h1>
        <hr>

        <form action="" method="post">

            <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']; ?>" placeholder="Masukan nama barang" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah']; ?>" placeholder="Masukan jumlah barang" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">harga Barang</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>" placeholder="Masukan harga barang" required>
            </div>

            <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
            <a href="index.php" class="btn btn-primary me-2" style="float: right;">Kembali</a>
        </form>
    </div>

<?php include 'layout/footer.php' ?>