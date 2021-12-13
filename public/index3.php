<?php

abstract class Product {
    protected $title;
    protected $price;
    protected $description;
    protected $totalPrice;

    public function __construct($title, $price, $description)
    {
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }
    public function render(){
        echo 'product';
    }
    public function addToCart(){
        echo 'added';
    }

    abstract protected function countTotalPrice();
    abstract protected function countIncome();

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getTotalPrice(){
        return $this->totalPrice;
    }
    public function setTotalPrice(){
        $this->totalPrice = $this->countTotalPrice();
    }
}

class DigitalProduct extends Product {

    public function __construct($title, $price, $description)
    {
        parent::__construct($title, $price, $description);
        $this->setTotalPrice();
    }
    public function countTotalPrice(){
        return $this->price;
    }
    public function countIncome(){
        
    }
}

class PieceProduct extends Product {
    private $quantity;

    public function __construct($title, $price, $description, $quantity)
    {
        parent::__construct($title, $price, $description);
        $this->quantity = $quantity;
        $this->setTotalPrice();
    }

    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
    public function countTotalPrice(){
         return $this->price * $this->quantity;
    }
    public function countIncome(){

    }
}

class WeightProduct extends Product {
    private $weight;
    public function __construct($title, $price, $description, $weight)
    {
        parent::__construct($title, $price, $description);
        $this->weight = $weight;
        $this->setTotalPrice();
    }

    public function countTotalPrice(){
        return $this->price * $this->weight;
    }
    public function countIncome(){
        
    }
}


$digit = new DigitalProduct('video', 33, '');
var_dump($digit);
// die();

$piece = new PieceProduct('bag', 672, '', 12);
var_dump($piece);
//die();

$weight = new WeightProduct('flour', 42, '', 5.3);
var_dump($weight);
//die();

// Задание 2


trait Singleton {
    static protected $instance;
    public static function getInstance() : self
    {
        if(self::$instance === null){
            self::$instance = new self(); 
        }
        return self::$instance;
    }
}

class SingletonDB {
    use Singleton;
    protected function __construct(){
        // connect to DB
    }
    protected function __destruct(){  
        // close connection  
    }
}


$new = SingletonDB::getInstance();
$new1 = SingletonDB::getInstance();
$new2 = SingletonDB::getInstance();

var_dump($new1===$new2);
