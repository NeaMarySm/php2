<?php

namespace lesson5\Notifier;

interface INotifier 
{
    public function send(string $message);
}