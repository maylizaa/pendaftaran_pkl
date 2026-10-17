
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

$query = "
    SELECT
        p.id,
        p.tanggal_daftar,
        p.tanggal_mulai,
        p.tanggal_selesai,
        p.status,
        s.nama_siswa,
        s.kelas,
        t.nama_tempat
    FROM pendaftaran AS p
    INNER JOIN siswa AS s ON p.siswa_id = s.id
    INNER JOIN tempat_pkl AS t ON p.tempat_pkl_id = t.id
    ORDER BY p.id DESC
";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Gagal mengambil data pendaftaran: ' . mysqli_error($koneksi));
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
    <title>Data Pendaftaran PKL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 md:p-8">
<div class="max-w-7xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Pendaftaran PKL</h1>
        <p class="text-gray-500 mt-1">Lihat dan verifikasi pendaftaran siswa.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="p-4">No.</th>
                    <th class="p-4">Nama Siswa</th>
                    <th class="p-4">Kelas</th>
                    <th class="p-4">Tempat PKL</th>
                    <th class="p-4">Tanggal Daftar</th>
                    <th class="p-4">Periode PKL</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                <?php
                $warna = [
                    'menunggu' => 'bg-amber-100 text-amber-700',
                    'diterima' => 'bg-green-100 text-green-700',
                    'ditolak' => 'bg-red-100 text-red-700',
                    'selesai' => 'bg-blue-100 text-blue-700'
                ];
                $status = strtolower($row['status'] ?? 'menunggu');
                ?>
                <tr class="hover:bg-blue-50">
                    <td class="p-4"><?= $no++ ?></td>
                    <td class="p-4 font-medium"><?= e($row['nama_siswa']) ?></td>
                    <td class="p-4"><?= e($row['kelas']) ?></td>
                    <td class="p-4"><?= e($row['nama_tempat']) ?></td>
                    <td class="p-4"><?= e($row['tanggal_daftar']) ?></td>
                    <td class="p-4 whitespace-nowrap">
                        <?= e($row['tanggal_mulai']) ?> s.d. <?= e($row['tanggal_selesai']) ?>
                    </td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-xs <?= $warna[$status] ?? 'bg-gray-100 text-gray-700' ?>">
                            <?= e(ucfirst($status)) ?>
                        </span>
                    </td>
                    <td class="p-4 whitespace-nowrap">
                        <a href="detail.php?id=<?= (int)$row['id'] ?>"
                           class="inline-block bg-blue-100 text-blue-700 px-3 py-2 rounded mb-1">
                            Detail
                        </a>
                        <a href="verifikasi.php?id=<?= (int)$row['id'] ?>"
                           class="inline-block bg-amber-100 text-amber-700 px-3 py-2 rounded mb-1">
                            Verifikasi
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
