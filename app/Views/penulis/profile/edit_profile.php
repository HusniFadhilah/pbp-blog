<?= $this->extend('templates/penulis/template') ?>
<?= $this->section('contentpenulis') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="h3 mb-2 text-gray-800">Form Edit Profile Penulis</h2>
            <div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>"
                 data-title="<?= session()->getFlashdata('title'); ?>"
                 data-icon="<?= session()->getFlashdata('icon'); ?>">
            </div>
            <form action="/penulis/update/<?= $penulis['idpenulis']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ?
                            'is-invalid' : ''; ?>" name="nama" autofocus value="<?= old('nama') ?? $penulis['nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control <?= ($validation->hasError('email')) ?
                            'is-invalid' : ''; ?>" name="email" autofocus value="<?= old('email') ?? $penulis['email'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_telp" class="col-sm-2 col-form-label">No telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_telp')) ?
                            'is-invalid' : ''; ?>" name="no_telp" autofocus value="<?= old('no_telp') ?? $penulis['no_telp'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kota')) ?
                            'is-invalid' : ''; ?>" name="kota" autofocus value="<?= old('kota') ?? $penulis['kota'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kota'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('alamat')) ?
                            'is-invalid' : ''; ?>" name="alamat" rows="4" cols="50" autofocus><?= old('alamat') ?? $penulis['alamat'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
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