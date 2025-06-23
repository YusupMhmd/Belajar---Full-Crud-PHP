<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}

$title = 'Detail Mahasiswa';

include 'layout/header.php';

// mengambil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];


// Menampilkan data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>

<div class="container mt-3">
        <h1>Data <?= $mahasiswa['nama']; ?></h1>
        <hr>    

        <table class="table table-bordered table-striped mt-3">
            <tr>
                <td>Nama</td>
                <td><?= $mahasiswa['nama']; ?></td>
            </tr>

            <tr>
                <td>Program Studi</td>
                <td><?= $mahasiswa['prodi']; ?></td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td><?= $mahasiswa['jk']; ?></td>
            </tr>

            <tr>
                <td>Telepon</td>
                <td><?= $mahasiswa['telepon']; ?></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td><?= $mahasiswa['alamat']; ?></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><?= $mahasiswa['email']; ?></td>
            </tr>

            <tr>
                <td width="20%">Foto</td>
                <td>
                    <a href="assets/img/<?= $mahasiswa['foto']; ?>">
                        <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto" width="15%">
                    </a>
                </td>
            </tr>
        </table>

        <a href="mahasiswa.php" class="btn btn-primary mb-3" style="float: right;">Kembali</a>
    </div>

<?php include 'layout/footer.php'; ?>