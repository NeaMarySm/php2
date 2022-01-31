<?php

// фабричный метод

// Применение:
 
//  - классу заранее не известно, объекты каких подклассов ему придется создавать
//  - класс спроектирован так, чтобы создаваемые им объекты определялись подклассами
//  - класс делегирует свои обязанности одному из нескольких создаваемых им подклассов, и планируется локализовать знание о том, какой класс принимает эти обязанности на себя
//  - вы заранее закладываете возможность расширения вашего кода или библиотеки 

/*
    Плюсы паттрена:

    - Фабричные методы избавляют проектировщика от необходимости встраивать в код зависящие от приложения классы
    - создание объектов внутри класса с помощью ф м всегда оказывается более гибким решением, чем непосредственное создание. 
    Ф м создает создает в подклассах операции зацепки для предоставления расширенной версии объекта
    - связь с другими классами(модулями) программы уменьшается за счет простоты подмены одног класса другим.
    - улучшается тестируемость за счет простоты подмены реализации взаимодействующих классов
    - Реализуется принцип открытости/закрытости

    Минусы:

    - для переопределения ф м требуется каждый раз создавать новые подклассы
    - чем больше методов с фабриками в классе, тем больше наследников приходится создавать, чтобы покрыть все возможные варианты их переопределений

    Ф М может именть реализации как в классе так и быть абстрактным методом. в первом случае это дает базовую реализацию и не требует
    обязательных наследников, во втором - позволяет не завязываться на конкретную реализацию, а выбрать при инстанцировании конкретного наследника


*/


interface IAdvertisement {
    public function build(array $parameters): string;
   
}
class BannerBuilder implements IAdvertisement{
    public function build(array $parameters): string
    {
        return 'Returns Banner';
    }
}

class PopUpBuilder implements IAdvertisement{
    public function build(array $parameters): string
    {
        return 'Returns Pop-Up';
    }
}

class BlogPage {
    public function getHtml(): string {
        echo 'Some Buisness Logic';
            $advertisement = $this->getAdvertisement()->build($this->$parameters);
        echo 'Some Buisness Logic';

    }

    protected function getAdvertisement(): IAdvertisement{
        return new BannerBuilder;
    }
}

class BlogPageWithPopUp extends BlogPage {
    protected function getAdvertisement(): IAdvertisement{
        return new PopUpBuilder;
    }
}

$blogPage = new BlogPage();
 $blogPage->getHtml();

$blogPageWithPopUP = new BlogPageWithPopUp();
 $blogPageWithPopUP->getHtml();