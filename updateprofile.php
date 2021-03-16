
<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

if (!Session::getSessionData("loggedin")) {
    header("Location:login.php");
}
$conn = new Database;
?>

<?php
if (isset($_POST['update'])) {
    $fname = $_POST['fullname'];
    $bio = $_POST['bio'];
    $location= $_POST['location'];
    $gender= $_POST['gender'];
    $phone= $_POST['phone'];
    $name = $_FILES['photo']['name'];
    $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $originalName = time() . "_" . Session::getSessionData('username') . "_" . rand(1000, 9999) . $name;
    $imagename = "assest/img/authorimg/" . $originalName;
    $userid = Session::getSessionData('userid');

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $msg = Database::validationMessage('Sorry, only JPG, JPEG, PNG & GIF files are allowed', 'success');
    } else {
        move_uploaded_file($_FILES['photo']['tmp_name'], $imagename);

        //   $postSql = "UPDATE `profile` SET uid=".$userid.",`fullname`='". $fname."', bio='". $bio."',image='".$originalName."' id = NULL, created= timestamp,updated=NULL,deleted=NULL limit 1";
        $postSql= "UPDATE `profile` SET `fullname`='" . $fname . "',`bio`='" . $bio . "',`image`='" . $originalName . "',`phone`='".$_POST['phone']."',`location`='".$location."',`gender`='".$gender."' WHERE profile.uid='".$userid."'";
        // echo $postSql;
        $conn->db->query($postSql);
        if ($conn->db->affected_rows >0) {
            $msg = Database::validationMessage('Profile Updated', 'success');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once ("partial/head.php") ?>
<style>
    .card{
        width: 60%;
        margin: 0 auto;
        margin-top:20px;
    }
    .profile{
        font-family: ubunto;
    }
    .profile img{
        width: 200px;
        height: 200px;
        border: 10px solid #fff;
        border-radius: 50%;
        display: block;
        margin: auto;
    }
    .profile h2{
        text-align: center;
        font-family: sigmar one;
    }
    .profile h4{
        text-align: center;
        font-family: candara;
    }
</style>
</head>

<body>
    <!-- menu start -->
    <?php include "partial/nav.php"?>
    <!-- Profile End -->
    <div class="container">

        <div class="card shadow">
        <div class="dash-edit d-flex justify-content-between">
            <p><a class="btn btn-info" href="profile.php">Back to Profile</a></p>
            <?php
if (!Session::getSessionData("loggedin")) {
    echo ' <p><a class="btn btn-info" href="updateprofile.php">Edit Profile</a></p>';
}

?>
<?php
$r = "SELECT * FROM profile WHERE uid='".Session::getSessionData('userid')."' LIMIT 1";
// echo $r;
$re= $conn->db->query($r);
if ($re->num_rows >0) {
   $list = $re->fetch_assoc();


?>

        </div>
            <div class="card-body profile">
            <?php 
        if ($list['image']) {
           echo '<img class="shadow" src="assest/img/authorimg/'.$list['image'].'" alt="">';
        } else{
            $name = Session::getSessionData('username');
            $alpha = strtolower(mb_substr($name, 0, 1));
            echo '<img class="shadow" src="assest/img/authorimg/alpha/'.$alpha.'.png" alt="">';
        }

?>
            
            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-2">
            <label for="fulname">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $list['fullname'] ?>">
            </div>
            <div class="mb-2">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $list['phone'] ?>">
            </div>
            <div class="mb-2">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="<?php echo $list['location'] ?>">
            </div>
            <div class="mb-2">
            <label for="gender">Gender</label>
            <input type="radio"  name="gender"s checked value="Male"> Male
            <input type="radio"   name="gender" value="Female"> Female
            </div>
            <div class="mb-2">
            <label for="photo">Profile Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            <!-- <img width="40px" src="assest/img/authorimg/<?php echo $list['fullname'] ?>" alt=""> -->
            </div>
            <div class="mb-2">
            <label for="bio">About</label>
           <textarea name="bio" id="bio" class="form-control"><?php echo $list['bio'] ?></textarea>
            </div>
            <div class="mb-2">
            <input class="btn btn-info" type="submit" name="update" value="Update">
            </div>
            <?php } ?>
        
            </form>
        </div>
        </div>

    </div>
    <!-- Profile start  -->
    <?php require 'partial/footer.php'?>
    <!-- footer end -->
    <script src="assest/js/bootstrap.bundle.min.js"></script>
    <script src="assest/js/script.js"></script>
    <script src="assest/js/jquery-3.5.1.min.js"></script>
    <script>
        $('.main-menu nav .toggle').click(function () {
            $('.main-menu nav .all-menu').slideToggle();
        });
    </script>
</body>

</html>
