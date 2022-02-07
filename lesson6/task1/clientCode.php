<?php

namespace lesson6\hh;

include '../../vendor/autoload.php';

$handHunter = new VacancyExchange();
$user = new User('John', 'john@ya.com', 6);
$handHunter->attach($user, 'php');

$handHunter->createNewVacancy(1324, 'php', 'text');


