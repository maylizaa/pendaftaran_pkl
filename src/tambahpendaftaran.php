
<?php
require_once __DIR__ . src/config/koneksi.php';

$error = '';
$sukses = '';

$siswa = mysqli_query($koneksi, "
    SELECT id, nis, nama, kelas, jurusan
    FROM siswa
    ORDER BY nama ASC
");

$tempat = mysqli_query($koneksi, "
    SELECT id, nama_perusahaan, bidang, kuota
    FROM tempat_pkl
    ORDER BY nama_perusahaan ASC
");

// Proses penyimpanan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $siswa_id      = (int) ($_POST['siswa_id'] ?? 0);
    $tempat_pkl_id = (int) ($_POST['tempat_pkl_id'] ?? 0);
    $tanggal_mulai = $_POST['tanggal_mulai'] ?? '';
    $tanggal_selesai = $_POST['tanggal_selesai'] ?? '';
    $keterangan    = trim($_POST['keterangan'] ?? '');

    if (
        $siswa_id <= 0 ||
        $tempat_pkl_id <= 0 ||
        $tanggal_mulai === '' ||
        $tanggal_selesai === ''
    ) {
        $error = 'Semua data wajib diisi!';
    } elseif ($tanggal_selesai < $tanggal_mulai) {
        $error = 'Tanggal selesai tidak boleh sebelum tanggal mulai!';
    } else {

        // Memastikan siswa tersedia
        $cekSiswa = mysqli_prepare(
            $koneksi,
            "SELECT id FROM siswa WHERE id = ?"
        );

        mysqli_stmt_bind_param($cekSiswa, "i", $siswa_id);
        mysqli_stmt_execute($cekSiswa);
        mysqli_stmt_store_result($cekSiswa);

        $siswaAda = mysqli_stmt_num_rows($cekSiswa) > 0;
        mysqli_stmt_close($cekSiswa);

        // Memastikan tempat PKL tersedia
        $cekTempat = mysqli_prepare(
            $koneksi,
            "SELECT id FROM tempat_pkl WHERE id = ?"
        );

        mysqli_stmt_bind_param($cekTempat, "i", $tempat_pkl_id);
        mysqli_stmt_execute($cekTempat);
        mysqli_stmt_store_result($cekTempat);

        $tempatAda = mysqli_stmt_num_rows($cekTempat) > 0;
        mysqli_stmt_close($cekTempat);

        if (!$siswaAda) {
            $error = 'Data siswa tidak ditemukan!';
        } elseif (!$tempatAda) {
            $error = 'Tempat PKL tidak ditemukan!';
        } else {

            $query = "INSERT INTO pendaftaran
                (
                    siswa_id,
                    tempat_pkl_id,
                    tanggal_daftar,
                    tanggal_mulai,
                    tanggal_selesai,
                    status,
                    keterangan
                )
                VALUES (?, ?, CURDATE(), ?, ?, 'Menunggu', ?)";

            $stmt = mysqli_prepare($koneksi, $query);

            if ($stmt) {

                mysqli_stmt_bind_param(
                    $stmt,
                    "iisss",
                    $siswa_id,
                    $tempat_pkl_id,
                    $tanggal_mulai,
                    $tanggal_selesai,
                    $keterangan
                );

                if (mysqli_stmt_execute($stmt)) {
                    $sukses = 'Pendaftaran PKL berhasil disimpan!';
                    $_POST = [];
                } else {
                    $error = 'Gagal menyimpan pendaftaran: ' .
                        mysqli_stmt_error($stmt);
                }

                mysqli_stmt_close($stmt);

            } else {
                $error = 'Query gagal: ' . mysqli_error($koneksi);
            }
        }
    }
}

// Mengambil kembali data untuk pilihan form
if (!$siswa || !$tempat) {
    $error = 'Gagal mengambil data siswa atau tempat PKL: ' .
        mysqli_error($koneksi);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pendaftaran PKL</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen">

<div class="max-w-5xl mx-auto px-6 py-8">

    <!-- JUDUL -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Tambah Pendaftaran PKL
        </h1>

        <p class="text-gray-500 text-sm mt-2">
            Silakan lengkapi formulir pendaftaran Praktik Kerja Lapangan.
        </p>
    </div>

    <!-- KEMBALI -->
    <a href="pendaftaran.php"
       class="inline-block mb-5 text-blue-600 hover:text-blue-800">
        &larr; Kembali ke Pendaftaran
    </a>

    <!-- FORM CARD -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-7">

        <div class="border-b pb-4 mb-6">
            <h2 class="text-lg font-semibold text-gray-800">
                Formulir Pendaftaran Siswa
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Isi informasi pendaftaran dengan lengkap dan benar.
            </p>
        </div>

        <!-- PESAN BERHASIL -->
        <?php if ($sukses): ?>
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">
                <?= htmlspecialchars($sukses) ?>
            </div>
        <?php endif; ?>

        <!-- PESAN ERROR -->
        <?php if ($error): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- NAMA SISWA -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Siswa
                    </label>

                    <select name="siswa_id"
                            required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">

                        <option value="">-- Pilih Siswa --</option>

                        <?php if ($siswa): ?>
                            <?php while ($row = mysqli_fetch_assoc($siswa)): ?>

                                <option value="<?= $row['id'] ?>"
                                    <?= (($_POST['siswa_id'] ?? '') == $row['id']) ? 'selected' : '' ?>>

                                    <?= htmlspecialchars($row['nama']) ?>
                                    - <?= htmlspecialchars($row['kelas']) ?>

                                </option>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </select>
                </div>

                <!-- TEMPAT PKL -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Pilih Tempat PKL
                    </label>

                    <select name="tempat_pkl_id"
                            required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">

                        <option value="">-- Pilih Tempat PKL --</option>

                        <?php if ($tempat): ?>
                            <?php while ($row = mysqli_fetch_assoc($tempat)): ?>

                                <option value="<?= $row['id'] ?>"
                                    <?= (($_POST['tempat_pkl_id'] ?? '') == $row['id']) ? 'selected' : '' ?>>

                                    <?= htmlspecialchars($row['nama_perusahaan']) ?>
                                    (Kuota: <?= (int)$row['kuota'] ?>)

                                </option>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </select>
                </div>

                <!-- TANGGAL MULAI -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tanggal Mulai PKL
                    </label>

                    <input type="date"
                           name="tanggal_mulai"
                           required
                           value="<?= htmlspecialchars($_POST['tanggal_mulai'] ?? '') ?>"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <!-- TANGGAL SELESAI -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tanggal Selesai PKL
                    </label>

                    <input type="date"
                           name="tanggal_selesai"
                           required
                           value="<?= htmlspecialchars($_POST['tanggal_selesai'] ?? '') ?>"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <!-- KETERANGAN -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              rows="4"
                              placeholder="Masukkan keterangan tambahan..."
                              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"><?= htmlspecialchars($_POST['keterangan'] ?? '') ?></textarea>

                </div>

            </div>

            <!-- TOMBOL -->
            <div class="flex justify-end gap-3 mt-8 border-t pt-6">

                <a href="pendaftaran.php"
                   class="px-5 py-3 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700">
                    Simpan Pendaftaran
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
