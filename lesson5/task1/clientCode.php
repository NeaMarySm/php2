<?php

namespace lesson5\Notifier;

$notifier = new BaseNotifier();
$notifier = new EmailNotifier($notifier);
$notifier = new SmsNotifier($notifier);
$notifier = new SlackNotifier($notifier);

$message = 'some message';

$notifier->send($message);

