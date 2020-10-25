<?= $this->extend('templates/penulis/template') ?>
<?= $this->section('contentpenulis') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="container">
    <div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>" data-title="<?= session()->getFlashdata('title'); ?>" data-icon="<?= session()->getFlashdata('icon'); ?>"></div>
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Halaman Data Komentar</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-responsive" id="post">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul Post</th>
                                    <th scope="col">Isi Komentar</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($komentarbypenulis as $k) : ?>
                                    <tr>
                                        <td scope="row"><?= $i++ ?></td>
                                        <td><?= $k["judul"] ?></td>
                                        <td><?= $k["isi"] ?></td>
                                        <td><?= $k["tgl_insert"] ?></td>
                                        <td>
                                            <a href="/komentar/delete/<?= $k["idkomentar"] ?>/" class="btn btn-danger btn-sm mt-1 tombol-hapus" data-text="<?= $title ?>" title="Hapus komentar"><i class="fa fa-trash"></i></a>
                                            <!--                                            <a href="/post/detail/-->
                                            <?//= $postbykomentar[$k["idkomentar"]-1]["slug"] ?>
                                            <!--" class="btn btn-info btn-sm mt-1" title="Lihat di web"><i class="fa fa-eye"></i></a>-->
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