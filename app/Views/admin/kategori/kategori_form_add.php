<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Form Tambah Kategori</h2>
            <form action="/kategori/save" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ?
                                                                    'is-invalid' : ''; ?>" name="nama" autofocus value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Icon kategori (material icon)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('icon')) ?
                                                                    'is-invalid' : ''; ?>" name="icon" autofocus value="<?= old('icon'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('icon'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Warna icon (hex RGB 6 digit)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('icon_color')) ?
                                                                    'is-invalid' : ''; ?>" name="icon_color" autofocus value="<?= old('icon_color') ?? '#'; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('icon_color'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>