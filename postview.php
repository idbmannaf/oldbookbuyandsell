
<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;
use App\classes\Config;
$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $url;
// if(!Session::getSessionData("loggedin")){
//     header("Location:login.php");
// }
$conn= new Database;
if(isset($_GET['id'])){ 
    $id = ($_GET['id']); 
   $q = "select * from `books` where id='".$id."' limit 1";
         $qr = $conn->db->query($q);
     if($qr->num_rows == 1){
    $info= $qr->fetch_assoc();
   }  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="assest/img/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Buy Your Unused Books</title> -->
    <link rel="stylesheet" href="assest/css/bootstrap.min.css">
    <link rel="stylesheet" href="assest/css/bootstrap.min.css">
    <link rel="stylesheet" href="assest/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assest/css/animate.css">
    <link rel="stylesheet" href="assest/css/style.css">
    <link rel="stylesheet" href="assest/css/respnsive.css">
    <link rel="stylesheet" href="assest/css/myhelpercss.css">
    <link rel="stylesheet" href="assest/font/css/all.min.css">
    <title><?php echo $info['booktitle'] ?></title>
<meta property="og:url"           content="<?php echo $url; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $info['booktitle']; ?>" />
<meta property="og:description"   content="<?php echo $info['bookdesc']; ?>" />
<meta property="og:image"         content="<?php echo Config::siteinfo()['baseurl'] ?>assets/img/bookimg/<?php echo $info['images'];?>" />
</head>

<body>
    <!-- menu start -->
    <?php include "partial/nav.php" ?>
    <!-- menu End -->
   
    <!-- postView start -->
    <div class="postview bg-white">
        <div class="container">


            <?php
                if (isset($_GET['id'])) {
                   $id = $_GET['id'];
                //    $sql = "SELECT post.*, users.uname, categories.name FROM post JOIN users ON post.uid = users.id JOIN categories ON post.cid = categories.id WHERE post.id =".$id." LIMIT 1";
                   $sql = "SELECT books.*,date(books.created) as dat, users.uname, categories.catname,subcat.name as subcat, language.lanname,writers.writername,division.divname,district.disname FROM books
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
               <div class="postimg text-center"> <a href="#""><img  class="img-fluid" src="assest/img/bookimg/<?php echo $list['images'] ?>" width="600px" height="500px"  alt=""></a>
               </div>
               <div class="au-cd d-flex justify-content-between">
                   <p> <i class="fas fa-user"></i> Posted By: <a href="#"><?php echo $list['uname'] ?></a></p>
                   <p> <i class="fas fa-calendar-alt"></i> <?php echo $list['dat'] ?></p>
               </div>
               <table class="table table-striped">
                   <tr>
                       <th>Book Name</th>
                       <td class=""><h4><?php echo $list['booktitle'] ?></h4></td>
                   </tr>
                   <tr>
                       <th style="width:250px">Writer Name</th>
                       <td class="w-10"><a href="writerdetails.php?wid=<?php echo $list['writerid'] ?>"><?php echo $list['writername'] ?></a></td>
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
                <tr><td colspan="2" class="text-end"><div class="" data-href="<?php echo $url; ?>" data-layout="button_count" data-size="large"><h4 ><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>;" class="fb-xfbml-parse-ignore"><img style="width:100px" src="fb.png" alt=""></a></h4></div>
</div></td></tr>
               </table>
               </div>

               <div class="comment">
                   <form action="" method="post">
                       <label for="comment"> Comment</label>


                       <?php
                       if(Session::getSessionData("loggedin")){
                       ?>
                      <textarea class="form-control" name="comment" id="comment"></textarea>
                      <input class="mt-3 btn btn-primary" type="submit" name="commentsubmit">
                      <?php } else{ ?>
                        <div class="com text-center">
                        <p>Please 
<a href="login.php">Login</a> or
<a href="register.php">Register</a>
to Write Comment</p></div>
                      <?php } ?>



                     <?php
                     if (isset($_GET['id'])) {
                        $bid = $_GET['id'];
                     }
 if(isset($_POST['commentsubmit'])){
    $uid = Session::getSessionData("userid");
    $comment= $_POST['comment'];

    
    if(empty($comment)){
        $msg = Database::validationMessage("Write some Comment");
    }else{
        $clearComment= $conn->escape(strip_tags($comment));
        // $sql= "INSERT INTO comments VALUES(NULL,'".$bid."','".$uid."','".$clearComment."',NULL,NULL,NULL)";
        $sql= "INSERT INTO `comments`(`id`, `bookid`, `uid`, `comment`, `privacy`, `created`, `updated`, `deleted`) VALUES (NULL,'".$bid."','".$uid."','".$clearComment."','1',NULL,NULL,NULL)";
        // echo $sql;
        $resutl =$conn->db->query($sql);
        if ($result->num_rows==1) {
          Session::setSessionData('commentmsg','<span style="color:green">Comment Added</span>');
        //   $PAGE = $_SERVER['PHP_SELF'];
        //   header("locatin:".$PAGE."#allcomment");
        }
        
    }
   
}
                     
                     ?>
                 
                   </form>
               </div>
               <div class="allcomment">
                   <h3 class="text-center" id="allcomment">All Comment</h3>
                   <span style="color:green">
                       </span>
                       
                   <?php  
                 
                   $comentSQL= "SELECT comments.*, users.uname,books.booktitle FROM comments JOIN users on comments.uid=users.id JOIN books on comments.bookid=books.id WHERE comments.privacy='1' and comments.bookid=".$bid."";
                $cResult = $conn->db->query($comentSQL);
                if ($cResult->num_rows>0) {
                    while ($cList= $cResult->fetch_assoc()) {
                       echo '<div class="card my-3 shadow"><div class="card-title">
                       <h6 class="m-0"><i class="fas fa-user"></i> '.$cList['uname'].'</h6> 
                   </div>
                   <div class="card-body"> <p class="ms-5"><i class="fas fa-comments"></i>
                   '.$cList['comment'].'</p>
                   </div></div>';
                    }
                }
                   
                   ?>
                  
                       
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
    <script src="assest/plugin/lightbox/js/lightbox.min.js"></script>
    <script>
       $(document).ready(function(){
        $('.main-menu nav .toggle').click(function () {
            $('.main-menu nav .all-menu').slideToggle();
        });

        var getTitle = $(".table h4").text();
      console.log(getTitle);
      $("head title").text(getTitle);

       });
    </script>
</body>

</html>