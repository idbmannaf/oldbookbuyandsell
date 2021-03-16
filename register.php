<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;
if (Session::getSessionData('loggedin')) {
    header("location:profile.php");
}
$conn = new Database;

if (isset($_POST['register'])) {

    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $repass = $_POST['cpass'];

    if (empty($uname)) {
        $msg = Database::validationMessage("Username Missing",'danger');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = Database::validationMessage("Email Not Valid",'danger');
    } elseif (empty($pass)) {
        $msg = Database::validationMessage("Password Missing",'danger');
    } elseif ($pass != $repass) {
        $msg = Database::validationMessage("Password Not match",'danger');
    } else {
        if ($pass === $repass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (id, uname, email, pass, token, status, role, created, updated, deleted) VALUES (NULL,'" . $uname . "','" . $_POST['email'] . "','" . $hash . "',NULL,'1','1',NULL,NULL,NULL)";
            // echo $sql;
            $queryResutl = $conn->db->query($sql);
            if ($conn->db->affected_rows ==1) {
                // .$conn->db->insert_id  eta dile je registration korese tar id pabe
                $msg = Database::validationMessage("Thanks for Sign Up <a href=\"login.php\">Click Here</a> For login ",'success');
                $sql2 = "INSERT INTO `profile`(`id`, `uid`, `fullname`, `bio`, `image`, `phone`, `location`, `gender`, `created`, `updated`, `deleted`) VALUES (NULL,'".$conn->db->insert_id."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
                $conn->db->query($sql2);
            }
        }
    }
}
// $sql = 'INSERT INTO users(id, uname, email, pass, token, status, role, created, updated, deleted) VALUES (NULL,'.$uname.','.$email.','.$uname.',1,1,1,NULL,NULL,NULL';
// echo $sql;
// if (isset($msg)) {
//     echo $msg;
// }
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
    <!-- Post Start -->
    <div class="container">
        <div class="post-book m-auto">
            <div class="card mt-5">
                <div class="card-header bg-info">
                    <h3 class="text-center">Create Your Account</h3>
                    
                </div>
                <div class="card-body">
                <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                    <form action="" method="post">

                        <div class="mb-4">
                            <label class="form-label" for="uname">Username</label>
                            <input class="form-control " type="text" id="uname" name="uname">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control " type="email" id="email" name="email">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="pass">Password</label>
                            <input class="form-control " type="password" id="pass" name="pass">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="cpass">Confirmation Password</label>
                            <input class="form-control " type="password" id="cpass" name="cpass">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="allow" id="remember">
                            <label class="form-lable" for="remember">Are you agree</label>
                        </div>
                        <input class="btn btn-lg btn-info d-block m-auto" type="submit" value="Register" name="register" id="">
                        <p class="my-2"> If you already created account then <a href="login.php">Login</a></p>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--  post End -->
         <!-- footer start  -->
  <?php require ('partial/footer.php') ?>
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