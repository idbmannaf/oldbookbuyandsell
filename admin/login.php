<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

$conn = new Database;

if (Session::getSessionData("adminlog")) {
    header("Location:dashboard.php");
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if (empty($email) || empty($pass)) {
        $msg = Database::validationMessage('Email or password invalid', 'danger');
        echo "danger";
    } else {
        $query = "SELECT * FROM `users` WHERE `email`='" . $email . "' and role= '2' limit 1";
        // echo $sql;
        $queryResutl = $conn->db->query($query);
        if ($queryResutl->num_rows == 1) {
            $row = $queryResutl->fetch_assoc();

            if ($email != $row['email']) {
                echo "email missing";
            }
            if (password_verify($pass, $row['pass'])) {
                Session::setSessionData("adminlog", TRUE);
                Session::setSessionData('adminuser', $row['uname']);
                Session::setSessionData('adminemail', $row['email']);
                header('location:dashboard.php');
            }
        }
    }
}

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="assets/img/logo.png" alt="bootstraper logo">
                    </div>
                    <h6 class="mb-4 text-muted">Login to your account</h6>
                    <form action="" method="POST">
                        <div class="form-group text-left">
                            <label for="email">Email adress</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group text-left">
                            <label for="password">Password</label>
                            <input name="pass" type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember me on this device</label>
                            </div>
                        </div>
                        <input name="login" type="submit" value="Login" class="btn btn-primary shadow-2 mb-4">
                    </form>
                    <p class="mb-2 text-muted">Forgot password? <a href="forgot-password.html">forget password</a></p>

                </div>
            </div>
        </div>
    </div>
    <?php include "partial/footer.php" ?>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>