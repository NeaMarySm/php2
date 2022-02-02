<?php

namespace lesson5\Notifier;

class EmailNotifier extends BaseNotifier
{

    public function send(string $message)
    {
        $this->sendEmail($message);
        parent::send($message);
        
    }

    public function sendEmail(string $message)
    {
        // отправка по email
    }
}