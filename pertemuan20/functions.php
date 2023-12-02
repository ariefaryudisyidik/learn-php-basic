<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "root", "phpdasar");

function query($query)
{
    // Ambil variabel $conn dari luar function
    global $conn;
    // Ambil data dari tabel mahasiswa / query data mahasiswa
    $result = mysqli_query($conn, $query);
    // Wadah kosong untuk menampung isi array
    $rows = [];
    // Mengambil data dari object result
    while ($row = mysqli_fetch_assoc($result)) {
        // Memasukkan data ke dalam array
        $rows[] = $row;
    }
    // Mengembalikan isi array
    return $rows;
}

function tambah($data)
{
    // Ambil variabel $conn dari luar function
    global $conn;
    // Ambil data dari tiap elemen dalam form
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // Upload gambar
    if (!$gambar) {
        return false;
    }

    // Query insert data
    $query = "INSERT INTO mahasiswa VALUES
        (NULL, '$npm', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    // Ambil variabel $conn dari luar function
    global $conn;
    // Query delete data
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    // Ambil variabel $conn dari luar function
    global $conn;
    // Ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user pilih gambar baru atau tidak
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
    }

    // Query insert data
    $query = "UPDATE mahasiswa SET
        npm = '$npm',
        nama = '$nama',
        email = '$email',
        jurusan = '$jurusan',
        gambar = '$gambar'
        WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    // Ambil data dari tabel mahasiswa / query data mahasiswa
    $query = "SELECT * FROM mahasiswa WHERE
        nama LIKE '%$keyword%' OR
        npm LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'";
    return query($query);
}

function upload()
{
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu!');
            </script>
        ";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode(".", $namaFile);
    // Mengambil ekstensi gambar yang diupload
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // Cek apakah ekstensi gambar yang diupload sesuai dengan yang ada di array
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Yang anda upload bukan gambar!');
            </script>
        ";
        return false;
    }

    // Cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar!');
            </script>
        ";
        return false;
    }

    // Lolos pengecekan, gambar siap diupload
    // Generate nama gambar baru
    $namaFileBaru = uniqid();
    // Tambahkan ekstensi gambar yang diupload
    $namaFileBaru .= "." . $ekstensiGambar;

    // Memindahkan file yang diupload ke folder img
    move_uploaded_file($tmpName, "img/" . $namaFileBaru);

    return $namaFileBaru;
}

function registrasi($data)
{
    global $conn;

    // Stripslashes() untuk menghilangkan backslash
    $username = strtolower(stripslashes($data["username"]));
    // mysqli_real_escape_string() untuk memungkinkan user memasukkan password dengan tanda petik
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek apakah username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    // Mengembalikan nilai berupa angka
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username sudah terdaftar!');
            </script>
        ";
        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai!');
            </script>
        ";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES
        (NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);
}
