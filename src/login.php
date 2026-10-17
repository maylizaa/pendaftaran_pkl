<?php
error_reporting(E_ALL);
ini_set('display_erors',1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - PKL Online</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen items-center justify-center
             bg-slate-100 px-4 py-8">

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

            <p class="mt-2 text-sm text-slate-500">
                Silakan login untuk melanjutkan
            </p>
        </div>

        <?php if ($error !== ''): ?>
            <div class="mb-5 rounded-lg bg-red-100 p-3
                        text-sm text-red-700">
                <?= htmlspecialchars(
                    $error,
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST"
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
                    value="<?= htmlspecialchars(
                        $_POST['username'] ?? '',
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
                    autocomplete="username"
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
                    autocomplete="current-password"
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
                class="w-full rounded-lg bg-blue-600
                       px-4 py-3 font-semibold text-white
                       transition hover:bg-blue-700
                       active:scale-[0.98]"
            >
                Login Sekarang
            </button>

        </form>

        <div class="mt-6 text-center text-xs text-slate-400">
            &copy; <?= date('Y') ?> Pendaftaran PKL Online
        </div>

    </div>

</body>
</html>
