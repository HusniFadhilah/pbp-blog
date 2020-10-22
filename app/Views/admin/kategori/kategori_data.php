<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Tabel Kategori Artikel</h1>
            <div>
                <a class="btn btn-primary my-3" href="/kategori/create">+ Add Category</a>
            </div>
            <div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>"
                 data-title="<?= session()->getFlashdata('title'); ?>"
                 data-icon="<?= session()->getFlashdata('icon'); ?>">
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="kategori" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 15%;">Category ID</th>
                                    <th scope="col" style="width: 65%;">Nama</th>
                                    <th scope="col" style="width: 20%;">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategori as $k) : ?>
                                    <tr>
                                        <td><?= $k['idkategori']; ?></td>
                                        <td><?= $k['nama']; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-warning" href="/kategori/edit/<?= $k['idkategori']; ?>">Edit</a>
                                            <a type="button" class="btn btn-danger tombol-hapus" href="/kategori/delete/<?= $k['idkategori']; ?>" data-text="kategori &apos;<?= $k['nama']; ?>&apos;" title="Hapus kategori">
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
        </div>
    </div>
</div>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>