<header>
    <a class="logo" href="#">
        <h5 class="mt-4 ml-4">PBP Blog</h5>
    </a>

    <div class="right-area">
        <form action="/post" method="get" class="src-form">
            <button type="submit"><i class="ion-search"></i></a></button>
            <input type="text" placeholder="Search here" name="keyword">
        </form><!-- src-form -->
    </div><!-- right-area -->

    <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

    <ul class="main-menu d-flex" id="main-menu">
        <li class="ml-lg-5"><a href="/post" class="mr-2">Home</a></li>
        <li class="drop-down"><a href="#!">Kategori<i class="ion-arrow-down-b"></i></a>
            <ul class="drop-down-menu drop-down-inner">
                <?php foreach ($allkategori as $k) : ?>
                    <li><a href="/post/groupcategory/<?= $k["idkategori"] ?>"><?= ucfirst($k["nama"]) ?></a></li>
                <?php endforeach ?>
            </ul>
        </li>
        <li class="ml-auto"><a href="/authpenulis"><button class="btn btn-primary">Masuk</button></a></li>
        <li class=""><a href="/authpenulis/register"><button class="btn btn-success">Daftar</button></a></li>
    </ul>

    <div class="clearfix"></div>
</header>