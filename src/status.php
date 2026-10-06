<?php
include_once("templates/header.php");
?>

<div class="flex min-h-screen bg-gray-50">

    <!-- SIDEBAR -->
    <?php include_once("templates/sidebar.php"); ?>

    <!-- KONTEN -->
    <main class="ml-64 flex-1">

        <!-- TOPBAR -->
        <?php include_once("templates/topbar.php"); ?>

        <section class="p-6">

            <!-- JUDUL -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Status Pendaftaran
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Lihat status pendaftaran PKL kamu.
                </p>
            </div>


            <!-- STATUS UTAMA -->
            <div class="mb-6 rounded-xl bg-white p-6 shadow-sm">

                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                    <div>
                        <p class="text-sm text-gray-500">
                            Status Pendaftaran
                        </p>

                        <h2 class="mt-1 text-xl font-bold text-gray-800">
                            Pendaftaran PKL
                        </h2>
                    </div>

                    <span class="w-fit rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-700">
                        Menunggu Verifikasi
                    </span>

                </div>

            </div>


            <!-- INFORMASI PENDAFTARAN -->
            <div class="rounded-xl bg-white p-6 shadow-sm">

                <h2 class="mb-5 text-lg font-semibold text-gray-800">
                    Detail Pendaftaran
                </h2>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <div>
                        <p class="text-sm text-gray-500">
                            Nama Siswa
                        </p>

                        <p class="mt-1 font-medium text-gray-800">
                            Mayliza
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            NIS
                        </p>

                        <p class="mt-1 font-medium text-gray-800">
                            12345678
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Kelas
                        </p>

                        <p class="mt-1 font-medium text-gray-800">
                            XII RPL 1
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Jurusan
                        </p>

                        <p class="mt-1 font-medium text-gray-800">
                            Rekayasa Perangkat Lunak
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Tempat PKL
                        </p>

                        <p class="mt-1 font-medium text-gray-800">
                            PT Maju Jaya
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Tanggal Pendaftaran
                        </p>

                        <p class="mt-1 font-medium text-gray-800">
                            06 Oktober 2026
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Tanggal Mulai
                        </p>

                        <p class="mt-1 font-medium text-gray-800">
                            01 Januari 2027
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Tanggal Selesai
                        </p>

                        <p class="mt-1 font-medium text-gray-800">
                            31 Maret 2027
                        </p>
                    </div>

                </div>

            </div>


            <!-- INFORMASI STATUS -->
            <div class="mt-6 rounded-xl border border-yellow-200 bg-yellow-50 p-5">

                <h3 class="font-semibold text-yellow-800">
                    Informasi
                </h3>

                <p class="mt-1 text-sm text-yellow-700">
                    Pendaftaran kamu sedang menunggu verifikasi dari admin.
                    Silakan tunggu sampai proses verifikasi selesai.
                </p>

            </div>

        </section>

    </main>

</div>

<?php include_once("templates/footer.php"); ?>