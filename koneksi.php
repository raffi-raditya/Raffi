<?php

$namahost = "localhost";
$user = "root";
$password = "";
$database = "tugas";
$conn = mysqli_connect($namahost, $user, $password, $database);
if (!$conn) {
    echo "Database tidak terhubung";
}


?>