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
            <div class="card-header py-3">
                <button class="btn btn-sm" data-toggle="modal" data-target="#tambahKategoriLaporanModal" data-backdrop="static">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah
                    </h5>
                </button>

                <!-- Modal Tambah -->
                <div class="modal fade bd-example-modal-lg" id="tambahKategoriLaporanModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Kategori Laporan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('laporan/kategori_laporan/create') ?>" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 form-group mt-2">
                                            <span>Kategori Laporan</span>
                                            <input type="text" name="add_kategori_laporan" class="form-control mt-2" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" id="card-body">
                <div class="table-responsive" id="karyawan-table">
                    <table class="table table-bordered text-center datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Laporan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($kategori_laporan as $k) :
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $k->kategori_laporan ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ubahKategoriLaporanModal<?= $k->id ?>" data-backdrop="static">
                                            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusKategoriLaporanModal<?= $k->id ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Ubah -->
                                <div class="modal fade bd-example-modal-lg" id="ubahKategoriLaporanModal<?= $k->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Kategori Laporan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('laporan/kategori_laporan/update') ?>" method="post">
                                                <div class="modal-body">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-sm-12 form-group mt-2">
                                                                <span>Kategori Laporan</span>
                                                                <input type="text" name="update_kategori_laporan" class="form-control mt-2" value="<?= $k->kategori_laporan ?>" required>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="idUpdate" value="<?= $k->id ?>">
                                                    <a href="" class="btn btn-secondary">Batal</a>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusKategoriLaporanModal<?= $k->id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Kategori Laporan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="m-0">Apakah anda yakin untuk menghapus <?= $k->kategori_laporan ?> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('laporan/kategori_laporan/delete') ?>" method="post">
                                                    <input type="hidden" name="idDelete" value="<?= $k->id ?>">
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