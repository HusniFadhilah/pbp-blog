<?= $this->extend('templates/penulis/template') ?>
<?= $this->section('contentpenulis') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="container">
    <div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>" data-title="<?= session()->getFlashdata('title'); ?>" data-icon="<?= session()->getFlashdata('icon'); ?>"></div>
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Halaman Data Post</h1>
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
                                        <td><?= crop_string($p["isi_post"], 40) ?></td>
                                        <td><img src="/assets/img/post/<?= $p["file_gambar"] ?>" class="img-fluid img-thumbnail" style="max-width:100px"></td>
                                        <td><?= $p["tgl_insert"] ?></td>
                                        <td>
                                            <a href="/post/edit/<?= $p["idpost"] ?>" class="btn btn-warning btn-sm mt-1" title="Edit post"><i class="fa fa-edit"></i></a>
                                            <a href="/post/delete/<?= $p["idpost"] ?>" class="btn btn-danger btn-sm mt-1 tombol-hapus" data-text="<?= $title ?>" title="Hapus post"><i class="fa fa-trash"></i></a>
                                            <a href="/post/detail/<?= $p["slug"] ?>" class="btn btn-info btn-sm mt-1" title="Lihat di web"><i class="fa fa-eye"></i></a>
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