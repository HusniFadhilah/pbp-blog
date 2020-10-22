<header>
    <a class="logo" href="#">
        <h5 class="mt-3 ml-4">PBP Blog</h5>
    </a>

    <div class="right-area">
        <form action="/post" method="get" class="src-form">
            <button type="submit"><i class="ion-search"></i></a></button>
            <input type="text" placeholder="Search here" name="keyword">
        </form><!-- src-form -->
    </div><!-- right-area -->

    <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

    <ul class="main-menu" id="main-menu">
        <li><a href="/post" class="mr-2">Home</a></li>
        <!-- <li class="drop-down"><a href="#!">UNDIP<i class="ion-arrow-down-b"></i></a>
            <ul class="drop-down-menu drop-down-inner">
                <li><a href="#">Peringkat Internasional</a></li>
                <li><a href="#">Peringkat Nasional</a></li>
            </ul>
        </li> -->
        <?php foreach ($allkategori as $k) : ?>
            <li><a href="/post/groupcategory/<?= $k["idkategori"] ?>"><?= ucfirst($k["nama"]) ?></a></li>
        <?php endforeach ?>
        <li><a href="/authpenulis"><button class="btn btn-primary">Masuk</button></a></li>
        <li><a href="/authpenulis/register"><button class="btn btn-success">Daftar</button></a></li>
    </ul>

    <div class="clearfix"></div>
</header>