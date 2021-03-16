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
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $email = $_POST['email'];
  $privacy = $_POST['privacy'];
  if (empty($uname)) {
    echo "Username Missing";
  }elseif (empty($pass)) {
    echo "Password Missing";
  }elseif (empty($email)) {
    echo "Email Missing";
  }elseif (empty($privacy)) {
    echo "Privacy Missing";
  }else{
      $passhash= password_hash($pass,PASSWORD_DEFAULT);
      $uid= "UPDATE users SET uname='".$uname."', email='".$email."', pass='".$passhash."',role= '".$privacy."' WHERE id='".$_GET['id']."'";
    //   $uid= "UPDATE `users` SET `uname`='".$uname."',`email`='".$email."',`pass`='".$passhash."',role`='".$privacy."'";
    //   echo $catid;
     $res= $conn->db->query($uid);
     header("location:users.php");
     
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
                        <h3> Edit Users 
                        </h3>
                    </div>

                    <?php
if (isset($_GET['id'])) {
    $sql= "SELECT * FROM `users` WHERE id='".$_GET['id']."'";
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
                            <label for="categories">Update Users</label>
                            <input class="form-control my-3" type="text" name="uname" value="<?php echo $catlist['uname'] ?>">
                            <input class="form-control my-3" type="email" name="email" value="<?php echo $catlist['email'] ?>">
                            <input class="form-control my-3" type="pass" name="pass" placeholder="Write New Password" >
                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="privacy" id="privacy" checked value="1">
                                            <label class="form-check-label" for="privacy">
                                                Public
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="privacy" id="privacy23" value="2">
                                            <label class="form-check-label" for="privacy23">
                                                Admin
                                            </label>
                                        </div>
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