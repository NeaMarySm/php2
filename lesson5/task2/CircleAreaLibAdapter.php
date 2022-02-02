<?php

namespace lesson5\AreaLib;

class CircleAreaLibAdapter implements ICircle
{
    private $CircleDiagonalCount;

    public function __construct(CircleAreaLib $CircleDiagonalCount)
    {
        $this->CircleDiagonalCount = $CircleDiagonalCount;
    }

    protected function getDiagonal(int $circumference){
       return $circumference/M_PI;
    }

    public function CircleArea(int $circumference)
    {
        $diagonal = $this->getDiagonal($circumference);
        return $this->CircleDiagonalCount->getCircleArea($diagonal);
    }
}


