<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $page_masuk ?></title>
</head>

<body>
    <?php if ($this->session->flashdata('message-success')) { ?>
        <div id="snackbar">
            <div class="bg-green-500 shadow-lg text-center p-3 rounded">
                <?= $this->session->flashdata('message-success'); ?>
            </div>
        </div>
    <?php } else if ($this->session->flashdata('message-error')) { ?>
        <div id="snackbar">
            <div class="bg-red-500 shadow-lg text-center p-3 rounded">
                <?= $this->session->flashdata('message-error'); ?>
            </div>
        </div>
    <?php } else if ($this->session->flashdata('message-warning')) { ?>
        <div id="snackbar">
            <div class="bg-yellow-500 shadow-lg text-center p-3 rounded">
                <?= $this->session->flashdata('message-warning'); ?>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->session->flashdata('message-success-2')) { ?>
        <div id="snackbar">
            <div class="bg-green-500 shadow-lg text-center p-3 rounded">
                <?= $this->session->flashdata('message-success-2'); ?>
            </div>
        </div>
    <?php } else if ($this->session->flashdata('message-error-2')) { ?>
        <div id="snackbar">
            <div class="bg-red-500 shadow-lg text-center p-3 rounded">
                <?= $this->session->flashdata('message-error-2'); ?>
            </div>
        </div>
    <?php } else if ($this->session->flashdata('message-warning-2')) { ?>
        <div id="snackbar">
            <div class="bg-yellow-500 shadow-lg text-center p-3 rounded">
                <?= $this->session->flashdata('message-warning-2'); ?>
            </div>
        </div>
    <?php } ?>

    <div class="min-h-screen flex items-center justify-center py-4 px-4 sm:px-6">
        <div class="space-y-8 my-8">
            <div>
                <h2 class="text-center text-3xl font-black text-gray-900">
                    Masuk
                </h2>
                <p class="mt-2 lg:mb-12 text-center text-sm text-gray-600">
                    atau jika anda belum punya akun anda dapat
                    <a href="<?= site_url('auth_masyarakat/registration') ?>" class="font-semibold text-indigo-600 hover:text-indigo-500">
                        daftar
                    </a>
                </p>
            </div>
            <form class="space-y-6" action="<?= base_url('auth_masyarakat') ?>" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md space-y-px">
                    <div class="form-check grid lg:grid-rows-2 sm:grid-rows-2 gap-4">
                        <div class="relative">
                            <label class="font-semibold text-gray-900">Username</label>
                            <input type="text" id="username" name="username" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ketik Username" value="<?= set_value('username'); ?>" required />
                        </div>
                        <div class="relative" x-data="{ show: true }">
                            <label class="font-semibold text-gray-900">Password</label>
                            <input type="password" id="password" name="password" class="block w-full pl-4 pr-12 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ketik Password" required :type="show ? 'password' : 'text'" />
                            <div class="absolute inset-y-0 right-0 top-0 pt-8 pr-4 flex items-center text-sm leading-5">
                                <svg class="h-4 text-gray-400" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                    <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg>
                                <svg class="h-4 text-indigo-500" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                    <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <input type="hidden" name="idUser">
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <div class="text-sm">
                        <a id="show-forgotPassword-modal" class="font-semibold text-indigo-600 hover:text-indigo-500 cursor-pointer">
                            Lupa password?
                        </a>
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <button type="submit" class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white focus:outline-none transition duration-150 ease-in-out bg-indigo-600 hover:bg-indigo-500 rounded-lg">Masuk</button>
                    </div>
                    <div class="text-center mt-8">
                        <a href="<?= site_url('beranda') ?>" class="font-semibold text-indigo-600 hover:text-indigo-500">Kembali ke Beranda</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="fixed z-50 inset-0 overflow-y-auto hidden" id="forgotPassword-modal">
        <div class="min-h-screen flex items-center px-4 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="flex justify-between bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="mt-2">
                        <h3 class="lg:text-xl md:text-xl text-xl font-semibold text-gray-900 capitalize">
                            reset password anda disini
                        </h3>
                    </div>
                    <div class="">
                        <button type="button" class="w-full inline-flex justify-center rounded-md px-1 py-1 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" id="hidden-forgotPassword-modal">
                            <i class="mx-auto h-8 w-8 text-gray-900" data-feather="x" stroke-width="0.75"></i>
                        </button>
                    </div>
                </div>
                <form action="<?= base_url('auth_masyarakat/forgotPassword') ?>" method="POST">
                    <div class="bg-white px-6">
                        <div class="grid grid-rows-2 gap-y-4 mt-6">
                            <div>
                                <span class="block text-lg font-semibold text-gray-700 mb-2">Email</span>
                                <input type="email" name="forgotPassword" id="forgotPassword" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" required />
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

    <script type="text/javascript">
        let alert_success = '<?= $this->session->flashdata('message-success', TRUE); ?>';
        let alert_error = '<?= $this->session->flashdata('message-error', TRUE); ?>';
        let alert_warning = '<?= $this->session->flashdata('message-warning', TRUE); ?>';

        if (alert_success != '') {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
        if (alert_error != '') {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
        if (alert_warning != '') {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }


        let alert_success_2 = '<?= $this->session->flashdata('message-success-2', TRUE); ?>';
        let alert_error_2 = '<?= $this->session->flashdata('message-error-2', TRUE); ?>';
        let alert_warning_2 = '<?= $this->session->flashdata('message-warning-2', TRUE); ?>';

        if (alert_success_2 != '') {
            $("#forgotPassword-modal").fadeIn();
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
        if (alert_error_2 != '') {
            $("#forgotPassword-modal").fadeIn();
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
        if (alert_warning_2 != '') {
            $("#forgotPassword-modal").fadeIn();
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        var showPass = 0;
        $('.show-pass').on('click', function() {
            if (showPass == 0) {
                $(this).next('input').attr('type', 'text');
                $(this).find('i').removeClass('eye');
                $(this).find('i').addClass('eye-off');
                showPass = 1;
            } else {
                $(this).next('input').attr('type', 'password');
                $(this).find('i').removeClass('eye-off');
                $(this).find('i').addClass('eye');
                showPass = 0;
            }
        });

        $("#show-forgotPassword-modal").click(function() {
            $("#forgotPassword-modal").fadeIn();
        });
        $("#hidden-forgotPassword-modal").click(function() {
            $("#forgotPassword-modal").fadeOut();
        });
    </script>
</body>

</html>