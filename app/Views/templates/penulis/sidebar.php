    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-nero sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <img class="p-0 img-fluid" src="/logo.ico" alt="" height="150" width="150">
        </a>
        <a class="d-flex align-items-center justify-content-center" href="/">
            <h4 class="h4 text-success">Penulis</h4>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Home
        </div>

        <!-- Nav Item - Home -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#home" aria-expanded="true" aria-controls="home">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span>
            </a>
            <div id="home" class="collapse" aria-labelledby="headingUtilities" data-parent="">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item pl-2" href="/penulis">
                        <i class="fas fa-fw fa-tachometer-alt mr-1"></i>
                        <span>Dashboard</span></a>
                    <a class="collapse-item pl-2" href="/penulis/edit/<?= session()->get('idpenulis') ?>">
                        <i class="fas fa-fw fa-user mr-1"></i>
                        <span>Edit Profile</span></a>
                    <a class="collapse-item pl-2" href="/penulis/ubahpassword/<?= session()->get('idpenulis') ?>">
                        <i class="fas fa-fw fa-key mr-1"></i>
                        <span>Ubah Password</span></a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Post
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/post/data">
                <i class="fas fa-fw fa-list"></i>
                <span>Post</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Komentar
        </div>

        <!-- Artikel -->
        <li class="nav-item">
            <a class="nav-link" href="/komentar/data">
                <i class="fas fa-fw fa-user"></i>
                <span>Komentar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mb-0">

        <!-- Logout -->
        <li class="nav-item">
            <a class="nav-link" href="/authpenulis/logout">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->