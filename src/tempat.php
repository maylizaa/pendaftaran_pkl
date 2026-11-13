<?php
session_start();

require_once __DIR__ . '/config/koneksi.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    die();
}

function allDataTempat($conn) {
    $stmt = $conn->query("SELECT * FROM tempat_pkl");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$tempat = allDataTempat($conn);

?>


<?php
include_once("templates/header.php");?>

<div class="flex min-h-screen bg-gray-50">

    <!-- ================= SIDEBAR ================= -->
    <?php include_once("templates/sidebar.php"); ?>

    <!-- ================= KONTEN UTAMA ================= -->
    <main class="ml-64 flex-1">

        <!-- ================= TOPBAR ================= -->
        <?php include_once("templates/topbar.php"); ?>

        <!-- ================= ISI HALAMAN ================= -->
        <section class="p-6">

            <!-- HEADER HALAMAN -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Tempat PKL
                </h1>
                <div class="flex justify-between">
                    <p class="mt-1 text-sm text-gray-500">
                        Pilih tempat PKL yang sesuai dengan jurusan dan minat kamu.
                    </p>
                    <a href="tambahTempatPkl.php" class="bg-blue-700 block text-white p-2 rounded-md hover:bg-blue-900">Tambah Tempat PKL</a>
                </div>
                
            </div>


            <!-- ================= PENCARIAN ================= -->
            <div class="mb-6 rounded-xl bg-white p-5 shadow-sm">

                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            Daftar Tempat PKL
                        </h2>

                        <p class="text-sm text-gray-500">
                            Temukan perusahaan atau instansi untuk melaksanakan PKL.
                        </p>
                    </div>

                    <!-- SEARCH -->
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Cari tempat PKL..."
                            class="w-full rounded-lg border border-gray-200 px-4 py-2.5 pl-10 text-sm outline-none transition focus:border-blue-400 focus:ring-2 focus:ring-blue-100 md:w-72"
                        >

                        <span class="absolute left-3 top-2.5 text-gray-400">
                            🔍
                        </span>
                    </div>

                </div>

            </div>


            <!-- ================= DAFTAR TEMPAT PKL ================= -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

                <?php foreach($tempat as $pkl) : ?>
                <!-- TEMPAT PKL 1 -->
                <div class="overflow-hidden rounded-xl bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <!-- GAMBAR -->
                    <div class="flex h-40 items-center justify-center bg-blue-50">

                        <div class="text-center">
                            <div class="text-5xl">
                                🏢
                            </div>

                            <p class="mt-2 text-sm font-medium text-blue-600">
                                Perusahaan
                            </p>
                        </div>

                    </div>

                    <!-- CONTENT -->
                    <div class="p-5">

                        <div class="mb-3 flex items-start justify-between gap-3">

                            <h3 class="text-lg font-bold text-gray-800">
                                <?= $pkl['nama_tempat'] ?>
                            </h3>

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-600">
                                Tersedia
                            </span>

                        </div>

                        <p class="mb-3 text-sm text-gray-500">
                            Perusahaan yang bergerak di bidang teknologi informasi
                            dan pengembangan aplikasi.
                        </p>

                        <div class="space-y-2 text-sm text-gray-600">

                            <p>
                                📍 <?= $pkl['alamat']; ?>
                            </p>

                            <p>
                                💼 <?= $pkl['bidang_usaha']; ?>
                            </p>

                            <p>
                                👥 <?= $pkl['kuota']; ?> siswa
                            </p>

                        </div>

                        <div class="mt-5">

                            <a
                                href="pendaftaran.php"
                                class="block rounded-lg bg-blue-600 px-4 py-2.5 text-center text-sm font-medium text-white transition hover:bg-blue-700"
                            >
                                Pilih Tempat PKL
                            </a>

                        </div>

                    </div>

                </div>
                <?php endforeach; ?>

                

            </div>

        </section>

    </main>

</div>

<?php include_once("templates/footer.php"); ?>