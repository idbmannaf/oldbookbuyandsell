<?php

$conn = new mysqli("localhost","root","","bookbs");
if(isset($_POST['id'])){
    $id = filter_var($_POST['id'],FILTER_VALIDATE_INT);
    $sql = "SELECT * FROM district where divid='".$id."'";
    $result = $conn->query($sql);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
}


?>