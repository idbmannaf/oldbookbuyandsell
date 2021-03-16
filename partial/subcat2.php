<?php
use App\classes\Database;
use App\classes\Session;

$conn = new Database();
                    // $catSQL = "SELECT books.`cid`, categories.name ,count(*) as total FROM `books` 
                    // inner join categories on books.cid=categories.id
                    // WHERE books.`privacy`='1' group by books.`cid`"";

                    if (isset($_GET['subcid'])) {
                        $maincat= $_GET['subcid'];
                        $subsql= "SELECT books.*,subcat.name, count(*) as total  FROM `books` inner join categories on books.scid = subcat.id WHERE books.privacy=1  group by books.scid";
                        $res = $conn->db->query($subsql);
                        
                        if ($res->num_rows >0) {
                          while($sublist = $res->fetch_assoc()){
                              echo '<a href="subcatebooks.php?subcid='.$sublist['id'].'" class="list-group-item list-group-item-action">' . $sublist['name'] . ' </a>';
                          }
                        }
                     }
                    ?>
