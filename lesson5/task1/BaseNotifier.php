<?php

namespace lesson5\Notifier;


class BaseNotifier implements INotifier 
{
    protected $notifier;

    public function __construct(INotifier $nextNotifier = null)
    {
        $this->notifier = $nextNotifier;
    }

    public function send(string $message)
    {
        if($this->notifier)
        {
            $this->notifier->send($message);
        }
    }
}