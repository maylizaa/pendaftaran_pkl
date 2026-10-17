
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id DESC");

if (!$result) {
    die("Gagal mengambil data siswa: " . mysqli_error($koneksi));
}

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6 md:p-8">
<div class="max-w-7xl mx-auto">
    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Data Siswa</h1>
            <p class="text-gray-500 mt-2">Kelola data siswa peserta PKL.</p>
        </div>
        <a href="tambah.php" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
            + Tambah Siswa
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="p-4">No.</th>
                    <th class="p-4">NIS</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Kelas</th>
                    <th class="p-4">Jurusan</th>
                    <th class="p-4">No. HP</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                <tr class="hover:bg-blue-50">
                    <td class="p-4"><?= $no++ ?></td>
                    <td class="p-4"><?= e($row['nis']) ?></td>
                    <td class="p-4 font-medium"><?= e($row['nama_siswa']) ?></td>
                    <td class="p-4"><?= e($row['kelas']) ?></td>
                    <td class="p-4"><?= e($row['jurusan']) ?></td>
                    <td class="p-4"><?= e($row['no_hp']) ?></td>
                    <td class="p-4 whitespace-nowrap">
                        <a href="edit.php?id=<?= (int)$row['id'] ?>"
                           class="inline-block bg-amber-100 text-amber-700 px-3 py-2 rounded">Edit</a>

                        <form action="hapus.php" method="post" class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">
                            <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                            <button type="submit"
                                    class="bg-red-100 text-red-700 px-3 py-2 rounded">
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
 