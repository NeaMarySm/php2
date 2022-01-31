<?php

/*
Строитель

Применение:

- когда необходимо избавиться от конструктора с бездонным количество параметров
- когда код должен уметь создавать разные представления одного и того же объекта
- когда нужно создавать сложные составные объекты

Плюсы:

- Позволяет создавать продукты пошагово
- дает возможность использовать один код для разных объектов
- инкапсулирует часть кода

Минусы:

- Усложняет код за счет создания новых классов

Основная цель строителя - помогать конструировать сложные объекты




*/

class Order 
{
    private $product;
    private $delivery;
    private $promocode;
    private $warehouse;
    private $mailer;

    // public function __construct(
    //     Product $product,
    //     Delivery $delivery,
    //     Warehouse $warehouse,
    //     Mailer $mailer
    // )
    // {
    //     $this->product = $product;
    //     $this->delivery = $delivery;
    //     $this->warehouse = $warehouse;
    //     $this->mailer = $mailer;
        
    // }

    public function __construct(OrderBuilder $orderBuilder)
    {
        $this->product = $orderBuilder->getProduct();
        $this->delivery = $orderBuilder->getDelivery();
        $this->warehouse = $orderBuilder->getWarehouse();
        $this->mailer = $orderBuilder->getMailer();
        
    }
}

class OrderBuilder
{
    private $product;
    private $delivery;
    private $promocode;
    private $warehouse;
    private $mailer;
 
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }
 
    public function getProduct(): Product
    {
        return $this->product;
    }
 
    public function setDelivery(Delivery $delivery)
    {
        $this->delivery = $delivery;
    }
 
    public function getDelivery(): Delivery
    {
        return $this->delivery;
    }
 
    public function setWarehouse(Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
    }
 
    public function getWarehouse(): Warehouse
    {
        return $this->warehouse;
    }
 
    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }
 
    public function getMailer(): Mailer
    {
        return $this->mailer;
    }
 
    public function build(): Order
    {
        return new Order($this);
    }
}

function testBuilder(
    Product $product,
    Delivery $delivery,
    Warehouse $warehouse,
    Mailer $mailer
)
{
    $orderBuilder = new OrderBuilder();
    $orderBuilder->setProduct($product);
    $orderBuilder->setDelivery($delivery);
    $orderBuilder->setWarehouse($warehouse);
    $orderBuilder->setMailer($mailer);

    $order = $orderBuilder->build();


}