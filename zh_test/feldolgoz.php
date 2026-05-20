<?php

$nev = $_POST["nev"];
$email = $_POST["email"];
$darab = $_POST["darab"];
$nap = $_POST["nap"];

$jo = true;

$napok = ["hétfő", "kedd", "szerda", "csütörtök", "péntek"];

echo "<h1>Ellenőrzés</h1>";

/* NÉV */

if ($nev != "" && strlen($nev) >= 8 && strlen($nev) <= 30) {
    echo "Név: $nev - Helyes<br>";
} else {
    echo "Név: $nev - Hibás!<br>";
    $jo = false;
}

/* EMAIL */

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "E-mail: $email - Helyes<br>";
} else {
    echo "E-mail: $email - Hibás!<br>";
    $jo = false;
}

/* DARAB */

if (is_numeric($darab) && $darab >= 1 && $darab <= 10) {
    echo "Darab: $darab - Helyes<br>";
} else {
    echo "Darab: $darab - Hibás!<br>";
    $jo = false;
}

/* NAP */

if (in_array($nap, $napok)) {
    echo "Nap: $nap - Helyes<br>";
} else {
    echo "Nap: $nap - Hibás!<br>";
    $jo = false;
}

/* ADATBÁZIS */

if ($jo) {

    $conn = new mysqli("localhost", "root", "", "aruhaz");

    if ($conn->connect_error) {
        die("Hiba az adatbázis kapcsolatnál!");
    }

    $sql = "INSERT INTO rendeles (nev, email, darab, nap)
            VALUES ('$nev', '$email', '$darab', '$nap')";

    if ($conn->query($sql) === TRUE) {
        echo "<br>Sikeres mentés!";
    } else {
        echo "<br>Hiba mentés közben!";
    }

    $conn->close();
}

?>