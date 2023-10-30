<?php

$mahasiswa = [
    ["Arief Aryudi Syidik", "18312087", "Informatika", "arief_aryudi_syidik@teknokrat.ac.id"],
    ["Hendra Setiawa", "18412023", "Sistem Informasi", "hendra_setiawan@teknokrat.ac.id"],
    ["Reynaldi", "18212023", "Pendidikan Olahraga", "reynaldi@teknokrat.ac.id"],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahsaiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>Nama : <?= $mhs[0]; ?></li>
            <li>NIM : <?= $mhs[1]; ?></li>
            <li>Jurusan : <?= $mhs[2]; ?></li>
            <li>Email : <?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>