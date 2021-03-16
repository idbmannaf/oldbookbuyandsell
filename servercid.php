<?php
require __DIR__ . '/vendor/autoload.php';
use App\classes\Database;
use App\classes\Session;

$conn = new Database();
                    // $catSQL = "SELECT books.`cid`, categories.name ,count(*) as total FROM `books` 
                    // inner join categories on books.cid=categories.id
                    // WHERE books.`privacy`='1' group by books.`cid`"";

                    if (isset($_GET['cid'])) {
                      $cid= $_GET['cid'];
                      $scid= $_GET['scid'];
                    //   echo $scid;
                    // $subsql = "SELECT * FROM books WHERE cid='".$cid."' and scid='".$scid."'";
                    // $subsql = "SELECT * FROM books WHERE cid='".$cid."' and scid='".$scid."'";
                    $subsql= "SELECT books.*, date(books.created) as dat, users.uname, users.email, categories.catname,subcat.name as subcat, language.lanname,writers.writername,division.divname,district.disname FROM books
                    JOIN users ON books.uid = users.id
                    JOIN categories ON books.cid = categories.id
                    JOIN subcat ON books.scid = subcat.id
                    JOIN language ON books.lid = language.id
                    JOIN writers ON books.writerid = writers.id
                    JOIN division ON books.divid = division.id
                    JOIN district ON books.disid = district.id where books.privacy = '1' and books.cid='".$cid."' AND books.scid='".$scid."'";
                    //   $subsql= "SELECT * FROM `subcat` WHERE cid ='".$cid."' AND id='".$scid."'";
                      $res = $conn->db->query($subsql);
                      
                     $data = $res->fetch_all(MYSQLI_ASSOC);
                        echo json_encode($data);
                   }
                    ?>