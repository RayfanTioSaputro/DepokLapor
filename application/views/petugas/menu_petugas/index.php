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
                <button class="btn btn-sm" data-toggle="modal" data-target="#tambahPetugasModal" data-backdrop="static">
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah
                    </h5>
                </button>

                <!-- Modal Tambah -->
                <div class="modal fade bd-example-modal-lg" id="tambahPetugasModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Petugas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('petugas/create') ?>" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-6 form-group mt-2">
                                            <span>Nama Lengkap</span>
                                            <input type="text" name="add_nama" class="form-control mt-2" value="" pattern=".{3,30}" title="3 sampai 30 karakter" required>
                                        </div>
                                        <div class="col-sm-6 form-group mt-2">
                                            <span>No. Telpon</span>
                                            <input type="telp" name="add_telp" class="form-control mt-2" value="" pattern=".{8,13}" title="8 sampai 13 karakter" required>
                                        </div>
                                        <div class="col-sm-6 form-group mt-2">
                                            <span>Email</span>
                                            <input type="email" name="add_email" class="form-control mt-2" value="" pattern=".{1,45}" title="1 sampai 30 karakter" required>
                                        </div>
                                        <div class="col-sm-6 form-group mt-2">
                                            <span>Username</span>
                                            <input type="text" name="add_username" class="form-control mt-2" value="" pattern=".{5,25}" title="5 sampai 25 karakter" required>
                                        </div>
                                        <div class="col-sm-6 form-group mt-2">
                                            <span>Password</span>
                                            <input type="password" name="add_password" class="form-control mt-2" value="" pattern=".{5,255}" title="5 sampai 20 karakter" required>
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
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($petugas as $p) :
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $p->nama ?></td>
                                    <td><?= $p->email ?></td>
                                    <td><?= $p->level ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailPetugasModal<?= $p->id ?>" data-backdrop="static">
                                            <i class="fas fa-search-plus" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ubahPetugasModal<?= $p->id ?>" data-backdrop="static">
                                            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusPetugasModal<?= $p->id ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Detail -->
                                <div class="modal fade bd-example-modal-lg" id="detailPetugasModal<?= $p->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Petugas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <fieldset disabled>
                                                    <div class="row">
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>Nama Lengkap</span>
                                                            <input type="text" name="detail_nama" class="form-control mt-2" value="<?= $p->nama ?>">
                                                        </div>
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>No. Telpon</span>
                                                            <input type="telp" name="detail_telp" class="form-control mt-2" value="<?= $p->telp ?>" autocomplete="off">
                                                        </div>
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>Email</span>
                                                            <input type="email" name="detail_email" class="form-control mt-2" value="<?= $p->email ?>">
                                                        </div>
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>Username</span>
                                                            <input type="text" name="detail_username" class="form-control mt-2" value="<?= $p->username ?>">
                                                        </div>
                                                        <div class="col-sm-6 form-group mt-2">
                                                            <span>Level</span>
                                                            <input type="text" name="detail_level" class="form-control mt-2" value="<?= $p->level ?>">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Ubah -->
                                <div class="modal fade bd-example-modal-lg" id="ubahPetugasModal<?= $p->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Petugas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('petugas/update') ?>" method="post">
                                                <div class="modal-body">
                                                    <fieldset>
                                                        <div class="row">
                                                            <input type="hidden" name="idAddModal" value="">
                                                            <div class="col-sm-6 form-group mt-2">
                                                                <span>Nama Lengkap</span>
                                                                <input type="text" name="update_nama" class="form-control mt-2" value="<?= $p->nama ?>" pattern=".{3,30}" title="3 sampai 30 karakter" required>
                                                            </div>
                                                            <div class="col-sm-6 form-group mt-2">
                                                                <span>No. Telpon</span>
                                                                <input type="telp" name="update_telp" class="form-control mt-2" value="<?= $p->telp ?>" pattern=".{3,30}" title="8 sampai 13 karakter" required>
                                                            </div>
                                                            <div class="col-sm-6 form-group mt-2">
                                                                <span>Email</span>
                                                                <input type="email" name="update_email" class="form-control mt-2" value="<?= $p->email ?>" pattern=".{3,30}" title="1 sampai 30 karakter" required>
                                                            </div>
                                                            <div class="col-sm-6 form-group mt-2">
                                                                <span>Username</span>
                                                                <input type="text" name="update_username" class="form-control mt-2" value="<?= $p->username ?>" pattern=".{3,30}" title="5 sampai 25 karakter" required>
                                                            </div>
                                                            <div class="col-sm-6 form-group mt-2">
                                                                <span>Password</span>
                                                                <input type="password" name="update_password" class="form-control mt-2" value="<?= $p->password ?>" pattern=".{3,30}" title="5 sampai 20 karakter" required>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="idUpdate" value="<?= $p->id ?>">
                                                    <a href="" class="btn btn-secondary">Batal</a>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusPetugasModal<?= $p->id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Petugas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="m-0">Apakah anda yakin untuk menghapus <?= $p->nama ?> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('petugas/delete') ?>" method="post">
                                                    <input type="hidden" name="idDelete" value="<?= $p->id ?>">
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