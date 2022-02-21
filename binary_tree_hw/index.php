<?php

require 'Parser.php';
require 'Node.php';
require 'Tree.php';

$parser = new Parser();
$tree = new Tree();

$str = "(x+42)^2+7*y-z";
$arr = $parser->run($str);
$tree->buildTree($arr);
echo "<pre>";
print_r($tree);
echo "</pre>";

echo $str;
echo '<br>равно = ' . $tree->runCalculation(15, 2, 14); //3249



