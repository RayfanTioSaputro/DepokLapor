<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item">
                <a href="<?= site_url('petugas') ?>" class="inline h3 mb-0 text-primary">
                    <?= $page ?>
                </a>
            </li>
            <li class="breadcrumb-item mt-2 active" aria-current="page">
                Tambah Petugas
            </li>
        </ol>
    </nav>
    <div id="snackbar">
        <?= $this->session->flashdata('message'); ?>
    </div>
</div>

<!-- Form input -->
<form action="<?= base_url('petugas/add/create') ?>" method="post">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card mb-4 shadow">
                <!-- Card body -->
                <div class="card-body pt-3">
                    <div class="row">
                        <input type="hidden" name="idModal">
                        <div class="col-sm-6 form-group mt-2">
                            <span>Nama Lengkap</span>
                            <input type="text" id="nama" name="nama" class="form-control mt-2" value="<?= set_value('nama') ?>" required>
                            <?= form_error('nama', '<small class="text-danger">', '</small>');
                            // var_dump(form_error('nama', '<small class="text-danger">', '</small>'));
                            ?>
                        </div>
                        <div class="col-sm-6 form-group mt-2">
                            <span>No. Telpon</span>
                            <input type="telp" id="telp" name="telp" class="form-control mt-2" value="<?= set_value('telp') ?>" required>
                            <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6 form-group mt-2">
                            <span>Email</span>
                            <input type="email" id="email" name="email" class="form-control mt-2" value="<?= set_value('email') ?>" required>
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6 form-group mt-2">
                            <span>Username</span>
                            <input type="text" id="username" name="username" class="form-control mt-2" value="<?= set_value('username') ?>" required>
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6 form-group mt-2">
                            <span>Password</span>
                            <input type="password" id="password" name="password" class="form-control mt-2" value="<?= set_value('password') ?>" required>
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <!-- Card footer -->
                <div class="card-footer text-right">
                    <a href="<?= site_url('petugas') ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>