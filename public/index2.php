<?php

class Product {
    private $title;
    private $price;
    private $description;
    protected $rating;
    private $category;
    private $brand;

    function __construct($title, $price, $category, $description, $brand)
    {
        $this->title = $title;
        $this->price = $price;
        $this->category = $category;
        $this->description = $description;
        $this->brand = $brand;
    }

    public function render(){
        echo 'product';
    }

    public function addToCart(){
        echo 'added';
    }

    protected function countRating(){
        $result=5;
        return $this->rating = $result;
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        return $this->title = $title;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        return $this->price = $price;
    }
    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category){
        return $this->category = $category;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        return $this->description = $description;
    }
    public function getRating(){
        return $this->rating;
    }
    public function setRating(){
        return $this->rating = $this->countRating();
    }
    public function getBrand(){
        return $this->brand;
    }
    public function setBrand($brand){
        return $this->brand = $brand;
    }
}

class Product_in_cart extends Product {
    private $quantity;
    public function __construct($title, $price, $category, $description, $brand, $quantity){
        parent::__construct($title, $price, $category, $description, $brand, $quantity);
        $this->quantity = $quantity;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity($quantity){
        return $this->quantity = $quantity;
    }
    public function render(){
        echo 'product in cart';
    }

    public function addToCart(){
        echo 'one more added';
    }
    
}

$prod = new Product_in_cart('some_product', 66, 'category', '', 'itd', 8);

$prod -> setRating();
echo $prod->getRating();
die();

// задание 5

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // 1
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4

// переменная с модификатором static принадлежит классу, а не его экземпляру,
// поэтому при каждом вызове метода вне зависимости от объекта его вызывающего,
// значение переменной увеличивается на единицу


// задание 6

class A_1 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A_1 {
}
$a1 = new A_1();
$b1 = new B();
$a1->foo(); // 1 
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2

// Класс B наследует функцию foo(), которая инициализирует переменную static $x, 
// которая никак не зависит от переменной static $x в классе-родителе, поэтому
// при вызове $a1 увеличивается переменная класса A_1, а при вызове $b1 увеличивается переменная класса B

// задание 7

class A_2 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B_2 extends A_2 {
}
$a1 = new A_2; // класс без конструктора, скобки можно не ставить
$b1 = new B_2;
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2