<?php

namespace lesson4\AbstractDataBase;

abstract class AbstractDBRecord {
    protected AbstractDBConnection $connection;
    abstract public function makeProtectedQuery(string $recordQuery):void;
    abstract public function record(string $recordQuery): void;
}




