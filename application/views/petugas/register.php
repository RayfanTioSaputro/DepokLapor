<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url() . 'assets/css/tailwind.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/petugas/style.css' ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="<?= base_url() . 'assets/vendor/jquery/jquery.min.js' ?>"></script>

    <style>
        body {
            font-family: 'Mulish', sans-serif;
        }
    </style>

    <title>Daftar</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6">
        <div class="max-w-xl lg:w-full space-y-8 my-8">
            <div>
                <h2 class="text-center text-3xl font-black text-gray-900">
                    Daftar
                </h2>
                <p class="mt-2 lg:mb-12 text-center text-sm text-gray-600">
                    atau jika anda sudah punya akun anda dapat
                    <a href="<?= site_url('auth_petugas') ?>" class="font-semibold text-indigo-600 hover:text-indigo-500">
                        masuk
                    </a>
                </p>
            </div>
            <form class="space-y-6" action="<?= base_url('auth_petugas/registration') ?>" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md -space-y-px">
                    <div class="form-check grid lg:grid-cols-2 sm:grid-cols-2 gap-4">
                        <div class="relative">
                            <label class="font-semibold text-gray-900">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="<?= set_value('nama') ?>" placeholder="Ketik Nama Lengkap" required />
                            <?= form_error('nama', '<small class="text-red-500 font-medium">', '</small>'); ?>
                        </div>
                        <div class="relative">
                            <label class="font-semibold text-gray-900">No. Telpon</label>
                            <input type="telp" id="telp" name="telp" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="<?= set_value('telp') ?>" placeholder="Ketik No. Telpon" required />
                            <?= form_error('telp', '<small class="text-red-500 font-medium">', '</small>'); ?>
                        </div>
                        <div class="relative">
                            <label class="font-semibold text-gray-900">Email</label>
                            <input type="email" id="email" name="email" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="<?= set_value('email') ?>" placeholder="nama@contoh.com" required />
                            <?= form_error('email', '<small class="text-red-500 font-medium">', '</small>'); ?>
                        </div>
                        <div class="relative">
                            <label class="font-semibold text-gray-900">Username</label>
                            <input type="text" id="username" name="username" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="<?= set_value('username') ?>" placeholder="Minimal 5 karakter" required />
                            <?= form_error('username', '<small class="text-red-500 font-medium">', '</small>'); ?>
                        </div>
                        <div class="relative">
                            <label class="font-semibold text-gray-900">Password</label>
                            <input type="password" id="password" name="password" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="<?= set_value('password') ?>" placeholder="Minimal 5 karakter" required />
                            <?= form_error('password', '<small class="text-red-500 font-medium">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <button type="submit" class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white focus:outline-none transition duration-150 ease-in-out bg-indigo-600 hover:bg-indigo-500 rounded-lg">Daftarkan Akun</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="<?= base_url() . 'assets/js/petugas/script.js' ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>

</body>

</html>