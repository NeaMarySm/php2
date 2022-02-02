<?php

/**
 * Интерфейс Компонента объявляет метод фильтрации, который должен быть
 * реализован всеми конкретными компонентами и декораторами.
 */

 interface InputFormat 
{
    public function formatText(string $text): string;
}

/**
 * Конкретный Компонент является основным элементом декорирования. Он содержит
 * исходный текст как есть, без какой-либо фильтрации или форматирования.
 */
class TextInput implements InputFormat
{
    public function formatText(string $text): string
    {
        return $text;
    }
}

/**
 * Базовый класс Декоратора не содержит реальной логики фильтрации или
 * форматирования. Его основная цель – реализовать базовую инфраструктуру
 * декорирования: поле для хранения обёрнутого компонента или другого декоратора
 * и базовый метод форматирования, который делегирует работу обёрнутому объекту.
 * Реальная работа по форматированию выполняется подклассами.
 */
class TextFormat implements InputFormat
{
    /**
     * @var InputFormat
     */
    protected $inputFormat;

    public function __construct(InputFormat $inputFormat)
    {
        $this->inputFormat = $inputFormat;
    }

    /**
     * Декоратор делегирует всю работу обёрнутому компоненту.
     */
    public function formatText(string $text): string
    {
        return $this->inputFormat->formatText($text);
    }
}

/**
 * Этот Конкретный Декоратор удаляет все теги HTML из данного текста.
 */
class PlainTextFilter extends TextFormat
{
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);
        return strip_tags($text);
    }
}


