<?php

namespace lesson6\SockStore;

class YandexPayment implements IPayment
{
    public function getPaymentForm(Order $order): string
    {
        return 'Yandex payment form';
    }

    public function validate(Order $order): bool
    {
        // валидация платежа
        if(is_float($order->getTotalPrice()) && $order->getTotalPrice() > 0)
        {
            return true;
        } else return false;
    }
}