<?php

namespace lesson6\hh;

class Vacancy
{
    private $id;
    private $category;
    private $description;

    public function __construct(int $id, string $category, string $description)
    {
        $this->id = $id;
        $this->category = $category;
        $this->description = $description;
    }
}