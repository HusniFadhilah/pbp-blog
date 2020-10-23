<?= $this->extend('templates/public/template') ?>
<?= $this->section('contentpublic') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="slider-main h-sm-auto pos-relative pt-95 pb-25">
    <div class="img-bg bg-1 bg-layer-4"></div>
    <div class="container-fluid h-100 mt-xs-50">

        <div class="dplay-tbl">
            <div class="dplay-tbl-cell color-white text-center">

                <h1 class="ptb-50"><b>Kategori <?= ucfirst($kategori['nama']) ?></b></h1>

            </div><!-- dplay-tbl-cell -->
        </div><!-- dplay-tbl -->
    </div><!-- container -->
</div><!-- slider-main -->

<section class="bg-1-white ptb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-md-12 col-lg-10 ptb-50 pr-30 pr-md-15">


                <div class="row">
                    <?php if (count($post) > 0) : ?>
                        <?php foreach ($post as $p) : ?>
                            <!-- START OF SECOND PARA -->
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-30">
                                <div class="card h-100 h-xs-500x">
                                    <div class="sided-half sided-xs-half h-100 bg-white">

                                        <!-- SETTING IMAGE WITH bg-2 -->
                                        <div class="s-left w-50 w-xs-100 h-100 h-xs-50 pos-relative">
                                            <img src="/assets/img/post/<?= $p["file_gambar"] ?>" style="object-fit:cover; width:100%; height:100%"></img>
                                        </div>

                                        <div class="s-right w-50 w-xs-100 h-xs-50">
                                            <div class="plr-25 ptb-25 h-100">
                                                <div class="dplay-tbl">
                                                    <div class="dplay-tbl-cell">

                                                        <h5 class="color-ash"><b><?= ucfirst($kategori["nama"]) ?></b></h5>
                                                        <h4 class="mtb-10"><a href="/post/detail/<?= $p["slug"] ?>">
                                                                <b><?= ucfirst(crop_string($p["judul"], 40)) ?></b></a></h4>
                                                        <ul class="list-li-mr-10 color-lt-black">
                                                            <li>
                                                                <i class="mr-5 font-12 ion-ios-calendar-outline"></i><?= indo_date($p["tgl_insert"]) ?>
                                                            </li>
                                                            <li>
                                                                <i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>105
                                                            </li>
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
                        <div class="alert alert-warning">Maaf, artikel kategori <?= ucfirst($kategori['nama']) ?>
                            tidak ditemukan
                        </div>
                    <?php endif ?>

                </div><!-- row -->
                <?= $pager->links('post', 'post_pagination') ?>
            </div><!-- s-left -->
        </div><!-- sided-80x -->
    </div><!-- mb-50 -->

</section>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>