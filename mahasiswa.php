<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}

// Batasi halaman sesuai user login
if(($_SESSION["level"] != 1 and $_SESSION["level"] != 3)){
    echo "<script>
    document.location.href = 'index.php';
    </script>";
}

$title = 'Daftar Mahasiswa';

include 'layout/header.php';

// Menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");

?>

<div class="container mt-3">
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title"><i class="bi bi-person-fill"></i> <?= $title ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="bi bi-plus-lg"></i> Tambah Mahasiswa</a>
                <a href="excel-mahasiswa.php" class="btn btn-success mb-1"><i class="bi bi-file-earmark-excel"></i> Download Excel</a>
                <a href="pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="bi bi-file-earmark-pdf"></i> Download Pdf</a>
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mahasiswa['nama']; ?></td>
                        <td><?= $mahasiswa['prodi']; ?></td>
                        <td><?= $mahasiswa['jk']; ?></td>
                        <td><?= $mahasiswa['telepon'];?></td>
                        <td class="text-center">
                            <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i> Detail</a>
                            <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil-square"></i> Ubah</a>
                            <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" 
                            class="btn btn-danger btn-sm" onclick="return confirm('Yakin data mahasiswa akan dihapus?');"><i class="bi bi-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
        </div>
</div>

<?php include 'layout/footer.php'; ?>