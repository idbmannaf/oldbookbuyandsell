
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
    <!-- menu End -->
   
    <!-- postView start -->
    <div class="postview bg-white">
        <div class="container">
            <!-- <div class="card m-auto">
                <img class="img-responsive" src="assest/img/bookimg/gitangoli.jpg" height="400px alt="">
                <div class="card-body">
                </div>
            </div> -->

            <?php
                if (isset($_GET['id'])) {
                   $id = $_GET['id'];
                   $sql = "SELECT post.*, users.uname, categories.name FROM post JOIN users ON post.uid = users.id JOIN categories ON post.cid = categories.id WHERE post.id =".$id." LIMIT 1";
                   $result= $conn->db->query($sql);
                   $list = $result->fetch_assoc();
                   
                
            ?>
            <div class="my-5 col-sm-12 ">
               <div class="postimg"> <img class="img-responsive" src="assest/img/bookimg/<?php echo $list['image'] ?>" width="100%" height="400px"  alt="">
               </div>
               <div class="au-cd d-flex justify-content-between">
                   <p> <i class="fas fa-user"></i> Author: <?php echo $list['uname'] ?></p>
                   <p> <i class="fas fa-calendar-alt"></i> <?php echo $list['created'] ?></p>
               </div>
               <table class="table table-striped">
                   <tr>
                       <th>Book Name</th>
                       <td class=""><?php echo $list['book'] ?></td>
                   </tr>
                   <tr>
                       <th>Writer Name</th>
                       <td class=""><?php echo $list['writer'] ?></td>
                   </tr>
                   <tr>
                       <th>Book MRP</th>
                       <td class=""><?php echo $list['mrp'] ?> TK</td>
                   </tr>
                   <tr>
                    <th>Expected Price</th>
                    <td class=""><?php echo $list['exprice'] ?> TK</td>
                </tr>
                   <tr>
                    <th>Location</th>
                    <td class=""><?php echo $list['location'] ?></td>
                </tr>
                   <tr>
                    <th>Contact Number</th>
                    <td class=""><?php echo $list['cell'] ?></td>
                </tr>
                </tr>
                   <tr>
                    <th>Category</th>
                    <td class=""><?php echo $list['name'] ?></td>
                </tr>
                   <!-- <tr>
                    <th>Tags</th>
                    <td class="">Book,</td>
                </tr> -->
                   <tr>
                    <th>Book Details</th>
                    <td class=""><?php echo $list['details'] ?></td>
                </tr>
                <?php } ?>
               </table>
               <div class="comment">
                   <form action="" method="post">
                       <label for="comment"> Comment</label>
                      <textarea class="form-control" name="comment" id="comment"></textarea>
                      <input class="mt-3 btn btn-primary" type="submit" name="commentsubmit">
                   </form>
               </div>
               <div class="allcomment">
                   <h3 class="text-center">All Comment</h3>
                   <div class="card">
                       <div class="card-header">
                           Comment By: userid
                       </div>
                       <div class="card-body">
                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, odit! Quaerat praesentium adipisci harum iure nam.
                       </div>
                   </div>
               </div>
            </div>
        
        </div>
    </div>
    <!-- postView End -->
         <!-- footer start  -->
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