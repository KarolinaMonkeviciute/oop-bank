<?php

use Bank\App\App;
use Bank\App\Message;
use Bank\App\Auth;

session_start();

if(isset($_SESSION['selectedDB'])){
    define('DB', $_SESSION['selectedDB']);
} else {
    define('DB', 'file');
}

require '../vendor/autoload.php';

define('ROOT', __DIR__.'/../');
define('URL', 'http://super-bank.test');

Message::get();
Auth::get();

echo App::run();