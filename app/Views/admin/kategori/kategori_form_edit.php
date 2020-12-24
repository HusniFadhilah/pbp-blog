<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Form Ubah Kategori</h2>
            <form action="/kategori/update/<?= $kategori['idkategori']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ?
                                                                    'is-invalid' : ''; ?>" name="nama" autofocus value="<?= $kategori['nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Icon kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('icon')) ?
                                                                    'is-invalid' : ''; ?>" name="icon" autofocus value="<?= $kategori['icon'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('icon'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Warna Icon (HEX)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('icon_color')) ?
                                                                    'is-invalid' : ''; ?>" name="icon_color" autofocus value="<?= $kategori['icon_color'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('icon_color'); ?>
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