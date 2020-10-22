<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>" data-title="<?= session()->getFlashdata('title'); ?>" data-icon="<?= session()->getFlashdata('icon'); ?>"></div>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-3 text-gray-800">Halaman Reset Password Akun Penulis</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="penulis">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Penulis</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($penulis as $p) : ?>
                                    <tr>
                                        <td scope="row"><?= $i++ ?></td>
                                        <td><?= $p["nama"] ?></td>
                                        <td><?= $p["email"] ?></td>
                                        <td><?= $p["tgl_insert"] ?></td>
                                        <td>
                                                <button href="/admin/process_reset/<?= $p["idpenulis"] ?>" type="submit" class="btn btn-danger btn-sm mt-1 tombol-reset" data-text="<?= $title ?>" title="Reset Password">Reset Password</button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>