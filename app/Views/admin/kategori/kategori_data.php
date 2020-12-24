<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Tabel Kategori Artikel</h1>
            <div>
                <a class="btn btn-primary my-3" href="/kategori/create">+ Tambah Kategori</a>
            </div>
            <div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>" data-title="<?= session()->getFlashdata('title'); ?>" data-icon="<?= session()->getFlashdata('icon'); ?>">
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="kategori" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%;">#</th>
                                    <th scope="col" style="width: 40%;">Nama</th>
                                    <th scope="col" style="width: 20%;">Icon</th>
                                    <th scope="col" style="width: 10%;">Icon Color</th>
                                    <th scope="col" style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kategori as $k) : ?>
                                    <tr>
                                        <td scope="row"><?= $i++ ?></td>
                                        <td><?= $k['nama']; ?></td>
                                        <td><?= $k['icon']; ?></td>
                                        <td><?= $k['icon_color']; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-warning btn-sm mt-1" href="/kategori/edit/<?= $k['idkategori']; ?>" title="Edit kategori""><i class=" fa fa-edit"></i></a>
                                            <a type="button" class="btn btn-danger btn-sm mt-1 tombol-hapus" href="/kategori/delete/<?= $k['idkategori']; ?>" data-text="kategori &apos;<?= $k['nama']; ?>&apos;" title="Hapus kategori">
                                                <i class="fa fa-trash"></i>
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