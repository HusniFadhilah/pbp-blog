<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<?php $this->fungsi = new App\Libraries\Fungsi(); ?>
<div class="container">

    <div>
        <h1 class="h3 mb-4 text-gray-800">Halaman Dashboard Admin</h1>
    </div>
    <!-- Jumlah Penulis -->
    <div class="row">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Penulis</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlpenulis ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Kategori -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kategori</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlkategori ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-folder fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Jumlah Artikel -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Artikel</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlpost ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-newspaper fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Komentar -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Komentar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlkomentar ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Jumlah Admin -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Admin</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmladmin ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-cog fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart Kategori Artikel</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="kategorichart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <!-- Tolong dihubungkan dengan backened -->
                        <?php
                        if (count($kategori) > 0) {
                            $warna = ['#4e73df', '#1cc88a', '#36b9cc', '#8e44ad', '#34495e', '#e67e22'];
                            $i = 0;
                            foreach ($kategori as $data) {
                                $i++; ?>
                                <span class="mr-2">
                                    <i class="fas fa-circle" style="color:<?= $warna[$i] ?>"></i> <?= $data["nama"] ?>
                                </span>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Komentar Artikel</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-hover" id="post">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Jumlah Komentar</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($post as $p) : ?>
                                <tr>
                                    <td scope="row"><?= $i++ ?></td>
                                    <td><?= $p["judul"] ?></td>
                                    <td><?= $this->fungsi->getPenulis($p["idpenulis"])["nama"] ?></td>
                                    <td><?= $this->fungsi->sumKomentarInOnePost($p["idpost"]) ?></td>
                                    <td><?= $p["tgl_insert"] ?></td>
                                    <td>
                                        <a href="/post/detail/<?= $p["slug"] ?>" class="btn btn-info btn-sm mt-1" title="Lihat di web"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        test
    </div>
</div>

<!-- Page level plugins -->
<script type="text/javascript" src="/assets/vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript" src="/assets/js/demo/chart-pie-demo.js"></script>

<script>
    var ctx = document.getElementById("kategorichart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php
                if (count($kategori) > 0) {
                    foreach ($kategori as $data) {
                        echo "'" . crop_string($data["nama"], 15) . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    if (count($kategori) > 0) {
                        foreach ($kategori as $data) {
                            echo $this->fungsi->sumPostByKategori($data["idkategori"]) . ", ";
                        }
                    }
                    ?>
                ],
                backgroundColor: [
                    <?php
                    if (count($kategori) > 0) {
                        $warna = ['#4e73df', '#1cc88a', '#36b9cc', '#8e44ad', '#34495e', '#e67e22'];
                        $i = 0;
                        foreach ($kategori as $data) {
                            $i++;
                            echo "'" . $warna[$i] . "',";
                        }
                    }
                    ?>
                ],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>