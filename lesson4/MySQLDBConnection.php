<?php

namespace lesson4\AbstractDataBase;

class MySQLDBConnection extends AbstractDBConnection{
    public function createConnection(): void {

        $this->connection = new mysqli($this->hostname, $this->username,
        $this->password, $this->database);
        
        if(!$this->connection){
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    public function closeConnection():void {

        if($this->connection){
            mysqli_close($this->connection);
        }  
    }
}