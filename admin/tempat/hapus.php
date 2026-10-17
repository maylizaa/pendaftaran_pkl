
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM tempat_pkl WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    $berhasil = mysqli_stmt_affected_rows($stmt) > 0;
    mysqli_stmt_close($stmt);

    header(
        "Location: index.php" .
        ($berhasil ? "?pesan=hapus" : "")
    );
    exit;
}

mysqli_stmt_close($stmt);
http_response_code(500);
exit("Gagal menghapus tempat PKL. Periksa apakah tempat tersebut masih digunakan dalam data pendaftaran.");
?>
