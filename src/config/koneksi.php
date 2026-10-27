<?php

// Pengaturan koneksi database
$host     = "localhost";
$username = "root";
$password = "";
$database = "pendaftaran_pkl";

// Membuat koneksi ke MySQL
$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>