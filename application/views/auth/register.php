<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $this->load->view('template/header') ?>

    <title>Daftar</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center py-4 px-4 sm:px-6">
        <div class="max-w-xl lg:w-full space-y-8 my-8">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Daftar
                </h2>
                <p class="mt-2 lg:mb-12 text-center text-sm text-gray-600">
                    atau jika anda sudah punya akun anda dapat
                    <a href="<?= site_url('auth') ?>" class="font-medium text-indigo-600 hover:text-indigo-500">
                        masuk
                    </a>
                </p>
            </div>
            <form class="space-y-6" action="<?= base_url('auth/registration') ?>" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md -space-y-px">
                    <div class="form-check grid lg:grid-cols-2 sm:grid-cols-2 gap-4">
                        <div class="relative">
                            <label class="font-medium text-gray-900">NIK</label>
                            <?= form_error('nik', '<small class="text-red-500 font-medium">', '</small>'); ?>
                            <input type="text" id="nik" name="nik" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Nomor Induk Kependudukan" />
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900">Nama Lengkap</label>
                            <?= form_error('nama', '<small class="text-red-500 font-medium">', '</small>'); ?>
                            <input type="text" id="nama" name="nama" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ketik Nama Lengkap" />
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900">No. Telpon</label>
                            <?= form_error('telp', '<small class="text-red-500 font-medium">', '</small>'); ?>
                            <input type="telp" id="telp" name="telp" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ketik No. Telpon" />
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900">Email</label>
                            <?= form_error('email', '<small class="text-red-500 font-medium">', '</small>'); ?>
                            <input type="email" id="email" name="email" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="nama@contoh.com" />
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900">Username</label>
                            <?= form_error('username', '<small class="text-red-500 font-medium">', '</small>'); ?>
                            <input type="text" id="username" name="username" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ketik Username" />
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900">Password</label>
                            <?= form_error('password', '<small class="text-red-500 font-medium">', '</small>'); ?>
                            <input type="password" id="password" name="password" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Minimal 8 karakter" />
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

    <?php $this->load->view('template/footer') ?>
</body>

</html>