
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare($koneksi, "SELECT * FROM siswa WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$siswa = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$siswa) {
    header("Location: index.php");
    exit;
}

$error = '';

$nis = $siswa['nis'] ?? '';
$nama = $siswa['nama'] ?? '';
$kelas = $siswa['kelas'] ?? '';
$jurusan = $siswa['jurusan'] ?? '';
$no_hp = $siswa['no_hp'] ?? '';
$alamat = $siswa['alamat'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis = trim($_POST['nis'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $kelas = trim($_POST['kelas'] ?? '');
    $jurusan = trim($_POST['jurusan'] ?? '');
    $no_hp = trim($_POST['no_hp'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');

    if ($nis === '' || $nama === '' || $kelas === '' || $jurusan === '') {
        $error = 'NIS, nama, kelas, dan jurusan wajib diisi.';
    } else {
        $stmt = mysqli_prepare(
            $koneksi,
            "UPDATE siswa
             SET nis=?, nama=?, kelas=?, jurusan=?, no_hp=?, alamat=?
             WHERE id=?"
        );

        mysqli_stmt_bind_param(
            $stmt, "ssssssi",
            $nis, $nama, $kelas, $jurusan, $no_hp, $alamat, $id
        );

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: index.php?pesan=edit");
            exit;
        }

        $error = mysqli_stmt_errno($stmt) === 1062
            ? 'NIS sudah digunakan siswa lain.'
            : 'Gagal memperbarui data siswa.';

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Data Siswa</h1>

    <?php if ($error !== ''): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-4">
            <label class="block mb-2 font-medium">NIS *</label>
            <input type="text" name="nis" required
                   value="<?= htmlspecialchars($nis) ?>"
                   class="w-full border rounded-lg p-3">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Nama Siswa *</label>
            <input type="text" name="nama" required
                   value="<?= htmlspecialchars($nama) ?>"
                   class="w-full border rounded-lg p-3">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Kelas *</label>
            <input type="text" name="kelas" required
                   value="<?= htmlspecialchars($kelas) ?>"
                   class="w-full border rounded-lg p-3">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Jurusan *</label>
            <input type="text" name="jurusan" required
                   value="<?= htmlspecialchars($jurusan) ?>"
                   class="w-full border rounded-lg p-3">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Nomor HP</label>
            <input type="text" name="no_hp"
                   value="<?= htmlspecialchars($no_hp) ?>"
                   class="w-full border rounded-lg p-3">
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">Alamat</label>
            <textarea name="alamat" rows="3"
                      class="w-full border rounded-lg p-3"><?= htmlspecialchars($alamat) ?></textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
                Simpan Perubahan
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
