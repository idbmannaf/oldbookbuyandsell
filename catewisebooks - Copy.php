<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

// if(!Session::getSessionData("loggedin")){
//     header("Location:login.php");
// }

if(!isset($_GET['cid'])){ die(); exit;}
else{
    $cid = filter_var($_GET['cid'],FILTER_VALIDATE_INT);
}

$conn = new Database;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy or sale your Book</title>
    <link rel="stylesheet" href="assest/css/bootstrap.min.css">
    <link rel="stylesheet" href="assest/css/style.css">
    <link rel="stylesheet" href="assest/css/respnsive.css">
    <link rel="stylesheet" href="assest/css/myhelpercss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <style>
        .content-section {
            display: flex;


        }
        #tt{
            height: 80vh;
        }
    </style>

</head>

<body>
    <!-- menu start -->
    <?php require('partial/nav.php') ?>
    
    <!-- menu End -->
    <!-- Post Start -->
    <section class="main-cat clearfix">
        <div class="container">

            <div class="cate shadow overflow-hidden">
                <a class="text-end fs-50 cattoggle" href="#">Categories <i class="fas fa-bars"></i></a>
                <div class="list-group">
                    <!-- <a href="#" class="list-group-item list-group-item-action bg-nav text-white" aria-current="true">
                       Sub Categories
                    </a> -->
                    <p class="list-group-item list-group-item-action bg-nav text-white">SubCategories</p>
                 
                    <?php require('partial/subcat.php') ?>

                </div>


            </div>

            <!-- Category end -->


            <!-- Article area -->
            <div class="article-area">
                <div class="row a" id="tt">
                <div class="b"></div>
                <?php
                define('PAGE_SIZE', 3);
                $defaultpage = 1;
                if (isset($_GET['page'])) {
                    $defaultpage = $_GET['page'];
                }
                $recordStart = ($defaultpage - 1) * PAGE_SIZE;

                $allbooksPagiSQL = "SELECT count(*) as total FROM books where privacy = 1 and cid=".$cid."";
                $PagiSQLResult = $conn->db->query($allbooksPagiSQL);
                $pagiFetch = $PagiSQLResult->fetch_assoc();
                $totalPage = ceil($pagiFetch['total'] / PAGE_SIZE);
                // echo $totalPage;

                $sql = "SELECT books.*, date(books.created) as dat, users.uname, users.email, categories.catname,subcat.name as subcat, language.lanname,writers.writername,division.divname,district.disname FROM books
                    JOIN users ON books.uid = users.id
                    JOIN categories ON books.cid = categories.id
                    JOIN subcat ON books.scid = subcat.id
                    JOIN language ON books.lid = language.id
                    JOIN writers ON books.writerid = writers.id
                    JOIN division ON books.divid = division.id
                    JOIN district ON books.disid = district.id where books.privacy = 1 and books.cid=".$cid."  ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                $result = $conn->db->query($sql);
                // $list = $result->fetch_assoc();
$catid = "";

                if ($result->num_rows > 0) {
                    // echo '<h2 class="font-weight-bold text-gray text-center mb-3">All '.$catname .' Post</h2>';
                    while ($postlist = $result->fetch_assoc()) {
                        $catname = $postlist['catname'];
                        
                       echo '<div class="post-item mb-4 col-lg-4 col-md-4 col-sm-6 ">
                        <a href="#"><img src="assest/img/bookimg/' . $postlist['images'] . '" width="100%" height="250px" alt=""></a>
                        <h5 class="mt-2"><span class="fw-bold "></span><a href="postview.php?id=' . $postlist['id'] . '">' .mb_substr($postlist['booktitle'],0,20). '</a></h5>
                        <p class="m-0"><span class="fw-bold">Price: </span> ' . $postlist['price'] . '</p>
                        <p class="m-0"><span class="fw-bold">Writer: </span> <a href=" writerdetails.php?wid=' . $postlist['writerid'] . '">' . mb_substr($postlist['writername'],0,20) . '</a></p>
                        <p class="m-0"><span class="fw-bold">Date: </span>' . $postlist['dat'] . '</p>
                        <a class="btnd  form-control " href="postview.php?id=' . $postlist['id'] . '">More Details</a>
                    </div>';
                           
                    }
                    
                   
                    
                }

                ?>

                <!-- PAGINATION -->
                <div class="writerpagination d-flex justify-content-center mt-2">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php echo ($defaultpage <= 1) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?cid='.$cid. '&page=' . $defaultpage -1  ?>">Preview</a></li>
                            <?php
                            for ($i = 1; $i <= $totalPage; $i++) {
                                if (abs($defaultpage - $i) < 3) {


                                    if ($defaultpage == $i) {
                                        echo ' <li class="page-item active"><a class="page-link" href="' . $_SERVER['PHP_SELF'] .'?cid='.$cid. '&page=' . $i . '">' . $i . '</a></li>';
                                        // echo '<a class="page active" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a>';
                                    } else {
                                        echo ' <li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] .'?cid='.$cid. '&page=' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                            }
                            ?>
                            <li class="page-item <?php echo ($defaultpage == $totalPage) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?cid='.$cid. '&page=' . $defaultpage +1  ?>">Next</a></li>

                        </ul>
                    </nav>
                </div>

<div id="hello"></div>

            </div>
            </div>
    </section>
    <!--  post End -->



    <!-- footer  -->
    <?php require('partial/footer.php') ?>
    <!-- footer end -->

    <script src="assest/js/bootstrap.bundle.min.js"></script>
    <script src="assest/js/script.js"></script>
    <script src="assest/js/jquery-3.5.1.min.js"></script>
    <script>
        $('.main-menu nav .toggle').click(function() {
            $('.main-menu nav .all-menu').slideToggle();
        });
        $('.main-cat .cattoggle').click(function() {
            $('.main-cat ul').addClass("allcat2");
            $('.main-cat .allcat').slideToggle();
        });

        $(".list-group").on("click", "a", function(e){
            e.preventDefault();
            $(".a").empty();
            $cid= $(this).attr("cid");
            $scid= $(this).attr("scid");
            console.log($cid);
            console.log($scid);
            $.get("servercid.php",{
                cid: $cid,
                scid: $scid
            },function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    if (data.length) {
                        data.forEach(list => {
                            let writer = list
                            $("#tt").append('<div class="post-item mb-4 col-lg-4 col-md-4 col-sm-6 "><a href="#"><img src="assest/img/bookimg/' + list.images + '" width="100%" height="250px" alt=""></a><h5 class="mt-2"><span class="fw-bold "></span><a href="postview.php?id=' + list.id + '">'+list.booktitle.slice(0,20)+ '</a></h5><p class="m-0"><span class="fw-bold">Price: </span> ' + list['price'] + '</p><p class="m-0"><span class="fw-bold">Writer: </span> <a href=" writerdetails.php?wid=' + list.writerid + '">' + list.writername.slice(0,20) + '</a></p><p class="m-0"><span class="fw-bold">Date: "</span>"' + list.dat + '</p><a class="btnd  form-control " href="postview.php?id=' + list.id + '">More Details</a></div>');
                        });
                    }
            });
        });
    </script>
</body>

</html>