<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;
use Intervention\Image\ImageManagerStatic as Image;

$conn = new Database;
if (!Session::getSessionData('loggedin')) {
    header('location:login.php');
}
//post validation
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
        <div class="post-book m-auto">
            <div class="card mt-5">
                <div class="card-header bg-info">
                    <h3 class="text-center">Book Post Form</h3>
                </div>
                <?php if (isset($msg)) {
                    echo $msg;
                } ?>
                <div class="card-body">
                    <form action="" method="post" ENCTYPE="multipart/form-data">
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
                            <input type="checkbox" value="1" id="check"> Click here for Write Writer Name
                            <input class="form-control" disabled type="text" id="writ" name="wname" placeholder="Writer Name here">
                            <!-- <input class="form-control " type="text" id="wname" name="wname" value="<?php echo $_POST['wname'] ?? ""; ?>"> -->
                        
                    </form>

                </div>
            </div>
        </div>
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
        $(document).ready(function(){   
           $("#check").click(function(){
            var v = $("#check").val();
            if (v==1) {
                $("#wname").toggleAttr('disabled','disabled');
            }
           
           });
        });
    </script>
</body>

</html>