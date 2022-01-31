<?php

namespace lesson4\AbstractDataBase;

interface AbstractFactory{
    public function makeConnection(string $hostname, string $user, string $password, string $database, int $port): AbstractDBConnection;
    public function makeRecord(): AbstractDBRecord;
    public function makeQuery(): AbstractDBQueryBuilder;
}