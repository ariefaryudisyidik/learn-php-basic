<?php

// // Variable Scope / Lingkup Variable
// $x = 10;

// function tampilX()
// {
//     global $x;
//     echo $x;
// }

// tampilX();

// SUPERGLOBALS
// variable global milik PHP
// merupakan Array Associative

// $_GET
// $_POST
// $_REQUEST
// $_SESSION
// $_COOKIE
// $_SERVER
// $_ENV

// echo $_SERVER["SERVER_NAME"];

// $_GET
// $_GET["nama"] = "Arief Aryudi Syidik";
// $_GET["npm"] = "18312087";
// var_dump($_GET);

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
    <title>GET</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>
                <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&npm=<?= $mhs["npm"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>">
                    <?= $mhs["nama"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>