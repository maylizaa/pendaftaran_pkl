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
                    Laporan PKL
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Upload dan lihat laporan kegiatan PKL kamu.
                </p>
            </div>


            <!-- FORM UPLOAD -->
            <div class="rounded-xl bg-white p-6 shadow-sm">

                <h2 class="mb-5 text-lg font-semibold text-gray-800">
                    Upload Laporan
                </h2>

                <form action="" method="POST" enctype="multipart/form-data">

                    <!-- JUDUL -->
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Judul Laporan
                        </label>

                        <input
                            type="text"
                            name="judul"
                            placeholder="Masukkan judul laporan"
                            class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                        >

                    </div>


                    <!-- DESKRIPSI -->
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="4"
                            placeholder="Masukkan deskripsi laporan"
                            class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                        ></textarea>

                    </div>


                    <!-- FILE -->
                    <div class="mb-5">

                        <label class="mb-2 block text-sm font-medium text-gray-700">
                            File Laporan
                        </label>

                        <div class="rounded-lg border-2 border-dashed border-gray-200 p-6 text-center">

                            <div class="text-4xl">
                                📄
                            </div>

                            <p class="mt-2 text-sm text-gray-500">
                                Pilih file laporan dari komputer kamu
                            </p>

                            <input
                                type="file"
                                name="file_laporan"
                                accept=".pdf,.doc,.docx"
                                class="mx-auto mt-4 block w-full max-w-md text-sm"
                            >

                            <p class="mt-2 text-xs text-gray-400">
                                Format yang diperbolehkan: PDF, DOC, DOCX
                            </p>

                        </div>

                    </div>


                    <!-- BUTTON -->
                    <div class="flex justify-end">

                        <button
                            type="submit"
                            class="rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700"
                        >
                            Upload Laporan
                        </button>

                    </div>

                </form>

            </div>


            <!-- RIWAYAT LAPORAN -->
            <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">

                <div class="mb-5">
                    <h2 class="text-lg font-semibold text-gray-800">
                        Riwayat Laporan
                    </h2>

                    <p class="text-sm text-gray-500">
                        Daftar laporan yang sudah kamu upload.
                    </p>
                </div>


                <!-- TABLE -->
                <div class="overflow-x-auto">

                    <table class="w-full text-left text-sm">

                        <thead>
                            <tr class="border-b border-gray-100 text-gray-500">

                                <th class="px-4 py-3 font-medium">
                                    No
                                </th>

                                <th class="px-4 py-3 font-medium">
                                    Judul
                                </th>

                                <th class="px-4 py-3 font-medium">
                                    Tanggal Upload
                                </th>

                                <th class="px-4 py-3 font-medium">
                                    Status
                                </th>

                                <th class="px-4 py-3 font-medium">
                                    Aksi
                                </th>

                            </tr>
                        </thead>


                        <tbody>

                            <!-- DATA 1 -->
                            <tr class="border-b border-gray-100">

                                <td class="px-4 py-4">
                                    1
                                </td>

                                <td class="px-4 py-4 font-medium text-gray-800">
                                    Laporan Praktik Kerja Lapangan
                                </td>

                                <td class="px-4 py-4 text-gray-500">
                                    06 Oktober 2026
                                </td>

                                <td class="px-4 py-4">

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-600">
                                        Diterima
                                    </span>

                                </td>

                                <td class="px-4 py-4">

                                    <button
                                        type="button"
                                        class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-medium text-blue-600 hover:bg-blue-100"
                                    >
                                        Lihat
                                    </button>

                                </td>

                            </tr>


                            <!-- DATA 2 -->
                            <tr class="border-b border-gray-100">

                                <td class="px-4 py-4">
                                    2
                                </td>

                                <td class="px-4 py-4 font-medium text-gray-800">
                                    Dokumentasi Kegiatan PKL
                                </td>

                                <td class="px-4 py-4 text-gray-500">
                                    05 Oktober 2026
                                </td>

                                <td class="px-4 py-4">

                                    <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-600">
                                        Menunggu
                                    </span>

                                </td>

                                <td class="px-4 py-4">

                                    <button
                                        type="button"
                                        class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-medium text-blue-600 hover:bg-blue-100"
                                    >
                                        Lihat
                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

</div>

<?php include_once("templates/footer.php"); ?>