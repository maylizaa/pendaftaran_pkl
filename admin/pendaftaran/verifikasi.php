
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

function e($nilai) {
    return htmlspecialchars((string)$nilai, ENT_QUOTES, 'UTF-8');
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    exit('ID pendaftaran tidak valid.');
}

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT p.*, s.nama_siswa, t.nama_tempat
     FROM pendaftaran AS p
     INNER JOIN siswa AS s ON p.siswa_id = s.id
     INNER JOIN tempat_pkl AS t ON p.tempat_pkl_id = t.id
     WHERE p.id = ?"
);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);

if (!$data) {
    exit('Data pendaftaran tidak ditemukan.');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'] ?? '';
    $catatan = trim($_POST['catatan'] ?? '');

    $statusValid = ['menunggu', 'diterima', 'ditolak'];

    if (!in_array($status, $statusValid, true)) {
        $error = 'Status pendaftaran tidak valid.';
    } else {
        $stmt = mysqli_prepare(
            $koneksi,
            "UPDATE pendaftaran SET status = ?, catatan = ? WHERE id = ?"
        );

        mysqli_stmt_bind_param($stmt, "ssi", $status, $catatan, $id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header('Location: index.php');
            exit;
        }

        $error = 'Gagal menyimpan verifikasi: ' . mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
    }

    $data['status'] = $status;
    $data['catatan'] = $catatan;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6 md:p-8">
    <h1 class="text-2xl font-bold text-gray-800">Verifikasi Pendaftaran</h1>
    <p class="text-gray-500 mt-1 mb-6">Periksa data sebelum menentukan status.</p>

    <?php if ($error !== ''): ?>
        <p class="bg-red-100 text-red-700 p-3 rounded-lg mb-4"><?= e($error) ?></p>
    <?php endif; ?>

    <div class="bg-gray-50 rounded-lg p-4 mb-6 space-y-2">
        <p><span class="text-gray-500">Nama siswa:</span> <strong><?= e($data['nama_siswa']) ?></strong></p>
        <p><span class="text-gray-500">Tempat PKL:</span> <strong><?= e($data['nama_tempat']) ?></strong></p>
        <p><span class="text-gray-500">Periode:</span> <?= e($data['tanggal_mulai']) ?> sampai <?= e($data['tanggal_selesai']) ?></p>
        <p><span class="text-gray-500">Status sekarang:</span> <?= e(ucfirst($data['status'])) ?></p>
    </div>

    <form method="post" class="space-y-5">
        <div>
            <label for="status" class="block font-medium mb-2">Status Pendaftaran</label>
            <select name="status" id="status" required class="w-full border rounded-lg p-3">
                <?php foreach (['menunggu', 'diterima', 'ditolak'] as $pilihan): ?>
                    <option value="<?= e($pilihan) ?>"
                        <?= $data['status'] === $pilihan ? 'selected' : '' ?>>
                        <?= e(ucfirst($pilihan)) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="catatan" class="block font-medium mb-2">Catatan Admin</label>
            <textarea name="catatan" id="catatan" rows="4"
                      class="w-full border rounded-lg p-3"
                      placeholder="Tulis alasan atau catatan jika diperlukan..."><?= e($data['catatan'] ?? '') ?></textarea>
        </div>

        <div class="flex flex-wrap gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
                Simpan Verifikasi
            </button>
            <a href="index.php" class="bg-gray-200 px-5 py-3 rounded-lg">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>
