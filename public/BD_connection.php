<?php
try { 
    $link = mysqli_connect("localhost:3308", "root", "", "php_lessons");
} catch (Exception $e){
    echo 'Couldnt connect to DB'. $e->getMessage();
}