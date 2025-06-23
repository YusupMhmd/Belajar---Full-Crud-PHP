<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}


$title = 'Daftar Akun';

include 'layout/header.php';

// Tampil seluruh data
$data_akun = select("SELECT * FROM akun ORDER BY id_akun DESC");

// Tampil data berdasarkan user login
$id_akun = $_SESSION['id_akun'];
$data_byLogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");

// Jika tombol tambah ditekan, maka:
if (isset($_POST['tambah'])){
    if (create_akun($_POST) > 0) {
        echo "<script>
            alert('Data akun berhasil ditambahkan');
            document.location.href = 'crud-modal.php';
        </script>";
    } else {
        echo "<script>
            alert('Data akun gagal ditambahkan');
            document.location.href = 'crud-modal.php';
        </script>";
    }
}

// Jika tombol ubah ditekan, maka:
if (isset($_POST['ubah'])){
    if (update_akun($_POST) > 0) {
        echo "<script>
            alert('Data akun berhasil diubahkan');
            document.location.href = 'crud-modal.php';
        </script>";
    } else {
        echo "<script>
            alert('Data akun gagal diubahkan');
            document.location.href = 'crud-modal.php';
        </script>";
    }
}

?>

<div class="container mt-3">

    <div class="card mb-3">
        <div class="card-header">
            <h3 class="card-title"><i class="bi bi-person-workspace"></i> <?= $title ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <?php if($_SESSION["level"] == 1) : ?>
                    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="bi bi-plus-lg"></i> Tambah Akun</button>
                <?php endif ?>
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <!-- Tampil seluruh data  -->
                    <?php if($_SESSION['level'] == 1) : ?>
                    <?php foreach ($data_akun as $akun) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $akun['nama']; ?></td>
                            <td><?= $akun['username']; ?></td>
                            <td><?= $akun['email']; ?></td>
                            <td>Password Ter-enkripsi</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success mb-1 btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUbah<?= $akun['id_akun']; ?>"><i class="bi bi-pencil-square"></i> Ubah</button>
                                <button type="button" class="btn btn-danger mb-1 btn-sm"
                                data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun'] ?>"><i class="bi bi-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <!-- Tampil data berdasarkan user login -->
                    <?php else : ?>
                        <?php foreach ($data_byLogin as $akun) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $akun['nama']; ?></td>
                            <td><?= $akun['username']; ?></td>
                            <td><?= $akun['email']; ?></td>
                            <td>Password Ter-enkripsi</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success mb-1 btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUbah<?= $akun['id_akun']; ?>"><i class="bi bi-pencil-square"></i> Ubah</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama akun" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan username akun" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email akun" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password akun" required minlength="6" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="level">level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- Pilih Level --</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator Barang</option>
                            <option value="3">Operator Mahasiswa</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal ubah -->
<?php foreach($data_akun as $akun) : ?>
<div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama akun" value="<?= $akun['nama']; ?>" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan username akun" value="<?= $akun['username']; ?>" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email akun" value="<?= $akun['email']; ?>" required autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="password">Password <small>(Masukan password lama / baru)</small> </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password akun" required minlength="6" autocomplete="off">
                    </div>

                    <?php if($_SESSION['level'] == 1) : ?>
                        <div class="mb-3">
                            <label for="level">level</label>
                            <select name="level" id="level" class="form-control" required>
                                <?php $level = $akun['level']; ?>
                                <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                                <option value="2" <?= $level == '2' ? 'selected' : null ?> >Operator Barang</option>
                                <option value="3" <?= $level == '3' ? 'selected' : null ?> >Operator Mahasiswa</option>
                            </select>
                        </div>
                    <?php else : ?>
                        <input type="hidden" name="level" value="<?= $akun['level']; ?>">
                    <?php endif ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="ubah" class="btn btn-success text-white">Ubah Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>

<!-- Modal hapus -->
<?php foreach ($data_akun as $akun) : ?>
<div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p>Yakin data <?= $akun['nama']; ?> akan dihapus?</p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>

<?php include 'layout/footer.php' ?>