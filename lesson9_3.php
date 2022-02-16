<?php

$array_1 = [1, 3, 4, 7, 9, 11, 12, 14, 16, 18, 21];

$array_2 = [1, 3, 4, 7, 9, 11, 12];

function LinearSearch($myArray, $num) {
    $count = count($myArray);

    for ($i = 0; $i < $count; $i++) {
        if ($myArray[$i] == $num) return $i;
        elseif($myArray[$i] > $num) return null;
    }
    return null;
}


function binarySearch_steps($myArray, $num) {

    //определяем границы массива
    $left = 0;
    $right = count($myArray) - 1;
    $steps = 1;

    while ($left <= $right) {

        //находим центральный элемент с округлением индекса в меньшую сторону
        $middle = floor(($right + $left) / 2);
        //если центральный элемент и есть искомый   
        if ($myArray[$middle] == $num) {
            return $steps;
        }

        elseif($myArray[$middle] > $num) {
            //сдвигаем границы массива до диапазона от left до middle-1
            $right = $middle - 1;
        }
        elseif($myArray[$middle] < $num) {
            $left = $middle + 1;
        }
        $steps++;
    }
    return null;
}

function InterpolationSearch_steps($myArray, $num) {
    $start = 0;
    $last = count($myArray) - 1;
    $steps = 1;

    while (($start <= $last) && ($num >= $myArray[$start]) &&
        ($num <= $myArray[$last])) {

        $pos = floor($start + (
            (($last - $start) / ($myArray[$last] - $myArray[$start])) *
            ($num - $myArray[$start])
        )); 
        if ($myArray[$pos] == $num) {
            return $steps;
        }

        if ($myArray[$pos] < $num) {
            $start = $pos + 1;
        } else {
            $last = $pos - 1;
        }
        $steps++;
    }
    return null;
}


echo LinearSearch($array_1, 18).PHP_EOL; // 9 шагов

echo binarySearch_steps($array_2, 4).PHP_EOL; // 3 шага

echo InterpolationSearch_steps($array_1, 18).PHP_EOL; // 2 шага