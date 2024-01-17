<?php

use Bank\App\App;

require '../vendor/autoload.php';

define('ROOT', __DIR__.'/../');
define('URL', 'http://super-bank.test');

echo App::run();