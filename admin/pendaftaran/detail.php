
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

function e($nilai) {
    return htmlspecialchars((string)$nilai, ENT_QUOTES, 'UTF-8');
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    exit('ID pendaftaran tidak valid.');
}

$query = "
    SELECT
        p.*,
        s.nis,
        s.nama_siswa,
        s.kelas,
        s.jurusan,
        s.alamat,
        s.no_hp,
        s.email,
        t.nama_tempat,
        t.bidang_usaha,
        t.alamat AS alamat_tempat,
        b.nama_pembimbing
    FROM pendaftaran AS p
    INNER JOIN siswa AS s ON p.siswa_id = s.id
    INNER JOIN tempat_pkl AS t ON p.tempat_pkl_id = t.id
    LEFT JOIN pembimbing AS b ON p.pembimbing_id = b.id
    WHERE p.id = ?
";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);

if (!$data) {
    exit('Data pendaftaran tidak ditemukan.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm p-6 md:p-8">
        <h1 class="text-2xl font-bold text-gray-800">Detail Pendaftaran PKL</h1>
        <p class="text-gray-500 mt-1 mb-6">Informasi lengkap pendaftaran siswa.</p>

        <h2 class="font-bold text-lg border-b pb-2 mb-3">Data Siswa</h2>
        <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div><p class="text-gray-500 text-sm">Nama</p><p class="font-medium"><?= e($data['nama_siswa']) ?></p></div>
            <div><p class="text-gray-500 text-sm">NIS</p><p><?= e($data['nis']) ?></p></div>
            <div><p class="text-gray-500 text-sm">Kelas</p><p><?= e($data['kelas']) ?></p></div>
            <div><p class="text-gray-500 text-sm">Jurusan</p><p><?= e($data['jurusan']) ?></p></div>
            <div><p class="text-gray-500 text-sm">Nomor HP</p><p><?= e($data['no_hp']) ?></p></div>
            <div><p class="text-gray-500 text-sm">Email</p><p><?= e($data['email']) ?></p></div>
        </div>

        <h2 class="font-bold text-lg border-b pb-2 mb-3">Tempat PKL</h2>
        <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div><p class="text-gray-500 text-sm">Nama Tempat</p><p><?= e($data['nama_tempat']) ?></p></div>
            <div><p class="text-gray-500 text-sm">Bidang Usaha</p><p><?= e($data['bidang_usaha']) ?></p></div>
            <div class="md:col-span-2"><p class="text-gray-500 text-sm">Alamat</p><p><?= e($data['alamat_tempat']) ?></p></div>
        </div>

        <h2 class="font-bold text-lg border-b pb-2 mb-3">Informasi Pendaftaran</h2>
        <div class="grid md:grid-cols-2 gap-4 mb-6">
            <div><p class="text-gray-500 text-sm">Tanggal Daftar</p><p><?= e($data['tanggal_daftar']) ?></p></div>
            <div><p class="text-gray-500 text-sm">Pembimbing</p><p><?= e($data['nama_pembimbing'] ?? 'Belum ditentukan') ?></p></div>
            <div><p class="text-gray-500 text-sm">Tanggal Mulai</p><p><?= e($data['tanggal_mulai']) ?></p></div>
            <div><p class="text-gray-500 text-sm">Tanggal Selesai</p><p><?= e($data['tanggal_selesai']) ?></p></div>
            <div><p class="text-gray-500 text-sm">Status</p><p class="font-semibold"><?= e(ucfirst($data['status'])) ?></p></div>
            <div class="md:col-span-2">
                <p class="text-gray-500 text-sm">Catatan</p>
                <p><?= nl2br(e($data['catatan'] ?? '-')) ?></p>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="index.php" class="bg-gray-200 px-5 py-3 rounded-lg">Kembali</a>
            <a href="verifikasi.php?id=<?= (int)$data['id'] ?>"
               class="bg-blue-600 text-white px-5 py-3 rounded-lg">Verifikasi Pendaftaran</a>
        </div>
    </div>
</div>
</body>
</html>
