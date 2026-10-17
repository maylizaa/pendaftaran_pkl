```php
<?php

// =====================================
// MENGHUBUNGKAN DATABASE
// =====================================
require_once __DIR__ . '/../../src/config/koneksi.php';

// =====================================
// MENGAMBIL DATA JADWAL
// =====================================
$query = "
    SELECT
        j.id,
        j.tanggal,
        j.jam_mulai AS waktu_mulai,
        j.jam_selesai AS waktu_selesai,
        j.judul_kegiatan AS kegiatan,
        j.keterangan,
        s.nama_siswa AS nama_siswa,
        s.kelas,
        t.nama_tempat AS nama_perusahaan
    FROM jadwal AS j
    INNER JOIN pendaftaran AS p
        ON j.pendaftaran_id = p.id
    INNER JOIN siswa AS s
        ON p.siswa_id = s.id
    INNER JOIN tempat_pkl AS t
        ON p.tempat_pkl_id = t.id
    ORDER BY j.tanggal DESC, j.jam_mulai ASC
";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Gagal mengambil data jadwal: " . mysqli_error($koneksi));
}

// Menghitung jumlah data jadwal
$totalJadwal = mysqli_num_rows($result);

// =====================================
// MENGHITUNG JADWAL HARI INI
// =====================================
$hariIni = date('Y-m-d');

$stmtHariIni = mysqli_prepare(
    $koneksi,
    "SELECT COUNT(*) AS total FROM jadwal WHERE tanggal = ?"
);

mysqli_stmt_bind_param($stmtHariIni, "s", $hariIni);
mysqli_stmt_execute($stmtHariIni);

$dataHariIni = mysqli_fetch_assoc(
    mysqli_stmt_get_result($stmtHariIni)
);

$totalHariIni = (int) ($dataHariIni['total'] ?? 0);

mysqli_stmt_close($stmtHariIni);

// =====================================
// MENGHITUNG JADWAL MENDATANG
// =====================================
$stmtMendatang = mysqli_prepare(
    $koneksi,
    "SELECT COUNT(*) AS total FROM jadwal WHERE tanggal > ?"
);

mysqli_stmt_bind_param($stmtMendatang, "s", $hariIni);
mysqli_stmt_execute($stmtMendatang);

$dataMendatang = mysqli_fetch_assoc(
    mysqli_stmt_get_result($stmtMendatang)
);

$totalMendatang = (int) ($dataMendatang['total'] ?? 0);

mysqli_stmt_close($stmtMendatang);

// =====================================
// FUNGSI MENGAMANKAN OUTPUT
// =====================================
function e($nilai) {
    return htmlspecialchars(
        (string) $nilai,
        ENT_QUOTES,
        'UTF-8'
    );
}

// =====================================
// FUNGSI FORMAT TANGGAL INDONESIA
// =====================================
function tanggalIndonesia($tanggal) {
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    $bagian = explode('-', (string) $tanggal);

    if (count($bagian) !== 3) {
        return $tanggal;
    }

    $nomorBulan = (int) $bagian[1];

    if ($nomorBulan < 1 || $nomorBulan > 12) {
        return $tanggal;
    }

    return (int) $bagian[2] . ' ' .
        $bulan[$nomorBulan] . ' ' .
        $bagian[0];
}

?>
```