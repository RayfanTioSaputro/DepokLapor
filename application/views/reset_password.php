<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $this->load->view('template/header') ?>

    <style>
        body {
            font-family: 'Mulish', sans-serif;
        }
    </style>

    <title>Setel Ulang Password</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center py-4 px-4 sm:px-6">
        <div class="space-y-8 my-8">
            <div>
                <h2 class="text-center text-3xl font-black text-gray-900">
                    Setel Ulang Password
                </h2>
                <p class="mt-2 lg:mb-12 text-center text-sm text-gray-600">
                    pasword baru harus dibuat lebih dari 5 karakter/digit
                </p>
            </div>
            <form class="space-y-6" action="<?= base_url('auth/changepassword') ?>" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md space-y-px">
                    <div class="form-check grid lg:grid-rows-2 sm:grid-rows-2 gap-4">
                        <div class="relative" x-data="{ show: true }">
                            <label class="font-semibold text-gray-900">Password Baru</label>
                            <input type="password" id="password1" name="password1" class="block w-full pl-4 pr-12 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ketik Password Baru" required :type="show ? 'password' : 'text'" />
                            <?= form_error('password1', '<small class="text-red-500 font-medium">', '</small>'); ?>
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
                        <div class="relative">
                            <label class="font-semibold text-gray-900">Konfirmasi Password Baru</label>
                            <input type="password" id="password2" name="password2" class="block w-full px-4 py-4 mt-2 text-md placeholder-gray-400 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ketik ulang password baru" required />
                            <?= form_error('password2', '<small class="text-red-500 font-medium">', '</small>'); ?>
                        </div>
                        <input type="hidden" name="idUser">
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <button type="submit" class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white focus:outline-none transition duration-150 ease-in-out bg-indigo-600 hover:bg-indigo-500 rounded-lg">Setel Ulang Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php $this->load->view('template/footer') ?>
    <script type="text/javascript">
        feather.replace();

        $(window).bind("load", function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(10000, 0).slideUp(300, function() {
                    $(this).remove();
                });
            }, 500);
        });

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
    </script>
</body>

</html>