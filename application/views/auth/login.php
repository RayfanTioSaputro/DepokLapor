<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $this->load->view('template/header') ?>

    <title>Masuk</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center py-4 px-4 sm:px-6">
        <div class="space-y-8 my-8">
            <div>
                <div class="alert">
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Masuk
                </h2>
                <p class="mt-2 lg:mb-12 text-center text-sm text-gray-600">
                    atau jika anda belum punya akun anda dapat
                    <a href="<?= site_url('auth/registration') ?>" class="font-medium text-indigo-600 hover:text-indigo-500">
                        daftar
                    </a>
                </p>
            </div>
            <form class="space-y-6" action="<?= base_url('auth') ?>" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md -space-y-px">
                    <div class="form-check grid lg:grid-rows-2 sm:grid-rows-2 gap-4">
                        <div class="relative">
                            <label class="font-medium text-gray-900">Username</label>
                            <?= form_error('username', '<small class="text-red-500 font-medium">', '</small>'); ?>
                            <input type="text" id="username" name="username" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ketik Username" value="<?= set_value('username'); ?>" />
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900">Password</label>
                            <?= form_error('password', '<small class="text-red-500 font-medium">', '</small>'); ?>
                            <input type="password" id="password" name="password" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ketik Password" />
                        </div>
                        <input type="hidden" name="idUser">
                    </div>
                </div>

                <div class=" flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Ingatkan saya
                        </label>
                    </div>

                    <div class="text-sm">
                        <a id="show-login-modal" class="font-medium text-indigo-600 hover:text-indigo-500 cursor-pointer">
                            Lupa password?
                        </a>
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <button type="submit" class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white focus:outline-none transition duration-150 ease-in-out bg-indigo-600 hover:bg-indigo-500 rounded-lg">Masuk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="fixed z-50 inset-0 overflow-y-auto hidden" id="login-modal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="flex justify-between bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="mt-2">
                        <h3 class="lg:text-xl md:text-xl text-xl font-medium text-gray-900 capitalize">
                            reset password anda disini
                        </h3>
                    </div>
                    <div class="">
                        <button type="button" class="w-full inline-flex justify-center rounded-md px-1 py-1 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" id="hidden-login-modal">
                            <i class="mx-auto h-8 w-8 text-gray-900" data-feather="x" stroke-width="0.75"></i>
                        </button>
                    </div>
                </div>
                <form action="<?= base_url('auth/forgotPassword') ?>" method="POST">
                    <div class="bg-white px-6">
                        <div class="grid grid-rows-2 gap-y-4 mt-6">
                            <div>
                                <span class="block text-lg font-medium text-gray-700 mb-2">Email</span>
                                <input type="text" name="forgotPassword" id="forgotPassword" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md">
                            </div>
                            <div class="mt-1">
                                <button type="submit" class="inline-block w-full py-3 text-lg font-medium text-center text-white focus:outline-none transition duration-150 ease-in-out bg-indigo-600 hover:bg-indigo-500 rounded-md">Kirim email</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $this->load->view('template/footer') ?>
    <script type="text/javascript">
        feather.replace();

        $(window).bind("load", function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(4000, 0).slideUp(300, function() {
                    $(this).remove();
                });
            }, 500);
        });

        $("#show-login-modal").click(function() {
            $("#login-modal").fadeIn();
        });
        $("#hidden-login-modal").click(function() {
            $("#login-modal").fadeOut();
        });
    </script>
</body>

</html>