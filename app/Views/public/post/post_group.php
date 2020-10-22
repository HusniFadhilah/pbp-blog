<?= $this->extend('templates/public/template') ?>
<?= $this->section('contentpublic') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<h1>Halaman Group By Kategori</h1>
    <div class="row article mb-3">
        <?php foreach ($post as $p) : ?>
            <div class="col-lg-3">
                <article class="item">
                    <div class="card">
                        <img class="card-img-top" src="assets/img/article/blog-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/post/detail/<?= $p["slug"] ?>"><?= $p["judul"] ?></a></h5>
                            <p class="card-text"><?= $p["isi_post"] ?> <br> kategori <?= $p["idkategori"] ?></p>
                            <a href="/post/detail/<?= $p["slug"] ?>" class="btn btn-primary btn-sm">More<i class="fa fa-arrow-right pl-1"></i></a>
                            <span class="float-right"><small><i class="far fa-calendar mr-1"></i> <?= $p['tgl_insert'] ?> </small></span>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach ?>
    </div>
    <?= $pager->links('post', 'post_pagination') ?>
</div>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>