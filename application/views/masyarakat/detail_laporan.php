<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
        (function(e, t, n) {
            var r = e.querySelectorAll("html")[0];
            r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
        })(document, window, 0);
    </script>

    <title>DepokLapor! - <?= $page ?></title>
</head>

<body>
    <?php if ($this->session->flashdata('message-success')) { ?>
        <div id="snackbar">
            <div class="bg-green-500 shadow-lg text-center p-3 rounded">
                <?= $this->session->flashdata('message-success'); ?>
            </div>
        </div>
    <?php } ?>
    <section class="w-full antialiased bg-white select-none">
        <div class="relative bg-white">
            <div class="container w-full mx-auto px-6 sm:px-6">
                <div class="flex justify-between items-center lg:py-6 py-5 md:justify-start md:space-x-10">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="<?= base_url('beranda') ?>" class="w-1/4 py-4 pr-4 md:py-0">
                            <span class="text-xl font-black leading-none text-gray-800 select-none logo">DepokLapor<span class="text-indigo-600">!</span></span>
                        </a>
                    </div>
                    <div class="-mr-2 -my-2 md:hidden">
                        <button type="button" class="show-mobile-header bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                            <span class="sr-only">Open menu</span>
                            <i class="h6 w-6" data-feather="menu" stroke-width="1.75"></i>
                        </button>
                    </div>
                    <nav class="hidden md:flex space-x-10">
                        <a href="<?= site_url('beranda') ?>" class="inline-block w-full py-2 font-medium text-left text-gray-700 md:w-auto hover:text-indigo-600 md:text-center">
                            Beranda
                        </a>
                        <a href="<?= site_url('tentang') ?>" class="inline-block w-full py-2 font-medium text-left text-gray-700 md:w-auto hover:text-indigo-600 md:text-center">
                            Tentang
                        </a>
                    </nav>
                    <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                        <?php if ($this->session->userdata('status') != "login") { ?>
                            <a href="<?= site_url('auth_masyarakat') ?>" class="whitespace-nowrap text-base font-medium text-gray-700 hover:text-indigo-600">
                                Masuk
                            </a>
                            <a href="<?= site_url('auth_masyarakat/registration') ?>" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-semibold text-white transition duration-150 ease-in-out bg-indigo-600 hover:bg-indigo-500 focus:outline-none md:rounded-md lg:ronded-md">
                                Daftar
                            </a>
                        <?php } else if ($this->session->userdata('status') == "login") { ?>
                            <button class="mr-6 bg-transparent p-1 rounded-full text-gray-400 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-500 focus:ring-white">
                                <i class="h6 w-6" data-feather="bell" stroke-width="1.75"></i>
                            </button>
                            <div x-data="{ open: false }">
                                <button type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-500 focus:ring-white" aria-expanded="false" aria-haspopup="true" @click="open = true">
                                    <img class="h-9 w-9 rounded-full" src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="">
                                </button>
                                <template x-if="open">
                                    <div class="origin-top-right absolute right-0 mr-6 mt-2 w-50 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none divide-y-2 divide-gray-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" @click.away="open = false" x-transition:enter="transition ease-out origin-top-right duration-200" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition origin-top-right ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
                                        <div class="block px-4 py-2 text-sm text-gray-700" role="menuitem">
                                            <span>
                                                <?= $user['nama'] ?>
                                            </span>
                                            <br>
                                            <span class="text-xs text-gray-400">
                                                <?= $user['username']; ?>
                                            </span>
                                        </div>
                                        <div>
                                            <a class="block px-4 py-2 text-sm text-indigo-600 font-medium hover:bg-gray-100" role="menuitem">Laporan Saya</a>
                                            <a href="<?= site_url('auth_masyarakat/logout') ?>" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100" role="menuitem">Keluar</a>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="mobile-header absolute top-0 inset-x-0 p-2 transition transform origin-top-right hidden z-100">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                    <div class="pt-5 pb-6 px-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <a href="<?= base_url('beranda') ?>" class="w-1/4 py-4 pr-4 md:py-0">
                                    <span class="text-xl font-black leading-none text-gray-800 select-none logo">DepokLapor<span class="text-indigo-600">!</span></span>
                                </a>
                            </div>
                            <div class="-mr-3">
                                <button type="button" class="hide-mobile-header bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <span class="sr-only">Close menu</span>
                                    <i class="h6 w-6" data-feather="x" stroke-width="1.75"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mt-6">
                            <nav class="grid gap-y-8">
                                <a href="<?= site_url('beranda') ?>" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                    <i class="flex-shrink-0 h-6 w-6 text-gray-400" data-feather="home" stroke-width="1.75"></i>
                                    <span class="ml-3 text-base font-medium text-gray-700">
                                        Beranda
                                    </span>
                                </a>
                                <a href="<?= site_url('tentang') ?>" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                    <i class="flex-shrink-0 h-6 w-6 text-gray-400" data-feather="info" stroke-width="1.75"></i>
                                    <span class="ml-3 text-base font-medium text-gray-700">
                                        Tentang
                                    </span>
                                </a>
                            </nav>
                        </div>
                    </div>
                    <div class="py-6 px-5 space-y-6">
                        <?php if ($this->session->userdata('status') != "login") { ?>
                            <a href="<?= site_url('auth_masyarakat/registration') ?>" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Daftar
                            </a>
                            <p class="mt-6 text-center text-base font-medium text-gray-500">
                                Sudah daftar?
                                <a href="<?= site_url('auth_masyarakat') ?>" class="text-indigo-600 hover:text-indigo-500">
                                    Masuk
                                </a>
                            </p>
                        <?php } else if ($this->session->userdata('status') == "login") { ?>
                            <div class="md:hidden" id="mobile-menu">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="">
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-base font-medium leading-none text-gray-600 mb-1"><?= $user['nama'] ?></div>
                                        <div class="text-sm font-medium leading-none text-gray-400"><?= $user['username'] ?></div>
                                    </div>
                                    <button class="ml-auto bg-transparent flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-500 focus:ring-white">
                                        <i class="h6 w-6" data-feather="bell" stroke-width="1.75"></i>
                                    </button>
                                </div>
                                <div class="mt-6 grid gap-y-6">
                                    <a href="" class="disabled block -m-3 px-3 py-2 text-indigo-600 flex rounded-md font-medium hover:bg-gray-50">
                                        Laporan Saya
                                    </a>
                                    <a href="<?= site_url('auth_masyarakat/logout') ?>" class="block -m-3 px-3 py-2 flex rounded-md font-medium hover:bg-gray-50">
                                        Keluar
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
    </section>
    <section class="w-full mt-8 px-6 mb-12 antialiased bg-white select-none">
        <div class="mx-auto max-w-7xl px-0 md:px-0 lg:px-6">
            <div class="flex flex-col md:flex-row md:w-1/6 text-center mb-3 md:-mb-12 lg:-mb-12">
                <a href="<?= site_url('laporan_saya') ?>" class="py-3 px-5 rounded-md">
                    <i class="inline h-4 w-4 text-gray-700 mb-1" data-feather="arrow-left" stroke-width="2"></i>
                    Kembali
                </a>
            </div>
            <?php
            foreach ($laporan as $l) :
                $created_time = date_create($l->date_created);
                // var_dump($created_time);
                $now_time = date_create();
                $diff_time = date_diff($created_time, $now_time);
                $duration = $diff_time->h . " jam " . $diff_time->i . " menit yang lalu";

            ?>
                <div class="flex flex-col md:flex-row md:w-4/6 mx-auto border border-gray-200 p-6 rounded">
                    <div class="w-full md:w-1/12">
                        <img class="h-9 w-9 rounded-full mb-3 md:mb-0 lg:mb-0" src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="">
                    </div>
                    <div class="w-full md:w-12/12">
                        <div class="flex justify-between">
                            <div>
                                <div class="text-base font-bold leading-none text-gray-700 mb-2"><?= $l->pengaju ?></div>
                                <div class="text-xs font-medium leading-none text-gray-400"><?= $duration ?></div>
                            </div>
                            <div class="">
                                <?php if ($l->tipe_laporan == 'Pengaduan') { ?>
                                    <div class="text-sm font-semibold text-purple-800 bg-purple-100 py-1 px-2 rounded-md">Pengaduan</div>
                                <?php } else if ($l->tipe_laporan == 'Aspirasi') { ?>
                                    <div class="text-sm font-semibold text-blue-800 bg-blue-100 py-1 px-2 rounded-md">Aspirasi</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a class="text-xl text-gray-700 font-extrabold">
                                <?= $l->judul_laporan ?>
                            </a>
                        </div>
                        <div class="text-sm mt-5 leading-relaxed truncation text-truncate">
                            <p class=""><?= $l->isi_laporan ?></p>
                        </div>
                        <div class="mt-5 mb-8">
                            <div class="inline text-xs font-medium leading-none text-gray-400 uppercase">
                                <i class="inline mb-1" data-feather="send" stroke-width="2" width="13px"></i>
                                <?= $l->tujuan_instansi ?>
                            </div>
                            <span class="mx-1 text-gray-400">|</span>
                            <div class="inline text-xs font-medium leading-none text-gray-400 uppercase">
                                <i class="inline mb-1" data-feather="bookmark" stroke-width="2" width="13px"></i>
                                <?= $l->kategori_laporan ?>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a id="show-form-tanggapan" class="text-xs font-medium cursor-pointer mr-5">
                                <i class="inline h-4 w-4 text-indigo-500 mb-1" data-feather="message-square" stroke-width="2"></i>
                                Lihat Tanggapan
                            </a>
                            <a id="show-hapusLaporan-modal<?= $l->id ?>" class="text-xs font-medium cursor-pointer mr-5">
                                <i class="inline h-4 w-4 text-red-500 mb-1" data-feather="trash-2" stroke-width="2"></i>
                                Hapus Laporan
                            </a>
                        </div>
                        <div class="form-tanggapan mt-5 <?= $row_tanggapan == 0 ? "hidden" : ""; ?>">
                            <div class="w-full py-5 text-md border-t border-gray-200 rounded-md">
                                <?php if ($row_tanggapan != 0) { ?>
                                    <?php
                                    foreach ($tanggapan as $t) :
                                        $created_time = date_create($t->date_created);
                                        $now_time = date_create();
                                        $diff_time = date_diff($created_time, $now_time);
                                        $duration = $diff_time->h . " jam " . $diff_time->i . " menit yang lalu";
                                    ?>
                                        <div class="flex flex-col md:flex-row mb-6">
                                            <div class="w-full md:w-1/12 mb-3 <?= $t->pemberi_tanggapan != $this->session->userdata('username') ? "hidden" : ""; ?>">
                                            </div>
                                            <div class="w-full md:w-1/12 mb-3">
                                                <img class="h-9 w-9 rounded-full hidden lg:block md:block" src="<?= $t->pemberi_tanggapan != $this->session->userdata('username') ? "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" : "https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" ?>" alt="">
                                            </div>
                                            <div class="w-full md:w-12/12">
                                                <div class="text-base font-bold leading-none text-gray-700 mb-2"><?= $t->pemberi_tanggapan == $this->session->userdata('username') ? "Saya" : "$t->pemberi_tanggapan"; ?></div>
                                                <div class="text-xs font-medium leading-none text-gray-400"><?= $duration ?></div>
                                                <div class="mt-3">
                                                    <?= $t->isi_tanggapan; ?>
                                                </div>
                                                <div class="<?= $t->pemberi_tanggapan == $this->session->userdata('username') ? "hidden" : ""; ?>">
                                                    <div class="mt-4">
                                                        <a id="show-form-balasTanggapan<?= $t->id ?>" class="text-xs font-medium cursor-pointer mr-5">
                                                            <i class="inline h-4 w-4 text-indigo-500 mb-1" data-feather="corner-up-right" stroke-width="2"></i>
                                                            Balas Tanggapan
                                                        </a>
                                                    </div>
                                                    <div class="form-balasTanggapan<?= $t->id ?> hidden mt-3">
                                                        <form class="m-0" action="<?= base_url('laporan_saya/balasTanggapan') ?>" method="post">
                                                            <textarea name="tanggapan" id="tanggapan" placeholder="Ketik balasan anda disini" cols="20" rows="6" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full text-md border border-gray-200 rounded-md"></textarea>
                                                            <input type="hidden" name="idTanggapan" value="<?= $l->id ?>">
                                                            <button type="submit" class="float-right text-center mt-3 text-sm inline-flex items-center py-3 px-5 tracking-wider font-medium text-white transition duration-150 ease-in-out bg-transparent bg-indigo-600 border border-transparent md:w-auto hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 rounded-md">
                                                                Kirim
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            $('#show-form-balasTanggapan<?= $t->id ?>').click(function() {
                                                $(".form-balasTanggapan<?= $t->id ?>").slideToggle("fast", function() {});
                                            });
                                        </script>

                                    <?php
                                    endforeach ?>
                                <?php } else if ($row_tanggapan == 0) { ?>
                                    <div class="d-flex items-center text-center">
                                        <h3 class="text-yellow-400 font-semibold">
                                            Tidak Ada Tanggapan
                                        </h3>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Modal Hapus -->
                        <div class="fixed z-50 inset-0 lg:-inset-40 md:-inset-80 hidden" id="hapusLaporan-modal<?= $l->id ?>">
                            <div class="min-h-screen flex items-center px-4 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                <div class="inline-block bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                    <div class="flex justify-between border-b border-gray-200 px-4 py-4 sm:px-6">
                                        <div class="mt-2">
                                            <h3 class="lg:text-xl md:text-xl text-xl font-semibold text-gray-900 capitalize">
                                                hapus laporan anda
                                            </h3>
                                        </div>
                                        <div class="">
                                            <button type="button" class="w-full inline-flex justify-center rounded-md px-1 py-1 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" id="hidden-hapusLaporan-modal<?= $l->id ?>">
                                                <i class="mx-auto h-8 w-8 text-gray-900" data-feather="x" stroke-width="0.75"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bg-white px-6">
                                        <div class="my-5">
                                            <span class="block font-semibold text-gray-700">
                                                Apakah anda yakin untuk menghapus laporan?
                                            </span>
                                        </div>
                                    </div>
                                    <form class="m-0" action="<?= base_url('laporan_saya/delete') ?>" method="POST">
                                        <div class="grid justify-items-stretch border-t border-gray-200 px-4 py-4 sm:px-6">
                                            <input type="hidden" name="idDelete" value="<?= $l->id ?>">
                                            <button type="submit" class="inline-block justify-self-end py-2 px-4 font-medium text-center text-white focus:outline-none transition duration-150 ease-in-out bg-red-600 hover:bg-red-500 rounded-md">Yakin</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $("#show-hapusLaporan-modal<?= $l->id ?>").click(function() {
                        $("#hapusLaporan-modal<?= $l->id ?>").fadeIn();
                    });
                    $("#hidden-hapusLaporan-modal<?= $l->id ?>").click(function() {
                        $("#hapusLaporan-modal<?= $l->id ?>").fadeOut();
                    });
                </script>

            <?php
            endforeach;
            ?>
        </div>

    </section>

    <section class="bg-gray-50">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-indigo-600">
                        Beranda
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-indigo-600">
                        Tentang
                    </a>
                </div>
            </nav>
            <p class="mt-8 text-base leading-6 text-center text-gray-400">
                © 2021 Pemkot Depok. Hak cipta dilindungi Undang-Undang.
            </p>
        </div>
    </section>
</body>

<script src="<?php echo base_url() . 'assets/js/masyarakat/custom-file-input.js' ?>"></script>

<script type="text/javascript">
    let alert_success = '<?= $this->session->flashdata('message-success', TRUE); ?>';

    if (alert_success != '') {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    }

    $('#show-form-tanggapan').click(function() {
        $(".form-tanggapan").slideToggle("fast", function() {});
    });
</script>

</html>