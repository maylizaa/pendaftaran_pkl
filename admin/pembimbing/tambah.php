
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nip = trim($_POST['nip'] ?? '');
    $nama = trim($_POST['nama_pembimbing'] ?? '');
    $no_hp = trim($_POST['no_hp'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');

    if ($nama === '') {
        $error = 'Nama pembimbing wajib diisi.';
    } elseif ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email tidak valid.';
    } else {
        $stmt = mysqli_prepare(
            $koneksi,
            "INSERT INTO pembimbing (nip, nama_pembimbing, no_hp, email, alamat)
             VALUES (?, ?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "sssss", $nip, $nama, $no_hp, $email, $alamat);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header('Location: index.php');
            exit;
        }

        $error = 'Gagal menyimpan data: ' . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
    }
}

function e($nilai) {
    return htmlspecialchars((string)$nilai, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pembimbing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Pembimbing</h1>

    <?php if ($error !== ''): ?>
        <p class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= e($error) ?></p>
    <?php endif; ?>

    <form method="post" class="space-y-4">
        <div>
            <label class="block mb-1">NIP</label>
            <input name="nip" value="<?= e($_POST['nip'] ?? '') ?>"
                   class="w-full border rounded-lg p-3">
        </div>
        <div>
            <label class="block mb-1">Nama Pembimbing *</label>
            <input name="nama_pembimbing" required
                   value="<?= e($_POST['nama_pembimbing'] ?? '') ?>"
                   class="w-full border rounded-lg p-3">
        </div>
        <div>
            <label class="block mb-1">Nomor HP</label>
            <input name="no_hp" value="<?= e($_POST['no_hp'] ?? '') ?>"
                   class="w-full border rounded-lg p-3">
        </div>
        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="<?= e($_POST['email'] ?? '') ?>"
                   class="w-full border rounded-lg p-3">
        </div>
        <div>
            <label class="block mb-1">Alamat</label>
            <textarea name="alamat" class="w-full border rounded-lg p-3"><?= e($_POST['alamat'] ?? '') ?></textarea>
        </div>
        <div class="flex gap-3">
            <button class="bg-blue-600 text-white px-5 py-3 rounded-lg" type="submit">
                Simpan
            </button>
            <a href="index.php" class="bg-gray-200 px-5 py-3 rounded-lg">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>
