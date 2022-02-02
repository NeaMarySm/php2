<?php

namespace lesson4\AbstractDataBase;

class PostgreDBConnection extends AbstractDBConnection{
    public function createConnection(): void {
        $connection_string = "host=$this->hostname port=$this->port dbname=$this->database user=$this->user password=$this->password";
        $this->connection = pg_connect($connection_string); 
        if(!$this->connection){
            die("Connection failed: " . pg_last_error());
        }  
    }
    public function closeConnection():void {
        if($this->connection){
            pg_close($this->connection);
        }  
    }
}