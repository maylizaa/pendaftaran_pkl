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

                <!-- ================= JUDUL ================= -->

                <div class="mb-8">

                    <h1 class="text-2xl font-bold text-slate-800">
                        Pendaftaran PKL
                    </h1>

                    <p class="text-sm text-slate-500 mt-2">
                        Lengkapi data berikut untuk melakukan pendaftaran Praktik Kerja Lapangan.
                    </p>

                </div>


                <!-- ================= STATUS ================= -->

                <div class="bg-white border border-slate-200 rounded-2xl p-5 mb-6 shadow-sm">

                    <div class="flex items-center">

                        <div class="w-11 h-11 bg-amber-50 rounded-xl flex items-center justify-center">
                            <span class="text-xl">⏳</span>
                        </div>

                        <div class="ml-4">

                            <h3 class="font-semibold text-slate-700">
                                Status Pendaftaran
                            </h3>

                            <p class="text-xs text-slate-400 mt-1">
                                Silakan lengkapi formulir pendaftaran PKL.
                            </p>

                        </div>

                        <div class="ml-auto">

                            <span class="px-4 py-2 rounded-full bg-amber-50 text-amber-600 text-xs font-semibold">
                                Belum Mendaftar
                            </span>

                        </div>

                    </div>

                </div>


                <!-- ================= FORM ================= -->

                <form action="#" method="POST" enctype="multipart/form-data">

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                        <!-- ================= DATA SISWA ================= -->

                        <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

                            <div class="flex items-center gap-3 mb-6">

                                <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                                    <span class="text-lg">👤</span>
                                </div>

                                <div>

                                    <h2 class="font-semibold text-slate-800">
                                        Data Siswa
                                    </h2>

                                    <p class="text-xs text-slate-400">
                                        Informasi siswa yang melakukan pendaftaran
                                    </p>

                                </div>

                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                                <!-- NAMA -->

                                <div>

                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Nama Lengkap
                                    </label>

                                    <input
                                        type="text"
                                        name="nama"
                                        value="Mayliza"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none"
                                    >

                                </div>


                                <!-- NIS -->

                                <div>

                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        NIS
                                    </label>

                                    <input
                                        type="text"
                                        name="nis"
                                        value="12345678"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none"
                                    >

                                </div>


                                <!-- KELAS -->

                                <div>

                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Kelas
                                    </label>

                                    <input
                                        type="text"
                                        name="kelas"
                                        value="XI RPL 1"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none"
                                    >

                                </div>


                                <!-- JURUSAN -->

                                <div>

                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Jurusan
                                    </label>

                                    <input
                                        type="text"
                                        name="jurusan"
                                        value="Rekayasa Perangkat Lunak"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none"
                                    >

                                </div>


                                <!-- NO HP -->

                                <div>

                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Nomor HP
                                    </label>

                                    <input
                                        type="text"
                                        name="no_hp"
                                        placeholder="08xxxxxxxxxx"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                    >

                                </div>


                                <!-- EMAIL -->

                                <div>

                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="email@gmail.com"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                    >

                                </div>

                            </div>

                        </div>



                        <!-- ================= INFORMASI ================= -->

                        <div class="bg-blue-600 rounded-2xl p-6 text-white shadow-sm">

                            <div class="w-11 h-11 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                                ℹ️
                            </div>

                            <h2 class="font-semibold text-lg">
                                Informasi Pendaftaran
                            </h2>

                            <p class="text-sm text-blue-100 mt-2 leading-6">
                                Pastikan data yang kamu masukkan sudah benar sebelum mengirim formulir.
                            </p>


                            <div class="mt-6 space-y-4">


                                <div class="flex gap-3">

                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs">
                                        1
                                    </div>

                                    <p class="text-sm">
                                        Lengkapi data siswa.
                                    </p>

                                </div>


                                <div class="flex gap-3">

                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs">
                                        2
                                    </div>

                                    <p class="text-sm">
                                        Pilih tempat PKL.
                                    </p>

                                </div>


                                <div class="flex gap-3">

                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs">
                                        3
                                    </div>

                                    <p class="text-sm">
                                        Tentukan tanggal PKL.
                                    </p>

                                </div>


                                <div class="flex gap-3">

                                    <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs">
                                        4
                                    </div>

                                    <p class="text-sm">
                                        Kirim pendaftaran.
                                    </p>

                                </div>

                            </div>

                        </div>



                        <!-- ================= TEMPAT PKL ================= -->

                        <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

                            <div class="flex items-center gap-3 mb-6">

                                <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center">
                                    <span class="text-lg">🏢</span>
                                </div>

                                <div>

                                    <h2 class="font-semibold text-slate-800">
                                        Tempat dan Waktu PKL
                                    </h2>

                                    <p class="text-xs text-slate-400">
                                        Tentukan tempat dan waktu pelaksanaan PKL
                                    </p>

                                </div>

                            </div>


                            <!-- TEMPAT -->

                            <div class="mb-5">

                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Tempat PKL
                                </label>

                                <select
                                    name="tempat_pkl"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >

                                    <option value="">
                                        Pilih tempat PKL
                                    </option>

                                    <option value="PT Maju Teknologi">
                                        PT Maju Teknologi
                                    </option>

                                    <option value="CV Digital Kreatif">
                                        CV Digital Kreatif
                                    </option>

                                    <option value="PT Teknologi Nusantara">
                                        PT Teknologi Nusantara
                                    </option>

                                    <option value="CV Media Digital">
                                        CV Media Digital
                                    </option>

                                </select>

                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                                <!-- TANGGAL MULAI -->

                                <div>

                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Tanggal Mulai
                                    </label>

                                    <input
                                        type="date"
                                        name="tanggal_mulai"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500"
                                    >

                                </div>


                                <!-- TANGGAL SELESAI -->

                                <div>

                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Tanggal Selesai
                                    </label>

                                    <input
                                        type="date"
                                        name="tanggal_selesai"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500"
                                    >

                                </div>

                            </div>

                        </div>



                        <!-- ================= DOKUMEN ================= -->

                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

                            <div class="flex items-center gap-3 mb-6">

                                <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center">
                                    <span>📎</span>
                                </div>

                                <div>

                                    <h2 class="font-semibold text-slate-800">
                                        Dokumen
                                    </h2>

                                    <p class="text-xs text-slate-400">
                                        Dokumen pendukung
                                    </p>

                                </div>

                            </div>


                            <label
                                class="block border-2 border-dashed border-slate-200 rounded-xl p-6 text-center cursor-pointer hover:bg-blue-50 hover:border-blue-300 transition"
                            >

                                <div class="text-3xl mb-3">
                                    📤
                                </div>

                                <p class="text-sm font-medium text-blue-600">
                                    Upload dokumen
                                </p>

                                <p class="text-xs text-slate-400 mt-2">
                                    PDF / JPG / PNG
                                </p>

                                <p class="text-xs text-slate-400">
                                    Maksimal 5 MB
                                </p>

                                <input
                                    type="file"
                                    name="dokumen"
                                    class="hidden"
                                >

                            </label>

                        </div>



                        <!-- ================= KETERANGAN ================= -->

                        <div class="lg:col-span-3 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Keterangan
                            </label>

                            <textarea
                                name="keterangan"
                                rows="4"
                                placeholder="Tuliskan keterangan tambahan jika diperlukan..."
                                class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                            ></textarea>

                        </div>

                    </div>



                    <!-- ================= BUTTON ================= -->

                    <div class="flex justify-end gap-3 mt-6">

                        <button
                            type="reset"
                            class="px-6 py-3 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-50"
                        >
                            Reset
                        </button>


                        <button
                            type="submit"
                            class="px-7 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-semibold shadow-sm transition"
                        >
                            📝 Kirim Pendaftaran
                        </button>

                    </div>


                </form>

            </section>

        </main>

    </div>

<?php include_once("templates/footer.php"); ?>