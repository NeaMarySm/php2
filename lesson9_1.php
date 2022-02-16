<?php

$arr = [];

for($i=0; $i<10000; $i++)
{
    $arr[] = random_int(0, 9999999);
}

function bubbleSort($array){
    for($i=0; $i<count($array); $i++){
    $count = count($array);
       for($j=$i+1; $j<$count; $j++){
           if($array[$i]>$array[$j]){
               $temp = $array[$j];
               $array[$j] = $array[$i];
               $array[$i] = $temp;
           }
      }         
   }
   return $array;
}

function shakerSort ($array) {
    $n = count($array);
    $left = 0;
    $right = $n - 1;
    do 
    {
        for ($i = $left; $i < $right; $i++) 
        {
            if ($array[$i] > $array[$i + 1]) 
            {
                list($array[$i], $array[$i + 1]) = array($array[$i + 1], $array[$i]);
            }
        }
        $right -= 1;
        for ($i = $right; $i > $left; $i--) 
        {
            if ($array[$i] < $array[$i - 1]) 
            {
                list($array[$i], $array[$i - 1]) = array($array[$i - 1], $array[$i]);
            }
        }
        $left += 1;
    } 
    while ($left <= $right);
    return $array;
}
            

$start_time_1 = microtime(true);

sort($arr);

$end_time_1 = microtime(true);

echo $end_time_1 - $start_time_1;

// 0.0024, 0.0018, 



$start_time_2 = microtime(true);

bubbleSort($arr);

$end_time_2 = microtime(true);

echo $end_time_2 - $start_time_2;

// 2.27, 2.30, 2.26


$start_time_3 = microtime(true);

var_dump(shakerSort($arr));

$end_time_3 = microtime(true);

echo $end_time_3 - $start_time_3;

//4.15, 4.14, 4.13



