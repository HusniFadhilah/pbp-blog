<?= $this->extend('templates/public/template') ?>
<?= $this->section('contentpublic') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="flash-data" data-text="<?= session()->getFlashdata('text'); ?>" data-title="<?= session()->getFlashdata('title'); ?>" data-icon="<?= session()->getFlashdata('icon'); ?>"></div>
<div class="slider-main h-500x h-sm-auto pos-relative pt-95 pb-25">
    <div class="img-bg bg-1 bg-layer-4"></div>
    <div class="container-fluid h-100 mt-xs-50">
        <div class="dplay-tbl">
            <div class="dplay-tbl-cell">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">

                        <div class="bg-white p-40 psm-30">
                            <h5 class="color-ash"><b><?= ucfirst($post["nama"]) ?></b></h5>
                            <h1 class="mt-20 lh-1-2"><b><?= $post["judul"] ?></b></h1>

                        </div><!-- bg-white -->
                    </div><!-- col-lg-4 -->
                </div><!-- row -->
            </div><!-- dplay-tbl-cell -->
        </div><!-- dplay-tbl -->
    </div><!-- container -->
</div><!-- slider-main -->

<section class="bg-1-white ptb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-md-12 col-lg-8 ptb-50 pr-30 pr-md-15">

                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        <div class="sided-70x">
                            <div class="s-left">
                                <img src="/assets/img/user/default.jpg" alt="">
                            </div><!-- s-left-->

                            <div class="s-right">
                                <p class="ptb-20 color-ash"><b><?= ucfirst($post["nama"]) ?> on <?= month($post["tgl_insert"]) ?> <?= tanggal($post["tgl_insert"]) ?>, <?= tahun($post["tgl_insert"]) ?> at <?= pukul($post["tgl_insert"]) ?></b></p>
                            </div>
                        </div><!-- sided-80x-->
                    </div><!-- col-md-6-->

                    <div class="col-sm-12 col-md-6">
                        <ul class="color-ash lh-70 text-right text-sm-left list-a-plr-10 font-13">
                            <li><b>SHARE</b></li>
                            <li><a href="#"><i class="color-facebook ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="color-twitter ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="color-google ion-social-google"></i></a></li>
                        </ul>
                    </div><!-- col-md-6-->
                </div><!-- row-->

                <p class="mt-40 mt-sm-10">
                    <?= $post["isi_post"] ?>
                </p>


                <ul class="tag mtb-50">

                    <li><a href="#"><b>Manual</b></a></li>
                    <li><a href="#"><b>Liberty</b></a></li>
                    <li><a href="#"><b>InterPretitaion</b></a></li>
                </ul>

                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        <div class="sided-70x">
                            <div class="s-left">
                                <img src="/assets/img/user/default.jpg" alt="">
                            </div><!-- s-left-->

                            <div class="s-right">
                                <p class="ptb-20 color-ash"><b><?= ucfirst($post["nama"]) ?> on <?= month($post["tgl_insert"]) ?> <?= tanggal($post["tgl_insert"]) ?>, <?= tahun($post["tgl_insert"]) ?> at <?= pukul($post["tgl_insert"]) ?></b></p>
                            </div>
                        </div><!-- sided-80x-->
                    </div><!-- col-md-6-->

                    <div class="col-sm-12 col-md-6">
                        <ul class="color-ash lh-70 text-right text-sm-left list-a-plr-10 font-13">
                            <li><b>SHARE</b></li>
                            <li><a href="#"><i class="color-facebook ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="color-twitter ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="color-google ion-social-google"></i></a></li>
                        </ul>
                    </div><!-- col-md-6-->
                </div><!-- row-->

                <div class="brdr-grey-1 mt-50 mt-sm-20"></div>

                <div class="mt-50 mb-20">
                    <div class="row">
                        <?php foreach ($postterbaru3 as $pt3) : ?>
                            <div class=" col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-30">
                                <div class="card h-100 min-h-350x">
                                    <div class="bg-white h-100">

                                        <!-- SETTING IMAGE WITH bg-10 -->
                                        <div class="h-50 bg-10" style="background-image:url(/assets/img/post/<?= $pt3["file_gambar"] ?>);object-fit:cover"></div>

                                        <div class="plr-25 ptb-15 h-50">
                                            <div class="dplay-tbl">
                                                <div class="dplay-tbl-cell">

                                                    <h5 class="color-ash"><b><?= ucfirst($pt3["nama"]) ?></b></h5>
                                                    <h4 class="mtb-10">
                                                        <a href="/post/detail/<?= $pt3["slug"] ?>"><b><?= ucfirst($pt3["judul"]) ?></b></a></h4>
                                                    <ul class="list-li-mr-10 color-lt-black">
                                                        <li><i class="mr-5 font-12 ion-ios-calendar-outline"></i><?= tgl_indo($pt3["tgl_insert"]) ?></li>
                                                        <li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>105</li>
                                                    </ul>

                                                </div><!-- dplay-tbl-cell -->
                                            </div><!-- dplay-tbl -->
                                        </div><!-- plr-25 ptb-15 -->
                                    </div><!-- hot-news -->
                                </div><!-- card -->
                            </div><!-- col-lg-4 col-md-6 -->
                        <?php endforeach ?>

                    </div><!-- row-->
                </div><!-- mt-50 mb-20-->

                <h4 class="mb-30 mt-20 clearfix"><b>Comments(<?= count($komentar) ?>)</b></h4>

                <?php foreach ($komentar as $k) : ?>
                    <div class="row">
                        <div class="colsm-12 col-md-12 col-lg-12 col-xl-8">
                            <div class="p-30 bg-white">
                                <div class="row">
                                    <div class="col-9 col-lg-9 col-xl-6">

                                        <div class="sided-70x">
                                            <div class="s-left">
                                                <img src="/assets/img/user/default.jpg" alt="">
                                            </div><!-- s-left-->

                                            <div class="s-right">
                                                <p class="ptb-5 color-ash"><b><?= ucfirst($k["nama"]) ?> on <?= month($k["tgl_insert"]) ?> <?= tanggal($k["tgl_insert"]) ?>, <?= tahun($k["tgl_insert"]) ?> at <?= pukul($k["tgl_insert"]) ?></b></p>
                                            </div>
                                        </div><!-- sided-80x-->
                                    </div><!-- col-md-6-->

                                </div><!-- row-->

                                <p class="mt-30"><?= $k["isi"] ?></p>
                            </div><!-- p-30-->
                        </div><!-- col-sm-6-->
                    </div><!-- row-->
                <?php endforeach ?>

                <h4 class="mb-30 mt-50 clearfix"><b>Post Comment</b></h4>

                <?php if (session()->get('idpenulis')) : ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <form class="form-block form-h-55 form-plr-20 form-bg-white" action="/komentar/save" method="post">
                                <div class="row">
                                    <input type="hidden" value="<?= $post["idpost"] ?>" name="idpost">
                                    <input type="hidden" value="<?= $post["idpenulis"] ?>" name="idpenulis">
                                    <div class="col-sm-6 mb-30">
                                        <input type="text" placeholder="Nama" value="<?= session()->get('idpenulis') ?>" readonly>
                                    </div>

                                    <div class="col-sm-6 mb-30">
                                        <input type="text" placeholder="Email" value="<?= session()->get('emailPenulis') ?>" readonly>
                                    </div>

                                    <div class="col-sm-12 mb-30">
                                        <textarea class="ptb-20 min-h-200x <?= $validation->hasError('isi') ? 'is-invalid' : '' ?>" placeholder="Isi komentar" name="isi"><?= old('isi') ?></textarea>
                                        <span class="invalid-feedback"><?= $validation->getError('isi') ?></span>
                                    </div>

                                </div>
                                <button class="btn-b-lg btn-brdr-grey plr-25 color-ash" type="submit"><b>Post Comment</b></button>

                            </form>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary shadow" data-toggle="modal" data-target="#komentarmodal">Beri Komentar</button>
                        </div>
                    </div>
                <?php endif ?>

            </div><!-- col-sm-9 -->

            <div class="col-md-12 col-lg-3 bg-2-white ptb-50 pl-30 pl-md-15">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="mx-w-md-400x mlr-md-auto">


                            <div class="mb-50">
                                <h5 class="mb-30"><b>ARTIKEL TERBARU</b></h5>

                                <?php foreach ($postterbaru4 as $pt4) : ?>
                                    <div class="sided-80x mb-20">
                                        <div class="s-left">
                                            <img src="/assets/img/post/<?= $pt4["file_gambar"] ?>" alt="<?= $pt4["judul"] ?>" alt="<?= $pt4["file_gambar"] ?>">
                                        </div><!-- s-left -->
                                        <div class="s-right">
                                            <h5 class="pt-5"><a href="/post/detail/<?= $pt4["slug"] ?>"><b><?= $pt4["judul"] ?></b></a></h5>
                                        </div><!-- s-left -->
                                    </div><!-- sided-80x -->
                                <?php endforeach ?>
                            </div><!-- mx-w-400 -->
                        </div><!-- col-sm-9 -->
                    </div><!-- row -->
                </div><!-- col-sm-3 -->
            </div><!-- row -->
        </div><!-- container -->
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="komentarmodal" tabindex="-1" role="dialog" aria-labelledby="komentarmodallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login sebagai Penulis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/authpenulis/loginkomentar" method="post" class="form-block" id="loginForm">
                    <!-- <p>
                        Silahkan login sebagai penulis untuk memberikan komentar
                    </p> -->
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" id="email" placeholder="Email" name="email" value="<?= old('email') ?>" />
                        <span class="invalid-feedback ml-2"><?= $validation->getError('email') ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" placeholder="Password" name="password" />
                        <span class="invalid-feedback ml-2"><?= $validation->getError('password') ?></span>
                    </div>
                    <button type="submit" name="komentar" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>