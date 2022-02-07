<?php

namespace lesson6\SockStore;

class Order {
    private int $orderId;
    private float $totalPrice;
    private int $phoneNumber;
    private static $orders = [];

    public function __construct(int $orderId, int $userPhone, float $totalPrice)
    {
        $this->orderId = $orderId;
        $this->phoneNumber = $userPhone;
        $this->totalPrice = $totalPrice;
        static::$orders[$this->orderId] = $this;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public static function get(int $orderId = null)
    {
        if ($orderId === null) {
            return static::$orders;
        } else {
            return static::$orders[$orderId];
        }
    }

}
