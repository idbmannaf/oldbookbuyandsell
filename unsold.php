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
   $sql= "UPDATE `books` SET sold='1' and privacy='1' WHERE id=".$id." limit 1";

   $result = $conn->db->query($sql);
   header("location:dashboard.php");
}
?>