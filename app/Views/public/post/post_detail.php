<?= $this->extend('templates/public/template') ?>
<?= $this->section('contentpublic') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<h1>Halaman Post Detail (Public)</h1>
<a href="/post"><button class="d-block btn btn-info">Post</button></a>
<section class="mysection bg-light">
    <div class="container-fluid pr-lg-5 pl-lg-5">
        <div class="row article">
            <div class="col-md-8 mb-5">
                <div class="card shadow p-0 mb-3">
                    <div class="card-body p-0">
                        <div class="container-fluid p-4">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="article-title"><?= $post["judul"] ?>
                                    </h2>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 col-lg-1">
                                    <img class="img-circle" src="/assets/img/user/default.jpg" style="max-height: 50px;border-radius:50%">
                                </div>
                                <div class="col-6 col-lg-7 d-flex">
                                    <div class="text-left">
                                        <span class=""><?= ucfirst($penulis["nama"]) ?></span>
                                        <span class="text-dark d-block"><small><i class="far fa-calendar mr-2"></i><?= indo_date($post["tgl_insert"]) ?></small></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-right">
                                        <span class="badge badge-info"><i class="fa fa-tags mr-1"></i><?= ucfirst($kategori["nama"]) ?></span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow p-0 mb-3">
                    <div class="card-body p-0">
                        <div class="row text-center">
                            <div class="col-12">
                                <img class="img-fluid" src="/assets/img/post/<?= $post["file_gambar"] ?>" alt="XAMPP">
                            </div>
                        </div>
                        <div class="container p-4 mt-2 mb-2 article-content position-relative">
                            <?= $post["isi_post"] ?>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <hr class="mb-2">
                                    <?php if ($post["tgl_update"] != $post["tgl_insert"]) : ?>
                                        <small class="d-block mb-2">Diupdate pada: <?= tgl_indo($post["tgl_update"]) ?></small>
                                        <small>
                                        <?php endif ?>
                                        <span><i class="fa fa-tags"></i> <?= ucfirst($kategori["nama"]) ?></span>
                                        </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow p-0 mb-3">
                    <div class="card-body p-0">
                        <div class="container p-4">
                            <div class="share-title mb-4">
                                <h5>Bagikan</h5>
                            </div>
                            <div class="share-content">
                                <a class="btn btn-outline-dark mb-1"><i class="fab fa-facebook mr-2"></i>Facebook</a>
                                <a class="btn btn-outline-dark mb-1"><i class="fab fa-twitter mr-2"></i>Twitter</a>
                                <a class="btn btn-outline-dark mb-1"><i class="fab fa-instagram mr-2"></i>Instagram</a>
                                <a class="btn btn-outline-dark mb-1"><i class="fab fa-whatsapp mr-2"></i>Whatsapp</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow p-0 mb-3">
                    <div class="card-body p-0">
                        <div class="container p-4">
                            <div class="comment-title mb-4">
                                <h5>3 Komentar</h5>
                            </div>
                            <div class="comment-content">
                                <div id="comment-1" class="comment clearfix">
                                    <img src="assets/img/article/comment-1.jpg" class="comment-img  float-left" alt="">
                                    <h5><a href="">Husni Fadhilah</a> <a href="#" class="reply"><i class="fa fa-reply"></i> Balas</a></h5>
                                    <time datetime="2020-09-15">15 September 2020</time>
                                    <p>
                                        Artikelnya sangat bermanfaat. Terimakasih, semoga sukses selalu
                                    </p>
                                    <div id="comment-reply-1" class="comment comment-reply clearfix">
                                        <img src="assets/img/article/comment-1.jpg" class="comment-img  float-left" alt="">
                                        <h5><a href="">Dhiya Ul Haq</a> <a href="#" class="reply"><i class="fa fa-reply"></i> Balas</a></h5>
                                        <time datetime="2020-09-15">15 September 2020</time>
                                        <p>
                                            Saya izin menjadikan ini sebagai referensi tugas saya ya kak.
                                        </p>
                                    </div>
                                </div>

                                <div id="comment-2" class="comment clearfix">
                                    <img src="assets/img/article/comment-1.jpg" class="comment-img  float-left" alt="">
                                    <h5><a href="">Fadhil</a> <a href="#" class="reply"><i class="fa fa-reply"></i>
                                            Balas</a></h5>
                                    <time datetime="2020-09-15">15 September 2020</time>
                                    <p>
                                        Kok masih error ya kak
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow p-0 mb-3">
                    <div class="card-body p-0">
                        <div class="container p-4">
                            <div class="comment-title">
                                <h5>Tinggalkan Balasan</h5>
                            </div>
                            <div class="comment-content">
                                <p>Email kamu tidak akan kami publikasikan. Tanda bintang (*) wajib diisi.</p>
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input name="name" type="text" class="form-control" placeholder="Your Name*">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="email" type="text" class="form-control" placeholder="Your Email*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <input name="website" type="text" class="form-control" placeholder="Your Website">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Send Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body pb-0">
                        <div class="container p-0 pb-2">
                            <div class="row">
                                <div class="widget-item col-12">
                                    <div class="widget-title">
                                        <h5>Cari Artikel</h5>
                                        <hr>
                                    </div>
                                    <form action="/post" method="get">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="keyword" placeholder="Type keyword and hit enter" name="keyword">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-search"></i></div>
                                                <input type="submit" name="submit" class="d-none">
                                            </div>
                                        </div>
                                    </form>
                                    <p>Temukan berbagai artikel terbaik, sebagai sumber informasi yang
                                        berkualitas untuk Anda. Dengan berbagai kategori yang ada</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body pb-0">
                        <div class="container p-0">
                            <div class="row pb-4">
                                <div class="widget-item col-12">
                                    <div class="widget-title">
                                        <h5>Kategori Artikel</h5>
                                        <hr>
                                    </div>
                                    <div class="widget-content list-category">
                                        <ul class="list-unstyled">
                                            <?php foreach ($allkategori as $ak) : ?>
                                                <li class="list-unstyled"><a href="" class="text-decoration-none"><span class="fa fa-arrow-right mr-2"></span><?= $ak["nama"] ?><span class="float-right">(5)</span></a></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget-item col-12">
                                    <div class="widget-title mt-3">
                                        <h5>Artikel Terbaru</h5>
                                        <hr>
                                    </div>
                                    <?php foreach ($postterbaru as $pt) : ?>
                                        <article class="item">
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <img class="card-img-top" src="/assets/img/post/<?= $pt["file_gambar"] ?>" alt="<?= $pt["judul"] ?>" style="object-fit: cover;height: 100%;">
                                                        </div>
                                                        <div class="col-8 py-2">
                                                            <a href="single-article.html">
                                                                <h5 class="card-title"><?= $pt["judul"] ?></h5>
                                                            </a>
                                                            <small><i class="far fa-calendar mr-1"></i><?= time_ago($pt["tgl_insert"]) ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body pb-0">
                        <div class="container p-0">
                            <div class="row">
                                <div class="widget-item col-12">
                                    <div class="widget-title">
                                        <h5>Kategori Artikel</h5>
                                        <hr>
                                    </div>
                                    <div class="widget-content mb-3">
                                        <?php
                                        $no = 0;
                                        foreach ($allkategori as $ak) :
                                            $no++;
                                            $allwarna = ['success', 'danger', 'primary', 'info', 'rose', 'warning', 'dark'];
                                        ?>
                                            <button type="button" class="btn btn-<?= $allwarna[$no - 1] ?> btn-sm">
                                                <?= ucfirst($ak["nama"]) ?> <span class="badge badge-light">9</span>
                                            </button>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>