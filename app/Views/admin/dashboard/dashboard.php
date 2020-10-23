<?= $this->extend('templates/admin/template') ?>
<?= $this->section('contentadmin') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<?php $this->fungsi = new App\Libraries\Fungsi(); ?>
<div class="container">

    <div>
        <h1 class="h3 mb-2 text-gray-800">Halaman Dashboard Admin</h1>
    </div>
    <!-- Jumlah Penulis -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
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
        <div class="col-xl-3 col-md-6 mb-4">
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

        <!-- Jumlah Artikel -->
        <div class="col-xl-3 col-md-6 mb-4">
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
        <div class="col-xl-3 col-md-6 mb-4">
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

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Komentar Artikel</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartkomentar"></canvas>
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
</div>

<!-- Page level plugins -->
<script type="text/javascript" src="/assets/vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript" src="/assets/js/demo/chart-area-demo.js"></script>
<script type="text/javascript" src="/assets/js/demo/chart-pie-demo.js"></script>

<script>
    // Area Chart Example
    var ctx = document.getElementById("chartkomentar");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
                if (count($postterbaru5) > 0) {
                    foreach ($postterbaru5 as $data) {
                        echo "'" . crop_string($data["judul"], 15) . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: "Komentar",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php
                    if (count($postterbaru5) > 0) {
                        foreach ($postterbaru5 as $data) {
                            echo $this->fungsi->sumKomentarInOnePost($data["idpost"]) . ", ";
                        }
                    }
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return (value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + tooltipItem.yLabel;
                    }
                }
            }
        }
    });

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