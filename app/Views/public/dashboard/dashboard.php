<?= $this->extend('templates/public/template') ?>
<?= $this->section('contentpublic') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<h1>Halaman Dashboard Public</h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3">
                <form action="" method="get">
                    <input type="text" class="form-control" placeholder="Cari artikel" aria-label="Cari artikel" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary d-inline" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row article mb-3">
        <?php foreach ($post as $p) : ?>
            <div class="col-lg-3">
                <article class="item">
                    <div class="card">
                        <img class="card-img-top" src="assets/img/article/blog-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/post/detail/<?= $p["slug"] ?>"><?= $p["judul"] ?></a></h5>
                            <p class="card-text"><?= $p["isi_post"] ?> <?= $p["idkategori"] ?></p>
                            <a href="/post/detail/<?= $p["slug"] ?>" class="btn btn-primary btn-sm">More<i class="fa fa-arrow-right pl-1"></i></a>
                            <span class="float-right"><small><i class="far fa-calendar mr-1"></i>Two days
                                    ago</small></span>
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