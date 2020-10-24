<?= $this->extend('templates/penulis/template') ?>
<?= $this->section('contentpenulis') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<?php $this->fungsi = new App\Libraries\Fungsi(); ?>
<div class="container">

    <div>
        <h1 class="h3 mb-4 text-gray-800">Halaman Dashboard Penulis</h1>
    </div>
    <div class="row">
        <div class="col-xl-8">
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
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart Komentar Artikel</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="kategorichart"></canvas>
                    </div>
                    <div class="mt-4 small">
                        <?php
                        if (count($post) > 0) {
                            $warna = ['#4e73df', '#1cc88a', '#36b9cc', '#8e44ad', '#34495e', '#e67e22'];
                            $i = 0;
                            foreach ($post as $data) {
                                $i++; ?>
                                <span class="mr-2">
                                <i class="fas fa-circle" style="color:<?= $warna[$i] ?>"></i> <?= $data["judul"] ?> <br>
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
                if (count($post) > 0) {
                    foreach ($post as $data) {
                        echo "'" . crop_string($data["judul"], 15) . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    if (count($post) > 0) {
                        foreach ($post as $data) {
                            echo $this->fungsi->sumKomentarInOnePost($data["idpost"]) . ", ";
                        }
                    }
                    ?>
                ],
                backgroundColor: [
                    <?php
                    if (count($post) > 0) {
                        $warna = ['#4e73df', '#1cc88a', '#36b9cc', '#8e44ad', '#34495e', '#e67e22'];
                        $i = 0;
                        foreach ($post as $data) {
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