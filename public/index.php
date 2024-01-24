<?php

use Bank\App\App;
use Bank\App\Message;
use Bank\App\Auth;

session_start();

define('DB', 'file');

require '../vendor/autoload.php';

define('ROOT', __DIR__.'/../');
define('URL', 'http://super-bank.test');

Message::get();
Auth::get();

echo App::run();