<?php
// Pengkonndisian / Percabangan
// if else
// if else if else
// ternary
// switch

// $x = 20;
// if ($x < 20) {
//     echo "Benar";
// } elseif ($x == 20) {
//     echo "Bingo!";
// } else {
//     echo "Salah";
// }

// $x = 20;
// echo $x < 20 ? "Benar" : "Salah";

$x = 30;
switch ($x) {
    case 20:
        echo "Benar";
        break;
    case 30:
        echo "Bingo!";
        break;
    default:
        echo "Salah";
        break;
}
