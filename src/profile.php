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
                    Profile Saya
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola informasi data diri kamu.
                </p>
            </div>


            <!-- PROFILE -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <!-- FOTO -->
                <div class="rounded-xl bg-white p-6 text-center shadow-sm">

                    <div class="mx-auto flex h-32 w-32 items-center justify-center rounded-full bg-blue-100 text-5xl">
                        👤
                    </div>

                    <h2 class="mt-4 text-lg font-bold text-gray-800">
                        Mayliza
                    </h2>

                    <p class="text-sm text-gray-500">
                        XII RPL 1
                    </p>

                    <button
                        type="button"
                        class="mt-5 rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white transition hover:bg-blue-700"
                    >
                        Ubah Foto
                    </button>

                </div>


                <!-- DATA DIRI -->
                <div class="rounded-xl bg-white p-6 shadow-sm lg:col-span-2">

                    <h2 class="mb-5 text-lg font-semibold text-gray-800">
                        Data Diri
                    </h2>

                    <form>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                            <!-- NAMA -->
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Nama Lengkap
                                </label>

                                <input
                                    type="text"
                                    value="Mayliza"
                                    class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                                >
                            </div>


                            <!-- NIS -->
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    NIS
                                </label>

                                <input
                                    type="text"
                                    value="12345678"
                                    class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                                >
                            </div>


                            <!-- KELAS -->
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Kelas
                                </label>

                                <input
                                    type="text"
                                    value="XII RPL 1"
                                    class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                                >
                            </div>


                            <!-- JURUSAN -->
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Jurusan
                                </label>

                                <input
                                    type="text"
                                    value="Rekayasa Perangkat Lunak"
                                    class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                                >
                            </div>


                            <!-- JENIS KELAMIN -->
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Jenis Kelamin
                                </label>

                                <select
                                    class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                                >
                                    <option>Perempuan</option>
                                    <option>Laki-laki</option>
                                </select>
                            </div>


                            <!-- NO HP -->
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    No. HP
                                </label>

                                <input
                                    type="text"
                                    value="081234567890"
                                    class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                                >
                            </div>

                        </div>


                        <!-- ALAMAT -->
                        <div class="mt-5">

                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Alamat
                            </label>

                            <textarea
                                rows="4"
                                class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100"
                            >Jl. Contoh No. 10</textarea>

                        </div>


                        <!-- BUTTON -->
                        <div class="mt-6 flex justify-end">

                            <button
                                type="submit"
                                class="rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700"
                            >
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </section>

    </main>

</div>

<?php include_once("templates/footer.php"); ?>