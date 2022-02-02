<?php

namespace lesson5\Notifier;

class SlackNotifier extends BaseNotifier{

    public function send(string $message)
    {
        $this->sendToSlack($message);
        parent::send($message);   
    }

    public function sendToSlack(string $message)
    {   
        // отправка по slack
    }
}