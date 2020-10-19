<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

    <!-- ISI KONTEN -->
    <!-- Taruh konten di bawah sini -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Halaman Kategori Data (Admin)</h1>
                <div>
                    <a class="btn btn-primary my-3" href="/kategori/create">+ Add Category</a>
                </div>
                <?php if (session()->getFlashdata('pesan')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($kategori as $k) : ?>
                    <tr>
                        <td><?= $k['idkategori'] ; ?></td>
                        <td><?= $k['nama']; ?></td>
                        <td>
                            <a type="button" class="btn btn-warning" href="/kategori/edit/<?= $k['idkategori']; ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="/kategori/delete/<?= $k['idkategori']; ?>" onclick="return confirm('Apakah Anda yakin?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>