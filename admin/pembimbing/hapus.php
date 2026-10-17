
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    exit('ID pembimbing tidak valid.');
}

$stmt = mysqli_prepare($koneksi, "DELETE FROM pembimbing WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header('Location: index.php');
    exit;
}

$error = mysqli_stmt_error($stmt);
mysqli_stmt_close($stmt);

if (mysqli_errno($koneksi) === 1451) {
    exit('Pembimbing tidak dapat dihapus karena masih terhubung dengan data pendaftaran.');
}

exit('Gagal menghapus pembimbing: ' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8'));
?>
