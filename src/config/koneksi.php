```php
<?php

// Pengaturan koneksi database
$host     = "localhost";
$username = "root";
$password = "";
$database = "pendaftaran_pkl";

// Membuat koneksi ke MySQL
$koneksi = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mengatur karakter agar mendukung teks Indonesia
mysqli_set_charset($koneksi, "utf8mb4");

?>
```