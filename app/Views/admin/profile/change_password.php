<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>" data-title="<?= session()->getFlashdata('title'); ?>" data-icon="<?= session()->getFlashdata('icon'); ?>">
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-header">
                            <div class="d-flex justify-content-center">
                                <h1 class="h4 text-gray-600">Change Password (Admin)
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg col-sm col-md">
                                    <div class="p-lg-5 p-5">
                                        <form action="/admin/updatepassword/<?= $admin['idadmin']; ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-5 col-form-label">Password Lama</label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control <?= ($validation->hasError('password')) ?
                                                                                                    'is-invalid' : ''; ?>" name="password" <?= ($validation->hasError('password')) ?
                                                                                                                                                'autofocus' : ''; ?> value="<?= old('password') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('password'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newpassword" class="col-sm-5 col-form-label">Password Baru</label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control <?= ($validation->hasError('newpassword')) ?
                                                                                                    'is-invalid' : ''; ?>" name="newpassword" <?= ($validation->hasError('newpassword')) ?
                                                                                                                                                    'autofocus' : ''; ?> value="<?= old('newpassword') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('newpassword'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="confirmpassword" class="col-sm-5 col-form-label">Konfirmasi Password</label>
                                                <div class="col-sm-7">
                                                    <input type="password" class="form-control <?= ($validation->hasError('confirmpassword')) ?
                                                                                                    'is-invalid' : ''; ?>" name="confirmpassword" <?= ($validation->hasError('confirmpassword')) ?
                                                                                                                                                        'autofocus' : ''; ?> value="<?= old('confirmpassword') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('confirmpassword'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-auto mr-auto"></div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-primary">Ubah Sandi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>