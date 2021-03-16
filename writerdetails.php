<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

$conn = new Database;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once ("partial/head.php") ?>
    <style>
        .top-level img {
            width: 300px;
            height: 300px;
            display: block;
            border: 10px solid gray;
            border-radius: 50%;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <!-- menu start -->
    <?php require('partial/nav.php') ?>
    <!-- menu End -->
    <!-- Recent Post Start -->
    <div class="container">
<!-- ============================================= -->
<?php
        if (isset($_GET['wid'])) {
            $writerid = $_GET['wid'];
            $wq = "SELECT books.*,date(books.created) as dat, writers.writername,users.uname,language.lanname,categories.catname FROM books 

JOIN writers on books.writerid= writers.id
JOIN users on books.uid= users.id
JOIN language on books.lid= language.id
JOIN categories on books.cid= categories.id
WHERE books.writerid = " . $writerid . "";
            $wresult = $conn->db->query($wq);
            if ($wresult->num_rows > 0) {
                $wlist = $wresult->fetch_assoc();

        ?>
                <div class="top-level">
                    <a href=""><img class="shadow text-center" src="assest/img/authorimg/alpha/<?php echo strtolower(mb_substr($wlist['writername'], 0, 1)) ?>.png" alt="" srcset=""></a>
                    <h1 class="text-center"><a href=""><?php echo $wlist['writername']; ?></a></h1>
                </div>
                <div style="width:250px; height:8px; background-color:black; text-align:center; margin:0 auto;"></div>
                

  

<?php }
        } ?>
<!-- ============================================= -->
<?php
        if (isset($_GET['wid'])) {
            $writerid = $_GET['wid'];
            $wq = "SELECT books.*,date(books.created) as dat, writers.writername,users.uname,language.lanname,categories.catname FROM books 

JOIN writers on books.writerid= writers.id
JOIN users on books.uid= users.id
JOIN language on books.lid= language.id
JOIN categories on books.cid= categories.id
WHERE books.writerid = " . $writerid . "";
            $wresult = $conn->db->query($wq);
            if ($wresult->num_rows > 0) {
                while($wlist = $wresult->fetch_assoc()):

        ?>
               <div class="bottom-level">
                    <div class="card">
                        <div class="card-body my-5">
                            
                            <table class="table table-striped">
                            <tr>
                            <td class="text-center" colspan="2"><a href=""><img class="img-fluid w-50 text-center" src="assest/img/bookimg/<?php echo $wlist['images']; ?>" alt="" srcset=""></a></td>
                            </tr>
                                <tr>
                                    <th colspan="2"><h2><a href=""><?php echo $wlist['booktitle']; ?></a></h2></th>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td><?php echo $wlist['price']; ?> TK</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td><?php echo $wlist['catname']; ?></td>
                                </tr>
                                <tr>
                                    <th>Language</th>
                                    <td><?php echo $wlist['lanname']; ?></td>
                                </tr>
                                <tr>
                                    <th>Desciption</th>
                                    <td><?php echo $wlist['bookdesc']; ?></td>
                                </tr>
                                <tr>
                                   
                                    <td colspan="2"><a class="btn btn-info" href="postview.php?id=<?php echo $wlist['id'];?>">Read More</a></td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>

                </div>

  

<?php endwhile;}}
         ?>

    </div>
   

<!-- Writers post End -->
<!-- footer start  -->
<?php require('partial/footer.php') ?>
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