
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

$error = '';

$nama_perusahaan = '';
$alamat = '';
$no_telp = '';
$email = '';
$kuota = '0';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_perusahaan = trim($_POST['nama_perusahaan'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    $no_telp = trim($_POST['no_telp'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $kuota_input = $_POST['kuota'] ?? '';

    if (
        $nama_perusahaan === '' ||
        $alamat === '' ||
        $kuota_input === '' ||
        filter_var($kuota_input, FILTER_VALIDATE_INT) === false ||
        (int)$kuota_input < 0
    ) {
        $error = 'Nama perusahaan, alamat, dan kuota yang valid wajib diisi.';
    } elseif ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email tidak valid.';
    } else {
        $kuota = (int)$kuota_input;

        $stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO tempat
     (nama_perusahaan, alamat, no_telp, email, kuota)
     VALUES (?, ?, ?, ?, ?)"
);

        mysqli_stmt_bind_param(
            $stmt, "ssssi",
            $nama_perusahaan, $alamat, $no_telp, $email, $kuota
        );

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: index.php?pesan=tambah");
            exit;
        }

        $error = 'Gagal menyimpan tempat PKL. Periksa database kamu.';
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tempat PKL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Tempat PKL</h1>

    <?php if ($error !== ''): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-4">
            <label class="block mb-2 font-medium">Nama Perusahaan *</label>
            <input type="text" name="nama_perusahaan" required
                   value="<?= htmlspecialchars($nama_perusahaan) ?>"
                   class="w-full border rounded-lg p-3"
                   placeholder="Masukkan nama perusahaan">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Alamat *</label>
            <textarea name="alamat" rows="3" required
                      class="w-full border rounded-lg p-3"
                      placeholder="Masukkan alamat perusahaan"><?= htmlspecialchars($alamat) ?></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Nomor Telepon</label>
            <input type="text" name="no_telp"
                   value="<?= htmlspecialchars($no_telp) ?>"
                   class="w-full border rounded-lg p-3"
                   placeholder="Masukkan nomor telepon">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Email</label>
            <input type="email" name="email"
                   value="<?= htmlspecialchars($email) ?>"
                   class="w-full border rounded-lg p-3"
                   placeholder="contoh@perusahaan.com">
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">Kuota Siswa *</label>
            <input type="number" name="kuota" min="0" required
                   value="<?= htmlspecialchars((string)$kuota) ?>"
                   class="w-full border rounded-lg p-3"
                   placeholder="Contoh: 10">
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
                Simpan
            </button>
            <a href="index.php"
               class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-lg">
                Kembali
            </a>
        </div>
    </form>
</div>

</body>
</html>
