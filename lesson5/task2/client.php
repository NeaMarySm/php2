<?php

namespace lesson5\AreaLib;

function clientCodeCircle (ICircle $areaCounter){
    $areaCounter->CircleArea(56);
}

$circleAreaLib = new CircleAreaLib;
$adapterCircle = new CircleAreaLibAdapter($circleAreaLib);
clientCodeCircle($adapterCircle);

function clientCodeSquare(ISquare $areaCounter){
    $areaCounter->SquareArea(56);
}

$squareAreaLib = new SquareAreaLib;
$adapterSquare = new SquareAreaLibAdapter($squareAreaLib);
clientCodeSquare($adapterSquare);