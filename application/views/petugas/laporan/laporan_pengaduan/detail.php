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
        <a href="<?= base_url('laporan/pengaduan/generatePDF') ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-n3">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Generate ke PDF
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-10">
            <div class="card mb-4 shadow">
                <!-- Card header -->
                <div class="card-header d-flex align-items-center justify-content-between mb-3">
                    <a href="<?= site_url('laporan/pengaduan') ?>">
                        <i class="fas fa-fw fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
                <!-- Card body -->
                <div class="card-body pt-3">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered text-left mt-1" cellspacing="0">
                            <tr>
                                <th>Pengaju</th>
                                <td><?= $l->pengaju ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengajuan</th>
                                <td><?= $l->tgl_pengajuan ?></td>
                            </tr>
                            <tr>
                                <th>Judul Laporan</th>
                                <td><?= $l->judul_laporan ?></td>
                            </tr>
                            <tr>
                                <th>Tujuan Instansi</th>
                                <td><?= $l->tujuan_instansi ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Kejadian</th>
                                <td><?= $l->tgl_kejadian ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Kejadian</th>
                                <td><?= $l->tempat_kejadian ?></td>
                            </tr>
                            <tr>
                                <th>Kategori Laporan</th>
                                <td><?= $l->kategori_laporan ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Isi Laporan</th>
                            </tr>
                            <tr>
                                <td colspan="2"><?= $l->isi_laporan ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer d-flex justify-content-end">
                    <a href="<?= base_url('laporan/pengaduan/beriTanggapan/' . $l->id) ?>" class="btn btn-primary mr-2">Beri Tanggapan</a>
                    <button class="btn btn-success" data-toggle="modal" data-target="#terimaLaporanModal" <?= $l->status == "0" ? "" : "disabled"; ?>>Terima</button>

                    <!-- Modal Terima -->
                    <div class="modal fade" id="terimaLaporanModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Terima Laporan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="m-0">Apakah anda yakin untuk menerima laporan dari <?= $l->pengaju ?> ?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="<?= base_url('laporan/pengaduan/acceptLaporan') ?>" method="post">
                                        <input type="hidden" name="idUpdate" value="<?= $l->id ?>">
                                        <button type="submit" class="btn btn-success">Yakin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endforeach
?>