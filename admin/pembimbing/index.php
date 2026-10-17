
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

$query = "SELECT * FROM pembimbing ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Gagal mengambil data pembimbing: " . mysqli_error($koneksi));
}

function e($nilai) {
    return htmlspecialchars((string) $nilai, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pembimbing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 md:p-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Data Pembimbing</h1>
                <p class="text-gray-500 mt-1">Kelola data pembimbing PKL.</p>
            </div>
            <a href="tambah.php" class="bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700">
                + Tambah Pembimbing
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-600">
                    <tr>
                        <th class="p-4">No.</th>
                        <th class="p-4">NIP</th>
                        <th class="p-4">Nama</th>
                        <th class="p-4">No. HP</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr class="hover:bg-blue-50">
                        <td class="p-4"><?= $no++ ?></td>
                        <td class="p-4"><?= e($row['nip']) ?></td>
                        <td class="p-4"><?= e($row['nama_pembimbing']) ?></td>
                        <td class="p-4"><?= e($row['no_hp']) ?></td>
                        <td class="p-4"><?= e($row['email']) ?></td>
                        <td class="p-4 whitespace-nowrap">
                            <a href="edit.php?id=<?= (int)$row['id'] ?>"
                               class="bg-amber-100 text-amber-700 px-3 py-2 rounded">Edit</a>
                            <form action="hapus.php" method="post" class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus pembimbing ini?')">
                                <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                                <button class="bg-red-100 text-red-700 px-3 py-2 rounded" type="submit">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
