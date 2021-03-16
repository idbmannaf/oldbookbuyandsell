<?php
use App\classes\Database;
use App\classes\Session;

$conn = new Database();
                    // $catSQL = "SELECT books.`cid`, categories.name ,count(*) as total FROM `books` 
                    // inner join categories on books.cid=categories.id
                    // WHERE books.`privacy`='1' group by books.`cid`"";

                    if (isset($_GET['id'])) {
                        $maincat= $_GET['id'];
                        $subsql= "SELECT * FROM `subcat` WHERE cid ='".$maincat."'";
                        $res = $conn->db->query($subsql);
                        
                        $sublist = $res->fetch_assoc();
                        echo json_encode($sublist);
                     }
                    ?>