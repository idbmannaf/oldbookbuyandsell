
<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

if(!Session::getSessionData("loggedin")){
    header("Location:login.php");
}
$conn= new Database;
?>


<!DOCTYPE html>
<html lang="en">

<head>

<?php require_once ("partial/head.php") ?>

</head>

<body>
    <!-- menu start -->
    <?php include "partial/nav.php" ?>
    <!-- Profile End -->
    <div class="blog-post my-3">
        <div class="container">
            <div class="blog-ites">
                <div class="blog-img text-center"><img class="img-fluid rounded w-75" src="assest/img/blogimg/panda.jpg" alt="">
                </div>
                <div class="blog-content">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>Title</th>
                            <td>
                                <h4><a href="#">Title Here</a></h4>
                            </td>
                        </tr>
                        <tr>
                            <th>username</th>
                            <td>username here</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>category here</td>
                        </tr>
                        <tr>
                            <th>Sub Category</th>
                            <td>Sub category here</td>
                        </tr>
                        <tr>
                            <th>description</th>
                            <td>description here</td>
                        </tr>
                        <tr>
                            <th>tags</th>
                            <td>tags here</td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2"> <a class="btn btn-info" href="#">Read More</a></td>
                        </tr>

                    </table>

                </div>
            </div>
            <div class="blog-ites">
                <div class="blog-img text-center "><img class="img-fluid rounded w-75 " src="assest/img/blogimg/panda.jpg" alt="">
                </div>
                <div class="blog-content">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>Title</th>
                            <td>
                                <h4><a href="#">Title Here</a></h4>
                            </td>
                        </tr>
                        <tr>
                            <th>username</th>
                            <td>username here</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>category here</td>
                        </tr>
                        <tr>
                            <th>Sub Category</th>
                            <td>Sub category here</td>
                        </tr>
                        <tr>
                            <th>description</th>
                            <td>description here</td>
                        </tr>
                        <tr>
                            <th>tags</th>
                            <td>tags here</td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2"> <a class="btn btn-info" href="#">Read More</a></td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Profile start  -->
    <?php require ('partial/footer.php') ?>
    <!-- footer end -->
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