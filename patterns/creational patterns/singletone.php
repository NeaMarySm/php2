<?php

/*
Одиночка

Применение: 
- когда в коде должен быть единственный экземпляр конкретного класса, доступный всем клинтам
- когда нужно больше контроля над глобальными переменными

Плюсы: 
- гарантирует наличие единственного экземпляра класса

Минусы:

- нарушает принцип единственной ответсвенности класса из группы solid
- невозможность мультипоточности
- затруднения при тестировании

Считается антипаттерном

Паттерны абстрактная фабрика, строитель и прототип могут быть реализованы с помощью одиночки

*/

final class Singleton
{
    private static $instance;

    // получение объекта (создается при первом вызове)

    public static function getInstance(): Singleton
    {
        if(null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    // все манические методы, позволяющие создать второй экземпляр объкта оставлены пустыми, те не определены
    private function __construct()
    {
        // приватный
    }
    private function __clone()
    {
        // приватный
    }
    private function __wakeup()
    {
        // приватный
    }

}

// создание одиночки

Singleton::getInstance();