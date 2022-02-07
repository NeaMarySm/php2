<?php

namespace lesson6\SockStore;

include '../../vendor/autoload.php';

$order = new OrderController();
$order->createNewOrder(12345, 99999999, 1234.5);
$order->pay('qiwi', 12345);

