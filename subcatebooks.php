<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

// if(!Session::getSessionData("loggedin")){
//     header("Location:login.php");
// }

if(!isset($_GET['subcid'])){ die(); exit;}
else{
    $cid = filter_var($_GET['subcid'],FILTER_VALIDATE_INT);
}

$conn = new Database;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once ("partial/head.php") ?>
    <style>
        .content-section {
            display: flex;


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
                    <a href="#" class="list-group-item list-group-item-action bg-nav text-white" aria-current="true">
                       Sub Categories
                    </a>
                 
                    <?php require('partial/subcat2.php') ?>

                </div>


            </div>

            <!-- Category end -->


            <!-- Article area -->
            <div class="article-area">
                <div class="row">
                <?php
                define('PAGE_SIZE', 3);
                $defaultpage = 1;
                if (isset($_GET['page'])) {
                    $defaultpage = $_GET['page'];
                }
                $recordStart = ($defaultpage - 1) * PAGE_SIZE;

                $allbooksPagiSQL = "SELECT count(*) as total FROM books where privacy = 1 and scid=".$cid."";
                // echo $allbooksPagiSQL;
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
                    JOIN district ON books.disid = district.id where books.privacy = 1 and books.scid=".$cid."  ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
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
    </script>
</body>

</html>