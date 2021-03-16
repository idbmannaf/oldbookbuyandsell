<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Session;
use App\classes\Database;
// echo Session::getSessionData('loggedin');
if (!Session::getSessionData('adminlog')) {
    header("location:login.php");
}
$conn = new Database;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/chartsjs/Chart.min.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php require("partial/sidebar.php") ?>
        <div id="body" class="active">
            <!-- Navbar start -->
            <?php require("partial/navbar.php") ?>
            <!-- Navbar End -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-book"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Total Books</p>
                                                <span class="number"><?php

                                                                        $newq = "SELECT count(*) as totalbook FROM books";
                                                                        $newResult =  $conn->db->query($newq);
                                                                        if ($newResult->num_rows > 0) {
                                                                            $newlist = $newResult->fetch_assoc();
                                                                            echo '<a href="publicbooks.php">'.$newlist['totalbook'].'</a>';
                                                                        }
                                                                        ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-calendar"></i> For this Week
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                               
                                                <i class="olive fas fa-gavel"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <!-- dashboard top -->
                                            <div class="detail">
                                                <p class="detail-subtitle">Sold Book</p>
                                                <span class="number"><?php

                                                                        $newq = "SELECT count(*) as totalsold FROM books where books.sold = '2'";
                                                                        $newResult =  $conn->db->query($newq);
                                                                        if ($newResult->num_rows > 0) {
                                                                            $newlist = $newResult->fetch_assoc();
                                                                            echo '<a href="soldbook.php">'.$newlist['totalsold'].'</a>';
                                                                        }
                                                                        ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-calendar"></i> For All times
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Total Users</p>
                                                <span class="number"><?php

                                                                        $u = "SELECT count(*) as totalusers FROM books where status = '1'";
                                                                        $uresult =  $conn->db->query($u);
                                                                        if ($uresult->num_rows > 0) {
                                                                            $ulist = $uresult->fetch_assoc();
                                                                            // echo $ulist['totalusers'];
                                                                            echo '<a href="users.php">'.$ulist['totalusers'].'</a>';
                                                                        }
                                                                        ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-stopwatch"></i> For All time
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                
                                                <i class="orange fas fa-pencil-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Writer/Author</p>
                                                <span class="number"><?php

                                                                        $w = "SELECT count(*) as totalwriter FROM writers where deleted is NULL";
                                                                        $newResult =  $conn->db->query($w);
                                                                        if ($newResult->num_rows > 0) {
                                                                            $wlist = $newResult->fetch_assoc();
                                                                            echo '<a href="writers.php">'.$wlist['totalwriter'].'</a>';
                                                                        }
                                                                        ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-envelope-open-text"></i> For all time
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="content">
                                            <div class="head">
                                                <h5 class="mb-0">Traffic Overview</h5>
                                                <p class="text-muted">Current year website visitor data</p>
                                            </div>
                                            <div class="canvas-wrapper">
                                                <canvas class="chart" id="trafficflow"></canvas>
                                            </div>
                                            <div class="ui hidden divider"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="content">
                                            <div class="head">
                                                <h5 class="mb-0">Sales Overview</h5>
                                                <p class="text-muted">Current year sales data</p>
                                            </div>
                                            <div class="canvas-wrapper">
                                                <canvas class="chart" id="sales"></canvas>
                                            </div>
                                            <div class="ui hidden divider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Top Visitors by Country</h5>
                                        <p class="text-muted">Current year website visitor data</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <table class="table no-margin bg-lighter-grey">
                                            <thead class="success">
                                                <tr>
                                                    <th>Country</th>
                                                    <th class="text-right">Unique Visitors</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-us"></i> United States</td>
                                                    <td class="text-right">27,340</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-in"></i> India</td>
                                                    <td class="text-right">21,280</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-jp"></i> Japan</td>
                                                    <td class="text-right">18,210</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-gb"></i> United Kingdom</td>
                                                    <td class="text-right">15,176</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-es"></i> Spain</td>
                                                    <td class="text-right">14,276</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-de"></i> Germany</td>
                                                    <td class="text-right">13,176</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-br"></i> Brazil</td>
                                                    <td class="text-right">12,176</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-id"></i> Indonesia</td>
                                                    <td class="text-right">11,886</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-ph"></i> Philippines</td>
                                                    <td class="text-right">11,509</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="flag-icon flag-icon-nz"></i> New Zealand</td>
                                                    <td class="text-right">1,700</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Most Visited Pages</h5>
                                        <p class="text-muted">Current year website visitor data</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <table class="table no-margin bg-lighter-grey">
                                            <thead class="success">
                                                <tr>
                                                    <th>Page Name</th>
                                                    <th class="text-right">Visitors</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>/about.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">8,340</td>
                                                </tr>
                                                <tr>
                                                    <td>/special-promo.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">7,280</td>
                                                </tr>
                                                <tr>
                                                    <td>/products.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">6,210</td>
                                                </tr>
                                                <tr>
                                                    <td>/documentation.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">5,176</td>
                                                </tr>
                                                <tr>
                                                    <td>/customer-support.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">4,276</td>
                                                </tr>
                                                <tr>
                                                    <td>/index.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">3,176</td>
                                                </tr>
                                                <tr>
                                                    <td>/products-pricing.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">2,176</td>
                                                </tr>
                                                <tr>
                                                    <td>/product-features.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">1,886</td>
                                                </tr>
                                                <tr>
                                                    <td>/contact-us.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">1,509</td>
                                                </tr>
                                                <tr>
                                                    <td>/terms-and-condition.html <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-right">1,100</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="blue large-icon mb-2 fas fa-thumbs-up"></i>
                                            <h4 class="mb-0">+21,900</h4>
                                            <p class="text-muted">FACEBOOK PAGE LIKES</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="orange large-icon mb-2 fas fa-reply-all"></i>
                                            <h4 class="mb-0">+22,566</h4>
                                            <p class="text-muted">INSTAGRAM FOLLOWERS</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="grey large-icon mb-2 fas fa-envelope"></i>
                                            <h4 class="mb-0">+15,566</h4>
                                            <p class="text-muted">E-MAIL SUBSCRIBERS</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="olive large-icon mb-2 fas fa-dollar-sign"></i>
                                            <h4 class="mb-0">+98,601</h4>
                                            <p class="text-muted">TOTAL SALES</p>
                                        </div>
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
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>