<?php

/*

Прототип

Применяется, когда код не должен зависить от классов копируемых объектов

Плюсы:
- меньше повторяющегося кода
- ускоряет создание объктов

Минусы:
- сложно клонировать составные объекты

Цель прототипа - клонировать объекты с теми же или похожими данными и состоянием

*/

class Article
{
    private $title;
    private $text;
 
    public function getTitle(): string
    {
        return $this->title;
    }
 
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
 
    public function getText(): string
    {
        return $this->text;
    }
 
    public function setText(string $text): void
    {
        $this->text = $text;
    }
 
    public function __clone()
    {
        /*логика клонирования*/
    }
}

function testPrototype(){

    $article = new Article();
    $article->setTitle('article title');
    $article->setText('article text');

    $article2 = clone $article;
    $article2->setText('another text');
}