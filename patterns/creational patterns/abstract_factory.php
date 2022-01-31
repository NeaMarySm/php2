<?php

/*
Абстрактная фабрика

Применяется, когда бизнес-логика приложения предполагает работу с разными семействами объектов, 
связанных друг с другом и не зависящих от конкретных классов.
Когда внедрен фабричный метод и требуется добавить еще одну группу объектов

Плюсы:
- изолирует конкретные классы. фабрика инкапсулирует ответственность за создание классов и сам этот процесс, 
соответственно она изолирует клиента от деталей реализации класса. 
Имена изготавливаемых классов известны только конкретной фабрике, в коде клиента они не упоминаются.

- упрощает замену семейств продуктов. класс конкретной фабрики появляется вприложении только один раз, при инстанцировании. 
это облегчает замену используемой конкретной фабрики. приложение может изменить конфигурацию продуктов просто подставив новую конкретную фабрику

- гарантирует сочетаемость продуктов. если продукты некоторого семейства спроектировани для совместного использования, 
важно, чтобы приложение в каждый момент времени работало только с продуктами единственного семейства

Минусы:
- расширение а ф для изготовления новых видов продукта - непростая задача, для их поддержки необходимо расширить интерфейс
фабрики, те изменить класс фабрики и всех ее подклассов

Особенности:
- обычно во время выполнения добавляется единственный экземпляр класса фабрики. эта конкретная фабрика создает
объекты продукты, имеющие вполне определенную реализацию. для создания других видов объектов клиент должен воспользоваться 
другой конкретной фабрикой

- а ф должна инициализировать конкретную фабрику в проекте один раз. желательно это делать на самом верхнем уровне,
чтобы не получилось так, что в разных частях кода дублируются создания одного и того же набора классов

Суть а ф -  в создании семейства наборов взаимозаменяемых классов



*/
 abstract class AbstractArticle{
     private $text;
     public function __construct(string $text){
         $this->text = $text;
     }

     public function quoteSpecialChars(): string {
         return 'translate special Symbols into html-mnemonics';
     }
     abstract public function render(): string; 

 }

 class HtmlArticle extends AbstractArticle{
     public function render(): string {
        return 'renders html article';
     }
 }

 class RssArticle extends AbstractArticle{
    public function render(): string {
       return 'renders rss article';
    }
}

abstract class AbstractNewsFeed{
    private $news;

    public function __construct(array $news){
        $this->news = $news;
    }

    public function getLastNews(int $quantity): string{
        // some logic
        return 'news';
    }
    public function showAsBanner(): string{
        return 'banner';
    }
    abstract public function render(): string;
    
}
class HtmlNewsFeed extends AbstractNewsFeed{
    public function render(): string {
       return 'renders html NewsFeed';
    }
}

class RssNewsFeed extends AbstractNewsFeed{
   public function render(): string {
      return 'renders rss NewsFeed';
   }
}

abstract class AbstractFactory{
    abstract public function createArticle(string $content): AbstractArticle;
    abstract public function createNewsFeed(array $news): AbstractNewsFeed;

}

class HtmlFactory extends AbstractFactory{
    public function createArticle(string $content): AbstractArticle {
        return new HtmlArticle($content);
    }
    public function createNewsFeed(array $news): AbstractNewsFeed {
        return new HtmlNewsFeed($news);
    }
}

class RssFactory extends AbstractFactory{
    public function createArticle(string $content): AbstractArticle {
        return new RssArticle($content);
    }
    public function createNewsFeed(array $news): AbstractNewsFeed {
        return new RssNewsFeed($news);
    }
}

class Article {
    public function createPage(AbstractFactory $abstractFactory){
        $article = $abstractFactory->createArticle();
        $article->quoteSpecialChars();
        $article->render();

        $newsFeed = $abstractFactory->createNewsFeed();
        $newsFeed->getLastNews(10);
        $newsFeed->showAsBanner();
        $newsFeed->render(); 
    }
}

