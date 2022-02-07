<?php

namespace lesson6\SockStore;

class QiwiPayment implements IPayment
{
    public function getPaymentForm(Order $order): string
    {
        return 'Qiwi payment form';

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