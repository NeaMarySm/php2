<?php

namespace lesson4\AbstractDataBase;

class PostgreDBRecord extends AbstractDBRecord{
    public function makeProtectedQuery(string $recordQuery):void {
        // создание защищенного запроса
    }
    public function record($query): void {
        // запись в базу данных
    }
}
