<?php
require_once('db_connect.php');

$start = $_GET['page'];
$query = "SELECT `title`, `price` FROM product limit $start, 8; ";
$result = mysqli_query($link, $query);
while($row=mysqli_fetch_assoc($result)){
    $products[]=$row;
}

header('Content-type: application/json');
echo json_encode($products);
mysqli_close($link);


