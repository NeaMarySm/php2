<?php

namespace lesson4\AbstractDataBase;


class OracleDBConnection extends AbstractDBConnection{
    public function createConnection(): void {
        $this->connection = oci_connect($this->username,
        $this->password, $this->hostname);
        if(!$this->connection){
            $error = oci_error();
            die("Connection failed: " . $error['message']);
        } 
    }
    public function closeConnection():void {
        if($this->connection){
            oci_close($this->connection);
        }  
    }
}