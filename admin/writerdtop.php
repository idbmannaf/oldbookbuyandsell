<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Database;
use App\classes\Session;

if (!Session::getSessionData('adminlog')) {
    header('location:login.php');
}
$conn = new Database;

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = "UPDATE `writers` SET `privacy`='1'  WHERE id=".$id." limit 1";
//    $sql= "UPDATE `categories` SET privacy='2' WHERE id=".$id." limit 1";

   $result = $conn->db->query($sql);
   header("location:deletedwriters.php");

}
?>

