<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $this->load->view('template/header') ?>

    <script>
        (function(e, t, n) {
            var r = e.querySelectorAll("html")[0];
            r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
        })(document, window, 0);
    </script>

    <title>Beranda</title>
</head>

<body>
    <section class="w-full px-6 antialiased bg-white select-none">
        <nav class="relative lg:z-0 z-50 h-24" x-data="{ showMenu: false }">
            <div class="container relative flex flex-wrap items-center justify-between h-24 mx-auto font-medium border-b border-gray-200 lg:justify-center sm:px-4 md:px-2">
                <a href="#_" class="w-1/4 py-4 pr-4 md:py-0">
                    <span class="text-xl font-black leading-none text-gray-800 select-none logo">DepokLapor<span class="text-indigo-600">!</span></span>
                </a>
                <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:w-3/4 md:absolute lg:text-base md:h-auto md:bg-transparent md:p-0 md:relative md:flex" :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
                    <div class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg select-none md:bg-transparent md:rounded-none md:relative md:flex md:flex-row md:overflow-auto">
                        <a href="#_" class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 select-none md:hidden">DepokLapor<span class="text-indigo-600">.</span></a>
                        <div class="flex flex-col items-start justify-center w-full text-center md:w-2/3 md:mt-0 md:flex-row md:items-center">
                            <a href="#" class="inline-block w-full px-6 py-2 mx-0 font-medium text-left text-indigo-600 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Beranda</a>
                            <a href="#" class="inline-block w-full px-6 py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-indigo-600 lg:mx-3 md:text-center">Tentang</a>
                        </div>
                        <div class="border-t my-3"></div>
                        <?php if ($this->session->userdata('status') != "login") { ?>
                            <div class="flex flex-col items-start justify-end w-full md:items-center md:w-1/3 md:flex-row md:py-0">
                                <a href="<?= site_url('auth') ?>" class="focus:outline-none w-full px-6 py-2 mr-0 text-gray-700 md:px-0 lg:pl-2 md:mr-4 lg:mr-5 md:w-auto cursor-pointer" id="show-login-modal">Masuk</a>
                                <a href="<?= site_url('auth/registration') ?>" class="inline-flex items-center w-full px-6 py-3 md:px-3 md:w-auto lg:px-5 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-indigo-600 hover:bg-indigo-500 focus:outline-none md:rounded-md lg:ronded-md">Daftar</a>
                            </div>
                        <?php } else if ($this->session->userdata('status') == "login") { ?>
                            <div class="flex flex-col items-start justify-end w-full md:items-center md:w-1/3 md:flex-row md:py-0">
                                <a href="<?= site_url('auth/logout') ?>"><?= $user['nama'] ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div @click=" showMenu=!showMenu" class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>
        </nav>
    </section>

    <section class="w-full px-6 mb-12 antialiased bg-white select-none">
        <div class="mx-auto max-w-7xl">
            <!-- <div class="fixed z-50 inset-0 overflow-y-auto hidden" id="login-modal">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="flex justify-between bg-gray-50 px-4 py-6 sm:px-6">
                            <div class="invisible">
                                <h3 class=" lg:text-xl md:text-xl text-xl font-medium text-gray-900">
                                    Masuk
                                </h3>
                            </div>
                            <div class="mt-2">
                                <h3 class="lg:text-xl md:text-xl text-xl font-medium text-gray-900">
                                    Masuk
                                </h3>
                            </div>
                            <div class="">
                                <button type="button" class="w-full inline-flex justify-center rounded-md px-1 py-1 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" id="hidden-login-modal">
                                    <i class="mx-auto h-8 w-8 text-gray-900" data-feather="x" stroke-width="0.75"></i>
                                </button>
                            </div>
                        </div>
                        <div class="bg-white px-6 py-6">
                            <div class="grid grid-rows-2 gap-y-4">
                                <div>
                                    <span class="block text-lg font-medium text-gray-700 mb-2">Username</span>
                                    <input type="text" name="username" id="judul_laporan" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md">
                                </div>
                                <div>
                                    <span class="block text-lg font-medium text-gray-700 mb-2">Password</span>
                                    <input type="password" name="password" id="judul_laporan" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" autocomplete="off">
                                </div>
                                <div class="mt-1 mb-2">
                                    <button type="submit" class="inline-block w-full py-3 text-lg font-medium text-center text-white focus:outline-none transition duration-150 ease-in-out bg-indigo-600 hover:bg-indigo-500 rounded-md">Masuk</button>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-6 sm:px-6 text-center">
                            <p class="mb-2 text-md text-gray-600">
                                Anda belum punya akun?
                            </p>
                            <a href="<?= site_url('register') ?>" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="container max-w-lg py-24 mx-auto text-left md:max-w-none">
                <h1 class="text-5xl font-extrabold tracking-tight text-left text-gray-900 leading-tightest md:leading-20 md:text-center sm:leading-none md:text-4xl lg:text-5xl"><span class="inline md:block">Layanan Aspirasi & Pengaduan</span> <span class="relative mt-2 pb-4 text-transparent md:inline-block bg-clip-text bg-indigo-500">Online Rakyat Kota Depok</span></h1>
                <div class="mx-auto mt-5 text-gray-500 lg:mt-6 md:mt-2 md:max-w-lg md:text-center lg:text-xl">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</div>
                <div class="my-28 mx-auto sm:px-12 lg:px-20">
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

                <div class="flex flex-col items-center">
                    <div class="shadow-xl border w-full lg:w-8/12 md:w-8/12 rounded-lg overflow-hidden">
                        <div class="px-12 lg:px-20 md:px-32 lg:py-4 md:py-5 py-4 bg-indigo-500 text-center">
                            <h3 class="lg:text-2xl md:text-2xl text-xl font-medium text-white lg:px-40 lg:py-2">
                                Sampaikan Laporan Anda
                            </h3>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
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

                            <div class="border border-gray-100 my-6"></div>

                            <form class="form_pengaduan" action="" method="POST" enctype='multipart/form-data'>
                                <div class="grid grid-rows-none gap-y-8">
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Judul Laporan</span>
                                        <input type="text" name="judul_laporan" id="judul_laporan" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" autocomplete="off">
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Isi Laporan</span>
                                        <textarea name="isi_laporan" id="isi_laporan" cols="20" rows="6" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full text-md border border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Tujuan Instansi</span>
                                        <select class="mt-1 relative w-full border border-gray-300 rounded-md p-3 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-md">
                                            <option>Silahkan pilih...</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                        </select>
                                    </div>
                                    <div class="grid lg:grid-cols-2 gap-4">
                                        <div>
                                            <span class="block text-lg font-medium text-gray-700 mb-2">Tanggal Kejadian</span>
                                            <input type="date" name="tanggal_kejadian" id="tanggal_kejadian" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" autocomplete="off">
                                        </div>
                                        <div>
                                            <span class="block text-lg font-medium text-gray-700 mb-2">Tempat Kejadian</span>
                                            <input type="text" name="tempat_kejadian" id="tempat_kejadian" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form_lampiran hidden">
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Lampiran</span>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
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
                            </form>
                            <form class="form_aspirasi hidden" action="" method="POST" enctype='multipart/form-data'>
                                <div class="grid grid-rows-none gap-y-8">
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Judul Laporan</span>
                                        <input type="text" name="judul_laporan" id="judul_laporan" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full border border-gray-300 text-md rounded-md" autocomplete="off">
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Isi Laporan</span>
                                        <textarea name="isi_laporan" id="isi_laporan" cols="20" rows="6" class="mt-1 p-3 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 w-full text-md border border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div>
                                        <span class="block text-lg font-medium text-gray-700 mb-2">Tujuan Instansi</span>
                                        <select class="mt-1 relative w-full border border-gray-300 rounded-md p-3 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-md">
                                            <option>Silahkan pilih...</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                        </select>
                                    </div>
                                    <div class="form_lampiran hidden">
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
                            </form>
                        </div>
                        <div class="px-4 py-6 sm:px-6 flex justify-between border-t bg-gray-50">
                            <div>
                                <button id="show_formLampiran" class="inline-flex w-full py-4 text-md font-medium leading-4 bg-transparent md:w-auto focus:outline-none rounded-md">
                                    <i class="mx-auto h-4 w-4 text-gray-900 mr-2" data-feather="paperclip" stroke-width="0.75"></i>
                                    Lampiran
                                </button>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex items-center w-full px-6 py-4 text-md font-medium leading-4 text-white transition duration-150 ease-in-out bg-transparent bg-indigo-600 border border-transparent md:px-3 md:w-auto lg:px-5 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 rounded-md">
                                    Laporkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-9/12 mx-auto py-6">
                <div class="flex">
                    <div class="w-1/5 px-2">
                        <div class="relative mb-2">
                            <div class="lg:w-16 lg:h-16 w-12 h-12 mx-auto bg-indigo-500 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-white w-full">
                                    <i class="mx-auto lg:h-6 lg:w-6 h-5 :w-5 text-white" data-feather="edit-3" stroke-width="2"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-xs text-center font-medium md:text-base">Tulis Laporan</div>
                        <p class="lg:block hidden mt-2 text-base leading-6 text-center text-gray-500">
                            Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap
                        </p>
                    </div>
                    <div class="w-1/5 px-2">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: 73.5%; top: 50%; transform: translate(-55%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="border-b border-gray-200"></div>
                                </div>
                            </div>
                            <div class="lg:w-16 lg:h-16 w-12 h-12 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="mx-auto lg:h-6 lg:w-6 h-5 :w-5 text-gray-600" data-feather="send" stroke-width="2"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-xs text-center font-medium md:text-base">Proses Verifikasi</div>
                        <p class="lg:block hidden mt-2 text-base leading-6 text-center text-gray-500">
                            Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang
                        </p>
                    </div>
                    <div class="w-1/5 px-2">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: 73.5%; top: 50%; transform: translate(-55%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="border-b border-gray-200"></div>
                                </div>
                            </div>
                            <div class="lg:w-16 lg:h-16 w-12 h-12 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="mx-auto lg:h-6 lg:w-6 h-5 :w-5 text-gray-600" data-feather="mail" stroke-width="2"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-xs text-center font-medium md:text-base">Proses Tindak Lanjut</div>
                        <p class="lg:block hidden mt-2 text-base leading-6 text-center text-gray-500">
                            Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda
                        </p>
                    </div>
                    <div class="w-1/5 px-2">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: 73.5%; top: 50%; transform: translate(-55%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="border-b border-gray-200"></div>
                                </div>
                            </div>
                            <div class="lg:w-16 lg:h-16 w-12 h-12 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="mx-auto lg:h-6 lg:w-6 h-5 :w-5 text-gray-600" data-feather="message-square" stroke-width="2"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-xs text-center font-medium md:text-base">Beri Tanggapan</div>
                        <p class="lg:block hidden mt-2 text-base leading-6 text-center text-gray-500">
                            Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari
                        </p>
                    </div>
                    <div class="w-1/5 px-2">
                        <div class="relative mb-2">
                            <div class="absolute flex align-center items-center align-middle content-center" style="width: 73.5%; top: 50%; transform: translate(-55%, -50%)">
                                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                    <div class="border-b border-gray-200"></div>
                                </div>
                            </div>
                            <div class="lg:w-16 lg:h-16 w-12 h-12 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-gray-600 w-full">
                                    <i class="mx-auto lg:h-7 lg:w-7 h-6 :w-6 text-gray-600" data-feather="check" stroke-width="2"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-xs text-center font-medium md:text-base">Selesai</div>
                        <p class="lg:block hidden mt-2 text-base leading-6 text-center text-gray-500">
                            Laporan Anda akan terus ditindaklanjuti hingga terselesaikan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Beranda
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Tentang
                    </a>
                </div>
            </nav>
            <!-- <div class="flex justify-center mt-8 space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Instagram</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">GitHub</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Dribbble</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div> -->
            <p class="mt-8 text-base leading-6 text-center text-gray-400">
                © 2021 Pemkot Depok. Hak cipta dilindungi Undang-Undang.
            </p>
        </div>
    </section>

    <script src="<?php echo base_url() . 'assets/js/custom-file-input.js' ?>"></script>
    <?php $this->load->view('template/footer') ?>

    <script type="text/javascript">
        feather.replace()

        $(".form-check input[type='radio']").on("change", function() {
            if ($("#tipe_pengaduan").is(':checked')) {
                $('.form_pengaduan').removeClass("hidden");
                $('.form_aspirasi').addClass("hidden");
            } else if ($("#tipe_aspirasi").is(':checked')) {
                $('.form_pengaduan').addClass("hidden");
                $('.form_aspirasi').removeClass("hidden");
            }
        });

        // $("#show-login-modal").click(function() {
        //     $("#login-modal").fadeIn();
        // });
        // $("#hidden-login-modal").click(function() {
        //     $("#login-modal").fadeOut();
        // });

        $("#show_formLampiran").click(function() {
            $(".form_lampiran").slideToggle("slow", function() {});
        });
    </script>
</body>

</html>