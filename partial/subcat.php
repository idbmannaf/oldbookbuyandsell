<?php
use App\classes\Database;
use App\classes\Session;

$conn = new Database();
                    // $catSQL = "SELECT books.`cid`, categories.name ,count(*) as total FROM `books` 
                    // inner join categories on books.cid=categories.id
                    // WHERE books.`privacy`='1' group by books.`cid`"";

                    if (isset($_GET['cid'])) {
                      $maincat= $_GET['cid'];
                      
                      $subsql= "SELECT * FROM `subcat` WHERE cid ='".$maincat."'";
                      $res = $conn->db->query($subsql);
                      
                      if ($res->num_rows >0) {
                        while($sublist = $res->fetch_assoc()){


                            echo '<a id="a" cid="'.$maincat.'" scid="'.$sublist['id'].'" href="'.$_SERVER['PHP_SELF'].'?cid='.$maincat.'&subcid='.$sublist['id'].'" class="list-group-item list-group-item-action">' . $sublist['name'] . ' </a>';
                        }
                      }
                   }
                    ?>
