<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

if (!Session::getSessionData("loggedin")) {
    header("Location:login.php");
}
$conn = new Database;
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once ("partial/head.php") ?>
</head>

<body class="bg-white">
    <!-- menu start -->
    <?php include "partial/nav.php" ?>
    <!-- menu End -->
    <div class="col-12 text-center mt-3">
        <?php
        $w = Session::getSessionData('username');
        echo '<H1>Welcome ' . Session::getSessionData('username') . '</H1>';
        // echo Session::getFlashData($w);

        ?>

    </div>
    <!-- Public Post start -->
    <div class="public-post my-3 ">
        <div class="container">

            <h3>Public Post</h3>
            <div class="row">
                <?php
                define('PAGE_SIZE', 4);
                $defaultpage = 1;
                if (isset($_GET['page'])) {
                    $defaultpage = $_GET['page'];
                }
                $recordStart = ($defaultpage - 1) * PAGE_SIZE;

                $allbooksPagiSQL = "SELECT count(*) as total FROM books WHERE privacy=1 and uid=".Session::getSessionData('userid')."";
        //    echo $allbooksPagiSQL;
                $PagiSQLResult = $conn->db->query($allbooksPagiSQL);
                $pagiFetch = $PagiSQLResult->fetch_assoc();
                $totalPage = ceil($pagiFetch['total'] / PAGE_SIZE);
                // echo $totalPage;

                $sql = "SELECT books.*, users.uname, users.email, categories.catname,subcat.name as subcat, language.lanname,writers.writername,division.divname,district.disname FROM books JOIN users ON books.uid = users.id JOIN categories ON books.cid = categories.id JOIN subcat ON books.scid = subcat.id JOIN language ON books.lid = language.id JOIN writers ON books.writerid = writers.id JOIN division ON books.divid = division.id JOIN district ON books.disid = district.id WHERE books.privacy='1' AND uid=" . Session::getSessionData('userid') . " AND books.sold='1' ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                $result = $conn->db->query($sql);
                // $list = $result->fetch_assoc();

                if ($result->num_rows > 0) {
                    while ($postlist = $result->fetch_assoc()) {
                        echo '<div class="post-item books-items mb-4 col-lg-3 col-md-4 col-sm-6 ">
                        <a href="postview.php?id=' . $postlist['id'] . '"><img src="assest/img/bookimg/' . $postlist['images'] . '" width="100%" height="250px" alt=""></a>
                        <div class="user-date bbt d-flex justify-content-between mt-2">
                                    <p>Posted By: ' . $postlist['uname'] . '</p>
                                    <div class="edit-delete text-end fs-5">
                                        <a class="btn btn-outline-info" href="edit.php?id='.$postlist['id'].'"><i class="far fa-edit"></i></a> <a class="btn btn-outline-info" href="delete.php?id='.$postlist['id'].'"><i
                                                class="far fa-trash-alt"></i></a> <a class="btn btn-outline-info" href="sold.php?id=' . $postlist['id'] . '"><i class="fas fa-gavel"></i></a>
                                               
                                    </div>
                                </div>
                        <h5 class="mt-2"><span class="fw-bold "></span><a href="postview.php?id=' . $postlist['id'] . '">' .mb_substr($postlist['booktitle'],0,20). '</a></h5>
                        <p class="m-0"><span class="fw-bold">Price: </span> ' . $postlist['price'] . '</p>
                        <p class="m-0"><span class="fw-bold">Writer: </span> <a href=" writerdetails.php?wid=' . $postlist['writerid'] . '">' . mb_substr($postlist['writername'],0,20) . '</a></p>
                        <a class="btnd  form-control " href="postview.php?id=' . $postlist['id'] . '">More Details</a>
                    </div>';

                       
                    }
                }

                ?>
                <div class="writerpagination d-flex justify-content-center my-3">
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

            </div>

        </div>
    </div>
    <!-- Public Post End -->

    <!--  Private Post start-->
    <div class="private-post my-3">
        <div class="container">
        <div class="row">
            <h3>Private Post</h3>

            <?php

            $defaultpage = 1;
            if (isset($_GET['ppage'])) {
                $defaultpage = $_GET['ppage'];
            }
            $recordStart = ($defaultpage - 1) * PAGE_SIZE;

            $allbooksPagiSQL = "SELECT count(*) as total FROM books WHERE privacy=2";
            $PagiSQLResult = $conn->db->query($allbooksPagiSQL);
            $pagiFetch = $PagiSQLResult->fetch_assoc();
            $totalPage = ceil($pagiFetch['total'] / PAGE_SIZE);
            // echo $totalPage;

            $sql = "SELECT books.*, users.uname, users.email, categories.catname,subcat.name as subcat, language.lanname,writers.writername,division.divname,district.disname FROM books JOIN users ON books.uid = users.id JOIN categories ON books.cid = categories.id JOIN subcat ON books.scid = subcat.id JOIN language ON books.lid = language.id JOIN writers ON books.writerid = writers.id JOIN division ON books.divid = division.id JOIN district ON books.disid = district.id WHERE books.privacy='2' AND uid=" . Session::getSessionData('userid') . " ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
            $result = $conn->db->query($sql);
            // $list = $result->fetch_assoc();

            if ($result->num_rows > 0) {
                while ($postlist = $result->fetch_assoc()) {

                    echo '<div class="post-item books-items mb-4 col-lg-3 col-md-4 col-sm-6 ">
                        <a href="postview.php?id=' . $postlist['id'] . '"><img src="assest/img/bookimg/' . $postlist['images'] . '" width="100%" height="250px" alt=""></a>
                        <div class="user-date d-flex justify-content-between mt-2">
                                    <p>Posted By: ' . $postlist['uname'] . '</p>
                                    <div class="edit-delete text-end fs-5">
                                        <a class="btn btn-outline-info" href="edit.php?id='.$postlist['id'].'"><i class="far fa-edit"></i></a> <a class="btn btn-outline-info" href="delete.php?id='.$postlist['id'].'"><i
                                                class="far fa-trash-alt"></i></a> <a class="btn btn-outline-info" href="privatetopublic.php?id='.$postlist['id'].'"><i
                                                class="fas fa-thumbs-up"></i></a>
                                    </div>
                                </div>
                        <h5 class="mt-2"><span class="fw-bold "></span><a href="postview.php?id=' . $postlist['id'] . '">' .mb_substr($postlist['booktitle'],0,20). '</a></h5>
                        <p class="m-0"><span class="fw-bold">Price: </span> ' . $postlist['price'] . '</p>
                        <p class="m-0"><span class="fw-bold">Writer: </span> <a href=" writerdetails.php?wid=' . $postlist['writerid'] . '">' . mb_substr($postlist['writername'],0,20) . '</a></p>
                        <a class="btnd  form-control " href="postview.php?id=' . $postlist['id'] . '">More Details</a>
                    </div>';

                }
            }

            ?>
           

            </div>
            <div class="writerpagination d-flex justify-content-center my-3">
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination">
                            <li class="page-item <?php echo ($defaultpage <= 1) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?ppage=' . $defaultpage - 1 ?>">Preview</a></li>
                            <?php
                            for ($i = 1; $i <= $totalPage; $i++) {
                                if (abs($defaultpage - $i) < 3) {


                                    if ($defaultpage == $i) {
                                        echo ' <li class="page-item active"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?ppage=' . $i . '">' . $i . '</a></li>';
                                        // echo '<a class="page active" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a>';
                                    } else {
                                        echo ' <li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?ppage=' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                            }
                            ?>
                            <li class="page-item <?php echo ($defaultpage == $totalPage) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?ppage=' . $defaultpage + 1 ?>">Next</a></li>

                        </ul>
                    </nav>
                </div>
        </div>
    </div>
    <!--  Private Post End-->
    <!-- Soled -->
    <div class="sold-post my-3 ">
        <div class="container">
            <h3>Sold Books</h3>
            <div class="row">
                <?php

                $defaultpage = 1;
                if (isset($_GET['spage'])) {
                    $defaultpage = $_GET['spage'];
                }
                $recordStart = ($defaultpage - 1) * PAGE_SIZE;

                $allbooksPagiSQL = "SELECT count(*) as total FROM books WHERE sold='2'";
                $PagiSQLResult = $conn->db->query($allbooksPagiSQL);
                $pagiFetch = $PagiSQLResult->fetch_assoc();
                $totalPage = ceil($pagiFetch['total'] / PAGE_SIZE);
                // echo $totalPage;

                $sql = "SELECT books.*, users.uname, users.email, categories.catname,subcat.name as subcat, language.lanname,writers.writername,division.divname,district.disname FROM books JOIN users ON books.uid = users.id JOIN categories ON books.cid = categories.id JOIN subcat ON books.scid = subcat.id JOIN language ON books.lid = language.id JOIN writers ON books.writerid = writers.id JOIN division ON books.divid = division.id JOIN district ON books.disid = district.id WHERE books.sold='2' AND uid=" . Session::getSessionData('userid') . " ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                $result = $conn->db->query($sql);
                // $list = $result->fetch_assoc();

                if ($result->num_rows > 0) {
                    while ($postlist = $result->fetch_assoc()) {
                        echo '<div class="post-item books-items mb-4 col-lg-3 col-md-4 col-sm-6 ">
                        <a href="postview.php?id=' . $postlist['id'] . '"><img src="assest/img/bookimg/' . $postlist['images'] . '" width="100%" height="250px" alt=""></a>
                        <div class="user-date d-flex justify-content-between mt-2">
                                    <p>Posted By: ' . $postlist['uname'] . '</p>
                                    <div class="edit-delete text-end fs-5">
                                        <a class="btn btn-outline-info" href="edit.php?id='.$postlist['id'].'"><i class="far fa-edit"></i></a> <a class="btn btn-outline-info" href="delete.php?id='.$postlist['id'].'"><i
                                                class="far fa-trash-alt"></i></a> <a class="btn btn-outline-info" href="privatetopublic.php?id='.$postlist['id'].'"><i
                                                class="fas fa-thumbs-up"></i></a>
                                    </div>
                                </div>
                        <h5 class="mt-2"><span class="fw-bold "></span><a href="postview.php?id=' . $postlist['id'] . '">' .mb_substr($postlist['booktitle'],0,20). '</a></h5>
                        <p class="m-0"><span class="fw-bold">Price: </span> ' . $postlist['price'] . '</p>
                        <p class="m-0"><span class="fw-bold">Writer: </span> <a href=" writerdetails.php?wid=' . $postlist['writerid'] . '">' . mb_substr($postlist['writername'],0,20) . '</a></p>
                        <div class="readmor-sold d-flex justify-content-between">
                                   <p class="m-0"><a class="btn btnd btn-info mt-3 " href="postview.php?id=' . $postlist['id'] . '">Read more</a></p>
                                   <p  class="m-0"><a class="btn   btn-outline-info mt-3 " href="unsold.php?id=' . $postlist['id'] . '">Unsold</a></p>
                               </div>
                    </div>';

                       
                    }
                }

                ?>
<div class="writerpagination d-flex justify-content-center my-3">
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination">
                            <li class="page-item <?php echo ($defaultpage <= 1) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?spage=' . $defaultpage - 1 ?>">Preview</a></li>
                            <?php
                            for ($i = 1; $i <= $totalPage; $i++) {
                                if (abs($defaultpage - $i) < 3) {


                                    if ($defaultpage == $i) {
                                        echo ' <li class="page-item active"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?spage=' . $i . '">' . $i . '</a></li>';
                                        // echo '<a class="page active" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a>';
                                    } else {
                                        echo ' <li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?spage=' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                            }
                            ?>
                            <li class="page-item <?php echo ($defaultpage == $totalPage) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?spage=' . $defaultpage + 1 ?>">Next</a></li>

                        </ul>
                    </nav>
                </div>

            </div>
          
        </div>
    </div>

    <!-- footer start  -->
    <?php require('partial/footer.php') ?>
    <!-- footer end -->
    <script src="assest/js/bootstrap.bundle.min.js"></script>
    <script src="assest/js/script.js"></script>
    <script src="assest/js/jquery-3.5.1.min.js"></script>
    <script>
        $('.main-menu nav .toggle').click(function() {
            $('.main-menu nav .all-menu').slideToggle();
        });
    </script>
</body>

</html>