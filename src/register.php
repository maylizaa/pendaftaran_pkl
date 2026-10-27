<?php 

require "config/koneksi.php";

function userRegister($conn) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];

    // cek username
     $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
     $stmt->execute([$username]);
     $user = $stmt->fetch(PDO::FETCH_ASSOC);
     if ($user) {
         echo "
        <script>
        alert('username sudah digunakan !');
        window.location.href = 'register.php'
        </script>
        ";
        die();
     }

    // cek password
    if($password !== $confPassword) {
        echo "
        <script>
        alert('password dan konfirmasi password harus sama !');
        window.location.href = 'register.php'
        </script>
        ";
        die();
    }

    // hasPassword
    $hasPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $hasPassword]);

    // tambah user id
    $userId = $conn->lastInsertId();

    $stmt = $conn->prepare("INSERT INTO siswa (user_id) VALUES (?)");
    $stmt->execute([$userId]);

    return $stmt->rowCount();
}

if (isset($_POST["register"])) {
    $register = userRegister($conn, $_POST);
    if ($register > 0) {
        echo "
        <script>
        alert('Registerasi berhasil !');
        window.location.href = 'login.php'
        </script>
        ";
        die();
    }
}

?>


<?php include_once "templates/header.php"; ?>

<div class="flex min-h-screen items-center justify-center px-4 py-8">

    <div class="w-full max-w-md rounded-2xl bg-white
                p-8 shadow-xl">

        <div class="mb-8 text-center">
            <div class="mx-auto mb-4 flex h-16 w-16
                        items-center justify-center rounded-2xl
                        bg-blue-600 text-3xl text-white">
                🎓
            </div>

            <h1 class="text-3xl font-bold text-slate-800">
                PKL Online
            </h1>

        </div>

        <form action="" method="post"
              class="space-y-5">

            <div>
                <label for="username"
                       class="mb-2 block text-sm font-semibold
                              text-slate-700">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username"
                    required
                    class="w-full rounded-lg border
                           border-slate-300 px-4 py-3
                           outline-none transition
                           focus:border-blue-500
                           focus:ring-2 focus:ring-blue-100"
                >
            </div>

            <div>
                <label for="password"
                       class="mb-2 block text-sm font-semibold
                              text-slate-700">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                    class="w-full rounded-lg border
                           border-slate-300 px-4 py-3
                           outline-none transition
                           focus:border-blue-500
                           focus:ring-2 focus:ring-blue-100"
                >
            </div>

            <div>
                <label for="confPassword"
                       class="mb-2 block text-sm font-semibold
                              text-slate-700">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    id="confPassword"
                    name="confPassword"
                    placeholder="Masukkan ulang password"
                    required
                    class="w-full rounded-lg border
                           border-slate-300 px-4 py-3
                           outline-none transition
                           focus:border-blue-500
                           focus:ring-2 focus:ring-blue-100"
                >
            </div>

            <button
                type="submit"
                name="register"
                class="w-full rounded-lg bg-blue-600
                       px-4 py-3 font-semibold text-white
                       transition hover:bg-blue-700
                       active:scale-[0.98]"
            >
                Register
            </button>

            <a href="login.php" class="w-full block rounded-lg bg-slate-600
                       px-4 py-3 font-semibold text-white
                       transition hover:bg-slate-700 text-center
                       active:scale-[0.98]">Login</a>


        </form>

        <div class="mt-6 text-center text-xs text-slate-400">
            &copy; <?= date('Y') ?> Pendaftaran PKL Online
        </div>

    </div>

</div>

<?php include_once "templates/footer.php"; ?>

