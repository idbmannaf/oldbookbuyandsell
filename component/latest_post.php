<?php

$conn = new mysqli("localhost","root","","bookbs");
$sql = 'SELECT books.*,writers.writername FROM books
JOIN writers on books.writerid = writers.id WHERE privacy = 1 LIMIT 10';
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);
?>