<?= $this->extend('templates/penulis/template') ?>
<?= $this->section('contentpenulis') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Halaman Change Password (Penulis)</h1>
            <div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>"
                 data-title="<?= session()->getFlashdata('title'); ?>"
                 data-icon="<?= session()->getFlashdata('icon'); ?>">
            </div>
            <form action="/penulis/updatepassword/<?= $penulis['idpenulis']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= ($validation->hasError('password')) ?
                            'is-invalid' : ''; ?>" name="password" <?= ($validation->hasError('password')) ?
                            'autofocus' : ''; ?> value="<?= old('password') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newpassword" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= ($validation->hasError('newpassword')) ?
                            'is-invalid' : ''; ?>" name="newpassword" <?= ($validation->hasError('newpassword')) ?
                            'autofocus' : ''; ?> value="<?= old('newpassword') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('newpassword'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmpassword" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= ($validation->hasError('confirmpassword')) ?
                            'is-invalid' : ''; ?>" name="confirmpassword" <?= ($validation->hasError('confirmpassword')) ?
                            'autofocus' : ''; ?> value="<?= old('confirmpassword') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('confirmpassword'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Sandi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>