<?= $this->extend('templates/penulis/template') ?>
<?= $this->section('contentpenulis') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<h1>Halaman Post Data (Penulis)</h1>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="<?= site_url('post/add') ?>" class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Post</a>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="post">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi Post</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($post as $p) : ?>
                                    <tr>
                                        <td scope="row"><?= $i++ ?></td>
                                        <td><?= $p["judul"] ?></td>
                                        <td><?= $p["isi_post"] ?></td>
                                        <td><?= $p["file_gambar"] ?></td>
                                        <td><?= $p["tgl_insert"] ?></td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm mt-1" title="Edit post"><i class="fa fa-edit"></i></a>
                                            <a href="/post/delete/<?= $p["idpost"] ?>" class="btn btn-danger btn-sm mt-1 tombol-hapus" data-text="<?= $title ?>" title="Hapus post"><i class="fa fa-trash"></i></a>
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