<?php

use Bank\App\App;
use Bank\App\Message;

session_start();

require '../vendor/autoload.php';

define('ROOT', __DIR__.'/../');
define('URL', 'http://super-bank.test');

Message::get();

echo App::run();