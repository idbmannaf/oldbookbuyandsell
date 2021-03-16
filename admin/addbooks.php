<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Session;
use App\classes\Database;
if (!Session::getSessionData('adminlog')) {
    header("location:login.php");
}
$conn = new Database;

if (isset($_POST['submitpost'])) {
    $uid = Session::getSessionData('userid');
    $book = $_POST['bname'];
    $writer = $_POST['wname'];
    $mrp = $_POST['mrp'];
    $price = $_POST['price'];
    $div = $_POST['divi'];
    // $dis = $_POST['dis'];
    $cell = $_POST['cell'];
    $category = $_POST['category'];
    // $subcat = $_POST['subcat'];
    $lan = $_POST['lan'];
    // $pubname = $_POST['pubn'];
    $details = $_POST['details'];
    $privacy = $_POST['pv'];
    $photo = $_FILES['photo'];
  

    if (empty($book)) {
        $msg = Database::validationMessage('BookName Missing', 'danger');
    } elseif (empty($writer)) {
        $msg = Database::validationMessage('Writer Name Missing', 'danger');
    } elseif (empty($div)) {
        $msg = Database::validationMessage('Division Missing', 'danger');
    } elseif (empty($_POST['dis'])) {
        $msg = Database::validationMessage('District Missing', 'danger');
    } elseif (empty($mrp)) {
        $msg = Database::validationMessage('MRP Missing', 'danger');
    } elseif (empty($price)) {
        $msg = Database::validationMessage('Price Missing', 'danger');
    } elseif (empty($cell)) {
        $msg = Database::validationMessage('Phone Number Missing', 'danger');
    } elseif (empty($lan)) {
        $msg = Database::validationMessage('Language Missing', 'danger');
    } elseif (empty($category)) {
        $msg = Database::validationMessage('Category Missing', 'danger');
    } elseif (empty($_POST['subcat'])) {
        $msg = Database::validationMessage('SubCategory Missing', 'danger');
    } elseif (empty($privacy)) {
        $msg = Database::validationMessage('Select public or private', 'danger');
    } elseif (!$_FILES['photo']['name']) {
        $msg = Database::validationMessage('Picture Missing', 'danger');
    } else {
        $name = $_FILES['photo']['name'];
        $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $originalName = time() . "_" . $uid . "_" . rand(1000, 9999) . $name;
        $imagename = "assest/img/bookimg/" . $originalName;

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $msg = Database::validationMessage('Sorry, only JPG, JPEG, PNG & GIF files are allowed', 'success');
        } else {
            move_uploaded_file($_FILES['photo']['tmp_name'], $imagename);

            $postSql = "INSERT INTO `books`(`id`, `uid`, `cid`, `scid`, `lid`, `writerid`, `booktitle`, `bookdesc`, `pubname`, `mrp`, `price`, `phone`, `divid`, `disid`, `images`, `sold`, `privacy`, `status`, `created`, `updated`, `deleted`)VALUES(NULL,'" . $uid . "','" . $category . "','" . $subcat . "','" . $lan . "','" . $writer . "','" . $book . "','" . $details . "','IDK','" . $mrp . "','" . $price . "','" . $cell . "','" . $div . "','" . $dis . "','" . $originalName . "','1','1','1',NULL,NULL,NULL)";

            // $postSql = "INSERT INTO `post`(`id`, `uid`, `cid`,`lid`, `writer`, `book`, `mrp`, `exprice`, `cell`, `location`, `image`, `details`, `privacy`, `status`, `created`, `updated`, `deleted`) VALUES (NULL,'" . $uid . "','" . $category . "','" . $lan . "','" . $writer . "','" . $book . "','" . $mrp . "','" . $price . "','" . $cell . "','" . $location . "','" . $originalName . "','" . $details . "','" . $privacy . "',1,NULL,NULL,NULL)";
            // echo $postSql;
            $conn->db->query($postSql);
            if ($conn->db->affected_rows == 1) {
                $msg = Database::validationMessage('Post Added', 'success');
            }
        }
    }
    // if (isset($msg)) {
    //     echo $msg;
    // }
}

?>

