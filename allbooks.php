<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

// if(!Session::getSessionData("loggedin")){
//     header("Location:login.php");
// }
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

        marquee a {
            border: 2px solid #05495a;
            display: inline-block;
            padding: 5px 10px;
            transition: .5s;
            border-radius: 5px;
            margin-right: 5px;
            color: black;
        }

        marquee a:hover {
            background-color: #05495a;
            color: #fff;
        }
    </style>

</head>

<body>
    <!-- menu start -->
    <?php require('partial/nav.php') ?>
    <!-- menu End -->
    <!-- Post Start -->
    <section class="marque">
        <div class="container">
            <div class="marq">
                <marquee class="p-2" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
            </div>
            <?php
            $mrqSQL = "SELECT * FROM books WHERE privacy='1' ORDER BY created DESC LIMIT 10";
            $mrqRes = $conn->db->query($mrqSQL);
            if ($mrqRes->num_rows > 0) {
                while ($mrqlist = $mrqRes->fetch_assoc()) {
                    echo '<a href="postview.php?id=' . $mrqlist['id'] . '">' . $mrqlist['booktitle'] . '</a>';
                }
            }

            ?>

            </marquee>
        </div>
    </section>

    <section class="main-cat clearfix">
        <div class="container">

            <div class="cate shadow overflow-hidden">
                <div class="maincate w-100">
                    <a class="text-end fs-50 cattoggle" href="#">Categories <i class="fas fa-bars"></i></a>

                    <div class="list-group">
                        <!-- <a href="#" class="list-group-item list-group-item-action bg-nav text-white" aria-current="true">
                       Sub Categories
                    </a> -->
                        <p class="list-group-item list-group-item-action bg-nav text-white">SubCategories</p>

                        <?php require('partial/catquery.php') ?>

                    </div>
                </div>
                <div class="ads mt-5">
                    <a href="#"><img  class=" img-fluid" src="assest/Bkash.jpg" alt=""></a>
                </div>

            </div>


            <!-- Category end -->


            <!-- Article area -->
            <div class="article-area">
                <div class="row">
                    <?php
                    define('PAGE_SIZE', 6);
                    $defaultpage = 1;
                    if (isset($_GET['page'])) {
                        $defaultpage = $_GET['page'];
                    }
                    $recordStart = ($defaultpage - 1) * PAGE_SIZE;

                    $allbooksPagiSQL = "SELECT count(*) as total FROM books";
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
                    JOIN district ON books.disid = district.id ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                    $result = $conn->db->query($sql);
                    // $postlist = $result->fetch_assoc();

                    if ($result->num_rows > 0) {
                        while ($postlist = $result->fetch_assoc()) {
                            echo '<div class="post-item books-items mb-4 col-lg-4 col-md-4 col-sm-6 ">
                 <a href="#"><img src="assest/img/bookimg/' . $postlist['images'] . '" width="100%" height="250px" alt=""></a>
                 <h5 class="mt-2"><span class="fw-bold "></span><a href="postview.php?id=' . $postlist['id'] . '">' . mb_substr($postlist['booktitle'], 0, 20) . '</a></h5>
                 <p class="m-0"><span class="fw-bold">Price: </span> ' . $postlist['price'] . '</p>
                 <p class="m-0"><span class="fw-bold">Writer: </span> <a href=" writerdetails.php?wid=' . $postlist['writerid'] . '">' . mb_substr($postlist['writername'], 0, 20) . '</a></p>
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
        // $('.main-cat .cattoggle').click(function() {
        //     // $('.main-cat .list-group').addClass("allcat2");
        //     $('.main-cat .list-group').slideToggle();
        // });
        $(".cattoggle").click(function(e) {
            e.preventDefault();
            $(".maincate .p").slideToggle(1000);
            $(".list-group").slideToggle(1000);
        });
    </script>
</body>

</html>