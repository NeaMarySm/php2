<?php
namespace lesson6\SockStore;

class PaymentFactory
{
   
    public static function getPaymentMethod(string $id): IPayment
    {
        switch ($id) {
            case "qiwi":
                return new QiwiPayment();
            case "yandex":
                return new YandexPayment();
            case "webmoney":
                return new WebMoneyPayment();
            default:
                throw new \Exception("Unknown Payment Method");
        }
    }
}
