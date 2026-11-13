
<?php
require_once __DIR__ . '/config/koneksi.php';

$pesan = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama_tempat = trim($_POST['nama_tempat'] ?? '');
    $alamat      = trim($_POST['alamat'] ?? '');
    $bidang      = trim($_POST['bidang'] ?? '');
    $pembimbing  = trim($_POST['pembimbing'] ?? '');
    $no_telp     = trim($_POST['no_telp'] ?? '');
    $kuota       = filter_var($_POST['kuota'] ?? '', FILTER_VALIDATE_INT);

    if (
        $nama_tempat === '' ||
        $alamat === '' ||
        $bidang === '' ||
        $pembimbing === '' ||
        $no_telp === '' ||
        $kuota === false ||
        $kuota < 0
    ) {
        $error = 'Semua data wajib diisi dengan benar!';
    } else {

        $query = "INSERT INTO tempat_pkl
                  (nama_tempat, alamat, bidang, pembimbing, no_telp, kuota)
                  VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($host, $query);

        if ($stmt) {
            mysqli_stmt_bind_param(
                $stmt,
                "sssssi",
                $nama_tempat,
                $alamat,
                $bidang,
                $pembimbing,
                $no_telp,
                $kuota
            );

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);

                header("Location: index.php?status=berhasil");
                exit;
            } else {
                $error = 'Gagal menyimpan data: ' . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            $error = 'Query database gagal: ' . mysqli_error($koneksi);
        }
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

<body class="bg-gray-50 min-h-screen">

    <div class="max-w-5xl mx-auto px-6 py-8">

        <!-- JUDUL -->
        <div class="mb-7">
            <h1 class="text-2xl font-bold text-gray-800">
                Tambah Tempat PKL
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Tambahkan perusahaan atau instansi baru untuk tempat PKL siswa.
            </p>
        </div>

        <!-- TOMBOL KEMBALI -->
        <a href="index.php"
           class="inline-block mb-5 text-blue-600 hover:text-blue-800 font-medium">
            &larr; Kembali ke Daftar Tempat PKL
        </a>

        <!-- FORM -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-7">

            <div class="mb-6 border-b pb-4">
                <h2 class="text-lg font-semibold text-gray-800">
                    Formulir Tempat PKL
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Silakan lengkapi informasi tempat PKL berikut.
                </p>
            </div>

            <!-- PESAN ERROR -->
            <?php if ($error !== ''): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-5">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- NAMA TEMPAT -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Perusahaan / Instansi
                        </label>

                        <input type="text"
                               name="nama_tempat"
                               required
                               value="<?= htmlspecialchars($_POST['nama_tempat'] ?? '') ?>"
                               placeholder="Contoh: PT Maju Jaya"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- BIDANG -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Bidang Keahlian
                        </label>

                        <select name="bidang"
                                required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500">

                            <option value="">Pilih Bidang</option>

                            <?php
                            $daftar_bidang = [
                                'Teknologi Informasi',
                                'Desain & Web',
                                'Teknik Komputer',
                                'Administrasi',
                                'Akuntansi',
                                'Lainnya'
                            ];

                            foreach ($daftar_bidang as $item):
                            ?>
                                <option value="<?= htmlspecialchars($item) ?>"
                                    <?= (($_POST['bidang'] ?? '') === $item) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($item) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!-- ALAMAT -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Alamat Lengkap
                        </label>

                        <textarea name="alamat"
                                  rows="3"
                                  required
                                  placeholder="Masukkan alamat lengkap perusahaan..."
                                  class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($_POST['alamat'] ?? '') ?></textarea>
                    </div>

                    <!-- PEMBIMBING -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Pembimbing
                        </label>

                        <input type="text"
                               name="pembimbing"
                               required
                               value="<?= htmlspecialchars($_POST['pembimbing'] ?? '') ?>"
                               placeholder="Nama pembimbing lapangan"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- NO TELEPON -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nomor Telepon
                        </label>

                        <input type="tel"
                               name="no_telp"
                               required
                               value="<?= htmlspecialchars($_POST['no_telp'] ?? '') ?>"
                               placeholder="Contoh: 081234567890"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- KUOTA -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kuota Siswa
                        </label>

                        <input type="number"
                               name="kuota"
                               min="0"
                               required
                               value="<?= htmlspecialchars($_POST['kuota'] ?? '') ?>"
                               placeholder="Contoh: 5"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500">

                        <p class="text-xs text-gray-500 mt-2">
                            Masukkan jumlah siswa yang dapat diterima.
                        </p>
                    </div>

                </div>

                <!-- TOMBOL -->
                <div class="flex justify-end gap-3 mt-8 border-t pt-6">

                    <a href="index.php"
                       class="px-5 py-3 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                        Batal
                    </a>

                    <button type="submit"
                            class="px-6 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
                        Simpan Tempat PKL
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>
</html>
