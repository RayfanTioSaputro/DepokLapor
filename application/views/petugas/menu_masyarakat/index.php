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
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>No. Telpon</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($masyarakat as $m) :
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $m->nik ?></td>
                                    <td><?= $m->nama ?></td>
                                    <td><?= $m->telp ?></td>
                                    <td><?= $m->email ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailMasyarakatModal<?= $m->id ?>" data-backdrop="static">
                                            <i class="fas fa-search-plus" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusMasyarakatModal<?= $m->id ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Detail -->
                                <div class="modal fade bd-example-modal-lg" id="detailMasyarakatModal<?= $m->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Masyarakat</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <fieldset disabled>
                                                    <div class="row">
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>NIK</span>
                                                            <input type="text" name="detail_nik" class="form-control mt-2" value="<?= $m->nik ?>">
                                                        </div>
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>Nama Lengkap</span>
                                                            <input type="text" name="detail_nama" class="form-control mt-2" value="<?= $m->nama ?>">
                                                        </div>
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>No. Telpon</span>
                                                            <input type="telp" name="detail_telp" class="form-control mt-2" value="<?= $m->telp ?>">
                                                        </div>
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>Email</span>
                                                            <input type="email" name="detail_email" class="form-control mt-2" value="<?= $m->email ?>">
                                                        </div>
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>Username</span>
                                                            <input type="text" name="detail_username" class="form-control mt-2" value="<?= $m->username ?>">
                                                        </div>
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>Status Akun</span>
                                                            <input type="text" name="detail_username" class="form-control <?= $m->is_active == 0 ? "text-danger" : "text-success"; ?> mt-2" value="<?= $m->is_active == 0 ? "Belum teraktivasi" : "Sudah teraktivasi"; ?>">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusMasyarakatModal<?= $m->id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Masyarakat</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="m-0">Apakah anda yakin untuk menghapus <?= $m->nama ?> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('masyarakat/delete') ?>" method="post">
                                                    <input type="hidden" name="idDelete" value="<?= $m->id ?>">
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