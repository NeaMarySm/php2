<?php

$array = [23, 34, 15, 36, 86, 94, 36, 48, 52, 90];

function arr_delete($array, $value)
{

    foreach($array as $idx => $item)
    {
        if($item === $value)
        {
            unset($array[$idx]);
        }
    }

    return $array;
}

$array = arr_delete($array, 36);

var_dump($array);