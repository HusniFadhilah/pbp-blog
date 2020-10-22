<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Form Edit Profile</h2>
            <div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>"
                 data-title="<?= session()->getFlashdata('title'); ?>"
                 data-icon="<?= session()->getFlashdata('icon'); ?>">
            </div>
            <form action="/admin/update/<?= $admin['idadmin']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ?
                            'is-invalid' : ''; ?>" name="nama" autofocus value="<?= old('nama') ?? $admin['nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control <?= ($validation->hasError('email')) ?
                            'is-invalid' : ''; ?>" name="email" autofocus value="<?= old('email') ?? $admin['email'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= ($validation->hasError('password')) ?
                            'is-invalid' : ''; ?>" name="password" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>