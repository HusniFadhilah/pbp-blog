<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="#">PBP BLOG (Admin)</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active mr-4">
                    <a class="nav-link" href="/admin">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-4">
                    <a class="nav-link" href="/penulis/data">Penulis</a>
                </li>
                <li class="nav-item mr-4">
                    <a class="nav-link" href="/kategori">Kategori</a>
                </li>
                <li class="nav-item dropdown mr-4">
                    <a class="nav-link dropdown-toggle" href="#" id="profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profile">
                        <a class="dropdown-item" href="/admin/edit/<?= session()->get('idadmin') ?>">Edit Profile</a>
                        <a class="dropdown-item" href="/admin/ubahpassword/<?= session()->get('idpenulis') ?>">Ubah Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/authadmin/logout"><i class="fa fa-sign-out-alt mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>