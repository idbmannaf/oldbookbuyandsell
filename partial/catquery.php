<?php
use App\classes\Database;
use App\classes\Session;

$conn = new Database();
                    // $catSQL = "SELECT books.`cid`, categories.name ,count(*) as total FROM `books` 
                    // inner join categories on books.cid=categories.id
                    // WHERE books.`privacy`='1' group by books.`cid`"";

                    $catesql = "SELECT books.*,categories.catname, count(*) as total  FROM `books` inner join categories on books.cid = categories.id WHERE books.privacy=1 group by books.cid";
                    $catResult = $conn->db->query($catesql);
                    if ($catResult->num_rows > 0) {
                        while ($catlist = $catResult->fetch_assoc()) {
                            echo '<a href="catewisebooks.php?cid='.$catlist['cid'].'" class="list-group-item list-group-item-action">' . $catlist['catname'] . ' ('.$catlist['total'].')</a>';
                          
                        }
                    }
                    ?>
