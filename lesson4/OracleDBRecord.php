<?php

namespace lesson4\AbstractDataBase;

class OracleDBRecord extends AbstractDBRecord{
    public function makeProtectedQuery(string $recordQuery):void {
        // создание защищенного запроса
    }
    public function record($query): void {
        // запись в базу данных
    }
}