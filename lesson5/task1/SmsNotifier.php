<?php

namespace lesson5\Notifier;

class SmsNotifier extends BaseNotifier
{
    public function send(string $message)
    {
        $this->sendSms($message);
        parent::send($message);
    }

    public function sendSms(string $message)
    {  
        // отправка sms
    }
}