<?php

require 'vendor/autoload.php';

use App\Classes\User;
use App\Classes\Mailer;

$user = new User(new Mailer());

$user->setEmail('mohammed.tanvir447@gmail.com');
$user->sendMessage('Welcome to our new Team');
