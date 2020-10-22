<?= $this->extend('templates/penulis/template') ?>
<?= $this->section('contentpenulis') ?>

    <!-- ISI KONTEN -->
    <!-- Taruh konten di bawah sini -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>"
                     data-title="<?= session()->getFlashdata('title'); ?>"
                     data-icon="<?= session()->getFlashdata('icon'); ?>">
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-header">
                                <div class="d-flex justify-content-center">
                                    <h1 class="h4 text-gray-600">Edit Profile (Penulis)
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg col-sm col-md">
                                        <div class="p-lg-5 p-5">
                                            <form action="/penulis/update/<?= $penulis['idpenulis']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                               class="form-control <?= ($validation->hasError('nama')) ?
                                                                   'is-invalid' : ''; ?>" name="nama" <?= ($validation->hasError('nama')) ?
                                                            'autofocus' : ''; ?>
                                                               value="<?= old('nama') ?? $penulis['nama'] ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('nama'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                               class="form-control <?= ($validation->hasError('email')) ?
                                                                   'is-invalid' : ''; ?>" name="email" <?= ($validation->hasError('email')) ?
                                                            'autofocus' : ''; ?>
                                                               value="<?= old('email') ?? $penulis['email'] ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('email'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="no_telp" class="col-sm-4 col-form-label">No Telepon</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                               class="form-control <?= ($validation->hasError('no_telp')) ?
                                                                   'is-invalid' : ''; ?>" name="no_telp" <?= ($validation->hasError('no_telp')) ?
                                                            'autofocus' : ''; ?>
                                                               value="<?= old('no_telp') ?? $penulis['no_telp'] ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('no_telp'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="kota" class="col-sm-4 col-form-label">Kota</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                               class="form-control <?= ($validation->hasError('kota')) ?
                                                                   'is-invalid' : ''; ?>" name="kota" <?= ($validation->hasError('kota')) ?
                                                            'autofocus' : ''; ?>
                                                               value="<?= old('kota') ?? $penulis['kota'] ?>">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('kota'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                    <div class="col-sm-8">
                        <textarea class="form-control <?= ($validation->hasError('alamat')) ?
                            'is-invalid' : ''; ?>" name="alamat" rows="4" cols="50"
                                  <?= ($validation->hasError('alamat')) ?
                                      'autofocus' : ''; ?>><?= old('alamat') ?? $penulis['alamat'] ?></textarea>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('alamat'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password"
                                                           class="col-sm-4 col-form-label">Password</label>
                                                    <div class="col-sm-8">
                                                        <input type="password"
                                                               class="form-control <?= ($validation->hasError('password')) ?
                                                                   'is-invalid' : ''; ?>" name="password" <?= ($validation->hasError('password')) ?
                                                            'autofocus' : ''; ?>>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('password'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-primary">Ubah Data</button>
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