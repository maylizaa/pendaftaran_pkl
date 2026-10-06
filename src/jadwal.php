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
                    Jadwal PKL
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Informasi jadwal dan pelaksanaan PKL kamu.
                </p>
            </div>


            <!-- INFORMASI TEMPAT -->
            <div class="mb-6 rounded-xl bg-white p-6 shadow-sm">

                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                    <div>

                        <p class="text-sm text-gray-500">
                            Tempat PKL
                        </p>

                        <h2 class="text-xl font-bold text-gray-800">
                            PT Maju Jaya
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Teknologi Informasi
                        </p>

                    </div>

                    <span class="w-fit rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-600">
                        PKL Aktif
                    </span>

                </div>

            </div>


            <!-- JADWAL -->
            <div class="rounded-xl bg-white p-6 shadow-sm">

                <h2 class="mb-5 text-lg font-semibold text-gray-800">
                    Detail Jadwal
                </h2>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <!-- TANGGAL MULAI -->
                    <div class="rounded-lg bg-blue-50 p-5">

                        <p class="text-sm text-blue-500">
                            Tanggal Mulai
                        </p>

                        <p class="mt-2 text-xl font-bold text-blue-700">
                            01 Januari 2027
                        </p>

                    </div>


                    <!-- TANGGAL SELESAI -->
                    <div class="rounded-lg bg-purple-50 p-5">

                        <p class="text-sm text-purple-500">
                            Tanggal Selesai
                        </p>

                        <p class="mt-2 text-xl font-bold text-purple-700">
                            31 Maret 2027
                        </p>

                    </div>


                    <!-- JAM -->
                    <div class="rounded-lg bg-green-50 p-5">

                        <p class="text-sm text-green-500">
                            Jam PKL
                        </p>

                        <p class="mt-2 text-xl font-bold text-green-700">
                            08.00 - 16.00
                        </p>

                    </div>


                    <!-- PEMBIMBING -->
                    <div class="rounded-lg bg-yellow-50 p-5">

                        <p class="text-sm text-yellow-600">
                            Pembimbing
                        </p>

                        <p class="mt-2 text-xl font-bold text-yellow-700">
                            Bapak Ahmad
                        </p>

                    </div>

                </div>

            </div>


            <!-- CATATAN -->
            <div class="mt-6 rounded-xl border border-blue-200 bg-blue-50 p-5">

                <h3 class="font-semibold text-blue-800">
                    Catatan
                </h3>

                <p class="mt-1 text-sm text-blue-700">
                    Siswa diwajibkan hadir tepat waktu dan mengikuti
                    peraturan yang berlaku di tempat PKL.
                </p>

            </div>

        </section>

    </main>

</div>

<?php include_once("templates/footer.php"); ?>