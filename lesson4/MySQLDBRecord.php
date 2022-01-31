<?php

namespace lesson4\AbstractDataBase;

class MySQLDBRecord extends AbstractDBRecord{
    public function makeProtectedQuery(string $recordQuery):void {
        $mysql = $this->connection->getConnection();
        $this->query = mysqli_real_escape_string($mysql, $recordQuery);
    }
    public function record($query): void {

        $this->makeProtectedQuery($query);
        $this->connection->getConnection()->query($this->query);
        $this->query = null;
    }
}