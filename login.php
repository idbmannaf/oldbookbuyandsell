<?php
require __DIR__ . '/vendor/autoload.php';
use App\classes\Database;
use App\classes\Session;
if(Session::getSessionData("loggedin")){
    header("Location:dashboard.php");
}


if (isset($_POST['signin'])) {
    $conn = new Database();
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if (empty($email) || empty($pass)) {
        $msg = "Email or password missing";
    }
    $query = "SELECT * FROM `users` WHERE `email`='" . $email . "' and role = '1'";
    // echo $query;
    $queryResult = $conn->db->query($query);
    if ($queryResult->num_rows == 1) {
        $record = $queryResult->fetch_assoc();
        if (password_verify($pass, $record['pass'])) {
            // var_dump($record); 
            Session::setSessionData("loggedin", TRUE);
            Session::setSessionData("username", $record['uname']);
            Session::setSessionData("useremail", $record['email']);
            Session::setSessionData("userid", $record['id']);
            header("Location:dashboard.php");
            $msg = Session::getSessionData("Thanks for Sign Up <a href=\"login.php\">Click Here</a> For SignUp",'succsess');
            echo Session::getSessionData('username');
        }
    }
}
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
                    <h3 class="text-center">Login</h3>
                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control " type="email" id="email" name="email">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="pass">password</label>
                            <input class="form-control " type="password" id="pass" name="pass">
                        </div>
                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="" id="remember">
                                <label class="form-lable" for="remember">Remember</label>
                            </div>
                            <input class="btn btn-lg btn-info d-block m-auto" type="submit" value="Login" name="signin" id="">
                            <div class="div d-flex justify-content-between">
                                <p class="mt-2"><a href="#">Forget Password?</a></p>
                                <p class="my-2"><a href="register.php">Create a new account</a></p>
                            </div>

                        </div>
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