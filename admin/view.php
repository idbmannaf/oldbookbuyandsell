<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;
// echo Session::getSessionData('loggedin');
if (!Session::getSessionData('adminlog')) {
    header('location:login.php');
}
$conn = new Database;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Public Users</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
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
                   <div class="card">
                       <div class="card-body">
                       <!-- <div class="card m-auto">
                <img class="img-responsive" src="assest/img/bookimg/gitangoli.jpg" height="400px alt="">
                <div class="card-body">
                </div>
            </div> -->

            <?php
                if (isset($_GET['id'])) {
                   $id = $_GET['id'];
                //    $sql = "SELECT post.*, users.uname, categories.name FROM post JOIN users ON post.uid = users.id JOIN categories ON post.cid = categories.id WHERE post.id =".$id." LIMIT 1";
                   $sql = "SELECT books.*, users.uname, categories.catname,subcat.name as subcat, language.lanname,writers.writername,division.divname,district.disname FROM books
                   JOIN users ON books.uid = users.id
                   JOIN categories ON books.cid = categories.id
                   JOIN subcat ON books.scid = subcat.id
                   JOIN language ON books.lid = language.id
                   JOIN writers ON books.writerid = writers.id
                   JOIN division ON books.divid = division.id
                   JOIN district ON books.disid = district.id
                   WHERE books.id =".$_GET['id']." LIMIT 1";
                   $result= $conn->db->query($sql);
                   $list = $result->fetch_assoc();
                //    echo $list['image'];
                
            ?>
            <div class="my-5 col-sm-12 ">
               <div class="postimg text-center"> <a data-lightbox="image-one" href="../assest/img/bookimg/<?php echo $list['images']  ?>"><img  class="img-responsive" src="../assest/img/bookimg/<?php echo $list['images'] ?>" width="600px" height="500px"  alt=""></a>
               </div>
               <div class="au-cd d-flex justify-content-between">
                   <p> <i class="fas fa-user"></i> Posted By: <a href="#"><?php echo $list['uname'] ?></a></p>
                   <p> <i class="fas fa-calendar-alt"></i> <?php echo $list['created'] ?></p>
               </div>
               <table class="table table-striped">
                   <tr>
                       <th>Book Name</th>
                       <td class=""><?php echo $list['booktitle'] ?></td>
                   </tr>
                   <tr>
                       <th style="width:250px">Writer Name</th>
                       <td class="w-10"><a href="#"><?php echo $list['writername'] ?></a></td>
                   </tr>
                   <?php if (isset($list['pubname'])) {
               
                      echo '<tr>
                      <th>Publisher Name</th>
                      <td class=\"\">'.$list['pubname'].'</td>
                  </tr>';
                   } ?>
                   <tr>
                       <th>Book MRP</th>
                       <td class=""><?php echo $list['mrp'] ?> TK</td>
                   </tr>
                   <tr>
                    <th>Expected Price</th>
                    <td class=""><?php echo $list['price'] ?> TK</td>
                </tr>
                   <tr>
                    <th>Division</th>
                    <td class=""><?php echo $list['divname'] ?></td>
                </tr>
                   <tr>
                    <th>District</th>
                    <td class=""><?php echo $list['disname'] ?></td>
                </tr>
                   <tr>
                    <th>Contact Number</th>
                    <td class=""><?php echo $list['phone'] ?></td>
                </tr>
                </tr>
                   <tr>
                    <th>Category</th>
                    <td class=""><?php echo $list['catname'] ?></td>
                </tr>
                   <tr>
                    <th>Subcategory</th>
                    <td class=""><?php echo $list['subcat'] ?></td>
                </tr>
                   <!-- <tr>
                    <th>Tags</th>
                    <td class="">Book,</td>
                </tr> -->
                   <tr>
                    <th>Book Details</th>
                    <td class=""><?php echo $list['bookdesc'] ?></td>
                </tr>
                <?php } ?>
               </table>
               
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
    <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>