<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;
if (!Session::getSessionData('adminlog')) {
    header('location:login.php');
}
$conn = new Database;
if (isset($_POST['add'])) {
  $div = $_POST['div'];
  $dis = $_POST['dis'];
  if (empty($dis)) {
    echo "must Need value";
  }else{
      $sql = "INSERT INTO `district`(`id`, `divid`, `disname`, `created`, `updated`, `deleted`) VALUES (NULL,'".$div."','".$dis."',NULL,NULL,NULL)";
    //   $sql = "INSERT INTO `subcat`(`id`, `cid`, `name`, `privacy`, `created`, `updated`, `deleted`) VALUES (NULL,'".$_POST['cat']."','".$_POST['subcat']."','1',NULL,NULL,NULL)";
    //   echo $sql;
     $res= $conn->db->query($sql);
header("localhost:addsubcat.php");
     
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
                        <h3> <a href="alllocation.php">Location</a> / Add District 
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="card mt-2 card-des">
                            <div class="card-body">
                            <form action="" method="post">
                            <label for="categories">District</label>
                            <select name="div" id="div" class="form-control">
                            <?php 
                            $sq= "SELECT * FROM division WHERE 1";
                            $catRes= $conn->db->query($sq);
                            if ($catRes->num_rows >0) {
                              while($catrow= $catRes->fetch_assoc()){
                                    echo'<option value='.$catrow['id'].'>'.$catrow['divname'].'</option>';
                              }
                            }
                            ?>
                            
                            </select>
                            <input class="form-control my-3" type="text" name="dis" placeholder="Write District">
                            <input class="form-control btn btn-info" type="submit" name="add" value="Add">
                            </form>
                            </div>
                            </div>
                        </div>
                        <div class="recent-category">
                            
                            <table class="table table-striped">
                            <tr>
                            <th>Division</th>
                            <th>District</th>
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
                             $pagi = "SELECT COUNT(*) AS total FROM district WHERE 1";
                             $allpagei = $conn->db->query($pagi);
                             $allpageiCount = $allpagei->fetch_assoc();
                             // echo $allpageiCount['total'];
                             $totalPage = ceil($allpageiCount['total'] / PAGE_SIZE);

                        $sql = "SELECT district.*, division.divname, date(district.created) as dat FROM district JOIN division ON district.divid=division.id ORDER BY created DESC LIMIT " . $recordStart . "," . PAGE_SIZE . "";
                        $res = $conn->db->query($sql);
                        if ($res->num_rows >0) {
                            while($catlist = $res->fetch_assoc()){
                                echo ' <tr>
                                <td>'.$catlist['divname'].'</td>
                                <td>'.$catlist['disname'].'</td>
                                <td>'.$catlist['dat'].'</td>
                                <td>
                                
                                <a title="Edit" href="editdistrict.php?id='.$catlist['id'].'" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                 <a title="Delete" href="deletedistrict.php?id='.$catlist['id'].'" class="btn btn-outline-info btn-rounded" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
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
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script> -->
    <script src="assets/js/script.js"></script>
</body>

</html>