<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;
// echo Session::getSessionData('loggedin');
if (!Session::getSessionData('adminlog')) {
    header('location:login.php');
}
$conn = new Database;
if (isset($_POST['add'])) {
    $writers = $_POST['writers'];
    if (empty($writers)) {
        echo "must Need value";
    } else {
        $sql= "INSERT INTO `writers`(`id`, `writername`, `privacy`, `created`, `updated`, `deleted`) VALUES (NULL,'".$writers."','1',NULL,NULL,NULL)";

        // $sql = "INSERT INTO `categories`(`id`, `catname`,`privacy`, `created`, `updated`, `deleted`) VALUES (NULL,'" . $cat . "','1',NULL,NULL,NULL)";
        //   echo $sql;
        $res = $conn->db->query($sql);
        // header("localhost:addcategories.php");
    }
}
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
    <link href="assets/css/style.css" rel="stylesheet">
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
                        <h3>Add Writers
                            <a href="writers.php" class="btn btn-sm btn-outline-primary float-right">View Writers</a>
                            <!-- <a href="roles.html" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Roles</a> -->
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                        <div class="box-body">
                            <div class="card mt-2 card-des">
                                <div class="card-body">
                                    <form action="" method="post">
                                        <label for="writers">Add Writer</label>
                                        <input class="form-control my-3" type="text" name="writers" placeholder="Writer name here">
                                        <input class="form-control btn btn-info" type="submit" name="add" value="Add">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="recent-category">
                            <table class="table table-striped">
                                <tr>
                                    <th>Writers Name</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                define('PAGE_SIZE', 5);
                                $defaultpage = 1;
                                if (isset($_GET['page'])) {
                                    $defaultpage = $_GET['page'];
                                }
                                $recordStart = ($defaultpage - 1) * PAGE_SIZE;
                                $pagi = "SELECT COUNT(*) AS total FROM writers WHERE privacy='1'";
                                $allpagei = $conn->db->query($pagi);
                                $allpageiCount = $allpagei->fetch_assoc();
                                // echo $allpageiCount['total'];
                                $totalPage = ceil($allpageiCount['total'] / PAGE_SIZE);

                                $sql = "SELECT `id`, `writername`, `privacy`, `created`, `updated`, `deleted`,date(`created`) as dat FROM `writers` WHERE privacy='1' ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                                $res = $conn->db->query($sql);
                                if ($res->num_rows > 0) {
                                    while ($catlist = $res->fetch_assoc()) {
                                        echo ' <tr>
                                <td>' . $catlist['writername'] . '</td>
                                <td>' . $catlist['dat'] . '</td>
                                <td>
                                
                                <a href="editwriters.php?id=' . $catlist['id'] . '" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                 <a href="deletewriters.php?id=' . $catlist['id'] . '" class="btn btn-outline-info btn-rounded" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                                       </td>
                                </tr>';
                                    }
                                }
                                ?>

                            </table>
                            <div class="writerpagination d-flex justify-content-center">
                                <nav aria-label="Page navigation example ">
                                    <ul class="pagination">
                                        <li class="page-item <?php echo ($defaultpage <= 1) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $defaultpage - 1 ?>">Preview</a></li>
                                        <?php
                                        for ($i = 1; $i <= $totalPage; $i++) {
                                            if (abs($defaultpage - $i) < 3) {


                                                if ($defaultpage == $i) {
                                                    echo ' <li class="page-item active"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a></li>';
                                                    // echo '<a class="page active" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a>';
                                                } else {
                                                    echo ' <li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a></li>';
                                                }
                                            }
                                        }
                                        ?>
                                        <li class="page-item <?php echo ($defaultpage == $totalPage) ? "disabled" : "" ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $defaultpage + 1 ?>">Next</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
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