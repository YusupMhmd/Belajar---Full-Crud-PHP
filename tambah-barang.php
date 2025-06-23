<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}


$title = 'Tambah Barang';

include 'layout/header.php';

// cek apakah tombol tambah ditekan
if(isset($_POST['tambah'])){
    if (create_barang($_POST) > 0) {
        echo "<script>
            alert('Data barang berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data barang gagal ditambahkan');
            document.location.href = 'index.php';
        </script>";
    }
}

?>

    <div class="container mt-3">
        <h1>Tambah Barang</h1>
        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama barang" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan jumlah barang" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">harga Barang</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan harga barang" required autocomplete="off">
            </div>

            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
            <a href="index.php" class="btn btn-primary me-2" style="float: right;">Kembali</a>
        </form>
    </div>

<?php include 'layout/footer.php' ?>