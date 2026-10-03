<?php include_once("templates/header.php"); ?>

    <div class="flex min-h-screen">

        <!-- ================= SIDEBAR ================= -->
        <?php include_once("templates/sidebar.php"); ?>
        <!-- ================= KONTEN ================= -->
        <main class="ml-64 flex-1">

            <!-- TOPBAR -->
            <?php include_once("templates/topbar.php"); ?>

            <!-- ISI -->
            <section class="p-8">


                <!-- WELCOME -->
                <div
                    class="bg-blue-600 rounded-2xl p-7 text-white mb-7">

                    <p class="text-blue-100 text-sm">
                        Selamat datang 👋
                    </p>

                    <h1 class="text-2xl font-bold mt-2">
                        Halo, Mayliza!
                    </h1>

                    <p class="text-blue-100 text-sm mt-2">
                        Kelola proses pendaftaran PKL kamu dengan mudah.
                    </p>

                    <button
                        class="mt-5 bg-white text-blue-600 px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-50">

                        Lihat Pendaftaran

                    </button>

                </div>



                <!-- STATISTIK -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">


                    <!-- STATUS PENDAFTARAN -->
                    <div
                        class="bg-white rounded-xl border border-slate-200 p-5">

                        <p class="text-sm text-slate-400">
                            Status Pendaftaran
                        </p>

                        <div class="flex items-center justify-between mt-3">

                            <h2 class="text-xl font-semibold text-emerald-600">
                                Terdaftar
                            </h2>

                            <div
                                class="w-11 h-11 bg-emerald-50 rounded-lg flex items-center justify-center">

                                ✓

                            </div>

                        </div>

                    </div>


                    <!-- TEMPAT PKL -->
                    <div
                        class="bg-white rounded-xl border border-slate-200 p-5">

                        <p class="text-sm text-slate-400">
                            Tempat PKL
                        </p>

                        <div class="flex items-center justify-between mt-3">

                            <h2 class="text-lg font-semibold text-slate-800">
                                Belum ditentukan
                            </h2>

                            <div
                                class="w-11 h-11 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">

                                🏢

                            </div>

                        </div>

                    </div>


                    <!-- LAPORAN -->
                    <div
                        class="bg-white rounded-xl border border-slate-200 p-5">

                        <p class="text-sm text-slate-400">
                            Laporan PKL
                        </p>

                        <div class="flex items-center justify-between mt-3">

                            <h2 class="text-xl font-semibold text-slate-800">
                                0
                            </h2>

                            <div
                                class="w-11 h-11 bg-violet-50 rounded-lg flex items-center justify-center">

                                📄

                            </div>

                        </div>

                    </div>

                </div>



                <!-- BAGIAN BAWAH -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mt-5">


                    <!-- INFORMASI -->
                    <div
                        class="bg-white border border-slate-200 rounded-xl">

                        <div class="px-6 py-5 border-b border-slate-100">

                            <h2 class="font-semibold text-slate-800">
                                Informasi Pendaftaran
                            </h2>

                            <p class="text-xs text-slate-400 mt-1">
                                Informasi terbaru mengenai PKL
                            </p>

                        </div>


                        <div class="p-6 space-y-5">

                            <div class="flex gap-4">

                                <div
                                    class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">

                                    📋

                                </div>

                                <div>

                                    <p class="text-sm font-semibold">
                                        Pendaftaran PKL
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Silakan lengkapi data untuk melakukan pendaftaran.
                                    </p>

                                </div>

                            </div>


                            <div class="flex gap-4">

                                <div
                                    class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center text-emerald-600">

                                    ✓

                                </div>

                                <div>

                                    <p class="text-sm font-semibold">
                                        Data diri
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Pastikan data diri sudah sesuai.
                                    </p>

                                </div>

                            </div>


                        </div>

                    </div>



                    <!-- STATUS -->
                    <div
                        class="bg-white border border-slate-200 rounded-xl">

                        <div class="px-6 py-5 border-b border-slate-100">

                            <h2 class="font-semibold text-slate-800">
                                Proses PKL
                            </h2>

                            <p class="text-xs text-slate-400 mt-1">
                                Tahapan pendaftaran kamu
                            </p>

                        </div>


                        <div class="p-6 space-y-5">


                            <div class="flex items-center gap-4">

                                <div
                                    class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">

                                    ✓

                                </div>

                                <div>

                                    <p class="text-sm font-medium">
                                        Data Diri
                                    </p>

                                    <p class="text-xs text-emerald-600">
                                        Selesai
                                    </p>

                                </div>

                            </div>


                            <div class="flex items-center gap-4">

                                <div
                                    class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">

                                    2

                                </div>

                                <div>

                                    <p class="text-sm font-medium">
                                        Pendaftaran
                                    </p>

                                    <p class="text-xs text-blue-600">
                                        Sedang diproses
                                    </p>

                                </div>

                            </div>


                            <div class="flex items-center gap-4">

                                <div
                                    class="w-9 h-9 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center">

                                    3

                                </div>

                                <div>

                                    <p class="text-sm font-medium">
                                        Tempat PKL
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        Menunggu
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>

</html>