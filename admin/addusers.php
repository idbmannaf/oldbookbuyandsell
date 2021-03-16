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
<?php

if (isset($_POST['aduser'])) {
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $privacy = $_POST['privacy'];
    if (empty($user)) {
        $msg= "Usrname Missing";
    } elseif (empty($pass)) {
        $msg= "Password Missing";
    }elseif (empty($email)) {
        $msg= "Email Missing";
    }elseif (empty($privacy)) {
        $msg= "Privacy Missing";
    }else {
        $hasspass= password_hash($pass,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`id`, `uname`, `email`, `pass`, `token`, `status`, `role`, `created`, `updated`, `deleted`) VALUES (NULL,'".$user."','".$email."','".$hasspass."',NULL,'1','".$privacy."',NULL,NULL,NULL)";
        //   echo $sql;
        $res = $conn->db->query($sql);
        Session::setSessionData('usermsg',"User Added");
        // header('location:users.php');
         $msg = Session::getFlashData('usermsg','success');
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
                        <h3> Add Users/Admin
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="card mt-2 card-des">
                            <?php 
                            if (isset($msg)) {
                            //    echo $msg;
                               echo Database::validationMessage($msg,"warning");
                            }
                            
                            ?>
                                <div class="card-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" name="username" placeholder="username">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="example@example.com">
                                        <label for="pass">Password</label>
                                        <input class="form-control" type="password" name="pass" id="pass" placeholder="*******">
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
                                        <input class="form-control btn btn-info" type="submit" name="aduser" value="Add">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table width="100%" class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM users ORDER BY created DESC";
                                    $sqlResult = $conn->db->query($sql);
                                    if ($sqlResult->num_rows > 0) {
                                        while ($userlist = $sqlResult->fetch_assoc()) {
                                            if ($userlist['role'] == 1) {
                                               $role= '<span style="color:green;">Normal User</span>';
                                            }elseif ($userlist['role'] == 2) {
                                                $role= '<span style="color:gold;"><b>Admin</b></span>';
                                            }
                                            elseif ($userlist['role'] == 4) {
                                                $role= '<span style="color:red;">Deleted</span>';
                                            }
                                           
                                            echo '<tr>
                                            <td>' . $userlist['uname'] . '</td>
                                            <td>' . $userlist['email'] . '</td>
                                            <td>' . $userlist['pass'] . '</td>
                                            <td>' . $role . '</td>
                                            <td class="text-right">
                                                <a href="useredit.php?id='.$userlist['id'].'" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                                <a href="userdelete.php?id='.$userlist['id'].'" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                            
                                                </td>
                                            </tr>';
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        
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