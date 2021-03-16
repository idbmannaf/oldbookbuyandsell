<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Charts | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/chartsjs/Chart.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
    <?php require("partial/sidebar.php") ?>
        <div id="body" class="active">

 <!-- Navbar start -->
 <?php require ("partial/navbar.php") ?>
            <!-- Navbar End -->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Charts</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Line Chart</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="linechart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Bar Chart</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="barchart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Pie Chart</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="piechart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Donut Chart</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="doughnutchart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Stacked Bar Chart</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="stackedbarchart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Radar Chart</div>
                                <div class="card-body">
                                    <p class="card-title"></p>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="radarchart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "partial/footer.php" ?>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>