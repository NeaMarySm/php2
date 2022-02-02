<?php

namespace lesson4\AbstractDataBase;


class MySQLFactory implements AbstractFactory {
    public function makeConnection(string $hostname, string $user, string $password, string $database, int $port): AbstractDBConnection{
        return new MySQLDBConnection($hostname,$user,$password,$database,$port);
    }
    public function makeRecord(): AbstractDBRecord{
        return new MySQLDBRecord();
    }
    public function makeQuery(): AbstractDBQueryBuilder{
        return new MySQLDBQueryBuilder();
    }
}