<?php
// $mahasiswa = [
//     ["Arief Aryudi Syidik", "18312087", "Informatika", "arief_aryudi_syidik@teknokrat.ac.id"],
//     ["Hendra Setiawan", "18412023", "Sistem Informasi", "hendra_setiawan@teknokrat.ac.id"],
//     ["Reynaldi", "18212023", "Pendidikan Olahraga", "reynaldi@teknokrat.ac.id"],
// ];

// Array Associative
// Definisinya sama seperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri
$mahasiswa  = [
    [
        "nama" => "Arief Aryudi Syidik",
        "npm" => "18312087",
        "jurusan" => "Informatika",
        "email" => "arief_aryudi_syidik@teknokrat.ac.id",
        "gambar" => "arief.jpg"
    ],
    [
        "nama" => "Hendra Setiawan",
        "npm" => "18412023",
        "jurusan" => "Sistem Informasi",
        "email" => "hendra_setiawan@teknokrat.ac.id",
        "gambar" => "hendra.jpg"
    ],
    [
        "nama" => "Reynaldi",
        "npm" => "18212023",
        "jurusan" => "Pendidikan Olahraga",
        "email" => "reynaldi@teknokrat.ac.id",
        "gambar" => "reynaldi.jpg"
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li><img src="img/<?= $mhs['gambar']; ?>" alt=<?= $mhs['nama']; ?>></li>
            <li>Nama : <?= $mhs['nama']; ?></li>
            <li>NPM : <?= $mhs['npm']; ?></li>
            <li>Jurusan : <?= $mhs['jurusan']; ?></li>
            <li>Email : <?= $mhs['email']; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>