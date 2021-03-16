<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

$conn = new Database;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once ("partial/head.php") ?>
      
    <style>
        .post-item {
            border: 2px solid gray;
        }

        * {
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <!-- menu start -->
    <?php require('partial/nav.php') ?>
    <!-- menu End -->

    <!-- latest Post Start -->
    <section class="slider">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- owl carosol start -->
                    <div class="letest-product  owl-carousel">
                        <?php

                        // $conn = new mysqli("localhost","root","","bookbs");
                        $sql = 'SELECT books.*,writers.writername, categories.catname FROM books
JOIN writers on books.writerid = writers.id JOIN categories on books.cid = categories.id  WHERE books.privacy ="1" and sold="1" ORDER BY created DESC LIMIT 10';
// echo $sql;
                        $result = $conn->db->query($sql);
                        if ($result->num_rows > 0) {
                            while ($data = $result->fetch_assoc()) {
                                echo '<div class="slide-items shadow my-3">
<a href="postview.php?id=' . $data['id'] . '"><img class="img-fluid img-rounded" src="assest/img/bookimg/' . $data['images'] . '" alt=""></a>
<h4><a class="text-center" href="postview.php?id=' . $data['id'] . '">' . mb_substr($data['booktitle'], 0, 20) . '</a></h4>
<p class="m-0"><b>Price: </b> ' . $data['price'] . ' TK</p>
<p class="m-0"><b>Category: </b> <a href="catewisebooks.php?cid=' . $data['cid'] . '">' . mb_substr($data['catname'], 0, 20) . '</a></p>

<p class="mb-1"><b>Writer: </b> <a href="writerdetails.php?wid=' . $data['writerid'] . '">' . mb_substr($data['writername'], 0, 20) . '</a></p>
<a class="btn btn-outline-info form-control" href="postview.php?id=' . $data['id'] . '">Read More</a>
</div> ';
                            }
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest Post end -->
    <!-- Recent Post Start -->
    <div class="recent-post mt-5 ">
        <div class="container">
            <h1 class=" fw-bold">Populer Post</h1>
            <div class="row">

                <?php
                define('PAGE_SIZE', 4);
                $defaultpage = 1;
                if (isset($_GET['page'])) {
                    $defaultpage = $_GET['page'];
                }
                $recordStart = ($defaultpage - 1) * PAGE_SIZE;
                $pagi = "SELECT COUNT(*) AS total FROM books WHERE privacy='1' and sold='1'";
                $allpagei = $conn->db->query($pagi);
                $allpageiCount = $allpagei->fetch_assoc();
                // echo $allpageiCount['total'];
                $totalPage = ceil($allpageiCount['total'] / PAGE_SIZE);
                // echo $totalPage;

                // $pubsql = "SELECT * FROM books WHERE privacy = 1 and deleted is NULL ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                $pubsql = "SELECT books.*,date(books.created) as dat, users.uname, categories.catname,writers.writername FROM books JOIN users ON books.uid = users.id JOIN categories ON books.cid = categories.id JOIN writers ON books.writerid = writers.id WHERE books.privacy = '1' and books.sold='1' ORDER BY created ASC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                // echo $pubsql;
                $result = $conn->db->query($pubsql);
                if ($result->num_rows > 0) {
                    while ($list = $result->fetch_assoc()) {
                        echo '<div class="post-item books-items mb-4 col-lg-3 col-md-4 col-sm-6 ">
                 <a href="postview.php?id=' . $list['id'] . '"><img src="assest/img/bookimg/' . $list['images'] . '" width="100%" height="250px" alt=""></a>
                 <h5 class="mt-2"><span class="fw-bold "></span><a href="postview.php?id=' . $list['id'] . '">' .mb_substr($list['booktitle'],0,20). '</a></h5>
                 <p class="m-0"><span class="fw-bold">Price: </span> ' . $list['price'] . ' TK</p>
                 <p class="m-0"><span class="fw-bold">Writer: </span> <a href=" writerdetails.php?wid=' . $list['writerid'] . '">' . mb_substr($list['writername'],0,20) . '</a></p>
                 <p class="m-0"><span class="fw-bold">Date: </span>' . $list['dat'] . '</p>
                 <a class="btnd  form-control " href="postview.php?id=' . $list['id'] . '">More Details</a>
             </div>';
                    }
                }

                ?>



            </div>
        </div>
    </div>
    </div>
    <div class="writerpagination d-flex justify-content-center">
        <nav aria-label="Page navigation example ">
            <ul class="pagination">
                <li class="page-item <?php echo ($defaultpage <= 1) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $defaultpage - 1 ?>">Preview</a></li>
                <?php
                for ($i = 1; $i <= $totalPage; $i++) {
                    if (abs($defaultpage - $i) < 3) {


                        if ($defaultpage == $i) {
                            echo ' <li class="page-item active"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a></li>';
                            // echo '<a class="page active" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a>';
                        } else {
                            echo ' <li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a></li>';
                        }
                    }
                }
                ?>
                <li class="page-item <?php echo ($defaultpage == $totalPage) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $defaultpage + 1 ?>">Next</a></li>

            </ul>
        </nav>
    </div>
    <!-- Recent Post End -->
    <!-- Categorys Start -->
    <div class="catagory-section">
        <!-- <div class="cat bg-nav">
        <div class="container"><h1 class="fw-700 text-start  text-white p-3">Categories</h1></div>
    </div> -->
        <div class="container bg-white">
            <h1 class="text-start fw-bold">Categories</h1>
            <div class="d-flex catlist">

                <?php
                $csql = "SELECT books.*,categories.catname, count(*) as total  FROM `books` inner join categories on books.cid = categories.id WHERE books.privacy=1 group by books.cid";
                $cResult = $conn->db->query($csql);
                if ($cResult->num_rows > 0) {

                    while ($catrow = $cResult->fetch_assoc()) {

                        echo '<a href="catewisebooks.php?cid=' . $catrow['cid'] . '">' . $catrow['catname'] . '</a>';
                    }
                }
                ?>
            </div>

        </div>
    </div>
    <!-- Categorys End -->

    <!-- Writers start -->
    <div class="allwriters my-5">
        <!-- <div class="writer bg-nav">
        <div class="container"><h1 class="fw-700 text-start  text-white p-3">Writers</h1></div>
    </div> -->
        <div class="container">
            <h1 class="text-start fw-bold my-4">Writers</h1>
            <div class="latest-writers row">


                <?php

                define('WRITER_SIZE', 8);
                $defaultpage = 1;
                if (isset($_GET['writer'])) {
                    $defaultpage = $_GET['writer'];
                }
                $recordStart = ($defaultpage - 1) * WRITER_SIZE;
                $pagi = "SELECT COUNT(*) AS total FROM writers WHERE deleted is NULL";
                $allpagei = $conn->db->query($pagi);
                $allpageiCount = $allpagei->fetch_assoc();
                // echo $allpageiCount['total'];
                $totalPage = ceil($allpageiCount['total'] / WRITER_SIZE);
                // echo $totalPage;


                $q = "SELECT * FROM writers WHERE deleted is NULL ORDER by created DESC LIMIT " . $recordStart . "," . WRITER_SIZE . "";
                $r = $conn->db->query($q);
                if ($r->num_rows > 0) {
                    while ($l = $r->fetch_assoc()) {
                        echo '<div class="writer-item col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4 text-center">
    <a href="writerdetails.php?wid=' . $l['id'] . '"> <img class="shadow" src="assest/img/authorimg/alpha/' . strtolower(mb_substr($l['writername'], 0, 1)) . '.png" alt=""></a>
    <h5 class="m-0"><a href="writerdetails.php?wid=' . $l['id'] . '">' . $l['writername'] . '</a></h5>
    
</div>';
                    }
                }
                ?>

            </div>
            <div class="writerpagination d-flex justify-content-center">
                <nav aria-label="Page navigation example ">
                    <ul class="pagination">
                        <li class="page-item <?php echo ($defaultpage <= 1) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?writer=' . $defaultpage - 1 ?>">Preview</a></li>
                        <?php
                        for ($i = 1; $i <= $totalPage; $i++) {
                            if (abs($defaultpage - $i) < 3) {


                                if ($defaultpage == $i) {
                                    echo ' <li class="page-item active"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?writer=' . $i . '">' . $i . '</a></li>';
                                    // echo '<a class="page active" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a>';
                                } else {
                                    echo ' <li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?writer=' . $i . '">' . $i . '</a></li>';
                                }
                            }
                        }
                        ?>
                        <li class="page-item <?php echo ($defaultpage == $totalPage) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?writer=' . $defaultpage + 1 ?>">Next</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Writers post End -->
    <!-- footer start  -->
    <?php require('partial/footer.php') ?>
    <!-- footer end -->
    <script src="assest/js/bootstrap.bundle.min.js"></script>
    <script src="assest/js/script.js"></script>
    <script src="assest/js/jquery-3.5.1.min.js"></script>
    <script src="assest/js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.main-menu nav .toggle').click(function() {
                $('.main-menu nav .all-menu').slideToggle();
            });

            $(".letest-product").owlCarousel({
                autoplay: true,
                nav: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        loop: true
                    },
                    600: {
                        items: 3,
                        nav: true,
                        loop: true
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: true
                    }
                }

            });





        });
    </script>
</body>

</html>