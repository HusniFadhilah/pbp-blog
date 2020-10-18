<?= $this->extend('templates/auth/template') ?>
<?= $this->section('contentauth') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<h1>Halaman Login (Admin)</h1>

<div class="container mt-5">
    <?php if ((session()->getFlashdata('text'))) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('text'); ?></div>
    <?php endif ?>
    <div class="card shadow">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form action="/authadmin/login" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" id="email" placeholder="Your email" name="email">
                    <span class="invalid-feedback ml-2"><?= $validation->getError('email') ?></span>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" placeholder="Your password" name="password">
                    <span class="invalid-feedback ml-2"><?= $validation->getError('password') ?></span>
                </div>
                <button type="submit" class="btn btn-block btn-success">LOGIN</button>
            </form>
        </div>
    </div>
</div>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>