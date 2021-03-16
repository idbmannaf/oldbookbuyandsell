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
    <title>Public Users</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
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
                        <h3> Sold Books <span>(<?php

$newq = "SELECT count(*) as publicbook FROM books where sold = '2'";
$newResult =  $conn->db->query($newq);
if ($newResult->num_rows > 0) {
    $newlist = $newResult->fetch_assoc();
    echo $newlist['publicbook'];
}
?>)</span>
                            <a href="roles.html" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Roles</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>username</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Phone</th>
                                        <th>division</th>
                                        <th>Categories</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT books.*, users.uname, users.email, categories.catname,subcat.name as subcat, language.lanname,writers.writername,division.divname,district.disname FROM books JOIN users ON books.uid = users.id JOIN categories ON books.cid = categories.id JOIN subcat ON books.scid = subcat.id JOIN language ON books.lid = language.id JOIN writers ON books.writerid = writers.id JOIN division ON books.divid = division.id JOIN district ON books.disid = district.id WHERE sold = '2' ORDER BY created DESC";
                                        $result= $conn->db->query($sql);
                                        if ($result->num_rows >0) {
                                           while($rows = $result->fetch_assoc()){
                                               echo ' <tr>
                                               <td>'.$rows['uname'].'</td>
                                               <td>'.$rows['email'].'</td>
                                               <!-- use substr($title,0,20) -->
                                               <td>'.$rows['booktitle'].'</td>
                                               <td>'.$rows['price'].'</td>
                                               <td>'.$rows['phone'].'</td>
                                               <td>'.$rows['divname'].'</td>
                                               <td>'.$rows['catname'].'</td>
       
                                               <td><a href="#"><img src="../assest/img/bookimg/'.$rows['images'].'" width="60px" alt=""></a></td>
       
                                               <td class="text-right">
                                                   <a title="View" href="view.php?id='.$rows['id'].'" class="btn btn-outline-danger btn-rounded"><i class="fas fa-eye"></i></a> <br>
                                                   <a title="Edit This Book" href="edit.php?id='.$rows['id'].'" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a> <br>
                                                   <a title="Delete" href="delete.php?id='.$rows['id'].'" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                                   <a title="Click Here for Public" href="privatetopublic.php?id='.$rows['id'].'" class="btn btn-outline-danger btn-rounded"><i class="fas fa-thumbs-up"></i></i></a>
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