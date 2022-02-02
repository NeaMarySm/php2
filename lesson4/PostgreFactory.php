<?php

namespace lesson4\AbstractDataBase;

class PostgreFactory implements AbstractFactory {
    public function makeConnection(string $hostname, string $user, string $password, string $database, int $port): AbstractDBConnection{
        return new PostgreDBConnection($hostname,$user,$password,$database,$port);
    }
    public function makeRecord(): AbstractDBRecord{
        return new PostgreDBRecord();
    }
    public function makeQuery(): AbstractDBQueryBuilder{
        return new PostgreDBQueryBuilder();
    }
}