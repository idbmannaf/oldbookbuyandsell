<?php

$conn = new mysqli("localhost","root","","bookbs");
$sql = 'SELECT * FROM categories where 1';
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);

?>