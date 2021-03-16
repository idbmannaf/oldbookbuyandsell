<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

if (!Session::getSessionData("loggedin")) {
    header("Location:login.php");
}
$conn = new Database;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy or sale your Book</title>
    <link rel="stylesheet" href="assest/css/bootstrap.min.css">
    <link rel="stylesheet" href="assest/css/style.css">
    <link rel="stylesheet" href="assest/css/respnsive.css">
    <link rel="stylesheet" href="assest/css/myhelpercss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <style>
        .card {
            width: 60%;
            margin: 0 auto;
            margin-top: 20px;
        }

        .profile {
            font-family: ubunto;
        }

        .profile img {
            width: 200px;
            height: 200px;
            border: 10px solid #fff;
            border-radius: 50%;
            display: block;
            margin: auto;
        }

        .profile h2 {
            text-align: center;
            font-family: sigmar one;
        }

        .profile h4 {
            text-align: center;
            font-family: candara;
        }
    </style>
</head>

<body>
    <!-- menu start -->
    <?php include "partial/nav.php" ?>
    <!-- Profile End -->
    <div class="container">

        <div class="card shadow">
            <div class="dash-edit d-flex justify-content-between">
                <p><a class="btn btn-info" href="dashboard.php">Back to Dashboard</a></p>
                <p><a class="btn btn-info" href="updateprofile.php">Edit Profile</a></p>

            </div>


            <div class="card-body profile">
           <a href=""> Hellos frst</a>
                <?php
                // Session::getSessionData('userid')
                $q = "SELECT profile.*, users.uname,users.email
            FROM profile
            JOIN users on profile.uid=users.id WHERE uid=" . Session::getSessionData('userid') . "";
                // echo ($q);
                $Result = $conn->db->query($q);
                if ($Result->num_rows == 1) {
                    $row = $Result->fetch_assoc();
                    echo $row['uname'];

                ?>
                    <img class="shadow" src="<?php
                                                if (isset($row['image'])) {
                                                    echo 'assest/img/authorimg/' . $row['image'] . '';
                                                } else {
                                                    $name = Session::getSessionData('username');
                                                    $alpha = strtolower(mb_substr($name, 0, 1));
                                                    echo 'assest/img/authorimg/alpha/' . $alpha . '.png';
                                                }
                                                ?>" alt="">
                    <h2><?php echo $row['fullname']; ?></h2>

                    <table class="table table-striped">
                        <tr>
                            <td>UserName</td>
                            <td><?php echo $row['uname']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $row['email']; ?></td>
                        </tr>

                        <tr>
                            <td>Bio</td>
                            <td><?php echo $row['bio']; ?></td>
                        </tr>

                        <tr>
                            <td>Created Date</td>
                            <td><?php echo $row['created']; ?></td>
                        </tr>
                    </table>
            </div>
        <?php } ?>
        </div>

    </div>
    <!-- Profile start  -->
    <?php require 'partial/footer.php' ?>
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