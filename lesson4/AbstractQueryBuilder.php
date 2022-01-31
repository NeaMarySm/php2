<?php

namespace lesson4\AbstractDataBase;

abstract class AbstractDBQueryBuilder {
    protected AbstractDBConnection $connection;
    abstract public function createQuery(string $query):void;
}




