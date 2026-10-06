 <?php
include_once("templates/header.php");
?>

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

                <p class="mt-1 text-sm text-gray-500">
                    Pilih tempat PKL yang sesuai dengan jurusan dan minat kamu.
                </p>
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
                                PT Maju Jaya
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
                                📍 Jl. Merdeka No. 10
                            </p>

                            <p>
                                💼 Teknologi Informasi
                            </p>

                            <p>
                                👥 Kuota: 5 siswa
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


                <!-- TEMPAT PKL 2 -->
                <div class="overflow-hidden rounded-xl bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <!-- GAMBAR -->
                    <div class="flex h-40 items-center justify-center bg-purple-50">

                        <div class="text-center">
                            <div class="text-5xl">
                                💻
                            </div>

                            <p class="mt-2 text-sm font-medium text-purple-600">
                                Teknologi
                            </p>
                        </div>

                    </div>

                    <!-- CONTENT -->
                    <div class="p-5">

                        <div class="mb-3 flex items-start justify-between gap-3">

                            <h3 class="text-lg font-bold text-gray-800">
                                CV Digital Kreatif
                            </h3>

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-600">
                                Tersedia
                            </span>

                        </div>

                        <p class="mb-3 text-sm text-gray-500">
                            Tempat PKL untuk siswa yang tertarik dengan desain,
                            website, dan teknologi digital.
                        </p>

                        <div class="space-y-2 text-sm text-gray-600">

                            <p>
                                📍 Jl. Sudirman No. 25
                            </p>

                            <p>
                                💼 Desain & Web
                            </p>

                            <p>
                                👥 Kuota: 3 siswa
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


                <!-- TEMPAT PKL 3 -->
                <div class="overflow-hidden rounded-xl bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <!-- GAMBAR -->
                    <div class="flex h-40 items-center justify-center bg-green-50">

                        <div class="text-center">
                            <div class="text-5xl">
                                🏪
                            </div>

                            <p class="mt-2 text-sm font-medium text-green-600">
                                Instansi
                            </p>
                        </div>

                    </div>

                    <!-- CONTENT -->
                    <div class="p-5">

                        <div class="mb-3 flex items-start justify-between gap-3">

                            <h3 class="text-lg font-bold text-gray-800">
                                Toko Komputer Sejahtera
                            </h3>

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-600">
                                Tersedia
                            </span>

                        </div>

                        <p class="mb-3 text-sm text-gray-500">
                            Tempat PKL untuk siswa yang ingin mempelajari
                            perakitan dan perbaikan komputer.
                        </p>

                        <div class="space-y-2 text-sm text-gray-600">

                            <p>
                                📍 Jl. Pendidikan No. 15
                            </p>

                            <p>
                                💼 Teknik Komputer
                            </p>

                            <p>
                                👥 Kuota: 4 siswa
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


                <!-- TEMPAT PKL 4 -->
                <div class="overflow-hidden rounded-xl bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <!-- GAMBAR -->
                    <div class="flex h-40 items-center justify-center bg-yellow-50">

                        <div class="text-center">
                            <div class="text-5xl">
                                🏦
                            </div>

                            <p class="mt-2 text-sm font-medium text-yellow-600">
                                Perkantoran
                            </p>

                        </div>

                    </div>

                    <!-- CONTENT -->
                    <div class="p-5">

                        <div class="mb-3 flex items-start justify-between gap-3">

                            <h3 class="text-lg font-bold text-gray-800">
                                Kantor Administrasi
                            </h3>

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-600">
                                Tersedia
                            </span>

                        </div>

                        <p class="mb-3 text-sm text-gray-500">
                            Tempat PKL untuk mempelajari administrasi,
                            pengolahan data, dan pelayanan.
                        </p>

                        <div class="space-y-2 text-sm text-gray-600">

                            <p>
                                📍 Jl. Ahmad Yani No. 8
                            </p>

                            <p>
                                💼 Administrasi
                            </p>

                            <p>
                                👥 Kuota: 2 siswa
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


                <!-- TEMPAT PKL 5 -->
                <div class="overflow-hidden rounded-xl bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex h-40 items-center justify-center bg-pink-50">

                        <div class="text-center">
                            <div class="text-5xl">
                                🎨
                            </div>

                            <p class="mt-2 text-sm font-medium text-pink-600">
                                Kreatif
                            </p>
                        </div>

                    </div>

                    <div class="p-5">

                        <div class="mb-3 flex items-start justify-between gap-3">

                            <h3 class="text-lg font-bold text-gray-800">
                                Studio Kreatif
                            </h3>

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-600">
                                Tersedia
                            </span>

                        </div>

                        <p class="mb-3 text-sm text-gray-500">
                            Studio yang bergerak dalam bidang desain grafis,
                            fotografi, dan media digital.
                        </p>

                        <div class="space-y-2 text-sm text-gray-600">

                            <p>
                                📍 Jl. Melati No. 20
                            </p>

                            <p>
                                💼 Desain Grafis
                            </p>

                            <p>
                                👥 Kuota: 3 siswa
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


                <!-- TEMPAT PKL 6 -->
                <div class="overflow-hidden rounded-xl bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex h-40 items-center justify-center bg-indigo-50">

                        <div class="text-center">
                            <div class="text-5xl">
                                🏫
                            </div>

                            <p class="mt-2 text-sm font-medium text-indigo-600">
                                Pendidikan
                            </p>
                        </div>

                    </div>

                    <div class="p-5">

                        <div class="mb-3 flex items-start justify-between gap-3">

                            <h3 class="text-lg font-bold text-gray-800">
                                Lembaga Pendidikan
                            </h3>

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-600">
                                Tersedia
                            </span>

                        </div>

                        <p class="mb-3 text-sm text-gray-500">
                            Tempat PKL yang menyediakan pengalaman dalam
                            bidang administrasi dan teknologi.
                        </p>

                        <div class="space-y-2 text-sm text-gray-600">

                            <p>
                                📍 Jl. Pendidikan No. 30
                            </p>

                            <p>
                                💼 Administrasi & IT
                            </p>

                            <p>
                                👥 Kuota: 5 siswa
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

            </div>

        </section>

    </main>

</div>

<?php include_once("templates/footer.php"); ?>