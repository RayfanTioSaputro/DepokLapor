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

    <title><?= $page ?></title>
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
                        <a href="#_" class="w-1/4 py-4 pr-4 md:py-0">
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
                        <a href="#" class="inline-block w-full py-2 font-medium text-left text-indigo-600 md:w-auto md:text-center">
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
                                            <a href="<?= site_url('laporan_saya') ?>" class="block px-4 py-2 text-sm text-gray-700 font-medium hover:bg-gray-100" role="menuitem">Laporan Saya</a>
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
                                <a href="#_" class="w-1/4 py-4 pr-4 md:py-0">
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
                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                    <i class="flex-shrink-0 h-6 w-6 text-indigo-600" data-feather="home" stroke-width="1.75"></i>
                                    <span class="ml-3 text-base font-medium text-indigo-600">
                                        Beranda
                                    </span>
                                </a>
                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
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
                                    <a href="<?= site_url('laporan_saya') ?>" class="block -m-3 px-3 py-2 text-gray-700 flex rounded-md font-medium hover:bg-gray-50">
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
    <section class="w-full px-6 mb-12 antialiased bg-white select-none">
        <div class="mx-auto max-w-7xl">
            <div class="container max-w-lg py-20 mx-auto text-left md:max-w-none">
                <h1 class="text-5xl font-black tracking-tight text-left text-gray-900 leading-tightest md:leading-20 md:text-center sm:leading-none md:text-4xl lg:text-6xl"><span class="inline md:block">Layanan Aspirasi & Pengaduan</span> <span class="mt-2 pb-4 text-transparent md:inline-block bg-clip-text bg-indigo-500">Online Rakyat Kota Depok</span></h1>
                <div class="mx-auto mt-5 text-gray-500 lg:mt-6 md:mt-2 md:max-w-lg md:text-center lg:text-xl">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</div>
                <div class="lg:my-28 my-20 mx-auto sm:px-12 lg:px-20">
                    <div class="flex grid items-center justify-center grid-cols-12 gap-y-8 ml-8">
                        <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-4 xl:col-span-3">
                            <img src="https://www.lapor.go.id/themes/lapor/assets/images/3-footer.png" alt="Google" class="block object-contain h-14">
                        </div>
                        <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-4 xl:col-span-3">
                            <img src="https://www.lapor.go.id/themes/lapor/assets/images/2-footer.png" alt="Youtube" class="block object-contain h-16">
                        </div>
                        <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-4 xl:col-span-3">
                            <img src="https://www.lapor.go.id/themes/lapor/assets/images/ksp-footer.png" alt="Slack" class="block object-contain h-16">
                        </div>
                        <div class="flex items-center justify-center col-span-6 sm:col-span-4 md:col-span-12 xl:col-span-3">
                            <img src="https://www.depok.go.id/img/lambang.png" alt="Disney Plus" class="block object-contain h-14 lg:h-16">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="lg:mt-44 mt-32 lg:mb-24 mb-16">
                        <p class="text-xs font-bold text-left text-indigo-500 uppercase tracking-widest sm:mx-6 lg:mb-4 md:mb-2 sm:text-center sm:text-normal sm:font-bold">
                            Ingin menyampaikan pengaduan dan aspirasi?
                        </p>
                        <h3 class="text-2xl font-extrabold text-left text-gray-800 capitalize sm:mx-6 sm:text-3xl md:text-4xl lg:text-5xl sm:text-center sm:mx-0">
                            Sampaikan Laporan Anda
                        </h3>
                    </div>
                    <div class="w-full lg:w-8/12 md:w-8/12 mx-auto">
                        <div>
                            <span class="block text-lg font-medium text-gray-700 mb-3">Pilih Tipe Laporan</span>
                            <ul class="form-check grid lg:grid-cols-2 sm:grid-cols-2 gap-4 text-center">
                                <div>
                                    <input class="radio-select" type="radio" name="tipe_laporan" id="tipe_pengaduan">
                                    <label class="for-pengaduan w-full text-center py-3 text-md text-gray-700 rounded-md" for="tipe_pengaduan">
                                        Pengaduan
                                    </label>
                                </div>
                                <div>
                                    <input class="radio-select" type="radio" name="tipe_laporan" id="tipe_aspirasi">
                                    <label class="for-aspirasi w-full text-center py-3 text-md text-gray-700 rounded-md" for="tipe_aspirasi">
                                        Aspirasi
                                    </label>
                                </div>
                            </ul>
                        </div>
                        <div class="border border-gray-200 my-6"></div>
                        <fieldset <?= $this->session->userdata('status') != "login" ? "disabled" : ""; ?>>
                            <form class="form_pengaduan" action="<?= base_url('beranda/pengaduan') ?>" method="POST" enctype='multipart/form-data'>
                                <div class="grid grid-rows-none gap-y-8 mb-12">
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Judul Laporan</span>
                                        <input type="text" name="judul_laporan" id="judul_laporan" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" required autocomplete="off">
                                        <?= form_error('judul_laporan', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Isi Laporan</span>
                                        <textarea name="isi_laporan" id="isi_laporan" cols="20" rows="6" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full text-md border border-gray-300 rounded-md" required></textarea>
                                        <?= form_error('isi_laporan', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Tujuan Instansi</span>
                                        <select name="tujuan_instansi" class="mt-1 relative w-full border border-gray-300 rounded-md p-3 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-md" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;" required>
                                            <option value="">Silahkan pilih...</option>
                                            <?php
                                            foreach ($tujuan_instansi as $t) :
                                            ?>
                                                <option class="py-2" value="<?= $t->tujuan_instansi ?>"><?= $t->tujuan_instansi ?></option>
                                            <?php
                                            endforeach
                                            ?>
                                        </select>
                                        <?= form_error('tujuan_instansi', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                    </div>
                                    <div class="grid lg:grid-cols-2 gap-4">
                                        <div>
                                            <span class="block text-lg font-medium text-gray-700 mb-2">Tanggal Kejadian</span>
                                            <input type="date" name="tgl_kejadian" id="tanggal_kejadian" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" required autocomplete="off">
                                            <?= form_error('tgl_kejadian', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                        </div>
                                        <div>
                                            <span class="block text-lg font-medium text-gray-700 mb-2">Tempat Kejadian</span>
                                            <input type="text" name="tempat_kejadian" id="tempat_kejadian" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" required autocomplete="off">
                                            <?= form_error('tempat_kejadian', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Kategori Laporan</span>
                                        <select name="kategori_laporan" class="mt-1 relative w-full border border-gray-300 rounded-md p-3 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-md" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;" required>
                                            <option value="">Silahkan pilih...</option>
                                            <?php
                                            foreach ($kategori_laporan as $k) :
                                            ?>
                                                <option class="py-2" value="<?= $k->kategori_laporan ?>"><?= $k->kategori_laporan ?></option>
                                            <?php
                                            endforeach
                                            ?>
                                            <option class="py-2" value="Kategori Lainnya">Kategori Lainnya</option>
                                        </select>
                                        <?= form_error('kategori_laporan', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                    </div>
                                    <div class="form-lampiran-pengaduan hidden">
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Lampiran</span>
                                        <div class="mt-1 flex justify-center pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <i class="mx-auto h-12 w-12 text-gray-300" data-feather="file" stroke-width="0.75"></i>
                                                <div class="flex text-sm justify-center text-gray-600">
                                                    <input type="file" name="lampiran_pengaduan[]" id="lampiran_pengaduan" class="inputfile" data-multiple-caption="{count} file dipilih" multiple />
                                                    <label for="lampiran_pengaduan" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                        <span class="text-center">Upload Lampiran</span>
                                                    </label>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    Semua tipe file (max 10MB)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div>
                                        <label id="show-form-lampiran-pengaduan" class="inline-flex w-full py-4 text-md font-medium leading-4 bg-transparent md:w-auto focus:outline-none rounded-md cursor-pointer">
                                            <i class="mx-auto h-4 w-4 text-gray-900 mr-2" data-feather="paperclip" stroke-width="0.75"></i>
                                            Lampiran
                                        </label>
                                    </div>
                                    <div>
                                        <button type="submit" class="inline-flex items-center w-full px-6 py-4 text-md font-medium leading-4 text-white transition duration-150 ease-in-out bg-transparent bg-indigo-600 border border-transparent md:px-3 md:w-auto lg:px-5 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 rounded-md">
                                            Laporkan
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <form class="form_aspirasi hidden" action="<?= base_url('beranda/aspirasi') ?>" method="POST" enctype='multipart/form-data'>
                                <div class="grid grid-rows-none gap-y-8 mb-12">
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Judul Laporan</span>
                                        <input type="text" name="judul_laporan_aspirasi" id="judul_laporan_aspirasi" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" autocomplete="off">
                                        <?= form_error('judul_laporan_aspirasi', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Isi Laporan</span>
                                        <textarea name="isi_laporan_aspirasi" id="isi_laporan_aspirasi" cols="20" rows="6" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full text-md border border-gray-300 rounded-md"></textarea>
                                        <?= form_error('isi_laporan_aspirasi', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Tujuan Instansi</span>
                                        <select name="tujuan_instansi_aspirasi" class="mt-1 relative w-full border border-gray-300 rounded-md p-3 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-md" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;" required>
                                            <option value="">Silahkan pilih...</option>
                                            <?php
                                            foreach ($tujuan_instansi as $t) :
                                            ?>
                                                <option class="py-2" value="<?= $t->tujuan_instansi ?>"><?= $t->tujuan_instansi ?></option>
                                            <?php
                                            endforeach
                                            ?>
                                        </select>
                                        <?= form_error('tujuan_instansi_aspirasi', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Kategori Laporan</span>
                                        <select name="kategori_laporan_aspirasi" class="mt-1 relative w-full border border-gray-300 rounded-md p-3 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-md" onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;" required>
                                            <option value="">Silahkan pilih...</option>
                                            <?php
                                            foreach ($kategori_laporan as $k) :
                                            ?>
                                                <option class="py-2" value="<?= $k->kategori_laporan ?>"><?= $k->kategori_laporan ?></option>
                                            <?php
                                            endforeach
                                            ?>
                                            <option class="py-2" value="Kategori Lainnya">Kategori Lainnya</option>
                                        </select>
                                        <?= form_error('kategori_laporan_aspirasi', '<small class="text-red-500 font-medium">', '</small>'); ?>
                                    </div>
                                    <div class="form-lampiran-aspirasi hidden">
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Lampiran</span>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <i class="mx-auto h-12 w-12 text-gray-300" data-feather="file" stroke-width="0.75"></i>
                                                <div class="flex text-sm justify-center text-gray-600">
                                                    <input type="file" name="lampiran_aspirasi[]" id="lampiran_aspirasi" class="inputfile" data-multiple-caption="{count} file dipilih" multiple />
                                                    <label for="lampiran_aspirasi" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                        <span class="text-center">Upload Lampiran</span>
                                                    </label>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    Semua tipe file (max 10MB)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <label id="show-form-lampiran-aspirasi" class="inline-flex w-full py-4 text-md font-medium leading-4 bg-transparent md:w-auto focus:outline-none rounded-md cursor-pointer">
                                        <i class="mx-auto h-4 w-4 text-gray-900 mr-2" data-feather="paperclip" stroke-width="0.75"></i>
                                        Lampiran
                                    </label>
                                    <button type="submit" class="inline-flex items-center w-full px-6 py-4 text-md font-medium leading-4 text-white transition duration-150 ease-in-out bg-transparent bg-indigo-600 border border-transparent md:px-3 md:w-auto lg:px-5 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 rounded-md">
                                        Laporkan
                                    </button>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-16">
        <div>
            <iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.3968509097926!2d106.8468073265682!3d-6.4205474529984095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebb351a40d77%3A0x5bc8a8a112632acc!2sDongpong%20Book%20Store!5e0!3m2!1sid!2sid!4v1615802578076!5m2!1sid!2sid" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <section class="relative py-16 mb-16 bg-white min-w-screen animation-fade animation-delay">
        <div class="container px-0 px-8 mx-auto sm:px-12 xl:px-5">
            <div class="lg:mb-24 mb-16">
                <p class="text-xs font-bold text-left text-indigo-500 uppercase tracking-widest sm:mx-6 lg:mb-4 md:mb-2 sm:text-center sm:text-normal sm:font-bold">
                    Punya sebuah pertanyaan? Kami punya jawabannya.
                </p>
                <h3 class="mt-1 text-2xl font-extrabold text-left text-gray-800 capitalize sm:mx-6 sm:text-3xl md:text-4xl lg:text-5xl sm:text-center sm:mx-0">
                    Jawaban yang mungkin berguna
                </h3>
            </div>
            <div class="w-full px-6 py-6 mx-auto mt-10 bg-white border-2 border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 lg:w-5/6 xl:w-2/3">
                <h3 class="text-lg font-bold text-indigo-500 sm:text-xl md:text-2xl">How does it work?</h3>
                <p class="mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    Our platform works with your content to provides insights and metrics on how you can grow your business and scale your infastructure.
                </p>
            </div>
            <div class="w-full px-6 py-6 mx-auto mt-10 bg-white border-2 border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 lg:w-5/6 xl:w-2/3">
                <h3 class="text-lg font-bold text-indigo-500 sm:text-xl md:text-2xl">Do you offer team pricing?</h3>
                <p class="mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    Yes, we do! Team pricing is available for any plan. You can take advantage of 30% off for signing up for team pricing of 10 users or more.
                </p>
            </div>
            <div class="w-full px-6 py-6 mx-auto mt-10 bg-white border-2 border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 lg:w-5/6 xl:w-2/3">
                <h3 class="text-lg font-bold text-indigo-500 sm:text-xl md:text-2xl">How do I make changes and configure my site?</h3>
                <p class="mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    You can easily change your site settings inside of your site dashboard by clicking the top right menu and clicking the settings button.
                </p>
            </div>
            <div class="w-full px-6 py-6 mx-auto mt-10 bg-white border-2 border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 lg:w-5/6 xl:w-2/3">
                <h3 class="text-lg font-bold text-indigo-500 sm:text-xl md:text-2xl">How do I add a custom domain?</h3>
                <p class="mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                    You can easily change your site settings inside of your site dashboard by clicking the top right menu and clicking the settings button.
                </p>
            </div>
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
</script>

</html>