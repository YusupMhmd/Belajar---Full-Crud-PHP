<?php 

// Function menampilkan
function select($query)
{
    // Panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Function menghitung total data
function get_count($query) {
    global $db;

    $result = mysqli_query($db, $query);
    
    if ($result && $row = mysqli_fetch_assoc($result)) {
        return (int) array_values($row)[0]; // ambil nilai pertama
    }

    return 0; // default jika error atau tidak ada data
}

// Function menambahkan data barang
function create_barang($post){

    global $db;

    $nama       = strip_tags($post['nama']);
    $jumlah     = strip_tags($post['jumlah']);
    $harga      = strip_tags($post['harga']);
    $barcode    = rand(100000, 999999);

    // query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', '$barcode', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

// Function mengubah data barang
function update_barang($post){

    global $db;

    $id_barang  = $post['id_barang'];
    $nama       = strip_tags($post['nama']);
    $jumlah     = strip_tags($post['jumlah']);
    $harga      = strip_tags($post['harga']);

    // query ubah data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Function menghapus data barang
function delete_barang($id_barang) {

    global $db;

    // query hapus data
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

// Function tambah mahasiswa
function create_mahasiswa($post){

    global $db;

    $nama       = strip_tags($post['nama']);
    $prodi      = strip_tags($post['prodi']);
    $jk         = strip_tags($post['jk']);
    $telepon    = strip_tags($post['telepon']);
    $alamat     = $post['alamat'];
    $email      = strip_tags($post['email']);
    $foto       = upload_file();

    // Cek upload foto
    if(!$foto){
        return false;
    }

    // query tambah data
    $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi', '$jk', '$telepon', '$alamat', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

// Function upload file
function upload_file(){

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Cek file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile = explode('.', $namaFile); // foto.jpg
    $extensifile = strtolower(end($extensifile));

    // Cek format extensi file
    if(!in_array($extensifile, $extensifileValid)){
        
        // Pesan gagal
        echo "<script>
        alert('Format file tidak valid');
        document.location.href = 'tambah-mahasiswa.php';
        </script>";

        die();

    }

    // Cek ukuran file max 2 MB
    if($ukuranFile > 2048000){

        // Pesan gagal
        echo "<script>
        alert('Ukuran file maximal 2 MB');
        document.location.href = 'tambah-mahasiswa.php';
        </script>";

        die();

    }

    // Generate nama file baru (keamanan)
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // Pindahkan ke lokal folder
    move_uploaded_file($tmpName, 'assets/img/'. $namaFileBaru);

    return $namaFileBaru;
}

// Function hapus mahasiswa
function delete_mahasiswa($id_mahasiswa){

    global $db;

    // Ambil foto mahasiswa (unlink image)
    $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    unlink("assets/img/". $foto['foto']);

    // query hapus data
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

// Function mengubah mahasiswa
function update_mahasiswa($post){

    global $db;

    $id_mahasiswa = strip_tags($post['id_mahasiswa']);
    $nama       = strip_tags($post['nama']);
    $prodi      = strip_tags($post['prodi']);
    $jk         = strip_tags($post['jk']);
    $telepon    = strip_tags($post['telepon']);
    $alamat     = $post['alamat'];
    $email      = strip_tags($post['email']);
    $fotoLama   = strip_tags($post['fotoLama']);

    // Cek upload foto baru atau tidak
    if($_FILES['foto']['error'] == 4){
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    // query ubah data
    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', alamat = '$alamat', email = '$email', foto = '$foto' WHERE id_mahasiswa  = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

// Function membuat data akun
function create_akun($post){

    global $db;

    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

    // enkripsi passoword
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Function hapus akun
function delete_akun($id_akun){

    global $db;

    // query hapus data
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

// Function update_akun
// Function membuat data akun
function update_akun($post){

    global $db;
    
    $id_akun    = strip_tags($post['id_akun']);
    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

    // enkripsi passoword
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query ubah data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level'
    WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


?>