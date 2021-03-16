<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;
// echo Session::getSessionData('loggedin');
if (!Session::getSessionData('adminlog')) {
    header('location:login.php');
}
$conn = new Database;
if (isset($_POST['update'])) {
  $cat = $_POST['cate'];
  $id = $_GET['id'];
  if (empty($cat)) {
    echo "must Need value";
  }else{
    //   $catid= "UPDATE `comments` SET `comments`= '".$cat."' WHERE id='".$_GET['id']."'";
      $catid= "UPDATE `comments` SET `comment`='".$_POST['cate']."' WHERE `id`='".$_GET['id']."'";
    //   echo $catid;
     $res= $conn->db->query($catid);
     header("location:comments.php");
     
  }
}
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
    <link href="assets/css/style.css" rel="stylesheet">
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
                    <div class="page-title">
                        <h3> Edit Commnet 
                        </h3>
                    </div>

                    <?php
if (isset($_GET['id'])) {
    $sql= "SELECT * FROM `comments` WHERE id='".$_GET['id']."'";
    // echo $sql;
    $result = $conn->db->query($sql);
    if ($result->num_rows > 0) {
       $catlist = $result->fetch_assoc();



                    ?>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="card mt-2 card-des">
                            <div class="card-body">
                            <form action="" method="post">
                            <label for="categories">Update Categories</label>
                            
                            <textarea name="cate" id="cate" class="form-control my3"><?php echo $catlist['comment'] ?></textarea>
                            <input class="form-control btn btn-info" type="submit" name="update" value="update">
                            </form>
                            </div>
                            </div>
                        </div>
                       <?php     
                       } }?>
                </div>
            </div>
        </div>
        </div>
    </div>
    <?php include "partial/footer.php" ?>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script> -->
    <script src="assets/js/script.js"></script>
</body>

</html>