<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="assets/vendor/chartsjs/Chart.min.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php require("partial/sidebar.php") ?>
        <div id="body" class="active">
            <!-- Navbar start -->
            <?php require("partial/navbar.php") ?>
            <!-- Navbar End -->
            <div class="container">
        <div class="post-book m-auto">
            <div class="card mt-5">
                <div class="card-header bg-info">
                    <h3 class="text-center">Add Books</h3>
                </div>
                <?php if (isset($msg)) {
                    echo $msg;
                } ?>
                <div class="card-body">
                    <form action="" method="post" ENCTYPE="multipart/form-data">
                        <div class="mb-4">
                            <label class="form-label" for="bname">Book Name</label>
                            <input class="form-control " type="text" id="bname" name="bname" value="<?php echo $_POST['bname'] ?? ""; ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="wname">Writer/Author</label>
                            <select class="form-control" name="wname" id="wname">
                                <?php
                                $optionsql = "SELECT * FROM writers";
                                $Result = $conn->db->query($optionsql);
                                if ($Result->num_rows > 0) {
                                    while ($list = $Result->fetch_assoc()) {
                                        echo '<option value="' . $list['id'] . '">' . $list['writername'] . '</option>';
                                    }
                                }
                                ?>


                            </select>
                            <!-- <input class="form-control " type="text" id="wname" name="wname" value="<?php echo $_POST['wname'] ?? ""; ?>"> -->
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="bmrp">Book MRP</label>
                            <input class="form-control " type="text" id="bmrp" name="mrp" value="<?php echo $_POST['mrp'] ?? ""; ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="price">Expected Price</label>
                            <input class="form-control " type="text" id="price" name="price" value="<?php echo $_POST['price'] ?? ""; ?>">

                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="cat">Category</label>
                            <select class="form-control" name="category" id="cate" value="<?php echo $_POST['category'] ?? ""; ?>">



                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="sucat" id="subcat">SubCategories</label>
                            <select class="form-control" name="subcat" id="subcate" value="<?php echo $_POST['category'] ?? ""; ?>">

                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="cell">Phone</label>
                            <input class="form-control " type="text" id="cell" name="cell" value="<?php echo $_POST['cell'] ?? ""; ?>">
                        </div>


                        <div class="mb-4">
                            <label class="form-label" for="lan">Language</label>
                            <select class="form-control" name="lan" id="lan" value="<?php echo $_POST['lan'] ?? ""; ?>">
                                <?php
                                $optionsql = "SELECT * FROM language";
                                $Result = $conn->db->query($optionsql);
                                if ($Result->num_rows > 0) {
                                    while ($list = $Result->fetch_assoc()) {
                                        echo '<option value="' . $list['id'] . '">' . $list['lanname'] . '</option>';
                                    }
                                }
                                ?>


                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="divi">Division</label>
                            <select class="form-control" name="divi" id="divi" value="<?php echo $_POST['divi'] ?? ""; ?>">


                            </select>
                            <select class="form-control mt-2" name="dis" id="dis" value="<?php echo $_POST['dis'] ?? ""; ?>">

                            </select>

                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="Phootos">Photos</label>
                            <input class="form-control " type="file" id="Phootos" name="photo">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="details">About Book</label>
                            <textarea class="form-control " id="details" name="details" value="<?php echo $_POST['details'] ?? ""; ?>"></textarea>
                            <!-- <input class="form-control " type="text" id="details" name="details" value="<?php echo $_POST['details'] ?? ""; ?>"> -->
                        </div>
                        <div class="mb-4">
                            <div class="form-check-inline">
                                <input class="form-check-input" checked type="radio" name="pv" id="public" value="1">
                                <label for="public">Public</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="pv" id="private" value="2">
                                <label for="private">Private</label>
                            </div>

                        </div>
                        <input class="btn btn-info mb-5" type="submit" name="submitpost" id="">

                    </form>

                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    <?php include "partial/footer.php" ?>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        // category 
        function categories() {
            $.post("catserver.php", {}, function(data) {
                data = JSON.parse(data);
                // console.log(data);
                data.forEach(cat => {

                    $("#cate").append("<option id='option' value='" + cat.id + "'>" + cat.catname + "</option>");
                });

            });
        }
        categories();
        $("select#cate").change(function() {
            $("#subcate").empty();
            $cat = $(this).children("option:selected").val();
            // console.log($cat);
            $.post("subcatserver.php", {
                id: $cat
            }, function(data) {
                // console.log(data);
                data = JSON.parse(data);
                if (data.length) {
                    data.forEach(subcat => {
                        console.log(subcat.name);
                        // alert(subcat.name);
                        $("#subcate").append("<option id='option' value='" + subcat.id + "'>" + subcat.name + "</option>");
                    });
                }

            });
        });
        // Division

        function division() {
            $.post("diviserver.php", {}, function(data) {
                data = JSON.parse(data);
                if (data.length) {
                    data.forEach(divi => {
                        $("#divi").append("<option value='" + divi.id + "'>" + divi.divname + "</option>");
                    });
                }
            });
        }
        division();
        $("select#divi").change(function() {
            $("#dis").empty();
            $divid = $(this).children('option:selected').val();
            $.post("disserver.php", {
                id: $divid
            }, function(data) {
                data = JSON.parse(data);
                if (data.length) {
                    data.forEach(dis => {
                        $("#dis").append("<option value='" + dis.id + "'>" + dis.disname + "</option>");
                    });
                }
            });
        });
    </script>
</body>

</html>