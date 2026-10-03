<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PKL Online</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>


<body class="bg-slate-50">

    <div class="flex min-h-screen">


        <!-- ================= SIDEBAR ================= -->
        <aside class="fixed left-0 top-0 bottom-0 w-64 bg-white border-r border-slate-200">

            <!-- Logo -->
            <div class="h-24 flex flex-col items-center justify-center border-b border-slate-100">

                <div class="w-12 h-12 flex items-center justify-center">
                    <span class="text-4xl">🎓</span>
                </div>

                <h1 class="text-blue-700 font-bold text-base mt-1">
                    PKL online
                </h1>

            </div>


            <!-- MENU -->
            <nav class="px-4 py-6 space-y-2">


                <!-- BERANDA -->
                <a href="#"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl bg-blue-50 text-blue-700 font-semibold">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3 10.5L12 3l9 7.5M5 9v11h14V9M9 20v-6h6v6" />

                    </svg>

                    <span class="text-sm">
                        Beranda
                    </span>

                </a>


                <!-- PENDAFTARAN -->
                <a href="#"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl text-blue-700 hover:bg-blue-50 transition">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3 6h18v12H3z" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3 7l9 6 9-6" />

                    </svg>

                    <span class="text-sm">
                        Pendaftaran
                    </span>

                </a>


                <!-- TEMPAT PKL -->
                <a href="#"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl text-blue-700 hover:bg-blue-50 transition">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <rect x="3" y="4" width="18" height="16"
                            rx="1" stroke-width="1.8" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M7 8h10M7 12h10M7 16h5" />

                    </svg>

                    <span class="text-sm">
                        Tempat PKL
                    </span>

                </a>


                <!-- LAPORAN -->
                <a href="#"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl text-blue-700 hover:bg-blue-50 transition">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M6 3h9l4 4v14H6z" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M14 3v5h5M9 13h6M9 17h6" />

                    </svg>

                    <span class="text-sm">
                        Laporan
                    </span>

                </a>


                <!-- PROFIL -->
                <a href="#"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl text-blue-700 hover:bg-blue-50 transition">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <circle cx="12" cy="8" r="3"
                            stroke-width="1.8" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M5 21c0-4 3-7 7-7s7 3 7 7" />

                    </svg>

                    <span class="text-sm">
                        Profil
                    </span>

                </a>


                <!-- LOGOUT -->
                <a href="#"
                    class="flex items-center gap-4 px-4 py-3 rounded-xl text-blue-700 hover:bg-red-50 hover:text-red-600 transition mt-4">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M10 17l5-5-5-5M15 12H3" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M14 4h5v16h-5" />

                    </svg>

                    <span class="text-sm">
                        Logout
                    </span>

                </a>

            </nav>

        </aside>



        <!-- ================= KONTEN ================= -->
        <main class="ml-64 flex-1">


            <!-- TOPBAR -->
            <header
                class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8">

                <div>

                    <h2 class="text-xl font-semibold text-slate-800">
                        Beranda
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Sistem Pendaftaran PKL Online
                    </p>

                </div>


                <!-- PROFILE -->
                <div class="flex items-center gap-3">

                    <button
                        class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-500">

                        <svg class="w-5 h-5" fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M15 17h5l-1.5-1.5V11a6 6 0 10-12 0v4.5L5 17h5" />

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M10 20h4" />

                        </svg>

                    </button>


                    <div
                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">

                        <span class="font-semibold text-blue-700">
                            M
                        </span>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-slate-700">
                            Mayliza
                        </p>

                        <p class="text-xs text-slate-400">
                            Siswa
                        </p>

                    </div>

                </div>

            </header>



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