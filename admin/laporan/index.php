
<?php
require_once __DIR__ . '/../../src/config/koneksi.php';

// Fungsi untuk mengamankan teks yang ditampilkan di HTML
function e($nilai) {
    return htmlspecialchars((string) $nilai, ENT_QUOTES, 'UTF-8');
}

// Mengambil data laporan beserta data siswa dan tempat PKL
$query = "
    SELECT
        laporan.id,
        laporan.judul,
        laporan.deskripsi,
        laporan.nama_file,
        laporan.tanggal_upload,
        laporan.status,
        laporan.catatan_pembimbing,
        siswa.nama AS nama_siswa,
        siswa.kelas,
        tempat_pkl.nama_perusahaan
    FROM laporan
    INNER JOIN pendaftaran
        ON laporan.pendaftaran_id = pendaftaran.id
    INNER JOIN siswa
        ON pendaftaran.siswa_id = siswa.id
    INNER JOIN tempat_pkl
        ON pendaftaran.tempat_id = tempat_pkl.id
    ORDER BY laporan.tanggal_upload DESC
";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Gagal mengambil data laporan: " . mysqli_error($koneksi));
}

$totalLaporan = mysqli_num_rows($result);

// Menghitung jumlah laporan berdasarkan status
$queryStatistik = "
    SELECT
        COUNT(*) AS total,
        SUM(status = 'Menunggu') AS menunggu,
        SUM(status = 'Diperiksa') AS diperiksa,
        SUM(status = 'Disetujui') AS disetujui,
        SUM(status = 'Perlu Revisi') AS revisi
    FROM laporan
";

$resultStatistik = mysqli_query($koneksi, $queryStatistik);
$statistik = mysqli_fetch_assoc($resultStatistik);

$totalMenunggu = (int) ($statistik['menunggu'] ?? 0);
$totalDiperiksa = (int) ($statistik['diperiksa'] ?? 0);
$totalDisetujui = (int) ($statistik['disetujui'] ?? 0);
$totalRevisi = (int) ($statistik['revisi'] ?? 0);

// Menampilkan label status dengan warna berbeda
function badgeStatus($status) {
    $warna = [
        'Menunggu' => 'bg-yellow-100 text-yellow-700',
        'Diperiksa' => 'bg-blue-100 text-blue-700',
        'Disetujui' => 'bg-green-100 text-green-700',
        'Perlu Revisi' => 'bg-red-100 text-red-700',
    ];

    $kelas = $warna[$status] ?? 'bg-gray-100 text-gray-700';

    return '<span class="' . $kelas .
        ' px-3 py-1 rounded-full text-xs font-semibold">' .
        e($status) . '</span>';
}

// Pesan setelah proses aksi, jika ada
$pesan = $_GET['pesan'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Laporan PKL</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
        }

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, 0.05);
        }
    </style>
</head>

<body class="min-h-screen">

