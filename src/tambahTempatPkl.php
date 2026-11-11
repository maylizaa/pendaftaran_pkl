<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    die();
}
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
                    Tambah Tempat PKL
                </h1>
                
            </div>
           

            <!-- ================= TambahTEMPAT PKL ================= -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">


                

            </div>

        </section>

    </main>

</div>

<?php include_once("templates/footer.php"); ?>