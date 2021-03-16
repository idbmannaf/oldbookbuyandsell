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
    <title>Users | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php require "partial/sidebar.php" ?>
        <div id="body" class="active">
            <!-- Navbar start -->
            <?php require "partial/navbar.php" ?>
            <!-- Navbar End -->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                    <?php
 
    //   echo Database::validationMessage(Session::getSessionData('usermsg'),'primary');

                    ?>
                        <h3>Admins
                        <a href="addusers.php" class="btn btn-sm btn-outline-primary float-right">Add Admin</a>
                            
                            <!-- <a href="roles.html" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Roles</a> -->
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
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
                                    $sql = "SELECT * FROM users where role = '2' ORDER BY created DESC";
                                    $sqlResult = $conn->db->query($sql);
                                    if ($sqlResult->num_rows > 0) {
                                        while ($userlist = $sqlResult->fetch_assoc()) {

                                            if ($userlist['role'] ==2) {
                                                $role= "Admin";
                                             }
                                            echo '<tr>
                                            <td>' . $userlist['uname'] . '</td>
                                            <td>' . $userlist['email'] . '</td>
                                            <td>' . $userlist['pass'] . '</td>
                                            <td>' . $role . '</td>
                                            <td class="text-right">
                                                <a title="Edit" href="useredit.php?id='.$userlist['id'].'" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                                <a title="Delete" href="userdelete.php?id='.$userlist['id'].'" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
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
    </div>
    <?php include "partial/footer.php" ?>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>