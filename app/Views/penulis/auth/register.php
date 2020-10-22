<?= $this->extend('templates/auth/template') ?>
<?= $this->section('contentauth') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>" data-title="<?= session()->getFlashdata('title'); ?>" data-icon="<?= session()->getFlashdata('icon'); ?>" data-href="<?= session()->getFlashdata('href'); ?>"></div>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg col-sm col-md">
                            <div class="p-lg-4 p-4 p-md-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">
                                        Daftar
                                        <span style="color: deepskyblue"><b>Akun</b></span>
                                    </h1>
                                </div>

                                <form action="/authpenulis/processregister" method="post" class="user">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" id="nama" placeholder="Nama" name="nama" value="<?= old('nama') ?>" />
                                                <span class="invalid-feedback"><?= $validation->getError('nama') ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" id="email" placeholder="E-mail" name="email" value="<?= old('email') ?>" />
                                                <span class="invalid-feedback"><?= $validation->getError('email') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" placeholder="Password" name="password" value="<?= old('password') ?>" />
                                                <span class="invalid-feedback"><?= $validation->getError('password') ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user <?= $validation->hasError('konfpassword') ? 'is-invalid' : '' ?>" id="konfpassword" placeholder="Confirm Password" name="konfpassword" value="<?= old('konfpassword') ?>" />
                                                <span class="invalid-feedback"><?= $validation->getError('konfpassword') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user <?= $validation->hasError('no_telp') ? 'is-invalid' : '' ?>" id="no_telp" placeholder="Nomor hp" name="no_telp" value="<?= old('no_telp') ?>" />
                                                <span class="invalid-feedback"><?= $validation->getError('no_telp') ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user <?= $validation->hasError('kota') ? 'is-invalid' : '' ?>" id="kota" placeholder="Kota" name="kota" value="<?= old('kota') ?>" />
                                                <span class="invalid-feedback"><?= $validation->getError('kota') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : '' ?>" name="alamat" id="alamat" rows="5" placeholder="Alamat"><?= old('alamat') ?></textarea>
                                        <span class="invalid-feedback"><?= $validation->getError('alamat') ?></span>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <div class="row text-center mt-3">
                                        <div class="col">
                                            <span class="text-center">Sudah punya akun? <a href="/authpenulis" class="text-decoration-none" style="color: deepskyblue">Login</a></span>
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

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>