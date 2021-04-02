<?php
foreach ($laporan as $l) :
?>
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('laporan/pengaduan') ?>" class="inline h3 mb-0 text-primary">
                        Laporan Pengaduan
                    </a>
                </li>
                <li class="breadcrumb-item mt-2" aria-current="page">
                    <?= $page ?>
                </li>
                <li class="breadcrumb-item mt-2 active" aria-current="page">
                    <?= $l->judul_laporan ?>
                </li>
            </ol>
        </nav>
        <div id="snackbar">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-10">
            <div class="card mb-4 shadow">
                <div class="card-header d-flex align-items-center justify-content-between mb-3">
                    <a href="<?= site_url('laporan/pengaduan/detail/' . $l->id) ?>">
                        <i class="fas fa-fw fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
                <!-- Card body -->
                <div class="card-body pt-3 px-4">
                    <fieldset>
                        <form class="m-0" action="<?= base_url('laporan/pengaduan/tanggapan') ?>" method="post">
                            <div class="form-group">
                                <span>Tanggapan</span>
                                <textarea class="form-control mt-2" name="tanggapan" id="tanggapan" cols="30" rows="6"></textarea>
                            </div>
                            <input type="hidden" name="idTanggapan" value="<?= $l->id ?>">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </fieldset>
                    <div class="border-top my-4">
                        <?php
                        foreach ($tanggapan as $t) :
                            $created_time = date_create($t->date_created);
                            $now_time = date_create();
                            $diff_time = date_diff($created_time, $now_time);
                            $duration = $diff_time->h . " jam " . $diff_time->i . " menit yang lalu";
                        ?>
                            <div class="row mt-4 px-2 <?= $t->role_pemberi_tanggapan != "Petugas" ? "ml-lg-5" : ""; ?>">
                                <div class="col-md-1">
                                    <img class="rounded-circle" src="<?= $t->role_pemberi_tanggapan != "Petugas" ? "https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" : "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" ?>" style="width: 2.3rem; height: 2.3rem">
                                </div>
                                <div class="col-md-11">
                                    <div class="ml-md-3 ml-lg-n3 mt-n1 mt-lg-n1">
                                        <div class="text-dark font-weight-bold"><?= $t->pemberi_tanggapan == $this->session->userdata('username-2') ? "Saya" : "$t->pemberi_tanggapan"; ?></div>
                                        <div class="text-secondary" style="font-size: 13px;"><?= $duration ?></div>
                                    </div>
                                    <div class="ml-md-2 ml-lg-n3 mt-2">
                                        <?= $t->isi_tanggapan; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endforeach
?>