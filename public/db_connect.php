<?php
try { 
    $link = mysqli_connect("localhost:3308", "root", "", "php_lessons");
} catch (Exception $e){
    echo 'Couldnt connect to DB'. $e->getMessage();
}

// function createProducts($prod_number, $link){
//     $i = 1;
//     while($i<=$prod_number){
//         $title = 'title'.rand(1,1000);
//         $price = random_int(999, 99999);
//         $query = "INSERT INTO product (`title`, `price`) VALUES ('".$title."','".$price."');";
//         mysqli_query($link, $query);
//         $i++;
//     }  
// }

// createProducts(100, $link);
