<?= $this->extend('templates/auth/template') ?>
<?= $this->section('contentauth') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>" data-title="<?= session()->getFlashdata('title'); ?>" data-icon="<?= session()->getFlashdata('icon'); ?>"></div>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg col-sm col-md">
                            <div class="p-lg-5 p-4 p-md-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login <span class="text-primary"><b>Penulis</b></span></h1>
                                </div>

                                <form action="/authpenulis/login" method="post" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" id="email" placeholder="Email" name="email" value="<?= old('email') ?>" />
                                        <span class="invalid-feedback ml-2"><?= $validation->getError('email') ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" placeholder="Password" name="password" />
                                        <span class="invalid-feedback ml-2"><?= $validation->getError('password') ?></span>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <div class="row text-center mt-3">
                                        <div class="col">
                                            <span class="text-center">Belum punya akun? <a href="/authpenulis/register" class="text-decoration-none" style="color: deepskyblue">Daftar</a></span>
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