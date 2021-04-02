<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $page ?></h1>
    <div id="snackbar">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body" id="card-body">
                <div class="table-responsive" id="karyawan-table">
                    <table class="table table-bordered text-center datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengaju</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Judul Laporan</th>
                                <th>Tujuan Instansi</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($laporan as $l) :
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $l->pengaju ?></td>
                                    <td><?= $l->tgl_pengajuan ?></td>
                                    <td><?= $l->judul_laporan ?></td>
                                    <td><?= $l->tujuan_instansi ?></td>
                                    <td>
                                        <?php if ($l->status == '0') { ?>
                                            <span class="badge badge-warning py-1">
                                                Menunggu
                                            </span>
                                        <?php } else if ($l->status == 'Proses') { ?>
                                            <span class="badge badge-info py-1">
                                                Proses
                                            </span>
                                        <?php } else if ($l->status == 'Selesai') { ?>
                                            <span class="badge badge-success py-1">
                                                Selesai
                                            </span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('laporan/pengaduan/detail/' . $l->id) ?>" class="btn btn-success btn-sm">
                                            <i class="fas fa-search-plus" aria-hidden="true"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusLaporanModal<?= $l->id ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusLaporanModal<?= $l->id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Laporan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="m-0">Apakah anda yakin untuk menghapus laporan dari <?= $l->pengaju ?> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('laporan/pengaduan/delete') ?>" method="post">
                                                    <input type="hidden" name="idDelete" value="<?= $l->id ?>">
                                                    <button type="submit" class="btn btn-danger">Yakin</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".datatable").DataTable();
</script>