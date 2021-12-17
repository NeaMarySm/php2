<?php

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

require_once '../vendor/autoload.php';
require_once './BD_connection.php';

$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader, []);
$dir = '..';

$image_id = $_GET['id'];
$title = 'Image' . $image_id;
$result = mysqli_query($link, "select `file`, view_count from gallery where id = $image_id");
mysqli_query($link, "update gallery set view_count = view_count+1 where id = $image_id");

while($row = mysqli_fetch_assoc($result)){
    $images[] = $row;
}

mysqli_close($link); 

$template = $twig->load('index2.html.twig');

echo $template->render([
    'title' => $title,
    'dir' => $dir, 
    'images' => $images,
    'image_id' => $image_id

]);