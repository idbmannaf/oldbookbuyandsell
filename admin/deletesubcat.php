<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;
// echo Session::getSessionData('loggedin');
if (!Session::getSessionData('loggedin')) {
    header('location:login.php');
}
$conn = new Database;

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql= "UPDATE `subcat` SET `privacy`='2' WHERE id='".$_GET['id']."'  LIMIT 1";

   $result = $conn->db->query($sql);
   header("location:addsubcat.php");
//    header('location:publicbooks.php'):
//    if ($result->affected_rows == 1) {
//       header("location:publicbooks.php");
//    }
}
?>

