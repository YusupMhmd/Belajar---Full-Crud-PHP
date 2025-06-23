<?php

session_start();

// Batasi halaman sebelum login
if(!isset($_SESSION["login"])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}


$title = 'Ubah Mahasiswa';

include 'layout/header.php';

// cek apakah tombol ubah ditekan
if(isset($_POST['ubah'])){
    if (update_mahasiswa($_POST) > 0) {
        echo "<script>
            alert('Data mahasiswa berhasil diubahkan');
            document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script>
            alert('Data mahasiswa gagal diubahkan');
            document.location.href = 'mahasiswa.php';
        </script>";
    }
}

// Ambil id_mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

// Query ambil data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>

    <style>
        .cke_notifications_area 
        {
            display: none !important;
        }
    </style>

    <div class="container mt-3">
        <h1>Ubah Mahasiswa</h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
            <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto']; ?>">
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>" placeholder="Masukan nama mahasiswa" required autocomplete="off">
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <select name="prodi" id="prodi" class="form-control" required>
                        <?= $prodi = $mahasiswa['prodi']; ?>
                        <option value="Teknik Informatika" <?= $prodi == 'Teknik Informatika' ? 'selected' : null ?>>Teknik Informatika</option>
                        <option value="Teknik Industri" <?= $prodi == 'Teknik Industri' ? 'selected' : null ?>>Teknik Industri</option>
                        <option value="Arsitektur" <?= $prodi == 'Arsitektur' ? 'selected' : null ?>>Arsitektur</option>
                    </select>
                </div>

                <div class="mb-3 col-6">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <?= $jk = $mahasiswa['jk']; ?>
                        <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null ?>>Laki - Laki</option>
                        <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon Mahasiswa</label>
                <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $mahasiswa['telepon']; ?>" placeholder="Masukan telepon mahasiswa" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Mahasiswa</label>
                <textarea name="alamat" id="alamat"><?= $mahasiswa['alamat']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Mahasiswa</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $mahasiswa['email']; ?>" placeholder="Masukan email mahasiswa" required autocomplete="off">
            </div>
    
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Mahasiswa</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukan foto mahasiswa"
                onchange="previewImg()">
                <p>
                    <small>Preview Gambar:</small>
                </p>
                <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="" class="img-thumbnail img-preview" width="15%">
            </div>
            
            <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
            <a href="mahasiswa.php" class="btn btn-primary me-2" style="float: right;">Kembali</a>
        </form>
    </div>

    <!-- preview image -->
    <script>
        function previewImg(){
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function (e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

<?php include 'layout/footer.php' ?>