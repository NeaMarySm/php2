<?php

namespace lesson4\AbstractDataBase;

class OracleFactory implements AbstractFactory {
    public function makeConnection(string $hostname, string $user, string $password, string $database, int $port): AbstractDBConnection{
        return new OracleDBConnection($hostname,$user,$password,$database,$port);
    }
    public function makeRecord(): AbstractDBRecord{
        return new OracleDBRecord();
    }
    public function makeQuery(): AbstractDBQueryBuilder{
        return new OracleDBQueryBuilder();
    }
}