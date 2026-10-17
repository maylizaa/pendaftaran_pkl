
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM tempat_pkl ORDER BY id DESC"
);

if (!$query) {
    die("Gagal mengambil data tempat PKL: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tempat PKL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-7xl mx-auto">
    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Tempat PKL</h1>
            <p class="text-gray-500 mt-1">
                Kelola data perusahaan atau instansi tempat PKL.
            </p>
        </div>

        <a href="tambah.php"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
            + Tambah Tempat PKL
        </a>
    </div>

    <?php if (isset($_GET['pesan'])): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
            <?php
            $pesan = [
                'tambah' => 'Tempat PKL berhasil ditambahkan.',
                'edit' => 'Tempat PKL berhasil diperbarui.',
                'hapus' => 'Tempat PKL berhasil dihapus.'
            ];
            echo htmlspecialchars(
                $pesan[$_GET['pesan']] ?? 'Operasi berhasil.',
                ENT_QUOTES,
                'UTF-8'
            );
            ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-sm overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-blue-50 text-gray-700">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Nama Perusahaan</th>
                    <th class="p-4">Alamat</th>
                    <th class="p-4">No. Telepon</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Kuota</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($query) > 0): ?>
                    <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-4"><?= $no++ ?></td>
                            <td class="p-4 font-medium">
                                <?= htmlspecialchars($row['nama_perusahaan'] ?? '') ?>
                            </td>
                            <td class="p-4">
                                <?= htmlspecialchars($row['alamat'] ?? '') ?>
                            </td>
                            <td class="p-4">
                                <?= htmlspecialchars($row['no_telp'] ?? '') ?>
                            </td>
                            <td class="p-4">
                                <?= htmlspecialchars($row['email'] ?? '') ?>
                            </td>
                            <td class="p-4">
                                <?= (int)($row['kuota'] ?? 0) ?> siswa
                            </td>
                            <td class="p-4">
                                <div class="flex gap-2">
                                    <a href="edit.php?id=<?= (int)$row['id'] ?>"
                                       class="bg-yellow-400 hover:bg-yellow-500 px-3 py-2 rounded">
                                        Edit
                                    </a>

                                    <form action="hapus.php" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus tempat PKL ini?')">
                                        <input type="hidden" name="id"
                                               value="<?= (int)$row['id'] ?>">
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="p-6 text-center text-gray-500">
                            Belum ada data tempat PKL.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
