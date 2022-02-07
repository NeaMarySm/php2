<?php

namespace lesson6\SockStore;

interface IPayment
{
    public function getPaymentForm(Order $order): string;

    public function validate(Order $order): bool;
}