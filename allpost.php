
<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

// if(!Session::getSessionData("loggedin")){
//     header("Location:login.php");
// }
$conn= new Database;
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
        integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>

<body>
    <!-- menu start -->
   <?php require ('partial/nav.php') ?>
    <!-- menu End -->
    <!-- Recent Post Start -->
    <div class="recent-post mt-5 ">
        <div class="container">
            <h1 class=" fw-bold">Recent Post</h1>
            <div class="row">

                <?php
                define('PAGE_SIZE', 8);
                $defaultpage = 1;
                if (isset($_GET['page'])) {
                    $defaultpage = $_GET['page'];
                }
                $recordStart = ($defaultpage - 1) * PAGE_SIZE;
                $pagi = "SELECT COUNT(*) AS total FROM post WHERE privacy='1' and deleted is NULL ";
                $allpagei = $conn->db->query($pagi);
                $allpageiCount = $allpagei->fetch_assoc();
                // echo $allpageiCount['total'];
                $totalPage = ceil($allpageiCount['total'] / PAGE_SIZE);
               $uid= Session::getSessionData("userid");
                // $pubsql = "SELECT * FROM post WHERE uid =".$uid." ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                $pusql = "SELECT books.*, users.uname, categories.catname FROM books JOIN users ON books.uid = users.id JOIN categories ON books.cid = categories.id ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                $result = $conn->db->query($pubsql);
                if ($result->num_rows > 0) {
                    while ($list = $result->fetch_assoc()) {
                        echo '<div class="post-item mb-4 col-lg-3 col-md-4 col-sm-6">
                 <a href="#"><img src="assest/img/bookimg/' . $list['image'] . '" width="100%" height="250px" alt=""></a>
                 <h5 class="mt-2"><span class="fw-bold "></span><a href="postview.php?id=' . $list['id'] . '">' . $list['book'] . '</a></h5>
                 <p class="m-0"><span class="fw-bold">Price</span> ' . $list['exprice'] . '</p>
                 <p class="m-0"><span class="fw-bold">Writer: </span> <a href="#">' . $list['writer'] . '</a></p>
                 <p class="m-0"><span class="fw-bold">Date</span>' . $list['created'] . '</p>
                 <div class="details"><a class="btn btn-outline-warning bg-nav" href="bookview.php?id=' . $list['id'] . '">more Details</a></div>
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
                <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
            </ul>
        </nav>
    </div>
    <!-- Writers post End -->
    <script src="assest/js/bootstrap.bundle.min.js"></script>
    <script src="assest/js/script.js"></script>
    <script src="assest/js/jquery-3.5.1.min.js"></script>
    <script>
        $('.main-menu nav .toggle').click(function () {
            $('.main-menu nav .all-menu').slideToggle();
        });
    </script>
</body>

</html>