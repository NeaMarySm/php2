<?php

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

require_once '../vendor/autoload.php';
require_once './BD_connection.php';

$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader, []);
$dir = '..';

try {
    $result = mysqli_query($link, 'select * from gallery where 1 order by view_count desc');
$images = [];
while($row = mysqli_fetch_assoc($result)){
    $images[] = $row;
} 
mysqli_close($link); 

$template = $twig->load('index.html.twig');

echo $template->render([
    'title' => 'Gallery',
    'dir' => $dir, 
    'images' => $images

]);
} catch (Exception $exception){
    echo 'ERROR:'. $exception->getMessage();
}