<div class="p-4 md:p-8">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center
                md:justify-between gap-4 mb-7">

        <div>
            <p class="text-sm text-gray-500 mb-2">
                Admin / Laporan
            </p>

            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                Data Laporan PKL
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola dan pantau laporan PKL yang dikumpulkan siswa.
            </p>
        </div>
    </div>

    <!-- PESAN -->
    <?php if ($pesan === 'berhasil'): ?>
        <div class="mb-5 rounded-lg bg-green-100 text-green-700 p-4">
            Proses laporan berhasil dilakukan.
        </div>
    <?php elseif ($pesan === 'gagal'): ?>
        <div class="mb-5 rounded-lg bg-red-100 text-red-700 p-4">
            Proses laporan gagal. Silakan periksa kembali.
        </div>
    <?php endif; ?>

    <!-- STATISTIK -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4
                gap-5 mb-7">

        <div class="card p-5 border-l-4 border-blue-500">
            <p class="text-sm text-gray-500">Total Laporan</p>

            <div class="flex items-center justify-between mt-3">
                <h2 class="text-3xl font-bold text-gray-800">
                    <?= (int) $totalLaporan ?>
                </h2>
                <span class="text-3xl">📄</span>
            </div>
        </div>

        <div class="card p-5 border-l-4 border-yellow-400">
            <p class="text-sm text-gray-500">Menunggu</p>

            <div class="flex items-center justify-between mt-3">
                <h2 class="text-3xl font-bold text-gray-800">
                    <?= $totalMenunggu ?>
                </h2>
                <span class="text-3xl">⏳</span>
            </div>
        </div>

        <div class="card p-5 border-l-4 border-green-500">
            <p class="text-sm text-gray-500">Disetujui</p>

            <div class="flex items-center justify-between mt-3">
                <h2 class="text-3xl font-bold text-gray-800">
                    <?= $totalDisetujui ?>
                </h2>
                <span class="text-3xl">✓</span>
            </div>
        </div>

        <div class="card p-5 border-l-4 border-red-500">
            <p class="text-sm text-gray-500">Perlu Revisi</p>

            <div class="flex items-center justify-between mt-3">
                <h2 class="text-3xl font-bold text-gray-800">
                    <?= $totalRevisi ?>
                </h2>
                <span class="text-3xl">↻</span>
            </div>
        </div>

    </div>

    <!-- TABEL LAPORAN -->
    <div class="card overflow-hidden">

        <div class="p-5 md:p-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-800">
                Daftar Laporan Siswa
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Periksa status dan berkas laporan PKL.
            </p>

            <div class="flex flex-col md:flex-row gap-3 mt-4">

                <input
                    type="text"
                    id="cariLaporan"
                    placeholder="Cari nama siswa, judul, atau tempat PKL..."
                    class="w-full md:flex-1 border border-gray-200
                           rounded-lg px-4 py-3 outline-none
                           focus:ring-2 focus:ring-blue-200
                           focus:border-blue-500"
                >

                <select
                    id="filterStatus"
                    class="border border-gray-200 rounded-lg px-4 py-3
                           outline-none focus:ring-2 focus:ring-blue-200"
                >
                    <option value="">Semua Status</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Diperiksa">Diperiksa</option>
                    <option value="Disetujui">Disetujui</option>
                    <option value="Perlu Revisi">Perlu Revisi</option>
                </select>

            </div>
        </div>

        <div class="overflow-x-auto">

            <table id="tabelLaporan" class="w-full text-sm text-left">

                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-5 py-4">No.</th>
                        <th class="px-5 py-4">Siswa</th>
                        <th class="px-5 py-4">Judul Laporan</th>
                        <th class="px-5 py-4">Tempat PKL</th>
                        <th class="px-5 py-4">Tanggal Upload</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4">Berkas</th>
                        <th class="px-5 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                <?php if ($totalLaporan > 0): ?>
                    <?php $no = 1; ?>

                    <?php while ($laporan = mysqli_fetch_assoc($result)): ?>
                        <tr class="barisLaporan hover:bg-blue-50/50 transition">

                            <td class="px-5 py-4 text-gray-600">
                                <?= $no++ ?>
                            </td>

                            <td class="px-5 py-4">
                                <p class="font-semibold text-gray-800">
                                    <?= e($laporan['nama_siswa']) ?>
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    <?= e($laporan['kelas']) ?>
                                </p>
                            </td>

                            <td class="px-5 py-4">
                                <p class="font-semibold text-gray-800">
                                    <?= e($laporan['judul']) ?>
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    <?= e($laporan['deskripsi'] ?: '-') ?>
                                </p>
                            </td>

                            <td class="px-5 py-4 text-gray-700">
                                <?= e($laporan['nama_perusahaan']) ?>
                            </td>

                            <td class="px-5 py-4 whitespace-nowrap text-gray-600">
                                <?= e(date(
                                    'd-m-Y H:i',
                                    strtotime($laporan['tanggal_upload'])
                                )) ?>
                            </td>

                            <td class="px-5 py-4 whitespace-nowrap">
                                <?= badgeStatus($laporan['status']) ?>
                            </td>

                            <td class="px-5 py-4">
                                <?php
                                // Hanya mengizinkan nama file sederhana.
                                // File harus berada di folder uploads/laporan/.
                                $namaFile = basename($laporan['nama_file']);
                                $ekstensi = strtolower(
                                    pathinfo($namaFile, PATHINFO_EXTENSION)
                                );

                                $fileValid = in_array(
                                    $ekstensi,
                                    ['pdf'],
                                    true
                                );
                                ?>

                                <?php if ($fileValid && $namaFile !== ''): ?>
                                    <a
                                        href="../../uploads/laporan/<?= rawurlencode($namaFile) ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-block bg-blue-100 hover:bg-blue-200
                                               text-blue-700 px-3 py-2 rounded-md
                                               text-xs font-semibold"
                                    >
                                        Lihat PDF
                                    </a>
                                <?php else: ?>
                                    <span class="text-gray-400 text-xs">
                                        PDF tidak tersedia
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">

                                    <a
                                        href="edit.php?id=<?= (int) $laporan['id'] ?>"
                                        class="bg-amber-100 hover:bg-amber-200
                                               text-amber-700 px-3 py-2
                                               rounded-md text-xs font-semibold"
                                    >
                                        Periksa
                                    </a>

                                    <form
                                        action="hapus.php"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus laporan ini?');"
                                    >
                                        <input
                                            type="hidden"
                                            name="id"
                                            value="<?= (int) $laporan['id'] ?>"
                                        >

                                        <button
                                            type="submit"
                                            class="bg-red-100 hover:bg-red-200
                                                   text-red-700 px-3 py-2
                                                   rounded-md text-xs font-semibold"
                                        >
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    <?php endwhile; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="8" class="px-5 py-12 text-center">
                            <div class="text-4xl mb-3">📄</div>

                            <p class="font-semibold text-gray-700">
                                Belum ada laporan PKL
                            </p>

                            <p class="text-gray-500 mt-2">
                                Laporan yang dikirim siswa akan muncul di sini.
                            </p>
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>

            <p id="hasilKosong"
               class="hidden text-center text-gray-500 py-8">
                Tidak ada laporan yang sesuai dengan pencarian.
            </p>

        </div>

        <div class="px-5 py-4 border-t border-gray-100
                    text-sm text-gray-500">
            Total data: <?= (int) $totalLaporan ?> laporan
        </div>

    </div>

</div>

<!-- PENCARIAN DAN FILTER STATUS -->
<script>
    const inputCari = document.getElementById('cariLaporan');
    const filterStatus = document.getElementById('filterStatus');
    const baris = document.querySelectorAll('.barisLaporan');
    const hasilKosong = document.getElementById('hasilKosong');

    function filterLaporan() {
        const kataKunci = inputCari.value.toLowerCase().trim();
        const statusPilihan = filterStatus.value.toLowerCase();

        let jumlahTampil = 0;

        baris.forEach(function (tr) {
            const teks = tr.textContent.toLowerCase();
            const cocokCari = teks.includes(kataKunci);
            const cocokStatus = statusPilihan === '' ||
                tr.cells[5].textContent.toLowerCase().trim()
                    .includes(statusPilihan);

            const tampil = cocokCari && cocokStatus;

            tr.style.display = tampil ? '' : 'none';

            if (tampil) {
                jumlahTampil++;
            }
        });

        hasilKosong.classList.toggle(
            'hidden',
            jumlahTampil !== 0 || baris.length === 0
        );
    }

    inputCari.addEventListener('input', filterLaporan);
    filterStatus.addEventListener('change', filterLaporan);
</script>

</body>
</html>
