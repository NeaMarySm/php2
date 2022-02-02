<?php

namespace lesson5\AreaLib;

class SquareAreaLibAdapter implements ISquare
{
    private $SquareDiagonalCount;

    public function __construct(SquareAreaLib $SquareDiagonalCount)
    {
        $this->SquareDiagonalCount = $SquareDiagonalCount;
    }

    protected function getDiagonal(int $sideSquare){
       return sqrt(2*$sideSquare**2);
    }

    public function squareArea(int $sideSquare)
    {
        $diagonal = $this->getDiagonal($sideSquare);
        return $this->SquareDiagonalCount->getSquareArea($diagonal);
    }
}