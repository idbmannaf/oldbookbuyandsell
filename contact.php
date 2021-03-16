<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

// if (!Session::getSessionData("loggedin")) {
//     header("Location:login.php");
// }
$conn = new Database;
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once ("partial/head.php") ?>
<style>
.comment-section{
    width: 500px;
    margin: 0 auto;
}
</style>
</head>

<body class="bg-white">
    <!-- menu start -->
    <?php include "partial/nav.php" ?>
    <!-- menu End -->
  <div class="comment-section">
  <form action="" method="post">
  <input class="form-control" type="text" placeholder="Full Name" name="name" required>
  <input class="form-control" type="email" placeholder="example@web.com" name="email" required>
  <input class="form-control" type="text" placeholder="017558725" name="phone" required>
  <textarea class="form-control" name="comment"></textarea>
  <input type="submit" name="Send Massage">
  </form>
  </div>
    <!-- footer start  -->
    <?php require('partial/footer.php') ?>
    <!-- footer end -->
    <script src="assest/js/bootstrap.bundle.min.js"></script>
    <script src="assest/js/script.js"></script>
    <script src="assest/js/jquery-3.5.1.min.js"></script>
    <script>
        $('.main-menu nav .toggle').click(function() {
            $('.main-menu nav .all-menu').slideToggle();
        });
    </script>
</body>

</html>