<?php

namespace lesson4\AbstractDataBase;

abstract class AbstractDBConnection {
    private $hostname;
    private $user;
    private $password;
    private $database;
    private $port;
    protected $connection;

    public function __construct(string $hostname, string $user, string $password, string $database, int $port)
    {
        $this->hostname = $hostname;
        $this->user = $user;
        $this->password = $password;
        $this->database =$database;
        $this->port = $port;
    }
    public function getConnection(){
        return $this->connection;
    }
    abstract public function createConnection(): void;
    abstract public function closeConnection(): void;
}




