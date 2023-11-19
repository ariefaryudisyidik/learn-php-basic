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
