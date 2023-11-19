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
    $gambar = htmlspecialchars($data["gambar"]);

    // Query insert data
    $query = "INSERT INTO mahasiswa
       VALUES
       (NULL, '$npm', '$nama', '$email', '$jurusan', '$gambar')
    ";
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
