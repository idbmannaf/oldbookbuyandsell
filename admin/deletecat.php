<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;
// echo Session::getSessionData('loggedin');
if (!Session::getSessionData('adminlog')) {
    header('location:login.php');
}
$conn = new Database;

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql= "UPDATE `categories` SET privacy='2' WHERE id=".$id." limit 1";

   $result = $conn->db->query($sql);
   header("location:addcategories.php");
//    header('location:publicbooks.php'):
//    if ($result->affected_rows == 1) {
//       header("location:publicbooks.php");
//    }
}
?>

