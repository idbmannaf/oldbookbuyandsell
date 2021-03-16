<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Session;
use App\classes\Database;
// echo Session::getSessionData('loggedin');
if (!Session::getSessionData('loggedin')) {
    header("location:login.php");
}
$conn = new Database;
?>
<?php
if (isset($_POST['update'])) {
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
    // if (isset()) {
    //     # code...
    // }

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
    } 
    elseif (!$_FILES['photo']['name']) {
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

            $postSql = " UPDATE `books` SET `uid`='" . $uid . "',`cid`='" . $category . "',`scid`='" . $_POST['subcat'] . "',`lid`='" . $lan . "',`writerid`='" . $writer . "',`booktitle`='" . $book . "',`bookdesc`='" . $details . "',`pubname`='idk',`mrp`='" . $mrp . "',`price`='" . $price . "',`phone`='" . $cell . "',`divid`='" . $div . "',`disid`='" . $_POST['dis'] . "',`images`='" . $originalName . "',`sold`='1',`privacy`='1',`status`='1',`created`=NULL,`updated`=NULL,`deleted`=NULL WHERE id='" . $_GET['id'] . "'";
            // echo $postSql;

            $conn->db->query($postSql);
            if ($conn->db->affected_rows == 1) {
                $msg = Database::validationMessage('Post Updated', 'success');
            }
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
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM books WHERE id='" . $id . "'";
                    $res = $conn->db->query($sql);
                    if ($res->num_rows == 1) {
                        $post = $res->fetch_assoc();

                ?>
                        <div class="post-book m-auto">
                            <div class="card mt-5">
                                <div class="card-header bg-info">
                                    <h3 class="text-center">Update Book</h3>
                                </div>
                                <?php if (isset($msg)) {
                                    echo $msg;
                                } ?>
                                <div class="card-body">
                                    <form action="" method="post" ENCTYPE="multipart/form-data">
                                        <div class="mb-4">
                                            <label class="form-label" for="bname">Book Name</label>
                                            <input class="form-control " type="text" id="bname" name="bname" value="<?php echo $post['booktitle'] ?? ""; ?>">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="wname">Writer/Author</label>
                                            <select class="form-control" name="wname" id="wname" value="<?php echo $post['booktitle'] ?? ""; ?>>
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
                            <!-- <input class=" form-control " type=" text" id="wname" name="wname" value="<?php echo $_POST['wname'] ?? ""; ?>"> -->
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="bmrp">Book MRP</label>
                                            <input class="form-control " type="text" id="bmrp" name="mrp" value="<?php echo $post['mrp'] ?? ""; ?>">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="price">Expected Price</label>
                                            <input class="form-control " type="text" id="price" name="price" value="<?php echo $post['price'] ?? ""; ?>">

                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="cat">Category</label>
                                            <select class="form-control" name="category" id="cate" value="<?php echo $post['cid'] ?? ""; ?>">



                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="sucat" id="subcat">SubCategories</label>
                                            <select class="form-control" name="subcat" id="subcate" value="<?php echo $post['scid'] ?? ""; ?>">

                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label" for="cell">Phone</label>
                                            <input class="form-control " type="text" id="cell" name="cell" value="<?php echo $post['phone'] ?? ""; ?>">
                                        </div>


                                        <div class="mb-4">
                                            <label class="form-label" for="lan">Language</label>
                                            <select class="form-control" name="lan" id="lan" value="<?php echo $post['lan'] ?? ""; ?>">
                                                <?php
                                                $optionsql = "SELECT * FROM language where 1";
                                                $Result = $conn->db->query($optionsql);
                                                if ($Result->num_rows > 0) {
                                                    while ($list = $Result->fetch_assoc()) {
                                                        
                                                        echo '<option value="'. $list['id'] .'">' . $list['lanname'] . '</option>';
                                                    }
                                                }
                                                // '.$list['lan'] ? "selected": "".'
                                                ?>


                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="divi">Division</label>
                                            <select class="form-control" name="divi" id="divi" value="<?php echo $post['divid'] ?>">


                                            </select>
                                            <select class="form-control mt-2" name="dis" id="dis" value="<?php echo $post['disid'] ?? ""; ?>">

                                            </select>

                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="Phootos">Photos</label>
                                            <input class="form-control " type="file" id="Phootos" name="photo">
                                            <img class="mt-2" width="100px" name="oldimg" src="assest/img/bookimg/<?php echo $post['images'] ?? ""; ?>" alt="" srcset="">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="details">About Book</label>
                                            <textarea class="form-control " id="details" name="details"><?php echo $post['bookdesc'] ?? ""; ?></textarea>

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
                                        <input class="btn btn-info mb-5" type="submit" name="update" value="Update" id="">

                                    </form>

                                </div>
                            </div>
                        </div>
                <?php   }
                } ?>
            </div>

    <!--  post End -->
    <!-- footer start  -->
    <?php require 'partial/footer.php' ?>
    <!-- footer end -->
    <script src="assest/js/bootstrap.bundle.min.js"></script>
    <script src="assest/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="assest/js/jquery-3.5.1.min.js"></script>
    <script>
        $('.main-menu nav .toggle').click(function() {
            $('.main-menu nav .all-menu').slideToggle();
        });

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