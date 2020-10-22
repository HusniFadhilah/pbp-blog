<?= $this->extend('templates/public/template') ?>
<?= $this->section('contentpublic') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="slider-main h-<?= $keyword ? '300' : '500' ?>x h-sm-auto pos-relative pt-95 pb-25">
    <div class="img-bg bg-1 bg-layer-4"></div>
    <div class="container-fluid h-100 mt-xs-50">

        <?php if (!$keyword) : ?>
            <div class="row h-100">
                <div class="col-md-1"></div>
                <?php foreach ($postterbaru1 as $pt1) : ?>
                    <div class="col-sm-12 col-md-5 h-100 h-sm-50">
                        <div class="dplay-tbl">
                            <div class="dplay-tbl-cell color-white mtb-30">
                                <div class="mx-w-400x">
                                    <h5><b><?= ucfirst($pt1["nama"]) ?></b></h5>
                                    <h1 class="mt-20 mb-30"><b><?= $pt1["judul"] ?></b></h1>
                                    <h6><a class="plr-20 btn-brdr-grey color-white" href="/post/detail/<?= $pt1["slug"] ?>"><b>Continue Reading</b></a></h6>
                                </div><!-- mx-w-200x -->
                            </div><!-- dplay-tbl-cell -->
                        </div><!-- dplay-tbl -->
                    </div><!-- col-sm-6 -->
                <?php endforeach ?>

                <div class="col-sm-12 col-md-6 h-sm-50 oflow-hidden swiper-area pos-relative">

                    <div class="abs-blr pos-sm-static">
                        <div class="row pos-relative mt-50 all-scroll">

                            <div class="swiper-scrollbar resp"></div>
                            <div class="col-md-10">

                                <h5 class="mb-50 color-white"><b>HOT NEWS</b></h5>

                                <div class="swiper-container oflow-visible" data-slide-effect="slide" data-autoheight="false" data-swiper-speed="500" data-swiper-margin="25" data-swiper-slides-per-view="2" data-swiper-breakpoints="true" data-scrollbar="true" data-swiper-loop="false" data-swpr-responsive="[1, 2, 1, 2]">



                                    <div class="swiper-wrapper">
                                        <!-- data-swiper-autoplay="1000"  -->
                                        <?php foreach ($postterbaru5 as $pt5) : ?>
                                            <div class="swiper-slide">
                                                <div class="bg-white">
                                                    <img src="/assets/img/post/<?= $pt5["file_gambar"] ?>" alt="<?= $pt5["judul"] ?>">

                                                    <div class="plr-25 ptb-15">
                                                        <h5 class="color-ash"><b><?= ucfirst($pt5["nama"]) ?></b></h5>
                                                        <h4 class="mtb-10">
                                                            <a href="#"><b><?= $pt5["judul"] ?></b></a></h4>
                                                        <ul class="list-li-mr-10 color-lt-black">
                                                            <li><i class="mr-5 font-12 ion-ios-calendar-outline"></i><?= time_ago($pt5["tgl_insert"]) ?></li>
                                                            <li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>105</li>
                                                        </ul>
                                                    </div><!-- hot-news -->
                                                </div><!-- hot-news -->
                                            </div><!-- swiper-slide -->
                                        <?php endforeach ?>
                                    </div><!-- swiper-wrapper -->
                                </div><!-- swiper-container -->

                            </div><!-- col-sm-6 -->
                        </div><!-- all-scroll -->
                    </div><!-- row -->
                </div><!-- col-sm-6 -->

            </div><!-- row -->
        <?php else : ?>
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell color-white text-center">

                    <h1 class="ptb-50"><b>Hasil Pencarian Post</b></h1>

                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        <?php endif ?>
    </div><!-- container -->
</div><!-- slider-main -->

<section class="bg-1-white ptb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-md-12 col-lg-10 ptb-50 pr-30 pr-md-15">
                <?php if (!$keyword) : ?>
                    <div class="row">

                        <?php foreach ($postterbaru3 as $pt3) : ?>
                            <!-- START OF FIRST PARA -->
                            <div class="col-md-6 col-lg-6 col-xl-4 mb-30">
                                <div class="card h-100 bg-white">
                                    <div class="plr-25 ptb-15">

                                        <h5 class="color-ash"><b><?= $pt3["idkategori"] ?></b></h5>
                                        <h4 class="mtb-10"><a href="/post/detail/<?= $pt3["slug"] ?>"><b><?= $pt3["judul"] ?></b></a></h4>
                                        <ul class="list-li-mr-10 color-lt-black">
                                            <li><i class="mr-5 font-12 ion-ios-calendar-outline"></i><?= indo_date($pt3["tgl_insert"]) ?></li>
                                            <li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>105</li>
                                        </ul>

                                    </div><!-- hot-news -->
                                </div><!-- card -->
                            </div><!-- col-lg-4 col-md-6 -->

                            <!-- END OF FIRST PARA -->
                        <?php endforeach ?>
                    </div><!-- row -->
                <?php endif ?>

                <?php if (!$keyword) : ?>
                    <h4 class="mb-30 mt-20 clearfix"><b>Artikel Terbaru</b></h4>
                <?php endif ?>

                <?php if ($keyword) : ?>
                    <h4 class="mb-4">Keyword : <strong><?= $keyword ?></strong></h4>
                <?php endif ?>

                <div class="row">
                    <?php if (count($post) > 0) : ?>
                        <?php foreach ($post as $p) : ?>
                            <!-- START OF SECOND PARA -->
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-30">
                                <div class="card h-100 h-xs-500x">
                                    <div class="sided-half sided-xs-half h-100 bg-white">

                                        <!-- SETTING IMAGE WITH bg-2 -->
                                        <div class="s-left w-50 w-xs-100 h-100 h-xs-50 pos-relative">
                                            <img src="/assets/img/post/<?= $p["file_gambar"] ?>" style="object-fit:cover; width:100%"></img>
                                        </div>

                                        <div class="s-right w-50 w-xs-100 h-xs-50">
                                            <div class="plr-25 ptb-25 h-100">
                                                <div class="dplay-tbl">
                                                    <div class="dplay-tbl-cell">

                                                        <h5 class="color-ash"><b><?= $p["idkategori"] ?></b></h5>
                                                        <h4 class="mtb-10"><a href="/post/detail/<?= $p["slug"] ?>">
                                                                <b><?= $p["judul"] ?></b></a></h4>
                                                        <ul class="list-li-mr-10 color-lt-black">
                                                            <li><i class="mr-5 font-12 ion-ios-calendar-outline"></i><?= indo_date($p["tgl_insert"]) ?></li>
                                                            <li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>105</li>
                                                        </ul>
                                                    </div><!-- dplay-tbl-cell -->
                                                </div><!-- dplay-tbl -->
                                            </div><!-- plr-25 ptb-25 -->
                                        </div><!-- s-right -->
                                    </div><!-- sided-half -->
                                </div><!-- card -->
                            </div><!-- col-lg-8 col-md-12 -->
                            <!-- END OF SECOND PARA -->
                        <?php endforeach ?>
                    <?php else : ?>
                        <div class="alert alert-warning">Maaf pencarian artikel dengan kata kunci <?= $keyword ?> tidak ditemukan</div>
                    <?php endif ?>

                </div><!-- row -->
                <?= $pager->links('post', 'post_pagination') ?>
            </div><!-- s-left -->
        </div><!-- sided-80x -->
    </div><!-- mb-50 -->

</section>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>